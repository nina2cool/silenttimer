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
	
	//Count how many preorders we have
	$sql99 = "SELECT tblPurchase2.PurchaseID, tblCustomer.FirstName, tblCustomer.LastName, tblPurchaseDetails2.Status FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblCustomer.CustomerID = tblPurchase2.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
	WHERE tblPurchaseDetails2.Status = 'preorder' AND tblPurchase2.Status <> 'cancel'
	GROUP BY tblPurchase2.PurchaseID";
	//echo $sql99;
	$result99 = mysql_query($sql99) or die("Cannot count preorders");
	$Preorder = mysql_num_rows($result99);
	
	//Count how many backorders we have
	$sql88 = "SELECT tblPurchaseDetails2.Status FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblCustomer.CustomerID = tblPurchase2.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
	WHERE tblPurchaseDetails2.Status = 'backorder'
	GROUP BY tblPurchase2.PurchaseID";
	//echo $sql88;
	$result88 = mysql_query($sql88) or die("Cannot count backorders");
	$Backorder = mysql_num_rows($result88);

	
	$sql = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, 
	tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.CountryID, tblCustomer.BusinessName, 
	tblCustomer.StateOther, tblCustomer.Type,
	tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblPurchase2.ShipNotes,
	tblPurchase2.ShipCostID, tblPurchase2.Status, tblPurchase2.Shipped
	FROM tblCustomer INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblShippingCost5
	ON tblPurchase2.ShipCostID = tblShippingCost5.ShipCostID
	WHERE tblPurchase2.Preorder = 'n' AND tblPurchase2.Status = 'active'
	AND tblPurchase2.Shipped = 'n' AND tblShippingCost5.ShipperID = '6' AND tblShippingCost5.ShippingOptionID <> '16' AND tblShippingCost5.ShippingOptionID <> '18' AND tblShippingCost5.ShippingOptionID <> '19'
	OR
	tblPurchase2.Preorder = 'n' 
	AND tblPurchase2.Status = 'active'
	AND tblPurchase2.Shipped = 'p' AND tblShippingCost5.ShipperID = '6' AND tblShippingCost5.ShippingOptionID <> '16' AND tblShippingCost5.ShippingOptionID <> '18' AND tblShippingCost5.ShippingOptionID <> '19'
	";


	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}
	
	else
	{
		$sql .= " ORDER BY tblShippingCost5.ShippingOptionID DESC";
		$sortBy ="tblShippingCost5.ShippingOptionID";
		$sortDirection = "DESC";
	}

	$result = mysql_query($sql) or die("Cannot execute customer - DHL!");
	$DHL = mysql_num_rows($result);


?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Orders
  Not Shipped</strong></font></p>
  

<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr valign="top"> 
    <td><p><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>&gt;
          <a href="custpackinglist_all_new.php" target="_blank">All Packing and
          Retail Lists Combined</a><a href="custpackinglist_all_new_test.php" target="_blank"><br>
          <br>
          </a></strong></font><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="custpackinglist_all_new.php?s=6" target="_blank">DHL</a> |  <a href="custpackinglist_all_new.php?s=8" target="_blank">USPS</a> | <a href="custpackinglist_all_new.php?s=11" target="_blank">FedEx</a> | <a href="custpackinglist_all_new.php?s=9" target="_blank">UPS</a></strong></font></p>
    </td>
    <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; 
        </strong><a href="PostOffice.php" target="_blank"><strong>Post Office
        Orders</strong></a><strong> | <a href="ShippingSummary.php" target="_blank">Shipping Summary</a> </strong><a href="PostOffice.php" target="_blank"><strong><br>
        </strong></a><strong>&gt; <a href="BackorderView.php"><?php echo $Backorder; ?> Customers
      on Backorder<br>
        </a>&gt; <a href="PreorderView.php"><?php echo $Preorder; ?> Customers
        on Preorder </a><a href="BackorderView.php">      <br>
        </a>&gt; </strong><a href="InventoryShippingSummary.php" target="_blank"><strong>Inventory
        Shipping Summary </strong></a></font></p>
    </td>
  </tr>
</table>

<p><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $DHL; ?> DHL
    Shipments (domestic) </font></p>
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
  <tr bgcolor="#CCCCFF">
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong>Ship</strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong>Cust</strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblPurchase2.PurchaseID&d=<? if ($sortBy=="tblPurchase2.PurchaseID") {echo $sd;} else {echo "ASC";}?>">pID</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";}?>">Name</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.State&d=<? if ($sortBy=="tblCustomer.State") {echo $sd;} else {echo "ASC";}?>">St.</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.ZipCode&d=<? if ($sortBy=="tblCustomer.ZipCode") {echo $sd;} else {echo "ASC";}?>">Zip</a></strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong> Code/Shipper</strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong> Ship
            Notes </strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong>Products</strong></font></div></td>
    <?
			

			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$PurchaseID = $row['PurchaseID'];
				$CustomerID = $row['CustomerID'];
				$ShipCostID = $row['ShipCostID'];
				$Quantity = $row['Quantity'];
				$FirstName = $row['FirstName'];
				$LastName = $row['LastName'];
				$City = $row['City'];
				$State = $row['State'];
				$ZipCode = $row['ZipCode'];
				$CountryID = $row['CountryID'];
				$CompanyName = $row['BusinessName'];
				$StateOther = $row['StateOther'];
				$Type = $row['Type'];
				$ShipNotes = $row['ShipNotes'];
				


