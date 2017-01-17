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
	
	//grab variables to get customer info from DB.
	$AffID = $_GET['aff'];

	$Now = date("Y-m-d H:i:s");

	
	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			


	#<Add button being pushed>
	if ($_POST['Add'] == "Add")
	{
		// Customer Table
		
		$Amount = $_POST['Amount'];
		$PaymentType = $_POST['PaymentType'];
		$CheckNumber = $_POST['CheckNumber'];
		$StartPurchase = $_POST['StartPurchase'];
		$EndPurchase = $_POST['EndPurchase'];

		$sql = "INSERT INTO tblAffiliatePayment
		(AffiliateID, DateTime, Amount, PaymentType, CheckNumber, StartPurchase, EndPurchase)
		VALUES
		('$AffID', '$Now', '$Amount', '$PaymentType', '$CheckNumber', '$StartPurchase', '$EndPurchase')";
				 
		mysql_query($sql) or die("Cannot insert paid, please try again.");
		

		$sql = "UPDATE tblAffiliatePurchase
		SET Status = 'paid'
		WHERE AffiliateID = '$AffID' AND PurchaseID <= '$EndPurchase'";
				 
		mysql_query($sql) or die("Cannot insert paid, please try again.");

		header("location: CurrentSales.php?aff=$AffID");	


		}
	
	
		$sql = "SELECT Max(PurchaseID) as Max FROM tblAffiliatePurchase WHERE AffiliateID = '$AffID' AND Status = 'open'";
		$result = mysql_query($sql) or die("Cannot get max purchaseID");
		
		while($row = mysql_fetch_array($result))
		{
		$Max = $row[Max];
		}
		
		$sql2 = "SELECT Min(PurchaseID) as Min FROM tblAffiliatePurchase WHERE AffiliateID = '$AffID' AND Status = 'open'";
		$result2 = mysql_query($sql2) or die("Cannot get min purchaseID");
		
		while($row2 = mysql_fetch_array($result2))
		{
		$Min = $row2[Min];
		}
	
	// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";
	
		?>		



<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; 
  Commissions Paid</strong></font></p>
<form name="form1" method="post" action="">
  <table width="53%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr> 
      <td width="35%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Amount 
        Paid </font></strong></td>
      <td width="65%"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
        <input name="Amount" type="text" id="Amount">
        </font></strong></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Payment Type</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
        <input name="PaymentType" type="text" id="PaymentType">
        </font></strong></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Check Number</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
        <input name="CheckNumber" type="text" id="CheckNumber">
        </font></strong></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Start Purchase</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
        <input name="StartPurchase" type="text" id="StartPurchase" value="<? echo $Min; ?>">
        </font></strong></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">End Purchase</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
        <input name="EndPurchase" type="text" id="EndPurchase" value="<? echo $Max; ?>">
        </font></strong></td>
    </tr>
  </table>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
    <input name="Add" type="submit" id="Add" value="Add">
    <input type="reset" name="Submit2" value="Reset">
    </font></strong></p>
  <font size="2" face="Arial, Helvetica, sans-serif">Pressing 'Add' changes all open purchases 
  to paid where the PurchaseID &lt;= EndPurchase. </font> 
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>

  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.

require "../include/footerlinks.php";

// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
