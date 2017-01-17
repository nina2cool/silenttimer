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
			if(document.formACT.FirstName.value == "")
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
			if(document.formACT.LastName.value == "")
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
			
			if(document.formACT.Email.value == "")
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
	
				var str = document.formACT.Email.value;
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
			
			$sql = "INSERT INTO tblRegistration(FirstName, LastName, TestID, Email, DateTime, Link)
			VALUES('$FirstName', '$LastName', '6', '$Email', '$Now', 'handbook-act');";
			//echo $sql;
			mysql_query($sql) or die("Cannot insert ACT registration, please try again.");
			

# -----------------------------------------------------
# SEND and email with ALL data to our email address...
# -----------------------------------------------------

require "../../../code/class.phpmailer.php";

$mail = new PHPMailer();
	
$mail->From = "info@silenttimer.com";
$mail->FromName = "The SilentTimer.com Team";
$mail->AddAddress("$Email", "$FirstName $LastName");
//$mail->AddBCC("erik@silenttimer.com", "Erik McMillan");
//$mail->AddBCC("nina@silenttimer.com", "Christina McMillan");
$mail->IsHTML(true);
$mail->Subject = "ACT Registration Information!";

$html =
"
<HTML>
<HEAD>
<META NAME='GENERATOR' Content='Microsoft DHTML Editing Control'>
<TITLE>ACT Registration Information</TITLE>
</HEAD>
<BODY>

<P><font size='2'><a href='http://www.silenttimer.com'><img src='http://www.silenttimer.com/timer/pics/Logo.jpg' alt='The Silent Timer' width='100' height='50' border='0'></a>&nbsp; 
      <a href='http://www.silenttimer.com/product.php'><font face='Arial, Helvetica, sans-serif'>Purchase your
   ACT Timer Here</font></a></font></P>
<DIV>
<HR style='WIDTH: 954px; HEIGHT: 5px' color=#031298 SIZE=5>
</DIV>
<P><font size='2' face='Arial, Helvetica, sans-serif'>$FirstName,</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Thank you for looking to
    us for help registering for your ACT test.&nbsp; We 
hope this information will be useful in your quest to take one of the most 
difficult standardized exams. Good luck with getting into the college of your
dreams. </font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>What is the ACT?</STRONG></FONT></P>
<P><FONT face='Arial, Helvetica, sans-serif' size=2>A 215 question half-day standardized
    college entrance exam, the ACT test measures students&rsquo; general educational
progress and ability to handle college level coursework.</FONT></P>
<TABLE width='100%' border=1 cellPadding=5 cellSpacing=0 bordercolor='#CCCCCC'>
  <TBODY>
    <TR bgcolor='#FFFFCC'>
      <TD width='10%' class=bold><div align='center'><strong><font size='2' face='Arial, Helvetica, sans-serif'>Test</font></strong></div></TD>
      <TD width='20%' align=middle><div align='center'><strong><font size='2' face='Arial, Helvetica, sans-serif'>#
      of Questions </font></strong></div></TD>
      <TD width='20%' align=middle><div align='center'><strong><font size='2' face='Arial, Helvetica, sans-serif'>Time</font></strong></div></TD>
      <TD class=bold><div align='center'><strong><font size='2' face='Arial, Helvetica, sans-serif'>Content</font></strong></div></TD>
    </TR>
    <TR>
      <TD><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>English</font></div></TD>
      <TD align=middle><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>75&nbsp;questions</font></div></TD>
      <TD align=middle><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>45&nbsp;minutes</font></div></TD>
      <TD><font size='2' face='Arial, Helvetica, sans-serif'>Measures standard written English and rhetorical skills.</font></TD>
    </TR>
    <TR>
      <TD><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>Mathematics</font></div></TD>
      <TD align=middle><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>60&nbsp;questions</font></div></TD>
      <TD align=middle><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>60&nbsp;minutes</font></div></TD>
      <TD><font size='2' face='Arial, Helvetica, sans-serif'>Measuring
          mathematical skills students have typically acquired in courses taken
        up to the beginning of grade&nbsp;12.</font></TD>
    </TR>
    <TR>
      <TD><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>Reading</font></div></TD>
      <TD align=middle><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>40&nbsp;questions</font></div></TD>
      <TD align=middle><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>35&nbsp;minutes</font></div></TD>
      <TD><font size='2' face='Arial, Helvetica, sans-serif'>Measures reading comprehension.</font></TD>
    </TR>
    <TR>
      <TD><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>Science</font></div></TD>
      <TD align=middle><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>40&nbsp;questions</font></div></TD>
      <TD align=middle><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>35&nbsp;minutes</font></div></TD>
      <TD><font size='2' face='Arial, Helvetica, sans-serif'>Measures the interpretation, analysis, evaluation,
        reasoning, and problem-solving skills required in the natural sciences.</font></TD>
    </TR>
    <TR>
      <TD><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>Optional Writing Test</font></div></TD>
      <TD align=middle><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>1 prompt</font></div></TD>
      <TD align=middle><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>30 minutes</font></div></TD>
      <TD><font size='2' face='Arial, Helvetica, sans-serif'>Measures writing skills emphasized in high school English classes and
        in entry-level college composition courses.</font></TD>
    </TR>
  </TBODY>
