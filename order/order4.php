<?
//security for page
session_start();

//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

$PageTitle = "Step 4: Submit Order";


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
# link to DB for page calls to it.
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
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
	function escapePound($var)
	{
		if (isset($var))
		{
			$string = str_replace("#","NUM",$var);
		}

		return $string;
	}
	
	
	
	# --------------------------------------------------------------------------------------------


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
				$School = escapeQuote($_POST['txtSchool']);
				$PrepClass = Capitalize(strtolower(escapeQuote($_POST['txtPrepClass'])));
				$PrepClass2 = $_POST['txtPrepClass2'];
				
				if ($PrepClass2 == "Other" AND $PrepClass != "")
				{
					$PrepDisplay = $PrepClass; 
				}
				else
				{
					$PrepDisplay = $PrepClass2; 
				}
				
				$ReferredBy = $_POST['cboReferredBy'];
				
				$PromotionID = $_POST['txtPromotion'];
				$OfficeCode = $_POST['txtOfficeCode'];
				
				$Contract = $_POST['Contract'];
?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

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

?>

<p><strong><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">Step1:
      Shipping/ Billing Info </font><font size="1">| <font color="#000000" face="Arial, Helvetica, sans-serif">Step2:
      Select Shipping Option</font></font><font size="1" face="Arial, Helvetica, sans-serif"> |
Step3: Payment Information |<font color="#FF0000" size="2"> Step 4: Submit Order</font></font></strong></p>
<table width="184" border="0" align="right" cellpadding="1" cellspacing="0">
  <tr>
    <td width="30" valign="middle"><div align="center"><font face="Arial, Helvetica, sans-serif"><img src="pics/ssl_lock.gif" width="16" height="17" border="0">&nbsp;</font> </div></td>
    <td width="150" valign="middle"><div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('secureorder.php','SecureOrder','scrollbars=yes,width=450,height=300')">Secure
              Order Form</a></strong></font></div></td>
  </tr>
</table>
<form action="order3.php<? if($Custom=="yes"){echo "?a=$affiliateID";}?>" method="post" name="frmBack" id="frmBack">
  <div align="left">
          
          <input name="Back" type="submit" id="Back" value="&lt; Go Back">
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
          <input name='CountryName' type='hidden' id='CountryName' value='<? echo "$CountryName";?>'>
          <input name='ckForeignShipping' type='hidden' id='ckForeignShipping' value='<? echo "$Foreign";?>'>
			<input name='ckMilitary' type='hidden' id='ckMilitary' value='<? echo "$Military";?>'>
			<input name='ckPOBox' type='hidden' id='ckPOBox' value='<? echo "$POBox";?>'>
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
          <input name='Contract' type='hidden' id='Total' value='<? echo "$Contract";?>'>
          <!-- these suckers pass some values to the next page in order to validate receipt -->
          <input name='goback' type='hidden' id='goback' value='yes'>
  </div>
</form>
<p><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><strong>YOUR
      ORDER IS NOT YET COMPLETE! </strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Confirm your order information
      below. If there are any errors, please press <strong><font color="#FF0000">&quot;&lt; Go
      Back&quot;</font></strong>, to fix them. <strong>Click <font color="#003399">&quot;Complete
      Order &quot;<font color="#000000"> to complete your transaction</font></font><font color="#000000">.</font></strong></font></p>
