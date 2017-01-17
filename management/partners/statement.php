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

	//grab variables to get purchase info from DB.
	$AffID = $_GET['affiliate'];


	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
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
				$CPhone2 = $row9['HomePhone'];
				}
	
	
	$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$AffID'";
	$result = mysql_query($sql) or die("Cannot retrieve affiliate info, please try again.");

	while($row = mysql_fetch_array($result))
			{
			$FirstName = $row['FirstName'];
			$LastName = $row['LastName'];
			$CheckToName = $row['CheckToName'];
			$CompanyName = $row['CompanyName'];
			$Address = $row['Address'];
			$Address2 = $row['Address2'];
			$City = $row['City'];
			$State = $row['State'];
			$ZipCode = $row['ZipCode'];
			}

	
	
	

	$sql2 = "SELECT Sum(Commission) AS Commission
	FROM tblAffiliatePurchase WHERE AffiliateID = '$AffID' AND Status = 'open'";
	$result2 = mysql_query($sql2) or die("Cannot total amounts!");
				
	while($row2 = mysql_fetch_array($result2))
	{
		$TotalCommission = $row2[Commission];
		$PurchaseID = $row2[PurchaseID];
	}
	
	
	$Now = date("F j, Y");


	
?><title>Payment Statement</title>

<p>&nbsp;</p><table width="650" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="38%"><font size="4" face="Arial, Helvetica, sans-serif"><strong>Silent 
      Technology LLC</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      <?php echo $CAddress; ?> <?php echo $CAddress2; ?><br>
      <?php echo $CCity; ?>, <?php echo $CState; ?> <?php echo $CZipCode; ?><br>
Office: <?php echo $CPhone2; ?><br>
Fax: <?php echo $CFax; ?></font></td>
    <td width="62%" colspan="2" valign="top"> <div align="right"><font size="6" face="Arial, Helvetica, sans-serif"><strong>STATEMENT</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
    </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Statement
    Date: <? echo $Now; ?></strong></font> </div></td>
  </tr>
</table>
<p>&nbsp; </p>
<table width="650" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="34%"><p><font size="2" face="Arial, Helvetica, sans-serif"> <? echo $CompanyName; ?><br>
          <? echo "$FirstName $LastName"; ?><br>
          <?
		if($Address2 == "")
		{
		?>
          <? echo $Address; ?><br>
		<?
		}
		else
		{
		?>
		
		<? echo $Address; ?><br>
		<? echo $Address2; ?></font><br>
		<?
		}
		?>
		
        <? echo $City; ?>, 
        <? echo $State; ?></font> 
        <font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font> 
        <font size="2" face="Arial, Helvetica, sans-serif"></font></font></p></td>
    <td valign="baseline" bordercolor="#CCCCCC">&nbsp;</td>
    <td width="33%"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><img src="images/Front_Logo_01.jpg" width="135" height="90"></font></div></td>
  </tr>
