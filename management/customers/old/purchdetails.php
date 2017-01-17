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
		
		
		$sql2 = "SELECT * FROM tblPurchase WHERE CustomerID = '$CustomerID'";
		$result2 = mysql_query($sql2) or die("Cannot execute query customerID!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$CustomerID = $row2[CustomerID];
			$PurchaseID = $row2[PurchaseID];
			$NumOrdered = $row2[NumOrdered];
			$TotalCost = $row2[TotalCost];
			$Status = $row2[Status];
			$Tax = $row2[Tax];
			$ShippingOption = $row2[ShippingOptionID];
			$ShippingCost = $row2[ShippingCost];
			$Shipped = $row2[Shipped];
			$ReferredBy = $row2[ReferredBy];
			$TestID = $row2[TestID];
			$ProductID = $row2[ProductID];
			$IP = $row2[IP];
			$TestDate = $row2[TestDate];
			$TimerPrice = $row2[TimerPrice];
			$Same = $row2[SameBillingAddress];
			$Paid = $row2[Paid];
			$Sign = $row2[SignContract];
			$PromotionCodeID = $row2[PromotionCodeID];
			$Notes = $row2[Notes];
			$EbayItemNumber = $row2[EbayItemNumber];
			$PaypalNumber = $row2[PaypalNumber];
			$Replacement = $row2[Replacement];
			$ReplacementType = $row2[ReplacementType];
			$AffClassID = $row2[AffClassID];
			$AffOfficeID = $row2[AffOfficeID];
			$DateTime = $row2[DateTime];
	
			
					$sql3 = "SELECT * FROM tblProduct WHERE ProductID = '$ProductID'";
					$result3 = mysql_query($sql3) or die("Cannot execute query productID!");
					
					while($row3 = mysql_fetch_array($result3))
					{
						$Product = $row3[ProductName];
					}
			
			
					$sql4 = "SELECT * FROM tblTests WHERE TestID = '$TestID'";
					$result4 = mysql_query($sql4) or die("Cannot execute query testID!");
					
					while($row4 = mysql_fetch_array($result4))
					{
						$Test = $row4[Name];
					}
			
		
			}
		
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
  <p><font face="Arial, Helvetica, sans-serif"><a href="main.php?cust=<? echo $CustomerID; ?>">Main 
    Page</a> | <a href="option.php?cust=<? echo $CustomerID; ?>"></a><a href="ship.php?cust=<? echo $CustomerID; ?>">Shipping 
    Information</a> | <a href="option.php?cust=<? echo $CustomerID; ?>">Optional 
    Information</a> | <a href="claimhist.php">Claim History</a> | <a href="notes.php">Notes</a></font></p>
  <hr>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>

	
      <td><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Purchase 
        Details for <strong><?php echo $FirstName; ?> <? echo $LastName; ?></strong></strong></font></td>
      <td><div align="right"><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"><strong><?php echo $Type; ?></strong></font></div></td>
    

	
	</tr>

	
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr> 
      <td><strong><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif">pID:<br>
        </font><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">------</font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><?php echo $PurchaseID; ?></font></strong></td>
      <td><strong><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif">Date/Time:<br>
        <font color="#FFFFFF">------</font><?php echo $DateTime; ?></font></strong></td>
    </tr>
  </table>
  <br>
  <table width="50%" border="1" align="left" cellpadding="5" cellspacing="0">
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Status; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="shipped.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Shipped</a></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Shipped; ?>&nbsp;</font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="billinginfo.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Same 
        billing address?</a></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Same; ?></a></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Paid?</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Paid; ?></font></td>
    </tr>
  </table>
  <p align="left">&nbsp;</p>
  <p align="left"><br>
    <strong><font size="3" face="Arial, Helvetica, sans-serif"><a href="purchdetailsedit.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">EDIT</a></font></strong></p>
  <p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Pricing 
    Information</strong></font></p>
  <table width="75%" border="1" align="left" cellpadding="5" cellspacing="0">
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Product</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Product; ?></font></td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Quantity</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $NumOrdered; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Unit Cost</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($TimerPrice,2); ?></font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Tax</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($Tax,2); ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Shipping Price</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($ShippingCost,2); ?></font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Total Cost</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($TotalCost,2); ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Shipping Option</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ShippingOption; ?></font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">eBay Item Number</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $EbayItemNumber; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">PayPal Transaction 
        Number</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $PaypalNumber; ?></font></td>
    </tr>
  </table>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Optional 
    Information</strong></font></p>
  <table width="50%" border="1" align="left" cellpadding="5" cellspacing="0">
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
  </table>
  <p align="left">&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Miscellaneous 
    Information</strong></font></p>
  <table width="75%" border="1" align="left" cellpadding="5" cellspacing="0">
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">IP Address</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $IP; ?>&nbsp;</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Sign Contract?</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Sign; ?></font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Promotion Code ID</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $PromotionCodeID; ?>&nbsp;</font></td>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Affiliate Class ID</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $AffClassID; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Affiliate Office 
        ID</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $AffOfficeID; ?></font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Replacement?</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Replacement; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Replacement Type</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ReplacementType; ?></font></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="75%" border="1" align="left" cellpadding="5" cellspacing="0">
    <tr>
      <td><p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Notes:</font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Notes; ?>&nbsp;</font></p></td>
    </tr>
  </table>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <hr>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; Make 
    a claim</font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; Ship a replacement</font></p>
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
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>