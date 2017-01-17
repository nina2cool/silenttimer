<?
//security for page
session_start();

$PageTitle = "Registering for the LSAT";

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
?>

<script>
	
	// ------------------------------------------------------------------------ #
	//         Error Checking          ---------------------------------------- #
	// ------------------------------------------------------------------------ #

	function CheckForm()
	{
	
		//set error variable equal to 0
			var e = 0;
			var eText = "";
		
			
			// -- Shipping Address Info -- ##			
			
			// First Name
			if(document.frmLSAT.FirstName.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and First Name";
				}
				else
				{
					eText = "First Name";
				}
				
				e = 1;	
			}
			
			// Last Name
			if(document.frmLSAT.LastName.value == "")
			{
				if(eText != "")

				{
					eText = eText + ", and Last Name";
				}
				else
				{
					eText = "Last Name";
				}
				
				e = 1;
			}
			
			// Email
			var email = 0;
			
			if(document.frmLSAT.Email.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Email";
				}
				else
				{
					eText = "Email";
				}
				
				e = 1;	
			}
			else
			{
				// ------ this checks to make sure it is a valid email address
	
				var str = document.frmLSAT.Email.value;
				var at="@";
				var dot=".";
				var lat=str.indexOf(at);
				var lstr=str.length;
				var ldot=str.indexOf(dot);
				
				if (str.indexOf(at)==-1)
				{
					email = 1;
				}

				if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr)
				{
					email = 1;
				}

				if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr)
				{
					email = 1;
				}

				if (str.indexOf(at,(lat+1))!=-1)
				{
					email = 1;
				}

				if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot)
				{
					email = 1;
				}

				if (str.indexOf(dot,(lat+2))==-1)
				{
					email = 1;
				}

				if (str.indexOf(" ")!=-1)
				{
					email = 1;
				}
	
				// ------ this checks to make sure it is a valid email address

				if (email == 1)
				{
					if(eText != "")
					{
						eText = eText + ", and Enter a Valid Email Address";
					}
					else
					{
						eText = "Enter a Valid Email Address";
					}
					
					e = 1;
				}

			}





			// if an error occurs, dont submit form, and tell them what to fill in.
			if (e == 1) 
			{
				alert("Please correct the following:\n\n" + eText + ".");
				return false;
			}
			else //if all is clear, send them to next confirm page...
			{
				return true;
			}
			
	}

