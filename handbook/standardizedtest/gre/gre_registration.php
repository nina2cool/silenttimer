<?
//security for page
session_start();

$PageTitle = "Registering for the GRE";

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


			# link to Database...
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
			if(document.frmGRE.FirstName.value == "")
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
			if(document.frmGRE.LastName.value == "")
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
			
			if(document.frmGRE.Email.value == "")
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
	
				var str = document.frmGRE.Email.value;
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
			VALUES ('$FirstName', '$LastName', '5', '$Email', '$Now', 'handbook-gre')";
		
			
			
			mysql_query($sql) or die("Cannot insert GRE registration, please try again.");
			



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
$mail->Subject = "GRE Registration Information!";

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
GRE Timer Here</font></a></font></P>
<DIV>
<HR style='WIDTH: 954px; HEIGHT: 5px' color=#031298 SIZE=5>
</DIV>
<P><font size='2' face='Arial, Helvetica, sans-serif'>$FirstName,</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Thank you for looking to
    us for help registering for your GRE test.&nbsp; We 
hope this information will be useful in your quest to take one of the most 
difficult standardized exams. Good luck with studying and pursuing&nbsp;your
graduate degree.</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>What is the GRE?</STRONG></FONT></P>
<P><FONT face='Arial, Helvetica, sans-serif' size=2>The GRE (given by ETS) is
    composed of three sections: analytical writing, verbal, and quantitative.
    The analytical writing section assesses critical thinking and analytical
    writing skills. The verbal section tests candidates&rsquo; ability
    to analyze and evaluate written material and interpret information from it,
    analyze relationships among component arts of sentences, recognize relationships
    between words and concepts and reason with words in solving problems. Lastly,
    the quantitative section is a combination of arithmetic, algebra, geometry
    and data analysis&mdash;all
concepts covered in high school.</FONT></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Read more here:<BR>
    <br>
<a href='http://silenttimer.com/handbook/standardizedtest/gre/index.php'>http://silenttimer.com/handbook/standardizedtest/gre/index.php</a></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>There are also GRE subject
    tests. This email does not contain information for the subject tests, but
    you can read more about the GRE subject tests here: <a href='http://www.silenttimer.com/handbook/standardizedtest/gre/gre_subject_tests.php'>http://www.silenttimer.com/handbook/standardizedtest/gre/gre_subject_tests.php</a>.</font></P>
<P><font face='Arial, Helvetica, sans-serif'><a href='http://silenttimer.com/handbook/standardizedtest/gre/index.php'><U><br>
    </U></a>------------------------------------------------------------------------ 
</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>How do I
register for the GRE?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Registering for the GRE
    is quite easy. You can register online, over the telephone, or via mail.</font></P>
<P><FONT face='Arial, Helvetica, sans-serif' size=2>There are two different forms
    of the GRE test&mdash;<A href='gre_computer.php'>a computer-adaptive test</A> and
    a <A 
href='gre_paper.php'>paper-based test</A>. In areas where computer-adaptive tests
    aren&rsquo;t available, candidates must take the paper-based test and vice
versa.</FONT></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>You can register for the
    computer-based test online, over the telephone, or via mail. You can only
register online or via mail for the paper-based test. </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>* <a href='http://www.ets.org/portal/site/ets/menuitem.1488512ecfd5b8849a77b13bc3921509/?vgnextoid=ede42d3631df4010VgnVCM10000022f95190RCRD&vgnextchannel=cbc6e3b5f64f4010VgnVCM10000022f95190RCRD'>Online Registration</a></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>* Telephone Registration: Call
  the test center directly or the Prometric&reg;&nbsp;Candidate Services
    Call Center Monday through Friday, 8 a.m. - 8 p.m., Eastern Time (New York),
    (excluding holidays), at 1-800-GRE-CALL.
If you use a Telephone/Teletypewriter (TTY), call 1-800-529-3590.</font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>When should I 
take the GRE?</STRONG></FONT> </P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>When deciding when to take
    your GRE test, consider the time it takes to receive your scores. For the
    computer-adapted test, your official score results are sent ten to fifteen
    days after the test (although you can see your unofficial score immediately
after). Scores for the paper-based test take about five weeks to be released.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Schedule your test with
    plenty of time to receive your scores, and even time for a re-test in case
you do not perform as well as you would have liked.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Computer-adapted testing
(CAT) can be scheduled through your local center at any time of the year.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'> The
paper-based version is given three times a year.</font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>What are the
      associated fees?</STRONG></FONT></P>
<font size='2' face='Arial, Helvetica, sans-serif'>Contact the GRE for the latest fee schedule.</font>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------ 
</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>I want to
take the GRE on a Monday for religious reasons. What do I do?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The paper-based GRE is
    administered on Mondays twice a year. For the CAT, you can schedule them at any time during the week. Check
