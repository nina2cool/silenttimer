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

	

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Orders
  Not Shipped</strong></font></p>
  

<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr valign="top"> 
    <td><p><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>&gt;
            <a href="NotShippedView.php">Back to Not Shipped List</a> </strong></font></p>
    </td>
    <td><p>&nbsp;</p>
    </td>
  </tr>
</table>


<?

			$sql = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, 
			tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.CountryID, tblCustomer.BusinessName, 
			tblCustomer.StateOther, tblCustomer.Type,
			tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblPurchase2.ShipNotes,
			tblPurchase2.ShipCostID, tblPurchase2.Status, tblPurchase2.Shipped, tblShippingCost5.ShipperID, tblShippingCost5.ShippingOptionID
			FROM tblCustomer INNER JOIN tblPurchase2
			ON tblPurchase2.CustomerID = tblCustomer.CustomerID
			INNER JOIN tblShippingCost5
			ON tblPurchase2.ShipCostID = tblShippingCost5.ShipCostID
			WHERE tblPurchase2.Preorder = 'n' AND tblPurchase2.Status = 'backorder' AND tblCustomer.Type <> '5' AND tblCustomer.Type <> '6' AND tblCustomer.Type <> '8'
			AND tblPurchase2.Shipped = 'n' OR tblPurchase2.Preorder = 'n' AND tblPurchase2.Status = 'backorder' AND tblCustomer.Type <> '5' AND tblCustomer.Type <> '6' AND tblCustomer.Type <> '8'
			AND tblPurchase2.Shipped = 'p'";
		
		
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

			$result = mysql_query($sql) or die("Cannot execute customer - domestic!");
			$RegDom = mysql_num_rows($result);
			
			$sql22 = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, 
			tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.CountryID, tblCustomer.BusinessName, 
			tblCustomer.StateOther, tblCustomer.Type,
			tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblPurchase2.ShipNotes,
			tblPurchase2.ShipCostID, tblPurchase2.Status, tblPurchase2.Shipped, tblShippingCost5.ShipperID, tblShippingCost5.ShippingOptionID
			FROM tblCustomer INNER JOIN tblPurchase2
			ON tblCustomer.CustomerID = tblPurchase2.CustomerID
			INNER JOIN tblShippingCost5
			ON tblPurchase2.ShipCostID = tblShippingCost5.ShipCostID

			WHERE tblPurchase2.Preorder = 'n' AND tblCustomer.Type <> '5' AND tblCustomer.Type <> '6'  AND tblCustomer.Type <> '8' AND tblPurchase2.Status = 'backorder' AND tblCustomer.CountryID <> '225' AND tblCustomer.CountryID <> '241'
			AND tblCustomer.CountryID <> '242' AND tblCustomer.CountryID <> '243' AND tblPurchase2.Shipped = 'n' OR tblPurchase2.Preorder = 'n' AND tblCustomer.Type <> '5' AND tblCustomer.Type <> '6'  AND tblCustomer.Type <> '8' AND tblPurchase2.Status = 'backorder' AND tblCustomer.CountryID <> '225' AND tblCustomer.CountryID <> '241'
			AND tblCustomer.CountryID <> '242' AND tblCustomer.CountryID <> '243' AND tblPurchase2.Shipped = 'p'";
			
				
			$result22 = mysql_query($sql22) or die("Cannot execute customer - international!");			
			$RegInt2 = mysql_num_rows($result22);
			
			$RegDomestic = $RegDom - $RegInt2;
			
			if($RegDomestic == 0) {  $RegDomestic = '0';  }
			else  {  $RegDomestic = $RegDomestic;  }

?>


<p><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $RegDomestic; ?> Regular
    Customers (domestic)</font></p>
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
    <td bgcolor="#CCCCFF"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.ZipCode&d=<? if ($sortBy=="tblCustomer.ZipCode") {echo $sd;} else {echo "ASC";}?>">Zip</a></strong></font></div></td>
    <td bgcolor="#CCCCFF"><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong> <a href="NotShippedView.php?sort=tblShippingCost5.ShippingOptionID&d=<? if ($sortBy=="tblShippingCost5.ShippingOptionID") {echo $sd;} else {echo "ASC";}?>">Code</a>/<a href="NotShippedView.php?sort=tblShippingCost5.ShipperID&d=<? if ($sortBy=="tblShippingCost5.ShipperID") {echo $sd;} else {echo "ASC";}?>">Shipper</a></strong></font></div></td>
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
				
				$sql88 = "SELECT * FROM tblPurchase2 WHERE CustomerID = '$CustomerID'";
				$result88 = mysql_query($sql88) or die("Cannot get purchases");
				$CountPurchases = mysql_num_rows($result88);

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
    <td<? if($CountPurchases > 1) { ?> bgcolor="#FFFFCC"<? } ?>><font size="1" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?> <? echo $LastName; ?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ShipperNickname; ?>-<? echo $ShippingOptionNickname; ?></font></div></td>
	<td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ShipNotes; ?></font></div></td>
	<td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">
		
		<?
			$sql5 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Status = 'backorder' AND Shipped = 'n'";
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


