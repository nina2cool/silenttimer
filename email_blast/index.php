<?

if($_POST['Submit'] == "Email")
{

	require "../code/class.phpmailer.php";
	
	$mail = new PHPMailer();
	
	$mail->From = "info@silenttimer.com";
	$mail->FromName = "Silent Technology LLC";
	$mail->AddAddress("erik@silenttimer.com", "Erik McMillan");
	$mail->AddBCC("nina@silenttimer.com", "Christina Dilly");
	#$mail->AddBCC("gmc@proace.com", "Gerald McMillan");
	#$mail->AddBCC("nicolep@collegebound.net", "Nicole Perrigo");
	#$mail->AddBCC("bmc@proace.com", "Berit McMillan");
	#$mail->AddBCC("jerrymcmillan@mail.utexas.edu", "Jerry McMillan");
	#$mail->AddBCC("Elota.Patton@mccombs.utexas.edu", "Elota Patton");
	#$mail->AddBCC("brittindabox@hotmail.com", "Britt McMillan");
	#$mail->AddBCC("pedram@salek.com", "Pedram Salek");
	#$mail->AddBCC("dillyr@swbell.net", "Bob Dilly");
	#$mail->AddBCC("mdilly@trammellcrow.com", "Marcia Dilly");
	#$mail->AddBCC("nordseth@swbell.net", "Steve Nordseth");
	#$mail->AddBCC("judy@judynordseth.com", "Judy Nordseth");
	#$mail->AddBCC("thelearnersedge@sbcglobal.net", "Diane Dean");
	
	$mail->IsHTML(true);
	$mail->Subject = "Silent Timer LSAT Email";

	

////// - HTML BUILDING
$html=
"
<html>
<head>
<title>The Silent Timer for your LSAT</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<style type='text/css'>
<!--
.main {font: arial; color: #000000;text-decoration: none;}
.main A {font: arial; text-decoration: none; color: #000000;}
.main A:link {font: arial; text-decoration: none; color: #0000CC; font-weight: bold;}
.main A:visited {font: arial; text-decoration: none; color: #0000CC; font-weight: bold;}
.main A:hover {font: arial; text-decoration: none; color: #000000; font-weight: bold;}
-->
</style>
</head>

<body>
<table width='100' border='1' align='center' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td><div align='center'><a href='http://silenttimer.com/testhome/lsat-silent-timer.php?a=lsat_registration'><img src='http://www.silenttimer.com/email_blast/LSAT-EMAIL.jpg' width='640' height='480' border='0'></a></div></td>
  </tr>
</table>
<br>
<table width='162' border='0' align='center' cellpadding='0' cellspacing='0' class='main'>
  <tr>
    <td width='155'><div align='left'><font color='#666666' size='1' face='Arial, Helvetica, sans-serif'><strong>Silent 
        Technology LLC</strong><br>
        <a href='mailto:info@SilentTimer.com'>info@SilentTimer.com</a><br>
        <strong>1-800-552-0325 </strong><br>
        <a href='http://www.SilentTimer.com'>http://www.SilentTimer.com</a></font></div></td>
  </tr>
</table>
";
////// - END HTML BUILDING


	
	$mail->Body = $html;
	
	if(!$mail->Send())
	{
	   echo "Email receipt could not be sent.<p>";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}
	
	
	
	/*
	
	#### request for reply
	
	$mail = new PHPMailer();
	
	$mail->From = "erik@silenttimer.com";
	$mail->FromName = "Erik McMillan";
	$mail->AddAddress("erik@silenttimer.com", "Erik McMillan");
	#$mail->AddBCC("nina@silenttimer.com", "Christina Dilly");
	$mail->AddBCC("nicolep@collegebound.net", "Nicole Perrigo");
	#$mail->AddBCC("gmc@proace.com", "Gerald McMillan");
	#$mail->AddBCC("bmc@proace.com", "Berit McMillan");
	#$mail->AddBCC("jerrymcmillan@mail.utexas.edu", "Jerry McMillan");
	#$mail->AddBCC("Elota.Patton@mccombs.utexas.edu", "Elota Patton");
	#$mail->AddBCC("brittindabox@hotmail.com", "Britt McMillan");
	#$mail->AddBCC("pedram@salek.com", "Pedram Salek");
	#$mail->AddBCC("dillyr@swbell.net", "Bob Dilly");
	#$mail->AddBCC("mdilly@trammellcrow.com", "Marcia Dilly");
	#$mail->AddBCC("nordseth@swbell.net", "Steve Nordseth");
	#$mail->AddBCC("judy@judynordseth.com", "Judy Nordseth");
	#$mail->AddBCC("thelearnersedge@sbcglobal.net", "Diane Dean");

	$mail->IsHTML(false);
	$mail->Subject = "Our Email Blast";

	

////// - HTML BUILDING
$html=
"Nicole,

Here is the last version of our blast.  I'll call to make sure you got it okay!

Title Copy:

1. SAT and ACT Test Timer
2. Your Upcoming SAT or ACT Test


Talk soon,

Erik
--
Erik McMillan
erik@silenttimer.com
Silent Technology LLC
http://www.SilentTimer.com
512-258-8668



";
////// - END HTML BUILDING


	
	$mail->Body = $html;
	
	if(!$mail->Send())
	{
	   echo "Email receipt could not be sent.<p>";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}

*/
	
	

}
?>



<html>
<head>
<title>The SAT &amp; ACT Timer</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.main {font: arial; color: #000000;text-decoration: none;}
.main A {font: arial; text-decoration: none; color: #000000;}
.main A:link {font: arial; text-decoration: none; color: #0000CC; font-weight: bold;}
.main A:visited {font: arial; text-decoration: none; color: #0000CC; font-weight: bold;}
.main A:hover {font: arial; text-decoration: none; color: #000000; font-weight: bold;}
-->
</style>
</head>

<body>
<table width="100" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td><div align="center"><a href="http://silenttimer.com/testhome/sat-act-silent-timer.php?a=cb"><img src="LSAT-EMAIL.jpg" width="640" height="480" border="0"></a></div></td>
  </tr>
</table>
<br>
<table width="162" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
  <tr>
    <td width="155"><div align="left"><font color="#666666" size="1" face="Arial, Helvetica, sans-serif"><strong>Silent 
        Technology LLC</strong><br>
        <a href="mailto:info@SilentTimer.com">info@SilentTimer.com</a><br>
        <strong>1-800-552-0325 </strong><br>
        <a href="http://www.SilentTimer.com">http://www.SilentTimer.com</a></font></div></td>
  </tr>
</table>
<form name="form1" method="post" action="">
  <div align="center">
    <input type="submit" name="Submit" value="Email">
  </div>
</form>
<p align="center">&nbsp;</p>
</body>
</html>
