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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>GMAT Preparation</strong></font></p>
<p> <font size="2" face="Arial, Helvetica, sans-serif">Since the boom of the Internet, 
  almost everything has moved to the computer&#8212;even the GMAT test. Needless 
  to say, one of the necessary study skills you will need to master in your GMAT 
  preparation will be the ability to use a computer. Don&#8217;t stress if the 
  only thing you know about a computer is how to turn it on-- you don&#8217;t 
  need to be the next Bill Gates to take the test. Simply familiarize yourself 
  with the mechanics of taking a computer-adaptive test. Look into getting the 
  <a href="http://www.mba.com/mba/TaketheGMAT/LimitedSummerTesting/LimitedSummerTest_related/FreeGMATPrepTestPreparationSoftware.htm" target="_blank">GMATPrep 
  software</a>, which includes free GMAT tutorials. It&#8217;s free! This software 
  will also better help you understand the test format. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><em>Review sample 
  questions and take practice tests</em></strong>. Learn more about <a href="gmat_practice_test.php">GMAT 
  practice tests</a>. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Because of different degree 
  requirements, some of you may have taken several college math courses, while 
  some of you may have not taken any at all. If it&#8217;s been a while since 
  you&#8217;ve taken a math class, you should review basic math skills throughout 
  your GMAT practice.<br>
  <br>
  Experts recommend that you start your GMAT preparation at least four weeks before 
  the test date. If you begin studying too far in advance, you could easily forget 
  the material. Cramming information at the last minute, however, will have the 
  same effect. It is highly suggested that candidates review and study one section 
  of the GMAT test at a time. This way, you can better focus on improving that 
  section and work toward raising your score one section at a time. Studying all 
  sections at once can be confusing and overwhelming.<br>
  <br>
  For additional help, look into a prep class. </font><font size="2" face="Arial, Helvetica, sans-serif"><a href="gmat_prep.php"> 
  There are several GMAT prep courses available</a>.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">As the test date approaches, 
  try to simulate the testing conditions as closely as possible. For example, 
  reduce any possible distractions, sit at a desk (rather than your bed or the 
  sofa) and <a href="gmat_st.php">time yourself</a>. Ideally, this approach should 
  help you feel more comfortable during the actual GMAT exam. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">During the actual test, 
  take advantage of the five-minute breaks available after sections two and three. 
  Relax your mind and take a breather.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Thorough GMAT preparation 
  is essential in completing the GMAT test successfully. With successful preparation, 
  your practice GMAT scores should accurately reflect how well you are capable 
  of performing on the exam.</font></p>
<p>&nbsp;</p>
                  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>