<?

			$sql8 = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, 
			tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.CountryID, tblCustomer.BusinessName, 
			tblCustomer.StateOther, tblCustomer.Type,
			tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblPurchase2.ShipNotes,
			tblPurchase2.ShipCostID, tblPurchase2.Status, tblPurchase2.Shipped
			FROM tblCustomer INNER JOIN tblPurchase2
			ON tblCustomer.CustomerID = tblPurchase2.CustomerID
			INNER JOIN tblShippingCost5
			ON tblPurchase2.ShipCostID = tblShippingCost5.ShipCostID

			WHERE tblPurchase2.Preorder = 'n' AND tblCustomer.Type <> '5' AND tblCustomer.Type <> '6' AND tblCustomer.Type <> '8' AND tblPurchase2.Status = 'backorder' AND tblCustomer.CountryID <> '225' AND tblCustomer.CountryID <> '241'
			AND tblCustomer.CountryID <> '242' AND tblCustomer.CountryID <> '243' AND tblPurchase2.Shipped = 'n' OR tblPurchase2.Preorder = 'n' AND tblCustomer.Type <> '5' AND tblCustomer.Type <> '6' AND tblCustomer.Type <> '8' AND tblPurchase2.Status = 'backorder' AND tblCustomer.CountryID <> '225' AND tblCustomer.CountryID <> '241'
			AND tblCustomer.CountryID <> '242' AND tblCustomer.CountryID <> '243' AND tblPurchase2.Shipped = 'p'";
			
			
						//sort results.....
			if ($sortBy != "")
			{
				$sql8 .= " ORDER BY $sortBy $sortDirection";
			}
		
			else
			{
				$sql8 .= " ORDER BY tblPurchase2.PurchaseID ASC";
				$sortBy ="tblPurchase2.PurchaseID";
				$sortDirection = "ASC";
			}
				
			$result8 = mysql_query($sql8) or die("Cannot execute customer - international!");
			$RegInt = mysql_num_rows($result8);
				
			if($RegInt == 0)  {  $RegInt = '0';  }  else  {  $RegInt = $RegInt;  }
?>

