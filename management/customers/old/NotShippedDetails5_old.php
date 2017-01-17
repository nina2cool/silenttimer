<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{
// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

	//grab variables to get purchase info and customer info from DB.
	$PurchaseID = $_GET['purch'];
	$CustomerID = $_GET['cust'];
	//$Num = $_GET['num'];

	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


if ($_POST['Go'] == "Go")
	{
		
		$ShipCostID = $_POST['ShipCostID'];
		$Date = $_POST['Date'];
		$Quantity = $_POST['Quantity'];
		$TrackingNumber = $_POST['TrackingNumber'];
		//$Shipped = $_POST['Shipped'];
		$ShipmentCost = $_POST['ShipmentCost'];
		//$ProductID = $_POST['Product'];
		//$DetailID = $_POST['DetailID'];
		//$Ck = $_POST['Ck'];
		//$CkM = $_POST['CkM'];
		
		$Date1 = $_POST['Date1'];
		$Date2 = $_POST['Date2'];
		$Date3 = $_POST['Date3'];
		$Date4 = $_POST['Date4'];
		$Date5 = $_POST['Date5'];
		$Date6 = $_POST['Date6'];
		$Date7 = $_POST['Date7'];
		$ShipCostID1 = $_POST['ShipCostID1'];
		$ShipCostID2 = $_POST['ShipCostID2'];
		$ShipCostID3 = $_POST['ShipCostID3'];
		$ShipCostID4 = $_POST['ShipCostID4'];
		$ShipCostID5 = $_POST['ShipCostID5'];
		$ShipCostID6 = $_POST['ShipCostID6'];
		$ShipCostID7 = $_POST['ShipCostID7'];
		$ProductID1 = $_POST['ProductID1'];
		$ProductID2 = $_POST['ProductID2'];
		$ProductID3 = $_POST['ProductID3'];
		$ProductID4 = $_POST['ProductID4'];
		$ProductID5 = $_POST['ProductID5'];
		$ProductID6 = $_POST['ProductID6'];
		$ProductID7 = $_POST['ProductID7'];
		$TrackingNumber1 = $_POST['TrackingNumber1'];
		$TrackingNumber2 = $_POST['TrackingNumber2'];
		$TrackingNumber3 = $_POST['TrackingNumber3'];
		$TrackingNumber4 = $_POST['TrackingNumber4'];
		$TrackingNumber5 = $_POST['TrackingNumber5'];
		$TrackingNumber6 = $_POST['TrackingNumber6'];
		$TrackingNumber7 = $_POST['TrackingNumber7'];
		$ShipmentCost1 = $_POST['ShipmentCost1'];
		$ShipmentCost2 = $_POST['ShipmentCost2'];
		$ShipmentCost3 = $_POST['ShipmentCost3'];
		$ShipmentCost4 = $_POST['ShipmentCost4'];
		$ShipmentCost5 = $_POST['ShipmentCost5'];
		$ShipmentCost6 = $_POST['ShipmentCost6'];
		$ShipmentCost7 = $_POST['ShipmentCost7'];
		$Quantity1 = $_POST['Quantity1'];
		$Quantity2 = $_POST['Quantity2'];
		$Quantity3 = $_POST['Quantity3'];
		$Quantity4 = $_POST['Quantity4'];
		$Quantity5 = $_POST['Quantity5'];
		$Quantity6 = $_POST['Quantity6'];
		$Quantity7 = $_POST['Quantity7'];


		$QuantityShipped = $Quantity1 + $Quantity2 + $Quantity3 + $Quantity4 + $Quantity5 + $Quantity6 + $Quantity7;
		
		foreach ($Quantity as $Sum)
		{
			$Sum2 = $Sum + $Sum;
			
			$Sum = $Sum2;
		}
		
		//echo "<br>Sum = " .$Sum;
		
		/*
		
if($QuantityShipped == $Sum)
{

		if($Quantity1 <> '')
		{	
				$sql = "INSERT INTO tblShipment3(PurchaseID, DateTime, 
				ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID, MultiplePieces) 
				
				VALUES ('$PurchaseID', '$Date1', 'y', 
				'$TrackingNumber1', '$ShipmentCost1', '$ShipCostID1', 'y')";
				mysql_query($sql) or die("Cannot insert Shipment1");
				
				$sql22 = "INSERT INTO tblShipment2(PurchaseID, DateTime, 
				ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID) 
				
				VALUES ('$PurchaseID', '$Date1', 'y', 
				'$TrackingNumber1', '$ShipmentCost1', '$ShipCostID1')";
				mysql_query($sql22) or die("Cannot insert Shipment1");
				
				
				$sql11 = "SELECT * FROM tblShipment3 WHERE PurchaseID = '$PurchaseID' AND TrackingNumber = '$TrackingNumber1'";
				//put SQL statement into result set for loop through records
				$result11 = mysql_query($sql11) or die("Cannot Find ShipperID in tblShipment3!");
				
				while($row11 = mysql_fetch_array($result11))
				{
				$ShipmentID = $row11[ShipmentID];
				}
				
				
				$sql33 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID1'";
				//put SQL statement into result set for loop through records
				$result33 = mysql_query($sql33) or die("Cannot Find ShipperID in tblShippingCost5!");
				
				while($row33 = mysql_fetch_array($result33))
				{
				$ShipperID = $row33[ShipperID];
				}
				
				$sql5 = "UPDATE tblShipment3
				SET ShipperID = '$ShipperID'
				WHERE ShipmentID = '$ShipmentID'";
				$result5 = mysql_query($sql5) or die("Cannot update Shipper ID!");
				
				
				$sql6 = "UPDATE tblPurchase2
				SET Shipped = 'y'
				WHERE PurchaseID = '$PurchaseID'";
				$result6 = mysql_query($sql6) or die("Cannot update Shipped in tblPurchaseDetails2!");
				//echo $sql6;
				
		
					$sql9 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Shipped = 'n'";
					//put SQL statement into result set for loop through records
					$result9 = mysql_query($sql9) or die("Cannot execute query!");
					
					while($row9 = mysql_fetch_array($result9))
					{
					$DetailID = $row9[DetailID];
					$Quantity = $row9[Quantity];
					$ProductID = $row9[ProductID];
					
					
							$sql12 = "INSERT INTO tblShipmentProduct(ShipmentID, DetailID, 
							Quantity, Complete) 
							
							VALUES ('$ShipmentID', '$DetailID', '$Quantity1', 
							'y')";
							mysql_query($sql12) or die("Cannot insert ShipmentProduct");
		
		
							$sql22 = "UPDATE tblPurchaseDetails2
							SET Shipped = 'y'
							WHERE DetailID = '$DetailID'";
							$result22 = mysql_query($sql22) or die("Cannot update Shipped in tblPurchaseDetails2!");
							//echo $sql22;
		
		
		
		
							$sql8 = "UPDATE tblProductNew
							SET OnHand = OnHand - $Quantity
							WHERE ProductID = '$ProductID'";
							$result8 = mysql_query($sql8) or die("Cannot update tblProduct!");
		
						}
				}
		else
		{
		echo "Quantity 1 is blank - Shipment not entered";
		}


		if($Quantity2 <> '')
		{	
				$sql = "INSERT INTO tblShipment3(PurchaseID, DateTime, 
				ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID, MultiplePieces) 
				
				VALUES ('$PurchaseID', '$Date2', 'y', 
				'$TrackingNumber2', '$ShipmentCost2', '$ShipCostID2', 'y')";
				mysql_query($sql) or die("Cannot insert Shipment2");
				
				$sql22 = "INSERT INTO tblShipment2(PurchaseID, DateTime, 
				ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID) 
				
				VALUES ('$PurchaseID', '$Date2', 'y', 
				'$TrackingNumber2', '$ShipmentCost2', '$ShipCostID2')";
				mysql_query($sql22) or die("Cannot insert Shipment2");
				
				
				$sql11 = "SELECT * FROM tblShipment3 WHERE PurchaseID = '$PurchaseID' AND TrackingNumber = '$TrackingNumber2'";
				//put SQL statement into result set for loop through records
				$result11 = mysql_query($sql11) or die("Cannot Find ShipperID in tblShipment3!");
				
				while($row11 = mysql_fetch_array($result11))
				{
				$ShipmentID = $row11[ShipmentID];
				}
				
				
				$sql33 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID2'";
				//put SQL statement into result set for loop through records
				$result33 = mysql_query($sql33) or die("Cannot Find ShipperID in tblShippingCost5!");
				
				while($row33 = mysql_fetch_array($result33))
				{
				$ShipperID = $row33[ShipperID];
				}
				
				$sql5 = "UPDATE tblShipment3
				SET ShipperID = '$ShipperID'
				WHERE ShipmentID = '$ShipmentID'";
				$result5 = mysql_query($sql5) or die("Cannot update Shipper ID!");
				
				
				$sql6 = "UPDATE tblPurchase2
				SET Shipped = 'y'
				WHERE PurchaseID = '$PurchaseID'";
				$result6 = mysql_query($sql6) or die("Cannot update Shipped in tblPurchaseDetails2!");
				//echo $sql6;
				
		
					$sql9 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Shipped = 'n'";
					//put SQL statement into result set for loop through records
					$result9 = mysql_query($sql9) or die("Cannot execute query!");
					
					while($row9 = mysql_fetch_array($result9))
					{
					$DetailID = $row9[DetailID];
					$Quantity = $row9[Quantity];
					$ProductID = $row9[ProductID];
					
					
							$sql12 = "INSERT INTO tblShipmentProduct(ShipmentID, DetailID, 
							Quantity, Complete) 
							
							VALUES ('$ShipmentID', '$DetailID', '$Quantity2', 
							'y')";
							mysql_query($sql12) or die("Cannot insert ShipmentProduct");
		
		
							$sql8 = "UPDATE tblProductNew
							SET OnHand = OnHand - $Quantity
							WHERE ProductID = '$ProductID'";
							$result8 = mysql_query($sql8) or die("Cannot update tblProduct!");
		
						}
				}
		else
		{
		echo "Quantity 2 is blank - Shipment not entered";
		}

		if($Quantity3 <> '')
		{	
				$sql = "INSERT INTO tblShipment3(PurchaseID, DateTime, 
				ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID, MultiplePieces) 
				
				VALUES ('$PurchaseID', '$Date3', 'y', 
				'$TrackingNumber3', '$ShipmentCost3', '$ShipCostID3', 'y')";
				mysql_query($sql) or die("Cannot insert Shipment3");
				
				$sql22 = "INSERT INTO tblShipment2(PurchaseID, DateTime, 
				ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID) 
				
				VALUES ('$PurchaseID', '$Date3', 'y', 
				'$TrackingNumber3', '$ShipmentCost3', '$ShipCostID3')";
				mysql_query($sql22) or die("Cannot insert Shipment3");
				
				
				$sql11 = "SELECT * FROM tblShipment3 WHERE PurchaseID = '$PurchaseID' AND TrackingNumber = '$TrackingNumber3'";
				//put SQL statement into result set for loop through records
				$result11 = mysql_query($sql11) or die("Cannot Find ShipperID in tblShipment3!");
				
				while($row11 = mysql_fetch_array($result11))
				{
				$ShipmentID = $row11[ShipmentID];
				}
				
				
				$sql33 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID3'";
				//put SQL statement into result set for loop through records
				$result33 = mysql_query($sql33) or die("Cannot Find ShipperID in tblShippingCost5!");
				
				while($row33 = mysql_fetch_array($result33))
				{
				$ShipperID = $row33[ShipperID];
				}
				
				$sql5 = "UPDATE tblShipment3
				SET ShipperID = '$ShipperID'
				WHERE ShipmentID = '$ShipmentID'";
				$result5 = mysql_query($sql5) or die("Cannot update Shipper ID!");
				
				
				$sql6 = "UPDATE tblPurchase2
				SET Shipped = 'y'
				WHERE PurchaseID = '$PurchaseID'";
				$result6 = mysql_query($sql6) or die("Cannot update Shipped in tblPurchaseDetails2!");
				//echo $sql6;
				
		
					$sql9 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Shipped = 'n'";
					//put SQL statement into result set for loop through records
					$result9 = mysql_query($sql9) or die("Cannot execute query!");
					
					while($row9 = mysql_fetch_array($result9))
					{
					$DetailID = $row9[DetailID];
					$Quantity = $row9[Quantity];
					$ProductID = $row9[ProductID];
					
					
							$sql12 = "INSERT INTO tblShipmentProduct(ShipmentID, DetailID, 
							Quantity, Complete) 
							
							VALUES ('$ShipmentID', '$DetailID', '$Quantity3', 
							'y')";
							mysql_query($sql12) or die("Cannot insert ShipmentProduct");
		
		
							$sql8 = "UPDATE tblProductNew
							SET OnHand = OnHand - $Quantity
							WHERE ProductID = '$ProductID'";
							$result8 = mysql_query($sql8) or die("Cannot update tblProduct!");
		
						}
				}
		else
		{
		echo "Quantity 3 is blank - Shipment not entered";
		}
			
			
		if($Quantity4 <> '')
		{	
				$sql = "INSERT INTO tblShipment3(PurchaseID, DateTime, 
				ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID, MultiplePieces) 
				
				VALUES ('$PurchaseID', '$Date4', 'y', 
				'$TrackingNumber4', '$ShipmentCost4', '$ShipCostID4', 'y')";
				mysql_query($sql) or die("Cannot insert Shipment4");
				
				$sql22 = "INSERT INTO tblShipment2(PurchaseID, DateTime, 
				ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID) 
				
				VALUES ('$PurchaseID', '$Date4', 'y', 
				'$TrackingNumber4', '$ShipmentCost4', '$ShipCostID4')";
				mysql_query($sql22) or die("Cannot insert Shipment4");
				
				
				$sql11 = "SELECT * FROM tblShipment3 WHERE PurchaseID = '$PurchaseID' AND TrackingNumber = '$TrackingNumber4'";
				//put SQL statement into result set for loop through records
				$result11 = mysql_query($sql11) or die("Cannot Find ShipperID in tblShipment3!");
				
				while($row11 = mysql_fetch_array($result11))
				{
				$ShipmentID = $row11[ShipmentID];
				}
				
				
				$sql33 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID4'";
				//put SQL statement into result set for loop through records
				$result33 = mysql_query($sql33) or die("Cannot Find ShipperID in tblShippingCost5!");
				
				while($row33 = mysql_fetch_array($result33))
				{
				$ShipperID = $row33[ShipperID];
				}
				
				$sql5 = "UPDATE tblShipment3
				SET ShipperID = '$ShipperID'
				WHERE ShipmentID = '$ShipmentID'";
				$result5 = mysql_query($sql5) or die("Cannot update Shipper ID!");
				
				
				$sql6 = "UPDATE tblPurchase2
				SET Shipped = 'y'
				WHERE PurchaseID = '$PurchaseID'";
				$result6 = mysql_query($sql6) or die("Cannot update Shipped in tblPurchaseDetails2!");
				//echo $sql6;
				
		
					$sql9 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Shipped = 'n'";
					//put SQL statement into result set for loop through records
					$result9 = mysql_query($sql9) or die("Cannot execute query!");
					
					while($row9 = mysql_fetch_array($result9))
					{
					$DetailID = $row9[DetailID];
					$Quantity = $row9[Quantity];
					$ProductID = $row9[ProductID];
					
					
							$sql12 = "INSERT INTO tblShipmentProduct(ShipmentID, DetailID, 
							Quantity, Complete) 
							
							VALUES ('$ShipmentID', '$DetailID', '$Quantity4', 
							'y')";
							mysql_query($sql12) or die("Cannot insert ShipmentProduct4");
		
		
							$sql8 = "UPDATE tblProductNew
							SET OnHand = OnHand - $Quantity
							WHERE ProductID = '$ProductID'";
							$result8 = mysql_query($sql8) or die("Cannot update tblProduct!");
		
						}
				}
		else
		{
		echo "Quantity 4 is blank - Shipment not entered";
		}
				
				

		if($Quantity5 <> '')
		{	
				$sql = "INSERT INTO tblShipment3(PurchaseID, DateTime, 
				ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID, MultiplePieces) 
				
				VALUES ('$PurchaseID', '$Date5', 'y', 
				'$TrackingNumber5', '$ShipmentCost5', '$ShipCostID5', 'y')";
				mysql_query($sql) or die("Cannot insert Shipment5");
				
				$sql22 = "INSERT INTO tblShipment2(PurchaseID, DateTime, 
				ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID) 
				
				VALUES ('$PurchaseID', '$Date5', 'y', 
				'$TrackingNumber5', '$ShipmentCost5', '$ShipCostID5')";
				mysql_query($sql22) or die("Cannot insert Shipment5");
				
				
				$sql11 = "SELECT * FROM tblShipment3 WHERE PurchaseID = '$PurchaseID' AND TrackingNumber = '$TrackingNumber5'";
				//put SQL statement into result set for loop through records
				$result11 = mysql_query($sql11) or die("Cannot Find ShipperID in tblShipment3!");
				
				while($row11 = mysql_fetch_array($result11))
				{
				$ShipmentID = $row11[ShipmentID];
				}
				
				
				$sql33 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID5'";
				//put SQL statement into result set for loop through records
				$result33 = mysql_query($sql33) or die("Cannot Find ShipperID in tblShippingCost5!");
				
				while($row33 = mysql_fetch_array($result33))
				{
				$ShipperID = $row33[ShipperID];
				}
				
				$sql5 = "UPDATE tblShipment3
				SET ShipperID = '$ShipperID'
				WHERE ShipmentID = '$ShipmentID'";
				$result5 = mysql_query($sql5) or die("Cannot update Shipper ID!");
				
				
				$sql6 = "UPDATE tblPurchase2
				SET Shipped = 'y'
				WHERE PurchaseID = '$PurchaseID'";
				$result6 = mysql_query($sql6) or die("Cannot update Shipped in tblPurchaseDetails2!");
				//echo $sql6;
				
		
					$sql9 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Shipped = 'n'";
					//put SQL statement into result set for loop through records
					$result9 = mysql_query($sql9) or die("Cannot execute query!");
					
					while($row9 = mysql_fetch_array($result9))
					{
					$DetailID = $row9[DetailID];
					$Quantity = $row9[Quantity];
					$ProductID = $row9[ProductID];
					
					
							$sql12 = "INSERT INTO tblShipmentProduct(ShipmentID, DetailID, 
							Quantity, Complete) 
							
							VALUES ('$ShipmentID', '$DetailID', '$Quantity5', 
							'y')";
							mysql_query($sql12) or die("Cannot insert ShipmentProduct");
		
		
							$sql8 = "UPDATE tblProductNew
							SET OnHand = OnHand - $Quantity
							WHERE ProductID = '$ProductID'";
							$result8 = mysql_query($sql8) or die("Cannot update tblProduct!");
		
						}
				}


		else
		{
		echo "Quantity 5 is blank - Shipment not entered";
		}

		if($Quantity6 <> '')
		{	
				$sql = "INSERT INTO tblShipment3(PurchaseID, DateTime, 
				ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID, MultiplePieces) 
				
				VALUES ('$PurchaseID', '$Date6', 'y', 
				'$TrackingNumber6', '$ShipmentCost6', '$ShipCostID6', 'y')";
				mysql_query($sql) or die("Cannot insert Shipment6");
				
				$sql22 = "INSERT INTO tblShipment2(PurchaseID, DateTime, 
				ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID) 
				
				VALUES ('$PurchaseID', '$Date6', 'y', 
				'$TrackingNumber6', '$ShipmentCost6', '$ShipCostID6')";
				mysql_query($sql22) or die("Cannot insert Shipment6");
				
				
				$sql11 = "SELECT * FROM tblShipment3 WHERE PurchaseID = '$PurchaseID' AND TrackingNumber = '$TrackingNumber6'";
				//put SQL statement into result set for loop through records
				$result11 = mysql_query($sql11) or die("Cannot Find ShipperID in tblShipment3!");
				
				while($row11 = mysql_fetch_array($result11))
				{
				$ShipmentID = $row11[ShipmentID];
				}
				
				
				$sql33 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID6'";
				//put SQL statement into result set for loop through records
				$result33 = mysql_query($sql33) or die("Cannot Find ShipperID in tblShippingCost5!");
				
				while($row33 = mysql_fetch_array($result33))
				{
				$ShipperID = $row33[ShipperID];
				}
				
				$sql5 = "UPDATE tblShipment3
				SET ShipperID = '$ShipperID'
				WHERE ShipmentID = '$ShipmentID'";
				$result5 = mysql_query($sql5) or die("Cannot update Shipper ID!");
				
				
				$sql6 = "UPDATE tblPurchase2
				SET Shipped = 'y'
				WHERE PurchaseID = '$PurchaseID'";
				$result6 = mysql_query($sql6) or die("Cannot update Shipped in tblPurchaseDetails2!");
				//echo $sql6;
				
		
					$sql9 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Shipped = 'n'";
					//put SQL statement into result set for loop through records
					$result9 = mysql_query($sql9) or die("Cannot execute query!");
					
					while($row9 = mysql_fetch_array($result9))
					{
					$DetailID = $row9[DetailID];
					$Quantity = $row9[Quantity];
					$ProductID = $row9[ProductID];
					
					
							$sql12 = "INSERT INTO tblShipmentProduct(ShipmentID, DetailID, 
							Quantity, Complete) 
							
							VALUES ('$ShipmentID', '$DetailID', '$Quantity6', 
							'y')";
							mysql_query($sql12) or die("Cannot insert ShipmentProduct");
		
		
							$sql8 = "UPDATE tblProductNew
							SET OnHand = OnHand - $Quantity
							WHERE ProductID = '$ProductID'";
							$result8 = mysql_query($sql8) or die("Cannot update tblProduct!");
		
						}
				}
				else
		{
		echo "Quantity 6 is blank - Shipment not entered";
		}

		if($Quantity7 <> '')
		{	
				$sql = "INSERT INTO tblShipment3(PurchaseID, DateTime, 
				ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID, MultiplePieces) 
				
				VALUES ('$PurchaseID', '$Date7', 'y', 
				'$TrackingNumber7', '$ShipmentCost7', '$ShipCostID7', 'y')";
				mysql_query($sql) or die("Cannot insert Shipment7");
				
				$sql22 = "INSERT INTO tblShipment2(PurchaseID, DateTime, 
				ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID) 
				
				VALUES ('$PurchaseID', '$Date7', 'y', 
				'$TrackingNumber7', '$ShipmentCost7', '$ShipCostID7')";
				mysql_query($sql22) or die("Cannot insert Shipment7");
				
				
				$sql11 = "SELECT * FROM tblShipment3 WHERE PurchaseID = '$PurchaseID' AND TrackingNumber = '$TrackingNumber7'";
				//put SQL statement into result set for loop through records
				$result11 = mysql_query($sql11) or die("Cannot Find ShipperID in tblShipment3!");
				
				while($row11 = mysql_fetch_array($result11))
				{
				$ShipmentID = $row11[ShipmentID];
				}
				
				
				$sql33 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID7'";
				//put SQL statement into result set for loop through records
				$result33 = mysql_query($sql33) or die("Cannot Find ShipperID in tblShippingCost5!");
				
				while($row33 = mysql_fetch_array($result33))
				{
				$ShipperID = $row33[ShipperID];
				}
				
				$sql5 = "UPDATE tblShipment3
				SET ShipperID = '$ShipperID'
				WHERE ShipmentID = '$ShipmentID'";
				$result5 = mysql_query($sql5) or die("Cannot update Shipper ID!");
				
				
				$sql6 = "UPDATE tblPurchase2
				SET Shipped = 'y'
				WHERE PurchaseID = '$PurchaseID'";
				$result6 = mysql_query($sql6) or die("Cannot update Shipped in tblPurchaseDetails2!");
				//echo $sql6;
				
		
					$sql9 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Shipped = 'n'";
					//put SQL statement into result set for loop through records
					$result9 = mysql_query($sql9) or die("Cannot execute query!");
					
					while($row9 = mysql_fetch_array($result9))
					{
					$DetailID = $row9[DetailID];
					$Quantity = $row9[Quantity];
					$ProductID = $row9[ProductID];
					
					
							$sql12 = "INSERT INTO tblShipmentProduct(ShipmentID, DetailID, 
							Quantity, Complete) 
							
							VALUES ('$ShipmentID', '$DetailID', '$Quantity7', 
							'y')";
							mysql_query($sql12) or die("Cannot insert ShipmentProduct");
		
		
							$sql8 = "UPDATE tblProductNew
							SET OnHand = OnHand - $Quantity
							WHERE ProductID = '$ProductID'";
							$result8 = mysql_query($sql8) or die("Cannot update tblProduct!");
		
						}
				}

				else
				{
				echo "Quantity 7 is blank - Shipment not entered";
				}
		}
		


else
{
echo "quantities don't match!  try again!";
}

	$goto = "NotShippedView.php";
	header("location: $goto");
	
	
	
*/
	
	
	}



// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


	
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$FirstName = $row[FirstName];
		$LastName = $row[LastName];
		$CompanyName = $row[BusinessName];
	}


	
	
	
