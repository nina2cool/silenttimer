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
	$handle = fopen ("shippingexport/email.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		$FirstName = $data[0];
		$LastName = $data[1];
		$Email2 = $data[2];
		$City = $data[3];
		$State = $data[4];
		$PurchaseID = $data[5];
		$Subtotal = $data[6];
		$OrderDateTime = $data[7];
		$Num2 = $data[8];

		
		# insert data into database for shipment...
		$sql = "INSERT INTO tblSurveyEmail(FirstName, LastName, Email2, City, State, PurchaseID, Subtotal, OrderDateTime, Num2) 
	 			VALUES ('$FirstName', '$LastName', '$Email2', '$City', '$State', '$PurchaseID', '$Subtotal', '$OrderDateTime', '$Num2')";
		 echo $sql;
		 
		mysql_query($sql) or die("Cannot insert survey email info, please try again.");
		
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "Should be done, check it, YES!";
?>