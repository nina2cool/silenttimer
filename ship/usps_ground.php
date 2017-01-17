<title>USPS Ground</title><?
// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

//This is for importing to USPS Address Book using their Import.csv files

/*  Needs to look like this:
Full Name, Company, Address 1, Address 2, Address 3, City, State, Zip Code, Province, Country, Urbanization,Phone Number,Fax Number, E Mail,Reference Number, Short Name


*/

	echo "Full Name,Company,Address 1,Address 2,Address 3,City,State,Zip Code,Province,Country,Urbanization,Phone Number,Fax Number,E Mail,Reference Number,Short Name<br>";

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//grab customers and information that have NOT been shipped, and that need to be.
	
			$sql = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, 
			tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.CountryID, tblCustomer.BusinessName, 
			tblCustomer.StateOther, tblCustomer.Type, tblCustomer.Address, tblCustomer.Address2, tblCustomer.Email,
			tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblCustomer.Phone,
			tblPurchase2.ShipCostID, tblPurchase2.Status, tblPurchase2.Shipped
			FROM tblCustomer INNER JOIN tblPurchase2
			ON tblPurchase2.CustomerID = tblCustomer.CustomerID
			WHERE tblPurchase2.Status = 'active' AND tblPurchase2.Shipped = 'n' AND tblPurchase2.Preorder <> 'y' OR tblPurchase2.Status = 'active'
			AND tblPurchase2.Shipped = 'p' AND tblPurchase2.Preorder <> 'y'";
		
				
	
	/*$sql = "SELECT tblPurchase2.PurchaseID, tblPurchase2.Shipped, tblPurchase2.OrderDateTime, tblPurchase2.ShipCostID, 
			tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.Address, tblCustomer.Address2, tblCustomer.City, tblCustomer.State, 
			tblCustomer.CountryID, 
			tblCustomer.ZipCode, tblCustomer.Phone, tblCustomer.Email, tblCustomer.Type, tblCustomer.BusinessName 
			FROM tblCustomer
			INNER JOIN tblPurchase2 ON tblCustomer.CustomerID = tblPurchase2.CustomerID
			WHERE tblPurchase2.Shipped = 'n' AND tblPurchase2.Status = 'active'
			ORDER BY tblPurchase.DateTime";
		*/
	
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
			
			$FullName = $FirstName. " ". $LastName;
			
			//$ShortName = $LastName. "". $PurchaseID;
			$ShortName = $PurchaseID. "". $LastName;
					
					$sql2 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID'";
					$result2 = mysql_query($sql2) or die("Cannot execute shipcostID!");
					
					
					while($row2 = mysql_fetch_array($result2))
					{
					$ShipperID = $row2[ShipperID];
					$ShippingOptionID = $row2[ShippingOptionID];

					}
					
					$sql3 = "SELECT Nickname FROM tblShippingOption2 WHERE ShippingOptionID = '$ShippingOptionID'";
					$result3 = mysql_query($sql3) or die("Cannot execute shipcostID!");
					while($row3 = mysql_fetch_array($result3))
					{
					$Nickname = $row3[Nickname];
					}
					
					$ShortName = $PurchaseID. "". $LastName. "". $Nickname;
			
					if($ShipperID == '8' AND $ShippingOptionID == '4' OR $ShipperID == '8' AND $ShippingOptionID == '13'
					OR $ShipperID == '8' AND $ShippingOptionID == '14' OR $ShipperID == '8' AND $ShippingOptionID == '26')
					{
					
						


//Full Name, Company, Address 1, Address 2, Address 3, City, State, Zip Code, Province, Country, Urbanization,Phone Number,Fax Number, E Mail,Reference Number, Short Name



						
						if($CountryID == '225' OR $CountyID == '241' OR $CountryID == '242' OR $CountryID == '243')
						
						{
						echo "$FullName,$BusinessName,$Address,$Address2,,$City,$State,$ZipCode,,United States,,$Phone,,$Email,$PurchaseID,$ShortName<br>";
						}
							
							
							
					}
	}
	
	
	
	
	
?>