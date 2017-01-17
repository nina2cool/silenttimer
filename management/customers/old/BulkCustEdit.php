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

	//grab variables to get purchase info from DB.
	$PurchaseID = $_GET['purch'];
	$CustomerID = $_GET['cust'];

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	#<Add button being pushed>
	if ($_POST['Save'] == "Save")
	{
		// Customer Table
		$FirstName = dbQuote($_POST['txtFirstName']);
		$LastName = dbQuote($_POST['txtLastName']);
		$Address = dbQuote($_POST['txtAddress']);
		$City = dbQuote($_POST['txtCity']);
		$State = $_POST['txtState'];
		$ZipCode = $_POST['txtZipCode'];
		$Country = $_POST['txtCountry'];
		$Phone = $_POST['txtPhone'];
		$Ext = $_POST['txtExt'];
		$Phone2 = $_POST['txtPhone2'];
		$Ext2 = $_POST['txtExt2'];
		$Email = $_POST['txtEmail'];
		$Email2 = $_POST['txtEmail2'];
		$URL = $_POST['txtURL'];
		$Fax = $_POST['txtFax'];
		$School = dbQuote($_POST['txtSchool']);
		$PrepClass = dbQuote($_POST['txtPrepClass']);
		$EbayName = $_POST['txtEbayName'];
		$Type = $_POST['txtType'];
		$BusinessName = dbQuote($_POST['txtBusinessName']);
		$BusinessType = $_POST['txtBusinessType'];
		
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
		$DateTime1 = $_POST['txtDateTime1'];
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
		$PONumber = $_POST['txtPONumber'];
		$InvoiceNumber = $_POST['txtInvoiceNumber'];	
		$InvoiceDate = $_POST['txtInvoiceDate'];
		$Status = $_POST['txtStatus'];
		$PaymentTerms = $_POST['txtPaymentTerms'];
		$Paid = $_POST['txtPaid'];
		
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
		$DateTime2 = $_POST['txtDateTime2'];
		$IsCheck = $_POST['txtIsCheck'];
		$BankName = $_POST['txtBankName'];
		$RoutingNumber = $_POST['txtRoutingNumber'];
		$CheckNumber = $_POST['txtCheckNumber'];
		
		$sql3 = "UPDATE tblCustomer
			SET FirstName = '$FirstName', 
			LastName = '$LastName', 
			Address = '$Address', 
			City = '$City', 
			State = '$State', 
			ZipCode = '$ZipCode',
			Country = '$Country', 
			Phone = '$Phone',
			Ext = '$Ext',
			Phone2 = '$Phone2',
			Ext2 = '$Ext2',
			Email = '$Email',
			Email2 = '$Email2',
			URL = '$URL',
			Fax = '$Fax',
			School = '$School',
			EbayName = '$EbayName',
			Type = '$Type',
			BusinessType = '$BusinessType',
			BusinessName = '$BusinessName',
			PrepClass = '$PrepClass'
			WHERE CustomerID = '$CustomerID'";

		
		mysql_query($sql3) or die("Cannot update customer information");
	
		$sql = "UPDATE tblPurchase
			SET ProductID = '$ProductID', 
				TestID = '$TestID',
				TestDate = '$TestDate',
				NumOrdered = '$Num',
				ReferredBy = '$ReferredBy',
				TimerPrice = '$TimerPrice',
				ShippingOptionID = '$ShippingOption',
				Tax = '$Tax',
				TotalCost = '$TotalCost',
				DateTime = '$DateTime1',
				Shipped = '$Shipped',
				SameBillingAddress = '$Same',
				IP = '$IP',
				SignContract = '$Contract',
				ShippingCost = '$ShippingCost',
				PromotionCodeID = '$Promotion',
				Notes = '$Notes',
				Status = '$Status',
				AffClassID = '$AffClassID',
				AffOfficeID = '$AffOfficeID',
				EbayItemNumber = '$EbayItemNumber',
				PaypalNumber = '$PaypalNumber',
				PONumber = '$PONumber',
				InvoiceNumber = '$InvoiceNumber',
				InvoiceDate = '$InvoiceDate',
				Status = '$Status',
				PaymentTerms = '$PaymentTerms',
				Paid = '$Paid'
			WHERE PurchaseID = '$PurchaseID'";

		mysql_query($sql) or die("Cannot update customer purchase information");
		
		$sql2 = "UPDATE tblPurchaseDetails
			SET FirstName = '$FirstNameB', 
				LastName = '$LastNameB',
				Address = '$AddressB',
				City = '$CityB',
				State = '$StateB',
				ZipCode = '$ZipCodeB',
				CardType = '$CardType',
				LastFourCr = '$LastFourCr',
				CVV2 = '$CVV2',
				BankCode = '$BankCode',
				AddressVerification = '$AddressVerification',
				CVV2Verification = '$CVV2Verification',
				DateTime = '$DateTime2',
				IsCheck = '$IsCheck',
				BankName = '$BankName',
				RoutingNumber = '$RoutingNumber',
				CheckNumber = '$CheckNumber'
			WHERE PurchaseID = '$PurchaseID'";

		mysql_query($sql2) or die("Cannot update tblPurchaseDetails 234");
			
	} 
		
	
		$sql3 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";

		
		//put SQL statement into result set for loop through records
		$result3 = mysql_query($sql3) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result3))
		{
			
			$FirstName = $row[FirstName];
			$LastName = $row[LastName];
			$Address = $row[Address];
			$City = $row[City];
			$State = $row[State];
			$ZipCode = $row[ZipCode];
			$Country = $row[Country];
			$Phone = $row[Phone];
			$Ext = $row[Ext];
			$Phone2 = $row[Phone2];
			$Ext2 = $row[Ext2];
			$Email = $row[Email];
			$Email2 = $row[Email2];
			$Fax = $row[Fax];
			$URL = $row[URL];
			$School = $row[School];
			$PrepClass = $row[PrepClass];
			$EbayName = $row[EbayName];
			$Type = $row[Type];
			$BusinessType = $row[BusinessType];
			$BusinessName = $row[BusinessName];
		}
	
	
		$sql = "SELECT * FROM tblPurchase WHERE PurchaseID = '$PurchaseID' AND CustomerID = '$CustomerID'";
	
		//put SQL statement into result set for loop through records
		$result = mysql_query($sql) or die("Cannot execute query! purchase ID");
	
		while($row = mysql_fetch_array($result))
		{
				$PurchaseID = $row[PurchaseID];
				$ProductID = $row[ProductID];
				$CustomerID = $row[CustomerID];
				$TestID = $row[TestID];
				$TestDate = $row[TestDate];
				$Num = $row[NumOrdered];
				$ReferredBy = $row[ReferredBy];
				$TimerPrice = $row[TimerPrice];
				$ShippingOption = $row[ShippingOptionID];
				$Tax = $row[Tax];
				$TotalCost = $row[TotalCost];
				$DateTime1 = $row[DateTime];
				$Shipped = $row[Shipped];
				$Same = $row[SameBillingAddress];
				$IP = $row[IP];
				$Contract = $row[SignContract];
				$ShippingCost = $row[ShippingCost];
				$Promotion = $row[PromotionCodeID];
				$Notes = $row[Notes];
				$Status = $row[Status];
				$AffClassID = $row[AffClassID];
				$AffOfficeID = $row[AffOfficeID];
				$EbayItemNumber = $row[EbayItemNumber];
				$PaypalNumber = $row[PaypalNumber];
				$PONumber = $row[PONumber];
				$InvoiceNumber = $row[InvoiceNumber];
				$InvoiceDate = $row[InvoiceDate];
				$Status = $row[Status];
				$PaymentTerms = $row[PaymentTerms];
				$Paid = $row[Paid];
	}
	
	$sql2 = "SELECT * FROM tblPurchaseDetails WHERE PurchaseID = '$PurchaseID'";
	
	$result2 = mysql_query($sql2) or die("Cannot execute query! purchase details");

	while($row = mysql_fetch_array($result2))
	{
				
				$FirstNameB = $row[FirstName];
				$LastNameB = $row[LastName];
				$AddressB = $row[Address];
				$CityB = $row[City];
				$StateB = $row[State];
				$ZipCodeB = $row[ZipCode];
				$CardType = $row[CardType];
				$LastFourCr = $row[LastFourCr];
				$CVV2 = $row[CVV2];
				$BankCode = $row[BankCode];
				$AddressVerification = $row[AddressVerification];
				$CVV2Verification = $row[CVV2Verification];
				$DateTime2 = $row[DateTime];
				$IsCheck = $row[IsCheck];
				$BankName = $row[BankName];
				$RoutingNumber = $row[RoutingNumber];
				$CheckNumber = $row[CheckNumber];
				
	}
	
		
	?>		

