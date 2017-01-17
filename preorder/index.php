<?
//security for page
session_start();

//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

$PageTitle = "Pre-Order for The Silent Timer PLUS Bonus Timer";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

# link to DB for page calls to it.
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");
	
#grab test name from the URL to customize order page...
$tURL = $_GET['t'];
if($tURL == ""){$TextTest = "test";}else{$TextTest = $tURL;}

if ($tURL == "")
{
	$PageTitle = "Pre-Order The Silent Timer PLUS Bonus Timer for your LSAT, MCAT and more!";
}
else
{
	$PageTitle = "Pre-Order The Silent Timer PLUS Bonus Timer for your $tURL!";
}
/*
# ------------------------------------------------------------------------------------------------------------
#   make sure host is secure! If it isn't, redirect to secure page.
# ------------------------------------------------------------------------------------------------------------

	$host = $HTTP_HOST; # current host (www.silenttimer.com OR secure.silenttimer.com)
	$page = $REQUEST_URI; # current page
	
	if($host!="secure.silenttimer.com")
	{
		$goto = "https://secure.silenttimer.com" . $page;
		header("location: $goto");
	}
*/
# ------------------------------------------------------------------------------------------------------------
#  END check page for security.
# ------------------------------------------------------------------------------------------------------------

// has http variable in it to populate links on page.
require "../include/url.php";



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

