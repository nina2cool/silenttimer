<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../../../include/dbinfo.php";
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
	


?><title>Test Prep Campaign</title>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Marketing
Campaign - Oct. 31 - Nov. 1, 2006 </strong></font></p>
<p>&nbsp;</p>
<p align="center"><a href="CompanyFile.php" target="_blank"><font size="2" face="Arial, Helvetica, sans-serif">Click here to open .csv file </font></a></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";
// has links that show up at the bottom in it - found in home management folder
require "../../../include/footerlinks.php";

// finishes security for page
}
else
{
?>

            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
