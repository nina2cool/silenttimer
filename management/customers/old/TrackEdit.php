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

	//grab variables to get purchase info from DB.

	$ShipmentID = $_GET['ship'];

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	if ($_POST['Save'] == "Save")
	{
	
		$ShipmentID = $_POST['ShipmentID'];
		$PurchaseID = $_POST['PurchaseID'];
		$DateShipped = $_POST['DateShipped'];
		$NumShipped = $_POST['NumShipped'];
		$ShipmentComplete = $_POST['ShipmentComplete'];
		$TrackingNumber = $_POST['TrackingNumber'];
		$ShipmentCost = $_POST['ShipmentCost'];
		$ShipmentCode = $_POST['ShipmentCode'];
		$OrderShippedID = $_POST['OrderShippedID'];
		$Notes = $_POST['Notes'];
	
		$sql3 = "UPDATE tblShipment
			SET PurchaseID = '$PurchaseID', 
				DateTime = '$DateShipped', 
				NumShipped = '$NumShipped', 
				ShipmentComplete = '$ShipmentComplete', 
				TrackingNumber = '$TrackingNumber', 
				ShipmentCost = '$ShipmentCost',
				ShipmentCode = '$ShipmentCode', 
				OrderShippedID = '$OrderShippedID',
				Notes = '$Notes'
			WHERE ShipmentID = '$ShipmentID'";

		echo $sql3;
		
		mysql_query($sql3) or die("Cannot update shipment information");
			
	 }
		
	
		$sql = "SELECT * FROM tblShipment WHERE ShipmentID = '$ShipmentID'";

		//put SQL statement into result set for loop through records
		$result = mysql_query($sql) or die("Cannot execute query ShipmentID!");
		
		while($row = mysql_fetch_array($result))
		{
			
			$ShipmentID = $row[ShipmentID];
			$PurchaseID = $row[PurchaseID];
			$DateShipped = $row[DateTime];
			$NumShipped = $row[NumShipped];
			$ShipmentComplete = $row[ShipmentComplete];
			$TrackingNumber = $row[TrackingNumber];
			$ShipmentCost = $row[ShipmentCost];
			$ShipmentCode = $row[ShipmentCode];
			$OrderShippedID = $row[OrderShippedID];
			$Notes = $row[Notes];
			
		}
		
		
	?>		


<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Shipment 
  Tracking Information</strong></font></p>
<form name="form1" method="post" action="">
  <font size="2" face="Arial, Helvetica, sans-serif"><strong> </strong></font> 
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399">Shipment 
        ID</font></strong><br>
        <input name="ShipmentID" type="text" id="ShipmentID" value="<? echo $ShipmentID; ?>">
        </font></td>
      <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase 
        ID</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
        <input name="PurchaseID" type="text" id="PurchaseID" value="<? echo $PurchaseID; ?>">
        </font></td>
    </tr>
    <tr> 
      <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Date 
        Shipped</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
        <input name="DateShipped" type="text" id="DateShipped" value="<? echo $DateShipped; ?>">
        </font></td>
      <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Number 
        Shipped</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
        <input name="NumShipped" type="text" id="NumShipped" value="<? echo $NumShipped; ?>">
        </font></td>
    </tr>
    <tr> 
      <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399">Shipment 
          Complete?</font></strong><br>
          <input name="ShipmentComplete" type="text" id="ShipmentComplete" value="<? echo $ShipmentComplete; ?>">
          </font></p></td>
      <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399">Tracking 
          Number</font></strong><br>
          <input name="TrackingNumber" type="text" id="TrackingNumber" value="<? echo $TrackingNumber; ?>">
          </font></p></td>
    </tr>
    <tr> 
      <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Shipment 
        Cost</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
        <input name="ShipmentCost" type="text" id="ShipmentCost" value="<? echo $ShipmentCost; ?>">
        </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399">Shipment 
        Code</font></strong><br>
        <input name="ShipmentCode" type="text" id="ShipmentCode" value="<? echo $ShipmentCode; ?>">
        </font></td>
    </tr>
    <tr> 
      <td><p><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>OrderShipped 
          ID</strong></font><strong><font size="2" face="Arial, Helvetica, sans-serif"></font></strong><font size="2" face="Arial, Helvetica, sans-serif"><br>
          <input name="OrderShippedID" type="text" id="OrderShippedID" value="<? echo $OrderShippedID; ?>">
          </font></p></td>
      <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Notes</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
        <textarea name="Notes" id="Notes"><? echo $Notes; ?></textarea>
        </font></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Save" type="submit" id="Save" value="Save">
    <input type="reset" name="Submit2" value="Reset">
    </font></strong></p>
  </form>
<p>&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
}
?>