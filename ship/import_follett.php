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
	$handle = fopen ("shippingexport/follett.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		$StoreName = escapeQuote($data[0]);
		$Address = escapeQuote($data[1]);
		$Address2 = escapeQuote($data[2]);
		$City = escapeQuote($data[3]);
		$State = $data[4];
		$ZipCode = $data[5];
		$Phone = $data[8];
		$Email = $data[9];
		$StoreNumber = $data[10];
		$MailingAddress = escapeQuote($data[11]);
		$Website = $data[12];
		

		# insert data into database for shipment...
		$sql = "INSERT INTO tblBusinessCustomer
				(Name, Phone1, Address, Address2, MailingAddress, City, State, ZipCode, Status, Country, Website, CustomerType, Email1, FollettStoreNumber) 
	 	VALUES ('$StoreName', '$Phone', '$Address', '$Address2', '$MailingAddress', '$City', '$State', '$ZipCode', 'inactive', 'US', '$Website', 'Bookstore', '$Email', '$StoreNumber')";
		echo $sql;
		 
		mysql_query($sql) or die("Cannot insert business customer, please try again.");
		
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "Should be done, check it, YES!";
	
	
?>