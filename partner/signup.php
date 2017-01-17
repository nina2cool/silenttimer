<?
//security for page
session_start();

$PageTitle = "Silent Timer Partner - Sign Up";

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";



/////////  code to insert information into account, create affiliate code, and email thank you /////////

	if ($_POST['SignUp'] == "Sign Up") # if button is pressed...
	{
	
		$webname = $_POST['webname'];
		$url = $_POST['url'];
		
		$partnercode = $_POST['partnercode'];
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$companyname = $_POST['companyname'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$phone = $_POST['phone'];
		$fax = $_POST['fax'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$address2 = $_POST['address2'];
		$city = $_POST['city'];
		
		$state = $_POST['state'];
		$stateother = $_POST['stateother'];
		
		# if other state is entered... then store it for input into database...
		if($state == "-1")
		{
			if($stateother != "")
			{
				$state = $stateother;
			}
		}
		
		$zip = $_POST['zip'];
		$country = $_POST['country'];
		
		$payto = $_POST['payto'];
		
		$category = $_POST['cat'];
		$description = $_POST['description'];
		$visits = $_POST['visits'];
		$pageview = $_POST['pageview'];
		
		$terms = $_POST['terms'];
		
		# first, do error checking....
		
		#error check goes here.....
		
		
		
		# link to DB
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");			
	
		$now = date("Y-m-d H:i:s");
		$ip = $_SERVER["REMOTE_ADDR"];
		
		
		
		# set errors to zero
		$err = "";
		
		
		# check for this partner code already in DB
		$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$partnercode'";
		$result = mysql_query($sql) or die("Can't get affiliate information, please try again.");
						
		while ($row = mysql_fetch_array($result))
		{
			$aff = $row[AffiliateID];
		}
		
		if ($aff != "") // if ID isn't taken, move on...if it is taken, do again...
		{
			$alreadyCode = "yes";
			$err = 1; // throw error
		}
		
		
		# check for this username already in DB
		$sql = "SELECT * FROM tblAffiliate WHERE UserName = '$username'";
		$result = mysql_query($sql) or die("Can't get affiliate usernames, please try again.");
						
		while ($row = mysql_fetch_array($result))
		{
			$aff = $row[AffiliateID];
		}
		
		if ($aff != "") // if ID isn't taken, move on...if it is taken, do again...
		{
			$alreadyUser = "yes";
			$err = 1; // throw error
		}
		
		
		
		// if code isn't already in database with someone else, then insert their information...
		if($err == "")
		{
		
			$sql = "INSERT INTO tblAffiliate(AffiliateID, CompanyName, FirstName, LastName, Email, Phone, Fax, Address, Address2, City, State, ZipCode, Country, WebSiteName, URL, Description, UniqueVisitors, PageViews, AnnualStudents, CheckToName, UserName, Password, AcceptTerms, DateTime, IP) 
					VALUES('$partnercode', '$companyname', '$firstname', '$lastname', '$email', '$phone', '$fax', '$address', '$address2', '$city', '$state', '$zip', '$country', '$webname', '$url', '$description', '$visits', '$pageview', '$numstudents', '$payto', '$username', '$password', '$terms', '$now' , '$ip')";
			mysql_query($sql) or die("Cannot insert affiliate, please try again.");
			
			
			# loop to insert categories into table...
			for($i=0; $i < count($category); $i++)
			{
				$sql = "INSERT INTO tblAffiliateCategory(AffiliateID, Category) VALUES ('$partnercode', '";					
				$sql .= $category[$i];
				$sql .= "')";
				#echo $sql;
				mysql_query($sql) or die("Can't Insert Affiliate Categories, please try again.");
			}
			
			# finished entering info into tables and DB.  Now email company to say thank you and give an intro to the program.
			# Also, email Silent Technology with info to approve.
			
			#emails
			
			//////////////////////
			//   Send Out receipt, and copy us on it... ------- Order is complete, send email to both Company email, and to customer.....
			//////////////////////

			
			# takes quotes and formats them correctly for the emails...
			function quote($var)
			{
				if (isset($var))
				{
					$string = str_replace("\'","'",$var);
					$string = str_replace('\"','"',$string);
				}
		
				return $string;
			}
			
			$webname = quote($webname);
			$url = quote($url);
			$username = quote($username);
			$password = quote($password);
			$password2 = quote($password2);
			$companyname = quote($companyname);
			$firstname = quote($firstname);
			$lastname = quote($lastname);
			$address = quote($address);
			$address2 = quote($address2);
			$city = quote($city);
			$country = quote($country);
			$payto = quote($payto);
			$description = quote($description);
			
			
			# change visits and pageviews to look good...
			if($visits =="499"){$visits = "< 500";}
			if($visits =="4999"){$visits = "500 - 5,000";}
			if($visits =="49999"){$visits = "5000 - 50,000";}
			if($visits =="499999"){$visits = "50,000 - 500,000";}
			if($visits =="500001"){$visits = "> 500,000";}
			
			if($pageview =="499"){$pageview = "< 500";}
			if($pageview =="4999"){$pageview = "500 - 5,000";}
			if($pageview =="49999"){$pageview = "5000 - 50,000";}
			if($pageview =="499999"){$pageview = "50,000 - 500,000";}
			if($pageview =="500001"){$pageview = "> 500,000";}
			
			if($address2 == ""){$address2 = "---------";}
			if($fax == ""){$fax = "---------";}
	
			
			
			require "../code/class.phpmailer.php";
			
			$mail = new PHPMailer();
			
			$mail->From = "partner@silenttimer.com";
			$mail->FromName = "Silent Technology LLC";
			$mail->AddAddress("$email", "$firstname $lastname");
			$mail->AddBCC("partner@silenttimer.com", "Silent Timer Partner");
			//$mail->AddBCC("nina@silenttimer.com", "Silent Timer Partner");
			$mail->AddBCC("erik@silenttimer.com", "Silent Timer Partner");
			#$mail->AddAttachment("Guide/Time Management Guide.pdf");
			$mail->IsHTML(true);
			$mail->Subject = "Silent Timer Partnership";

////// - HTML BUILDING
$html=
"<html>
<head>
<title>Thank you!</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<style type='text/css'>
<!--
.main {font: arial; color: #000000;text-decoration: none;}
.main A {font: arial; text-decoration: none; color: #000000;}
.main A:link {font: arial; text-decoration: none; color: #0000CC; font-weight: bold;}
.main A:visited {font: arial; text-decoration: none; color: #0000CC; font-weight: bold;}
.main A:hover {font: arial; text-decoration: none; color: #000000; font-weight: bold;}

.right {
  float: right;
}

.left {
  float: left;
}

-->
</style>
</head>
<body>

<table width='700' border='1' cellpadding='10' cellspacing='0' bordercolor='#333333' class='main'>
  <tr>
    <td><img src='http://www.silenttimer.com/partner/images/email/partner_title.jpg' width='384' height='60'></td>
  </tr>
  <tr>
    <td align='left' valign='top'> 
      <p><strong><font color='#003399' size='5' face='Arial, Helvetica, sans-serif'>Thank 
        you!</font></strong></p>
      <table width='100' border='0' cellspacing='0' cellpadding='5' class='right'>
        <tr> 
          <td><table width='100' border='2' cellpadding='0' cellspacing='0' bordercolor='#000000'>
              <tr> 
                <td><div align='center'><img src='http://www.silenttimer.com/partner/images/email/angle-left-front-low.jpg' width='202' height='151'></div></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <font size='2' face='Arial, Helvetica, sans-serif'><strong>Your 
        Partner Application has been successfully submitted.</strong></font>
      <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'>$firstname,</font></p>
      <font size='2' face='Arial, Helvetica, sans-serif'>This email is to confirm 
      with you that your Partner Application has been successfully submitted. 
      We are in the process of reviewing it, and within 24 hours, we will contact 
      you to complete your registration and inform you of your commission rates.</font> 
      <p><font size='2' face='Arial, Helvetica, sans-serif'><strong>Please review 
        the following information that you entered on your application.</strong> 
        If you find any errors, please let us know so we can correct them.</font></p>
	  <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'><strong>Site 
        Description: </strong></font></p>
      <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'>$description</font></p>
	  <table width='100%' border='1' cellpadding='4' cellspacing='0' bordercolor='#003399'>
        <tr>
          <td width='50%' align='left' valign='top'> 
            <table width='100%' border='0' cellspacing='0' cellpadding='3'>
              <tr> 
                <td width='127'><strong><font size='2' face='Arial, Helvetica, sans-serif'>Partner 
                  Code</font></strong></td>
                <td width='161'><font size='2' face='Arial, Helvetica, sans-serif'>$partnercode</font></td>
              </tr>
              <tr> 
                <td><strong><font size='2' face='Arial, Helvetica, sans-serif'>User 
                  Name</font></strong></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>$username</font></td>
              </tr>
              <tr> 
                <td><strong><font size='2' face='Arial, Helvetica, sans-serif'>Password</font></strong></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'> entered 
                  on form</font></td>
              </tr>
              <tr> 
                <td><strong><font size='2' face='Arial, Helvetica, sans-serif'>Website 
                  Name</font></strong></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>$webname</font></td>
              </tr>
              <tr> 
                <td><strong><font size='2' face='Arial, Helvetica, sans-serif'>Website 
                  URL</font></strong></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>$url</font></td>
              </tr>
              <tr> 
                <td><strong><font size='2' face='Arial, Helvetica, sans-serif'>Company 
                  Name</font></strong></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>$companyname</font></td>
              </tr>
              <tr> 
                <td><strong><font size='2' face='Arial, Helvetica, sans-serif'>First 
                  Name</font></strong></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>$firstname</font></td>
              </tr>
              <tr> 
                <td><strong><font size='2' face='Arial, Helvetica, sans-serif'>Last 
                  Name</font></strong></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>$lastname</font></td>
              </tr>
              <tr> 
                <td><strong><font size='2' face='Arial, Helvetica, sans-serif'>Phone</font></strong></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>$phone</font></td>
              </tr>
              <tr> 
                <td><strong><font size='2' face='Arial, Helvetica, sans-serif'>Fax</font></strong></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>$fax</font></td>
              </tr>
            </table>
          </td>
          <td width='50%' align='left' valign='top'> 
            <table width='100%' border='0' cellspacing='0' cellpadding='3'>
              <tr> 
                <td width='28%'><strong><font size='2' face='Arial, Helvetica, sans-serif'>Email 
                  Address</font></strong></td>
                <td width='72%'><font size='2' face='Arial, Helvetica, sans-serif'>$email</font></td>
              </tr>
              <tr> 
                <td><strong><font size='2' face='Arial, Helvetica, sans-serif'>Address</font></strong></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>$address</font></td>
              </tr>
              <tr> 
                <td><strong><font size='2' face='Arial, Helvetica, sans-serif'>Address 
                  2</font></strong></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>$address2</font></td>
              </tr>
              <tr> 
                <td><strong><font size='2' face='Arial, Helvetica, sans-serif'>City</font></strong></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>$city</font></td>
              </tr>
              <tr> 
                <td><strong><font size='2' face='Arial, Helvetica, sans-serif'>State</font></strong></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>$state</font></td>
              </tr>
              <tr> 
                <td><strong><font size='2' face='Arial, Helvetica, sans-serif'>Zip 
                  code</font></strong></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>$zip</font></td>
              </tr>
              <tr> 
                <td><strong><font size='2' face='Arial, Helvetica, sans-serif'>Country</font></strong></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>$country</font></td>
              </tr>
              <tr> 
                <td><strong><font size='2' face='Arial, Helvetica, sans-serif'>Checks 
                  To</font></strong></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>$payto</font></td>
              </tr>
              <tr> 
                <td><strong><font size='2' face='Arial, Helvetica, sans-serif'>Monthly 
                  Visitors </font></strong></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>$visits</font></td>
              </tr>
              <tr> 
                <td><font size='2' face='Arial, Helvetica, sans-serif'><strong>Page 
                  Views</strong></font></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>$pageview</font></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'>In the 
        meantime, you may log into your account with your user name and password. 
        Explore the partner site for cool images, banners, and text links. While 
        logged in, check out the features of your Partner Site. <a href='http://www.SilentTimer.com/partner/login.php'>Access 
        your login here</a>.</font></p>
      <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'>I look 
        forward to speaking with you. If you need to contact me, feel free to 
        email me at <a href='mailto:erik@silenttimer.com'>erik@silenttimer.com</a>, 
        or call 512-340-0338.</font></p>
      <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'>Thank 
        you again,</font></p>
      <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'>Sincerely,</font></p>
      <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'><a href='http://www.SilentTimer.com/inventors.php'>Erik 
        McMillan</a></font><font size='2' face='Arial, Helvetica, sans-serif'><br>
        <em>President</em><br>
        Silent Technology LLC<br>
        <a href='http://www.SilentTimer.com'>http://www.SilentTimer.com</a><br>
        512-340-0338</font></p>
      </td>
  </tr>
</table>
</body>
</html>
";
////// - END HTML BUILDING


/////  - ALTERNATE NON-HTML
$althtml = 
"$firstname,

This email is to confirm with you that your Partner Application has been successfully submitted.

We are in the process of reviewing it, and within 24 hours, we will contact you to complete your registration and inform you of your commission rates. Please review the following information that you entered on your application. If you find any errors, please let us know so we can correct them.

Site Description: 

$description

Partner Code: $partnercode
User Name: $username
Password: >entered on form
Website Name: $webname
Website URL: $url
Company Name: $companyname
First Name: $firstname
Last Name: $lastname
Phone: $phone
Fax: $fax
Email Address: $email
Address: $address
Address 2: $address2
City: $city
State: $state
Zip code: $zip
Country: $country
Checks To: $payto
Monthly Visitors: $visits
Monthly Page Views: $pageview

In the meantime, you may log into your account with your user name and password. Explore the partner site for cool images, banners, and text links. While logged in, check out the features of your Partner Site. Access your login here.

I look forward to speaking with you. If you need to contact me, feel free to email me at erik@silenttimer.com, or call 512-542-9981.

Thank you again,

Sincerely,

Erik McMillan
President
Silent Technology LLC
http://www.SilentTimer.com
512-542-9981
";
/////  - End of Alternate HTML Building
	
			$mail->Body = $html;
			
			$mail->AltBody = $althtml;
			
			if(!$mail->Send())
			{
			   echo "Email receipt could not be sent.<p>";
			   echo "Mailer Error: " . $mail->ErrorInfo;
			   exit;
			}
			
			
			# -->        -->         -->
			# send them to thank you page!
			header("location: thankyou.php?n=$firstname");
			
		}
		
		mysql_close($link);
		
	
	}
// end if button pressed // ******


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<script>
	
	// ------------------------------------------------------------------------ #
	//         Error Checking          ---------------------------------------- #
	// ------------------------------------------------------------------------ #
			
	function CheckSubmit()
	{
	
		//set error variable equal to 0
			var e = 0;
			var eText = "";
		
			
			// -- Partner Code -- ##			
			
			// code
			if(document.frmSignup.partnercode.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Partner Code";
				}
				else
				{
					eText = "Partner Code";
				}
				
				e = 1;	
			}
			
			
			// -- Login information -- ##			
			
			// user name
			if(document.frmSignup.username.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Username";
				}
				else
				{
					eText = "Username";
				}
				
				e = 1;	
			}
			else
			{
				// username cannot be the same as partner code...
				if(document.frmSignup.username.value == document.frmSignup.partnercode.value)
				{
					if(eText != "")
					{
						eText = eText + ", and Username Can Not Equal Partner Code";
					}
					else
					{
						eText = "Username Can Not Equal Partner Code";
					}
					
					e = 1;	
				}
			
			}
			
			
			
			
			// password !!!!!!!
			if(document.frmSignup.password.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Password";
				}
				else
				{
					eText = "Password";
				}
				
				e = 1;	
			}
			else
			{
				// check to see that passwords match!
				if(document.frmSignup.password.value != document.frmSignup.password2.value)
				{
					if(eText != "")
					{
						eText = eText + ", and Password Match";
					}
					else
					{
						eText = "Password Match";
					}
					
					e = 1;	
				}
				
				// check to see if password is the same as username...
				if(document.frmSignup.password.value == document.frmSignup.username.value)
				{
					if(eText != "")
					{
						eText = eText + ", and Password Can Not Equal User Name";
					}
					else
					{
						eText = "Password Can Not Equal User Name";
					}
					
					e = 1;	
				}
				
				// check to see if password is the same as partnercode...
				if(document.frmSignup.password.value == document.frmSignup.partnercode.value)
				{
					if(eText != "")
					{
						eText = eText + ", and Password Can Not Equal Partner Code";
					}
					else
					{
						eText = "Password Can Not Equal Partner Code";
					}
					
					e = 1;	
				}
			
			}
			
		
			// -- Company and Website -- ##
			
			// WebSite name
			if(document.frmSignup.webname.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Website Name";
				}
				else
				{
					eText = "Website Name";
				}
				
				e = 1;	
			}
			
			// WebSite URL
			if(document.frmSignup.url.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Website URL";
				}
				else
				{
					eText = "Website URL";
				}
				
				e = 1;	
			}
			
			// Company Name
			if(document.frmSignup.companyname.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Company Name";
				}
				else
				{
					eText = "Company Name";
				}
				
				e = 1;	
			}
			
			
			// First Name
			if(document.frmSignup.firstname.value == "")
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
			if(document.frmSignup.lastname.value == "")
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
			
			// Phone
			if(document.frmSignup.phone.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Phone";
				}
				else
				{
					eText = "Phone";
				}
				
				e = 1;	
			}
			
			
			// email ----------- !!!!!!!!!!
			var email = 0;
			
			if(document.frmSignup.email.value == "")
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
	
				var str = document.frmSignup.email.value;
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

			} // end email check....
			
			
			// address
			if(document.frmSignup.address.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Address";
				}
				else
				{
					eText = "Address";
				}
				
				e = 1;	
			}
			
			// city
			if(document.frmSignup.city.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and City";
				}
				else
				{
					eText = "City";
				}
				
				e = 1;
			}
			
			// state
			if(document.frmSignup.state.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and State";
				}
				else
				{
					eText = "State";
				}
				
				e = 1;
			}
			else
			{
				if(document.frmSignup.state.value == "-1") // if state other...
				{
					if(document.frmSignup.stateother.value == "")
					{
						if(eText != "")
						{
							eText = eText + ", and Other State";
						}
						else
						{
							eText = "Other State";
						}
						
						e = 1;
					}
				
				}
		
			} // end state
			
			
			
			// zip code
			if(document.frmSignup.zip.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Zip Code";
				}
				else
				{
					eText = "Zip Code";
				}
				
				e = 1;
			}
			
			
			// Country
			if(document.frmSignup.country.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Country";
				}
				else
				{
					eText = "Country";
				}
				
				e = 1;
			}
			
			
			// Checks payable to:
			if(document.frmSignup.payto.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Check Payable To";
				}
				else
				{
					eText = "Check Payable To";
				}
				
				e = 1;
			}

			// description
			if(document.frmSignup.description.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Website Description";
				}
				else
				{
					eText = "Website Description";
				}
				
				e = 1;
			}
			
			// visits
			if(document.frmSignup.visits.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Website Unique Monthly Visits";
				}
				else
				{
					eText = "Website Unique Monthly Visits";
				}
				
				e = 1;
			}
			
			// pageviews
			if(document.frmSignup.pageview.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Website Monthly Pageviews";
				}
				else
				{
					eText = "Website Monthly Pageviews";
				}
				
				e = 1;
			}


		// Contract signed Check
		
			if(!document.frmSignup.terms.checked)
			{
				if(eText != "")
				{
					eText = eText + ", and Terms Agreement";
				}
				else
				{
					eText = "Terms Agreement";
				}
				
				e = 1;	
				
			}

			
			// if an error occurs, don't submit form, and tell them what to fill in.
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


	// ------------------------------------------------------------------------ #
	// / end    Error Checking         ---------------------------------------- #
	// ------------------------------------------------------------------------ #


