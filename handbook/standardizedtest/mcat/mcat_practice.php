<?
//security for page
session_start();

$PageTitle = "Preparing for the MCAT";

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
SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></font><font size="2"> 
<em><font color="#000000">Handbook</font></em></font></strong></font> 
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../../../order/index.php?t=MCAT">MCAT 
  Timer</a> | <a href="mcat_practice_test.php">MCAT Practice Tests</a> | &nbsp;<a href="../../../testhome/mcat.php">MCAT 
  Test</a></strong></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>MCAT Preparation 
  </strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Medical school candidates 
  sure must have the commitment to be a health professional if they have the patience 
  to take a multiple choice test for nine and a half hours. The normal work day 
  isn&#8217;t even that long. This is certainly no test for an undecided candidate.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Probably the first thing 
  serious medical school candidates should do in their MCAT preparation process 
  is to get a copy of <em>Medical School Admission Requirements</em> for specific 
  MCAT requirements. Also look at the <em>MCAT Student Manual</em>, which is <a href="http://www.aamc.org/students/mcat/studentmanual/start.htm" target="_blank">available 
  online</a>. This handbook describes MCAT content, question types and test preparation 
  skills helpful in taking the exam.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">While on the <a href="http://www.aamc.org/students/mcat/" target="_blank">Association 
  of American Medical Colleges Web site</a>, take the time to review all of the 
  MCAT test information available on their site. Their Web site is a great place 
  to start in preparing for the MCAT, especially since they develop the MCAT test 
  in the first place.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Review all relevant course 
  material notes and textbooks from your undergraduate courses. Because candidates 
  aren&#8217;t expected to know in-depth material, it&#8217;s not necessarily 
  helpful to take advanced science courses to raise your scores. Experts do recommend 
  taking a wide variety of classes in humanities, social sciences and natural 
  sciences, however. Your notes and textbooks should be a primary tool when preparing 
  for the MCAT test.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">To thoroughly prepare yourself 
  for the writing sample of the MCAT test, look into taking some extensive writing 
  courses. Don&#8217;t solely depend on high school English classes to get you
  through this portion of the test. Contact a freelance proofreader today to ensure a high score on this portion of the exam.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Take practice MCAT
      tests.</strong>  What better way to do MCAT preparation than to simulate
      the actual test? <a href="mcat_practice_test.php">Learn 
  more here</a>. Practicing for the MCAT under timed conditions is the best way
  to prepare yourself for the time constraints on test day. </font></p>
<p>&nbsp;</p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links</font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.aamc.org/students/mcat/start.htm" target="_blank">Medical 
  College Admission Test Web site</a><br>
  <a href="http://novapress.net/mcat/" target="_blank">Nova's Test Prep - MCAT</a><a href="http://www.berkeley-review.com/" target="_blank"><br>
  The Berkeley Review<br>
  </a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.examkrackers.com/" target="_blank">Examkrackers 
  MCAT Prep<br>
  </a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.oxfordseminars.com/Pages/MCAT/mcat_dates.htm" target="_blank">MCAT 
  Prep in Canada</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Additional Search 
  Help for MCAT Preparation<br>
  </strong>Click below to search for &quot;MCAT preparation&quot; in the following 
search engines: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.google.com/search?hl=en&lr=&ie=UTF-8&oe=UTF-8&q=MCAT%2Bpreparation" target="_blank">Google</a> 
  | <a href="http://search.msn.com/results.aspx?q=MCAT%2Bpreparation&FORM=SMCRT" target="_blank">MSN</a> 
  | <a href="http://altavista.com/web/results?q=MCAT%2Bpreparation&kgs=0&kls=1&avkw=aapt" target="_blank">Altavista</a> 
  | <a href="http://search.yahoo.com/search?p=MCAT%2Bpreparation&ei=UTF-8&fr=fp-top&n=20&fl=0&x=wrt" target="_blank">Yahoo</a> 
  | <a href="http://search.aol.com/aolcom/search?invocationType=topsearchbox./aolcom/jsp/search.jsp&query=MCAT%2Bpreparation&x=29&y=14" target="_blank">AOL</a> 
  | <a href="http://web.ask.com/web?q=MCAT%2Bpreparation&qsrc=1" target="_blank">Ask 
  Jeeves</a></font></p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>