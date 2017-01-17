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
	$handle = fopen ("shippingexport/links.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		$Title = $data[0];
		$Link = $data[1];
		$Description = $data[2];
		$Test = $data[3];
		$Type = $data[4];
		$IsOfficial = $data[5];
		$Status = $data[6];
				
		
		# insert data into database for shipment...
		$sql = "INSERT INTO tblLinks(Title, Link, Description, Test, Type, IsOfficial, Status)
	 			VALUES ('$Title', '$Link', '$Description', '$Test', '$Type', '$IsOfficial', '$Status')";
		 
		mysql_query($sql) or die("Cannot insert links, please try again.");
		
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "Should be done, check it, YES!";
?>