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
			$TypeID = $row[Type];
			$CompanyName = $row[BusinessName];
		}
		
	$sql5 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
	$result5 = mysql_query($sql5) or die("Cannot execute query TypeID!");
		
	while($row5 = mysql_fetch_array($result5))
	{
		$Type = $row5[Type];
	}
		
		if($CompanyName == "")  {  $CompanyName = "<br> ";  }
		
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
			$Preordered = $row2[Preordered];
			
			//echo "same= " .$Same;
			
			$TotalCost = $Subtotal + $Tax + $ShippingCost - $Discount;
			
			
					$sql66 = "SELECT * FROM tblTests WHERE TestID = '$TestID'";
					$result66 = mysql_query($sql66) or die("Cannot execute query testID!");
					
					while($row66 = mysql_fetch_array($result66))
					{
						$Test = $row66[Name];
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
		if($PromotionCodeID == "") { $PromotionCodeID = "-"; }
		if($PaypalNumber == "")  {  $PaypalNumber = '-';  }
		if($Notes == "")  {  $Notes = '-';  }
		if($ShipNotes == "")  {  $ShipNotes = '-';  }
		if($IP == "")  {  $IP = '-';  }
		if($PONumber == "")  {  $PONumber = '-';  }
		if($InvoiceNumber == "")  {  $InvoiceNumber = '-';  }
		if($InvoiceDate == "")  {  $InvoiceDate = '-';  }
		
?>

<div align="right">
<div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">Customer
        Information</a> | <a href="Notes.php?cust=<? echo $CustomerID; ?>">Notes</a> <a href="PurchaseHistory.php?cust=<? echo $CustomerID; ?>"><br>
                  </a></font>
</div>
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
    <tr valign="top"> 
      <td width="19%"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong>Purchase
            ID: <font color="#0000FF"><?php echo $PurchaseID; ?></font></strong></font></td>
      <td width="19%"><font size="3"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Date/Time: </font></strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $DateTime; ?></strong></font></font></td>
    </tr>
</table>
  <div align="left"> 
  <form name="form1" method="post" action="PurchaseDetailsEdit.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">
    <input name="Edit" type="submit" id="Edit" value="Edit Purchase Info">
  </form> </div>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr bgcolor="#FFFFCC">
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Nickname/ID</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Qty</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Price</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Ebay
      Item # </font></strong></div></td>
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
			$ShippedDetail = $row3[Shipped];
			$Status = $row3[Status];
			$EbayItemNumber = $row3[EbayItemNumber];
			$Replacement = $row3[Replacement];
			
			
		if($EbayItemNumber == "")  {  $EbayItemNumber = '-';  }
		
		
					$sql4 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
					$result4 = mysql_query($sql4) or die("Cannot execute query productID!");
					
					while($row4 = mysql_fetch_array($result4))
					{
						$Product = $row4[ProductName];
						$ProductNickname = $row4[Nickname];
						$Color = $row4[Color];
					}

	?>
      <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $ProductNickname; ?>-#<? echo $ProductID; ?></strong></font></div></td>
      <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $Quantity; ?></strong></font></div></td>
      <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong>$<?php echo number_format($PurchasePrice,2); ?></strong></font></div></td>
      <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $EbayItemNumber; ?></strong></font></div></td>
      <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $Status; ?>
        <? if($Replacement == 'y'){?> 
        -
      replacement
        <? } ?>
      </strong></font></div></td>
      <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $ShippedDetail; ?></strong></font></div></td>
      <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><a href="PurchaseProductEdit.php?d=<? echo $DetailID; ?>&purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Edit</a></font></div></td>
    </tr>
	<?
	}	
	?>	
</table>
  
  
  <div align="left">  
    <br>
    <table width="100%"  border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; </strong><a href="ShippingHistory.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>"><strong>Shipping
        History</strong></a></font></td>
        <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="PurchaseProductAdd.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Add
        a product to this order</a></font></div></td>
      </tr>
    </table>
    <br>
  </div>
