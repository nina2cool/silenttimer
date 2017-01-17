<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('custID'))
{
// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	$custID = $_SESSION['custID'];
	$CustomerID = $custID;
	
	
	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");		
	

	# code to grab emails and data...then send emails...
	if($_POST['Submit'] == "Send Emails") # if button has been pressed...
	{
		$Note = $_POST['Note'];
		
			$sql7 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
			$result7 = mysql_query($sql7) or die("Cannot execute query!");
					
			while($row7 = mysql_fetch_array($result7))
			{
				$FirstName = $row7[FirstName];
				$LastName = $row7[LastName];
				$Email = $row7[Email];
			}
		
		$Name = "$FirstName" . " $LastName";
		
		//echo $Name;
		
		$Name1 = $_POST['name1'];
		if($Name1 == ""){$Name1 = "Buddy";}
		$Email1 = $_POST['email1'];
		$Test1 = $_POST['test1'];
		if($Test1 == ""){$Test1 = "Test";}
		
		$Name2 = $_POST['name2'];
		if($Name2 == ""){$Name2 = "Buddy";}
		$Email2 = $_POST['email2'];
		$Test2 = $_POST['test2'];
		if($Test2 == ""){$Test2 = "Test";}
		
		$Name3 = $_POST['name3'];
		if($Name3 == ""){$Name3 = "Buddy";}
		$Email3 = $_POST['email3'];
		$Test3 = $_POST['test3'];
		if($Test3 == ""){$Test3 = "Test";}
		
		$Name4 = $_POST['name4'];
		if($Name4 == ""){$Name4 = "Buddy";}
		$Email4 = $_POST['email4'];
		$Test4 = $_POST['test4'];
		if($Test4 == ""){$Test4 = "Test";}
		
		$Name5 = $_POST['name5'];
		if($Name5 == ""){$Name5 = "Buddy";}
		$Email5 = $_POST['email5'];
		$Test5 = $_POST['test5'];
		if($Test5 == ""){$Test5 = "Test";}
		
		$Now = date("Y-m-d H:m:s");
		
			$sql = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, Status, PromotionCodeID, Note)
			VALUES('$Name', '$Email', '$Now', 'friend.php', 'sender', 'active', '$CustomerID', '$Note');";	
			mysql_query($sql) or die("Cannot insert sender into tblFriend!");
			
			$sql9 = "SELECT DATE_FORMAT(EndDate, '%m/%d/%y') AS EndDate FROM tblPromotionCode WHERE PromotionCodeID = '$CustomerID' AND Type = 'friend'";
			$result9 = mysql_query($sql9) or die("Cannot get promo code end date");
			
			while($row9 = mysql_fetch_array($result9))
			{
				$EndDate = $row9[EndDate];
			}
			
			# declares class for emails...
			require "../code/class.phpmailer.php";
				
				
			if($Email1 != "")
			{
								
				$sql2 = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, ReferName, ReferEmail, Test, Note, PromotionCodeID)
				VALUES('$Name1', '$Email1', '$Now', 'friend.php', 'receiver', '$Name', '$Email', '$Test1', '$Note', '$CustomerID');";
				
				$result2 = mysql_query($sql2) or die("Cannot insert person 1 into tblFriend!");				
			
					$mail = new PHPMailer();
					
					$mail->From = "$Email";
					$mail->FromName = "$Name";
					$mail->AddAddress("$Email1", "$Name1");
					$mail->AddBCC("info@silenttimer.com", "Friend Referral");
					$mail->IsHTML(true);
					$mail->Subject = "Get 5% off your SilentTimer.com Purchase";
				
				
				$html =
					"
					<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
					<html>
					<head>
					<title>Silent Timer Referral</title>
					<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
					</head>
					
					<body>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>$Name1,</font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>I just bought a product
					    from <a href='http://www.silenttimer.com'>www.SilentTimer.com</a> to help me prepare for
					    my test, and I wanted to recommend the site to you.</font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>They have several
					    products available for helping students achieve higher
					    scores on standardized tests: </font></p>
					<ul>
					  <li><font size='2' face='Arial, Helvetica, sans-serif'><strong>The Silent
					        Timer&#8482;</strong> is
						    a special standardized testing timer that allows
					      you to track your time on the overall test, as well
					      as time per question. Great for practicing your pacing. </font></li>
				      <li><font size='2' face='Arial, Helvetica, sans-serif'><strong>Silent
				            Digital Watch</strong> - count up/count down watch with large LCD screen
				          that is completely silent</font></li>
					  <li><font size='2' face='Arial, Helvetica, sans-serif'><strong>MASTER
					        THE LSAT by Nova</strong> - test prep book to help LSAT students study
					      for the test.</font></li>
					  <li><font size='2' face='Arial, Helvetica, sans-serif'>You can also purchase
					      a combination of the above items for 20% off. </font></li>
					</ul>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>If you put in this code: <strong><font color='#FF0000'>$CustomerID</font></strong>,
    then you will get <font color='#33CC33' size='3'><strong>5% off</strong></font> of
    your entire purchase! This offer is valid through $EndDate.
    Enter &quot;$CustomerID&quot; on the order page where it asks for the promotion code. </font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>Go to <a href='http://www.silenttimer.com'>www.SilentTimer.com</a> to
				      order your product, and don't forget the promotion code!</font></p>
					";
					  
					  if($Note <> "")
					  {
					  
					$html .= " 			
					
					<p><font size='2' face='Arial, Helvetica, sans-serif'>Special Note from $Name:<br>
					  $Note
					</font></p>";
					
					}				
					
					$html .= "
					<p><font size='2' face='Arial, Helvetica, sans-serif'>Thanks,</font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>$Name</font></p>
					</body>

					</html>";
					
						
						$mail->Body = $html;
											
						if(!$mail->Send())
						{
						   echo "Email receipt could not be sent.<p>";
						   echo "Mailer Error: " . $mail->ErrorInfo;
						   exit;
						}
				
			}
			
			if($Email2 != "")
			{
				
				$sql3 = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, ReferName, ReferEmail, Test, Note, PromotionCodeID)
				VALUES('$Name2', '$Email2', '$Now', 'friend.php', 'receiver', '$Name', '$Email', '$Test2', '$Note', '$CustomerID');";
				$result3 = mysql_query($sql3) or die("Cannot insert person 2 into tblFriend!");
				
					$mail = new PHPMailer();
					
					$mail->From = "$Email";
					$mail->FromName = "$Name";
					$mail->AddAddress("$Email2", "$Name2");
					$mail->AddBCC("info@silenttimer.com", "Friend Referral");
					$mail->IsHTML(true);
					$mail->Subject = "Get 5% off your SilentTimer.com Purchase";
				
				$html =
					"
					<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
					<html>
					<head>
					<title>Silent Timer Referral</title>
					<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
					</head>
					
					<body>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>$Name2,</font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>I just bought a product
					    from <a href='http://www.silenttimer.com'>www.SilentTimer.com</a> to help me prepare for
					    my test, and I wanted to recommend the site to you.</font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>They have several
					    products available for helping students achieve higher
					    scores on standardized tests: </font></p>
					<ul>
					  <li><font size='2' face='Arial, Helvetica, sans-serif'><strong>The Silent
					        Timer&#8482;</strong> is
						    a special standardized testing timer that allows
					      you to track your time on the overall test, as well
					      as time per question. Great for practicing your pacing. </font></li>
				      <li><font size='2' face='Arial, Helvetica, sans-serif'><strong>Silent
				            Digital Watch</strong> - count up/count down watch with large LCD screen
				          that is completely silent</font></li>
					  <li><font size='2' face='Arial, Helvetica, sans-serif'><strong>MASTER
					        THE LSAT by Nova</strong> - test prep book to help LSAT students study
					      for the test.</font></li>
					  <li><font size='2' face='Arial, Helvetica, sans-serif'>You can also purchase
					      a combination of the above items for 20% off. </font></li>
					</ul>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>If you put in this code: <strong><font color='#FF0000'>$CustomerID</font></strong>,
    then you will get <font color='#33CC33' size='3'><strong>5% off</strong></font> of
    your entire purchase! This offer is valid through $EndDate.
    Enter &quot;$CustomerID&quot; on the order page where it asks for the promotion code. </font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>Go to <a href='http://www.silenttimer.com'>www.SilentTimer.com</a> to
				      order your product, and don't forget the promotion code!</font></p>
					";
					  
					  if($Note <> "")
					  {
					  
					$html .= " 			
					
					<p><font size='2' face='Arial, Helvetica, sans-serif'>Special Note from $Name:<br>
					  $Note
					</font></p>";
					
					}				
					
					$html .= "
					<p><font size='2' face='Arial, Helvetica, sans-serif'>Thanks,</font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>$Name</font></p>
					</body>

					</html>";
					
						
						$mail->Body = $html;
											
						if(!$mail->Send())
						{
						   echo "Email receipt could not be sent.<p>";
						   echo "Mailer Error: " . $mail->ErrorInfo;
						   exit;
						}
				
			}
			
			if($Email3 != "")
			{
				
				$sql4 = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, ReferName, ReferEmail, Test, Note, PromotionCodeID)
				VALUES('$Name3', '$Email3', '$Now', 'friend.php', 'receiver', '$Name', '$Email', '$Test3', '$Note', '$CustomerID');";
				$result4 = mysql_query($sql4) or die("Cannot insert person 3 into tblFriend!");
				
					$mail = new PHPMailer();
					
					$mail->From = "$Email";
					$mail->FromName = "$Name";
					$mail->AddAddress("$Email3", "$Name3");
					$mail->AddBCC("info@silenttimer.com", "Friend Referral");
					$mail->IsHTML(true);
					$mail->Subject = "Get 5% off your SilentTimer.com Purchase";
				
				
				$html =
					"
					<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
					<html>
					<head>
					<title>Silent Timer Referral</title>
					<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
					</head>
					
					<body>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>$Name3,</font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>I just bought a product
					    from <a href='http://www.silenttimer.com'>www.SilentTimer.com</a> to help me prepare for
					    my test, and I wanted to recommend the site to you.</font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>They have several
					    products available for helping students achieve higher
					    scores on standardized tests: </font></p>
					<ul>
					  <li><font size='2' face='Arial, Helvetica, sans-serif'><strong>The Silent
					        Timer&#8482;</strong> is
						    a special standardized testing timer that allows
					      you to track your time on the overall test, as well
					      as time per question. Great for practicing your pacing. </font></li>
				      <li><font size='2' face='Arial, Helvetica, sans-serif'><strong>Silent
				            Digital Watch</strong> - count up/count down watch with large LCD screen
				          that is completely silent</font></li>
					  <li><font size='2' face='Arial, Helvetica, sans-serif'><strong>MASTER
					        THE LSAT by Nova</strong> - test prep book to help LSAT students study
					      for the test.</font></li>
					  <li><font size='2' face='Arial, Helvetica, sans-serif'>You can also purchase
					      a combination of the above items for 20% off. </font></li>
					</ul>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>If you put in this code: <strong><font color='#FF0000'>$CustomerID</font></strong>,
    then you will get <font color='#33CC33' size='3'><strong>5% off</strong></font> of
    your entire purchase! This offer is valid through $EndDate.
    Enter &quot;$CustomerID&quot; on the order page where it asks for the promotion code. </font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>Go to <a href='http://www.silenttimer.com'>www.SilentTimer.com</a> to
				      order your product, and don't forget the promotion code!</font></p>
					";
					  
					  if($Note <> "")
					  {
					  
					$html .= " 			
					
					<p><font size='2' face='Arial, Helvetica, sans-serif'>Special Note from $Name:<br>
					  $Note
					</font></p>";
					
					}				
					
					$html .= "
					<p><font size='2' face='Arial, Helvetica, sans-serif'>Thanks,</font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>$Name</font></p>
					</body>

					</html>";
					
						
						$mail->Body = $html;
											
						if(!$mail->Send())
						{
						   echo "Email receipt could not be sent.<p>";
						   echo "Mailer Error: " . $mail->ErrorInfo;
						   exit;
						}
			}
			
			if($Email4 != "")
			{

				$sql5 = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, ReferName, ReferEmail, Test, Note, PromotionCodeID)
				VALUES('$Name4', '$Email4', '$Now', 'friend.php', 'receiver', '$Name', '$Email', '$Test4', '$Note', '$CustomerID');";
				$result5 = mysql_query($sql5) or die("Cannot insert person 4 into tblFriend!");	
				
					$mail = new PHPMailer();
					
					$mail->From = "$Email";
					$mail->FromName = "$Name";
					$mail->AddAddress("$Email4", "$Name4");
					$mail->AddBCC("info@silenttimer.com", "Friend Referral");
					$mail->IsHTML(true);
					$mail->Subject = "Get 5% off your SilentTimer.com Purchase";
				
				
				$html =
					"
					<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
					<html>
					<head>
					<title>Silent Timer Referral</title>
					<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
					</head>
					
					<body>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>$Name4,</font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>I just bought a product
					    from <a href='http://www.silenttimer.com'>www.SilentTimer.com</a> to help me prepare for
					    my test, and I wanted to recommend the site to you.</font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>They have several
					    products available for helping students achieve higher
					    scores on standardized tests: </font></p>
					<ul>
					  <li><font size='2' face='Arial, Helvetica, sans-serif'><strong>The Silent
					        Timer&#8482;</strong> is
						    a special standardized testing timer that allows
					      you to track your time on the overall test, as well
					      as time per question. Great for practicing your pacing. </font></li>
				      <li><font size='2' face='Arial, Helvetica, sans-serif'><strong>Silent
				            Digital Watch</strong> - count up/count down watch with large LCD screen
				          that is completely silent</font></li>
					  <li><font size='2' face='Arial, Helvetica, sans-serif'><strong>MASTER
					        THE LSAT by Nova</strong> - test prep book to help LSAT students study
					      for the test.</font></li>
					  <li><font size='2' face='Arial, Helvetica, sans-serif'>You can also purchase
					      a combination of the above items for 20% off. </font></li>
					</ul>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>If you put in this code: <strong><font color='#FF0000'>$CustomerID</font></strong>,
    then you will get <font color='#33CC33' size='3'><strong>5% off</strong></font> of
    your entire purchase! This offer is valid through $EndDate.
    Enter &quot;$CustomerID&quot; on the order page where it asks for the promotion code. </font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>Go to <a href='http://www.silenttimer.com'>www.SilentTimer.com</a> to
				      order your product, and don't forget the promotion code!</font></p>
					";
					  
					  if($Note <> "")
					  {
					  
					$html .= " 			
					
					<p><font size='2' face='Arial, Helvetica, sans-serif'>Special Note from $Name:<br>
					  $Note
					</font></p>";
					
					}				
					
					$html .= "
					<p><font size='2' face='Arial, Helvetica, sans-serif'>Thanks,</font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>$Name</font></p>
					</body>

					</html>";
					
						
						$mail->Body = $html;
											
						if(!$mail->Send())
						{
						   echo "Email receipt could not be sent.<p>";
						   echo "Mailer Error: " . $mail->ErrorInfo;
						   exit;
						}
				
			}
			
			if($Email5 != "")
			{
				
				$sql6 = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, ReferName, ReferEmail, Test, Note, PromotionCodeID)
				VALUES('$Name5', '$Email5', '$Now', 'friend.php', 'receiver', '$Name', '$Email', '$Test5', '$Note', '$CustomerID');";
				$result6 = mysql_query($sql6) or die("Cannot insert person 5 into tblFriend!");
				
					$mail = new PHPMailer();
					
					$mail->From = "$Email";
					$mail->FromName = "$Name";
					$mail->AddAddress("$Email5", "$Name5");
					$mail->AddBCC("info@silenttimer.com", "Friend Referral");
					$mail->IsHTML(true);
					$mail->Subject = "Get 5% off your SilentTimer.com Purchase";
				
				
				$html =
					"
					<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
					<html>
					<head>
					<title>Silent Timer Referral</title>
					<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
					</head>
					
					<body>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>$Name5,</font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>I just bought a product
					    from <a href='http://www.silenttimer.com'>www.SilentTimer.com</a> to help me prepare for
					    my test, and I wanted to recommend the site to you.</font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>They have several
					    products available for helping students achieve higher
					    scores on standardized tests: </font></p>
					<ul>
					  <li><font size='2' face='Arial, Helvetica, sans-serif'><strong>The Silent
					        Timer&#8482;</strong> is
						    a special standardized testing timer that allows
					      you to track your time on the overall test, as well
					      as time per question. Great for practicing your pacing. </font></li>
				      <li><font size='2' face='Arial, Helvetica, sans-serif'><strong>Silent
				            Digital Watch</strong> - count up/count down watch with large LCD screen
				          that is completely silent</font></li>
					  <li><font size='2' face='Arial, Helvetica, sans-serif'><strong>MASTER
					        THE LSAT by Nova</strong> - test prep book to help LSAT students study
					      for the test.</font></li>
					  <li><font size='2' face='Arial, Helvetica, sans-serif'>You can also purchase
					      a combination of the above items for 20% off. </font></li>
					</ul>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>If you put in this code: <strong><font color='#FF0000'>$CustomerID</font></strong>,
    then you will get <font color='#33CC33' size='3'><strong>5% off</strong></font> of
    your entire purchase! This offer is valid through $EndDate.
    Enter &quot;$CustomerID&quot; on the order page where it asks for the promotion code. </font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>Go to <a href='http://www.silenttimer.com'>www.SilentTimer.com</a> to
				      order your product, and don't forget the promotion code!</font></p>
					";
					  
					  if($Note <> "")
					  {
					  
					$html .= " 			
					
					<p><font size='2' face='Arial, Helvetica, sans-serif'>Special Note from $Name:<br>
					  $Note
					</font></p>";
					
					}				
					
					$html .= "
					<p><font size='2' face='Arial, Helvetica, sans-serif'>Thanks,</font></p>
					<p><font size='2' face='Arial, Helvetica, sans-serif'>$Name</font></p>
					</body>

					</html>";
					
						
						$mail->Body = $html;
											
						if(!$mail->Send())
						{
						   echo "Email receipt could not be sent.<p>";
						   echo "Mailer Error: " . $mail->ErrorInfo;
						   exit;
						}
							
			}
			
			?>
			
			<p><strong><font color="#9933CC" size="3" face="Arial, Helvetica, sans-serif"><br>
		    Thanks
