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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>GMAT Prep Course</strong></font></p>
<p> <font size="2" face="Arial, Helvetica, sans-serif">Like with the <a href="../sat/">SAT 
  test</a>, a GMAT prep course isn&#8217;t necessarily a requirement to do well 
  on the exam. The Graduate Management Admissions Council provides a number of 
  free or low-cost study aids <a href="http://www.mba.com/mba/takethegmat#toolstohelp" target="_blank">on 
  their Web site</a> to minimize the cost of preparing for and taking the GMAT 
  test.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">If a GMAT prep course is 
  still in the cards for you, there are highly regarded prep courses available 
  for you to look into. Check out <a href="http://princetonreview.com/mba/testPrep/" target="_blank">The 
  Princeton Review</a>, <a href="http://www.kaptest.com/repository/templates/Lev3InitDroplet.jhtml?_lev3Parent=/www/KapTest/docs/repository/content/Business/GMAT" target="_blank">Kaplan 
  Test Prep and Admissions</a>, <a href="http://www.800score.com" target="_blank">800score.com</a> 
  and <a href="http://www.veritasprep.com" target="_blank">Veritas Elite GMAT 
  Test Preparation</a>.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">GMAT prep courses offer 
  many services ranging from personal tutoring to online classes to classroom 
  courses. If you struggle with mastering study skills, a prep course may be the 
  best option for you. If you&#8217;re just looking to get more information on 
  the GMAT test, however, you can research other materials before enrolling in 
  a prep course. Some helpful resources are listed <a href="http://silenttimer.com/handbook/standardizedtest/gmat/gmat_practice_test.php">here</a>. 
  </font></p>
<p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
