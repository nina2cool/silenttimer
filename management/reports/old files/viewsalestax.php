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
<p align="center"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>SILENT 
  TECHNOLOGY, LLC</strong></font></p>
<p align="center"><font size="5" face="Arial, Helvetica, sans-serif"><strong>Texas 
  Sales Tax Report</strong></font> </p>

<?
	//users search mechanism
	$chk = $_POST['chkTime'];		
	
	//time search variables
	$timeType = $_POST['cboTime'];
	$fromDate = $_POST['txtFromDate'];
	$toDate = $_POST['txtToDate'];
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT SUM(TotalCost) AS TotalCost, SUM(NumOrdered) AS NumOrdered,
			SUM(ShipmentCost) AS ShippingCost, SUM(Tax) AS Tax
			FROM tblProduct, tblCustomer, tblShipment
			LEFT JOIN tblPurchase ON tblProduct.ProductID = tblPurchase.ProductID
			WHERE tblPurchase.PurchaseID = tblShipment.PurchaseID
			AND tblPurchase.CustomerID = tblCustomer.CustomerID
			AND tblCustomer.State = 'TX'
			AND tblCustomer.Type <> 'bulk'
			AND tblCustomer.Type <> 'samples'
			AND tblPurchase.Status = 'active'
			AND tblPurchase.ProductID IS NOT NULL";
			
	
	$today = date("Y-m-d");			
	$week = mktime (0,0,0,date("m"),date("d")-7,  date("Y"));
	$month = mktime (0,0,0,date("m")-1,date("d"),  date("Y"));
	$year = mktime (0,0,0,date("m"),date("d"),  date("Y")-1);
	
	if ($chk == "time")
	{
		if ($timeType == "other")
		{
			$sql .= " AND tblPurchase.DateTime >= '$fromDate' AND tblPurchase.DateTime <= '$toDate'";
		}
		else
		{
			if ($timeType == "today")
			{
				$sql .= " AND tblPurchase.DateTime >= '$today'";
			}
			
			if ($timeType == "week")
			{
				$sql .= " AND tblPurchase.DateTime >= '$week'";
			}
			
			if ($timeType == "month")
			{
				$sql .= " AND tblPurchase.DateTime >= '$month'";
			}
			
			if ($timeType == "year")
			{
				$sql .= " AND tblPurchase.DateTime >= '$year'";
			}
			
			if ($timeType == "all")
			{
				//then don't do anything, because it is already selecting all.
			}
		}			
	}
	

	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}
	
	//put SQL statement into result set for loop through records
	
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	
	
	$sql7 = "SELECT Cost FROM tblProduct WHERE ProductID = '1'";
	$result7 = mysql_query($sql7) or die("Cannot execute find product cost!");
	
	while($row7 = mysql_fetch_array($result7))
		{
		$cost = $row7[Cost];
		}


?>
<?
			   // code to handle sort direction
			   // this following code just switches teh ascending order to descending and vice verca when necessary.
			   // The links in the titles of the colum fields are changed depending on the value in this variable and
			   // depending on what is being sorted by.
			   if ($sortDirection == "ASC")
			   {
			   		$sd = "DESC";
			   }
			   else
			   {
			   		$sd = "ASC";
			   }

			  ?>
