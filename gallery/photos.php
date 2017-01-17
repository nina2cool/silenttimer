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

	//connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	# get all pictures from Db, and list them out baby!!!
	$sql = "SELECT * FROM tblGallery WHERE Category = 'timer' ORDER BY GalleryID";
	$result = mysql_query($sql) or die("Can not get images.  Please try again.");
	
	$NumPics = mysql_num_rows($result);

?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>The 
  Photo Gallery</strong></font></p>
	
<p><font size="2" face="Arial, Helvetica, sans-serif">We have tried to make our 
  timer as functional as possible for your test. But being functional doesn't 
  mean it can't look cool. Take a look at our <strong><font color="#000066" face="Times New Roman, Times, serif">SILENT 
  TIMER</font>&#8482;</strong> shots.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><em>Click on the 
  images to see a close up and description.</em></strong></font></p>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
  <?
  		$i=1;
		while($row = mysql_fetch_array($result))
		{
			$Image = $row[Name];
			$ID = $row[GalleryID];
			$Alt = $row[Title] . " - " . $row[Description];
			
			$array[$i][0] = $Image;
			$array[$i][1] = $ID;
			$array[$i][2] = $Alt;
			
			$i++;
		}
		
		$j=1;
		while($j <= $NumPics)
		{
  ?>
  <tr> 
    <td><? if($array[$j][1]!=""){?>
      <div align="center"><a href="big.php?pic=<? echo $array[$j][1];?>"><img src="pics/small/<? echo $array[$j][0];?>" alt="<? echo $array[$j][2];?>" width="200" height="150" border="1"></a></div>
      <? }?></td>
	<td><? if($array[$j+1][1]!=""){?>
      <div align="center"><a href="big.php?pic=<? echo $array[$j+1][1];?>"><img src="pics/small/<? echo $array[$j+1][0];?>" alt="<? echo $array[$j+1][2];?>" width="200" height="150" border="1"></a></div>
      <? }?></td>
	<td><? if($array[$j+2][1]!=""){?>
      <div align="center"><a href="big.php?pic=<? echo $array[$j+2][1];?>"><img src="pics/small/<? echo $array[$j+2][0];?>" alt="<? echo $array[$j+2][2];?>" width="200" height="150" border="1"></a></div>
      <? }?></td>
  </tr>
  <?
  			$j=$j+3;
		}
		
		mysql_close($link);
  ?>
  
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
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