<div align="left">
  <table width="75%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr>
        <td width="80%"><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">Discount</font></strong></div></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($Discount,2); ?></font></td>
      </tr>
      <tr>
        <td width="80%"><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">Subtotal</font></strong></div></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($Subtotal,2); ?></font></td>
      </tr>
      <tr>
        <td width="80%"><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">Tax</font></strong></div></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($Tax,2); ?></font></td>
      </tr>
      <tr>
        <td width="80%"><p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipping
              </font></strong><font size="2" face="Arial, Helvetica, sans-serif">( <?php echo $Shipper; ?> - <?php echo $ShippingOption; ?> )<br>
              </font></p>
        </td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($ShippingCost,2); ?></font></td>
      </tr>
      <tr>
        <td width="80%"><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">Total</font></strong></div></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($TotalCost,2); ?></font></td>
      </tr>
  </table>
    
	<? 
	
	if($Preordered == "y") { 
	
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
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$ <?php echo number_format($Amount,2); ?></font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $CardType; ?></font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $LastFourCr; ?></font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $BankCode; ?></font></div></td>


      </tr><? } ?>
  </table>
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
				
				
				$sql2 = "SELECT * FROM tblAffiliatePurchase WHERE PurchaseID = '$PurchaseID'";
				$result2 = mysql_query($sql2) or die("Cannot find affiliate purchase info");
				$Num = mysql_num_rows($result2);
				if($Num > 0)
				{		while($row2 = mysql_fetch_array($result2))
						{
							$AffiliateID = $row2[AffiliateID];
							$Commission = $row2[Commission];
						}
				}
				
				
		if($CVV2Verification == "")  {	$CVV2Verification = '-'; }
		if($AddressVerification == "") {  $AddressVerification = '-';  }
		if($BankCode == "")  {  $BankCode = '-';  }
		if($CardType == "")  {  $CardType = '-';  }
		if($LastFourCr == "")  {  $LastFourCr = '-';  }
		if($BankName == "")  {  $BankName = '-';  }
		if($RoutingNumber == "")  {  $RoutingNumber = '-';  }
		if($CheckNumber == "")  {  $CheckNumber = '-';  }
		if($EbayItemNumber == "")
		{
		?>
	      <font size="1" face="Arial, Helvetica, sans-serif"><a href="http://www.paypal.com" target="_blank">PayPal<br>
	      </a></font><font size="2" face="Arial, Helvetica, sans-serif"><strong>PayPal
	      Transaction Number:</strong> <?php echo $PaypalNumber; ?><br>
          </font>		    <?
		}
		else
		{
		
					if($IsCheck == 'n')
					{
					?>
					
					<font size="1" face="Arial, Helvetica, sans-serif"><a href="https://www.eprocessingnetwork.com/MSCLogin.html" target="_blank">eProcessing
					Network</a></font>
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
            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Bank Code: </font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $BankCode; ?></font></td>
          </tr>
          <tr>
            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">AVS: </font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $AddressVerification; ?></font></td>
          </tr>
          <tr>
            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">CVV2:</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $CVV2Verification; ?></font></td>
          </tr>
        </table>
		<font size="2" face="Arial, Helvetica, sans-serif">          <?
					}
					else
					{
					?>
          </font>
		<font size="1" face="Arial, Helvetica, sans-serif"><a href="https://www.eprocessingnetwork.com/MSCLogin.html" target="_blank">eProcessing
		Network</a></font>
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
	  
	  
	  <? if($TypeID == "6") { ?>
      <tr>
        <td><font size="2" face="Arial, Helvetica, sans-serif">Purchase Order Number: </font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $PONumber; ?></font></td>
      </tr>
      <tr>
        <td><font size="2" face="Arial, Helvetica, sans-serif">Invoice Number: </font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $InvoiceNumber; ?></font></td>
      </tr>
      <tr>
        <td><font size="2" face="Arial, Helvetica, sans-serif">Invoice
              Date: </font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $InvoiceDate; ?></font></td>
      </tr>
	  <? } ?>
	  
	  
      <tr>
        <td><font size="2" face="Arial, Helvetica, sans-serif">Entire order shipped? (y/n/p) </font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Shipped; ?></font></td>
      </tr>
      
	  <tr>
        <td><font size="2" face="Arial, Helvetica, sans-serif">Promotion Code: </font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $PromotionCodeID; ?></font></td>
      </tr>
	 
	  <tr>
        <td><font size="2" face="Arial, Helvetica, sans-serif">IP Address:</font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $IP; ?>&nbsp;</font></td>
      </tr>

		<?
		if($Num > 0) { ?>
      <tr>
         <td><font size="2" face="Arial, Helvetica, sans-serif">Affiliate
              Info:</font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $AffiliateID; ?> -
            $<?php echo number_format($Commission,2); ?> commission</font></td>
	  </tr>
		<? } ?>
    </table>
  <font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
  </strong></font>
</div>
  <div align="left">
    <table width="75%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase
              Notes:</strong></font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Notes; ?>&nbsp;</font></p></td>
      <td><p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping
              Notes:</strong></font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ShipNotes; ?>&nbsp;</font></p></td>
    </tr>
  </table>
  <br>  
  <hr align="left" width="650">
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="../warranty/ClaimAdd.php?purch=<? echo $PurchaseID; ?>">Make
    a claim</a></font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="Order_Replacement.php?cust=<? echo $CustomerID; ?>">Ship
    a replacement</a></font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="Order_Reorder.php?cust=<? echo $CustomerID; ?>">New
        order for <? echo $FirstName; ?> <? echo $LastName; ?></a></font></p>
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