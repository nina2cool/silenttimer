<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?

	$ID = $_GET['pic'];

	//connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	# get all pictures from Db, and list them out baby!!!
	$sql = "SELECT * FROM tblGallery WHERE GalleryID = '$ID'";
	$result = mysql_query($sql) or die("Can not get image information.  Please try again.");
	
	$NumPics = mysql_num_rows($result);
	
	while($row = mysql_fetch_array($result))
	{
		$Image = $row[Name];
		$Title = $row[Title];
		$Description = $row[Description];
	}
	
	mysql_close($link);

?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>The 
  Photo Gallery</strong></font></p>
	
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong><? echo $Title;?></strong></font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"> <font size="2"><? echo $Description;?> 
  </font></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="photos.php"><img src="pics/big/<? echo $Image;?>" width="450" height="338" border="1"></a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="photos.php">&lt; 
  Back to Gallery</a></strong></font></p>
<p>&nbsp;</p>
<p><br>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>
</p>
