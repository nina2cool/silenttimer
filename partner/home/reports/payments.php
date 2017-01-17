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
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];
	
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
	
	######## get current info for this period  ########
	#												  #
	###################################################
	
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
		
		# get total commission for this affiliate
		$sql = "SELECT SUM(Commission) AS Total FROM tblAffiliatePurchase WHERE AffiliateID = '$aID' AND tblAffiliatePurchase.Status = 'open'";
		$result = mysql_query($sql) or die("Cannot calculate total commissions.  Please try again.");
				
		while($row = mysql_fetch_array($result))
		{
			$TotalCommission = number_format($row[Total],2);
		}
	
	
	//##################################################
	#            END get for this period               #
	//##################################################
	
	
	
	# get total commission for this affiliate
	$sql2 = "SELECT tblAffiliatePayment.PaymentID, DATE_FORMAT(tblAffiliatePayment.DateTime, '%m/%d/%y') AS SendDate, 
			tblAffiliatePayment.Amount, tblAffiliatePayment.PaymentType, DATE_FORMAT(tblPurchase2.OrderDateTime, '%m/%d/%y') AS CloseDate
			FROM tblAffiliatePayment INNER JOIN tblPurchase2 ON tblAffiliatePayment.EndPurchase = tblPurchase2.PurchaseID 
			WHERE AffiliateID = '$aID'";

	//sort results.....
	if ($sortBy != "")
	{
		$sql2 .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql2 .= " ORDER BY tblPurchase2.OrderDateTime DESC";
		$sortBy ="tblPurchase2.OrderDateTime";
		$sortDirection = "DESC";
	}

	$result2 = mysql_query($sql2) or die("Cannot get checks.  Please try again.");
	
?>

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Reporting 
  Tools </strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td width="71%" align="left" valign="top"><p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Your 
        Payment History</strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Here you can view 
        the details of each payment you have received from us.</font></p>  
	<?
		$check = mysql_num_rows($result2);
			
		if ($check != 0)
		{

	?>
	  <table width="98%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
        <tr bgcolor="#003399"> 
          <td><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Closing 
          Date</font></strong></div></td>
          <td><div align="center"><font color="#FFFFFF"><strong><font size="2" face="Arial, Helvetica, sans-serif">Date 
          Sent </font></strong></font></div></td>
          <td><div align="center"><font color="#FFFFFF"><strong><font size="2" face="Arial, Helvetica, sans-serif">Amount</font></strong></font></div></td>
          <td><div align="center"><font color="#FFFFFF"><strong><font size="2" face="Arial, Helvetica, sans-serif">Payment 
          Type</font></strong></font></div></td>
          <td><div align="center"><font color="#FFFFFF"><strong><font size="2" face="Arial, Helvetica, sans-serif">Details</font></strong></font></div></td>
        </tr>
		
		<tr> 
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Current</font></div></td>
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">---------</font></div></td>
          <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"> $ <? echo number_format($TotalCommission,2);?></font></div></td>
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">---------</font></div></td>
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="index.php">Details</a></font></div></td>
        </tr>
		
        <?
			while($row2 = mysql_fetch_array($result2))
			{
				$PaymentID = $row2[PaymentID];
				$SendDate = $row2[SendDate];
				$CloseDate = $row2[CloseDate];
				$Amount = $row2[Amount];
				$Type = $row2[PaymentType];
	?>
        <tr> 
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CloseDate;?></font></div></td>
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $SendDate;?></font></div></td>
          <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$ <? echo number_format($Amount,2);?></font></div></td>
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Type;?></font></div></td>
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="paymentdetails.php?payID=<? echo $PaymentID;?>">Details</a></font></div></td>
        </tr>
        <?
			}
	?>
      </table>
	  	<?
		}
		else
		{
		?>
	  
	  	
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>You have no 
        payments on your account. If you feel this to be a mistake, please contact 
        us at <a href="mailto:affiliates@silenttimer.com">partner@silenttimer.com</a>. 
        </strong></font></p>
		
		<?
		}
		?>
	  
      <p><font size="2" face="Arial, Helvetica, sans-serif"></font></p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"> </font> </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      </td>
    <td width="29%" align="left" valign="top" bgcolor="#FFFFCC"> 
      <table width="100%" border="0" cellspacing="6" cellpadding="0">
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
              Definitions</font></a></font></strong></p>
            </td>
        </tr>
      </table>
    </td>
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
