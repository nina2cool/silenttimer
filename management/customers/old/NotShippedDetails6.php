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

	//grab variables to get purchase info and customer info from DB.
	$PurchaseID = $_GET['purch'];
	$CustomerID = $_GET['cust'];
	$ShipmentID = $_GET['ship'];
	

	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	


if ($_POST['Go'] == "Go")
	{
		
		$ProductID1 = $_POST['Product1'];
		$ProductID2 = $_POST['Product2'];
		$ProductID3 = $_POST['Product3'];
		$ProductID4 = $_POST['Product4'];
		$ProductID5 = $_POST['Product5'];
		$ProductID6 = $_POST['Product6'];
		$ProductID7 = $_POST['Product7'];
		
		$Quantity1 = $_POST['Quantity1'];
		$Quantity2 = $_POST['Quantity2'];
		$Quantity3 = $_POST['Quantity3'];
		$Quantity4 = $_POST['Quantity4'];
		$Quantity5 = $_POST['Quantity5'];
		$Quantity6 = $_POST['Quantity6'];
		$Quantity7 = $_POST['Quantity7'];


		
		if($Quantity1 <> '' AND $ProductID1 <> '')
		{	
				
				$sql9 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND ProductID = '$ProductID1'";
				$result9 = mysql_query($sql9) or die("Cannot execute query!");
				
				while($row9 = mysql_fetch_array($result9))
				{
				$DetailID = $row9[DetailID];
				}
					
					
				$sql12 = "INSERT INTO tblShipmentProduct(ShipmentID, DetailID, 
				Quantity, Complete) 
				
				VALUES ('$ShipmentID', '$DetailID', '$Quantity1', 
				'y')";
				mysql_query($sql12) or die("Cannot insert ShipmentProduct");

		}
		else
		{
		//echo "ERROR - Quantity1 or Product1 left blank";
		}



		if($Quantity2 <> '' AND $ProductID2 <> '')
		{	
				
				$sql9 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND ProductID = '$ProductID2'";
				$result9 = mysql_query($sql9) or die("Cannot execute query!");
				
				while($row9 = mysql_fetch_array($result9))
				{
				$DetailID = $row9[DetailID];
				}
					
					
				$sql12 = "INSERT INTO tblShipmentProduct(ShipmentID, DetailID, 
				Quantity, Complete) 
				
				VALUES ('$ShipmentID', '$DetailID', '$Quantity2', 
				'y')";
				mysql_query($sql12) or die("Cannot insert ShipmentProduct");

		}
		else
		{
		//echo "ERROR - Quantity2 or Product2 left blank";
		}



		if($Quantity3 <> '' AND $ProductID3 <> '')
		{	
				
				$sql9 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND ProductID = '$ProductID3'";
				$result9 = mysql_query($sql9) or die("Cannot execute query!");
				
				while($row9 = mysql_fetch_array($result9))
				{
				$DetailID = $row9[DetailID];
				}
					
					
				$sql13 = "INSERT INTO tblShipmentProduct(ShipmentID, DetailID, 
				Quantity, Complete) 
				
				VALUES ('$ShipmentID', '$DetailID', '$Quantity3', 
				'y')";
				mysql_query($sql13) or die("Cannot insert ShipmentProduct");

		}
		else
		{
		//echo "ERROR - Quantity3 or Product3 left blank";
		}



		if($Quantity4 <> '' AND $ProductID4 <> '')
		{	
				
				$sql9 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND ProductID = '$ProductID4'";
				$result9 = mysql_query($sql9) or die("Cannot execute query!");
				
				while($row9 = mysql_fetch_array($result9))
				{
				$DetailID = $row9[DetailID];
				}
					
					
				$sql13 = "INSERT INTO tblShipmentProduct(ShipmentID, DetailID, 
				Quantity, Complete) 
				
				VALUES ('$ShipmentID', '$DetailID', '$Quantity4', 
				'y')";
				mysql_query($sql13) or die("Cannot insert ShipmentProduct");

		}
		else
		{
		//echo "ERROR - Quantity4 or Product4 left blank";
		}



		if($Quantity5 <> '' AND $ProductID5 <> '')
		{	
				
				$sql9 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND ProductID = '$ProductID5'";
				$result9 = mysql_query($sql9) or die("Cannot execute query!");
				
				while($row9 = mysql_fetch_array($result9))
				{
				$DetailID = $row9[DetailID];
				}
					
					
				$sql13 = "INSERT INTO tblShipmentProduct(ShipmentID, DetailID, 
				Quantity, Complete) 
				
				VALUES ('$ShipmentID', '$DetailID', '$Quantity5', 
				'y')";
				mysql_query($sql13) or die("Cannot insert ShipmentProduct");

		}
		else
		{
		//echo "ERROR - Quantity5 or Product5 left blank";
		}


		if($Quantity6 <> '' AND $ProductID6 <> '')
		{	
				
				$sql9 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND ProductID = '$ProductID6'";
				$result9 = mysql_query($sql9) or die("Cannot execute query!");
				
				while($row9 = mysql_fetch_array($result9))
				{
				$DetailID = $row9[DetailID];
				}
					
					
				$sql13 = "INSERT INTO tblShipmentProduct(ShipmentID, DetailID, 
				Quantity, Complete) 
				
				VALUES ('$ShipmentID', '$DetailID', '$Quantity6', 
				'y')";
				mysql_query($sql13) or die("Cannot insert ShipmentProduct");

		}
		else
		{
		//echo "ERROR - Quantity6 or Product6 left blank";
		}



		if($Quantity7 <> '' AND $ProductID7 <> '')
		{	
				
				$sql9 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND ProductID = '$ProductID7'";
				$result9 = mysql_query($sql9) or die("Cannot execute query!");
				
				while($row9 = mysql_fetch_array($result9))
				{
				$DetailID = $row9[DetailID];
				}
					
					
				$sql13 = "INSERT INTO tblShipmentProduct(ShipmentID, DetailID, 
				Quantity, Complete) 
				
				VALUES ('$ShipmentID', '$DetailID', '$Quantity7', 
				'y')";
				mysql_query($sql13) or die("Cannot insert ShipmentProduct");

		}
		else
		{
		//echo "ERROR - Quantity7 or Product7 left blank";
		}


		
		$goto = "NotShippedDetails7.php?cust=$CustomerID&purch=$PurchaseID";
		header("location: $goto");
		
	

	
	
	}



// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


	
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$FirstName = $row[FirstName];
		$LastName = $row[LastName];
		$CompanyName = $row[BusinessName];
	}



	$sql9 = "SELECT * FROM tblShipment3 WHERE TrackingNumber = '$TrackingNumber'";
	$result9 = mysql_query($sql9) or die("Cannot execute query!");
	
	while($row9 = mysql_fetch_array($result9))
	{
	$TrackingNumber = $row9[TrackingNumber];
	}
	
	
	
?>



                <p><font size="5" face="Arial, Helvetica, sans-serif"><strong><font color="#000000">&gt; Shipment
                  Detail:</font></strong></font><font face="Arial, Helvetica, sans-serif"><strong><font color="#000000" size="5"><font color="#FF0000"> <? echo "$FirstName $LastName";?></font></font><font color="#FF0000"> 
                  <?

	if($CompanyName <> "")
	{
?> 
                  (<font size="3"><? echo $CompanyName;?></font>)
                  <?
}
?>
  

                  <?

?>
  

                  </font></strong></font>
</p>
</p>
<font size="2" face="Arial, Helvetica, sans-serif">Add items to Tracking Number: <? echo $TrackingNumber; ?></font>
<form name="form1" method="post" action="">
			  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
                <tr>
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></td>
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Num
                        Shipped </font></strong></td>
                </tr>




                <tr>
				  <td><font size="2" face="Arial, Helvetica, sans-serif">
                  <select name="Product1" tabindex="" id="Product1" class="text">
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
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Quantity1" type="text" id="Quantity1" size="4">
                  </font></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <select name="Product2" tabindex="" id="Product2" class="text">
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
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Quantity2" type="text" id="Quantity2" size="4">
                  </font></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                  <select name="Product3" tabindex="" id="Product3" class="text">
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
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Quantity3" type="text" id="Quantity3" size="4">
                  </font></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                  <select name="Product4" tabindex="" id="Product4" class="text">
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
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Quantity4" type="text" id="Quantity4" size="4">
                  </font></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                  <select name="Product5" tabindex="" id="Product5" class="text">
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
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Quantity5" type="text" id="Quantity5" size="4">
                  </font></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                  <select name="Product6" tabindex="" id="Product6" class="text">
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
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Quantity6" type="text" id="Quantity6" size="4">
                  </font></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                  <select name="Product7" tabindex="" id="Product7" class="text">
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
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Quantity7" type="text" id="Quantity7" size="4">
                  </font></td>
                </tr>

<?

	

?>				
				
              </table>
			  <p align="right">
			    <input name="Go" type="submit" id="Go" value="Go">
              </p>
</form>
			<p>&nbsp;</p>
			
			
			
			<p><font size="2" face="Arial, Helvetica, sans-serif">
			  </font></p>
			<p></p>
  <?
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