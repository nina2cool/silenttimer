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
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View 
Sales by State</strong></font> 

  <?

	$sql = "Select * FROM tblCustomer";
	$result = mysql_query($sql) or die("Cannot retrieve state info, please try again.");

		while($row = mysql_fetch_array($result))
	
	{
	$TypeID = $row[Type];

	$sql2 = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum
			FROM tblPurchaseDetails2 INNER JOIN
			tblPurchase2
			ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
			INNER JOIN
			tblCustomer ON tblPurchase2.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.Type = '1' AND tblPurchase2.Status = 'active' AND tblPurchaseDetails2.ProductID = '1'
			OR tblCustomer.Type = '2' AND tblPurchase2.Status = 'active' AND tblPurchaseDetails2.ProductID = '1'";
	
	$result2 = mysql_query($sql2) or die("Cannot retrieve state info, please try again.");
	
	while($row2 = mysql_fetch_array($result2))
		{
		$NumWebSalesTotal = $row2[Sum];
		}


	$sql3 = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum
			FROM tblPurchaseDetails2 INNER JOIN
			tblPurchase2
			ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
			INNER JOIN
			tblCustomer ON tblPurchase2.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.Type = '6' AND tblPurchase2.Status = 'active' and tblPurchaseDetails2.ProductID = '1'";
	
	$result3 = mysql_query($sql3) or die("Cannot retrieve state info, please try again.");
	
	while($row3 = mysql_fetch_array($result3))
		{
		$NumBulkSalesTotal = $row3[Sum];
		}



	$sql4 = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum
			FROM tblPurchaseDetails2 INNER JOIN
			tblPurchase2
			ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
			INNER JOIN
			tblCustomer ON tblPurchase2.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.Type = '4' AND tblPurchase2.Status = 'active' and tblPurchaseDetails2.ProductID = '1'";
	
	$result4 = mysql_query($sql4) or die("Cannot retrieve state info, please try again.");
	
	while($row4 = mysql_fetch_array($result4))
		{
		$NumEbaySalesTotal = $row4[Sum];
		}

	$sql6 = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum
			FROM tblPurchaseDetails2 INNER JOIN
			tblPurchase2
			ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
			INNER JOIN
			tblCustomer ON tblPurchase2.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.Type = '3' AND tblPurchase2.Status = 'active' and tblPurchaseDetails2.ProductID = '1'";
	
	$result6 = mysql_query($sql6) or die("Cannot retrieve state info, please try again.");
	
	while($row6 = mysql_fetch_array($result6))
		{
		$NumAmazonSalesTotal = $row6[Sum];
		}
		
	$NumEbayAmazonSalesTotal = $NumEbaySalesTotal + $NumAmazonSalesTotal;
		

	$sql5 = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum
			FROM tblPurchaseDetails2 INNER JOIN
			tblPurchase2
			ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
			INNER JOIN
			tblCustomer ON tblPurchase2.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.Type <> '5' AND tblPurchase2.Status = 'active' and tblPurchaseDetails2.ProductID = '1'";
	
	$result5 = mysql_query($sql5) or die("Cannot retrieve state info, please try again.");
	
	while($row5 = mysql_fetch_array($result5))
		{
		$NumTotalSalesTotal = $row5[Sum];
		}

	}



?>
  <div align="right"><br>
    <a href="StatesPrint.php" target="_blank"><font size="3" face="Arial, Helvetica, sans-serif">Printable 
    Version </font></a> </div>
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

	
	$sql2 = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum
			FROM tblPurchaseDetails2 INNER JOIN
			tblPurchase2
			ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
			INNER JOIN
			tblCustomer ON tblPurchase2.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.State = '$State' AND tblCustomer.Type = '1' AND tblPurchase2.Status = 'active' and tblPurchaseDetails2.ProductID = '1'";
	
	$result2 = mysql_query($sql2) or die("Cannot retrieve state info, please try again.");
	
	while($row2 = mysql_fetch_array($result2))
		{
	
		$NumWebSales = $row2[Sum];
		
	
		}
	
	$sql3 = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum
			FROM tblPurchaseDetails2 INNER JOIN
			tblPurchase2
			ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
			INNER JOIN
			tblCustomer ON tblPurchase2.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.State = '$State' AND tblCustomer.Type = '6' AND tblPurchase2.Status = 'active' and tblPurchaseDetails2.ProductID = '1'";
	
	$result3 = mysql_query($sql3) or die("Cannot retrieve state info, please try again.");
	
	while($row3 = mysql_fetch_array($result3))
		{
	
		$NumBulkSales = $row3[Sum];
		
	
		}
	
			$sql5 = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum
			FROM tblPurchaseDetails2 INNER JOIN
			tblPurchase2
			ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
			INNER JOIN
			tblCustomer ON tblPurchase2.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.State = '$State' AND tblCustomer.Type = '3' AND tblPurchase2.Status = 'active' and tblPurchaseDetails2.ProductID = '1'";
	
	$result5 = mysql_query($sql5) or die("Cannot retrieve state info, please try again.");
	
	while($row5 = mysql_fetch_array($result5))
		{
	
		$NumEbaySales = $row5[Sum];

		}

		
		
					$sql6 = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum
			FROM tblPurchaseDetails2 INNER JOIN
			tblPurchase2
			ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
			INNER JOIN
			tblCustomer ON tblPurchase2.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.State = '$State' AND tblCustomer.Type = '4' AND tblPurchase2.Status = 'active' and tblPurchaseDetails2.ProductID = '1'";
	
	$result6 = mysql_query($sql6) or die("Cannot retrieve state info, please try again.");
	
	while($row6 = mysql_fetch_array($result6))
		{
	
		$NumAmazonSales = $row6[Sum];

		}
	
		$NumEbayAmazonSales = $NumEbaySales + $NumAmazonSales;
	
	if($NumEbayAmazonSales == '0')
	{
		$NumEbayAmazonSales = "";
	}
	
		
	$sql4 = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum
			FROM tblPurchaseDetails2 INNER JOIN
			tblPurchase2
			ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
			INNER JOIN
			tblCustomer ON tblPurchase2.CustomerID = tblCustomer.CustomerID
			WHERE tblCustomer.State = '$State' AND tblCustomer.Type <> '5' AND tblPurchase2.Status = 'active' and tblPurchaseDetails2.ProductID = '1'";
	
	$result4 = mysql_query($sql4) or die("Cannot retrieve state info, please try again.");
	
	while($row4 = mysql_fetch_array($result4))
		{
	
		$NumTotalSales = $row4[Sum];
		
	
		}
	
	
	
	
	?>
    <tr> 
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
    </tr>
    <?
	}
	
			  	}
				
			  ?>
  </table>
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