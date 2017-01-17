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

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>


<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; 
  Tracking Number Information</strong></font> </p>
</p>
<font size="2" face="Arial, Helvetica, sans-serif">View Tracking Numbers for the 
last:</font>
<ul>
  <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="TrackViewDay.php">Today</a></font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="TrackViewYesterday.php">Yesterday</a></font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="TrackSearch.php">Search</a></font></li>
</ul>
</p>
            <p>&nbsp;</p>
            <p> </p>
              <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.

require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
           
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
