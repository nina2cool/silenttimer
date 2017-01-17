<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	# --------------------------------------------------------------------------------------------
	#   Function to insert back slashes into characters with a single or a double quote in them.
	# --------------------------------------------------------------------------------------------
	function escapeQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("'","||",$var);
			$string = str_replace('"','||||',$string);
		}

		return $string;
	}
	
	function removeBars($var)
	{
		if (isset($var))
		{
			$string = str_replace("||","'",$var);
			$string = str_replace('||||','"',$string);
		}

		return $string;
	}

	function addQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("\'","'",$var);
			$string = str_replace('\"','"',$string);
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
?>

<?	

	$Now = date("Y-m-d H:i:s");

	#<Add button being pushed>
	if ($_POST['Add'] == "Add")
	{
		// Customer Table
		$FirstName = dbQuote($_POST['txtFirstName']);
		$LastName = dbQuote($_POST['txtLastName']);
		$Address = dbQuote($_POST['txtAddress']);
		$Address2 = dbQuote($_POST['txtAddress2']);
		$City = dbQuote($_POST['txtCity']);
		$State = $_POST['txtState'];
		$StateOther = dbQuote($_POST['txtStateOther']);
		$ZipCode = $_POST['txtZipCode'];
		$Country = $_POST['txtCountry'];
		$Phone = $_POST['txtPhone'];
		$Email = $_POST['txtEmail'];
		$School = dbQuote($_POST['txtSchool']);
		$PrepClass = dbQuote($_POST['txtPrepClass']);
		$Type = $_POST['txtType'];
		$EbayName = $_POST['txtEbayName'];
		
		// Purchase Table
		$ProductID = "1";
		$TestID = $_POST['txtTestID'];
		if($Test == ""){$Test = "0";} #fixes integer problem for test being blank if none is selected.		
		$TestDate = $_POST['txtTestDate'];
		$Num = $_POST['txtNum'];
		$ReferredBy = $_POST['txtReferredBy'];
		$TimerPrice = $_POST['txtTimerPrice'];
		$ShippingOption = $_POST['txtShippingOption'];
		$Tax = $_POST['txtTax'];
		$TotalCost = $_POST['txtTotalCost'];
		$Shipped = $_POST['txtShipped'];
		$Same = $_POST['txtSame'];
		$IP = $_POST['txtIP'];
		$Contract = "y";
		$ShippingCost = $_POST['txtShippingCost'];
		$Promotion = $_POST['txtPromotion'];
		$Notes = $_POST['txtNotes'];
		$Status = "active";
		$AffClassID = $_POST['txtAffClassID'];
		$AffOfficeID = $_POST['txtAffOfficeID'];
		$EbayItemNumber = $_POST['txtItemNumber'];
		$PaypalNumber = $_POST['txtPaypalNumber'];
		
		// Purchase Details Table
		$FirstNameB = dbQuote($_POST['txtFirstNameB']);
		$LastNameB = dbQuote($_POST['txtLastNameB']);
		$AddressB = dbQuote($_POST['txtAddressB']);
		$CityB = dbQuote($_POST['txtCityB']);
		$StateB = $_POST['txtStateB'];
		$ZipCodeB = $_POST['txtZipCodeB'];
		$CardType = $_POST['txtCardType'];
		$LastFourCr = $_POST['txtLastFourCr'];
		$CVV2 = $_POST['txtCVV2'];
		$BankCode = $_POST['txtBankCode'];
		$AddressVerification = $_POST['txtAddressVerification'];
		$CVV2Verification = $_POST['txtCVV2Verification'];
		$IsCheck = $_POST['txtIsCheck'];
		$BankName = $_POST['txtBankName'];
		$RoutingNumber = $_POST['txtRoutingNumber'];
		$CheckNumber = $_POST['txtCheckNumber'];
			
		
		# link to Database...
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");			
	
		
		//check to see if customer already exists... if they don't add them..if they do, grab their CustomerID to use.
			$sql = "SELECT * FROM tblCustomer WHERE FirstName='$FirstName' AND LastName = '$LastName' AND ZipCode = '$ZipCode' AND Email = '$Email'";
			$result = mysql_query($sql) or die("Cannot execute query");
						
			while($row = mysql_fetch_array($result))
			{
				$cID = $row[CustomerID];
			}
			
			//if there is no customer record for them, add them to customer table...
			If ($cID == "")
			{
				$sql = "INSERT INTO tblCustomer(FirstName, LastName, Address, Address2, City, State, ZipCode, Country, Phone, Email, School, PrepClass, Type, EbayName, StateOther)
						  VALUES ('$FirstName', '$LastName', '$Address', '$Address2', '$City', '$State', '$ZipCode', '$Country', '$Phone', '$Email', '$School', '$PrepClass', '$Type', '$EbayName', '$StateOther')";
				mysql_query($sql) or die("Cannot insert customer, please try again.");
				
		
		//now, find out what their customerID is...
		$sql = "SELECT CustomerID FROM tblCustomer WHERE FirstName= '$FirstName' AND LastName = '$LastName' AND Address = '$Address' AND Phone = '$Phone' AND ZipCode = '$ZipCode'";
		$result = mysql_query($sql) or die("Cannot retrieve Customer ID, please try again.");
		
		while($row = mysql_fetch_array($result))
		{
			$cID = $row[CustomerID];
		}
	
		}
			
					
		//now, the customer is in the customer table, we have their customerID....we have all the totals......INSERT order into tblPurchase...
		$sql = "INSERT INTO tblPurchase(ProductID, CustomerID, TestID, TestDate, NumOrdered, ReferredBy, TimerPrice, ShippingOptionID, Tax, TotalCost, DateTime, Shipped, SameBillingAddress, IP, SignContract, ShippingCost, PromotionCodeID, Notes, Status, AffClassID, AffOfficeID, EbayItemNumber, PaypalNumber)
				VALUES ('$ProductID', '$cID', '$TestID', '$TestDate', '$Num', '$ReferredBy', '$TimerPrice', '$ShippingOption', '$Tax', '$TotalCost', '$Now', '$Shipped', '$Same', '$IP', '$Contract', '$ShippingCost', '$Promotion', '$Notes', '$Status', '$AffClassID', '$AffOfficeID', '$EbayItemNumber', '$PaypalNumber')";
		
		echo $sql;

		mysql_query($sql) or die("Cannot insert purchase, please try again.");
		
			
			
			//now, get purchase ID for this puchase, and enter info into tblPurchaseDetails......
			$sql = "SELECT PurchaseID FROM tblPurchase WHERE CustomerID = $cID AND IP = '$IP' AND DateTime = '$Now'";
			
			$result = mysql_query($sql) or die("Cannot get Purchase ID, please try again.");
					
			while($row = mysql_fetch_array($result))
			{
				$pID = $row[PurchaseID];
			}
				

		//echo "$pID, $FirstNameB, $LastNameB, $AddressB, $CityB, $StateB, $ZipCodeB, $CardType, $LastFourCr, $Code, $AVS, $CVV2Code, $now";
			
		// Insert into purchase details table
		$sql = "INSERT INTO tblPurchaseDetails(PurchaseID, FirstName, LastName, Address, City, State, ZipCode, CardType, LastFourCr, CVV2, BankCode, AddressVerification, CVV2Verification, DateTime, IsCheck, BankName, RoutingNumber, CheckNumber) 
				VALUES ('$pID', '$FirstNameB', '$LastNameB', '$AddressB', '$CityB', '$StateB', '$ZipCodeB', '$CardType', '$LastFourCr', '$CVV2', '$BankCode', '$AddressVerification', '$CVV2Verification', '$Now', '$IsCheck', '$BankName', '$RoutingNumber', '$CheckNumber');";
		
		mysql_query($sql) or die("Cannot Insert Purchase Details information, try again!");
		
	?>		

<?
		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		$FirstName = addQuote($FirstName);
		$LastName = addQuote($LastName);
		$Address = addQuote($Address);
		$Address2 = addQuote($Address2);
		$City = addQuote($City);
		$FirstNameB = addQuote($FirstNameB);
		$LastNameB = addQuote($LastNameB);
		$AddressB = addQuote($AddressB);
		$CityB = addQuote($CityB);		
		$School = addQuote($School);
		$PrepClass = addQuote($PrepClass);
		$StateOther = addQuote($StateOther);
		}
		
