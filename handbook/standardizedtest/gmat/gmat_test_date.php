<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../../../include/dbinfo.php";

// has top header in it.
require "../../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../../../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> <strong><font color="#003399" size="4" face="Times New Roman, Times, serif"> 
</font></strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font size="4" face="Times New Roman, Times, serif"><font size="2">THE 
SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></font><font color="#000000" size="2"> 
<em>Handbook</em></font></strong></font> 
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>GMAT Test Date</strong></font></p>
<p> <font size="2" face="Arial, Helvetica, sans-serif">Unlike other standardized 
  tests, there are no specified GMAT test dates. Interested individuals simply 
  choose a test center and schedule an appointment. <a href="gmat_registration.php">Learn 
  more here</a>. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Be sure to test early enough 
  to meet your choice schools&#8217; application deadlines. Many candidates test 
  in October and November, especially on weekends, so register early if you foresee 
  a problem. If you don&#8217;t earn your desired score on the GMAT exam the first 
  time around, be aware that, on average, test takers who took the exam twice 
  increased their score by 30 points.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Candidates are also only 
  allowed to take the GMAT test once a month, so keep that in mind when <a href="gmat_practice.php" target="_blank">preparing 
  for the exam</a>. </font></p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>