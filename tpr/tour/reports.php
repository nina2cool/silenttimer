<?
//security for page
session_start();
//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

// has http variable in it to populate links on page.
require "../../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
			
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><font size="3">The 
  Princeton Review<font color="#000000"> Partner Program</font></font><font color="#000000"><br>
  <em><font size="3">Quick Tour</font></em></font></strong></font>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
  <tr> 
    <td align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr> 
          <td width="50%"><font size="4" face="Arial, Helvetica, sans-serif"><a href="deadlines.php">&lt; 
            Previous</a></font></td>
          <td width="50%"> <div align="right"><font size="4" face="Arial, Helvetica, sans-serif"> 
              </font></div></td>
        </tr>
      </table>
      <p><font size="4" face="Arial, Helvetica, sans-serif"><strong><font size="5">View 
        Sales Reports<font size="2"><br>
        <font size="3">Check how much money your office has made from timer sales</font> 
        </font></font></strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000000"><strong>&gt;</strong> 
        </font>When you log in, click on: &quot;Reports&quot;. You will then have 
        the ability to see how many timers have been purchased, and how much money 
        your office has made during certain date periods.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&nbsp;<img src="pics/reports.jpg" width="196" height="108"></strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt;<font size="3"> 
        </font></strong>You may change your reporting period to see sales for 
        the past day, week, month, year, or all.</font></p>
      <p><font size="3" face="Arial, Helvetica, sans-serif"><a href="5.php">&lt; 
        Return to web site list</a><br>
        </font></p>
      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr> 
          <td width="50%"><font size="4" face="Arial, Helvetica, sans-serif"><a href="deadlines.php">&lt; 
            Previous</a></font></td>
          <td width="50%"> <div align="right"><font size="4" face="Arial, Helvetica, sans-serif"> 
              </font></div></td>
        </tr>
      </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>
</p>