?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>




<p><font size="2" face="Arial, Helvetica, sans-serif">Choose a Customer Type:</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="OrderAdd.php?type=web">Web</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="OrderAdd.php?type=phone">Phone</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="OrderAdd.php?type=ebay">eBay</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="OrderAdd.php?type=bulk">Bulk</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="OrderAdd.php?type=samples">Sample</a></font></p>
<p>&nbsp;</p>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Customer 
      and Purchase Information</strong></font></p>
<form name="form1" method="post" action="">
  <font size="2" face="Arial, Helvetica, sans-serif"><strong> </strong></font> 
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top"> <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; 
          Purchase Information</font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr align="left" valign="top"> 
            <td width="41%"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Number 
              of Timers?<br>
              <input name="txtNum" type="text" id="txtNum">
              </font></strong></font></td>
            <td width="27%"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033"><a href="#" onClick="MM_openBrWindow('ShipOptions.php','','scrollbars=yes,width=600,height=600')">Shipping 
              Preference?</a></font></strong><font color="#000033"><strong><br>
              <input name="txtShippingOption" type="text" id="txtShippingOption">
              </strong></font></font></td>
            <td width="32%"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="#" onClick="MM_openBrWindow('ShipOptions.php','','scrollbars=yes,width=600,height=600')">Shipping 
              Cost</a></font></strong><br> <input name="txtShippingCost" type="text" id="txtShippingCost"></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Promotional 
              Code</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtPromotion" type="text" id="txtPromotion">
              </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipped?</strong><br>
              <input name="txtShipped" type="text" id="txtShipped" value="n">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Timer 
              Price</strong><br>
              <input name="txtTimerPrice" type="text" id="txtTimerPrice">
              </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Tax</strong><br>
              <input name="txtTax" type="text" id="txtTax">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Total 
              Cost</strong><br>
              <input name="txtTotalCost" type="text" id="txtTotalCost">
              </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase 
              Notes</strong><strong><br>
              <textarea name="txtNotes" cols="40" rows="4" id="txtNotes"></textarea>
              </strong></font></td>
          </tr>
          <tr align="left" valign="top">
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Paypal 
              Number/Order Number<br>
              <input name="txtPaypalNumber" type="text" id="txtPaypalNumber" size="30">
              </strong></font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Item 
              # / Listing ID<br>
              <input name="txtItemNumber" type="text" id="txtItemNumber" size="30">
              </strong></font></td>
          </tr>
        </table>
      
      </td>
    </tr>
  </table>
  <p>&nbsp;</p><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td height="310" align="left" valign="top"> 
        <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; 
          Customer Information</font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr align="left" valign="top"> 
            <td colspan="2"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">First 
              Name</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtFirstName" type="text" id="txtFirstName2" size="30">
              </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Last 
              Name</font></strong><br>
              <input name="txtLastName" type="text" id="txtLastName2" size="30">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Address</font></strong><br>
              <input name="txtAddress" type="text" id="txtAddress" size="35" maxlength="30">
              </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Address 
              2 </font></strong><br>
              <input name="txtAddress2" type="text" id="txtAddress2" size="35" maxlength="30">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td width="21%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>City</strong><br>
              <input name="txtCity" type="text" id="txtCity" size="20">
              </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp; 
              </font></td>
            <td width="26%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State</strong><br>
              <input name="txtState" type="text" id="txtState3" size="10">
              <br>
              <strong>State Other</strong><br>
              <input name="txtStateOther" type="text" id="txtStateOther" size="20">
              </font></td>
            <td width="31%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip 
              Code</strong><br>
              <input name="txtZipCode" type="text" id="txtZipCode3" size="11" maxlength="10">
              </font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
            <td width="22%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Country<br>
              <input name="txtCountry" type="text" id="txtCountry3" value="US" size="20">
              </strong></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="4"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Phone 
              Number</font></strong><br>
              <input name="txtPhone" type="text" id="txtPhone" size="20">
              </font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp; </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Email 
              Address</font></strong><br>
              <input name="txtEmail" type="text" id="txtOrderEmail3" size="45" maxlength="50">
              </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">eBay/Amazon 
              Name </font></strong></font><br> <input name="txtEbayName" type="text" id="txtEbayName3" size="30"> 
            </td>
          </tr>
        </table></td>
    </tr>
  </table>
  <p>&nbsp;</p><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top"> <p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&gt; 
          Billing Information</strong></font></p>
        <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">Same? 
          <input name="txtSame" type="text" id="txtSame" value="y">
          </font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr align="left" valign="top"> 
            <td width="27%"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">First 
              Name</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtFirstNameB" type="text" id="txtFirstNameB" size="30">
              </font> </td>
            <td width="73%" colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Last 
              Name</font></strong><br>
              <input name="txtLastNameB" type="text" id="txtLastNameB" size="30">
              </font> </td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Address</font></strong><br>
              <input name="txtAddressB" type="text" id="txtAddressB2">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>City</strong><br>
              <input name="txtCityB" type="text" id="txtCityB2" size="20">
              </font> </td>
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State</strong><br>
              <input name="txtStateB" type="text" id="txtStateB2" size="10">
              </font></td>
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip 
              Code</strong><br>
              <input name="txtZipCodeB" type="text" id="txtZipCodeB2" size="11" maxlength="10">
              </font></td>
          </tr>
        </table>
        </div></td>
    </tr>
  </table>
  <p>&nbsp; </p>
  <div style="display:<? if($isCheck == "y"){echo "none";}?>" id = "credit"> 
    <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
      <tr> 
        <td align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr> 
              <td><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt; 
                Credit Card</strong></font> </td>
              <td><div align="right"></div></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <tr align="left" valign="top"> 
              <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('CardType.php','','scrollbars=yes,width=600,height=600')">Card 
                Type</a></strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
                (paypal, amazon)<br>
                <input name="txtCardType" type="text" id="txtCardType">
                </font></td>
              <td width="10%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Last 
                Four Digits</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                <input name="txtLastFourCr" type="text" id="txtLastFourCr">
                </font></td>
              <td width="10%"><font face="Arial, Helvetica, sans-serif"><b><font color="#000033" size="2">CVV2 
                #</font></b>&nbsp; <br>
                <input name="txtCVV2" type="text" id="txtCVV2" size="5" maxlength=4>
                </font></td>
            </tr>
            <tr align="left" valign="top"> 
              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Bank 
                Code Authorization </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(paypal 
                #)<strong><br>
                <input name="txtBankCode" type="text" id="txtBankCode5" value="AUTH/TKT " size="50">
                </strong></font></td>
              <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">Address 
                Verification <br>
                <input name="txtAddressVerification" type="text" id="txtAddressVerification6" size="50">
                </font></strong></td>
            </tr>
            <tr align="left" valign="top"> 
              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">CVV2 
                Verification <br>
                <input name="txtCVV2Verification" type="text" id="txtCVV2Verification7" size="50">
                </font></strong></td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr align="left" valign="top"> 
              <td colspan="3"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                </font></strong></td>
            </tr>
          </table>
        
        </td>
      </tr>
    </table>
  </div>
    
  <p>&nbsp;</p>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
        
      <td align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt; 
              eCheck</strong></font> <div align="right"></div></td>
          </tr>
        </table>
          
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr align="left" valign="top"> 
            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Is 
              it a check?</font></strong><br> 
              <input name="txtIsCheck" type="text" id="txtIsCheck2" value="n" size="5"> 
            </td>
            <td valign="top"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Bank 
              Name</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtBankName" type="text" id="txtBankName2" size="20">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td width="35%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Routing 
              Number</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtRoutingNumber" type="text" id="txtRoutingNumber2" size="20">
              </font> </td>
            <td width="34%" valign="top"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Check 
              Number</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtCheckNumber" type="text" id="txtCheckNumber" size="6">
              </font></td>
          </tr>
        </table></td>
    </tr>
  </table>
  <p>&nbsp;</p><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top"> <p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong> 
          &nbsp; &gt; Extra Information</strong></font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"> <strong>Test 
              ID Number</strong><br>
              <input name="txtTestID" type="text" id="txtTestID">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>School</strong><br>
              <input name="txtSchool" type="text" id="txtSchool22">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Test 
              Date</strong><br>
              <input name="txtTestDate" type="text" id="txtTestDate">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Prep 
              Class</strong><br>
              <input name="txtPrepClass" type="text" id="txtPrepClass22">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('ReferredBy.php','','scrollbars=yes,width=600,height=600')">Referred 
              By</a></strong> (Ebay, Amazon)<br>
              <input name="txtReferredBy" type="text" id="txtReferredBy">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>IP 
              Address</strong></font><br> <input name="txtIP" type="text" id="txtIP2"> 
            </td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Affiliate 
              Class ID</strong><br>
              <input name="txtAffClassID" type="text" id="txtAffClassID">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Affiliate 
              Office ID</strong><br>
              <input name="txtAffOfficeID" type="text" id="txtAffOfficeID">
              </font></td>
          </tr>
          <tr align="left" valign="top">
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Type</strong> 
              (default: web, ebay, bulk, samples, amazon)<br>
              <input name="txtType" type="text" id="txtType" value="web">
              </font></td>
            <td>&nbsp;</td>
          </tr>
          <?
		  	if($Custom != "yes")
			{
		  ?>
          <?
		  	}
		  ?>
        </table> </td>
    </tr>
  </table>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Add" type="submit" id="Add" value="Add">
    <input type="reset" name="Submit2" value="Reset">
    </font></strong></p>
</form>
<p>&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
}
?>