<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('custID'))
{
// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";


//CODE GOES BELOW-----------------------------------------------------------

	$custID = $_SESSION['custID'];
	
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
			$TypeID = $row[Type];
			$CompanyName = $row[BusinessName];
		}
		
		
	$sql2 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
	$result2 = mysql_query($sql2) or die("Cannot execute query TypeID!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$Type = $row2[Type];
		}
		
	
		if($CompanyName == "")  {  $CompanyName = "<br> ";  }
		else  {  $CompanyName = $CompanyName;  }
		
		$sql2 = "SELECT * FROM tblPurchase2 WHERE CustomerID = '$CustomerID' AND PurchaseID = '$PurchaseID'";

		$result2 = mysql_query($sql2) or die("Cannot execute query customerID!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$CustomerID = $row2[CustomerID];
			$PurchaseID = $row2[PurchaseID];
			$Discount = $row2[Discount];
			$Subtotal = $row2[Subtotal];
			$Status = $row2[Status];
			$Tax = $row2[Tax];
			$Shipped = $row2[Shipped];
			$ShippingCost = $row2[ShippingCost];
			$ShipCostID = $row2[ShipCostID];
			$ReferredByID = $row2[ReferredByID];
			$TestID = $row2[TestID];
			$InvoiceNumber = $row2[InvoiceNumber];
			$IP = $row2[IP];
			$TestDate = $row2[TestDate];
			$PONumber = $row2[PONumber];
			$Same = $row2[SameAsShip];
			$InvoiceDate = $row2[InvoiceDate];
			$Sign = $row2[SignContract];
			$Paid = $row2[Paid];
			$Notes = $row2[Notes];
			$PromotionCodeID = $row2[PromotionCodeID];
			$PaypalNumber = $row2[PaypalNumber];
			$Replacement = $row2[Replacement];
			$ReplacementType = $row2[ReplacementType];
			$AffClassID = $row2[AffClassID];
			$AffOfficeID = $row2[AffOfficeID];
			$DateTime = $row2[OrderDateTime];
			$ShipNotes = $row2[ShipNotes];
			$Preorder = $row2[Preorder];
			
			
			$TotalCost = $Subtotal + $Tax + $ShippingCost - $Discount;
			
			
					$sql5 = "SELECT * FROM tblTests WHERE TestID = '$TestID'";
					$result5 = mysql_query($sql5) or die("Cannot execute query testID!");
					
					while($row5 = mysql_fetch_array($result5))
					{
						$Test = $row5[Name];
					}
					


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
		
		if($Shipper == "")  {  $Shipper = '-';  }
		if($ShippingOption == "")  {  $ShippingOption = '-';  }
		if($PromotionCodeID == "")  {  $PromotionCodeID = '-'; }
		if($PaypalNumber == "")  {  $PaypalNumber = '-';  }
		if($ReplacementType == "")  {  $ReplacementType = '-';  }

		
?><title>Order Details</title>

<div align="right">
<div align="right"><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="orderhistory.php">Back
  to Order History Page </a></font><br>
</div>
<br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr valign="top" bgcolor="#FFFFCC"> 
      <td width="19%"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong>Order
      # : <font color="#0000FF"><?php echo $PurchaseID; ?></font></strong></font></td>
      <td width="19%"><font size="3"><strong><font color="#000000" face="Arial, Helvetica, sans-serif">Purchase
              Date: </font></strong><font color="#0000FF" face="Arial, Helvetica, sans-serif"><strong><?php echo $DateTime; ?></strong></font></font></td>
    </tr>
</table>
  <div align="left"><br>
  </div>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr bgcolor="#FFFFCC">
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Quantity</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Price</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">eBay
      Item # </font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipped?</font></strong></div></td>
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
			$ShippedDetail = $row3[Shipped];
			$Status = $row3[Status];
			$EbayItemNumber = $row3[EbayItemNumber];
			$Replacement = $row3[Replacement];
			
			
		if($EbayItemNumber == "")
		{
			$EbayItemNumber = '-';
		}
		else
		{	$EbayItemNumber = $EbayItemNumber;
		}
		
		
					$sql4 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
					$result4 = mysql_query($sql4) or die("Cannot execute query productID!");
					
					while($row4 = mysql_fetch_array($result4))
					{
						$Product = $row4[ProductName];
						$ProductNickname = $row4[Nickname];
						$Color = $row4[Color];
					}

	?>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $Product; ?></strong></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $Quantity; ?></strong></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>$<?php echo number_format($PurchasePrice,2); ?></strong></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $EbayItemNumber; ?></strong></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $Status; ?>
        <? if($Replacement == 'y'){?> 
        -
      replacement
        <? } ?>
      </strong></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $ShippedDetail; ?></strong></font></div></td>
    </tr>
	<?
	}	
	?>	
