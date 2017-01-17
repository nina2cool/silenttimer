<?
//security for page
session_start();

$PageTitle = "The Silent Timer Features";

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
<link href="../code/style.css" rel="stylesheet" type="text/css">
<?
$TheTest = $_GET['test'];
?>

	
<p><font size="2" face="Arial, Helvetica, sans-serif"><a name="top"></a></font><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>
<? if($TheTest != ""){echo $TheTest;}else{echo "The";}?> The Silent Timer&#8482; Features</strong></font></p>
<p><font color="#CC0000"><strong><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">THIS
PAGE IS IN THE PROCESS OF BEING UPDATED FOR THE 2005 VERSION.</font></strong></font></p>
<p><strong><font size="4" face="Arial, Helvetica, sans-serif">2004 Users</font></strong><font size="4" face="Arial, Helvetica, sans-serif"> - <a href="#2004">Read below</a>.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="4">2005 Users (Current
      model available)</font></strong> - It has the same features as the 2004 model <a href="#2004">below</a>, but with several
    new ones.<br>
    <a href="functions_new.php"><strong>Click here</strong></a><font color="#CC0000"><strong> to read about the new
    functions when you have finished looking below. </strong></font></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>The ONLY timer <em>designed</em> 
  for your 
  <? if($TheTest != ""){echo $TheTest;}else{echo "test";}?>
  . Read more below.</strong></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong><span class="big"><a href="<? echo $https;?>product.php<? if($TheTest != ""){echo "index.php?t=$TheTest";}?>">Click 
  here to buy your <? if($TheTest != ""){echo $TheTest;}?> timer </a></span>! </strong></font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" face="Times New Roman, Times, serif"><a name="2004"></a><a href="http://www.silenttimer.com">THE
           SILENT TIMER</a></font>&#8482;</strong> is designed to help you time
           your <? if($TheTest != ""){echo $TheTest;}else{echo "test";}?>
           . 
  The detailed picture below shows the front of the timer. Click on areas of
           the  photo that you would like to read more about. Or, scroll down
           the page to find  more pictures and details. The features described
           below are applicable to both the 2004 and the 2005 version. The 2005
           version has some <a href="functions_new.php">new features</a>.</font></p>
<p align="center"><img src="pics/timerDetails.jpg" alt="The Silent Timer, test, SAT, LSAT, MCAT, GMAT, GRE, SAT, ACT.  Time your test." width="500" height="422" border="0" usemap="#Map"> 
  <map name="Map">
    <area shape="rect" coords="16,11,175,41" href="#5">
    <area shape="rect" coords="69,80,89,118" href="#5">
    <area shape="rect" coords="94,92,188,141" href="#2">
    <area shape="rect" coords="200,19,315,91" href="#4">
    <area shape="rect" coords="340,15,469,37" href="#3">
    <area shape="rect" coords="202,105,433,222" href="#3">
    <area shape="rect" coords="87,143,189,198" href="#6">
    <area shape="poly" coords="88,203,88,317,239,318,239,231,135,231,135,203" href="#8">
    <area shape="rect" coords="112,382,220,404" href="#8">
    <area shape="rect" coords="278,232,433,321" href="#7">
    <area shape="rect" coords="290,381,426,405" href="#7">
  </map>
</p>
<table width="100" border="0" cellpadding="7" cellspacing="0"class="right">
  <tr>
    <td><div align="left"> 
        <p align="center"><img src="pics/timer_side_measure.jpg" alt="The Silent Timer fits on your desk, nicely." width="300" height="222"></p>
        </div></td>
  </tr>
</table>

  
<font size="2" face="Arial, Helvetica, sans-serif"><br>
There are many testing features for </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" face="Times New Roman, Times, serif"><a href="http://www.silenttimer.com">THE 
SILENT TIMER</a></font>&#8482;</strong></font><font size="2" face="Arial, Helvetica, sans-serif">. 
Explore our features in detail below:</font> 
<blockquote> 
  <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="#1">&gt; Designed 
    for your <? if($TheTest != ""){echo $TheTest;}else{echo "Test";}?></a><br>
    <a href="#2">&gt; Completely Silent!</a><br>
    <a href="#3">&gt; Testing Screen - Details</a></font></p>
  <blockquote> 
    <p><font size="2" face="Arial, Helvetica, sans-serif"> <a href="#a">- Total 
      Time<br>
      </a><a href="#b">- Number Questions Remaining</a><br>
      <a href="#c">- Average Time Per Question</a><br>
      <a href="#d">- Question Count Down</a><br>
      <a href="#e">- Number Questions Answered<br>
      </a><a href="#f">- Count Down and Count Up</a><br>
      <a href="#g">- Alert icon</a></font></p>
  </blockquote>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="#4">&gt; Special, 
    Red Answer Button</a><br>
    <a href="#5">&gt; Red, Flashing Alert Light</a><br>
    <a href="#6">&gt; Test Memory Buttons</a><br>
    <a href="#7">&gt; Control Buttons</a><br>
    <a href="#8">&gt; Keypad Entry</a></font></p>
