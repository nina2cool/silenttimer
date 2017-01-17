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
	$handle = fopen ("shippingexport/purchase2.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		$PurchaseID = $data[0];
		$ProductID = $data[1];
		$CustomerID = $data[3];
		$TestID = $data[4];
		$TestDate = $data[5];
		$NumOrdered = $data[6];
		$ReferredBy = $data[7];
		$TimerPrice = $data[8];
		$ShippingOptionID = $data[9];
		$InternationalShippingOption = $data[10];
		$Tax = $data[11];
		$TotalCost = $data[12];
		$PaymentTerms = $data[13];
		$Paid = $data[14];
		$DateTime = $data[15];
		$DateNeeded = $data[16];
		$PONumber = $data[17];
		$InvoiceNumber = $data[18];
		$InvoiceDate = $data[19];
		$Shipped = $data[20];
		$SameBillingAddress = $data[21];
		$IP = $data[22];
		$SignContract = $data[23];
		$ShippingCost = $data[24];		
		$PromotionCodeID = $data[25];		
		$Notes = $data[26];		
		$EbayItemNumber = $data[27];		
		$PaypalNumber = $data[28];		
		$Status = $data[29];		
		$Replacement = $data[30];		
		$ReplacementType = $data[31];		
		$AffClassID = $data[32];		
		$AffOfficeID = $data[33];		
		
		
		# insert data into database for shipment...
		$sql = "INSERT INTO tblPurchaseProduct(PurchaseID, ProductID, Status, Quantity, Shipped, PromotionCodeID, Price) 
	 			VALUES ('$PurchaseID', '$ProductID', '$Status', '$NumOrdered', '$Shipped', '$PromotionCodeID', '$TimerPrice')";
		 
		mysql_query($sql) or die("Cannot insert purchase product info, please try again.");
		
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "Should be done, check it, YES!";
?>