<table width="100%" border="0" cellpadding="4" cellspacing="0" bordercolor="#003399">
  <tr>
      <td width="40%" align="left" valign="top" bgcolor="#003399"><div align="center"><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong>Order Summary</strong></font> </div></td>
  </tr>
 <tr><td>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
        <tr bgcolor="#CCCCCC">
          <td >
          <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Qty</strong></font></div></td>
          <td ><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Description</font></strong></td>
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
	$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
	$row = mysql_fetch_array($result);
	
	$ShipCost = $row[Cost];
	
	#Calculate Tax if in TX


			if ($txtState == 'TX')
			{
				$sql = "SELECT * FROM tblValues WHERE Name ='Tax'";
				$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
				$row = mysql_fetch_array($result);
				$Tax =  $row[Value];
				$TaxTotal = ($Total + $ShipCost) * $Tax;
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
				$Discount = $Total * $PromoAmount;
				$Discount = number_format($Discount, 2);
				
				
				
						if ($txtState == 'TX')
						{
							$sql = "SELECT * FROM tblValues WHERE Name ='Tax'";
							$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
							$row = mysql_fetch_array($result);
							$Tax =  $row[Value];
							$TaxTotal = ($Total + $ShipCost) * $Tax;
						}	
					
				
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
					
					$ShipCost = 0;
					$ShipCostID = 0;
					$Type = "No Shipment Necessary";
					
					$promoNotes .= "$pDescription<br>";
					
				}
				else if($pName == 'tax')
				{
					$TaxTotal = 0;
				
					$promoNotes .= "$pDescription<br>";
					
				}
				else if($pName == 'percent')
				{
					# person has a promotion to get a percent off of the total price... give it to them...
					$Discount = $Total * $pAmount;
					$Discount = number_format($Discount, 2);
					
					if ($txtState == 'TX')
						{
							$sql = "SELECT * FROM tblValues WHERE Name ='Tax'";
							$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
							$row = mysql_fetch_array($result);
							$Tax =  $row[Value];
							$TaxTotal = ($Total - $Discount + $ShipCost) * $Tax;
						}	
					
										
					$TextDiscount = $pAmount * 100;
					$promoNotes .= "$TextDiscount% off!<br>";
				}
				else if($pName == 'affiliate')
				{
					# this Promo code belongs to an affiliate, make proper arrangements to give that person credit.
					# Store their code for the next page.
					#If they are local (y), then ask if they want to pick it up.
					
					$sql = "SELECT Approved FROM tblAffiliate WHERE AffiliateID = '$pAffiliateID'";
					$result = mysql_query($sql) or die("Cannot validate partner order, please call 512-340-0338 for assistance.");
						
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

					}
				}				
			
				$i++;
			}// end of looping through promotions	
		
		}
		else // oops, there is no promotion for this code...
		{
			$promoNotes = "Invalid Code";
			?> <script> alert("The promotional code entered is invalid."); </script><?
		} // end if promotion code is valid
	
	} // end of promotion code check if a code is entered...
	
	# ------------------------------------------------------------------------------------------------
	#  end of promotional code
	# ------------------------------------------------------------------------------------------------
	
	
	if($PromotionID == "tproffer") { $promoNotes = "FREE bonus timer!"; }
	if($PromotionID == "kaplanoffer") { $promoNotes = "FREE bonus timer!"; }	
	
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
          <td colspan="3"><font  size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping Total</strong></font>
</td>
          <td><div align="center"><font  size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($ShipCost, 2);?></strong></font></div></td>
        </tr>
        <tr >
          <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Tax</strong></font></td>
          <td>
          <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($TaxTotal, 2);?></strong></font></div></td>
        </tr>
        
        <tr bgcolor="#FFFFCC">
          <td colspan="3"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
          <td><div align="center"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($GrandTotal, 2);?></strong></font></div></td>
        </tr>
      </table>
	  <br></td>
 </tr>
