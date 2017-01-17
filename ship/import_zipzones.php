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
	$handle = fopen ("shippingexport/zone.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		$FromZip = $data[0];
		$ToZip = $data[1];
		$ZoneID = $data[2];
		
				
		
		# insert data into database for shipment...
		$sql = "INSERT INTO tblZipZone(FromZip, ToZip, ZoneID) 
	 			VALUES ('$FromZip', '$ToZip', '$ZoneID')";
		 
		mysql_query($sql) or die("Cannot insert zip zones, please try again.<br><br>$sql");
		
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "Should be done, check it, YES!";
?>