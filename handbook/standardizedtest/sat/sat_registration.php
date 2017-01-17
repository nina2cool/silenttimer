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
			if(document.frmSAT.FirstName.value == "")
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
			if(document.frmSAT.LastName.value == "")
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
			
			if(document.frmSAT.Email.value == "")
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
	
				var str = document.frmSAT.Email.value;
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
			VALUES ('$FirstName', '$LastName', '3', '$Email', '$Now', 'handbook-sat')";
		
			
			
			mysql_query($sql) or die("Cannot insert SAT registration, please try again.");
			



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
$mail->Subject = "SAT Registration Information!";

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
   SAT Timer Here</font></a></font></P>
<DIV>
<HR style='WIDTH: 954px; HEIGHT: 5px' color=#031298 SIZE=5>
</DIV>
<P><font size='2' face='Arial, Helvetica, sans-serif'>$FirstName,</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Thank you for looking to
    us for help registering for your SAT test.&nbsp; We 
hope this information will be useful in your quest to take one of the most 
difficult standardized exams. Good luck with studying, and hopefully you will
get into your dream school!</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>What is the SAT?</STRONG></FONT></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The SAT is a standardized
    test taken by most high school students. Most often, when someone refers
    to the SAT, they are talking about the SAT Reasoning test. The SAT also has
SAT Subject Tests, which are tests specific to a particular subject.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The SAT Reasoning Test
    (SAT)  is 3 hours and 45 minutes long. It consists of one 25-minute essay,
    one 10-minute, writing multiple-choice section, six 25-minute sections of
    Critical Reading, Math, and Writing, one 25-minute unscored section, and
    two 20-minute sections (one math, one critical reading).</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>You receive a score for
    each major section: Critical Reading, Math, and Writing. The scores for each
    section range from 200-800. Your total SAT score is the sum of these three
    scores. </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Read more here:<BR>
  <br>
  <a href='http://www.collegeboard.com/student/testing/sat/about/SATI.html'>http://www.collegeboard.com/student/testing/sat/about/SATI.html</a></font><font face='Arial, Helvetica, sans-serif'><a href='http://silenttimer.com/handbook/standardizedtest/lsat/index.php'><U><br>
    <br>
    </U></a>------------------------------------------------------------------------ 
</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>How do I
register for the SAT?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Registering for the SAT
    is quite easy. There is an online form that only takes a few minutes.&nbsp; You
