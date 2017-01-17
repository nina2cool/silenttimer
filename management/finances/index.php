<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

?>
<TITLE>ST Finances</TITLE>	
<p><font color="#000099" size="5" face="Arial, Helvetica, sans-serif"><strong><font color="#000000">Manage
Silent Timer Finances </font></strong></font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><font color="#000099" size="5" face="Arial, Helvetica, sans-serif"><strong><br>
  </strong></font>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";
// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";


}
else
{
	header("location: index.php"); //redirects user via PHP to this page... better than meta refresh...
}
?>
</p>
