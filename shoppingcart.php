<?
//security for page
session_start();

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


#grab test name from the URL to customize order page...
$tURL = $_GET['t'];
if($tURL == ""){$TextTest = "test";}else{$TextTest = $tURL;}

if ($tURL == "")
{
	$PageTitle = "Purchase The Silent Timer for your LSAT, MCAT and more!";
}
else
{
	$PageTitle = "Purchase The Silent Timer for your $tURL!";
}


//connect to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
# Reset Purchase session to allow reorder
$_SESSION['purchase'] = "n";

# Remove item from cart

	$Remove=$_GET['remove'];
	$cLocation=$_GET['cart'];
	
	
	
	if($Remove == "y")
	{
		# code to search array and delete item from cart...
		for($i=0; $i < count($ShoppingCart); $i++)
		{
			if($i == $cLocation)
			{
				$ShoppingCart[$i][0] = "";
				$ShoppingCart[$i][1] = "";
				$ShoppingCart[$i][2] = "";
				
			}
		}
	}
	
	# Update Quantity in cart...

	$Update=$_GET['update'];
	$cLocation=$_GET['cart'];
	$Quantity=$_GET['quantity'];
	$Quantity = number_format($Quantity, 0);
	
	if($Update == "y")
	{
		# code to search array and update item quantity from cart...
		for($i=0; $i < count($ShoppingCart); $i++)
		{
			if($i == $cLocation)
			{
				if ($Quantity == '0')
				{
					$ShoppingCart[$i][0] = "";
					$ShoppingCart[$i][1] = "";
					$ShoppingCart[$i][2] = "";
					
				}
				else
				{
					if ($Quantity < 0)
					{
					
					}
					else
					{
						
						$tempProductID = $ShoppingCart[$i][0];
						
						$sql = "SELECT * FROM tblProductNew WHERE ProductID = $tempProductID";
						$result = mysql_query($sql) or die("Cannot get product info position $i!");
						$row = mysql_fetch_array($result);
						
						$tempWeight = $row[Weight];
						$ShoppingCart[$i][2] = ($tempWeight * $Quantity);
						$ShoppingCart[$i][1] = $Quantity;
					}
				}
			}
		}
	}
	
	# check to see if cart is not empty!
		for($i=0; $i < count($ShoppingCart); $i++)
		{
			if($ShoppingCart[$i][0] != "")
			{
				#So I know that they can check out or not...
				$NotEmpty="y";
			}
		}
		
function escapeQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("\'","||",$var);
			$string = str_replace('\"','||||',$string);
		}

		return $string;
	}		

				
?>

<?
# check to see if cart is empty, if empty can't be on this page
		
		$e = 0;
		
		for($i=0; $i < count($ShoppingCart); $i++)
		{
			if($ShoppingCart[$i][0] != "")
			{
				$e = 1;
			}
		}
		
		if ( $e == 1)
		{
			
?> 

<p><strong><font color="#000099" size="4" face="Arial, Helvetica, sans-serif">Shopping Cart </font></strong></p> 
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#666666">
  <tr >     
    <td bgcolor="#000099"> <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Qty</strong></font></div></td>
    <td bgcolor="#000099" ><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></div></td>
    <td bgcolor="#000099" > <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Price</strong></font></div></td>
    
    <td bgcolor="#000099" > <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Total</strong></font></div></td>
  </tr>
<?
 # loop out all shopping cart items
			for($i=0; $i < count($ShoppingCart); $i++)
			{
				
				if($ShoppingCart[$i][0] != "")
				{				
					# get current product from the cart...
					$ProductID = $ShoppingCart[$i][0];
					$Num_Ordered = $ShoppingCart[$i][1];
					$ProductWeight = $ShoppingCart[$i][2];
					 
					# Get all information from table for this part number ID
					$sql = "SELECT * FROM tblProductNew WHERE ProductID='$ProductID'";
					$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
	
					while($row = mysql_fetch_array($result))
					{
						$ProductID = $row[ProductID];
						$ProductName = $row[ProductName];
						$ISBN = $row[ISBN];
						$Description = $row[Description];
						$OnlinePrice = $row[OnlinePrice];
						$RetailPrice = $row[RetailPrice];
						$WebInventory = $row[WebInventory];
						
					# end while	
					}
					?>
					
					<tr bordercolor="#666666">
					<td >
					<form action="" method="get" name="frmUpdate" id="frmUpdate">
					  
					  <font size="2" face="Arial, Helvetica, sans-serif">
					<? # Check inventory for enough product
					$test = $Num_Ordered + 1;
					if ($WebInventory >= $test ){?>
					<input name="quantity" type="text" id="quantity" value="<? echo $Num_Ordered;?>" size="3">
					<? }
					else
					{
						$Num_Ordered = $WebInventory - 1; 
						$ShoppingCart[$i][1] = $Num_Ordered;
						$Extra = no; ?>
					<input name="quantity" type="text" id="quantity" value="<? echo $Num_Ordered;?>" size="3">
					<? } ?>
          			<input name="update" type="hidden" id="update" value="y">
          			<input name="cart" type="hidden" id="cart" value="<? echo $i;?>">
          			<br>
					<font color="#FF0000" face="Arial, Helvetica, sans-serif" size="2">
					<? if ($Extra != "" ){ ?>
					  </font>
					  <div align="center"><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong><? echo "There is not enough inventory to fill your request. You may order $Extra more.";  ?> </strong></font></div>
					  <font size="2" face="Arial, Helvetica, sans-serif">
					<? } ?>
					<input name="Update" type="image" id="Update" value="Update" src="images/cartupdate.jpg" alt="Update" width="81" height="26">
					<br>
         			<a href="shoppingcart.php?remove=y&cart=<? echo $i;?>"><img src="images/cartremove.jpg" width="85" height="25" border="0"></a> 
        			  </font>
					</form>
					
					</td>
					<td ><font size="2" face="Arial, Helvetica, sans-serif"><b><? echo $ProductName; ?></b><br>
					</font></td>
					<td ><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($OnlinePrice, 2); ?></font></div></td>					
					<td ><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$
                    <? $ProductTotal = $Num_Ordered*$OnlinePrice;
					echo number_format($ProductTotal, 2);  ?>
					</font></div></td>
					</tr>
					
					<? 
				$TotalWeight += $ProductWeight;
				$Total += $ProductTotal;
				$Extra = "";
				# end if	
				}
				
			# end for	
			}
	$ShoppingCart[0][3] = $TotalWeight;
	
?>

<tr bgcolor="#CCCCCC"> 
    <td colspan="3" ><font color="#CC0000" size="3" face="Arial, Helvetica, sans-serif"><strong>Subtotal</strong></font> </td>
    <td > <div align="center"><font color="#CC0000" size="3" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($Total, 2);?></strong></font></div></td>
  </tr>
</table> 
<?			

# end if
}
else 
{
echo "<br><br><p align='left'><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'><strong>
	You do not have any items in your shopping cart. <br><br> To add a product to your cart, click Continue Shopping below!</strong></font></p><br><br>";
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="main">
  <tr>
    <td width="51%" height="36"><a href="<? echo $https;?>product.php"><font size="3" face="Arial, Helvetica, sans-serif">&lt; Continue Shopping</font></a></td>
    <td width="49%"><div align="right">

<?		
		if($NotEmpty=="y" ){?>
       <a href="<? echo $https;?>order/order1.php?"><font size="3" face="Arial, Helvetica, sans-serif">Check Out &gt;</font></a>
        
        <? } ?>
    </div></td>
  </tr>
</table>

<p>&nbsp;</p>
<?		
mysql_close($link);
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>

