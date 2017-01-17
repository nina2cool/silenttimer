<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{
// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

		// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

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



	//grab variables to get purchase info from DB.
	$PurchaseID = $_GET['purch'];
	$CustomerID = $_GET['cust'];

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	#<Add button being pushed>
	if ($_POST['Save'] == "Save")
	{
				
		
		// Purchase Details Table
		$FirstNameB = dbQuote($_POST['FirstNameB']);
		$LastNameB = dbQuote($_POST['LastNameB']);
		$AddressB = dbQuote($_POST['AddressB']);
		$CityB = dbQuote($_POST['CityB']);
		$StateB = $_POST['StateB'];
		$OtherStateB = $_POST['OtherStateB'];
		$CountryB = $_POST['CountryB'];
		$ZipCodeB = $_POST['ZipCodeB'];
		$CardType = $_POST['CardType'];
		$LastFourCr = $_POST['LastFourCr'];
		$CVV2 = $_POST['CVV2'];
		$BankCode = $_POST['BankCode'];
		$AddressVerification = $_POST['AddressVerification'];
		$CVV2Verification = $_POST['CVV2Verification'];
		$OrderDateTime = $_POST['OrderDateTime'];
		$IsCheck = $_POST['IsCheck'];
		$BankName = $_POST['BankName'];
		$RoutingNumber = $_POST['RoutingNumber'];
		$CheckNumber = $_POST['CheckNumber'];
		$Shipped = $_POST['Shipped'];
		$PromotionCodeID = $_POST['PromotionCodeID'];
		$Notes = $_POST['Notes'];
		$Paid = $_POST['Paid'];
		$Status = $_POST['Status'];
		$PaymentTerms = $_POST['PaymentTerms'];
		
		$TestID = $_POST['Test'];
		if($Test == ""){$Test = "0";} #fixes integer problem for test being blank if none is selected.		
		
		$TestDate = $_POST['TestDate'];
		$ReferredBy = $_POST['ReferredBy'];
		$ShipCostID = $_POST['ShipCostID'];
		$TaxNew = $_POST['Tax'];
		//$Subtotal = $_POST['Subtotal'];
		$OrderDateTime = $_POST['OrderDateTime'];
		$DiscountNew = $_POST['Discount'];
		$Same = $_POST['Same'];
		$IP = $_POST['IP'];
		$ShippingCost = $_POST['ShippingCost'];
		$AffOfficeID = $_POST['AffOfficeID'];
		$PaypalNumber = $_POST['PaypalNumber'];
		$PONumber = $_POST['PONumber'];
		$InvoiceNumber = $_POST['InvoiceNumber'];	
		$InvoiceDate = $_POST['InvoiceDate'];
		$ShipNotes = $_POST['ShipNotes'];
		$Preorder = $_POST['Preorder'];
		$Preordered = $_POST['Preordered'];
		
		$sql2 = "UPDATE tblPurchase2
			SET FirstNameB = '$FirstNameB', 
				LastNameB = '$LastNameB',
				AddressB = '$AddressB',
				CityB = '$CityB',
				StateB = '$StateB',
				OtherStateB = '$OtherStateB',
				ZipB = '$ZipCodeB',
				CountryIDB = '$CountryB',
				CardType = '$CardType',
				LastFourCr = '$LastFourCr',
				CVV2 = '$CVV2',
				BankCode = '$BankCode',
				AddressVerification = '$AddressVerification',
				CVV2Verification = '$CVV2Verification',
				IsCheck = '$IsCheck',
				BankName = '$BankName',
				RoutingNumber = '$RoutingNumber',
				CheckNumber = '$CheckNumber',
				Tax = '$Tax',
				TestID = '$TestID',
				ReferredByID = '$ReferredBy',
				PONumber = '$PONumber',
				InvoiceNumber = '$InvoiceNumber',
				InvoiceDate = '$InvoiceDate',
				Discount = '$Discount',
				Status = '$Status',
				PaypalNumber = '$PaypalNumber',
				ShippingCost = '$ShippingCost',
				ShipCostID = '$ShipCostID',
				SameAsShip = '$Same',
				IP = '$IP',
				Shipped = '$Shipped',
				OrderDateTime = '$OrderDateTime',
				Paid = '$Paid',
				TestDate = '$TestDate',
				PromotionCodeID = '$PromotionCodeID',
				AffOfficeID = '$AffOfficeID',
				Notes = '$Notes',
				ShipNotes = '$ShipNotes',
				PaymentTerms = '$PaymentTerms',
				Preorder = '$Preorder',
				Preordered = '$Preordered'
			WHERE PurchaseID = '$PurchaseID'";

		mysql_query($sql2) or die("Cannot update tblPurchaseDetails 234");
		
		//$goto = "PurchaseDetails.php?purch=$PurchaseID&cust=$CustomerID";
		header("Location: PurchaseDetails.php?purch=$PurchaseID&cust=$CustomerID");
	} 


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";





		
		
	$sql2 = "SELECT * FROM tblPurchase2 WHERE PurchaseID = '$PurchaseID'";
	$result2 = mysql_query($sql2) or die("Cannot execute query! purchase2 details");

	while($row2 = mysql_fetch_array($result2))
	{
			$Discount = $row2[Discount];
			$Subtotal = $row2[Subtotal];
			$Status = $row2[Status];
			$Tax = $row2[Tax];
			$Shipped = $row2[Shipped];
			$ShippingCost = $row2[ShippingCost];
			$ShipCostID = $row2[ShipCostID];
			$ReferredBy = $row2[ReferredByID];
			$TestID = $row2[TestID];
			$InvoiceNumber = $row2[InvoiceNumber];
			$IP = $row2[IP];
			$TestDate = $row2[TestDate];
			$PONumber = $row2[PONumber];
			$Same = $row2[SameAsShip];
			$InvoiceDate = $row2[InvoiceDate];
			$Paid = $row2[Paid];
			$Notes = $row2[Notes];
			$PaypalNumber = $row2[PaypalNumber];
			$AffOfficeID = $row2[AffOfficeID];
			$OrderDateTime = $row2[OrderDateTime];
			$PromotionCodeID = $row2[PromotionCodeID];
			$FirstNameB = $row2[FirstNameB];
			$LastNameB = $row2[LastNameB];
			$AddressB = $row2[AddressB];
			$CityB = $row2[CityB];
			$StateB = $row2[StateB];
			$OtherStateB = $row2[OtherStateB];
			$ZipCodeB = $row2[ZipB];
			$CountryB = $row2[CountryIDB];
			$CardType = $row2[CardType];
			$LastFourCr = $row2[LastFourCr];
			$BankCode = $row2[BankCode];
			$AddressVerification = $row2[AddressVerification];
			$CVV2Verification = $row2[CVV2Verification];
			$IsCheck = $row2[IsCheck];
			$BankName = $row2[BankName];
			$RoutingNumber = $row2[RoutingNumber];
			$CheckNumber = $row2[CheckNumber];
			$ShipNotes = $row2[ShipNotes];
			$Preorder = $row2[Preorder];
			$Preordered = $row2[Preordered];
				
	}
	
		
	?>		

<?
		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		
		$FirstNameB = addQuote($FirstNameB);
		$LastNameB = addQuote($LastNameB);
		$AddressB = addQuote($AddressB);
		$CityB = addQuote($CityB);		
		
		}

