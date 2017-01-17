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

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

//CODE GOES BELOW-----------------------------------------------------------
?>

<?
	# get CustomerID from previous page
	$PurchaseID = $_GET['purch'];
	$CustomerID = $_GET['cust'];

	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
	$result = mysql_query($sql) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result))
		{
			$CustomerID = $row[CustomerID];
			$FirstName = $row[FirstName];
			$LastName = $row[LastName];
			$Phone = $row[Phone];
			$Email = $row[Email];
			$Type = $row[Type];
			$CompanyName = $row[BusinessName];
		}
	
		if($Email == "")
		{
			$Email = "n/a";
		}
		else
		{	$Email = $Email;
		}
		
		if($Phone == "")
		{
			$Phone = "n/a";
		}
		else
		{	$Phone = $Phone;
		}
		
		if($CompanyName == "")
		{
			$CompanyName = "<br> ";
		}
		else
		{
			$CompanyName = $CompanyName;
		}
		
		$sql2 = "SELECT * FROM tblPurchase2 WHERE CustomerID = '$CustomerID' AND PurchaseID = '$PurchaseID'";
		$result2 = mysql_query($sql2) or die("Cannot execute query customerID!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$CustomerID = $row2[CustomerID];
			$PurchaseID = $row2[PurchaseID];
			$Discount = $row2[Discount];
			$Subtotal = $row2[Subtotal];
			//$TotalCost = $row2[TotalCost];
			$Status = $row2[Status];
			$Tax = $row2[Tax];
			
			$ShippingCost = $row2[ShippingCost];
			$ShipCostID = $row2[ShipCostID];
			$ReferredByID = $row2[ReferredByID];
			$TestID = $row2[TestID];
			
			$IP = $row2[IP];
			$TestDate = $row2[TestDate];
			
			$Same = $row2[SameAsShip];
			
			$Sign = $row2[SignContract];
			
			$Notes = $row2[Notes];
			
			$PaypalNumber = $row2[PaypalNumber];
			$Replacement = $row2[Replacement];
			$ReplacementType = $row2[ReplacementType];
			$AffClassID = $row2[AffClassID];
			$AffOfficeID = $row2[AffOfficeID];
			$DateTime = $row2[OrderDateTime];
	
			
			$TotalCost = $Subtotal + $Tax + $ShippingCost - $Discount;
			
			
					$sql5 = "SELECT * FROM tblTests WHERE TestID = '$TestID'";
					$result5 = mysql_query($sql5) or die("Cannot execute query testID!");
					
					while($row5 = mysql_fetch_array($result5))
					{
						$Test = $row5[Name];
					}
					
					
					
					
					/*$sql6 = "SELECT * FROM tblShippingOption WHERE ShippingOptionID = '$ShippingOption'";
					$result6 = mysql_query($sql6) or die("Cannot execute query testID!");
					
					while($row6 = mysql_fetch_array($result6))
					{
						$ShippingOptionName = $row6[Name];
					}
					*/
					
					$sql6 = "SELECT * FROM tblReferredBy WHERE ReferredByID = '$ReferredByID'";
					$result6 = mysql_query($sql6) or die("Cannot execute query ReferredByID!");
					
					while($row6 = mysql_fetch_array($result6))
					{
						$ReferredBy = $row6[Name];
					}
					
					
					$sql7 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID'";
					$result7 = mysql_query($sql7) or die("Cannot execute query ShipCostID!");
					
					while($row7 = mysql_fetch_array($result7))
					{
						$ShipperID = $row7[ShipperID];
						$ShippingOptionID = $row7[ShippingOptionID];
						
							$sql8 = "SELECT * FROM tblShipper WHERE ShipperID = '$ShipperID'";
							$result8 = mysql_query($sql8) or die("Cannot execute query ShipperID!");
							
							while($row8 = mysql_fetch_array($result8))
							{
							$Shipper = $row8[CompanyName];
							}
							
							$sql9 = "SELECT * FROM tblShippingOption2 WHERE ShippingOptionID = '$ShippingOptionID'";
							$result9 = mysql_query($sql9) or die("Cannot execute query ShippingOptionID!");
							
							while($row9 = mysql_fetch_array($result9))
							{
							$ShippingOption = $row9[ShippingOption];
							}

						
					}
					
		
		
		
		
			}
		
		
		if($Shipper == "")
		{
			$Shipper = 'n/a';
		}
		else
		{	$Shipper = $Shipper; }
		
		
		
		if($ShippingOption == "")
		{
			$ShippingOption = 'n/a';
		}
		else
		{	$ShippingOption = $ShippingOption; }
		
		
		if($PromotionCodeID == "")
		{
			$PromotionCodeID = 'n/a';
		}
		else
		{	$PromotionCodeID = $PromotionCodeID; }
		
		
		if($EbayItemNumber == "")
		{
			$EbayItemNumber = 'n/a';
		}
		else
		{	$EbayItemNumber = $EbayItemNumber; }

		
		if($PaypalNumber == "")
		{
			$PaypalNumber = 'n/a';
		}
		else
		{	$PaypalNumber = $PaypalNumber; }
		
		
		if($Notes == "")
		{
			$Notes = 'none';
		}
		else
		{	$Notes = $Notes; }
		
		
		if($ReplacementType == "")
		{
			$ReplacementType = 'n/a';
		}
		else
		{	$ReplacementType = $ReplacementType; }
		

		if($AffClassID == "")
		{
			$AffClassID = 'n/a';
		}
		else
		{	$AffClassID = $AffClassID; }
		
		
		if($AffOfficeID == "")
		{
			$AffOfficeID = 'n/a';
		}
		else
		{	$AffOfficeID = $AffOfficeID; }
		
		
		if($IP == "")
		{
			$IP = 'n/a';
		}
		else
		{	$IP = $IP; }
		
		
	
		
