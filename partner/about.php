<?
//security for page
session_start();

$PageTitle = "Silent Timer Partner - About";

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> 
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><a name="top"></a>About 
  our Partner Program</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">We would like to welcome 
  you to our Partner Program. You can easily add <strong><font color="#000066" face="Times New Roman, Times, serif">THE 
  SILENT TIMER</font>&#8482;</strong> to your web site, and earn credit for each 
  timer your students buy. Below you will find answers to most of your questions. 
  If you need further assistance, please <a href="contactus.php">contact us</a>.</font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td width="66%" align="left" valign="top"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr> 
          <td align="left" valign="top"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt;</font></strong></td>
          <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#1">What 
            is the Partner Program?</a></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399"></font></strong></font></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt;</font></strong></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#2">How 
            much money am I paid?</a></strong></font> </font></strong></font></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt;</font></strong></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#3">Who 
            takes payment for and ships the timers?</a></strong></font></strong></font></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt;</font></strong></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399"><a href="#4">Who 
            is eligible for the Program?</a></font></strong></font></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt;</font></strong></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399"><a href="#5">How 
            do I sign up?</a></font></strong></font></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt;</font></strong></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#6">Now 
            that I&#8217;ve signed up, what do I need to do?</a></strong></font> 
            </font></strong></font></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt;</font></strong></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#7">How 
            do I link to your site?</a></strong></font> </font></strong></font></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt;</font></strong></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#8">What 
            is my Partner Code?</a></strong></font> </font></strong></font></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt;</font></strong></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#9">What 
            if a student leaves your site and comes back later, do I still get 
            the commission?</a></strong></font> </font></strong></font></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt;</font></strong></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#10">How 
            and when do I receive my check?</a></strong></font><font color="#003399"> 
            </font></strong></font></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt;</font></strong></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#11">I 
            still have questions, how can I find out more?</a></strong></font></strong></font></td>
        </tr>
      </table>
    </td>
    <td width="34%" align="left" valign="middle"> 
      <div align="center"><img src="images/partner_about.jpg" alt="The Silent Test Timer Partner Program" width="201" height="175"></div></td>
  </tr>
</table>
<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"></font></strong></p>
	
