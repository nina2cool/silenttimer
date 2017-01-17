<?
	# has database username and password, so don't need to put it in the page.
	require "../include/dbinfo.php";
	
	$PageTitle = "Inspection Report";
	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	# Total number of timers in database
	$sql = "SELECT * FROM tblInspection";
	$result = mysql_query($sql) or die("Cannot retrieve Inspection info, please try again.");
	
			$NumTimers = mysql_num_rows($result);
	
	# Total number of timers that have been accepted
	$sql2 = 'SELECT * FROM tblInspection where ProductStatus = "a"';  
	$result2 = mysql_query($sql2) or die("Cannot retrieve Product Status info, please try again.");

			$NumAccept = mysql_num_rows($result2);

	#Total number of timers that have been rejected
	$sql3 = 'SELECT * FROM tblInspection where ProductStatus = "r"';  
	$result3 = mysql_query($sql3) or die("Cannot retrieve Product Status info, please try again.");

			$NumReject = mysql_num_rows($result3);
		
		
	# Calculate the percentage of timers that have been accepted
	if($NumTimers != 0)
		{
			$PercentAccept = number_format(($NumAccept/$NumTimers)*100,1);
		}
	
	# Calculate the percentage of timers that have been rejected
	if($NumTimers != 0)
		{
			$PercentReject = number_format(($NumReject/$NumTimers)*100,1);
		}




//////////////////////////////////////////////////////////////
///                                                         //
//    phPie() by James Heinrich <info@silisoftware.com>     //
//        available at http://www.silisoftware.com          //
//                                                         ///
//////////////////////////////////////////////////////////////
///                                                         //
//         This code is released under the GNU GPL:         //
//           http://www.gnu.org/copyleft/gpl.html           //
//                                                          //
//      +---------------------------------------------+     //
//      | If you do use this code somewhere, send me  |     //
//      | an email and tell me how/where you used it. |     //
//      +---------------------------------------------+     //
//                                                         ///
//////////////////////////////////////////////////////////////
///                                                         //
// v1.1.1 - December 11, 2003                               //
//   * Added option to display legend text next to slices   //
//     instead of down side. Enable this by setting         //
//     LegendOnSlices to true.                              //
//     Thanks thorsten.gutermuth@junior-comtec.de for code  //
//   * Added StartAngle configuration variable              //
//   * Added SaveFilename configuration variable            //
//     Thanks thorsten.gutermuth@junior-comtec.de for idea  //
//   * Improved gd_version() and added gd_info() for PHP    //
//     versions prior to 4.3.0                              //
//                                                          //
// v1.1.0 - December 8, 2003                                //
//   * Converted functional structure to a class            //
//   * DisplayColors must now be passed as an array (not    //
//     a semicolon-seperated list as before)                //
//                                                          //
// v1.0.4 - January 15, 2003                                //
//   * Modified gd_version() to handle PHP 4.3.0+'s bundled //
//     version of the GD library                            //
//   * Moved the plotting of the pie slice border color for //
//     GD v2.0+ to on top of the pie slice fill color - it  //
//     looks better that way.                               //
//   * Support for passing serialized data if               //
//     magic_quotes_gpc is off                              //
//                                                          //
// v1.0.3 - October 24, 2002                                //
//   * added SortData option which will, if set to FALSE,   //
//     disable sorting the data and plot all data in the    //
//     order it's supplied, and not combine very small      //
//     values into "Other"                                  //
//                                                          //
// v1.0.2 - October 23, 2002                                //
//   * prevent flood-filling incorrect areas when slices    //
//     are very small and GD < v2.0.1 is used               //
//     Thanks Jami Lowery <jami@ego-systems.com>            //
//                                                          //
// v1.0.1 - August 12, 2002                                 //
//   * Support for register_globals = off                   //
//                                                          //
// v1.0.0 - May 17, 2002                                    //
//   * initial public release                               //
//                                                         ///
//////////////////////////////////////////////////////////////

class phPie {

