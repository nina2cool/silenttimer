<?
// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//grab customers and information that have NOT been shipped, and that need to be.
	
	$sql = "SELECT * FROM tblTPR 
			WHERE Country != 'US'
			ORDER BY Country";
	
	#echo $sql;	
	$result = mysql_query($sql) or die("Cannot execute query");
				
	while($row = mysql_fetch_array($result))
	{
		echo '"The Princeton Review"|';       						# Company
		echo '"TPR ' . $row[Name] . '"|';       					# Office Name
		echo '"' . $row[ContactName] . '"|';       					# Contact's Name
		echo '"' . $row[Phone] . '"|';   							# Contact's Phone
		echo '"' . $row[Address] . '"|';							# Addr1
		echo '"' . $row[Address2] . '"|';							# Addr2
		echo '"' . $row[Address3] . '"|';							# Addr3
		#echo '"' . $row[Address4] . '"|';							# Addr4
		echo '"' . $row[City] . '"|';								# City
		echo '"' . $row[State] . '"|';								# State
		echo '"' . $row[ZipCode] . '"|';							# Zip Code
		echo '"' . $row[Country] . '"|';							# Country Code
		echo '"The Silent Timer"|';									# Contents Line
		
		echo '"T"|';												# Ground Shipping
		echo '"0.50"|';												# Weight
		echo '"1"|';												# Dimensions (Number of dimensions provided)
		echo '"1.5"|';												# Dim Height
		echo '"12"|';												# Dim Length
		echo '"9"|';												# Dim Width
		echo '"0.50"|';												# Weight (Again for ground)
		echo '"1"|';												# Contents Line 1
		echo '"The Silent Timer"|';									# Contents Line 2
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