<table width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr> 
    <td width="97%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><a name="1"></a></font></strong></font><font color="#000000" size="2">What 
      is the Partner Program?</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"></font></strong></td>
    <td width="3%" align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="2"><p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Becoming 
        a Silent Timer Partner allows you to further help your students achieve 
        the test scores they deserve. <strong><font color="#000099" face="Times New Roman, Times, serif"><a href="http://www.silenttimer.com" target="_blank">THE 
        SILENT TIMER</a><font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></font></strong> 
        is a revolutionary device designed specifically for tests with short time 
        constraints. This program lets you offer this special timer to your students 
        on your web site.</font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">After 
        <a href="signup.php">signing up</a>, all you need to do is place a link 
        on your company website that directs students to <a href="http://www.silenttimer.com" target="_blank">our 
        web site</a>. When your students purchase timers, you get a commission 
        for each sale. At the end of the month, we send you a check. Simple, huh?</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a><font size="2" face="Arial, Helvetica, sans-serif"><br>
        </font></p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><a name="2" id="2"></a></font></strong></font><font color="#000000" size="2"><strong>How 
      much money am I paid?</strong></font></strong></font><font color="#003399" size="2"></font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="2"><p><font size="2" face="Arial, Helvetica, sans-serif">We determine 
        your commission based on the monthly visitor statistics you enter on your 
        <a href="signup.php">Partner Application</a>. Commission rates start at 
        $3 per timer sold, and go up depending on visitor statistics and good 
        buying patterns. </font></p>
      <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">It 
        is important to give us accurate visitor statistics for your web site. 
        We will use these stats, along with a monthly review, to calculate your 
        commission amount per sale. If you have any questions, please <a href="contactus.php"><strong>contact 
        us</strong></a>.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a></p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><a name="3" id="3"></a></font></strong></font><font color="#000000" size="2">Who 
      takes payment for and ships the timers?</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="2"><p align="left"><font size="2" face="Arial, Helvetica, sans-serif">We 
        handle all the shipping, returns, and other customer services. We are 
        here to help you and your students with any assistance you might need.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">You are only responsible 
        for sending your customers to our site and receiving your check every 
        month!</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a></p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399"><font color="#FF0000"><a name="4" id="4"></a></font></font></strong></font><font color="#000000" size="2">Who 
      is eligible for the Program?</font></font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="2"><p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Any 
        company or individual dedicated to helping students prepare for tests 
        is eligible. All you need is a live, working website to get started! We 
        will help you with the rest.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a><br>
      </p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><a name="5" id="5"></a></font></strong></font><font color="#000000" size="2">How 
      do I sign up?</font></strong></font><font color="#333333" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="2"><p><font size="2" face="Arial, Helvetica, sans-serif">Fill 
        out our <a href="signup.php">Partner Application</a> with your company 
        web site information. After agreeing to our <a href="terms.php">Terms 
        and Conditions</a>, submit your application. We will then contact you 
        via email or phone to complete your account activation. At that time we 
        will let you know how much commission you will make per sale. We will 
        also explain the program and show you how to get your web site set up 
        for timer sales. The process is extremely simple, and you have complete 
        control of your account from our online partner site. </font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">You are now ready 
        to start helping your students increase their time management, as well 
        as making some money!</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a><br>
      </p></td>
  </tr>
  <tr bgcolor="#FFFFCC"> 
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><a name="6" id="6"></a></font></strong></font><font color="#000000" size="2">Now 
      that I&#8217;ve signed up, what do I need to do?</font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="2"><p><font size="2" face="Arial, Helvetica, sans-serif">After 
        submitting your <a href="signup.php">Partner Application</a>, we evaluate 
        your application and notify you of your acceptance. You then <a href="login.php">log 
        in</a> to our site using your user name and password (which you specified 
        on your application). Then, click on &#8220;Getting Started,&#8221; which 
        will help walk you through your set up process. Basically, you choose 
        which images you want to display, create your links to our site, and start 
        earning commission based on your timer sales.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">You are also responsible 
        for maintaining your web site and making sure all links are operational. 
        Please <a href="contactus.php">contact us</a> if you are having difficulties.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a></p></td>
  </tr>
  <tr bgcolor="#FFFFCC"> 
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><a name="7"></a></font></strong></font><font color="#000000" size="2">How 
      do I link to your site?</font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="2"><p><font size="2" face="Arial, Helvetica, sans-serif">We have 
        made it very easy for you to link to our site. Just pick a page on our 
        site where you want to send your visitors, then add your <a href="#8">Partner 
        Code</a> to it. That's it.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">We also have many 
        images &amp; banners, text &amp; email links, as well as <a href="example.php">timer 
        page examples</a> for you to choose from. Browse through our site, pick 
        the ones you want, then add the corresponding code to your site. Voila! 
        You&#8217;re ready to sell timers!</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a></p></td>
  </tr>
  <tr bgcolor="#FFFFCC"> 
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><a name="8" id="8"></a></font></strong></font><font color="#000000" size="2">What 
      is my Partner Code, why do I need it?</font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="2"><p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Your 
        Partner Code is your unique identifier, and must be included in each link 
        to us from your site. Each time a student comes to our web site, we use 
        your Partner Code to track your customer through our pages. When they 
        buy a timer, you then get credit for their sale.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">You get to choose 
        your Partner Code on the <a href="signup.php">Partner Application</a>. 
        Example of a link to our site: <font color="#333333">http://www.silenttimer.com/order?a=<em><strong>partnercode</strong></em></font></font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a></p></td>
  </tr>
  <tr bgcolor="#FFFFCC"> 
    <td><font color="#FF0000"><strong><font color="#FF0000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a name="9"></a></font></strong></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">What 
      if a student leaves your site and comes back later, do I still get the commission?</font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="2"><p><font size="2" face="Arial, Helvetica, sans-serif">Yes. 
        If a student returns to our site within thirty days (30) from the same 
        computer, you are still credited with a sale. This way, if a visitor wants 
        to think about it first or do some research before they buy, they can 
        return to the site later and you still get credit for their purchase.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a></p></td>
  </tr>
  <tr bgcolor="#FFFFCC"> 
    <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><a name="10"></a></font></strong></font><font color="#000000" size="2">How 
      and when do I receive my check?</font></strong></font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="2"><p><font size="2" face="Arial, Helvetica, sans-serif">At the 
        end of the payment period (the last day of each month), we add up your 
        sales for the month and determine your commission for that payment period. 
        We send you a check and a monthly statement. Your site statistics, payment 
        amounts, number of sales, and checks can all be tracked online from the 
        <a href="login.php">Partner Site</a>. Log in using your user name and 
        password.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a></p></td>
  </tr>
  <tr bgcolor="#FFFFCC"> 
    <td><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="11"></a><font color="#000000">I 
      still have questions, how do I find out more?</font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="2"><p><font size="2" face="Arial, Helvetica, sans-serif">If
          you still have questions about the Partner Program, contact Erik McMillan
          or Christina McMillan at 512-340-0338. You can also email us at <a href="mailto:partner@silenttimer.com">partner@silenttimer.com</a>.
           Please <a href="contactus.php">contact us</a> if you have any questions,
            and we will be more than happy to help you! We are here for you,
           please  let us assist you and your company in any way possible.<br>
        </font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a></p></td>
  </tr>
</table>
<p align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
