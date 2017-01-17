<?
//security for page
session_start();

//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

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

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


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



# ------------------------------------------------------------------------------------------------------------
#  Check inventory.  If have enough, display order page.  If DO NOT have enough, show pre-order page.
# ------------------------------------------------------------------------------------------------------------
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT WebInventory, Price FROM tblProduct WHERE ProductID = 1;";
	$result = mysql_query($sql) or die("Cannot execute query");
					
	while($row = mysql_fetch_array($result))
	{
		$number = $row[WebInventory];
		$price = $row[Price];
	}

	//if there are no timers left to sell, then don't let any more be ordered...send to Pre-order PAGE.
	if ($number <= 5)
	{
		header("location: outofstock/index.php");
	}
	
	mysql_close($link);
# ------------------------------------------------------------------------------------------------------------
#  // END - Check inventory.
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
	require "include/headerbottom.php";
}


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<? 
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
	
	# --------------------------------------------------------------------------------------------

// get info from confirm page if need to correct data.  this will fill in fields on this page.

		if($_POST['goback'] == "yes")
		{
			// --- *****
			// Grab all variables from order page and display for user.
				$Num = $_POST['cboNum'];
				$ShippingOption = $_POST['cboShippingOption'];
		   
			// -- Shipping Address Info -- ##
		
				$FirstName = $_POST['txtFirstName'];
				$LastName = $_POST['txtLastName'];
				$Address = $_POST['txtAddress'];
				$Address2 = $_POST['txtAddress2'];
				$City = $_POST['txtCity'];
				$State = $_POST['txtState'];
				$State_Other = $_POST['txtState_Other'];
				$ZipCode = $_POST['txtZipCode'];
				$Country = $_POST['txtCountry'];
				$ForeignShipping = $_POST['ForeignShipping'];
				
				$Phone = $_POST['txtPhone'];
				$Email = $_POST['txtEmail'];
		   
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
				$School = $_POST['txtSchool'];
				$PrepClass = $_POST['txtPrepClass'];
				$ReferredBy = $_POST['cboReferredBy'];
				
				$PromotionID = $_POST['txtPromotion'];
				$OfficeCode = $_POST['txtOfficeCode'];
				
				$Contract = $_POST['Contract'];
			}
?>


