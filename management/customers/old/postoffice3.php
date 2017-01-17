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
?><title>Post Office List</title>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Post 
  Office Orders<br>
  <?

	//grab variables to get purchase info from DB.


	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, 
	tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.CountryID, tblCustomer.BusinessName, 
	tblCustomer.StateOther, tblCustomer.Type, tblCustomer.Address, tblCustomer.Address2, tblCustomer.Phone, tblCustomer.Email,
	tblCustomer.CountryID, tblPurchase2.PurchaseID, tblPurchase2.CustomerID,
	tblPurchase2.ShipCostID, tblPurchase2.Status, tblPurchase2.Shipped, tblPurchase2.ShipNotes
	FROM tblCustomer INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	WHERE tblPurchase2.Status = 'active'
	AND tblPurchase2.Shipped = 'n' OR tblPurchase2.Status = 'active'
	AND tblPurchase2.Shipped = 'p'
	ORDER BY tblPurchase2.PurchaseID ASC";
	
	$result = mysql_query($sql) or die("Cannot retrieve customer info, please try again.");
	
?>
  </strong></font><font size="2" face="Arial, Helvetica, sans-serif"></font> </p>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
  <tr> 
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b>Name</b></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b>Address</b></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b>Address2</b></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b>City</b></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b>State</b></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b>Zip</b></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b>Phone</b></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b>Email</b></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b>Country</b></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b>Cust<br>
  Type</b></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b>Ship<br>
    Type</b></font></div></td>
    <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong> Ship
    Notes </strong></font></div></td>
    <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Products</strong></font></div></td>
  </tr>
  <?


		while($row = mysql_fetch_array($result))
			{
			$BusinessName = $row['BusinessName'];
			$FirstName = $row['FirstName'];
			$LastName = $row['LastName'];
			$Address = $row['Address'];
			$Address2 = $row['Address2'];
			$City = $row['City'];
			$State = $row['State'];
			$StateOther = $row['StateOther'];
			$ZipCode = $row['ZipCode'];
			$CountryID = $row['CountryID'];
			$CompanyName = $row['BusinessName'];
			$Email = $row['Email'];
			$ShipCostID = $row['ShipCostID'];
			$Phone = $row['Phone'];
			$ShipNotes = $row['ShipNotes'];
			$TypeID = $row['Type'];
			$PurchaseID = $row['PurchaseID'];
		
			
				$sql22 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
				$result22 = mysql_query($sql22) or die("Cannot execute country!");
				
				
				while($row22 = mysql_fetch_array($result22))
				{
				$Type = $row22['Type'];
				}
			
		
		
				$sql9 = "SELECT * FROM tblShipLocation WHERE LocationID = '$CountryID'";
				$result9 = mysql_query($sql9) or die("Cannot execute country!");
				
				
				while($row9 = mysql_fetch_array($result9))
				{
				$Country = $row9['Name'];
				}
		
		
		if($CountryID == '225')
		{
		$Country = "US";
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
		
		
		if($ShipNotes == '')
		{
			$ShipNotes = '-';
		}
		
		
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
    <td><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><? echo "$FirstName $LastName"; ?></font></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address; ?></font></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address2; ?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Phone; ?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Email; ?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Country; ?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Type; ?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo "$Shipper - $ShippingOptionNickname"; ?></font></td>
    <td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ShipNotes; ?></font></div></td>
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
  </tr>
  <?
			}
?>
</table>
<p> <font size="2" face="Arial, Helvetica, sans-serif">Close window when finished</font></p>
<p align="left">
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
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>