# --------------------------------------------------------------------------------------------
#   Function to take words in sentence and capitlize the first letters according to MLA Handbook!
# --------------------------------------------------------------------------------------------	
#
#   This function capitalizes the words in a title according to the MLA Handbook,
#   that is, no articles, prepositions, and conjunctions are capitalized. (I also
#   added any forms of the verb 'to be'.)
#
#   ex. the brown fox is too close  -->  The Brown Fox is too Close
#
#   Suggestion: If this function is called many times, move the first five lines
#   to the beginning of your php script and set $exceptions as a global.   */
#
#
function Capitalize($title, $delimiter = " ")
{

  /* Capitalizes the words in a title according to the MLA Handbook.
	 $delimiter parameter is optional. It is only needed if delimiter
	 is not a space.    */
	 
	$articles = 'a|an|the';
	$prepositions = 'aboard|above|according|across|against|along|around|as|at|because|before|below|beneath|beside|between|beyond|by|concerning|during|except|for|from|inside|into|like|near|next|of|off|on|out|outside|over|past|since|through|to|toward|underneath|until|upon|with';
	$conjunctions = 'and|but|nor|or|so|yet';
	$verbs = 'are|be|did|do|is|was|were|will';
	$exceptions = explode('|',$articles.'|'.$prepositions.'|'.$conjunctions.'|'.$verbs); 
	$words = explode($delimiter,$title);
	$lastWord = count($words)-1;   // first & last words are always capitalized
	$words[0] = ucfirst($words[0]);
	$words[$lastWord] = ucfirst($words[$lastWord]);
	for($i=1; $i<$lastWord; $i++) {
		if (!in_array($words[$i],$exceptions)) {
			$words[$i] = ucfirst($words[$i]);
			}
		}
	$newTitle = implode(' ',$words);
	return $newTitle;
}
#
# --------------------------------------------------------------------------------------------

	# --------------------------------------------------------------------------------------------
	#   Function to insert back slashes into characters with a single or a double quote in them.
	# --------------------------------------------------------------------------------------------

	function addQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("||","'",$var);
			$string = str_replace('||||','"',$string);
		}

		return $string;
	}
	
	function escapeQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("\'","||",$var);
			$string = str_replace('\"','||||',$string);
		}

		return $string;
	}
	
		function dbQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("||","\'",$var);
			$string = str_replace('||||','\"',$string);
		}

		return $string;
	}
	
	
	# --------------------------------------------------------------------------------------------

	
	#<Confirm button being pushed>
	if ($_POST['Submit'] == "Place Pre-Order")
	{
	
		# link to DB for page calls to it.
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");

		$FirstName = dbQuote($_POST['txtFirstName']);
		$LastName = dbQuote($_POST['txtLastName']);
		$City = dbQuote($_POST['txtCity']);
		$State = $_POST['txtState'];
		$State_Other = dbQuote($_POST['txtState_Other']);
		$Country = $_POST['txtCountry'];
		$Phone = $_POST['txtPhone'];
		$Email = $_POST['txtEmail'];
		$TestID = $_POST['TestID'];
		if($TestID == ""){$TestID = "0";} #fixes integer problem for test being blank if none is selected.		
		$TestDate = $_POST['txtTestDate'];
		$chkTestDate = $_POST['chkTestDate'];
		$TestMonth = $_POST['TestMonth'];
		$TestDay = $_POST['TestDay'];
		$TestYear = $_POST['TestYear'];
		$TestDate = $TestYear."-".$TestMonth."-".$TestDay;
		if($chkTestDate == "y") { $TestDate = '0000-00-00'; }
		
		$now = date("Y-m-d H:i:s");
		$IP = $_SERVER["REMOTE_ADDR"];
		
						
		$sql = "INSERT INTO tblPreOrder(FirstName, LastName, City, State, StateOther, CountryID, Phone, Email, TestID, TestDate, DateTime, IP, ProductID)
		VALUES('$FirstName', '$LastName', '$City', '$State', '$State_Other', '$Country', '$Phone', '$Email', '$TestID', '$TestDate', '$now', '$IP', '0');";
		
		//echo "<br>sql = " .$sql;
		
		$result = mysql_query($sql) or die(mysql_error());
		
				

	#------------------------------------------
	#------------------------------------------
			
				////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
				$FirstName = addQuote($FirstName);
				$LastName = addQuote($LastName);
				$City = addQuote($City);
				$State_Other = addQuote($State_Other);
				$CountryName = addQuote($CountryName);
		
		
		//////////////////////
		//   Send Out receipt, and copy us on it... ------- Order is complete, send email to both Company email, and to customer.....
		//////////////////////
		
			require "../code/class.phpmailer.php";
			
			$mail = new PHPMailer();
			
			$mail->From = "info@silenttimer.com";
			$mail->FromName = "The Silent Timer Team";
			$mail->AddAddress("$Email", "$FirstName $LastName");
			//$mail->AddBCC("nina@silenttimer.com", "Silent Timer PreOrders");
			//$mail->AddBCC("erik@silenttimer.com", "Silent Timer Orders");
			#$mail->AddAttachment("Guide/Time Management Guide.pdf");
			$mail->IsHTML(true);
			$mail->Subject = "Your SilentTimer.com Pre-Order Confirmation";
		
		
			if($State == "ZZ"){$State = $State_Other;}
		
		////// - HTML BUILDING
		$html=
		"
		<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
		<html>
		<head>
		<title>The Silent Timer Receipt</title>
		<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
		</head>
		<body>
		
				<table width='800' border='0' cellspacing='0' cellpadding='0'>
		  <tr>
			<td class='main'><p><font color='#003399' size='2' face='Arial, Helvetica, sans-serif'><strong>Your
			         SilentTimer.com Pre-Order Confirmation</strong></font></p>
			  <p><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'><strong>$FirstName</strong></font><font size='2' face='Arial, Helvetica, sans-serif'><strong>,
		          thank you for your pre-order!</strong></font></p>
			  <p><font size='2' face='Arial, Helvetica, sans-serif'>You will be notified
			      via e-mail as soon as the new products arrive. At this point,
			      you will come back to the web site (<a href='http://www.SilentTimer.com'>www.SilentTimer.com</a>) and
			      complete your order.</font></p>
			  <p><font size='2' face='Arial, Helvetica, sans-serif'>Please let us know
			      if you have any questions. The expected availability date is
			      sometime in August.</font></p>
			  <p><font size='2' face='Arial, Helvetica, sans-serif'>Thank you very much!</font></p>
			  <p><font size='2' face='Arial, Helvetica, sans-serif'><b><font color='#FF0000'>-The Silent Timer
			      Team</font></b><br>
		      Silent Technology LLC<br>
		      <a href='http://www.SilentTimer.com'>www.SilentTimer.com</a><br>
		      800-552-0325</font></p>			  
		</body>
		</html>
		";
		////// - END HTML BUILDING
		
		
		/////  - ALTERNATE NON-HTML
		$althtml = "
		Your SilentTimer.com Pre-Order Confirmation
		
		$FirstName, thank you for your pre-order!
		
		You will be notified via e-mail as soon as the new products arrive. At this point, you will come back to the web site (www.SilentTimer.com) and complete your order.
		
		Please let us know if you have any questions. The expected availability date is late August 2006.
		
		Thank you very much!
		
		-The Silent Timer Team
		 Silent Technology LLC
		 www.SilentTimer.com
		 800-552-0325
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
			
		
		
		# -----------------------------------------------------
		# SEND and email with ALL data to our email address...
		# -----------------------------------------------------
		
		$mail = new PHPMailer();
			
		$mail->From = "$Email";
		$mail->FromName = "Pre-Order";
		$mail->AddAddress("nina@silenttimer.com", "Christina McMillan");
		//$mail->AddAddress("erik@silenttimer.com", "Erik McMillan");
		$mail->IsHTML(false);
		$mail->Subject = "Pre-Order: $FirstName $LastName from $City, $State";
		
		$DetailedEmail =
		"
		Pre-Order Details ----------------------------

		Date/Time:			$now
		
		$FirstName $LastName
		$City, $State
		$Country
		
		Phone:             $Phone
		Email:             $Email

		Test ID:		   $TestID
		Test Date:         $TestDate
		
		IP:                $IP
		
		";
		
			$mail->Body = $DetailedEmail;
			
			if(!$mail->Send())
			{
			   echo "Email receipt could not be sent to support team.<p>";
			   echo "Mailer Error: " . $mail->ErrorInfo;
			   exit;
			}

		mysql_close($link);
		
		$goto = "thankyou.php";
		header("location: $goto");

}


// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom2.php";


 // make sure to close connection to database!!!
?>


<script>
<!--
// this code hides and shows content on the page like the check ordering info...
	function visible(content)
	{
	  if (document.getElementById(content).style.display == "none") {
		document.getElementById(content).style.display = "";
		return true;
	  } else {
		document.getElementById(content).style.display = "none";
		return true;
	  }
	}
	
		
	function country_change()
	{
		switch (document.frmOrder.txtState.value)
		{
			case "PR": 
			document.frmOrder.txtCountry.value = "241" ;
			break
			case "AK": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "HI": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "GU": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "MH": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "MP": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "PW": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "VI": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "PW": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "AS": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "AB": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "BC": 
			document.frmOrder.txtCountry.value = "38";
			break			
			case "MB": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "NF": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "NB": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "NT": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "NS": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "PE": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "SK": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "YT": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "QC": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "ON": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "NU": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "ZZ":
			//do nothing allow user to choose country
			break
			default : document.frmOrder.txtCountry.value = "225";	
		
		}
	}
		
	function country_change2()
	{
		switch (document.frmOrder.txtState.value)
		{
			case "PR": 
			document.frmOrder.txtCountry.value = "241" ;
			break
			case "AK": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "HI": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "GU": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "MH": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "MP": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "PW": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "VI": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "PW": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "AS": 
			document.frmOrder.txtCountry.value = "241";
			break
			case "AB": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "BC": 
			document.frmOrder.txtCountry.value = "38";
			break			
			case "MB": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "NF": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "NB": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "NT": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "NS": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "PE": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "SK": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "YT": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "QC": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "ON": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "NU": 
			document.frmOrder.txtCountry.value = "38";
			break
			case "ZZ":
			//do nothing allow user to choose country
			break
			default: ; // do nothing		
		}
	
	
	}

