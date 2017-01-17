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



?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Customers
      on Backorder </strong></font></p>
<p><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&lt;</font><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">  <a href="NotShippedView.php">Back to Timers Not Shipped </a></font></strong></p>
<?
			$sql3 = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.Country, tblCustomer.BusinessName, tblCustomer.StateOther, tblCustomer.Type,
			tblPurchase.PurchaseID, tblPurchase.CustomerID, tblPurchase.TimerPrice, tblPurchase.Tax, tblPurchase.TotalCost, tblPurchase.Shipped, tblPurchase.Notes, tblPurchase.NumOrdered, tblPurchase.InvoiceNumber, tblPurchase.ShippingOptionID, tblPurchase.ShippingCost
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE tblPurchase.Shipped = 'n' AND tblPurchase.Status = 'backorder'";
	
		
			$result3 = mysql_query($sql3) or die("Cannot execute query!");


			$Backorder = mysql_num_rows($result3);
			
			
			if($Backorder == 0)
			{
				$Backorder = '0';
			}
			else
			{
				$Backorder = $Backorder;
			}


?>
<p><font size="2" face="Arial, Helvetica, sans-serif"><br>
    <?php echo $Backorder; ?>  Customers on Backorder</font></p>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
  <?
	

			    
?>
  <tr bgcolor="#FFD3B7">
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
	
				$NumTimers = 0;
	
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
	
				
				$NumTimers = $NumTimers + $NumOrdered;
				
												
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
    <td width="7%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ShipCode; ?>/<? echo $Shipper; ?></font></div></td>
    <td width="7%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumOrdered; ?></font></div></td>
  </tr>
  <?
			  	}
				
				
			  ?>
</table>

<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $NumTimers; ?> Timers
on Backorder</strong></font></p>
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
