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
	
	$StartDate = $_POST['StartDate'];
	$EndDate = $_POST['EndDate'];
	
	$StateCheck = $_POST['StateCheck'];
	$State = $_POST['State'];
	
	$Year = $_POST['YearBox'];
	$Month = $_POST['MonthBox'];
	
					
	$sql9 = "SELECT * FROM tblState WHERE State = '$State'";
	//echo $sql9;
	$result9 = mysql_query($sql9) or die("Cannot execute query State!");
	
	while($row9 = mysql_fetch_array($result9))
	{
		$StateName = $row9[Name];
	}
	
	
	
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
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Shipping Report
  for <u><?php echo $MonthName; ?></u></strong></font> <u><font color="#003399"
 size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $Year; ?> in <? echo $StateName; ?></strong></font></u>
		  <?
		}
		else
		{
				?>
          <font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Shipping
  Report for <u><?php echo $MonthName; ?></u></strong></font> <u><font color="#003399"
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
          <font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Shipping
  Report from <u><?php echo $StartDate; ?></u></strong></font> <strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">to</font></strong> <u><font color="#003399"
 size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $EndDate; ?> in <? echo $StateName; ?></strong></font></u>
		  <?		
		}
		else
		{
				
		?>
          <font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Shipping
  Report from <u><?php echo $StartDate; ?></u></strong></font> <strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">to</font></strong> <u><font color="#003399"
 size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $EndDate; ?></strong></font></u>
		  <?
		}
	}



	$sql = "SELECT tblShipment3.PurchaseID, tblShipment3.ShipmentID,
	tblShipment3.ShipCostID, tblShipment3.ShipmentCost, tblShipment3.TrackingNumber,
	Sum(tblShipment3.ShipmentCost) as ShippingCost,
	tblShipment3.ShipperID, tblShipment3.DateTime,
	tblShipment3.ShipmentComplete,
	tblShipment3.MultiplePieces, tblPurchase2.PurchaseID,
	tblCustomer.CustomerID, tblCustomer.Type, tblPurchase2.CustomerID, tblCustomer.State
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblCustomer.CustomerID = tblPurchase2.CustomerID
	INNER JOIN tblShipment3
	ON tblPurchase2.PurchaseID = tblShipment3.PurchaseID
	WHERE tblShipment3.DateTime >= '$FromDate' AND tblShipment3.DateTime <= '$ToDate' AND tblPurchase2.Status = 'active'
	GROUP BY tblShipment3.PurchaseID";

	if($StateCheck == 'y')
	{
	$sql = "SELECT tblShipment3.PurchaseID, tblShipment3.ShipmentID,
	tblShipment3.ShipCostID, tblShipment3.ShipmentCost, tblShipment3.TrackingNumber,
	Sum(tblShipment3.ShipmentCost) as ShippingCost,
	tblShipment3.ShipperID, tblShipment3.DateTime,
	tblShipment3.ShipmentComplete,
	tblShipment3.MultiplePieces, tblPurchase2.PurchaseID,
	tblCustomer.CustomerID, tblCustomer.Type, tblPurchase2.CustomerID, tblCustomer.State
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblCustomer.CustomerID = tblPurchase2.CustomerID
	INNER JOIN tblShipment3
	ON tblPurchase2.PurchaseID = tblShipment3.PurchaseID
	WHERE tblShipment3.DateTime >= '$FromDate' AND tblShipment3.DateTime <= '$ToDate' AND tblPurchase2.Status = 'active' AND
	tblCustomer.State = '$State'
	GROUP BY tblShipment3.PurchaseID";
	}
		
		//echo $sql;
		
		$result = mysql_query($sql) or die("Cannot execute get monthly data!");
	


		
?>
</p>
<p>&nbsp;</p>
<table width="100%"  border="1" cellspacing="0" cellpadding="5">
    <tr>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Number
              Shipped </font></strong></div></td>
    </tr>
