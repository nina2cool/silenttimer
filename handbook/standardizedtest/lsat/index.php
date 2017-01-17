<?
//security for page
session_start();

$PageTitle = "Overview of the LSAT";

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
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="<? echo $https;?>product.php?t=LSAT">LSAT 
  Timer</a> | <a href="lsat_practice_test.php">LSAT Practice Tests</a> | &nbsp;<a href="../../../testhome/lsat.php">LSAT 
  Test</a></strong></font></p>
<p><font color="#009900" size="2" face="Arial, Helvetica, sans-serif"><strong>&lt;&lt; Use
  the links to the left to learn more about the LSAT</strong></font></p>
<p><font size="5" face="Arial, Helvetica, sans-serif"><strong>The LSAT&reg; </strong></font></p>
<p> <font size="2" face="Arial, Helvetica, sans-serif"><a href="../../../testhome/lsat.php"><strong>The 
  LSAT</strong></a> is no joke. You thought the SAT to get into college was tough? 
  Wait until you take the <strong>LSAT</strong> to get into law school. Not to 
  frighten you, but deciding to go to law school is a serious decision, and the 
  LSAT is one way to weed out those who take the matter lightly. The life of Ally 
  McBeal isn&#8217;t exactly what becoming a lawyer is all about.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Every American Bar Association- 
  approved law school requires <strong>the LSAT </strong>for admission. If you 
  want to go to law school in the United States, you must take the LSAT. It is 
  a required component of the application process, and a crucial one. Most colleges 
  weigh the <strong>LSAT</strong> as much as your undergraduate GPA, if not more. 
  This four hour, multiple choice test is considered as important as four years 
  of classes and studying at your undergraduate institution! No pressure, though, 
  right? Relax-- visit <a href="lsat_test_prep.php"><strong>LSAT Test Prep</strong></a> 
  to get preparation tips.</font></p>
<p><font color="#003399" face="Arial, Helvetica, sans-serif"><strong>About the Test</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The <strong>LSAT</strong> 
  is a 101 question test with five multiple choice sections. The sixth section, 
  the essay portion, is not scored but is sent to the various colleges you apply 
  to. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The <strong>LSAT</strong> 
  consists of two logical reasoning sections, one reading comprehension section, 
  one logic games section and one unscored experimental section, which can be 
  any of the previously mentioned sections. The sixth section is the unscored 
  essay portion. The five multiple choice sections are each 35 minutes long, and 
  the essay portion is 30 minutes long.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">But don&#8217;t expect to 
  finish the <a href="../../../testhome/lsat.php"><strong>LSAT</strong></a> on 
  time. The test is designed so that the average person cannot comfortably complete 
  all questions in the allotted time period. So what can you do to make certain 
  you perform your best on the <strong>LSAT test</strong>? Practice improving 
  your pacing skills with <strong><font color="#000066" face="Times New Roman, Times, serif"><a href="lsat_st.php">THE 
  SILENT TIMER</a></font><a href="lsat_st.php">&#8482;</a></strong>. It is imperative 
  that test takers have the best pacing tools available in order to maximize their 
  scores. This is why we created a timer for practice AND a timer for test day. 
  <a href="http://www.silenttimer.com/testhome/lsat_test.php">Find out more about 
  The Silent Timer&#8482; LSAT Package HERE.</a></font></p>
<p><br>
  <strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links</font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.lsac.org" target="_blank">Law 
  School Admission Council</a><br>
  <a href="http://education.yahoo.com/college/essentials/practice_tests/lsat/" target="_blank">LSAT 
  Test Center at Yahoo</a><br>
  <a href="http://info.gradschools.com/review/lsat/faq.html" target="_blank">LSAT 
  FAQ at GradSchools.com</a><br>
  <a href="http://www.allaboutgradschool.com/netguide/test/lsat.htm" target="_blank">All 
  About Grad School.com</a><br>
  <a href="http://www.princetonreview.com/law/testprep/testprep.asp?TPRPAGE=265&TYPE=LSAT" target="_blank">Dispelling 
  the Myths about the LSAT </a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Additonal Search 
  Help for LSAT Test<br>
  </strong>Click below to search for &quot;LSAT test&quot; in the following search 
  engines: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.google.com/search?hl=en&lr=&ie=UTF-8&oe=UTF-8&q=LSAT%2Btest" target="_blank">Google</a> 
  | <a href="http://search.msn.com/results.aspx?q=LSAT%2Btest&FORM=SMCRT" target="_blank">MSN</a> 
  | <a href="http://altavista.com/web/results?q=LSAT%2Btest&kgs=0&kls=1&avkw=aapt" target="_blank">Altavista</a> 
  | <a href="http://search.yahoo.com/search?p=LSAT%2Btest&ei=UTF-8&fr=fp-top&n=20&fl=0&x=wrt" target="_blank">Yahoo</a> 
  | <a href="http://search.aol.com/aolcom/search?invocationType=topsearchbox./aolcom/jsp/search.jsp&query=LSAT%2Btest&x=29&y=14" target="_blank">AOL</a> 
  | <a href="http://web.ask.com/web?q=LSAT%2Btest&qsrc=1" target="_blank">Ask 
  Jeeves</a></font></p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>