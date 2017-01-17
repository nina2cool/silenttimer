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
	$handle = fopen ("shippingexport/testprep.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		$Name = escapeQuote($data[0]);
		$Address = escapeQuote($data[1]);
		$Address2 = escapeQuote($data[2]);
		$City = escapeQuote($data[3]);
		$State = $data[4];
		$ZipCode = $data[6];
		$PromotionCodeID = $data[5];
		$Phone1 = $data[7];
		$Fax1 = $data[8];
		$Phone2 = $data[9];
		$Email1 = $data[10];
		$URL = $data[11];
		$Country = $data[12];
		
		
		
		$Type = "Test Prep";
		
		

		# insert data into database for shipment...
		$sql = "INSERT INTO tblBusinessCustomer
		(Name, Address, Address2, City, State, ZipCode, PromotionCodeID, Phone1, Fax1, Phone2, Email1, Website, Country, Rebate, Status, CustomerType) 
	 	VALUES ('$Name', '$Address', '$Address2', '$City', '$State', '$ZipCode', '$PromotionCodeID', '$Phone1', '$Fax1', '$Phone2', '$Email1', '$URL', '$Country', 'n', 'active', '$Type')";
		//echo $sql;
		 
		mysql_query($sql) or die("Cannot insert business customer, please try again.");
		
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "Should be done, check it, YES!";
	
	
?>