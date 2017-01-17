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
		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];
	
	$ShippingOptionID = $_GET['ShippingOptionID'];


	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	$sql2 = "SELECT * FROM tblShippingCost5 WHERE ShippingOptionID = '$ShippingOptionID'";
	echo "<br>sql2 =" .$sql2;
	$result2 = mysql_query($sql2) or die("Cannot execute shipcostID!");
	
	
		while($row2 = mysql_fetch_array($result2))
		{
		$ShipperID = $row2['ShipperID'];
		$ShipCostID = $row2['ShipCostID'];
	
	
				$sql3 = "SELECT * FROM tblShippingOption2 WHERE ShippingOptionID = '$ShippingOptionID'";
				echo "<br>sql3 =" .$sql3;
				$result3 = mysql_query($sql3) or die("Cannot execute shipping option!");
				
				while($row3 = mysql_fetch_array($result3))
				{
				$ShippingOption = $row3['ShippingOption'];
				$ShippingOptionNickname = $row3['Nickname'];
				}
	
	
	
				$sql4 = "SELECT * FROM tblShipper WHERE ShipperID = '$ShipperID'";
				echo "<br>sql4 =" .$sql4;
				$result4 = mysql_query($sql4) or die("Cannot execute shipper!");
				
				while($row4 = mysql_fetch_array($result4))
				{
				$Shipper = $row4['CompanyName'];
				}
		
	


			$sql = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.Address, tblCustomer.Address2,
			tblCustomer.Email, tblCustomer.Phone,
			tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.CountryID, tblCustomer.BusinessName, 
			tblCustomer.StateOther, tblCustomer.Type, tblPurchase2.NovaPress,
			tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblPurchase2.ShipNotes,
			tblPurchase2.ShipCostID, tblPurchase2.Status, tblPurchase2.Shipped
			FROM tblCustomer INNER JOIN tblPurchase2
			ON tblCustomer.CustomerID = tblPurchase2.CustomerID
			WHERE tblPurchase2.ShipCostID = '$ShipCostID' AND tblPurchase2.Status = 'active'
			AND tblPurchase2.Shipped = 'n' OR tblPurchase2.Shipped = 'p'";
	
			echo "<br>sql =" .$sql;
			
	//echo $sql;

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblPurchase2.PurchaseID ASC";
		$sortBy ="tblPurchase2.PurchaseID";
		$sortDirection = "ASC";
	}

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	$Count = mysql_num_rows($result);
	
?><title>Packing Lists &amp; Retail Stores</title>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Packing
      Lists and Retail Stores: <font color="#CC0000"><? echo $Shipper; ?> - <? echo $ShippingOption; ?></font></strong></font></p>
<p><strong><font color="#000000" size="3" face="Arial, Helvetica, sans-serif">#
      of Shipments: <? echo $Count; ?></font></strong></p>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
  <?
			   // code to handle sort direction
			   // this following code just switches teh ascending order to descending and vice verca when necessary.
			   // The links in the titles of the colum fields are changed depending on the value in this variable and
			   // depending on what is being sorted by.
			   if ($sortDirection == "ASC")
			   {
			   		$sd = "DESC";
			   }
			   else
			   {
			   		$sd = "ASC";
			   }

			    
