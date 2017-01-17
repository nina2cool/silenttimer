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
?>

<?
	
		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.Country, tblCustomer.BusinessName, tblCustomer.StateOther, tblCustomer.Type,
			tblPurchase.PurchaseID, tblPurchase.CustomerID, tblPurchase.TimerPrice, tblPurchase.Tax, tblPurchase.TotalCost, tblPurchase.Shipped, tblPurchase.Notes, tblPurchase.NumOrdered, tblPurchase.InvoiceNumber, tblPurchase.ShippingOptionID, tblPurchase.ShippingCost
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE tblPurchase.Shipped = 'n' AND tblPurchase.Status = 'active'";
			

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblPurchase.PurchaseID ASC";
		$sortBy ="tblPurchase.PurchaseID";
		$sortDirection = "ASC";
	}
		


	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	
	
	$sql2 = "SELECT Sum(tblPurchase.NumOrdered) AS Sum FROM tblPurchase WHERE Shipped = 'n' AND Status = 'active'";
	
		//put SQL statement into result set for loop through records
	$result2 = mysql_query($sql2) or die("Cannot execute query!");
	
	while($row2 = mysql_fetch_array($result2))
		{
		$Total = $row2[Sum];
		}
		

		
			$sql5 = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.Country, tblCustomer.BusinessName, tblCustomer.StateOther, tblCustomer.BusinessType,
			tblPurchase.PurchaseID, tblPurchase.CustomerID, tblPurchase.TimerPrice, tblPurchase.Tax, tblPurchase.TotalCost, tblPurchase.Shipped, tblPurchase.Notes, tblPurchase.NumOrdered, tblPurchase.InvoiceNumber, tblPurchase.ShippingOptionID, tblPurchase.InternationalShippingOption
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE tblCustomer.Country <> 'US' AND tblPurchase.Shipped = 'n' AND tblPurchase.Status = 'active'";
		
		$result5 = mysql_query($sql5) or die("Cannot retrieve customer info, please try again.");
		
		$PostOffice = 0;
		
		while($row5 = mysql_fetch_array($result5))
				{
				$State = $row5[State];
				$Country = $row5[Country];
				$InternationalShippingOption = $row5[InternationalShippingOption];
				
						if ($State == 'HI' OR $State == 'AK' OR $InternationalShippingOption = 'USPS')
						{
						$PostOffice ++;
						}
				
						if ($PostOffice < "1")
						{
							$PostOffice = "0";
						}
				
						else
						{
							$PostOffice = $PostOffice;
						}
				
				}
		
		


	
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Shipping
Summary </strong></font></p>
  
<?

			$sql5 = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.Country, tblCustomer.BusinessName, tblCustomer.StateOther, tblCustomer.Type,
			tblPurchase.PurchaseID, tblPurchase.CustomerID, tblPurchase.TimerPrice, tblPurchase.Tax, tblPurchase.TotalCost, tblPurchase.Shipped, tblPurchase.Notes, tblPurchase.NumOrdered, tblPurchase.InvoiceNumber, tblPurchase.ShippingOptionID, tblPurchase.ShippingCost
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE tblPurchase.Shipped = 'n' AND tblPurchase.Status = 'backorder'";
				
			$result5 = mysql_query($sql5) or die("Cannot execute query!");
	
			$Backorder = mysql_num_rows($result5);
			
			
			if($Backorder == 0)
			{
				$Backorder = '0';
			}
			else
			{
				$Backorder = $Backorder;
			}



?>  



<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tr> 
    <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; 
      </strong><a href="NotShippedViewPrint.php" target="_blank"><strong>Print
      Packing Lists and Retail Lists</strong></a></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; 
      </strong><a href="postoffice.php" target="_blank"><strong>Post Office Orders</strong></a></font></td>
  </tr>
  <tr>
    <td><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="BackorderView.php"><?php echo $Backorder; ?> Customers
          on Backorder</a></font></strong></td>
    <td><font size="2">&nbsp;</font></td>
  </tr>
</table>


