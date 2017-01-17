<?php

if(!$Submit)
{
	$startTime = time();

	setcookie ("startTime", $startTime, time() + 24 * 3600);
	
}
?>



<HTML>
<HEAD>
<TITLE>The Silent Timer - Surveys</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<link href="../code/style.css" rel="stylesheet" type="text/css">

<META name="description" content="The Silent Timer for the LSAT, MCAT, SAT, ACT, and more!">
<META name="keywords" Content="timer, silent, silent timer, LSAT, MCAT, ACT, SAT, GMAT, GRE, SAT II, debate, timer, test, tests, timers, silent timer, time, time manager, test timer, timing, reminder, timers, the silent timer, time schedule, silent reminder, vibrating alarm, electronic timer, electrical timer, silent alarm, silent test timer, reminder, personal timer, electic timer, countdown timer, count up timer, countup timer, count up, count down, silent alarm clock, alarm clock, silent alert, watch, silent watch, medication reminder, vibration alarm, speech timer, silent timer, meeting timer, debate timer, silent alarm, silent alarm watch, speaker timer, personal reminder, track time, manage time, time manager, medication reminder, watch, countdown timer, programmable timer, time management">

</HEAD>
<BODY BGCOLOR=#FFFFFF LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>
<!-- ImageReady Slices (timerSite.psd) -->
<TABLE WIDTH=822 BORDER=0 CELLPADDING=0 CELLSPACING=0 bordercolor="#000000">
  <TR>
		
    <TD height="156" COLSPAN=2 align="left" valign="top"> <a href="../index.php"><IMG SRC="../images/TopPic.gif" ALT="" WIDTH=822 HEIGHT=156 border="0"></a></TD>
		<TD>
			<IMG SRC="../images/spacer.gif" WIDTH=1 HEIGHT=156 ALT=""></TD>
	</TR>
	<TR>
		
    <TD width="161" height="10" ROWSPAN=2 align="left" valign="top" background="../images/behind-left-gray.gif"> 
      <a href="../index.php"><IMG SRC="../images/timer-pic.gif" ALT="" WIDTH=161 HEIGHT=48 border="0"></a></TD>
		
    <TD align="left" valign="top" background="../images/bottom-curve.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="57%"><table width="99%" border="0" cellspacing="0" cellpadding="4">
              <tr> 
                <td width="4%">&nbsp;</td>
                <td width="33%" class=box><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../order/index.php">Order 
                    Timer</a></font></div></td>
                <td width="29%" class=box><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../aboutus.php">About 
                    Us </a></font></div></td>
                <td width="34%" class=box> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../contactus.php">Contact 
                    Us</a></font></div>
                  <div align="right"></div></td>
              </tr>
            </table></td>
          <td width="43%"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><?php $now = date("M d Y H:i:s");  echo $now; ?></font></div></td>
        </tr>
      </table></TD>
		<TD>
			<IMG SRC="../images/spacer.gif" WIDTH=1 HEIGHT=32 ALT=""></TD>
	</TR>
	<TR>
		
    <TD width="661" ROWSPAN=2 align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="7">
        <tr>
          <td width="1%">&nbsp;</td>
          <td width="99%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td align="left" valign="top"> <p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">The 
                    Silent Timer Survey Intro</font><font size="5" face="Arial, Helvetica, sans-serif"><br>
                    </font></strong><font size="2" face="Arial, Helvetica, sans-serif">This 
                    survey is meant for students or professionals who have taken 
                    or are getting ready to take a standardized test such as the 
                    SAT, ACT, LSAT, or MCAT.</font></p>
                  <p><font size="2" face="Arial, Helvetica, sans-serif">We are 
                    developing a product (<font color="#000033">The Silent Timer</font>*) 
                    that will help test takers manage their time on these tests. 
                    <font color="#000033">The Silent Timer</font> does not beep 
                    or make any noise, therefore it can be used on test day.</font></p>
                  <p><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">The 
                    Silent Timer</font><font size="2" face="Arial, Helvetica, sans-serif"> 
                    keeps track of how much time is left on the test, how many 
                    questions have been completed on the test, and how many questions 
                    remain on the test. It also calculates the average time available 
                    per question. <em>For example</em>, if there are 35 minutes 
                    on the test, and there are 35 questions, the screen would 
                    display 1 minute per question. <font color="#000033">The Silent 
                    Timer</font> also keeps track of how much time is being spent 
                    per question. <em>For example</em>, the timer would count 
                    down from 1 minute to zero. If the per question count down 
                    drops below zero, the student has taken too much time on the 
                    question and the average time per question will decrease for 
                    the remaining questions on the test. </font><font size="2" face="Arial, Helvetica, sans-serif">The 
                    timer also flashes a small LED alerting the test taker when 
                    there is one minute remaining.</font></p>
                  <p><font size="2" face="Arial, Helvetica, sans-serif">By filling 
                    out this survey you will let us know how you feel about standardized 
                    tests. With your input, we will be able to help future test 
                    takers like yourself better manage their test time.</font></p>
                  <p><font size="2" face="Arial, Helvetica, sans-serif">Please 
                    answer all questions to the best of your ability. Base your 
                    responses on your current feelings about the time constraints 
                    of standardized tests.</font></p>
                  <p><font size="6" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="5">Pre-Market 
                    Standardized-Test Survey</font><br>
                    <font size="3">On Time Management<font size="2"><br>
                    </font></font></strong></font><font size="5" face="Arial, Helvetica, sans-serif"><font size="2">For 
                    <font color="#000033">The Silent Timer</font><font face="Arial, Helvetica, sans-serif"><br>
                    Helping you better manage test time, Timing Matters.</font></font></font></p>
                  <p><font face="Arial, Helvetica, sans-serif">Click or Write 
                    in your answer<br>
                    <em><strong><font color="#666666">19 Questions</font></strong></em></font></p>
                  <p><font face="Arial, Helvetica, sans-serif"><br>
                    </font></p></td>
              </tr>
              <tr> 
                <td align="left" valign="top"> <form action="<?echo $PHP_SELF ?>" method="post" name="frmSurvey" id="frmSurvey">
                    <table width="95%" border="0" cellspacing="0" cellpadding="0">
                      <tr> 
                        <td width="3%" align="left" valign="top"><strong><font size="3" face="Arial, Helvetica, sans-serif">1.</font></strong></td>
                        <td width="1%"><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                        <td width="96%" align="left" valign="top"> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>How 
                            important is getting a high score on your standardized 
                            test?</strong> (<em>Out of 5</em>)</font></p>
                          <p><font size="3" face="Arial, Helvetica, sans-serif">Not 
                            Important </font> 
                            <label> &nbsp; 
                            <input type="radio" name="question1Radio" value="1">
                            </label>
                            <label> 
                            <input type="radio" name="question1Radio" value="2">
                            </label>
                            <label> 
                            <input type="radio" name="question1Radio" value="3">
                            </label>
                            <label> 
                            <input type="radio" name="question1Radio" value="4">
                            </label>
                            <label> 
                            <input type="radio" name="question1Radio" value="5">
                            </label>
                            <label> </label>
                            <label> </label>
                            <label> </label>
                            <label> </label>
                            <label> </label>
                            <font size="3" face="Arial, Helvetica, sans-serif">&nbsp;Very 
                            Important</font> </p>
                          <p>&nbsp;</p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><strong><font size="3" face="Arial, Helvetica, sans-serif">2.</font></strong></td>
                        <td><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                        <td align="left" valign="top"> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Do 
                            standardized tests seem more difficult because of 
                            time constraints?</strong></font></p>
                          <p> 
                            <label> <font face="Arial, Helvetica, sans-serif"> 
                            <font size="3"> 
                            <input type="radio" name="question2Radio" value="y">
                            Yes</font></font></label>
                            <font size="3" face="Arial, Helvetica, sans-serif"><br>
                            <label> 
                            <input type="radio" name="question2Radio" value="n">
                            No</label>
                            </font> </p>
                          <p><br>
                          </p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><strong><font size="3" face="Arial, Helvetica, sans-serif">3.</font></strong></td>
                        <td><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                        <td align="left" valign="top"> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Would 
                            it be useful to have a <font color="#0000FF">special 
                            timer</font> that could help you manage time on your 
                            test?</strong></font></p>
                          <p> 
                            <label><font face="Arial, Helvetica, sans-serif"><font size="3"> 
                            <input type="radio" name="question3Radio" value="y">
                            Yes</font></font></label>
                            <font size="3" face="Arial, Helvetica, sans-serif"><br>
                            <label> 
                            <input type="radio" name="question3Radio" value="n">
                            No</label>
                            </font> </p>
                          <p></p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><strong><font face="Arial, Helvetica, sans-serif">4.</font></strong></td>
                        <td>&nbsp;</td>
                        <td align="left" valign="top"><p><strong><font size="3" face="Arial, Helvetica, sans-serif">Which 
                            test would you use the timer on? </font></strong><font size="3" face="Arial, Helvetica, sans-serif"><em>Select 
                            all that apply.</em></font></p>
                          <p> <font face="Arial, Helvetica, sans-serif"> 
                            <input name="checkboxQuestion4a" type="checkbox" id="checkboxQuestion4a" value="SAT">
                            SAT <br>
                            <input name="checkboxQuestion4b" type="checkbox" id="checkboxQuestion4b" value="ACT">
                            ACT<br>
                            <input name="checkboxQuestion4c" type="checkbox" id="checkboxQuestion4c" value="LSAT">
                            LSAT<br>
                            <input name="checkboxQuestion4d" type="checkbox" id="checkboxQuestion4d" value="MCAT">
                            MCAT<br>
                            <input name="checkboxQuestion4e" type="checkbox" id="checkboxQuestion4e" value="o">
                            Other 
                            <input name="txtQuestion4Other" type="text" id="txtQuestion4Other">
                            </font></p>
                          <p>&nbsp;</p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><strong><font size="3" face="Arial, Helvetica, sans-serif">5.</font></strong></td>
                        <td><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                        <td align="left" valign="top"> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Would 
                            you like to know the average time remaining per question?</strong></font></p>
                          <p> 
                            <label><font face="Arial, Helvetica, sans-serif"><font size="3"> 
                            <input type="radio" name="question5Radio" value="y">
                            Yes</font></font></label>
                            <font size="3" face="Arial, Helvetica, sans-serif"><br>
                            <label> 
                            <input type="radio" name="question5Radio" value="n">
                            No</label>
                            </font></p>
                          <p>&nbsp;</p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><strong><font size="3" face="Arial, Helvetica, sans-serif">6.</font></strong></td>
                        <td><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                        <td align="left" valign="top"> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Would 
                            you like to know how much time you have left on the 
                            current question?</strong> </font></p>
                          <p> 
                            <label><font face="Arial, Helvetica, sans-serif"><font size="3"> 
                            <input type="radio" name="question6Radio" value="y">
                            Yes</font></font></label>
                            <font size="3" face="Arial, Helvetica, sans-serif"><br>
                            <label> 
                            <input type="radio" name="question6Radio" value="n">
                            No</label>
                            </font></p>
                          <p>&nbsp;</p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><strong><font size="3" face="Arial, Helvetica, sans-serif">7.</font></strong></td>
                        <td><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                        <td align="left" valign="top"> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>What 
                            features would you like the testing timer to have?</strong> 
                            <em>Select all that apply.</em></font></p>
                          <p> 
                            <input name="checkboxQuestion7a" type="checkbox" id="checkboxQuestion7a" value="No sound">
                            <font size="3" face="Arial, Helvetica, sans-serif">No 
                            sound<strong><br>
                            <input name="checkboxQuestion7b" type="checkbox" id="checkboxQuestion7b" value="Per question time specifics">
                            </strong>Per question time specifics (time per question, 
                            count down from that time)<strong> <br>
                            <input name="checkboxQuestion7c" type="checkbox" id="checkboxQuestion7c" value="1 minute warning light">
                            </strong>1 minute warning light<strong> </strong>(near 
                            end of test section)<strong><br>
                            <input name="checkboxQuestion7d" type="checkbox" id="checkboxQuestion7d" value="5 minute warning light">
                            </strong>5 minute warning light<strong> </strong>(near 
                            end of test section)<strong></strong><strong><br>
                            <input name="checkboxQuestion7e" type="checkbox" id="checkboxQuestion7e" value="Warning light if too much time spent on current question">
                            </strong>Warning light if too much time spent on current 
                            question<strong> <br>
                            <input name="checkboxQuestion7f" type="checkbox" id="checkboxQuestion7f" value="Clock">
                            </strong>Clock<br>
                            <input name="checkboxQuestion7g" type="checkbox" id="checkboxQuestion7g" value="Alarm">
                            Alarm</font></p>
                          <p><font size="3" face="Arial, Helvetica, sans-serif"><strong> 
                            </strong></font></p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><strong><font face="Arial, Helvetica, sans-serif">8.</font></strong></td>
                        <td>&nbsp;</td>
                        <td align="left" valign="top"><p><font size="3" face="Arial, Helvetica, sans-serif"><strong>How 
                            much would you spend for a regular timer </strong>(not 
                            silent)<strong> for your test preparation?</strong></font></p>
                          <p> 
                            <input name="txtQuestion8" type="text" id="txtQuestion8">
                          </p>
                          <p>&nbsp;</p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><strong><font size="3" face="Arial, Helvetica, sans-serif">9.</font></strong></td>
                        <td><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                        <td align="left" valign="top"> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Would 
                            you pay more for a timer that included special testing 
                            features </strong>(A timer that is silent for test 
                            day, includes time information on each test question, 
                            etc.)<strong>?</strong></font></p>
                          <p> 
                            <label><font face="Arial, Helvetica, sans-serif"><font size="3"> 
                            <input type="radio" name="question9Radio" value="y">
                            Yes</font></font></label>
                            <font size="3" face="Arial, Helvetica, sans-serif"><br>
                            <label> 
                            <input type="radio" name="question9Radio" value="n">
                            No</label>
                            </font></p>
                          <p>&nbsp;</p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><strong><font size="3" face="Arial, Helvetica, sans-serif">10.</font></strong></td>
                        <td><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                        <td align="left" valign="top"> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Regular 
                            timers cost $16 and are not permissible on test day 
                            </strong>(they make noise)<strong>. Would you be willing 
                            to spend $30 for a special testing timer that would 
                            help you better manage your test time?</strong></font></p>
                          <p><font size="3" face="Arial, Helvetica, sans-serif"> 
                            <label><font face="Arial, Helvetica, sans-serif"><font size="3"> 
                            <input type="radio" name="question10Radio" value="y">
                            Yes</font></font></label>
                            <font size="3" face="Arial, Helvetica, sans-serif"><br>
                            <label> 
                            <input type="radio" name="question10Radio" value="n">
                            No</label>
                            <br>
                            <input type="radio" name="question10Radio" value="o">
                            </font></font><font size="3" face="Arial, Helvetica, sans-serif">Other 
                            amount? 
                            <input name="txtQuestion10Other" type="text" id="txtQuestion10Other">
                            </font></p>
                          <p><font size="3" face="Arial, Helvetica, sans-serif"><br>
                            </font></p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><strong><font size="3" face="Arial, Helvetica, sans-serif">11.</font></strong></td>
                        <td><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                        <td align="left" valign="top"> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>In 
                            addition to having a timer, would you like to be taught 
                            time-saving techniques</strong><strong>?</strong></font></p>
                          <p> 
                            <label><font face="Arial, Helvetica, sans-serif"><font size="3"> 
                            <input type="radio" name="question11Radio" value="y">
                            Yes</font></font></label>
                            <font size="3" face="Arial, Helvetica, sans-serif"><br>
                            <label> 
                            <input type="radio" name="question11Radio" value="n">
                            No</label>
                            </font></p>
                          <p>&nbsp;</p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><strong><font size="3" face="Arial, Helvetica, sans-serif">12.</font></strong></td>
                        <td><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                        <td align="left" valign="top"> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Are 
                            standardized tests difficult to finish within the 
                            time allotted?</strong></font></p>
                          <p> 
                            <label><font face="Arial, Helvetica, sans-serif"><font size="3"> 
                            <input type="radio" name="question12Radio" value="y">
                            Yes</font></font></label>
                            <font size="3" face="Arial, Helvetica, sans-serif"><br>
                            <label> 
                            <input type="radio" name="question12Radio" value="n">
                            No</label>
                            </font></p>
                          <p>&nbsp;</p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><strong><font size="3" face="Arial, Helvetica, sans-serif">13.</font></strong></td>
                        <td><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                        <td align="left" valign="top"> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>What 
                            other features would you like to see on your special 
                            testing timer? Please be very specific. The better 
                            ideas and feedback we get, the more useful the timer 
                            will be.</strong></font></p>
                          <p><font size="3" face="Arial, Helvetica, sans-serif"> 
                            <textarea name="txtQuestion13" cols="50" rows="5" id="txtQuestion13"></textarea>
                            </font></p>
                          <p>&nbsp;</p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><strong><font face="Arial, Helvetica, sans-serif">14.</font></strong></td>
                        <td>&nbsp;</td>
                        <td align="left" valign="top"><p><font size="3" face="Arial, Helvetica, sans-serif"><strong>In 
                            your opinion, what is the most important feature mentioned 
                            for this product?</strong> Choose only one.</font></p>
                          <p> 
                            <label> <font face="Arial, Helvetica, sans-serif"> 
                            <font size="3"> 
                            <input type="radio" name="question14Radio" value="No Sound">
                            No Sound</font></font></label>
                            <font size="3" face="Arial, Helvetica, sans-serif"><br>
                            <label> 
                            <input type="radio" name="question14Radio" value="Per question time specifics">
                            Per question time specifics</label>
                            <br>
                            <label> 
                            <input type="radio" name="question14Radio" value="Warning lights for nearing end of test and spending too much time per question">
                            Warning lights for nearing end of test and spending 
                            too much time per question</label>
                            <br>
                            <label> 
                            <input type="radio" name="question14Radio" value="Clock">
                            Clock</label>
                            <br>
                            <label> 
                            <input type="radio" name="question14Radio" value="Alarm">
                            Alarm</label>
                            </font></p>
                          <p><font size="3" face="Arial, Helvetica, sans-serif"> 
                            <label></label>
                            </font></p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><font face="Arial, Helvetica, sans-serif"><strong>15.</strong></font></td>
                        <td>&nbsp;</td>
                        <td align="left" valign="top"><p><font size="3" face="Arial, Helvetica, sans-serif"><strong>If 
                            you bought a timer specifically to prepare for a standardized 
                            test </strong>(one that did not make noise, and had 
                            extra features)<strong>, do you think you would use 
                            it on other occasions? If so, when?</strong> Choose 
                            all that apply.</font></p>
                          <p><font size="3" face="Arial, Helvetica, sans-serif"><strong> 
                            <input name="checkboxQuestion15a" type="checkbox" id="checkboxQuestion15a" value="Kitchen timer">
                            </strong>Kitchen timer<strong><br>
                            <input name="checkboxQuestion15b" type="checkbox" id="checkboxQuestion15b" value="Alarm Clock">
                            </strong>Alarm Clock<strong><br>
                            <input name="checkboxQuestion15c" type="checkbox" id="checkboxQuestion15c" value="Clock">
                            </strong>Clock<strong><br>
                            <input name="checkboxQuestion15d" type="checkbox" id="checkboxQuestion15d" value="Test in School">
                            </strong>Test in school<br>
                            <input name="checkboxQuestion15e" type="checkbox" id="checkboxQuestion15e" value="o">
                            Other 
                            <input name="txtQuestion15Other" type="text" id="txtQuestion15Other">
                            </font></p>
                          <p>&nbsp;</p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><strong><font size="3" face="Arial, Helvetica, sans-serif">16.</font></strong></td>
                        <td><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                        <td align="left" valign="top"> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Have 
                            you ever purchased anything online?</strong></font></p>
                          <p> 
                            <label><font face="Arial, Helvetica, sans-serif"><font size="3"> 
                            <input type="radio" name="question16Radio" value="y">
                            Yes</font></font></label>
                            <font size="3" face="Arial, Helvetica, sans-serif"><br>
                            <label> 
                            <input type="radio" name="question16Radio" value="n">
                            No</label>
                            , <em>Go to question 17.</em></font></p>
                          <p><font size="3" face="Arial, Helvetica, sans-serif"><em><strong>If 
                            yes</strong></em><strong>, what method of payment 
                            did you use?</strong> Select all that apply.</font></p>
                          <p><font size="3" face="Arial, Helvetica, sans-serif"><strong> 
                            <input name="checkboxQuestion16onea" type="checkbox" id="checkboxQuestion16onea" value="Credit Card">
                            </strong>Credit Card<strong><br>
                            <input name="checkboxQuestion16oneb" type="checkbox" id="checkboxQuestion16oneb" value="Paypal">
                            </strong>Paypal<strong><br>
                            <input name="checkboxQuestion16onec" type="checkbox" id="checkboxQuestion16onec" value="Check">
                            </strong>Check<strong><br>
                            <input name="checkboxQuestion16oned" type="checkbox" id="checkboxQuestion16oned" value="Bank Account">
                            </strong>Bank Account<br>
                            <input name="checkboxQuestion16onee" type="checkbox" id="checkboxQuestion16onee" value="o">
                            Other 
                            <input name="txtQuestion16Other" type="text" id="txtQuestion16Other">
                            </font></p>
                          <p><font size="3" face="Arial, Helvetica, sans-serif"><em><strong>If 
                            yes</strong></em><strong>, what method of payment 
                            do you prefer to use for purchasing goods on the Internet? 
                            </strong>Select all that apply</font></p>
                          <p><font size="3" face="Arial, Helvetica, sans-serif"><strong> 
                            <input name="checkboxQuestion16twoa" type="checkbox" id="checkboxQuestion16twoa" value="Credit Card">
                            </strong>Credit Card<strong><br>
                            <input name="checkboxQuestion16twob" type="checkbox" id="checkboxQuestion16twob" value="Paypal">
                            </strong>Paypal<strong><br>
                            <input name="checkboxQuestion16twoc" type="checkbox" id="checkboxQuestion16twoc" value="Check">
                            </strong>Check<strong><br>
                            <input name="checkboxQuestion16twod" type="checkbox" id="checkboxQuestion16twod" value="Bank Account">
                            </strong>Bank Account<br>
                            <input name="checkboxQuestion16twoe" type="checkbox" id="checkboxQuestion16twoe" value="o">
                            Other 
                            <input name="txtQuestion16Other2" type="text" id="txtQuestion16Other2">
                            </font></p>
                          <p>&nbsp;</p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><strong><font size="3" face="Arial, Helvetica, sans-serif">17.</font></strong></td>
                        <td><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                        <td align="left" valign="top"> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>If 
                            you needed a timer right now, where would you buy 
                            it?</strong> Choose only one.</font></p>
                          <p> 
                            <label> <font face="Arial, Helvetica, sans-serif"> 
                            <font size="3"> 
                            <input type="radio" name="question17Radio" value="Radio-Shack">
                            Radio Shack</font></font></label>
                            <font size="3" face="Arial, Helvetica, sans-serif"><br>
                            <label> 
                            <input type="radio" name="question17Radio" value="Walmart">
                            Wal-Mart</label>
                            <br>
                            <label> 
                            <input type="radio" name="question17Radio" value="Grocery Store">
                            Grocery Store</label>
                            <br>
                            <label> 
                            <input type="radio" name="question17Radio" value="Computer Store">
                            Computer Store</label>
                            <br>
                            <label> 
                            <input type="radio" name="question17Radio" value="o">
                            Other?</label>
                            <input name="txtQuestion17Other" type="text" id="txtQuestion14Other2">
                            </font><font size="3" face="Arial, Helvetica, sans-serif"> 
                            <label></label>
                            </font></p>
                          <p><font size="3" face="Arial, Helvetica, sans-serif"> 
                            <label></label>
                            </font></p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><strong><font size="3" face="Arial, Helvetica, sans-serif">18.</font></strong></td>
                        <td><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                        <td align="left" valign="top"> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>What 
                            is the main reason you would want a testing timer? 
                            </strong>Rank each choice from 1-5.</font></p>
                          <table width="100%" border="0" cellspacing="0" cellpadding="1">
                            <tr> 
                              <td width="3%">&nbsp;</td>
                              <td width="97%"><font size="3" face="Arial, Helvetica, sans-serif"> 
                                <label><font face="Arial, Helvetica, sans-serif"><font size="3" face="Arial, Helvetica, sans-serif"><strong>For 
                                test day</strong></font></font></label>
                                </font></td>
                            </tr>
                            <tr> 
                              <td>&nbsp;</td>
                              <td><label><font face="Arial, Helvetica, sans-serif">Not 
                                Important 
                                <input type="radio" name="question18Radio1" value="1">
                                </font></label> <font face="Arial, Helvetica, sans-serif"> 
                                <label> 
                                <input type="radio" name="question18Radio1" value="2">
                                </label>
                                <label> 
                                <input type="radio" name="question18Radio1" value="3">
                                </label>
                                <label> 
                                <input type="radio" name="question18Radio1" value="4">
                                </label>
                                <label> 
                                <input type="radio" name="question18Radio1" value="5">
                                </label>
                                Very Important</font></td>
                            </tr>
                            <tr> 
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr> 
                              <td>&nbsp;</td>
                              <td><font size="3" face="Arial, Helvetica, sans-serif"><font size="3" face="Arial, Helvetica, sans-serif"><strong>For 
                                practice </strong></font></font></td>
                            </tr>
                            <tr> 
                              <td>&nbsp;</td>
                              <td><label><font face="Arial, Helvetica, sans-serif">Not 
                                Important 
                                <input type="radio" name="question18Radio2" value="1">
                                </font></label> <font face="Arial, Helvetica, sans-serif"> 
                                <label> 
                                <input type="radio" name="question18Radio2" value="2">
                                </label>
                                <label> 
                                <input type="radio" name="question18Radio2" value="3">
                                </label>
                                <label> 
                                <input type="radio" name="question18Radio2" value="4">
                                </label>
                                <label> 
                                <input type="radio" name="question18Radio2" value="5">
                                </label>
                                Very Important</font></td>
                            </tr>
                          </table>
                          <p><font size="3" face="Arial, Helvetica, sans-serif"><font size="3" face="Arial, Helvetica, sans-serif"><br>
                            </font></font></p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><strong><font size="3" face="Arial, Helvetica, sans-serif">19.</font></strong></td>
                        <td><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                        <td align="left" valign="top"> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>GMAT 
                            and GRE question: even though the GMAT and GRE are 
                            computer based tests and time is kept by the computer, 
                            would it be useful to have a testing timer to help 
                            you during practice?</strong></font></p>
                          <p><font size="3" face="Arial, Helvetica, sans-serif"> 
                            <label><font face="Arial, Helvetica, sans-serif"><font size="3"> 
                            <input type="radio" name="question19Radio" value="y">
                            </font>Yes</font></label>
                            <font size="3" face="Arial, Helvetica, sans-serif"><br>
                            <label> 
                            <input type="radio" name="question19Radio" value="n">
                            </label>
                            No<br>
                            <input type="radio" name="question19Radio" value="Don't know">
                            </font>Don't know </font></p>
                          <p>&nbsp;</p></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                        <td><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                        <td align="left" valign="top"><font size="3" face="Arial, Helvetica, sans-serif"> 
                          <input type="Submit" name="Submit" value="Send Survey Data">
                          &nbsp; 
                          <input type="reset" name="Reset" value="Reset Survey">
                          </font></td>
                      </tr>
                    </table>
                  </form>
                  <p>&nbsp;</p></td>
              </tr>
            </table>
            <?php

		$location = "localhost";
		$user = "silenttimer";
		$pass = "2559";
		$db = "silenttimer";
		
		
		if($Submit)
		{
				
				$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
				mysql_select_db($db) or die("Cannot select Database");			
			
				$now = date("Y-m-d H:i:s");
				
				
				
				if (isset($HTTP_COOKIE_VARS['startTime']))
				{	
					$startTime = $HTTP_COOKIE_VARS['startTime'];
				
					$endTime = time();
					
					$timer = $endTime - $startTime;
					
				
				}
				else
				{
					$timer = 0;
				}


 				
				//putting form variables into PHP variables for sending to database
				//checks to see if Other boxes have text in them.  If they  do, then append other to the variable
				
				
				
				//
				//QUESTION 1
				
				$q1 = $question1Radio;
				
				
				
				
				//
				//QUESTION 2
				
				$q2 = $question2Radio;
				
				
				
				
				//
				//QUESTION 3
				
				$q3 = $question3Radio;
				
				
				
				//
				//QUESTION 4
				
				$q4array = array($checkboxQuestion4a, $checkboxQuestion4b, $checkboxQuestion4c, $checkboxQuestion4d, $checkboxQuestion4e);
				
				foreach($q4array as $value)
				{
					
					if ($value != "o")
					{
						if ($value != "")
						{
							$q4 .= $value;
							$q4 .= ", ";
						}
					}
					
				}
				
				if ($txtQuestion4Other != "")
				{
					$q4 .=  $txtQuestion4Other;
				}
				
				
				
				//
				//QUESTION 5
				
				$q5 = $question5Radio;
				
				
				
				//
				//QUESTION 6
				
				$q6 = $question6Radio;
				
				
				
				//
				//QUESTION 7
				
				$q7array = array($checkboxQuestion7a, $checkboxQuestion7b, $checkboxQuestion7c, $checkboxQuestion7d, $checkboxQuestion7e, $checkboxQuestion7f, $checkboxQuestion7g);
				
				foreach($q7array as $value)
				{
				
					if ($value != "")
					{
						$q7 .= $value;
						$q7 .= ", ";
					}

				}
				
				
				
				//
				//QUESTION 8
				
				$q8 = $txtQuestion8;
				
				
				
				//
				//QUESTION 9
				
				$q9 = $question9Radio;
				
				
				
				//
				//QUESTION 10
				
				if ($question10Radio == "o")
				{
				
					if ($txtQuestion10Other != "")
					{
						$q10 = $txtQuestion10Other;
					}
					else
					{
						$q10 = $question10Radio;
					}
					
				}
				else
				{
					$q10 = $question10Radio;
				}
				
				
				
				
				//
				//QUESTION 11
				
				$q11 = $question11Radio;
				
				
				
				//
				//QUESTION 12
				
				
				$q12 = $question12Radio;
				
				
				
				//
				//QUESTION 13

				$q13 = $txtQuestion13;
				
				
				
				//
				//QUESTION 14
				
				$q14 = $question14Radio;
				
				
				
				//
				//QUESTION 15
				
				$q15array = array($checkboxQuestion15a, $checkboxQuestion15b, $checkboxQuestion15c, $checkboxQuestion15d, $checkboxQuestion15e);
				
				foreach($q15array as $value)
				{
					
					if ($value != "o")
					{
						if ($value != "")
						{
							$q15 .= $value;
							$q15 .= ", ";
						}
					}
					
				}
				
				if ($txtQuestion15Other != "")
				{
					$q15 .=  $txtQuestion15Other;
				}
				
				
				
				//
				//QUESTION 16
				
				$q16 = $question16Radio;
				
				//16A
				
				$q16aarray = array($checkboxQuestion16onea, $checkboxQuestion16oneb, $checkboxQuestion16onec, $checkboxQuestion16oned, $checkboxQuestion16onee);
				
				foreach($q16aarray as $value)
				{
					
					if ($value != "o")
					{
						if ($value != "")
						{
							$q16a .= $value;
							$q16a .= ", ";
						}
					}
					
				}
				
				if ($txtQuestion16Other != "")
				{
					$q16a .=  $txtQuestion16Other;
				}
				
				//16B
				
				$q16barray = array($checkboxQuestion16twoa, $checkboxQuestion16twob, $checkboxQuestion16twoc, $checkboxQuestion16twod, $checkboxQuestion16twoe);
				
				foreach($q16barray as $value)
				{
					
					if ($value != "o")
					{
						if ($value != "")
						{
							$q16b .= $value;
							$q16b .= ", ";
						}
					}
					
				}
				
				if ($txtQuestion16Other2 != "")
				{
					$q16b .=  $txtQuestion16Other2;
				}
				
				
				//
				//QUESTION 17
				
				if ($question17Radio == "o")
				{
				
					if ($txtQuestion17Other != "")
					{
						$q17 = $txtQuestion17Other;
					}
					else
					{
						$q17 = $question17Radio;
					}
				
				}
				else
				{
					$q17 = $question17Radio;
				}
				
				
				
				//
				//QUESTION 18
				
				//18A
				
				$q18a = $question18Radio1;
				
				//18B
				
				$q18b = $question18Radio2;
				
				
				
				//
				//QUESTION 19
				
				$q19 = $question19Radio;
				
				
				
				
				//Send data to database

				$query = "INSERT INTO tblTimerSurvey2(q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14, q15, q16, q16a, q16b, q17, q18a, q18b, q19, dateTime, timer) 
						  VALUES ('$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10', '$q11', '$q12', '$q13', '$q14', '$q15', '$q16', '$q16a', '$q16b', '$q17', '$q18a', '$q18b', '$q19', '$now', '$timer')";
				mysql_query($query) or die("I cannot execute your request, please try again.  Sorry for the inconvenience. - erik@proace.com");
			
				mail("info@silenttimer.com", "New Timer survey", "New survey entry for $now...", "From:Timer Survey");

				echo "<p align='center'><font color='#0000FF' size='4' face='Arial, Helvetica, sans-serif'>Thank you for your input. Your testing time will now be better than ever!</font></p>";
				mysql_close($link);
				echo "<meta http-equiv='refresh' content='0;URL=thankyou.php'>"; 
		
		}

