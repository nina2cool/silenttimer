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

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$DateButton = $_POST['DateButton'];
	$DateRange = $_POST['DateRange'];
	$Day = $_POST['Day'];
	
	$Date = $_POST['Date'];
	
	$StartDate = $_POST['StartDate'];
	$EndDate = $_POST['EndDate'];
	
	$StateCheck = $_POST['StateCheck'];
	$State = $_POST['State'];
	
	$Year = $_POST['YearBox'];
	$Month = $_POST['MonthBox'];
	
					/*
					$sql9 = "SELECT * FROM tblState WHERE State = '$State'";
					//echo $sql9;
					$result9 = mysql_query($sql9) or die("Cannot execute query PurchaseDetails2!");
					
					while($row9 = mysql_fetch_array($result9))
					{
						$StateName = $row9[Name];
					}
	
					*/
	
	if($DateButton == 'y')
	{
	$FromDate = "$Year-$Month-01";
		
			if($Month == '01' OR $Month == '03' OR $Month == '05' OR $Month == '07' OR $Month == '08' OR $Month == '10' OR $Month == '12')
			{
				$ToDate2 = "$Year-$Month-31";
					if($Month <> '12')
					{
						$Month2 = $Month + 1;
						$ToDate = "$Year-$Month2-01";
					}
					elseif($Month == '12')
					{
					$Month2 = "01";
					$Year2 = $Year + 1;
					$ToDate = "$Year2-$Month2-01";
					}
			}
			elseif($Month == '04' OR $Month == '06' OR $Month == '09' OR $Month == '11')
			{
				$Month2 = $Month + 1;
				$ToDate = "$Year-$Month2-01";
			}

			elseif($Month == '02')
			{
				$Month2 = $Month + 1;
				$ToDate = "$Year-$Month2-01";
				
			}
			else
			{
				echo "invalid month";
			}
			
			
		if($Month == "01"){$MonthName = "January";}
		if($Month == "02"){$MonthName = "February";}
		if($Month == "03"){$MonthName = "March";}
		if($Month == "04"){$MonthName = "April";}
		if($Month == "05"){$MonthName = "May";}
		if($Month == "06"){$MonthName = "June";}
		if($Month == "07"){$MonthName = "July";}
		if($Month == "08"){$MonthName = "August";}
		if($Month == "09"){$MonthName = "September";}
		if($Month == "10"){$MonthName = "October";}
		if($Month == "11"){$MonthName = "November";}
		if($Month == "12"){$MonthName = "December";}
		

		
		if($StateCheck == 'y')
		{
		?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Sales Report for <u><?php echo $MonthName; ?></u></strong></font> <u><font color="#003399"
 size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $Year; ?> in <? echo $StateName; ?></strong></font></u>
		<?
		}
		else
		{
				?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Sales Report for <u><?php echo $MonthName; ?></u></strong></font> <u><font color="#003399"
 size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $Year; ?></strong></font></u>
		<?
		}
	}
	elseif($DateRange == 'y')
	{
	
	$FromDate = $StartDate;
	$ToDate = $EndDate;
	
	

		
		if($StateCheck == 'y')
		{
		?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Sales
Report from <u><?php echo $StartDate; ?></u></strong></font> <strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">to</font></strong> <u><font color="#003399"
 size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $EndDate; ?> in <? echo $StateName; ?></strong></font></u>
		<?		
		}
		else
		{
				
		?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Sales
Report from <u><?php echo $StartDate; ?></u></strong></font> <strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">to</font></strong> <u><font color="#003399"
 size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $EndDate; ?></strong></font></u>
		<?
		}
	}


	/*
	$sql = "SELECT tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblPurchaseDetails2.ProductID, tblPurchaseDetails2.Shipped, tblPurchaseDetails2.Status,
	tblPurchase2.Status, tblShipment3.ShipmentID, tblShipmentProduct.ShipmentID, tblShipmentProduct.Quantity, tblPurchaseDetails2.DetailID,
	sum(tblPurchaseDetails2.Quantity) as NumOrdered, sum(tblShipmentProduct.Quantity) as NumShipped
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
	INNER JOIN tblShipment3
	ON tblPurchase2.PurchaseID = tblShipment3.PurchaseID
	INNER JOIN tblShipmentProduct
	ON tblShipment3.ShipmentID = tblShipmentProduct.ShipmentID
	WHERE tblPurchase2.OrderDateTime >= '$FromDate' AND tblPurchase2.OrderDateTime <= '$ToDate' AND tblPurchase2.Status = 'active'
	AND tblPurchaseDetails2.Status <> 'cancel'
	GROUP BY tblPurchaseDetails2.ProductID";
	*/
	
	/*
	$sql = "SELECT tblProductNew.ProductID, tblProductNew.Color, tblProductNew.Nickname, tblPurchase2.PurchaseID, tblPurchaseDetails2.PurchaseID,
	tblPurchaseDetails2.ProductID FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
	INNER JOIN tblProductNew
	ON tblProductNew.ProductID = tblPurchaseDetails2.ProductID
	WHERE tblPurchase2.OrderDateTime >= '$FromDate' AND tblPurchase2.OrderDateTime <= '$ToDate'";
	*/
	
	$sql = "SELECT * FROM tblProductNew";
	
	
	//echo "<br><br>sql = " .$sql;

		$result = mysql_query($sql) or die("Cannot execute get monthly data!");
	


		