?>





<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">Customer
Information</a> | <a href="Notes.php?cust=<? echo $CustomerID; ?>">Notes</a> </font></p>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
    Purchase Order # <? echo $PurchaseID; ?></strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&lt; <a href="PurchaseDetails.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Back
to Purchase Details</a></strong></font></p>
<form name="form1" method="post" action="">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date / Time of Purchase:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="OrderDateTime" type="text" id="OrderDateTime" value="<? echo $OrderDateTime;?>" size="25">
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Purchase
            Order Status:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">        <select name="Status" class="text" id="select2">
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT Status FROM tblPurchase2
						GROUP BY Status ORDER BY Status ASC";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[Status];?>" <? if($row[Status] == $Status){echo "selected";}?>><? echo $row[Status];?></option>
          <?
						}
					?>
        </select>
</font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Entire order
            shipped? </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(y/n/p)</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Shipped" id="Shipped">
          <option value="y"<? if($Shipped == "y") { ?> selected<? } ?>>y</option>
          <option value="n"<? if($Shipped == "n") { ?> selected<? } ?>>n</option>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Currently
            on Preorder?</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> (only
            &quot;y&quot; if currenlty a preorder, once it is ready to ship, it is a &quot;n&quot;)</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Preorder" id="Preorder">
          <option value="y"<? if($Preorder == "y") { ?> selected<? } ?>>y</option>
          <option value="n"<? if($Preorder == "n") { ?> selected<? } ?>>n</option>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Originally
            preordered?</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> (if
            it ever was a preorder, then this stays &quot;y&quot;)</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">        <select name="Preordered" id="Preordered">
          <option value="y"<? if($Preordered == "y") { ?> selected<? } ?>>y</option>
          <option value="n"<? if($Preordered == "n") { ?> selected<? } ?>>n</option>
        </select>