?>
            <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../index.php">Home</a> 
              - <a href="../order/index.php" >Order Timer</a> - <a href="../timer/index.php">Timer 
              Info</a> - <a href="../aboutus.php" >About Us</a> - <a href="../contactus.php">Contact 
              us</a> - <a href="../timer/faq.php">FAQ</a> - <a href="index.php">Surveys</a> 
              - <a href="../links.php">Testing Links</a></font></p>
            <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <a href="../legal/patentpending.php">Patent Pending</a> - <a href="../legal/terms.php">Terms 
              and Conditions</a><br>
              &copy; 2002-2003 Silent Technology LLC <em>All Rights Reserved.</em></font></p>
            <p>&nbsp;</p></td>
        </tr>
      </table> </TD>
		
    <TD height="18"> <IMG SRC="../images/spacer.gif" WIDTH=1 HEIGHT=16 ALT=""></TD>
	</TR>
	<TR>
		
    <TD width="161" align="left" valign="top" background="../images/behind-left-gray.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td align="left" valign="top"> 
            <table width="100%" border="0" align="left" cellpadding="6" cellspacing="0" bordercolor="#000000">
              <tr> 
                <td align="left" valign="top" class=box1> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../timer/index.php">About 
                    Silent Timer</a></font></div></td>
              </tr>
              <tr> 
                <td align="left" valign="top" class=box1> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../timer/why.php">Why 
                    Use this Timer?</a></font></div></td>
              </tr>
              <tr> 
                <td align="left" valign="top" class=box1> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../order/index.php">Order 
                    Your Timer</a></font></div></td>
              </tr>
              <tr> 
                <td align="left" valign="top" class=box1> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../timer/faq.php">FAQ</a></font></div></td>
              </tr>
              <tr> 
                <td align="left" valign="top" class=box1> <div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"><a href="index.php">Surveys</a></font> 
                  </div></td>
              </tr>
              <tr> 
                <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="../links.php">Testing 
                  Links </a></font></td>
              </tr>
              <tr> 
                <td align="left" valign="top" > 
                  <p><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                    Sign up to be notified when our product is ready!</strong></font></p>
                  <form action="<?echo $PHP_SELF ?>" method="post" name="frmEmail" id="frmEmail">
                    <font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Enter 
                    E-mail</strong></font><br>
                    <input name="txtEmail" type="text" id="txtEmail" size="10">
                    <input TYPE='submit' name="SubmitEmail" value="Go">
                  </form>

					
		<?php

		$location = "localhost";
		$user = "silenttimer";
		$pass = "2559";
		$db = "silenttimer";

		if($SubmitEmail)
		{
			
			If($txtEmail == "")
			{
				print "
				
				<p><font color='#CCCC00' size='2' face='Arial, Helvetica, sans-serif'><strong>You must 
  				at least enter your email address! Try again.</strong></font></p>
				
				";
				
				echo"<SCRIPT> document.frmEmail.txtEmail.focus()</SCRIPT>";
			}
			else
			{	
				$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
				mysql_select_db($db) or die("Cannot select Database");			
			
				$now = date("Y-m-d H:i:s");			
			
				$query = "INSERT INTO tblTimerContacts(email, date) VALUES ('$txtEmail','$now')";
				mysql_query($query) or die("I cannot execute your request, please try again.  Sorry for the inconvenience. - erik@proace.com");
			
				mail("info@silenttimer.com", "Timer Interest", "This email was submitted on $now...\n\nEmail: $txtEmail", "From:Timer Web Site User<$txtEmail>");
				
				mail("$txtEmail", "Thank you for your Silent Timer interest.", "Thank you for visiting the Silent Timer web site!\n\nThe site will be upgraded soon and you will be able to find out what the new Silent, Test-Taking Timer is all about.\n\nIf you would like to contact us, please email info@silenttimer.com.\n\nThank you,\n\nThe Silent Timer Team", "From: The Silent Timer Team<info@silenttimer.com>");

				echo "<p><font color='#CCCC00' size='2' face='Arial, Helvetica, sans-serif'><strong>You will be notified soon! Thank you for your interest.</strong></font></p>";
				mysql_close($link);
			}
		
		}
	
		?>
					
					
					</td>
              </tr>
            </table>
          </td>
          <td width="12" align="left" valign="top">&nbsp;</td>
        </tr>
      </table></TD>
		<TD>
			<IMG SRC="../images/spacer.gif" WIDTH=1 HEIGHT=396 ALT=""></TD>
	</TR>
</TABLE>
<!-- End ImageReady Slices -->
<p align="left">&nbsp;</p>
</BODY>
</HTML>


<?php

	if($Submit)
	{
		echo "<meta http-equiv='refresh' content='0;URL=thankyou.php'>"; 
	}

?>
