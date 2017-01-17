<?
//security for page
session_start();

$PageTitle = "Overview of the PSAT";

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
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../../../order/index.php?t=PSAT">PSAT 
  Timer</a> | <a href="sat_practice_test.php">SAT Practice Tests</a> | &nbsp;<a href="../../../testhome/sat.php">SAT 
  Test</a></strong></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>The PSAT Test</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Taking the PSAT is your 
  fist step in preparing for the actual SAT test. Though designed to be slightly 
  easier than the <a href="index.php">SAT</a>, the PSAT will familiarize you with 
  SAT-type questions and give you firsthand experience taking a standardized test 
  with a strict time limit. The PSAT totals two hours 10 minutes and measures 
  writing skills, critical reading skills, and math problem-solving skills. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">As a preliminary qualifying
    exam, the PSAT is not used to determine college admission. Scores are not
    sent to colleges, but are used instead to signal skill areas that need improvement.
    PSAT performance can also gauge a student's relative competitiveness with
  other college applicants. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"> PSAT/NMSQT stands for Preliminary 
  SAT/National Merit Scholarship Qualifying Test. In addition to its other benefits, 
  the PSAT gives students a chance to be qualified for scholarship and recognition 
  programs. If you succeed in scoring high enough, you may become a <a href="http://www.nationalmerit.org/" target="_blank">National 
  Merit Scholar</a>. With this achievement on your resume, your chances of earning 
  scholarship money for school increase significantly.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Our advice: take the PSAT 
  seriously. Prepare as if you were taking the actual SAT and study accordingly. 
  Since the PSAT is often the first strictly timed standardized test that students 
  take, make sure to practice under timed conditions to improve your pacing. <br>
  <br>
  </font><font color="#000066" size="2"><strong>THE SILENT TIMER&#8482;</strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
  is an excellent tool to help those beginning to hone their pacing skills for 
  the first time. Remember, this is your time to begin getting ready for the SAT 
  and your opportunity to <a href="http://www.nationalmerit.org/nmsp.php" target="_blank">earn 
  a lot of money for college</a>. Invest in your future, <a href="https://secure.silenttimer.com/product.php">buy 
  </a></font><a href="https://secure.silenttimer.com/product.php"><font color="#000066" size="2"><strong>THE 
  SILENT TIMER&#8482;</strong></font></a><font size="2" face="Arial, Helvetica, sans-serif"> 
  today. </font></p>
<p><br>
  <strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links</font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.collegeboard.com/student/testing/psat/prep.html" target="_blank">CollegeBoard.com</a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.act-sat-prep.com/psat1x.html" target="_blank"><br>
  About the PSAT and Tips</a><br>
  <a href="http://www.petersons.com/testprepchannel/psat_free.asp?sponsor=3776" target="_blank">FREE 
  Practice PSAT</a><br>
  <a href="http://www.ivybound.net/FHpsat.html" target="_blank">FREE PSAT Prep</a><br>
  <a href="http://www.testprepreview.com/psat_practice.htm" target="_blank">PSAT 
  Review</a><br>
  </font><font size="2" face="Arial, Helvetica, sans-serif"><strong> <br>
  Additional Search Help for PSAT Test<br>
  </strong>Click below to search for &quot;PSAT test&quot; in the following search 
  engines: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.google.com/search?hl=en&lr=&ie=UTF-8&oe=UTF-8&q=PSAT%2Btest" target="_blank">Google</a> 
  | <a href="http://search.msn.com/results.aspx?q=PSAT%2Btest&FORM=SMCRT" target="_blank">MSN</a> 
  | <a href="http://altavista.com/web/results?q=PSAT%2Btest&kgs=0&kls=1&avkw=aapt" target="_blank">Altavista</a> 
  | <a href="http://search.yahoo.com/search?p=PSAT%2Btest&ei=UTF-8&fr=fp-top&n=20&fl=0&x=wrt" target="_blank">Yahoo</a> 
  | <a href="http://search.aol.com/aolcom/search?invocationType=topsearchbox./aolcom/jsp/search.jsp&query=PSAT%2Btest&x=29&y=14" target="_blank">AOL</a> 
  | <a href="http://web.ask.com/web?q=PSAT%2Btest&qsrc=1" target="_blank">Ask 
  Jeeves</a></font></p>
<p> 
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