// this code changes the country code to match the state
	
	// ------------------------------------------------------------------------ #
	//         Error Checking          ---------------------------------------- #
	// ------------------------------------------------------------------------ #
	
	function IsNumericZip(sText)
	{
		var ValidChars = "0123456789-";
		var Char;
		
		for (i = 0; i < sText.length; i++)
		{ 
			Char = sText.charAt(i); 
			if (ValidChars.indexOf(Char) == -1) 
			{
			return false;
			}
		}
		
		return true;
	}
	
		
	function CheckOrder()
	{
	
		//set error variable equal to 0
			var e = 0;
			var eText = "";
		
			
			// -- Shipping Address Info -- ##			
			
			// address
			if(document.frmOrder.txtAddress.value == "")
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
			if(document.frmOrder.txtCity.value == "")
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
			
			// check for Puerto Rico 
			if(document.frmOrder.txtState.value == "PR")
			{
				if(document.frmOrder.txtAddress2.value == "")
				{
					if(eText != "")
	
					{
						eText = eText + ", and Urbanization";
					}
					else
					{
						eText = "Urbanization";
					}
					
					e = 1;
				}
			}
			
			// check for state if inside US
			if(document.frmOrder.txtCountry.value == "225")
			{
				if(document.frmOrder.txtState.value == "")
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
			}
			// state OTHER
			
			if(document.frmOrder.txtState.value == "ZZ")
			{

				if(document.frmOrder.txtState_Other.value == "")
				{
					if(eText != "")
	
					{
						eText = eText + ", and Shipping State";
					}
					else
					{
						eText = "Shipping State";
					}
					
					e = 1;
				}
			
			}
			
			
			// zip code
			if(document.frmOrder.txtZipCode.value == "")
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
			
			// valid zip code................................. only if this is for a US order...
			
			if(document.frmOrder.txtCountry.value == "225")
			{
			
				if(!IsNumericZip(document.frmOrder.txtZipCode.value))
				{
					if(eText != "")
					{
						eText = eText + ", and Valid Zip Code";
					}
					else
					{
						eText = "Valid Zip Code";
					}
					
					e = 1;
				}
				else
				{
					if(document.frmOrder.txtZipCode.value.length < 5)
					{
						if(eText != "")
						{
							eText = eText + ", and Valid Zip Code";
						}
						else
						{
							eText = "Valid Zip Code";
						}
						
						e = 1;
					}
				}
				
			}
			
			
			// first name
			if(document.frmOrder.txtFirstName.value == "")
			{
				e = 1;
				eText = "First Name";	
			}
			
			// last name
			if(document.frmOrder.txtLastName.value == "")
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
			
			// phone
			if(document.frmOrder.txtPhone.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and Phone Number";
				}
				else
				{
					eText = "Phone Number";
				}
				
				e = 1;
			}
			else
				{
					if(document.frmOrder.txtPhone.value.length < 10)
					{
						if(eText != "")
						{
							eText = eText + ", and Valid Phone";
						}
						else
						{
							eText = "Valid Phone";
						}
						
						e = 1;
					}
				}
			// phone - only numbers... ---------------------
			
			function IsNumeric(sText)
			{
				var ValidChars = "0123456789-() ";
				var Char;
				
				for (i = 0; i < sText.length; i++) 
				{ 
					Char = sText.charAt(i); 
					if (ValidChars.indexOf(Char) == -1) 
					{
					return false;
					}
				}
				
				return true;
			}
			
			if(!IsNumeric(document.frmOrder.txtPhone.value))
			{
				if(eText != "")
				{
					eText = eText + ", and Valid Phone Number";
				}
				else
				{
					eText = "Valid Phone Number";
				}
				
				e = 1;
			}
			else
			{
				if(document.frmOrder.txtCountry.value == "US")
				{
				
					if(document.frmOrder.txtPhone.value.length < 10 && document.frmOrder.txtPhone.value != "")
					{
						if(eText != "")
						{
							eText = eText + ", and Valid Phone Number";
						}
						else
						{
							eText = "Valid Phone Number";
						}
						
						e = 1;
					}
				}				
				
			}
			
			// email
			var email = 0;
			
			if(document.frmOrder.txtEmail.value == "")
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
	
				var str = document.frmOrder.txtEmail.value;
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
			
			
		
		// -- Billing Address Info -- ##
		
			// if billing address is different from shipping...
			if(!document.frmOrder.chkSame.checked)
			{				
				// billing first name
				if(document.frmOrder.txtFirstNameB.value == "")
				{
					if(eText != "")
					{
						eText = eText + ", and Billing First Name";
					}
					else
					{
						eText = "Billing First Name";
					}
					
					e = 1;	
				}
				
				// billing last name
				if(document.frmOrder.txtLastNameB.value == "")
				{
					if(eText != "")
					{
						eText = eText + ", and Billing Last Name";
					}
					else
					{
						eText = "Billing Last Name";
					}
					
					e = 1;	
				}
				
				// billing address
				if(document.frmOrder.txtAddressB.value == "")
				{
					if(eText != "")
					{
						eText = eText + ", and Billing Address";
					}
					else
					{
						eText = "Billing Address";
					}
					
					e = 1;	
				}
				
				// billing city
				if(document.frmOrder.txtCityB.value == "")
				{
					if(eText != "")
					{
						eText = eText + ", and Billing City";
					}
					else
					{
						eText = "Billing City";
					}
					
					e = 1;
				}
				
				// billing state
				if(document.frmOrder.txtStateB.value == "")
				{
					if(eText != "")
					{
						eText = eText + ", and Billing State";
					}
					else
					{
						eText = "Billing State";
					}
					
					e = 1;
				}
				
				// billing state OTHER
			
				if(document.frmOrder.txtStateB.value == "ZZ")
				{
	
					if(document.frmOrder.txtState_OtherB.value == "")
					{
						if(eText != "")
		
						{
							eText = eText + ", and Billing State";
						}
						else
						{
							eText = "Billing State";
						}
						
						e = 1;
					}
				
				}
				
				
				
				// billing zip code
				if(document.frmOrder.txtZipCodeB.value == "")
				{
					if(eText != "")
					{
						eText = eText + ", and Billing Zip Code";
					}
					else
					{
						eText = "Billing Zip Code";
					}
					
					e = 1;
				}
				
				// valid zip code billing......................
				
				
				if(document.frmOrder.txtCountryB.value == "US")
				{
				
					if(!IsNumericZip(document.frmOrder.txtZipCodeB.value))
					{
						if(eText != "")
						{
							eText = eText + ", and Valid Billing Zip Code";
						}
						else
						{
							eText = "Valid Billing Zip Code";
						}
						
						e = 1;
					}
					else
					{
						if(document.frmOrder.txtZipCodeB.value.length < 5 && document.frmOrder.txtZipCodeB.value != "")
						{
							if(eText != "")
							{
								eText = eText + ", and Valid Billing Zip Code";
							}
							else
							{
								eText = "Valid Billing Zip Code";
							}
							
							e = 1;
						}
					}
					
				}
				
				
			}// end if same address checked

			
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

