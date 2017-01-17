<?
//security for page
session_start();



# variable sent from page
	$ProductID = $_GET['id'];
if( $ProductID == "")
{
header("location: product.php");
}
	$Add = $_POST['add_to_cart'];
	$Cart = $_POST['view_cart'];
if ($Cart == "yes")
{
	header("location: shoppingcart.php");

}
	# if supposed to Add...
	if($Add == "yes")
	{
	# variables sent from page
		$tempProductID = $_POST['productID'];
		$tempQuantity =  $_POST['quantity'];
		$tempWeight2 = $_POST['weight'];
	# check if cart is already active... if it is, add item to the array
		if (session_is_registered('ShoppingCart'))
		{
			$k = count($ShoppingCart);
			$added = 'n';
			#echo "a: $k";
			# check if item exists in array add to quantity
			for($i=0; $i < $k; $i++)
			{
				$CurrentQuantity = $ShoppingCart[$i][1];
				$CurrentWeight = $ShoppingCart[$i][2];
				if ($ShoppingCart[$i][0] == $tempProductID) 
				{
					
						$ShoppingCart[$i][1] = $CurrentQuantity + $tempQuantity;
						$ShoppingCart[$i][2] = $CurrentWeight + $tempWeight2;
						$added = 'y';
					
				}
				
			}
			if ($added == 'n') 
				{
					
					$ShoppingCart[$k][0] = $tempProductID;			
					$ShoppingCart[$k][1] = $tempQuantity;
					$ShoppingCart[$k][2] = $tempWeight2;
				}
					
		}
		else # not activated, create session and add product to array...
		{
			session_register('ShoppingCart');
			$k = count($ShoppingCart);
			#echo "b: $k";					
			#$k = 0;			
			$tempQuantity = 1;
			$ShoppingCart[$k][0] = $tempProductID;			
			$ShoppingCart[$k][1] = $tempQuantity;
			$ShoppingCart[$k][2] = $tempWeight2;
			$Quantity = $ShoppingCart[$k][1];
		}
		
	header("location: shoppingcart.php");
	}
	
// has http variable in it to populate links on page.
require "include/url.php";

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

//connect to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
<table border="0" width="100%"><tr><td>
<a href="product.php"><font size="3" face="Arial, Helvetica, sans-serif">&lt; Continue Shopping</font></a></td>
<td><div align="right"><form name="View_Cart" method="post" action="">
  
  <input name="View Cart" type="image" id="View Cart" value="View Cart" src="pics/ViewCart3.jpg" width="75" height="25" alt="View Cart">
  <input name="view_cart" type="hidden" id="view_cart" value="yes"></form></div>
  </td></tr></table>
<?
 # <p><img src="pics/Front-Logo-blue.jpg" width="150" height="98"></p>
 
	$sql = "SELECT * FROM tblProduct WHERE ProductID = $ProductID";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
						
	while($row = mysql_fetch_array($result))
	{
	$ProductID = $row[ProductID];
	$ProductName = $row[ProductName];
	$ISBN = $row[ISBN];
	$Description = $row[Description];
	$Price = $row[Price];
	$RetailPrice = $row[RetailPrice];
	$Quantity = 1;
	$ImageID = $row[ImageID];
	$Weight = $row[Weight];
	$WebInventory = $row[WebInventory];
	$CategoryID = $row[CategoryID];
	$FreeShipping = $row[FreeShipping];
		#Get image info
		
		$sql2 = "SELECT * FROM tblImage WHERE ImageID = '$ImageID'";
		$result2 = mysql_query($sql2) or die("Cannot execute query!");
						
			while($row2 = mysql_fetch_array($result2))
			{
			$ImageName = $row2[FileName];
			
			}
	
		#Get Category Info
		$sql3 = "SELECT * FROM tblCategory WHERE CategoryID= $CategoryID";
		//put SQL statement into result set for loop through records
		$result3 = mysql_query($sql3) or die("Cannot execute query! sql9");
							
		while($row3 = mysql_fetch_array($result3))
		{
			$CategoryName = $row3[Name];
		}
		
		
		
	?>
	<table width="623" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="30" align="left" valign="bottom" background="pics/product_top.jpg">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="4%">&nbsp;</td>
          <td width="96%" height="30">
		  	<font color="#FFFFFF" size="4" face="Arial, Helvetica, sans-serif"><strong><? echo $CategoryName; ?></strong></font>
		  </td>
        </tr>
      </table>
	  </td>
	  </tr>
	<tr><td background="pics/product_behind.jpg"><table class = "main" width="100%" cellpadding="2" cellspacing="2">
	<tr><td width="25%" align="center" >
	<p><img src="pics/sm_<? echo $ImageName;?>" width="150" height="100"></p></td>
	<td width="40%" colspan="3" valign="top">
		<table><tr><td >
	  <font face="Arial, Helvetica, sans-serif" size="3" color="#000099" ><b><? echo $ProductName; ?>
	  </b></font></td></tr><tr>
	<td align="left" width="50%" valign="bottom"><font face="Arial, Helvetica, sans-serif" size="2">
	<? echo $Description; ?>
    </font></td></tr></table>
	<td width="25%" align="right" valign="baseline" > 
	<p align="right"> <font size="3" face="Arial, Helvetica, sans-serif"><b>$<? echo number_format($Price,2); ?></b></font></p>
    <? #Check Inventory
	if ($WebInventory <= 5)
	{#Show Out of Stock
	?>
	<p align="right"> <font size="2" face="Arial, Helvetica, sans-serif" color="#FF0000">Out of Stock</font></p>
	<?
	}
	else
	{#Show add to cart button
	?>
	<form name="Add_To_Cart" method="post" action=""> 
	  <font size="2" face="Arial, Helvetica, sans-serif">
	  <input name="productID" type="hidden" value="<? echo $ProductID;?>">
	  <input name="quantity" type="hidden" value="<? echo $Quantity; ?>">
	  <input name="weight" type="hidden" value="<? echo $Weight; ?>">
	  <input name="Add To Cart" type="image" id="Add To Cart" value="Add To Cart" src="pics/AddToCart.jpg" width="75" height="25" alt="Add Item To Cart">
	  </font>	 
	  <input name="add_to_cart" type="hidden" id="add_to_cart" value="yes"> 
	</form>
	<? } ?>
	<? if ($FreeShipping == "y"){?>
	<font face="Arial, Helvetica, sans-serif" color="#FF0000" size="2"><b>Free Shipping*</b></font>  
	<? } ?>
	</td></tr></table>
	<img src="pics/product_seperator.jpg" width="623" height="7"><br></td></tr>
	
	<?
	}
	?>
	<tr><td align="left" valign="top"><img src="pics/product_bottom.jpg" width="623" height="10"></td></tr>
	</table>
	<br>
	<br>
	<?

?>

<?	
	
	
		mysql_close($link);
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>