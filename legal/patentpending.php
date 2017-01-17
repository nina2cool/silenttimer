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

	<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Patent 
	  Pending</strong></font></p>
	<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">The 
	  Silent Timer</font></strong> is Patent Pending. No production of a Standardized 
	  Testing Timer is allowed without prior consent from Silent Technology LLC.</font></p>
	<p align="left">&nbsp;</p>
	
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td background="../timer/pics/behind_proto_pic.jpg"> 
      <div align="center"><img src="../timer/pics/ST_right_angle_on_black.jpg" width="240" height="219"></div></td>
  </tr>
</table>
<p align="left">&nbsp;</p>
	<p align="left">&nbsp;</p>
	
<p align="left">
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>
</p>
	