<?

			$sql = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.Country, tblCustomer.BusinessName, tblCustomer.StateOther, tblCustomer.Type,
			tblPurchase.PurchaseID, tblPurchase.CustomerID, tblPurchase.TimerPrice, tblPurchase.Tax, tblPurchase.TotalCost, tblPurchase.Shipped, tblPurchase.Notes, tblPurchase.NumOrdered, tblPurchase.InvoiceNumber, tblPurchase.ShippingOptionID, tblPurchase.ShippingCost
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE tblPurchase.Shipped = 'n' AND tblPurchase.Status = 'active' AND tblCustomer.Country = 'US' AND tblCustomer.Type <> 'samples' AND tblCustomer.Type <> 'bulk'";
				
			$result = mysql_query($sql) or die("Cannot execute query!");
	
			$RegDomestic = mysql_num_rows($result);
			
			
			if($RegDomestic == 0)
			{
				$RegDomestic = '0';
			}
			else
			{
				$RegDomestic = $RegDomestic;
			}

?>


<table width="100%"  border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipper</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
    of Ground*</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
    of Express*</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"># of Other*</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
    of International*</font></strong></div></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">DHL</font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DHLGround; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DHLExpress; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DHLOther; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DHLInternational; ?></font></div></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">USPS</font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $USPSGround; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $USPSExpress; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $USPSExpress; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $USPSInternational; ?></font></div></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Pickup/Drop off </font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Pickup; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"></font></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"></font></div></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif">*Number of Packages (not timers) </font></p>
<p>&nbsp;</p>
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
    <td width="8%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Ship</strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Cust</strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblPurchase.PurchaseID&d=<? if ($sortBy=="tblPurchase.PurchaseID") {echo $sd;} else {echo "ASC";}?>">pID</a></strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";}?>">Name</a></strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a></strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.State&d=<? if ($sortBy=="tblCustomer.State") {echo $sd;} else {echo "ASC";}?>">St.</a></strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.ZipCode&d=<? if ($sortBy=="tblCustomer.ZipCode") {echo $sd;} else {echo "ASC";}?>">Zip</a></strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> Code/Shipper</strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Qty</strong></font></div></td>
    <?
			

			
			

			
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$caID = $row['PurchaseID'];
				$CustomerID = $row['CustomerID'];
				$TimerPrice = $row['TimerPrice'];
				$Tax = $row['Tax'];
				$TotalCost = $row['TotalCost'];
				$Shipped = $row['Shipped'];
				$Notes = $row['Notes'];
				$FirstName = $row['FirstName'];
				$LastName = $row['LastName'];
				$City = $row['City'];
				$State = $row['State'];
				$ZipCode = $row['ZipCode'];
				$Country = $row['Country'];
				$NumOrdered = $row['NumOrdered'];
				$InvoiceNumber = $row['InvoiceNumber'];
				$ShipCode = $row['ShippingOptionID'];
				$CompanyName = $row['BusinessName'];
				$StateOther = $row['StateOther'];
				$ShippingCost = $row['ShippingCost'];
				$Type = $row['Type'];

				if($ShippingCost == "0")
				{
					$ShippingCost = '-';
				}
				
				
				
				if($CompanyName == "")
				{
					$CompanyName = "<br> ";
				}
				else
				{
					$CompanyName = $CompanyName;
				}
				
				
				if($LastName == "")
				{
					$LastName = "<br> ";
				}
				else
				{
					$LastName = $LastName;
				}
				
				if($State == "ZZ")
				{
					$State = $StateOther;
				}
	
				if($State == "HI" OR $State == "AK" OR $StateOther == "AA" OR $StateOther == "AE" OR $StateOther == "AP" 
				OR $StateOther == "Ae" OR $StateOther == "Aa" OR $StateOther == "Ap" OR $State == "PR" OR $State == "MH" OR $State == "GU"
				OR $State == "PW" OR $State == "VI")
				{
					$Shipper = "USPS";
				}
				elseif($ShipCode == "7" OR $ShipCode == "6")
				{
					$Shipper = "Drop Off";
				}
				else
				{
					$Shipper = "DHL";
				}
				
				if($ShipCode == "1")
				{
					$ShipCode = $ShipCode;
				}
				elseif($ShipCode == "3")
				{
					$ShipCode = "EXPRESS";
				}
				else
				{
					$ShipCode = $ShipCode;
				}

				
												
			  ?>
  <tr>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="NotShippedDetails.php?purch=<? echo $caID; ?>&cust=<? echo $CustomerID; ?>">Ship</a></font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?purch=<? echo $caID; ?>&cust=<? echo $CustomerID; ?>">Cust</a></font></div></td>
    <td width="9%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $caID; ?></font></div></td>
    <td width="8%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?> <? echo $LastName; ?></font></td>
    <td width="8%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></td>
    <td width="7%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></td>
    <td width="7%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ShipCode; ?> / <? echo $Shipper; ?></font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumOrdered; ?></font></div></td>
  </tr>
  <?
			  	}
				
				
			  ?>
