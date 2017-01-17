<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{



// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";



// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>



<?
	//users search mechanism
	$radio = $_POST['radioSelection'];
	
	//time search variables
	$timeType = $_POST['cboTime'];
	$fromDate = $_POST['txtFromDate'];
	$toDate = $_POST['txtToDate'];
	
	//customerID
	$customerID = $_POST['txtCustomerID'];
	
	//purchaseID
	$purchaseID = $_POST['txtPurchaseID'];
	
	//FirstName
	$firstName = $_POST['txtFirstName'];
	
	//LastName
	$lastName = $_POST['txtLastName'];
	
	//city
	$city = $_POST['txtCity'];
	
	//state
	$state = $_POST['txtState'];	
	
	//zipcode
	$zipcode = $_POST['txtZipCode'];
	
	//country
	$country = $_POST['txtCountry'];
	
	//ebayname
	$ebayname = $_POST['txtEbayName'];
	
	//ebayitemnumber
	$ebayitemnumber = $_POST['txtEbayItemNumber'];
	
	//type
	$type = $_POST['txtType'];
	
		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT tblPurchase.PurchaseID, tblPurchase.CustomerID, tblCustomer.LastName, tblCustomer.FirstName, tblCustomer.Type, tblProduct.ProductName, tblPurchase.NumOrdered, tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.Country, tblCustomer.Type, tblCustomer.EbayName, tblPurchase.EbayItemNumber,
			tblPurchase.TotalCost, DATE_FORMAT(tblPurchase.DateTime, '%m/%d/%y %H:%i') AS DateTime, tblPurchase.Shipped
			FROM tblCustomer INNER JOIN tblPurchase ON tblCustomer.CustomerID = tblPurchase.CustomerID INNER JOIN tblProduct ON tblPurchase.ProductID = tblProduct.ProductID";

	$today = date("Y-m-d");			
	$week = mktime (0,0,0,date("m"),date("d")-7,  date("Y"));
	$month = mktime (0,0,0,date("m")-1,date("d"),  date("Y"));
	$year = mktime (0,0,0,date("m"),date("d"),  date("Y")-1);
	
		
	if ($radio == "time")
	{
		if ($timeType == "other")
		{
			$sql .= " WHERE tblPurchase.DateTime >= '$fromDate' AND tblPurchase.DateTime <= '$toDate'";
		}
		else
		{
			if ($timeType == "today")
			{
				$sql .= " WHERE tblPurchase.DateTime >= '$today'";
			}
			
			if ($timeType == "week")
			{
				$sql .= " WHERE tblPurchase.DateTime >= '$week'";
			}
			
			if ($timeType == "month")
			{
				$sql .= " WHERE tblPurchase.DateTime >= '$month'";
			}
			
			if ($timeType == "year")
			{
				$sql .= " WHERE tblPurchase.DateTime >= '$year'";
			}
			
			if ($timeType == "all")
			{
				//then don't do anything, because it is already selecting all.
			}
		}			
	}
	
	if ($radio == "customerID")
	{
		$sql .= " WHERE tblPurchase.CustomerID = $customerID";
	}
	
	if ($radio == "purchaseID")
	{
		$sql .= " WHERE tblPurchase.PurchaseID = $purchaseID";
	}
	
		if ($radio == "firstname")
	{
		$sql .= " WHERE tblCustomer.FirstName = '$firstName'";
	}
	
	if ($radio == "lastname")
	{
		$sql .= " WHERE tblCustomer.LastName = '$lastName'";
	}

		if ($radio == "city")
	{
		$sql .= " WHERE tblCustomer.City = '$city'";
	}
	
			if ($radio == "state")
	{
		$sql .= " WHERE tblCustomer.State = '$state'";
	}
	
			if ($radio == "zipcode")
	{
		$sql .= " WHERE tblCustomer.ZipCode = '$zipcode'";
	}
	
			if ($radio == "country")
	{
		$sql .= " WHERE tblCustomer.Country = '$country'";
	}
	
				if ($radio == "ebayname")
	{
		$sql .= " WHERE tblCustomer.EbayName = '$ebayname'";
	}
	
	
				if ($radio == "ebayitemnumber")
	{
		$sql .= " WHERE tblPurchase.EbayItemNumber = '$ebayitemnumber'";
	}
	
	
		if ($radio == "type")
	{
		$sql .= " WHERE tblCustomer.Type = '$type'";
	}
	
	if ($radio == "notshipped")
	{
		$sql .= " WHERE tblPurchase.Shipped = 'n'";
	}

	if ($radio == "cancelled")
	{
		$sql .= " WHERE tblPurchase.Status = 'cancel'";
	}
	else
	{
		$sql .= " AND tblPurchase.Status = 'active'";
	}	
	
	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblPurchase.PurchaseID DESC";
		$sortBy ="tblPurchase.PurchaseID";
		$sortDirection = "DESC";
	}
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>

			
<p><font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Customer Search 
  Results</strong></font></p>
            
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
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
    <td width="8%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Details</font></strong></font></div></td>
    <td width="5%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/SearchResults.php?sort=tblPurchase.PurchaseID&d=<? if ($sortBy=="tblPurchase.PurchaseID") {echo $sd;} else {echo "ASC";}?>%0A%09%09%09%09">pID</a></font></strong></font></div></td>
    <td width="10%" class=sort><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/SearchResults.php?sort=tblCustomer.FirstName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";} ?>">First 
        Name</a></font></strong></font></div></td>
    <td width="10%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/SearchResults.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";} ?>">Last 
        Name</a></font></strong></font></div></td>
    <td width="14%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>City, 
        State Zip Code</strong></font></div></td>
    <td width="9%" class=sort> <div align="center"><font color="#003399" face="Arial, Helvetica, sans-serif"><strong><font size="2"><a href="../customers/SearchResults.php?sort=tblPurchase.NumOrdered&d=<? if ($sortBy=="tblPurchase.NumOrdered") {echo $sd;} else {echo "ASC";} ?>"># 
        Ordered</a></font></strong></font></div></td>
    <td width="7%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/SearchResults.php?sort=tblPurchase.TotalCost&d=<? if ($sortBy=="tblPurchase.TotalCost") {echo $sd;} else {echo "ASC";} ?>">Total</a></strong></font></div></td>
    <td width="11%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/SearchResults.php?sort=tblPurchase.DateTime&d=<? if ($sortBy=="tblPurchase.DateTime") {echo $sd;} else {echo "ASC";} ?>">Date 
        Time </a></strong></font></div></td>
    <td width="15%" class=sort><div align="center"><a href="../customers/SearchResults.php?sort=tblCustomer.Type&d=<? if ($sortBy=="tblCustomer.Type") {echo $sd;} else {echo "ASC";} ?>"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Type</strong></font></a></div></td>
  </tr>
  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$pID = $row[PurchaseID];
				$cID = $row[CustomerID];
				$lName = $row[LastName];
				$fName = $row[FirstName];
				$city = $row[City];
				$state = $row[State];
				$zipcode = $row[ZipCode];
				$country = $row[Country];
				$productName = $row[ProductName];
				$numOrdered = $row[NumOrdered];
				$total = $row[TotalCost];
				$dt = $row[DateTime];
				$shipped = $row[Shipped];
				$cID = $row[CustomerID];
				$Type = $row[Type];
				$ebayname = $row[EbayName];
				$ebayitemnumber = $row[EbayItemNumber];
				
				if ($shipped == "y")
				{
					$shipped = "yes";
				}
				else
				{
					$shipped = "no";
				}
				
			  ?>
  <tr> 
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerPurchaseEdit.php?purch=<? echo $pID; ?>&cust=<? echo $cID; ?>"><strong>Details</strong></a></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $pID; ?></strong></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $fName; ?></strong></font></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $lName; ?></strong></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $city; ?>, 
      <? echo $state; ?> <? echo $zipcode; ?></strong></font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $numOrdered; ?></strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($total,2); ?></strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $dt; ?></strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Type; ?></strong></font></div></td>
  </tr>
  <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
</table>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>



// finishes security for page
}
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