</blockquote>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr> 
    <td width="97%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><a name="1"></a></font></strong></font><font color="#000000" face="Times New Roman, Times, serif">THE 
      SILENT TIMER</font><font color="#000000">&#8482; is Designed for Tests</font></strong></font></strong></td>
    <td width="3%" align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr align="left" valign="top"> 
    <td colspan="2"> <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">For 
        many students, time is their worst enemy. No matter how well you know 
        the material, or how long you study, time always seems to run out before 
        the questions are finished. For standardized tests like the <a href="../testhome/sat.php">SAT</a>, 
        <a href="../testhome/act.php">ACT,</a> <a href="../testhome/lsat.php">LSAT</a>, 
        <a href="../testhome/mcat.php">MCAT</a>, <a href="../testhome/gmat.php">GMAT</a>, 
        and <a href="../testhome/gre.php">GRE</a>, practicing with a timer is 
        absolutely essential to doing well on test day.</font></p>
      <font size="2" face="Arial, Helvetica, sans-serif">We have developed a product 
      <em> <strong>designed specifically</strong></em> for these tests; for helping 
      you learn to beat your test time. Almost everyone feels rushed, and almost 
      all test takers can <em><strong>NOT</strong></em> finish on time. Using 
      pacing techniques during practice <em><strong>WILL</strong></em> help you 
      be more prepared for test day.</font> <p><font size="2" face="Arial, Helvetica, sans-serif">With 
        our timer, you enter your test time and the number of questions on your 
        test. </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" face="Times New Roman, Times, serif"><a href="http://www.silenttimer.com">THE 
        SILENT TIMER</a></font>&#8482;</strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
        then tells you exactly how much time you have to answer each question 
        you are on. There is no more guessing, &quot;Have I spent too much time 
        on this question&quot;. There is no more mental division in trying to 
        figure out how much time you have left. <a href="demo.php">Try out our 
        online demo before you place your order.</a></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Remember that not
          all testing administrations will allow the use of desktop timers during
          the test (e.g. MCAT, GRE, GMAT). If you're concerned,
          check with your testing administration. </font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a><font size="2" face="Arial, Helvetica, sans-serif"><br>
        </font></p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><a name="2" id="2"></a></font></strong></font><font color="#000000"><strong>Silence 
      is Golden</strong></font></strong></font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr valign="top"> 
    <td colspan="2" align="left"> <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" face="Times New Roman, Times, serif"><a href="http://www.silenttimer.com">THE 
        SILENT TIMER</a></font>&#8482;</strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
        is completely silent and incapable of noise. This is perfect when you 
        are studying for your test and for actual use on test day. No more disturbing 
        your friends while you study, or getting removed from your testing center 
        because of a loud, blaring alarm. It used to be hard to find a quiet, 
        silent, timer you could use on your test; but not any more. Yes, silence 
        is truly golden. </font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a></p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><a name="3" id="3"></a></font></strong></font><font color="#000000">The 
      Testing LCD Screen has Some Really Cool Features!</font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr valign="top"> 
    <td colspan="2" align="left"> <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Your 
        timer needs to be silent, but that's not all it needs. It also should 
        give you up to the second, question specific time data. </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" face="Times New Roman, Times, serif"><a href="http://www.silenttimer.com">THE 
        SILENT TIMER</a></font>&#8482;</strong></font> <font size="2" face="Arial, Helvetica, sans-serif">does 
        just that.</font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Here 
        is an enlarged view of the timer's LCD screen:</font></p>
      <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><img src="pics/LCD-Layout.jpg" alt="Quiet- The Silent Timer LCD Screen Features" width="448" height="267" border="0" usemap="#Map2"></font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">The LCD 
        Screen is a large size so you can easily see your test's time statistics 
        on your desk. It is one inch tall and two inches wide. The picture above 
        shows you exactly what your screen will look like. Below you will find 
        an explanation of each item on the timer screen above.</font></p>
      <blockquote> 
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a name="a"></a>1. 
          Total Test Time</strong></font></p>
        <p align="left"> <font size="2" face="Arial, Helvetica, sans-serif">This
            is the total amount of time you entered for your test or practice
            session. It counts up or counts down depending on the setting used.
            In the picture above, the amount of time entered by the user is 35
          minutes. In Clock Mode it displays the clock time.</font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a name="b"></a>2. 
          Number of Questions on your Test</strong></font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">One 
          of the unique features of </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" face="Times New Roman, Times, serif"><a href="http://www.silenttimer.com">THE 
          SILENT TIMER</a></font>&#8482;</strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
          is the ability to enter in the number of questions on your test. This 
          number, indicated by the #2, shows how many questions you have left 
          on your test. In the picture above, the user has 25 remaining questions.</font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a name="c"></a>3. 
          Average Time Per Question</strong></font></p>
        <p align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">After 
          entering in the <a href="#a">total time</a> on your test and the <a href="#b">number 
          of questions</a> on your test, <font color="#000066">the 
          timer </font> calculates the average time per question (dividing the 
          total test time by the number of questions entered). In the picture 
          above, the user has 1 minute and 24 seconds, on average, to complete 
          each question. If you answer each question within this average time, 
          then you will finish the test on time.</font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><em><strong>For 
          example</strong></em>: on a 35 minute section with 28 questions, the 
          timer shows 01:15 available per question. If you take 5 minutes on the 
          first question, then the average time per question drops to 01:06.</font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a name="d"></a>4. 
          Current Question Time Count-Down</strong></font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">As 
          you work your questions, this number counts down for the question you 
          are on. The user in the picture above has 29 seconds to finish their 
          question before they lose time on the remaining questions.</font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a name="e"></a>5. 
          Number of Questions Answered</strong></font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">This 
          number is the number of questions you have answered. The user above 
          has not finished any questions yet. After you finish your question, 
          you can press the red, answer button located on the top of the timer. 
          This will add one to <a href="#e">#5</a> and subtract one from <a href="#b">#2</a> 
          (indicating that you have answered one question and have 24 questions 
          remaining).</font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a name="f"></a>6. 
          Count-Down Icon</strong></font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">The 
          icon as shown indicates that the <a href="#a">total test time</a> is 
          counting down from the starting time. If it had been an up arrow, it 
          would indicate that the total test time is counting up. You can switch 
          between count down and count up during a test simply by pressing &quot;<a href="#j">SET</a>&quot;.<strong> 
          </strong>When the total time reaches zero, it continutes counting in 
          the negatives.</font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a name="g"></a>7. 
          Alert Light Icon</strong></font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">If 
          the alert icon is displayed (as shown in the picture above), then the 
          light will flash at the specified times. If you do not want the light 
          to flash, press &quot;<a href="#n">LIGHT</a>&quot; and the light icon 
          will disappear, indicating that it is off and will not flash at all.</font></p>
      </blockquote>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Hopefully 
        this gives you a better idea of the information </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" face="Times New Roman, Times, serif"><a href="http://www.silenttimer.com">THE 
        SILENT TIMER</a></font>&#8482;</strong></font> <font size="2" face="Arial, Helvetica, sans-serif">can 
        give you during your exam. <a href="demo.php">Try our online demo to get 
        an even better idea of how this test timer works</a>.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a></p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399"><font color="#FF0000"><a name="4" id="4"></a></font></font></strong></font><font color="#000000">The 
      Red, Answer Button</font></font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="2"><p align="left"><font size="2" face="Arial, Helvetica, sans-serif">The 
        red, answer button on </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" face="Times New Roman, Times, serif"><a href="http://www.silenttimer.com">THE 
        SILENT TIMER</a></font>&#8482;</strong></font><strong><font size="2" face="Arial, Helvetica, sans-serif"> </font></strong><font size="2" face="Arial, Helvetica, sans-serif">is 
        used to advance you to the next question on your test. When you push this 
        button on top of the timer, the numbers are recalculated on the <a href="#3">LCD 
        screen</a>, and the &quot;<a href="#d">Question Count-Down</a>&quot; starts 
        over from the new <a href="#c">average time per question</a>.</font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Using 
        the Answer button is the key for 'up to the second' timing details about 
        each question on your test. <a href="demo.php">Use our online demo</a> 
        for a good example of how the button works.</font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">The Answer 
        button does not need to be pushed after every question. You can choose 
        to push it every five questions if you like. However, the average time 
        per question will be slightly inaccurate. With practice, you will find 
        that pressing the Answer button after every question is not distracting 
        in the least.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a><br>
      </p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><a name="5" id="5"></a></font></strong></font><font color="#000000">Red, 
      Flashing Alert Light</font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr align="left" valign="top"> 
    <td colspan="2"> 
      <table width="30" border="0" cellspacing="0" cellpadding="6" class = "right">
        <tr> 
          <td><div align="center"><img src="pics/light-close.jpg" alt="The Silent Timer uses a flashing red light for your test" width="204" height="185"></div></td>
        </tr>
      </table>
      <font size="2" face="Arial, Helvetica, sans-serif">Remember, when it comes 
      to timing your test, silence is golden. For this exact reason, our timer 
      comes equipped with a pleasant, red light that flashes when it needs your 
      attention. </font> 
      <p><font size="2" face="Arial, Helvetica, sans-serif">The flashing light 
        alerts you at three important times throughout your exam:</font></p>
      <ul>
        <li><strong><font size="2" face="Arial, Helvetica, sans-serif">1 Minute 
          Remaining<br>
          </font></strong><font size="2" face="Arial, Helvetica, sans-serif">When 
          your <a href="#a">total test time</a> drops below 1 minute, the light 
          starts flashing to let you know time is almost up. The light will continue 
          to flash until you press the &quot;LIGHT&quot; button or until the total 
          test time reaches zero.<br>
          </font></li>
        <li><strong><font size="2" face="Arial, Helvetica, sans-serif">Half Way 
          Through</font></strong><font size="2" face="Arial, Helvetica, sans-serif"><br>
          The light also will flash 5 times when you are halfway through with 
          the <a href="#a">total test time</a>. For example, if your total test 
          time is 60 minutes long, the timer will flash 5 times when you have 
          30 minutes remaining.<br>
          </font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><strong>Spending 
          Too Much Time on a Question</strong><br>
          One of the coolest features of </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" face="Times New Roman, Times, serif"><a href="http://www.silenttimer.com">THE 
          SILENT TIMER</a></font>&#8482;</strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
          is that it tells you how much time you can spend on each question throughout 
          your exam. This way, you know if you are spending too much time on a 
          question, which can hurt your test score significantly. So, what better 
          time to flash our red light at you, than when you have spent too much 
          time on your <a href="#d">current question</a>?</font></li>
      </ul>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Of course, the alert 
        light can easily be turned off if you don't want its helping hand by pressing 
        &quot;<a href="#n">LIGHT</a>&quot;. </font></p>
      <p>&nbsp;</p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a><br>
      </p></td>
  </tr>
  <tr bgcolor="#FFFFCC"> 
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><a name="6" id="6"></a></font></strong></font><font color="#000000">Test 
      Memory Buttons</font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr align="left" valign="top"> 
    <td colspan="2"> 
      <table width="30" border="0" cellspacing="0" cellpadding="6" class="right">
        <tr>
          <td><div align="center"><img src="pics/test-memories.jpg" alt="The Silent Timer has preset memory buttons for the LSAT, MCAT, SAT, and ACT." width="193" height="141" border="0" usemap="#Map3"></div></td>
        </tr>
      </table>
      <font size="2" face="Arial, Helvetica, sans-serif">Because </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" face="Times New Roman, Times, serif"><a href="../index.php">THE 
      SILENT TIMER</a></font>&#8482;</strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
      is designed to benefit students taking standardized tests, we added test 
      memory buttons for a few very important tests: The <a href="../testhome/lsat.php">LSAT</a>, 
      <a href="../testhome/mcat.php">MCAT</a>, <a href="../testhome/sat.php">SAT</a>, 
      and <a href="../testhome/act.php">ACT</a>. Obviously, you can still use 
      </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" face="Times New Roman, Times, serif"><a href="http://www.silenttimer.com">THE 
      SILENT TIMER</a></font>&#8482;</strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
      if you are not taking one of these tests.</font> 
      <p><font size="2" face="Arial, Helvetica, sans-serif">These buttons are 
        used to quickly enter the correct time for your test. So, if you are taking 
        one of these exams, you will never have to use our <a href="#8">keypad</a> 
        to enter in your test time, or remember how much time you should enter. 
        Your test times are stored in our memory!</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>The times 
        stored into the timer's memory are the following:</strong></font></p>
      <table width="300" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Test</font></strong></div></td>
          <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">2004
                  Version</font></strong></div></td>
          <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">2005
                  Version</font></strong></div></td>
        </tr>
        <tr>
          <td width="43"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a name="p"></a><a href="../handbook/standardizedtest/lsat/index.php">LSAT</a></strong></font></td>
          <td width="241"><font size="2" face="Arial, Helvetica, sans-serif">35m, 30m</font></td>
          <td width="241"><font size="2" face="Arial, Helvetica, sans-serif">35m,
          30m </font></td>
        </tr>
        <tr>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><a name="q"></a><a href="../handbook/standardizedtest/mcat/index.php">MCAT</a></strong></font></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">1h 40m, 1h 25m, 
            1h</font></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">1h 40m, 1hr
              25min, 30m </font></td>
        </tr>
        <tr>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><a name="r"></a><a href="../handbook/standardizedtest/sat/index.php">SAT</a></strong></font></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">30m, 15m</font></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">20m, 25m, 35m
              (The new SAT times) </font></td>
        </tr>
        <tr>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><a name="s"></a><a href="../handbook/standardizedtest/act/index.php">ACT</a></strong></font></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">35m, 45m, 1h</font></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">35m, 45m, 1h </font></td>
        </tr>
      </table>
      <p><font size="2" face="Arial, Helvetica, sans-serif">To recall the times 
        from memory, all you need to do is press &quot;<a href="#h">TIME</a>&quot;, 
        then press your corresponding test's memory button. By pressing the test 
        button repeatedly, you rotate through each time for your test.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Remember, you can 
        also <a href="#k">store special times into memory</a> for easy recall.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a></p></td>
  </tr>
  <tr bgcolor="#FFFFCC"> 
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><a name="7"></a></font></strong></font><font color="#000000">Control 
      Buttons </font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr align="left" valign="top"> 
    <td colspan="2"> <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">These 
        few buttons are the key to controlling your timer's features. Here, we 
        will walk you through a brief explanation of how it works.</font></p>
      <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><img src="pics/buttons-right.jpg" alt="With The Silent Timer, you can easily control your test taking time." width="328" height="198" border="0" usemap="#Map4"></font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="h"></a>Time</font></strong><br>
        You press &quot;TIME&quot; before entering the amount of time on your 
        test. Press &quot;TIME&quot;, and your <a href="#a">total test time</a> 
        will start flashing. Then, enter your test time with either the <a href="#6">test 
        memory buttons</a>, <a href="#k">custom memory buttons</a>, or the <a href="#8">timer 
        keypad</a>.</font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="i"></a># 
        of Q's</font></strong><br>
        Press &quot;# of Q's&quot; before entering the <a href="#b">number of 
        questions</a> on your test. The number of questions will begin flashing 
        on your <a href="#3">LCD screen</a>. Then, use the <a href="#8">keypad</a> 
        or <a href="#k">custom memory buttons</a> to enter your number of questions.</font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="j"></a>Start/Stop</font></strong><br>
        This button does what it sounds like. After you have entered your test 
        time and number of questions, press &quot;Start/Stop&quot; and your timing 
        adventure begins. You may also pause and re-start your time during the 
        count down using this button. When you are done with your test, press 
        &quot;Start/Stop&quot; before pressing &quot;<a href="#m">CLEAR</a>&quot; 
        to re-set the screen.</font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="k"></a>MEM 
        1 and MEM 2</font></strong><br>
        </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" face="Times New Roman, Times, serif"><a href="http://www.silenttimer.com">THE 
        SILENT TIMER</a></font>&#8482;</strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
        also comes with two fully programmable memory buttons. For each button 
        you can store a test time and number of questions combination. So, if 
        you know your test will be 1 hour long and have 70 questions, you can 
        easily program this custom information into the timer.</font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">To store 
        the information into the timer, enter the time and number of questions 
        following the instructions above. Make sure your LCD is not flashing. 
        Then, hold down either memory button for 4 seconds. Voila, your memory 
        is stored and can be called from memory easily later on.</font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="l"></a>SET</font></strong><br>
        While testing, press &quot;SET&quot; to move between Count Up and Count 
        Down. You can do this WHILE the time is counting down! So, if you start 
        off counting your time down, you can press &quot;SET&quot; to automatically 
        see your time in Count-Up mode and vice versa.</font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">The &quot;SET&quot; 
        button is also used to set your clock and alarm when you are not testing.</font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="m"></a>CLEAR</font></strong><br>
        After finishing a test, press &quot;STOP&quot;, then &quot;CLEAR&quot;. 
        Your previous test time and number of questions is automatically recalled 
        to the screen. If you press &quot;CLEAR&quot; again, all numbers on your 
        screen return to zero, and you can enter a new time and number of questions.</font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="n"></a>LIGHT</font></strong><br>
        This button turns the <a href="#5">alert light</a> on and off. If the 
        light is on, you will see the <a href="#5">light icon</a> on your <a href="#3">LCD 
        screen</a>. While the light is flashing during your test, you can press 
        &quot;LIGHT&quot; to stop its flashing.</font></p>
      <p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong><a name="o"></a>MODE<br>
        </strong> <font size="2">You press &quot;MODE&quot; to switch between
         CLOCK and TEST MODE. By default, your timer will start 
        off in TEST MODE when it is first turned on. You press &quot;MODE&quot; 
        until you get to CLOCK MODE.<br>
        </font></font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a></p></td>
  </tr>
  <tr bgcolor="#FFFFCC"> 
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><a name="8" id="8"></a></font></strong></font><font color="#000000">Keypad 
      Entry </font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="2"><table width="30" border="0" cellspacing="0" cellpadding="6" class="right">
        <tr> 
          <td><div align="center"><img src="pics/buttons-left.jpg" alt="With The Silent Timer, you can use this keypad to enter your test time or number of questions." width="283" height="225"></div></td>
        </tr>
      </table>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">You can 
        enter in your <a href="#a">test time</a> and <a href="#b">number of questions</a> 
        manually with our simple timer keypad, as opposed to using the <a href="#6">pre-set 
        memory buttons</a> or <a href="#k">user-defined memory buttons</a>.</font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">But, 
        the last thing you want to do is to fumble with entering things into your 
        timer when you are between sections on test day. After you have entered 
        your information once, <a href="#k">store it into memory</a>. This way, 
        you don't have to waste time entering your test specs each time you study 
        or when you are getting ready to take your exam section.</font></p>
      <p align="left">&nbsp;</p>
      <p align="left">&nbsp;</p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a></p></td>
  </tr>