your local test site for available dates and times. </font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>Where do
I take the GRE?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The ETS has many approved
    testing centers. Visit their website at <a href='http://etsis4.ets.org/tcenter/cbt_dm.cfm'>http://etsis4.ets.org/tcenter/cbt_dm.cfm</a>  to download
PDF's of the locations.</font><font face='Arial, Helvetica, sans-serif'><br>
  <br>
------------------------------------------------------------------------</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>I still need 
help!</STRONG></FONT> </P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Call ETS at (866) 473-4373.
They will be able to help you with any questions you have about the GRE.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>1-866-473-4373 (United
    States, U.S. Territories and Canada)<BR>
1-609-771-7670 (All other locations)<BR>
<EM>Monday - Friday 8:00 a.m. - 7:45 p.m. EST (except for U.S. holidays)</EM></font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><font color='#000099' face='Arial, Helvetica, sans-serif'><strong>How should 
  I prepare for the GRE?</strong></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Study, study, study! The
    best way to prepare for the GRE is to take as many  timed tests as you possibly
    can. The GRE is not only about answering the questions  correctly, but answering
    them quickly. There are many books on the market that  can help you study.
    They have test questions, strategies, and techniques. Go  to your local bookstore
    and find their test prep section. To improve your pacing  skills, consider
    buying a silent timer such as the one found on our website.</font></P>
<P> <FONT color='#000099' size=4 face='Arial, Helvetica, sans-serif'><a href='http://www.silenttimer.com/product.php'><strong>Purchase
         your GRE Timer Here</strong></a></FONT></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>You can also find many study aids on the internet. Test preparation courses 
  may also be a good idea. There are many companies out there dedicated to helping 
  students prepare.</font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
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
$mail->Subject = "$FirstName $LastName got free GRE Information!";

$DetailedEmail =
"


The following person filled out our form on line to get free GRE information:

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
$mail->Subject = "Silent Timer for the GRE";

$html =
"
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<title>GRE Silent Timer</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>

<body>
<div align='center'>
  <table width='62%' height='7%' border='1' cellpadding='3' cellspacing='0' bordercolor='#FF0000' bgcolor='#FFFF99'>
    <tr> 
      <td height='37'>
<div align='center'><font color='#003399' size='5' face='Arial, Helvetica, sans-serif'><strong>Need
      a timer for the GRE?</strong></font></div></td>
    </tr>
  </table>
</div>
<p align='left'><font size='2' face='Arial, Helvetica, sans-serif'>$FirstName,</font></p>
<p><font size='2' face='Arial, Helvetica, sans-serif'>One of the hardest aspects
     of the GRE is the time limit.</font><font color='#000080' size='2' face='Arial, Helvetica, sans-serif'><strong><br>
  <br>
Good timing</strong></font><font size='2' face='Arial, Helvetica, sans-serif'> 
  is the easiest way to improve your GRE score. You may be smart, you may be 
  prepared, but a poor pacing strategy can prevent you from achieving your full 
potential on test day. Don&#8217;t let this happen to you&#8230;</font> </p>
<p><font color='#000080' size='2' face='Arial, Helvetica, sans-serif'><strong>Maximizing</strong></font><font size='2' face='Arial, Helvetica, sans-serif'> 
  your GRE score requires practice and a solid timing strategy.</font></p>
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
    improve pacing on standardized exams such as the GRE. Special features such
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
<strong><font color="#003399" size="4" face="Times New Roman, Times, serif"> </font></strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font size="4" face="Times New Roman, Times, serif"><font size="2">THE 
SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></font><font color="#000000" size="2"> 
<em>Handbook</em></font></strong></font> 
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="gre_registration.php">GRE 
  Registration</a> | <a href="<? echo $https;?>product.php?t=GRE"> 
  GRE Timer</a> | <a href="gre_test_dates.php">GRE Test Dates</a> | &nbsp;<a href="../../../testhome/gre.php">GRE
   Test</a></strong></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>GRE Registration</strong></font></p>
                  

<? if($EmailSent != "yes"){?>

<p><font size="2" face="Arial, Helvetica, sans-serif">To receive <strong>FREE</strong> GRE registration
     information, enter your name and email address below. We will send you an
    automatic  email explaining how/where to register for the GRE, and what
    the registration  deadlines are for the next tests. The email also contains
    more valuable GRE  information to help prepare for your test.</font> </p>
<form action="" method="post" name="frmGRE" id="frmGRE" onSubmit="return CheckForm();">
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
          <input name="Submit" type="submit" id="Submit" value="Get GRE Registration Info!">
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
GRE registration email has been sent! Check your email. </font></strong> 
<? }?>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Read more about 
  GRE Registration:</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Once you commit to taking
    the exam, it&#8217;s time to look into GRE registration. It&#8217;s best
    to register early, no matter what test you&#8217;re taking, to ensure your
    preferred test date and test center as well as receiving complementary test
