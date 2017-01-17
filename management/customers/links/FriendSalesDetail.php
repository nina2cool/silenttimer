<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];
	
	$CustomerID = $_GET['cust'];
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
	$sql2 = "SELECT Count(Valid) as CountValid FROM tblFriendSale WHERE CustomerID = '$CustomerID' AND Status = 'active' AND Valid = 'y'";
	$result2 = mysql_query($sql2) or die("Cannot get purchase info");
	
	while($row2 = mysql_fetch_array($result2))
	{
			$CountValid = $row2[CountValid];
	}
	
	
	$sql3 = "SELECT Count(Valid) as CountInvalid FROM tblFriendSale WHERE CustomerID = '$CustomerID' AND Status = 'active' AND Valid = 'n'";
	$result3 = mysql_query($sql3) or die("Cannot get purchase info");
	
	while($row3 = mysql_fetch_array($result3))
	{
			$CountInvalid = $row3[CountInvalid];
	}
	
	
	$sql4 = "SELECT Count(Returned) as CountReturn FROM tblFriendSale WHERE CustomerID = '$CustomerID' AND Returned = 'y' AND Status = 'active'";
	$result4 = mysql_query($sql4) or die("Cannot get purchase info");
	
	while($row4 = mysql_fetch_array($result4))
	{
			$CountReturn = $row4[CountReturn];
	}
	
	$ValidSales = $CountValid - $CountReturn;
	$TotalSales = $CountValid + $CountReturn;

	$More = 5 - $ValidSales;

	$sql6 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
	$result6 = mysql_query($sql6) or die("Cannot get customer info");
	
	while($row6 = mysql_fetch_array($result6))
	{
			$FirstName = $row6[FirstName];
			$LastName = $row6[LastName];
			$Email = $row6[Email];
	}

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Friend
      Sales Detail: <font color="#00CC33"><? echo $FirstName; ?> <? echo $LastName; ?></font></strong></font></p>
<p><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="FriendSales.php">Back
      to Friend Sales Index</a></font></strong></p><br>
<table width="100%"  border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td><p><font size="2" face="Arial, Helvetica, sans-serif">First Name: <strong><? echo $FirstName; ?></strong></font></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif">Last Name: <strong><? echo $LastName; ?></strong></font></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif">Email: <a href="mailto:<? echo $Email; ?>"><strong><? echo $Email; ?></strong></a></font></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif">&gt;
          <a href="../CustomerInfo.php?cust=<? echo $CustomerID; ?>" target="_blank">View
    Customer Info</a></font></p></td>
    <td width="50%">
      <? if($More > 0) { ?>
    
      <p><font size="2" face="Arial, Helvetica, sans-serif">They need<font color="#00CC33"><strong> <? echo $More; ?> more</strong></font> product
            <? if($More == 1) { ?>
  sale
  <? } else { ?>
  sales
  <? } ?>
  to receive their refund. </font></p>
      <? } else { ?>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#00CC33" size="4">Reached
              5! </font></strong>They have received enough product sales to get
              a refund on their purchase price. This customer needs to be notified
              via email.</font></p>
        <? } ?>
    </td>
  </tr>
</table>
<br>
<table width="100%"  border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Valid Sales:</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CountValid; ?></font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Invalid Sales: (less
        than $24.95 )</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CountInvalid; ?></font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Return Sales: (referral
        returned purchase)</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CountReturn; ?></font></td>
  </tr>
  <tr>
    <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Total Sales:</font></strong></td>
    <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $TotalSales; ?></font></strong></td>
  </tr>
  <tr bgcolor="#FFFFCC">
    <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Total Valid
          Sales:</font></strong></td>
    <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ValidSales; ?></font></strong></td>
  </tr>
</table>
<br>
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr bgcolor="#CCCCFF">
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">pID - Sales Date </font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Product - Subtotal </font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Valid?</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Type</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Edit</font></strong></div></td>
  </tr>
    <?
  	$sql7 = "SELECT * FROM tblFriendSale WHERE CustomerID = '$CustomerID' AND Status = 'active'";
	$result7 = mysql_query($sql7) or die("Cannot get friend sales");
 	
	while($row7 = mysql_fetch_array($result7))
	{
		$PurchaseID = $row7[PurchaseID];
		$ProductID = $row7[ProductID];
		$OrderDateTime = $row7[Date];
		$Subtotal = $row7[Subtotal];
		$Type = $row7[Type];
		$Valid = $row7[Valid];
		$Return2 = $row7[Returned];
		$FriendSaleID = $row7[FriendSaleID];
		
					
					if($OrderDateTime == "0000-00-00")
					{
							$sql8 = "SELECT * FROM tblPurchase2 WHERE PurchaseID = '$PurchaseID' AND Status = 'active'";
							$result8 = mysql_query($sql8) or die("Cannot get orderdatetime");
							while($row8 = mysql_fetch_array($result8))
							{
								$OrderDateTime = $row8[OrderDateTime];
								$PurchaseCustomerID = $row8[CustomerID];
							}
					}

					$sql9 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
					$result9 = mysql_query($sql9) or die("Cannot get product");
					while($row9 = mysql_fetch_array($result9))
					{
						$Product = $row9[Nickname];
					}

					
  ?>
  <tr>
  

    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? if($PurchaseID <> "0" AND $PurchaseID <> "") { ?><a href="../CustomerInfo.php?cust=<? echo $PurchaseCustomerID; ?>" target="_blank"><? echo $PurchaseID; ?></a> - <? } ?><font color="#FF00FF"><? echo $OrderDateTime; ?></font></font></div></td>
    <td><div align="center"><font size="2" face="Arieal, Helvetica, sans-serif"><? echo $Product; ?> -
    $ <? echo number_format($Subtotal,2); ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Valid; ?><? if($Return2 == "y") { ?> - RETURN<? } ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Type; ?></font></div></td>

    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="FriendSalesEdit.php?fs=<? echo $FriendSaleID; ?>&cust=<? echo $CustomerID; ?>">Edit</a></font></div></td>
  </tr>
  	
	<?
	}
?>
</table>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";

// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
