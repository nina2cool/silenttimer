<?
# ---------------------------------------------------------------------------
#   Code to import shipments and send out tracking numbers/emails...
# ---------------------------------------------------------------------------

	# has database username and password, so don't need to put it in the page.
	require "../include/dbinfo.php";
	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	#open up CSV Import file (read only)
	$handle = fopen ("shippingexport/dates2.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		//$TestDateID = $data[0];
		$TestID = $data[0];
		$TestDate = $data[1];
		$RegistrationDate = $data[2];
		$LateRegistrationDate = $data[3];
		$Info = $data[4];
				
		
		# insert data into database for shipment...
		$sql = "INSERT INTO tblTestDates(TestID, Date, Info, RegistrationDate, LateRegistrationDate) 
	 			VALUES ('$TestID', '$TestDate', '$Info', '$RegistrationDate', '$LateRegistrationDate')";
		 
		mysql_query($sql) or die("Cannot insert test dates, please try again.");
		
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "Should be done, check it, YES!";
?>