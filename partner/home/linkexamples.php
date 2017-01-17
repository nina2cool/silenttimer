<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

$PageTitle = "Silent Timer Partner - Link Examples";

//security check
If (session_is_registered('a'))
{

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<? $aID = $_SESSION['a']; ?>

<link href="../../code/style.css" rel="stylesheet" type="text/css">


			
<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Timer 
  Link Examples</font></strong></p>
            
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Here we have 
  compiled several examples that you may use as a guideline for your site. We 
  have included images and discussion about both the importance of timing yourself 
  during practice and the importance of security on test day.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Use these examples 
  as a starting point for creating your own links on your web site. We've shown 
  both detailed explanations and simple link combinations. <a href="links.php">Click 
  here to learn how to create your links to us</a>.</font></p>
            
<table width="100%" border="1" cellpadding="8" cellspacing="0" bordercolor="#003399">
  <tr>
    <td><table width="100" border="0" cellspacing="0" cellpadding="8" class="right">
        <tr>
          <td><div align="center">
              <table width="10" border="2" cellpadding="0" cellspacing="0" bordercolor="#000000">
                <tr>
                  <td><div align="center"><a href="https://secure.SilentTimer.com/order?a=<? echo $aID;?>" target="_blank"><img src="images/lsat/LSAT_improve_250x250.jpg" width="250" height="250" border="0"></a></div></td>
                </tr>
              </table>
            </div></td>
        </tr>
      </table>
      <font size="4" face="Arial, Helvetica, sans-serif"><strong> LSAT Timing 
      - You Need a Timer.</strong></font>
<p><font size="2" face="Arial, Helvetica, sans-serif">One of the reasons the LSAT 
        is so difficult is the time constraint. The LSAT is a grueling, three 
        and a half hour exam. Each multiple choice section is 35 minutes long 
        with an average of 25 questions. This gives you approximately 1 minute 
        and 24 seconds to answer every difficult question. On some questions you 
        only have 40 seconds. Yikes.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><em><strong>In fact</strong></em>, 
        time is a crucial factor in determining your score. The reason? With ample 
        time, many of your exam questions can be answered correctly. <font color="#990000"><em><strong>It 
        is the ability to manage this time that is so crucial.</strong></em></font></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Practice with 
        a Timer</strong><br>
        On test day, you should be ready to answer questions quickly and know 
        how to manage your test time efficiently. In order to do this without 
        being rushed or nervous, take practice tests and <strong><em>TIME YOURSELF</em></strong> 
        with your own testing timer. This way you will be used to the pressures 
        of test day and have an advantage over those who did not study under timed 
        conditions.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="4">Get 
        your Timer Here</font><br>
        </strong><a href="https://secure.SilentTimer.com/order?a=<? echo $aID;?>" target="_blank"><strong>The 
        Silent Timer&#8482;</strong></a> is a special testing timer we recommend 
        for your LSAT test. It has cool features to help you manage your test 
        time. You can enter the test time AND the number of questions. The timer 
        counts down your total time AND the time you have to spend on each question. 
        </font></p>
      <p><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>You 
        will always know how much time you can spend on each test question!</strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="https://secure.SilentTimer.com/order?a=<? echo $aID;?>" target="_blank">Get 
        your Timer and Start practicing today</a>!</strong></font></p></td>
  </tr>
</table>
<p align="left">&nbsp;</p>
<table width="100%" border="1" cellpadding="8" cellspacing="0" bordercolor="#003399">
  <tr> 
    <td><table width="100" border="0" cellspacing="0" cellpadding="8" class="right">
        <tr> 
          <td><div align="center"> 
              <table width="10" border="2" cellpadding="0" cellspacing="0" bordercolor="#000000">
                <tr> 
                  <td><div align="center"><a href="https://secure.SilentTimer.com/order?a=<? echo $aID;?>" target="_blank"><img src="images/mcat/MCAT_250x250.jpg" width="250" height="250" border="0"></a></div></td>
                </tr>
              </table>
            </div></td>
        </tr>
      </table>
      <font size="4" face="Arial, Helvetica, sans-serif"><strong>Time and the 
      MCAT</strong></font> 
      <p><font size="2" face="Arial, Helvetica, sans-serif">One of the reasons 
        the MCAT is so difficult is the time constraint.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><em><strong>In fact</strong></em>, 
        your time is a <em>crucial</em> factor in determining whether you score 
        high enough to get into the school of your choice. The reason? With ample 
        time, many of your exam questions can be answered correctly. It is the 
        ability to manage this time that is so crucial.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Practice with 
        a Timer</strong><br>
        On test day, you should be ready to answer questions quickly and know 
        how to manage your test time efficiently. In order to do this without 
        being rushed or nervous, take practice tests and <strong><em>TIME YOURSELF</em></strong> 
        with your own testing timer. This way you will be used to the pressures 
        of test day and have an advantage over those who didn't practice under 
        timed conditions.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="4">Get 
        your Timer Here</font><br>
        </strong><a href="https://secure.SilentTimer.com/order?a=<? echo $aID;?>" target="_blank">The 
        Silent Timer&#8482;</a> is a special testing timer we recommend for your 
        MCAT. It has cool features to help you manage your test time. The timer 
        counts down your total time AND the time you have to spend on each question. 
        </font></p>
      <p><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>With 
        this timer, you always know how much time you can spend on each question. 
        No more guessing, palm sweating, or mental calculations.</strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="https://secure.SilentTimer.com/order?a=<? echo $aID;?>" target="_blank">Click 
        here to get your timer</a></strong></font></p></td>
  </tr>
</table>
<p align="left">&nbsp;</p>
<table width="100%" border="1" cellpadding="8" cellspacing="0" bordercolor="#003399">
  <tr> 
    <td><table width="100" border="0" cellspacing="0" cellpadding="8" class="right">
        <tr> 
          <td><div align="center"> 
              <table width="10" border="2" cellpadding="0" cellspacing="0" bordercolor="#000000">
                <tr> 
                  <td><div align="center"><a href="https://secure.SilentTimer.com/order?a=<? echo $aID;?>" target="_blank"><img src="images/sat/SAT_timing_125x125.jpg" width="125" height="125" border="0"></a></div></td>
                </tr>
              </table>
            </div></td>
        </tr>
      </table>
      <font size="4" face="Arial, Helvetica, sans-serif"><strong>Timing on the 
      SAT</strong></font> 
      <p><font size="2" face="Arial, Helvetica, sans-serif">One of the reasons 
        the SAT is so difficult is the time constraint. It is tough to answer 
        all of those questions before time is up!</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><em><strong>In fact</strong></em>, 
        this time is a <em>crucial </em> factor in determining whether you score 
        high enough to get into the college of your choice. The reason? With ample 
        time, many of your exam questions can be answered correctly. <strong><font color="#CC0000"><em>It 
        is the ability to manage this time that is so crucial.</em></font></strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Practice with 
        a Timer</strong><br>
        On test day, you should be ready to answer questions quickly and know 
        how to manage your test time efficiently. In order to do this without 
        being rushed or nervous, take practice tests and <strong><em>TIME YOURSELF</em></strong> 
        with your own testing timer. This way you will be used to the pressures 
        of test day and have an advantage over those who didn't practice under 
        timed conditions.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="4">Get 
        your Timer Here</font><br>
        </strong><a href="https://secure.SilentTimer.com/order?a=<? echo $aID;?>" target="_blank">The 
        Silent Timer&#8482;</a> is a special testing timer we suggest you get 
        for your SAT. It has cool features to help you manage your test time.</font></p>
      <p><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>With 
        this timer, you always know how much time you can spend on each question. 
        No more guessing.</strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="https://secure.SilentTimer.com/order?a=<? echo $aID;?>" target="_blank">Click 
        here to get your timer</a></strong></font></p></td>
  </tr>
</table>
<p align="left">&nbsp;</p>
<table width="100%" border="1" cellpadding="8" cellspacing="0" bordercolor="#003399">
  <tr> 
    <td><p><font size="4" face="Arial, Helvetica, sans-serif"><strong>GMAT</strong></font> 
        <font size="4" face="Arial, Helvetica, sans-serif"><strong>Trouble? Learn 
        Time Management.</strong></font></p>
      <table width="100" border="0" cellspacing="0" cellpadding="8">
        <tr> 
          <td><div align="center"> 
              <table width="10" border="2" cellpadding="0" cellspacing="0" bordercolor="#000000">
                <tr> 
                  <td><div align="center"><a href="https://secure.SilentTimer.com/order?a=<? echo $aID;?>" target="_blank"><img src="images/gmat/GMAT_timer4_250x250.jpg" width="250" height="250" border="0"></a></div></td>
                </tr>
              </table>
            </div></td>
        </tr>
      </table>
      <p><font size="2" face="Arial, Helvetica, sans-serif">One of the reasons 
        the GMAT is so difficult is the time constraint put on the test.<em><strong> 
        </strong></em></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="4">Get 
        your Timer Here</font><br>
        </strong><a href="https://secure.SilentTimer.com/order?a=<? echo $aID;?>" target="_blank">The 
        Silent Timer&#8482;</a> is a special testing timer we suggest you get 
        for your GMAT practice. It has cool features to help you manage your test 
        time.<strong><font size="4"> </font><a href="https://secure.SilentTimer.com/order?a=<? echo $aID;?>" target="_blank">Click 
        here to get your timer</a>!</strong></font></p>
      </td>
  </tr>
</table>
<br>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
	$http .= "partner";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>