can also register via mail.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>* SAT Registration Information:
<a href='http://www.collegeboard.com/student/testing/sat/reg.html'>http://www.collegeboard.com/student/testing/sat/reg.html</a></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>* Mail Registration: To
    register via mail, you will need a copy of the SAT Registration Booklet (you
    can find this at your school's counselors office). The registration form
    and envelope are found in this booklet, as well as test information, test
dates, and instructions. </font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>When should I 
take the SAT?</STRONG></FONT> </P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Many law schools require
    that the SAT be taken by December for&nbsp;admission the following fall.&nbsp; However,
taking the test earlier-in June or October-is often advised. </font></P>
<P><FONT size='2' face='Arial'><strong>SAT Reasoning Test</strong><br>
</FONT><FONT size='2' face='Arial'>On-time registrants: 
    $41.50<BR>
  Late registrants: 
$41.50 + $21 (late fee) </FONT></P>



<P><FONT size='2' face='Arial'><strong>SAT Subject Tests</strong><br> 
  On-time registrants: 
    $18 + either $19 (for language tests with listening) or $8 for all other
      tests<BR>
Late registrants: On-time registrants fee + $21 (late fee) <BR>
  <BR>
<STRONG><U>Domestic Test Dates and Registration Deadlines:</U></STRONG></FONT></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Visit this link for all up-to-date SAT Test Dates and International Registration
  Information as well as updated fees:<BR>
  <a href='http://www.collegeboard.com/student/testing/sat/calenfees.html'>http://www.collegeboard.com/student/testing/sat/calenfees.html</a></font><font face='Arial, Helvetica, sans-serif'><a href='http://www.lsac.org/LSAC.asp?url=/lsac/test-dates-deadlines.asp'><br>
  <br>
  </a>------------------------------------------------------------------------ 
</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>I cannot
      take the Saturday test date due to religious reasons. What do I do?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>You can register to take
    the SAT on Sunday if you cannot take it on Saturday for religious reasons.
    First-time Sunday registrants must register via mail. After that, online
    registration is acceptable. </font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>Where do
I take the SAT?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The SAT is offered at many
    locations near you, often a school. You can look online for nearby test centers
    at <a href='http://apps.collegeboard.com/cbsearch_code/codeSearchSatTest.jsp' target='_blank'>http://apps.collegeboard.com/cbsearch_code/codeSearchSatTest.jsp</a>.</font><font face='Arial, Helvetica, sans-serif'><br>
  <br>
  ------------------------------------------------------------------------</font></P>
<P><FONT color=#0000a0 face='Arial, Helvetica, sans-serif'><STRONG>What do I
      get as a CollegeBoard member?&nbsp; <BR>
</STRONG><FONT 
color=#0f0f0f><BR>
  <font size='2'>You can sign up online to become a CollegeBoard member. This
  is required if you are registering online. Once logged in, you can register
  for the SAT, get and send scores, apply to colleges, and much more! </font></FONT></FONT></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Become a CollegeBoard member
here:</font></P>
<P><a href='https://ecl.collegeboard.com/account/login.jsp?applicationId=115&destinationpage=https%3A//nsat.collegeboard.com:443/satweb/login.jsp' target='_blank'><font size='2' face='Arial, Helvetica, sans-serif'>https://ecl.collegeboard.com/account/login.jsp?applicationId=115&amp;destinationpage=https%3A%2F%2Fnsat.collegeboard.com:443/satweb%2Flogin.jsp</font></a><font face='Arial, Helvetica, sans-serif'><a href='https://os.lsac.org/Release/logon/logon.aspx'><U><br>
  <br>
  </U></a>------------------------------------------------------------------------ 
</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>I still need 
help!</STRONG></FONT> </P>
<p class=dtm><font size='2' face='Arial, Helvetica, sans-serif'>If you still
    have questions or need assistance, email CollegeBoard at <A 
href='mailto:sat@info.collegeboard.org'>sat@info.collegeboard.org</A> or by calling
  (609) 771-7600, Monday - Friday, from 8 a.m. to 8:45 p.m. (ET).
  Summer hours (after June administration - Aug.): Monday - Friday,
from 8 a.m. to 5:45 p.m. (ET).</font></p>
<p><font size='2' face='Arial, Helvetica, sans-serif'>Services for Students with Disabilities: (609) 771-7137 </font></p>
<p><font size='2' face='Arial, Helvetica, sans-serif'>TTY (for students who are deaf or hard of hearing): (609) 882-4118</font></p>
<p><font size='2' face='Arial, Helvetica, sans-serif'>The College Board<BR>
  SAT Program <BR>
  P.O. Box 6200<BR>
Princeton, NJ, 08541-6200</font></p>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><font color='#000099' face='Arial, Helvetica, sans-serif'><strong>How should 
  I prepare for the SAT?</strong></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Study, study, study! The
    best way to prepare for the SAT is to take as many timed tests as you possibly
    can. The SAT is not only about answering the questions correctly, but answering
    them quickly. There are many books on the market that can help you study.
    They have test questions, strategies, and techniques. Go to your local bookstore
    and find their test prep section. To improve your pacing skills, consider
  buying a silent timer such as the one found on our web site.</font></P>
<P> <FONT color='#000099' size=4 face='Arial, Helvetica, sans-serif'><a href='http://www.silenttimer.com/product.php'><strong>Purchase
         your SAT Timer  Here</strong></a></FONT></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>You can also find many study aids on the internet. Test preparation courses 
  may also be a good idea. There are many companies out there dedicated to helping 
  students prepare.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Visit CollegeBoard's SAT
    Preparation Center&#8482; for more information
    on how to prepare for the SAT:<U><br>
</U> <a href='http://www.collegeboard.com/student/testing/sat/prep_one/prep_one.html'>http://www.collegeboard.com/student/testing/sat/prep_one/prep_one.html</a></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Thank you for visiting
    our site. If you have any questions about The Silent Timer&#8482;, please feel free
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
$mail->Subject = "SAT Pacing Tools";

$html =
"
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<title>SAT Silent Timer</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>

<body>
<div align='center'>
  <table width='62%' height='7%' border='1' cellpadding='3' cellspacing='0' bordercolor='#FF0000' bgcolor='#FFFF99'>
    <tr> 
      <td height='37'>
<div align='center'><font color='#003399' size='5' face='Arial, Helvetica, sans-serif'><strong>Need
      a timer for the SAT?</strong></font></div></td>
    </tr>
  </table>
</div>
<p align='left'><font size='2' face='Arial, Helvetica, sans-serif'>$FirstName,</font></p>
<p><font size='2' face='Arial, Helvetica, sans-serif'>One of the hardest aspects
     of the SAT is the time limit.</font><font color='#000080' size='2' face='Arial, Helvetica, sans-serif'><strong><br>
  <br>
Good timing</strong></font><font size='2' face='Arial, Helvetica, sans-serif'> 
  is the easiest way to improve your SAT score. You may be smart, you may be 
  prepared, but a poor pacing strategy can prevent you from achieving your full 
potential on test day. Don&#8217;t let this happen to you&#8230;</font> </p>
<p><font color='#000080' size='2' face='Arial, Helvetica, sans-serif'><strong>Maximizing</strong></font><font size='2' face='Arial, Helvetica, sans-serif'> 
  your SAT score requires practice and a solid timing strategy.</font></p>
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
    improve pacing on standardized exams such as the SAT. Special features such
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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>SAT Registration</strong></font></p>
<p>
  <? if($EmailSent == "yes"){?>
  <strong><font color="#000099" size="2" face="Arial, Helvetica, sans-serif">Your
  SAT registration email has been sent! Check your email. </font></strong>
  <? }?>
  <font size="2" face="Arial, Helvetica, sans-serif">To receive <strong>FREE</strong> SAT
  registration information, enter your name and email address below. We will
  send you an automatic email explaining how/where to register for the SAT, and
  what the registration deadlines are for the next tests. The email also contains
more valuable SAT information to help prepare for your test.</font></p>
<form name="form1" method="post" action="">
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
          <input name="Submit" type="submit" id="Submit" value="Get SAT Registration Info!">
        </p>
          <p> <font size="2" face="Arial, Helvetica, sans-serif">We will <em>never</em> sell
              your personal information. <a href="../../../legal/privacy.php" target="_blank">Please
              read our privacy policy</a>.</font></p>
      </td>
    </tr>
  </table>
</form>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Read more about SAT Registration:</strong></font> </p>
<p><font size="2" face="Arial, Helvetica, sans-serif">SAT registration can be
        completed three ways&#8212;<a href="http://www.collegeboard.com/student/testing/sat/reg.html" target="_blank">online</a>, 
        by phone or by mail. Seems as though everything is moving online these days, 
        so <a href="http://www.collegeboard.com/student/testing/sat/reg.html" target="_blank">take 
  advantage of this simple opportunity</a>.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Students may only do SAT 
  registration by the telephone if they have registered for the SAT test before. 
  Call 1-800-728-7267.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">If you choose to register 
  by mail, you will need the <em>Registration Bulletin</em>, which is available 
  at your school counselor&#8217;s office. This booklet has everything you need 
  to know about the SAT test, including test dates, registration deadlines, fees, 
  instructions, test center codes, etc.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">There are a few things you 
  will typically need when registering for the SAT, no matter which way you do 
  it. Have ready your name, birth date, sex, two-digit test codes, five-digit 
  test center codes, four-digit college/scholarship program codes and credit card 
  number.</font></p>
<p>&nbsp;</p>
<p> 
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
