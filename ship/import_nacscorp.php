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
	$handle = fopen ("shippingexport/nacscorp.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		$Store = $data[0];
		$StoreName = $data[1];
		$Address2 = $data[2];
		$Address = $data[3];
		$City = $data[4];
		$State = $data[5];
		$ZipCode = $data[6];
		$ShipDate = $data[7];
		$ISBN = $data[8];
		$Author = $data[9];
		$Title = $data[10];
		$Price = $data[11];
		$Qty = $data[12];
		$Ext = $data[13];
		$ReportDate = $data[14];

		//$ShipDate = $Year. "-". $Month. "-". $Day;
		
		//echo "<br>ShipDate = " .$ShipDate;	
				
		
		# insert data into database for shipment...
		$sql = "INSERT INTO tblNACSCORP
				(Store, StoreName, Address2, Address, City, State, ZipCode, ShipDate, ISBN, Author, Title, Price, Qty, Ext, ReportDate) 
	 	VALUES ('$Store', '$StoreName', '$Address2', '$Address', '$City', '$State', '$ZipCode', '$ShipDate', '$ISBN', '$Author', '$Title', '$Price', '$Qty', '$Ext', '$ReportDate')";
		//echo $sql;
				 
		mysql_query($sql) or die("Cannot insert nacscorp, please try again.");
		
		
		$sql2 = "SELECT * FROM tblBusinessCustomer WHERE nacsID = '$Store'";
		$result2 = mysql_query($sql2) or die("Cannot find nacsID");
		
		$Num = mysql_num_rows($result2);
		
		if($Num < 1)
		{
			echo "<br>New Store - nacsID = " .$Store;
		}
		else
		{
			echo "<br>Okay!";
		}

		
				
		
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "Should be done, check it, YES!";
	
	
?>