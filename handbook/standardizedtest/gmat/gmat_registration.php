<?
//security for page
session_start();

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
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");

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
			if(document.frmGMAT.FirstName.value == "")
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
			if(document.frmGMAT.LastName.value == "")
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
			
			if(document.frmGMAT.Email.value == "")
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
	
				var str = document.frmGMAT.Email.value;
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

			
			$sql = "INSERT INTO tblRegistration
			(FirstName, LastName, TestID, Email, DateTime, Link)
			VALUES ('$FirstName', '$LastName', '4', '$Email', '$Now', 'handbook-gmat')";
		
					
			mysql_query($sql) or die("Cannot insert GMAT registration, please try again.");
			



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
$mail->Subject = "GMAT Registration Information!";

$html =
"

<HTML>
<HEAD>
<META NAME='GENERATOR' Content='Microsoft DHTML Editing Control'>
<TITLE></TITLE>
</HEAD>
<BODY>

<P><font size='2'><a href='http://www.silenttimer.com'><img src='http://www.silenttimer.com/timer/pics/Logo.jpg' alt='The Silent Timer' width='100' height='50' border='0'></a>&nbsp; 
      <a href='http://www.silenttimer.com/product.php'><font face='Arial, Helvetica, sans-serif'>Purchase your 
GMAT Timer Here</font></a></font></P>
<DIV>
<HR style='WIDTH: 954px; HEIGHT: 5px' color=#031298 SIZE=5>
</DIV>
<P><font size='2' face='Arial, Helvetica, sans-serif'>$FirstName,</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Thank you for looking to
    us for help registering for your GMAT test.&nbsp; We 
hope this information will be useful in your quest to take one of the most 
difficult standardized exams. Good luck with studying and pursuing&nbsp;your
graduate degree.</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>What is the GMAT?</STRONG></FONT></P>
<P><FONT face='Arial, Helvetica, sans-serif' size=2>The GMAT evaluates basic
    verbal, mathematical and analytical writing skills accumulated over a long
    period of time through education and work. The verbal section includes 41
    multiple choice questions testing reading comprehension, critical reasoning
    and sentence correction with a time limit of 75 minutes. The quantitative
    section has 37 multiple choice questions covering data sufficiency and problem
    solving with a time limit of 75 minutes. The final section is an analytical
    writing assessment. It requires two written essays with an analysis of an
    issue and an analysis of an argument with a time limit of 30 minutes per
essay.</FONT></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Read more here:<BR>
    <br>
<a href='http://silenttimer.com/handbook/standardizedtest/GMAT/index.php'>http://silenttimer.com/handbook/standardizedtest/GMAT/index.php</a></font></P>
<P><font face='Arial, Helvetica, sans-serif'><a href='http://silenttimer.com/handbook/standardizedtest/GMAT/index.php'><U><br>
    </U></a>------------------------------------------------------------------------ 
</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>How do I
register for the GMAT?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Registering for the GMAT
    is quite easy. You may register for the test online, by phone, by mail, or
    by fax.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'><a href='https://www.mba.com/NR/exeres/91BFCE21-7732-4602-A4ED-D4FCC118BBA0,frameless.htm?Action=2&Service=2&SSLSwitch=1'>Click
      here</a> to register
    online.</font></P>
<P><font size='2'><STRONG><font face='Arial, Helvetica, sans-serif'>Telephone
        (toll-free within the U.S. &amp; Canada only):</font></STRONG><font face='Arial, Helvetica, sans-serif'> 1-800-717-4628,
        7:00 a.m. to 7:00 p.m. Central Time<BR>
  <STRONG>Telephone:</STRONG> 1-952-681-3680, 7:00 a.m. to 7:00 p.m. Central Time<BR>
<STRONG>Fax:</STRONG> 1-952-681-3681</font></font></P>
<p><font size='2' face='Arial, Helvetica, sans-serif'>To register for the GMAT&reg; exam
    by mail or fax, you must complete the <A 
href='/mba/TaketheGMAT/Tools/2006AppointmentScheduleForm.htm'>GMAT&reg; Appointment
    Scheduling form</A>. To complete it, you will also need the <A 
href='/mba/TaketheGMAT/Tools/2006TestCenterList.htm'>Test Center List</A> for
    Site ID numbers and the <A 
href='/mba/TaketheGMAT/Tools/2006CountryCodeList.htm'>Country Code List</A>.
    Fax your form to the number above. If you wish to mail your form, please
    send your completed form to:</font></p>