</table>
  
  


  <br>
  <div align="left">
  <table width="40%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Discount</font></strong></td>
        <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($Discount,2); ?></font></div></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Subtotal</font></strong></td>
        <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($Subtotal,2); ?></font></div></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Tax</font></strong></td>
        <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($Tax,2); ?></font></div></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipping
              </font></strong><font size="2" face="Arial, Helvetica, sans-serif">( <?php echo $Shipper; ?> - <?php echo $ShippingOption; ?> ) </font></td>
        <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($ShippingCost,2); ?></font></div></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Total</font></strong></td>
        <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($TotalCost,2); ?></font></div></td>
      </tr>
  </table>
	<? if($Preorder == "y") { 
	
	$sql9 = "SELECT * FROM tblPurchasePreorder WHERE PurchaseID = '$PurchaseID'";
	$result9 = mysql_query($sql9) or die("Cannot get preorder data");
	
	?>
	<p><font color="#00CC33" size="2" face="Arial, Helvetica, sans-serif"><b>Preorder Payment History</b></font></p>
    <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#00CC33">
      <tr>

		
        <td><div align="center"><font color="#00CC33" size="2" face="Arial, Helvetica, sans-serif"><b>Date/Time</b></font></div></td>
        <td><div align="center"><font color="#00CC33" size="2" face="Arial, Helvetica, sans-serif"><b>Amount
                Charged </b></font></div></td>
        <td><div align="center"><font color="#00CC33" size="2" face="Arial, Helvetica, sans-serif"><b>Card Type </b></font></div></td>
        <td><div align="center"><font color="#00CC33" size="2" face="Arial, Helvetica, sans-serif"><b>Last 4 </b></font></div></td>
        <td><div align="center"><font color="#00CC33" size="2" face="Arial, Helvetica, sans-serif"><b>Auth. Code </b></font></div></td>
      </tr>
	  	  	  <?
	  while($row9 = mysql_fetch_array($result9))
	  {
	  	$DateCharged = $row9[DateTime];
		$Amount = $row9[Amount];
		$CardType = $row9[CardType];
		$LastFourCr = $row9[LastFourCr];
		$BankCode = $row9[BankCode];
		$ChargeStatus = $row9[Status];
?>
      <tr<? if($ChargeStatus == "inactive" OR $ChargeStatus == "cancel") { ?> bgcolor="#CCCCCC"<? } ?>>

        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $DateCharged; ?></font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$ <?php echo number_format($Amount,2); ?><? if($ChargeStatus == "cancel") { ?> (cancelled)<? } ?></font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $CardType; ?></font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $LastFourCr; ?></font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $BankCode; ?></font></div></td>


      </tr><? } ?>
  </table><br>
	<? } ?>
	<br>
    <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr>
        <td><div align="left">
          <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Same
                Billing Address?</strong> <? echo $Same; ?></font>
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
					$OtherStateB = $row[OtherStateB];
					$ZipCode = $row[ZipB];
					$Country1 = $row[CountryIDB];
					$CardType = $row[CardType];
					$LastFourCr = $row[LastFourCr];
					$CVV2 = $row[CVV2];
					$BankCode = $row[BankCode];
					$AddressVerification = $row[AddressVerification];
					$CVV2Verification = $row[CVV2Verification];
					$IsCheck = $row[IsCheck];
					$BankName = $row[BankName];
					$RoutingNumber = $row[RoutingNumber];
					$CheckNumber = $row[CheckNumber];
					$ShipNotes = $row[ShipNotes];
				}
	
		
		
					$sql2 = "SELECT * FROM tblShipLocation WHERE LocationID = '$Country1'";
					$result2 = mysql_query($sql2) or die("Cannot execute query country!");
					
					while($row2 = mysql_fetch_array($result2))
					{
						$Country = $row2[Name];
					}
	
		?>
          </p>
        </div>
          <blockquote>
            <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $FirstName; ?> <?php echo $LastName; ?><br>
                  <?php echo $Address; ?><br>
                  <?php echo $City; ?>, <?php echo $State; ?> <?php echo $ZipCode; ?><br>
                  <?php echo $Country; ?></font></p>
        </blockquote>
		
		<?
		}
		?>
		
		</td>
		
        <td>
		
		<?
		
		$sql = "SELECT * FROM tblPurchase2 WHERE PurchaseID = '$PurchaseID'";
				$result = mysql_query($sql) or die("Cannot execute query billing address!");
				
				while($row = mysql_fetch_array($result))
				{
					
					$FirstName = $row[FirstNameB];
					$LastName = $row[LastNameB];
					$Address = $row[AddressB];
					$City = $row[CityB];
					$State = $row[StateB];
					$OtherStateB = $row[OtherStateB];
					$ZipCode = $row[ZipB];
					$Country1 = $row[CountryIDB];
					$CardType = $row[CardType];
					$LastFourCr = $row[LastFourCr];
					$CVV2 = $row[CVV2];
					$BankCode = $row[BankCode];
					$AddressVerification = $row[AddressVerification];
					$CVV2Verification = $row[CVV2Verification];
					$IsCheck = $row[IsCheck];
					$BankName = $row[BankName];
					$RoutingNumber = $row[RoutingNumber];
					$CheckNumber = $row[CheckNumber];
					$ShipNotes = $row[ShipNotes];
				}
				
		if($CVV2Verification == '')
		{
		$CVV2Verification = '-';
		}
		else
		{
		$CVV2Verification = $CVV2Verification;
		}
		
		
		
		if($AddressVerification == '')
		{
		$AddressVerification = '-';
		}
		else
		{
		$AddressVerification = $AddressVerification;
		}
		
		if($BankCode == '')
		{
		$BankCode = '-';
		}
		else
		{
		$BankCode = $BankCode;
		}
		
		
		if($CardType == '')
		{
		$CardType = '-';
		}
		else
		{
		$CardType = $CardType;
		}
		
		
		
		if($LastFourCr == '')
		{
		$LastFourCr = '-';
		}
		else
		{
		$LastFourCr = $LastFourCr;
		}
		
		
		if($BankName == '')
		{
		$BankName = '-';
		}
		else
		{
		$BankName = $BankName;
		}
		
		if($RoutingNumber == '')
		{
		$RoutingNumber = '-';
		}
		else
		{
		$RoutingNumber = $RoutingNumber;
		}
		
		if($CheckNumber == '')
		{
		$CheckNumber = '-';
		}
		else
		{
		$CheckNumber = $CheckNumber;
		}
		
		if($EbayItemNumber == '')
		{
		?>
	      <font size="1" face="Arial, Helvetica, sans-serif"><a href="http://www.paypal.com" target="_blank"><br>
	      </a></font><font size="2" face="Arial, Helvetica, sans-serif"><strong>PayPal
	      Transaction Number:</strong> <?php echo $PaypalNumber; ?><br>
          </font>		    <?
		}
		else
		{
		
					if($IsCheck == 'n')
					{
					?>
					
					<table width="100%"  border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Card Type:</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $CardType; ?></font></td>
          </tr>
          <tr>
            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Last Four
            Digits: </font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $LastFourCr; ?></font></td>
          </tr>
          <tr>
            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Authorization
                  Code : </font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $BankCode; ?></font></td>
          </tr>
        </table>
		<font size="2" face="Arial, Helvetica, sans-serif">          <?
					}
					else
					{
					?>
          </font>
		<table width="100%"  border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Bank Name: </font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $BankName; ?></font></td>
          </tr>
          <tr>
            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Routing Number:</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $RoutingNumber; ?></font></td>
          </tr>
          <tr>
            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Check #: </font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $CheckNumber; ?></font></td>
          </tr>
        </table>		
		<?
					}
					?><?
		
		}
		?>
		</td>
      </tr>
    </table>
  <p><font size="3" face="Arial, Helvetica, sans-serif"><strong><font size="2">Optional
         Information</font>:</strong></font>  </p>
</div>
  <div align="left">
    <table width="60%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr> 
        <td><font size="2" face="Arial, Helvetica, sans-serif">Referred By:</font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ReferredBy; ?>&nbsp;</font></td>
      </tr>
      <tr> 
        <td><font size="2" face="Arial, Helvetica, sans-serif">Test:</font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Test; ?>&nbsp;</font></td>
      </tr>
      <tr> 
        <td><font size="2" face="Arial, Helvetica, sans-serif">Test Date:</font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $TestDate; ?>&nbsp;</font></td>
      </tr>
      <tr>
        <td><font size="2" face="Arial, Helvetica, sans-serif">Paid?</font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Paid; ?></font></td>
      </tr>
      <tr>
        <td><font size="2" face="Arial, Helvetica, sans-serif">Promotion Code ID: </font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $PromotionCodeID; ?></font></td>
      </tr>
    </table>
  <font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
  </strong></font>
</div>
  <div align="left">
  <hr align="left" width="650">
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
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

            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customerservice/index.php'>
<?
}
?>