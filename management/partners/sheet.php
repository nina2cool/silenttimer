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
	$AffID = $_GET['aff'];


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
			$City = $row['City'];
			$State = $row['State'];
			$ZipCode = $row['ZipCode'];
			$UserName = $row['UserName'];
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
		$SalesClickRatio = ($NumSales/$NumClicks)*100;
	}
	
	
	# get total amount of sales for this affiliate
	$sql = "SELECT SUM(TotalSale) AS Total
			FROM tblAffiliatePurchase  
			WHERE tblAffiliatePurchase.AffiliateID = '$AffID' AND tblAffiliatePurchase.Status = 'open'";
	$result = mysql_query($sql) or die("Cannot calculate total sales.  Please try again.");
			
	while($row = mysql_fetch_array($result))
	{
		$TotalSales = $row[Total];
	}
	
	
	# get total commission for this affiliate
	$sql = "SELECT SUM(Commission) AS Total FROM tblAffiliatePurchase WHERE AffiliateID = '$AffID' AND tblAffiliatePurchase.Status = 'open'";
	$result = mysql_query($sql) or die("Cannot calculate total commissions.  Please try again.");
			
	while($row = mysql_fetch_array($result))
	{
		$TotalCommission = $row[Total];
	}
	
		# get total number of returns from this affiliate

	
	$sql = "SELECT COUNT(tblAffiliatePurchase.PurchaseID) AS Total FROM tblAffiliatePurchase INNER JOIN tblCustomerClaims ON 
			tblCustomerClaims.PurchaseID = tblAffiliatePurchase.PurchaseID 
			WHERE tblAffiliatePurchase.AffiliateID = '$AffID' AND tblCustomerClaims.ClaimType = 'Return' AND tblAffiliatePurchase.Status = 'open'";
	$result = mysql_query($sql) or die("Cannot get total number of returns.  Please try again.");
			
	while($row = mysql_fetch_array($result))
	{
		$NumReturn = $row[Total];
	}
	
	
	$sql = "SELECT COUNT(tblAffiliatePurchase.PurchaseID) AS Total FROM tblAffiliatePurchase INNER JOIN tblCustomerClaims ON 
		tblCustomerClaims.PurchaseID = tblAffiliatePurchase.PurchaseID 
		WHERE tblAffiliatePurchase.AffiliateID = '$AffID' AND tblCustomerClaims.ClaimType = 'Refund' AND tblAffiliatePurchase.Status = 'open' AND tblCustomerClaims.AmountRefunded >= '20'";
	$result = mysql_query($sql) or die("Cannot get total number of refunds.  Please try again.");
			
	while($row = mysql_fetch_array($result))
	{
		$NumRefund = $row[Total];
	}
	

	
	$TotalCommission2 = $TotalCommission - $NumReturn * 5 - $NumRefund * 5;
	
	$Refund = ($NumReturn + $NumRefund) * 5;
	
?>

<p>&nbsp;</p><table width="650" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="38%"><font size="4" face="Arial, Helvetica, sans-serif"><strong>Silent 
      Technology LLC</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      <?php echo $CAddress; ?> <?php echo $CAddress2; ?><br>
      <?php echo $CCity; ?>, <?php echo $CState; ?> <?php echo $CZipCode; ?><br>
Office: <?php echo $CPhone2; ?><br>
Fax: <?php echo $CFax; ?></font></td>
    <td width="62%" colspan="2" valign="top">
    <div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><img src="images/Front_Logo_01.jpg" width="135" height="90"></font></div></td>
  </tr>
</table>
<p align="center"><strong><font size="5" face="Arial, Helvetica, sans-serif"><br>
  Ways
for <?php echo $CompanyName; ?> to
<br>
Increase  Silent Timer Commissions</font></strong></p>
<p> <strong><font size="3" face="Arial, Helvetica, sans-serif"><br>
1. Improve Link Visibility</font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"> The number one way to
    increase your Silent Timer commissions is to make sure the links to our website
    are visible to your web visitors. Consider placing a link or banner on your
    home page, or on a page where you suggest products/books to help students
    study. Discussion forums are another great place for links or banners. Log
    in to your partner account to get links and pre-made banners. You can also
    create your own links, just make sure your affiliate code (<? echo $AffID; ?>) is in the URL
    like this: http://www.silenttimer.com/index.php?a=<? echo $AffID; ?>.<br>
</font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>2. Time Management Discussion Page</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">You can also add a page to your
    site where you discuss time management. Good time management skills are essential
    for test-takers. Smart, capable students will get lower scores if they can't
    budget their time properly. Pointing this out and recommending a timer (or
our timer) with a link can increase your commissions.<br>
</font></p>
<p><strong><font size="3" face="Arial, Helvetica, sans-serif">3. Add to your Links page</font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">If you have a page on your
    website where you list links to other sites, make sure ours is on there with
    your affiliate code (<? echo $AffID; ?>)!<br>
</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The thing to remember is
    that anytime you and your staff recommend a timer to students, be sure to
    tell them about The SIlent Timer and give them the website address with your
    affiliate code at the end. Remember, your affiliate codes are valid for 30
    days after the students visits our site, so you can still get credit for
    the sale even if they don't buy right away.<br>
</font></p>
<p><strong><font size="3" face="Arial, Helvetica, sans-serif">Logging Onto the Partner Site</font></strong></p>
<ol>
  <li><font size="2" face="Arial, Helvetica, sans-serif">1. Your user name is: <?php echo $UserName; ?></font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">2. Go to <a href="http://www.silenttimer.com/partner/index.php">http://www.silenttimer.com/partner/index.php</a>,
      and log in.</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">3. If you don't remember your password, click on &quot;Forget Password&quot; just below
      the log in box. An email with your password will be sent to the email address
      that is registered on our site. If you need more help, email <a href="mailto:info@silenttimer.com">info@silenttimer.com</a>.</font></li>
</ol>
<p><br>
  </p>
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