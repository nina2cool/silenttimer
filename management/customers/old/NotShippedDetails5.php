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


if ($_POST['Next'] == "Next")
	{
		
		$ShipCostID = $_POST['ShipCostID'];
		$Date = $_POST['Date'];
		$TrackingNumber = $_POST['TrackingNumber'];
		$ShipmentCost = $_POST['ShipmentCost'];

		
		
			$sql11 = "SELECT * FROM tblShipment3 WHERE PurchaseID = '$PurchaseID'";
			//put SQL statement into result set for loop through records
			$result11 = mysql_query($sql11) or die("Cannot Find ShipperID in tblShipment3!");
			
			while($row11 = mysql_fetch_array($result11))
			{
			$TrackingNumberExist = $row11[TrackingNumber];
			}
					
					
			if($TrackingNumber <> $TrackingNumberExist)
			{
			
			
			$sql = "INSERT INTO tblShipment3(PurchaseID, DateTime, 
				ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID, MultiplePieces) 
				
			VALUES ('$PurchaseID', '$Date', 'y', 
			'$TrackingNumber', '$ShipmentCost', '$ShipCostID', 'y')";
			mysql_query($sql) or die("Cannot insert Shipment1");
				
					
			//echo "<br>" .$sql;
			
			
			}
			
			
			
			$sql22 = "SELECT * FROM tblShipment3 WHERE PurchaseID = '$PurchaseID' AND TrackingNumber = '$TrackingNumber'";
			//put SQL statement into result set for loop through records
			$result22 = mysql_query($sql22) or die("Cannot Find ShipperID in tblShipment3!");
			
			while($row22 = mysql_fetch_array($result22))
			{
			$ShipmentID = $row22[ShipmentID];
			}
			
			
			$sql33 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID'";
			$result33 = mysql_query($sql33) or die("Cannot Find ShipperID in tblShippingCost5!");
			
			while($row33 = mysql_fetch_array($result33))
			{
			$ShipperID = $row33[ShipperID];
			}
			
			$sql5 = "UPDATE tblShipment3
			SET ShipperID = '$ShipperID'
			WHERE ShipmentID = '$ShipmentID'";
			$result5 = mysql_query($sql5) or die("Cannot update Shipper ID!");
					
			//echo "<br>ShipmentID = " .$ShipmentID;
			
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
*/
	$goto = "NotShippedDetails6.php?cust=$CustomerID&purch=$PurchaseID&ship=$ShipmentID";
	header("location: $goto");
	
	
	

	
	
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
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Tracking
                  Number </font></strong></td>
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipment
                  Cost</font></strong></td>
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
                    <input name="Date" type="text" id="Date" value="<? echo date("Y-m-d");?>" size="8">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="ShipCostID" type="text" id="ShipCostID" value="<? echo $ShipCostID; ?>" size="4">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="TrackingNumber" type="text" id="TrackingNumber" size="20">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">$
                      <input name="ShipmentCost" type="text" id="ShipmentCost" size="5">
                  </font></td>
                </tr>

<?

	}

?>				
				
              </table>
			  <p align="right"><font size="2" face="Arial, Helvetica, sans-serif">
			    <input name="Next" type="submit" id="Next" value="Next">
  </font></p>
</form>
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