<?
		
		$InvCost = 0;
		$Subtotal = 0;
		$Tax = 0;
		$ShippingCost = 0;
		$Discount = 0;
		$EstShipCost = 0;
		
		while($row = mysql_fetch_array($result))
				{
				$PurchaseID = $row[PurchaseID];
				$CustomerID = $row[CustomerID];
				//$Status = $row[Status];
				//$Subtotal4 = $row[Subtotal];
				$DateTime = $row[DateTime];
				$ShipmentID = $row[ShipmentID];
				$TrackingNumber = $row[TrackingNumber];
				$ShipmentCost = $row[ShipmentCost];
				$MultiplePieces = $row[MultiplePieces];
				$ShipperID = $row[ShipperID];
				$ShipCostID = $row[ShipCostID];
				$ShipmentComplete = $row[ShipmentComplete];
				$State = $row[State];
				
				/*
				$Subtotal2 = $Subtotal4 + $Subtotal3;
				$Tax2 = $Tax4 + $Tax3;
				$ShippingCost2 = $ShippingCost4 + $ShippingCost3;
				$Discount2 = $Discount4 + $Discount3;
				*/
					
					
					$sql3 = "SELECT * FROM tblShipmentProduct WHERE ShipmentID = '$ShipmentID' AND Complete = 'y'";
					//echo $sql3;
					$result3 = mysql_query($sql3) or die("Cannot execute query ShipmentProduct!");
					
					while($row3 = mysql_fetch_array($result3))
					{
						$DetailID = $row3[DetailID];
						$Complete = $row3[ProductID];
						$Quantity = $row3[Quantity];
						//$Shipped = $row3[Shipped];
					
							
							$sql4 = "SELECT * FROM tblPurchaseDetails2 WHERE DetailID = '$DetailID'";
							$result4 = mysql_query($sql4) or die("Cannot execute query DetailID!");
							
							while($row4 = mysql_fetch_array($result4))
							{
							$ProductID = $row4[ProductID];
													
									$sql2 = "SELECT * FROM tblProduct WHERE ProductID = '$ProductID'";
									$result2 = mysql_query($sql2) or die("Cannot execute query ProductID!");
									
									while($row2 = mysql_fetch_array($result2))
									{
									$ProductNickname = $row2[Nickname];
									$Cost = $row2[Cost];
									$BuiltIn = $row2[BuiltInShipCost];
									
									
					//$TotalSold = $Quantity;
					
						$InventoryCost = $Cost * $Quantity;
						$InvCost2 = $InvCost3 + $InventoryCost;
					
					if($TypeID == '1' OR $TypeID == '2')
					{
					$EstShip = $Quantity * $BuiltIn;
					$EstShipCost2 = $EstShip + $EstShipCost3;
					
					}
					else
					{
					$EstShip = 0;
					$EstShipCost2 = $EstShip + $EstShipCost3;
					}

					//echo "cost 2 = ". $EstShipCost2. "<br>";

			}
			}
			}
				$InvCost3 = $InvCost + $InvCost2;
				$EstShipCost3 = $EstShipCost + $EstShipCost2;
		
		
				$Subtotal3 = $Subtotal + $Subtotal2;
				$Tax3 = $Tax + $Tax2;
				$ShippingCost3 = $ShippingCost + $ShippingCost2;
				$Discount3 = $Discount + $Discount2;
				
				//echo "cost = ". $EstShipCost3. "<br>";
				
				
}

				

//echo "total cost = ". $InvCost3;



					$sql3 = "SELECT Sum(tblShipmentProduct.Quantity) as Quantity,
					tblShipmentProduct.ShipmentID, tblShipmentProduct.Complete, tblShipmentProduct.DetailID, tblPurchaseDetails2.DetailID,
					tblShipment3.DateTime, tblShipment3.ShipmentID, tblShipment3.PurchaseID, tblPurchaseDetails2.ProductID
					FROM tblShipment3
					INNER JOIN tblShipmentProduct
					ON tblShipment3.ShipmentID = tblShipmentProduct.ShipmentID
					INNER JOIN tblPurchaseDetails2
					ON tblShipmentProduct.DetailID = tblPurchaseDetails2.DetailID
					WHERE tblShipmentProduct.Complete = 'y'
					AND tblShipment3.DateTime >= '$FromDate' AND tblShipment3.DateTime <= '$ToDate'
					GROUP BY tblPurchaseDetails2.ProductID";
					echo $sql3;
					
	if($StateCheck == 'y')
	{
	
					
					$sql3 = "SELECT Sum(tblShipmentProduct.Quantity) as Quantity,
					tblShipmentProduct.ShipmentID, tblShipmentProduct.Complete, tblShipmentProduct.DetailID, tblPurchaseDetails2.DetailID,
					tblShipment3.DateTime, tblShipment3.ShipmentID, tblShipment3.PurchaseID, tblPurchaseDetails2.ProductID, tblPurchase2.Status, tblPurchase2.PurchaseID, Sum(tblPurchaseDetails2.Quantity) as Quantity,
					tblPurchaseDetails2.PurchaseID, tblPurchaseDetails2.ProductID, tblPurchaseDetails2.Status, tblPurchaseDetails2.DetailID,
					tblPurchase2.DateTime, tblCustomer.CustomerID, tblCustomer.State, tblPurchase2.CustomerID
					FROM tblShipment3
					INNER JOIN tblShipmentProduct
					ON tblShipment3.ShipmentID = tblShipmentProduct.ShipmentID
					INNER JOIN tblPurchaseDetails2
					ON tblShipmentProduct.DetailID = tblPurchaseDetails2.DetailID
					INNER JOIN tblPurchase2
					ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
					INNER JOIN tblCustomer
					ON tblPurchase2.CustomerID = tblCustomer.CustomerID
					WHERE tblShipmentProduct.Complete = 'y'
					AND tblShipment3.DateTime >= '$FromDate' AND tblShipment3.DateTime <= '$ToDate' AND tblCustomer.State = '$State'
					GROUP BY tblPurchaseDetails2.ProductID";
		
	}			
					
					$result3 = mysql_query($sql3) or die("Cannot execute query silly man!");
					
					while($row3 = mysql_fetch_array($result3))
					{
						$DetailID = $row3[DetailID];
						$ProductID = $row3[ProductID];
						$Quantity = $row3[Quantity];
						$Shipped = $row3[Shipped];
					
							$sql2 = "SELECT * FROM tblProduct WHERE ProductID = '$ProductID'";
							$result2 = mysql_query($sql2) or die("Cannot execute query ProductID!");
							
							while($row2 = mysql_fetch_array($result2))
							{
							$ProductNickname = $row2[Nickname];
							$Cost = $row2[Cost];
							}
							


?>	
	    <tr>
      <td><div align="center"><font face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ProductNickname; ?></font></font></div></td>
      <td><div align="center"><font face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Quantity; ?></font></font></div></td>
    </tr>
	
	<?
	}
	?>
	