	var $data              = $PercentAccept; $PercentReject;
	var $width             = 500;   // width of generated image, in pixels
	var $height            = 500;   // height of generated image, in pixels
	var $CenterX           = false; // defaults to round($width / 2)
	var $CenterY           = false; // defaults to round($height / 2)
	var $DiameterX         = false; // defaults to round($width * 0.95)
	var $DiameterY         = false; // defaults to round($height * 0.95)
	var $MinDisplayPercent = 1;     // smallest slice drawn on chart, in percent of total
	var $MarginPercent     = 5;     // margin around graph, in percent of image area
	var $DisplayColors     = array('3399FF', 'FF9933');
	var $BackgroundColor   = 'CCCCCC';
	var $LineColor         = '000000';
	var $Legend            = true;  // if true (and LegendOnSlices is false), show legend down left side
	var $LegendOnSlices    = false; // if true, label slices with data name and percentage
	var $FontNumber        = 3;     // size (1 = smallest, 5 = largest) of text written to graph
	var $SortData          = true;  // if true, sort data into largest-to-smallest order before graphing
	var $StartAngle        = 0;     // start point of pie: 0 = right, 90 = bottom, 180 = left, 270 = top
	var $SaveFilename      = '';    // if not empty, graph will be saved to this file instead of displayed

	function phPie() {
		return true;
	}

	function DisplayPieChart() {
		if ($img = $this->InitializeCanvas()) {
			$this->PlotPie($img);
			if ($this->SaveFilename) {
				$this->SaveImage($img, $this->SaveFilename);
			} else {
				$this->OutputImage($img);
			}
			ImageDestroy($img);
			return true;
		}
		return false;
	}

	function InitializeCanvas() {
		if ($img = @ImageCreate($this->width, $this->height)) {
			return $img;
		}
		echo 'Cannot Initialize new GD image stream';
		return false;
	}


	function ImageHexColorAllocate(&$img, $HexColorString) {
		$R = hexdec(substr($HexColorString, 0, 2));
		$G = hexdec(substr($HexColorString, 2, 2));
		$B = hexdec(substr($HexColorString, 4, 2));
		return ImageColorAllocate($img, $R, $G, $B);
	}


	function AddItem($key, $value) {
		$this->data[$key] = $value;
		return true;
	}

	function PlotPie(&$img) {
		$background_color = $this->ImageHexColorAllocate($img, $this->BackgroundColor);
		$line_color       = $this->ImageHexColorAllocate($img, $this->LineColor);

		foreach ($this->DisplayColors as $displaycolor) {
			$fill_color[]  = $this->ImageHexColorAllocate($img, $displaycolor);
			$label_color[] = $this->ImageHexColorAllocate($img, $displaycolor);
		}

		$marginmultiplier = ((100 - $this->MarginPercent) / 100);
		if ($this->CenterX === false) {
			$this->CenterX = round($this->width / 2);
		}
		if ($this->CenterY === false) {
			$this->CenterY = round($this->height / 2);
		}
		if ($this->DiameterX === false) {
			$this->DiameterX = round($this->width * $marginmultiplier);
		}
		if ($this->DiameterY === false) {
			$this->DiameterY = round($this->height * $marginmultiplier);
		}
		if ($this->LegendOnSlices) {
			$this->DiameterX = 0.85 * min($this->DiameterX, $this->DiameterY);
			$this->DiameterY = $this->DiameterX;
		} elseif ($this->Legend) {
			$this->DiameterX = min($this->DiameterX, $this->DiameterY);
			$this->DiameterY = $this->DiameterX;
			$this->CenterX   = $this->width  - (($this->DiameterX / $marginmultiplier) / 2);
			$this->CenterY   = $this->height - (($this->DiameterY / $marginmultiplier) / 2);
		}

		$NumTimers = array_sum($this->data);
		if ($this->SortData) {
			arsort($this->data);
		}

		$Start = $this->StartAngle;
		$valuecounter = 0;
		$ValuesSoFar  = 0;
		foreach ($this->data as $key => $value) {
			$ValuesSoFar += $value;

			if ($this->LegendOnSlices) {

				// Added by thorsten.gutermuth@junior-comtec.de
				$text = $key.' ('.number_format(@($NumAccept / $NumTimers) * 100, 1).'%)';
				$text_width  = ImageFontWidth($this->FontNumber) * strlen($text);
				$text_height = ImageFontHeight($this->FontNumber);

				$startpoint = ($ValuesSoFar - ($$NumAccept / 2)) / $NumTimers;
				$x_pos = round($this->CenterX + cos($startpoint * 2 * pi()) * $this->DiameterX / 1.85);
				$y_pos = round($this->CenterY + sin($startpoint * 2 * pi()) * $this->DiameterY / 1.85) - round($text_height / 2);

				if ($x_pos < $this->CenterX) {
					// align text that's left-of-centre with right-edge-on-pie, leave other text left-edge-on-pie
					$x_pos -= $text_width;
				}

			} elseif ($this->Legend) {

				$x_pos = 5;
				$y_pos = round((ImageFontHeight($this->FontNumber) * 0.5) + ($valuecounter * 1.5 * ImageFontHeight($this->FontNumber)));
				$text = $key.' ('.number_format(($NumAccept / $NumTimers) * 100, 1).'%)';

			}



			if (!$this->SortData || (($NumAccept / $NumTimers) > ($this->MinDisplayPercent / 100))) {

				$End = ceil(($ValuesSoFar / $NumTimers) * 360);
				$this->FilledArc($img, $this->CenterX, $this->CenterY, $this->DiameterX, $this->DiameterY, $Start, $End, $line_color, $fill_color[$valuecounter % count($fill_color)]);

				if ($this->LegendOnSlices || $this->Legend) {
					ImageString($img, $this->FontNumber, $x_pos, $y_pos, $text, $label_color[$valuecounter % count($label_color)]);
				}
				$Start = $End;

			} else {

				// too small to bother drawing - just finish off the arc with no fill and break
				$End = $this->StartAngle + 360;
				if ((($NumTimers - $ValuesSoFar) / $NumTimers) > 0.0025) {
					// only fill in if more than 0.25%, otherwise colors might bleed
					$this->FilledArc($img, $this->CenterX, $this->CenterY, $this->DiameterX, $this->DiameterY, $Start, $End, $line_color, $line_color);
				}
				if ($this->LegendOnSlices || $this->Legend) {
					$text = 'Other ('.number_format((($NumTimers - $ValuesSoFar) / $NumTimers) * 100, 1).'%)';
					ImageString($img, $this->FontNumber, $x_pos, $y_pos, $text, $line_color);
				}
				break;

			}
			$valuecounter++;
		}

		return true;
	}