</table>


<?
			$sql2 = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.Country, tblCustomer.BusinessName, tblCustomer.StateOther, tblCustomer.Type,
			tblPurchase.PurchaseID, tblPurchase.CustomerID, tblPurchase.TimerPrice, tblPurchase.Tax, tblPurchase.TotalCost, tblPurchase.Shipped, tblPurchase.Notes, tblPurchase.NumOrdered, tblPurchase.InvoiceNumber, tblPurchase.ShippingOptionID, tblPurchase.ShippingCost
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE tblPurchase.Shipped = 'n' AND tblPurchase.Status = 'active' AND Country <> 'US'";
	
		
			$result2 = mysql_query($sql2) or die("Cannot execute query!");
			
			$RegInt = mysql_num_rows($result2);
				
			if($RegInt == 0)
			{
				$RegInt = '0';
			}
			else
			{
				$RegInt = $RegInt;
			}


?>

<p> <font size="2" face="Arial, Helvetica, sans-serif"><br>
    <?php echo $RegInt; ?> Customers (International)</font></p>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">

  <tr bgcolor="#FFFFCC">
    <td width="8%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Ship</strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Cust</strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblPurchase.PurchaseID&d=<? if ($sortBy=="tblPurchase.PurchaseID") {echo $sd;} else {echo "ASC";}?>">pID</a></strong></font></div></td>
    <td width="11%" class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.BusinessName&d=<? if ($sortBy=="tblCustomer.BusinessName") {echo $sd;} else {echo "ASC";}?>">Company</a></strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";}?>">Name</a></strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a></strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.State&d=<? if ($sortBy=="tblCustomer.State") {echo $sd;} else {echo "ASC";}?>">St.</a></strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.ZipCode&d=<? if ($sortBy=="tblCustomer.ZipCode") {echo $sd;} else {echo "ASC";}?>">Zip</a></strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> <a href="../customers/NotShippedView.php?sort=tblCustomer.Country&d=<? if ($sortBy=="tblCustomer.Country") {echo $sd;} else {echo "ASC";}?>">Country</a></strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Cost</strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> Code</strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Qty</strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Type</strong></font></div></td>
    <?
	
				
		
		
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row2 = mysql_fetch_array($result2))
				{
				$caID = $row2['PurchaseID'];
				$CustomerID = $row2['CustomerID'];
				$TimerPrice = $row2['TimerPrice'];
				$Tax = $row2['Tax'];
				$TotalCost = $row2['TotalCost'];
				$Shipped = $row2['Shipped'];
				$Notes = $row2['Notes'];
				$FirstName = $row2['FirstName'];
				$LastName = $row2['LastName'];
				$City = $row2['City'];
				$State = $row2['State'];
				$ZipCode = $row2['ZipCode'];
				$Country = $row2['Country'];
				$NumOrdered = $row2['NumOrdered'];
				$InvoiceNumber = $row2['InvoiceNumber'];
				$ShipCode = $row2['ShippingOptionID'];
				$CompanyName = $row2['BusinessName'];
				$StateOther = $row2['StateOther'];
				$ShippingCost = $row2['ShippingCost'];
				$Type = $row2['Type'];

				if($ShippingCost == "0")
				{
					$ShippingCost = '-';
				}
				
				
				
				if($CompanyName == "")
				{
					$CompanyName = "<br> ";
				}
				else
				{
					$CompanyName = $CompanyName;
				}
				
				
				if($LastName == "")
				{
					$LastName = "<br> ";
				}
				else
				{
					$LastName = $LastName;
				}
				
				if($State == "ZZ")
				{
					$State = $StateOther;
				}
	
				
				if($Country == "CA" AND $ShipCode == "1")
				{
					$Shipper = "USPS";
				}
				elseif($Country == "CA" AND $ShipCode <> "1")
				{
					$Shipper = "DHL";
				}
				
	
			
				
				
												
			  ?>
  <tr>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="NotShippedDetails.php?purch=<? echo $caID; ?>&cust=<? echo $CustomerID; ?>">Ship</a></font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?purch=<? echo $caID; ?>&cust=<? echo $CustomerID; ?>">Cust</a></font></div></td>
    <td width="9%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $caID; ?></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?></font></td>
    <td width="8%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?> <? echo $LastName; ?></font></td>
    <td width="8%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></td>
    <td width="7%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></td>
    <td width="7%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
    <td width="7%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Country; ?></font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ShippingCost; ?></font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ShipCode; ?> / <? echo $Shipper; ?></font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumOrdered; ?></font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Type; ?></font></div></td>
  </tr>
  <?
			  	}
				
			  ?>
