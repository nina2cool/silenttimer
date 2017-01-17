<?
//security for page
session_start();

//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

$PageTitle = "Step 1: Shipping/ Billing Information";

#check if shopping cart is empty
if (session_is_registered('PreorderShoppingCart'))
{
}
else
{
header("location: https://www.silenttimer.com/order/preorder.php");
}

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

# link to DB for page calls to it.
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
# Remove item from cart

	$Remove=$_POST['remove'];
	$cLocation=$_POST['cart'];
		
	if($Remove == "y")
	{
		# code to search array and delete item from cart...
		for($i=0; $i < count($PreorderShoppingCart); $i++)
		{
			if($i == $cLocation)
			{
				$PreorderShoppingCart[$i][0] = "";
				$PreorderShoppingCart[$i][1] = "";
				$PreorderShoppingCart[$i][2] = "";
				
			}
		}
	}
	
	# Update Quantity in cart...

	$Update = $_POST['update'];
	$cLocation = $_POST['cart'];
	$Quantity = $_POST['quantity'];
	$Quantity = number_format($Quantity, 0);
	
	if($Update == "y")
	{
		# code to search array and update item quantity from cart...
		for($i=0; $i < count($PreorderShoppingCart); $i++)
		{
			if($i == $cLocation)
			{
				if ($Quantity == '0')
				{
					$PreorderShoppingCart[$i][0] = "";
					$PreorderShoppingCart[$i][1] = "";
					$PreorderShoppingCart[$i][2] = "";
					
				}
				else
				{
					if ($Quantity < 0)
					{
						$Same = "y";
					}
					else
					{
						$tempProductID = $PreorderShoppingCart[$i][0];
						
						$sql = "SELECT * FROM tblProductNew WHERE ProductID = $tempProductID";
						$result = mysql_query($sql) or die("Cannot get product info position $i!");
						$row = mysql_fetch_array($result);
						
						$tempWeight = $row[Weight];
						$PreorderShoppingCart[$i][2] = ($tempWeight * $Quantity);
						$PreorderShoppingCart[$i][1] = $Quantity;
					}
				}
			}
		}
	}
# check to see if cart is empty, if empty can't be on this page
		
		$e = 0;
		
		for($i=0; $i < count($PreorderShoppingCart); $i++)
		{
			if($PreorderShoppingCart[$i][0] != "")
			{
				$e = 1;
			}
		}
		
		if ( $e != 1)
		{
			header("location: https://www.silenttimer.com/order/preorder.php");
		}
	 
#grab test name from the URL to customize order page...
$tURL = $_GET['t'];
if($tURL == ""){$TextTest = "test";}else{$TextTest = $tURL;}

if ($tURL == "")
{
	$PageTitle = "Purchase The Silent Timer for your LSAT, MCAT and more!";
}
else
{
	$PageTitle = "Purchase The Silent Timer for your $tURL!";
}

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

# ------------------------------------------------------------------------------------------------------------
#  END check page for security.
# ------------------------------------------------------------------------------------------------------------

// has http variable in it to populate links on page.
require "../include/url.php";


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
}


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	
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
	
	# --------------------------------------------------------------------------------------------

