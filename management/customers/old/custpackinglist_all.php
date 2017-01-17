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


	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


?><HEAD>
<TITLE>All Customer Packing Lists</TITLE>
<STYLE>
@media print { DIV.PAGEBREAK {page-break-before: always}}
</STYLE>
</HEAD>

<?

	$sql9 = "SELECT * FROM tblEmployee WHERE EmployeeID = '10'";
	$result9 = mysql_query($sql9) or die("Cannot retrieve company info, please try again.");
	
		while($row9 = mysql_fetch_array($result9))
				{
				$CAddress = $row9['Address'];
				$CAddress2 = $row9['Address2'];
				$CCity = $row9['City'];
				$CState = $row9['State'];
				$CZipCode = $row9['ZipCode'];
				$CPhone = $row9['CellPhone'];
				$CFax = $row9['Fax'];
				$CEmail = $row9['Email'];
				}
				
			$sql55 = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.Address, tblCustomer.Address2,
			tblCustomer.Phone, tblCustomer.Email,
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
			GROUP BY tblPurchase2.PurchaseID
			ORDER BY tblCustomer.Type
			";
				
			//put SQL statement into result set for loop through records
			$result55 = mysql_query($sql55) or die("Cannot execute query!");
				
		
		while($row55 = mysql_fetch_array($result55))
		{
		#open loop for non-shipped customers
		$CustomerID = $row55['CustomerID'];
		$PurchaseID = $row55['PurchaseID'];
		$BusinessName = $row55['BusinessName'];
			$FirstName = $row55['FirstName'];
			$LastName = $row55['LastName'];
			$Address = $row55['Address'];
			$Address2 = $row55['Address2'];
			$City = $row55['City'];
			$State = $row55['State'];
			$StateOther = $row55['StateOther'];
			$ZipCode = $row55['ZipCode'];
			$Email = $row55['Email'];
			$TypeID = $row55['Type'];
			$Phone = $row55['Phone'];
			$Email = $row55['Email'];
			$CountryID = $row55['CountryID'];
				
			/*
		$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
		$result = mysql_query($sql) or die("Cannot retrieve affiliate info, please try again.");

		while($row = mysql_fetch_array($result))
			{
			#open loop for getting customer info
			$BusinessName = $row['BusinessName'];
			$FirstName = $row['FirstName'];
			$LastName = $row['LastName'];
			$Address = $row['Address'];
			$Address2 = $row['Address2'];
			$City = $row['City'];
			$State = $row['State'];
			$StateOther = $row['StateOther'];
			$ZipCode = $row['ZipCode'];
			$Email = $row['Email'];
			$TypeID = $row['Type'];
			$Phone = $row['Phone'];
			$Email = $row['Email'];
			$CountryID = $row['CountryID'];
	}
	#end loop for getting customer info
	*/
			
		$sql2 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
		
		$result2 = mysql_query($sql2) or die("Cannot retrieve company info, please try again.");
		
		while($row2 = mysql_fetch_array($result2))
		{
		$Type = $row2['Type'];
		}
	
	if($State == "ZZ")
	{$State = $StateOther;}

	if($Phone == '')
	{$Phone = 'n/a';}
	else
	{$Phone = $Phone;}
	
	if($Email == '')
	{$Email = 'n/a';}
	else
	{$Email = $Email;}
	
	
	$sql = "SELECT DATE_FORMAT(OrderDateTime, '%m/%d/%y') AS DateTime, Subtotal, Discount, Paid, ShipCostID, 
	ShippingCost, PaypalNumber, Tax, FirstNameB, LastNameB, AddressB, CityB, StateB, OtherStateB, CountryIDB,
	CardType, LastFourCr, ZipB, PromotionCodeID
	FROM tblPurchase2 WHERE PurchaseID = '$PurchaseID'";

	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
			$PurchaseDate = $row['DateTime'];
			$Subtotal = $row['Subtotal'];
			$Discount = $row['Discount'];
			$Tax = $row['Tax'];
			$PaypalNumber = $row['PaypalNumber'];
			$Paid1 = $row['Paid'];
			$ShipCostID = $row['ShipCostID'];
			$bFirstName = $row['FirstNameB'];
			$bLastName = $row['LastNameB'];
			$bAddress = $row['AddressB'];
			$bCity = $row['CityB'];
			$bState = $row['StateB'];
			$bStateOther = $row['OtherStateB'];
			$bZipCode = $row['ZipB'];
			$PaymentType = $row['CardType'];
			$Last4 = $row['LastFourCr'];
			$PromotionCodeID = $row['PromotionCodeID'];
			$ShippingCost = $row['ShippingCost'];
			}
			
			
			
			$sql = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID'";
			
			$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
			
			while($row = mysql_fetch_array($result))
			{
			$ListingID = $row['EbayItemNumber'];
			$Replacement = $row['Replacement'];
			}
			
			if($Replacement == 'y')
			{
			$Type = "replacement";
			}
			
			if ($bFirstName == "")
				{$bFirstName = "$FirstName";}
		
				else
				{$bFirstName = $bFirstName;}

			if ($bLastName == "")
				{$bLastName = "$LastName";}
		
				else
				{$bLastName = $bLastName;}
				
			if ($bAddress == "")
				{$bAddress = "$Address". " $Address2";}
			else
				{$bAddress = $bAddress;}


			if ($bCity == "")
				{$bCity = "$City";}
			else
				{$bCity = $bCity;}

			
			if ($bState == "")
				{$bState = "$State";}
			else
				{$bState = $bState;}
		
					if($bState == "ZZ")
					{$bState = $bStateOther;}
		

			if ($bZipCode == "0" OR $bZipCode == '')
				{$bZipCode = "$ZipCode";}
			else
				{$bZipCode = $bZipCode;}



			if ($Last4 == "")
				{$Last4 = 'n/a';}
			else
				{$Last4 = $Last4;}

			
			if($PaymentType == '')
			{$PaymentType = 'n/a';}
			else
			{$PaymentType = $PaymentType;}
			
			
			if($Paid1 == 'y')
			{$Paid = 'yes';}
			else
			{$Paid = 'no';}
	

	
			if($ListingID == '')
			{$ListingID = 'n/a';}
			else
			{$ListingID = $ListingID;}
	
	
			if ($PaypalNumber == '')
			{$PaypalNumber = 'n/a';}
			else
			{$PaypalNumber = $PaypalNumber;}
			
			
			$sql2 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID'";
					$result2 = mysql_query($sql2) or die("Cannot execute shipcostID!");
							
							
							while($row2 = mysql_fetch_array($result2))
							{
							$ShipperID = $row2['ShipperID'];
							$ShippingOptionID = $row2['ShippingOptionID'];
							$ShippingCost1 = $row2['Cost'];
							
							
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
			
		
	$GrandTotal = $ShippingCost + $Subtotal + $Tax - $Discount;

	$Now = date("m/d/y");
	
	
		$sql2 = "SELECT * FROM tblShipLocation WHERE LocationID = '$CountryID'";
		$result2 = mysql_query($sql2) or die("Cannot execute query countryID!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$Country = $row2[Name];
			
			
				if($CountryID == '242' OR $CountryID == '243')
				{$Country = "United States";}
				else
				{$Country = $Country;}
		}
		
	

	
?><title>Customer Packing Lists</title>

<table width="650" border="0" cellpadding="5" cellspacing="0">
  <tr> 
    <td width="22%"><font size="2" face="Arial, Helvetica, sans-serif"><img src="../partners/images/Front_Logo_01.jpg" width="123" height="79"></font></td>
    <td width="39%"><div align="left"><font size="4" face="Arial, Helvetica, sans-serif"><strong>Silent 
        Technology LLC<br>
        </strong></font><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $CAddress; ?> <?php echo $CAddress2; ?><br>
        <?php echo $CCity; ?>, <?php echo $CState; ?> <?php echo $CZipCode; ?><br>
        Office: <?php echo $CPhone; ?><br>
        Fax: <?php echo $CFax; ?></font></div></td>
    <td width="39%"><font size="6" face="Arial, Helvetica, sans-serif"><strong>PACKING 
      LIST </strong></font></td>
  </tr>
</table>
<br>
<table width="650" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td width="50%" bgcolor="#CCCCCC"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif">Shipping 
      Address :</font> </font></strong></td>
    <td width="50%" bgcolor="#CCCCCC"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif">Billing 
      Address :</font> </font></strong></td>
  </tr>
  <tr> 
  
  	<?
		if($BusinessName == '')
		{
		?>

  
    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"></font><? echo "$FirstName $LastName"; ?><br>
	  
	  <?
	  if($Address2 == '')
	  {
	  ?>
	  <? echo $Address; ?></font> <font size="2" face="Arial, Helvetica, sans-serif"></font><br>
	  
	  <?
	  }
	  else
	  {
	  ?>
	  
      <? echo $Address; ?></font> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address2; ?></font><br>
	  
	  <?
	  }
	  ?>
	  
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font>, 
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font> 
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font> <br>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $Country; ?></font>      <br>
    </font></td>
    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"></font><? echo "$bFirstName $bLastName"; ?><br>
      <? echo $bAddress; ?></font><br>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $bCity; ?></font>, 
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $bState; ?></font> 
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $bZipCode; ?></font> <br>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $Country; ?></font>      </font></td>
	  
	  <?
	  }
	  else
	  {
	  ?>
	  
	  <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $BusinessName; ?><br>
      <? echo "$FirstName $LastName"; ?><br>
    
		  <?
	  if($Address2 == '')
	  {
	  ?>
	  <? echo $Address; ?></font> <font size="2" face="Arial, Helvetica, sans-serif"></font><br>
	  
	  <?
	  }
	  else
	  {
	  ?>
	  
      <? echo $Address; ?></font> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address2; ?></font><br>
	  
	  <?
	  }
	  ?>

      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font>, 
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font> 
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font> <br>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $Country; ?></font>      <br>
    </font></td>
  
    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $BusinessName; ?></font><br>
      <? echo "$bFirstName $bLastName"; ?><br>
      <? echo $bAddress; ?></font><br>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $bCity; ?></font>, 
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $bState; ?></font> 
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $bZipCode; ?></font> <br>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $Country; ?></font>      </font></td>
	  
	  <?
	  }
	  ?>

  </tr>
</table>
<br>
<hr noshade>
<br>
<table width="650" border="1" cellpadding="3" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="25%"><font size="2" face="Arial, Helvetica, sans-serif">Customer
    Phone: </font></td>
    <td width="25%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Phone; ?></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Purchase Date:</font></td>
    <td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $PurchaseDate; ?></font></div></td>
  </tr>
  <tr>
    <td width="25%"><font size="2" face="Arial, Helvetica, sans-serif">Customer
        Email: </font></td>
    <td width="25%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Email; ?></font></div></td>
    <td height="29"><font size="2" face="Arial, Helvetica, sans-serif">Order
        Type:</font></td>
    <td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Type; ?></font></div></td>
  </tr>
</table>
<br>
<table width="650" border="1" cellpadding="3" cellspacing="0" bordercolor="#000000">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Shipment Type:</font></td>
    <td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Shipper; ?><br>
      <? echo $ShippingOption; ?></font></div></td> 
    <td width="25%"><font size="2" face="Arial, Helvetica, sans-serif">Payment 
      Type:</font></td>
    <td width="25%"> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $PaymentType; ?></font></div></td>
  </tr>
  <tr> 
    <td width="25%"><font size="2" face="Arial, Helvetica, sans-serif">Shipment 
      Date:</font></td>
    <td width="25%"> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Now; ?></font></div></td>
    <td width="25%"><font size="2" face="Arial, Helvetica, sans-serif">Last 4 
      Digits: </font></td>
    <td width="25%"> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Last4; ?></font></div></td>
  </tr>
  <tr> 
    <td width="25%" height="29"><font size="2" face="Arial, Helvetica, sans-serif">Purchase
         Order </font> #:</td>
    <td width="25%"> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $PurchaseID; ?></font></div></td>
    <td width="25%"><font size="2" face="Arial, Helvetica, sans-serif">Listing 
      ID:</font></td>
    <td width="25%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $ListingID; ?></font></div></td>
  </tr>
  <tr> 
    <td width="25%" height="29"><font size="2" face="Arial, Helvetica, sans-serif">Paid?</font></td>
    <td width="25%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Paid; ?></font></div></td>
    <td width="25%"><font size="2" face="Arial, Helvetica, sans-serif">Paypal 
      #:</font></td>
    <td width="25%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $PaypalNumber; ?></font></div></td>
  </tr>
</table>
<br>
<br>
<table width="650" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
  <tr bgcolor="#CCCCCC"> 
    <td> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Description</font></strong></div></td>
    <td width="28"> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Qty</font></strong></div></td>
    <td width="141"> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Unit 
        Price</font></strong></div></td>
    <td width="66"> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Amount</font></strong></div></td>
  </tr>
  
    <?
  
  $sql5 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Status = 'active' AND Shipped = 'n'";
			$result5 = mysql_query($sql5) or die("Cannot execute purch details 2!");
			
			while($row5 = mysql_fetch_array($result5))
			{
			$ProductID = $row5['ProductID'];
			$Quantity = $row5['Quantity'];
			$PurchasePrice = $row5['PurchasePrice'];
			
						$sql6 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
						$result6 = mysql_query($sql6) or die("Cannot execute product info!");
						
						while($row6 = mysql_fetch_array($result6))
						{
						$ProductName = $row6['ProductName'];
			
			
			$ProductPrice = $PurchasePrice * $Quantity;
						
?>
  <tr valign="top">
    <td height="37"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ProductName; ?></font></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Quantity; ?></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($PurchasePrice,2); ?></font></div></td>
    <td> <div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($ProductPrice,2); ?></font></div></td>
  </tr>
    <?

  }
  }
  ?>
    
    <?
		if($Discount <> '' OR $Discount <> 0 OR $Discount <> '0')
		{		
			
	?>
  <tr> 

    <td colspan="2" rowspan="5">&nbsp;</td>
    
      
		<td><font size="2" face="Arial, Helvetica, sans-serif">Discount(s)
		<?
		if($PromotionCodeID <> '')
		{
		?>
		<br>
		<em>
		Promotion Code: </em></font><em><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $PromotionCodeID; ?></font> 
		</em>
		<?
		}
		else
		{
		}
		?>
		
		</td>
    <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">-$<? echo number_format($Discount,2); ?></font></div></td>
	
		<?
		}
		else
		{
		?>
  <tr> 
		 <td colspan="2" rowspan="5">&nbsp;</td>
		 <?
		 }
		?>
	
	
  </tr>
  <tr> 
    <td><font size="2" face="Arial, Helvetica, sans-serif">Subtotal</font></td>
    <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Subtotal,2); ?></font></div></td>
  </tr>
  <tr> 
    <td><font size="2" face="Arial, Helvetica, sans-serif">Sales Tax (TX only)</font></td>
    <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Tax,2); ?></font></div></td>
  </tr>
  <tr> 
    <td><font size="2" face="Arial, Helvetica, sans-serif">Shipping Cost</font></td>
    <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($ShippingCost,2); ?></font></div></td>
  </tr>
  <tr> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
    <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($GrandTotal,2); ?></font></div></td>
  </tr>
</table>
<br>

<table width="650" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
  <tr>
    <td><p><font size="2" face="Arial, Helvetica, sans-serif">Please call us
          at<strong> <?php echo $CPhone; ?></strong> or email us at <strong><?php echo $CEmail; ?></strong> 
        if you have any questions or problems. Thank you!</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><em>-The Silent 
        Timer Team </em></strong></font></p></td>
  </tr>
</table>
<p align="center"><font size="5" face="Arial, Helvetica, sans-serif">www.SilentTimer.com</font></p>
<p align="left">
  
<DIV CLASS="PAGEBREAK"></DIV>
  
  <?
  }
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
		mysql_close($link);


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
