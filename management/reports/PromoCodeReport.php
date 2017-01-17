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

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	
	$PromoCode = $_GET['promo'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");



?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Sales
for Promo Code<strong> <? echo $PromoCode; ?></strong></font>
<form>
  <?

	//$sql = "SELECT OrderDateTime, CustomerID FROM tblPurchase2 WHERE PromotionCodeID = 'ST0405' AND Status = 'active' GROUP BY PurchaseID";

	$sql = "SELECT tblCustomer.CustomerID, tblCustomer.Type, tblCustomer.FirstName, tblCustomer.LastName,
	tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblPurchase2.Discount, tblPurchase2.Subtotal, tblPurchase2.ShippingCost,
	tblPurchase2.Tax, tblPurchase2.Status, tblPurchase2.PromotionCodeID, tblPurchase2.OrderDateTime
	FROM tblPurchase2
	INNER JOIN tblCustomer
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	WHERE PromotionCodeID = '$PromoCode' AND Status = 'active'";

	//echo $sql;
	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblPurchase2.PurchaseID DESC";
		$sortBy ="tblPurchase2.PurchaseID";
		$sortDirection = "ASC";
	}
	
	
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

	$Num = mysql_num_rows($result);


?>
  <font size="2" face="Arial, Helvetica, sans-serif"># of Customers so far: <strong><font size="4"><? echo $Num; ?></font></strong></font>
  <br>
  <br>  
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <?
			   // code to handle sort direction
			   // this following code just switches teh ascending order to descending and vice verca when necessary.
			   // The links in the titles of the colum fields are changed depending on the value in this variable and
			   // depending on what is being sorted by.
	//sort results.....
			   if ($sortDirection == "ASC")
			   {
			   		$sd = "DESC";
			   }
			   else
			   {
			   		$sd = "ASC";
			   }

			    
?>
    <tr bgcolor="#99CCFF">
      <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Purchase
      Date</font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Customer</font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Type</font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Total</font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Discount</font></strong></font></div></td>

      <?
   

		while($row = mysql_fetch_array($result))
	
	{
		$PurchaseDate = $row['OrderDateTime'];
		$CustomerID = $row['CustomerID'];
		$TypeID = $row['Type'];
		$FirstName = $row['FirstName'];
		$LastName = $row['LastName'];
		$Discount = $row['Discount'];
		$Tax = $row['Tax'];
		$ShippingCost = $row['ShippingCost'];
		$Subtotal = $row['Subtotal'];
		$Status = $row['Status'];
		$PurchaseID = $row['PurchaseID'];
		
		
		
		$Total = $Subtotal + $Tax + $ShippingCost - $Discount;
										
		
		$sql2 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
		$result2 = mysql_query($sql2) or die("Cannot retrieve TypeID info, please try again.");
		
				while($row2 = mysql_fetch_array($result2))
				{
					$Type = $row2['Type'];
				}

	?>
    <tr>
	
     <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $PurchaseDate; ?> - <? echo $PurchaseID; ?></font></div></td>
      <td><div align="center"> <font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerInfo.php?cust=<? echo $CustomerID; ?>" target="_blank"><? echo "$FirstName $LastName"; ?></a></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Type; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$</font><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($Total,2); ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$</font><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($Discount,2); ?></font></div></td>


    </tr>
    <?
	
			
			  	}
			
			  ?>
  </table>
  <p>&nbsp;</p>
</form>
  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);


// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.

require "../include/footerlinks.php";

}

// finishes security for page
?>
