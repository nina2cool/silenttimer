<?
//security for page
session_start();

$PageTitle = "Overview of the MCAT";

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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>The MCAT Test</strong></font></p>
                  
<p><font size="2" face="Arial, Helvetica, sans-serif">Ever wonder how your physician
     became a doctor? Med school, right? Sure, but that&#8217;s not how it began.
      Before he/she was a doctor, there was medical school. Before there was
     medical  school, there was the loathsome MCAT test. Sounds like every other
     admissions  test-- the <a href="../lsat/">LSAT</a>, <a href="../gmat/">GMAT</a>, <a href="../sat/">SAT</a> 
  and so on&#8212;but since our lives lie in the hands of these everyday professionals,
   let&#8217;s hope they passed their MCAT test with flying colors!</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Developed by the <a href="http://www.aamc.org/students/mcat/start.htm" target="_blank">Association 
  of American Medical Colleges</a>, the MCAT test is composed of four sections: 
  verbal reasoning, physical sciences, biological sciences and a writing sample. 
  The standardized test evaluates problem solving, critical thinking and writing 
  skills as well as candidates&#8217; knowledge of science concepts and principles 
  required for the study of medicine. The skills tested are aimed at encouraging 
  students with extensive educational backgrounds to consider a health profession 
  career.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Along with undergraduate
     records, references and personal interviews, the MCAT test is required by
    almost  all U.S. medical schools for admission. MCAT test scores are used
    to determine  which students will be likely to succeed in their program,
    identify applicants&#8217; 
  strengths and weaknesses and to interpret candidates&#8217; transcripts and
   letters of evaluation.</font></p>
<p><font color="#33CC33" size="2" face="Arial, Helvetica, sans-serif"><strong>&lt;&lt;
      Use the links to the left to learn more about the MCAT.</strong></font></p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links</font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.aamc.org/students/mcat/start.htm" target="_blank">Medical 
  College Admission Test Web site</a><br>
  <a href="http://novapress.net/mcat/" target="_blank">Nova's Test Prep - MCAT</a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.researchresources.net/books/MCAT_Test_books.html" target="_blank"><br>
  MCAT Test Books</a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.bestpremed.com/MCAT.php" target="_blank"><br>
  MCAT Test Advice</a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.geocities.com/CollegePark/Union/5092/" target="_blank"><br>
  MCAT Prep Info </a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Additional Search 
  Help for MCAT Test<br>
  </strong>Click below to search for &quot;MCAT test&quot; in the following search 
  engines: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.google.com/search?hl=en&lr=&ie=UTF-8&oe=UTF-8&q=MCAT%2Btest" target="_blank">Google</a> 
  | <a href="http://search.msn.com/results.aspx?q=MCAT%2Btest&FORM=SMCRT" target="_blank">MSN</a> 
  | <a href="http://altavista.com/web/results?q=MCAT%2Btest&kgs=0&kls=1&avkw=aapt" target="_blank">Altavista</a> 
  | <a href="http://search.yahoo.com/search?p=MCAT%2Btest&ei=UTF-8&fr=fp-top&n=20&fl=0&x=wrt" target="_blank">Yahoo</a> 
  | <a href="http://search.aol.com/aolcom/search?invocationType=topsearchbox./aolcom/jsp/search.jsp&query=MCAT%2Btest&x=29&y=14" target="_blank">AOL</a> 
  | <a href="http://web.ask.com/web?q=MCAT%2Btest&qsrc=1" target="_blank">Ask 
  Jeeves</a></font></p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>