if($CountryID == '225' OR $CountryID == '241' OR $CountryID == '242' OR $CountryID == '243')
{
				
				if($CompanyName == "")  {  $CompanyName = "<br> ";  }  else  {  $CompanyName = $CompanyName;  }
				if($LastName == "")  {  $LastName = "<br> ";  }  else  {  $LastName = $LastName;  }
				if($ShipNotes == "")  {  $ShipNotes = "<br> ";  }  else  {  $ShipNotes = $ShipNotes;  }
				if($State == "ZZ")  {  $State = $StateOther;  }
	
					$sql2 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID'";
					$result2 = mysql_query($sql2) or die("Cannot execute shipcostID!");
							
							
							while($row2 = mysql_fetch_array($result2))
							{
							$ShipperID = $row2['ShipperID'];
							$ShippingOptionID = $row2['ShippingOptionID'];
							
							
									$sql3 = "SELECT * FROM tblShippingOption2 WHERE ShippingOptionID = '$ShippingOptionID'";
									$result3 = mysql_query($sql3) or die("Cannot execute shipping option!");
									
									
									while($row3 = mysql_fetch_array($result3))
									{
									$ShippingOption = $row3['ShippingOption'];
									$ShippingOptionNickname = $row3['Nickname'];
									}
							
									
									
									$sql4 = "SELECT * FROM tblShipper WHERE ShipperID = '$ShipperID'";
									$result4 = mysql_query($sql4) or die("Cannot execute shipper!");
									
									
									while($row4 = mysql_fetch_array($result4))
									{
									$Shipper = $row4['CompanyName'];
									$ShipperNickname = $row4['Nickname'];
									}
							
							}
			  ?>
  <tr>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="ShippedIndex.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Sh</a></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Cu</a></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $PurchaseID; ?></font></div></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?> <? echo $LastName; ?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ShipperNickname; ?>-<? echo $ShippingOptionNickname; ?></font></div></td>
	<td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ShipNotes; ?></font></div></td>
	<td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">
		
		<?
			$sql5 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Status = 'active' AND Shipped = 'n'";
			//echo "<br>sql5 = " .$sql5;
			$result5 = mysql_query($sql5) or die("Cannot execute purch details 2!");
			
			while($row5 = mysql_fetch_array($result5))
			{
			$ProductID = $row5['ProductID'];
			$Quantity = $row5['Quantity'];
			$Replacement = $row5['Replacement'];
			
						$sql6 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
						//echo "<br>sql6 = " .$sql6;
						$result6 = mysql_query($sql6) or die("Cannot execute product info!");
						
						while($row6 = mysql_fetch_array($result6))
						{
						$ProductName = $row6['Nickname'];
						$Color = $row6['Color'];
						
	?>
	    <font color="<? echo $Color; ?>"><? echo $ProductName; ?>(<? echo $Quantity; ?><?
			if($Replacement == 'y')  { ?>-R<?  } ?>)</font><br><? } } ?></font></div></td>
  </tr>
  <?
			  	}
			
				}

			  ?>
</table>


<p>
  <?

			$sql2 = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, 
			tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.CountryID, tblCustomer.BusinessName, 
			tblCustomer.StateOther, tblCustomer.Type,
			tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblPurchase2.ShipNotes,
			tblPurchase2.ShipCostID, tblPurchase2.Status, tblPurchase2.Shipped
			FROM tblCustomer INNER JOIN tblPurchase2
			ON tblPurchase2.CustomerID = tblCustomer.CustomerID
			INNER JOIN tblShippingCost5
			ON tblPurchase2.ShipCostID = tblShippingCost5.ShipCostID
			WHERE tblPurchase2.Preorder = 'n' AND tblPurchase2.Status = 'active'
			AND tblPurchase2.Shipped = 'n' AND tblShippingCost5.ShipperID = '8' AND tblShippingCost5.ShippingOptionID <> '12'
			OR
			tblPurchase2.Preorder = 'n' 
			AND tblPurchase2.Status = 'active'
			AND tblPurchase2.Shipped = 'p' AND tblShippingCost5.ShipperID = '8' AND tblShippingCost5.ShippingOptionID <> '12'
			";
		
		
			//sort results.....
			if ($sortBy != "")
			{
				$sql2 .= " ORDER BY $sortBy $sortDirection";
			}
		
			else
			{
				$sql2 .= " ORDER BY tblShippingCost5.ShippingOptionID DESC";
				$sortBy ="tblShippingCost5.ShippingOptionID";
				$sortDirection = "DESC";
			}

			$result2 = mysql_query($sql2) or die("Cannot execute customer - USPS!");
			$USPS = mysql_num_rows($result2);
			
