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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>GRE Score</strong></font></p>
<p> <font size="2" face="Arial, Helvetica, sans-serif">GRE scores are valid for 
  five years. It&#8217;s best if you take the exam as close to your undergraduate 
  years as possible so it will be easier to retain information. However, if you 
  don&#8217;t think you&#8217;ll be returning to grad school within five years, 
  you might as well wait until you&#8217;re within that time frame.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Scoring is a little bit 
  different for both forms of the GRE general test and the GRE subject tests. 
  Both versions of the quantitative and verbal sections are scored on a scale 
  from 200 to 800, while the analytical writing section is scored on a six point 
  scale. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The paper-based test GRE 
  scores are determined by the sum of correct answers, and there is no penalty 
  for incorrect or blank answers. Candidates are free to skip questions and return 
  to them later. Because of this testing freedom, experts suggest answering all 
  questions and not leaving any unanswered. However, don&#8217;t waste your time 
  on a difficult question just to answer it. Answer the easiest questions first, 
  then return to the more difficult ones later.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Computer-adaptive test scores 
  are determined by the number of questions answered, the number of correct and 
  incorrect questions answered and the level of difficulty in questions. You may 
  not go back and change an answer once you&#8217;ve submitted it because the 
  computer scores the question immediately. Random guessing can also lower your 
  GRE scores considerably because of the question pattern. Since questions must 
  be answered to proceed with the exam, you should eliminate as many answer choices 
  as possible to make an educated guess if the answer is not obvious. It is highly 
  recommended to spend more time on the early questions to make sure you get as 
  many of them correct as possible. If sections aren&#8217;t finished on the exam, 
  your GRE score depends on the number of questions answered. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The GRE subject test also 
  has its own scoring system. The number of correct answers minus one-fourth the 
  number of incorrect answers determines the final score. Like the computer-adaptive 
  GRE general test, it&#8217;s not very likely that random guessing will significantly 
  increase your score. As a matter of fact, it could very well hurt your GRE subject 
  test score. If you can attempt to make an educated guess, go for it. Otherwise, 
  answer all the easiest questions first and return to the others later.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">You and your designated
    recipients will be sent official GRE scores 10 to 15 days after the computer-based
    test, four to six weeks after the GRE subject tests and six weeks after the
    paper-based exam. You are able to see unofficial GRE scores immediately following
    the computer-based test at the test center, but the score will not yet include
  your writing section because of the delayed scoring process for that section.</font></p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>