</table>
<br>
<hr noshade>
<br>
<table width="600" border="0" cellspacing="0" cellpadding="8">
  <tr> 
    <td valign="top"> <strong><font size="3" face="Arial, Helvetica, sans-serif">SUMMARY 
      OF EARNINGS </font></strong><br>
      <br>
      <table width="375" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
        <tr bordercolor="#000000" bgcolor="#FFFFCC"> 
          <td width="40%"> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">DATE 
              PURCHASED</font></strong></div></td>
          <td width="30%"> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">DAILY 
              SALES</font></strong></div></td>
          <td width="30%"> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">COMMISSION</font></strong></div></td>
        </tr>
        <?
			  
			$sql4 = "SELECT * FROM tblAffiliatePurchase WHERE AffiliateID = '$AffID' AND Status = 'open' ORDER BY PurchaseID ASC";
			$result4 = mysql_query($sql4) or die("Cannot find purchases!");
			
			$C1 = 0;
			$D1 = 0;
			$Count1 = 0;
			$S1 = 0;
			$FS1 = 0;
			
			while($row4 = mysql_fetch_array($result4))
				{
					$PurchaseID = $row4['PurchaseID'];
					$Sale = $row4['TotalSale'];
					$Commission = $row4['Commission'];
					
					$D2 = $D3 + $Commission;
					$S2 = $S3 + $Sale;
					
								$sql5 = "SELECT * FROM tblCustomerClaims2 WHERE PurchaseID = '$PurchaseID' AND ClaimType = 'Return' 
								OR PurchaseID = '$PurchaseID' AND ClaimType = 'Cancel'";
								$result5 = mysql_query($sql5) or die("Cannot get purchase info!");
								
								$Count = mysql_num_rows($result5);
								
								$Count2 = $Count3 + $Count;
																
								while($row5 = mysql_fetch_array($result5))
								{
								$ClaimType = $row5[ClaimType];
								$ClaimID = $row5[ClaimID];
								}

					
					$sql3 = "SELECT * FROM tblPurchase2 WHERE PurchaseID = '$PurchaseID' AND Status = 'active'";							
					$result3 = mysql_query($sql3) or die("Cannot get purchase info!");
						
						while($row3 = mysql_fetch_array($result3))
						{
							$Subtotal = $row3['Subtotal'];
							$Tax = $row3['Tax'];
							$Discount = $row3['Discount'];
							$ShippingCost = $row3['ShippingCost'];
							$DateTime = $row3['OrderDateTime'];
						
							//$Sale = $Subtotal + $Tax + $ShippingCost - $Discount;
					}
							
						
							if($Count > 0)
							{
							$Problem = "y";
							}
							else
							{ $Problem = "n"; 
							$C2 = $C3 + $Commission;
							$FS2 = $FS3 + $Sale;
							}
			
			   			
								  
			  
			  ?>
        <tr bordercolor="#000000"> 
          <td width="40%" height="32"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font></div></td>
          <td width="30%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$ <? echo number_format($Sale,2); ?></font></div></td>
          <td width="30%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$ <? echo number_format($Commission,2); ?><? if ($Problem == 'y'){?>-X<? } ?></font></div></td>
        </tr>
        <?

	
	$C3 = $C1 + $C2;
	$D3 = $D1 + $D2;
	$S3 = $S1 + $S2;
	$FS3 = $FS1 = $FS2;
	$Count3 = $Count1 + $Count2;
	
}

//echo $C3;
$FinalCommission = $C3;
$TotalCommission = $D3;
$Refund = $TotalCommission - $FinalCommission;
$NumReturns = $Count3;
$TotalSales = $S3;

	# need to get a the date and time of last purchase for last payment period:
	$sql = "SELECT MAX(PaymentID) AS Max FROM tblAffiliatePayment WHERE AffiliateID = '$AffID'";
	$result = mysql_query($sql) or die("Cannot get Start Purchase date.  Please try again.");
			
	while($row = mysql_fetch_array($result))
	{
		$PaymentID = $row[Max];
	}



	$sql = "SELECT tblPurchase2.OrderDateTime AS Date FROM tblPurchase2 INNER JOIN tblAffiliatePayment ON 
			tblPurchase2.PurchaseID = tblAffiliatePayment.EndPurchase 
			WHERE tblAffiliatePayment.PaymentID = '$PaymentID'";
	$result = mysql_query($sql) or die("Cannot get Start Purchase date.  Please try again.");
			
	while($row = mysql_fetch_array($result))
	{
		$StartDate = $row[Date];
	}
	
	# get total number of clicks to site...
	$sql = "SELECT COUNT(VisitorID) AS Total FROM tblWebVisitors WHERE AffiliateID = '$AffID' 
			AND DateTime > '$StartDate'";
	$result = mysql_query($sql) or die("Cannot get total click throughs.  Please try again.");
			
	while($row = mysql_fetch_array($result))
	{
		$NumClicks = $row[Total];
	}
	
	# get total number of sales from this affiliate
	$sql = "SELECT COUNT(tblAffiliatePurchase.PurchaseID) AS Total FROM tblAffiliatePurchase INNER JOIN tblPurchase2 ON 
			tblPurchase2.PurchaseID = tblAffiliatePurchase.PurchaseID 
			WHERE tblAffiliatePurchase.AffiliateID = '$AffID' AND tblPurchase2.OrderDateTime > '$StartDate'";
	$result = mysql_query($sql) or die("Cannot get total number of sales.  Please try again.");
			
	while($row = mysql_fetch_array($result))
	{
		$NumSales = $row[Total];
	}

	$NumSalesFinal = $NumSales - $NumReturns;

	# Calculate sales/num clicks
	if($NumClicks != 0)
	{
		$SalesClickRatio = ($NumSalesFinal/$NumClicks)*100;
	}
