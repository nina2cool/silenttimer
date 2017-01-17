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
?><title>Shipping Summary</title>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Shipping
      Summary<br>
  <?

	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, 
	tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.CountryID, tblCustomer.BusinessName, 
	tblCustomer.StateOther, tblCustomer.Type, tblCustomer.Address, tblCustomer.Address2, tblCustomer.Phone, tblCustomer.Email,
	tblCustomer.CountryID, tblPurchase2.PurchaseID, tblPurchase2.CustomerID,
	Count(tblPurchase2.ShipCostID) as Num, 
	tblPurchase2.ShipCostID, tblPurchase2.Status, tblPurchase2.Shipped, tblPurchase2.ShipNotes
	FROM tblCustomer INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblShippingCost5
	ON tblPurchase2.ShipCostID = tblShippingCost5.ShipCostID
	WHERE tblPurchase2.Status = 'active'
	AND tblPurchase2.Shipped = 'n' AND tblPurchase2.Preorder <> 'y'
	GROUP BY tblShippingCost5.ShippingOptionID";
	
	$result = mysql_query($sql) or die("Cannot retrieve customer info, please try again.");
	
	
	
?>
</strong></font><font size="2" face="Arial, Helvetica, sans-serif"></font> </p>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr bgcolor="#FFFFCC">
    <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><b>Shipper</b></font></div></td>
    <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><b>Shipping
    Option </b></font></div></td>
    <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><b>#
    to Ship </b></font></div></td>
    <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><b>PL/RS</b></font></div></td>
  </tr>
  <?


		while($row = mysql_fetch_array($result))
			{
			$ShipCostID = $row['ShipCostID'];
			$PurchaseID = $row['PurchaseID'];
			$Num = $row['Num'];


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
									}
		
					}
					
		
	
?>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Shipper; ?></font></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ShippingOption; ?></font></font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Num; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="custpackinglist_ship.php?s=<? echo $ShippingOptionID; ?>" target="_blank">Lists</a></font></div></td>
  </tr>
  <?
			}
?>
</table>
<p>&nbsp; </p>
<p>&nbsp;</p>
<p>&nbsp;</p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);

// has links that show up at the bottom in it.


// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>