?>

<div align="right">
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">Contact
            Information</a> | <a href="PurchaseHistory.php?cust=<? echo $CustomerID; ?>">Purchase
      History</a></font>
</p>
<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFCC">
    <tr>
      <td><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong><?php echo $CompanyName; ?></strong></font></td>
      <td><div align="left"><font color="#FF0000" size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $FirstName; ?> <? echo $LastName; ?></strong></font></div></td>
      <td><div align="right"><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"><strong><?php echo $Type; ?></strong></font></div></td>
      <td width="10%">&nbsp;</td>
    </tr>
</table>
  <br>
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr> 
      <td width="19%"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Purchase
              ID: <font color="#FF0000"><?php echo $PurchaseID; ?></font></font></strong></font></td>
      <td width="38%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Date/Time: </font></strong><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $DateTime; ?></strong></font></td>
      <td width="43%"><font size="2" face="Arial, Helvetica, sans-serif"><a href="PurchaseEdit.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>"><strong>Edit
            Purchase Information </strong></a> <br>
      (test info, referrals, total cost, tax,
etc)</font></td>
    </tr>
  </table>
  <div align="left"></div>
  <br>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Product ID </font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Quantity</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Price</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Paid</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipped?</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Edit</font></strong></div></td>
    </tr>
    <tr>
	
	<?
	
	
	$sql3 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID'";

	$result3 = mysql_query($sql3) or die("Cannot execute query purchase product!");
		
		
		while($row3 = mysql_fetch_array($result3))
		{
			$Quantity = $row3[Quantity];
			$ProductID = $row3[ProductID];
			$DetailID = $row3[DetailID];
			$PurchasePrice = $row3[PurchasePrice];
			//$Shipped = $row3[Shipped];
			//$Paid = $row3[Paid];
			//$PromotionCodeID = $row3[PromotionCodeID];
			$Status = $row3[Status];
		
		
		
					$sql4 = "SELECT * FROM tblProduct WHERE ProductID = '$ProductID'";
					$result4 = mysql_query($sql4) or die("Cannot execute query productID!");
					
					while($row4 = mysql_fetch_array($result4))
					{
						$Product = $row4[ProductName];
						//$UnitCost = $row4[Price];
					}
		
		
	
			
	
	?>
	
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ProductID; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Product; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Quantity; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($PurchasePrice,2); ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Paid; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Status; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Shipped; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="PurchaseProductEdit.php?pp=<? echo $PurchaseProductID; ?>&prod=<? echo $ProductID; ?>&cust=<? echo $CustomerID; ?>">Edit</a></font></div></td>
    </tr>
	<?
	
	
	
	}
	

	
	?>
	
	
	
  </table>
  <div align="left">  </div>
  <div align="left">
    <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping Option:</strong> <?php echo $Shipper; ?> - <?php echo $ShippingOption; ?><br>
        <font size="1">&gt; <a href="ShippingHistory.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">SHIPPING
