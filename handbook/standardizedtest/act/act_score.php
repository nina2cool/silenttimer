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
<em>Handbook</em></font></strong></font> <font size="2"></p> 
</font> 
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>ACT&reg; Score</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Within four to seven weeks 
  of the test date, ACT scores are mailed to students, their high school and designated 
  colleges. For an extra fee of $8, ACT scores can be viewed online 2 1/2 weeks 
  after the test date. The ACT score ranges from 1 to 36, 36 being the highest 
  attainable score.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The ACT Score reflects the 
  number of questions answered correctly (raw score), converted into a scaled 
  score. No points are deducted for incorrect answers, so experts recommend that 
  students answer every question they can on the exam. This doesn&#8217;t mean 
  students need to rush through the ACT test simply to get every question answered; 
  pacing yourself is still crucial. It does mean, however, that you should try 
  to answer all the &#8220;easy&#8221; questions first, returning to the more 
  difficult ones afterwards.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">But technology isn&#8217;t 
  perfect. Some room must be left for error when scoring, hence the standard error 
  of measurement. This number was developed as a way to estimate the amount of 
  error in test scores. The standard error of measurement in individual sections 
  is two points for each section and one point for the composite score. You can 
  calculate the standard error of measurement by adding and subtracting these 
  numbers from your individual and composite scores to get your range of scores. 
  Confusing? Here's an example: If you scored 21 on the science section, your 
  accurate score for science lies between 19 and 23. If your composite score is 
  23, that means your final score lies between 22 and 24.<br>
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
                  