for spreading the word about The Silent Timer&#8482;!<br>
			</font></strong><strong><font color="#9933CC" size="3" face="Arial, Helvetica, sans-serif">Feel
			      free to use this form again to add more friends to your list.</font></strong><br>
	          <?
		
		
	} // end if button is pushed
	

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


?>
    <script>
// write funciton to check and make sure emaisl aer correct...

	function OtherEmailCheck(EmailField)
	{
		// function to grab email content to see if it is valid!
		// ------ this checks to make sure it is a valid email address
		var str = EmailField;
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
		
		if (email == 1)
		{
			return false;
		}
	}
	
	function CheckEmails()
	{
	
		// loop through names/emails and see if they are valid...
		var e = 0;
		var eText = "";
		
		//make sure at least one email address is entered!!!
		if(document.Emails.email1.value == "" && document.Emails.email2.value == "" && document.Emails.email3.value == "" && document.Emails.email4.value == "" && document.Emails.email5.value == "")
		{
			if(eText != "")
			{
				eText = eText + ", and please enter at least one friend's email address";
			}
			else
			{
				eText = "Please enter at least one friend's email address";
			}
			
			e = 1;
		}
		else
		{
			// email
			var email = 0;
			
			if(document.Emails.email.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and please enter your email address";
				}
				else
				{
					eText = "Please enter your email address";
				}
				
				e = 1;
			}
			else
			{
				// ------ this checks to make sure it is a valid email address
		
				var str = document.Emails.email.value;
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
						eText = eText + ", and enter your valid email address";
					}
					else
					{
						eText = "Enter your valid email address";
					}
					
					e = 1;
				}
		
			}
			
			if(document.Emails.email1.value != "")
			{
				// if the email is filled in, check to make sure it is valid
				if(OtherEmailCheck(document.Emails.email1.value) == false)
				{
					if(eText != "")
					{
						eText = eText + ", and " + document.Emails.email1.value + " is not a valid email address";
					}
					else
					{
						eText = document.Emails.email1.value + " is not a valid email address";
					}
					
					e = 1;
				}
			}
			
			if(document.Emails.email2.value != "")
			{
				// if the email is filled in, check to make sure it is valid
				if(OtherEmailCheck(document.Emails.email2.value) == false)
				{
					if(eText != "")
					{
						eText = eText + ", and " + document.Emails.email2.value + " is not a valid email address";
					}
					else
					{
						eText = document.Emails.email2.value + " is not a valid email address";
					}
					
					e = 1;
				}
			}
			
			if(document.Emails.email3.value != "")
			{
				// if the email is filled in, check to make sure it is valid
				if(OtherEmailCheck(document.Emails.email3.value) == false)
				{
					if(eText != "")
					{
						eText = eText + ", and " + document.Emails.email3.value + " is not a valid email address";
					}
					else
					{
						eText = document.Emails.email3.value + " is not a valid email address";
					}
					
					e = 1;
				}
			}
			
			if(document.Emails.email4.value != "")
			{
				// if the email is filled in, check to make sure it is valid
				if(OtherEmailCheck(document.Emails.email4.value) == false)
				{
					if(eText != "")
					{
						eText = eText + ", and " + document.Emails.email4.value + " is not a valid email address";
					}
					else
					{
						eText = document.Emails.email4.value + " is not a valid email address";
					}
					
					e = 1;
				}
			}
			
			if(document.Emails.email5.value != "")
			{
				// if the email is filled in, check to make sure it is valid
				if(OtherEmailCheck(document.Emails.email5.value) == false)
				{
					if(eText != "")
					{
						eText = eText + ", and " + document.Emails.email5.value + " is not a valid email address";
					}
					else
					{
						eText = document.Emails.email5.value + " is not a valid email address";
					}
					
					e = 1;
				}
			}

		} // end one email address at least...
		
		
		// if an error occurs, don't submit form, and tell them what to fill in.
		if (e == 1) 
		{
			alert("Please correct the following:\n\n" + eText + ".");
			return false;
		}
		else //if all is clear, let emails be sent!!!
		{
			return true;
		}
	}


                </script>

            <table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFCC">
              <tr>
                <td><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><em><font color="#000000" size="4">Friend
                        Referral Program</font></em><strong><br>
      Step 2: Sending Emails </strong></font></td>
                <td><div align="right">
                  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="test_Referral_Info.php">Step 1: How the program works </a></font></strong></p>
                  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="test_Referral_Tips.php">Step
                              3: Referral Tips </a></font></strong></p>
                </div></td>
              </tr>
            </table>
  <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">Your
  referral promotion code is <font color="#0000FF"><? echo $CustomerID; ?></font>.</font></strong></p>
			<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Send
        an email to friends to let them know about this great offer. When they
        use your referral promotion code <font color="#0000FF"><? echo $CustomerID; ?></font> online, they will receive 5% off their
        entire purchase. They can also purchase in the store
