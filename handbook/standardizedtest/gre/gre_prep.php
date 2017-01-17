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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>GRE Test Prep</strong></font></p>
<p> <font size="2" face="Arial, Helvetica, sans-serif">Failing to prepare is preparing 
  to fail. GRE preparation should be taken very seriously. If you were one to 
  cram in undergrad school, better step into gear right away. This is no time 
  to wait until the last minute. Like most entrance exams, scores will lie high 
  in determining admission to grad school along with your GPA. If you had a low 
  GPA, your GRE scores will make or break your chances of admission. With adequate 
  GRE preparation, you will feel much better taking the test when you know you 
  fully trained yourself for the task.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">There are a slew of GRE 
  practice tests available. <a href="gre_practice_tests.php">Learn more here</a>.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">If you register for the
     computer-based test, <a href="http://www.gre.org/pprepdwnld.html" target="_blank">GRE
      POWERPREP software</a> is a great way to prepare for the online test -
      and it's free! Take full advantage of this training software that includes
      practice tests, interactive feedback, explanations of the test format and
      more. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">For more information about
  free GRE preparation materials, visit <a href="http://www.ets.org/portal/site/ets/menuitem.1488512ecfd5b8849a77b13bc3921509/?vgnextoid=302b66f22c6a5010VgnVCM10000022f95190RCRD&vgnextchannel=d687e3b5f64f4010VgnVCM10000022f95190RCRD" target="_blank">Free
  General Test Preparation Materials</a>  on the ETS web site. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Also make sure to review 
  basic math skills in your GRE practice. As a liberal arts or social sciences 
  major, you might not have had many math courses in college, so grab a friend 
  or better yet, a tutor, to go over some of those skills with you. If you were 
  fortunate enough to have taken your share of math courses in your undergraduate 
  studies, review those course notes and any textbooks you may still have. Don&#8217;t 
  let your assumed knowledge get the better of you and skim over this portion 
  of the test.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">View the <a href="http://www.gre.org/issuetop.html" target="_blank">pool 
  of essay topics</a> available, <a href="http://www.gre.org/argutop.html" target="_blank">as 
  well as this link</a>, to practice the analytical writing section. Contact a 
  freelance proofreader
  today to ensure a high score on this portion of the exam.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The Educational Testing 
  Service offers an online writing practice service as well called <a href="http://www.ets.org/scoreitnow/" target="_blank">ScoreItNow!</a> 
  For $10 submit two essays and receive instant scores, feedback on grammar and 
  mechanics, etc.</font></p>
<p>&nbsp;</p>
<p> 
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