</font></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Discount:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        $
            <input name="Discount" type="text" id="Discount" value="<? echo number_format($Discount,2);?>" size="5">
</font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Tax: </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(The
            cost of the items and shipping is taxed)</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$
            
            <input name="Tax" type="text" id="Tax" value="<? echo number_format($Tax,2);?>" size="5">
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipping
            Cost:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$
            <input name="ShippingCost" type="text" id="ShippingCost" value="<? echo number_format($ShippingCost,2);?>" size="5">
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="ShipCostID.php" target="_blank">Shipping
            Cost ID</a>:</font></strong></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>
      <input name="ShipCostID" type="text" id="ShipCostID" value="<? echo $ShipCostID;?>" size="5">
      </strong></font></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Referred By:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
	  
	  
	  	<select name="ReferredBy" tabindex="20" id="ReferredBy" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblReferredBy";
					
					$result = mysql_query($sql) or die("Cannot get ReferredBy");
					
					while($row = mysql_fetch_array($result))
					{
				?>
          <option value="<? echo $row[ReferredByID]; ?>" <? if($row[ReferredByID] == $ReferredBy){echo "selected";}?>><? echo $row[Name]; ?></option>
          <?
					}
				?>
        </select>
</font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Test:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
	  
	  
  		<select name="Test" tabindex="13" id="Test">
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
          <option value="<? echo $row[TestID]; ?>" <? if($row[TestID] == $TestID){echo "selected";}?><? if($row[Name] == $tURL){echo "selected";}?>><? echo $row[Name]; ?></option>
          <?
					}
				?>
        </select>
</font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Test Date:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="TestDate" type="text" id="TestDate2" value="<? echo $TestDate;?>" size="10">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Paid?</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
          <select name="Paid" id="Paid">
            <option value="y"<? if($Paid == "y") { ?> selected<? } ?>>y</option>
            <option value="n"<? if($Paid == "n") { ?> selected<? } ?>>n</option>
          </select>
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Purchase
            Order Number: </font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="PONumber" type="text" id="PONumber2" value="<? echo $PONumber;?>" size="30">
      </strong></font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Invoice
            Number: </font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="InvoiceNumber" type="text" id="InvoiceNumber2" value="<? echo $InvoiceNumber;?>" size="30">
      </strong></font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Invoice
            Date: </font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="InvoiceDate" type="text" id="InvoiceDate" value="<? echo $InvoiceDate;?>" size="30">
      </strong></font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Payment
      Terms : </font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="PaymentTerms" type="text" id="PaymentTerms" value="<? echo $PaymentTerms;?>" size="30">
      </strong></font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Promotion
            Code ID: </font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="PromotionCodeID" type="text" id="PromotionCodeID" value="<? echo $PromotionCodeID;?>" size="30">
      </strong></font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">IP Address:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="IP" type="text" id="IP" value="<? echo addQuote($IP);?>" size="15">
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Affiliate
            Office ID:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="AffOfficeID" type="text" id="AffOfficeID2" value="<? echo $AffOfficeID;?>" size="10">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping
            Notes:<br>
        </strong>(Notes related to whether to <br>
    email customer, print packing list, etc) </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <textarea name="ShipNotes" cols="50" rows="4" id="textarea"><? echo $ShipNotes; ?></textarea>
      </strong></font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase
      Notes:</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <textarea name="Notes" cols="50" rows="4" id="textarea"><? echo $Notes;?></textarea>
      </strong></font></td>
    </tr>
  </table>
  <br>
  <table width="75%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Same
            billing address?:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
      <select name="Same" id="Same">
        <option value="y"<? if($Same == "y") { ?> selected<? } ?>>y</option>
        <option value="n"<? if($Same == "n") { ?> selected<? } ?>>n</option>
      </select>
