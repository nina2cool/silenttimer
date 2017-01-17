<?
# ---------------------------------------------------------------------------
#   Code to import shipments and send out tracking numbers/emails...
# ---------------------------------------------------------------------------

	# has database username and password, so don't need to put it in the page.
	require "../include/dbinfo.php";
	# declares class for emails...
	require "../code/class.phpmailer.php";
	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	#open up CSV Import file (read only)
	$handle = fopen ("shippingexport/export5.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		$PurchaseID = $data[6];
		$TrackingNumber = $data[3];
		$NumShipped = 1;
		$now = date("Y-m-d");
		$DateShipped = $data[5];
		$Cost = $data[28];
		$ShipCode = $data[24];
		
		
		if($ShipCode == "Ground")
		{
			$ShipmentCode = 'T';
		}
		elseif($ShipCode == "Second Day")
		{
			$ShipmentCode = 'Y';
		}
		elseif($ShipCode == "Express")
		{
			$ShipmentCode = 'X';
		}
		else
		{
			$ShipmentCode = '';
		}
		
		
		# split date up and put it into correct order for DB
		#$month = substr($DateShipped, 0, 2);
		#$day = substr($DateShipped, 2, 2);
		#$year = substr($DateShipped, 4, 4);
		
		#$D = $year . "-" . $month . "-" . $day;
		$D = $DateShipped;
		
		### - end split date		
		
		# insert data into database for shipment...
		$sql = "INSERT INTO tblShipment(PurchaseID, DateTime, NumShipped, ShipmentComplete, TrackingNumber, ShipmentCost, ShipmentCode, OrderShippedID, ShipperID)
				VALUES ('$PurchaseID', '$D', '$NumShipped', 'y', '$TrackingNumber', '$Cost', '$ShipmentCode', '1', '6')";
		mysql_query($sql) or die("Cannot insert customer, please try again.");
		
		# change order shipped in the purchase table to YES
		$sql = "UPDATE tblPurchase 
				SET Shipped = 'y'
				WHERE PurchaseID = '$PurchaseID'";
		mysql_query($sql) or die("Cannot insert customer, please try again.");
		
		#update product inventory.  Subtract shipments from actual inventory when shipped...
		#$sql = "UPDATE tblProduct SET NumInStock = NumInStock - $NumShipped WHERE ProductID = '1'";
		#mysql_query($sql) or die("Cannot update inventory, please try again.");
		
		
		
		
		# ---------------------------------------------------------------------------------------
		# send out email with tracking info to customer...get their email and name info first...
		# ---------------------------------------------------------------------------------------
		
			$sql = "SELECT tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.Address, tblCustomer.Address2, tblCustomer.City, 
					tblCustomer.State, tblCustomer.ZipCode, tblCustomer.Email, tblCustomer.Type, tblCustomer.BusinessName, 
					tblPurchase.PaypalNumber, tblPurchase.EbayItemNumber 
					FROM tblCustomer INNER JOIN tblPurchase ON tblCustomer.CustomerID = tblPurchase.CustomerID 
					WHERE PurchaseID = '$PurchaseID'";
			
			#echo "<br>$sql<br>";
			
			$result = mysql_query($sql) or die("Cannot retrieve Customer Info, please try again.");
		
			while($row = mysql_fetch_array($result))
			{
				$FirstName = $row[FirstName];
				$LastName = $row[LastName];
				$BusinessName = $row[BusinessName];
				$Email = $row[Email];
				$Type = $row[Type];
				$Address = $row[Address];
				$Address2 = $row[Address2];
				$City = $row[City];
				$State = $row[State];
				$Zip = $row[ZipCode];
				
				$PaypalNumber = $row[PaypalNumber];
				$ItemNumber = $row[EbayItemNumber];
			}
	

# If customer type is web, then send simple polite email.  
# If it is bulk, send more professional email.  
# If it is a sample, send simple, professional email.


	
	echo "$FirstName $LastName   -   $TrackingNumber - $Type<br>";
	
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "<p>import and emails complete. DO NOT REFRESH THIS PAGE! DELETE Export.csv from the server NOW!";
?>