// this code hides and shows content on the page like the check ordering info...
	function visible(content)
	{
	  if (document.getElementById(content).style.display == "none") {
		document.getElementById(content).style.display = "";
		return true;
	  } else {
		document.getElementById(content).style.display = "none";
		return true;
	  }
	}
	
	// this code hides and shows content on the page like the check ordering info...
	function visible_shipping(content)
	{
	  if(document.frmOrder.txtCountry.value == "US")
	  {
	  	document.getElementById(content).style.display = "none";
		return true;
	  }
	  else if(document.frmOrder.txtCountry.value == "")
	  {
	  	document.getElementById(content).style.display = "none";
		return true;
	  }
	  else(document.frmOrder.txtCountry.value == "")
	  {
	  	document.getElementById(content).style.display = "";
		return true;
	  }
	}
	
	// this code hides and shows content on the page like the check ordering info...
	function visible_state(content)
	{
	  if(document.frmOrder.txtState.value == "ZZ")
	  {
	  	document.getElementById(content).style.display = "";
		return true;
	  }
	  else
	  {
	  	document.getElementById(content).style.display = "none";
		return true;
	  }
	}
	
	// this code hides and shows content on the page like the check ordering info...
	function visible_stateB(content)
	{
	  if(document.frmOrder.txtStateB.value == "ZZ")
	  {
	  	document.getElementById(content).style.display = "";
		return true;
	  }
	  else
	  {
	  	document.getElementById(content).style.display = "none";
		return true;
	  }
	}//-->
