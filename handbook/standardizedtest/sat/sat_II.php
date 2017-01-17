<?
//security for page
session_start();

$PageTitle = "Overview of the SAT II's";

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
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../../../order/index.php?t=SATII">SAT 
  II Timer</a> | <a href="sat_practice_test.php">SAT Practice Tests</a> | &nbsp;<a href="../../../testhome/sat.php">SAT 
  Test</a></strong></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>The SAT II Subject 
  Test*</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.CollegeBoard.com" target="_blank">Official 
  SAT II Web Site</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">SAT II tests are one-hour 
  subject tests in English, math, history, science and language designed to measure 
  students&#8217; knowledge of a particular subject matter. They are different 
  from the SAT test in that the SAT test evaluates students&#8217; reasoning skills 
  rather than intelligence, whereas SAT II tests evaluate learned knowledge.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Because the SAT II tests 
  are not required by all schools, students should check to see which (if any) 
  SAT II Subject Tests are required by their desired college(s). The College Board 
  recommends that students plan their high school curriculum around potential 
  colleges and take the SAT II tests almost immediately following particular courses, 
  even as freshmen and sophomores. This way, students will be able to recall information 
  more easily. <br>
  <br>
  Keep in mind, however, that even colleges that don't require Subject Tests for 
  admission may still look at student's scores to gain more insight about their 
  academic background.</font></p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links</font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.collegeboard.com" target="_blank">CollegeBoard.com</a><a href="http://www.4tests.com/exams/examdetail.asp?eid=9" target="_blank"><br>
  Free Practice SAT II Tests<br>
  </a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.ivywest.com/satiifaq.htm" target="_blank">SAT 
  II Frequently Asked Questions</a></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
  <a href="http://www.collegeboard.com/student/testing/sat/lc_two/tipsTwo.html" target="_blank">SAT 
  II Tips from College Board</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><em>*SAT II is a registered 
  trademark of the College Entrance Examination Board which was not involved in 
  the production of, and does not endorse, this product.</em><br>
  <strong><br>
  Additional Search Help for SAT II Test<br>
  </strong>Click below to search for &quot;SAT II test&quot; in the following 
  search engines: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.google.com/search?hl=en&lr=&ie=UTF-8&oe=UTF-8&q=SAT%2BII%2Btest" target="_blank">Google</a> 
  | <a href="http://search.msn.com/results.aspx?q=SAT%2BII%2Btest&FORM=SMCRT" target="_blank">MSN</a> 
  | <a href="http://altavista.com/web/results?q=SAT%2BII%2Btest&kgs=0&kls=1&avkw=aapt" target="_blank">Altavista</a> 
  | <a href="http://search.yahoo.com/search?p=SAT%2BII%2Btest&ei=UTF-8&fr=fp-top&n=20&fl=0&x=wrt" target="_blank">Yahoo</a> 
  | <a href="http://search.aol.com/aolcom/search?invocationType=topsearchbox./aolcom/jsp/search.jsp&query=SAT%2BII%2Btest&x=29&y=14" target="_blank">AOL</a> 
  | <a href="http://web.ask.com/web?q=SAT%2BII%2Btest&qsrc=1" target="_blank">Ask 
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
