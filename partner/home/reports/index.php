<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../../include/url.php";

$PageTitle = "Silent Timer Partner - Reporting";

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
	
	# need to get a the date and time of last purchase for last payment period:
	$sql = "SELECT MAX(PaymentID) AS Max FROM tblAffiliatePayment WHERE AffiliateID = '$aID'";
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
	// ------------- end getting payment ID and start date for search


	# get total number of clicks to site...
	$sql = "SELECT COUNT(VisitorID) AS Total FROM tblWebVisitors WHERE AffiliateID = '$aID' 
			AND DateTime > '$StartDate'";
	$result = mysql_query($sql) or die("Cannot get total click throughs.  Please try again.");
			
	while($row = mysql_fetch_array($result))
	{
		$Clicks = $row[Total];
	}
	
	# get total number of sales from this affiliate
	$sql = "SELECT COUNT(tblAffiliatePurchase.PurchaseID) AS Total FROM tblAffiliatePurchase INNER JOIN tblPurchase2 ON 
			tblPurchase2.PurchaseID = tblAffiliatePurchase.PurchaseID 
			WHERE tblAffiliatePurchase.AffiliateID = '$aID' AND tblPurchase2.OrderDateTime > '$StartDate'";
	$result = mysql_query($sql) or die("Cannot get total number of sales.  Please try again.");
			
	while($row = mysql_fetch_array($result))
	{
		$NumSales = $row[Total];
	}
	
	# Calculate sales/num clicks
	if($Clicks != 0)
	{
		$SalesRatio = ($NumSales/$Clicks)*100;
	}
	
	
	# get total amount of sales for this affiliate
	$sql = "SELECT SUM(TotalSale) AS Total
			FROM tblAffiliatePurchase  
			WHERE tblAffiliatePurchase.AffiliateID = '$aID' AND tblAffiliatePurchase.Status = 'open'";
	$result = mysql_query($sql) or die("Cannot calculate total sales.  Please try again.");
			
	while($row = mysql_fetch_array($result))
	{
		$TotalSales = $row[Total];
	}
	
	
	# get total commission for this affiliate
	$sql = "SELECT SUM(Commission) AS Total FROM tblAffiliatePurchase WHERE AffiliateID = '$aID' AND tblAffiliatePurchase.Status = 'open'";
	$result = mysql_query($sql) or die("Cannot calculate total commissions.  Please try again.");
			
	while($row = mysql_fetch_array($result))
	{
		$SalesCommission = $row[Total];
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
	
	
	
	mysql_close($link);
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
    <td width="71%" align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif">From 
        here you may view how many customers have clicked through to SilentTimer.com, 
        how many sales you have created, and how much money you have earned in 
        commissions. Click on the title of a statistic for a detailed description.</font></p>
      <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Current Sales 
        Period</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
        <strong><em><? echo date("M Y");?></em></strong></font></p>
      <table width="350" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
        <tr> 
          <td width="138"><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="#" onClick="MM_openBrWindow('termspop.php#1','','scrollbars=yes,width=300,height=150')">Total 
              Clicks</a></font></strong></div></td>
          <td width="142"><div align="left"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"> <? echo number_format($Clicks,0);?></font></strong></font></div></td>
        </tr>
        <tr> 
          <td><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="#" onClick="MM_openBrWindow('termspop.php#2','','scrollbars=yes,width=300,height=150')">Total 
              # of Sales</a></font></strong></div></td>
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
          <td><div align="left"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">$<? echo $TotalSales;?></font></strong></font></div></td>
        </tr>
        <tr bordercolor="#CCCCCC">
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('termspop.php#5','','scrollbars=yes,width=300,height=150')"> Commission
                  on Sales </a></strong></font></td>
          <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($SalesCommission,2);?></font></strong></td>
        </tr>
        <tr bordercolor="#CCCCCC">
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('termspop.php#8','','scrollbars=yes,width=300,height=150')">Total
                  Returns</a></strong></font></td>
          <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($TotalReturns,2);?></font></strong></td>
        </tr>
        <tr bordercolor="#CCCCCC">
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('termspop.php#9','','scrollbars=yes,width=300,height=150')"> Commission
                  on Returns </a></strong></font></td>
          <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($ReturnCommission,2);?></font></strong></td>
        </tr>
        <tr bordercolor="#CCCCCC">
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('termspop.php#10','','scrollbars=yes,width=300,height=150')">Final
                  Commission Due </a></strong></font></td>
          <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($FinalCommission,2);?></strong></font></td>
        </tr>
      </table>
      <p><strong><font size="2" face="Arial, Helvetica, sans-serif"> </font></strong></p>
      <p>&nbsp;</p>
      <p><strong><font size="2" face="Arial, Helvetica, sans-serif"> </font></strong></p>
      <p><strong><font size="2" face="Arial, Helvetica, sans-serif"> </font></strong></p>
    </td>
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