</script>



	
<?
	
		# if submit is pressed, send email out...
		if(isset($_POST['Submit']))
		{
		
			$FirstName = $_POST['FirstName'];
			$LastName = $_POST['LastName'];
			$Email = $_POST['Email'];

			$Now = date("Y-m-d H:i:s");

			# link to Database...
			$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
			mysql_select_db($db) or die("Cannot select Database");
			
			
			
			$sql = "INSERT INTO tblRegistration
			(FirstName, LastName, TestID, Email, DateTime, Link)
			VALUES ('$FirstName', '$LastName', '1', '$Email', '$Now', 'handbook-lsat')";
		
			
			
			mysql_query($sql) or die("Cannot insert LSAT registration, please try again.");
			



# -----------------------------------------------------
# SEND and email with ALL data to our email address...
# -----------------------------------------------------

require "../../../code/class.phpmailer.php";

$mail = new PHPMailer();
	
$mail->From = "info@silenttimer.com";
$mail->FromName = "The SilentTimer.com Team";
$mail->AddAddress("$Email", "$FirstName $LastName");
//$mail->AddBCC("erik@silenttimer.com", "Erik McMillan");
//$mail->AddBCC("nina@silenttimer.com", "Silent Technology LLC");
$mail->IsHTML(true);
$mail->Subject = "LSAT Registration Information!";

$html =
"

<HTML>
<HEAD>
<META NAME='GENERATOR' Content='Microsoft DHTML Editing Control'>
<TITLE>LSAT Registration Information</TITLE>
</HEAD>
<BODY>
 
<P><font size='2'><a href='http://www.silenttimer.com'><img src='http://www.silenttimer.com/timer/pics/Logo.jpg' alt='The Silent Timer' width='100' height='65' border='0'></a>&nbsp; 
      <a href='http://www.silenttimer.com/product.php'><font face='Arial, Helvetica, sans-serif'>Purchase your 
LSAT Timer Here</font></a></font></P>
<DIV>
<HR style='WIDTH: 954px; HEIGHT: 5px' color=#031298 SIZE=5>
</DIV>
<P><font face='Arial, Helvetica, sans-serif'>$FirstName,</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Thank you for looking to us for
    help registering for your LSAT test.&nbsp; We 
hope this information will be useful in your quest to take one of the most 
difficult standardized exams. Good luck with studying and pursuing&nbsp;your
law degree.</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>What is the LSAT?</STRONG></FONT></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The LSAT is a 101 question
    test with five multiple choice sections.&nbsp; The 
  sixth section, the essay portion, is not scored but is sent to the various schools 
  you apply to.&nbsp; The LSAT consists of two logical reasoning sections, one
  reading comprehension section, one logic games section and one unscored experimental
  section, which can be any of the previously mentioned sections. The sixth section
  is the unscored essay portion. The five multiple choice sections are each 35
  minutes long, and the essay portion is 30 minutes long.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Read more here:<BR>
  <br>
  <a href='http://silenttimer.com/handbook/standardizedtest/lsat/index.php'>http://silenttimer.com/handbook/standardizedtest/lsat/index.php</a></font><font face='Arial, Helvetica, sans-serif'><a href='http://silenttimer.com/handbook/standardizedtest/lsat/index.php'><U><br>
    <br>
    </U></a>------------------------------------------------------------------------ 
</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>How do I
register for the LSAT?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Registering for the LSAT is quite
    easy. There is an online form that only takes a few minutes.&nbsp; You can
    also register on the telephone or via mail. Email LSAC at LSACinfo@LSAC.org
if you need help.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>* Online Registration: <a href='http://www.lsac.org/'>http://www.lsac.org/</a></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>* Telephone or Mail Registration: Call weekdays at (215) 
968-1001 between 8:30 A.M. and 7:00 P.M. ET, September-March, and between 
8:30A.M. and 4:45 P.M. ET, April-August. LSAC's busiest day is Monday, so you 
can avoid delays if you call later in the week. </font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>When should I 
take the LSAT?</STRONG></FONT> </P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Many law schools require
    that the LSAT be taken by December for&nbsp;admission the following fall.&nbsp; However,
taking the test earlier-in June or October-is often advised. </font></P>
<P><font size='2' face='Arial'><STRONG><U>U.S. Registration Fees:</U></STRONG> </font></P>";


			$sql8 = "SELECT * FROM tblTests WHERE TestID = '1'";
			$result8 = mysql_query($sql8) or die("Cannot get test ID");
		
			while($row8 = mysql_fetch_array($result8))
			{
			$RegistrationFee = number_format($row8[RegistrationFee],2);
			$LateRegistrationFee = number_format($row8[LateRegistrationFee],2);
			}		

$html .= "
<P><FONT size='2' face='Arial'>On-time registrants: 
  $$RegistrationFee<BR>
  Late registrants: 
  $$RegistrationFee + $$LateRegistrationFee late registration fee<BR>
  <BR>
  <STRONG><U>Test Dates and Registration Deadlines:</U></STRONG></FONT></P>";
  
  

	$now = date("Y-m-d");
	$sql = "SELECT DATE_FORMAT(Date, '%W, %M %d, %Y') AS TestDate, Info, DATE_FORMAT(RegistrationDate, '%M %d') AS RegistrationDate FROM tblTestDates WHERE TestID = '1' AND Date >= '$now' AND RegistrationDate <> '0000-00-00' ORDER BY Date ASC";
	
		$result = mysql_query($sql) or die("Cannot execute query");
		
  		while($row = mysql_fetch_array($result))
			{
				$Date = $row[TestDate];
				$Information = $row[Info];
				$RegistrationDate = $row[RegistrationDate];

$html .= "

<P><FONT color=#ff0000 size='2' face='Arial, Helvetica, sans-serif'><STRONG>*&nbsp; $Date"; if($Information <> "") {  $html .= "$Info"; } $html .= "</STRONG></STRONG></FONT><font size='2' face='Arial, Helvetica, sans-serif'><BR>
  <font size='2' face='Arial, Helvetica, sans-serif'>Regular registration receipt deadline is <FONT 
color=#0f0f0f><EM><STRONG>$RegistrationDate.</STRONG></EM></FONT><BR>"; } $html .= "
<P><font size='2' face='Arial, Helvetica, sans-serif'>  <BR>
  Visit this link for all up-to-date LSAT Test Dates and Registration: <BR>
  <a href='http://www.lsac.org/Lsat/test-dates-deadlines.asp' target='_blank'>http://www.lsac.org/Lsat/test-dates-deadlines.asp</a></font></P>
<P><font face='Arial, Helvetica, sans-serif'><a href='http://www.lsac.org/Lsat/test-dates-deadlines.asp' target='_blank'><br>
  </a>------------------------------------------------------------------------ 
</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>I want to
take the LSAT on a Monday for religious reasons. What do I do?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The LSAT is administered on Mondays or Tuesdays following the 
Saturday exams. The June exam is only on Monday. To request a Saturday Sabbath 
observers administration, you must obtain a letter on official stationery from your minister or rabbi confirming your religious affiliation. 
</font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>Where do
I take the LSAT?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The LSAC has many approved testing centers. Visit their website at <a href='http://www.lsac.org/LSAT/testing-locations.asp'>http://www.lsac.org/LSAT/testing-locations.asp</a> 
   to download <br>
  PDF's of the locations.</font><font face='Arial, Helvetica, sans-serif'><br>
  <br>
  ------------------------------------------------------------------------</font></P>
<P><FONT color=#0000a0 face='Arial, Helvetica, sans-serif'><STRONG>What is an
      LSAC Account?&nbsp; <BR>
</STRONG><FONT 
color=#0f0f0f><BR>
  <font size='2'>The Law School Admissions Council (LSAC) requires that you sign up for an account 
  with them in order to:</font></FONT></FONT> </P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>* Register for the LSAT (Law School Admission Test)<BR>
  * Receive your LSAT score early by e-mail<BR>
  * Register for the LSDAS (Law School Data Assembly Service)<br>
  * Purchase publications, videos, and test preparation materials<br>
  * Purchase the LSACD electronic law school applications and apply online to 
  law schools<br>
  * Register for law school forums<br>
  * Have 24-hour file access</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Create a free LSAC account online here:</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'><a href='http://www.lsac.org/'>http://www.lsac.org</a></font><a href='http://www.lsac.org/'><font face='Arial, Helvetica, sans-serif'><U>/</U></font></a><font face='Arial, Helvetica, sans-serif'><U><br>
  <br>
  </U></a>------------------------------------------------------------------------ 
</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>I still need 
help!</STRONG></FONT> </P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Call LSAC at (215) 968-1001. They will be able to help you with any questions you have about the LSAT. </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The LSAC/LSAT web address: <a href='http://www.lsac.org/'>http://www.lsac.org/</a><br>
  The LSAC/LSAT email address: LSACinfo@lsac.org</font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><font color='#000099' face='Arial, Helvetica, sans-serif'><strong>How should 
  I prepare for the LSAT?</strong></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Study, study, study! The best way to prepare for the LSAT is to take as many 
  timed tests as you possibly can. The LSAT is not only about answering the questions 
  correctly, but answering them quickly. There are many books on the market that 
  can help you study. They have test questions, strategies, and techniques. Go 
  to your local bookstore and find their test prep section. To improve your pacing 
  skills, consider buying a silent timer such as the one found on our website.</font></P>
<P> <FONT color='#000099' size=4 face='Arial, Helvetica, sans-serif'><a href='http://www.silenttimer.com/product.php'><strong>Purchase 
  your LSAT Timer Here</strong></a></FONT></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>You can also find many study aids on the internet. Test preparation courses 
  may also be a good idea. There are many companies out there dedicated to helping 
  students prepare.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The LSAC website sells real LSAT tests and other materials at reasonable prices: 
    <A 
href='https://os.lsac.org/Release/Shop/Shop_Books.aspx?po=Y'><U><FONT 
color=#0000ff 
size=2><br>
    </U></A> <a href='http://www.lsac.org/LSAT/lsat-prep-materials.asp'>http://www.lsac.org/LSAT/lsat-prep-materials.asp</a></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Thank you for visiting our site. If you have any questions, please feel free 
  to email us.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The SilentTimer.com Team<br>
    <a href='http://www.SilentTimer.com'>http://www.SilentTimer.com</a> <br>
    <a href='mailto:info@silenttimer.com'>info@silenttimer.com</a></font></P>
</BODY>
</HTML>


";

	$mail->Body = $html;
	
	if(!$mail->Send())
	{
	   echo "Email could not be sent to support team.<p>";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}
	
	
	/*
	
	$mail = new PHPMailer();
	
$mail->From = "$Email";
$mail->FromName = "$FirstName $LastName";
//$mail->AddAddress("erik@silenttimer.com", "Erik McMillan");
$mail->AddAddress("info@silenttimer.com", "Christina McMillan");
$mail->IsHTML(false);
$mail->Subject = "$FirstName $LastName got free LSAT Information!";

$DetailedEmail =
"


The following person filled out our form on line to get free LSAT information:

$FirstName $LastName
$Email

Thanks!

";

	$mail->Body = $DetailedEmail;
	
	if(!$mail->Send())
	{
	   echo "Email receipt could not be sent to support team.<p>";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}
	
	*/
	
##############################################################################
# Auto Responder!!!!!!!

$mail = new PHPMailer();
	
$mail->From = "info@silenttimer.com";
$mail->FromName = "The SilentTimer.com Team";
$mail->AddAddress("$Email", "$FirstName $LastName");
//$mail->AddBCC("erik@silenttimer.com", "Erik McMillan");
//$mail->AddBCC("nina@silenttimer.com", "Christina McMillan");
$mail->IsHTML(true);
$mail->Subject = "Your LSAT Test Timer";

$html =
"
<HTML>
<HEAD>
<META NAME='GENERATOR' Content='Microsoft DHTML Editing Control'>
<TITLE>LSAT Timer</TITLE>
</HEAD>
<BODY>

<table width='99%' border='0' cellpadding='5' cellspacing='0' bgcolor='#FFFFFF'>
  <tr bordercolor='#000000' bgcolor='#FFFF66'>
    <td colspan='3' valign='top'><div align='center'><font color='#CC0000' size='5' face='Arial, Helvetica, sans-serif'><strong>Exam
    Clocks- meet your match.</strong></font></div></td>
  </tr>
  <tr bordercolor='#000000'>
    <td colspan='3'><font color='#000099' size='4' face='Arial, Helvetica, sans-serif'><br>
    The Silent Timer&#8482; for the LSAT:<br>
    </font></td>
  </tr>
  <tr bordercolor='#000000'>
    <td colspan='3' valign='top'><p><font size='2' face='Arial, Helvetica, sans-serif'><font color='#000066' face='Times New Roman, Times, serif'><strong>THE
              SILENT TIMER</strong></font><strong>&#8482;</strong> for the LSAT is THE ultimate test
              prep tool that meets all of your pacing needs when studying for the LSAT.<br>
    <br>
    </font></p>    </td>
  </tr>
  <tr bordercolor='#000000'>
    <td width='32%' valign='top'><div align='center'><img src='http://www.silenttimer.com/testhome/pics/front-nice.jpg' width='200' height='150'><br>
    </div></td>
    <td width='4%' valign='top'>&nbsp;</td>
    <td width='64%' valign='top'><font size='2' face='Arial, Helvetica, sans-serif'><font color='#000066' size='3' face='Times New Roman, Times, serif'><strong>THE
            SILENT TIMER</strong></font><font size='3'><strong>&#8482;</strong></font></font><font size='3' face='Arial, Helvetica, sans-serif'><strong>:
            Your Pacing Personal Trainer</strong><br>
            <br>
            <font size='2'>Use The Silent Timer&#8482;&#8217;s unique pacing
            features in practice to:</font></font>
                  <p><font size='2' face='Arial, Helvetica, sans-serif'> <strong>&#8226; </strong> Become
                      accustomed to the time constraints of test day<br>
                <strong>&#8226; </strong> Learn vital pacing skills and develop
                an internal pacing clock<br>
                <strong>&#8226; </strong> Finish more questions, on average,
                than before!</font><br>
                <strong><font color='#000066' size='2' face='Arial, Helvetica, sans-serif'><br>
                <a href='http://silenttimer.com/timer/features.php'>&gt; Features</a></font></strong></p></td>
  </tr>
  <tr bordercolor='#000000'>
    <td height='62' align='left' valign='top'><table width='68%' border='1' align='center' cellpadding='2' cellspacing='0' bordercolor='#000000'>
        <tr>
          <td height='47' bgcolor='#FFFF66'><div align='center'><font size='3' face='Arial, Helvetica, sans-serif'><strong><a href='http://www.silenttimer.com/product.php'>ORDER
                    NOW!</a></strong></font></div></td>
        </tr>
    </table></td>
    <td height='62' valign='top'>&nbsp;</td>
    <td height='62' valign='top'>&nbsp;</td>
  </tr>
</table>
<hr noshade>
<p align='center'><font size='1' face='Arial, Helvetica, sans-serif'>&copy; 2002-2009
    Silent Technology LLC All Rights Reserved. <br>
          <a href='mailto:info@SilentTimer.com'>info@SilentTimer.com</a><br>
  <a href='http://www.silenttimer.com?a=CBound' target='_blank'>http://www.SilentTimer.com</a></font><font size='1' face='Arial, Helvetica, sans-serif'><br>
  <a href='http://silenttimer.com/legal/privacy.php?a=CBound' target='_blank'>Privacy
Policy</a></font></p>
<p>&nbsp;</p>
</body>
</html>






";

	$mail->Body = $html;
	
	if(!$mail->Send())
	{
	   echo "Email receipt could not be sent to support team.<p>";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}

##############################################################################


	
	$EmailSent = "yes";
	
		} # end of if button pressed

?>
<strong><font color="#003399" size="4" face="Times New Roman, Times, serif"> </font></strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font size="4" face="Times New Roman, Times, serif"><font size="2">THE 
SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></font><font color="#000000" size="2"> 
<em>Handbook</em></font></strong></font> 
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="lsat_test_registration.php">LSAT 
  Registration</a> | <a href="<? echo $https;?>product.php?t=LSAT"> 
  LSAT Timer</a> | <a href="lsat_test_date.php">LSAT Test Dates</a> | &nbsp;<a href="../../../testhome/lsat.php">LSAT 
  Test</a></strong></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>LSAT Registration</strong></font></p>
<? if($EmailSent != "yes"){?>

<p><font size="2" face="Arial, Helvetica, sans-serif">To receive <strong>FREE</strong> LSAT registration
     information, enter your name and email address below. We will send you an
    automatic  email explaining how/where to register for the LSAT, and what
    the registration  deadlines are for the next tests. The email also contains
    more valuable LSAT  information to help prepare for your test.</font> </p>
<form action="" method="post" name="frmLSAT" id="frmLSAT" onSubmit="return CheckForm();">
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">First Name 
        <br>
        <input name="FirstName" type="text" id="FirstName">
        </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Last Name<br>
        <input name="LastName" type="text" id="LastName">
        </font></strong></td>
    </tr>
    <tr> 
      <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">Email 
        Address<br>
        <input name="Email" type="text" id="Email">
</font><font color="#999999" size="1" face="Arial, Helvetica, sans-serif">Please
add &quot;info@silenttimer.com&quot; to your e-mail safe list. If you don't seem
to get the email at first, check your spam filter.</font> </strong></td>
    </tr>
    <tr>
      <td colspan="2"><p>
          <input name="Submit" type="submit" id="Submit" value="Get LSAT Registration Info!">
        </p>
        <p> <font size="2" face="Arial, Helvetica, sans-serif">We will <em>never</em> sell 
          your personal information. <a href="../../../legal/privacy.php" target="_blank">Please 
          read our privacy policy</a>.</font></p></td>
    </tr>
  </table>
</form>

<? }?>
<? if($EmailSent == "yes"){?>
<strong><font color="#000099" size="2" face="Arial, Helvetica, sans-serif">Your
 LSAT registration email has been sent! Check your email. If you do not see it
right away, check your Junk Mail or spam filter. </font></strong> 
<? }?>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Read more about 
  LSAT Registration:</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">When you finally feel thoroughly 
  prepared to take the LSAT exam, you will need to register online, by phone or 
  by mail. It is best to complete your registration as soon as possible to ensure 
  a spot at your desired testing center. Pick up a copy of the Law Services LSAT 
  Information Bulletin at any local college or law school, or call Law Services 
  at (215) 968-1001. This free booklet includes all the LSAT registration forms 
  you will need. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">To register online, visit 
  <a href="https://os.lsac.org/Release/logon/logon.aspx" target="_blank">LSAC 
  online services</a>. There you will need to create an account, which will also 
  allow you to view your LSAT scores early, purchase practice materials, register 
  for law school forums, etc. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">If you choose to register by phone, call (215) 968-1001, and 
  have your credit card available. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">For mail-in registration, refer to the Bulletin for more information.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Spots fill up quickly so make sure you register far in advance 
  to secure your desired LSAT testing location. Registration is going to the be 
  the last thing you want to worry about, so go ahead and get it out of the way.</font></p>
                  
<p>&nbsp;</p>
<p align="center"><font color="#009900" size="3" face="Arial, Helvetica, sans-serif"><strong>Taking
  the LSAT Soon?</strong> </font></p>
<p align="center"><font size="2" face="Arial, Helvetica, sans-serif">You will 
  definitely want to look at our <a href="<? echo $https;?>product.php?t=LSAT">Silent 
  Timer</a>. It's <em><strong>guaranteed</strong></em> to improve your score.</font></p>
<p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $https;?>product.php?t=LSAT">Get 
  your LSAT timer here.</a></font></p>
<p align="center">&nbsp;</p>
                  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links</font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.lsac.org" target="_blank">Law 
  School Admission Council</a><br>
  <a href="https://os.lsac.org/Release/logon/logon.aspx" target="_blank">Law School Admission 
  Council - Registration</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Additional Search 
  Help for LSAT Registration<br>
  </strong>Click below to search for &quot;LSAT Registration&quot; in the following 
search engines: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.google.com/search?hl=en&lr=&ie=UTF-8&oe=UTF-8&q=LSAT%2Bregistration" target="_blank">Google</a> 
  | <a href="http://search.msn.com/results.aspx?q=LSAT%2Bregistration&FORM=SMCRT" target="_blank">MSN</a> 
  | <a href="http://altavista.com/web/results?q=LSAT%2Bregistration&kgs=0&kls=1&avkw=aapt" target="_blank">Altavista</a> 
  | <a href="http://search.yahoo.com/search?p=LSAT%2Bregistration&ei=UTF-8&fr=fp-top&n=20&fl=0&x=wrt" target="_blank">Yahoo</a> 
  | <a href="http://search.aol.com/aolcom/search?invocationType=topsearchbox./aolcom/jsp/search.jsp&query=LSAT%2Bregistration&x=29&y=14" target="_blank">AOL</a> 
  | <a href="http://web.ask.com/web?q=LSAT%2Bregistration&qsrc=1" target="_blank">Ask 
  Jeeves</a></font></p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>