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
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");



?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Sales
for Promo Code<strong> CAMT2005 </strong></font>
<form>
  <?

	//$sql = "SELECT OrderDateTime, CustomerID FROM tblPurchase2 WHERE PromotionCodeID = 'ST0405' AND Status = 'active' GROUP BY PurchaseID";

	$sql = "SELECT tblCustomer.CustomerID, tblPurchase2.CustomerID, tblPurchase2.OrderDateTime, tblCustomer.Type, tblPurchase2.PurchaseID
	FROM tblCustomer INNER JOIN tblPurchase2
	ON tblCustomer.CustomerID = tblPurchase2.CustomerID
	WHERE PromotionCodeID = 'CAMT2005' AND Status = 'active' GROUP BY PurchaseID";


	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

	$Total = mysql_num_rows($result);


?>
  <font size="2" face="Arial, Helvetica, sans-serif"># of Customers so far: <strong><font size="4"><? echo $Total; ?></font></strong></font>
  <br>
  <br>  
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
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
    <tr bgcolor="#CCCCCC">
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Purchase
      Date</font></strong></div></td>
      <td class=sort><div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Cust
      ID</font></strong></div></td>
      <td class=sort><div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Type</font></strong></div></td>
      <!--          <td width="17%" class=sort> <div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="management/managepurchases/viewpurchases.php?sort=tblProduct.ProductName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";} ?>">Product</a></strong></font></div></td>
                <td width="6%" class=sort> <div align="center"><font color="#003399" face="Arial, Helvetica, sans-serif"><strong><font size="2"><a href="management/managepurchases/viewpurchases.php?sort=tblPurchase.NumOrdered&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";} ?>">#</a></font></strong></font></div></td>
                <td width="11%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="management/managepurchases/viewpurchases.php?sort=tblPurchase.TotalCost&d=<? if ($sortBy=="tblPurchase.TotalCost") {echo $sd;} else {echo "ASC";} ?>">Total</a></strong></font></div></td>
                <td width="22%" class=sort> <div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="management/managepurchases/viewpurchases.php?sort=tblPurchase.DateTime&d=<? if ($sortBy=="tblPurchase.DateTime") {echo $sd;} else {echo "ASC";} ?>">Date 
                    Time </a></strong></font></div></td>
                <td width="12%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="management/managepurchases/viewpurchases.php?sort=tblPurchase.Shipped&d=<? if ($sortBy=="tblPurchase.Shipped") {echo $sd;} else {echo "ASC";} ?>">Shipped?</a></strong></font></div></td>
              </tr>
        
		-->
      <?
   


		while($row = mysql_fetch_array($result))
	
	{
		$PurchaseDate = $row['OrderDateTime'];
		//$Num = $row['Sum'];
		$CustomerID = $row['CustomerID'];
		$TypeID = $row['Type'];
		
		$sql2 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
		$result2 = mysql_query($sql2) or die("Cannot retrieve TypeID info, please try again.");
		
					while($row2 = mysql_fetch_array($result2))
				
				{
					$Type = $row2['Type'];
				}

	?>
    <tr>
	
     <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $PurchaseDate; ?></font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> <a href="../customers/CustomerInfo.php?cust=<? echo $CustomerID; ?>"><? echo $CustomerID; ?></a></font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerInfo.php?cust=<? echo $CustomerID; ?>"><? echo $Type; ?></a></font></strong></div></td>


    </tr>
    <?
	
			
			  	}
			
			  ?>
  </table>
  <p>&nbsp;</p>
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