</table>
<p> 
</p>
<map name="Map2">
  <area shape="rect" coords="93,4,139,92" href="#e">
  <area shape="rect" coords="142,4,185,92" href="#b">
  <area shape="rect" coords="202,4,245,83" href="#f">
  <area shape="rect" coords="365,50,447,88" href="#g">
  <area shape="rect" coords="34,104,187,140" href="#c">
  <area shape="rect" coords="36,149,187,184" href="#d">
  <area shape="poly" coords="202,169,202,95,392,94,392,169,308,169,308,231,273,230,273,169,271,169" href="#a">
</map>
<map name="Map3">
  <area shape="rect" coords="17,34,93,72" href="#p">
  <area shape="rect" coords="105,35,180,72" href="#q">
  <area shape="rect" coords="17,87,91,124" href="#r">
  <area shape="rect" coords="105,86,178,125" href="#s">
</map>
<map name="Map4">
  <area shape="rect" coords="19,15,106,59" href="#h">
  <area shape="rect" coords="122,14,211,60" href="#i">
  <area shape="rect" coords="223,15,312,61" href="#j">
  <area shape="rect" coords="16,74,109,123" href="#k">
  <area shape="rect" coords="18,135,106,180" href="#k">
  <area shape="rect" coords="122,73,211,120" href="#l">
  <area shape="rect" coords="224,75,312,121" href="#m">
  <area shape="rect" coords="122,137,210,181" href="#n">
  <area shape="rect" coords="225,137,313,181" href="#o">
</map>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>
