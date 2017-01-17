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
	$handle = fopen ("shippingexport/company.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		$CustomerType = $data[0];
		$TPRType = $data[1];
		$TPRRegion = $data[2];
		$Name = $data[3];
		$Phone1 = $data[4];
		$Address = $data[5];
		$Address2 = $data[6];
		$Address3 = $data[7];
		$City = $data[8];
		$State = $data[9];
		$ZipCode = $data[10];
		$ContactFirstName = $data[11];
		$ContactLastName = $data[12];
		$ContactPosition = $data[13];
		$ContactEmail = $data[14];
		$ContactFirstName2 = $data[15];
		$ContactLastName2 = $data[16];
		$ContactPosition2 = $data[17];
		$ContactEmail2 = $data[18];
		$Fax1 = $data[19];
		$Chain = $data[20];
		$Status = $data[21];
		$Country = $data[22];		
		
		# insert data into database for shipment...
		$sql = "INSERT INTO tblBusinessCustomer(CustomerType, TPRType, TPRRegion, Name, Phone1, Address, Address2, Address3, City, State, ZipCode, ContactFirstName, ContactLastName, ContactPosition, ContactEmail, ContactFirstName2, ContactLastName2, ContactPosition2, ContactEmail2, Fax1, Chain, Status, Country, Notes) 
	 			VALUES ('$CustomerType', '$TPRType', '$TPRRegion', '$Name', '$Phone1', '$Address', '$Address2', '$Address3', '$City', '$State', '$ZipCode', '$ContactFirstName', '$ContactLastName', '$ContactPosition', '$ContactEmail', '$ContactFirstName2', '$ContactLastName2', '$ContactPosition2', '$ContactEmail2', '$Fax1', '$Chain', '$Status', '$Country', '$Notes')";
		 
		mysql_query($sql) or die("Cannot insert customer, please try again.");
		
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "Should be done, check it, YES!";
?>