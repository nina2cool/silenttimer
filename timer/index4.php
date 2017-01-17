<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> 
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><img src="pics/Front_Logo_03.jpg" width="105" height="68"></td>
    <td><div align="center"><font size="5" face="Arial, Helvetica, sans-serif"><strong>&quot;Success
    is Just a Matter of <em><font color="#FF0000">Time</font></em>!&quot;</strong></font></div></td>
  </tr>
</table>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="#Intro">Intro</a> | <a href="#Features">Features</a> | <a href="#Demo">Online
            Demo</a> | <a href="#Gallery">Image &amp; Video  Gallery<br>
            </a><a href="#Video">Timer Intro Video</a> | <a href="#Test">Test Handbook</a> | <a href="#Products">Additional
    Products</a> </font></div></td>
  </tr>
</table>
<p align="left"><strong><font size="3" face="Arial, Helvetica, sans-serif"><u><a name="Intro"></a>Introduction
to <font color="#003399">The Silent Timer&#8482;</font></u></font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Every
        year hundreds of thousands of high school and college graduates aspire
        to higher levels of education. We have all heard the buzzwords: <strong><a href="../testhome/sat_test.php">SAT</a></strong>, <strong><a href="../testhome/act_test.php">ACT</a></strong>, <strong><a href="../testhome/lsat_test.php">LSAT</a></strong>, <strong><a href="../testhome/mcat.php">MCAT</a></strong>, <strong><a href="../testhome/gre_test.php">GRE</a></strong>, <strong><a href="../testhome/gmat_test.php">GMAT</a></strong>,
        and the list goes on. These are all tests that help students get into their
        college or graduate school. One feature all of these standardized tests
        share is stringent time control to measure how well and how quickly students
        can answer tough questions. In fact, the most difficult part of these exams
        is the time constraint. Most students, if given ample time, could finish
        most questions correctly.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">With its unique features, <font color="#000066" face="Times New Roman, Times, serif"><strong>THE
        SILENT TIMER</strong></font><strong>&#8482;</strong> is the only study
  aid designed specifically to improve your pacing skills. <font color="#000066" face="Times New Roman, Times, serif"><strong>THE
  SILENT TIMER</strong></font><strong>&#8482;</strong> tells
  you exactly how much time you can spend on each question before you are losing
  time on the rest of your test. By using this process in practice, you will
  be able to increase your answering speed far beyond what you thought possible!
  Use <font color="#000066" face="Times New Roman, Times, serif"><strong>THE
  SILENT TIMER</strong></font><strong>&#8482;</strong> when studying to:</font></p>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><ul>
      <li><font size="2" face="Arial, Helvetica, sans-serif"><strong> Reduce
            anxiety associated with poor pacing</strong></font></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif"><strong> Improve
            your focus on actual test material </strong></font></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif"><strong> Develop
            an internal pacing clock</strong></font></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><font color="#FF0000"> Practice
                your way to HIGHER test scores!</font></font></strong></font></li>
    </ul>
    </td>
    <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://silenttimer.com/timer/increase.php" target="_blank"><strong>&gt;
            Learn more about increasing <br>
        your score with The Silent Timer&#8482;</strong></a></font></div></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#99FF99">
  <tr>
    <td><div align="center">
        <p> <font color="#000066" size="3"><em><font size="2" face="Arial, Helvetica, sans-serif"><strong>Practicing
                with </strong></font></em><strong><font size="2" face="Arial, Helvetica, sans-serif"><font face="Times New Roman, Times, serif"><a href="http://www.silenttimer.com">THE
                SILENT TIMER </a>&trade;</font><em> is the answer to reducing
                the nervousness associated with pacing problems. Once you have
                established a pacing strategy through studying and practice,
                you will feel more confident and secure on test day.</em></font></strong></font></p>
    </div></td>
    <td><table border="2" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr>
          <td><div align="center"><a href="../gallery/photos.php"><img src="pics/home/27.jpg" alt="The Silent Test Taking Timer, Exam Time!" width="83" height="74" border="0" align="bottom"></a></div></td>
        </tr>
    </table></td>
  </tr>
