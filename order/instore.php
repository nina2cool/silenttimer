<?

//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

$PageTitle = "Ordering In-Store";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has http variable in it to populate links on page.
require "../include/url.php";

// --- *****
			// Grab all variables from order page and display for user.
				
				$ShipCostID = $_POST['ShipCostID'];
		   
			// -- Shipping Address Info -- ##
		
				$FirstName = Capitalize(strtolower(escapeQuote($_POST['txtFirstName'])));
				$LastName = Capitalize(strtolower(escapeQuote($_POST['txtLastName'])));
				$Address = Capitalize(strtolower(escapeQuote($_POST['txtAddress'])));
				$Address2 = Capitalize(strtolower(escapeQuote($_POST['txtAddress2'])));
				$City = Capitalize(strtolower(escapeQuote($_POST['txtCity'])));
				$State = $_POST['txtState'];
				$State_Other = Capitalize(strtolower(escapeQuote($_POST['txtState_Other'])));
				$ZipCode = escapeQuote($_POST['txtZipCode']);
				
				$Country = $_POST['txtCountry'];
				
				$Phone = $_POST['txtPhone'];
				$Email = $_POST['txtEmail'];
				$Foreign = $_POST['ckForeignShipping'];
				$Military = $_POST['ckMilitary'];
				$POBox = $_POST['ckPOBox'];
		   
			// -- Billing Address Info -- ##
				$Same = $_POST['chkSame'];
				
				$FirstNameB = Capitalize(strtolower(escapeQuote($_POST['txtFirstNameB'])));
				$LastNameB = Capitalize(strtolower(escapeQuote($_POST['txtLastNameB'])));
				$AddressB = Capitalize(strtolower(escapeQuote($_POST['txtAddressB'])));
				$CityB = Capitalize(strtolower(escapeQuote($_POST['txtCityB'])));
				$StateB = $_POST['txtStateB'];
				$State_OtherB = Capitalize(strtolower(escapeQuote($_POST['txtState_OtherB'])));
				$ZipCodeB = $_POST['txtZipCodeB'];
				$CountryB = $_POST['txtCountryB'];
		   
			// -- credit card info -- ##
				$CardType = $_POST['cboCardType'];
				$CreditCardNo = $_POST['txtCreditCardNo'];
				$ExpMonth = $_POST['cboExpMonth'];
				$ExpYear = $_POST['cboExpYear'];
				$CVV2 = $_POST['txtCVV2'];
				
			// -- check info -- ##
				$isCheck = $_POST['chkCheckPay'];
				$BankName = $_POST['txtBankName'];
				$AccountType = $_POST['AccountType'];
				$CheckRouting = $_POST['txtCheckRouting'];
				$CheckAccount = $_POST['txtCheckAccount'];
				$CheckNumber = $_POST['txtCheckNumber'];
		
			// -- personal info -- ##
				$Test = $_POST['cboTest'];
				$TestDate = $_POST['txtTestDate'];
				$TestMonth = $_POST['TestMonth'];
				$TestDay = $_POST['TestDay'];
				$TestYear = $_POST['TestYear'];
				$School = $_POST['txtSchool'];
				$PrepClass = escapeQuote($_POST['txtPrepClass']);
				$PrepClass2 = $_POST['txtPrepClass2'];
				$ReferredBy = $_POST['cboReferredBy'];
				
				$PromotionID = $_POST['txtPromotion'];
				$OfficeCode = $_POST['txtOfficeCode'];
				
				$Contract = $_POST['Contract'];
			
# ------------------------------------------------------------------------------------------------------------
#  Check for Affiliate Custom Order Configurations.  If they have their account set up this way, then put their
#  page around the order page, and alter page properties to make it look good and work flawlessly...
# ------------------------------------------------------------------------------------------------------------

	$affiliateID = $_GET['a'];
	
	# in case a form is used to POST
	if($affiliateID == "")
	{
		$affiliateID = $_POST['a'];
	}

	# Check to see if this affiliate has provided their code for the page...
	
	if($affiliateID != "")
	{		
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		$sql = "SELECT TopCode, BottomCode FROM tblAffCustomPage INNER JOIN tblAffiliate 
				ON tblAffCustomPage.AffiliateID = tblAffiliate.AffiliateID 
				WHERE tblAffCustomPage.AffiliateID = '$affiliateID' AND tblAffiliate.Custom = 'y'";
				
		$result = mysql_query($sql) or die("Cannot pull custom order code.  Please try again.");
						
		while($row = mysql_fetch_array($result))
		{
			$Custom = "yes";
			$TopCode = $row[TopCode];
			$BottomCode = $row[BottomCode];
		}
		
		mysql_close($link);
	}

