<?
//security for page
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
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong> 
  Thank you! </strong></font>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>We have sent your
      message to your friends - it will arrive shortly. </strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">If you would like
      to send more emails, <a href="index.php">please do so</a>! We look forward
      to serving your friends with the high level of service all students
      deserve.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">If your friend says he/she
    did not receive an email, have them check their Junk Mail or Spam folders.
    It may have gotten filtered out. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">If you have not yet purchased
    your timer, <a href="../product.php">you can order here</a>. Thank you again.</font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>
