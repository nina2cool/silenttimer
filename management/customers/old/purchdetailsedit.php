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
		$Paid = $_POST['txtPaid'];
		$PaymentTerms = $_POST['txtPaymentTerms'];
		$Status = $_POST['txtStatus'];
		$ReplacementType = $_POST['txtReplacementType'];
		$Replacement = $_POST['txtReplacement'];
		
		
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
			Address2 = '$Address2',
			City = '$City', 
			State = '$State', 
			ZipCode = '$ZipCode',
			Country = '$Country', 
			Phone = '$Phone',
			Email = '$Email',
			School = '$School',
			EbayName = '$EbayName',
			Type = '$Type',
			BusinessType = '$BusinessType',
			BusinessName = '$BusinessName',
			PrepClass = '$PrepClass',
			StateOther = '$StateOther'
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
				Paid = '$Paid',
				PaymentTerms = '$PaymentTerms',
				Status = '$Status',
				Replacement = '$Replacement',
				ReplacementType = '$ReplacementType'
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
			$Address2 = $row[Address2];
			$City = $row[City];
			$State = $row[State];
			$StateOther = $row[StateOther];
			$ZipCode = $row[ZipCode];
			$Country = $row[Country];
			$Phone = $row[Phone];
			$Email = $row[Email];
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
				$Paid = $row[Paid];
				$PaymentTerms = $row[PaymentTerms];
				$ReplacementType = $row[ReplacementType];
				$Replacement = $row[Replacement];
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
		$Address2 = addQuote($Address2);
		$City = addQuote($City);
		$FirstNameB = addQuote($FirstNameB);
		$LastNameB = addQuote($LastNameB);
		$AddressB = addQuote($AddressB);
		$CityB = addQuote($CityB);		
		$School = addQuote($School);
		$PrepClass = addQuote($PrepClass);
		$BusinessName = addQuote($BusinessName);
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




<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit 
  Purchase Details</strong></font></p>
