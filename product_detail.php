<?
//security for page
session_start();



# variable sent from page
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
		$Preorder = $_POST['preorder'];
		
		if($Preorder == "y") { header("location:order/preorder.php"); }
		else
		{  
		
		
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


$ProductID = $_GET['p'];

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>



<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>&lt; <a href="product.php">Back
    to Product Page</a></strong></font></td>
    <td><form name="View_Cart" method="post" action="">
      <div align="right">
        <input name="View Cart" type="image" id="View Cart2" value="View Cart" src="../images/viewcart.jpg" alt="View Cart" width="140" height="27">
        <input name="view_cart" type="hidden" id="view_cart2" value="yes">
      </div>
    </form></td>
  </tr>
</table>
<div align="right"></div>
<?

	# set path to image folder:
	$image_path = "pics/products/sm_";
	//$image_path_large = "images/bikes/large/";

	# get all pictures from Db, and list them out baby!!!
	$sql = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
	$result = mysql_query($sql) or die("Cannot get products.  Please try again.");
	
	while($row = mysql_fetch_array($result))
	{
		$Title = $row[ProductName];
		$Description = $row[Description];
		$OriginalPrice = $row[RetailPrice];
		$SalePrice = $row[OnlinePrice];
		$Cost = $row[Cost];
		$CategoryID = $row[CategoryID];
		$Status = $row[Status];
		$ImageID = $row[ImageID];
		$WebInventory = $row[WebInventory];
		$Preorder = $row[Preorder];
		$Retail = $row[Retail];
		$Weight = $row[Weight];
	}
	
	
		# get image name for this image!
		$sql2 = "SELECT * FROM tblImage WHERE ImageID = '$ImageID'";
		$result2 = mysql_query($sql2) or die("Cannot get ProductID Image.  Please try again.");
		
		
		while($row2 = mysql_fetch_array($result2))
		{
			$Small = $row2[FileName];
			$Medium = $row2[FileName];
			$Large = $row2[FileName];
		}
		
		
		# get image name for this image!
		$sql3 = "SELECT * FROM tblCategory WHERE CategoryID = '$CategoryID'";
		$result3 = mysql_query($sql3) or die("Cannot get ProductID Image.  Please try again.");
		
		while($row3 = mysql_fetch_array($result3))
		{
			$Category = $row3[Name];
		}
		
		
		
		$Savings = $OriginalPrice - $SalePrice;
	
		$Quantity = 1;

?>


<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"></font></p>


<table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFCC">
  <tr>
    <td bgcolor="#CCE6FF"><font color="#003399" size="4" face="Arial, Helvetica, sans-serif"><strong> </strong></font><font color="#003399" size="4" face="Arial, Helvetica, sans-serif"><strong>&gt; <? echo $Title; ?></strong></font></td>
  </tr>
</table>
<table width="75%"  border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="47%" rowspan="3"><div align="left">
        <p align="left"><img src="<? echo $image_path . $Medium;?>" alt="<? echo  $Title; ?>" width="150" height="100" border="0"></p>
    </div></td>
    <td width="53%"><p align="left">&nbsp;</p></td>
  </tr>
  <tr>
    <td><p align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif"> Price:</font><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif">$ <? echo number_format($SalePrice,2); ?><br>
        </font></strong>
            <? if($OriginalPrice <> $SalePrice) { ?>
        <font size="2" face="Arial, Helvetica, sans-serif"><br>
        If purchased separately: $ <? echo number_format($OriginalPrice,2); ?><br>
        =&gt; That's a savings of <strong><font color="#00CC33">$<? echo number_format($Savings,2); ?></font></strong>!</font></p>
        <? } ?>
        <? #Check Inventory
	if ($WebInventory <= 1)
	{#Show Out of Stock
	?>
        <div align="center"><strong><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">&lt; Temporarily
              Unavailable &gt;</font></strong>
            <?
	}
	else
	{#Show add to cart button
	?>
            <strong><a href="http://www.silenttimer.com/location_search.php"></a></strong></div></td>
  </tr>
  <tr>
    <td>		<form name="Add_To_Cart" method="post" action=""> 
	  <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
	      <input name="productID" type="hidden" value="<? echo $ProductID;?>">
	      <input name="quantity" type="hidden" value="<? echo $Quantity; ?>">
	      <input name="weight" type="hidden" value="<? echo $Weight; ?>">
	      <input name="preorder" type="hidden" value="<? echo $Preorder; ?>">
	      <input name="Add To Cart" type="image" id="Add To Cart" value="Add To Cart" src="../images/addtocart.jpg" width="140" height="27" alt="Add <? echo $ProductName; ?> To Cart">
	      
	  </font>	 
          <input name="add_to_cart" type="hidden" id="add_to_cart" value="yes"> 
        </div>
    </form>

        <? if ($FreeShipping == "y"){?>
        <div align="center"><font face="Arial, Helvetica, sans-serif" color="#FF0000" size="2"><b>Free
              Shipping!</b></font>
            <? } }?>
      </div></td>
  </tr>
</table>
<p>
    
</p>
<table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFCC">
  <tr>
    <td bgcolor="#CCE6FF"><font color="#003399" size="4" face="Arial, Helvetica, sans-serif"><strong>&gt;
    Description</strong></font></td>
  </tr>
</table>
<br>
<table width="50%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
  <tr>
    <td bgcolor="#FFFF66"><? if($Retail == "y" AND $Preorder == "n") { ?>
        <p><font size="2" face="Arial, Helvetica, sans-serif">This item can also
            be found in select retail stores throughout the U.S. and Canada.</font></p>
        <p><strong><a href="http://www.silenttimer.com/location_search.php"><font size="2" face="Arial, Helvetica, sans-serif">Find
                a store near you that may have <? echo $Title; ?> in stock.</font></a></strong></p>
        <? } elseif($Retail == "n" AND $Preorder == "n") { ?>
        <p><font size="2" face="Arial, Helvetica, sans-serif">This item is only
            available online.</font></p>
        <? } elseif($Preorder == "y") { ?>
		 <p><font size="2" face="Arial, Helvetica, sans-serif">This item is currently
		     out of stock and is available for preorder. <a href="http://www.silenttimer.com/order/preorder.php">Learn more here.</a></font></p>
		 <? } ?>
    </td>
  </tr>
</table>
<br>
<p><? echo $Description; ?></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<hr noshade>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&lt; <a href="product.php">Back to Product Page</a></strong></font> </p>
<p>
</p>
<hr noshade>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?
mysql_close($link);
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>