<?
		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		$FirstName = addQuote($FirstName);
		$LastName = addQuote($LastName);
		$Address = addQuote($Address);
		$City = addQuote($City);
		$FirstNameB = addQuote($FirstNameB);
		$LastNameB = addQuote($LastNameB);
		$AddressB = addQuote($AddressB);
		$CityB = addQuote($CityB);		
		$School = addQuote($School);
		$PrepClass = addQuote($PrepClass);
		$BusinessName = addQuote($BusinessName);
		
		}

?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>




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
            <td width="43%"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Number 
              of Timers?<br>
              </font><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033"> 
              <input name="txtNum" type="text" id="txtNum4" value="<? echo $Num;?>">
              </font></strong></font></strong></font><font color="#000033"> </font></strong></font></td>
            <td width="28%"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033"><a href="#" onClick="MM_openBrWindow('ShipOptions.php','','scrollbars=yes,width=600,height=600')">Shipping 
              Preference?</a></font></strong><font color="#000033"><strong><br>
              </strong></font><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong> 
              <input name="txtShippingOption" type="text" id="txtShippingOption3" value="<? echo $ShippingOption;?>">
              </strong></font></font><font color="#000033"><strong> </strong></font></font></td>
            <td width="29%"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="#" onClick="MM_openBrWindow('ShipOptions.php','','scrollbars=yes,width=600,height=600')">Shipping 
              Cost</a></font></strong><br> <font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="txtShippingCost" type="text" id="txtShippingCost3" value="<? echo number_format($ShippingCost,2);?>">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Promotional 
              Code</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtPromotion" type="text" id="txtPromotion2"  value="<? echo $Promotion;?>">
              </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipped?</strong><br>
              <input name="txtShipped" type="text" id="txtShipped2" value="<? echo $Shipped;?>">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Timer 
              Price</strong><br>
              <input name="txtTimerPrice" type="text" id="txtTimerPrice3" value="<? echo number_format($TimerPrice,2);?>">
              </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Tax</strong><br>
              <input name="txtTax" type="text" id="txtTax3" value="<? echo number_format($Tax,2);?>">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Total 
              Cost</strong><br>
              <input name="txtTotalCost" type="text" id="txtTotalCost3" value="<? echo number_format($TotalCost,2);?>">
              </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase 
              Notes</strong><strong><br>
              <textarea name="txtNotes" cols="40" rows="4" id="textarea2"><? echo $Notes;?></textarea>
              </strong></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Paypal 
              Number/Order Number <br>
              <input name="txtPaypalNumber" type="text" id="txtPaypalNumber4" value="<? echo $PaypalNumber;?>" size="30">
              </strong></font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Item 
              # / Listing ID<br>
              <input name="txtItemNumber" type="text" id="txtItemNumber3" value="<? echo $EbayItemNumber;?>" size="30">
              </strong></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase 
              Order Number<br>
              <input name="txtPONumber" type="text" id="txtPONumber2" value="<? echo $PONumber;?>" size="30">
              </strong></font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Invoice 
              Number <br>
              <input name="txtInvoiceNumber" type="text" id="txtInvoiceNumber2" value="<? echo $InvoiceNumber;?>" size="30">
              </strong></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Invoice 
              Date<br>
              <input name="txtInvoiceDate" type="text" id="txtInvoiceDate" value="<? echo $InvoiceDate;?>" size="30">
              </strong></font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Paid?</strong></font><br> 
              <input name="txtPaid" type="text" id="txtPaid2" value="<? echo $Paid;?>" size="5" maxlength="1"></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Payment 
              Terms</strong></font><br> <input name="txtPaymentTerms" type="text" id="txtPaymentTerms2" value="<? echo $PaymentTerms;?>"></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Date 
              Time of Purchase</strong></font><br> <input name="txtDateTime1" type="text" id="txtDateTime12" value="<? echo $DateTime1;?>"> 
            </td>
          </tr>
        </table>
        
      </td>
    </tr>
  </table>
  <p>&nbsp;</p><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td height="274" align="left" valign="top"> 
        <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; 
          Customer Information</font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr> 
            <td colspan="4"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Business 
              Name</strong></font><br>
              <font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="txtBusinessName" type="text" id="txtBusinessName3" value="<? echo addQuote($BusinessName);?>" size="35" maxlength="30">
              </font> </td>
          </tr>
          <tr> 
            <td colspan="2"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">First 
              Name</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtFirstName" type="text" id="txtFirstName3" size="30" value="<? echo addQuote($FirstName);?>">
              </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Last 
              Name</font></strong><br>
              <input name="txtLastName" type="text" id="txtLastName3" value="<? echo addQuote($LastName);?>" size="30">
              </font></td>
          </tr>
          <tr> 
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Address</font></strong><br>
              </font><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="txtAddress" type="text" id="txtAddress4" value="<? echo addQuote($Address);?>" size="35" maxlength="30">
              </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Address 
              2</strong></font><br>
              <font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="txtAddress2" type="text" id="txtState3" value="<? echo addQuote($Address2);?>" size="35" maxlength="30">
              </font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp; </font></td>
          </tr>
          <tr> 
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>City</strong><br>
              <input name="txtCity" type="text" id="txtCity3" size="20" value="<? echo addQuote($City);?>">
              </font></td>
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State</strong><br>
              <input name="txtState" type="text" id="txtZipCode3" size="10" value="<? echo $State;?>">
              </font></td>
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip 
              Code</strong><br>
              <input name="txtZipCode" type="text" id="txtZipCode5" size="11" maxlength="10" value="<? echo $ZipCode;?>">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Country<br>
              <input name="txtCountry" type="text" id="txtCountry3" value="<? echo $Country;?>" size="20">
              </strong></font></td>
          </tr>
          <tr> 
            <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Phone 
              Number</font><br>
              <input name="txtPhone" type="text" id="txtPhone" size="20" value="<? echo $Phone;?>">
              </font></strong></td>
            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Ext 
              1<br>
              <input name="txtExt" type="text" id="txtExt4" value="<? echo $Ext;?>" size="12" maxlength="10">
              </font></strong></td>
            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Phone 
              Number 2<br>
              <input name="txtPhone2" type="text" id="txtPhone24" value="<? echo $Phone2;?>" size="20">
              </font></strong></td>
            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Ext 
              2<br>
              <input name="txtExt2" type="text" id="txtExt23" value="<? echo $Ext2;?>" size="12" maxlength="10">
              </font></strong></td>
          </tr>
          <tr> 
            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Fax<br>
              <input name="txtFax" type="text" id="txtFax3" value="<? echo $Fax;?>" size="20">
              </font></strong></td>
            <td><strong></strong></td>
            <td><strong><font size="2" face="Arial, Helvetica, sans-serif"> </font></strong></td>
            <td><strong><font size="2" face="Arial, Helvetica, sans-serif"> </font></strong></td>
          </tr>
          <tr> 
            <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Email 
              Address</font> 1<br>
              <input name="txtEmail" type="text" id="txtEmail5" value="<? echo $Email;?>" size="45" maxlength="50">
              </font></strong></td>
            <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">Email 
              Address 2<br>
              <input name="txtEmail2" type="text" id="txtEmail23" value="<? echo $Email2;?>" size="45" maxlength="50">
              </font></strong></td>
          </tr>
          <tr> 
            <td colspan="4"><strong><font size="2" face="Arial, Helvetica, sans-serif">URL<br>
              <input name="txtURL" type="text" id="txtURL3" value="<? echo $URL;?>" size="50">
              </font></strong></td>
          </tr>
        </table>
        
      </td>
    </tr>
  </table>
  <p>&nbsp;</p><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top"> <p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&gt; 
          Billing Information</strong></font></p>
        <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">Same? 
          <input name="txtSame" type="text" id="txtSame" value="<? echo addQuote($Same);?>">
          </font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr align="left" valign="top"> 
            <td width="27%"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">First 
              Name</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtFirstNameB" type="text" id="txtFirstNameB2" size="30" value="<? echo addQuote($FirstNameB);?>">
              </font> </td>
            <td width="73%" colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Last 
              Name</font></strong><br>
              <input name="txtLastNameB" type="text" id="txtLastNameB2" value="<? echo addQuote($LastNameB);?>" size="30">
              </font> </td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Address</font></strong><br>
              <input name="txtAddressB" type="text" id="txtAddressB2" value="<? echo addQuote($AddressB);?>" size="35" maxlength="30">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>City</strong><br>
              <input name="txtCityB" type="text" id="txtCityB2" size="20" value="<? echo addQuote($CityB);?>">
              </font> <font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp; 
              </font></td>
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State</strong><br>
              <input name="txtStateB" type="text" id="txtStateB3" value="<? echo addQuote($StateB);?>" size="10">
              </font></td>
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip 
              Code</strong><br>
              <input name="txtZipCodeB" type="text" id="txtZipCodeB3" size="11" maxlength="10" value="<? echo $ZipCodeB;?>">
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
              <td width="27%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('CardType.php','','scrollbars=yes,width=600,height=600')">Card 
                Type</a></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                <input name="txtCardType" type="text" id="txtCardType2" value="<? echo $CardType;?>">
                </font></td>
              <td width="32%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Last 
                Four Digits</strong><br>
                <input name="txtLastFourCr" type="text" id="txtLastFourCr" value="<? echo $LastFourCr;?>">
                </font></td>
              <td width="20%"><font face="Arial, Helvetica, sans-serif"><b><font color="#000033" size="2">CVV2 
                #</font></b>&nbsp; <br>
                <input name="txtCVV2" type="text" id="txtCVV2" size="5" maxlength=4  value="<? echo $CVV2;?>">
                </font></td>
            </tr>
            <tr align="left" valign="top"> 
              <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">Bank 
                Code Authorization <br>
                <input name="txtBankCode" type="text" id="txtBankCode" value="<? echo $BankCode;?>" size="50">
                </font></strong></td>
              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Address 
                Verification <br>
                <input name="txtAddressVerification" type="text" id="txtAddressVerification" value="<? echo $AddressVerification;?>" size="50">
                </font></strong></td>
            </tr>
            <tr align="left" valign="top"> 
              <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">CVV2 
                Verification <br>
                <input name="txtCVV2Verification" type="text" id="txtCVV2Verification" value="<? echo $CVV2Verification;?>" size="50">
                </font></strong></td>
              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date 
                and Time<br>
                <input name="txtDateTime2" type="text" id="txtDateTime2" value="<? echo $DateTime2;?>">
                </font></strong></td>
            </tr>
          </table></td>
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
          
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr align="left" valign="top"> 
            <td width="35%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Is 
              it a check?</font></strong><br> <input name="txtIsCheck" type="text" id="txtIsCheck2" value="<? echo $IsCheck;?>" size="10"> 
            </td>
            <td width="34%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Bank 
              Name</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtBankName" type="text" id="txtBankName3"  value="<? echo $BankName;?>" size="20">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Routing 
              Number</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtRoutingNumber" type="text" id="txtRoutingNumber2"  value="<? echo $RoutingNumber;?>" size="15">
              </font></td>
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Check 
              Number</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtCheckNumber" type="text" id="txtCheckNumber"  value="<? echo $CheckNumber;?>" size="6">
              </font></td>
          </tr>
        </table></td>
      </tr>
    </table>
  <p>&nbsp;</p><table width="103%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top"> <p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong> 
          &nbsp; &gt; Extra Information</strong></font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"> <strong>Test 
              ID Number</strong><br>
              <input name="txtTestID" type="text" id="txtTestID2" value="<? echo $TestID;?>">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>School</strong><br>
              <input name="txtSchool" type="text" id="txtSchool" value="<? echo addQuote($School);?>">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Test 
              Date</strong><br>
              <input name="txtTestDate" type="text" id="txtTestDate2" value="<? echo $TestDate;?>">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Prep 
              Class</strong><br>
              <input name="txtPrepClass" type="text" id="txtPrepClass" value="<? echo addQuote($PrepClass);?>">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('ReferredBy.php','','scrollbars=yes,width=600,height=600')">Referred 
              By</a></strong><br>
              <input name="txtReferredBy" type="text" id="txtReferredBy2" value="<? echo $ReferredBy;?>">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>IP 
              Address</strong></font><br> <input name="txtIP" type="text" id="txtIP" value="<? echo addQuote($IP);?>"> 
            </td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Affiliate 
              Class ID</strong><br>
              <input name="txtAffClassID" type="text" id="txtAffClassID2" value="<? echo $AffClassID;?>">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Affiliate 
              Office ID</strong><br>
              <input name="txtAffOfficeID" type="text" id="txtAffOfficeID2" value="<? echo $AffOfficeID;?>">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Type</strong><br>
              <input name="txtType" type="text" id="txtType2" value="<? echo $Type;?>">
              </font></td>
            <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Business 
                Type</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                <input name="txtBusinessType" type="text" id="txtBusinessType2" value="<? echo $BusinessType;?>">
                </font></p></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase 
              Status </strong><br>
              <input name="txtStatus" type="text" id="txtStatus2" value="<? echo $Status;?>">
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
        </table></td>
    </tr>
  </table>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Save" type="submit" id="Save" value="Save">
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

?>