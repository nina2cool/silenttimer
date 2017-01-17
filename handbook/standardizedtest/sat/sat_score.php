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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>SAT Score</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.CollegeBoard.com" target="_blank">Official 
  SAT Web Site</a></font></p>
<p><font size='2' face='Arial, Helvetica, sans-serif'>The SAT score ranges from 
  600-2400. You receive a score for each major section: Critical Reading, Math, 
  and Writing. The scores for Critical Reading and Math sections are calculated 
  as follows:<br>
  <br>
  - You earn 1 point for each correct answer<br>
  - You lose 1/4 point for each incorrect answer (with the exception of Grid-ins, 
  which are not penalized)<br>
  - You don't lose or gain points for skipped questions<br>
  </font><font size='2' face='Arial, Helvetica, sans-serif'><br>
  Your raw SAT score = <font color="#FF0000"># points earned from correct answers 
  - # points lost from incorrect answers</font>. This score is then scaled into 
  a curve to compare it to other students' scores and make sure it is comparable 
  to those of earlier SAT versions. <br>
  <br>
  For the Writing section, multiple choice questions are scored as described above. 
  The SAT essay, however, receives a grade between 0 and 12, and counts as 1/3 
  of the Writing scaled score.</font></p>
<p><font size='2' face='Arial, Helvetica, sans-serif'> The individual scores for 
  each section are added together to give your final score.</font></p>
<p><font size='2' face='Arial, Helvetica, sans-serif'>For example, a score of 
  600 on the critical reading section, 550 on the math section, and 710 on the 
  writing section, equals a final score of 1860.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">There is no limit to the 
  number of times you can take the SAT. In fact, it is recommended that you take 
  it at least twice. Studies show that 55 percent of students that retake the 
  test increase their SAT score. Even better news is that colleges will generally 
  use your highest score when reviewing applications. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Still confused? <a href="http://www.collegeboard.com/student/testing/sat/scores.html" target="_blank">Read 
  more about scores here</a>. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Additional Links</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.cnn.com/2003/fyi/news/08/26/learning.sat.scores/index.html">SAT 
  scores highest in 36 years!</a><br>
  <a href="http://www.princetonreview.com/college/testprep/testprep.asp?TPRPAGE=267&TYPE=NEW-SAT-LEARN" target="_blank">Dispelling 
  the Myths about the SAT</a><br>
  <a href="http://www.princetonreview.com/college/testprep/testprep.asp?TPRPAGE=295&type=ACT-LEARN" target="_blank">Which 
  Colleges Can I get into with my SAT Score?</a><br>
  <a href="http://www.princetonreview.com.tw/college/chart.htm" target="_blank">How 
  your NEW SAT score compares to an old SAT score</a></font></p>
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
