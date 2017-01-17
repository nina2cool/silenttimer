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
	$handle = fopen ("shippingexport/bills.csv","r");
	
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
				
		#grab data from the array line
		$DateReceived = $data[0];
		$Company = $data[1];
		$DueDate = $data[2];
		$AmountDue = $data[3];
		$AmountPaid = $data[4];
		$DatePaid = $data[5];
		$Status = $data[6];
								

		# insert data into database for shipment...
		$sql = "INSERT INTO tblBills
		(Company, Amount, DueDate, DateReceived, Status, DatePaid, AmountPaid) 
	 	VALUES ('$Company', '$AmountDue', '$DueDate', '$DateReceived', '$Status', '$DatePaid', '$AmountPaid')";
		echo $sql;
		 
		mysql_query($sql) or die("Cannot insert business customer, please try again.");
		
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "Should be done, check it, YES!";
	
	
?>