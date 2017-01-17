<?

function escapeQuote($var)
{
	if (isset($var))
	{
		$string = str_replace("'","\'",$var);
		$string = str_replace('"','\"',$string);
	}

	return $string;
}


# ---------------------------------------------------------------------------
#   Code to import shipments and send out tracking numbers/emails...
# ---------------------------------------------------------------------------

	# has database username and password, so don't need to put it in the page.
	require "../include/dbinfo.php";
	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	#open up CSV Import file (read only)
	$handle = fopen ("shippingexport/purchase2_4.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 3000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		$PurchaseID = $data[0];
		$ProductID = $data[1];
		$CustomerID = $data[2];
		$TestID = $data[3];
		$TestDate = $data[4];
		$NumOrdered = $data[5];
		$ReferredBy = $data[6];
		$TimerPrice = $data[7];
		$ShippingOptionID = $data[8];
		$InternationalShippingOption = $data[9];
		$Tax = $data[10];
		$TotalCost = $data[11];
		$PaymentTerms = $data[12];
		$Paid = $data[13];
		$DateTime = $data[14];
		$DateNeeded = $data[15];
		$PONumber = $data[16];
		$InvoiceNumber = $data[17];
		$InvoiceDate = $data[18];
		$Shipped = $data[19];
		$SameBillingAddress = $data[20];
		$IP = $data[21];
		$SignContract = $data[22];
		$ShippingCost = $data[23];		
		$PromotionCodeID = $data[24];		
		$Notes = escapeQuote($data[25]);		
		$EbayItemNumber = $data[26];		
		$PaypalNumber = $data[27];		
		$Status = $data[28];		
		$Replacement = $data[29];
		$ReplacementType = $data[30];		
		$AffClassID = $data[31];
		$AffOfficeID = $data[32];
		$PurchaseDetailsID = $data[33];
		$PurchaseID2 = $data[34];
		$FirstName = escapeQuote($data[35]);
		$LastName = escapeQuote($data[36]);
		$Address = escapeQuote($data[37]);
		$City = escapeQuote($data[38]);
		$State = $data[39];
		$StateOther = $data[40];
		$ZipCode = $data[41];
		$Country = $data[42];
		$CardType = $data[43];
		$LastFourCr = $data[44];
		$CVV2 = $data[45];
		$BankCode = $data[46];
		$AddressVerification = escapeQuote($data[47]);
		$CVV2Verification = escapeQuote($data[48]);
		$DateTime2 = $data[49];
		$IsCheck = $data[50];
		$BankName = $data[51];
		$RoutingNumber = $data[52];
		$CheckNumber = $data[53];

		$Subtotal = $TimerPrice * $NumOrdered;
		
		$Discount = $TotalCost - $Tax - $Subtotal - $ShippingCost;
		
				
		
		
		# insert data into database for shipment...
		$sql = "INSERT INTO tblPurchase2(PurchaseID, CustomerID, TestID, TestDate, ReferredByID, Tax, Subtotal, Discount, Paid, PONumber, InvoiceNumber,
		InvoiceDate, PaypalNumber, OrderDateTime, Shipped, ShipDateTime, ShipCostID, ShippingCost, PromotionCodeID, Notes,
		AffOfficeID, IP, SameAsShip, FirstNameB, LastNameB, AddressB, CityB, StateB, OtherStateB, CountryIDB, ZipB, CardType,
		LastFourCr, CVV2, BankCode, AddressVerification, CVV2Verification, IsCheck, BankName, RoutingNumber, CheckNumber, Status) 
	 	
		VALUES ('$PurchaseID', '$CustomerID', '$TestID', '$TestDate', '$ReferredBy', '$Tax', '$Subtotal', '$Discount', '$Paid', '$PONumber', '$InvoiceNumber',
		'$InvoiceDate', '$PaypalNumber', '$DateTime', '$Shipped', '', '0', '$ShippingCost', '$PromotionCodeID', '$Notes',
		'$AffOfficeID', '$IP', '$SameBillingAddress', '$FirstName', '$LastName', '$Address', '$City', '$State', '$StateOther', '$Country', '$ZipCode', '$CardType',
		'$LastFourCr', '$CVV2', '$BankCode', '$AddressVerification', '$CVV2Verification', '$IsCheck', '$BankName', '$RoutingNumber', '$CheckNumber', '$Status')";
														
		echo $sql;
		 
		mysql_query($sql) or die("Cannot insert purchase2 info, please try again.");
		
		
		
		$sql2 = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Status)
				VALUES ('$PurchaseID', '$ProductID', '$NumOrdered', '$TimerPrice', '$EbayItemNumber', '$Status')";
				
		echo $sql2;
		
		mysql_query($sql2) or die("Cannot insert purchasedetails2 info, please try again.");
		
		
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "Should be done, check it, YES!";
?>