// get info from confirm page if need to correct data.  this will fill in fields on this page.

		
			// --- *****
			// Grab all variables from order page and display for user.
				$Weight = $_POST['weight'];
				$ShipCostID = $_POST['ShipCostID'];
		   		$goback = $_POST['goback'];
			// -- Shipping Address Info -- ##
		
				$FirstName = escapeQuote($_POST['txtFirstName']);
				$LastName = escapeQuote($_POST['txtLastName']);
				
				$Address = escapeQuote($_POST['txtAddress']);
				$Address2 = escapeQuote($_POST['txtAddress2']);
				$City = escapeQuote($_POST['txtCity']);
				$State = $_POST['txtState'];
				$State_Other = $_POST['txtState_Other'];
				$ZipCode = $_POST['txtZipCode'];
				$Country = $_POST['txtCountry'];
				$Phone = $_POST['txtPhone'];
				$Email = $_POST['txtEmail'];
				$Foreign = $_POST['ckForeignShipping'];
				$Military = $_POST['ckMilitary'];
				$POBox = $_POST['ckPOBox'];
		   
			// -- Billing Address Info -- ##
				$Same = $_POST['chkSame'];
				
				$FirstNameB = $_POST['txtFirstNameB'];
				$LastNameB = $_POST['txtLastNameB'];
				$AddressB = $_POST['txtAddressB'];
				$CityB = $_POST['txtCityB'];
				$StateB = $_POST['txtStateB'];
				$State_OtherB = $_POST['txtState_OtherB'];
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
				$School = escapeQuote($_POST['txtSchool']);
				$PrepClass = escapeQuote($_POST['txtPrepClass']);
				$PrepClass2 = $_POST['txtPrepClass2'];
				$ReferredBy = $_POST['cboReferredBy'];
				
				$PromotionID = $_POST['txtPromotion'];
				$OfficeCode = $_POST['txtOfficeCode'];
				
				$Contract = $_POST['Contract'];
			
			if($_GET['txtFirstName'] != "")
			{
			
				$FirstName = $_GET['txtFirstName'];
				$LastName = $_GET['txtLastName'];
				
				$Address = $_GET['txtAddress'];
				$Address2 = $_GET['txtAddress2'];
				$City = $_GET['txtCity'];
				$State = $_GET['txtState'];
				$State_Other = $_GET['txtState_Other'];
				$ZipCode = $_GET['txtZipCode'];
				$Country = $_GET['txtCountry'];
				$Phone = $_GET['txtPhone'];
				$Email = $_GET['txtEmail'];
				$Foreign = $_GET['ckForeignShipping'];
				$Military = $_GET['ckMilitary'];
				$POBox = $_GET['ckPOBox'];
			
			}
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
	
	# -------------------------------------------------------------------------------
	# check to see if there is a promotion, if there is... then show the special at
	# the top of the page.
	# -------------------------------------------------------------------------------
		$now = date("Y-m-d"); # date time
		
		$sql = "SELECT * 
				FROM tblPromotionWeb 
				WHERE StartDate <= '$now' AND EndDate >= '$now'";
		$result = mysql_query($sql) or die("Cannot execute query!");
		
		while($row = mysql_fetch_array($result))
		{
			$PromoNote = $row[Note];
			$PromoType = $row[PromotionID];
			$PromoAmount = $row[Amount];
			$PromoMore = $row[OtherOffers];
		}
	# -------------------------------------------------------------------------------
?>
<? $Weight = $PreorderShoppingCart[0][3];?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<p><strong><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">Step
      1: Shipping/ Billing Info </font><font size="1">| <font color="#000000" face="Arial, Helvetica, sans-serif">Step2:
      Select Shipping Option</font></font><font size="1" face="Arial, Helvetica, sans-serif"> |
Step3: Payment Information | Step4: Submit Order</font></strong></p>
<table width="184" border="0" align="right" cellpadding="1" cellspacing="0">
  <tr>
    <td width="30" valign="middle"><div align="center"><font face="Arial, Helvetica, sans-serif"><img src="pics/ssl_lock.gif" width="16" height="17" border="0">&nbsp;</font> </div></td>
    <td width="150" valign="middle"><div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('secureorder.php','SecureOrder','scrollbars=yes,width=450,height=300')">Secure
              Order Form</a></strong></font></div></td>
  </tr>
