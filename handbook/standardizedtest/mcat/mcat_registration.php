<?
//security for page
session_start();

$PageTitle = "Registering for the MCAT";

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
			if(document.frmMCAT.FirstName.value == "")
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
			if(document.frmMCAT.LastName.value == "")
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
			
			if(document.frmMCAT.Email.value == "")
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
	
				var str = document.frmMCAT.Email.value;
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
			VALUES ('$FirstName', '$LastName', '2', '$Email', '$Now', 'handbook-mcat')";
		
					
			mysql_query($sql) or die("Cannot insert MCAT registration, please try again.");
			



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
$mail->Subject = "MCAT Registration Information!";

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
MCAT Timer Here</font></a></font></P>
<DIV>
<HR style='WIDTH: 954px; HEIGHT: 5px' color=#031298 SIZE=5>
</DIV>
<P><font size='2' face='Arial, Helvetica, sans-serif'>$FirstName,</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Thank you for looking to us for
    help registering for your MCAT test.&nbsp; We 
hope this information will be useful in your quest to take one of the most 
difficult standardized exams. Good luck with studying and pursuing&nbsp;your
medical degree.</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>What is the MCAT?</STRONG></FONT></P>
<P><FONT face='Arial, Helvetica, sans-serif' size=2>Developed by the <A 
href='http://www.aamc.org/students/mcat/start.htm' target=_blank>Association
      of American Medical Colleges</A>, the MCAT test is composed of four sections:
      verbal reasoning, physical sciences, biological sciences and a writing
      sample. The standardized test evaluates problem solving, critical thinking
      and writing skills as well as candidates&rsquo; knowledge of science concepts
and principles required for the study of medicine.</FONT></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Read more here:<BR>
  <br>
  <a href='http://silenttimer.com/handbook/standardizedtest/MCAT/index.php'>http://silenttimer.com/handbook/standardizedtest/MCAT/index.php</a></font><font face='Arial, Helvetica, sans-serif'><a href='http://silenttimer.com/handbook/standardizedtest/MCAT/index.php'><U><br>
    <br>
    </U></a>------------------------------------------------------------------------ 
</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>How do I
register for the MCAT?</STRONG> </font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>Registering for the MCAT
    is quite easy. There is an online form that only takes a few minutes.&nbsp; Registration
    begins in January for that year's test dates. Email MCAT at <A href='mailto:mcat_reg@act.org'>mcat_reg@act.org</A> if
you need help.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>* Online Registration:
<a href='http://www.aamc.org/students/mcat/registration.htm'>http://www.aamc.org/students/mcat/registration.htm</a></font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>When should I 
take the MCAT?</STRONG></FONT> </P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>According the <a href='http://www.aamc.org/students/mcat/studentmanual/start.htm'>MCAT
    Student Manual</a>, it
    is suggested that you take the test in the calendar year prior to the year
    in which you plan to enter medical school. <em>For example, for Fall admission
  in 2007, take the test in 2006.</em></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'><b>The MCAT changed formats
    for 2007. The test is now computerized. The MCAT is also be offered 22
    times a year (instead of twice) in the morning or in the afternoon, on weekdays
    and Saturdays. The number of questions will be reduced by one-third, and
the time given for the test will be decreased by about 30%. </b></font></P>
<P><font color='#0f0f0f' size='2' face='Arial, Helvetica, sans-serif'>View
        upcoming MCAT test dates at <a href='http://www.silenttimer.com/testdates.php'>http://www.silenttimer.com/testdates.php</a></font><font face='Arial, Helvetica, sans-serif'><a href='http://www.lsac.org/LSAC.asp?url=/lsac/test-dates-deadlines.asp'><br>
  <br>
</a></font><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><font color='#0000a0' face='Arial, Helvetica, sans-serif'><STRONG>Where do
I take the MCAT?</STRONG> </font></P>
<P><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>Contact
    the AAMC for test center locations. </font><font face='Arial, Helvetica, sans-serif'><br>
  <br>
  ------------------------------------------------------------------------</font></P>
<P><FONT color=#0000a0 face='Arial, Helvetica, sans-serif'><STRONG>Are timers
      allowed for the MCAT ?&nbsp; <BR>