</table>


<?
			$sql3 = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.Country, tblCustomer.BusinessName, tblCustomer.StateOther, tblCustomer.Type,
			tblPurchase.PurchaseID, tblPurchase.CustomerID, tblPurchase.TimerPrice, tblPurchase.Tax, tblPurchase.TotalCost, tblPurchase.Shipped, tblPurchase.Notes, tblPurchase.NumOrdered, tblPurchase.InvoiceNumber, tblPurchase.ShippingOptionID, tblPurchase.ShippingCost
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE tblPurchase.Shipped = 'n' AND tblPurchase.Status = 'active' AND tblCustomer.Country = 'US' AND tblCustomer.Type = 'bulk'";
	
		
			$result3 = mysql_query($sql3) or die("Cannot execute query!");


			$Bulk = mysql_num_rows($result3);
			
			
			if($Bulk == 0)
			{
				$Bulk = '0';
			}
			else
			{
				$Bulk = $Bulk;
			}

			
			
				if($State == "HI" OR $State == "AK" OR $StateOther == "AA" OR $StateOther == "AE" OR $StateOther == "AP" 
				OR $StateOther == "Ae" OR $StateOther == "Aa" OR $StateOther == "Ap" OR $State == "PR" OR $State == "MH" OR $State == "GU"
				OR $State == "PW" OR $State == "VI")
				{
					$Shipper = "USPS";
				}
				elseif($ShipCode == "7" OR $ShipCode == "6")
				{
					$Shipper = "Drop Off";
				}
				else
				{
					$Shipper = "DHL";
				}

?>

<p><font size="2" face="Arial, Helvetica, sans-serif"><br>
    <?php echo $Bulk; ?> Bulk Customers </font></p>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
  <?
	

			    
