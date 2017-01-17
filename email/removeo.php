<?
	$email = $_GET['e'];
	$name = $_GET['n'];
	
	$location = "localhost";
	$user = "silenttimer";
	$pass = "2559";
	$db = "silenttimer";
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	#update status to canceled
	$sql = "UPDATE tblPreOrder
			SET status = 'cancel'
			WHERE email = '$email'";
	mysql_query($sql);
	
	mysql_close($link);
	
?>
<HTML>
<HEAD>
<TITLE>The Silent Timer - Email Removed</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<link href="../code/style.css" rel="stylesheet" type="text/css">

<META name="description" content="The Silent Timer for the LSAT, MCAT, SAT, ACT, and more!">
<META name="keywords" Content="timer, silent, silent timer, LSAT, MCAT, ACT, SAT, GMAT, GRE, SAT II, debate, timer, test, tests, timers, silent timer, time, time manager, test timer, timing, reminder, timers, the silent timer, time schedule, silent reminder, vibrating alarm, electronic timer, electrical timer, silent alarm, silent test timer, reminder, personal timer, electic timer, countdown timer, count up timer, countup timer, count up, count down, silent alarm clock, alarm clock, silent alert, watch, silent watch, medication reminder, vibration alarm, speech timer, silent timer, meeting timer, debate timer, silent alarm, silent alarm watch, speaker timer, personal reminder, track time, manage time, time manager, medication reminder, watch, countdown timer, programmable timer, time management">
</HEAD>
<BODY BGCOLOR=#FFFFFF LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>
<!-- ImageReady Slices (timerSite.psd) -->
<TABLE WIDTH=822 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		
    <TD COLSPAN=2 align="left" valign="top"> <a href="../index.php"><IMG SRC="../images/TopPic.gif" ALT="" WIDTH=822 HEIGHT=156 border="0"></a></TD>
		<TD>
			<IMG SRC="../images/spacer.gif" WIDTH=1 HEIGHT=156 ALT=""></TD>
	</TR>
	<TR>
		
    <TD width="161" ROWSPAN=2 align="left" valign="top" background="../images/behind-left-gray.gif"> 
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
          <td width="99%" align="left" valign="top"> <p><strong><font size="5" face="Arial, Helvetica, sans-serif">Thank 
              You </font></strong></p>
            <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $name?>, 
              you have been removed from The Silent Timer pre-order list.</strong></font></p>
            <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Before 
              you go, I hope you will take a few seconds to find out how The Silent 
              Timer can help you increase your test scores. </font></p>
            <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../timer/demo.php">Try 
              our online demo</a></font></p>
            <p align="left">&nbsp;</p>
            <p align="left">&nbsp;</p>
            <p align="left">&nbsp;</p>
            <p align="left">&nbsp;</p>
            <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../index.php">Home</a> 
              - <a href="../order/index.php" >Order Timer</a> - <a href="../timer/index.php">Timer 
              Info</a> - <a href="../aboutus.php" >About Us</a> - <a href="../contactus.php">Contact 
              us</a> - <a href="../timer/faq.php">FAQ</a> - <a href="../survey/index.php">Surveys</a> 
              - <a href="../links.php">Testing Links</a></font></p>
            <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <a href="../legal/patentpending.php">Patent Pending</a> - <a href="../legal/terms.php">Terms 
              and Conditions</a><br>
              &copy; 2002-2003 Silent Technology LLC <em>All Rights Reserved.</em></font></p>
            <p>&nbsp;</p></td>
        </tr>
      </table> </TD>
		<TD>
			<IMG SRC="../images/spacer.gif" WIDTH=1 HEIGHT=16 ALT=""></TD>
	</TR>
	<TR>
		
    <TD width="161" align="left" valign="top" background="../images/behind-left-gray.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td> <table width="100%" border="0" cellpadding="6" cellspacing="0" bordercolor="#000000">
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
                <td align="left" valign="top" class=box1> <div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"><a href="../survey/index.php">Surveys</a></font> 
                  </div></td>
              </tr>
              <tr> 
                <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="../links.php">Testing 
                  Links </a></font></td>
              </tr>
              <tr> 
                <td align="left" valign="bottom" > 
                  <p><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                    Sign up to be notified when our product is ready!</strong></font></p>
                  <form action="<?echo $PHP_SELF ?>" method="post" name="frmEmail" id="frmEmail">
                    <font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Enter 
                    E-mail</strong></font><br>
                    <input name="txtEmail" type="text" id="txtEmail" size="10">
                    <input TYPE='submit' name="Submit" value="Go">
                  </form>

					
		<?php

		$location = "localhost";
		$user = "silenttimer";
		$pass = "2559";
		$db = "silenttimer";

		if($Submit)
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
			
				if($txtWebSite == "http://")
				{
					$txtWebSite = "";
				}
			
			
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
            </table></td>
          <td width="12">&nbsp;</td>
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