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

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	$custID = $_SESSION['custID'];
	$CustomerID = $custID;

	//connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Databaasdfasdfasdfasdfdsse2");			
	
	#need to check purchase dates
	#only allow customers in the past 6 months to log in
	
	$sql2 = "SELECT Count(Valid) as CountValid FROM tblFriendSale WHERE CustomerID = '$CustomerID' AND Status = 'active' AND Valid = 'y'";
	$result2 = mysql_query($sql2) or die("Cannot get purchase info");
	
	while($row2 = mysql_fetch_array($result2))
	{
			$CountValid = $row2[CountValid];
	}
	
	
	/*
	$sql3 = "SELECT Count(Valid) as CountInvalid FROM tblFriendSale WHERE CustomerID = '$CustomerID' AND Status = 'active' AND Valid = 'n'";
	$result3 = mysql_query($sql3) or die("Cannot get purchase info");
	
	while($row3 = mysql_fetch_array($result3))
	{
			$CountInvalid = $row3[CountInvalid];
	}
	*/

	$sql4 = "SELECT Count(Returned) as CountReturn FROM tblFriendSale WHERE CustomerID = '$CustomerID' AND Returned = 'y' AND Status = 'active'";
	$result4 = mysql_query($sql4) or die("Cannot get purchase info");
	
	while($row4 = mysql_fetch_array($result4))
	{
			$CountReturn = $row4[CountReturn];
	}
	
	$ValidSales = $CountValid - $CountReturn;
	//$TotalSales = $CountValid + $CountInvalid + $CountReturn;

	$More = 5 - $ValidSales;

?><title>Friend Referral Program - Step 5: Referral History</title>

<table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFCC">
  <tr>
    <td><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><em><font size="2" face="Arial, Helvetica, sans-serif"><strong><a name="Top" id="Top"></a></strong></font><font color="#000000" size="4">Friend
            Referral Program</font></em><strong><br>
      Step 5: Referral History </strong></font></td>
    <td><div align="right">
        <p><strong><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="Referral_Rebates.php">Step
        4: Print In-Store Rebates</a></font></strong></p>
        </div></td>
  </tr>
</table>
<p>
  <? if($More > 0) { ?>
</p>
<p><font size="2" face="Arial, Helvetica, sans-serif">You need<font color="#00CC33"><strong> <? echo $More; ?> more</strong></font> product <? if($More == 1) { ?>sale<? } else { ?>sales<? } ?> to receive your refund. </font></p>
<? } else { ?>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#00CC33" size="4">Congratulations! </font></strong>You have received enough product sales to get a refund on your purchase price.  You will be notified via email shortly.</font></p>
<? } ?>


<table width="100%"  border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Valid Sales: <a href="#ValidSales"><font size="1">what
        does this mean? </font></a></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CountValid; ?></font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Return Sales: (referral
        returned purchase)<a href="#ReturnSales"><font size="1"> what does this
        mean? </font></a></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CountReturn; ?></font></td>
  </tr>
  <tr bgcolor="#FFFFCC">
    <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Total Valid
          Sales:<a href="#TotalValidSales"><font size="1"> what does this mean? </font></a></font></strong></td>
    <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ValidSales; ?></font></strong></td>
  </tr>
</table>
<p>&nbsp;</p>
<hr>
<p align="left">&nbsp;</p>
<p align="left"><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>Definitions:</strong></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a name="ValidSales"></a>Valid
      Sales</strong>: Sales of products  whose product price is $24.95
  or greater.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a name="ReturnSales" id="ReturnSales"></a>Return
      Sales</strong>: If a customer whom you referred returns their product,
  this sale is no longer valid, and therefore you do not receive credit for the
      sale.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a name="TotalValidSales" id="TotalValidSales"></a>Total
      Valid Sales</strong>: Total number of products sold that are eligible
  for credit towards your purchase refund. When this number totals 5, you have
      earned enough credits to get a refund on your product price. <a href="Referral_Info.php">Read
      more here.</a> (Total Valid Sales = # of Total Sales  - # of
      Return Sales) </font></p>
<p align="left">&nbsp;</p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>^ <a href="#Top">Return to
      Top </a></strong></font></p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left"></p>
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