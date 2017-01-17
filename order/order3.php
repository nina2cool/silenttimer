<?
//security for page
session_start();

//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

$PageTitle = "Step 3: Payment Information";

#check if shopping cart is empty
if (session_is_registered('ShoppingCart'))
{
}
else
{
header("location: https://www.silenttimer.com/product.php");
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
# -----------------------------------------------------------------------------------------------------------



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

		if($_POST['goback'] == "yes")
		{
			// --- *****
			// Grab all variables from order page and display for user.
				$Weight = $_POST['weight'];
				$ShipCostID = $_POST['ShipCostID'];
		   
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
				$School = $_POST['txtSchool'];
				$PrepClass = escapeQuote($_POST['txtPrepClass']);
				$PrepClass2 = $_POST['txtPrepClass2'];
				$ReferredBy = $_POST['cboReferredBy'];
				
				$PromotionID = $_POST['txtPromotion'];
				$OfficeCode = $_POST['txtOfficeCode'];
				
				$Contract = $_POST['Contract'];
			}
			
// get info from order2 page 

		if($_POST['order2'] == "yes")
		{
			// --- *****
			// Grab all variables from order page and display for user.
		 		$Weight = $_POST['weight'];
				$ShipCostID = $_POST['ShipCostID'];
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
				$School = $_POST['txtSchool'];
				$PrepClass = escapeQuote($_POST['txtPrepClass']);
				$PrepClass2 = $_POST['txtPrepClass2'];
				$ReferredBy = $_POST['cboReferredBy'];
				
				$PromotionID = $_POST['txtPromotion'];
				$OfficeCode = $_POST['txtOfficeCode'];
				
				$Contract = $_POST['Contract'];
			
			}
			
?>

<script>

// this code hides and shows content on the page like the check ordering info...
	function visible_state(content)
	{
	  if(document.frmOrder.txtPrepClass2.value == "Other")
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
	
	
	
	
	// ------------------------------------------------------------------------ #
	//         Error Checking          ---------------------------------------- #
	// ------------------------------------------------------------------------ #
	
	function IsNumeric(sText)
	{
		var ValidChars = "0123456789 ";
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
			
		// check for referred by	
		if(document.frmOrder.cboReferredBy.value == "")
				{
					if(eText != "")
					{
						eText = eText + ", and Where you heard about Silent Timer";
					}
					else
					{
						eText = "Where you heard about Silent Timer";
					}
					
					e = 1;	
					
				}
				
		// Test 
		if(document.frmOrder.cboTest.value == "")
				{
					if(eText != "")
					{
						eText = eText + ", and Test your taking";
					}
					else
					{
						eText = "Test your taking";
					}
					
					e = 1;	
					
				}
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
<p><strong><font size="1" face="Arial, Helvetica, sans-serif">Step1: Shipping/
      Billing Info </font><font size="1">| <font color="#000000" face="Arial, Helvetica, sans-serif">Step2:
      Select Shipping Option</font></font><font size="1" face="Arial, Helvetica, sans-serif"> | <font color="#FF0000" size="2">Step
      3: Payment Information</font> | Step4: Submit Order</font> </strong></p>
<table width="184" border="0" align="right" cellpadding="1" cellspacing="0">
  <tr>
    <td width="30" valign="middle"><div align="center"><font face="Arial, Helvetica, sans-serif"><img src="pics/ssl_lock.gif" width="16" height="17" border="0">&nbsp;</font> </div></td>
    <td width="150" valign="middle"><div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('secureorder.php','SecureOrder','scrollbars=yes,width=450,height=300')">Secure
              Order Form</a></strong></font></div></td>
  </tr>
</table>
<form action="order2.php" method="post" name="frmBack" id="frmBack">
  <input name="Back" type="submit" id="Back" value="&lt; Go Back">
  <input name='order1' type='hidden' id='order1' value='yes'>
<input name='goback' type='hidden' id='goback' value='yes'>
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
<p><strong><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif">
<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#003399">
      <tr> <td align="left" valign="top" bgcolor="#000099" colspan="4">
      <font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong>Shopping Cart</strong></font></td></tr>
		<tr bgcolor="#CCCCCC">
          <td >
          <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Qty</strong></font></div></td>
          <td ><div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Description</font></strong></div></td>
          <td >
          <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Price</strong></font></div></td>
          <td >
          <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Total</strong></font></div></td>
        </tr>
        <?
 # loop out all shopping cart items
			for($i=0; $i < count($ShoppingCart); $i++)
			{
				
				if($ShoppingCart[$i][0] != "")
				{				
					# get current product from the cart...
					$ProductID = $ShoppingCart[$i][0];
					$Num_Ordered = $ShoppingCart[$i][1];
					$ProductWeight = $ShoppingCart[$i][2];
					 
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
					# end while	
					}
					?>
        <tr>
          <td><div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">
		  <form action="order2.php" method="post" name="frmUpdate" id="frmUpdate">
					  
					 
					<? # Check inventory for enough product
					$test = $Num_Ordered + 5;
					if ($WebInventory >= $test ){?>
					<input name="quantity" type="text" id="quantity" value="<? echo $Num_Ordered;?>" size="3">
					<? }
					else
					{
						$Num_Ordered = $WebInventory - 5; 
						$ShoppingCart[$i][1] = $Num_Ordered;
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
                      <input name="Update" type="image" id="Update" value="Update" src="../images/cartupdate.jpg" alt="Update" width="81" height="26">
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
		
		<form action="order2.php" method="post" name="frmRemove" id="frmRemove">
		<input name="Remove" type="image" id="Remove" value="Remove" src="../images/cartremove.jpg" alt="Remove" width="85" height="25">
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
					
					</font></div></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><b><? echo $ProductName; ?></b></font></td>
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($OnlinePrice, 2); ?></font></div></td>
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? $ProductTotal = $Num_Ordered*$OnlinePrice;
					echo number_format($ProductTotal, 2); ?>
          </font></div></td>
        </tr>
        <? 
				$TotalWeight += $ProductWeight;
				$Total += $ProductTotal;
				# end if	
				}
				
			# end for	
			}
	#get shipping info
	$sql = "SELECT * FROM tblShippingCost5 WHERE ShipCostID='$ShipCostID'";
	$result = mysql_query($sql) or die("Cannot get Shipping Information.  Please try again. <br>$sql<br>");
	$row = mysql_fetch_array($result);
	
	$ShipCost = $row[Cost];
	$ShipperID = $row[ShipperID];
	$ShippingOptionID = $row[ShippingOptionID];
	
	#get shipper
	$sql = "SELECT * FROM tblShipper WHERE ShipperID = $ShipperID";
	$result = mysql_query($sql) or die("Cannot get Shipper Information.  Please try again. <br>$sql<br>");
	$row = mysql_fetch_array($result);
	
	$Shipper = $row[CompanyName];
	
	#get ship option 
	$sql = "SELECT * FROM tblShippingOption2 WHERE ShippingOptionID = $ShippingOptionID";
	$result = mysql_query($sql) or die("Cannot get Ship Option Information.  Please try again. <br>$sql<br>");
	$row = mysql_fetch_array($result);
	
	$ShippingOption = $row[ShippingOption];
	
	#Calculate Tax if in TX


			if ($txtState == 'TX')
			{
				$sql = "SELECT * FROM tblValues WHERE Name ='Tax'";
				$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
				$row = mysql_fetch_array($result);
				$Tax =  $row[Value];
				$TaxTotal = ($Total + $ShipCost) * $Tax;
			}	

	
	$GrandTotal = $ShipCost + $Total + $TaxTotal - $Discount;
?>
        <tr >
          <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Subtotal </strong></font></td>
          <td>
          <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($Total, 2);?></strong></font></div></td>
        </tr>
<? if ($Discount != ""){?> <tr >
          <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Discount</strong></font></td>
          <td>
          <div align="center"><font size="2" face="Arial, Helvetica, sans-serif" color="#FF0000"><strong>-$<? echo number_format($Discount, 2);?></strong></font></div></td>
        </tr><? } ?>
		<tr >
          <td colspan="3"><font  size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping Total:</strong> <? echo $Shipper; ?> - <? echo $ShippingOption; ?></font>
</td>
          <td><div align="center"><font  size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($ShipCost, 2);?></strong></font></div></td>
        </tr>
        <tr >
          <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Tax</strong></font></td>
          <td>
          <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($TaxTotal, 2);?></strong></font></div></td>
        </tr>
        
        <tr>
          <td colspan="3"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>Total</strong></font>
</td>
          <td><div align="center"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($GrandTotal, 2);?></strong></font></div></td>
        </tr>
</table>


<p><font color ="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Please choose from the following payment options available. Fields marked with <font color="#FF0000">*</font> are required. </strong></font></p>
<form action="order4.php<? if($Custom=="yes"){echo "?a=$affiliateID";}?>" method="post" name="frmOrder" id="frmOrder" onSubmit="return CheckOrder();">
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="48%"><font color="#000099" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt; Payment Options </strong></font></td>
      <td width="52%"><div align="right"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif">
        <input name="chkCheckPay" type="checkbox" id="chkCheckPay" value="y" onClick="visible('check'); visible('credit');" <? if($isCheck =="y"){echo "checked";}?>>          
        <strong><font size="3">Want to Pay by Check? </font></strong><font color="#333333"><em>Check 
          here.</em></font></font></div></td>
    </tr>
  </table>
  
  <div style="display:<? if($isCheck == "y"){echo "none";}?>" id = "credit"> 
  
    <table width="100%" border="0" cellpadding="2" cellspacing="0" bordercolor="#000099">
      <tr>
      <td align="left" valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td bgcolor="#000099"><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong> 
              Credit Card</strong></font> </td>
          </tr>
		  <tr><td><div align="right"><img src="pics/visa-master-amex-disc.jpg" alt="The Silent Timer Accepts: VISA, MasterCard, AMEX, and Discover." width="171" height="23"></div></td></tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr align="left" valign="top"> 
            <td width="27%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Card 
              Type <font color="#FF0000">*</font></strong></font> <font size="2" face="Arial, Helvetica, sans-serif"><br>
              <select name="cboCardType" tabindex="1" id="cboCardType">
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
            <td width="32%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Card 
              Number <font color="#FF0000">*</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
              <font color="#999999">(no spaces)</font><br>
              <input name="txtCreditCardNo" tabindex="2" type="text" id="txtCreditCardNo"  value="<? echo $CreditCardNo;?>">
</font></td>
            <td width="41%"><p><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Expiration 
                Date <font color="#FF0000">*</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                <select name="cboExpMonth" tabindex="3" id="select5">
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
                <select name="cboExpYear" tabindex="4" id="cboExpYear">
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
                          # <font color="#FF0000">*</font></font></b><font color="#FF0000">&nbsp;</font> <br>
                          <INPUT NAME="txtCVV2" tabindex="5" TYPE="text" id="txtCVV2" SIZE="5" maxlength=4  value="<? echo $CVV2;?>">
                        </FONT></p>
                        <font size="2" face="Arial, Helvetica, sans-serif"><b><a href="#" onClick="MM_openBrWindow('cvv2.php','','scrollbars=yes,width=640,height=480')">What
                        is CVV2?</a></b></font> </div>
                      </TD>
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
  
    <table width="100%" border="0" cellpadding="2" cellspacing="0" bordercolor="#000099">
      <tr> 
      <td align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
              <td width="38%" bgcolor="#000099"><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong>
                eCheck</strong></font> <font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">(USA 
                Orders only)</font></td>
            </tr>
		  <tr>
		  <td width="62%"><div align="right"><img src="pics/e-check.jpg" alt="The Silent Timer accepts eChecks!" width="68" height="23"></div></td>
      
		  </tr>
        </table>
     
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr align="left" valign="top"> 
              <td width="35%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Bank 
                Name <font color="#FF0000">*</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                &nbsp;&nbsp;&nbsp; 
                <input name="txtBankName" tabindex="6" type="text" id="txtBankName"  value="<? echo $BankName;?>" size="20">
              </font></td>
              <td width="34%" valign="top">                <font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Account 
                Type <font color="#FF0000">*</font></strong></font><br> 
                <table width="100%" border="0" cellspacing="0" cellpadding="4">
                  <tr> 
                    <td width="46%"><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="AccountType" tabindex="7" type="radio" value="checking" checked>
                      Checking </font></td>
                    <td width="54%"><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input type="radio" tabindex="8" name="AccountType" value="savings" <? if($AccountType == "savings"){echo "checked";}?>>
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
                          Number<font color="#FF0000"> *</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                          <img src="pics/chk-rout-sym-l.gif" width="12" height="17"> 
                          <input name="txtCheckRouting" tabindex="9" type="text" id="txtCheckRouting2"  value="<? echo $CheckRouting;?>" size="15">
                        <img src="pics/chk-rout-sym-l.gif" width="12" height="17"></font></p>
                        <font size="2" face="Arial, Helvetica, sans-serif"><b><a href="#" onClick="MM_openBrWindow('sample_check.php','','scrollbars=yes,width=640,height=450')">Click
                        for an Example Check</a></b></font></div>
                      </TD>
                    <TD width="34%" ALIGN=RIGHT valign="top"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp; 
                        </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&nbsp;&nbsp;Account 
                        Number <font color="#FF0000">*</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                        <img src="pics/chk-acc-symbol-left.gif" width="12" height="17"> 
                        <input name="txtCheckAccount" tabindex="10" type="text" id="txtCheckAccount2"  value="<? echo $CheckAccount;?>" size="15">
                        <img src="pics/chk-acc-symbol-left.gif" width="12" height="17"> 
                        </font></div></TD>
                    <TD width="31%" ALIGN=RIGHT valign="top"> 
                      <div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Check 
                        Number<font color="#FF0000"> *</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                        <input name="txtCheckNumber" tabindex="11" type="text" id="txtCheckNumber2"  value="<? echo $CheckNumber;?>" size="6">
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
          </div></td>
      <td width="266" valign="middle"><div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('secureorder.php','SecureOrder','scrollbars=yes,width=450,height=300')">Your
                Order is SECURE</a></strong></font></div></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="0" cellpadding="2" cellspacing="0" bordercolor="#000099">
    <tr> 
      <td align="left" valign="top" bgcolor="#000099"> <font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong> Promotion
            Code</strong></font> 
	  </td>
    </tr>
		<tr>
		<td>
        <br> 
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr align="left" valign="top"> 
            <td><p><font size="2" face="Arial, Helvetica, sans-serif">If you
                  have  a promotion code, enter it below. Your discounts will
                  be shown  on the confirmation page.</font></p>
              <p><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong> 
                Promotion Code</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                <input name="txtPromotion" tabindex="12" type="text" id="txtPromotion"  value="<? echo $PromotionID;?>">
                </font></p>
            </td>
          </tr>
        </table></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="0" cellpadding="2" cellspacing="0" bordercolor="#000099">
    <tr>
      <td align="left" valign="top" bgcolor="#000099"> 
        <p><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong> 
           Your Information</strong></font></p></td></tr>
		  <tr><td>
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr align="left" valign="top"> 
            <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>By 
                filling out this information, we can better serve you. Fields marked with <font color="#FF0000">*</font> are required. </strong></font></p>
            </td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif">Which test
                 are you preparing for? <strong><font color="#FF0000">*</font></strong><br>
              <select name="cboTest" tabindex="13" id="cboTest">
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
			  		
					/* $TestDate = explode("-",$TestDate);
					
					$TestMonth = $TestDate[1];
					$TestDay = $TestDate[2];
					$TestYear = $TestDate[0]; */
			  
			  ?>
              
			  <select name="TestMonth" tabindex="14" id="TestMonth">
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
              
			  
			  
                <select name="TestDay" tabindex="15" id="TestDay">
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
			  
              
			  
			 
                <select name="TestYear" tabindex="16" id="TestYear">
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
			  
			  
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif">What school 
              or college are you attending, if any?<br>
              <input name="txtSchool" tabindex="17" type="text" id="txtSchool" value="<? echo addQuote($School);?>">
              <font color="#666666" size="2" face="Arial, Helvetica, sans-serif"><strong> DO NOT use apostrophes.</strong></font></font></td>
          </tr>

		  <?
		  	if($Custom != "yes")
			{
		  ?>
		  <tr align="left" valign="top"> 
            <td><p><font size="2" face="Arial, Helvetica, sans-serif">If you are taking a prep class, who are you taking?<br>
			        <select name="txtPrepClass2" tabindex="18" class="text" onChange="visible_state('PrepClass');">
			          <option value="None" selected>Select</option>
					  <?     
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql = "SELECT * FROM tblPrepClass ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot execute query!");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                      <option value="<? echo $row[Name]; ?>" <? if($row[Name] == $PrepClass2){echo "selected";} ?> ><? echo $row[Name]; ?></option>
                      <?
					}
				?>
                    </select>
					
              </font></p>
			  <div style="<? if($_POST['goback'] == "yes") { if($PrepClass2 == "Other"){echo "display:";}else{echo "display:none";} }else{echo "display:none";}?>" id = "PrepClass"> 
             <font size="2" face="Arial, Helvetica, sans-serif">Enter Prep Class: <br>
                <input name="txtPrepClass" tabindex="19" type="text" id="txtPrepClass" value="<? echo addQuote($PrepClass);?>">
              </font>     <font size="2" face="Arial, Helvetica, sans-serif"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif"><strong> DO NOT use apostrophes.</strong></font></font></div>        </td>
          </tr>
		  <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif">Where did
                you  hear about <font color="#000033"><strong>SilentTimer.com</strong></font>? <font color="#FF0000"><strong>*</strong></font><br>
			   <select name="cboReferredBy" tabindex="20" id="cboReferredBy" class="text">
                <option value="" selected>Select</option>
                <? 
					$sql = "SELECT * FROM tblReferredBy WHERE Status = 'active'";
					
					$result = mysql_query($sql) or die("Cannot get ReferredBy");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                <option value="<? echo $row[ReferredByID]; ?>" <? if($row[ReferredByID] == $ReferredBy){echo "selected";}?>><? echo $row[Name]; ?></option>
                <?
					}
					
						
					
					
				?>					
              </select>
            </font>			</td>
          </tr>
		  <?
		  	}
		  ?>
        </table>
      </td>
    </tr>
  </table>
  <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Check
        all your information and make sure it is correct. Click &quot;<font color="#003399">Next &gt;</font> &quot; when
    the form is complete.</strong></font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="chkContract" tabindex="21" type="checkbox" id="chkContract" value="y" <? if ($Contract == "y"){echo "checked";}?>>
    <font color="#000000">By checking this box you agree to our <a href="<? echo $http; ?>legal/termscontract.php" target="_blank">Terms 
  and Conditions</a>.</font></font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>*</strong></font></p>
  <p>
  <font size="2" face="Arial, Helvetica, sans-serif"><strong>
  	
	<input name='order3' type='hidden' id='order3' value='yes'>
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
    <input name="Order" tabindex="22" type="submit" id="Order2" value="Next &gt;" >
 </strong></font>  
  </p>
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