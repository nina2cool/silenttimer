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

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	

	//users search mechanism
	$chkpurchaseid = $_POST['chkpurchaseid'];
	$chkfirstname = $_POST['chkfirstname'];
	$chklastname = $_POST['chklastname'];
	$chkaddress = $_POST['chkaddress'];
	$chkcity = $_POST['chkcity'];
	$chkstate = $_POST['chkstate'];
	$chkzipcode = $_POST['chkzipcode'];
	$chkemail = $_POST['chkemail'];
	$chkcountry = $_POST['chkcountry'];
	$chkphone = $_POST['chkphone'];
	$chkebayname = $_POST['chkebayname'];
	$chklast4 = $_POST['chklast4'];
	$chkauth = $_POST['chkauth'];
	$chktestid = $_POST['chktestid'];
	$chktestdate = $_POST['chktestdate'];
	$chkreferredby = $_POST['chkreferredby'];
	$chktype = $_POST['chktype'];
	$chkschool = $_POST['chkschool'];
	$chkprepclass = $_POST['chkprepclass'];
	$chkitemnumber = $_POST['chkitemnumber'];
	$chkpaypalnumber = $_POST['chkpaypalnumber'];
	$chkcustomerid = $_POST['chkcustomerid'];
	$chkstatus = $_POST['chkstatus'];
	$chkproduct = $_POST['chkproduct'];

	//time search variables
	$timeType = $_POST['cboTime'];
	$fromDate = $_POST['txtFromDate'];
	$toDate = $_POST['txtToDate'];
	
	//customerID
	$CustomerID = $_POST['txtCustomerID'];
	
	//purchaseID
	$PurchaseID = $_POST['txtPurchaseID'];
	
	//FirstName
	$FirstName = $_POST['txtFirstName'];
	
	//LastName
	$LastName = $_POST['txtLastName'];
	
	//Address 1
	$Address = $_POST['txtAddress'];
	
	//city
	$City = $_POST['txtCity'];
	
	//state
	$State = $_POST['txtState'];	
	
	//zipcode
	$ZipCode = $_POST['txtZipCode'];
	
	//email
	$Email = $_POST['txtEmail'];
	
	//country
	$Country = $_POST['txtCountry'];
	
	//ebayname
	$EbayName = $_POST['txtEbayName'];
	
	//phone number
	$PhoneNumber = $_POST['txtPhone'];
	
	//ebayitemnumber
	$EbayItemNumber = $_POST['txtItemNumber'];
	
	//type
	$Type = $_POST['Type'];
	
	//Referred By
	$ReferredByID = $_POST['ReferredBy'];
	
	//last 4 digits
	$Last4 = $_POST['txtLast4'];
	
	//AUTH
	$Auth = $_POST['txtAuth'];
	
	//TEST ID
	$TestID = $_POST['txtTestID'];
	
	//Test Date
	$TestDate = $_POST['txtTestDate'];
	
	//School
	$School = $_POST['txtSchool'];
	
	//PrepClass
	$PrepClass = $_POST['txtPrepClass'];
	
	//Paypal Number
	$PaypalNumber = $_POST['txtPaypalNumber'];
	
	//Status
	$Status = $_POST['Status'];
	
	//ProductID
	$ProductID = $_POST['ProductID'];
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblCustomer.LastName, tblCustomer.Address,
	tblCustomer.FirstName, tblCustomer.Type, tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.CountryID, 
	 tblCustomer.Type, tblCustomer.EbayName, tblCustomer.Phone, tblCustomer.Email,
	  tblPurchase2.Subtotal, tblPurchase2.PaypalNumber, tblPurchase2.TestID, tblPurchase2.TestDate, tblPurchase2.ReferredByID,
	 tblCustomer.School, tblCustomer.PrepClass, tblPurchase2.Status, tblCustomer.CustomerID,
	 DATE_FORMAT(tblPurchase2.OrderDateTime, '%m/%d/%y %H:%i') AS DateTime,
	  tblPurchase2.Shipped, tblPurchaseDetails2.PurchaseID, tblPurchaseDetails2.ProductID, tblPurchaseDetails2.Shipped, 
	  tblPurchaseDetails2.DetailID,
	  tblPurchaseDetails2.EbayItemNumber, tblPurchase2.LastFourCr, tblPurchase2.BankCode
	FROM tblCustomer INNER JOIN tblPurchase2 
	ON tblCustomer.CustomerID = tblPurchase2.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID";


if ($chkfirstname == "y")
{
	$sql .= " AND tblCustomer.FirstName LIKE '$FirstName%'";
}

if ($chklastname == "y")
{
	$sql .= " AND tblCustomer.LastName LIKE '$LastName%'";
}

if ($chkaddress == "y")
{
	$sql .= " AND tblCustomer.Address LIKE '%$Address%'";
}

if ($chkcity == "y")
{
	$sql .= " AND tblCustomer.City LIKE '$City%'";
}

if ($chkstate == "y")
{
	$sql .= " AND tblCustomer.State = '$State'";
}

if ($chkzipcode == "y")
{
	$sql .= " AND tblCustomer.ZipCode LIKE '$ZipCode%'";
}

if ($chkemail == "y")
{
	$sql .= " AND tblCustomer.Email LIKE '%$Email%'";
}