</script>

<? 


	# link to DB for page calls to it.
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");


$Country = 225; ?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Pre-Order
      for <font color="#CC0000">The Silent Timer&#8482; for the LSAT including
      Bonus Timer </font></strong></font></p>
<table width="184" border="0" align="right" cellpadding="1" cellspacing="0">
  <tr>
    <td width="30" valign="middle"><div align="center"><font face="Arial, Helvetica, sans-serif"><img src="pics/ssl_lock.gif" width="16" height="17" border="0">&nbsp;</font> </div></td>
    <td width="150" valign="middle"><div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('secureorder.php','SecureOrder','scrollbars=yes,width=450,height=300')">Secure
              Form</a></strong></font></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Due to the LSAC's
        restrictive rules regarding the use of multifunction timers on test day,
        all future LSAT timer boxes will be including a free bonus</font><font size="2" face="Arial, Helvetica, sans-serif">timer.
        The bonus timer is a simple, count down and count up timer. It's great
    for test day and as a backup. </font>
        <p><font size="2" face="Arial, Helvetica, sans-serif">These new timers
            will not be available until late August 2006. Placing yourself on
            the pre-order list will ensure that you are one of the first to receive
            the new product. Let us know if you have any questions.</font></p>
        <p><font size="2" face="Arial, Helvetica, sans-serif">Your credit card
            information IS NOT taken at this point, and filling out this form
            does not obligate you to purchase. You will be notified via e-mail
            when the new products arrive, and then you'll return to the web site
    to complete your order. </font></p></td>
    <td><div align="center"><img src="pics/BonusTimer.jpg" alt="Free Bonus Timer included!" width="126" height="120"><br>
        <font size="2" face="Arial, Helvetica, sans-serif"><b>Bonus Timer</b></font>    </div></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Please enter
            your information  below. Fields marked with <font color="#FF0000">*</font> are
