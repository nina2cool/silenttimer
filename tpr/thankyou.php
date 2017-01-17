<?
//start session
session_start();
//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> <font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Thank You!</strong></font>
<p><font size="2" face="Arial, Helvetica, sans-serif">You have completed your 
  office sign up process. Your confirmation is being emailed to you now. Your 
  email will contain your office code and password. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">You may immediately <a href="login.php">login 
  to your account</a> and download office fliers. We will contact you soon to 
  let you know how your students can order and receive free shipping.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Your office demo will arrive 
  soon!</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Please call 512-542-9981 
  with any questions you may have.</font></p>
<p>&nbsp;</p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><em><font color="#333333">The 
  Silent Timer Team</font></em></strong><br>
  <strong>Silent Technology LLC</strong><br>
  512-542-9981 </font></p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
            <p align="center">&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>