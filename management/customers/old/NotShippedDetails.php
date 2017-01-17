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
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?	

	//grab variables to get purchase info and customer info from DB.
	$PurchaseID = $_GET['purch'];
	$CustomerID = $_GET['cust'];

	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$FirstName = $row[FirstName];
		$LastName = $row[LastName];
		$CompanyName = $row[BusinessName];
	}


	
	
	
?>

<?  // -------- code to save values from form into table, etc....

	if ($_POST['Submit'] == "Save")
	{
		/*
		$ShipCostID = $_POST['ShipCostID'];
		
		$Date = $_POST['Date'];
		$Quantity = $_POST['txtNumShipped'];
		$TrackingNumber = $_POST['TrackingNumber'];
		$vTrackingNum = $_POST['txtTrackingNumber'];
		$vShipmentCost = $_POST['txtShipmentCost'];
		$vShipmentCode = $_POST['txtShipmentCode'];
		$vTimerBatch = $_POST['cboBatch'];
		$vShipperID = $_POST['Shipper'];
		
		$sql = "INSERT INTO tblShipment (PurchaseID, DateTime, NumShipped, 
		ShipmentComplete, TrackingNumber, ShipmentCost, ShipmentCode, 
		OrderShippedID, Notes, ShipperID) 
		
		VALUES ($purchaseID, '$vDateTime', $vNumShipped, '$vComplete', 
		'$vTrackingNum', '$vShipmentCost', '$vShipmentCode', $vTimerBatch, '$vNotes', '$vShipperID')";
		
		mysql_query($sql) or die("Cannot insert Shipment");
		
		
		// -- if shipment is complete, then change purchase table also
		if ($vComplete == 'y')
		{
			$sql = "UPDATE tblPurchase2
					SET Shipped = 'y'
					WHERE PurchaseID = '$purchaseID'"; 
			mysql_query($sql) or die("Cannot update tblPurchase to shipping complete");
		
			
			$sql = "UPDATE tblPurchaseDetails2
					SET Shipped = 'y'
					WHERE PurchaseID = '$purchaseID'"; 
			mysql_query($sql) or die("Cannot update tblPurchaseDetails2 to shipping complete");
			
		
			#update product inventory.  Subtract shipments from actual inventory when shipped...
			$sql = "UPDATE tblProduct
			SET NumInStock = NumInStock - $vNumShipped WHERE ProductID = '1'";
			mysql_query($sql) or die("Cannot update inventory, please try again.");
		}
		

		
		//set yes to variable and tell them it was successful!
		$success = "yes";
		
		
				
		?>
		<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customers/NotShippedView.php'>	
		<?
		
			*/
			
			$sql2 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID'";
			//put SQL statement into result set for loop through records
			$result2 = mysql_query($sql2) or die("Cannot execute query!");
			
			while($row2 = mysql_fetch_array($result2))
			{
			$ProductID = $row2[ProductID];
			$Quantity = $row2[Quantity];
			$DetailID = $row2[DetailID];
			
			echo $DetailID;
			?>
			<br>
			<?
			
			$TrackingNumber = $_POST['<?echo $DetailID; ?>TrackingNumber'];
			
			echo $TrackingNumber;
			
			?>
			<br>
			<?
			
			}
			

	}
?>


<? // ---- code to fill page with information....
	
	/*
	//SQL to get data from purchase table
	$sql = "SELECT ProductName, DateTime, SameBillingAddress, NumOrdered, tblPurchase.ShippingCost, TimerPrice, Tax, 
			tblPurchase.ShippingOptionID, TotalCost, TestID, ReferredBy, tblPurchase.Notes
			FROM tblPurchase INNER JOIN tblShippingOption ON tblPurchase.ShippingOptionID = tblShippingOption.ShippingOptionID
			INNER JOIN tblProduct ON tblPurchase.ProductID = tblProduct.productID
			WHERE PurchaseID = $purchaseID";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$NumOrdered = $row[NumOrdered];
		$ShippingOptionID = $row[ShippingOptionID];
		$ProductName = $row[ProductName];
	}
*/




?>
<font size="5" face="Arial, Helvetica, sans-serif"><strong><font color="#000000">&gt; 
Shipment Detail:</font></strong></font><font face="Arial, Helvetica, sans-serif"><strong><font color="#000000" size="5"><font color="#FF0000"> <? echo "$FirstName $LastName";?></font></font><font color="#FF0000"> <?

	if($CompanyName <> "")
	{
?> (<font size="3"><? echo $CompanyName;?></font>)
<?
}
?>


</font></strong></font>
<form action="" method="post" name="frmChange" id="frmChange">
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr valign="middle">
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Date</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Quantity</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">ShipCostID
      <font size="1"><a href="ShipCostID.php" target="_blank">view list</a></font></font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipped?</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Tracking
              Number</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipment Cost</font></strong></div></td>
    </tr>
    <tr valign="middle">
	
	<?
	
	
	
	$sql2 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID'";
	//put SQL statement into result set for loop through records
	$result2 = mysql_query($sql2) or die("Cannot execute query!");
	
	while($row2 = mysql_fetch_array($result2))
	{
		$ProductID = $row2[ProductID];
		$Quantity = $row2[Quantity];
		$DetailID = $row2[DetailID];
		
		
					$sql3 = "SELECT * FROM tblPurchase2 WHERE PurchaseID = '$PurchaseID'";
					//put SQL statement into result set for loop through records
					$result3 = mysql_query($sql3) or die("Cannot execute query!");
					
					while($row3 = mysql_fetch_array($result3))
					{
					$ShipCostID = $row3[ShipCostID];
					}
	
	
					$sql4 = "SELECT * FROM tblProduct WHERE ProductID = '$ProductID'";
					//put SQL statement into result set for loop through records
					$result4 = mysql_query($sql4) or die("Cannot execute query!");
					
					while($row4 = mysql_fetch_array($result4))
					{
					$ProductNickname = $row4[Nickname];
					}
	
	
	
	?>
	
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ProductNickname; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="<? echo $DetailID; ?>Date" type="text" id="<? echo $DetailID; ?>Date" value="<? echo date("Y-m-d");?>" size="10">
      </font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="<? echo $DetailID; ?>Quantity" type="text" id="<? echo $DetailID; ?>Quantity" value="<? echo $Quantity; ?>" size="5">
      </font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="<? $DetailID; ?>ShipCostID" type="text" id="<? $DetailID; ?>ShipCostID" value="<? echo $ShipCostID; ?>" size="5">
      </font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="<? $DetailID; ?>Shipped" type="text" id="<? $DetailID; ?>Shipped" value="y" size="3" maxlength="1">
      </font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="<? echo $DetailID; ?>TrackingNumber" type="text" id="<? echo $DetailID; ?>TrackingNumber" size="20">
      </font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$
          <input name="<? $DetailID; ?>ShippingCost" type="text" id="<? $DetailID; ?>ShippingCost" size="5">
      </font></div></td>




    </tr>
	
	<?

}


?>
	
  </table>
  <p>
    <? if($success == "yes"){echo"<br><strong><font color='#0000FF' size='2' face='Arial, Helvetica, sans-serif'>Shipment Compete</font></strong>";}?>
    <br>
    <br>
    <input type="submit" name="Submit" value="Save">
&nbsp;&nbsp;</p>
</form>
            
<p></p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
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