<P dir=ltr style='MARGIN-RIGHT: 0px'><font size='2' face='Arial, Helvetica, sans-serif'>Pearson VUE<BR>
  Attention: GMAT&reg; Program<BR>
  PO Box 581907<BR>
  Minneapolis, MN 55458-1907</font></P>
<P dir=ltr style='MARGIN-RIGHT: 0px'><font size='2' face='Arial, Helvetica, sans-serif'>Check
    the <a href='http://www.mba.com/mba/TaketheGMAT/RegisterfortheGMAT/GMATAppointments/2006/ScheduleaGMATAppointmentin2006.htm'>GMAT web site</a> for instructions for other countries. </font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>When should I 
take the GMAT?</STRONG></FONT> </P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>When deciding when to take
    your GMAT test, consider the time it takes to receive your scores. Your Official
    Score Report is sent about 20 days after the test (although you can see
    your unofficial score immediately after). Beginning January 2006, you can
    view your Official Score Report online. <a href='http://www.mba.com/mba/TaketheGMAT/TheEssentials/GMATScoresandReports/2006/UnderstandingYourGMATScoresin2006.htm'>Check
GMAT's web site for more information on score reporting</a>.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The GMAT is available to
    be taken year-round. Your test dates and times depend on the availability
at your local test center. </font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>What are the
    associated fees?</STRONG></FONT></P>
<p><font size='2' face='Arial, Helvetica, sans-serif'>It costs $250 to take the GMAT. Some foreign countries have tax rates, so
 check on that if you live outside of the U.S. </font></p>
<P><font size='2' face='Arial, Helvetica, sans-serif'>  </font><font face='Arial, Helvetica, sans-serif'><a href='http://www.lsac.org/LSAC.asp?url=/lsac/test-dates-deadlines.asp'>
  </a>------------------------------------------------------------------------ 
</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>Where do
I take the GMAT?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Visit the test center web
    site at <a href='http://www.mba.com/mba/TaketheGMAT/Tools/2006TestCenterList.htm'>http://www.mba.com/mba/TaketheGMAT/Tools/2006TestCenterList.htm</a>.</font><font face='Arial, Helvetica, sans-serif'><br>
  <br>
------------------------------------------------------------------------</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>I still need 
help!</STRONG></FONT> </P>
<DIV class=instructions></DIV>
<DIV id=contact>
  <TABLE>
    <TBODY>
      <TR>
        <TH width='133'><div align='left'><font size='2' face='Arial, Helvetica, sans-serif'>Email:</font></div></TH>
        <TD width='661'><font size='2' face='Arial, Helvetica, sans-serif'><A 
href='mailto:GMATCandidateServicesAmericas@pearson.com'>GMATCandidateServicesAmericas@pearson.com</A></font></TD>
      </TR>
      <TR>
        <TH><div align='left'><font size='2' face='Arial, Helvetica, sans-serif'><NOBR>Telephone (toll-free):</NOBR></font></div></TH>
        <TD><font size='2' face='Arial, Helvetica, sans-serif'>1-800-717-GMAT
            (4628), Monday through Friday, 7:00 a.m. to 7:00 p.m. Central Time</font></TD>
      </TR>
      <TR>
        <TH><div align='left'><font size='2' face='Arial, Helvetica, sans-serif'>Telephone:</font></div></TH>
        <TD><font size='2' face='Arial, Helvetica, sans-serif'>1-952-681-3680,
            Monday through Friday, 7:00 a.m. to 7:00 p.m. Central Time</font></TD>
      </TR>
      <TR>
        <TH><div align='left'><font size='2' face='Arial, Helvetica, sans-serif'>Fax:</font></div></TH>
        <TD><font size='2' face='Arial, Helvetica, sans-serif'>1-952-681-3681</font></TD>
      </TR>
    </TBODY>
  </TABLE>
  <p><font size='2' face='Arial, Helvetica, sans-serif'>Visit the GMAT web site at <a href='http://www.mba.com/'>http://www.mba.com/</a> for more information.</font> </p>
  <p><font face='Arial, Helvetica, sans-serif'>    ------------------------------------------------------------------------</font> </p>
