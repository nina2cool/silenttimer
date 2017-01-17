<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	if ($_POST['Submit'] == "Submit")
	{
		$PurchaseID = $_POST['PurchaseID'];
		$TrackingNumber = $_POST['TrackingNumber'];
		$Cost = $_POST['Cost'];
		$Date = $_POST['Date'];
		$ShipCostID = $_POST['ShipCostID'];
	
		
		$sql = "INSERT INTO tblShipment3(PurchaseID, TrackingNumber, ShipmentCost, ShipperID, DateTime, ShipCostID, ShipmentComplete)
		VALUES('$PurchaseID', '$TrackingNumber', '$Cost', '6', '$Date', '$ShipCostID', 'y');";
		
		$result = mysql_query($sql) or die("CAnnot insert");
		
		$sql8 = "SELECT * FROM tblShipment3 WHERE PurchaseID = '$PurchaseID'";
		$result8 = mysql_query($sql8) or die("Cannot execute query DetailID!");
		
		while($row8 = mysql_fetch_array($result8))
		{
		$ShipmentID = $row8[ShipmentID];
		}
		
		
		$sql2 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID'";
		$result2 = mysql_query($sql2) or die("Cannot execute query DetailID!");
		
		while($row2 = mysql_fetch_array($result2))
		{
		$DetailID = $row2[DetailID];
		$Quantity = $row2[Quantity];
		
				
				$sql3 = "INSERT INTO tblShipmentProduct(ShipmentID, DetailID, Quantity, Complete)
				VALUES('$ShipmentID', '$DetailID', '$Quantity', 'y');";
				$result3 = mysql_query($sql3) or die("Cannot execute query 3333!");

		}
		
		
		}
?>
<form name="form1" method="post" action="">
  <table width="100%"  border="1" cellspacing="0" cellpadding="5">
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Date</font></td>
      <td><input name="Date" type="text" id="Date" value="2003-09-16"></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Cost</font></td>
      <td><input name="Cost" type="text" id="Cost"></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Ship Cost ID </font></td>
      <td><input name="ShipCostID" type="text" id="ShipCostID"></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">PurchaseID</font></td>
      <td><input name="PurchaseID" type="text" id="PurchaseID"></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Tracking number </font></td>
      <td><input name="TrackingNumber" type="text" id="TrackingNumber"></td>
    </tr>
  </table>
  <p>
    <input type="submit" name="Submit" value="Submit">
  </p>
</form>

<?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.

require "../include/footerlinks.php";

}

// finishes security for page
?>