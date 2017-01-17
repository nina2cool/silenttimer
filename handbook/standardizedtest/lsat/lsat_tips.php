<?
//security for page
session_start();

$PageTitle = "LSAT Tips to Improve Your Score";

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
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="https://secure.silenttimer.com/product.php?t=LSAT">LSAT 
  Timer</a> | <a href="http://silenttimer.com/handbook/standardizedtest/lsat/lsat_practice_test.php">LSAT 
  Practice Tests</a> | <a href="http://silenttimer.com/handbook/standardizedtest/lsat/index.php">LSAT 
  Test</a></strong></font></p>
<p><font size="5" face="Arial, Helvetica, sans-serif"><strong>LSAT Tips</strong></font></p>
                  
<p><font size="2" face="Arial, Helvetica, sans-serif">There are many books, web
    sites, and publications that offer tips and techniques for increasing your
    LSAT score. We have searched long and hard to find these tips and make them
    available to you from one central location! Please keep in mind, however,
    that not all of these tips are ideal for everyone. You must start studying
  early to find the techniques that work best for <em><strong>you</strong></em>.</font></p>
<table width="99%"  border="0" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr> 
    <td height="51" valign="top" bgcolor="#CCE6FF"> <p align="left"><strong><font color="#000066" size="5" face="Arial, Helvetica, sans-serif"> LSAT
            Tips and Strategies</font></strong></p></td>
  </tr>
  <tr> 
    <td height="10" valign="top" bordercolor="#333333" bgcolor="#ECECFF">&nbsp;</td>
  </tr>
  <tr> 
    <td height="29" bgcolor="#FFFFFF"><font color="#000000" size="4" face="Arial, Helvetica, sans-serif">I. 
      When Studying... <br>
      <font size="3"><br>
      </font> </font></td>
  </tr>
  <tr> 
    <td bgcolor="#330066"><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><em><strong>&gt; 
      Plan on taking the LSAT only once.</strong></em></font></td>
  </tr>
  <tr> 
    <td height="99" valign="top"> <p><br>
        <font size="2" face="Arial, Helvetica, sans-serif">Keep in mind that when 
        you retake the LSAT, the highest score is what counts. Also, unless you can pinpoint 
        a concrete problem that you can improve upon, research indicates that 
        your score will most likely differ by just two 
        points (which can be higher or lower!). Plan well, study hard the first 
        time, and avoid retaking this difficult exam.</font></p></td>
  </tr>
  <tr bgcolor="#330066"> 
    <td><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><em><strong>&gt; Take
      a diagnostic exam- cold.</strong></em></font><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <tr> 
    <td height="120" valign="top"> <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><br>
        Obtain a copy of an old LSAT exam and take it under timed conditions without 
        studying. This is an important first step to identifying your weak points. 
        It will also serve as your basis for comparison to see how much you're 
        improving along the way. <a href="http://www.lsac.org/LSAC.asp?url=lsac/download-forms-guidelines-checklists.asp" target="_blank">Download 
        a complete sample LSAT here.</a> Test prep companies such as Kaplan and 
        The Princeton Review also offer free diagnostic exams in a real test setting. 
        Contact your local center for details.</font><br>
      </p></td>
  </tr>
  <tr bgcolor="#330066"> 
    <td><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><em><strong>&gt;</strong></em></font><font color="#FFFFFF" size="3">&nbsp; 
      </font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong><em><font size="3">Start
      studying ahead of time</font></em><font size="3">. </font></strong></font><strong><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></strong></td>
  </tr>
  <tr> 
    <td height="109" valign="top"> <p><font size="2" face="Arial, Helvetica, sans-serif"><br>
        If possible, begin preparing at least two months before the test date. 
        This will give you enough time to familiarize yourself with the test questions, 
        develop a pacing strategy, and improve upon your weaknesses. Do not attempt 
        to &quot;cram for the LSAT.&quot; If you still feel like you are unprepared 
        for your exam as the date approaches, consider postponing until the next 
        test date. LSAC offers partial refunds for cases such as this (see <a href="http://www.lsac.org/" target="_blank">www.lsac.org</a> 
        for details). </font><br>
      </p></td>
  </tr>
  <tr bgcolor="#330066"> 
    <td><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><em><strong>&gt;</strong></em></font><font color="#FFFFFF" size="3">&nbsp; 
      </font><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><em><strong>Study 
      one section at a time.</strong></em></font></td>
  </tr>
  <tr> 
    <td height="150" valign="top"> <div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><br>
        D</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">evote 
        &quot;chunks&quot; of time (usually a week or two, depending on how much 
        time you have) to studying Reading Comprehension, Logical Reasoning (Arguments), 
        and Analytical Reasoning (Games), one section at a time. Begin by attacking 
        the section that gives you the most problems. Familiarize yourself with 
        its question types and the study strategies associated with it. Then, 
        apply these strategies when working through practice questions. As soon 
        as you feel comfortable, try to get into the habit of taking an entire 
        35 min section in one sitting (instead of working one game at a time, 
        for example). This will allow you to get a better feel for the time pressure.</font> 
        <br>
      </div></td>
  </tr>
  <tr bgcolor="#330066"> 
    <td><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><em><strong>&gt;</strong></em></font><font color="#FFFFFF" size="3">&nbsp; 
      </font><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><em><strong>Time
      yourself during practice.</strong></em></font><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <tr> 
    <td height="208" valign="top"> <div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><br>
        </font><font size="2" face="Arial, Helvetica, sans-serif">The LSAT is 
        a speeded test, meaning that many students will not get to every test 
        question. Luckily, pacing skills can be learned with practice. Initially, 
        you should be focusing on learning the questions and working through test 
        sections without paying attention to the time limit. As you become more 
        familiar with the test, however, you should begin timing yourself with 
        </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">a 
        timer (<a href="http://silenttimer.com/product.php" target="_blank">Buy 
        </a></font><a href="http://silenttimer.com/product.php"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000066" size="2" face="Times New Roman, Times, serif"><strong> 
        THE SILENT TIMER&#8482;</strong></font> Here</font></a><font size="2" face="Arial, Helvetica, sans-serif">). 
        Test time management can be a significant factor in raising your score. 
        <br>
        <font color="#000033" size="2" face="Times New Roman, Times, serif"><strong><br>
        <font color="#000066">THE SILENT TIMER&#8482;</font></strong></font> is 
        a timer that will help you learn not to spend too much time on any one 
        question. It lets you know how much time on average you have to answer 
        each question and will train you to move steadily through your exam. As 
        your timing improves, you will be able to answer more questions. Since 
        LSAT scores are based on the number of questions answered correctly, answering 
        as many questions as possible can be very beneficial to your score.<br>
        </font></div></td>
  </tr>
  <tr bgcolor="#330066"> 
    <td><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><em><strong>&gt;</strong></em></font><font color="#FFFFFF" size="3">&nbsp; 
      </font><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><em><strong>Take
      time to understand your mistakes. </strong></em></font><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <tr> 
    <td height="150" valign="top"> <div align="left"><br>
        <font color="#000000" size="2" face="Arial, Helvetica, sans-serif">When 
        you finish a practice test or section, carefully re-read the question 
        and all of the answer choices to figure out why you made a mistake. If 
        you don't discover your weaknesses, you will not be able to improve upon 
        them. Every section of the LSAT is comprised of specific question &quot;types&quot; 
        and it is in your best interest to find out which types give you the most 
        trouble. </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Invest 
        in some practice materials that provide explanations for each test question. 
        Once you understand the reasoning behind the right answers, you can begin 
        to recognize common traps and learn to overcome them. </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066"><a href="http://www.silenttimer.com/product.php" target="_blank">Master 
        the LSAT</a></font></strong> is a student favorite that provides thorough 
        analysis of each test question/answer.</font> 
        <br>
      </div></td>
  </tr>
  <tr bgcolor="#330066"> 
    <td><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><em><strong>&gt;</strong></em></font><font color="#FFFFFF" size="3">&nbsp; 
      </font><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong><em>Take 
      as many practice tests as possible.</em></strong></font></td>
  </tr>
  <tr> 
    <td height="98" valign="top"> <div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><br>
        </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Increasing 
        your LSAT score is highly dependent on discovering test patterns and learning 
        how to approach specific question types. The LSAT is a highly learnable 
        test and practicing with REAL LSAT questions is crucial. Order several 
        books of <a href="http://silenttimer.com/books/lsat_books.php" target="_blank">Official 
        LSAT tests</a> from previous years. Some books on the market try to simulate 
        LSAT question types, but what better way is there to get a feel for the 
        actual LSAT than by practicing with questions written by the test maker?<br>
        <br>
        </font></div></td>
  </tr>
  <tr bgcolor="#330066"> 
    <td><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><em><strong>&gt;</strong></em></font><font color="#FFFFFF" size="3">&nbsp; 
      </font><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><em><strong>Simulate
      a testing environment when taking practice tests.</strong></em></font><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <tr> 
    <td height="186" valign="top"> <div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><br>
        When you are ready to begin taking practice tests, try as much as possible 
        to recreate &quot;test day&quot;:<br>
        <br>
        <strong>- </strong>Take the test at the time of day that you will be taking 
        your LSAT (usually 9 AM, unless you take it in June, which is an afternoon 
        exam). This may take some getting used to, as some people concentrate 
        better in the afternoon or at night. <br>
        <strong>-</strong> Find a location where there is <em>some</em> noise 
        distraction. Contrary to popular belief, there are still minor distractions 
        in the actual exam room- paper shuffling, pencil clicking, coughing, etc. 
        Get used to these types of distractions by practicing at a place like 
        the library.<br>
        <strong>-</strong> Make sure you are timing yourself to get a feel for 
        the time pressure you will feel on test day. Buy </font><font color="#000000" size="2"><strong><a href="http://silenttimer.com/product.php" target="_blank">THE 
        SILENT TIMER&#8482;</a></strong></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 
        to help you pace yourself.</font><br>
        <br>
      </div></td>
  </tr>
  <tr bgcolor="#330066"> 
    <td><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><em><strong>&gt;</strong></em></font><font color="#FFFFFF" size="3">&nbsp; 
      </font><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong><em>Don't
      surrender.</em></strong></font><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <tr> 
    <td height="29" bgcolor="#FFFFFF"><font size="2" face="Arial, Helvetica, sans-serif"><br>
      There will be times during your LSAT preparation where you may feel overwhelmed, 
      burnt out, or unhappy with your practice scores. Realize that this is a 
      normal part of intensive study for an important exam. After that, move on. 
      Take all that negative energy and turn it into energy that you spend conquering 
      the exam. You can do it!<strong><em> </em></strong></font><font color="#000000" size="4" face="Arial, Helvetica, sans-serif"><br>
      </font></td>
  </tr>
  <tr> 
    <td height="17" valign="top" bordercolor="#333333" bgcolor="#ECECFF">&nbsp;</td>
  </tr>
  <tr> 
    <td height="53" bgcolor="#FFFFFF"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="4"> 
      II. When Taking a Test....</font></strong><em><strong><br>
      <br>
      </strong></em></font></td>
  </tr>
  <tr bgcolor="#330066"> 
    <td bgcolor="#99CCFF"><font size="3" face="Arial, Helvetica, sans-serif"><em><strong><font color="#333333">&gt; 
      </font>Do the easier questions first.&nbsp;</strong></em></font></td>
  </tr>
  <tr> 
    <td height="102" valign="top"> <p align="left"><br>
        <font size="2" face="Arial, Helvetica, sans-serif">LSAT questions, games, 
        and reading passages are not presented in any order of difficulty. Easier 
        questions are worth just as much as the hard ones, so don't feel like 
        you have to work them in the order that they are given.<strong><em> </em></strong>Skip 
        the harder questions and come back to them if there is time. In games/reading 
        sections especially, work on the easier games/passages first to accumulate 
        as many right answers as possible in the allotted time.</font> <br>
      </p></td>
  </tr>
  <tr bgcolor="#330066"> 
    <td bgcolor="#99CCFF"><font size="3" face="Arial, Helvetica, sans-serif"><em><strong><font color="#333333">&gt; 
      </font></strong></em><strong><em>Use process of elimination. </em></strong></font><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <tr> 
    <td height="100" valign="top"> <p><br>
        <font size="2" face="Arial, Helvetica, sans-serif"> This strategy is taught 
        to even the youngest of students taking tests, and with good reason. Attack 
        the question by first eliminating the answer choices that <em>must</em> 
        be wrong. Cross them out in your test booklet. Even if you can eliminate 
        just two answer choices, you can increase your chances of getting the 
        right answer by 65% (from 20% or 1 in 5 to 33% or 1 in 3). </font></p></td>
  </tr>
  <tr bgcolor="#330066"> 
    <td bgcolor="#99CCFF"><font size="3" face="Arial, Helvetica, sans-serif"><em><strong><font color="#333333">&gt; 
      </font></strong></em><strong><em>Don't leave any bubbles empty. </em></strong></font><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <tr> 
    <td height="90" valign="top"> <div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><br>
        </font><font size="2" face="Arial, Helvetica, sans-serif">You may not 
        get to every test question, but don't leave blanks. There are no deductions 
        for guessing, so filling in all blanks in the last minute or so of the 
        section will increase your odds of getting at least a few more questions 
        right.</font> <font size="2" face="Arial, Helvetica, sans-serif">Read 
        more about guessing strategy <a href="http://www.powerscore.com/lsat/help/guessing.htm" target="_blank">here</a>.</font></div></td>
  </tr>
  <tr bgcolor="#330066"> 
    <td bgcolor="#99CCFF"><font size="3" face="Arial, Helvetica, sans-serif"><em><strong><font color="#333333">&gt; 
      </font></strong></em><strong><em>Write in your test booklet! </em></strong></font><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <tr> 
    <td height="82" valign="top"> <div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><br>
        </font><font size="2" face="Arial, Helvetica, sans-serif">Do not be afraid 
        to mark out wrong answer choices, underline key words, make diagrams, 
        and jot down short notes. The test booklet is your scratch paper and is 
        there for you to write on. The LSAT is one of the few graduate school 
        exams that is not yet computerized- take advantage of this! </font></div></td>
  </tr>
  <tr bgcolor="#330066"> 
    <td bgcolor="#99CCFF"><font size="3" face="Arial, Helvetica, sans-serif"><em><strong><font color="#333333">&gt; 
      </font></strong></em><strong><em>Stay Positive.</em></strong></font></td>
  </tr>
  <tr> 
    <td height="102" valign="top"> <div align="left"><br>
        <font size="2" face="Arial, Helvetica, sans-serif">During the test, make 
        sure to keep a positive attitude. You've practiced these types of questions 
        already, so attack them with the strategies you've acquired. Don't let 
        a difficult question or even a difficult section ruin the rest of the 
        exam. Take a deep breath and regain your focus. Research indicates that 
        a positive approach can boost confidence and improve test performance. 
        </font> </div></td>
  </tr>
</table>
<p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><em><font color="#000000" size="3"><br>
  <font size="5">GOOD LUCK ON YOUR TEST!</font></font> </em></strong></font></p>
<p>&nbsp;</p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links</font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.lsac.org" target="_blank">Law 
  School Admission Council<br>
  </a><a href="http://www.lsat-center.com/lsat-page4.html" target="_blank">The 
  LSAT Center - Seven Tips for the LSAT<br>
  </a><a href="http://gradschool.about.com/cs/lsat/a/lsattips.htm" target="_blank">Grad 
  School - Tips for the LSAT<br>
  </a><a href="http://www.west.net/%7Estewart/lsat/lsattips.htm" target="_blank">Seven 
  Deadly Sins for the LSAT<br>
  </a><a href="http://www.unm.edu/%7Epre/law/competitive.html" target="_blank">Tips 
  on How to Make your Law School Application More Competitive<br>
  </a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.powerscore.com/lsat/help/index.htm" target="_blank">PowerScore Tips</a> </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Additional Search 
  Help for LSAT Tips<br>
  </strong>Click below to search for &quot;LSAT tips&quot; in the following search 
engines: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.google.com/search?hl=en&lr=&ie=UTF-8&oe=UTF-8&q=LSAT%2Btips" target="_blank">Google</a> 
  | <a href="http://search.msn.com/results.aspx?q=LSAT%2Btips&FORM=SMCRT" target="_blank">MSN</a> 
  | <a href="http://altavista.com/web/results?q=LSAT%2Btips&kgs=0&kls=1&avkw=aapt" target="_blank">Altavista</a> 
  | <a href="http://search.yahoo.com/search?p=LSAT%2Btips&ei=UTF-8&fr=fp-top&n=20&fl=0&x=wrt" target="_blank">Yahoo</a> 
  | <a href="http://search.aol.com/aolcom/search?invocationType=topsearchbox./aolcom/jsp/search.jsp&query=LSAT%2Btips&x=29&y=14" target="_blank">AOL</a> 
  | <a href="http://web.ask.com/web?q=LSAT%2Btips&qsrc=1" target="_blank">Ask 
  Jeeves</a></font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks2.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>