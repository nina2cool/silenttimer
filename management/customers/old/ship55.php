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

//CODE GOES BELOW-----------------------------------------------------------
?>

<?

	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	#<Add button being pushed>
	if ($_POST['Go'] == "Go")
	{
	
	
	$sql = "SELECT * FROM tblShipment3";
	$result = mysql_query($sql) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result))
		{
			
			$ShipmentID = $row[ShipmentID];
			$PurchaseID = $row[PurchaseID];
			$MultiplePieces = $row[MultiplePieces];
			$DateTime = $row[DateTime];
			$ShipperID = $row[ShipperID];
			$DetailID = $row[DetailID];
			$TrackingNumber = $row[TrackingNumber];
			$Quantity = $row[Quantity];
			$ShipCostID = $row[ShipCostID];
			$ShipmentComplete = $row[ShipmentComplete];
			$ShipmentCost = $row[ShipmentCost];
			$Notes = $row[Notes];
			
			
			$sql2 = "INSERT INTO tblShipmentProduct(ShipmentID, Quantity, DetailID)
			VALUES('$ShipmentID', '$Quantity', '$DetailID');";
			$result2 = mysql_query($sql2) or die("Cannot execute query shipment!");
			
			}
		
		}
	
		
	
?>


<form name="form1" method="post" action="">
  <p>
    <input name="Go" type="submit" id="Go" value="Go"> 
  Transfer data
  </p>
</form>

<?
}
?>