</strong></font></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">PayPal Transaction
          Number:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="PaypalNumber" type="text" id="PaypalNumber" value="<? echo $PaypalNumber;?>" size="20">
      </strong></font></td>
    </tr>
  </table>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Billing Information</strong></font></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>First
            Name</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="FirstNameB" type="text" id="FirstNameB" size="30" value="<? echo addQuote($FirstNameB);?>">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Last
            Name</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="LastNameB" type="text" id="LastNameB" value="<? echo addQuote($LastNameB);?>" size="30">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Address</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="AddressB" type="text" id="AddressB2" value="<? echo addQuote($AddressB);?>" size="35" maxlength="30">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>City</strong></font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="CityB" type="text" id="CityB2" size="20" value="<? echo addQuote($CityB);?>">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State</strong></font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="StateB" type="text" id="StateB3" value="<? echo addQuote($StateB);?>" size="10">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Other State</strong></font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="OtherStateB" type="text" id="StateB3" value="<? echo addQuote($OtherStateB);?>" size="10">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip
            Code</strong></font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="ZipCodeB" type="text" id="ZipCodeB3" size="11" maxlength="10" value="<? echo $ZipCodeB;?>">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Country</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
       
	   
	    <select name="CountryB2" tabindex="20" id="CountryB2" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql3 = "SELECT * FROM tblShipLocation";
					$result3 = mysql_query($sql3) or die("Cannot get CountryB");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
          <option value="<? echo $row3[LocationID]; ?>" <? if($row3[LocationID] == $CountryB){echo "selected";}?>><? echo $row3[Name]; ?></option>
          <?
					}
				?>
        </select>
		
		
      </font></td>
    </tr>
  </table>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Credit Card Information</strong></font></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Card
      Type </strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">        <select name="CardType" class="text" id="CardType">
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT CardType FROM tblPurchase2
						WHERE CardType <> 'amazon'
						GROUP BY CardType ORDER BY CardType ASC";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[CardType];?>" <? if($row[CardType] == $CardType){echo "selected";}?>><? echo $row[CardType];?></option>
          <?
						}
					?>
        </select>
</font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Last
      Four Digits </strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="LastFourCr" type="text" id="LastFourCr3" value="<? echo $LastFourCr;?>">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Authorization
      Code </strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
      <input name="BankCode" type="text" id="BankCode5" value="<? echo $BankCode;?>" size="50">
</strong>
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Address
      Verification </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="AddressVerification" type="text" id="AddressVerification6" value="<? echo $AddressVerification;?>" size="50">
      </font></strong></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>CVV2
      Verification </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="CVV2Verification" type="text" id="CVV2Verification7" value="<? echo $CVV2Verification;?>" size="50">
      </font></strong></td>
    </tr>
  </table>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Check Information</strong></font></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Is it a
      check?</font></strong></td>
      <td>        <font size="2" face="Arial, Helvetica, sans-serif"><strong>
      <select name="IsCheck" id="IsCheck">
        <option value="y"<? if($IsCheck == "y") { ?> selected<? } ?>>y</option>
        <option value="n"<? if($IsCheck == "n") { ?> selected<? } ?>>n</option>
      </select>
</strong></font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Bank
      Name</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="BankName" type="text" id="BankName3"  value="<? echo $BankName;?>" size="20">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Routing
      Number</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="RoutingNumber" type="text" id="RoutingNumber2"  value="<? echo $RoutingNumber;?>" size="15">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Check
      Number</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="CheckNumber" type="text" id="CheckNumber"  value="<? echo $CheckNumber;?>" size="6">
      </font></td>
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
//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

?>