?>
  <tr bgcolor="#CCCCCC"> 
    <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Company</font></strong></font></div></td>
    <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/NotShippedViewPrint.php?sort=tblCustomer.FirstName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";}?>">Name</a></font></strong></font></div></td>
    <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Address</font></strong></font></div></td>
    <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Address2</font></strong></font></div></td>
    <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/NotShippedView.php?sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a></font></strong></font></div></td>
    <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/NotShippedView.php?sort=tblCustomer.State&d=<? if ($sortBy=="tblCustomer.State") {echo $sd;} else {echo "ASC";}?>">St</a></font></strong></font></div></td>
    <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Zip </font></strong></font></div></td>
    <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Phone</font></strong></font></div></td>
    <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Email</font></strong></font></div></td>
    <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Country</font></strong></font></div></td>
    <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Type</font></strong></font></div></td>
    <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Ship
            Notes </font></strong></font></div></td>
    <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Products</strong></font></div></td>
    <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">INV</font></strong></font></div></td>
    <td width="5%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">PL</font></strong></font></div></td>
    <td width="5%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">RS</font></strong></font></div></td>
    <?
	
				
	
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$PurchaseID = $row['PurchaseID'];
				$CustomerID = $row['CustomerID'];
				$Shipped = $row['Shipped'];
				$FirstName = $row['FirstName'];
				$LastName = $row['LastName'];
				$City = $row['City'];
				$State = $row['State'];
				$StateOther = $row['StateOther'];
				$ZipCode = $row['ZipCode'];
				$InvoiceNumber = $row['InvoiceNumber'];
				$ShipCostID = $row['ShipCostID'];
				$CompanyName = $row['BusinessName'];
				$TypeID = $row['Type'];
				$NovaPress = $row['NovaPress'];
				$ShipNotes = $row['ShipNotes'];
				$Address = $row['Address'];
				$Address2 = $row['Address2'];
				$CountryID = $row['CountryID'];
				$CompanyName = $row['BusinessName'];
				$Email = $row['Email'];
				$ShipCostID = $row['ShipCostID'];
				$Phone = $row['Phone'];

				
				
						$sql2 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
						$result2 = mysql_query($sql2) or die("Cannot execute query TypeID!");
						
						while($row2 = mysql_fetch_array($result2))
						{
						$Type = $row2[Type];
						}
						
						
				$sql9 = "SELECT * FROM tblShipLocation WHERE LocationID = '$CountryID'";
				$result9 = mysql_query($sql9) or die("Cannot execute country!");
				
				
				while($row9 = mysql_fetch_array($result9))
				{
				$Country = $row9['Name'];
				}

				
			if($CompanyName == "")
			{
			$CompanyName = "-";
			}

			if($LastName == "")
			{
			$LastName = "-";
			}
			
			
			if($ShipNotes == '')
			{
			$ShipNotes = "-";
			}

			if($State == "ZZ")
			{
			$State = $StateOther;
			}
			
			
			if($Address2 == '')
			{
			$Address2 = '-';
			}
			
			if($Phone == '')
			{
			$Phone = '-';
			}
			
			if($Email == '')
			{
			$Email = '-';
			}
			
				
						$Radius = 25;
						$StoreClose = "n";
					
						$zipOne = $ZipCode;
						
						include_once ("../../include/db_mysql.inc");
						include_once ("../../include/phpZipLocator.php");
						
						
						$db = new db_sql;
						$zipLoc = new zipLocator;
						$radius = $Radius;
						
						$zipArray = $zipLoc->inradius($zipOne,$radius);
				
										
						for($i=1;$i < count($zipArray);$i++)
						{
							$sql8 = "SELECT * FROM tblBusinessCustomer WHERE ZipCode= '$zipArray[$i]' AND CustomerType = 'Bookstore' AND Status = 'active'";
							$result8 = mysql_query($sql8) or die("Cannot pull Store Locations.  Please try again.");		
							while($row8 = mysql_fetch_array($result8))
							{
								$StoreClose = "y";
							}
						}
						
												
			  ?>
  <tr> 
    <td width="11%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?></font></td>
    <td width="11%"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>" target="_blank"><? echo $FirstName; ?> <? echo $LastName; ?></a><br>
    </font></td>
    <td width="8%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address; ?></font></td>
    <td width="8%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address2; ?></font></td>
    <td width="8%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Phone; ?></font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Email; ?></font></div></td>
    <td width="8%"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Country; ?></font></div></td>
    <td width="7%"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Type; ?></font></div></td>
    <td width="7%"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ShipNotes; ?></font></div></td>
        <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
        <?
			$sql5 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Status = 'active' AND Shipped = 'n'";
			$result5 = mysql_query($sql5) or die("Cannot execute purch details 2!");
			
			while($row5 = mysql_fetch_array($result5))
			{
			$ProductID = $row5['ProductID'];
			$Quantity = $row5['Quantity'];
			
						$sql6 = "SELECT * FROM tblProduct WHERE ProductID = '$ProductID'";
						$result6 = mysql_query($sql6) or die("Cannot execute product info!");
						
						while($row6 = mysql_fetch_array($result6))
						{
						$ProductName = $row6['Nickname'];
						$Color = $row6['Color'];
						
	?>
        <font color="<? echo $Color; ?>"><? echo $ProductName; ?>(<? echo $Quantity; ?>)</font><br>
        <?
						}
						}
	?>
    </font></div></td>
    <td width="7%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
        <? if($NovaPress == 'y'){?>
        <a href="packinglist.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>" target="_blank">INV</a>
        <? } ?>
    </font></div></td>
    <td width="5%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="custpackinglist.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>" target="_blank">PL</a></font></div></td>
    <td width="5%"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <? if($StoreClose == 'y'){?>
      <a href="retail.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>" target="_blank">RS</a> 
      <? } ?>
      </font></td>
  </tr>
  <?
			  	}
				
				}
				
				//close connection to database
				mysql_close($link);
			  ?>
</table> 

            
  <br>
<p align="center">

  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>



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