materials upon registration. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">You can register for the
    GRE test by phone or mail. Call 1-800-473-2255 and have your credit card
    number ready. To register by mail, first get a copy of the <a href="http://www.ets.org/Media/Tests/GRE/pdf/GRE%20Registration%20Bulletin.pdf" target="_blank">GRE
    Information and Registration Bulletin</a>. (To request the brochure by mail,
    fill out the <a href="http://www.ets.org/portal/site/ets/menuitem.1488512ecfd5b8849a77b13bc3921509/?vgnextoid=e5f42d3631df4010VgnVCM10000022f95190RCRD&vgnextchannel=f04cf3d792285010VgnVCM10000022f95190RCRD" target="_blank">GRE
    Information and Registration Bulletin Request Form</a>) Mail
    a completed Authorization Voucher Request Form, and allow four weeks for
    processing and delivery. Once you receive your voucher, call to schedule
    an appointment.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">GRE subject test registration
    is additionally <a href="http://web1.gre.org:82/gre" target="_blank">available
    online</a> or by mail for the GRE general test.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Standby testing may be
    available. If you choose to attempt this procedure, report to the testing
    center by 8:15 a.m. on test day with a completed registration form, payment
    and photo identification. </font></p>
<p>&nbsp;</p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links</font></strong></p>
<table width="100%"  border="0" cellpadding="5" cellspacing="2">
  <tr valign="top">
    <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Test Prep
          Links<br>
      </font> <br>
      </strong>
        <table width="100%"  border="0" cellspacing="0" cellpadding="1">
          <tr>
            <?
		$sql2 = "SELECT * FROM tblLinks WHERE Test = 'GRE' AND Status = 'active' AND Type <> 'News' GROUP BY Title ORDER BY IsOfficial DESC, Title";
		$result2 = mysql_query($sql2) or die("Cannot get links");
		
		while($row2 = mysql_fetch_array($result2))
		{
		$Link = $row2[Link];
		$Description = $row2[Description];
		$Title = $row2[Title];
		
		
?>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $Link; ?>" target="_blank">- <? echo $Title; ?></a>
                  <?
		  if($Description <> "")
		  {
		  ?>
            - <? echo $Description; ?>
            <?
		  }
		  ?>
            </font> </td>
          </tr>
          <?
}
?>
      </table></td>
  </tr>
  <tr valign="top">
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>News Articles</strong><br>
      </font>
        <table width="100%"  border="0" cellspacing="0" cellpadding="1">
          <tr>
            <?
		$sql2 = "SELECT * FROM tblLinks WHERE Test = 'GRE' AND Type = 'News' AND Status = 'active' GROUP BY Title ORDER BY IsOfficial DESC, Title";
		$result2 = mysql_query($sql2) or die("Cannot get links");
		
		while($row2 = mysql_fetch_array($result2))
		{
		$Link = $row2[Link];
		$Description = $row2[Description];
		$Title = $row2[Title];
		
		
?>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $Link; ?>" target="_blank">- <? echo $Title; ?></a>
                  <?
		  if($Description <> "")
		  {
		  ?>
            - <? echo $Description; ?>
            <?
		  }
		  ?>
            </font> </td>
          </tr>
          <?
}
?>
      </table></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Additional Search 
  Help for GRE Registration<br>
  </strong>Click below to search for &quot;GRE Registration&quot; in the following
search engines: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.google.com/search?hl=en&lr=&ie=UTF-8&oe=UTF-8&q=GRE%2Bregistration" target="_blank">Google</a> 
  | <a href="http://search.msn.com/results.aspx?q=GRE%2Bregistration&FORM=SMCRT" target="_blank">MSN</a> 
  | <a href="http://altavista.com/web/results?q=GRE%2Bregistration&kgs=0&kls=1&avkw=aapt" target="_blank">Altavista</a> 
  | <a href="http://search.yahoo.com/search?p=GRE%2Bregistration&ei=UTF-8&fr=fp-top&n=20&fl=0&x=wrt" target="_blank">Yahoo</a> 
  | <a href="http://search.aol.com/aolcom/search?invocationType=topsearchbox./aolcom/jsp/search.jsp&query=GRE%2Bregistration&x=29&y=14" target="_blank">AOL</a> 
  | <a href="http://web.ask.com/web?q=GRE%2Bregistration&qsrc=1" target="_blank">Ask 
  Jeeves</a></font></p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>