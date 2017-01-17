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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>GMAT Score</strong></font></p>
<p> <font size="2" face="Arial, Helvetica, sans-serif">GMAT scores are determined 
  by the number of questions answered, the number of correct and incorrect questions 
  answered and the level of difficulty in questions. Each GMAT exam also has trial 
  questions being used for pretesting that don&#8217;t count toward your final 
  score. These trial questions are not labeled and are scattered throughout the 
  test.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Because the GMAT test is 
  a computer-adaptive test, it has unique rules that don&#8217;t apply to other 
  standardized tests. For example, you may not go back and change an answer once 
  you&#8217;ve submitted it because the computer scores the question immediately. 
  Random guessing can also lower your GMAT scores considerably because of the 
  question pattern. Since questions must be answered to proceed with the exam, 
  you should eliminate as many answer choices as possible to make an educated 
  guess if the answer is not obvious. Experts suggest spending more time on the 
  early questions to make sure you correctly answer as many of them as possible. 
  If sections aren&#8217;t finished on the exam, your GMAT score depends on the 
  number of questions answered. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">GMAT scores range from 200 
  to 800, and two-thirds of test takers score between 400 and 600. The verbal 
  and quantitative scores range from 0 to 60. Rarely do examinees score lower 
  than a 9 or higher than a 44 on the verbal section and lower than a 7 or higher 
  than a 50 on the quantitative section. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The Analytical Writing Assessment 
  score is an average of two ratings given to both analyses and can range from 
  zero to six in half-point intervals. This average is computed separately and 
  doesn&#8217;t effect the verbal, quantitative or total scores. Those of you 
  who have a difficult time waiting to receive scores should be glad to hear that 
  GMAT scores are available immediately following the test. The formal score report 
  will be mailed to you and your selected score report recipients about two weeks 
  after the test date. Remember that exam scores are kept on file for 20 years, 
  but most schools will not accept them if they are older than five years.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">GMAT scores may be cancelled, 
  but this must be done at the testing center.</font></p>
<p><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Relevant 
  Links</font></strong><br>
  <br>
  <a href="http://www.infozee.com/indiatimes/channels/mba/articles/gmat-score.htm" target="_blank"><font size="2" face="Arial, Helvetica, sans-serif">GMAT 
  Score - How important is it? </font></a><br>
  <font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.studentdoc.com/gmat-scores.html" target="_blank">Are 
  Your GMAT Scores Competitive? </a></font><br>
  <a href="http://www.accepted.com/mba/gmatAdmissions.aspx" target="_blank"><font size="2" face="Arial, Helvetica, sans-serif">The 
  GMAT in MBA Admissions: Fact and Fiction</font></a><br>
  <br>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
