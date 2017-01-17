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


		function escapeQuote($var)
		{
			if (isset($var))
			{
				$string = str_replace("'","\'",$var);
				$string = str_replace('"','\"',$string);
			}
		
			return $string;
		}  


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$PurchaseID = $_GET['purch'];

	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


?><HEAD>
<TITLE>Packing Lists & Retail Lists</TITLE>
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
			//echo $sql55;
			
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
				
		$sql22 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
		$result22 = mysql_query($sql22) or die("Cannot retrieve company info, please try again.");
		while($row22 = mysql_fetch_array($result22))
		{
			$Type = $row22['Type'];
		}
	
	if($State == "ZZ")	{$State = $StateOther;}
	if($Phone == '') {$Phone = 'n/a';}
	if($Email == '')  {$Email = 'n/a';}
	
	
	$sql = "SELECT DATE_FORMAT(OrderDateTime, '%m/%d/%y') AS DateTime, Subtotal, Discount, Paid, ShipCostID, 
	ShippingCost, PaypalNumber, Tax, FirstNameB, LastNameB, AddressB, CityB, StateB, OtherStateB, CountryIDB,
	CardType, LastFourCr, ZipB, PromotionCodeID, IsCheck, InvoiceNumber, PONumber
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
				$bCountryID = $row['CountryIDB'];
				$PaymentType = $row['CardType'];
				$Last4 = $row['LastFourCr'];
				$PromotionCodeID = $row['PromotionCodeID'];
				$ShippingCost = $row['ShippingCost'];
				$IsCheck = $row['IsCheck'];
				$InvoiceNumber = $row['InvoiceNumber'];
				$PONumber = $row['PONumber'];
			}
			
			
			
			$sql5 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID'";
			$result5 = mysql_query($sql5) or die("Cannot retrieve purchase info, please try again.");
			
			while($row5 = mysql_fetch_array($result5))
			{
				$ListingID = $row5['EbayItemNumber'];
				$Replacement = $row5['Replacement'];
			}
			
			if($Replacement == 'y')	{$Type = "replacement";	}
			
			if ($bFirstName == "")	{$bFirstName = $FirstName;}
			if ($bLastName == "")	{$bLastName = $LastName;}
			if ($bCity == "")	{$bCity = $City;}
			if ($bState == "")  {$bState = $State;}
			if($bState == "ZZ")  	{$bState = $bStateOther;}
			if ($bZipCode == "0" OR $bZipCode == '')	{$bZipCode = $ZipCode;}
			if ($bCountryID == 0 OR $bCountryID == "$CountryID") 
			{ $bCountry = $Country; 
			$bCountryID = $CountryID;	}
			
			if($PONumber == "") { $PONumber = "n/a"; }
			if($InvoiceNumber == "") { $InvoiceNumber = "n/a"; }
			
			$Last4Length = strlen($Last4);
			
			if($Last4Length == 3) { $Last4 = "0" .$Last4; }
			if($Last4Length == 2) { $Last4 = "00" .$Last4; }
			if($Last4Length == 1) { $Last4 = "000" .$Last4; }
			
			if ($Last4 == "")	{$Last4 = 'n/a';}

			
			if($PaymentType == '')  {$PaymentType = 'n/a';}
			
			if($IsCheck == "y") { $PaymentType = 'electronic check'; }
					
			if($Paid1 == 'y') {$Paid = 'yes';}
			else
			{$Paid = 'no';}

			if($ListingID == '')	{$ListingID = 'n/a';}
			if ($PaypalNumber == '')	{$PaypalNumber = 'n/a';}


			$sql9 = "SELECT DATE_FORMAT(EndDate, '%m/%d/%y') AS EndDate FROM tblPromotionCode WHERE PromotionCodeID = '$CustomerID' AND Type = 'friend'";
			$result9 = mysql_query($sql9) or die("Cannot get promo code end date");
			
			while($row9 = mysql_fetch_array($result9))
			{
				$EndDate = $row9[EndDate];
			}

			
			
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
	
	
		$sql23 = "SELECT * FROM tblShipLocation WHERE LocationID = '$CountryID'";
		$result23 = mysql_query($sql23) or die("Cannot execute query countryID!");
		
		while($row23 = mysql_fetch_array($result23))
		{
			$Country = $row23[Name];
			
			
				if($CountryID == '225' OR $CountryID == '242' OR $CountryID == '243')
				{$Country = "United States";
				$bCountry = "United States";}
		}
		
		if($bCountryID > 0)
		{

				$sql233 = "SELECT * FROM tblShipLocation WHERE LocationID = '$bCountryID'";
				//echo $sql233;
				$result233 = mysql_query($sql233) or die("Cannot execute query bcountryID!");
				
				while($row233 = mysql_fetch_array($result233))
				{
					$bCountry = $row233[Name];
					
					
						if($bCountryID == '225' OR $bCountryID == '242' OR $bCountryID == '243')
						{$bCountry = "United States";}
				}
		
		}
		
		if($bCountryID == $CountryID OR $bCountryID == 0) { $bCountry == $Country; }


