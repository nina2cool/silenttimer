<?
//security for page
session_start();

$PageTitle = "Preparing for the LSAT with The Silent Timer";

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
  Timer</a> | <a href="lsat_practice.php">LSAT Practice</a> | &nbsp;<a href="../../../testhome/lsat.php">LSAT 
  Test</a></strong></font></p>
<p><font size="5" face="Arial, Helvetica, sans-serif"><strong> LSAT Preparation</strong></font></p>
                  
<p><font size="2" face="Arial, Helvetica, sans-serif">Contrary to what many people 
  think, the LSAT is not a test based solely on intelligence or memorization. 
  Intensive test preparation is the key to doing well on the LSAT; how well you 
  do on the LSAT is directly related to the amount of work you put into studying. 
  With hard work, it is not uncommon for test takers to increase their percentile 
  by 20 points, if not more. Preparing for the LSAT is a matter of learning certain 
  <em>skills</em> to take the test. Adequate LSAT preparation will allow you to 
  learn general test patterns, question types, and pacing strategies to ensure 
  your best possible performance. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">It is imperative to begin 
  LSAT preparation many months before the actual test. After all, this test is 
  worth as much as the many hours you spend studying for your classes as an undergraduate. 
  DO NOT wait until the last minute to begin studying; you simply cannot &quot;cram 
  for the LSAT.&quot; The actual test as well as your LSAT preparation should 
  be taken very seriously. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Buying <strong><font color="#000066" face="Times New Roman, Times, serif"><a href="lsat_st.php">THE 
  SILENT TIMER</a></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></strong> 
  early is one key to test preparation. After all, <a href="../../timemanagement/index.php">time 
  management</a> is one of the most important aspects of the test.</font></p>
<p>&nbsp;</p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links<br>
  </font></strong><font size="2" face="Arial, Helvetica, sans-serif"><br>
  <a href="http://www.bc.edu/offices/careers/gradschool/law/lsatadvice/" target="_blank"> 
  LSAT Prep Advice</a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.lsac.org" target="_blank"><br>
  Law School Admission Council<br>
  </a><a href="http://www.testmasters180.com" target="_blank">TestMasters 180<br>
  </a><a href="http://www.review.com" target="_blank">The Princeton Review<br>
  </a><a href="http://www.kaptest.com" target="_blank">Kaplan<br>
  </a><a href="http://www.powerscore.com" target="_blank">PowerScore</a></font><br>
  <a href="http://www.testsherpa.com/" target="_blank"><font size="2" face="Arial, Helvetica, sans-serif">Free 
  LSAT Prep</font></a></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Additonal Search 
  Help for LSAT Preparation<br>
  </strong>Click below to search for &quot;LSAT preparation&quot; in the following 
  search engines: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.google.com/search?hl=en&lr=&ie=UTF-8&oe=UTF-8&q=LSAT%2Bpreparation" target="_blank">Google</a> 
  | <a href="http://search.msn.com/results.aspx?q=LSAT%2Bpreparation&FORM=SMCRT" target="_blank">MSN</a> 
  | <a href="http://altavista.com/web/results?q=LSAT%2Bpreparation&kgs=0&kls=1&avkw=aapt" target="_blank">Altavista</a> 
  | <a href="http://search.yahoo.com/search?p=LSAT%2Bpreparation&ei=UTF-8&fr=fp-top&n=20&fl=0&x=wrt" target="_blank">Yahoo</a> 
  | <a href="http://search.aol.com/aolcom/search?invocationType=topsearchbox./aolcom/jsp/search.jsp&query=LSAT%2Bpreparation&x=29&y=14" target="_blank">AOL</a> 
  | <a href="http://web.ask.com/web?q=LSAT%2Bpreparation&qsrc=1" target="_blank">Ask 
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
