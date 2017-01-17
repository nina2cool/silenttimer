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
	$handle = fopen ("shippingexport/borders.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		$StoreNumber = $data[0];
		$City = escapeQuote($data[1]);
		$State = $data[2];
		$Address = escapeQuote($data[3]);
		$ZipCode = $data[4];
		$Phone1 = $data[5];
		$Fax = $data[6];
		$GM = escapeQuote($data[7]);
		$StoreHours = $data[8];
		
		$Name = $City;
		$Website = "http://www.bordersstores.com/stores/store_pg.jsp?storeID=$StoreNumber";
		

		# insert data into database for shipment...
		$sql = "INSERT INTO tblBusinessCustomer
		(Name, Chain, Phone1, Address, City, State, ZipCode, Status, Country, Website, CustomerType, Fax1, StoreManager, Notes, BordersStoreNumber) 
	 	VALUES ('$Name', 'Borders', '$Phone1', '$Address', '$City', '$State', '$ZipCode', 'inactive', 'US', '$Website', 'Bookstore', '$Fax', '$GM', '$StoreHours', '$StoreNumber')";
		//echo $sql;
		 
		mysql_query($sql) or die("Cannot insert business customer, please try again.");
		
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "Should be done, check it, YES!";
	
	
?>