</TABLE>
<div align='center'><a href='http://www.actstudent.org/testprep/descriptions/index.html'><em><font size='2' face='Arial, Helvetica, sans-serif'>This is from the ACT web site.</font></em></a></div>
<P><font size='2' face='Arial, Helvetica, sans-serif'>  Read more here:<BR>
  <br>
    <a href='http://www.actstudent.org/testprep/descriptions/index.html'>http://www.actstudent.org/testprep/descriptions/index.html</a></font><font face='Arial, Helvetica, sans-serif'><U><br>
    <br>
    </U>------------------------------------------------------------------------ 
</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>How do I
register for the ACT?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Registering for the ACT
    is quite easy. There is an online form that only takes a few minutes.&nbsp; You
    can also register via mail. </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>* ACT Registration Information:
<a href='http://www.actstudent.org/regist/elecreg.html'>http://www.actstudent.org/regist/elecreg.html</a></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>You must register via mail
    if you meeting any of the following conditions:</font></P>
<UL class=regist>
  <LI><font size='2' face='Arial, Helvetica, sans-serif'> Testing at a test center
      outside the 50&nbsp;United
    States </font>
  <LI><font size='2' face='Arial, Helvetica, sans-serif'>
    Requesting special accommodations because of
      a disability
  </font>
  <LI><font size='2' face='Arial, Helvetica, sans-serif'>
   Requesting a fee waiver to cover the basic fee
  </font>
  <LI><font size='2' face='Arial, Helvetica, sans-serif'>
    Registering with a state-funded voucher to cover the basic fee (for example,
      Colorado, Illinois, or Tennessee public high school students)
  </font>
  <LI><font size='2' face='Arial, Helvetica, sans-serif'>
    Students currently enrolled in grades 6, 7, 8,
    or 9
  </font> </LI>