</DIV>
<P><font color='#000099' face='Arial, Helvetica, sans-serif'><strong>How should 
I prepare for the GMAT?</strong></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Study, study, study! The
    best way to prepare for the GMAT is to take as many timed tests as you possibly
    can. The GMAT is not only about answering the questions correctly, but answering
    them quickly. There are many books on the market that can help you study.
    They have test questions, strategies, and techniques. Go to your local bookstore
    and find their test prep section. To improve your pacing skills, consider
buying a <a href='http://www.silenttimer.com'>silent timer</a> such as the one
found on our web site.</font></P>
<P> <FONT color='#000099' size=4 face='Arial, Helvetica, sans-serif'><a href='http://www.silenttimer.com/product.php'><strong>Purchase
         your GMAT Timer Here</strong></a></FONT></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>You can also find many study aids on the internet. Test preparation courses 
  may also be a good idea. There are many companies out there dedicated to helping 
  students prepare.</font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Thank you for visiting our site. If you have any questions, please feel free 
  to email us.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The SilentTimer.com Team<br>
    <a href='http://www.SilentTimer.com'>http://www.SilentTimer.com</a> <br>
<a href='mailto:info@silenttimer.com'>info@silenttimer.com</a></font></P>
<P align='center'><font size='2' face='Arial, Helvetica, sans-serif'><em>Graduate Management
      Admission Council&reg;, GMAC&reg;, Graduate Management
  Admission Test&reg; and GMAT&reg; are registered trademarks of the Graduate
Management Admission Council&reg; (GMAC&reg;). All rights reserved.</em></font></P>
<P>&nbsp;</P>
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
	

##############################################################################
# Auto Responder!!!!!!!

$mail = new PHPMailer();
	
$mail->From = "info@silenttimer.com";
$mail->FromName = "The SilentTimer.com Team";
$mail->AddAddress("$Email", "$FirstName $LastName");
//$mail->AddBCC("erik@silenttimer.com", "Erik McMillan");
//$mail->AddBCC("nina@silenttimer.com", "Christina McMillan");
$mail->IsHTML(true);
$mail->Subject = "Silent Timer for the GMAT";

$html =
"
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<title>GMAT Silent Watch</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>

<body>
<div align='center'>
  <table width='62%' height='7%' border='1' cellpadding='3' cellspacing='0' bordercolor='#FF0000' bgcolor='#FFFF99'>
    <tr> 
      <td height='37'>
<div align='center'><font color='#003399' size='5' face='Arial, Helvetica, sans-serif'><strong>Need
      a timer for the GMAT?</strong></font></div></td>
    </tr>
  </table>
</div>
<p align='left'><font size='2' face='Arial, Helvetica, sans-serif'>$FirstName,</font></p>
<p><font size='2' face='Arial, Helvetica, sans-serif'>One of the hardest aspects
     of the GMAT is the time limit.</font><font color='#000080' size='2' face='Arial, Helvetica, sans-serif'><strong><br>
  <br>
Good timing</strong></font><font size='2' face='Arial, Helvetica, sans-serif'> 
  is the easiest way to improve your GMAT score. You may be smart, you may be 
  prepared, but a poor pacing strategy can prevent you from achieving your full 
potential on test day. Don&#8217;t let this happen to you&#8230;</font> </p>
<p><font color='#000080' size='2' face='Arial, Helvetica, sans-serif'><strong>Maximizing</strong></font><font size='2' face='Arial, Helvetica, sans-serif'> 
  your GMAT score requires practice and a solid timing strategy.</font></p>
<p><font size='2' face='Arial, Helvetica, sans-serif'>At SilentTimer.com, we
offer great products to help you in your pacing:</font></p>
<table width='100%'  border='1' cellpadding='5' cellspacing='0' bordercolor='#CCCCCC'>
  <tr>
    <td bgcolor='#FFFFCC'><font size='3' face='Arial, Helvetica, sans-serif'><strong>The
    Silent Timer&#8482; </strong></font></td>
  </tr>
  <tr>
    <td><p><font size='2' face='Arial, Helvetica, sans-serif'><strong>The Silent
            Timer</strong> is designed <em><strong>specifically</strong></em> to
    improve pacing on standardized exams such as the GMAT. Special features such
            as time-per-question help you learn to pace yourself throughout your
            exam.</font></p>
      <p><font size='2' face='Arial, Helvetica, sans-serif'>Features of The Silent
          Timer&#8482;:</font></p>
      <blockquote>
        <p><font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'><strong>&gt;<font color='#3366CC'> <font color='#000099'>Silent</font><br>
                <font color='#FF0000'>&gt;</font>  <font color='#000099'>Counts
                  up or down</font><br>
                  <font color='#FF0000'>&gt;</font>  <font color='#000099'>New
            feature for reading passages</font><br>
          </font>&gt;<font color='#000099'> Displays how much time you have for
          EACH question</font></strong></font></p>
      </blockquote>
      <p><font size='2' face='Arial, Helvetica, sans-serif'>&gt; Learn more on our
          web site: <a href='http://www.silenttimer.com/'>http://www.silenttimer.com<br>
          <br>
          </a></font></p>      </td>
  </tr>