<script>
	
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
			
			// state
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
			
			if(document.frmOrder.txtCountry.value == "US")
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
			
			
			
			// Payment Information!!!!!!! ------------------------------
			//      if credit...then make sure filled out.  If Check, make sure filled out...
			
			if(!document.frmOrder.chkCheckPay.checked)
			{
		
				// -- credit card info -- ##
				
				if(document.frmOrder.cboCardType.value == "0")
				{
					if(eText != "")
					{
						eText = eText + ", and Credit Card Type";
					}
					else
					{
						eText = "Credit Card Type";
					}
					
					e = 1;	
				}
				
				if(document.frmOrder.txtCreditCardNo.value == "")
				{
					if(eText != "")
					{
						eText = eText + ", and Credit Card Number";
					}
					else
					{
						eText = "Credit Card Number";
					}
					
					e = 1;	
				}
				
				// valid credit card number - all numerical...............
				
				if(!IsNumeric(document.frmOrder.txtCreditCardNo.value))
				{
					if(eText != "")
					{
						eText = eText + ", and Valid Credit Card Number";
					}
					else
					{
						eText = "Valid Credit Card Number";
					}
					
					e = 1;
				}
				
				
				// Expiration Date Check
				
				var now = new Date();
				var month = now.getMonth() + 1;
				var year = (now.getYear()+"").substring(2,4);
	
				if (parseInt(document.frmOrder.cboExpYear.value,10) < parseInt(year,10))
				{
					if(eText != "")
					{
						eText = eText + ", and Credit Expiration Date";
					}
					else
					{
						eText = "Credit Expiration Date";
					}
	
					e = 1;
				}
				else
				{
					if (parseInt(document.frmOrder.cboExpYear.value,10) == parseInt(year,10))
					{
						if (parseInt(document.frmOrder.cboExpMonth.value) < parseInt(month))
						{
							if(eText != "")
							{
								eText = eText + ", and Credit Expiration Date";
							}
							else
							{
								eText = "Credit Expiration Date";
							}
							
							e = 1;	
						}
					}
				}
				
				if(document.frmOrder.txtCVV2.value == "")
				{
					if(eText != "")
					{
						eText = eText + ", and CVV2 Verification Number";
					}
					else
					{
						eText = "CVV2 Verification Number";
					}
					
					e = 1;	
				
				}
				else if(!IsNumeric(document.frmOrder.txtCVV2.value)) // valid CVV2 - all numerical...............
				{
					if(eText != "")
					{
						eText = eText + ", and Valid CVV2 Verification Number";
					}
					else
					{
						eText = "Valid CVV2 Verification Number";
					}
					
					e = 1;
				}
				else
				{
					
					if(document.frmOrder.cboCardType.value == "amex")
					{				
						if(document.frmOrder.txtCVV2.value.length != 4)
						{
							if(eText != "")
							{
								eText = eText + ", and Valid American Express (4 digit) CVV2 Number";
							}
							else
							{
								eText = "Valid American Express (4 digit) CVV2 Number";
							}
							
							e = 1;
						}
					}
					
					if(document.frmOrder.cboCardType.value == "visa")
					{				
						if(document.frmOrder.txtCVV2.value.length != 3)
						{
							if(eText != "")
							{
								eText = eText + ", and Valid Visa (3 digit) CVV2 Number";
							}
							else
							{
								eText = "Valid Visa (3 digit) CVV2 Number";
							}
							
							e = 1;
						}
					}
					
					if(document.frmOrder.cboCardType.value == "mastercard")
					{				
						if(document.frmOrder.txtCVV2.value.length != 3)
						{
							if(eText != "")
							{
								eText = eText + ", and Valid Mastercard (3 digit) CVV2 Number";
							}
							else
							{
								eText = "Valid Mastercard (3 digit) CVV2 Number";
							}
							
							e = 1;
						}
					}
					
					if(document.frmOrder.cboCardType.value == "discover")
					{				
						if(document.frmOrder.txtCVV2.value.length != 3)
						{
							if(eText != "")
							{
								eText = eText + ", and Valid Discover (3 digit) CVV2 Number";
							}
							else
							{
								eText = "Valid Discover (3 digit) CVV2 Number";
							}
							
							e = 1;
						}
					}
					
				} // end credit card stuff...
			
			} // start else statement for check fields
			else
			{
			
				if(document.frmOrder.txtBankName.value == "")
				{
					if(eText != "")
					{
						eText = eText + ", and Bank Name";
					}
					else
					{
						eText = "Bank Name";
					}
					
					e = 1;	
				}
			
				// valid ROUTING number - all numerical...............
				
				if(document.frmOrder.txtCheckRouting.value == "")
				{
					if(eText != "")
					{
						eText = eText + ", and Bank Routing Number";
					}
					else
					{
						eText = "Bank Routing Number";
					}
					
					e = 1;	
				}
				
				if(!IsNumeric(document.frmOrder.txtCheckRouting.value))
				{
					if(eText != "")
					{
						eText = eText + ", and Valid Bank Routing Number";
					}
					else
					{
						eText = "Valid Bank Routing Number";
					}
					
					e = 1;
				}
				
				// Valid Checking Account Number ... all numerical...
				
				if(document.frmOrder.txtCheckAccount.value == "")
				{
					if(eText != "")
					{
						eText = eText + ", and Bank Account Number";
					}
					else
					{
						eText = "Bank Account Number";
					}
					
					e = 1;	
				}
				
				if(!IsNumeric(document.frmOrder.txtCheckAccount.value))
				{
					if(eText != "")
					{
						eText = eText + ", and Valid Bank Account Number";
					}
					else
					{
						eText = "Valid Bank Account Number";
					}
					
					e = 1;
				}
				
				// Valid Check Number ... all numerical...
				
				if(document.frmOrder.txtCheckNumber.value == "")
				{
					if(eText != "")
					{
						eText = eText + ", and Check Number";
					}
					else
					{
						eText = "Check Number";
					}
					
					e = 1;	
				}
				
				if(!IsNumeric(document.frmOrder.txtCheckNumber.value))
				{
					if(eText != "")
					{
						eText = eText + ", and Valid Check Number";
					}
					else
					{
						eText = "Valid Check Number";
					}
					
					e = 1;
				}
			
			
			} // end check stuff
			
			// END PAYMENT INFORMATION ----------------------------------------------------------------------
			
			
			
			
		// Contract signed Check
		
			if(!document.frmOrder.chkContract.checked)
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

	function MM_openBrWindow(theURL,winName,features)
	{
	 	window.open(theURL,winName,features);
	}
	
	
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
	}
	

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
<table width="184" border="0" cellpadding="1" cellspacing="0">
  <tr> 
    <td width="30" valign="middle"><div align="center"><font face="Arial, Helvetica, sans-serif"><img src="pics/ssl_lock.gif" width="16" height="17" border="0">&nbsp;</font> 
        <strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"></font></strong></div></td>
    <td width="150" valign="middle"><div align="left"><font face="Arial, Helvetica, sans-serif"><font size=2 color=000000><strong><font color="#003399"><a href="#" onClick="MM_openBrWindow('secureorder.php','SecureOrder','scrollbars=yes,width=450,height=300')">Secure 
        Order Form</a></font></strong></font></font></div></td>
  </tr>
