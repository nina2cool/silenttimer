<?
//security for page
session_start();

$PageTitle = "The Silent Timer - Order Confirmation";

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";




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


# ------------------------------------------------------------------------------------------------------------
#  ZIP CODE STORE LOOK UP!
#  If person's shipping Zipcode is within 20 miles of a retail location... show them the stores!
# ------------------------------------------------------------------------------------------------------------
	$Radius = 20;



	if($_POST['ContinueOrder'] == "Continue Order Online")
	{
		$OrderOnline = "y";
	}

	if($OrderOnline != "y" AND $_POST['PickUp'] != "I Will Pick One Up")
	{
		$StoreClose = "n";
	
		$zipOne = $_POST['txtZipCode'];
	
		include_once ("include/db_mysql.inc");
		include_once ("include/phpZipLocator.php");
		
		$db = new db_sql;
		$zipLoc = new zipLocator;
		$radius = $Radius;
		
		$zipArray = $zipLoc->inradius($zipOne,$radius);
	
		#echo "hello world<br><br>";
		
		require "../include/dbinfo.php";
	
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		#echo "hello world<br><br>";
		
		for($i=1;$i < count($zipArray);$i++)
		{
			$sql = "SELECT * FROM tblBusinessCustomer WHERE ZipCode= '$zipArray[$i]' AND CustomerType = 'Bookstore'";
			$result = mysql_query($sql) or die("Cannot pull Store Locations.  Please try again.");		
			while($row = mysql_fetch_array($result))
			{
				$StoreClose = "y";
			}
		}
		
		mysql_close($link);
		
	}
	
	
	if($_POST['PickUp'] == "I Will Pick One Up")
	{
		# This person is going to pick a timer up in a store!  So, that is awsome too!
		# Send an email to them thanking them for visiting and to come back any time.
		# Send us an email as well telling us this person's information so we can contact them if we want.  
		# Plus we will know what store they went to!
		
		# Send them to the Thank you page!
		
		
		// --- *****
		// Grab all variables from order page and display for user.
			$Num = $_POST['cboNum'];
			$ShippingOption = $_POST['cboShippingOption'];
	   
		// -- Shipping Address Info -- ##
	
			$FirstName = Capitalize(strtolower(escapeQuote($_POST['txtFirstName'])));
			$LastName = Capitalize(strtolower(escapeQuote($_POST['txtLastName'])));
			$Address = Capitalize(strtolower(escapeQuote($_POST['txtAddress'])));
			$Address2 = Capitalize(strtolower(escapeQuote($_POST['txtAddress2'])));
			$City = Capitalize(strtolower(escapeQuote($_POST['txtCity'])));
			$State = $_POST['txtState'];
			$State_Other = Capitalize(strtolower(escapeQuote($_POST['txtState_Other'])));
			$ZipCode = $_POST['txtZipCode'];
			$Country = $_POST['txtCountry'];
			$ForeignShipping = $_POST['ForeignShipping'];
			
			$Phone = $_POST['txtPhone'];
			$Email = $_POST['txtEmail'];
	   
		// -- Billing Address Info -- ##
			$Same = $_POST['chkSame'];
			if($Same != "y") {$Same = "n";}
			
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
			$TestDate = $_POST['TestYear'] ."-". $_POST['TestMonth'] ."-". $_POST['TestDay'];
			$School = escapeQuote($_POST['txtSchool']);
			$PrepClass = escapeQuote($_POST['txtPrepClass']);
			$ReferredBy = $_POST['cboReferredBy'];
			
			$PromotionID = $_POST['txtPromotion'];
			$OfficeCode = $_POST['txtOfficeCode'];
			
			$Contract = $_POST['chkContract'];
			if($Contract != "y") {$Contract = "n";}
			
			# get shipping info just in case...
			$ShipButton = $_POST['ShipButton'];
			$PickupChoice = $_POST['RadioShip'];
		
		
		require "../code/class.phpmailer.php";
		
		$mail = new PHPMailer();
		
		
		$mail->From = "info@silenttimer.com";
		$mail->FromName = "Silent Technology LLC";
		$mail->AddAddress("$Email", "$FirstName $LastName");
		$mail->AddBCC("info@silenttimer.com", "Silent Timer Retail");
		$mail->AddBCC("nina@silenttimer.com", "Silent Timer Retail");
		#$mail->AddAttachment("Guide/Time Management Guide.pdf");
		$mail->IsHTML(false);
		$mail->Subject = "The Silent Timer";


////// - EMAIL
$email=
"$FirstName,

Thank you for visiting our website!  You selected to buy your Silent Timer at one of the following locations:
";

		$zipOne = $_POST['txtZipCode'];
	
		include_once ("include/db_mysql.inc");
		include_once ("include/phpZipLocator.php");
		
		$db = new db_sql;
		$zipLoc = new zipLocator;
		$radius = $Radius;
		
		$zipArray = $zipLoc->inradius($zipOne,$radius);
		
		require "../include/dbinfo.php";
	
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		# get test name for this test ID
		$sql = "SELECT * FROM tblTests WHERE TestID = '$Test'";
		$result = mysql_query($sql) or die("Cannot get test name");
						
		while($row = mysql_fetch_array($result))
		{
			$TestName = $row[Name];
		}
		
		if($TestName == ""){$TestName = "test";}
		
		for($i=1;$i < count($zipArray);$i++)
		{
			$sql = "SELECT * FROM tblBusinessCustomer WHERE ZipCode= '$zipArray[$i]' AND CustomerType = 'Bookstore'";
			$result = mysql_query($sql) or die("Cannot pull Store Locations.  Please try again.");		
			while($row = mysql_fetch_array($result))
			{
				
				$NameS = $row[Name];
				$AddressS = $row[Address];
				$Address2S = $row[Address2];
				$Address3S = $row[Address3];
				$CityS = $row[City];
				$StateS = $row[State];
				$ZipCodeS = $row[ZipCode];
				$PhoneS = $row[Phone1];
				$WebsiteS = $row[Website];
				
				$db = new db_sql;
				$zipDistance = new zipLocator;
				
				$distance = number_format($zipDistance->distance($zipOne,$ZipCodeS),2);
				
				if($distance == 0)
				{
					$distance = 0;
				}

$emailPlace .=
"
$NameS
$AddressS";

if($Address2S!=""){
$emailPlace .=
"
$Address2S";}

if($Address3S!=""){
$emailPlace .=
"
$Address3S";}

$emailPlace .=
"
$CityS, $StateS $ZipCodeS
$PhoneS

$distance miles away from you

";
	
			}
		}


$email .= $emailPlace;

$email .=
"
If you decide you would like to get your timer online instead, please do not hesitate to visit us again!

Click here: https://secure.silenttimer.com/order/ 

We guarantee you'll increase your chances for a higher score with your new timer!  Please let us know how you like it! Good luck studying for your $TestName.

Thanks again,

The Silent Timer Team
http://www.SilentTimer.com
info@silenttimer.com
800-552-0325



";	
		
		
		$mail->Body = $email;
		
		if(!$mail->Send())
		{
		   echo "Email receipt could not be sent.<p>";
		   echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}
		
		
		
		
		
		
		# SEND EMAIL TO US so we know all their information!!!!
		
		$mail = new PHPMailer();
		
		$mail->From = "$Email";
		$mail->FromName = "$FirstName $LastName";
		$mail->AddAddress("info@silenttimer.com", "Silent Timer Retail");
		$mail->AddBCC("nina@silenttimer.com", "Silent Timer Retail");
		$mail->IsHTML(false);
		$mail->Subject = "Retail Silent Timer Buy: $FirstName $LastName";


////// - EMAIL
$email=
"$emailPlace

Order Details ----------------------------

Shipping:          $ShippingName
Number Ordered:    $Num

Promotion Details -----------------------

PromotionID:       $PromotionID
Promotion Notes:   $promoNotes

Personal Information --------------------

Test Name:         $TestName
Test Date:         $TestDate
School:            $School
Prep Class:        $PrepClass
Referred By:       $ReferredBy

Shipping Information --------------------

$FirstName $LastName
$Address
$City, $State $ZipCode

Phone:             $Phone
Email:             $Email

Billing Information ---------------------

$FirstNameB $LastNameB
$AddressB
$CityB, $StateB $ZipCodeB

CREDIT Information ----------------------

Card Type:         $CardType
Epiration Date:    $ExpMonth / $ExpYear

Sign Contract?     $Contract

CHECK Information ----------------------

Paid By Check?:    $isCheck
Bank Name:         $BankName

Sign Contract?     $Contract
";	
		
		
		$mail->Body = $email;
		
		if(!$mail->Send())
		{
		   echo "Email receipt could not be sent.<p>";
		   echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}
		
		
	# send them home
	$goto = "http://www.silenttimer.com/";
	header("location: $goto");
	
	}
	
# ------------------------------------------------------------------------------------------------------------
#  END check Store Locations
# ------------------------------------------------------------------------------------------------------------






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

	if($OrderOnline != "y" AND $_POST['PickUp'] != "I Will Pick One Up")
	{
		// if not coming from the order page... send them back to order page...
		if ($_POST['Order'] != "Order Timer" and $_POST['ShipButton'] != "Next")
		{
			$goto = "index.php";
			if($Custom== "yes"){$goto.="?a=$affiliateID";}
			header("location: $goto");
		}
	}



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
	require "include/headerbottom.php";
}

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<script>
	
	function lockButton(buttonValue)
	{
		if (buttonValue == "Complete Order")
		{
			document.frmOrder.Confirm.value = "Processing, Please Wait";
			return true;
			//alert(document.frmOrder.Order.value);
		}
		else
		{
			alert ("Credit transaction in progress...");
			return false;
		}
	}


</script>
<?

	# --------------------------------------------------------------------------------------------
	#   Function to insert back slashes into characters with a single or a double quote in them.
	# --------------------------------------------------------------------------------------------
	function escapeQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("\'","||",$var);
			$string = str_replace('\"','||||',$string);
		}

		return $string;
	}

	function addQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("||","'",$var);
			$string = str_replace('||||','"',$string);
		}

		return $string;
	}
	
	# --------------------------------------------------------------------------------------------	
		
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		$sql = "SELECT NumInStock, Price FROM tblProduct WHERE ProductID = 1;";
		$result = mysql_query($sql) or die("Cannot obtain product information.");
						
		while($row = mysql_fetch_array($result))
		{
			$number = $row[NumInStock];
			$price = $row[Price];
		}
		
		//if there are no timers left to sell, then don't let any more be ordered...send to SORRY PAGE.
		if ($number == 0)
		{
			echo "<meta http-equiv='refresh' content='0;URL=outofstock.php'>";
		}
		
		
		// --- *****
		// Grab all variables from order page and display for user.
			$Num = $_POST['cboNum'];
			$ShippingOption = $_POST['cboShippingOption'];
	   
		// -- Shipping Address Info -- ##
	
			$FirstName = Capitalize(strtolower(escapeQuote($_POST['txtFirstName'])));
			$LastName = Capitalize(strtolower(escapeQuote($_POST['txtLastName'])));
			$Address = Capitalize(strtolower(escapeQuote($_POST['txtAddress'])));
			$Address2 = Capitalize(strtolower(escapeQuote($_POST['txtAddress2'])));
			$City = Capitalize(strtolower(escapeQuote($_POST['txtCity'])));
			$State = $_POST['txtState'];
			$State_Other = Capitalize(strtolower(escapeQuote($_POST['txtState_Other'])));
			$ZipCode = $_POST['txtZipCode'];
			$Country = $_POST['txtCountry'];
			$ForeignShipping = $_POST['ForeignShipping'];
			$Phone = $_POST['txtPhone'];
			$Email = $_POST['txtEmail'];
	   
		// -- Billing Address Info -- ##
			$Same = $_POST['chkSame'];
			if($Same != "y") {$Same = "n";}
			
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
			$TestDate = $_POST['TestYear'] ."-". $_POST['TestMonth'] ."-". $_POST['TestDay'];
			$School = escapeQuote($_POST['txtSchool']);
			$PrepClass = escapeQuote($_POST['txtPrepClass']);
			$ReferredBy = $_POST['cboReferredBy'];
			
			$PromotionID = $_POST['txtPromotion'];
			$OfficeCode = $_POST['txtOfficeCode'];
			
			$Contract = $_POST['chkContract'];
			if($Contract != "y") {$Contract = "n";}
			
			# get shipping info just in case...
			$ShipButton = $_POST['ShipButton'];
			$PickupChoice = $_POST['RadioShip'];

		
		// ------------------------------------------------------------------------ #
		#         Error Checking          ----------------------------------------- #
		// ------------------------------------------------------------------------ #
		
		//set error variable equal to 0
			$e = 0;
		
		// -- Shipping Address Info -- ##
		 
			if($FirstName == "")
			{
				$e = 1;	
				$eFN = 1;
			}
			
			if($LastName == "")
			{
				$e = 1;	
				$eLN = 1;
			}
			
			// if office code is empty, then check shipping address info...
			if($OfficeCode == "")
			{
			
				if($Address == "")
				{
					$e = 1;	
					$eA = 1;
				}
				
				if($City == "")
				{
					$e = 1;
					$eC = 1;
				}
				
				if($State == "")
				{
					$e = 1;
					$eST = 1;
				}
				
				if($ZipCode == "")
				{
					$e = 1;
					$eZ = 1;
				}
			} // end of office code check for shipping address
			
			
			if($Phone == "")
			{
				$e = 1;
				$eP = 1;
			}
			
			if($Email == "")
			{
				$e = 1;
				$eE = 1;
			}
		
		
		// -- Billing Address Info -- ##
		
			// if billing address is different from shipping...
			if($Same == "n")
			{
				
				if($FirstNameB == "")
				{
					$e = 1;	
					$eFNb = 1;
				}
				
				if($LastNameB == "")
				{
					$e = 1;	
					$eLNb = 1;
				}
				
				if($AddressB == "")
				{
					$e = 1;	
					$eAb = 1;
				}
				
				if($CityB == "")
				{
					$e = 1;
					$eCb = 1;
				}
				
				if($StateB == "")
				{
					$e = 1;
					$eSTb = 1;
				}
				
				if($ZipCodeB == "")
				{
					$e = 1;
					$eZb = 1;
				}
				
			}
		
		//Payment Information
		
			# - if using a check, then don't check for credit card shit...
		
		
		if($isCheck !="y")
		{
		
			
			// -- credit card info -- ##
			
			if($CardType == "0")
			{
				$e = 1;	
				$eCardType = 1;
			}
		
			if($CreditCardNo == "")
			{
				$e = 1;	
				$eCardNo = 1;
			}
			
			
			// Experation Date Check
			
			$month = date("m");
			$year = date("y");
			
			if (intval($ExpYear) < intval($year))
			{
				$e = 1;	
				$eExp = 1;
			}
			else
			{
				
				if (intval($ExpYear) == intval($year))
				{	
					if (intval($ExpMonth) < intval($month))
					{
						$e = 1;	
						$eExp = 1;
					}
					
				}
			
			}
		
			if($CVV2 == "")
			{
				$e = 1;	
				$eCVV2 = 1;
			}
			
		} // end "is it a check"
		
		
		
		// Contract signed Check
		
			if($Contract == "n")
			{
				$e = 1;	
				$eContract = 1;
			}
			
		
		# ------------------------------------------------------------------------ #
		# / end    Error Checking         ---------------------------------------- #
		# ------------------------------------------------------------------------ #
		
		
		
	//if no errors...move on....
	if ($e == 0)
	{
		
		// If there are enough timers in stock to purchase order, go ahead with it!!!	
		if ($number > $Num)
		{	
		
			# get billing country name.
			$sql = "SELECT * FROM tblCountry WHERE ISO = '$CountryB'";
			$result = mysql_query($sql) or die("Cannot obtain billing country, please try again.");
			while($row = mysql_fetch_array($result))
			{
				$CountryNameB = $row[Name];
			}
		
		
			# ALL SHIPPING COSTS
			if($Country == "US")
			{
				// get price for shipping and handling...
				
				// build combo box for he shipping options from the database.
				// SQL to get data from shippingoption and shipper table
				$sql = "SELECT tblShippingOption.ShippingOptionID, Name, CompanyName, tblShippingCost.Cost 
						FROM tblShippingOption INNER JOIN tblShipper ON tblShippingOption.ShipperID = tblShipper.ShipperID 
						INNER JOIN tblShippingCost ON tblShippingCost.ShippingOptionID=tblShippingOption.ShippingOptionID 
						WHERE tblShippingCost.ShippingOptionID = '$ShippingOption' AND Number = '$Num'";
				//put SQL statement into result set for loop through records
				$result = mysql_query($sql) or die("Cannot obtain shipping information, please try again.");
				
				while($row = mysql_fetch_array($result))
				{
					$ShippingCompany = $row[CompanyName];
					$ShippingName = $row[Name];
					$ShippingCost = $row[Cost];
				}
			}
			else
			{
				# if shipment going outside of US, look up costs for this country.
				$sql = "SELECT * FROM tblCountry WHERE ISO = '$Country'";
				//put SQL statement into result set for loop through records
				$result = mysql_query($sql) or die("Cannot obtain shipping information, please try again.");
				
				while($row = mysql_fetch_array($result))
				{
					$CountryName = $row[Name];
					$USPS_Cost = $row[USPS_Cost];
					$USPS2 = $row[USPS2];
					$USPS3 = $row[USPS3];
					$USPS4 = $row[USPS4];
					$USPS5 = $row[USPS5];
					$USPS6 = $row[USPS6];
					$DHL_Cost = $row[DHL_Cost];
					$DHL2 = $row[DHL2];
					$DHL3 = $row[DHL3];
					$DHL4 = $row[DHL4];
					$DHL5 = $row[DHL5];
					$DHL6 = $row[DHL6];
				}
				
				
				if($ForeignShipping == "USPS")
				{
					$ShippingCompany = "US Postal Service";
					$ShippingName = "4-6 days";
				
					if($Num == 1)
					{
						$ShippingCost = $USPS_Cost;
					}
					else if($Num == 2)
					{
						$ShippingCost = $USPS2;
					}
					else if($Num == 3)
					{
						$ShippingCost = $USPS3;
					}
					else if($Num == 4)
					{
						$ShippingCost = $USPS4;
					}
					else if($Num == 5)
					{
						$ShippingCost = $USPS5;
					}
					else if($Num == 6)
					{
						$ShippingCost = $USPS6;
					}
				}
				else if($ForeignShipping == "DHL")
				{
					$ShippingCompany = "DHL";
					$ShippingName = "1-2 days";
				
					if($Num == 1)
					{
						$ShippingCost = $DHL_Cost;
					}
					else if($Num == 2)
					{
						$ShippingCost = $DHL2;
					}
					else if($Num == 3)
					{
						$ShippingCost = $DHL3;
					}
					else if($Num == 4)
					{
						$ShippingCost = $DHL4;
					}
					else if($Num == 5)
					{
						$ShippingCost = $DHL5;
					}
					else if($Num == 6)
					{
						$ShippingCost = $DHL6;
					}
				}
			
			} # end calculate Foreign Shippign Information
					
			
			
			
		// get the total before taxes are added....
			$totalProduct = ($price * $Num);// + ($ShippingCost * $Num);
		
		// get tax rate from table...
		
			$sql = "SELECT * FROM tblValues WHERE Name = 'Tax'";
			//put SQL statement into result set for loop through records
			$result = mysql_query($sql) or die("Cannot get tax information, please try again.");
			
			while($row = mysql_fetch_array($result))
			{
				$TaxRate = $row[Value];
			}
		
		// if in Texas, add sales tax...	
			if ($State == "TX")
			{
				$Tax = $totalProduct * $TaxRate;
			}
			else
			{
				$Tax = 0;
			}
			
		//set Tax equal to 0.00 strong if equals zero...
			if($Tax == 0) {$Tax = "0.00";}
			
		// Get total price after taxes...
			$subTotal = $totalProduct + $Tax;
			$Total = $subTotal + $ShippingCost;	
			
		//get test for this test ID:
			
			if($Test != "")
			{
				$sql = "SELECT * FROM tblTests WHERE TestID = $Test";
				//put SQL statement into result set for loop through records
				$result = mysql_query($sql) or die("Cannot get name of your test, please try again.");
				
				while($row = mysql_fetch_array($result))
				{
					$TestName = $row[Name];
				}
			}
	
	# ------------------------------------------------------------------------------------------------
	#  Promotional Code handling
	#  
	#  Look up promotion code to see if it is valid.  If it is, find out what promotion, and take actions
	#  on cost, shipping, etc.
	# ------------------------------------------------------------------------------------------------
	
	# if the promotional code is left blank, check web site promotions...
	if($PromotionID == "")
	{
	
		# -------------------------------------------------------------------------------
		# check to see if there is a web site  promotion, if there is...discount the 
		# price and make PromoNotes
		# -------------------------------------------------------------------------------
			$now = date("Y-m-d"); # date time
			
			$sql = "SELECT * 
					FROM tblPromotionWeb 
					WHERE StartDate <= '$now' AND EndDate >= '$now'";
			$result = mysql_query($sql) or die("Cannot execute query!");
			
			while($row = mysql_fetch_array($result))
			{
				$PromoID = $row[WebPromoID];
				$PromoNote = $row[Note];
				$PromoType = $row[PromotionID];
				$PromoAmount = $row[Amount];
				$PromoMore = $row[OtherOffers];
				$WebPromotion = "yes";
			}
			
			if($PromoType == "percent" AND $PromoAmount != 0)
			{
				# person has a promotion to get a percent off of the total price... give it to them...
				$Discount = number_format($totalProduct * $PromoAmount, 2);
				$totalProduct = number_format($totalProduct - $Discount, 2);
				
				if($State == "TX")
				{
					$Tax = number_format($TaxRate * $totalProduct, 2);
				}
				else
				{
					$Tax = number_format(0,2);
				}
				
				$subTotal = number_format($totalProduct + $Tax, 2);
				$Total = number_format($subTotal + $ShippingCost, 2);
				
				$TextDiscount = $PromoAmount * 100;
				$promoNotes = "<br>$PromoNote<br>";
				
				# enter promotion into variable for entering into DB on next page:
				$PromotionID = $PromoID;
			}
			
		# -------------------------------------------------------------------------------
	}
	else
	{
		
		$now = date("Y-m-d"); # date time
		$promoNotes = "<br>";
		
		$sql = "SELECT tblPromotionCode.PromotionID, tblPromotionCode.Amount, tblPromotionCode.AffiliateID, tblPromotionCode.Local, tblPromotion.Description 
				FROM tblPromotion INNER JOIN tblPromotionCode ON tblPromotion.PromotionID = tblPromotionCode.PromotionID
				WHERE tblPromotionCode.PromotionCodeID = '$PromotionID' 
				AND tblPromotionCode.StartDate <= '$now' 
				AND tblPromotionCode.EndDate >= '$now'";
		
		//put SQL statement into result set for loop through records
		$result = mysql_query($sql) or die("Cannot get promotional information, please try again.");
		
		$i=0;
		while($row = mysql_fetch_array($result))
		{
			$promotions[$i][0] = $row[PromotionID];
			$promotions[$i][1] = $row[Amount];
			$promotions[$i][2] = $row[Description];
			$promotions[$i][3] = $row[AffiliateID];
			$promotions[$i][4] = $row[Local];
			
			$i++;
		}
	
		$numPromotions = count($promotions);
		
		
		# if promotional code is valid... go for it, if not, give error in notes.
		if($numPromotions > 0)
		{
			# there is at least one promotion, go through each case, and give discounts, etc...
			
			$i = 0;
			while($i < $numPromotions) // loop through promotions in array
			{
				# grab data from array for this discount
				$pName = $promotions[$i][0];
				$pAmount = $promotions[$i][1];
				$pDescription = $promotions[$i][2];
				$pAffiliateID = $promotions[$i][3];
				$pAffLocal = $promotions[$i][4];
				
				if($pName == 'inperson')
				{
					# no shipping is needed here.  Go ahead and take away shipping charge and all shipping data.
					# Insert code: "z" into DB for shipped
					
					$Total = $Total - $ShippingCost;
					$ShippingCost = 0;
					$ShippingOption = 4;
					$ShippingName = "No Shipment Necessary";
					
					$promoNotes .= "$pDescription<br>";
					
				}
				else if($pName == 'tax')
				{
					$subTotal = $subTotal - $Tax;
					$Total = $Total - $Tax;
					$Tax = 0;
				
					$promoNotes .= "$pDescription<br>";
					
				}
				else if($pName == 'percent')
				{
					# person has a promotion to get a percent off of the total price... give it to them...
					$Discount = number_format($totalProduct * $pAmount, 2);
					$totalProduct = number_format($totalProduct - $Discount, 2);
					
					if($State == "TX")
					{
						$Tax = number_format($TaxRate * $totalProduct, 2);
					}
					else
					{
						$Tax = number_format(0,2);
					}
					
					$subTotal = number_format($totalProduct + $Tax, 2);
					$Total = number_format($subTotal + $ShippingCost, 2);
					
					$TextDiscount = $pAmount * 100;
					$promoNotes .= "$TextDiscount% off!<br>";
				}
				else if($pName == 'affiliate')
				{
					# this Promo code belongs to an affiliate, make proper arrangements to give that person credit.
					# Store their code for the next page.
					#If they are local (y), then ask if they want to pick it up.
					
					$sql = "SELECT Approved FROM tblAffiliate WHERE AffiliateID = '$pAffiliateID'";
					$result = mysql_query($sql) or die("Cannot validate partner order, please call 512-542-9981 for assistance.");
						
					while($row = mysql_fetch_array($result))
					{
						$GoTime = $row[Approved];
					}
					
					# if affiliate is approved, then register their code for this order and give credit on next page
					if($GoTime == "y")
					{
						$PartnerBuy = $pAffiliateID;
						
						# if local...
						if($pAffLocal == "y")
						{
							$ShipChoice = "y";				
						
						}
						
						#if shipping page already done, then do extra stuff...
						if($ShipButton == "Next")
						{
							if($PickupChoice == "pickup")
							{
								# no shipping is needed here.  Go ahead and take away shipping charge and all shipping data.
								# Insert code: "p" for pickup
								
								$Total = $Total - $ShippingCost;
								$ShippingCost = 0;
								$ShippingOption = 7;
								$ShippingName = "Timer Pickup Requested. You may pick your timer up on Tuesdays or Thursdays between 2:00 and 5:00pm.  Please call
												512-542-9981 to make sure we are in the office before you come.";
								
								$promoNotes .= "No Shipping Charge<br>";
							
							} // end if they want to pick it up...
							
						} // end if shipping NEXT button is pushed...

					}
				}				
			
				$i++;
			}// end of looping through promotions	
		
		}
		else // oops, there is no promotion for this code...
		{
			$promoNotes = "Invalid Code, please try again.";
		} // end if promotion code is valid
	
	} // end of promotion code check if a code is entered...
	
	# ------------------------------------------------------------------------------------------------
	#  end of promotional code
	# ------------------------------------------------------------------------------------------------
	
	
	
	
	# ------------------------------------------------------------------------------------------------
	#  Office Code Handling
	#  
	#  Look up Office Code to make sure it is valid, get deadline as well...
	#
	# ------------------------------------------------------------------------------------------------
	
	$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$OfficeCode'";
	$result = mysql_query($sql) or die("Cannot get office information, please call 512-258-8668 for assistance.");
		
	while($row = mysql_fetch_array($result))
	{
		$oCity = $row[City];
		$oState = $row[State];
		$oCompany = $row[CompanyName];
	}
	
	if($oCity != "") // this is a correct office code!
	{
		// look up deadline for this office
		$now = date("Y-m-d");
		# - get next deadline for this office
		$sql = "SELECT Date
				FROM tblAffOfficeDeadlines 
				WHERE AffiliateID = '$OfficeCode' AND Date >= '$now'
				ORDER BY Date ASC
				LIMIT 0,1";
		$result = mysql_query($sql) or die("Cannot execute query!");
		while($row = mysql_fetch_array($result))
		{
			$newDeadline = $row[Date];
			$Deadline = substr($newDeadline,5,2) . "-" . substr($newDeadline,8,2) . "-" . substr($newDeadline,0,4);
		}
		
		
		// change shipping option to 6, class shipment...get rid of shipping charge.
		$Total = $Total - $ShippingCost;
		$ShippingCost = 0;
		$ShippingOption = 6;
		$officeNotes= "Your Silent Timer will be delivered to $oCompany in $oCity, $oState 3 or 4 business days after $Deadline.  You can pick your timer up from your front office.";
	
		# if school is in TX, charge tax...
		if($oState == "TX")
		{
			$Tax = $Total * $TaxRate;
			$subTotal = $subTotal + $Tax;
			$Total = $Total + $Tax;
		}
	
	}
	
	
	
	# ------------------------------------------------------------------------------------------------
	#  end of office code
	# ------------------------------------------------------------------------------------------------
	
	
?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>



<?
	# check to see if a store is close to them.  If so, show store selection first!
	if($StoreClose != "y"){

	#if this affiliate isn't local, or if the shipping has already been selected, then show the confirm data...
	if($ShipChoice != "y" or $ShipButton == "Next"){
?>  
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Confirm 
  Your Order</strong></font>
<p><font size="2" face="Arial, Helvetica, sans-serif">Confirm your order information 
  below. If there are any errors, please press <strong><font color="#FF0000">&quot;Go 
  Back&quot;</font></strong>, below, to fix them and try again. <strong>Click 
  <font color="#003399">&quot;Complete Order &quot;<font color="#000000"> to complete 
  your transaction</font></font><font color="#000000">. </font></strong></font></p>
<form action="index2.php<? if($Custom=="yes"){echo "?a=$affiliateID";}?>" method="post" name="frmBack2" id="frmBack2">
  <div align="left"> 
    <input name='cboNum' type='hidden' id='cboNum' value='<? echo "$Num";?>'>
    <input name='cboShippingOption' type='hidden' id='cboShippingOption3' value='<? echo "$ShippingOption";?>'>
    <!-- Shipping Address Info -->
    <input name='txtFirstName' type='hidden' id='txtFirstName' value='<? echo "$FirstName";?>'>
    <input name='txtLastName' type='hidden' id='txtLastName' value='<? echo "$LastName";?>'>
    <input name='txtAddress' type='hidden' id='txtAddress' value='<? echo "$Address";?>'>
	<input name='txtAddress2' type='hidden' id='txtAddress2' value='<? echo "$Address2";?>'>
    <input name='txtCity' type='hidden' id='txtCity' value='<? echo "$City";?>'>
    <input name='txtState' type='hidden' id='txtState' value='<? echo "$State";?>'>
	<input name='txtState_Other' type='hidden' id='txtState_Other' value='<? echo "$State_Other";?>'>
    <input name='txtZipCode' type='hidden' id='txtZipCode' value='<? echo "$ZipCode";?>'>
	<input name='txtCountry' type='hidden' id='txtCountry' value='<? echo "$Country";?>'>
	<input name='ForeignShipping' type='hidden' id='ForeignShipping' value='<? echo "$ForeignShipping";?>'>
    <input name='txtPhone' type='hidden' id='txtPhone' value='<? echo "$Phone";?>'>
    <input name='txtEmail' type='hidden' id='txtEmail' value='<? echo "$Email";?>'>
    <!-- Billing Address Info -->
    <input name='chkSame' type='hidden' id='chkSame' value='<? echo "$Same";?>'>
    <input name='txtFirstNameB' type='hidden' id='txtFirstNameB' value='<? echo "$FirstNameB";?>'>
    <input name='txtLastNameB' type='hidden' id='txtLastNameB' value='<? echo "$LastNameB";?>'>
    <input name='txtAddressB' type='hidden' id='txtAddressB' value='<? echo "$AddressB";?>'>
    <input name='txtCityB' type='hidden' id='txtCityB' value='<? echo "$CityB";?>'>
    <input name='txtStateB' type='hidden' id='txtStateB' value='<? echo "$StateB";?>'>
	<input name='txtState_OtherB' type='hidden' id='txtState_OtherB' value='<? echo "$State_OtherB";?>'>
    <input name='txtZipCodeB' type='hidden' id='txtZipCodeB' value='<? echo "$ZipCodeB";?>'>
	<input name='txtCountryB' type='hidden' id='txtCountryB' value='<? echo "$CountryB";?>'>
    <!-- credit card info -->
    <input name='cboCardType' type='hidden' id='cboCardType' value='<? echo "$CardType";?>'>
    <input name='txtCreditCardNo' type='hidden' id='txtCreditCardNo' value='<? echo "$CreditCardNo";?>'>
    <input name='cboExpMonth' type='hidden' id='cboExpMonth' value='<? echo "$ExpMonth";?>'>
    <input name='cboExpYear' type='hidden' id='cboExpYear' value='<? echo "$ExpYear";?>'>
    <input name='txtCVV2' type='hidden' id='txtCVV2' value='<? echo "$CVV2";?>'>
	<!-- check info -->
	 <input name='chkCheckPay' type='hidden' id='cboCardType' value='<? echo "$isCheck";?>'>
	 <input name='txtBankName' type='hidden' id='cboCardType' value='<? echo "$BankName";?>'>
	 <input name='AccountType' type='hidden' id='txtCreditCardNo' value='<? echo "$AccountType";?>'>
	 <input name='txtCheckRouting' type='hidden' id='cboExpMonth' value='<? echo "$CheckRouting";?>'>
	 <input name='txtCheckAccount' type='hidden' id='cboExpYear' value='<? echo "$CheckAccount";?>'>
	 <input name='txtCheckNumber' type='hidden' id='txtCVV2' value='<? echo "$CheckNumber";?>'>
    <!-- personal info -->
    <input name='cboTest' type='hidden' id='cboTest' value='<? echo "$Test";?>'>
    <input name='txtTestDate' type='hidden' id='txtTestDate' value='<? echo "$TestDate";?>'>
    <input name='txtSchool' type='hidden' id='txtSchool' value='<? echo "$School";?>'>
    <input name='txtPrepClass' type='hidden' id='txtPrepClass' value='<? echo "$PrepClass";?>'>
    <input name='cboReferredBy' type='hidden' id='cboReferredBy' value='<? echo "$ReferredBy";?>'>
	
	<input name='txtPromotion' type='hidden' id='txtPromotion' value='<? if($WebPromotion != "yes"){echo "$PromotionID";}?>'>
	<input name='txtOfficeCode' type='hidden' id='txtOfficeCode' value='<? echo "$OfficeCode";?>'>
	
    <!-- Customer agrees to our terms and conditions by checking here... -->
    <input name='Contract' type='hidden' id='Contract' value='<? echo "$Contract";?>'>
    <!-- these suckers pass some values to the next page in order to validate receipt -->
    <input name='goback' type='hidden' id='goback' value='yes'>
    <input name="Back" type="submit" id="Back" value="&lt; Go Back">
  </div>
</form>
  <table width="100%" border="1" cellpadding="4" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td width="60%" align="left" valign="top" bgcolor="#003399"> <p><strong><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">Shipping 
          to:</font></strong></p></td>
      <td width="40%" align="left" valign="top"><div align="center"><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>Order 
          Summary</strong></font> </div></td>
    </tr>
    <tr> 
      <td align="left" valign="top"><p><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><font color="#000000"><? echo addQuote($FirstName);?> 
          <? echo addQuote($LastName);?> </font></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><br>
          
		  	<? 
			  if($ShippingOption != "6") // don't show shipping address if going to a prep office for pick up.
			  {
		  	?>
		  
		  <? echo addQuote($Address);?> <br> <? if($Address2 != ""){echo addQuote($Address2)."<br>";}?>
          <? echo addQuote($City);?>, <? if($State != "ZZ"){echo $State;}else{echo $State_Other;}?> <? echo $ZipCode;?>
		  <br><? echo $CountryName;?> </font></p>
        <p>
			<?
			  } // end of if shipping address shouldn't be shown...
			?>
		
		<font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Phone;?> <br>
          <? echo $Email;?> </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
          <br>
          </font></p></td>
      <td width="40%" rowspan="5" align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
          <tr align="left" valign="top"> 
            <td colspan="2"> <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><em><strong><? echo $Num;?> 
                Timer<? if($Num>1) {echo "s";}?> Ordered</strong></em></font></p></td>
          </tr>
          <tr> 
            <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif">Product:</font></td>
            <td align="right" valign="top"> <div align="right"><font face="Arial, Helvetica, sans-serif"><font size="2">$<? echo number_format($totalProduct,2);?></font></font></div></td>
          </tr>
          <tr> 
            
          <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif">Tax:</font></td>
            <td align="right" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($Tax,2);?></font></td>
          </tr>
          <tr> 
            <td></td>
            <td align="right" bgcolor="#000000"><img src=pics/transparent-pixel.gif width=1 height=1 vspace=0 hspace=0></td>
          </tr>
          <tr> 
            
          <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Subtotal:</strong></font></td>
            <td align="right" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($subTotal,2);?></font></td>
          </tr>
          <tr> 
            
          <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif">Shipping 
            &amp; Handling<em>*</em>:</font></td>
            <td align="right" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($ShippingCost,2);?></font></td>
          </tr>
          <tr> 
            <td colspan="2" bgcolor="#000000"><img src=pics/transparent-pixel.gif width=1 height=1 vspace=0 hspace=0></td>
          </tr>
          <tr> 
            <td align="left" valign="top"><div align="left"><strong><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif">Order 
                Total: </font></strong></div></td>
            <td align="left" valign="top"><div align="right"><strong><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif">$<? echo number_format($Total,2);?></font></strong></div></td>
          </tr>
        </table>
        
      <?
		  # hide promo table if there is no promo code entered...
		  if($PromotionID != "")
			{
	  ?>
	  
		  <br>
		  <table width="100%" border="1" cellspacing="0" cellpadding="5">
			<tr>
			  <td><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong>Promotion<br>
				<font color="#000000"><? echo $promoNotes;?></font></strong></font></td>
			</tr>
		  </table>
	  <?
	  		} 
	  ?>
	  
      <br>
      <table width="100%" border="1" cellspacing="0" cellpadding="4">
          <tr align="left" valign="top"> 
            <td> <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Payment 
                Method:<br></strong>
               
			   <? 
			   //if they are using a check, then put the check details...if they are using a credit card, use the card info.
			   if($isCheck=="y")
			   {
			   ?>
					<? echo $BankName;?> eCheck<br>
					Routing Number: <? echo $CheckRouting;?><br>
					Account Number: <? echo $CheckAccount;?><br>
					Check Number: <? echo $CheckNumber;?>				
				<? 
				} 
				else
				{
				?>
				
					<? echo $CardType;?>: <? echo $CreditCardNo;?><br>
					Exp: <? echo $ExpMonth;?>/<? echo $ExpYear;?>
					
				<?
				}
				?>
				
				</font></p>
              
			  
			  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">Billing 
			  Address:<font color="#000000"><br></font></font></strong>
			  
			  <?
			  if($Same != "y")
			  {
			  ?>	
					<font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><font color="#000000"><? echo addQuote($FirstNameB);?> 
					<? echo addQuote($LastNameB);?></font></font><font color="#000000"><font size="2" face="Arial, Helvetica, sans-serif"><br>
					<? echo addQuote($AddressB);?><br>
					<? echo addQuote($CityB);?>, <? if($StateB != "ZZ"){echo $StateB;}else{echo $State_OtherB;}?> <? echo $ZipCodeB;?>
					<br> <? echo $CountryNameB;?></font></font></p>
			  <?
			  }
			  else
			  {
			  		echo "<font color='#003399' size='2' face='Arial, Helvetica, sans-serif'><font color='#000000'>Same As Shipping</font></font>";
			  }
			  ?>
				</td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td align="left" valign="top" bgcolor="#003399">
	  	<strong><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">Shipping Option:</font></strong>
      </td>
    </tr>
    <tr> 
      <td align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif">* <? echo $ShippingCompany;?> <? if($ShippingOption == "6"){echo $officeNotes;}else{echo $ShippingName;}?><br>
          <br>
          </font></p>
	  
	  <?
	  		if($TestDate == "yyyy-mm-dd"){$TestDate = "";}	
			if($TestName == "" && $TestDate == "" && $School == "" && $PrepClass == ""){$noshow = 1;}

			if($noshow != 1)
			{
	  ?>
	  
	  </td>
    </tr>
    <tr> 
      <td align="left" valign="top" bgcolor="#003399"><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong>Your 
        Information:</strong></font></td>
    </tr>
    <tr> 
      <td align="left" valign="top">
<?

		#split up year, month, and day into seperate variables...
			  		
		$TestDateTemp = explode("-",$TestDate);
		
		$month = $TestDateTemp[1];
		$day = $TestDateTemp[2];
		$year = $TestDateTemp[0];


		#	$month = substr($TestDate, 5, 2);
		
		if ($month == '1') {$month = 'January';}
		if ($month == '2') {$month = 'February';}
		if ($month == '2') {$month = 'March';}
		if ($month == '4') {$month = 'April';}
		if ($month == '5') {$month = 'May';}
		if ($month == '6') {$month = 'June';}
		if ($month == '7') {$month = 'July';}
		if ($month == '8') {$month = 'August';}
		if ($month == '9') {$month = 'September';}
		if ($month == '10') {$month = 'October';}
		if ($month == '11') {$month = 'November';}
		if ($month == '12') {$month = 'December';}
		
		#$day = substr($TestDate, 8, 2);
		#$year = substr($TestDate, 0, 4);

	   $newTestDate =  $month . ' ' . $day . ', ' . $year;
?>
		<? if($TestName != ""){?><p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">You are taking the <strong><? echo $TestName;?>.</strong></font></p><? }?>
        <? if($TestDate != ""){?><p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Your test is on <strong><? echo $newTestDate;?>.</strong></font></p><? }?>
        <? if($School != ""){?><p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">You are attending <strong><? echo addQuote($School);?>.</strong></font></p><? }?>
        <? if($PrepClass != ""){?><p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">You are taking <strong><? echo addQuote($PrepClass);?>.</strong></font></p><? }?>
	  
	  	<? }?>
	  </td>
    </tr>
  </table>
  
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Check all your information 
  and make sure it is correct. Click <font color="#003399">&quot;Complete Order 
  &quot;<font color="#000000"> to complete your transaction</font></font><font color="#000000">. 
  </font></strong></font></p>
  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="44%" align="left" valign="top"> <form action="receipt2.php<? if($Custom=="yes"){echo "?a=$affiliateID";}?>" method="post" name="frmOrder" id="frmOrder" onSubmit="return lockButton(document.frmOrder.Confirm.value);">
        <div align="left"> 
          <input name='cboNum' type='hidden' id='cboNum2' value='<? echo "$Num";?>'>
          <input name='cboShippingOption' type='hidden' id='cboShippingOption' value='<? echo "$ShippingOption";?>'>
          <!-- Shipping Address Info -->
          <input name='txtFirstName' type='hidden' id='txtFirstName' value='<? echo "$FirstName";?>'>
          <input name='txtLastName' type='hidden' id='txtLastName' value='<? echo "$LastName";?>'>
          <input name='txtAddress' type='hidden' id='txtAddress' value='<? echo "$Address";?>'>
		  <input name='txtAddress2' type='hidden' id='txtAddress2' value='<? echo "$Address2";?>'>
          <input name='txtCity' type='hidden' id='txtCity' value='<? echo "$City";?>'>
          <input name='txtState' type='hidden' id='txtState' value='<? echo "$State";?>'>
		  <input name='txtState_Other' type='hidden' id='txtState_Other' value='<? echo "$State_Other";?>'>
		  <input name='txtZipCode' type='hidden' id='txtZipCode' value='<? echo "$ZipCode";?>'>
		  <input name='txtCountry' type='hidden' id='txtCountry' value='<? echo "$Country";?>'>
		  <input name='CountryName' type='hidden' id='CountryName' value='<? echo "$CountryName";?>'>
		  <input name='ForeignShipping' type='hidden' id='ForeignShipping' value='<? echo "$ForeignShipping";?>'>
          <input name='txtPhone' type='hidden' id='txtPhone' value='<? echo "$Phone";?>'>
          <input name='txtEmail' type='hidden' id='txtEmail' value='<? echo "$Email";?>'>
          <!-- Billing Address Info -->
          <input name='chkSame' type='hidden' id='chkSame2' value='<? echo "$Same";?>'>
          <input name='txtFirstNameB' type='hidden' id='txtFirstNameB' value='<? echo "$FirstNameB";?>'>
          <input name='txtLastNameB' type='hidden' id='txtLastNameB' value='<? echo "$LastNameB";?>'>
          <input name='txtAddressB' type='hidden' id='txtAddressB' value='<? echo "$AddressB";?>'>
          <input name='txtCityB' type='hidden' id='txtCityB' value='<? echo "$CityB";?>'>
          <input name='txtStateB' type='hidden' id='txtStateB' value='<? echo "$StateB";?>'>
          <input name='txtState_OtherB' type='hidden' id='txtState_OtherB' value='<? echo "$State_OtherB";?>'>
	   	  <input name='txtZipCodeB' type='hidden' id='txtZipCodeB' value='<? echo "$ZipCodeB";?>'>
		  <input name='txtCountryB' type='hidden' id='txtCountryB' value='<? echo "$CountryB";?>'>
		  <input name='CountryNameB' type='hidden' id='CountryNameB' value='<? echo "$CountryNameB";?>'>
          <!-- credit card info -->
          <input name='cboCardType' type='hidden' id='cboCardType' value='<? echo "$CardType";?>'>
          <input name='txtCreditCardNo' type='hidden' id='txtCreditCardNo' value='<? echo "$CreditCardNo";?>'>
          <input name='cboExpMonth' type='hidden' id='cboExpMonth' value='<? echo "$ExpMonth";?>'>
          <input name='cboExpYear' type='hidden' id='cboExpYear' value='<? echo "$ExpYear";?>'>
          <input name='txtCVV2' type='hidden' id='txtCVV2' value='<? echo "$CVV2";?>'>
		  <!-- check info -->
          <input name='chkCheckPay' type='hidden' id='cboCardType' value='<? echo "$isCheck";?>'>
		  <input name='txtBankName' type='hidden' id='cboCardType' value='<? echo "$BankName";?>'>
          <input name='AccountType' type='hidden' id='txtCreditCardNo' value='<? echo "$AccountType";?>'>
          <input name='txtCheckRouting' type='hidden' id='cboExpMonth' value='<? echo "$CheckRouting";?>'>
          <input name='txtCheckAccount' type='hidden' id='cboExpYear' value='<? echo "$CheckAccount";?>'>
          <input name='txtCheckNumber' type='hidden' id='txtCVV2' value='<? echo "$CheckNumber";?>'>
          <!-- personal info -->
          <input name='cboTest' type='hidden' id='cboTest' value='<? echo "$Test";?>'>
          <input name='txtTestDate' type='hidden' id='txtTestDate' value='<? echo "$TestDate";?>'>
          <input name='txtSchool' type='hidden' id='txtSchool' value='<? echo "$School";?>'>
          <input name='txtPrepClass' type='hidden' id='txtPrepClass' value='<? echo "$PrepClass";?>'>
          <input name='cboReferredBy' type='hidden' id='cboReferredBy' value='<? echo "$ReferredBy";?>'>
		  
		  <input name='txtPromotion' type='hidden' id='txtPromotion' value='<? echo "$PromotionID";?>'>
		  <input name='txtPromoNotes' type='hidden' id='txtPromoNotes' value='<? echo "$promoNotes";?>'>
		  <input name='txtOfficeCode' type='hidden' id='txtOfficeCode' value='<? echo "$OfficeCode";?>'>
		  <input name='txtOfficeNotes' type='hidden' id='txtOfficeNotes' value='<? echo "$officeNotes";?>'>
		  
          <!-- Total Order Information including tax, shipping, etc... -->
          <input name='Tax' type='hidden' id='Tax' value='<? echo "$Tax";?>'>
          <input name='Total' type='hidden' id='Total' value='<? echo "$Total";?>'>
          <!-- Customer agrees to our terms and conditions by checking here... -->
          <input name='Contract' type='hidden' id='Total' value='<? echo "$Contract";?>'>
          <!-- these suckers pass some values to the next page in order to validate receipt -->
          <input name='ProductPrice' type='hidden' id='ProductPrice' value='<? echo "$price";?>'>
          <input name='TotalProduct' type='hidden' id='b4tax' value='<? echo "$totalProduct";?>'>
          <input name='ShippingCompany' type='hidden' id='ShippingCompany' value='<? echo "$ShippingCompany";?>'>
          <input name='ShippingName' type='hidden' id='ShippingName' value='<? echo "$ShippingName";?>'>
		  <input name='ShippingCost' type='hidden' id='ShippingCost' value='<? echo "$ShippingCost";?>'>
          <input name='TestName' type='hidden' id='TestName' value='<? echo "$TestName";?>'>
          <!-- this let's the page know the form has been submitted... because Javascript submits it... -->
          <input name='ConfirmButton' type='hidden' id='ConfirmButton' value='Pressed'>
		  
		  <!--  if there is an affiliate code that is approved..enter it here!!! -->
          <input name='AffiliatePromotion' type='hidden' id='AffiliatePromotion' value='<? echo "$PartnerBuy";?>'>
		  
          <!-- order button -->
          <input name="Confirm" type="submit" id="Confirm" value="Complete Order">
        </div>
      </form>
      <table border="0" cellspacing="0" cellpadding="1">
        <tr> 
          <td valign="middle"><div align="center"><font face="Arial, Helvetica, sans-serif"><img src="pics/ssl_lock.gif" width="16" height="17" border="0">&nbsp;</font> 
              <strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"></font></strong></div></td>
          <td valign="middle"><div align="center"><font face="Arial, Helvetica, sans-serif"><font size=2 color=000000><strong><font color="#003399"><a href="#" onClick="MM_openBrWindow('secureorder.php','SecureOrder','scrollbars=yes,width=400,height=350')">Secure 
              Order</a></font></strong></font></font></div></td>
        </tr>
      </table>
      
    </td>
    <td width="56%" align="right" valign="top"> <form action="index2.php<? if($Custom=="yes"){echo "?a=$affiliateID";}?>" method="post" name="frmBack" id="frmBack">
        <div align="right"> 
          <input name='cboNum' type='hidden' id='cboNum3' value='<? echo "$Num";?>'>
          <input name='cboShippingOption' type='hidden' id='cboShippingOption2' value='<? echo "$ShippingOption";?>'>
          <!-- Shipping Address Info -->
          <input name='txtFirstName' type='hidden' id='txtFirstName' value='<? echo "$FirstName";?>'>
          <input name='txtLastName' type='hidden' id='txtLastName' value='<? echo "$LastName";?>'>
          <input name='txtAddress' type='hidden' id='txtAddress' value='<? echo "$Address";?>'>
		  <input name='txtAddress2' type='hidden' id='txtAddress2' value='<? echo "$Address2";?>'>
          <input name='txtCity' type='hidden' id='txtCity' value='<? echo "$City";?>'>
          <input name='txtState' type='hidden' id='txtState' value='<? echo "$State";?>'>
          <input name='txtState_Other' type='hidden' id='txtState_Other' value='<? echo "$State_Other";?>'>
		  <input name='txtZipCode' type='hidden' id='txtZipCode' value='<? echo "$ZipCode";?>'>
		  <input name='txtCountry' type='hidden' id='txtCountry' value='<? echo "$Country";?>'>
		  <input name='CountryName' type='hidden' id='CountryName' value='<? echo "$CountryName";?>'>
		  <input name='ForeignShipping' type='hidden' id='ForeignShipping' value='<? echo "$ForeignShipping";?>'>
          <input name='txtPhone' type='hidden' id='txtPhone' value='<? echo "$Phone";?>'>
          <input name='txtEmail' type='hidden' id='txtEmail' value='<? echo "$Email";?>'>
          <!-- Billing Address Info -->
          <input name='chkSame' type='hidden' id='chkSame2' value='<? echo "$Same";?>'>
          <input name='txtFirstNameB' type='hidden' id='txtFirstNameB' value='<? echo "$FirstNameB";?>'>
          <input name='txtLastNameB' type='hidden' id='txtLastNameB' value='<? echo "$LastNameB";?>'>
          <input name='txtAddressB' type='hidden' id='txtAddressB' value='<? echo "$AddressB";?>'>
          <input name='txtCityB' type='hidden' id='txtCityB' value='<? echo "$CityB";?>'>
          <input name='txtStateB' type='hidden' id='txtStateB' value='<? echo "$StateB";?>'>
          <input name='txtState_OtherB' type='hidden' id='txtState_OtherB' value='<? echo "$State_OtherB";?>'>
	   	  <input name='txtZipCodeB' type='hidden' id='txtZipCodeB' value='<? echo "$ZipCodeB";?>'>
		  <input name='txtCountryB' type='hidden' id='txtCountryB' value='<? echo "$CountryB";?>'>
		  <input name='CountryNameB' type='hidden' id='CountryNameB' value='<? echo "$CountryNameB";?>'>
          <!-- credit card info -->
          <input name='cboCardType' type='hidden' id='cboCardType' value='<? echo "$CardType";?>'>
          <input name='txtCreditCardNo' type='hidden' id='txtCreditCardNo' value='<? echo "$CreditCardNo";?>'>
          <input name='cboExpMonth' type='hidden' id='cboExpMonth' value='<? echo "$ExpMonth";?>'>
          <input name='cboExpYear' type='hidden' id='cboExpYear' value='<? echo "$ExpYear";?>'>
          <input name='txtCVV2' type='hidden' id='txtCVV2' value='<? echo "$CVV2";?>'>
		  <!-- check info -->
          <input name='chkCheckPay' type='hidden' id='cboCardType' value='<? echo "$isCheck";?>'>
		  <input name='txtBankName' type='hidden' id='cboCardType' value='<? echo "$BankName";?>'>
          <input name='AccountType' type='hidden' id='txtCreditCardNo' value='<? echo "$AccountType";?>'>
          <input name='txtCheckRouting' type='hidden' id='cboExpMonth' value='<? echo "$CheckRouting";?>'>
          <input name='txtCheckAccount' type='hidden' id='cboExpYear' value='<? echo "$CheckAccount";?>'>
          <input name='txtCheckNumber' type='hidden' id='txtCVV2' value='<? echo "$CheckNumber";?>'>
          <!-- personal info -->
          <input name='cboTest' type='hidden' id='cboTest' value='<? echo "$Test";?>'>
          <input name='txtTestDate' type='hidden' id='txtTestDate' value='<? echo "$TestDate";?>'>
          <input name='txtSchool' type='hidden' id='txtSchool' value='<? echo "$School";?>'>
          <input name='txtPrepClass' type='hidden' id='txtPrepClass' value='<? echo "$PrepClass";?>'>
          <input name='cboReferredBy' type='hidden' id='cboReferredBy' value='<? echo "$ReferredBy";?>'>
		  
		  <input name='txtPromotion' type='hidden' id='txtPromotion' value='<? if($WebPromotion != "yes"){echo "$PromotionID";}?>'>
		  <input name='txtOfficeCode' type='hidden' id='txtOfficeCode' value='<? echo "$OfficeCode";?>'>
		  
          <!-- Customer agrees to our terms and conditions by checking here... -->
          <input name='Contract' type='hidden' id='Total' value='<? echo "$Contract";?>'>
          <!-- these suckers pass some values to the next page in order to validate receipt -->
		  <input name='goback' type='hidden' id='goback' value='yes'>

          <input name="Back" type="submit" id="Back" value="&lt; Go Back">
        </div>
      </form></td>
  </tr>
</table>
<p>&nbsp;</p>

<?
	} // end od confirm information if not "NEXT, etc"
?>

<?
	# if a local affiliate customer, ask them about their shipping and pick up preference...
	if($ShipButton != "Next" && $ShipChoice == "y")
	{
?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Shipping 
  or Pickup?</strong></font>
<p><font size="2" face="Arial, Helvetica, sans-serif">Your promotional code suggests 
  that you live in or near Austin, TX. You now have the choice to save on your 
  shipping costs and come pick your timer up from our office. Timer pick up days 
  are Tuesday and Thursday from 2:00 to 5:00 pm. You must call before you come 
  to make sure someone is in the office.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Please select your option 
  below. <strong>Click &quot;<font color="#003399">Next</font>&quot; when you 
  are ready</strong>.</font></p>
<table width="100%" border="1" cellpadding="4" cellspacing="0" bordercolor="#003399">
  <tr>
    <td><form action="" method="post" name="frmShipChoice" id="frmShipChoice">
        <p> <font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="RadioShip" type="radio" value="ship" checked>
          Please ship the timer to my shipping address.</font></p>
        <p> 
          <input type="radio" name="RadioShip" value="pickup">
          <font size="2" face="Arial, Helvetica, sans-serif">Please have a timer 
          ready for me, I will pick it up. You will not be charged for shipping.</font></p>
        <p>
			<input name='cboNum' type='hidden' id='cboNum' value='<? echo "$Num";?>'>
			<input name='cboShippingOption' type='hidden' id='cboShippingOption3' value='<? echo "$ShippingOption";?>'>
			<!-- Shipping Address Info -->
			<input name='txtFirstName' type='hidden' id='txtFirstName' value='<? echo "$FirstName";?>'>
			<input name='txtLastName' type='hidden' id='txtLastName' value='<? echo "$LastName";?>'>
			<input name='txtAddress' type='hidden' id='txtAddress' value='<? echo "$Address";?>'>
			<input name='txtAddress2' type='hidden' id='txtAddress2' value='<? echo "$Address2";?>'>
			<input name='txtCity' type='hidden' id='txtCity' value='<? echo "$City";?>'>
			<input name='txtState' type='hidden' id='txtState' value='<? echo "$State";?>'>
			<input name='txtZipCode' type='hidden' id='txtZipCode' value='<? echo "$ZipCode";?>'>
			<input name='txtPhone' type='hidden' id='txtPhone' value='<? echo "$Phone";?>'>
			<input name='txtEmail' type='hidden' id='txtEmail' value='<? echo "$Email";?>'>
			<!-- Billing Address Info -->
			<input name='chkSame' type='hidden' id='chkSame' value='<? echo "$Same";?>'>
			<input name='txtFirstNameB' type='hidden' id='txtFirstNameB' value='<? echo "$FirstNameB";?>'>
			<input name='txtLastNameB' type='hidden' id='txtLastNameB' value='<? echo "$LastNameB";?>'>
			<input name='txtAddressB' type='hidden' id='txtAddressB' value='<? echo "$AddressB";?>'>
			<input name='txtCityB' type='hidden' id='txtCityB' value='<? echo "$CityB";?>'>
			<input name='txtStateB' type='hidden' id='txtStateB' value='<? echo "$StateB";?>'>
			<input name='txtZipCodeB' type='hidden' id='txtZipCodeB' value='<? echo "$ZipCodeB";?>'>
			<!-- credit card info -->
			<input name='cboCardType' type='hidden' id='cboCardType' value='<? echo "$CardType";?>'>
			<input name='txtCreditCardNo' type='hidden' id='txtCreditCardNo' value='<? echo "$CreditCardNo";?>'>
			<input name='cboExpMonth' type='hidden' id='cboExpMonth' value='<? echo "$ExpMonth";?>'>
			<input name='cboExpYear' type='hidden' id='cboExpYear' value='<? echo "$ExpYear";?>'>
			<input name='txtCVV2' type='hidden' id='txtCVV2' value='<? echo "$CVV2";?>'>
			<!-- personal info -->
			<input name='cboTest' type='hidden' id='cboTest' value='<? echo "$Test";?>'>
			<input name='txtTestDate' type='hidden' id='txtTestDate' value='<? echo "$TestDate";?>'>
			<input name='txtSchool' type='hidden' id='txtSchool' value='<? echo "$School";?>'>
			<input name='txtPrepClass' type='hidden' id='txtPrepClass' value='<? echo "$PrepClass";?>'>
			<input name='cboReferredBy' type='hidden' id='cboReferredBy' value='<? echo "$ReferredBy";?>'>
			
			<input name='txtPromotion' type='hidden' id='txtPromotion' value='<? echo "$PromotionID";?>'>
			<input name='txtOfficeCode' type='hidden' id='txtOfficeCode' value='<? echo "$OfficeCode";?>'>
			
			<!-- Customer agrees to our terms and conditions by checking here... -->
			<input name='chkContract' type='hidden' id='Contract' value='<? echo "$Contract";?>'>
		  
		  <input name="ShipButton" type="submit" id="ShipButton" value="Next">
        </p>
      </form></td>
  </tr>
</table>

<p>&nbsp;</p>
<?
	} # end show shipping option...
?>




<? 

	} // end if StoresClose
	
	if($StoreClose == "y")
	{

?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Retail 
  Location!</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>You live near a 
  store that sells our timer!</strong> Picking your timer up in the store will 
  be quick and easy. That way you can start studying with it now! </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">To continue with your order, 
  please press &quot;<font color="#003399"><strong>Continue Order Online</strong></font>&quot; 
  below. To buy in the store, please press &quot;<font color="#003399"><strong>I 
  Will Pick One Up</strong></font>&quot;. An email will also be sent to you with 
  this store list.</font></p>
  
  
  
  <table width="278" border="0" align="center" cellpadding="8" cellspacing="0">
  <?		
		$db = new db_sql;
		$zipLoc = new zipLocator;
		$radius = $Radius;
		
		$zipArray = $zipLoc->inradius($zipOne,$radius);
		
		for($i=1;$i < count($zipArray);$i++)
		{
			$sql = "SELECT * FROM tblBusinessCustomer WHERE ZipCode= '$zipArray[$i]' AND CustomerType = 'Bookstore'";
			$result = mysql_query($sql) or die("Cannot pull Store Locations.  Please try again.");		
			while($row = mysql_fetch_array($result))
			{
				$NameS = $row[Name];
				$AddressS = $row[Address];
				$Address2S = $row[Address2];
				$Address3S = $row[Address3];
				$CityS = $row[City];
				$StateS = $row[State];
				$ZipCodeS = $row[ZipCode];
				$PhoneS = $row[Phone1];
				$WebsiteS = $row[Website];
				
				$db = new db_sql;
				$zipDistance = new zipLocator;
				
				$distance = number_format($zipDistance->distance($zipOne,$ZipCodeS),2);
				
				if($distance == 0)
				{
					$distance = 0;
				}
  ?>
  
  <tr>
    <td width="262">
	<p>
		<font size="2" face="Arial, Helvetica, sans-serif">
			<strong>
				<font color="#666666" size="3">
					<? echo $NameS;?><br>
				</font>
			</strong>
			
			<? echo "$AddressS";?><br>
			<? if($Address2S != ""){echo "$Address2S<br>";}?>
			<? if($Address3S != ""){echo "$Address3S<br>";}?>
			<? echo "$CityS";?>, <? echo "$StateS";?> <? echo "$ZipCodeS";?><br>
			<strong><? echo "$PhoneS";?><br></strong>
			<? if($WebsiteS != ""){?><a href="<? echo "$WebsiteS";?>" target="_blank">Visit Online</a><? } ?>
		</font>
	</p>
    <p>
		<font size="2" face="Arial, Helvetica, sans-serif">
			<em><strong><? echo "$distance";?> miles away from you</strong></em>
		</font>
	</p>
	
	<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://us.rd.yahoo.com/maps/us/insert/Tmap/extmap%0D/*-http://maps.yahoo.com/maps_result?addr=<? echo $AddressS;?>&csz=<? echo $CityS;?>%2C+<? echo $StateS;?>+<? echo $ZipCodeS;?>&country=us" target="_blank">Map</a> 
        | <a href="http://us.rd.yahoo.com/maps/us/insert/Tmap/extDD/*-http://maps.yahoo.com/dd?taddr=<? echo $AddressS;?>&tcsz=<? echo $CityS;?>%2C+<? echo $StateS;?>+<? echo $ZipCodeS;?>&tcountry=us" target="_blank">Driving 
        Directions</a></font> </p>
	
	</td>
  </tr>
  
  <?	
			}
		}
  ?>

</table>


<p>&nbsp;</p>
<form action="" method="post" name="frmRetailLocation" id="frmRetailLocation">
  <p> 
    <input name='cboNum' type='hidden' id='cboNum' value='<? echo "$Num";?>'>
    <input name='cboShippingOption' type='hidden' id='cboShippingOption' value='<? echo "$ShippingOption";?>'>
    <!-- Shipping Address Info -->
    <input name='txtFirstName' type='hidden' id='txtFirstName' value='<? echo "$FirstName";?>'>
    <input name='txtLastName' type='hidden' id='txtLastName' value='<? echo "$LastName";?>'>
    <input name='txtAddress' type='hidden' id='txtAddress' value='<? echo "$Address";?>'>
	<input name='txtAddress2' type='hidden' id='txtAddress2' value='<? echo "$Address2";?>'>
    <input name='txtCity' type='hidden' id='txtCity' value='<? echo "$City";?>'>
    <input name='txtState' type='hidden' id='txtState' value='<? echo "$State";?>'>
    <input name='txtState_Other' type='hidden' id='txtState_Other' value='<? echo "$State_Other";?>'>
    <input name='txtZipCode' type='hidden' id='txtZipCode' value='<? echo "$ZipCode";?>'>
    <input name='txtCountry' type='hidden' id='txtCountry' value='<? echo "$Country";?>'>
    <input name='ForeignShipping' type='hidden' id='ForeignShipping' value='<? echo "$ForeignShipping";?>'>
    <input name='txtPhone' type='hidden' id='txtPhone' value='<? echo "$Phone";?>'>
    <input name='txtEmail' type='hidden' id='txtEmail' value='<? echo "$Email";?>'>
    <!-- Billing Address Info -->
    <input name='chkSame' type='hidden' id='chkSame2' value='<? echo "$Same";?>'>
    <input name='txtFirstNameB' type='hidden' id='txtFirstNameB' value='<? echo "$FirstNameB";?>'>
    <input name='txtLastNameB' type='hidden' id='txtLastNameB' value='<? echo "$LastNameB";?>'>
    <input name='txtAddressB' type='hidden' id='txtAddressB' value='<? echo "$AddressB";?>'>
    <input name='txtCityB' type='hidden' id='txtCityB' value='<? echo "$CityB";?>'>
    <input name='txtStateB' type='hidden' id='txtStateB' value='<? echo "$StateB";?>'>
    <input name='txtState_OtherB' type='hidden' id='txtState_OtherB' value='<? echo "$State_OtherB";?>'>
    <input name='txtZipCodeB' type='hidden' id='txtZipCodeB' value='<? echo "$ZipCodeB";?>'>
    <input name='txtCountryB' type='hidden' id='txtCountryB' value='<? echo "$CountryB";?>'>
    <!-- credit card info -->
    <input name='cboCardType' type='hidden' id='cboCardType' value='<? echo "$CardType";?>'>
    <input name='txtCreditCardNo' type='hidden' id='txtCreditCardNo' value='<? echo "$CreditCardNo";?>'>
    <input name='cboExpMonth' type='hidden' id='cboExpMonth' value='<? echo "$ExpMonth";?>'>
    <input name='cboExpYear' type='hidden' id='cboExpYear' value='<? echo "$ExpYear";?>'>
    <input name='txtCVV2' type='hidden' id='txtCVV2' value='<? echo "$CVV2";?>'>
    <!-- personal info -->
    <input name='cboTest' type='hidden' id='cboTest' value='<? echo "$Test";?>'>
    <input name='TestMonth' type='hidden' id='TestMonth' value='<? echo "$TestMonth";?>'>
	<input name='TestDay' type='hidden' id='TestDay' value='<? echo "$TestDay";?>'>
	<input name='TestYear' type='hidden' id='TestYear' value='<? echo "$TestYear";?>'>
    <input name='txtSchool' type='hidden' id='txtSchool' value='<? echo "$School";?>'>
    <input name='txtPrepClass' type='hidden' id='txtPrepClass' value='<? echo "$PrepClass";?>'>
    <input name='cboReferredBy' type='hidden' id='cboReferredBy' value='<? echo "$ReferredBy";?>'>
    <input name='txtPromotion' type='hidden' id='txtPromotion' value='<? if($WebPromotion != "yes"){echo "$PromotionID";}?>'>
    <input name='txtOfficeCode' type='hidden' id='txtOfficeCode' value='<? echo "$OfficeCode";?>'>
    <!-- Customer agrees to our terms and conditions by checking here... -->
    <input name='chkContract' type='hidden' id='chkContract' value='<? echo "$Contract";?>'>
  </p>
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
    <tr>
      <td width="50%"> 
        <div align="right">
          <input name="ContinueOrder" type="submit" id="ContinueOrder" value="Continue Order Online">
        </div></td>
      <td width="50%"> 
        <input name="PickUp" type="submit" id="PickUp" value="I Will Pick One Up">
      </td>
    </tr>
  </table>
  </form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>
  <?
	} # end if store close
?>
  <?
		// end of checking that enough is in stock...if there isn't enough, ask them to go back and choose another number of timers.
		}
		else
		{
			echo "<strong><font color='#FF0000' size='3' face='Arial, Helvetica, sans-serif'>There are not enough timers in stock at this moment for you to purchase $Num. <p>Please <a href='mailto:info@silenttimer.com'>email us</a> for information on upcoming shipments, or visit our <a href='#'>shipments page</a>. </font></strong>";
		}
		
	}
	else // there have been errors on the page... list errors...
	{
?>
</p>
<p>
			<font color='#003399' size='5' face='Arial, Helvetica, sans-serif'><strong>Input Notification</strong></font>
		</p>
		<p>
			<strong><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>Please press your browsers back button and correct the following:</font></strong>
		</p>
		<p>
			<strong><font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'>
				<? if ($eFN == 1){echo "- First Name<br>";}?>
				<? if ($eLN == 1){echo "- Last Name<br>";}?>
				<? if ($eA == 1){echo "- Shipping Address<br>";}?>
				<? if ($eC == 1){echo "- Shipping City<br>";}?>
				<? if ($eST == 1){echo "- Shipping State<br>";}?>
				<? if ($eZ == 1){echo "- Shipping ZipCode<br>";}?>
				<? if ($eP == 1){echo "- Phone Number<br>";}?>
				<? if ($eE == 1){echo "- Email Address<br>";}?>
				
				<? if ($eFNb == 1){echo "- Billing First Name<br>";}?>
				<? if ($eLNb == 1){echo "- Billing Last Name<br>";}?>
				<? if ($eAb == 1){echo "- Billing Address<br>";}?>
				<? if ($eCb == 1){echo "- Billing City<br>";}?>
				<? if ($eSTb == 1){echo "- Billing State<br>";}?>
				<? if ($eZb == 1){echo "- Billing ZipCode<br>";}?>
				
				<? if ($eCardType == 1){echo "- Credit Card Type<br>";}?>
				<? if ($eCardNo == 1){echo "- Credit Card Number<br>";}?>
				<? if ($eExp == 1){echo "- Credit Card Expiration Date<br>";}?>
				<? if ($eCVV2 == 1){echo "- CVV2 Identity Number<br>";}?>
				<? if ($eContract == 1){echo "- Agree to Silent Timer Terms and Conditions<br>";}?>
				
  			</font></strong></p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
	<?
	}
	
		mysql_close($link);
	
	?>

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
require "include/sidemenu.php";
}
?>