# ------------------------------------------------------------------------------------------------------------
#  END check Affiliate info...
# ------------------------------------------------------------------------------------------------------------





//only require this if the affiliate doesn't have a custom order page...
if($Custom == "yes")
{
	# put a special top header to track clicks here...
	require "include/headertopcustom.php";
	
	# put custom page info around our order page...
	echo $TopCode;
	
	# put code for calendar pop up...
	require "include/headertopcustomJS.php";
}
else
{
	// has top header in it.
	require "include/headertop.php";

	// has top menu for this page in it, you can change these links in this folders include folder.
	require "../include/topmenu.php";
	
	// has bottom header in it, ths goes under the top menu for this page.
	require "include/headerbottom2.php";
	
	require "../code/class.phpmailer.php";
}

# link to DB for page calls to it.
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

# -----------------------------------------------------
		# SEND and email with ALL data to our email address...
		# -----------------------------------------------------
		
		$mail = new PHPMailer();
			
		$mail->From = "$Email";
		$mail->FromName = "Retail Store";
		$mail->AddAddress("info@silenttimer.com", "Silent Technology");
		#$mail->AddAddress("metzler_jessica@yahoo.com", "Jessica Metzler");
		$mail->AddAddress("erik@silenttimer.com", "Erik McMillan");
		$mail->IsHTML(false);
		$mail->Subject = "$FirstName $LastName decided to order in-store.";
		
		$DetailedEmail =
		"
		Order Details ----------------------------
		";
		for($i=0; $i < count($ShoppingCart); $i++)
			{
				
				if($ShoppingCart[$i][0] != "")
				{				
					# get current product from the cart...
					$ProductID = $ShoppingCart[$i][0];
					$Num_Ordered = $ShoppingCart[$i][1];
										
					# Get all information from table for this part number ID
					$sql = "SELECT * FROM tblProduct WHERE ProductID='$ProductID'";
					$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
	
					while($row = mysql_fetch_array($result))
					{
						
						$RetailPrice = number_format($row[RetailPrice],2);
						$ProductTotal = $RetailPrice*$Num_Ordered;
						$ProductTotal = number_format($ProductTotal, 2);
						$Description = $row[Description];
						$ProductName = $row[ProductName];
						
					# end while	
					}
		$DetailedEmail .= "
		Product: $ProductName  
		Number Ordered: $Num_Ordered					
		Price: $$RetailPrice					
		Product Total: $$ProductTotal
		
		";
					
				#end if	
				}
					
			#end for		
			}
		
		
		
		
		$DetailedEmail .= 
		"		
		Shipping Information --------------------
		
		$FirstName $LastName
		$Address $Address2
		$City, $State $ZipCode
		$CountryName
		
		Phone:             $Phone
		Email:             $Email
		
		Billing Information ---------------------
		
		$FirstNameB $LastNameB
		$AddressB
		$CityB, $StateB $ZipCodeB
		$CountryNameB		";
		
			$mail->Body = $DetailedEmail;
			
			if(!$mail->Send())
			{
			   echo "Email receipt could not be sent to support team.<p>";
			   echo "Mailer Error: " . $mail->ErrorInfo;
			   exit;
			}


?>

<? 

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
	
	
	# link to DB for page calls to it.
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
?>
<p>&nbsp;</p>
<p><font face="Arial, Helvetica, sans-serif" size="2"><strong><font color="#000000" size="3">Thank you for your
    purchase!</font></strong>  Please continue to browse our site. <a href="../index.php">Click Here</a>.</font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

if($Custom == "yes")
{
	# put custom page info around our order page...
	echo $BottomCode;
	
}
else
{
// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenublank.php";
}
mysql_close($link);
?>