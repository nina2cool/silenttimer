<?
//security for page
session_start();

$PageTitle = "Practicing for the LSAT";

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
<p align="left"><font size="5" face="Arial, Helvetica, sans-serif"><strong>LSAT
  Practice</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">It is essential that students 
  dedicate a great deal of time to practicing for the LSAT. Spend some time trying 
  out different strategies and find out what works best for <em><strong>you</strong></em>. 
  Some LSAT books, for example, may tell you to read the reading comprehension 
  passages quickly in order to increase your score. Depending on your reading 
  comprehension level, however, this may not be the best strategy for you. It 
  is very important to experiment with different approaches such as reading the 
  passages at a slower pace or summarizing them as you move along. Beginning your 
  LSAT practice early enough will give you the extra time to try these different 
  test-taking strategies and discover the one that takes advantage of your strengths 
  and addresses your weaknesses. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Regular practice can increase 
  your scores on all sections of the LSAT. In general, however, the section whose 
  scores show the greatest improvement is the logic games section. This is the 
  section that students generally find to be the most foreign and difficult. Don't 
  worry, though- you may be surprised at how much easier these sections become 
  after a just a few weeks of practice. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Our main advice: take <a href="lsat_practice_test.php">practice 
  test after practice test</a>, and you will feel much more comfortable when the 
  time comes to actually sit down at the testing center and take the real LSAT 
  exam. Make sure that at some point in your studying routine, you are taking 
  ACTUAL LSAT exams (from previous years) under ACTUAL timed conditions. </font></p>
                  
<p>&nbsp;</p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links</font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.lsac.org" target="_blank">Law 
  School Admission Council</a><br>
  <a href="http://www.collegejournal.com/exams/" target="_blank">College Journal 
  Free Practice Exams</a><br>
  <a href="http://www.kaptest.com/repository/templates/ArticleInitDroplet.jhtml?_relPath=/repository/content/Law/Our_Programs/Free_Services/LS_lsat_practiceLSAT.html" target="_blank">Kaplan 
  Practice Tests</a><br>
  <a href="http://testprep.princetonreview.com/selectFreeOnlineTest.asp" target="_blank">Princeton 
  Review Practice Tests<br>
  </a><a href="http://www.lsat-center.com/lsat-sample.html" target="_blank">The 
  LSAT Center - Free LSAT Practice Test</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Additonal Search 
  Help for LSAT Practice Test<br>
  </strong>Click below to search for &quot;LSAT Practice test&quot; in the following 
  search engines: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.google.com/search?hl=en&lr=&ie=UTF-8&oe=UTF-8&q=LSAT%2Bpractice%2Btest" target="_blank">Google</a> 
  | <a href="http://search.msn.com/results.aspx?q=LSAT%2Bpractice%2Btest&FORM=SMCRT" target="_blank">MSN</a> 
  | <a href="http://altavista.com/web/results?q=LSAT%2Bpractice%2Btest&kgs=0&kls=1&avkw=aapt" target="_blank">Altavista</a> 
  | <a href="http://search.yahoo.com/search?p=LSAT%2Bpractice%2Btest&ei=UTF-8&fr=fp-top&n=20&fl=0&x=wrt" target="_blank">Yahoo</a> 
  | <a href="http://search.aol.com/aolcom/search?invocationType=topsearchbox./aolcom/jsp/search.jsp&query=LSAT%2Bpractice%2Btest&x=29&y=14" target="_blank">AOL</a> 
  | <a href="http://web.ask.com/web?q=LSAT%2Bpractice%2Btest&qsrc=1" target="_blank">Ask 
  Jeeves</a></font></p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>