</STRONG><FONT 
color=#0f0f0f><BR>
  <font size='2'>No. Starting with the April 2004 test, timers are no longer
  allowed.</font></FONT></FONT></P>
<P><font color='#0f0f0f' size='2' face='Arial, Helvetica, sans-serif'>They do
allow analog watches. (Sometimes digital, but analog is preferred.)</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'><a href='http://www.aamc.org/students/mcat/about/faqs.htm'>http://www.aamc.org/students/mcat/about/faqs.htm</a></font><font face='Arial, Helvetica, sans-serif'><a href='https://os.lsac.org/Release/logon/logon.aspx'><U><br>
  <br>
  </U></a>------------------------------------------------------------------------ 
</font></P>
<P><FONT face=Arial, Helvetica, sans-serif color=#0000a0><STRONG>I still need 
help!</STRONG></FONT> </P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>MCAT prefers that you correspond
    via email. But you can  call the MCAT program office at (319) 337-1357
  . They will be able to help you with any questions you have
about the MCAT.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>MCAT web address:
    <a href='http://www.aamc.org/students/mcat/start.htm'>http://www.aamc.org/students/mcat/start.htm</a><br>
    AAMC web address: <a href='http://www.aamc.org/'>http://www.aamc.org/</a><br>
  The MCAT email address: <A href='mailto:mcat_reg@act.org'>mcat_reg@act.org</A></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>You can also view the MCAT
Student Manual online at <a href='http://www.aamc.org/students/mcat/studentmanual/start.htm'>http://www.aamc.org/students/mcat/studentmanual/start.htm</a>.</font></P>
<P><font face='Arial, Helvetica, sans-serif'>------------------------------------------------------------------------</font></P>
<P><font color='#000099' face='Arial, Helvetica, sans-serif'><strong>How should 
  I prepare for the MCAT?</strong></font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'><strong>Study, study, study!</strong> The
    best way to prepare for the MCAT is to take as many timed tests as you possibly
    can. The MCAT is not only about answering the questions correctly, but answering
    them quickly. There are many books on the market that can help you study.


    They have test questions, strategies, and techniques. Go to your local bookstore
    and find their test prep section. To improve your pacing skills, consider
  buying a silent timer such as the one found on our web site.</font></P>
<P> <FONT color='#000099' size=3 face='Arial, Helvetica, sans-serif'><a href='http://www.silenttimer.com/product.php'>Purchase
  your MCAT Timer Here</a></FONT></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>You can also find many
    study aids on the internet. Test preparation courses  may also be a good
    idea. There are many companies out there dedicated to helping  students prepare.</font></P>
<P><font size='2' face='Arial, Helvetica, sans-serif'>There is a great MCAT Online
    Practice web site at <a href='http://www.e-mcat.com/'>http://www.e-mcat.com/</a>.
    They offer full-length, real MCAT tests.</font></P>
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
$mail->Subject = "$FirstName $LastName got free MCAT Information!";

$DetailedEmail =
"


The following person filled out our form on line to get free MCAT information:

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
$mail->Subject = "Silent Timer for the MCAT";

$html =
"
<HTML>
<HEAD>
<META NAME='GENERATOR' Content='Microsoft DHTML Editing Control'>
<TITLE>MCAT Timer</TITLE>
</HEAD>
<BODY>

<table width='99%' border='0' cellpadding='5' cellspacing='0' bgcolor='#FFFFFF'>
  <tr bordercolor='#000000' bgcolor='#FFFF66'>
    <td colspan='3' valign='top'><div align='center'><font color='#CC0000' size='5' face='Arial, Helvetica, sans-serif'><strong>Exam
    Clocks- meet your match.</strong></font></div></td>
  </tr>
  <tr bordercolor='#000000'>
    <td colspan='3'><font color='#000099' size='4' face='Arial, Helvetica, sans-serif'><br>
    The Silent Timer&#8482; for the MCAT:<br>
    </font></td>
  </tr>
  <tr bordercolor='#000000'>
    <td colspan='3' valign='top'><p><font size='2' face='Arial, Helvetica, sans-serif'><font color='#000066' face='Times New Roman, Times, serif'><strong>THE
              SILENT TIMER</strong></font><strong>&#8482;</strong> for the MCAT is THE ultimate test
              prep tool that meets all of your pacing needs when studying for the MCAT.<br>
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