</table>
<br>
<div align="left">
  <table width="100%"  border="0" cellspacing="0" cellpadding="5">
    <tr valign="middle" bgcolor="#E9E9E9">
      <td valign="top" bgcolor="#E9E9E9"><font size="4" face="Arial, Helvetica, sans-serif"><strong><a name="Features"></a><font color="#003399"><a href="functions.php">Features</a></font></strong></font></td>
      <td valign="bottom" bgcolor="#E9E9E9">&nbsp;</td>
    </tr>
    <tr>
      <td width="80%"><ul>
        <li><font size="2" face="Arial, Helvetica, sans-serif"> It keeps track
            of the total time left on your section </font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">It keeps track
            of how many questions you have answered, and how many remain </font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">It shows the average
            time available per question </font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">It keeps track
            of the amount of time left on the current question</font></li>
        </ul>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="functions.php">Visit
            our features page to find out exactly how <font color="#000066" face="Times New Roman, Times, serif"><strong>THE
      SILENT TIMER</strong></font><strong>&#8482;</strong> works.</a></font> <br>
      <br>
      </p></td>
      <td width="20%" valign="top"><form name="form1" method="post" action="functions_2005.php">
        <div align="right">
          <input name="LearnMore1" type="submit" id="LearnMore15" value="&gt; Features">
        </div>
      </form></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#E9E9E9"><strong><font size="3" face="Arial, Helvetica, sans-serif"><a name="Demo"></a><a href="demo.php">Online
      Demo</a></font></strong></td>
    </tr>
    <tr>
      <td width="80%"><font size="2" face="Arial, Helvetica, sans-serif"><br>
        Take this timer
      for a test drive!<br>
      <br>
      </font></td>
      <td width="20%" valign="top"><form name="form1" method="post" action="demo.php">
        <div align="right">
          <input name="LearnMore123" type="submit" id="LearnMore124" value="&gt; Online Demo">
        </div>
      </form></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#E9E9E9"><strong><font size="3" face="Arial, Helvetica, sans-serif"><a name="Gallery"></a><a href="../gallery/index.php">Image
      and Video Gallery</a></font></strong></td>
    </tr>
    <tr>
      <td width="80%"><font size="3" face="Arial, Helvetica, sans-serif"><font size="2"><br>
        Visit
            this page to discover what </font><font color="#000066" size="2" face="Times New Roman, Times, serif"><strong>THE
            SILENT TIMER<font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></strong></font><font size="2"> looks
      like.<br>
      <br>
      </font></font></td>
      <td width="20%" valign="top"><form name="form1" method="post" action="../gallery/index.php">
        <div align="right">
          <input name="LearnMore124" type="submit" id="LearnMore125" value="&gt; Gallery">
        </div>
      </form></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#E9E9E9"><strong><font size="3" face="Arial, Helvetica, sans-serif"><a name="Video"></a><a href="video.php">Timer
      Intro Video</a></font></strong></td>
    </tr>
    <tr>
      <td width="80%"><font size="2" face="Arial, Helvetica, sans-serif"><br>
        Make sure to get
          the timer lowdown in extreme visuals, compliments of <a href="http://www.macromedia.com" target="_blank">Macromedia
      Flash</a>.<br>
      <br>
      </font></td>
      <td width="20%" valign="top"><form name="form1" method="post" action="video.php">
        <div align="right">
          <input name="LearnMore125" type="submit" id="LearnMore126" value="&gt; Video">
        </div>
      </form></td>
    </tr>
    <tr bgcolor="#E9E9E9">
      <td colspan="2"><strong><font color="#0000CC" size="3" face="Arial, Helvetica, sans-serif"><a name="Test"></a><a href="../handbook/index.php">Test
      Handbook &amp; Information Site</a></font></strong></td>
    </tr>
    <tr>
      <td width="80%"><font size="2" face="Arial, Helvetica, sans-serif"><br>
        We've compiled an
          enormous amount of information about <a href="../handbook/standardizedtest/index.php">standardized
          tests</a>, <a href="http://silenttimer.com/timer/increase.php">test
          scores</a>, <a href="../handbook/increasescores/intoschool.php">getting
          into school</a>, and, of course, <a href="../handbook/timemanagement/index.php">time
          managment</a>. If you have any questions about your exam, <a href="../handbook/index.php">make
      sure to check this out</a>!<br>
      <br>
      </font></td>
      <td width="20%" valign="top"><form name="form1" method="post" action="../handbook/index.php">
        <div align="right">
          <input name="LearnMore12" type="submit" id="LearnMore123" value="&gt; Go to the Handbook">
        </div>
      </form></td>
    </tr>
    <tr bgcolor="#E9E9E9">
      <td colspan="2"><font color="0000CC" face="Arial, Helvetica, sans-serif"><a name="Products"></a><a href="../product.php"><strong>Additional
      Products</strong></a></font></td>
    </tr>
    <tr>
      <td width="80%"><p><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><br>
        After
              mastering your pacing skills with <font size="2" face="Arial, Helvetica, sans-serif"><font color="#000066" face="Times New Roman, Times, serif"><strong>THE
              SILENT TIMER</strong></font><strong>&#8482;</strong></font>, use
              any of these products<font size="2" face="Arial, Helvetica, sans-serif"> </font> to
              get a higher score:</font></font></p>
      <p align="center"><font size="5" face="Arial, Helvetica, sans-serif"><strong><a href="http://www.silenttimer.com/bonus_timer.php"><img src="../pics/bonus-red-buttons.jpg" alt="LSAT Bonus Timer" width="137" height="131" border="0"></a> <a href="http://www.silenttimer.com/silent_watch.php"><img src="../pics/Watch2.jpg" alt="Silent Digital Watch" width="166" height="166" border="0"></a> <img src="../pics/LSATbook.jpg" alt="Master the LSAT by Nova Press" width="127" height="164"></strong></font></p>
      <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">For
          students taking the LSAT </font><font size="3" face="Arial, Helvetica, sans-serif"><font color="#000066" size="2" face="Times New Roman, Times, serif"><strong>THE
          SILENT TIMER<font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></strong><font color="#000000" face="Arial, Helvetica, sans-serif">'s</font></font></font> <font size="2" face="Arial, Helvetica, sans-serif">new
          side kick the <strong>Bonus
          Timer</strong> is the perfect tool for test day. <a href="http://www.silenttimer.com/testhome/lsat_test.php">Find
      out how you can get the best of both worlds.</a></font></p>
      </td>
      <td width="20%" valign="top"><form name="form1" method="post" action="../product.php">
        <div align="right">
          <input name="LearnMore122" type="submit" id="LearnMore1222" value="&gt; Products Available">
        </div>
      </form></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>