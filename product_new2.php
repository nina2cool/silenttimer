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



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?><a name="Top"></a>
<div align="right"><form name="View_Cart" method="post" action="">
  <div align="center">
    <p align="right">
        <input name="View Cart" type="image" id="View Cart" value="View Cart" src="../images/viewcart.jpg" alt="View Cart" width="140" height="27">
        <input name="view_cart" type="hidden" id="view_cart" value="yes">
    </p>
    <p>    
        <?
$Now = date("Y-m-d");
				
				$sql = "SELECT * FROM tblNotice WHERE StartDate <= '$Now' AND EndDate >= '$Now' AND ProductPage = 'y' AND Status = 'active' ORDER BY Priority ASC";
				$result = mysql_query($sql) or die("Cannot get notice");
				
				$Count = mysql_num_rows($result);
				
				if($Count > 0)
				{
				
						while($row = mysql_fetch_array($result))
						{
						$Notice = $row[Notice];
						
						
						?>
					        <? echo $Notice; ?><br>
					        <?
						}
				}
						?>
</p>
    <p align="center"><strong><font face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="2">|</font><font size="2">
    <?
	$sql2 = "SELECT * FROM tblCategory WHERE Status = 'inactive' AND Type = 'Product' ORDER BY Priority";
	$result2 = mysql_query($sql2) or die("Cannot execute tblCategory!");
	
	while($row2 = mysql_fetch_array($result2))
				{
				$CategoryTitle = $row2[Name];
				$CategoryID = $row2[CategoryID];
?>
    </font></font> </strong> <strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="#<? echo $CategoryID; ?>"><? echo $CategoryTitle; ?></a> <font color="#FF0000">|</font>
    <?
}
?>
    </font></strong> </p>
    <p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><em>* Highlighted
          Items are currently available online.</em></font></p>
    <?

	# set path to image folder:
	$image_path = "pics/sm_";



	$sql3 = "SELECT * FROM tblCategory WHERE Status = 'inactive' AND Type = 'Product' ORDER BY Priority";
	$result3 = mysql_query($sql3) or die("Cannot get categories.  Please try again.");
	
	while($row3 = mysql_fetch_array($result3))
	{
		$Category = $row3[Name];
		$CategoryID = $row3[CategoryID];


	# get all pictures from Db, and list them out baby!!!
	$sql = "SELECT * FROM tblProductNew WHERE OnHand > '0' AND CategoryID2 = '$CategoryID' AND Status = 'active' ORDER BY Priority";
	$result = mysql_query($sql) or die("Cannot get products.  Please try again.");
	
	$NumProducts = mysql_num_rows($result);
	
	$i=1;
	while($row = mysql_fetch_array($result))
	{
		$ProductID = $row[ProductID];
		$Title = $row[ProductName];
		$OriginalPrice = $row[OnlinePrice];
		$SalePrice = $row[OnlinePrice];
		$ImageID = $row[ImageID];
		$Status = $row[Status];
		$WebInventory = $row[WebInventory];
		$Preorder = $row[Preorder];
	
		# get image name for this image!
		$sql2 = "SELECT * FROM tblImage WHERE ImageID = '$ImageID'";
		$result2 = mysql_query($sql2) or die("Cannot get ProductID Image.  Please try again.");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$Small = $row2[FileName];
		}
		
		//if($Small == "") { $Small = "noimage.jpg"; }
		
		$array[$i][0] = $ProductID;
		$array[$i][1] = $Small;
		$array[$i][2] = $NumProducts;
		$array[$i][3] = $Title;
		$array[$i][4] = $SalePrice;
		$array[$i][5] = $WebInventory;
	
	
		$i++;
	}


?>