<strong><font color="#003399" size="4" face="Times New Roman, Times, serif"> 
</font></strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font size="4" face="Times New Roman, Times, serif"><font size="2">THE 
SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></font><font size="2"> 
<em><font color="#000000">Handbook</font></em></font></strong></font> 
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../../../order/index.php?t=MCAT">MCAT 
  Timer</a> | <a href="mcat_practice.php">MCAT Preparation</a> | &nbsp;<a href="../../../testhome/mcat.php">MCAT 
  Test</a></strong></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>MCAT Registration</strong></font></p>
<p>
  <? if($EmailSent != "yes"){?>
</p>
<p><font size="2" face="Arial, Helvetica, sans-serif">To receive <strong>FREE</strong> MCAT registration
      information, enter your name and email address below. We will send you an
      automatic email explaining how/where to register for the MCAT, and what the
      registration deadlines are for the next tests. The email also contains more
  valuable MCAT information to help prepare for your test.</font></p>
<form action="" method="post" name="frmMCAT" id="frmMCAT" onSubmit="return CheckForm();">
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
add &quot;info@silenttimer.com&quot; to your e-mail safe list. If you don't seem
to get the email at first, check your spam filter.</font></strong></td>
    </tr>
    <tr>
      <td colspan="2"><p>
          <input name="Submit" type="submit" id="Submit" value="Get MCAT Registration Info!">
        </p>
          <p> <font size="2" face="Arial, Helvetica, sans-serif">We will <em>never</em>          sell your personal information. <a href="../../../legal/privacy.php" target="_blank">Please
              read our privacy policy</a>.</font></p></td>
    </tr>
  </table>
</form>
<p>
  <? }?>
  <? if($EmailSent == "yes"){?>
  <strong><font color="#000099" size="2" face="Arial, Helvetica, sans-serif">Your
  MCAT registration email has been sent! Check your email. </font></strong>
  <? }?>
</p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
  Read more about
MCAT Registration:</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">When the moment finally 
          arrives for you to register for the MCAT test, be aware that <a href="http://www.aamc.org/students/mcat/" target="_blank">MCAT 
          registration is only available online</a>. Students should be able to access 
    the Web registration site eight to 12 weeks before each test date. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Register as soon as possible 
  to ensure your first choice testing center. Spots fill up quickly and you don&#8217;t 
  want to have to be inconvenienced by driving across the state the morning of 
  your MCAT test. Better to be safe than sorry.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Walk-in MCAT registration
     is prohibited.</font></p>
<p>&nbsp;</p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links</font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.aamc.org/students/mcat/start.htm" target="_blank">Medical 
  College Admission Test AAMC Web site</a><br>
  <a href="http://www.aamc.org/students/mcat/registration.htm">MCAT Registration 
  on the AAMC Web site</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Additional Search 
  Help for MCAT Registration<br>
  </strong>Click below to search for &quot;MCAT registration&quot; in the following 
  search engines: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.google.com/search?hl=en&lr=&ie=UTF-8&oe=UTF-8&q=MCAT%2Bregistration" target="_blank">Google</a> 
  | <a href="http://search.msn.com/results.aspx?q=MCAT%2Bregistration&FORM=SMCRT" target="_blank">MSN</a> 
  | <a href="http://altavista.com/web/results?q=MCAT%2Bregistration&kgs=0&kls=1&avkw=aapt" target="_blank">Altavista</a> 
  | <a href="http://search.yahoo.com/search?p=MCAT%2Bregistration&ei=UTF-8&fr=fp-top&n=20&fl=0&x=wrt" target="_blank">Yahoo</a> 
  | <a href="http://search.aol.com/aolcom/search?invocationType=topsearchbox./aolcom/jsp/search.jsp&query=MCAT%2Bregistration&x=29&y=14" target="_blank">AOL</a> 
  | <a href="http://web.ask.com/web?q=MCAT%2Bregistration&qsrc=1" target="_blank">Ask 
  Jeeves</a></font></p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>