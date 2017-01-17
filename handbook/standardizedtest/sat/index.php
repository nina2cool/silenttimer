<?
//security for page
session_start();

$PageTitle = "Overview of the SAT";

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
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../../../order/index.php?t=SAT">SAT 
  Timer</a> | <a href="sat_practice_test.php">SAT Practice Tests</a> | &nbsp;<a href="../../../testhome/sat.php">SAT 
  Test</a></strong></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>The SAT&reg; Test*<br>
  <br>
  <font color="#009900" size="2" face="Arial, Helvetica, sans-serif">&lt;&lt; 
  Use the links to the left to learn more about the SAT</font> </strong></font></p>
                  
<p><font size="2" face="Arial, Helvetica, sans-serif">It is time&#8212;the moment 
  has arrived for you to start preparing for the dreaded SAT test. Every high 
  school student knows that the day will come when they, too, will probably have 
  to take this college entrance exam. Taking the SAT test is just an inevitable 
  part of the transition between high school and college.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The SAT test is used as 
  one factor in determining an applicant&#8217;s admission into most institutions 
  of higher learning. Colleges use the test score as a tool to approximate how 
  an applicant would do at their school and to determine an applicant's overall 
  readiness to complete college-level work.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The SAT test covers Critical 
  Reading (Verbal), Mathematics, and Writing. The test's format is as follows:</font></p>
<table width="100%" border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr> 
    <td height="33" align="left" valign="middle"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td align="center" valign="top" bgcolor="#D9D9FF"><strong><font size="2" face="Arial, Helvetica, sans-serif">Time</font></strong></td>
    <td align="center" valign="top" bgcolor="#D9D9FF"><strong><font size="2" face="Arial, Helvetica, sans-serif">Content</font></strong></td>
    <td align="left" valign="top" bgcolor="#D9D9FF"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Score</strong></font></div></td>
  </tr>
  <tr> 
    <td width="15%" height="63" align="center" valign="middle" bgcolor="#FFFFCC"><strong><font size="2" face="Arial, Helvetica, sans-serif">Critical 
      Reading (Verbal) <br>
      </font></strong></td>
    <td width="23%" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><u>3 
      sections:</u><br>
      - 25 min<br>
      - 25 min<br>
    - 20 min</font></td>
    <td width="39%" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"> 
      - Sentence Completion <br>
      - Reading Comprehension (both long &amp; short reading passages)<br>
      - Analogies are no longer on the exam</font></td>
    <td width="23%" align="left" valign="middle"><font size="2" face="Arial, Helvetica, sans-serif"> 
      200- 800</font></td>
  </tr>
  <tr> 
    <td height="49" align="center" valign="middle" bgcolor="#FFFFCC"><strong><font size="2" face="Arial, Helvetica, sans-serif">Math</font></strong></td>
    <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><u>3 
      sections:</u><br>
      - 25 min<br>
      - 25 min<br>
    - 20 min</font></td>
    <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif">- 
      Number and operations<br>
      - Algebra and functions<br>
      - Geometry<br>
      - Statistics<br>
      - Probability<br>
      - Data analysis</font></td>
    <td align="left" valign="middle"><font size="2" face="Arial, Helvetica, sans-serif">200- 
      800</font></td>
  </tr>
  <tr> 
    <td height="45" align="center" bgcolor="#FFFFCC"><strong><font size="2" face="Arial, Helvetica, sans-serif">Writing</font></strong></td>
    <td valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif"><u>3 sections:</u><br>
        - 25 min essay<br>
        - 25 min multiple choice<br>
        - 10 min multiple choice</font></p></td>
    <td valign="top"><font size="2" face="Arial, Helvetica, sans-serif">- Improve 
      sentences and paragraphs <br>
      - Error identification (diction, grammar, sentence construction, subject-verb 
      agreement, etc.)<br>
      </font></td>
    <td align="left" valign="middle"><font size="2" face="Arial, Helvetica, sans-serif">200- 
      800</font></td>
  </tr>
  <tr> 
    <td height="51" align="center" bgcolor="#FFFFCC"><strong><font size="2" face="Arial, Helvetica, sans-serif">Unscored</font></strong></td>
    <td valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif"><u>1 section:</u><br>
        - 25 min</font></p></td>
    <td valign="top"><font size="2" face="Arial, Helvetica, sans-serif">- Can 
      be critical reading, math, or multiple-choice writing</font></td>
    <td valign="middle"> 
      <p><font size="2" face="Arial, Helvetica, sans-serif">Unscored</font></p></td>
  </tr>
  <tr> 
    <td height="30" align="center">&nbsp;</td>
    <td align="left" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif">Total: 
      3 hrs, 45min</font></strong></td>
    <td valign="top">&nbsp;</td>
    <td align="left" valign="middle"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Score
          Range:
           600-2400</strong></font></td>
  </tr>
</table>
<p><br>
  <font size="2" face="Arial, Helvetica, sans-serif"><em>*Throughout this web
  site, SAT is a registered trademark of the College Board, which was not involved
  in the production of, and does not endorse, this product.</em></font></p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links</font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.collegeboard.com" target="_blank">CollegeBoard.com</a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://education.yahoo.com/college/essentials/practice_tests/sat/" target="_blank"><br>
  Yahoo SAT Test Center</a><br>
  <a href="http://www.syvum.com/sat/" target="_blank">SAT Test Preparation Online</a><br>
  <a href="http://www.msnbc.com/news/968190.asp" target="_blank">The Underground 
  Guide to the SAT</a><br>
  <a href="http://www.princetonreview.com.tw/college/eight.htm" target="_blank">Eight 
  Things you NEED to know about the New SAT</a></font></p>
<p><br>
  <font size="2" face="Arial, Helvetica, sans-serif"><strong>Additional Search 
  Help for SAT Test<br>
  </strong>Click below to search for &quot;SAT test&quot; in the following search 
  engines: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.google.com/search?hl=en&lr=&ie=UTF-8&oe=UTF-8&q=SAT%2Btest" target="_blank">Google</a> 
  | <a href="http://search.msn.com/results.aspx?q=SAT%2Btest&FORM=SMCRT" target="_blank">MSN</a> 
  | <a href="http://altavista.com/web/results?q=SAT%2Btest&kgs=0&kls=1&avkw=aapt" target="_blank">Altavista</a> 
  | <a href="http://search.yahoo.com/search?p=SAT%2Btest&ei=UTF-8&fr=fp-top&n=20&fl=0&x=wrt" target="_blank">Yahoo</a> 
  | <a href="http://search.aol.com/aolcom/search?invocationType=topsearchbox./aolcom/jsp/search.jsp&query=SAT%2Btest&x=29&y=14" target="_blank">AOL</a> 
  | <a href="http://web.ask.com/web?q=SAT%2Btest&qsrc=1" target="_blank">Ask 
  Jeeves</a></font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p> 
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks2.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
