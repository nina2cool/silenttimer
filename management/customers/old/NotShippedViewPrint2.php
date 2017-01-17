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

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, 
			tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.CountryID, tblCustomer.BusinessName, 
			tblCustomer.StateOther, tblCustomer.Type, tblPurchase2.NovaPress,
			tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblPurchase2.ShipNotes,
			tblPurchase2.ShipCostID, tblPurchase2.Status, tblPurchase2.Shipped
			FROM tblCustomer INNER JOIN tblPurchase2
			ON tblCustomer.CustomerID = tblPurchase2.CustomerID
			INNER JOIN tblPurchaseDetails2
			ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
			
			WHERE tblPurchase2.Status = 'active'
			AND tblPurchase2.Shipped = 'n' AND tblPurchaseDetails2.Status = 'active'
			GROUP BY tblPurchase2.PurchaseID";
	
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
	
	
	
?><title>Packing Lists &amp; Retail Stores</title>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Packing
      Lists and Retail Stores</strong></font></p>
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
    <td class=sort> <div align="center"><strong><a href="../customers/NotShippedViewPrint.php?sort=tblPurchase.PurchaseID&d=<? if ($sortBy=="tblPurchase.PurchaseID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">pID</font></a></strong></div></td>
    <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Company</font></strong></div></td>
    <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/NotShippedViewPrint.php?sort=tblCustomer.FirstName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";}?>">Name</a></font></strong></div></td>
    <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/NotShippedView.php?sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a>, <a href="../customers/NotShippedView.php?sort=tblCustomer.State&d=<? if ($sortBy=="tblCustomer.State") {echo $sd;} else {echo "ASC";}?>">St.</a> Zip </font></strong></div></td>
    <td class=sort><div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Type</font></strong></div></td>
    <td class=sort><div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Ship
            Notes </font></strong></div></td>
    <td class=sort><div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">INV</font></strong></div></td>
    <td width="5%" class=sort> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">PL</font></strong></div></td>
    <td width="5%" class=sort> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">RS</font></strong></div></td>
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
				
						$sql2 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
						$result2 = mysql_query($sql2) or die("Cannot execute query TypeID!");
						
						while($row2 = mysql_fetch_array($result2))
						{
						$Type = $row2[Type];
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
			
				
						$Radius = 15;
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
    <td width="6%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>"><? echo $PurchaseID; ?></a></font></div></td>
    <td width="11%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?></font></td>
    <td width="11%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?> <? echo $LastName; ?><br>
    </font></td>
    <td width="8%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?>, <? echo $State; ?> <? echo $ZipCode; ?></font></td>
    <td width="7%"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Type; ?></font></div></td>
    <td width="7%"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ShipNotes; ?></font></div></td>
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