</table>
<div align="right">  </div>
<form action="confirm.php<? if($Custom=="yes"){echo "?a=$affiliateID";}?>" method="post" name="frmOrder" id="frmOrder" onSubmit="return CheckOrder();">
  <table width="100%" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="48%"><font color="#000099" size="4" face="Arial, Helvetica, sans-serif"><strong><font color="#000000" size="5">Payment 
        Information</font></strong></font><font color="#000000" size="5" face="Arial, Helvetica, sans-serif">&nbsp; 
        </font></td>
      <td width="52%"><div align="right"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="chkCheckPay" type="checkbox" id="chkCheckPay" value="y" onclick="visible('check'); visible('credit');" <? if($isCheck =="y"){echo "checked";}?>>
          <strong><font size="4">Want to Pay by Check? </font></strong><font color="#333333"><em>Check 
          here.</em></font></font></div></td>
    </tr>
  </table>
  
  <div style="display:<? if($isCheck == "y"){echo "none";}?>" id = "credit"> 
  
    <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000099">
      <tr>
      <td align="left" valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><font color="#000099" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt; 
              Credit Card</strong></font> </td>
            <td><div align="right"><img src="pics/visa-master-amex-disc.jpg" alt="The Silent Timer Accepts: VISA, MasterCard, AMEX, and Discover." width="171" height="23"></div></td>
          </tr>
        </table>
        <br>
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr align="left" valign="top"> 
            <td width="27%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Card 
              Type *</strong></font> <font size="2" face="Arial, Helvetica, sans-serif"><br>
              <select name="cboCardType" id="select4">
                <option value="0" selected>Select</option>
                <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql = "SELECT * FROM tblCreditCard";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot execute query!");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                <option value="<? echo $row[CardID]; ?>" <? if($row[CardID] == $CardType){echo "selected";}?>><? echo $row[CardName]; ?></option>
                <?
					}
				?>
              </select>
              </font></td>
            <td width="32%"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Card 
              Number *</strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
              <font color="#999999">(no spaces)</font><br>
              <input name="txtCreditCardNo" type="text" id="txtCreditCardNo"  value="<? echo $CreditCardNo;?>">
              </font></td>
            <td width="41%"><p><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Expiration 
                Date *</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                <select name="cboExpMonth" id="select5">
                  <option value="1" selected>01</option>
                  <option value="2" <? if($ExpMonth == "2"){echo "selected";}?>>02</option>
                  <option value="3" <? if($ExpMonth == "3"){echo "selected";}?>>03</option>
                  <option value="4" <? if($ExpMonth == "4"){echo "selected";}?>>04</option>
                  <option value="5" <? if($ExpMonth == "5"){echo "selected";}?>>05</option>
                  <option value="6" <? if($ExpMonth == "6"){echo "selected";}?>>06</option>
                  <option value="7" <? if($ExpMonth == "7"){echo "selected";}?>>07</option>
                  <option value="8" <? if($ExpMonth == "8"){echo "selected";}?>>08</option>
                  <option value="9" <? if($ExpMonth == "9"){echo "selected";}?>>09</option>
                  <option value="10" <? if($ExpMonth == "10"){echo "selected";}?>>10</option>
                  <option value="11" <? if($ExpMonth == "11"){echo "selected";}?>>11</option>
                  <option value="12" <? if($ExpMonth == "12"){echo "selected";}?>>12</option>
                </select>
                <? $year = date("Y"); ?>
                <? $year2 = date("y"); ?>
                <select name="cboExpYear" id="cboExpYear">
                  <option value="<? echo $year2; ?>" selected><? echo $year; ?></option>
                  <?
			  //this year plus 15 years... go into a loop.
			  $x = 1;
			  while ($x <= 10)
			  {
			  		$year = $year + 1;
					$year2 = $year2 + 1;	
		      ?>
                  <option value="<? if($year2<10){$year2 = "0$year2";} echo $year2; ?>" <? if($year2 == $ExpYear){echo "selected";}?>><? echo $year; ?></option>
                  <? 
		  	  		$x = $x + 1;
			  } 
		      ?>
                </select>
                </font></p></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="3"><TABLE WIDTH=100% BORDER=0 cellpadding=0 cellspacing=0>
                  <TR> 
                    <TD width="25%" ALIGN=RIGHT valign="top"> <div align="left"> 
                        <p><font face="Arial, Helvetica, sans-serif"><B><font color="#000033" size="2">CVV2 
                          # *</font></b>&nbsp; <br>
                          <INPUT NAME="txtCVV2" TYPE="text" id="txtCVV2" SIZE="5" maxlength=4  value="<? echo $CVV2;?>">
                          </FONT></p>
                        <font face="Arial, Helvetica, sans-serif"><b><font size="2"><a href="#" onClick="MM_openBrWindow('cvv2.php','','scrollbars=yes,width=640,height=480')">What 
                        is CVV2?</a></font></b></font> </div>
                      <div align="left"><font face="Arial, Helvetica, sans-serif"></font></div></TD>
                    <TD width="75%" ALIGN=RIGHT valign="bottom">
