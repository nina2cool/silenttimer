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
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><a name="top"></a>FAQ
- Functionality</strong></font></p>
<table width="100%" border="0">
  <tr>
    <td width="56%"><ul>
      <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#1">Can
              I switch between count down and count up while time is running?</a></font></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#11">Where is the battery?</a></font></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#12">How do I insert the
                  battery?</a></font></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#2">What is the maximum time I can input?</a></font></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#3">What is the maximum number of questions I can input into
              the timer?</a></font></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#4">How do I turn the sound on and off?</a></font></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#5">Do the preset test buttons (LSAT, MCAT, SAT, and ACT) store
              number of questions?</a></font></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#6">Can I turn <font color="#000066" face="Times New Roman, Times, serif"><strong>THE
              SILENT TIMER</strong></font><strong><font color="#000033" face="Times New Roman, Times, serif"><font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></font></strong> off?</a></font></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#8">Can I view the clock during a test?</a></font></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#10">How do I turn the light on/off?</a></font></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#10">How
            do I switch to 'Alarm Mode'?</a></font></li>
    </ul></td>
    <td width="44%"><img src="../gallery/pics/small/light-desk-cool-back.jpg" width="200" height="150"></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><br>
  If you still need more help or information after browsing through the site, 
  don't hesitate to <a href="../contactus.php">contact us</a> at any time. We 
  even have AOL instant messenger (screen name: SilentTimer) so that we may serve 
  you better!</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="faq.php">Back
      to FAQ Home Page</a><br>
  </font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr> 
    <td width="97%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="1"></a></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><strong>Can
      I switch between count down and count up while time is running?</strong></font></strong></font></strong></font></strong></font></strong></td>
    <td width="3%" align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr align="left" valign="top"> 
    <td colspan="2"> <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Yes.
          When time is running, press <strong>SET</strong>. This will toggle
          between count down and count up. If you did not enter a total time,
          and started in count up mode, then you cannot switch to count down
          because there is nothing to count down from. </font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a><font size="2" face="Arial, Helvetica, sans-serif"><br>
    </font></p></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="11" id="11"></a>Where
              is the battery? </strong></font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"><div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr valign="top">
    <td colspan="2" align="left"><p><font size="2" face="Arial, Helvetica, sans-serif">The
          battery is located inside the timer box. It fits into the plastic mold
          and is behind the Quick Start Card.</font></p>
        <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^
                Back to Top</font></strong></a></p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="12" id="12"></a>How
              do I insert the battery? </strong></font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr valign="top"> 
    <td colspan="2" align="left"> <p><font size="2" face="Arial, Helvetica, sans-serif">To
          insert the battery, open the battery compartment on the back of the
          timer. Slide the battery in between the metal slot and the timer, with
          the words facing upwards. If your timer does not turn on right away,
          you probably put the battery in upside down. If you are still having
          trouble, please <a href="../contactus.php">call us</a>.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
    Back to Top</font></strong></a></p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="3"></a>What
    is the maximum number of questions I can input into the timer?</strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr valign="top"> 
    <td colspan="2" align="left"> <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">The
          maximum number of questions is 99. If your test has more than 99
          questions, you might have to be creative with how you track your
          time. </font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
    Back to Top</font></strong></a></p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="4"></a>How 
      do I turn the sound on and off?</strong></font><font color="#003399"></font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="2"><p align="left"><font size="2" face="Arial, Helvetica, sans-serif">The 
        whole purpose of <font color="#000066" face="Times New Roman, Times, serif"><strong>THE 
        SILENT TIMER</strong></font><strong><font color="#000033" face="Times New Roman, Times, serif"><font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></font></strong> 
        is to be silent. This enables you to use your timer on test day. It is 
        incapable of making any noise as it has been designed to be completely 
        silent. There is no sound to turn off.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a><br>
      </p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="5"></a>Do
          the preset test buttons (LSAT, MCAT, SAT, and ACT*) store number of
    questions?</strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr align="left" valign="top"> 
    <td colspan="2"> <p><font size="2" face="Arial, Helvetica, sans-serif">No,
          they only store the times that are used during the test. The number
          of questions varies, so it cannot be predicted how many there will
          be. If you want to store times and questions, use the user-defined
          memory buttons <strong>MEM1</strong> and <strong>MEM2</strong>.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">The preset test buttons
          store the following times (in the 2005 Version):</font></p>
      <table width="40%" height="100" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
        <tr>
          <td><p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong> ACT </strong></font></p></td>
          <td><p align="center"><font size="2" face="Arial, Helvetica, sans-serif"> 0:35:00<br>
              </font><font size="2" face="Arial, Helvetica, sans-serif">0:45:00<br>
          </font><font size="2" face="Arial, Helvetica, sans-serif">1:00:00</font></p></td>
        </tr>
        <tr>
          <td><p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong> LSAT </strong></font></p></td>
          <td><p align="center"><font size="2" face="Arial, Helvetica, sans-serif"> 0:35:00<br>
          </font><font size="2" face="Arial, Helvetica, sans-serif">0:30:00</font></p></td>
        </tr>
        <tr>
          <td><p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong> MCAT </strong></font></p></td>
          <td><p align="center"><font size="2" face="Arial, Helvetica, sans-serif"> 1:40:00<br>
              </font><font size="2" face="Arial, Helvetica, sans-serif">1:25:00<br>
        0:30:00</font></p></td>
        </tr>
        <tr>
          <td><p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong> SAT </strong></font></p></td>
          <td><p align="center"><font size="2" face="Arial, Helvetica, sans-serif"> 0:20:00<br>
              </font><font size="2" face="Arial, Helvetica, sans-serif">0:25:00<br>
          </font><font size="2" face="Arial, Helvetica, sans-serif">0:35:00</font></p></td>
        </tr>
      </table>      
      <p><font size="2" face="Arial, Helvetica, sans-serif">Note: You do not have to use the preset times. The Timer can be set
        up for any test time and number of questions.</font> </p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a><br>
    </p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="6"></a>Can
    I turn </strong></font><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" face="Times New Roman, Times, serif">THE
    SILENT TIMER</font></strong>&#8482;</font><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> off?</strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr align="left" valign="top"> 
    <td colspan="2"><p><font size="2" face="Arial, Helvetica, sans-serif">No.
          However, i t has been designed to use minimal power during Clock Mode.
          If you wish to conserve battery power, leave the timer in Clock Mode
          when idle. </font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a></p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="8"></a>Can
    I view the clock during a test?</strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr align="left" valign="top"> 
    <td colspan="2"> <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Yes,
          you can. While time is running (during Test Mode), press <strong>MODE</strong>.
          The current time will display on the screen for 3 seconds and then
          return without interrupting the test session. </font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
    Back to Top</font></strong></a></p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="10" id="10"></a>How
    do I turn the light on/off?</strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="2"> <p><font size="2" face="Arial, Helvetica, sans-serif">Use
          the <strong>LIGHT</strong> button on the bottom left corner of the
          control keypad. A light icon appears above the total time if the light
          is on, and disappears when off.</font></p>      
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
    Back to Top</font></strong></a></p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="10" id="10"></a>How 
      do I switch to 'Alarm Mode'?</strong></font></td>
    <td bgcolor="#003399"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></td>
  </tr>
  <tr> 
    <td colspan="2"><p><font size="2" face="Arial, Helvetica, sans-serif">According
           to <font color="#000066" face="Times New Roman, Times, serif"><strong>THE
        SILENT TIMER</strong></font><strong><font color="#000033" face="Times New Roman, Times, serif"><font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></font></strong> manual
        that is included with each timer, there is  an 'Alarm Mode' where an
        alarm can be set. <strong><font color="#000066" face="Times New Roman, Times, serif">THE
         SILENT TIMER</font><font color="#000033" face="Times New Roman, Times, serif"><font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></font></strong> 
        no longer has this feature because it was unneeded and caused some confusion.
        It was removed in the 2004 version. Any timers (2003 Version) purchased
        starting April 1, 2004 will not have this feature. We apologize for any
        confusion or inconvenience this may have caused you.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a></p></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="faq.php">Back
to FAQ Home Page</a></font></p>
<p align="left">&nbsp;</p>
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>