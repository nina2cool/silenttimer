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
			
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><font size="3">The 
  Princeton Review<font color="#000000"> Partner Program</font></font><font color="#000000"><br>
  <em><font size="3">Quick Tour </font></em></font></strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
  <tr> 
    <td align="left" valign="top"> <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><img src="../pics/tpr.gif" width="154" height="85" class="right"></strong>Welcome 
        to The Silent Timer TPR Quick Tour. Here we will go step by step through 
        your office sign up and student ordering process. Please call us at 512-542-9981 
        if you have any questions.</font></p>
      <p><font size="4" face="Arial, Helvetica, sans-serif"><strong><font size="5">Step 
        One</font><font size="2"><br>
        </font></strong></font><font size="3" face="Arial, Helvetica, sans-serif"><strong>Sign 
        your TPR office up with a <font face="Times New Roman, Times, serif">SILENT 
        TIMER</font>&#8482; account.</strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">It is extremely simple 
        to get started. Someone in your office visits our <a href="http://www.silenttimer.com/tpr/signup.php" target="_blank">sign 
        up page</a> and fills out your office information.</font></p>
      <p><img src="pics/signup.jpg" width="573" height="250"></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">After entering your 
        office information, the system will assign you an office code equal to 
        &quot;tpr&quot; plus the first three letters of your city name. For example, 
        if your office was located in Austin, TX, your office code would be &quot;<strong>tpraus</strong>&quot;.</font></p>
      <table width="191" border="0" align="right" cellpadding="4" cellspacing="0">
        <tr> 
          <td><div align="right"><font size="4" face="Arial, Helvetica, sans-serif"><a href="2.php">Next 
              &gt;</a></font></div></td>
        </tr>
      </table>
      
    </td>
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
