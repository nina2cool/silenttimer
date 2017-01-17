<?
// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//grab customers and information that have NOT been shipped, and that need to be.
	
	$sql = "SELECT tblPurchase.PurchaseID, tblPurchase.Shipped, tblPurchase.NumOrdered, tblPurchase.DateTime,
			tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.Address, tblCustomer.Address2, tblCustomer.City, tblCustomer.State, 
			tblCustomer.ZipCode, tblCustomer.Phone, tblCustomer.Email, tblCustomer.BusinessName 
			FROM tblCustomer INNER JOIN tblPurchase ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE tblPurchase.Shipped = 'n' AND tblPurchase.Status = 'active'
			ORDER BY tblPurchase.DateTime";
	
	#echo $sql;	
	$result = mysql_query($sql) or die("Cannot execute query");
				
	while($row = mysql_fetch_array($result))
	{
		
		$ZipCode4 = '';
	

		echo '"' . $row[FirstName] . '",'; 							# Consignee First Name
		echo '"' . $row[LastName] . '",';							# Consignee Last Name
		echo '"' . $row[BusinessName] . '",';   					# Consignee Company	Name
		echo '"' . $row[Address2] . '",';							# Consignee Addr1
		echo '"' . $row[Address] . '",';							# Consignee Addr2
		echo '"' . $row[City] . '",';								# Consignee City
		echo '"' . $row[State] . '",';								# Consignee State
		echo '"' . $row[ZipCode] . '",';							# Consignee Zip/Postal
		echo '"' . $ZipCode4 . '",';							# Zip Code plus 4
		echo '"' . $row[Phone] . '",';								# Consignee Phone
		echo '"' . $row[Email] . '",';								# Consignee Email
		echo '"' . $row[PurchaseID] . '"';        					# Purchase ID or Order Number aka Notes

		echo '<br>';
		
	}

?>