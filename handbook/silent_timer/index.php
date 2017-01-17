<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> <strong><font color="#003399" size="4" face="Times New Roman, Times, serif"> 
</font></strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Times New Roman, Times, serif">THE
SILENT TIMER</font><font color="#000000" size="2"> <em>Handbook</em></font></strong></font> 
<p><font size="4" face="Times New Roman, Times, serif"><strong>THE SILENT TIMER<font face="Arial, Helvetica, sans-serif">&#8482;</font></strong></font> 
</p>
                  <p><font size="2" face="Arial, Helvetica, sans-serif">What this all comes down 
  to is getting into the school of your choice. That&#8217;s your ultimate goal, 
  and we&#8217;re here to help you reach it. After studying numerous tests, our 
  researchers have designed a tool <em><strong>proven to assist students in improving 
  their time management skills</strong></em>. In return, test scores are increased. 
  </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Without <a href="../timemanagement/index.php">time 
  management</a>, you won&#8217;t be able to utilize your study time the best 
  way possible or finish the actual test on time. Procrastination and poor prioritizing 
  will not earn you admission from your desired school.</font></p>
<p><font color="#000066" size="2" face="Times New Roman, Times, serif"><strong>THE 
  SILENT TIMER</strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
  is designed to help students pace themselves on any given test: <a href="../standardizedtest/other/juniorhigh_tests.php">junior 
  high tests</a>, <a href="../standardizedtest/other/highschool_tests.php">high 
  school tests</a>, <a href="../standardizedtest/other/college_tests.php">college 
  tests</a>, <a href="../standardizedtest/other/professional_tests.php">professional 
  tests</a>, the <a href="../standardizedtest/lsat/">LSAT</a>, <a href="../standardizedtest/act/">ACT</a>, 
  <a href="../standardizedtest/sat/">SAT</a>, <a href="../standardizedtest/sat/psat.php">PSAT</a>, 
  <a href="../standardizedtest/sat/sat_II.php">SAT II</a>, <a href="../standardizedtest/gre/">GRE</a>, 
  <a href="../standardizedtest/gmat/">GMAT</a>, <a href="../standardizedtest/mcat/">MCAT</a>, 
  <a href="../standardizedtest/bar/">BAR exam</a> and more. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Test anxiety can be the 
  terrible enemy of any test-taking student, but it <strong><font color="#006600" size="3"><em>can 
  be overcome</em></font></strong>. Allotting the right amount of time to every 
  test question when practicing and studying will help you feel more comfortable 
  when taking the actual exam. You will not only feel more prepared and confident 
  during the test, but you will also be able to <em><strong>focus on recalling 
  information instead of how much time you have left</strong></em>.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Most importantly, <strong><font color="#000066" face="Times New Roman, Times, serif">THE 
  SILENT TIMER</font></strong>&#8482; is the <em>only timer of its kind</em>. 
  Its unique testing features train you to develop pacing skills that can help 
  increase your score. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Let professionals take care 
  of you when it comes to testing. We&#8217;re here to help you get a degree from 
  the school you&#8217;ve been dreaming of attending since you first thought about 
  college.</font></p>
<p><font color="#0000FF" size="3" face="Arial, Helvetica, sans-serif"><strong><em>Timing matters&#8482;</em></strong></font></p>
<p>&nbsp;</p>
                  
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>