?>
      </table>
      <br>
      <table width="409" border="1" cellpadding="3" cellspacing="0" bordercolor="#000000">
        <tr>
          <td width="38%" height="29"><font size="2" face="Arial, Helvetica, sans-serif">Total
              Commission Paid:</font></td>
          <td width="62%"><font size="2" face="Arial, Helvetica, sans-serif">$ </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($FinalCommission,2); ?></font></td>
        </tr>
        <tr>
          <td><font size="2" face="Arial, Helvetica, sans-serif">Payable To:</font></td>
          <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $CheckToName; ?></font></td>
        </tr>
      </table>
    </td>
    <td valign="top"> <strong><font size="3" face="Arial, Helvetica, sans-serif">ACTIVITY 
      SUMMARY<br>
      </font></strong><br>
      <table width="225" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td width="67%" height="29"><font size="2" face="Arial, Helvetica, sans-serif"># 
            of Clicks:</font></td>
          <td width="33%"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $NumClicks; ?></font></div></td>
        </tr>
        <tr> 
          <td><font size="2" face="Arial, Helvetica, sans-serif"># of 
              Eligible Sales:</font></td>
          <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $NumSalesFinal; ?></font></div></td>
        </tr>
        <tr> 
          <td><font size="2" face="Arial, Helvetica, sans-serif">Eligible Sales/Click
              Ratio:</font></td>
          <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($SalesClickRatio,2); ?></font></div></td>
        </tr>
        <tr> 
          <td><font size="2" face="Arial, Helvetica, sans-serif">Total 
              Sales:</font></td>
          <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> <? echo number_format($TotalSales,2); ?></font></div></td>
        </tr>
        <tr> 
          <td><font size="2" face="Arial, Helvetica, sans-serif">Commission on 
            Sales:</font></td>
          <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$ </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($TotalCommission,2); ?></font></div></td>
        </tr>
        <tr> 
          <td><font size="2" face="Arial, Helvetica, sans-serif">Total Returns:</font></td>
          <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$ </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($Refund,2); ?></font></div></td>
        </tr>
        <tr> 
          <td><font size="2" face="Arial, Helvetica, sans-serif"> Commission
              on Eligible Sales:</font></td>
          <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$ </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($FinalCommission,2); ?></font></div></td>
        </tr>
      </table></td>
  </tr>
</table>
<p>  <font size="2" face="Arial, Helvetica, sans-serif"><strong>COMMISSION PAYMENT 
  FOR PERIOD SHOWN<br>
  </strong>X = Sale is ineligible for commission <strong><br>
  </strong>CHECK ENCLOSED<br>
  If you have any questions, please call Christina McMillan at <?php echo $CPhone2; ?>.
Thank  you!</font></p>
<table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><div align="center"><font size="4" face="Arial, Helvetica, sans-serif">www.SilentTimer.com/partner</font></div></td>
  </tr>
</table>
  <?
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