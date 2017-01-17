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


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	//grab variables to get purchase info from DB.

	$PurchaseID = $_GET['purch'];
	$CustomerID = $_GET['cust'];
	$ShipmentID = $_GET['ship'];

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
	$result = mysql_query($sql) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result))
		{
			$FirstName = $row[FirstName];
			$LastName = $row[LastName];
			$Phone = $row[Phone];
			$Email = $row[Email];
			$Type = $row[Type];
			$CompanyName = $row[BusinessName];
		}
	
		if($Email == "")
		{
			$Email = "n/a";
		}
		else
		{	$Email = $Email;
		}
		
		if($Phone == "")
		{
			$Phone = "n/a";
		}
		else
		{	$Phone = $Phone;
		}
		
				if($CompanyName == "")
		{
			$CompanyName = "<br> ";
		}
		else
		{
			$CompanyName = $CompanyName;
		}

	if ($_POST['Save'] == "Save")
	{

		
		$ShipmentID = $_POST['ShipmentID'];
		$DateShipped = $_POST['DateShipped'];
		$ShipmentComplete = $_POST['ShipmentComplete'];
		$TrackingNumber = $_POST['TrackingNumber'];
		$ShipmentCost = $_POST['ShipmentCost'];
		$Shipper = $_POST['Shipper'];


		$sql3 = "UPDATE tblShipment3
			SET DateTime = '$DateShipped',
				ShipmentComplete = '$ShipmentComplete', 
				TrackingNumber = '$TrackingNumber', 
				ShipmentCost = '$ShipmentCost',
				ShipperID = '$Shipper'
			WHERE ShipmentID = '$ShipmentID'";

		
		mysql_query($sql3) or die("Cannot update shipment information");
			
		$goto = "ShippingHistory.php?purch=$PurchaseID&cust=$CustomerID";
		header("location: $goto");
			
			
			
	 }
		
	
		$sql = "SELECT * FROM tblShipment3 WHERE ShipmentID = '$ShipmentID'";

		//put SQL statement into result set for loop through records
		$result = mysql_query($sql) or die("Cannot execute query ShipmentID!");
		
		while($row = mysql_fetch_array($result))
		{
			//$ShipmentID = $row[ShipmentID];
			$DateShipped = $row[DateTime];
			$ShipmentComplete = $row[ShipmentComplete];
			$TrackingNumber = $row[TrackingNumber];
			$ShipmentCost = $row[ShipmentCost];
			$ShipperID = $row[ShipperID];
		}
		
		
		// has top header in it.
		require "../include/headertop.php";
		
		// has top menu for this page in it, you acn change these links in this folders include folder.
		require "include/topmenu.php";
		
		// has bottom header in it, ths goes under the top menu for this page.
		require "../include/headerbottom.php";
		
	?>
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">Customer
Information</a> | <a href="Notes.php?cust=<? echo $CustomerID; ?>">Notes</a> </font></p>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFCC">
  <tr>
    <td><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong><?php echo $CompanyName; ?></strong></font></td>
    <td><div align="left"><font color="#FF0000" size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $FirstName; ?> <? echo $LastName; ?></strong></font></div></td>
    <td><div align="right"><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"><strong><?php echo $Type; ?></strong></font></div></td>
    <td width="10%">&nbsp;</td>
  </tr>
</table>
<p><em><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Edit
      Shipping Details and press &quot;Save&quot; when finished. </font></em></p>
<form name="form1" method="post" action="">
   
  <table width="80%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Date
      Shipped: </strong>(ex: 2005-03-07)</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="DateShipped" type="text" id="DateShipped" value="<? echo $DateShipped; ?>">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Shipper</strong>:<br>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Shipper" class="text" id="Shipper">
          <option value = "" selected>Please Select</option>
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT ShipperID, CompanyName
								FROM tblShipper
								WHERE Status = 'active'
								ORDER BY CompanyName";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[ShipperID];?>" <? if($row[ShipperID] == $ShipperID){echo "selected";}?>><? echo $row[CompanyName];?></option>
          <?
						}
					?>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Shipment
            Cost</strong><br>
        </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        $
        <input name="ShipmentCost" type="text" id="ShipmentCost" value="<? echo $ShipmentCost; ?>" size="6">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Tracking
              Number</strong><br>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="TrackingNumber" type="text" id="TrackingNumber" value="<? echo $TrackingNumber; ?>" size="40">
      </font></td>
    </tr>
  </table>
  <p>
    <input name='ShipmentID' type='hidden' id='ShipmentID' value='<? echo $ShipmentID; ?>'>
	 <input name='PurchaseID' type='hidden' id='PurchaseID' value='<? echo $PurchaseID; ?>'>
	  <input name='CustomerID' type='hidden' id='CustomerID' value='<? echo $CustomerID; ?>'>
  </p>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Save" type="submit" id="Save" value="Save">
    </font></strong></p>
</form>
<p>&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>