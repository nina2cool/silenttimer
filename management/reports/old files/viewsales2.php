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
<p align="center"><font size="5" face="Arial, Helvetica, sans-serif"><strong>Sales 
  Report</strong></font> </p>

<?
	//users search mechanism
	$chk = $_POST['chkTime'];
	$chk1 = $_POST['chkState'];
	$chk2 = $_POST['chkCity'];
	$chk3 = $_POST['chkPrepClass'];
	$chk4 = $_POST['chkSchool'];
	$chk5 = $_POST['chkReferredBy'];
	$chk6 = $_POST['chkProduct'];
	$chk7 = $_POST['chkTest'];				
	
	//time search variables
	$timeType = $_POST['cboTime'];
	$fromDate = $_POST['txtFromDate'];
	$toDate = $_POST['txtToDate'];
	
	//State
	$state = $_POST['cboState'];
	
	//City
	$city = $_POST['cboCity'];
	
	//Prep Class
	$prepclass = $_POST['cboPrepClass'];
	
	//City
	$school = $_POST['txtSchool'];
	
	//referred by
	$referredby = $_POST['txtReferredBy'];
	
	//product
	$productID = $_POST['cboProduct'];
	
	//Test
	$test = $_POST['cboTest'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//beginning SQL statement that gets all data from tables.
	//$sql = "SELECT SUM( TotalCost ) AS TotalCost, SUM( NumOrdered ) AS NumOrdered, SUM( ShippingCost ) AS ShippingCost, SUM( Tax ) AS Tax	FROM tblProduct, tblTests, tblCustomer LEFT JOIN tblPurchase ON tblProduct.ProductID = tblPurchase.ProductID			WHERE tblPurchase.TestID = tblTests.TestID AND tblPurchase.CustomerID = tblCustomer.CustomerID AND tblPurchase.ProductID IS NOT NULL"; 
	
	$sql2 = "SELECT * FROM tblProduct";
	$query2 = "SELECT Cost FROM tblProduct WHERE ProductID = '$productID'";
	$result2 = mysql_query($query2) or die("Cannot execute query2!");
	
	while($row = mysql_fetch_array($result2))
		{
		$cost = $row[Cost];
		}
	
	$sql = "SELECT tblPurchase.ProductID, tblPurchase.CustomerID, tblPurchase.ReferredBy, tblPurchase.NumOrdered, tblPurchase.Tax, tblPurchase.TotalCost, tblPurchase.DateTime,
			tblPurchase.ShippingCost, tblProduct.ProductID, tblCustomer.CustomerID, tblCustomerID.State, tblCustomerID.City, tblCustomer.PrepClass, tblCustomer.School
			FROM tblPurchase INNER JOIN tblCustomer ON tblCustomer.CustomerID = tblPurchase.CustomerID";
							
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
	
	if ($chk1 == "state")
	{
		$sql .= " AND tblCustomer.State = '$state'";
		$display = "State"; 
	}
	
	if ($chk2 == "city")
	{
		$sql .= " AND tblCustomer.City = '$city'";
		
		If ($display == "")
			{
				$display .= "City";
			} 
		else
			{
				$display.= ", City";
			}
	}
	
	if ($chk3 == "prepclass")
	{
		$sql .= " AND tblCustomer.PrepClass = '$prepclass'";
		
		If ($display == "")
			{
				$display .= "Prep Class";
			} 
		else
			{
				$display.= ", Prep Class";
			}
	}
	
	if ($chk4 == "school")
	{
		$sql .= " AND tblCustomer.School = '$school'";
		
		If ($display == "")
			{
				$display .= "School";
			} 
		else
			{
				$display.= ", School";
			}
	}	
	
	if ($chk5 == "referredby")
	{
		$sql .= " AND tblPurchase.ReferredBy = '$referredby'";
		
		If ($display == "")
			{
				$display .= "Referred By";
			} 
		else
			{
				$display.= ", Referred By";
			}
	}
	
	if ($chk6 == "product")
	{
		$sql .= " AND tblProduct.ProductID = $productID";
		
		If ($display == "")
			{
				$display .= "Product";
			} 
		else
			{
				$display.= ", Product";
			}
	}
	
	if ($chk7 == "test")
	{
		$sql .= " AND tblTests.TestID = '$test'";
			
		If ($display == "")
			{
				$display .= "Test";
			} 
		else
			{
				$display.= ", Test";
			}
		
	}
	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}
	
	//put SQL statement into result set for loop through records
	
	$result = mysql_query($sql) or die("Cannot execute query!");

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
				$totShipping = $row[ShippingCost];
				$totSales = $row[TotalCost];
				$totCost = $totNumOrdered * $cost;
				$profitorloss = $totSales - ($totCost + $totTax + $totShipping);
				}					
			  ?>
<p align='center'><font color='#003399'>Searching By: <? if ($display!="") {echo $display;} else {echo "All";}?>.</font></p>
			 
<table width="70%" border="0" cellpadding="7" align="center" cellspacing="0" bordercolor="#003399">
		<tr bgcolor="#CCCCCC"> 
      <td width="70%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Revenue</font></strong></font></div></td>
     <td width="30%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Amount</strong></font></div></td>
     </tr>
     <tr> 
     <td><div><font size="2" face="Arial, Helvetica, sans-serif"><strong>Total 
        Income from Sales</strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo "$ "; echo $totSales; ?></strong></font></div></td>
    </tr>
	</table>
            
	<table width="70%" border="0" cellpadding="7" align="center" cellspacing="0" bordercolor="#003399">
    	<tr bgcolor="#CCCCCC"> 
			<td width="70%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Expenses</font></strong></font></div></td>
			<td width="30%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Amount</strong></font></div></td>
        </tr>
		<tr> 
			<td><div><font size="2" face="Arial, Helvetica, sans-serif"><strong>Cost 
        Of Goods Sold</strong></font></div></td>
			<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo "$ "; echo $totCost; ?></strong></font></div></td>
		</tr>
		<tr> 
		 <td><div><font size="2" face="Arial, Helvetica, sans-serif"><strong>Tax 
        Collected (TX only)</strong></font></div></td>
		 <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo "$ "; echo $totTax; ?></strong></font></div></td>
     	</tr>		  
		<tr> 
			<td><div><font size="2" face="Arial, Helvetica, sans-serif"><strong>Number of Timers Sold</strong></font></div></td>
			<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $totNumOrdered; ?></strong></font></div></td>
		</tr>
		<tr> 
			<td><div><font size="2" face="Arial, Helvetica, sans-serif"><strong>Total Cost of Shipping Timer</strong></font></div></td>
			<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo "$ "; echo $totShipping; ?></strong></font></div></td>
		</tr>
 
	</table>

<table width="70%" border="0" cellpadding="7" align="center" cellspacing="0" bordercolor="#003399">
   <tr bgcolor="#CCCCCC"> 
    <td width="70%" class=sort> <div align="right"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Profit 
        (Loss)</font></strong></font></div></td>
    <td width="30%" class=sort> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo "$ "; echo $profitorloss; ?></strong></font><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"></font></div></td>
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

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
