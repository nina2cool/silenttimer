<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../../include/url.php";

$PageTitle = "Silent Timer Partner - Your Payments";

//security check
If (session_is_registered('a'))
{

// has database username and password, so don't need to put it in the page.
require "../../../include/dbinfo.php";

// has top header in it.
require "../../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	//get name of person/company	
	$aID = $_SESSION['a'];
	
	//get paymentID from top browser
	$PaymentID = $_GET['payID'];
	
	#connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			
		
	$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$aID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
			
	while($row = mysql_fetch_array($result))
	{
		$CompanyName = $row[CompanyName];
		$Rate = $row[Rate];
	}
	
	
	# ----------------------------
	# /////////////\\\\\\\\\\\\\\\\\\
	#
	#  create SQL statements for the report.
	#  -check to see which type of report is selected, then build ...
	# ----------------------------
	
	if($PaymentID != "") // if paymentID is in browser
	{
		# Get start date for this paymentID
		$sql = "SELECT tblPurchase2.OrderDateTime AS Date FROM tblPurchase2 INNER JOIN tblAffiliatePayment ON 
				tblPurchase2.PurchaseID = tblAffiliatePayment.StartPurchase 
				WHERE tblAffiliatePayment.PaymentID = '$PaymentID'";
		$result = mysql_query($sql) or die("Cannot get Start Purchase date.  Please try again.");
				
		while($row = mysql_fetch_array($result))
		{
			$StartDate = $row[Date];
			$coolStartDate = substr($StartDate,5,2) . "/" . substr($StartDate,8,2) . "/" . substr($StartDate,0,4);
		}
	
		# Get end date for this paymentID
		$sql3 = "SELECT tblPurchase2.OrderDateTime AS Date FROM tblPurchase2 INNER JOIN tblAffiliatePayment ON 
				tblPurchase2.PurchaseID = tblAffiliatePayment.EndPurchase 
				WHERE tblAffiliatePayment.PaymentID = '$PaymentID'";
		$result3 = mysql_query($sql3) or die("Cannot get Start Purchase date.  Please try again.");
				
		while($row3 = mysql_fetch_array($result3))
		{
			$EndDate = $row3[Date];
			$coolEndDate = substr($EndDate,5,2) . "/" . substr($EndDate,8,2) . "/" . substr($EndDate,0,4);
		}
	
	
		# get total number of clicks to site...
		$sql4 = "SELECT COUNT(VisitorID) AS Total FROM tblWebVisitors WHERE AffiliateID = '$aID' 
				AND DateTime >= '$StartDate' AND DateTime <= '$EndDate'";
		$result4 = mysql_query($sql4) or die("Cannot get total click throughs.  Please try again.");
				
		while($row4 = mysql_fetch_array($result4))
		{
			$Clicks = $row4[Total];
		}
		
		# get total number of sales from this affiliate
		$sql5 = "SELECT COUNT(tblAffiliatePurchase.PurchaseID) AS Total FROM tblAffiliatePurchase INNER JOIN tblPurchase2 ON 
				tblPurchase2.PurchaseID = tblAffiliatePurchase.PurchaseID 
				WHERE tblAffiliatePurchase.AffiliateID = '$aID' AND tblPurchase2.OrderDateTime >= '$StartDate' AND tblPurchase2.OrderDateTime <= '$EndDate'";
		$result5 = mysql_query($sql5) or die("Cannot get total number of sales.  Please try again.");
				
		while($row5 = mysql_fetch_array($result5))
		{
			$NumSales = $row5[Total];
		}
		
		# Calculate sales/num clicks
		if($Clicks != 0)
		{
			$SalesRatio = ($NumSales/$Clicks)*100;
		}
		
		
		# get total amount of sales for this affiliate
		$sql6 = "SELECT SUM(TotalSale) AS Total
				FROM tblAffiliatePurchase INNER JOIN tblPurchase2 ON tblAffiliatePurchase.PurchaseID = tblPurchase2.PurchaseID 
				WHERE tblAffiliatePurchase.AffiliateID = '$aID' AND tblPurchase2.OrderDateTime >= '$StartDate' AND tblPurchase2.OrderDateTime <= '$EndDate'";
		//echo "<br>sql6= " .$sql6;
		$result6 = mysql_query($sql6) or die("Cannot calculate total sales.  Please try again.");
				
		while($row6 = mysql_fetch_array($result6))
		{
			$TotalSales = $row6[Total];
		}
		
		
		# get total commission for this affiliate
		$sql7 = "SELECT SUM(Commission) AS Total FROM tblAffiliatePurchase INNER JOIN tblPurchase2 ON 
				tblPurchase2.PurchaseID = tblAffiliatePurchase.PurchaseID 
				WHERE AffiliateID = '$aID' AND tblPurchase2.OrderDateTime >= '$StartDate' AND tblPurchase2.OrderDateTime <= '$EndDate'";
		//echo "<br>sql7= " .$sql7;
		$result7 = mysql_query($sql7) or die("Cannot calculate total sales.  Please try again.");
				
		while($row7 = mysql_fetch_array($result7))
		{
			$SalesCommission = $row7[Total];
		}
		
		
		
		# get total amount of returns for this affiliate
		$sql8 = "SELECT SUM(TotalSale) AS Total
				FROM tblAffiliatePurchase INNER JOIN tblPurchase2 ON tblAffiliatePurchase.PurchaseID = tblPurchase2.PurchaseID
				INNER JOIN tblCustomerClaims2 ON tblPurchase2.PurchaseID = tblCustomerClaims2.PurchaseID
				WHERE tblCustomerClaims2.ClaimType = 'Return' AND tblAffiliatePurchase.AffiliateID = '$aID' AND tblPurchase2.OrderDateTime >= '$StartDate' AND tblPurchase2.OrderDateTime <= '$EndDate'
				OR tblCustomerClaims2.ClaimType = 'Cancel' AND tblAffiliatePurchase.AffiliateID = '$aID' AND tblPurchase2.OrderDateTime >= '$StartDate' AND tblPurchase2.OrderDateTime <= '$EndDate'";
		//echo "<br>sql8= " .$sql8;
		
		$result8 = mysql_query($sql8) or die("Cannot calculate total sales.  Please try again.");
				
		while($row8 = mysql_fetch_array($result8))
		{
			$TotalReturns = $row8[Total];
		}
		
		
		# get commission on returns for this affiliate
		$sql9 = "SELECT SUM(Commission) AS Total
				FROM tblAffiliatePurchase INNER JOIN tblPurchase2 ON tblAffiliatePurchase.PurchaseID = tblPurchase2.PurchaseID
				INNER JOIN tblCustomerClaims2 ON tblPurchase2.PurchaseID = tblCustomerClaims2.PurchaseID
				WHERE tblCustomerClaims2.ClaimType = 'Return' AND tblAffiliatePurchase.AffiliateID = '$aID' AND tblPurchase2.OrderDateTime >= '$StartDate' AND tblPurchase2.OrderDateTime <= '$EndDate'
				OR tblCustomerClaims2.ClaimType = 'Cancel' AND tblAffiliatePurchase.AffiliateID = '$aID' AND tblPurchase2.OrderDateTime >= '$StartDate' AND tblPurchase2.OrderDateTime <= '$EndDate'";
		//echo "<br>sql9= " .$sql9;
		$result9 = mysql_query($sql9) or die("Cannot calculate total sales.  Please try again.");
				
		while($row9 = mysql_fetch_array($result9))
		{
			$ReturnCommission = $row9[Total];
		}		
		
		
		$FinalCommission = $SalesCommission - $ReturnCommission;
		
		
		
	}

?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>


	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Reporting 
  Tools </strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td width="71%" align="left" valign="top"><p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Payment 
        Period Details<br>
        <em><font size="2"><? echo $coolStartDate;?> to <? echo $coolEndDate;?></font></em></strong></font></p>
      <p><em></em></p>
      <table width="350" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
        <tr> 
          <td width="138"><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="#" onClick="MM_openBrWindow('termspop.php#1','','scrollbars=yes,width=300,height=150')">Total 
              Clicks</a></font></strong></div></td>
          <td width="142"><div align="left"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"> <? echo number_format($Clicks,0);?></font></strong></font></div></td>
        </tr>
        <tr> 
          <td><div align="left"><a href="#" onClick="MM_openBrWindow('termspop.php#2','','scrollbars=yes,width=300,height=150')"><strong><font size="2" face="Arial, Helvetica, sans-serif">Total 
              # of Sales</font></strong></a></div></td>
          <td><div align="left"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"> <? echo number_format($NumSales,0);?></font></strong></font></div></td>
        </tr>
        <tr> 
          <td><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="#" onClick="MM_openBrWindow('termspop.php#3','','scrollbars=yes,width=300,height=150')">Sale/Click 
              Ratio</a></font></strong></div></td>
          <td><div align="left"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($SalesRatio,2);?>% </font></strong></font></div></td>
        </tr>
        <tr> 
          <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('termspop.php#4','','scrollbars=yes,width=300,height=150')">Total 
              Sales</a></strong></font></div></td>
          <td><div align="left"><strong><font color="#000000"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($TotalSales,2);?></font></font></strong></div></td>
        </tr>
        <tr> 
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('termspop.php#5','','scrollbars=yes,width=300,height=150')">            Commission
                  on Sales </a></strong></font></td>
          <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($SalesCommission,2);?></font></strong></td>
        </tr>
        <tr>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('termspop.php#8','','scrollbars=yes,width=300,height=150')">Total
                  Returns</a></strong></font></td>
          <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($TotalReturns,2);?></font></strong></td>
        </tr>
        <tr>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('termspop.php#9','','scrollbars=yes,width=300,height=150')"> Commission
                  on Returns </a></strong></font></td>
          <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($ReturnCommission,2);?></font></strong></td>
        </tr>
        <tr>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('termspop.php#10','','scrollbars=yes,width=300,height=150')">Final
          Commission Paid</a></strong></font></td>
          <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($FinalCommission,2);?></strong></font></td>
        </tr>
      </table>
	  
      <p>&nbsp;</p>
      <table width="400" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="62">&nbsp;</td>
          <td width="338"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="payments.php">&lt; 
            Return to Payment History</a></strong></font></td>
        </tr>
      </table>
      <p><font size="2" face="Arial, Helvetica, sans-serif"></font></p>
      <p>&nbsp;</p>
      <p><br>
      </p></td>
    <td width="29%" align="left" valign="top" bgcolor="#FFFFCC"> <table width="100%" border="0" cellspacing="6" cellpadding="0">
        <tr> 
          <td><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">Sales 
            and Activity</font></strong></td>
        </tr>
        <tr> 
          <td align="right" bgcolor="#000000"><img src=../../../pics/transparent-pixel.gif width=1 height=1 vspace=0 hspace=0></td>
        </tr>
        <tr> 
          <td align="left" valign="top"> <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="index.php"><strong>&gt; 
              Current Pay Period</strong></a><strong><br>
              <a href="previous.php">&gt; Search Previous Pay Periods</a></strong></font><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><br>
              <a href="payments.php"><font size="2">&gt; Payment History</font></a></font></strong></p>
            <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><a href="terms.php"><font size="2">&gt; 
              Definitions</font></a></font></strong></p></td>
        </tr>
      </table></td>
  </tr>
</table>
<?
mysql_close($link);
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";

// finishes security for page
}
else
{
	$http .= "partner";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>