</table>
<div align='left'>
  <table width='39%' height='53' border='3' align='center' cellpadding='3' cellspacing='0' bordercolor='#003399' bgcolor='#99CCFF'>
    <tr>
      <td height='47'>
<div align='center'>
          <p><font color='#FFFF99' size='4' face='Arial, Helvetica, sans-serif'><strong><a href='http://www.silenttimer.com/product.php'>BUY
            YOUR TIMER  NOW!</a></strong></font></p>
        </div></td>
    </tr>
  </table>
  <p align='center'><font color='#000000' size='4' face='Arial, Helvetica, sans-serif'> OR
      visit <a href='http://silenttimer.com/index.php'>www.SilentTimer.com</a> for
    more information</font></p>
  <hr noshade>
  <p align='center'><font size='1' face='Arial, Helvetica, sans-serif'>&copy; 2002-2009
        Silent Technology LLC All Rights Reserved. <br>
    <a href='mailto:info@SilentTimer.com'>info@SilentTimer.com</a><br>
  <a href='http://www.silenttimer.com?a=CBound' target='_blank'>http://www.SilentTimer.com</a></font><font size='1' face='Arial, Helvetica, sans-serif'><br>
    <a href='http://silenttimer.com/legal/privacy.php?a=CBound' target='_blank'>Privacy
    Policy</a></font><br>
  </p>
</div>
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


 <strong><font color="#003399" size="4" face="Times New Roman, Times, serif"> 
</font></strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font size="4" face="Times New Roman, Times, serif"><font size="2">THE 
SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></font><font color="#000000" size="2"> 
<em>Handbook</em></font></strong></font> 
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>GMAT Test Registration</strong></font></p>
<p>
  <? if($EmailSent == "yes"){?>
  <strong><font color="#000099" size="2" face="Arial, Helvetica, sans-serif">Your
  GMAT registration email has been sent! Check your email. </font></strong>
  <? }?>
</p>
<p><font size="2" face="Arial, Helvetica, sans-serif">To receive <strong>FREE</strong> GMAT
      registration information, enter your name and email address below. We will
      send you an automatic email explaining how/where to register for the GMAT,
      and what the registration deadlines are for the next tests. The email also
  contains more valuable GMAT information to help prepare for your test.</font></p>
<form action="" method="post" name="frmGMAT" id="frmGMAT" onSubmit="return CheckForm();">
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">First Name <br>
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
        add &quot;info@silenttimer.com&quot; to your e-mail safe list. If you
        don't seem to get the email at first, check your spam filter.</font></strong></td>
    </tr>
    <tr>
      <td colspan="2"><p>
          <input name="Submit" type="submit" id="Submit" value="Get GMAT Registration Info!">
        </p>
          <p> <font size="2" face="Arial, Helvetica, sans-serif">We will <em>never</em> sell
              your personal information. <a href="http://www.silenttimer.com/legal/privacy.php" target="_blank">Please
              read our privacy policy</a>.</font></p></td>
    </tr>
  </table>
</form>
<p><font size="2" face="Arial, Helvetica, sans-serif">Once you feel prepared 
    and ready to take the GMAT exam, pick out a test center and schedule an appointment 
    by phone (1-800-462-8669), mail, fax or <a href="http://www.mba.com/mba/TaketheGMAT/RegisterfortheGMAT/GMATAppointments/ScheduleaGMATAppointmentBRIDGE.htm" target="_blank">online</a>. 
</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">To mail or fax your GMAT 
  registration, you must first <a href="http://www.mba.com/mba/TaketheGMAT/Tools/2005VoucherRequestForm.htm" target="_blank">request 
  a voucher form these guys</a>.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Once you get registered, 
  be sure to find out exactly where the test center is so that you will have no 
  problem finding it the day of the GMAT test.</font></p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>