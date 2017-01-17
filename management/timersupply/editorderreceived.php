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

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?	

	//grab variables to get purchase info and customer info from DB.
	$OrderShippedID = $_GET['os'];

	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


	if ($_POST['Update'] == "Update")
	{
		$DateTime = $_POST['DateTime'];
		$NumShipped = $_POST['NumShipped'];
		$CostPer = $_POST['CostPer'];
		$ShipperID = $_POST['Shipper'];
		$SupplyOrderID = $_POST['SupplyOrderID'];
		$TotalDue = $_POST['TotalDue'];
		$Notes = $_POST['Notes'];
		$TrackingNumber = $_POST['TrackingNumber'];
		$ShippingCost = $_POST['ShippingCost'];

		$sql = "UPDATE tblOrderShipped
				SET DateTime = '$DateTime', 
				NumShipped = '$NumShipped', 
				CostPer = '$CostPer', 
				ShipperID = '$ShipperID', 
				SupplyOrderID = '$SupplyOrderID', 
				TotalDue = '$TotalDue', 
				Notes = '$Notes', 
				TrackingNumber = '$TrackingNumber', 
				ShippingCost = '$ShippingCost'
				WHERE OrderShippedID = '$OrderShippedID'";
		
		mysql_query($sql) or die("Cannot update tblOrderShipped");
		
	}
?>


<? // ---- code to fill page with information....	
	$sql = "SELECT * FROM tblOrderShipped WHERE OrderShippedID = '$OrderShippedID'";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$DateTime = $row[DateTime];
		$NumShipped = $row[NumShipped];
		$TotalDue = $row[TotalDue];
		$CostPer = $row[CostPer];
		$ShipperID = $row[ShipperID];
		$SupplyOrderID = $row[SupplyOrderID];
		$TrackingNumber = $row[TrackingNumber];
		$Notes = $row[Notes];
		$ShippingCost = $row[ShippingCost];

	}
	
	
?>
<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Edit Order Received</strong></font>
<form action="" method="post" name="frmSupply" id="frmSupply">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Supply Order 
        ID </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(usually 
        0)</font></td>
      <td><input name="SupplyOrderID" type="text" id="SupplyOrderID" value="<? echo $SupplyOrderID; ?>"></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date and 
        Time</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> 
        (yyyy-mm-dd hh:mm:ss)</font></td>
      <td><input name="DateTime" type="text" id="DateTime" value="<? echo $DateTime; ?>"></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Number Shipped</font></strong></td>
      <td><input name="NumShipped" type="text" id="NumShipped" value="<? echo $NumShipped; ?>"></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipper</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        
		
		<select name="Shipper" class="text" id="Shipper">
          <option value = "" selected>Please Select</option>
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT ShipperID, CompanyName
								FROM tblShipper
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
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipping 
        Cost</font></strong></td>
      <td>$
        <input name="ShippingCost" type="text" id="ShippingCost" value="<? echo number_format($ShippingCost,2); ?>" size="10"></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Cost Per 
        Unit</font></strong></td>
      <td>$
        <input name="CostPer" type="text" id="CostPer" value="<? echo number_format($CostPer,2); ?>" size="10"></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Total Due</font></strong></td>
      <td>$
        <input name="TotalDue" type="text" id="TotalDue" value="<? echo number_format($TotalDue,2); ?>" size="10"></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Tracking 
        Number</font></strong></td>
      <td><textarea name="TrackingNumber" cols="30" rows="3" id="TrackingNumber"><? echo $TrackingNumber; ?></textarea></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></strong></td>
      <td><textarea name="Notes" cols="30" rows="3" id="Notes"><? echo $Notes; ?></textarea></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>
    <input name="Update" type="submit" id="Update" value="Update">
    &nbsp;&nbsp; 
    <input type="reset" name="Submit2" value="Reset">
  </p>
</form>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
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
