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

	if ($_POST['Save'] == "Save")
	{
		
		$ShipCostID = $_POST['ShipCostID'];
		$Date = $_POST['Date'];
		$Quantity = $_POST['Quantity'];
		$TrackingNumber = $_POST['TrackingNumber'];
		$Shipped = $_POST['Shipped'];
		$ShipmentCost = $_POST['ShipmentCost'];
		$ProductID = $_POST['Product'];
		$DetailID = $_POST['DetailID'];
		
		$NumShipped = $Quantity;
		
		echo "ProductID = ". $ProductID;
		?>
		<br>
		<?
		echo "Date = ". $Date;
		?>
		<br>
		<?
		echo "Quantity = ". $Quantity;
		?>
		<br>
		<?
		echo "TrackingNumber = ". $TrackingNumber;
		?>
		<br>
		<?
		echo "Shipped = ". $Shipped;
		?>
		<br>
		<?
		echo "ShipmentCost = ". $ShipmentCost;
		?>
		<br>
		<?
		echo "ShipCostID = ". $ShipCostID;
		
		
		$sql = "INSERT INTO tblShipment2 (PurchaseID, DateTime, Quantity, 
		ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID, 
		OrderShippedID, DetailID, NumShipped) 
		
		VALUES ('$PurchaseID', '$Date', '$Quantity', 'y', 
		'$TrackingNumber', '$ShipmentCost', '$ShipCostID', '1', '$DetailID', '$NumShipped')";
		
		echo $sql;
		
		mysql_query($sql) or die("Cannot insert Shipment");
		
		
		$sql3 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID'";
		//put SQL statement into result set for loop through records
		$result3 = mysql_query($sql3) or die("Cannot Find ShipperID in tblShippingCost5!");
		
		while($row3 = mysql_fetch_array($result3))
		{
		$ShipperID = $row3[ShipperID];
		}
		
		$sql5 = "UPDATE tblShipment2
		SET ShipperID = '$ShipperID'
		WHERE DetailID = '$DetailID'";
		$result5 = mysql_query($sql5) or die("Cannot update Shipper ID!");
		
		
		$sql6 = "UPDATE tblPurchaseDetails2
		SET Shipped = '$Shipped'
		WHERE DetailID = '$DetailID'";
		$result6 = mysql_query($sql6) or die("Cannot update Shipped in tblPurchaseDetails2!");
		
		
		$sql7 = "UPDATE tblPurchase2
		SET Shipped = '$Shipped'
		WHERE PurchaseID = '$PurchaseID'";
		$result7 = mysql_query($sql7) or die("Cannot update Shipped in tblPurchase2!");
		
		
							$sql8 = "UPDATE tblProductNew
							SET OnHand = OnHand - $Quantity
							WHERE ProductID = '$ProductID'";
							$result8 = mysql_query($sql8) or die("Cannot update tblProduct!");
		
	
				
		$goto = "NotShippedView.php";
		header("location: $goto");
			

	}
?>
  

                <font size="5" face="Arial, Helvetica, sans-serif"><strong><font color="#000000">&gt; Shipment
                Detail:</font></strong></font><font face="Arial, Helvetica, sans-serif"><strong><font color="#000000" size="5"><font color="#FF0000"> <? echo "$FirstName $LastName";?></font></font><font color="#FF0000"> 
                <?

	if($CompanyName <> "")
	{
?> 
                (<font size="3"><? echo $CompanyName;?></font>)
                <?
}
?>
  </font></strong></font></p>
			<p>&nbsp;</p>
			
			
			
			<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
              <tr valign="middle">
                <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">dID</font></strong></div></td>
                <td height="32"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></div></td>
                <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Date</font></strong></div></td>
                <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Quantity</font></strong></div></td>
                <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">ShipCostID <font size="1"><a href="ShipCostID.php" target="_blank">view
                            list</a></font></font></strong></div></td>
                <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipped?</font></strong></div></td>
                <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Tracking
                        Number</font></strong></div></td>
                <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipment
                        Cost</font></strong></div></td>
                <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Save</font></strong></div></td>
              </tr>
			  
			
			
			
			
			
			
              
			
	<?

	$sql2 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Shipped = 'n'";
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
			  <tr valign="middle">
			   
			  
				<form name="form1" method="post" action="">
				 <td><div align="center">
				   <input name="DetailID" type="text" id="DetailID" value="<? echo $DetailID; ?>" size="5">			      
			      </div></td>
                <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
                  <select name="Product" tabindex="" id="Product" class="text">
                    <option value="" selected>Select</option>
                    <? 
					$sql = "SELECT * FROM tblProduct";
					
					$result = mysql_query($sql) or die("Cannot get tblProduct1");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                    <option value="<? echo $row[ProductID]; ?>"<? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
                    <?
					}
				?>
                  </select>
                </font></div></td>
                <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="Date" type="text" id="Date" value="<? echo date("Y-m-d");?>" size="8">
                </font></div></td>
                <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="Quantity" type="text" id="Quantity" value="<? echo $Quantity; ?>" size="4">
                </font></div></td>
                <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="ShipCostID" type="text" id="ShipCostID" value="<? echo $ShipCostID; ?>" size="4">
                </font></div></td>
                <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="Shipped" type="text" id="Shipped" value="y" size="2" maxlength="1">
                </font></div></td>
                <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="TrackingNumber" type="text" id="TrackingNumber" size="20">
                </font></div></td>
                <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$
                      <input name="ShipmentCost" type="text" id="ShipmentCost" size="5">
                </font></div></td>
				
				<td><div align="center"> <font size="2" face="Arial, Helvetica, sans-serif">
				
				<input name="Save" type="submit" id="Save" value="Save">
                </font> 
			    </div></td>
			
			</form>
			  </tr>
			  
			  			<?
}
?>
			  
         </table>


            
            
<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p><font size="2" face="Arial, Helvetica, sans-serif">
			  </font>
                                    </p>
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