<p align="left"><font color="#003399"><strong><font size="4" face="Arial, Helvetica, sans-serif"><a name="<? echo $CategoryID; ?>"></a><? echo $Category; ?></font></strong></font></p>
<table width="100%" border="0" cellpadding="10" cellspacing="0" bordercolor="#6C999F">
  <?
	
	# LOOP through images and display on page...
	$j=1;
	while($j <= $NumProducts)
	{
	
?>
  <tr align="center" valign="top">
    <td width="33%"><? if($array[$j][0] !=""){?>
        <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
          <tr>
            <td<? if($array[$j][5] > 1) { ?> bgcolor="#FFFFCC"<? } ?>><table width="95%" border="0" align="center" cellpadding="5" cellspacing="0" bordercolor="#6C999F">
              <tr>
                <td height="50" colspan="2"><div align="center"><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><? echo $array[$j][3];?></font></strong></div></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center"><font size="2"><a href="product_detail.php?p=<? echo $array[$j][0];?>"><img src="<? echo $image_path . $array[$j][1];?>" alt="<? echo $array[$j][3]; ?>" width="150" height="100" border="0"></a></font><font size="2"><a href="litter.php?b=<? echo $array[$j][0];?>&name=<? echo $array[$j][3];?>"><br>
                </a></font></div></td>
              </tr>
              <tr>
                <td><strong><font size="3" face="Arial, Helvetica, sans-serif">$ <? echo number_format($array[$j][4],2);?></font><font size="2"><a href="litter.php?b=<? echo $array[$j][0];?>&name=<? echo $array[$j][3];?>"></a></font></strong><font size="2"><a href="litter.php?b=<? echo $array[$j][0];?>&name=<? echo $array[$j][3];?>"></a></font></td>
                <td width="50%"><div align="right"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="product_detail.php?p=<? echo $array[$j][0];?>">                    Details </a></font></strong></div></td>
              </tr>
            </table></td>
          </tr>
        </table>
        <div align="center"></div>
        <? $array[$j][0]= ""; }?>
    </td>
    <td width="33%"><? if($array[$j+1][0]!=""){?>
        <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
          <tr>
            <td<? if($array[$j+1][5] > 1) { ?> bgcolor="#FFFFCC"<? } ?>><table width="95%" border="0" align="center" cellpadding="5" cellspacing="0" bordercolor="#6C999F">
              <tr>
                <td height="50" colspan="2"><div align="center"><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><? echo $array[$j+1][3];?></font></strong></div></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center"><font size="2"><a href="product_detail.php?p=<? echo $array[$j+1][0];?>"><img src="<? echo $image_path . $array[$j+1][1];?>" alt="<? echo $array[$j+1][3]; ?>" width="150" height="100" border="0"></a></font><font size="2"><a href="litter.php?b=<? echo $array[$j+1][0];?>&name=<? echo $array[$j+1][3];?>"><br>
                </a></font></div></td>
              </tr>
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3">$ <? echo number_format($array[$j+1][4],2);?></font></strong></font><font size="3"><strong></strong></font></td>
                <td width="50%"><div align="right"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="product_detail.php?p=<? echo $array[$j+1][0];?>"> Details</a></font></strong></div></td>
              </tr>
            </table></td>
          </tr>
        </table>
        <div align="center"> </div>
        <? $array[$j+1][0]= ""; }?>
    </td>
    <td width="33%"><? if($array[$j+2][0]!=""){?>
        <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
          <tr>
            <td<? if($array[$j+2][5] > 1) { ?> bgcolor="#FFFFCC"<? } ?>><table width="95%" border="0" align="center" cellpadding="5" cellspacing="0" bordercolor="#6C999F">
              <tr>
                <td height="50" colspan="2"><div align="center"><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><? echo $array[$j+2][3];?></font></strong></div></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center"><font size="2"><a href="product_detail.php?p=<? echo $array[$j+2][0];?>"><img src="<? echo $image_path . $array[$j+2][1];?>" alt="<? echo $array[$j+2][3]; ?>" width="150" height="100" border="0"></a></font><font size="2"><a href="litter.php?b=<? echo $array[$j+2][0];?>&name=<? echo $array[$j+2][3];?>"><br>
                </a></font></div></td>
              </tr>
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3">$ <? echo number_format($array[$j+2][4],2);?></font></strong></font><font size="3"><strong></strong></font></td>
                <td width="50%"><div align="right"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="product_detail.php?p=<? echo $array[$j+2][0];?>"> Details</a></font></strong></div></td>
              </tr>
            </table></td>
          </tr>
        </table>
        <div align="center"> </div>
        <? $array[$j+2][0]= ""; }?>
    </td>
  </tr>
  <?
	
		# move item numbers forward 5 products!
		$j=$j+3;	
	}
	
?>
</table>
<p></p>
<div align="right">
  <p><font size="2" face="Arial, Helvetica, sans-serif">^ <a href="#Top">Back to Top</a></font> </p>
  <p>      <?
}
?>
    </p>
</div>
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