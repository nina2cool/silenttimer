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
?>
<?

	//grab variables to get purchase info from DB.
	$AffID = $_GET['affiliate'];


	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$AffID'";
	$result = mysql_query($sql) or die("Cannot retrieve affiliate info, please try again.");

		while($row = mysql_fetch_array($result))
			{
			$FirstName = $row['FirstName'];
			$LastName = $row['LastName'];
			$CheckToName = $row['CheckToName'];
			$CompanyName = $row['CompanyName'];
			$Address = $row['Address'];
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


	# need to get a the date and time of last purchase for last payment period:
	$sql = "SELECT MAX(PaymentID) AS Max FROM tblAffiliatePayment WHERE AffiliateID = '$AffID'";
	$result = mysql_query($sql) or die("Cannot get Start Purchase date.  Please try again.");
			
	while($row = mysql_fetch_array($result))
	{
		$PaymentID = $row[Max];
	}



	$sql = "SELECT tblPurchase.DateTime AS Date FROM tblPurchase INNER JOIN tblAffiliatePayment ON 
			tblPurchase.PurchaseID = tblAffiliatePayment.EndPurchase 
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
	$sql = "SELECT COUNT(tblAffiliatePurchase.PurchaseID) AS Total FROM tblAffiliatePurchase INNER JOIN tblPurchase ON 
			tblPurchase.PurchaseID = tblAffiliatePurchase.PurchaseID 
			WHERE tblAffiliatePurchase.AffiliateID = '$AffID' AND tblPurchase.DateTime > '$StartDate'";
	$result = mysql_query($sql) or die("Cannot get total number of sales.  Please try again.");
			
	while($row = mysql_fetch_array($result))
	{
		$NumSales = $row[Total];
	}
	
	# Calculate sales/num clicks
	if($NumClicks != 0)
	{
		$SalesClickRatio = number_format(($NumSales/$NumClicks)*100,2);
	}
	
	
	# get total amount of sales for this affiliate
	$sql = "SELECT SUM(TotalSale) AS Total
			FROM tblAffiliatePurchase  
			WHERE tblAffiliatePurchase.AffiliateID = '$AffID' AND tblAffiliatePurchase.Status = 'open'";
	$result = mysql_query($sql) or die("Cannot calculate total sales.  Please try again.");
			
	while($row = mysql_fetch_array($result))
	{
		$TotalSales = number_format($row[Total],2);
	}
	
	
	# get total commission for this affiliate
	$sql = "SELECT SUM(Commission) AS Total FROM tblAffiliatePurchase WHERE AffiliateID = '$AffID' AND tblAffiliatePurchase.Status = 'open'";
	$result = mysql_query($sql) or die("Cannot calculate total commissions.  Please try again.");
			
	while($row = mysql_fetch_array($result))
	{
		$TotalCommission = number_format($row[Total],2);
	}
	
	
			  $sql6 = "SELECT * FROM tblAffiliatePurchase WHERE AffiliateID = '$AffID' AND Status = 'open'";
			
			
				
			  $result6 = mysql_query($sql6) or die("Cannot find purchases!");
			  
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row6 = mysql_fetch_array($result6))
				{
			
					$PurchaseID = $row6['PurchaseID'];
					$Sale = $row6['TotalSale'];
				
			//echo "<br> Sale = $Sale<br>";
	
					$sql5 = "SELECT * FROM tblCustomerClaims WHERE PurchaseID = '$PurchaseID' AND ClaimType <> 'Replacement'";
					$result5 = mysql_query($sql5) or die("Cannot get purchase info!");
					
					
					
					while($row5 = mysql_fetch_array($result5))
					{
						
						$AmntRefunded = $row5['AmountRefunded'];
					
					
			
			
			
						if($AmntRefunded == '$Sale')
						{
						$Count1 = 1;
						}
					
						if($AmntRefunded == '0')
						{
						$Count2 = 0;
						}
						
						else
						{
						$Count3 = 0;
						}
				
					
					
					}
			
			//echo "<br>Count1 = $Count1<br>";
			//echo "<br>Count2 = $Count2<br>";
			//echo "<br>Count3 = $Count3<br>";
			}
			
			
			$Count = $Count1 + $Count2 + $Count3;
//echo "<br>Count = $Count<br>";
			$TotalCommission2 = $TotalCommission - $Count * 5;
	
		
	
?>