HISTORY FOR THIS PURCHASE</a></font></font></p>
    <table width="40%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Discount</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($Discount,2); ?></font></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Subtotal</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($Subtotal,2); ?></font></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Tax</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($Tax,2); ?></font></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipping</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($ShippingCost,2); ?></font></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Total</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($TotalCost,2); ?></font></td>
      </tr>
    </table>
    <br>
    <hr align="left" width="650">
    <font size="2" face="Arial, Helvetica, sans-serif"><strong>Same Billing Address?</strong> <?php echo $Same; ?></font>
    <?
  
  	if($Same == 'n')
	{
	
				$sql = "SELECT * FROM tblPurchase2 WHERE PurchaseID = '$PurchaseID'";
				$result = mysql_query($sql) or die("Cannot execute query billing address!");
				
				while($row = mysql_fetch_array($result))
				{
					
					$FirstName = $row[FirstNameB];
					$LastName = $row[LastNameB];
					$Address = $row[AddressB];
					$City = $row[CityB];
					$State = $row[StateB];
					$StateOther = $row[OtherStateB];
					$ZipCode = $row[ZipB];
					$Country1 = $row[CountryIDB];
					

				}
	
		
		
					$sql2 = "SELECT * FROM tblShipLocation WHERE LocationID = '$Country1'";
					$result2 = mysql_query($sql2) or die("Cannot execute query country!");
					
					while($row2 = mysql_fetch_array($result2))
					{
						$Country = $row2[Name];
					}
	
		?>
</div>
  <blockquote>
    <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $FirstName; ?> <?php echo $LastName; ?><br>
      <?php echo $Address; ?><br>
        <?php echo $City; ?>, <?php echo $State; ?> <?php echo $ZipCode; ?><br>
        <?php echo $Country; ?></font>
      
    <?
	
	}
	
	else
	{
		
	
	}
	?>
      </font>
    </p>
  </blockquote>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="PurchaseDetailsEdit.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>"><strong>Edit
  Purchase Details</strong></a><br>
  (credit card info, billing address, etc)</font> </p>
  <hr align="left" width="650">
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>For eBay/Amazon Customers:</strong></font>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">eBay Item
  Number: <?php echo $EbayItemNumber; ?><br>
  </font><font size="2" face="Arial, Helvetica, sans-serif">PayPal Transaction
    Number: <?php echo $PaypalNumber; ?></font></p>
  <hr align="left" width="650">
  <div align="left"><br>
      <font size="3" face="Arial, Helvetica, sans-serif"><strong><font size="2">Optional
         Information</font>:
        </strong></font>
    <table width="50%" border="1" cellpadding="5" cellspacing="0">
      <tr> 
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Referred By:</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ReferredBy; ?>&nbsp;</font></td>
      </tr>
      <tr> 
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Test:</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Test; ?>&nbsp;</font></td>
      </tr>
      <tr> 
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Test Date:</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $TestDate; ?>&nbsp;</font></td>
      </tr>
    </table>
  <font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
  Miscellaneous
  Information:</strong></font></div>
  <div align="left">
    <table width="75%" border="1" cellpadding="5" cellspacing="0">
      <tr> 
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">IP Address</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $IP; ?>&nbsp;</font></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Sign Contract?</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Sign; ?></font></td>
      </tr>
      <tr> 
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Affiliate Class ID</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $AffClassID; ?></font></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Affiliate Office 
          ID</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $AffOfficeID; ?></font></td>
      </tr>
      <tr> 
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Replacement?</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Replacement; ?></font></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Replacement Type</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ReplacementType; ?></font></td>
      </tr>
    </table>

    <br>
    <table width="75%" border="1" cellpadding="5" cellspacing="0">
    <tr>
      <td><p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase
              Notes:</strong></font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Notes; ?>&nbsp;</font></p></td>
    </tr>
  </table>
  <br>  
  <hr align="left" width="650">
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="ClaimAdd.php?cust=<? echo $CustomerID; ?>&purch=<? echo $PurchaseID; ?>">Make 
    a claim</a></font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="CustomerPurchaseAddRepl.php?cust=<? echo $CustomerID; ?>">Ship
  a replacement</a></font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="mailto:<? echo $Email; ?>">Send 
    an email</a></font></p>
</div>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
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