</UL>
<P><font size='2' face='Arial, Helvetica, sans-serif'>* Mail Registration: To
    register via mail, you will need a copy of the ACT Registration Booklet (you
    can find this at your school's counselors office or have ACT send it to you
    <a href='http://www.actstudent.org/forms/stud_req.html'>http://www.actstudent.org/forms/stud_req.html</a>).</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Telephone
      registration is available for students re-taking the test. They are available
    Monday through Friday, 8:00am to 8:00pm CST. Call <SPAN class=sidehead2purple>(319)
337-1270</SPAN>. You need to be aware that there may be a $10 fee for this expedited
service, but you do get immediate confirmation.</font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>When should I 
take the ACT?</STRONG></FONT> </P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>You should take the ACT
    at least <strong>two months</strong> ahead of the college application deadlines.
    It can take anywhere from one month to two months to receive your scores.</font></P>
<P><FONT size='2' face='Arial'><strong>ACT Reasoning Test Fees </strong><br>
</FONT><FONT size='2' face='Arial'>On-time registrants: 
    $29.00<BR>
  Late registrants: 
$29.00 + $18 (late fee)<br>
 5th and 6th Additional College Reports: add $7 per college<br>
 Optional Writing Test: add $14.00<br>
 <a href='http://www.actstudent.org/regist/actfees.html'>Additional Fees </a></FONT></P>
<P><FONT size='2' face='Arial'>  <STRONG><U>Upcoming Domestic Test Dates and
        Registration Deadlines:</U></STRONG> (all
dates are postmark dates)</FONT></P>
<p><font size='2' face='Arial, Helvetica, sans-serif'><em>Check the <a href='http://www.actstudent.org/regist/nextdates.html'>ACT
web site</a> for upcoming test dates and fees.</em></font> </p>
<P><font size='2' face='Arial, Helvetica, sans-serif'><strong>International Students:</strong> <br>
  Visit this link for all up-to-date ACT Test Dates and International Registration
  Information:<BR>
  <a href='http://www.actstudent.org/regist/outside.html'>http://www.actstudent.org/regist/outside.html</a></font><font face='Arial, Helvetica, sans-serif'><br>
  <br>
  ------------------------------------------------------------------------ 
</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>I cannot
      take the Saturday test date due to religious reasons. What do I do?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>You can arrange for an
    alternate test date. You must use the mail-in application found in the ACT
    packet.
    <a href='http://www.actstudent.org/forms/stud_req.html'>Click here</a> to
    receive your packet, or go to your school counselor's office. </font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>Where do
I take the ACT?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The ACT is offered at many
    locations near you, often a school. You can look online for nearby test centers
    at <a href='http://www.actstudent.org/regist/centers.html'>http://www.actstudent.org/regist/centers.html</a>.</font><font face='Arial, Helvetica, sans-serif'><br>
  <br>
------------------------------------------------------------------------</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>I still need 
help!</STRONG></FONT> </P>
<p class=dtm><font size='2' face='Arial, Helvetica, sans-serif'>Contact the ACT
    with more questions. Get the information online at <a href='http://www.actstudent.org/faq/index.html'>http://www.actstudent.org/faq/index.html</a>.
    They have different phone numbers and addresses, depending on what you have
a question about. </font></p>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><font color='#000099' face='Arial, Helvetica, sans-serif'><strong>How should 
I prepare for the ACT?</strong></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Study, study, study! The
    best way to prepare for the ACT is to take as many timed tests as you possibly
    can. The ACT is not only about answering the questions correctly, but answering
    them quickly. There are many books on the market that can help you study.
    They have test questions, strategies, and techniques. Go to your local bookstore
    and find their test prep section. To improve your pacing skills, consider
buying a silent timer such as the one found on our web site.</font></P>
<P> <FONT color='#000099' size=4 face='Arial, Helvetica, sans-serif'><a href='http://www.silenttimer.com/product.php'><strong>Purchase
         your ACT Timer Here</strong></a></FONT></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>You can also find many study aids on the internet. Test preparation courses 
  may also be a good idea. There are many companies out there dedicated to helping 
  students prepare.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Visit the ACT
    Test Prep page for more information
    on how to prepare for the ACT:<U><br>
</U> <a href='http://www.actstudent.org/testprep/index.html'>http://www.actstudent.org/testprep/index.html</a></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Thank you for visiting
    our site. If you have any questions about The Silent Timer&#8482;, please feel free
  to email us.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>The SilentTimer.com Team<br>
    <a href='http://www.SilentTimer.com'>http://www.SilentTimer.com</a> <br>
<a href='mailto:info@silenttimer.com'>info@silenttimer.com</a></font></P>
<P><FONT face='Arial, Helvetica, sans-serif' size=2><em>ACT and ACT Reasoning are
registered trademarks of ACT, Inc.</em></FONT></P>
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
$mail->Subject = "Your ACT Test Timer";

$html =
"

<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<title>ACT Silent Watch</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>

<body>
<div align='center'>
  <table width='62%' height='7%' border='1' cellpadding='3' cellspacing='0' bordercolor='#FF0000' bgcolor='#FFFF99'>
    <tr> 
      <td height='37'>
<div align='center'><font color='#003399' size='5' face='Arial, Helvetica, sans-serif'><strong>Need
      a timer for the ACT?</strong></font></div></td>
    </tr>
  </table>
</div>
<p align='left'><font size='2' face='Arial, Helvetica, sans-serif'>$FirstName,</font></p>
<p><font size='2' face='Arial, Helvetica, sans-serif'>One of the hardest aspects
     of the ACT is the time limit.</font><font color='#000080' size='2' face='Arial, Helvetica, sans-serif'><strong><br>
  <br>
Good timing</strong></font><font size='2' face='Arial, Helvetica, sans-serif'> 
  is the easiest way to improve your ACT score. You may be smart, you may be 
  prepared, but a poor pacing strategy can prevent you from achieving your full 
potential on test day. Don&#8217;t let this happen to you&#8230;</font> </p>
<p><font color='#000080' size='2' face='Arial, Helvetica, sans-serif'><strong>Maximizing</strong></font><font size='2' face='Arial, Helvetica, sans-serif'> 
  your ACT score requires practice and a solid timing strategy.</font></p>
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
    improve pacing on standardized exams such as the ACT. Special features such
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
<em>Handbook</em></font></strong></font><font size="2"> 
</font> 
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>ACT&reg; Registration</strong></font></p>
<p>
  <? if($EmailSent == "yes"){?>
  <strong><font color="#000099" size="2" face="Arial, Helvetica, sans-serif">Your
  ACT registration email has been sent! Check your email. </font></strong>
  <? }?>
  <font size="2" face="Arial, Helvetica, sans-serif">To receive <strong>FREE</strong> ACT
  registration information, enter your name and email address below. We will
  send you an automatic email explaining how/where to register for the ACT, and
  what the registration deadlines are for the next tests. The email also contains
more valuable ACT information to help prepare for your test.</font></p>
<form action="" method="post" name="formACT" id="formACT">
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
          <input name="Submit" type="submit" id="Submit" value="Get ACT Registration Info!">
        </p>
          <p> <font size="2" face="Arial, Helvetica, sans-serif">We will <em>never</em> sell
              your personal information. <a href="../../../legal/privacy.php" target="_blank">Please
              read our privacy policy</a>.<br>
        </font></p></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>ACT Practice Test 
    Links</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"> </font><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.act-test.org/" target="_blank">ACT
       Practice Test Site</a><br>
  <br>
  <a href="http://www.actstudent.org/sampletest/" target="_blank">Official ACT
   Test Site Prep Questions</a><br>
  <br>
  <a href="http://www.learnatest.com/LearningExpressLibrary/Home.cfm?CFID=&CFTOKEN=&Refresh=1&HR=http://www.owatonna.lib.mn.us" target="_blank">Online
   Practice tests &amp; tutorials with immediate answer advice</a><br>
  <br>
  </font></p>
<p>&nbsp;</p>

  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>

                  