</table>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><b>Reserve
Your Silent Timer&#8482; LSAT Bonus Combo Today! </b></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><b>&gt; <a href="preorder_info.php" target="_blank">How
does the reservation process work?</a></b></font></p>
<p><b><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="preorder_faq.php" target="_blank">Pre-order
        FAQ</a></font></b></p>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000099">
  <tr bgcolor="#CCCCCC" >
    <td >
    <div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><strong>Qty</strong></font></div></td>
    <td ><div align="center"><strong><font color="#000099" size="2" face="Arial, Helvetica, sans-serif">Description</font></strong></div></td>
    <td >
      <div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><strong>Reservation
    Fee </strong></font></div></td>
    <td >
    <div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><strong>Total</strong></font></div></td>
  </tr>
  <?
 # loop out all shopping cart items
			for($i=0; $i < count($PreorderShoppingCart); $i++)
			{
				
				if($PreorderShoppingCart[$i][0] != "")
				{				
					# get current product from the cart...
					$ProductID = $PreorderShoppingCart[$i][0];
					$Num_Ordered = $PreorderShoppingCart[$i][1];
					$ProductWeight = $PreorderShoppingCart[$i][2];
					 
					# Get all information from table for this part number ID
					$sql = "SELECT * FROM tblProductNew WHERE ProductID='$ProductID'";
					$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
	
					while($row = mysql_fetch_array($result))
					{
						$ProductID = $row[ProductID];
						$ProductName = $row[ProductName];
						$ISBN = $row[ISBN];
						$Description = $row[Description];
						$OnlinePrice = $row[OnlinePrice];
						$RetailPrice = $row[RetailPrice];
						$WebInventory = $row[WebInventory];
						$Preorder = $row[Preorder];
						$PreorderPrice = $row[PreorderPrice];
						
					# end while	
					}
					?>
  
 <tr>
    <td align="center">
	<font size="2" face="Arial, Helvetica, sans-serif">
	<form action="" method="post" name="frmUpdate" id="frmUpdate">
					<? # Check inventory for enough product
					$test = $Num_Ordered + 5;
					if ($WebInventory >= $test ){?>
					<input name="quantity" type="text" id="quantity" value="<? echo $Num_Ordered;?>" size="3">
					<? }
					else
					{
						$Num_Ordered = $WebInventory - 5; 
						$PreorderShoppingCart[$i][1] = $Num_Ordered;
						$Extra = no; ?>
					<input name="quantity" type="text" id="quantity" value="<? echo $Num_Ordered;?>" size="3">
					<? } ?>
          			<input name="update" type="hidden" id="update" value="y">
          			<input name="cart" type="hidden" id="cart" value="<? echo $i;?>">
          			<br>
					<font color="#FF0000" face="Arial, Helvetica, sans-serif" size="2">
					<? if ($Extra != "" ){ ?>
		  </font>
					  <div align="center"><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong><? echo "There is not enough inventory to fill your request. You may order $Extra more.";  ?> </strong></font></div>
					<? } ?>
					<input name="Update" type="image" id="Update" value="Update" src="../images/cartupdate.jpg" alt="Update Cart" width="81" height="26">
					<br>
         			<input name='goback' type='hidden' id='goback' value='yes'>
                    <input name='weight' type='hidden' id='weight' value='<? echo "$Weight";?>'>
                    <input name='ShipCostID' type='hidden' id='ShipCostID' value='<? echo "$ShipCostID";?>'>
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
                    <input name='ckForeignShipping' type='hidden' id='ckForeignShipping' value='<? echo "$Foreign";?>'>
                    <input name='ckMilitary' type='hidden' id='ckMilitary' value='<? echo "$Military";?>'>
                    <input name='ckPOBox' type='hidden' id='ckPOBox' value='<? echo "$POBox";?>'>
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
                    <input name='txtCheckNumber' type='hidden' id='txtCheckNumber' value='<? echo "$CheckNumber";?>'>
                    <!-- personal info -->
                    <input name='cboTest' type='hidden' id='cboTest' value='<? echo "$Test";?>'>
                    <input name='txtTestDate' type='hidden' id='txtTestDate' value='<? echo "$TestDate";?>'>
					<input name='TestMonth' type='hidden' id='TestMonth' value='<? echo "$TestMonth";?>'>
					<input name='TestDay' type='hidden' id='TestDay' value='<? echo "$TestDay";?>'>
					<input name='TestYear' type='hidden' id='TestYear' value='<? echo "$TestYear";?>'>
                    <input name='txtSchool' type='hidden' id='txtSchool' value='<? echo "$School";?>'>
                    <input name='txtPrepClass' type='hidden' id='txtPrepClass' value='<? echo "$PrepClass";?>'>
                    <input name='txtPrepClass2' type='hidden' id='txtPrepClass2' value='<? echo "$PrepClass2";?>'>
                    <input name='cboReferredBy' type='hidden' id='cboReferredBy' value='<? echo "$ReferredBy";?>'>
                    <input name='txtPromotion' type='hidden' id='txtPromotion' value='<? if($WebPromotion != "yes"){echo "$PromotionID";}?>'>
                    <input name='txtOfficeCode' type='hidden' id='txtOfficeCode' value='<? echo "$OfficeCode";?>'>
                    <!-- Customer agrees to our terms and conditions by checking here... -->
                    <input name='Contract' type='hidden' id='Contract' value='<? echo "$Contract";?>'>
		 
	  </form>
      </font>
		<form action="" method="post" name="frmRemove" id="frmRemove">
		<input name="Remove" type="image" id="Remove" value="Remove" src="../images/cartremove.jpg" alt="Remove Item From Cart" width="85" height="25">
		<input name="cart" type="hidden" id="cart" value="<? echo $i;?>">
		<input name="remove" type="hidden" id="remove" value="y">
                    <input name='weight' type='hidden' id='weight' value='<? echo "$Weight";?>'>
                    <input name='ShipCostID' type='hidden' id='ShipCostID' value='<? echo "$ShipCostID";?>'>
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
                    <input name='ckForeignShipping' type='hidden' id='ckForeignShipping' value='<? echo "$Foreign";?>'>
                    <input name='ckMilitary' type='hidden' id='ckMilitary' value='<? echo "$Military";?>'>
                    <input name='ckPOBox' type='hidden' id='ckPOBox' value='<? echo "$POBox";?>'>
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
                    <input name='txtCheckNumber' type='hidden' id='txtCheckNumber' value='<? echo "$CheckNumber";?>'>
                    <!-- personal info -->
                    <input name='cboTest' type='hidden' id='cboTest' value='<? echo "$Test";?>'>
                    <input name='txtTestDate' type='hidden' id='txtTestDate' value='<? echo "$TestDate";?>'>
					<input name='TestMonth' type='hidden' id='TestMonth' value='<? echo "$TestMonth";?>'>
					<input name='TestDay' type='hidden' id='TestDay' value='<? echo "$TestDay";?>'>
					<input name='TestYear' type='hidden' id='TestYear' value='<? echo "$TestYear";?>'>
                    <input name='txtSchool' type='hidden' id='txtSchool' value='<? echo "$School";?>'>
                    <input name='txtPrepClass' type='hidden' id='txtPrepClass' value='<? echo "$PrepClass";?>'>
                    <input name='txtPrepClass2' type='hidden' id='txtPrepClass2' value='<? echo "$PrepClass2";?>'>
                    <input name='cboReferredBy' type='hidden' id='cboReferredBy' value='<? echo "$ReferredBy";?>'>
                    <input name='txtPromotion' type='hidden' id='txtPromotion' value='<? if($WebPromotion != "yes"){echo "$PromotionID";}?>'>
                    <input name='txtOfficeCode' type='hidden' id='txtOfficeCode' value='<? echo "$OfficeCode";?>'>
                    <!-- Customer agrees to our terms and conditions by checking here... -->
                    <input name='Contract' type='hidden' id='Contract' value='<? echo "$Contract";?>'>		
		</form>		
    </td>
    <td><p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><b><? echo $ProductName; ?><br>
      </b>Purchase Price: $<? echo number_format($OnlinePrice,2); ?><br>
    Reservation Fee: $<? echo number_format($PreorderPrice,2); ?> (used toward
    purchase price) </font></p>
      <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">-Actual
        product to be shipped by September 11 <br>
        -Remainder of
product cost plus shipping charged upon shipment </font></p>
    </td>
	
	<? if($Preorder == "y") {
	$OnlinePrice = $PreorderPrice;
	}
	?>
	
    <td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($OnlinePrice, 2); ?></font></div></td>
	
    <td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">$<? $ProductTotal = $Num_Ordered*$OnlinePrice;
					echo number_format($ProductTotal, 2);  ?>
</font></div></td>
  </tr>
  <? 
				$TotalWeight += $ProductWeight;
				$Total += $ProductTotal;
				$Extra = "";
				# end if	
				}
				
			# end for	
			}
	$PreorderShoppingCart[0][3] = $TotalWeight;
	