<p><font size="2" face="Arial, Helvetica, sans-serif">
    <?php echo $RegInt; ?> Customers (International)</font></p>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">

  <tr bgcolor="#FFFFCC">
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong>Ship</strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong>Cust</strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblPurchase2.PurchaseID&d=<? if ($sortBy=="tblPurchase2.PurchaseID") {echo $sd;} else {echo "ASC";}?>">pID</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.BusinessName&d=<? if ($sortBy=="tblCustomer.BusinessName") {echo $sd;} else {echo "ASC";}?>">Company</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";}?>">Name</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.State&d=<? if ($sortBy=="tblCustomer.State") {echo $sd;} else {echo "ASC";}?>">St.</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.ZipCode&d=<? if ($sortBy=="tblCustomer.ZipCode") {echo $sd;} else {echo "ASC";}?>">Zip</a></strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong> <a href="NotShippedView.php?sort=tblCustomer.Country&d=<? if ($sortBy=="tblCustomer.Country") {echo $sd;} else {echo "ASC";}?>">Country</a></strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong> <a href="NotShippedView.php?sort=tblShippingCost5.ShippingOptionID&d=<? if ($sortBy=="tblShippingCost5.ShippingOptionID") {echo $sd;} else {echo "ASC";}?>">Code</a>/<a href="NotShippedView.php?sort=tblShippingCost5.ShipperID&d=<? if ($sortBy=="tblShippingCost5.ShipperID") {echo $sd;} else {echo "ASC";}?>">Shipper</a></strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong> Ship  Notes </strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong>Products</strong></font></div></td>
    <?
	
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row8 = mysql_fetch_array($result8))
				{
				$PurchaseID = $row8['PurchaseID'];
				$CustomerID = $row8['CustomerID'];
				$ShipCostID = $row8['ShipCostID'];
				$FirstName = $row8['FirstName'];
				$LastName = $row8['LastName'];
				$City = $row8['City'];
				$State = $row8['State'];
				$ZipCode = $row8['ZipCode'];
				$CountryID = $row8['CountryID'];
				$CompanyName = $row8['BusinessName'];
				$StateOther = $row8['StateOther'];
				$Type = $row8['Type'];
				$ShipNotes = $row8['ShipNotes'];
				
				
				$sql88 = "SELECT * FROM tblPurchase2 WHERE CustomerID = '$CustomerID'";
				$result88 = mysql_query($sql88) or die("Cannot get purchases");
				$CountPurchases = mysql_num_rows($result88);


if($CountryID <> '225' AND $CountryID <> '241' AND $CountryID <> '242' AND $CountryID <> '243')
{
				
				if($CompanyName == "")  {  $CompanyName = "<br> ";  }  else  {  $CompanyName = $CompanyName;  }
				if($LastName == "")  {  $LastName = "<br> ";  }  else  {  $LastName = $LastName;  }
				if($ShipNotes == "")  {  $ShipNotes = "<br> ";  }  else  {  $ShipNotes = $ShipNotes;  }
				if($State == "ZZ")  {  $State = $StateOther;  }
	
				
				$sql9 = "SELECT * FROM tblShipLocation WHERE LocationID = '$CountryID'";
				$result9 = mysql_query($sql9) or die("Cannot execute country!");
				
				
				while($row9 = mysql_fetch_array($result9))
				{
				$Country = $row9['Name'];
				
				
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
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?></font></td>
    <td<? if($CountPurchases > 1) { ?> bgcolor="#FFFFCC"<? } ?>><font size="1" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?> <? echo $LastName; ?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Country; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ShipperNickname; ?>-<? echo $ShippingOptionNickname; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ShipNotes; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">
       <?
			$sql5 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Status = 'backorder' AND Shipped = 'n'";
			$result5 = mysql_query($sql5) or die("Cannot execute purch details 2!");
			
			while($row5 = mysql_fetch_array($result5))
			{
			$ProductID = $row5['ProductID'];
			$Quantity = $row5['Quantity'];
			$Replacement = $row5['Replacement'];
			
						$sql6 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
						$result6 = mysql_query($sql6) or die("Cannot execute product info!");
						
						while($row6 = mysql_fetch_array($result6))
						{
						$ProductName = $row6['Nickname'];
						$Color = $row6['Color'];
	?>
       <font color="<? echo $Color; ?>"><? echo $ProductName; ?>(<? echo $Quantity; ?><?
			if($Replacement == 'y')
	{
	?>-R<?
	}
	?>)</font><br>
       <?
						}
						}
						}
	?>
    </font></div></td>
  </tr>
	
	<?
			  	}
				}
		?>
</table>


<? 
			
			$sql21 = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, 
			tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.CountryID, tblCustomer.BusinessName, 
			tblCustomer.StateOther, tblCustomer.Type,
			tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblPurchase2.ShipNotes,
			tblPurchase2.ShipCostID, tblPurchase2.Status, tblPurchase2.Shipped
			FROM tblCustomer INNER JOIN tblPurchase2
			ON tblCustomer.CustomerID = tblPurchase2.CustomerID
			INNER JOIN tblShippingCost5
			ON tblPurchase2.ShipCostID = tblShippingCost5.ShipCostID
			WHERE tblPurchase2.Preorder = 'n' AND tblPurchase2.Status = 'backorder' AND tblPurchase2.Shipped = 'n'
			AND tblCustomer.Type = '6' OR tblPurchase2.Preorder = 'n' AND tblPurchase2.Status = 'backorder' AND tblPurchase2.Shipped = 'p'
			AND tblCustomer.Type = '6'";
			
			
		
						//sort results.....
			if ($sortBy != "")
			{
				$sql21 .= " ORDER BY $sortBy $sortDirection";
			}
		
			else
			{
				$sql21 .= " ORDER BY tblPurchase2.PurchaseID ASC";
				$sortBy ="tblPurchase2.PurchaseID";
				$sortDirection = "ASC";
			}
				
			$result21 = mysql_query($sql21) or die("Cannot execute customer - bulk!");
			$Bulk = mysql_num_rows($result21);
			
			if($Bulk == 0)  {  $Bulk = '0';  }  else  {  $Bulk = $Bulk;  }
