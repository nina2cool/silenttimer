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
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Sales
for Promo Codes</strong></font>
<form>
  <?

	$sql = "SELECT Count(tblPurchase2.PromotionCodeID) as Count, Sum(tblPurchase2.Discount) as Discount,
	Sum(tblPurchase2.Subtotal) as Subtotal, tblPurchase2.PromotionCodeID, tblPurchase2.Status,
	tblPromotionCode.PromotionCodeID, tblPromotionCode.PromotionID
	FROM tblPurchase2
	INNER JOIN tblPromotionCode
	ON tblPurchase2.PromotionCodeID = tblPromotionCode.PromotionCodeID
	WHERE tblPurchase2.Status = 'active' AND tblPurchase2.PromotionCodeID <> '' AND tblPromotionCode.PromotionID <> 'affiliate'
	GROUP BY tblPurchase2.PromotionCodeID ORDER BY tblPurchase2.PromotionCodeID ASC";
	//echo $sql;
	$result = mysql_query($sql) or die("Cannot retrieve promo code info, please try again.");

	$Total = mysql_num_rows($result);


?>
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
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Promo
              Code </font></strong></div></td>
      <td class=sort><div align="center"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Total
              Sales </font></strong></div></td>
      <td class=sort><div align="center"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Count</font></strong></div></td>
      <?
   


		while($row = mysql_fetch_array($result))
	
	{
		$PromoCode = $row[PromotionCodeID];
		$Count = $row[Count];
		$Discount = $row[Discount];
		$Subtotal = $row[Subtotal];
		
		$TotalSales = $Subtotal - $Discount;
		
		
		
	?>
    <tr>
	
     <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="PromoCodeReport.php?promo=<? echo $PromoCode; ?>"><? echo $PromoCode; ?></a></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($TotalSales,2); ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Count; ?></font></div></td>
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