?>



                <font size="5" face="Arial, Helvetica, sans-serif"><strong><font color="#000000">&gt; Shipment
                Detail:</font></strong></font><font face="Arial, Helvetica, sans-serif"><strong><font color="#000000" size="5"><font color="#FF0000"> <? echo "$FirstName $LastName";?></font></font><font color="#FF0000"> 
                <?

	if($CompanyName <> "")
	{
?> 
                (<font size="3"><? echo $CompanyName;?></font>)
                <?
}
?>
  </font></strong></font></p>
			<form name="form1" method="post" action="">
			  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
                <tr>
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipment
                  Date </font></strong></td>
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">ShipCostID <a href="ShipCostID.php" target="_blank">view
                          list</a></font></strong></td>
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></td>
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Tracking
                  Number </font></strong></td>
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipment
                  Cost</font></strong></td>
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Num
                        Shipped </font></strong></td>
                </tr>


<?
				$sql3 = "SELECT * FROM tblPurchase2 WHERE PurchaseID = '$PurchaseID'";
				//put SQL statement into result set for loop through records
				$result3 = mysql_query($sql3) or die("Cannot execute query!");
				
				while($row3 = mysql_fetch_array($result3))
				{
				$ShipCostID = $row3[ShipCostID];
				$PurchaseID = $row3[PurchaseID];
				
				
				if($ShipCostID == '34' OR $ShipCostID == '117' OR $ShipCostID == '118' OR $ShipCostID == '120' OR $ShipCostID == '133')
				{
				$Cost = 4.05;
				}
				elseif($ShipCostID == '11')
				{
				$Cost = 7;
				}
				elseif($ShipCostID == '115' OR $ShipCostID == '116' OR $ShipCostID == '119' OR $ShipCostID == '120' OR $ShipCostID == '134')
				{
				$Cost = 13.65;
				}
				else
				{
				$Cost = '';
				}


?>

                <tr>
                  
				  
				  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Date1" type="text" id="Date1" value="<? echo date("Y-m-d");?>" size="8">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="ShipCostID1" type="text" id="ShipCostID1" value="<? echo $ShipCostID; ?>" size="4">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                  <select name="Product1" tabindex="" id="Product1" class="text">
                      <option value="" selected>Select</option>
                      <? 
					$sql = "SELECT * FROM tblProduct";
					
					$result = mysql_query($sql) or die("Cannot get tblProduct1");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                      <option value="<? echo $row[ProductID]; ?>"<? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
                      <?
					}
				?>
                    </select>
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="TrackingNumber1" type="text" id="TrackingNumber1" size="20">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">$
                      <input name="ShipmentCost1" type="text" id="ShipmentCost1" size="5">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Quantity1" type="text" id="Quantity1" size="4">
                  </font></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Date2" type="text" id="Date2" value="<? echo date("Y-m-d");?>" size="8">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="ShipCostID2" type="text" id="ShipCostID2" value="<? echo $ShipCostID; ?>" size="4">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <select name="Product2" tabindex="" id="Product2" class="text">
                      <option value="" selected>Select</option>
                      <? 
					$sql = "SELECT * FROM tblProduct";
					
					$result = mysql_query($sql) or die("Cannot get tblProduct1");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                      <option value="<? echo $row[ProductID]; ?>"<? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
                      <?
					}
				?>
                    </select>
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="TrackingNumber2" type="text" id="TrackingNumber2" size="20">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">$
                        <input name="ShipmentCost2" type="text" id="ShipmentCost2" size="5">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Quantity2" type="text" id="Quantity2" size="4">
                  </font></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Date3" type="text" id="Date3" value="<? echo date("Y-m-d");?>" size="8">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="ShipCostID3" type="text" id="ShipCostID3" value="<? echo $ShipCostID; ?>" size="4">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                  <select name="Product3" tabindex="" id="Product3" class="text">
                      <option value="" selected>Select</option>
                      <? 
					$sql = "SELECT * FROM tblProduct";
					
					$result = mysql_query($sql) or die("Cannot get tblProduct1");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                      <option value="<? echo $row[ProductID]; ?>"<? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
                      <?
					}
				?>
                    </select>
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="TrackingNumber3" type="text" id="TrackingNumber3" size="20">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">$
                        <input name="ShipmentCost3" type="text" id="ShipmentCost3" size="5">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Quantity3" type="text" id="Quantity3" size="4">
                  </font></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Date4" type="text" id="Date4" value="<? echo date("Y-m-d");?>" size="8">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="ShipCostID4" type="text" id="ShipCostID4" value="<? echo $ShipCostID; ?>" size="4">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                  <select name="Product4" tabindex="" id="Product4" class="text">
                      <option value="" selected>Select</option>
                      <? 
					$sql = "SELECT * FROM tblProduct";
					
					$result = mysql_query($sql) or die("Cannot get tblProduct1");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                      <option value="<? echo $row[ProductID]; ?>"<? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
                      <?
					}
				?>
                    </select>
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="TrackingNumber4" type="text" id="TrackingNumber4" size="20">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">$
                        <input name="ShipmentCost4" type="text" id="ShipmentCost4" size="5">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Quantity4" type="text" id="Quantity4" size="4">
                  </font></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Date5" type="text" id="Date5" value="<? echo date("Y-m-d");?>" size="8">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="ShipCostID5" type="text" id="ShipCostID5" value="<? echo $ShipCostID; ?>" size="4">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                  <select name="Product5" tabindex="" id="Product5" class="text">
                      <option value="" selected>Select</option>
                      <? 
					$sql = "SELECT * FROM tblProduct";
					
					$result = mysql_query($sql) or die("Cannot get tblProduct1");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                      <option value="<? echo $row[ProductID]; ?>"<? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
                      <?
					}
				?>
                    </select>
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="TrackingNumber5" type="text" id="TrackingNumber5" size="20">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">$
                        <input name="ShipmentCost5" type="text" id="ShipmentCost5" size="5">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Quantity5" type="text" id="Quantity5" size="4">
                  </font></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Date6" type="text" id="Date6" value="<? echo date("Y-m-d");?>" size="8">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="ShipCostID6" type="text" id="ShipCostID6" value="<? echo $ShipCostID; ?>" size="4">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                  <select name="Product6" tabindex="" id="Product6" class="text">
                      <option value="" selected>Select</option>
                      <? 
					$sql = "SELECT * FROM tblProduct";
					
					$result = mysql_query($sql) or die("Cannot get tblProduct1");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                      <option value="<? echo $row[ProductID]; ?>"<? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
                      <?
					}
				?>
                    </select>
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="TrackingNumber6" type="text" id="TrackingNumber6" size="20">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">$
                        <input name="ShipmentCost6" type="text" id="ShipmentCost6" size="5">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Quantity6" type="text" id="Quantity6" size="4">
                  </font></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Date7" type="text" id="Date7" value="<? echo date("Y-m-d");?>" size="8">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="ShipCostID7" type="text" id="ShipCostID7" value="<? echo $ShipCostID; ?>" size="4">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                  <select name="Product7" tabindex="" id="Product7" class="text">
                      <option value="" selected>Select</option>
                      <? 
					$sql = "SELECT * FROM tblProduct";
					
					$result = mysql_query($sql) or die("Cannot get tblProduct1");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                      <option value="<? echo $row[ProductID]; ?>"<? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
                      <?
					}
				?>
                    </select>
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="TrackingNumber7" type="text" id="TrackingNumber7" size="20">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">$
                        <input name="ShipmentCost7" type="text" id="ShipmentCost7" size="5">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Quantity7" type="text" id="Quantity7" size="4">
                  </font></td>
                </tr>