?>
  <tr bgcolor="#C7F1C7">
    <td width="7%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Ship</strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Cust</strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblPurchase.PurchaseID&d=<? if ($sortBy=="tblPurchase.PurchaseID") {echo $sd;} else {echo "ASC";}?>">pID</a></strong></font></div></td>
    <td width="10%" class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.BusinessName&d=<? if ($sortBy=="tblCustomer.BusinessName") {echo $sd;} else {echo "ASC";}?>">Company</a></strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";}?>">Name</a></strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a></strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.State&d=<? if ($sortBy=="tblCustomer.State") {echo $sd;} else {echo "ASC";}?>">St.</a></strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.ZipCode&d=<? if ($sortBy=="tblCustomer.ZipCode") {echo $sd;} else {echo "ASC";}?>">Zip</a></strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> <a href="../customers/NotShippedView.php?sort=tblCustomer.Country&d=<? if ($sortBy=="tblCustomer.Country") {echo $sd;} else {echo "ASC";}?>">Country</a></strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Cost</strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> Code</strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Qty</strong></font></div></td>
    <?
	
			
	
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row3 = mysql_fetch_array($result3))
				{
				$caID = $row3['PurchaseID'];
				$CustomerID = $row3['CustomerID'];
				$TimerPrice = $row3['TimerPrice'];
				$Tax = $row3['Tax'];
				$TotalCost = $row3['TotalCost'];
				$Shipped = $row3['Shipped'];
				$Notes = $row3['Notes'];
				$FirstName = $row3['FirstName'];
				$LastName = $row3['LastName'];
				$City = $row3['City'];
				$State = $row3['State'];
				$ZipCode = $row3['ZipCode'];
				$Country = $row3['Country'];
				$NumOrdered = $row3['NumOrdered'];
				$InvoiceNumber = $row3['InvoiceNumber'];
				$ShipCode = $row3['ShippingOptionID'];
				$CompanyName = $row3['BusinessName'];
				$StateOther = $row3['StateOther'];
				$ShippingCost = $row3['ShippingCost'];
				$Type = $row3['Type'];

				if($ShippingCost == "0")
				{
					$ShippingCost = '-';
				}
				
				
				
				if($CompanyName == "")
				{
					$CompanyName = "<br> ";
				}
				else
				{
					$CompanyName = $CompanyName;
				}
				
				
				if($LastName == "")
				{
					$LastName = "<br> ";
				}
				else
				{
					$LastName = $LastName;
				}
				
				if($State == "ZZ")
				{
					$State = $StateOther;
				}
	
		if($State == "HI" OR $State == "AK" OR $StateOther == "AA" OR $StateOther == "AE" OR $StateOther == "AP" 
				OR $StateOther == "Ae" OR $StateOther == "Aa" OR $StateOther == "Ap" OR $State == "PR" OR $State == "MH" OR $State == "GU"
				OR $State == "PW" OR $State == "VI")
				{
					$Shipper = "USPS";
				}
				elseif($ShipCode == "7" OR $ShipCode == "6")
				{
					$Shipper = "Drop Off";
				}
				else
				{
					$Shipper = "DHL";
				}
												
			  ?>
  <tr>
    <td width="7%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="NotShippedDetails.php?purch=<? echo $caID; ?>&cust=<? echo $CustomerID; ?>">Ship</a></font></div></td>
    <td width="7%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?purch=<? echo $caID; ?>&cust=<? echo $CustomerID; ?>">Cust</a></font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $caID; ?></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?></font></td>
    <td width="7%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?> <? echo $LastName; ?></font></td>
    <td width="7%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></td>
    <td width="6%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></td>
    <td width="6%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
    <td width="6%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Country; ?></font></div></td>
    <td width="7%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ShippingCost; ?></font></div></td>
    <td width="7%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ShipCode; ?> / <? echo $Shipper; ?></font></div></td>
    <td width="7%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumOrdered; ?></font></div></td>
  </tr>
  <?
			  	}
				
				
			  ?>
</table>

<?
			$sql4 = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.Country, tblCustomer.BusinessName, tblCustomer.StateOther, tblCustomer.Type,
			tblPurchase.PurchaseID, tblPurchase.CustomerID, tblPurchase.TimerPrice, tblPurchase.Tax, tblPurchase.TotalCost, tblPurchase.Shipped, tblPurchase.Notes, tblPurchase.NumOrdered, tblPurchase.InvoiceNumber, tblPurchase.ShippingOptionID, tblPurchase.ShippingCost
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE tblPurchase.Shipped = 'n' AND tblPurchase.Status = 'active' AND tblCustomer.Country = 'US' AND tblCustomer.Type = 'samples'";
	
		
			$result4 = mysql_query($sql4) or die("Cannot execute query!");
				
				
			$Sample = mysql_num_rows($result4);
			
			
			if($Sample == 0)
			{
				$Sample = '0';
			}
			else
			{
				$Sample = $Sample;
			}