</table>

 

      <table width="100%" border="1" cellpadding="4" cellspacing="0" bordercolor="#003399">
  <tr>
    <td width="60%" align="left" valign="top" bgcolor="#003399">
      <p><strong><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">Shipping
            Information</font></strong></p></td>
    <td width="40%" align="left" valign="top" bgcolor="#003399"><div align="center"><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong>Payment Summary</strong></font> </div></td>
  </tr>
  <tr>
    <td align="left" valign="top"><p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo addQuote($FirstName);?> <? echo addQuote($LastName);?> </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><br>
              <? 
			  
		  	?>
              <? echo addQuote($Address);?> <br>
              <? if($Address2 != ""){echo addQuote($Address2)."<br>";}?>
              <? echo addQuote($City);?>,
              <? if($State != "ZZ"){echo $State;}else{echo $State_Other;}?>
              <? echo $ZipCode;?> <br>
              <? # Get conutry info
			  	$sql = "SELECT * FROM tblShipLocation WHERE LocationID='$Country'";
				$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
				$row = mysql_fetch_array($result);
				$CountryName = $row[Name];
				echo $CountryName;?> </font></p>
        <p> <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Phone;?> <br>
              <? echo $Email;?> </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <br>
          </font></p></td>
    <td width="40%" rowspan="5" align="left" valign="top">
      <?
		  # hide promo table if there is no promo code entered...
		  if($PromotionID != "")
			{
	  ?>
      <br>
      <table width="100%" border="1" cellspacing="0" cellpadding="5" bordercolor="#003399">
        <tr>
          <td><font  size="2" face="Arial, Helvetica, sans-serif"><strong>Promotion<br>
                  <font color="#FF0000" size="3"><? echo $promoNotes;?></font></strong></font></td>
        </tr>
      </table>
      <?
	  		} 
	  ?>
      <br>
      <table width="100%" border="1" cellspacing="0" cellpadding="4" bordercolor="#003399">
        <tr align="left" valign="top">
          <td>
            <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Payment Method:<br>
              </strong>
                  <? 
				  
				$LastFourCr = substr($CreditCardNo, strlen($CreditCardNo) -4, 4);
				  
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
				
				if($CardType == 'amex')
				{
				?>
              <? echo $CardType;?>: xxxx-xxxxxx-x<? echo $LastFourCr;?><br>
              Exp: <? echo $ExpMonth;?>/<? echo $ExpYear;?>
              <?
				}
				else
				{
				?>
				 <? echo $CardType;?>: xxxx-xxxx-xxxx-<? echo $LastFourCr;?><br>
              Exp: <? echo $ExpMonth;?>/<? echo $ExpYear;?>
				<?
				}
				}
				?>
            </font></p>
            <p><strong><font size="2" face="Arial, Helvetica, sans-serif">Billing Address:<font color="#000000"><br>
			                </font></font></strong>
                <?
			  if($Same != "y")
			  {
			  ?>
                <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo addQuote($FirstNameB);?> <? echo addQuote($LastNameB);?></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><br>
                <? echo addQuote($AddressB);?><br>
                <? echo addQuote($CityB);?>,
                <? if($StateB != "ZZ"){echo $StateB;}else{echo $State_OtherB;}?>
                <? echo $ZipCodeB;?> <br>
                <? echo $CountryNameB;?></font></p>
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
    <td align="left" valign="top" bgcolor="#003399"> <strong><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">Shipping
    Option</font></strong> </td>
  </tr>
  <tr>
    <td align="left" valign="top">
	<? # Get shipping info
			  	$sql = "SELECT * FROM tblShippingCost5 WHERE ShipCostID='$ShipCostID'";
				$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
				$row = mysql_fetch_array($result);
				$ShipperID = $row[ShipperID];
				$Type = $row[ShippingOptionID];
				$tempCost = $row[Cost];
				#get type display
				$sql99= "SELECT * FROM tblShippingOption2 WHERE ShippingOptionID = $Type";
				$result99 = mysql_query($sql99) or die("Cannot get Type. Please try again. $sql99");
				$row99 = mysql_fetch_array($result99);
				$TypeDisplay = $row99[ShippingOption];
				# GEt shipper info
				$sql = "SELECT * FROM tblShipper WHERE ShipperID='$ShipperID'";
				$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
				$row = mysql_fetch_array($result);
				$Shipper = $row[CompanyName];
				?>
				<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#003399">
          <tr bgcolor="#CCCCCC">
            <td  >
            <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Shipper</strong></font></div></td>
            <td >
            <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Type</strong></font></div></td>
            <td ><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Cost</strong></font></div></td>
            
          </tr>     
		  <tr>
				<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Shipper;?></font></div></td>
				<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $TypeDisplay; ?></font></div></td>
				<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? if ($tempCost == '0') { ?><font color="#FF0000"> <strong>FREE</strong> </font><? } else { ?> $ <? echo number_format($tempCost,2); }?></font></div> </td>
		</tr>
		</table>
    <br></td>
  </tr>
  
    <? 
	if ( $Test != "" OR $School != "" OR $PrepDisplay != "None"){
	?>
	<tr>
	<td align="left" valign="top" bgcolor="#003399"><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong>Your
	      Information</strong></font></td>
  </tr>
  
  <tr>
    <td align="left" valign="top">
      <?

		#split up year, month, and day into seperate variables...
			  		
		#$TestDateTemp = explode("-",$TestDate);
		
		##$month = $TestDateTemp[1];
		#$day = $TestDateTemp[2];
		#$year = $TestDateTemp[0];

		$month = $TestMonth;
		$day = $TestDay;
		$year = $TestYear;

		#	$month = substr($TestDate, 5, 2);
		
		if ($month == '1') {$month = 'January';}
		if ($month == '2') {$month = 'February';}
		if ($month == '3') {$month = 'March';}
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
	   
	   if ($Test != "")
	   {
		   # get test name
		   $sql = "SELECT * FROM tblTests WHERE TestID = $Test";
			//put SQL statement into result set for loop through records
			$result = mysql_query($sql) or die("Cannot execute query! $sql");
			$row = mysql_fetch_array($result);
			$TestName = $row[Name];
		}
?>
      <? if($TestName != ""){?>
      <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">You are taking the <strong><? echo $TestName;?>.</strong></font></p>
      <? }?>
      <? if ($Test != ""){if($TestMonth != "" ){?>
      <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Your test is on <strong><? echo $newTestDate;?>.</strong></font></p>
      <? }}?>
      <? if($School != ""){?>
      <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">You are attending <strong><? echo addQuote($School);?>.</strong></font></p>
      <? }?>
      <? if($PrepDisplay != "None"){?>
      <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">You are taking <strong><? echo addQuote($PrepDisplay); ?>.</strong></font></p>
      <? }?>
      
    </td>
  </tr>
    <? } ?>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Check all your information and make sure it is correct. Click <font color="#003399">&quot;Complete Order &quot;<font color="#000000"> to complete your transaction</font></font><font color="#000000">. </font></strong></font></p>
<form action="receipt2.php<? if($Custom=="yes"){echo "?a=$affiliateID";}?>" method="post" name="frmOrder" id="frmOrder" onSubmit="return lockButton(document.frmOrder.Confirm.value);">
      
	  	<input name='order4' type='hidden' id='order4' value='yes'>
        <input name='ShipCostID' type='hidden' id='ShipCostID' value='<? echo "$ShipCostID";?>'>
		<!-- Pass info related to Promo and order-->
		<input name='txtPromoNotes' type='hidden' id='txtPromoNotes' value='<? echo "$promoNotes";?>'>
		<input name='Discount' type='hidden' id='Total' value='<? echo "$Discount";?>'>
		<input name='Total' type='hidden' id='Total' value='<? echo "$Total";?>'>
		<input name='TaxTotal' type='hidden' id='TaxTotal' value='<? echo "$TaxTotal";?>'>
		<input name='ShipCost' type='hidden' id='ShipCost' value='<? echo "$ShipCost";?>'>
		<input name='GrandTotal' type='hidden' id='GrandTotal' value='<? echo "$GrandTotal";?>'>
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
        <!-- Total Order Information including tax, shipping, etc... -->
        <input name='Tax' type='hidden' id='Tax' value='<? echo "$Tax";?>'>
        <input name='Total' type='hidden' id='Total' value='<? echo "$Total";?>'>
        <input name='TestName' type='hidden' id='TestName' value='<? echo "$TestName";?>'>
        <!-- this let's the page know the form has been submitted... because Javascript submits it... -->
        <input name='ConfirmButton' type='hidden' id='ConfirmButton' value='Pressed'>
		<input name='Processed' type='hidden' id='Processed' value='False'>
        <!--  if there is an affiliate code that is approved..enter it here!!! -->
        <input name='AffiliatePromotion' type='hidden' id='AffiliatePromotion' value='<? echo "$PartnerBuy";?>'>
        <!-- order button -->
        <input name="Confirm" type="submit" id="Confirm" value="Complete Order">
</form>
   
<p>&nbsp;</p>
<?
mysql_close($link);
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