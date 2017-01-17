<?
//security for page
session_start();

$PageTitle = "Using The Silent Timer to Raise Your Score";

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
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../../../order/index.php?t=MCAT">MCAT 
  Timer</a> | <a href="mcat_registration.php">MCAT Registration</a> | &nbsp;<a href="../../../testhome/mcat.php">MCAT 
  Test</a></strong></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>MCAT Score</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">To relieve some stress, 
  you should be glad to learn that there is no penalty on the MCAT test for incorrect 
  answers. So if you answer a question incorrectly, you lose no points&#8212;just 
  time spent on the question. Probably the first good thing you&#8217;ve learned 
  about the MCAT test, right?</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Raw MCAT scores are simply 
  calculated by the sum of questions answered correctly in each section. The MCAT 
  scores are then curved to a 15 point scale to take into account different levels 
  of difficulty in questions, as well applicants&#8217; states of health and ability 
  to take standardized tests. Scored by a group of trained readers, the writing 
  sample is rated alphabetically from J to T (J being the lowest score and T being 
  the highest score).</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The verbal reasoning section
    has 60 questions and a scoring range of 1 to 15. The physical sciences
    section has 77 questions and a scoring range of 1 to 15. The biological sciences
    section has 77 questions and a scoring range of 1 to 15. Last but not least,
  the writing sample has two questions and a scoring range of J to T.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Mean MCAT scores in 2005
     were 8.1 on the verbal reasoning section, 8.1 on the physical sciences section,
     8.5 on the biological section and O on the writing section. A total score
    of  30 or higher is typically a good MCAT score. Schools also prefer students
    to  have balanced scores on each section. For example, 10, 10 and 10 instead
    of  7, 10 and 13.<br>
  <br>
  MCAT scores are usually mailed 60 days after the test date, though they can 
  be viewed online 50 days following the test date for free when the score file 
  goes to the printer. MCAT scores are also basically valid for only three years. 
  Some schools may take scores older than three years, so contact your school 
of choice for specific requirements.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><b><font size="4">Starting
        in 2007:</font></b> Scores
    will be available 30 days after the test date. The number of questions on
        the MCAT will be reduced by one-third, the time will be decreased about
        30%, and the test will be computerized (instead of paper-and-pencil).</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">It is highly recommended 
  for students to apply for the American Medical College Application Service when 
  registering for the MCAT test. Most medical schools participate in this service, 
  which will send students&#8217; application materials to medical schools selected 
  on their AMCAS application. It is only available for first year candidates entering 
  medical school. <a href="http://www.aamc.org/amcas" target="_blank">Apply here</a>. 
  To apply to non-AMCAS schools, students can use the <a href="https://services.aamc.org/mcatthx/" target="_blank">online 
  MCAT THx system</a>. </font></p>
<p>&nbsp;</p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links</font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.aamc.org/students/mcat/start.htm" target="_blank">Medical 
  College Admission Test AAMC Web site</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Additional Search 
  Help for MCAT Score<br>
  </strong>Click below to search for &quot;MCAT score&quot; in the following search 
engines: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.google.com/search?hl=en&lr=&ie=UTF-8&oe=UTF-8&q=MCAT%2Bscore" target="_blank">Google</a> 
  | <a href="http://search.msn.com/results.aspx?q=MCAT%2Bscore&FORM=SMCRT" target="_blank">MSN</a> 
  | <a href="http://altavista.com/web/results?q=MCAT%2Bscore&kgs=0&kls=1&avkw=aapt" target="_blank">Altavista</a> 
  | <a href="http://search.yahoo.com/search?p=MCAT%2Bscore&ei=UTF-8&fr=fp-top&n=20&fl=0&x=wrt" target="_blank">Yahoo</a> 
  | <a href="http://search.aol.com/aolcom/search?invocationType=topsearchbox./aolcom/jsp/search.jsp&query=MCAT%2Bscore&x=29&y=14" target="_blank">AOL</a> 
  | <a href="http://web.ask.com/web?q=MCAT%2Bscore&qsrc=1" target="_blank">Ask 
  Jeeves</a></font></p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>