?>
  <tr >
    <td colspan="3"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>Subtotal</strong></font> </td>
    <td>
    <div align="center"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($Total, 2);?></strong></font></div></td>
  </tr>
</table>

<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Please enter
        your information  below. Fields marked with <font color="#FF0000">*</font> are
        required. Click on the question mark for more information about a particular
        field.</strong></font></p>
<form action="preorder2.php<? if($Custom=="yes"){echo "?a=$affiliateID";}?>" method="post" name="frmOrder" id="frmOrder" onSubmit="return CheckOrder();">
  
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000099">
    <tr>
      <td align="left" valign="top"> 
         <table width="100%" border="0" cellspacing="0" cellpadding="4">
		<tr><td colspan="2" bgcolor="#000099"><p><strong><font size="3" face="Arial, Helvetica, sans-serif" color="#FFFFFF">Shipping Information</font></strong></p></td></tr>
          <tr align="left" valign="top"> 
            <td colspan="2"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
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
            <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Address 
                Line 1 </font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">*</font></strong><br>
                <input name="txtAddress" tabindex="3" type="text" id="txtAddress" value="<? echo addQuote($Address);?>" size="32" maxlength="30">
                <font color="#666666" size="2" face="Arial, Helvetica, sans-serif"><strong>Max
                30 characters</strong></font></font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Address Line 2/ Urbanization</font></strong><br>
              <input name="txtAddress2" tabindex="4" type="text" id="txtAddress2" value="<? echo addQuote($Address2);?>" size="32" maxlength="30">
              <font color="#666666" size="2" face="Arial, Helvetica, sans-serif"><strong>Max
              30 characters</strong></font></font></p></td>
            <td>&nbsp;</td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="2"> <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
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
                  <td width="40%"> <font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip 
                    Code </strong></font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><br>
                    <input name="txtZipCode" tabindex="8" type="text" id="txtZipCode" size="11" maxlength="10" value="<? echo $ZipCode;?>">
                  </font></td>
                </tr>
              </table></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                  States Offshore&quot;.)</font><strong><a href="qc.php" target="_blank"><img src="../images/quest.jpg" alt="Help with countries" width="17" height="14" border="0"></a></strong></font></td>
                </tr>
              </table></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="2"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Phone
                  Number</strong> </font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtPhone" tabindex="10" type="text" id="txtPhone" size="16" maxlength="20" value="<? echo $Phone;?>">
              <font color="#999999">(XXX-XXX-XXXX). Include country 
            code if outside US</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="qp.php" target="_blank"><img src="../images/quest.jpg" alt="Why do I need to give my phone number?" width="17" height="14" border="0"></a></strong></font></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Email 
              Address <font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">*</font></font></strong><br>
              <input name="txtEmail" tabindex="11" type="text" id="txtOrderEmail3" size="25" maxlength="50" value="<? echo $Email;?>">