if($TypeID <> "6")
{
?>

<title>Customer Packing List</title>

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
    <td width="50%" bgcolor="#CCCCCC"><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipping
      Address : </font></strong></td>
    <td width="50%" bgcolor="#CCCCCC"><strong><font size="2" face="Arial, Helvetica, sans-serif">Billing
      Address : </font></strong></td>
  </tr>
  <tr> 
  
  
    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">
	
	  <? if($BusinessName <> '') { ?><br><? echo $BusinessName; ?></font><? } ?>
      <? if($FirstName <> '') { ?><br>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font>      <? } ?> <? if($LastName <> '') { ?>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font>      <? } ?>
      <font size="2" face="Arial, Helvetica, sans-serif"><br>
      <? echo $Address; ?></font>
      <? if($Address2 <> '') { ?><font size="2" face="Arial, Helvetica, sans-serif"><br><? echo $Address2; ?></font><? } ?>
      <font size="2" face="Arial, Helvetica, sans-serif"><br><? echo $City; ?></font>, <font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font><font size="2" face="Arial, Helvetica, sans-serif">
      <? if($Country <> 'United States') { ?><br><? echo $Country; ?></font><? } ?><p></p>
    
	
	</font></td>
    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">	
	
	  <? if($BusinessName <> '') { ?><br><? echo $BusinessName; ?></font><? } ?>
      <? if($FirstName <> '') { ?><br>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font>      <? } ?> <? if($LastName <> '') { ?>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font>      <? } ?>
      
	  <? if($bAddress == "") { ?>
	  <font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <? echo $Address; ?></font>
      <? if($Address2 <> '') { ?><font size="2" face="Arial, Helvetica, sans-serif"><br><? echo $Address2; ?></font><? } ?>
	  <? }
	  else
	  {
	  ?>
	  <font size="2" face="Arial, Helvetica, sans-serif"><br><? echo $bAddress; ?></font>
	  <?
	  }
      ?>
	  <font size="2" face="Arial, Helvetica, sans-serif"><br><? echo $bCity; ?></font>, <font size="2" face="Arial, Helvetica, sans-serif"><? echo $bState; ?></font> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $bZipCode; ?></font>      <font size="2" face="Arial, Helvetica, sans-serif">
      <? if($bCountry <> 'United States') { ?><br><? echo $bCountry; ?></font><? } ?><p></p>

	  

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
  
  $sql57 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Status = 'active' AND Shipped = 'n'";
			$result57 = mysql_query($sql57) or die("Cannot execute purch details 2!");
			
			while($row57 = mysql_fetch_array($result57))
			{
			$ProductID = $row57['ProductID'];
			$Quantity = $row57['Quantity'];
			$PurchasePrice = $row57['PurchasePrice'];
			
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

    <td colspan="2" rowspan="5"><p align="center"><u><font size="5" face="Times New Roman, Times, serif"><strong><em>Get
                your order for FREE! </em></strong></font></u></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Your referral promotion
          code is <? echo $CustomerID; ?> and
        is valid through <? echo $EndDate; ?>. Give this promotion code to your
        friends, and they will receive 5% off of their entire order. If 5 friends
      purchase items, then you get your order for FREE!</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Log in to your account
      at <u>http://www.silenttimer.com/customerservice/</u> for more information.</font></p></td>
    
      
		<td><font size="2" face="Arial, Helvetica, sans-serif">Discount(s)
		<?
		if($PromotionCodeID <> '')
		{
		?>
		<br>
		<em>
		<font size="1">Promotion Code: </font></em></font><font color="#000000" size="1" face="Arial, Helvetica, sans-serif"><em><? echo $PromotionCodeID; ?></em></font> 
		
		<?
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

<?
}
else #packing list for bulk orders
{
?>

<title>Bulk Order Packing List</title>

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
<table width="325" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td width="50%" bgcolor="#CCCCCC"><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipping
      Address : </font></strong></td>
  </tr>
  <tr> 
  
  
    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">
	
	  <? if($BusinessName <> '') { ?><br><? echo $BusinessName; ?></font><? } ?>
      <? if($FirstName <> '') { ?><br>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font>      <? } ?> <? if($LastName <> '') { ?>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font>      <? } ?>
      <font size="2" face="Arial, Helvetica, sans-serif"><br>
      <? echo $Address; ?></font>
      <? if($Address2 <> '') { ?><font size="2" face="Arial, Helvetica, sans-serif"><br><? echo $Address2; ?></font><? } ?>
      <font size="2" face="Arial, Helvetica, sans-serif"><br><? echo $City; ?></font>, <font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font><font size="2" face="Arial, Helvetica, sans-serif">
      <? if($Country <> 'United States') { ?><br><? echo $Country; ?></font><? } ?><p></p>
    
	
	</font></td>
  </tr>
</table>
<br>
<hr noshade>
<br>
<table width="650" border="1" cellpadding="3" cellspacing="0" bordercolor="#000000">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Order Date:</font></td>
    <td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $PurchaseDate; ?></font></div></td>
  </tr>
  <tr>
    <td width="25%"><font size="2" face="Arial, Helvetica, sans-serif">PO Number:</font></td>
    <td width="25%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $PONumber; ?></font></div></td>
  </tr>
  <tr>
    <td width="25%" height="29"><font size="2" face="Arial, Helvetica, sans-serif">Invoice
    #: </font></td>
    <td width="25%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $InvoiceNumber; ?></font></div></td>
  </tr>
</table>
<br>
<table width="650" border="1" cellpadding="3" cellspacing="0" bordercolor="#000000">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Shipper:</font></td>
    <td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Shipper; ?><br>
      </font></div></td> 
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Shipment Method:</font></td>
    <td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $ShippingOption; ?></font></div></td>
  </tr>
  <tr> 
    <td width="25%"><font size="2" face="Arial, Helvetica, sans-serif">Shipment 
      Date:</font></td>
    <td width="25%"> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Now; ?></font></div></td>
  </tr>
</table>
<br>
<br>
<table width="650" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
  <tr bgcolor="#CCCCCC"> 
    <td> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Description</font></strong></div></td>
    <td width="28"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Qty
            Ordered </font></strong></div></td>
    <td width="28"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Qty
            Shipped</font></strong></div></td>
    <td width="141"> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Unit 
        Price</font></strong></div></td>
    <td width="66"> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Amount</font></strong></div></td>
  </tr>
  
    <?
  
  $sql57 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Status = 'active' AND Shipped = 'n'";
			$result57 = mysql_query($sql57) or die("Cannot execute purch details 2!");
			
			while($row57 = mysql_fetch_array($result57))
			{
			$ProductID = $row57['ProductID'];
			$Quantity = $row57['Quantity'];
			$PurchasePrice = $row57['PurchasePrice'];
			
						$sql6 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
						$result6 = mysql_query($sql6) or die("Cannot execute product info!");
						
						while($row6 = mysql_fetch_array($result6))
						{
						$ProductName = $row6['ProductName'];
			
			
			$ProductPrice = $PurchasePrice * $Quantity;
						
?>
  <tr valign="top">
    <td height="37"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ProductName; ?></font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Quantity; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Quantity; ?></font></div></td>
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

    <td colspan="3" rowspan="5"><p align="center">&nbsp;</p>
    </td>
    
      
		<td><font size="2" face="Arial, Helvetica, sans-serif">Discount(s)
		<?
		if($PromotionCodeID <> '')
		{
		?>
		<br>
		<em>
		<font size="1">Promotion Code: </font></em></font><font color="#000000" size="1" face="Arial, Helvetica, sans-serif"><em><? echo $PromotionCodeID; ?></em></font> 
		
		<?
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
    <td><font size="2" face="Arial, Helvetica, sans-serif">Shipping Cost</font></td>
    <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($ShippingCost,2); ?></font></div></td>
  </tr>
  <tr> 
    <td colspan="1"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
    <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($GrandTotal,2); ?></font></div></td>
  </tr>
</table>
<?
}
?>

<DIV CLASS="PAGEBREAK"></DIV>
  
<?

if($TypeID <> '6' AND $TypeID <> '5')
{

///////////////////////////Now for the corresponding retail list
  
  
 		$zipOne = $ZipCode;

		$Radius = 10;
		$StoreClose = "n";
		
		//echo "<br><br>Radius = " .$Radius;
	
		include_once ("../../include/db_mysql.inc");
		include_once ("../../include/phpZipLocator.php");
		
		$db = new db_sql;
		$zipLoc = new zipLocator;
		$radius = $Radius;
		
		$zipArray = $zipLoc->inradius($zipOne,$radius);

		for($i=1;$i < count($zipArray);$i++)
		{
			$sql6 = "SELECT * FROM tblBusinessCustomer WHERE ZipCode= '$zipArray[$i]' AND CustomerType = 'Bookstore' AND Status = 'active'";
			
			$result6 = mysql_query($sql6) or die("Cannot pull Store Locations.  Please try again.");		
			$NumStores = mysql_num_rows($result6);
			
			while($row6 = mysql_fetch_array($result6))
			{
				$StoreClose = "y";
			}

//echo "<br><br>Store Close? " .$StoreClose;

?> 

<? if($StoreClose == "y"){?>


<table width="650" border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td><div align="center"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Stores 
        Near You That Sell <em><font color="#000000">The Silent Timer&#8482;</font></em></strong></font></div></td>
  </tr>
</table>

<table width="650" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><? echo $FirstName;?></font>, 
        <font size="3">you live near  a store that sells our timer!</font></strong> 
         <br>
        Tell your friends where they can find The Silent Timer&#8482;.</font></div></td>
  </tr>
</table>
<br>
<table width="650" border="0" cellpadding="8" cellspacing="0">
  <?	
  

		$now = date("Y-m-d H:i:s");
		$IP = $_SERVER["REMOTE_ADDR"];

  
		require "../include/dbinfo.php";  	
  		
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database1");
  
		$db = new db_sql;
		$zipLoc = new zipLocator;
		$radius = $Radius;
		
		$zipArray = $zipLoc->inradius($zipOne,$radius);
		
		for($i=1;$i < count($zipArray);$i++)
		{
			$sql8 = "SELECT * FROM tblBusinessCustomer WHERE ZipCode= '$zipArray[$i]' AND CustomerType = 'Bookstore' AND Status = 'active'";
			//echo "<br>sql8 = " .$sql8;
			$result8 = mysql_query($sql8) or die("Cannot pull Store Locations.  Please try again.");		
			
			$NumStores2 = mysql_num_rows($result8);
			while($row8 = mysql_fetch_array($result8))
			{
				$BusinessCustomerIDS = $row8[BusinessCustomerID];
				$NameS = escapeQuote($row8[Name]);
				$AddressS = escapeQuote($row8[Address]);
				$Address2S = escapeQuote($row8[Address2]);
				$Address3S = escapeQuote($row8[Address3]);
				$CityS = $row8[City];
				$StateS = $row8[State];
				$ZipCodeS = $row8[ZipCode];
				$PhoneS = $row8[Phone1];
				$WebsiteS = $row8[Website];
				$Chain = $row8[Chain];
				
				$db = new db_sql;
				$zipDistance = new zipLocator;

				$distance = number_format($zipDistance->distance($zipOne,$ZipCodeS),2);

				if($distance == 0)	{  $distance = 0;  }
				
				
				#insert information into tblDistance
				$sql25 = "INSERT INTO tblDistance(BusinessCustomerID, Name, Address, Address2, Address3, City, State, ZipCode, Phone, Website, Chain, Rebate, DateTime, IP, ZipCodeSearch, Distance)
				VALUES('$BusinessCustomerIDS', '$NameS', '$AddressS', '$Address2S', '$Address3S', '$CityS', '$StateS', '$ZipCodeS', '$PhoneS',
				'$WebsiteS', '$Chain', '$Rebate', '$now', '$IP', '$zipOne', '$distance');";
				
				//echo "<br>" .$sql25;
				
				$result25 = mysql_query($sql25) or die("Cannot insert into tblDistance");
				
			}
			}

				//$k =0;
				
		#recall information from tblDistance but sort by Distance
				$sql36 = "SELECT * FROM tblDistance WHERE DateTime = '$now' AND IP = '$IP' AND ZipCodeSearch = '$zipOne' ORDER BY Distance ASC";
				//echo "<br><br>" .$sql36;
				$result36 = mysql_query($sql36) or die("Cannot pull distances.  Please try again.");		

				$NumStores = mysql_num_rows($result36);
				
				
				//echo "<br>Number of stores = " .$NumStores;
				
			for($k=0;$k<=7;$k++)
		{
				
			
				while($row36 = mysql_fetch_array($result36))
				{
			
					$array[$j][0] = $row36[Name];
					$array[$j][1] = $row36[Address];
					$array[$j][2] = $row36[Address2];
					$array[$j][3] = $row36[Address3];
					$array[$j][4] = $row36[City];
					$array[$j][5] = $row36[State];
					$array[$j][6] = $row36[ZipCode];
					$array[$j][7] = $row36[Phone];
					$array[$j][8] = $row36[Website];
					$array[$j][9] = $row36[Chain];
					$array[$j][10] = $row36[BusinessCustomerID];
					$array[$j][11] = $row36[Rebate];
					$array[$j][12] = $row36[Distance];
			
					$k = $k + 1;
				
				//if($NumStores == 1) { $k = 1; }
				
					//echo "<br><br>k = " .$k;
					
					
					
		if($k<=7)
		{					
					
 ?>
  <tr>
  

  
    <td width="400"> <p> <font size="2" face="Arial, Helvetica, sans-serif"> <strong> 
        <font color="#666666" size="3"> <font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><? if($array[$j][9] <> "") { ?><? echo $array[$j][9];?></font> - <? } ?><font color="#000000"><? echo $array[$j][0];?></font><br>
        </font> </strong> <? echo $array[$j][1];?><br>
        <? if($array[$j][2]  != ""){echo $array[$j][2];?><br><? }?>
        <? if($array[$j][3] != ""){echo $array[$j][3];?><br><? }?>
        <? echo $array[$j][4];?>, <? echo $array[$j][5];?> <? echo $array[$j][6];?><br>
        <strong><? echo $array[$j][7];?></strong><br>
        </font></p>
      
    </td>
	<?
}
}#end of while statement for k

}#end of while statement for data


		$sql45 = "DELETE FROM tblDistance WHERE DateTime = '$now' AND IP = '$IP' AND ZipCodeSearch = '$zipOne'";
		//echo "<br>sql45 = " .$sql45;
		$result45 = mysql_query($sql45) or die("Cannot delete");
		
  ?>

</table>

<table width="650" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><p align="center"><font size="2" face="Arial, Helvetica, sans-serif">Thank 
        you for shopping with us. Good luck on your test!!!<br>
        </font><font size="2" face="Arial, Helvetica, sans-serif"><strong>Call 
        us at 1-800-552-0325 or email us at info@silenttimer.com if you have any 
        questions!</strong></font></p>
    </td>
  </tr> 
</table>
<DIV CLASS="PAGEBREAK"></DIV>

<?
}
		


}

 }# end of store being close
 
 } #end of looping through customers

  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
		mysql_close($link);


// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
