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
	$handle = fopen ("shippingexport/partnumber.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		$PartNumberID = $data[0];
		$PartNumber = $data[1];
		$Make = $data[3];
		$Model = $data[4];
		$ModelDescription = $data[5];
		$FromYear = $data[6];
		$ToYear = $data[7];
		$Title = $data[8];
		$Description = $data[9];
		$HTML = $data[10];
		$ImageID = $data[11];
		$Price = $data[12];
		$Cost = $data[13];
		$ShippingCost = $data[14];
		$Weight = $data[15];
		$Size = $data[16];
		$Style = $data[17];
		$NumPieces = $data[18];
		$Factory = $data[19];
		$Custom = $data[20];
		$Options = $data[21];
		$Product = $data[22];
		$Pair = $data[23];		
		
		# insert data into database for shipment...
		$sql = "INSERT INTO tblPartNumber(PartNumberID, PartNumber, ProductID, Make, Model, ModelDescription, FromYear, ToYear, Title, Description, HTML, ImageID, Price, Cost, ShippingCost, Weight, Size, Style, NumPieces, Factory, Custom, Options, Product, Pair) 
	 			VALUES ('$PartNumberID', '$PartNumber', '$ProductID', '$Make', '$Model', '$ModelDescription', '$FromYear', '$ToYear', '$Title', '$Description', '$HTML', '$ImageID', '$Price', '$Cost', '$ShippingCost', '$Weight', '$Size', '$Style', '$NumPieces', '$Factory', '$Custom', '$Options', '$Product', '$Pair')";
		 
		mysql_query($sql) or die("Cannot insert part numbers, please try again.");
		
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "Should be done, check it, YES!";
?>