<div align="right"><font color="#333333" size="2" face="Arial, Helvetica, sans-serif"><strong><em>Pay 
                        with your checking account by clicking box above </em></strong></font><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">(USA 
                        only)</font><font color="#333333" size="2" face="Arial, Helvetica, sans-serif"><strong><em>. 
                        </em> </strong></font></div></TD>
                  </TR>
                </TABLE></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  
  </div>
  
  <div style="<? if($isCheck == "y"){echo "display:";}else{echo "display:none";}?>" id = "check">
  
    <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000099">
      <tr> 
      <td align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
              <td width="38%"><font color="#000099" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt; 
                eCheck</strong></font> <font color="#666666" size="2" face="Arial, Helvetica, sans-serif">(USA 
                Orders only)</font></td>
            <td width="62%"><div align="right"><img src="pics/e-check.jpg" alt="The SIlent Timer acceots eChecks!" width="68" height="23"></div></td>
          </tr>
        </table>
        <br> 
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr align="left" valign="top"> 
              <td width="35%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Bank 
                Name *</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                &nbsp;&nbsp;&nbsp; 
                <input name="txtBankName" type="text" id="txtBankName"  value="<? echo $BankName;?>" size="20">
                </font></td>
              <td width="34%" valign="top"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp; 
                </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Account 
                Type *</strong></font><br> <table width="100%" border="0" cellspacing="0" cellpadding="4">
                  <tr> 
                    <td width="46%"><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="AccountType" type="radio" value="checking" checked>
                      Checking </font></td>
                    <td width="54%"><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input type="radio" name="AccountType" value="savings" <? if($AccountType == "savings"){echo "checked";}?>>
                      Savings</font></td>
                  </tr>
                </table></td>
              <td width="31%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
            </tr>
            <tr align="left" valign="top"> 
              <td colspan="3"><TABLE WIDTH=100% BORDER=0 cellpadding=0 cellspacing=0>
                  <TR> 
                    <TD width="35%" ALIGN=RIGHT valign="top"> <div align="left"> 
                        <p><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp; 
                          </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&nbsp;Routing 
                          Number *</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                          <img src="pics/chk-rout-sym-l.gif" width="12" height="17"> 
                          <input name="txtCheckRouting" type="text" id="txtCheckRouting2"  value="<? echo $CheckRouting;?>" size="15">
                          <img src="pics/chk-rout-sym-l.gif" width="12" height="17"></font></p>
                        <font face="Arial, Helvetica, sans-serif"><b><font size="2"><a href="#" onClick="MM_openBrWindow('sample_check.php','','scrollbars=yes,width=640,height=450')">Click 
                        for an Example Check</a></font></b></font></div>
                      <div align="left"><font face="Arial, Helvetica, sans-serif"></font></div></TD>
                    <TD width="34%" ALIGN=RIGHT valign="top"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp; 
                        </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&nbsp;&nbsp;Account 
                        Number *</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                        <img src="pics/chk-acc-symbol-left.gif" width="12" height="17"> 
                        <input name="txtCheckAccount" type="text" id="txtCheckAccount2"  value="<? echo $CheckAccount;?>" size="15">
                        <img src="pics/chk-acc-symbol-left.gif" width="12" height="17"> 
                        </font></div></TD>
                    <TD width="31%" ALIGN=RIGHT valign="top"> 
                      <div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Check 
                        Number *</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                        <input name="txtCheckNumber" type="text" id="txtCheckNumber2"  value="<? echo $CheckNumber;?>" size="6">
                        </font></div></TD>
                  </TR>
                </TABLE></td>
            </tr>
          </table></td>
    </tr>
  </table>
  
  </div>
  
  <table width="300" border="0" cellpadding="1" cellspacing="0">
    <tr> 
      <td width="30" valign="middle"><div align="center"><font face="Arial, Helvetica, sans-serif"><img src="pics/ssl_lock.gif" width="16" height="17" border="0">&nbsp;</font> 
          <strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"></font></strong></div></td>
      <td width="266" valign="middle"><div align="left"><font face="Arial, Helvetica, sans-serif"><font size=2 color=000000><strong><font color="#003399"><a href="#" onClick="MM_openBrWindow('secureorder.php','SecureOrder','scrollbars=yes,width=450,height=300')">Your 
          Order is SECURE</a></font></strong></font></font></div></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000099">
    <tr> 
      <td align="left" valign="top"> <font color="#000099" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt; 
        Promotional Code</strong></font> <br>
        <br> 
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr align="left" valign="top"> 
            <td><p><font size="2" face="Arial, Helvetica, sans-serif">If you have 
                a promotional code, enter it below. Your discounts will be shown 
                on your confirmation page.</font></p>
              <p><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong> 
                Promotional Code</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                <input name="txtPromotion" type="text" id="txtPromotion"  value="<? echo $PromotionID;?>">
                </font></p>
            </td>
          </tr>
        </table></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000099">
    <tr>
      <td align="left" valign="top"> 
        <p><font color="#000099" size="3" face="Arial, Helvetica, sans-serif"><strong> 
          &nbsp; &gt; Your Information</strong></font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr align="left" valign="top"> 
            <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>By 
                filling out this information, we can better serve you.</strong></font></p>
            </td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif">Which test 
              will you be using <font color="#000033"><strong>The Silent Timer</strong></font> 
              for?<br>
              <select name="cboTest" id="cboTest">
                <option value="" selected>Test</option>
                <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql = "SELECT * FROM tblTests ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot execute query!");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                <option value="<? echo $row[TestID]; ?>" <? if($row[TestID] == $Test){echo "selected";}?><? if($row[Name] == $tURL){echo "selected";}?>><? echo $row[Name]; ?></option>
                <?
					}
				?>
              </select>
              </font></td>
          </tr>
          <tr align="left" valign="top">
            <td><font size="2" face="Arial, Helvetica, sans-serif">When is your 
              test date?<br>
              <SCRIPT LANGUAGE="JavaScript">
				var now = new Date();
				var calendar = new CalendarPopup("calendarDiv");
			  </SCRIPT>
              <a name="calendarPosition" id="calendarPosition"> </a> 
              
			  <? 
			 	 	#split up year, month, and day into seperate variables...
			  		
					$TestDate = explode("-",$TestDate);
					
					$TestMonth = $TestDate[1];
					$TestDay = $TestDate[2];
					$TestYear = $TestDate[0];
			  
			  ?>
              
			  <select name="TestMonth" id="TestMonth">
			  	<? $month = date("m"); ?>
				
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
              
			  
			  
                <select name="TestDay" id="TestDay">
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
			  
              
			  
			 
                <select name="TestYear" id="TestYear">
					 
					 <? $year = date("Y"); 
               	 		$year2 = date("y"); ?>
				
                  <option value="<? echo $year; ?>" selected><? echo $year; ?></option>
                  <?
			  //this year plus 15 years... go into a loop.
			  $x = 1;
			  while ($x <= 5)
			  {
			  		$year = $year + 1;
					$year2 = $year2 + 1;	
		      ?>
                  <option value="<? echo $year; ?>" <? if($year == $TestYear){echo "selected";}?>><? echo $year; ?></option>
                  <? 
		  	  		$x = $x + 1;
			  } 
		      ?>
                </select>
			  
			  
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif">What school 
              or college are you attending, if any?<br>
              <input name="txtSchool" type="text" id="txtSchool" value="<? echo addQuote($School);?>">
              </font></td>
          </tr>

		  <?
		  	if($Custom != "yes")
			{
		  ?>
		  <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif">Are you taking 
              a prep-class to prepare for your test? If so, who are you taking?<br>
              <input name="txtPrepClass" type="text" id="txtPrepClass" value="<? echo addQuote($PrepClass);?>">
              </font>
			</td>
          </tr>
		  <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif">Where did you 
              hear about <font color="#000033"><strong>The Silent Timer</strong></font>?<br>
              <select name="cboReferredBy" id="select9">
                <option value="0" selected>Select</option>
                <option value="prep class" <? if($ReferredBy == "prep class"){echo "selected";}?>>Your Prep Class</option>
                <option value="friend" <? if($ReferredBy == "friend"){echo "selected";}?>>Friend</option>
                <option value="collegebound email" <? if($ReferredBy == "collegebound email"){echo "selected";}?>>CollegeBound Email</option>
                <option value="collegebound magazine" <? if($ReferredBy == "collegebound magazine"){echo "selected";}?>>CollegeBound Magazine</option>
                <option value="search engine" <? if($ReferredBy == "search engine"){echo "selected";}?>>Search Engine</option>
                <option value="radio" <? if($ReferredBy == "radio"){echo "selected";}?>>Radio</option>
                <option value="newspaper" <? if($ReferredBy == "newspaper"){echo "selected";}?>>Newspaper</option>
                <option value="tv" <? if($ReferredBy == "tv"){echo "selected";}?>>TV</option>
              </select>
              </font>
			</td>
          </tr>
		  <?
		  	}
		  ?>
        </table>
      </td>
    </tr>
  </table>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Check all your 
    information and make sure it is correct. Click <font color="#000099">&quot;Order 
    Timer&quot; </font>when the form is complete.</strong></font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
    <input name="chkContract" type="checkbox" id="chkContract" value="y" <? if ($Contract == "y"){echo "checked";}?>>
    </strong>By checking this box you agree to our <a href="<? echo $http; ?>legal/termscontract.php" target="_blank">Terms 
    and Conditions</a>.</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong></font><font size="2" face="Arial, Helvetica, sans-serif"></font><font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
    </strong></font></p>
  <p> 
    <input name="Order" type="submit" id="Order" value="Order Timer">
    &nbsp;&nbsp;
    <input type="reset" name="Submit3" value="Reset Form">
  </p>
  <table border="0" cellspacing="0" cellpadding="1">
    <tr> 
      <td valign="middle"><div align="center"><font face="Arial, Helvetica, sans-serif"><img src="pics/ssl_lock.gif" width="16" height="17" border="0">&nbsp;</font> 
          <strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"></font></strong></div></td>
      <td valign="middle"><div align="center"><font face="Arial, Helvetica, sans-serif"><font size=2 color=000000><strong><font color="#003399"><a href="#" onClick="MM_openBrWindow('secureorder.php','SecureOrder','scrollbars=yes,width=450,height=300')">Secure 
          Order</a></font></strong></font></font></div></td>
    </tr>
  </table>
<p>&nbsp;</p></form>
  
	
<?
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