</table>
 <?
 
 	/*
 
 
	$sql6 = "SELECT tblPurchase2.PurchaseID, tblPurchase2.DateTime, tblShipment3.ShipmentID, tblShipment3.PurchaseID,
	tblShipment3.ShipmentCost, tblCustomer.CustomerID, tblPurchase2.CustomerID, tblCustomer.Type
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblCustomer.CustomerID = tblPurchase2.CustomerID
	INNER JOIN tblShipment3
	ON tblPurchase2.PurchaseID = tblShipment3.PurchaseID
	WHERE tblPurchase2.DateTime >= '$FromDate' AND tblPurchase2.DateTime < '$ToDate' AND tblPurchase2.Status = 'active'";
 
 
 	if($StateCheck == 'y')
	{
					
	$sql6 = "SELECT tblPurchase2.PurchaseID, tblPurchase2.DateTime, tblShipment3.ShipmentID, tblShipment3.PurchaseID,
	tblShipment3.ShipmentCost, tblCustomer.CustomerID, tblPurchase2.CustomerID, tblCustomer.Type, tblCustomer.State
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblCustomer.CustomerID = tblPurchase2.CustomerID
	INNER JOIN tblShipment3
	ON tblPurchase2.PurchaseID = tblShipment3.PurchaseID
	WHERE tblPurchase2.DateTime >= '$FromDate' AND tblPurchase2.DateTime < '$ToDate' AND tblPurchase2.Status = 'active'
	AND tblCustomer.State = '$State'";

	}			

 
 	echo $sql6;
	$result6 = mysql_query($sql6) or die("Cannot execute query poopy smoosher!");


	$ShipmentCost = 0;
						
					while($row6 = mysql_fetch_array($result6))
					{
						$ShipmentCost4 = $row6[ShipmentCost];
						$Type = $row6[Type];
						
						//echo $ShipmentCost4;
						
						if($Type == '5' OR $Type == '6')
						{
						$ShipmentCost2 = $ShipmentCost3;
						}
						else
						{
						$ShipmentCost2 = $ShipmentCost3 + $ShipmentCost4;
						}
						//echo "shipcost = ". $ShipmentCost2. "<br>";

						$ShipmentCost3 = $ShipmentCost + $ShipmentCost2;
					}
	
 
 
 	$ShipCost = $ShippingCost3 + $EstShipCost3;
				
	$ShipCostDiff = $ShipCost - $ShipmentCost3;
	
	*/
 ?>
 <?
 /*
 
 ?>
 
IGNORE BELOW: 
<table width="100%"  border="1" cellspacing="0" cellpadding="5">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Total Sales </font></strong></td>
      <td><div align="right"><strong><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($Subtotal3,2); ?>&nbsp;</font></strong></div></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Sales Tax Collected </font></td>
      <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($Tax3,2); ?></font></div></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Total Discounts </font></td>
      <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($Discount3,2); ?></font></div></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Total Inventory
          Cost</font></strong></td>
      <td><div align="right"><strong><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($InvCost3,2); ?></font></strong></div></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Shipping Costs Collected </font></td>
      <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($ShippingCost3,2); ?></font></div></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Estimated Shipping
          Cost (our built-in shipping costs)</font></td>
      <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($EstShipCost3,2); ?></font></div></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Shipping Costs we
          should be paying</font></td>
      <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($ShipCost,2); ?></font></div></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Shipping Costs we
          are paying </font></td>
      <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($ShipmentCost3,2); ?></font></div></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Shipping Cost -
          Difference (positive: we are making money on shipping; negative: we
          are losing money) </font></td>
      <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($ShipCostDiff,2); ?></font></div></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Estimated Bank Charges </font></td>
      <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo $BankCharges; ?></font></div></td>
    </tr>
</table>
  
  <?
  */
  ?>
  
  <p>&nbsp;</p>
  <p>&nbsp;</p>

  
  
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