</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="qe.php" target="_blank"><img src="../images/quest.jpg" alt="Why do I need to give my email?" width="17" height="14" border="0"></a></strong></font> <font color="#999999" size="2" face="Arial, Helvetica, sans-serif">We
e-mail your receipt to this address, so please add &quot;info@silenttimer.com&quot; to
your e-mail safe list. If you don't seem to get it at first, check your spam
filter.</font></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <table width="100%"  border="0" cellspacing="0" cellpadding="4">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#000099"><strong><font size="3" face="Arial, Helvetica, sans-serif" color="#FFFFFF">Special
      Shipping Options </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><a href="qs.php" target="_blank"><img src="../images/quest.jpg" alt="Help with special shipping options" width="17" height="14" border="0"></a></font></strong></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><em>(Please
          select any that apply)</em></font><br>
          <input name="ckPOBox" tabindex="12" type="checkbox" value="POBox" <? if($POBox == "POBox"){ echo "checked";}?>>
          <font size="2" face="Arial, Helvetica, sans-serif" color="#000000">P.O.
          Box Address Shipping</font><br>
  <input name="ckMilitary" tabindex="13" type="checkbox" value="Military" <? if($Military == "Military"){ echo "checked";}?>>
  <font size="2" face="Arial, Helvetica, sans-serif" color="#000000">Military
  Address Shipping</font> </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000099">
    <tr>
      <td align="left" valign="top"> 
        
        <table width="100%" border="0" cellspacing="0" cellpadding="4">
          <tr><td colspan="2" bgcolor="#000099"><p><strong><font size="3" face="Arial, Helvetica, sans-serif" color="#FFFFFF">Billing Information</font></strong></p></td></tr>
		  <tr>
            <td><p> 
                <input name="chkSame" type="checkbox" id="chkSame" tabindex="14" onclick="visible('billing_info');" value="y" <? if($_POST['goback'] == "yes") { if($Same == "y"){echo "checked";} }else{echo "checked";}?>>
                <font size="2" face="Arial, Helvetica, sans-serif">Billing Information 
                same as above</font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif">If the billing
                  information is different from your shipping
                  address, uncheck the box, and then fill out your billing information
                  below. </font></p>
			</td>
          </tr>
        </table>
		
		<div style=" <? if($_POST['goback'] == "yes") { if($Same != "y"){echo "display: ";}else{ echo "display:none"; } }else{echo "display:none";}?>" id = "billing_info">
		
		  <table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr align="left" valign="top"> 
              <td width="29%"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">First 
                Name </font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">*</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                <input name="txtFirstNameB" tabindex="15" type="text" id="txtFirstNameB" size="20" value="<? echo addQuote($FirstNameB);?>">
              </font> </td>
              <td width="71%"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Last 
                Name </font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">*</font></strong><br>
                <input name="txtLastNameB" tabindex="16" type="text" id="txtLastNameB" value="<? echo addQuote($LastNameB);?>">
              </font> </td>
            </tr>
            <tr align="left" valign="top"> 
              <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Address 
                </font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">*</font></strong><br>
                <input name="txtAddressB" tabindex="17" type="text" id="txtAddressB" value="<? echo addQuote($AddressB);?>">
              </font> </td>
            </tr>
            <tr align="left" valign="top"> 
              <td colspan="2"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr> 
                    <td width="29%" align="left" valign="top"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>City 
                      </strong></font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><br>
                      <input name="txtCityB" tabindex="18" type="text" id="txtCityB" size="15" value="<? echo addQuote($CityB);?>">
                    </font> </td>
                    <td width="32%" align="left" valign="top">
					<font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State </strong></font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><br>
                        <select name="txtStateB" tabindex="19" class="text" onChange="visible_stateB('state_otherB');">
                          <option value = "" selected>Please Select</option>
                          <?  
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
                          <option value="<? echo $row[State];?>" <? if($row[State] == $StateB){echo "selected";}?>><? echo $row[Name];?></option>
                          <?
						}
					?>
                          <option value = "ZZ" <? if($StateB == "ZZ"){echo "selected";}?>>Other</option>
                        </select>
                        
                      
					  <div style="<? if($_POST['goback'] == "yes") { if($State_OtherB == "ZZ"){echo "display:";}else{echo "display:none";} }else{echo "display:none";}?>" id = "state_otherB"> 
							  <p><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Enter 
								State </strong></font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong></font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><br>
								<input name="txtState_OtherB" tabindex="20" type="text" id="txtState_OtherB" size="15" value="<? echo $State_Other;?>">
						</font> </p>
					  </div>		
						
					</td>
                    <td width="39%" align="left" valign="top"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip 
                      Code </strong></font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><br>
                      <input name="txtZipCodeB" tabindex="21" type="text" id="txtZipCodeB" size="11" maxlength="10" value="<? echo $ZipCodeB;?>">
                    </font> </td>
                  </tr>
                </table></td>
            </tr>
            <tr align="left" valign="top">
              <td colspan="2"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Country 
                </strong></font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                </strong> 
                <select name="txtCountryB" tabindex="22" class="text" id="txtCountryB" >
                  <option value = "" selected>Please Select</option>
                  <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT *
								FROM tblShipLocation 
								WHERE LocationID != 242 AND LocationID != 243
								ORDER BY Name";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
                  <option value="<? echo $row[LocationID];?>" <? if($row[LocationID] == $CountryB){echo "selected";}else{if($_POST['goback'] != "yes") {if($row[LocationID] == "225"){echo "selected";}}}?>><? echo $row[Name];?></option>
                  <?
						}
					?>
                </select>
                <font color="#999999">(Residents of AK, GU, HI, MH, </font><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">MP, </font><font color="#999999">PW,
              PR, and VI, select &quot;United States Offshore&quot;.)</font> <strong><a href="qc.php" target="_blank"><img src="../images/quest.jpg" alt="Help with countries" width="17" height="14" border="0"></a></strong></font></td>
            </tr>
          </table>
		
		</div>
		
	  </td>
    </tr>
  </table> 
    <br>
    <input name='order1' type='hidden' id='order1' value='yes'>