<?

	}

?>				
				
              </table>
			  <p>&nbsp; </p>
			  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
                          <tr>
                            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></td>
                            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Quantity</font></strong></td>
                          </tr>
						  
	<?
	
			$sql2 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Shipped = 'n'";
			//put SQL statement into result set for loop through records
			$result2 = mysql_query($sql2) or die("Cannot execute query!");
			
			while($row2 = mysql_fetch_array($result2))
			{
			$ProductID = $row2[ProductID];
			$Quantity = $row2[Quantity];
			$DetailID = $row2[DetailID];
			
			
	
	
	
	
	?>						  
						  
						  
						  
						  
                          <tr>
                            <td><font size="2" face="Arial, Helvetica, sans-serif">
                              <select name="Product" tabindex="" id="Product" class="text">
                                <option value="" selected>Select</option>
                                <? 
					$sql = "SELECT * FROM tblProduct";
					
					$result = mysql_query($sql) or die("Cannot get tblProduct1");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                                <option value="<? echo $row[ProductID]; ?>"<? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
                                <?
					}
				?>
                              </select>
                            </font></td>
                            <td><font size="2" face="Arial, Helvetica, sans-serif">
                              <input name="Quantity[]" type="text" id="Quantity[]" value="<? echo $Quantity; ?>" size="4">
                            </font></td>
                          </tr>
						  
						  <?
						  
						  
						  }
						  
						  
						  ?>
						  
						  
						  
              </table>
                        <p>
                          <input name="Go" type="submit" id="Go" value="Go">
                        </p>
            </form>
			<p>&nbsp;</p>
			
			
			
			<p><font size="2" face="Arial, Helvetica, sans-serif">
			  </font></p>
			<p></p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>