	function OutputImage(&$img) {
		// display image
		if (!headers_sent()) {
			$imagetypes = imagetypes();
			if ($imagetypes & IMG_PNG) {
				header('Content-type: image/png');
				ImagePNG($img);
			} elseif ($imagetypes & IMG_GIF) {
				header('Content-type: image/gif');
				ImageGIF($img);
			} elseif ($imagetypes & IMG_JPG) {
				header('Content-type: image/jpeg');
				ImageJPEG($img);
			} else {
				echo 'ERROR: Cannot find compatible output method (JPG, PNG, GIF)';
				ImageDestroy($img);
				return false;
			}
			return true;
		}
		echo 'ERROR: headers already sent';
		return false;
	}

	function SaveImage(&$img, $filename) {
		$imagetypes = imagetypes();
		if ($imagetypes & IMG_PNG) {
			ImagePNG($img, $filename);
		} elseif ($imagetypes & IMG_GIF) {
			ImageGIF($img, $filename);
		} elseif ($imagetypes & IMG_JPG) {
			ImageJPEG($img, $filename);
		} else {
			echo 'ERROR: Cannot find compatible output method (JPG, PNG, GIF)';
			return false;
		}
		return true;
	}

	function gd_version() {
		$gd_info = gd_info();
		if (substr($gd_info['GD Version'], 0, strlen('bundled (')) == 'bundled (') {
			return (float) substr($gd_info['GD Version'], strlen('bundled ('), 3); // "2.0" (not "bundled (2.0.15 compatible)")
		}
		return (float) substr($gd_info['GD Version'], 0, 3); // "1.6" (not "1.6.2 or higher")
	}

	function FilledArc(&$img, $CenterX, $CenterY, $DiameterX, $DiameterY, $Start, $End, $line_color, $fill_color='none') {

		if ($this->gd_version() >= 2.0) {

			if ($fill_color != 'none') {
				// fill
				ImageFilledArc($img, $CenterX, $CenterY, $DiameterX, $DiameterY, $Start, $End, $fill_color, IMG_ARC_PIE);
			}
			// outline
			ImageFilledArc($img, $CenterX, $CenterY, $DiameterX, $DiameterY, $Start, $End, $line_color, IMG_ARC_EDGED | IMG_ARC_NOFILL | IMG_ARC_PIE);

		} else {

			// cbriou@orange-art.fr

			// To draw the arc
			ImageArc($img, $CenterX, $CenterY, $DiameterX, $DiameterY, $Start, $End, $line_color);

			// To close the arc with 2 lines between the center and the 2 limits of the arc
			$x = $CenterX + (cos(deg2rad($Start)) * ($DiameterX / 2));
			$y = $CenterY + (sin(deg2rad($Start)) * ($DiameterY / 2));
			ImageLine($img, $x, $y, $CenterX, $CenterY, $line_color);
			$x = $CenterX + (cos(deg2rad($End)) * ($DiameterX / 2));
			$y = $CenterY + (sin(deg2rad($End)) * ($DiameterY / 2));
			ImageLine($img, $x, $y, $CenterX, $CenterY, $line_color);

			if ($fill_color != 'none') {
				if (($End - $Start) > 0.5) {
					// ImageFillToBorder() will flood the wrong parts of the image if the slice is too small
					// thanks Jami Lowery <jami@ego-systems.com> for pointing out the problem

					// To fill the arc, the starting point is a point in the middle of the closed space
					$x = $CenterX + (cos(deg2rad(($Start + $End) / 2)) * ($DiameterX / 4));
					$y = $CenterY + (sin(deg2rad(($Start + $End) / 2)) * ($DiameterY / 4));
					ImageFillToBorder($img, $x, $y, $line_color, $fill_color);
				}
			}
		}
	}

}