?>

<p><font size="2" face="Arial, Helvetica, sans-serif">
    <?php echo $Bulk; ?> Bulk Customers </font></p>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
  <?
	

			    
?>
  <tr bgcolor="#C7F1C7">
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong>Ship</strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong>Cust</strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblPurchase2.PurchaseID&d=<? if ($sortBy=="tblPurchase2.PurchaseID") {echo $sd;} else {echo "ASC";}?>">pID</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.BusinessName&d=<? if ($sortBy=="tblCustomer.BusinessName") {echo $sd;} else {echo "ASC";}?>">Company</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";}?>">Name</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.State&d=<? if ($sortBy=="tblCustomer.State") {echo $sd;} else {echo "ASC";}?>">St.</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.ZipCode&d=<? if ($sortBy=="tblCustomer.ZipCode") {echo $sd;} else {echo "ASC";}?>">Zip</a></strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong> <a href="NotShippedView.php?sort=tblCustomer.Country&d=<? if ($sortBy=="tblCustomer.Country") {echo $sd;} else {echo "ASC";}?>">Country</a></strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong> <a href="NotShippedView.php?sort=tblShippingCost5.ShippingOptionID&d=<? if ($sortBy=="tblShippingCost5.ShippingOptionID") {echo $sd;} else {echo "ASC";}?>">Code</a>/<a href="NotShippedView.php?sort=tblShippingCost5.ShipperID&d=<? if ($sortBy=="tblShippingCost5.ShipperID") {echo $sd;} else {echo "ASC";}?>">Shipper</a></strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong> Ship Notes</strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong>Products</strong></font></div></td>
    <?
	
			
	
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row21 = mysql_fetch_array($result21))
				{
				$PurchaseID = $row21['PurchaseID'];
				$CustomerID = $row21['CustomerID'];
				$ShipCostID = $row21['ShipCostID'];
				$Quantity = $row21['Quantity'];
				$FirstName = $row21['FirstName'];
				$LastName = $row21['LastName'];
				$City = $row21['City'];
				$State = $row21['State'];
				$ZipCode = $row21['ZipCode'];
				$CountryID = $row21['CountryID'];
				$CompanyName = $row21['BusinessName'];
				$StateOther = $row21['StateOther'];
				$Type = $row21['Type'];
				$ShipNotes = $row21['ShipNotes'];


				if($CompanyName == "")  {  $CompanyName = "<br> ";  }  else  {  $CompanyName = $CompanyName;  }
				if($LastName == "")  {  $LastName = "<br> ";  }  else  {  $LastName = $LastName;  }
				if($ShipNotes == "")  {  $ShipNotes = "<br> ";  }  else  {  $ShipNotes = $ShipNotes;  }
				if($State == "ZZ")  {  $State = $StateOther;  }

	
				$sql9 = "SELECT * FROM tblShipLocation WHERE LocationID = '$CountryID'";
				$result9 = mysql_query($sql9) or die("Cannot execute country!");
				
				
				while($row9 = mysql_fetch_array($result9))
				{
				$Country = $row9['Name'];
				}
				
				if($Country == 'United States Mainland')  {  $Country = 'US';  }
				
					$sql2 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID'";
					$result2 = mysql_query($sql2) or die("Cannot execute shipcostID!");
							
							
							while($row2 = mysql_fetch_array($result2))
							{
							$ShipperID = $row2['ShipperID'];
							$ShippingOptionID = $row2['ShippingOptionID'];
							
							
									$sql10 = "SELECT * FROM tblShippingOption2 WHERE ShippingOptionID = '$ShippingOptionID'";
									$result10 = mysql_query($sql10) or die("Cannot execute shipping option!");
									
									
									while($row10 = mysql_fetch_array($result10))
									{
									$ShippingOption = $row10['ShippingOption'];
									$ShippingOptionNickname = $row10['Nickname'];
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
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?> <? echo $LastName; ?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Country; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ShipperNickname; ?>-<? echo $ShippingOptionNickname; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ShipNotes; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">
      <?
			$sql5 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Status = 'backorder' AND Shipped = 'n'";
			$result5 = mysql_query($sql5) or die("Cannot execute purch details 2!");
			
			while($row5 = mysql_fetch_array($result5))
			{
			$ProductID = $row5['ProductID'];
			$Quantity = $row5['Quantity'];
			$Replacement = $row5['Replacement'];
			
						$sql6 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
						$result6 = mysql_query($sql6) or die("Cannot execute product info!");
						
						while($row6 = mysql_fetch_array($result6))
						{
						$ProductName = $row6['Nickname'];
						$Color = $row6['Color'];
	?>
      <font color="<? echo $Color; ?>"><? echo $ProductName; ?>(<? echo $Quantity; ?><?
			if($Replacement == 'y')
	{
	?>-R<?
	}
	?>)</font><br>
      <?
						}
						}
	?>
    </font></div></td>
  </tr>
  <?
			  	}
				
				
			  ?>
</table>

<?  
			$sql3 = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, 
			tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.CountryID, tblCustomer.BusinessName, 
			tblCustomer.StateOther, tblCustomer.Type,
			tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblPurchase2.ShipNotes,
			tblPurchase2.ShipCostID, tblPurchase2.Status, tblPurchase2.Shipped
			FROM tblCustomer INNER JOIN tblPurchase2
			ON tblCustomer.CustomerID = tblPurchase2.CustomerID
			INNER JOIN tblShippingCost5
			ON tblPurchase2.ShipCostID = tblShippingCost5.ShipCostID
			WHERE tblPurchase2.Preorder = 'n' AND tblPurchase2.Status = 'backorder' AND tblCustomer.Type = '5' AND tblPurchase2.Shipped = 'n' OR
			tblPurchase2.Preorder = 'n' AND tblPurchase2.Status = 'backorder' AND tblCustomer.Type = '8' AND tblPurchase2.Shipped = 'p'";
		
		
						//sort results.....
			if ($sortBy != "")
			{
				$sql3 .= " ORDER BY $sortBy $sortDirection";
			}
		
			else
			{
				$sql3 .= " ORDER BY tblPurchase2.PurchaseID ASC";
				$sortBy ="tblPurchase2.PurchaseID";
				$sortDirection = "ASC";
			}
				
			
			
			$result3 = mysql_query($sql3) or die("Cannot execute customer - samples!");
			$Sample = mysql_num_rows($result3);
			
			
			if($Sample == 0)  {  $Sample = '0';  }  else  {  $Sample = $Sample;  }


?>
<p><font size="2" face="Arial, Helvetica, sans-serif"><br>
    <?php echo $Sample; ?> Sample Customers</font></p>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
  <tr bgcolor="#FFCCFF">
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong>Ship</strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong>Cust</strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblPurchase2.PurchaseID&d=<? if ($sortBy=="tblPurchase2.PurchaseID") {echo $sd;} else {echo "ASC";}?>">pID</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.BusinessName&d=<? if ($sortBy=="tblCustomer.BusinessName") {echo $sd;} else {echo "ASC";}?>">Company</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";}?>">Name</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.State&d=<? if ($sortBy=="tblCustomer.State") {echo $sd;} else {echo "ASC";}?>">St.</a></strong></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="NotShippedView.php?sort=tblCustomer.ZipCode&d=<? if ($sortBy=="tblCustomer.ZipCode") {echo $sd;} else {echo "ASC";}?>">Zip</a></strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong> <a href="NotShippedView.php?sort=tblShippingCost5.ShippingOptionID&d=<? if ($sortBy=="tblShippingCost5.ShippingOptionID") {echo $sd;} else {echo "ASC";}?>">Code</a>/<a href="NotShippedView.php?sort=tblShippingCost5.ShipperID&d=<? if ($sortBy=="tblShippingCost5.ShipperID") {echo $sd;} else {echo "ASC";}?>">Shipper</a></strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong> Ship Notes </strong></font></div></td>
    <td><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong>Products</strong></font></div></td>
    <?
	
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row3 = mysql_fetch_array($result3))
				{
				$PurchaseID = $row3['PurchaseID'];
				$CustomerID = $row3['CustomerID'];
				$ShipCostID = $row3['ShipCostID'];
				$Quantity = $row3['Quantity'];
				$FirstName = $row3['FirstName'];
				$LastName = $row3['LastName'];
				$City = $row3['City'];
				$State = $row3['State'];
				$ZipCode = $row3['ZipCode'];
				$CountryID = $row3['CountryID'];
				$CompanyName = $row3['BusinessName'];
				$StateOther = $row3['StateOther'];
				$Type = $row3['Type'];
				$ShipNotes = $row3['ShipNotes'];


				if($CompanyName == "")  {  $CompanyName = "<br> ";  }  else  {  $CompanyName = $CompanyName;  }
				if($LastName == "")  {  $LastName = "<br> ";  }  else  {  $LastName = $LastName;  }
				if($ShipNotes == "")  {  $ShipNotes = "<br> ";  }  else  {  $ShipNotes = $ShipNotes;  }
				if($State == "ZZ")  {  $State = $StateOther;  }
				
	
				$sql9 = "SELECT * FROM tblShipLocation WHERE LocationID = '$CountryID'";
				$result9 = mysql_query($sql9) or die("Cannot execute country!");
				
				
				while($row9 = mysql_fetch_array($result9))
				{
				$Country = $row9['Name'];
				}
				
					$sql2 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID'";
					$result2 = mysql_query($sql2) or die("Cannot execute shipcostID!");
							
							
							while($row2 = mysql_fetch_array($result2))
							{
							$ShipperID = $row2['ShipperID'];
							$ShippingOptionID = $row2['ShippingOptionID'];
							
							
									$sql10 = "SELECT * FROM tblShippingOption2 WHERE ShippingOptionID = '$ShippingOptionID'";
									$result10 = mysql_query($sql10) or die("Cannot execute shipping option!");
									
									
									while($row10 = mysql_fetch_array($result10))
									{
									$ShippingOption = $row10['ShippingOption'];
									$ShippingOptionNickname = $row10['Nickname'];
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
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?> <? echo $LastName; ?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ShipperNickname; ?>-<? echo $ShippingOptionNickname; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ShipNotes; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">
      <?
			$sql5 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Status = 'backorder' AND Shipped = 'n'";
			$result5 = mysql_query($sql5) or die("Cannot execute purch details 2!");
			
			while($row5 = mysql_fetch_array($result5))
			{
			$ProductID = $row5['ProductID'];
			$Quantity = $row5['Quantity'];
			$Replacement = $row5['Replacement'];
			
						$sql6 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
						$result6 = mysql_query($sql6) or die("Cannot execute product info!");
						
						while($row6 = mysql_fetch_array($result6))
						{
						$ProductName = $row6['Nickname'];
						$Color = $row6['Color'];
	?>
      <font color="<? echo $Color; ?>"><? echo $ProductName; ?>(<? echo $Quantity; ?><?
			if($Replacement == 'y')
	{
	?>-R<?
	}
	?>)</font><br>
      <?
						
						}
						}
	?>
    </font></div></td>
  </tr>
  <?
				}
				
			  
			   ?>    
</table>


<p>&nbsp;</p>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="50%" bgcolor="#FFFFCC"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="http://silenttimer.com/ship/speedship.php" target="_blank">DHL
             Shipments</a> </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(for
            Speedship) </font></td>
    <td bgcolor="#E6E6FF"><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; <a href="http://silenttimer.com/ship/usps_ground.php" target="_blank">USPS
    Ground Shipments </a></strong></font></td>
  </tr>
  <tr>
    <td width="50%" bgcolor="#E6E6FF"><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; <a href="http://silenttimer.com/ship/usps_other.php" target="_blank">USPS
    Other Shipments</a> </strong>(global, etc) </font></td>
    <td bgcolor="#E6E6FF"><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; <a href="http://silenttimer.com/ship/usps_express.php" target="_blank">USPS
    Express Shipments </a></strong></font></td>
  </tr>
</table>
<p>
  <SCRIPT LANGUAGE="JavaScript">
	function Check()
	{
		doyou = confirm("Are you sure you want to IMPORT?");
		return doyou;
	}
  </script>
</p>
<form action="http://www.silenttimer.com/ship/import_wwshipments.php" method="post" name="form1" target="_blank" onSubmit="return Check();">
  <input name="Export" type="submit" id="Export" value="Import DHL Shipments"> 
  <font size="2" face="Arial, Helvetica, sans-serif">(save file as export.csv)
  </font>
</form>
<form name="form2" method="post" action="http://www.silenttimer.com/ship/import_uspsshipments.php" target="_blank" onSubmit="return Check();">
  <input type="submit" name="Submit" value="Import USPS Shipments">
  <font size="2" face="Arial, Helvetica, sans-serif">(save file as usps2.csv) </font>
</form>
<p align="center">



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
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