required.</strong></font></p>
<form action="" method="post" name="frmOrder" id="frmOrder" onSubmit="return CheckOrder();">
  
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000099">
    <tr>
      <td align="left" valign="top"> 
         <table width="100%" border="0" cellspacing="0" cellpadding="4">
		<tr><td bgcolor="#000099"><p><strong><font size="3" face="Arial, Helvetica, sans-serif" color="#FFFFFF">Customer  Information</font></strong></p></td></tr>
          <tr align="left" valign="top"> 
            <td> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>First
                        Name <font color="#FF0000">*</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                    <input name="txtFirstName" tabindex="1" type="text" id="txtFirstName2" size="20" value="<? echo addQuote($FirstName);?>">
                    <font color="666666"><strong>Put middle initials (optional)
                  after first name. </strong></font></font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Last 
                    Name </font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">*</font></strong><br>
                    <input name="txtLastName" tabindex="2" type="text" id="txtLastName3" value="<? echo addQuote($LastName);?>">
                  </font></td>
                </tr>
              </table>
              
            </td>
          </tr>
          <tr align="left" valign="top"> 
            <td> <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                <tr align="left" valign="top"> 
                  <td width="28%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>City 
                    </strong></font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><br>
                    <input name="txtCity" tabindex="5" type="text" id="txtCity" size="15" value="<? echo addQuote($City);?>">
                  </font></td>
                  <td width="32%"> <font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State 
                      </strong><br>
                      <select name="txtState" tabindex="6" class="text" onChange="visible_state('state_other'); country_change() ">
                        <option value = "" selected>Please Select</option>
                        <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT State, Name
								FROM tblState WHERE Active = 'y'
								ORDER BY Name";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
                        <option value="<? echo $row[State];?>" <? if($row[State] == $State){echo "selected";}?>><? echo $row[Name];?></option>
                        <?
						}
					?>
                        <option value = "ZZ" <? if($State == "ZZ"){echo "selected";}?>>Other</option>
                      </select>
                      </font>
                    <div style=" <? if($State == "ZZ"){echo "display:";}else{echo "display:none";} ?>" id = "state_other"> 
                      <p><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Enter 
                        State </strong></font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong></font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><br>
                        <input name="txtState_Other" tabindex="7" type="text" id="txtState_Other" size="15" value="<? echo $State_Other;?>">
                      </font></p>
                    </div></td>
                  <td width="40%">&nbsp; </td>
                </tr>
              </table></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                  <td align="left" valign="top"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Country 
                    </strong></font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                    </strong> 
                    <select name="txtCountry" tabindex="9" class="text" id="txtCountry" onChange="country_change2()">
                      <option value = "" selected>Please Select</option>
                      <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT *
								FROM tblShipLocation 
								WHERE Active = 'y' AND LocationID != 242 AND LocationID != 243
								ORDER BY Name";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
                      <option value="<? echo $row[LocationID];?>" <? if($row[LocationID] == $Country){echo "selected";}?>><? echo $row[Name];?></option>
                      <?
						}
					?>
                    </select> 
                    <font color="#999999">(Residents of AK, GU, HI, MH, MP, PW,
                    PR, and VI, select &quot;United
                  States Offshore&quot;.)</font></font></td>
                </tr>
              </table></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Phone
                  Number</strong> </font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtPhone" tabindex="10" type="text" id="txtPhone" size="16" maxlength="20" value="<? echo $Phone;?>">
              <font color="#999999">(XXX-XXX-XXXX). Include country 
            code if outside US</font></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Email 
              Address <font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">*</font></font></strong><br>
              <input name="txtEmail" tabindex="11" type="text" id="txtOrderEmail3" size="25" maxlength="50" value="<? echo $Email;?>">
