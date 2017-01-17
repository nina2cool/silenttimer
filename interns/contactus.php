<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

			
<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Contact 
  Us </font></strong></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">If you have 
  any questions or comments, please contact the Internship Coordinator.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Christina 
  Dilly</strong><br>
  Internship Coordinator<br>
  P.O. Box 49163<br>
  Austin, TX 78726</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">800-552-0325<br>
  512-258-8668</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="mailto:jobs@silenttimer.com">jobs@silenttimer.com</a><br>
  <a href="mailto:nina@silenttimer.com">nina@silenttimer.com</a></font></p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>