<input name='weight' type='hidden' id='weight' value='<? echo "$Weight";?>'>
<input name='ShipCostID' type='hidden' id='ShipCostID' value='<? echo "$ShipCostID";?>'>

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
<input name='txtCheckNumber' type='hidden' id='txtCheckNumber' value='<? echo "$CheckNumber";?>'>
<!-- personal info -->
<input name='cboTest' type='hidden' id='cboTest' value='<? echo "$Test";?>'>
<input name='txtTestDate' type='hidden' id='txtTestDate' value='<? echo "$TestDate";?>'>
<input name='TestMonth' type='hidden' id='TestMonth' value='<? echo "$TestMonth";?>'>
<input name='TestDay' type='hidden' id='TestDay' value='<? echo "$TestDay";?>'>
<input name='TestYear' type='hidden' id='TestYear' value='<? echo "$TestYear";?>'>
<input name='txtSchool' type='hidden' id='txtSchool' value='<? echo "$School";?>'>
<input name='txtPrepClass' type='hidden' id='txtPrepClass' value='<? echo "$PrepClass";?>'>
<input name='txtPrepClass2' type='hidden' id='txtPrepClass2' value='<? echo "$PrepClass2";?>'>
<input name='cboReferredBy' type='hidden' id='cboReferredBy' value='<? echo "$ReferredBy";?>'>
<input name='txtPromotion' type='hidden' id='txtPromotion' value='<? if($WebPromotion != "yes"){echo "$PromotionID";}?>'>
<input name='txtOfficeCode' type='hidden' id='txtOfficeCode' value='<? echo "$OfficeCode";?>'>
<!-- Customer agrees to our terms and conditions by checking here... -->
<input name='Contract' type='hidden' id='Contract' value='<? echo "$Contract";?>'>
<br><input type="Submit" tabindex="23" name="Submit" value="Next &gt;">
</form>
<?
	mysql_close($link);
?>


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
?>