if (!function_exists('gd_info')) {
	// built into PHP v4.3.0+ (with bundled GD2 library)
	function gd_info() {
		ob_start();
		phpinfo();
		$phpinfo = ob_get_contents();
		ob_end_clean();
		
		// based on code by johnschaefer at gmx dot de
		// from PHP help on gd_info()
		$gd_info = array(
			'GD Version'         => '',
			'FreeType Support'   => false,
			'FreeType Support'   => false,
			'FreeType Linkage'   => '',
			'T1Lib Support'      => false,
			'GIF Read Support'   => false,
			'GIF Create Support' => false,
			'JPG Support'        => false,
			'PNG Support'        => false,
			'WBMP Support'       => false,
			'XBM Support'        => false
		);
		foreach(explode("\n", $phpinfo) as $line) {
			foreach ($gd_info as $key => $value) {
				if (strpos($line, $key) !== false) {
					$newvalue = trim(str_replace($key, '', strip_tags($line)));
					$gd_info[$key] = (($newvalue == 'enabled') ? true : $newvalue);
				}
			}
		}
		return $gd_info;
	}
}


if (isset($_REQUEST['demomode'])) {

	$phpie = new phPie;
	$phpie->data = array();
	srand(time());
	for ($i = 1; $i < 10; $i++) {
		$phpie->AddItem('SampleData'.$i, rand(0, 1000));
	}
	switch (rand(0, 2)) {
		case 0:
			$phpie->Legend         = false;
			$phpie->LegendOnSlices = false;
			break;
		case 1:
			$phpie->Legend         = false;
			$phpie->LegendOnSlices = true;
			break;
		case 2:
			$phpie->Legend         = true;
			$phpie->LegendOnSlices = false;
			break;
	}
	$phpie->DisplayPieChart();
	exit;

}

$phpie = new phPie;
foreach ($_REQUEST as $key => $value) {
	switch ($key) {
		case 'data':
			if (is_array($value)) {
				// you can pass data to phPie via the GETstring as a text array:
				// echo '<img src="phPie.php?data[male]=15&data[female]=25">';

				echo '<img src="phPie.php?data[male]=$PercentAccept&data[female]=$PercentReject">';
				$phpie->$key = $value;
			} else {
				// you can pass data to this file via a serialized array:
				// $data = array('male'=>15; 'female'=>25);
				// echo '<img src="phPie.php?data='.urlencode(serialize($data)).'">';
				$data = "array('male'=$PercentAccept; 'female'=$PercentReject)";
				echo '<img src="phPie.php?data='.urlencode(serialize($data)).'">';
		
				if (get_magic_quotes_gpc()) {
					$phpie->$key = unserialize(stripslashes($_REQUEST['data']));
				} else {
					$phpie->$key = unserialize($_REQUEST['data']);
				}
			}
			break;

		case 'width':
		case 'height':
		case 'CenterX':
		case 'CenterY':
		case 'DiameterX':
		case 'DiameterY':
		case 'MinDisplayPercent':
		case 'FontNumber':
		case 'LineColor':
		case 'BackgroundColor':
		case 'SaveFilename':
		case 'StartAngle':
			$phpie->$key = $value;
			break;

		case 'DisplayColors':
			if (is_array($value)) {
				$phpie->$key = $value;
			} else {
				die('DisplayColors is not an array');
			}
			break;

		case 'Legend':
		case 'SortData':
			$phpie->$key = (bool) $value;
			break;

		default:
			break;
	}
}
if (($phpie->width > 8192) || ($phpie->height > 8192) || ($phpie->width <= 0) || ($phpie->height <= 0)) {
	die('Image size limited to between 1x1 and 8192x8192 for memory reasons');
}
$phpie->DisplayPieChart();

?>