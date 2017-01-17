<?
	
	require "../../code/class.phpmailer.php";
	
	$mail = new PHPMailer();
	
	$mail->From = "dina@silenttimer.com";
	$mail->FromName = "Dina Kushner";
	$mail->AddAddress("girigitana@hotmail.com", "Dina Hotmail");
	$mail->AddAddress("erik@proace.com", "Erik PROACE");
	$mail->AddAddress("dina@silenttimer.com", "Dina Silent Timer");
	$mail->AddAddress("dinakushner@gmail.com", "Dina GMAIL");
	#$mail->AddAttachment("Guide/Time Management Guide.pdf");
	$mail->IsHTML(true);
	$mail->Subject = "The Silent Timer - Test";


////// - HTML BUILDING
$html=
"
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>

<style type='text/css'>
<!--
.main {font: arial; color: #000000;text-decoration: none;}
.main A {font: arial; text-decoration: none; color: #000000;}
.main A:link {font: arial; text-decoration: none; color: #0000CC; font-weight: bold;}
.main A:visited {font: arial; text-decoration: none; color: #0000CC; font-weight: bold;}
.main A:hover {font: arial; text-decoration: none; color: #000000; font-weight: bold;}

a:link {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	color: #000099;
	text-decoration: none;
}
a:hover {
	color: #0066FF;
	text-decoration: underline;
}
a:visited {
	text-decoration: none;
	color: #000099;
}

.right {
  float: right;
}

.left {
  float: left;
}

-->
</style>
</head>

<body leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>
<br>
<table width='600' border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr> 
    <td align='left' valign='top'> <table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#003366' class='main'>
        <tr bgcolor='#F3F3FF'> 
          <td height='66' colspan='2' align='left' valign='top'> <p align='left'><font size='4'><strong><font size='5' face='Arial, Helvetica, sans-serif'> 
              <font color='#F3F3FF'>__</font>SAT Tip # 1: Pacing is Crucial.</font><font face='Arial, Helvetica, sans-serif'><br>
              </font></strong></font><font size='5' face='Arial, Helvetica, sans-serif'><strong><font color='#F3F3FF'>_________________</font>Manage 
              your test time!</strong></font> <br>
            </p></td>
        </tr>
        <tr> 
          <td width='68%' height='469' align='left' valign='top'> <table width='100%' border='0' cellspacing='0' cellpadding='5'>
              <tr> 
                <td align='left' valign='top' bgcolor='#000080'><font color='#000080' size='3'>______<font face='Arial, Helvetica, sans-serif'><font size='4'><font color='#FFFFFF'><strong>Success 
                  is Just a Matter of Time...</strong></font></font></font></font></td>
              </tr>
              <tr> 
                <td height='436' align='left' valign='top'> 
                  <table width='185' height='215' border='2' cellpadding='5' cellspacing='0' bordercolor='#000000' class='right'>
                    <tr> 
                      <td height='211' align='left' valign='top'><font color='#000080'><strong><font size='2.5' face='Arial, Helvetica, sans-serif'>The 
                        Silent Timer&#8482;</font></strong></font><strong><font size='2.5' face='Arial, Helvetica, sans-serif'> 
                        is your ticket to good test time management.<br>
                        <br>
                        </font><font size='2' face='Arial, Helvetica, sans-serif'><font color='#FF0000' size='3'><em><font size='2'>* 
                        </font></em></font><em>Counts up or down</em><br>
                        <br>
                        <em> <font color='#FF0000'>*</font> Tells you how much 
                        time <font color='#FFFFFF'>_</font>is left for </em><u><font color='#000080'>each</font></u><em> 
                        question</em></font></strong><em><font size='2' face='Arial, Helvetica, sans-serif'>&nbsp;</font></em><font size='2' face='Arial, Helvetica, sans-serif'>&nbsp; 
                        </font><font face='Arial, Helvetica, sans-serif'> 
                        <p><font size='2' face='Arial, Helvetica, sans-serif'><strong><em><font color='#FF0000'> 
                          *</font> Displays # of questions <font color='#FFFFFF'>_</font>completed 
                          &amp; remaining</em></strong></font><strong><font color='#FF0000' size='2.5'><br>
                          <br>
                          <font size='2'><em>*</em></font> Increases SAT Scores!</font></strong></p>
                        </font></td>
                    </tr>

                  </table>
                  <font color='#000080' size='2' face='Arial, Helvetica, sans-serif'><strong>Good 
                  timing</strong></font><font size='2' face='Arial, Helvetica, sans-serif'> 
                  is the easiest way to improve your SAT score. You may be smart, 
                  you may be prepared, but a poor pacing strategy can prevent 
                  you from achieving your full potential on test day. Don&#8217;t 
                  let this happen to you&#8230;</font> <p align='left'><font color='#000080' size='2' face='Arial, Helvetica, sans-serif'><strong>Maximizing</strong></font><font size='2' face='Arial, Helvetica, sans-serif'> 
                    your SAT score requires practice and a solid timing strategy. 
                    Here are some helpful hints as you prepare for the SAT:</font></p>
                  <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'>1. 
                    <font color='#FF0000'>Practice under timed conditions.</font> 
                    You need to be accustomed to the time pressure you will face 
                    in the exam room.</font> </p>
                  <p><font size='2' face='Arial, Helvetica, sans-serif'>2.<font color='#FF0000'> 
                    DO NOT spend too much time on a question just because you 
                    &#8216;know&#8217; you can do it. </font>It is often worthwhile 
                    to skip it in order to correctly answer other questions.</font></p>
                  <p><font size='2' face='Arial, Helvetica, sans-serif'> 3. <font color='#FF0000'>Set 
                    realistic goals for how many questions you can answer in the 
                    allotted time.</font> Stick to your plan. Don&#8217;t panic 
                    and try to race through more questions than you can realistically 
                    finish. Focus on accuracy, not just finishing.</font></p></td>
              </tr>
            </table></td>
          <td width='32%' align='center' valign='top'><p><br>
              <img src='http://www.silenttimer.com/marketing/college_bound/Images/buttonsweb.jpg' width='195' height='104'> 
            </p>
            <p><br>
              <img src='http://www.silenttimer.com/marketing/college_bound/Images/money%20back.gif' width='187' height='101'></p>
            <p><img src='http://www.silenttimer.com/marketing/college_bound/Images/silent-timer-logo.jpg' width='197' height='170'><br>
              <br>
            </p>
            </td>
        </tr>
        <tr> 
          <td height='197' colspan='2'> 
            <table width='100%' border='0' cellspacing='0' cellpadding='3' class='main'>
              <tr> 
                <td width='35%' height='193' bgcolor='#000000'> 
                  <div align='center'><img src='http://www.silenttimer.com/marketing/college_bound/Images/timer-photo.jpg' width='203' height='170'></div></td>
                <td width='65%' valign='top' bgcolor='#F3F3FF'> <p align='center'><font color='#F3F3FF' size='5' face='Arial, Helvetica, sans-serif'>_</font><font size='5' face='Arial, Helvetica, sans-serif'><strong>Pacing 
                    is Crucial.<br>
                    </strong><font size='4'> <font color='#F3F3FF'>__</font><br>
                    </font></font><font color='#F3F3FF' size='4' face='Arial, Helvetica, sans-serif'><strong>_</strong></font><strong><font size='4' face='Arial, Helvetica, sans-serif'>Let 
                    <u>The Silent Timer</u></font><font color='#000080'><strong><font color='#000000' size='2.5' face='Arial, Helvetica, sans-serif'>&#8482;</font></strong></font><font size='4' face='Arial, Helvetica, sans-serif'> 
                    do the work for you.</font></strong><font size='4' face='Arial, Helvetica, sans-serif'><br>
                    </font><font color='#350096' face='Arial, Helvetica, sans-serif'><strong><br>
                    </strong><font size='4'>&#8220;Other than studying, NOTHING 
                    will improve your score like The Silent Timer</font><font color='#000080'><strong><font color='#330099' size='4' face='Arial, Helvetica, sans-serif'>&#8482;</font></strong></font><font size='4'>. 
                    It will tell you EXACTLY how much time to spend on each question.&#8221;</font></font> 
                  </p></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>

<p align='center'>&nbsp;</p>
</body>
</html>

";
////// - END HTML BUILDING


/////  - ALTERNATE NON-HTML
$althtml = "
HTML email could not be sent!?  Fix this section.
";
/////  - End of Alternate HTML Building

	
	$mail->Body = $html;
	$mail->AltBody = $althtml;
	
	if(!$mail->Send())
	{
	   echo "Email could not be sent.<p>";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}
	
	
	echo "Email Sent!";
	?>