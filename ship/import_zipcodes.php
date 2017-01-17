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
	$handle = fopen ("shippingexport/zipcode.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		$ZipCode = $data[0];
		$City = escapeQuote($data[1]);
		$State = $data[2];
		$AreaCode = $data[3];
				
		
		# insert data into database for shipment...
		$sql = "INSERT INTO tblZipCode(ZipCode, City, State, AreaCode) 
	 			VALUES ('$ZipCode', '$City', '$State', '$AreaCode')";
		 
		mysql_query($sql) or die("Cannot insert zip codes, please try again.<br><br>$sql");
		
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "Should be done, check it, YES!";
?>