using your Referral Rebate Form to get a 5% rebate.</font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Once you
    sell 5 products using your referral promotion code <font color="#0000FF"><? echo $CustomerID; ?></font>, you get your purchase
    price refunded! (<a href="test_Referral_Info.php">Read more here</a>)<br>
</font></p>
<form action="" method="post" name="Emails" id="Emails" onSubmit="return CheckEmails();">
  <table width="85%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr>
      <td align="left" valign="top">
        <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; Add
              a Personal Note</font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="4">
          <tr>
            <td width="3%"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
            <td width="97%"><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Your
                  note will be added to your friends' emails.</strong></font></p>
              <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
                <textarea name="Note" cols="40" rows="4" id="Note"></textarea>
              </font></strong></p></td>
          </tr>
        </table>        </td>
    </tr>
  </table>
  <br>
  <table width="85%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top"> <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; 
          Friends' Info</font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="4">
          <tr> 
            <td width="3%"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
            <td width="30%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Name</strong></font></td>
            <td width="33%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Email</strong></font></td>
            <td width="34%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Test</strong></font></td>
          </tr>
          <tr> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>1.</strong></font></td>
            <td><input name="name1" type="text" id="name1"></td>
            <td><input name="email1" type="text" id="email1"></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="test1" id="test1">
                <option value="" selected>Test</option>
                <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql22 = "SELECT * FROM tblTests ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result22 = mysql_query($sql22) or die("Cannot execute query!");
					
					while($row22 = mysql_fetch_array($result22))
					{
				?>
                <option value="<? echo $row22[Name]; ?>"><? echo $row22[Name]; ?></option>
                <?
					}
				?>
              </select>
              </font></td>
          </tr>
          <tr> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>2.</strong></font></td>
            <td><input name="name2" type="text" id="name2"></td>
            <td><input name="email2" type="text" id="email2"></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="test2" id="test2">
                <option value="" selected>Test</option>
                <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql33 = "SELECT * FROM tblTests ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result33 = mysql_query($sql33) or die("Cannot execute query!");
					
					while($row33 = mysql_fetch_array($result33))
					{
				?>
                <option value="<? echo $row33[Name]; ?>"><? echo $row33[Name]; ?></option>
                <?
					}
				?>
              </select>
              </font></td>
          </tr>
          <tr> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>3.</strong></font></td>
            <td><input name="name3" type="text" id="name3"></td>
            <td><input name="email3" type="text" id="email3"></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="test3" id="test3">
                <option value="" selected>Test</option>
                <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql44 = "SELECT * FROM tblTests ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result44 = mysql_query($sql44) or die("Cannot execute query!");
					
					while($row44 = mysql_fetch_array($result44))
					{
				?>
                <option value="<? echo $row44[Name]; ?>"><? echo $row44[Name]; ?></option>
                <?
					}
				?>
              </select>
              </font></td>
          </tr>
          <tr> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>4.</strong></font></td>
            <td><input name="name4" type="text" id="name4"></td>
            <td><input name="email4" type="text" id="email4"></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="test4" id="test4">
                <option value="" selected>Test</option>
                <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql55 = "SELECT * FROM tblTests ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result55 = mysql_query($sql55) or die("Cannot execute query!");
					
					while($row55 = mysql_fetch_array($result55))
					{
				?>
                <option value="<? echo $row55[Name]; ?>"><? echo $row55[Name]; ?></option>
                <?
					}
				?>
              </select>
              </font></td>
          </tr>
          <tr> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>5.</strong></font></td>
            <td><input name="name5" type="text" id="name5"></td>
            <td><input name="email5" type="text" id="email5"></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="test5" id="test5">
                <option value="" selected>Test</option>
                <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql66 = "SELECT * FROM tblTests ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result66 = mysql_query($sql66) or die("Cannot execute query!");
					
					while($row66 = mysql_fetch_array($result66))
					{
				?>
                <option value="<? echo $row66[Name]; ?>"><? echo $row66[Name]; ?></option>
                <?
					}
				?>
              </select>
              </font></td>
          </tr>
        </table>
        
      </td>
    </tr>
  </table>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Check the information
         you have entered, then click <font color="#003399">&quot;Send Emails&quot;</font>.</strong></font> <font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Remember,
         we will NEVER sell your information or send SPAM. <a href="../legal/privacy.php" target="_blank">Read
         our Privacy Policy</a>. </font><font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
       </strong></font></p>
  <p> 
    <input name="Submit" type="submit" id="Submit" value="Send Emails">
  </p>
 
</form>
	 <p>&nbsp;</p>
  <p>&nbsp; </p>
   <p>&nbsp; </p>
    <p>&nbsp; </p>
	 <p>&nbsp; </p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/test_sidemenu.php";

// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customerservice/test_index.php'>
<?
}
?>