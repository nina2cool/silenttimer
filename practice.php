<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> 
<p><font color="#33CC33" size="3" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="5">Timing
        is Everything! </font></strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Before taking an important
    standardized test, students will try almost anything to see their test scores
go up. They&rsquo;ll:</font><font size="2" face="Arial, Helvetica, sans-serif"><o:p></o:p></font></p>
<UL style="MARGIN-TOP: 0in" type=disc>
  <LI class=MsoNormal 
style="MARGIN: 0in 0in 0pt; mso-list: l1 level1 lfo1; tab-stops: list .5in"><font size="2" face="Arial, Helvetica, sans-serif">take
    a prep course 
  </font>
  <LI class=MsoNormal 
style="MARGIN: 0in 0in 0pt; mso-list: l1 level1 lfo1; tab-stops: list .5in"><font size="2" face="Arial, Helvetica, sans-serif">take
    practice exams 
  </font>
  <LI class=MsoNormal 
style="MARGIN: 0in 0in 0pt; mso-list: l1 level1 lfo1; tab-stops: list .5in"><font size="2" face="Arial, Helvetica, sans-serif">eat
    brain food 
  </font>
  <LI class=MsoNormal 
style="MARGIN: 0in 0in 0pt; mso-list: l1 level1 lfo1; tab-stops: list .5in"><font size="2" face="Arial, Helvetica, sans-serif">exercise 
    
  </font>
  <LI class=MsoNormal 
style="MARGIN: 0in 0in 0pt; mso-list: l1 level1 lfo1; tab-stops: list .5in"><font size="2" face="Arial, Helvetica, sans-serif">use
  memory aids<o:p>&nbsp;</o:p></font></LI>
</UL>
<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><font size="2" face="Arial, Helvetica, sans-serif">&hellip;and
    the list goes on.<SPAN 
style="mso-spacerun: yes">&nbsp; </SPAN>Many of these students, however, neglect
  to practice an aspect of the test that can be easily learned with practice:
  their <strong>TIMING</strong>.</font></P>
<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><font size="2" face="Arial, Helvetica, sans-serif"><o:p>&nbsp;</o:p></font></P>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td bgcolor="#FFFFCC"><span class="MsoNormal"><em><font size="4"><strong><font color="#003399" face="Arial, Helvetica, sans-serif">Why
    is Timing so Important?</font></strong></font></em></span></td>
  </tr>
</table>
<P class=MsoNormal style="MARGIN: 0in 0in 0pt">&nbsp;</P>
<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><font size="2" face="Arial, Helvetica, sans-serif">As
    we all know, no test question will ever be repeated from one test to the
    next. The test&rsquo;s time limit,
  however, is always a given.<SPAN style="mso-spacerun: yes">&nbsp; </SPAN>The
  key to gaining a competitive edge is beating this time limit by developing
an effective pacing strategy before test day.</font></P>
<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><font size="2" face="Arial, Helvetica, sans-serif"><o:p>&nbsp;</o:p></font></P>
<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><font size="2" face="Arial, Helvetica, sans-serif">The
    Silent Timer&#8482; is the ideal
  tool for helping you hone your pacing skills as you prepare for your test.<SPAN 
style="mso-spacerun: yes">&nbsp; </SPAN>Its unique features train your brain
  to adopt a steady pace without sacrificing accuracy.<SPAN style="mso-spacerun: yes">&nbsp; </SPAN>With
  this innovative study aid, you can:<br>
</font></P>
<UL style="MARGIN-TOP: 0in" type=disc>
  <LI class=MsoNormal 
style="MARGIN: 0in 0in 0pt; mso-list: l0 level1 lfo2; tab-stops: list .5in"><font size="2" face="Arial, Helvetica, sans-serif">Finish
    more questions, on average, than before 
  </font>
  <LI class=MsoNormal 
style="MARGIN: 0in 0in 0pt; mso-list: l0 level1 lfo2; tab-stops: list .5in"><font size="2" face="Arial, Helvetica, sans-serif">Focus
    more on test material once you&rsquo;ve improved your pacing </font>
  <LI class=MsoNormal 
style="MARGIN: 0in 0in 0pt; mso-list: l0 level1 lfo2; tab-stops: list .5in"><font size="2" face="Arial, Helvetica, sans-serif">Feel
    more confident in completing your test on time 
  </font>
  <LI class=MsoNormal 
style="MARGIN: 0in 0in 0pt; mso-list: l0 level1 lfo2; tab-stops: list .5in"><font size="2" face="Arial, Helvetica, sans-serif">Reduce
    the nervousness and anxiety that are the results of poor pacing tactics 
  </font>
  <LI class=MsoNormal 
style="MARGIN: 0in 0in 0pt; mso-list: l0 level1 lfo2; tab-stops: list .5in"><font size="2" face="Arial, Helvetica, sans-serif"><strong><em>Practice
    your way to HIGHER test scores!</em></strong></font></LI>
</UL>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $https;?>timer/functions.php">Read more about The Silent Timer's features. </a></font></p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>