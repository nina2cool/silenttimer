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
	$handle = fopen ("shippingexport/uspsint.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		//$ShipCostID = $data[0];
		$ShipperID = $data[0];
		$LocationID = $data[1];
		$ShippingOptionID = $data[2];
		$FromWeight = $data[3];
		$ToWeight = $data[4];
		$Cost = $data[6];
		//$Popular = $data[7];
		//$Active = $data[8];
		
		//$sql2 = "UPDATE tblShippingCost5 SET Active = 'n', Old = 'y' WHERE ShipperID = '8' AND LocationID = '$LocationID' AND ShippingOptionID = '12'";
			//mysql_query($sql2) or die("Cannot update actives, please try again.<br><br>$sql");
		
		# insert data into database for shipment...
		//$sql = "UPDATE tblShippingCost6 SET Cost = '$Cost' WHERE ShipperID = '$ShipperID' AND ShippingOptionID = '$ShippingOptionID' AND LocationID = '$LocationID' AND FromWeight = '$FromWeight' AND ToWeight = '$ToWeight'";
		
		
		$sql = "INSERT INTO tblShippingCost5(ShipperID, LocationID, ShippingOptionID, FromWeight, ToWeight, Cost, Active) 
	 			VALUES ('$ShipperID', '$LocationID', '$ShippingOptionID', '$FromWeight', '$ToWeight', '$Cost', 'y')";
		 
		mysql_query($sql) or die("Cannot update ShipCostIDs, please try again.<br><br>$sql");
		
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "Should be done, check it, YES!";
?>