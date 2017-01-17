<title>DHL Ground</title><?
// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

echo 'PurchaseID,CompanyName,Address,Address2,City,State,ZipCode,ATTN,Phone,Email,Residential,Weight,Reference,Service<br>';

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//grab customers and information that have NOT been shipped, and that need to be.
	
	
	$sql = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.Address,
			tblCustomer.Address2, tblCustomer.Phone, tblCustomer.Email,
			tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.CountryID, tblCustomer.BusinessName, 
			tblCustomer.StateOther, tblCustomer.Type,
			tblPurchase2.PurchaseID, tblPurchase2.CustomerID,
			tblPurchase2.ShipCostID, tblPurchase2.Status, tblPurchase2.Shipped
			FROM tblCustomer INNER JOIN tblPurchase2
			ON tblCustomer.CustomerID = tblPurchase2.CustomerID
			WHERE tblPurchase2.Status = 'active' AND tblPurchase2.Preorder <> 'y'
			AND tblPurchase2.Shipped = 'n' OR tblPurchase2.Shipped = 'p'";
	
	//echo $sql;
	
	$result = mysql_query($sql) or die("Cannot execute query");
				
	while($row = mysql_fetch_array($result))
	{
			$BusinessName = $row['BusinessName'];
			$FirstName = $row['FirstName'];
			$LastName = $row['LastName'];
			$Address = $row['Address'];
			$Address2 = $row['Address2'];
			$City = $row['City'];
			$State = $row['State'];
			$StateOther = $row['StateOther'];
			$ZipCode = $row['ZipCode'];
			$Email = $row['Email'];
			$TypeID = $row['Type'];
			$Phone = $row['Phone'];
			$CountryID = $row['CountryID'];
			$PurchaseID = $row['PurchaseID'];
			$ShipCostID = $row['ShipCostID'];

			
			$sql2 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID'";
			$result2 = mysql_query($sql2) or die("Cannot execute shipcostID!");
			
			
					while($row2 = mysql_fetch_array($result2))
					{
					$ShipperID = $row2[ShipperID];
					$ShippingOptionID = $row2[ShippingOptionID];
					}
			
			
					$sql3 = "SELECT * FROM tblShippingOption2 WHERE ShippingOptionID = '$ShippingOptionID'";
					$result3 = mysql_query($sql3) or die("Cannot execute shipping option!");
					
					
					while($row3 = mysql_fetch_array($result3))
					{
					$ShippingOption = $row3['ShippingOption'];
					$Service = $row3['Nickname'];
					}
			
					//if($ShippingOptionID == "1") { $Service = "Ground Delivery"; }
					//if($ShippingOptionID == "2") { $Service = "Second Day"; }
					//if($ShippingOptionID == "3") { $Service = "Next Afternoon"; }

			
			if($ShipperID == '6' AND $CountryID = '225')
			{
	
			
										
			if($BusinessName <> "")
			{
				$Company = $BusinessName;
				$ATTN = $FirstName. ' ' . $LastName;
			}
			else
			{
				$Company = $FirstName. ' ' . $LastName;
				$ATTN = "";
			}
		
		
		if($ShippingOptionID <> "16" AND $ShippingOptionID <> "18" AND $ShippingOptionID <> "19")
		
		{
	
		echo '"' . $PurchaseID . '",';        				# Purchase ID or Order Number
		echo '"' . $Company . '",';   								# Consignee Company
		echo '"' . $Address . '",';							# Consignee Addr1
		echo '"' . $Address2 . '",';							# Consignee Addr2
		echo '"' . $City . '",';								# Consignee City
		echo '"' . $State . '",';								# Consignee State
		echo '"' . $ZipCode . '",';							# Consignee Zip/Postal
		echo '"' . $ATTN . '",';   								# Consignee ATTN
		echo '"' . $Phone . '",';								# Consignee Phone
		echo '"' . $Email . '",';								# Consignee Email
		echo '"N",';												# Residential
		#echo '"' . $row[Country] . '",';							# Consignee Country Code
		#echo '"' . $row[NumOrdered] . '",';						# Contents Line 1
		#echo '"The Silent Timer"|';								# Contents Line 2
		
		# Set Dim Weights for Easy Ship
		//if($ShippingOption == "1") {$h_dim = "1.5";$l_dim = "12.5";$w_dim = "11";}
		//elseif($ShippingOption == "2") {$h_dim = "0";$l_dim = "0";$w_dim = "0";}
		//elseif($ShippingOption == "3") {$h_dim = "0";$l_dim = "0";$w_dim = "0";}
		
		
					$sql5 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID'";
					$result5 = mysql_query($sql5) or die("Cannot execute purch detail 2!");
					
					
					while($row5 = mysql_fetch_array($result5))
					{
					$ProductID = $row5['ProductID'];
					$Quantity = $row5['Quantity'];
					
					
							$sql6 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
							$result6 = mysql_query($sql6) or die("Cannot execute product!");
							
							
							while($row6 = mysql_fetch_array($result6))
							{
							$Weight = $row6['Weight'];
							
							$Weight2 = $Weight * $Quantity;
					
					//echo $Weight2;
					}
			}
		
		# Calculate Weight based on Number ordered!
		//$Weight = .5 * $row[NumOrdered];
		
		$Weight2 = round($Weight2,0);
		
		echo '"' . $Weight2 . '",';									# Weight
		echo '"' . $PurchaseID . '",';						# Reference Number
		echo '"' . $Service . '",';						# Reference Number
		
		//$ship = $row[ShippingOptionID];								# Product (shipping option)
		

		#echo '"1",';													# Dimensions (Number of dimensions provided)
		#echo "\"$h_dim\",";											# Dim Height
		#echo "\"$l_dim\",";											# Dim Length
		#echo "\"$w_dim\",";											# Dim Width
		#echo '"' . $Weight . '",';										# Weight (Again for ground)
		#echo '"' . $row[NumOrdered] . '",';							# Contents Line 1
		#echo '"The Silent Timer",';									# Contents Line 2
		#echo '"",';													# Contents Line 3
		#echo '"",';													# Reference
		#echo '"",';													# Shipment value protection Amount
		#echo '"",';													# Reserved
		#echo '"",';													# Reserved
		#echo '"",';													# Signature Required
		#echo '"",';													# Shipment Value Protection (Y/N)
		#echo '"",';													# On Forwarding
		#echo '"",';													# handling
		#echo '"",';													# Reserved
		#echo '""';														# Reserved

		echo '<br>';
	}
	}
			else
			{
			}
	}

?>