</script>


<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Partner 
  Program Application</strong></font></p>
<p><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Join 
  us in our mission of helping students beat their test time. Remember, for each 
  timer your website sells, you get cash. <a href="about.php">Read how it works</a>.</font></strong></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Fill out 
  the following information about your web site. A confirmation email is sent 
  after you submit this application to verify the information you have entered. 
  Within 24 hours we will contact you to complete your account activation. It 
  is important to give us accurate visitor statistics for your web site. We will 
  use these stats, along with a monthly review, to calculate your commission amount 
  per sale. If you have any questions, please <a href="contactus.php"><strong>contact 
  us</strong></a>.</font></p>


<form action="" name="frmSignup" method="post" onSubmit="return CheckSubmit();">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000066">
    <tr> 
      <td colspan="2" bgcolor="#eeeeee"><font size="2" face="Arial, Helvetica, sans-serif"><span class="bold"><strong><font size="4">Partner 
        Code </font> </strong>(<font color="#FF0000">*</font> indicates required 
        field)</span></font></td>
    </tr>
    <tr> 
      <td width="35%" align="left" valign="middle"> 
        <p><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Partner 
          Code <font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#FF0000">*</font><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"></span></font></span></font></strong></font></p>
        <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>This is 
          the code you will put on the end of each link to our site; visitors 
          will see your code. Choose wisely, you cannot change it. You may use 
          any combination of up to 10 letters and numbers.</strong></font></p></td>
      <td align="left" valign="top"> <p> 
          <input name="partnercode" type="text" id="partnercode" value="<? echo $partnercode;?>" size="12" maxlength="10">
          <font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
          <? if($alreadyCode == "yes"){echo "<font color='#FF0000'><strong>Code is already taken, please try again.</strong></font>  ";}?>
          (case sensitive)</span></font></span></font></span></font> 
        </p>
        <p><font color="#666666" size="2" face="Arial, Helvetica, sans-serif"><em>Example</em>: 
          If your code is &quot;coolweb&quot;, you will use it to link to us like: 
          http://www.silenttimer.com?a=coolweb</font></p>
        <p><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">Only 
          use letters and numbers. No spaces or special characters.</font></p></td>
    </tr>
    <tr> 
      <td colspan="2" align="left" valign="middle" bgcolor="#eeeeee"><font size="2" face="Arial, Helvetica, sans-serif"><span class="bold"><strong><font size="4"><br>
        Login Information</font></strong></span></font></td>
    </tr>
    <tr> 
      <td align="left" valign="middle"><p><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">User 
          Name</font> <font color="#FF0000">*</font></span></font></strong></p>
        <p><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"><span class="text">For 
          security purposes, choose a different User Name than your Partner Code.<br>
          </span></font></span></font></strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"></font></span></font></span></font></p></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="username" type="text" id="username" value="<? echo $username;?>" size="12" maxlength="12">
		<? if($alreadyUser == "yes"){echo "<font color='#FF0000'><strong>Username already taken, please try again.</strong></font>  ";}?>
        <font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"><span class="text">(case 
        sensitive) </span></font></span></font> </span></font></td>
    </tr>
    <tr> 
      <td align="left" valign="middle"><p><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Password</font> 
          <font color="#FF0000">*</font></span></font></strong></p>
        <p><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Your 
          Password may not be the same as your Partner Code or your User Name.</font></strong></p>
        </td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="password" type="password" id="password3" size="12" maxlength="12">
        (case sensitive) </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Confirm 
        Password</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="password2" type="password" id="password22" size="12" maxlength="12">
        </span></font></td>
    </tr>
    <tr> 
      <td colspan="2" bgcolor="#eeeeee"> <p><strong><font size="4" face="Arial, Helvetica, sans-serif"><br>
          </font></strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="bold"><strong><font size="4">Company 
          and Website</font></strong></span></font></p></td>
    </tr>
    <tr> 
      <td width="136"><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Website 
        Name</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td width="887"><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="webname" type="text" id="webname" value="<? echo $webname;?>" size="40" border="1">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Website 
        URL</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="url" type="text" id="url" value="<? echo $url;?>" size="40">
        <br>
        Your site must be live for approval.</span></font></td>
    </tr>
    <tr> 
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Company 
        Name </font><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="companyname" type="text" id="companyname" value="<? echo $companyname;?>" size="40">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">First 
        Name</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="firstname" type="text" id="firstname" value="<? echo $firstname;?>" size="20">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Last 
        Name</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input type="text" name="lastname" value="<? echo $lastname;?>" size="20">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Phone</font> 
        <font color="#FF0000">*</font> </span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="phone" type="text" id="phone" value="<? echo $phone;?>" size="15" maxlength="20">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><span class="text">Fax</span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="fax" type="text" id="fax" value="<? echo $fax;?>" size="15" maxlength="15">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">E-mail 
        Address</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="email" type="text" value="<? echo $email;?>">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Mailing 
        Address</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="address" type="text" id="address"  value="<? echo $address;?>">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><span class="text">Mailing 
        Address 2</span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input type="text" name="address2" value="<? echo $address2;?>">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <font color="#003399">City </font><font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input type="text" name="city" value="<? echo $city;?>">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <font color="#003399">State or Province</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td> <font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <select name="state" class="text">
          <option value="" selected>Please Select</option>
          <?  
		  	# link to DB
			$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
			mysql_select_db($db) or die("Cannot select Database");  
			
			// build combo box for states in DB
			// SQL to get data from shippingoption and shipper table
			$sql = "SELECT State, Name
					FROM tblState
					ORDER BY Name";
			//put SQL statement into result set for loop through records
			$result = mysql_query($sql) or die("Cannot execute query!");
			
			while($row = mysql_fetch_array($result))
			{
		?>
          <option value="<? echo $row[State];?>"<? if($state==$row[State]){echo "selected";}?>><? echo $row[Name];?></option>
          <?
			}
		?>
          <option value="-1">Other </option>
        </select>
        If Other, please specify<br>
        <input name="stateother" type="text" id="stateother" value="<? echo $stateother;?>">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <font color="#003399">Zip or Postal Code</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td> <font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input type="text" name="zip" value="<? echo $zip;?>">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <font color="#003399">Country</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <select name="country" class="text">
			<option value="US" selected>UNITED STATES</option>
			<option value="CA">CANADA</option>
          <?    
			// build combo box for countries in DB
			// SQL to get data from shippingoption and shipper table
			$sql = "SELECT ISO, Name
					FROM tblCountry
					ORDER BY Name";
			//put SQL statement into result set for loop through records
			$result = mysql_query($sql) or die("Cannot execute query!");
			
			while($row = mysql_fetch_array($result))
			{
		?>
          <option value="<? echo $row[ISO];?>" <? if($country==$row[ISO]){echo "selected";}?>><? echo $row[Name];?></option>
          <?
			}
			mysql_close($link);
		?>
        </select>
        </span></font></td>
    </tr>
    <tr> 
      <td colspan="2" bgcolor="#eeeeee"> <font size="4" face="Arial, Helvetica, sans-serif"><span class="bold"> 
        <strong><br>
        Payment Information</strong></span> </font></td>
    </tr>
    <tr> 
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        Make Checks Payable To </span></font><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input type="text" name="payto" value="<? echo $payto;?>" size="40">
        </span></font></td>
    </tr>
    <tr> 
      <td colspan="2" bgcolor="#eeeeee"> <p><font size="4" face="Arial, Helvetica, sans-serif"><strong><br>
          </strong><span class="bold"><strong>Site Description</strong></span> 
          </font></p></td>
    </tr>
    <tr> 
      <td> <p><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><strong><font color="#003399">Website 
          Categories</font></strong></span></font><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#FF0000"> 
          *</font></span></font></strong></span></font><br>
          <font size="2" face="Arial, Helvetica, sans-serif">(Select all that 
          apply)</font></p></td>
      <td><span class="text"> </span> <table border="0" align="left">
          <tr> 
            <td width="128" valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="test prep" <? for($i=0; $i < count($category); $i++) {if($category[$i] == 'test prep'){echo 'checked';} }?>>
              Test Prep<br>
              </font></span></td>
            <td width="139" valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="online courses" <? for($i=0; $i < count($category); $i++) {if($category[$i] == 'online courses'){echo 'checked';} }?>>
              Online Courses<br>
              </font></span></td>
            <td width="130" valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="education" <? for($i=0; $i < count($category); $i++) {if($category[$i] == 'education'){echo 'checked';} }?>>
              Education<br>
              </font></span></td>
          </tr>
          <tr> 
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="school" <? for($i=0; $i < count($category); $i++) {if($category[$i] == 'school'){echo 'checked';} }?>>
              School<br>
              </font></span></td>
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="books" <? for($i=0; $i < count($category); $i++) {if($category[$i] == 'books'){echo 'checked';} }?>>
              Books<br>
              </font></span></td>
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="tutoring" <? for($i=0; $i < count($category); $i++) {if($category[$i] == 'tutoring'){echo 'checked';} }?>>
              Tutoring<br>
              </font></span></td>
          </tr>
          <tr> 
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="act" <? for($i=0; $i < count($category); $i++) {if($category[$i] == 'act'){echo 'checked';} }?>>
              ACT<br>
              </font></span></td>
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="gmat" <? for($i=0; $i < count($category); $i++) {if($category[$i] == 'gmat'){echo 'checked';} }?>>
              GMAT<br>
              </font></span></td>
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="gre" <? for($i=0; $i < count($category); $i++) {if($category[$i] == 'gre'){echo 'checked';} }?>>
              GRE<br>
              </font></span></td>
          </tr>
          <tr> 
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="lsat" <? for($i=0; $i < count($category); $i++) {if($category[$i] == 'lsat'){echo 'checked';} }?>>
              LSAT<br>
              </font></span></td>
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="mcat" <? for($i=0; $i < count($category); $i++) {if($category[$i] == 'mcat'){echo 'checked';} }?>>
              MCAT </font></span></td>
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="sat" <? for($i=0; $i < count($category); $i++) {if($category[$i] == 'sat'){echo 'checked';} }?>>
              SAT<br>
              </font></span></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td> <font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399"><strong>Brief 
        Description of Site</strong></font> <strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#FF0000">*</font></span></font></strong></span></font></td>
      <td> <font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <textarea name="description" cols="40" rows="5" wrap="VIRTUAL" id="description" border="1"><? echo $description;?></textarea>
        </span></font></td>
    </tr>
    <tr> 
      <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><span class="text"><strong>Website 
        Stats </strong></span></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <select name="visits" class="text">
        <option selected>Monthly Unique Visitors</option>
        <option value="499" <? if($visits == "499"){echo "selected";}?>>Less Than 500 </option>
        <option value="4999" <? if($visits == "4999"){echo "selected";}?>>500 - 5000</option>
        <option value="49999" <? if($visits == "49999"){echo "selected";}?>>5000 - 50,000</option>
        <option value="499999" <? if($visits == "499999"){echo "selected";}?>>50,000 - 500,000</option>
        <option value="500001" <? if($visits == "500001"){echo "selected";}?>>Over 500,000 </option>
      </select>
        <select name="pageview" class="inputbox">
          <option selected>Monthly Page Views </option>
          <option value="499" <? if($pageview == "499"){echo "selected";}?>>Less 
          Than 500 </option>
          <option value="4999" <? if($pageview == "4999"){echo "selected";}?>>500 
          - 5000</option>
          <option value="49999" <? if($pageview == "49999"){echo "selected";}?>>5000 
          - 50,000</option>
          <option value="499999" <? if($pageview == "499999"){echo "selected";}?>>50,000 
          - 500,000</option>
          <option value="500001" <? if($pageview == "500001"){echo "selected";}?>>Over 
          500,000 </option>
        </select>
        </span></font></td>
    </tr>
    <tr> 
      <td colspan="2"><input name="terms" type="checkbox" id="terms" value="y" <? if($terms == "y"){echo "checked";}?>>
        <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="termscontract.php" target="_blank">Agree 
        to Terms and Conditions</a> </strong></font><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#FF0000">*</font></span></font></strong></span></font></td>
    </tr>
    <tr> 
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><br>
        <input name="SignUp" type="submit" id="SignUp" value="Sign Up">
        &nbsp;&nbsp; 
        <input type="reset" value="Reset ">
        </span></font></td>
    </tr>
  </table>
</form>
			
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>