</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font> <font color="#999999" size="2" face="Arial, Helvetica, sans-serif">The
notification will be sent via e-mail, so please add &quot;info@silenttimer.com&quot; to
your e-mail safe list.</font></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000099">
    <tr>
      <td align="left" valign="top">&nbsp;      </td>
    </tr>
  </table> 
    <table width="100%"  border="0" cellpadding="4" cellspacing="0">
      <tr bordercolor="#000099">
        <td align="left" valign="top" bgcolor="#000099"><p><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong> Your
                Information</strong></font></p></td>
      </tr>
      <tr bordercolor="#000099">
        <td><table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr align="left" valign="top">
              <td><font size="2" face="Arial, Helvetica, sans-serif">Which test
                  will you be taking? <strong><font color="#FF0000">*</font></strong><br>
                            <select name="TestID" tabindex="13" id="TestID">
                              <option value="" selected>Test</option>
                              <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql = "SELECT * FROM tblTests WHERE Status = 'active' ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot execute query!");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                     <option value="<? echo $row[TestID]; ?>" <? if($row[TestID] == $TestID){echo "selected";}?>><? echo $row[Name]; ?></option>
                              <?
					}
				?>
                            </select>
              </font></td>
            </tr>
            <tr align="left" valign="top">
              <td><p><font size="2" face="Arial, Helvetica, sans-serif">When
                    is your test date? <strong><font color="#FF0000">*</font></strong><br>
                <SCRIPT LANGUAGE="JavaScript">
				var now = new Date();
				var calendar = new CalendarPopup("calendarDiv");
			                </SCRIPT>
                <a name="calendarPosition" id="calendarPosition"> </a>
                <? 
			 	 	#split up year, month, and day into seperate variables...
			  		
					/* $TestDate = explode("-",$TestDate);
					
					$TestMonth = $TestDate[1];
					$TestDay = $TestDate[2];
					$TestYear = $TestDate[0]; */
			  
			  ?>
                <select name="TestMonth" tabindex="14" id="select2">
                  <? $month = date("m"); ?>
                  <option value = "" selected>Month</option>
                  <option value="01" <? if($TestMonth == "01"){echo "selected";}?>>January</option>
                  <option value="02" <? if($TestMonth == "02"){echo "selected";}?>>February</option>
                  <option value="03" <? if($TestMonth == "03"){echo "selected";}?>>March</option>
                  <option value="04" <? if($TestMonth == "04"){echo "selected";}?>>April</option>
                  <option value="05" <? if($TestMonth == "05"){echo "selected";}?>>May</option>
                  <option value="06" <? if($TestMonth == "06"){echo "selected";}?>>June</option>
                  <option value="07" <? if($TestMonth == "07"){echo "selected";}?>>July</option>
                  <option value="08" <? if($TestMonth == "08"){echo "selected";}?>>August</option>
                  <option value="09" <? if($TestMonth == "09"){echo "selected";}?>>September</option>
                  <option value="10" <? if($TestMonth == "10"){echo "selected";}?>>October</option>
                  <option value="11" <? if($TestMonth == "11"){echo "selected";}?>>November</option>
                  <option value="12" <? if($TestMonth == "12"){echo "selected";}?>>December</option>
                </select>
                <select name="TestDay" tabindex="15" id="select3">
                  <option value = "" selected>Day</option>
                  <? $day = date("d"); ?>
                  <?
					  //loop out 31 days
					  $x = 1;
					  while ($x <= 31)
					  {	
					  ?>
                  <option value="<? echo $x; ?>" <? if($x == $TestDay){echo "selected";}?>><? echo $x; ?></option>
                  <? 
							$x = $x + 1;
					  } 
					  ?>
                </select>
                <select name="TestYear" tabindex="16" id="select4">
                  <option value = "" selected>Year</option>
                  <? $year = date("Y"); 
               	 		$year2 = date("y"); ?>
                  <option value="<? echo $year; ?>" ><? echo $year; ?></option>
                  <?
			  //this year plus 15 years... go into a loop.
			  $x = 1;
			  while ($x <= 5)
			  {
			  		$year = $year + 1;
					$year2 = $year2 + 1;	
		      ?>
                  <option value="<? echo $year; ?>" <? if ( $year == $TestYear) { echo "selected";} ?>><? echo $year; ?></option>
                  <? 
		  	  		$x = $x + 1;
			  } 
		      ?>
                </select> 
                <font color="#FF0000"><b>OR</b></font>                
                <input name="chkTestDate" type="checkbox" id="chkTestDate" value="y"> 
                Test Date Unknown</font></p>
              </td>
            </tr>
          </table></td>
      </tr>
    </table>
  <p><br>
    <input type="Submit" tabindex="23" name="Submit" value="Place Pre-Order">
  </p>
</form>
<?
	mysql_close($link);
?>


<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenublank.php";

?>