<p>&nbsp;</p><table width="650" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="38%"><font size="4" face="Arial, Helvetica, sans-serif"><strong>Silent 
      Technology LLC</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      3415 Greystone, Suite 103<br>
      Austin, TX 78731<br>
      Office: 512.340.0338<br>
      Fax: 512.532.6187</font></td>
    <td width="62%" colspan="2" valign="top"> <div align="right"><font size="6" face="Arial, Helvetica, sans-serif"><strong>STATEMENT</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
        </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Now; ?></strong></font> 
        <div align="left"></div>
      </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="650" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="34%"><p><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"> 
        <? echo $CompanyName; ?><br>
        <? echo "$FirstName $LastName"; ?><br>
        <? echo $Address; ?></font><br>
        <font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font>, 
        <font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font> 
        <font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font> 
        </font></p></td>
    <td valign="baseline" bordercolor="#CCCCCC"><div align="left"></div></td>
    <td width="33%"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><img src="images/Front_Logo_01.jpg" width="135" height="90"></font></div></td>
  </tr>
</table>
<br>
<hr noshade>
<table width="409" border="0" cellpadding="3" cellspacing="0" bordercolor="#CCCCCC">
  <tr> 
    <td width="38%" height="29"><font size="2" face="Arial, Helvetica, sans-serif">Total 
      Commission Paid:</font></td>
    <td width="62%"><font size="2" face="Arial, Helvetica, sans-serif">$</font></td>
  </tr>
  <tr> 
    <td><font size="2" face="Arial, Helvetica, sans-serif">Payable To:</font></td>
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $CheckToName; ?></font></td>
  </tr>
</table>
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
			  
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row4 = mysql_fetch_array($result4))
				{
					$AffID = $row4['AffiliateID'];
					$PurchaseID = $row4['PurchaseID'];
					$Sale = $row4['TotalSale'];
					$Commission = $row4['Commission'];
		
				
				$sql3 = "SELECT * FROM tblPurchase WHERE PurchaseID = '$PurchaseID'";							
			  
			 	$result3 = mysql_query($sql3) or die("Cannot get purchase info!");
				
				while($row3 = mysql_fetch_array($result3))
				{
					$Sale = $row3['TotalCost'];
					$DateTime = $row3['DateTime'];
				}
			   
			  
			  
			  ?>
        <tr bordercolor="#000000"> 
          <td width="40%" height="32"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font></div></td>
          <td width="30%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Sale,2); ?></font></div></td>
          <td width="30%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Commission,2); ?></font></div></td>
        </tr>
        <?

	}

?>
      </table>
    </td>
    <td valign="top"> <strong><font size="3" face="Arial, Helvetica, sans-serif">ACTIVITY 
      SUMMARY<br>
      </font></strong><br>
      <table width="225" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td width="67%" height="29"><font size="2" face="Arial, Helvetica, sans-serif"># 
            of Clicks:</font></td>
          <td width="33%"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $NumClicks; ?></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></div></td>
        </tr>
        <tr> 
          <td><font size="2" face="Arial, Helvetica, sans-serif"># of Sales:</font></td>
          <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $NumSales; ?></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></div></td>
        </tr>
        <tr> 
          <td><font size="2" face="Arial, Helvetica, sans-serif">Sales/Click Ratio:</font></td>
          <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $SalesClickRatio; ?></font></div></td>
        </tr>
        <tr> 
          <td><font size="2" face="Arial, Helvetica, sans-serif">Total Sales:</font></td>
          <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($TotalSales,2); ?></font></div></td>
        </tr>
        <tr> 
          <td><font size="2" face="Arial, Helvetica, sans-serif">Commission on 
            Sales:</font></td>
          <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($TotalCommission,2); ?></font></div></td>
        </tr>
        <tr> 
          <td><font size="2" face="Arial, Helvetica, sans-serif">Total Returns:</font></td>
          <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">$</font></div></td>
        </tr>
        <tr> 
          <td><font size="2" face="Arial, Helvetica, sans-serif">Total Commission:</font></td>
          <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">$</font></div></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Reason for 
        Returns:</strong></font></p>
      <p>&nbsp;</p>
      </td>
  </tr>
</table>
<p><br>
  <font size="2" face="Arial, Helvetica, sans-serif"><strong>COMMISSION PAYMENT 
  FOR PERIOD SHOWN<br>
  </strong>*CHECK ENCLOSED<br>
  If you have any questions, please call Christina McMillan at 512.340.0338.
  Thank you!</font></p>
<table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><div align="center"><font size="4" face="Arial, Helvetica, sans-serif">www.SilentTimer.com/partner</font></div></td>
  </tr>
</table>
<p align="left"> 
  <?
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