<form name="form1" method="post" action="">
  <p><font size="2" face="Arial, Helvetica, sans-serif">Date / Time of Purchase: 
    <input name="txtDateTime1" type="text" id="txtDateTime1" value="<? echo $DateTime1;?>">
    </font> </p>
  <table width="50%" border="1" align="left" cellpadding="5" cellspacing="0">
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Status; ?>
        <input name="txtStatus" type="text" id="txtStatus2" value="<? echo $Status;?>" size="8">
        </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="shipped.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Shipped</a></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Shipped; ?>
        <input name="txtShipped" type="text" id="txtShipped" value="<? echo $Shipped;?>" size="3" maxlength="1">
        &nbsp;</font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="billinginfo.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Same 
        billing address?</a></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Same; ?><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">
        <input name="txtSame" type="text" id="txtSame2" value="<? echo addQuote($Same);?>" size="3" maxlength="1">
        </font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Paid?</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Paid; ?>
        <input name="txtPaid" type="text" id="txtPaid" value="<? echo $Paid;?>" size="3" maxlength="1">
        </font></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p><br>
  </p>
  <p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Pricing 
    Information</strong></font></p>
  <table width="75%" border="1" align="left" cellpadding="5" cellspacing="0">
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Product</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Product; ?>
        <input name="txtProductID" type="text" id="txtProductID" value="<? echo $ProductID; ?>" size="3">
        </font></td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Quantity</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $NumOrdered; ?></font><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">
        <input name="txtNum" type="text" id="txtNum4" value="<? echo $Num;?>" size="3">
        </font></strong></font></strong></font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Unit Cost</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($TimerPrice,2); ?>
        <input name="txtTimerPrice" type="text" id="txtTimerPrice" value="<? echo number_format($TimerPrice,2);?>" size="5">
        </font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Tax</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($Tax,2); ?>
        <input name="txtTax" type="text" id="txtTax" value="<? echo number_format($Tax,2);?>" size="5">
        </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Shipping Price</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($ShippingCost,2); ?>
        <input name="txtShippingCost" type="text" id="txtShippingCost" value="<? echo number_format($ShippingCost,2);?>" size="5">
        </font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Total Cost</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($TotalCost,2); ?>
        <input name="txtTotalCost" type="text" id="txtTotalCost" value="<? echo number_format($TotalCost,2);?>" size="5">
        </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Shipping Option</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ShippingOption; ?><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>
        <input name="txtShippingOption" type="text" id="txtShippingOption" value="<? echo $ShippingOption;?>" size="3">
        </strong></font></font></font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">eBay Item Number</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $EbayItemNumber; ?><strong>
        <input name="txtItemNumber" type="text" id="txtItemNumber" value="<? echo $EbayItemNumber;?>" size="12">
        </strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">PayPal Transaction 
        Number</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $PaypalNumber; ?><strong>
        <input name="txtPaypalNumber" type="text" id="txtPaypalNumber" value="<? echo $PaypalNumber;?>" size="20">
        </strong></font></td>
    </tr>
  </table>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Optional 
    Information</strong></font></p>
  <table width="50%" border="1" align="left" cellpadding="5" cellspacing="0">
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Referred By:</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ReferredBy; ?>&nbsp;
        <input name="txtReferredBy" type="text" id="txtReferredBy3" value="<? echo $ReferredBy;?>" size="20">
        </font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Test:</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Test; ?>&nbsp;
        <input name="txtTestID" type="text" id="txtTestID2" value="<? echo $TestID;?>" size="3">
        </font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Test Date:</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $TestDate; ?>&nbsp;
        <input name="txtTestDate" type="text" id="txtTestDate2" value="<? echo $TestDate;?>" size="10">
        </font></td>
    </tr>
  </table>
  <p align="left">&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Miscellaneous 
    Information</strong></font></p>
  <table width="75%" border="1" align="left" cellpadding="5" cellspacing="0">
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">IP Address</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $IP; ?>&nbsp;
        <input name="txtIP" type="text" id="txtIP" value="<? echo addQuote($IP);?>" size="15">
        </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Sign Contract?</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Sign; ?>
        <input name="txtSign" type="text" id="txtSign" value="<? echo $Sign; ?>" size="3" maxlength="1">
        </font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Promotion Code ID</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $PromotionCodeID; ?>
        <input name="txtPromotion" type="text" id="txtPromotion"  value="<? echo $Promotion;?>" size="10">
        &nbsp;</font></td>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Affiliate Class ID</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $AffClassID; ?>
        <input name="txtAffClassID" type="text" id="txtAffClassID2" value="<? echo $AffClassID;?>" size="10">
        </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Affiliate Office 
        ID</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $AffOfficeID; ?>
        <input name="txtAffOfficeID" type="text" id="txtAffOfficeID2" value="<? echo $AffOfficeID;?>" size="10">
        </font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Replacement?(y or 
        n) <br>
        </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Replacement; ?>
        <input name="txtReplacement" type="text" id="txtReplacement2" value="<? echo $Replacement;?>" size="3" maxlength="1">
        </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Replacement Type 
        <font size="2" face="Arial, Helvetica, sans-serif">(web, ebay, powerscore, 
        bn)</font></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ReplacementType; ?>
        <input name="txtReplacementType" type="text" id="txtReplacementType" value="<? echo $ReplacementType;?>" size="10">
        </font></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="75%" border="1" align="left" cellpadding="5" cellspacing="0">
    <tr> 
      <td><p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Notes:</font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Notes; ?>&nbsp;<strong>
          <textarea name="txtNotes" cols="50" rows="4" id="textarea"><? echo $Notes;?></textarea>
          </strong></font></p></td>
    </tr>
  </table>
  <p align="left">&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp; </p>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top"> <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; 
          Purchase Information</font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr align="left" valign="top"> 
            <td width="43%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase 
              Order Number<br>
              <input name="txtPONumber" type="text" id="txtPONumber2" value="<? echo $PONumber;?>" size="30">
              </strong></font></td>
            <td width="57%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Invoice 
              Number <br>
              <input name="txtInvoiceNumber" type="text" id="txtInvoiceNumber2" value="<? echo $InvoiceNumber;?>" size="30">
              </strong></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Invoice 
              Date<br>
              <input name="txtInvoiceDate" type="text" id="txtInvoiceDate" value="<? echo $InvoiceDate;?>" size="30">
              </strong></font></td>
            <td>&nbsp;</td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Payment 
              Terms</strong></font><br> <input name="txtPaymentTerms" type="text" id="txtPaymentTerms2" value="<? echo $PaymentTerms;?>"></td>
            <td>&nbsp;</td>
          </tr>
        </table>
        
      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top"> <p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&gt; 
          Billing Information</strong></font></p>
        <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">Same? 
          </font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr align="left" valign="top"> 
            <td width="27%"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">First 
              Name</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtFirstNameB" type="text" id="txtFirstNameB" size="30" value="<? echo addQuote($FirstNameB);?>">
              </font> </td>
            <td width="73%" colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Last 
              Name</font></strong><br>
              <input name="txtLastNameB" type="text" id="txtLastNameB" value="<? echo addQuote($LastNameB);?>" size="30">
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
        <p></div></p>
        </td>
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
                <input name="txtCardType" type="text" id="txtCardType" value="<? echo $CardType;?>">
                </font></td>
              <td width="32%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Last 
                Four Digits</strong><br>
                <input name="txtLastFourCr" type="text" id="LastFourCr3" value="<? echo $LastFourCr;?>">
                </font></td>
              <td width="20%"><font face="Arial, Helvetica, sans-serif"><b><font color="#000033" size="2">CVV2 
                #</font></b>&nbsp; <br>
                <input name="txtCVV2" type="text" id="txtCVV25" size="5" maxlength=4  value="<? echo $CVV2;?>">
                </font></td>
            </tr>
            <tr align="left" valign="top"> 
              <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">Bank 
                Code Authorization <br>
                <input name="txtBankCode" type="text" id="txtBankCode5" value="<? echo $BankCode;?>" size="50">
                </font></strong></td>
              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Address 
                Verification <br>
                <input name="txtAddressVerification" type="text" id="txtAddressVerification6" value="<? echo $AddressVerification;?>" size="50">
                </font></strong></td>
            </tr>
            <tr align="left" valign="top"> 
              <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">CVV2 
                Verification <br>
                <input name="txtCVV2Verification" type="text" id="txtCVV2Verification7" value="<? echo $CVV2Verification;?>" size="50">
                </font></strong></td>
              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date 
                and Time<br>
                <input name="txtDateTime2" type="text" id="txtDateTime25" value="<? echo $DateTime2;?>">
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
          
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr align="left" valign="top"> 
            <td width="35%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Is 
              it a check?</font></strong><br> 
              <input name="txtIsCheck" type="text" id="txtIsCheck2" value="<? echo $IsCheck;?>" size="10"> 
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
  <p>&nbsp;</p>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Save" type="submit" id="Save" value="Save">
    <input type="reset" name="Submit2" value="Reset">
    </font></strong></p>
  </form>
<p>&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

?>