<?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$totNumOrdered = $row[NumOrdered];
				$totTax = $row[Tax];

				$totSale = $row[TotalCost];
				$totCost = $totNumOrdered * $cost;
				$profitorloss = $totSale - ($totCost + $totTax + $totShipping);
				$PurchaseID = $row[PurchaseID];
				
				$sql2 = "SELECT sum(ShipmentCost) AS ShippingCost2 FROM tblShipment WHERE PurchaseID = '$PurchaseID'";
				$result2 = mysql_query($sql2) or die("Cannot find shipping cost!");			
				
				
				while($row2 = mysql_fetch_array($result2))
				{
				$totShipping = $row2[ShippingCost2];
				
				
				$totSales = $totSale - $totShipping - $totCost;
				
				}
				}					
			  echo $totShipping;
			  
			 $sql3 = "SELECT SUM(TotalCost) AS TotalCost, SUM(NumOrdered) AS NumOrdered,
			SUM(ShippingCost) AS ShippingCost, SUM(Tax) AS Tax
			FROM tblProduct, tblCustomer
			LEFT JOIN tblPurchase ON tblProduct.ProductID = tblPurchase.ProductID
			WHERE tblPurchase.CustomerID = tblCustomer.CustomerID
			AND tblPurchase.Status = 'active'
			AND tblPurchase.ProductID IS NOT NULL";
			

	
	
	
	if ($chk == "time")
	{
		if ($timeType == "other")
		{
			$sql3 .= " AND tblPurchase.DateTime >= '$fromDate' AND tblPurchase.DateTime <= '$toDate'";
		}
		else
		{
			if ($timeType == "today")
			{
				$sql3 .= " AND tblPurchase.DateTime >= '$today'";
			}
			
			if ($timeType == "week")
			{
				$sql3 .= " AND tblPurchase.DateTime >= '$week'";
			}
			
			if ($timeType == "month")
			{
				$sql3 .= " AND tblPurchase.DateTime >= '$month'";
			}
			
			if ($timeType == "year")
			{
				$sql3 .= " AND tblPurchase.DateTime >= '$year'";
			}
			
			if ($timeType == "all")
			{
				//then don't do anything, because it is already selecting all.
			}
		}			
	}
	
		$result3 = mysql_query($sql3) or die("Cannot find all revenue!");  
	
	
	 			while($row3 = mysql_fetch_array($result3))
				{
			
				$totSalesAll = $row3[TotalCost];
			
				}					

			  
			  
			  ?>
<p align='center'><font color='#003399'>Searching By: <? if ($display!="") {echo $display;} else {echo "All";}?>.</font></p>
			 
<table width="70%" border="0" cellpadding="7" align="center" cellspacing="0" bordercolor="#003399">
  <tr bgcolor="#CCCCCC"> 
      <td width="70%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Revenue</font></strong></font></div></td>
     <td width="30%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Amount</strong></font></div></td>
     </tr>
     
  <tr bgcolor="#FFFFCC"> 
    <td> 
      <div><font size="2" face="Arial, Helvetica, sans-serif"><strong>Taxable
             Revenue from TX Sales</strong></font></div></td>
    <td> 
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo "$ "; echo number_format($totSales,2); ?></strong></font></div></td>
    </tr>
	</table>
            
	
<table width="70%" border="0" cellpadding="7" align="center" cellspacing="0" bordercolor="#003399">
  <tr bgcolor="#FFFFCC"> 
    <td class=sort><font size="2" face="Arial, Helvetica, sans-serif"><strong>Total 
      Revenue from All Sales (no shipping)</strong></font></td>
    <td class=sort> 
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo "$ "; echo number_format($totSalesAll,2); ?></strong></font></div></td>
  </tr>
  <tr> 
    <td width="70%" bgcolor="#CCCCCC" class=sort> 
      <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Expenses</font></strong></font></div></td>
    <td width="30%" bgcolor="#CCCCCC" class=sort> 
      <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Amount</strong></font></div></td>
  </tr>
  <tr> 
    <td><div><font size="2" face="Arial, Helvetica, sans-serif"><strong>Cost Of 
        Good Sold</strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo "$ "; echo number_format($totCost,2); ?></strong></font></div></td>
  </tr>
  <tr bgcolor="#FFFFCC"> 
    <td> 
      <div><font size="2" face="Arial, Helvetica, sans-serif"><strong>Tax collected</strong></font></div></td>
    <td> 
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo "$ "; echo number_format($totTax,2); ?></strong></font></div></td>
  </tr>
  <tr> 
    <td><div><font size="2" face="Arial, Helvetica, sans-serif"><strong>Number 
        of Timers Sold to TX</strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $totNumOrdered; ?></strong></font></div></td>
  </tr>
  <tr> 
    <td><div><font size="2" face="Arial, Helvetica, sans-serif"><strong>Total 
        Cost of Shipping Timer</strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo "$ "; echo number_format($totShipping,2); ?></strong></font></div></td>
  </tr>
</table>

<table width="70%" border="0" cellpadding="7" align="center" cellspacing="0" bordercolor="#003399">
   <tr bgcolor="#CCCCCC"> 
    <td width="70%" class=sort> <div align="right"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Profit 
        (Loss)</font></strong></font></div></td>
    <td width="30%" class=sort> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo "$ "; echo number_format($profitorloss,2); ?></strong></font><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"></font></div></td>
  </tr>

					<?
						mysql_close($link);
					?>
 </table>

<p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>



<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.
require "../include/footerlinks.php";


// finishes security for page
}
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