if ($chkcountry == "y")
{
	$sql .= " AND tblCustomer.CountryID LIKE '$Country%'";
}

if ($chkphone == "y")
{
	$sql .= " AND tblCustomer.Phone LIKE '%$PhoneNumber%'";
}

if ($chkebayname == "y")
{
	$sql .= " AND tblCustomer.EbayName LIKE '%$EbayName%'";
}

if ($chklast4 == "y")
{
	$sql .= " AND tblPurchase2.LastFourCr LIKE '%$Last4%'";
}

if ($chkauth == "y")
{
	$sql .= " AND tblPurchase2.BankCode LIKE '%$Auth%'";
}

if ($chktestid == "y")
{
	$sql .= " AND tblPurchase2.TestID = '$TestID'";
}

if ($chktestdate == "y")
{
	$sql .= " AND tblPurchase2.TestDate LIKE '%$TestDate%'";
}

if ($chkreferredby == "y")
{
	$sql .= " AND tblPurchase2.ReferredByID = '$ReferredByID'";
}

if ($chktype == "y")
{
	$sql .= " AND tblCustomer.Type = '$Type'";
}

if ($chkschool == "y")
{
	$sql .= " AND tblCustomer.School LIKE '%$School%'";
}

if ($chkprepclass == "y")
{
	$sql .= " AND tblCustomer.PrepClass LIKE '%$PrepClass%'";
}

if ($chkitemnumber == "y")
{
	$sql .= " AND tblPurchaseDetails2.EbayItemNumber LIKE '%$EbayItemNumber%'";
}

if ($chkpaypalnumber == "y")
{
	$sql .= " AND tblPurchase2.PaypalNumber LIKE '%$PaypalNumber%'";
}

if ($chkstatus == "y")
{
	$sql .= " AND tblPurchase2.Status = '$Status'";
}

if ($chkcustomerid == "y")
{
	$sql .= " AND tblCustomer.CustomerID LIKE '%$CustomerID%'";
}

if ($chkpurchaseid == "y")
{
	$sql .= " AND tblPurchase2.PurchaseID LIKE '%$PurchaseID%'";
}

if ($chkproduct == "y")
{
	$sql .= " AND tblPurchaseDetails2.ProductID = '$ProductID'";
}

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblCustomer.LastName ASC";
		$sortBy ="tblCustomer.LastName";
		$sortDirection = "ASC";
	}


	//echo $sql;
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute search function!");
	
	$SumResults = mysql_num_rows($result);
	

?><title>Search Results</title>
<p><font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Customer Search 
  Results</strong></font></p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Number of results: <strong><? echo $SumResults; ?></strong></font></strong></p>
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
    <td width="8%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">CustomerID</font></strong></font></div></td>
    <td width="10%" class=sort><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/SearchResults.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";} ?>">Last
                Name</a></font></strong></font></div></td>
    <td width="10%" class=sort><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/SearchResults.php?sort=tblCustomer.FirstName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";} ?>">First 
        Name</a></font></strong></font></div></td>
    <td width="14%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>City, 
        State Zip Code</strong></font></div></td>
    <td width="7%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/SearchResults.php?sort=tblPurchase2.Subtotal&d=<? if ($sortBy=="tblPurchase2.Subtotal") {echo $sd;} else {echo "ASC";} ?>">Subtotal</a></strong></font></div></td>
    <td width="11%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/SearchResults.php?sort=tblPurchase2.OrderDateTime&d=<? if ($sortBy=="tblPurchase2.OrderDateTime") {echo $sd;} else {echo "ASC";} ?>">Date 
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
				$Address = $row[Adress];
				$city = $row[City];
				$state = $row[State];
				$zipcode = $row[ZipCode];
				$country = $row[Country];
				//$productName = $row[ProductName];
				//$numOrdered = $row[NumOrdered];
				$Subtotal = $row[Subtotal];
				$dt = $row[DateTime];
				$shipped = $row[Shipped];
				$cID = $row[CustomerID];
				$Type = $row[Type];
				$ebayname = $row[EbayName];
				$ebayitemnumber = $row[EbayItemNumber];
				$last4 = $row[LastFourCr];
				
				
				
				$sql2 = "SELECT * FROM tblCustomerType WHERE TypeID = '$Type'";
				$result2 = mysql_query($sql2) or die("Cannot get type info");
				
				while($row2 = mysql_fetch_array($result2))
				{
				$TypeName = $row2[Type];
				}
				
				/*
				$sql3 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID'";
				$result3 = mysql_query($sql3) or die("Cannot get purchase details info");
				
				while($row3 = mysql_fetch_array($result3))
				{
						if ($chkproduct == "y")
						{
							$sql .= " AND tblPurchaseDetails2.ProductID = '$ProductID'";
						}
				*/
				
				
			  ?>
  <tr> 
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $cID; ?>" target="_blank"><strong><? echo $cID; ?></strong></a></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $lName; ?></strong></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $fName; ?></strong></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $city; ?>, 
      <? echo $state; ?> <? echo $zipcode; ?></strong></font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($Subtotal,2); ?></strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $dt; ?></strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $TypeName; ?></strong></font></div></td>
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