?>

<form>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr bgcolor="#FFFFCC">
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
              Ordered</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
              Ordered for Which Type </font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
              Shipped</font></strong></div></td>
	   <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
              Shipped for Which Type </font></strong></div></td>
    </tr>
<?

		
		while($row = mysql_fetch_array($result))
				{
				
				$Nickname = $row[Nickname];
				$ProductID = $row[ProductID];
				$Color = $row[Color];

				$NumOrdered = 0;
				
				$sql2 = "SELECT sum(tblPurchaseDetails2.Quantity) as NumOrdered
				FROM tblPurchase2
				INNER JOIN tblPurchaseDetails2
				ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
				WHERE tblPurchase2.OrderDateTime >= '$FromDate' AND tblPurchase2.OrderDateTime <= '$ToDate' AND tblPurchase2.Status = 'active'
				AND tblPurchaseDetails2.Status <> 'cancel' AND tblPurchaseDetails2.ProductID = '$ProductID'
				GROUP BY tblPurchaseDetails2.ProductID";
				
				//echo "<br><br>sql2 = " .$sql2;
				
				$result2 = mysql_query($sql2) or die("cannot get NumOrdered");
				
				while($row2 = mysql_fetch_array($result2))
				{
				$NumOrdered = $row2[NumOrdered];
				}



				$NumShipped = 0;
				
				$sql3 = "SELECT sum(tblShipmentProduct.Quantity) as NumShipped, tblCustomer.Type,
				tblPurchaseDetails2.DetailID, tblShipment3.TrackingNumber, tblShipment3.ShipmentID
				FROM tblShipment3 
				INNER JOIN tblShipmentProduct ON tblShipment3.ShipmentID = tblShipmentProduct.ShipmentID 
				INNER JOIN tblPurchaseDetails2 ON tblShipmentProduct.DetailID = tblPurchaseDetails2.DetailID 
				INNER JOIN tblPurchase2 ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID 
				INNER JOIN tblCustomer ON tblPurchase2.CustomerID = tblCustomer.CustomerID 
				WHERE tblShipment3.DateTime >= '$FromDate' AND tblShipment3.DateTime <= '$ToDate' AND tblPurchase2.Status = 'active' 
				AND tblPurchaseDetails2.Status <> 'cancel' AND tblPurchaseDetails2.ProductID = '$ProductID'
				GROUP BY tblPurchaseDetails2.ProductID";
				
				//echo "<br><br>sql3 = " .$sql3;
				
				$result3 = mysql_query($sql3) or die("cannot get NumShipped");
				
				while($row3 = mysql_fetch_array($result3))
				{
				$NumShipped = $row3[NumShipped];
				}

	
				if($NumOrdered == 0)
				{ $NumOrdered = "-"; }
				
				if($NumShipped == 0)
				{ $NumShipped = "-"; }
				
?>	
	    <tr>
      <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $Nickname; ?></strong></font></font></div></td>
      <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $NumOrdered; ?></strong></font></div></td>
      <td>
	    <ul>
	      
	      <?
	  			
	  
	  			$sql4 = "SELECT sum(tblPurchaseDetails2.Quantity) as NumOrdered, tblCustomer.Type
				FROM tblPurchase2
				INNER JOIN tblPurchaseDetails2
				ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
				INNER JOIN tblCustomer
				ON tblPurchase2.CustomerID = tblCustomer.CustomerID
				WHERE tblPurchase2.OrderDateTime >= '$FromDate' AND tblPurchase2.OrderDateTime <= '$ToDate' AND tblPurchase2.Status = 'active'
				AND tblPurchaseDetails2.Status <> 'cancel' AND tblPurchaseDetails2.ProductID = '$ProductID'
				GROUP BY tblCustomer.Type";
				
				//echo "<br><br>sql4 = " .$sql4;
				
				$result4 = mysql_query($sql4) or die("cannot get NumOrdered");
				
				while($row4 = mysql_fetch_array($result4))
				{
				$NumOrderedType = $row4[NumOrdered];
				$TypeID = $row4[Type];
				
									$sql5 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
									$result5 = mysql_query($sql5) or die("cannot get NumOrdered");
									
									while($row5 = mysql_fetch_array($result5))
									{
									$Type = $row5[Type];
									
				if($NumOrderedType == "" OR $NumOrderedType == "0")
				{ $NumOrderedType = "-"; }
				
	  
	  
	  ?>
	      
	  
	      <li><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Type; ?> - <?php echo $NumOrderedType; ?></strong></font></li>
          
	  <?
	  
	  }
	  
	  }
	  ?>
      
	    
        </ul></td>
	  <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $NumShipped; ?></strong></font></div></td>
      
	  <td>
	    <ul>
	      
	      <?
	  			
	  
	  			$sql6 = "SELECT sum(tblShipmentProduct.Quantity) as NumShipped, tblCustomer.Type,
				tblPurchaseDetails2.DetailID, tblShipment3.TrackingNumber, tblShipment3.ShipmentID
				FROM tblShipment3 
				INNER JOIN tblShipmentProduct ON tblShipment3.ShipmentID = tblShipmentProduct.ShipmentID 
				INNER JOIN tblPurchaseDetails2 ON tblShipmentProduct.DetailID = tblPurchaseDetails2.DetailID 
				INNER JOIN tblPurchase2 ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID 
				INNER JOIN tblCustomer ON tblPurchase2.CustomerID = tblCustomer.CustomerID 
				WHERE tblShipment3.DateTime >= '$FromDate' AND tblShipment3.DateTime <= '$ToDate' AND tblPurchase2.Status = 'active' 
				AND tblPurchaseDetails2.Status <> 'cancel' AND tblPurchaseDetails2.ProductID = '$ProductID'
				GROUP BY tblCustomer.Type";
				
				//echo "<br><br>sql6 = " .$sql6;
				
				$result6 = mysql_query($sql6) or die("cannot get NumShippedType");
				
				while($row6 = mysql_fetch_array($result6))
				{
				$NumShippedType = $row6[NumShipped];
				$TypeID = $row6[Type];
				
									$sql7 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
									$result7 = mysql_query($sql7) or die("cannot get NumShippedType");
									
									while($row7 = mysql_fetch_array($result7))
									{
									$Type = $row7[Type];
									
				if($NumShippedType == "" OR $NumShippedType == "0")
				{ $NumShippedType = "-"; }
				
	  
	  
	  ?>
	      
	  
	      <li><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Type; ?> - <?php echo $NumShippedType; ?></strong></font></li>
          
	  <?
	  
	  }
	  
	  }
	  ?>
      
	    
        </ul></td>
	  
	  
	  
    </tr>
	
	<?
	
	
	}
	?>
	
  </table>
 <?
 	
	
	
	$sql6 = "SELECT tblPurchase2.PurchaseID, tblPurchase2.OrderDateTime, tblShipment3.ShipmentID, tblShipment3.PurchaseID,
	tblShipment3.ShipmentCost, tblPurchase2.ShippingCost, tblPurchase2.Tax,
	tblPurchase2.Subtotal, tblPurchase2.Discount, tblPurchaseDetails2.ProductID, tblPurchase2.Shipped, tblProductNew.Cost, tblProductNew.BuiltInShipCost
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
	INNER JOIN tblShipment3
	ON tblPurchase2.PurchaseID = tblShipment3.PurchaseID
	INNER JOIN tblProductNew
	ON tblPurchaseDetails2.ProductID = tblProductNew.ProductID
	WHERE tblPurchase2.OrderDateTime >= '$FromDate' AND tblPurchase2.OrderDateTime <= '$ToDate' AND tblPurchase2.Status = 'active'
	AND tblPurchaseDetails2.Status <> 'cancel'";
 
 	//echo $sql6;
	
	$result6 = mysql_query($sql6) or die("Cannot execute query PurchaseDetails2!");

	
	$ShippingCost0 = 0;
	$Tax0 = 0;
	$Subtotal0 = 0;
	$SubtotalShip = 0;
	$Discount0 = 0;
	$ShipmentCost0 = 0;
	$BuiltInShipCost0 = 0;
	$InvCost0 = 0;
	
					while($row6 = mysql_fetch_array($result6))
					{
					$ShippingCost = $row6[ShippingCost];
					$Tax = $row6[Tax];
					$Subtotal = $row6[Subtotal];
					$Discount = $row6[Discount];
					$ShipmentCost = $row6[ShipmentCost];
					$ProductID = $row6[ProductID];
					$Shipped = $row6[Shipped];
					$ShipmentCost = $row6[ShipmentCost];
					$BuiltInShipCost = $row6[BuiltInShipCost];
					$InvCost = $row6[Cost];
					$Type = $row6[Type];
					
					$ShippingCost2 = $ShippingCost3 + $ShippingCost;
					$Tax2 = $Tax3 + $Tax;
					$Subtotal2 = $Subtotal3 + $Subtotal;
					$Discount2 = $Discount3 + $Discount;
					$ShipmentCost2 = $ShipmentCost3 + $ShipmentCost;
					$BuiltInShipCost2 = $BuiltInShipCost3 + $BuiltInShipCost;
					$InvCost2 = $InvCost3 + $InvCost;

							
					$ShippingCost3 = $ShippingCost0 + $ShippingCost2;
					$Tax3 = $Tax0 + $Tax2;
					$Subtotal3 = $Subtotal0 + $Subtotal2;
					$Discount3 = $Discount0 + $Discount2;
					$ShipmentCost3 = $ShipmentCost0 + $ShipmentCost2;
					$BuiltInShipCost3 = $BuiltInShipCost0 + $BuiltInShipCost2;
					$InvCost3 = $InvCost0 + $InvCost2;
					}
					
		
		
		//echo "<br>Shipping Cost Collected = " .$ShippingCost3;
		//echo "<br>Tax Collected = " .$Tax3;
		//echo "<br>Subtotal = " .$Subtotal3;
		//echo "<br>Discount = " .$Discount3;
		
		//echo "<br>Shipment Cost = " .$ShipmentCost3;
		//echo "<br>Built In Shipping Cost = " .$BuiltInShipCost3;
		
		$TotalRevenue = $Subtotal3 + $ShippingCost3 + $Tax3 - $Discount3;
		//echo "<br>Total Revenue = " .$TotalRevenue;
		
		#Are we making or losing money on shipping?
		$ShipCostDiff = $ShippingCost3 + $BuiltInShipCost3 - $ShipmentCost3;
		//echo "<br>Shipping Cost Difference = " .$ShipCostDiff;
		
		//echo "<br>Inventory Cost = " .$InvCost3;
		
		$NetIncome = $TotalRevenue - $ShipmentCost3 - $InvCost3 - $Discount3 - $Tax3;
	
 ?>

 <br>
 <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
   <tr>
     <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Total Revenue</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> (with
         shipping, tax, etc) </font></td>
     <td width="15%"><div align="right"><strong><font size="2" face="Arial, Helvetica, sans-serif">$ <?php echo number_format($TotalRevenue,2); ?></font></strong></div></td>
   </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Subtotal based on orders</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> (see
            QB for accounts receivable) </font></td>
      <td width="15%"><div align="right"><strong><font size="2" face="Arial, Helvetica, sans-serif">$ <?php echo number_format($Subtotal3,2); ?></font></strong></div></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Sales Tax Collected</font></td>
      <td width="15%"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$ <?php echo number_format($Tax3,2); ?></font></div></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Total Discounts
          Given</font></td>
      <td width="15%"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$ <?php echo number_format($Discount3,2); ?></font></div></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Total Inventory
          Cost </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(of
          items shipped) </font></td>
      <td width="15%"><div align="right"><strong><font size="2" face="Arial, Helvetica, sans-serif"> $ <?php echo number_format($InvCost3,2); ?></font></strong></div></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Shipping Costs Collected </font></td>
      <td width="15%"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$ <?php echo number_format($ShippingCost3,2); ?></font></div></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Estimated Shipping
          Cost (our built-in shipping costs)</font></td>
      <td width="15%"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$ <?php echo number_format($BuiltInShipCost3,2); ?></font></div></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Shipping Costs we
          are paying </font></td>
      <td width="15%"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$ <?php echo number_format($ShipmentCost3,2); ?></font></div></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Shipping Cost -
          Difference (positive: we are making money on shipping; negative: we
          are losing money) </font></td>
      <td width="15%"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$ <?php echo number_format($ShipCostDiff,2); ?></font></div></td>
    </tr>
    <tr bgcolor="#FFFFCC">
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Net Income </font></strong></td>
      <td width="15%"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong>$ <?php echo number_format($NetIncome,2); ?></strong></font></div></td>
    </tr>
  </table>
</form>
  
  
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
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>