?>
</p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $USPS; ?> USPS
    Shipments (domestic)</font></p>
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
  <tr bgcolor="#FF99FF">
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong>Ship</strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong>Cust</strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblPurchase2.PurchaseID&d=<? if ($sortBy=="tblPurchase2.PurchaseID") {echo $sd;} else {echo "ASC";}?>">pID</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";}?>">Name</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.State&d=<? if ($sortBy=="tblCustomer.State") {echo $sd;} else {echo "ASC";}?>">St.</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.ZipCode&d=<? if ($sortBy=="tblCustomer.ZipCode") {echo $sd;} else {echo "ASC";}?>">Zip</a></strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong> Code/Shipper</strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong> Ship
    Notes </strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong>Products</strong></font></div></td>
    <?
			

			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row2 = mysql_fetch_array($result2))
				{
				$PurchaseID = $row2['PurchaseID'];
				$CustomerID = $row2['CustomerID'];
				$ShipCostID = $row2['ShipCostID'];
				$Quantity = $row2['Quantity'];
				$FirstName = $row2['FirstName'];
				$LastName = $row2['LastName'];
				$City = $row2['City'];
				$State = $row2['State'];
				$ZipCode = $row2['ZipCode'];
				$CountryID = $row2['CountryID'];
				$CompanyName = $row2['BusinessName'];
				$StateOther = $row2['StateOther'];
				$Type = $row2['Type'];
				$ShipNotes = $row2['ShipNotes'];
				


if($CountryID == '225' OR $CountryID == '241' OR $CountryID == '242' OR $CountryID == '243')
{
				
				if($CompanyName == "")  {  $CompanyName = "<br> ";  }  else  {  $CompanyName = $CompanyName;  }
				if($LastName == "")  {  $LastName = "<br> ";  }  else  {  $LastName = $LastName;  }
				if($ShipNotes == "")  {  $ShipNotes = "<br> ";  }  else  {  $ShipNotes = $ShipNotes;  }
				if($State == "ZZ")  {  $State = $StateOther;  }
	
					$sql22 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID'";
					$result22 = mysql_query($sql22) or die("Cannot execute shipcostID!");
							
							
							while($row22 = mysql_fetch_array($result22))
							{
							$ShipperID = $row22['ShipperID'];
							$ShippingOptionID = $row22['ShippingOptionID'];
							
							
									$sql32 = "SELECT * FROM tblShippingOption2 WHERE ShippingOptionID = '$ShippingOptionID'";
									$result32 = mysql_query($sql32) or die("Cannot execute shipping option!");
									
									
									while($row32 = mysql_fetch_array($result32))
									{
									$ShippingOption = $row32['ShippingOption'];
									$ShippingOptionNickname = $row32['Nickname'];
									}
							
									
									
									$sql42 = "SELECT * FROM tblShipper WHERE ShipperID = '$ShipperID'";
									$result42 = mysql_query($sql42) or die("Cannot execute shipper!");
									
									
									while($row42 = mysql_fetch_array($result42))
									{
									$Shipper = $row42['CompanyName'];
									$ShipperNickname = $row42['Nickname'];
									}
							
							}
			  ?>
  <tr>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="ShippedIndex.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Sh</a></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Cu</a></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $PurchaseID; ?></font></div></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?> <? echo $LastName; ?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ShipperNickname; ?>-<? echo $ShippingOptionNickname; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ShipNotes; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">
        <?
			$sql52 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Status = 'active' AND Shipped = 'n'";
			//echo "<br>sql5 = " .$sql5;
			$result52 = mysql_query($sql52) or die("Cannot execute purch details 2!");
			
			while($row52 = mysql_fetch_array($result52))
			{
			$ProductID = $row52['ProductID'];
			$Quantity = $row52['Quantity'];
			$Replacement = $row52['Replacement'];
			
						$sql62 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
						//echo "<br>sql6 = " .$sql6;
						$result62 = mysql_query($sql62) or die("Cannot execute product info!");
						
						while($row62 = mysql_fetch_array($result62))
						{
						$ProductName = $row62['Nickname'];
						$Color = $row62['Color'];
						
	?>
        <font color="<? echo $Color; ?>"><? echo $ProductName; ?>(<? echo $Quantity; ?><? if($Replacement == 'y')  { ?>-R<?  } ?>)</font><br><? } } ?>
    </font></div></td>
  </tr>
  <?
			  	}
			
				}

			  ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
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