?>
<p><font size="2" face="Arial, Helvetica, sans-serif"><br>
    <?php echo $Sample; ?> Sample Customers</font></p>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
  <?

			    
?>
  <tr bgcolor="#FFCCFF">
    <td width="8%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Ship</strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Cust</strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblPurchase.PurchaseID&d=<? if ($sortBy=="tblPurchase.PurchaseID") {echo $sd;} else {echo "ASC";}?>">pID</a></strong></font></div></td>
    <td width="11%" class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.BusinessName&d=<? if ($sortBy=="tblCustomer.BusinessName") {echo $sd;} else {echo "ASC";}?>">Company</a></strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";}?>">Name</a></strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a></strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.State&d=<? if ($sortBy=="tblCustomer.State") {echo $sd;} else {echo "ASC";}?>">St.</a></strong></font></div></td>
    <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/NotShippedView.php?sort=tblCustomer.ZipCode&d=<? if ($sortBy=="tblCustomer.ZipCode") {echo $sd;} else {echo "ASC";}?>">Zip</a></strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> <a href="../customers/NotShippedView.php?sort=tblCustomer.Country&d=<? if ($sortBy=="tblCustomer.Country") {echo $sd;} else {echo "ASC";}?>">Country</a></strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> Code</strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Qty</strong></font></div></td>
    <?
	
				
	
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row4 = mysql_fetch_array($result4))
				{
				$caID = $row4['PurchaseID'];
				$CustomerID = $row4['CustomerID'];
				$TimerPrice = $row4['TimerPrice'];
				$Tax = $row4['Tax'];
				$TotalCost = $row4['TotalCost'];
				$Shipped = $row4['Shipped'];
				$Notes = $row4['Notes'];
				$FirstName = $row4['FirstName'];
				$LastName = $row4['LastName'];
				$City = $row4['City'];
				$State = $row4['State'];
				$ZipCode = $row4['ZipCode'];
				$Country = $row4['Country'];
				$NumOrdered = $row4['NumOrdered'];
				$InvoiceNumber = $row4['InvoiceNumber'];
				$ShipCode = $row4['ShippingOptionID'];
				$CompanyName = $row4['BusinessName'];
				$StateOther = $row4['StateOther'];
				$ShippingCost = $row4['ShippingCost'];
				$Type = $row4['Type'];

				if($ShippingCost == "0")
				{
					$ShippingCost = '-';
				}
				
				
				
				if($CompanyName == "")
				{
					$CompanyName = "<br> ";
				}
				else
				{
					$CompanyName = $CompanyName;
				}
				
				
				if($LastName == "")
				{
					$LastName = "<br> ";
				}
				else
				{
					$LastName = $LastName;
				}
				
				if($State == "ZZ")
				{
					$State = $StateOther;
				}
	
				
												
			  ?>
  <tr>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="NotShippedDetails.php?purch=<? echo $caID; ?>&cust=<? echo $CustomerID; ?>">Ship</a></font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?purch=<? echo $caID; ?>&cust=<? echo $CustomerID; ?>">Cust</a></font></div></td>
    <td width="9%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $caID; ?></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?></font></td>
    <td width="8%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?> <? echo $LastName; ?></font></td>
    <td width="8%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></td>
    <td width="7%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></td>
    <td width="7%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
    <td width="7%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Country; ?></font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ShipCode; ?> / <? echo $Shipper; ?></font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumOrdered; ?></font></div></td>
  </tr>
  <?
			  	}
				
				//close connection to database
				mysql_close($link);
			  ?>
</table>
<p>&nbsp;</p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; 
  <a href="http://silenttimer.com/ship/" target="_blank">View Shipping Page</a></strong></font></p>
  
<SCRIPT LANGUAGE="JavaScript">
	function Check()
	{
		doyou = confirm("Are you sure you want to IMPORT?");
		return doyou;
	}
</script>

<form action="http://www.silenttimer.com/ship/import_shipments.php" method="post" name="form1" target="_blank" onSubmit="return Check();">
  <input name="Export" type="submit" id="Export" value="Export Shipments">
  
</form>
<p align="center">

  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

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
