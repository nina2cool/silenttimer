<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{



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

	$Now = date("Y-m-d");


?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View 
Sales by State</strong></font> <br>
<em><font size="3" face="Arial, Helvetica, sans-serif"><strong>As of <? echo $Now; ?> 
</strong> </font></em> 
<form>
<?

	$sql = "Select * FROM tblCustomer";
	$result = mysql_query($sql) or die("Cannot retrieve state info, please try again.");

		while($row = mysql_fetch_array($result))
	
	{
	$Type = $row[Type];

	$sql2 = "SELECT Sum(tblPurchase.NumOrdered) AS Sum
			FROM tblPurchase INNER JOIN
			tblCustomer ON tblPurchase.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.Type = 'web' AND Status = 'active'";
	
	$result2 = mysql_query($sql2) or die("Cannot retrieve state info, please try again.");
	
	while($row2 = mysql_fetch_array($result2))
		{
		$NumWebSalesTotal = $row2[Sum];
		}


	$sql3 = "SELECT Sum(tblPurchase.NumOrdered) AS Sum
			FROM tblPurchase INNER JOIN
			tblCustomer ON tblPurchase.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.Type = 'bulk' AND Status = 'active'";
	
	$result3 = mysql_query($sql3) or die("Cannot retrieve state info, please try again.");
	
	while($row3 = mysql_fetch_array($result3))
		{
		$NumBulkSalesTotal = $row3[Sum];
		}



	$sql4 = "SELECT Sum(tblPurchase.NumOrdered) AS Sum
			FROM tblPurchase INNER JOIN
			tblCustomer ON tblPurchase.CustomerID = tblCustomer.CustomerID
			WHERE Status = 'active' AND tblCustomer.Type = 'ebay' OR tblCustomer.Type = 'amazon'";
	
	$result4 = mysql_query($sql4) or die("Cannot retrieve state info, please try again.");
	
	while($row4 = mysql_fetch_array($result4))
		{
		$NumEbaySalesTotal = $row4[Sum];
		}

	$sql6 = "SELECT Sum(tblPurchase.NumOrdered) AS Sum
			FROM tblPurchase INNER JOIN
			tblCustomer ON tblPurchase.CustomerID = tblCustomer.CustomerID
			WHERE Status = 'active' AND tblCustomer.Type = 'amazon'";
	
	$result6 = mysql_query($sql6) or die("Cannot retrieve state info, please try again.");
	
	while($row6 = mysql_fetch_array($result6))
		{
		$NumAmazonSalesTotal = $row6[Sum];
		}
		
	$NumEbayAmazonSalesTotal = $NumEbaySalesTotal + $NumAmazonSalesTotal;
		

	$sql5 = "SELECT Sum(tblPurchase.NumOrdered) AS Sum
			FROM tblPurchase INNER JOIN
			tblCustomer ON tblPurchase.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.Type <> 'samples' AND tblPurchase.Status <> 'cancel'";
	
	$result5 = mysql_query($sql5) or die("Cannot retrieve state info, please try again.");
	
	while($row5 = mysql_fetch_array($result5))
		{
		$NumTotalSalesTotal = $row5[Sum];
		}

	}



?>


  <table width="50%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td width="50%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"># 
        of Web Sales:</font></strong></td>
      <td width="46%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumWebSalesTotal; ?></font></strong></div></td>
    </tr>
    <tr> 
      <td width="50%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"># 
        of Bulk Sales:</font></strong></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumBulkSalesTotal; ?></font></strong></div></td>
    </tr>
    <tr> 
      <td width="50%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"># 
        of eBay/Amazon Sales:</font></strong></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumEbayAmazonSalesTotal; ?></font></strong></div></td>
    </tr>
    <tr bgcolor="#FFFFCC"> 
      <td width="50%" height="31"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">TOTAL 
        SALES:</font></strong></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumTotalSalesTotal; ?></font></strong></div></td>
    </tr>
  </table>
  <br>
  <table width="650" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
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
    <tr bgcolor="#CCCCCC"> 
      <td width="130" class=sort> 
        <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../reports/states.php?sort=tblState.State&d=<? if ($sortBy=="tblState.State") {echo $sd;} else {echo "ASC";} ?>">State</a></font></strong></div></td>
      <td width="130" class=sort> 
        <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"># 
          of Web Sales</font></strong></div></td>
      <td width="130" class=sort> 
        <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"># 
          of Bulk Sales</font></strong></div></td>
      <td width="130" class=sort> 
        <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"># 
          of eBay/Amazon Sales</font></strong></div></td>
      <td width="130" class=sort> 
        <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"># 
          of Total Sales</font></strong></div></td>
      <!--          <td width="17%" class=sort> <div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="management/managepurchases/viewpurchases.php?sort=tblProduct.ProductName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";} ?>">Product</a></strong></font></div></td>
                <td width="6%" class=sort> <div align="center"><font color="#003399" face="Arial, Helvetica, sans-serif"><strong><font size="2"><a href="management/managepurchases/viewpurchases.php?sort=tblPurchase.NumOrdered&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";} ?>">#</a></font></strong></font></div></td>
                <td width="11%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="management/managepurchases/viewpurchases.php?sort=tblPurchase.TotalCost&d=<? if ($sortBy=="tblPurchase.TotalCost") {echo $sd;} else {echo "ASC";} ?>">Total</a></strong></font></div></td>
                <td width="22%" class=sort> <div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="management/managepurchases/viewpurchases.php?sort=tblPurchase.DateTime&d=<? if ($sortBy=="tblPurchase.DateTime") {echo $sd;} else {echo "ASC";} ?>">Date 
                    Time </a></strong></font></div></td>
                <td width="12%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="management/managepurchases/viewpurchases.php?sort=tblPurchase.Shipped&d=<? if ($sortBy=="tblPurchase.Shipped") {echo $sd;} else {echo "ASC";} ?>">Shipped?</a></strong></font></div></td>
              </tr>
        
		-->
      <?
   
	$sql = "Select * FROM tblState";
	
		//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}
	
	$result = mysql_query($sql) or die("Cannot retrieve state info, please try again.");

		while($row = mysql_fetch_array($result))
	{
	$State = $row[State];

	
	$sql2 = "SELECT Sum(tblPurchase.NumOrdered) AS Sum
			FROM tblPurchase INNER JOIN
			tblCustomer ON tblPurchase.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.State = '$State' and tblCustomer.Type = 'web' AND Status = 'active'";
	
	$result2 = mysql_query($sql2) or die("Cannot retrieve state info, please try again.");
	
	while($row2 = mysql_fetch_array($result2))
		{
		$NumWebSales = $row2[Sum];
		}
	
	if($NumWebSales == "")
	{
		$NumWebSales = "-";
	}
	
	$sql3 = "SELECT Sum(tblPurchase.NumOrdered) AS Sum
			FROM tblPurchase INNER JOIN
			tblCustomer ON tblPurchase.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.State = '$State' and tblCustomer.Type = 'bulk' AND Status = 'active'";
	
	$result3 = mysql_query($sql3) or die("Cannot retrieve state info, please try again.");
	
	while($row3 = mysql_fetch_array($result3))
		{
		$NumBulkSales = $row3[Sum];
		}
	
	if($NumBulkSales == "")
	{
		$NumBulkSales = "-";
	}
	
			$sql5 = "SELECT Sum(tblPurchase.NumOrdered) AS Sum
			FROM tblPurchase INNER JOIN
			tblCustomer ON tblPurchase.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.State = '$State' and tblCustomer.Type = 'ebay' AND Status = 'active'";
	
	$result5 = mysql_query($sql5) or die("Cannot retrieve state info, please try again.");
	
	while($row5 = mysql_fetch_array($result5))
		{
	
		$NumEbaySales = $row5[Sum];

		}
		
		
			$sql6 = "SELECT Sum(tblPurchase.NumOrdered) AS Sum
			FROM tblPurchase INNER JOIN
			tblCustomer ON tblPurchase.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.State = '$State' and tblCustomer.Type = 'amazon' AND Status = 'active'";
	
	$result6 = mysql_query($sql6) or die("Cannot retrieve state info, please try again.");
	
	while($row6 = mysql_fetch_array($result6))
		{
	
		$NumAmazonSales = $row6[Sum];

		}
	
		$NumEbayAmazonSales = $NumEbaySales + $NumAmazonSales;
	
	if($NumEbayAmazonSales == '0')
	{
		$NumEbayAmazonSales = "-";
	}
	
		
	$sql4 = "SELECT Sum(tblPurchase.NumOrdered) AS Sum
			FROM tblPurchase INNER JOIN
			tblCustomer ON tblPurchase.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.State = '$State' AND Status = 'active'";
	
	$result4 = mysql_query($sql4) or die("Cannot retrieve state info, please try again.");
	
	while($row4 = mysql_fetch_array($result4))
		{
		$NumTotalSales = $row4[Sum];
		}
	
	if($NumTotalSales == "")
	{
		$NumTotalSales = "-";
	}
	
	
	?>
    <tr> 
      <!--					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="management/managepurchases/editpurchases.php?p=<? echo $pID; ?>&c=<? echo $cID; ?>"><strong>Details</strong></a></font></div></td> -->
      <!--	<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $pID; ?></strong></font></div></td> -->
      <td width="130"> 
        <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></strong></div></td>
      <td width="130"> 
        <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumWebSales; ?></font></strong></div></td>
      <td width="130">
<div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumBulkSales; ?></font></strong></div></td>
      <td width="130"> 
        <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumEbayAmazonSales; ?></font></strong></div></td>
      <td width="130" bgcolor="#FFFFCC"> 
        <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumTotalSales; ?></font></strong></div></td>
      <!--					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $numOrdered; ?></strong></font></div></td>
					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo $total; ?></strong></font></div></td>
					<td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $dt; ?></strong></font></div></td>
					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="#"><strong><? echo $shipped; ?></strong></a></font></div></td>  -->
    </tr>
    <?
	}
	
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
  </table>
  <p>&nbsp;</p>
  </form>
  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.


// finishes security for page
?>
