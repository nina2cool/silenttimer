<?
// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//grab customers and information that have NOT been shipped, and that need to be.
	
	$sql = "SELECT tblBusinessCustomer.Name, tblBusinessCustomer.Chain, tblBusinessCustomer.Address, tblBusinessCustomer.City, tblBusinessCustomer.State, tblBusinessCustomer.Country, 
			tblBusinessCustomer.ZipCode, tblBusinessCustomer.Phone1, tblBusinessCustomer.Email1, tblBusinessCustomer.BusinessCustomerID
			FROM tblBusinessCustomer
			WHERE tblBusinessCustomer.Status = 'active' AND tblBusinessCustomer.CustomerType = 'Bookstore'";
	
	#echo $sql;	
	$result = mysql_query($sql) or die("Cannot execute query");
				
	while($row = mysql_fetch_array($result))
	{
		$Company = $row[Name];
	
		echo '"' . $row[BusinessCustomerID] . '"|';     			# Purchase ID or Order Number
		echo '"' . $Company . '"|';   								# Consignee Company
		echo '"Trade Book Manager"|';  								# Consignee ATTN
		echo '"' . $row[Address] . '"|';							# Consignee Addr1
		echo '"' . $row[Address2] . '"|';							# Consignee Addr2
		echo '"' . $row[City] . '"|';								# Consignee City
		echo '"' . $row[State] . '"|';								# Consignee State
		echo '"' . $row[ZipCode] . '"|';							# Consignee Zip/Postal
		echo '"' . $row[Country] . '"|';							# Consignee Country Code
		echo '"' . $row[Phone1] . '"|';								# Consignee Phone
		echo '"' . $row[Email1] . '"|';								# Consignee Email
		echo '"' . $row[NumOrdered] . '"|';							# Contents Line 1
		echo '"Silent Timer Store Information"|';					# Contents Line 2
		
		$ship = '1';								# Product (shipping option)
		
		# set shipping code for Easy Ship
		if($ship == "1") {echo '"T"|';}
		elseif($ship == "2") {echo '"Y"|';}
		elseif($ship == "3") {echo '"X"|';}
		
		# Set Dim Weights for Easy Ship
		if($ship == "1") {$h_dim = "1.5";$l_dim = "12.5";$w_dim = "11";}
		elseif($ship == "2") {$h_dim = "0";$l_dim = "0";$w_dim = "0";}
		elseif($ship == "3") {$h_dim = "0";$l_dim = "0";$w_dim = "0";}
		
		
		
		# Calculate Weight based on Number ordered!
		$Weight = .5 * $row[NumOrdered];
		
		echo '"' . $Weight . '"|';									# Weight
		echo '"1"|';												# Dimensions (Number of dimensions provided)
		echo "\"$h_dim\"|";											# Dim Height
		echo "\"$l_dim\"|";											# Dim Length
		echo "\"$w_dim\"|";											# Dim Width
		echo '"' . $Weight . '"|';									# Weight (Again for ground)
		echo '"' . $row[NumOrdered] . '"|';							# Contents Line 1
		echo '"Silent Timer Store Information"|';					# Contents Line 2
		echo '""|';													# Contents Line 3
		echo '""|';													# Reference
		echo '""|';													# Shipment value protection Amount
		echo '""|';													# Reserved
		echo '""|';													# Reserved
		echo '""|';													# Signature Required
		echo '""|';													# Shipment Value Protection (Y/N)
		echo '""|';													# On Forwarding
		echo '""|';													# handling
		echo '""|';													# Reserved
		echo '""';													# Reserved

		echo '<br>';
	}

?>