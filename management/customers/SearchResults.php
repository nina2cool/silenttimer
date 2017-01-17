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
	
	//customer info - check boxes
	$chkcustomerid = $_POST['chkcustomerid'];
	$chkcompany = $_POST['chkcompany'];
	$chkfirstname = $_POST['chkfirstname'];
	$chklastname = $_POST['chklastname'];
	$chkaddress = $_POST['chkaddress'];
	$chkaddress2 = $_POST['chkaddress2'];
	$chkcity = $_POST['chkcity'];
	$chkstate = $_POST['chkstate'];
	$chkzipcode = $_POST['chkzipcode'];
	$chkcountry = $_POST['chkcountry'];
	$chkemail = $_POST['chkemail'];
	$chkphone = $_POST['chkphone'];
	$chkebayname = $_POST['chkebayname'];
	$chkschool = $_POST['chkschool'];
	$chkprepclass = $_POST['chkprepclass'];
	$chktype = $_POST['chktype'];
	
				//customer info - text boxes
				$CustomerID = $_POST['CustomerID'];
				$Company = $_POST['Company'];
				$FirstName = $_POST['FirstName'];
				$LastName = $_POST['LastName'];
				$Address = $_POST['Address'];
				$Address2 = $_POST['Address2'];
				$City = $_POST['City'];
				$State = $_POST['State'];	
				$ZipCode = $_POST['ZipCode'];
				$CountryID = $_POST['CountryID'];
				$Email = $_POST['Email'];
				$EbayName = $_POST['EbayName'];
				$PhoneNumber = $_POST['Phone'];	
				$School = $_POST['School'];
				$PrepClass = $_POST['PrepClass'];	
				$Type = $_POST['Type'];
	
	//purchase info - check boxes
	$chkpurchaseid = $_POST['chkpurchaseid'];
	$chkdaterange = $_POST['chkdaterange'];
	$chktestid = $_POST['chktestid'];
	$chktestdate = $_POST['chktestdate'];
	$chkreferredby = $_POST['chkreferredby'];
	$chksubtotal = $_POST['chksubtotal'];
	$chktax = $_POST['chktax'];
	$chkdiscount = $_POST['chkdiscount'];
	$chkshippingcost = $_POST['chkshippingcost'];
	$chkshipcostID = $_POST['chkshipcostID'];
	$chkcardtype	 = $_POST['chkcardtype'];
	$chklast4 = $_POST['chklast4'];
	$chkauth = $_POST['chkauth'];
	$chkischeck = $_POST['chkischeck'];
	$chkpaypalnumber = $_POST['chkpaypalnumber'];
	$chkip = $_POST['chkip'];
	$chkstatus = $_POST['chkstatus'];
	
				//purchase info - test boxes
				$PurchaseID = $_POST['PurchaseID'];
				$StartDate = $_POST['StartDate'];
				$EndDate = $_POST['EndDate'];
				$TestID = $_POST['TestID'];
				$TestDate = $_POST['TestDate'];
				$ReferredByID = $_POST['ReferredBy'];
				$Subtotal = $_POST['Subtotal'];
				$Tax = $_POST['Tax'];
				$Discount = $_POST['Discount'];
				$ShippingCost = $_POST['ShippingCost'];
				$ShipCostID = $_POST['ShipCostID'];
				$CardType = $_POST['CardType'];
				$Last4 = $_POST['Last4'];
				$Auth = $_POST['Auth'];
				$IsCheck = $_POST['IsCheck'];
				$PaypalNumber = $_POST['PaypalNumber'];
				$IP = $_POST['IP'];
				$Status = $_POST['Status'];

	//product info - check boxes
	$chkproduct = $_POST['chkproduct'];
	$chkquantity = $_POST['chkquantity'];
	$chkshipped = $_POST['chkshipped'];
	$chkreplacement = $_POST['chkreplacement'];
	$chkitemnumber = $_POST['chkitemnumber'];
	$chkpstatus = $_POST['chkpstatus'];
	
				//product info - text boxes
				$ProductID = $_POST['ProductID'];
				$Quantity = $_POST['Quantity'];
				$Shipped = $_POST['Shipped'];
				$Replacement = $_POST['Replacement'];
				$EbayItemNumber = $_POST['ItemNumber'];
				$ProductStatus = $_POST['PStatus'];
	
	//bulk order info - check boxes
	$chkpaid = $_POST['chkpaid'];
	$chkpaymentterms = $_POST['chkpaymentterms'];
	$chkinvoicenumber = $_POST['chkinvoicenumber'];
	$chkponumber = $_POST['chkponumber'];
	$chkinvoicedate = $_POST['chkinvoicedate'];
	$chknovapress = $_POST['chknovapress'];
	
				//bulk order info - text boxes
				$Paid = $_POST['Paid'];
				$PaymentTerms = $_POST['PaymentTerms'];
				$InvoiceNumber = $_POST['InvoiceNumber'];
				$PONumber = $_POST['PONumber'];
				$InvoiceDate = $_POST['InvoiceDate'];
				$NovaPress = $_POST['NovaPress'];
				
	
	
	//shipping info - check boxes
	$chkshipper = $_POST['chkshipper'];
	$chktrackingnumber = $_POST['chktrackingnumber'];
	$chkshipdate = $_POST['chkshipdate'];
		
				//bulk order info - text boxes
				$ShipperID = $_POST['ShipperID'];
				$TrackingNumber = $_POST['TrackingNumber'];
				$ShipDate = $_POST['ShipDate'];
				
	//echo "Check counrty = " .$chkcountry;
	//echo "<br>CountryID = " .$CountryID;


/* original sql statement (leaves out anyone who is not tblShipment3
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT tblCustomer.CustomerID,tblCustomer.BusinessName,tblCustomer.FirstName,tblCustomer.LastName,
	tblCustomer.Address,tblCustomer.Address2,tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode,tblCustomer.Email,
	tblCustomer.CountryID,tblCustomer.Phone,tblCustomer.EbayName,tblCustomer.Type,tblCustomer.School, tblCustomer.PrepClass,
	tblPurchase2.PurchaseID,DATE_FORMAT(tblPurchase2.OrderDateTime, '%m/%d/%y %H:%i') AS OrderDateTime,tblPurchase2.TestID,
	tblPurchase2.TestDate,tblPurchase2.ReferredByID,tblPurchase2.Subtotal,tblPurchase2.Tax,tblPurchase2.Discount,
	tblPurchase2.ShippingCost,tblPurchase2.ShipCostID,tblPurchase2.CardType,tblPurchase2.LastFourCr,tblPurchase2.BankCode,
	tblPurchase2.IsCheck,tblPurchase2.PaypalNumber,tblPurchase2.IP,tblPurchase2.Status,
	tblPurchase2.Paid,tblPurchase2.PaymentTerms,tblPurchase2.InvoiceNumber,tblPurchase2.PONumber,tblPurchase2.InvoiceDate,
	tblPurchase2.NovaPress,
	tblPurchaseDetails2.ProductID,tblPurchaseDetails2.Quantity,tblPurchaseDetails2.Shipped,tblPurchaseDetails2.Replacement,
	tblPurchaseDetails2.EbayItemNumber,tblPurchaseDetails2.Status AS ProductStatus,tblPurchaseDetails2.DetailID,
	tblShipment3.TrackingNumber,tblShipment3.DateTime,tblShipment3.ShipperID
	FROM tblCustomer INNER JOIN tblPurchase2 
	ON tblCustomer.CustomerID = tblPurchase2.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
	INNER JOIN tblShipment3
	ON tblPurchase2.PurchaseID = tblShipment3.PurchaseID";
*/	

if($chkshipper == "y" OR $chktrackingnumber == "y" OR $chkshipdate == "y")
{
	$sql = "SELECT tblCustomer.CustomerID,tblCustomer.BusinessName,tblCustomer.FirstName,tblCustomer.LastName,
	tblCustomer.Address,tblCustomer.Address2,tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode,tblCustomer.Email,
	tblCustomer.CountryID,tblCustomer.Phone,tblCustomer.EbayName,tblCustomer.Type,tblCustomer.School, tblCustomer.PrepClass,
	tblPurchase2.PurchaseID,DATE_FORMAT(tblPurchase2.OrderDateTime, '%m/%d/%y %H:%i') AS OrderDateTime,tblPurchase2.TestID,
	DATE_FORMAT(tblPurchase2.TestDate, '%m/%d/%y') AS TestDate,tblPurchase2.ReferredByID,tblPurchase2.Subtotal,tblPurchase2.Tax,tblPurchase2.Discount,
	tblPurchase2.ShippingCost,tblPurchase2.ShipCostID,tblPurchase2.CardType,tblPurchase2.LastFourCr,tblPurchase2.BankCode,
	tblPurchase2.IsCheck,tblPurchase2.PaypalNumber,tblPurchase2.IP,tblPurchase2.Status,
	tblPurchase2.Paid,tblPurchase2.PaymentTerms,tblPurchase2.InvoiceNumber,tblPurchase2.PONumber,tblPurchase2.InvoiceDate,
	tblPurchase2.NovaPress,
	tblPurchaseDetails2.ProductID,tblPurchaseDetails2.Quantity,tblPurchaseDetails2.Shipped,tblPurchaseDetails2.Replacement,
	tblPurchaseDetails2.EbayItemNumber,tblPurchaseDetails2.Status AS ProductStatus,tblPurchaseDetails2.DetailID,
	tblShipment3.TrackingNumber,DATE_FORMAT(tblShipment3.DateTime, '%m/%d/%y') AS DateTime,tblShipment3.ShipperID
	FROM tblCustomer INNER JOIN tblPurchase2 
	ON tblCustomer.CustomerID = tblPurchase2.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
	INNER JOIN tblShipment3
	ON tblPurchase2.PurchaseID = tblShipment3.PurchaseID";

	
	//echo "<br><br>first sql = " .$sql;
	
//customer info = if statements
if ($chkcustomerid == "y")	{	$sql .= " AND tblCustomer.CustomerID LIKE '%$CustomerID%'";	}
if ($chkcompany == "y")	{	$sql .= " AND tblCustomer.BusinessName LIKE '%$Company%'";	}
if ($chkfirstname == "y")	{	$sql .= " AND tblCustomer.FirstName LIKE '$FirstName%'";	}
if ($chklastname == "y")	{	$sql .= " AND tblCustomer.LastName LIKE '$LastName%'";	}
if ($chkaddress == "y")		{	$sql .= " AND tblCustomer.Address LIKE '%$Address%'";	}
if ($chkaddress2 == "y")	{	$sql .= " AND tblCustomer.Address2 LIKE '%$Address2%'";	}
if ($chkcity == "y")	{	$sql .= " AND tblCustomer.City LIKE '%$City%'";		}
if ($chkstate == "y")	{	$sql .= " AND tblCustomer.State = '$State'";	}
if ($chkzipcode == "y")	{	$sql .= " AND tblCustomer.ZipCode LIKE '%$ZipCode%'";	}
if ($chkemail == "y")	{	$sql .= " AND tblCustomer.Email LIKE '%$Email%'";	}
if ($chkcountry == "y")	{	$sql .= " AND tblCustomer.CountryID = '$CountryID'";	}
if ($chkphone == "y")	{	$sql .= " AND tblCustomer.Phone LIKE '%$PhoneNumber%'";	}
if ($chkebayname == "y")	{	$sql .= " AND tblCustomer.EbayName LIKE '%$EbayName%'";	}
if ($chktype == "y")	{	$sql .= " AND tblCustomer.Type = '$Type'";	}
if ($chkschool == "y")	{	$sql .= " AND tblCustomer.School LIKE '%$School%'";	}
if ($chkprepclass == "y")	{	$sql .= " AND tblCustomer.PrepClass LIKE '%$PrepClass%'";	}

//purchase info = if statements
if ($chkpurchaseid == "y")	{	$sql .= " AND tblPurchase2.PurchaseID LIKE '%$PurchaseID%'";	}
if ($chkdaterange == "y" AND $StartDate <> "")	{	$sql .= " AND tblPurchase2.OrderDateTime >= '$StartDate'";	}
if ($chkdaterange == "y" AND $EndDate <> "")	{	$sql .= " AND tblPurchase2.OrderDateTime <= '$EndDate'";	}
if ($chktestid == "y")	{	$sql .= " AND tblPurchase2.TestID = '$TestID'";	}
if ($chktestdate == "y")	{	$sql .= " AND tblPurchase2.TestDate LIKE '%$TestDate%'";	}
if ($chkreferredby == "y")	{	$sql .= " AND tblPurchase2.ReferredByID = '$ReferredByID'";	}
if ($chksubtotal == "y")	{	$sql .= " AND tblPurchase2.Subtotal = '$Subtotal'";	}
if ($chktax == "y")	{	$sql .= " AND tblPurchase2.Tax = '$Tax'";	}
if ($chkdiscount == "y")	{	$sql .= " AND tblPurchase2.Discount = '$Discount'";	}
if ($chkshippingcost == "y")	{	$sql .= " AND tblPurchase2.ShippingCost = '$ShippingCost'";	}
if ($chkshipcostID == "y")	{	$sql .= " AND tblPurchase2.ShipCostID = '$ShipCostID'";	}
if ($chkcardtype == "y")	{	$sql .= " AND tblPurchase2.CardType = '$CardType'";	}
if ($chklast4 == "y")	{	$sql .= " AND tblPurchase2.LastFourCr LIKE '%$Last4%'";	}
if ($chkauth == "y")	{	$sql .= " AND tblPurchase2.BankCode LIKE '%$Auth%'";	}
if ($chkischeck == "y")	{	$sql .= " AND tblPurchase2.IsCheck = '$IsCheck'";	}
if ($chkpaypalnumber == "y")	{	$sql .= " AND tblPurchase2.PaypalNumber LIKE '%$PaypalNumber%'";	}
if ($chkip == "y")	{	$sql .= " AND tblPurchase2.IP = '$IP'";	}
if ($chkstatus == "y")	{	$sql .= " AND tblPurchase2.Status = '$Status'";	}

//product info = if statements
if ($chkproduct == "y")	{	$sql .= " AND tblPurchaseDetails2.ProductID = '$ProductID'";	}
if ($chkquantity == "y")	{	$sql .= " AND tblPurchaseDetails2.Quantity = '$Quantity'";	}
if ($chkshipped == "y")	{	$sql .= " AND tblPurchaseDetails2.Shipped = '$Shipped'";	}
if ($chkreplacement == "y")	{	$sql .= " AND tblPurchaseDetails2.Replacement = '$Replacement'";	}
if ($chkitemnumber == "y")	{	$sql .= " AND tblPurchaseDetails2.EbayItemNumber LIKE '%$EbayItemNumber%'";	}
if ($chkpstatus == "y")	{	$sql .= " AND tblPurchaseDetails2.Status = '$ProductStatus'";	}

//bulk order info = if statements
if ($chkpaid == "y")	{	$sql .= " AND tblPurchase2.Paid = '$Paid'";	}
if ($chkpaymentterms == "y")	{	$sql .= " AND tblPurchase2.PaymentTerms LIKE '%$PaymentTerms%'";	}
if ($chkinvoicenumber == "y")	{	$sql .= " AND tblPurchase2.InvoiceNumber LIKE '%$InvoiceNumber%'";	}
if ($chkponumber == "y")	{	$sql .= " AND tblPurchase2.PONumber LIKE '%$PONumber%'";	}
if ($chkinvoicedate == "y")	{	$sql .= " AND tblPurchase2.InvoiceDate = '$InvoiceDate'";	}
if ($chknovapress == "y")	{	$sql .= " AND tblPurchase2.NovaPress = '$NovaPress'";	}

//shipment = if statements				
if ($chkshipper == "y")	{	$sql .= " AND tblShipment3.ShipperID = '$ShipperID'";	}
if ($chktrackingnumber == "y")	{	$sql .= " AND tblShipment3.TrackingNumber LIKE '%$TrackingNumber%'";	}
if ($chkshipdate == "y")	{	$sql .= " AND tblShipment3.DateTime = '$ShipDate'";  }

}
else #if we are not search for tracking information
{


	$sql = "SELECT tblCustomer.CustomerID,tblCustomer.BusinessName,tblCustomer.FirstName,tblCustomer.LastName,
	tblCustomer.Address,tblCustomer.Address2,tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode,tblCustomer.Email,
	tblCustomer.CountryID,tblCustomer.Phone,tblCustomer.EbayName,tblCustomer.Type,tblCustomer.School, tblCustomer.PrepClass,
	tblPurchase2.PurchaseID,DATE_FORMAT(tblPurchase2.OrderDateTime, '%m/%d/%y %H:%i') AS OrderDateTime,tblPurchase2.TestID,
	DATE_FORMAT(tblPurchase2.TestDate, '%m/%d/%y') AS TestDate,tblPurchase2.ReferredByID,tblPurchase2.Subtotal,tblPurchase2.Tax,tblPurchase2.Discount,
	tblPurchase2.ShippingCost,tblPurchase2.ShipCostID,tblPurchase2.CardType,tblPurchase2.LastFourCr,tblPurchase2.BankCode,
	tblPurchase2.IsCheck,tblPurchase2.PaypalNumber,tblPurchase2.IP,tblPurchase2.Status,
	tblPurchase2.Paid,tblPurchase2.PaymentTerms,tblPurchase2.InvoiceNumber,tblPurchase2.PONumber,tblPurchase2.InvoiceDate,
	tblPurchase2.NovaPress,
	tblPurchaseDetails2.ProductID,tblPurchaseDetails2.Quantity,tblPurchaseDetails2.Shipped,tblPurchaseDetails2.Replacement,
	tblPurchaseDetails2.EbayItemNumber,tblPurchaseDetails2.Status AS ProductStatus,tblPurchaseDetails2.DetailID
	FROM tblCustomer INNER JOIN tblPurchase2 
	ON tblCustomer.CustomerID = tblPurchase2.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID";

	//echo "<br><br>sixth sql = " .$sql;

	
//customer info = if statements
if ($chkcustomerid == "y")	{	$sql .= " AND tblCustomer.CustomerID LIKE '%$CustomerID%'";	}
if ($chkcompany == "y")	{	$sql .= " AND tblCustomer.BusinessName LIKE '%$Company%'";	}
if ($chkfirstname == "y")	{	$sql .= " AND tblCustomer.FirstName LIKE '$FirstName%'";	}
if ($chklastname == "y")	{	$sql .= " AND tblCustomer.LastName LIKE '$LastName%'";	}
if ($chkaddress == "y")		{	$sql .= " AND tblCustomer.Address LIKE '%$Address%'";	}
if ($chkaddress2 == "y")	{	$sql .= " AND tblCustomer.Address2 LIKE '%$Address2%'";	}
if ($chkcity == "y")	{	$sql .= " AND tblCustomer.City LIKE '%$City%'";		}
if ($chkstate == "y")	{	$sql .= " AND tblCustomer.State = '$State'";	}
if ($chkzipcode == "y")	{	$sql .= " AND tblCustomer.ZipCode LIKE '%$ZipCode%'";	}
if ($chkemail == "y")	{	$sql .= " AND tblCustomer.Email LIKE '%$Email%'";	}
if ($chkcountry == "y")	{	$sql .= " AND tblCustomer.CountryID = '$CountryID'";	}
if ($chkphone == "y")	{	$sql .= " AND tblCustomer.Phone LIKE '%$PhoneNumber%'";	}
if ($chkebayname == "y")	{	$sql .= " AND tblCustomer.EbayName LIKE '%$EbayName%'";	}
if ($chktype == "y")	{	$sql .= " AND tblCustomer.Type = '$Type'";	}
if ($chkschool == "y")	{	$sql .= " AND tblCustomer.School LIKE '%$School%'";	}
if ($chkprepclass == "y")	{	$sql .= " AND tblCustomer.PrepClass LIKE '%$PrepClass%'";	}

//purchase info = if statements
if ($chkpurchaseid == "y")	{	$sql .= " AND tblPurchase2.PurchaseID LIKE '%$PurchaseID%'";	}
if ($chkdaterange == "y" AND $StartDate <> "")	{	$sql .= " AND tblPurchase2.OrderDateTime >= '$StartDate'";	}
if ($chkdaterange == "y" AND $EndDate <> "")	{	$sql .= " AND tblPurchase2.OrderDateTime <= '$EndDate'";	}
if ($chktestid == "y")	{	$sql .= " AND tblPurchase2.TestID = '$TestID'";	}
if ($chktestdate == "y")	{	$sql .= " AND tblPurchase2.TestDate LIKE '%$TestDate%'";	}
if ($chkreferredby == "y")	{	$sql .= " AND tblPurchase2.ReferredByID = '$ReferredByID'";	}
if ($chksubtotal == "y")	{	$sql .= " AND tblPurchase2.Subtotal = '$Subtotal'";	}
if ($chktax == "y")	{	$sql .= " AND tblPurchase2.Tax = '$Tax'";	}
if ($chkdiscount == "y")	{	$sql .= " AND tblPurchase2.Discount = '$Discount'";	}
if ($chkshippingcost == "y")	{	$sql .= " AND tblPurchase2.ShippingCost = '$ShippingCost'";	}
if ($chkshipcostID == "y")	{	$sql .= " AND tblPurchase2.ShipCostID = '$ShipCostID'";	}
if ($chkcardtype == "y")	{	$sql .= " AND tblPurchase2.CardType = '$CardType'";	}
if ($chklast4 == "y")	{	$sql .= " AND tblPurchase2.LastFourCr LIKE '%$Last4%'";	}
if ($chkauth == "y")	{	$sql .= " AND tblPurchase2.BankCode LIKE '%$Auth%'";	}
if ($chkischeck == "y")	{	$sql .= " AND tblPurchase2.IsCheck = '$IsCheck'";	}
if ($chkpaypalnumber == "y")	{	$sql .= " AND tblPurchase2.PaypalNumber LIKE '%$PaypalNumber%'";	}
if ($chkip == "y")	{	$sql .= " AND tblPurchase2.IP = '$IP'";	}
if ($chkstatus == "y")	{	$sql .= " AND tblPurchase2.Status = '$Status'";	}

//product info = if statements
if ($chkproduct == "y")	{	$sql .= " AND tblPurchaseDetails2.ProductID = '$ProductID'";	}
if ($chkquantity == "y")	{	$sql .= " AND tblPurchaseDetails2.Quantity = '$Quantity'";	}
if ($chkshipped == "y")	{	$sql .= " AND tblPurchaseDetails2.Shipped = '$Shipped'";	}
if ($chkreplacement == "y")	{	$sql .= " AND tblPurchaseDetails2.Replacement = '$Replacement'";	}
if ($chkitemnumber == "y")	{	$sql .= " AND tblPurchaseDetails2.EbayItemNumber LIKE '%$EbayItemNumber%'";	}
if ($chkpstatus == "y")	{	$sql .= " AND tblPurchaseDetails2.Status = '$ProductStatus'";	}

//bulk order info = if statements
if ($chkpaid == "y")	{	$sql .= " AND tblPurchase2.Paid = '$Paid'";	}
if ($chkpaymentterms == "y")	{	$sql .= " AND tblPurchase2.PaymentTerms LIKE '%$PaymentTerms%'";	}
if ($chkinvoicenumber == "y")	{	$sql .= " AND tblPurchase2.InvoiceNumber LIKE '%$InvoiceNumber%'";	}
if ($chkponumber == "y")	{	$sql .= " AND tblPurchase2.PONumber LIKE '%$PONumber%'";	}
if ($chkinvoicedate == "y")	{	$sql .= " AND tblPurchase2.InvoiceDate = '$InvoiceDate'";	}
if ($chknovapress == "y")	{	$sql .= " AND tblPurchase2.NovaPress = '$NovaPress'";	}

} #end of is statement for tracking stuff

//echo "<br><br>second sql = " .$sql;

$sql .= " GROUP BY tblPurchase2.PurchaseID";

//echo "<br><br>third sql = " .$sql;


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
<p><font color="003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Customer Search 
  Results</strong></font></p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Number of results: <strong><? echo $SumResults; ?></strong></font></strong></p>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
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
    <td width="8%" bgcolor="#FFFFCC" class=sort> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>cID-pID</strong></font></div></td>
    <td bgcolor="#FFFFCC" class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Results</font></strong></font></div></td>
  </tr>
  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$CustomerID = $row[CustomerID];
				$Company = $row[BusinessName];
				$LastName = $row[LastName];
				$FirstName = $row[FirstName];
				$Address = $row[Address];
				$Address2 = $row[Address2];
				$City = $row[City];
				$State = $row[State];
				$ZipCode = $row[ZipCode];
				$CountryID = $row[CountryID];
				$Email = $row[Email];
				$School = $row[School];
				$PrepClass = $row[PrepClass];
				$EbayName = $row[EbayName];
				$Phone = $row[Phone];
				$TypeID = $row[Type];
				
				$PurchaseID = $row[PurchaseID];
				$Subtotal = $row[Subtotal];
				$TestID = $row[TestID];
				$Tax = $row[Tax];
				$Discount = $row[Discount];
				$ShippingCost = $row[ShippingCost];
				$TestDate = $row[TestDate];
				$OrderDateTime = $row[OrderDateTime];
				$ReferredByID = $row[ReferredByID];
				$ShipCostID = $row[ShipCostID];
				$CardType = $row[CardType];
				$LastFourCr = $row[LastFourCr];
				$IsCheck = $row[IsCheck];
				$PaypalNumber = $row[PaypalNumber];
				$IP = $row[IP];
				$Status = $row[Status];
				$BankCode = $row[BankCode];

				$ProductID = $row[ProductID];
				$Quantity = $row[Quantity];
				$Shipped = $row[Shipped];
				$Replacement = $row[Replacement];
				$EbayItemNumber = $row[EbayItemNumber];
				$ProductStatus = $row[ProductStatus];
				
				$Paid = $row[Paid];
				$PaymentTerms = $row[PaymentTerms];
				$InvoiceNumber = $row[InvoiceNumber];
				$PONumber = $row[PONumber];
				$InvoiceDate = $row[InvoiceDate];
				$NovaPress = $row[NovaPress];
								
				$ShipperID = $row[ShipperID];
				$TrackingNumber = $row[TrackingNumber];
				$ShipDate = $row[DateTime];
				
				
				
				$sql8 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
				$result8 = mysql_query($sql8) or die("Cannot get type info");
				
				while($row8 = mysql_fetch_array($result8))
				{
				$Type = $row8[Type];
				}
				
				$sql3 = "SELECT * FROM tblTests WHERE TestID = '$TestID'";
				$result3 = mysql_query($sql3) or die("Cannot get test info");
				
				while($row3 = mysql_fetch_array($result3))
				{
				$Test = $row3[Name];
				}
				
				$sql4 = "SELECT * FROM tblShipLocation WHERE LocationID = '$CountryID'";
				$result4 = mysql_query($sql4) or die("Cannot get country info");
				
				while($row4 = mysql_fetch_array($result4))
				{
				$Country = $row4[Name];
				}				
				
				$sql5 = "SELECT * FROM tblReferredBy WHERE ReferredByID = '$ReferredByID'";
				$result5 = mysql_query($sql5) or die("Cannot get ReferredByID info");
				
				while($row5 = mysql_fetch_array($result5))
				{
				$ReferredBy = $row5[Name];
				}								
				
				
				$sql6 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
				$result6 = mysql_query($sql6) or die("Cannot get ProductID info");
				
				while($row6 = mysql_fetch_array($result6))
				{
				$Product = $row6[Nickname];
				}
				
				
				$sql7 = "SELECT * FROM tblShipper WHERE ShipperID = '$ShipperID'";
				$result7 = mysql_query($sql7) or die("Cannot get ProductID info");
				
				while($row7 = mysql_fetch_array($result7))
				{
				$Shipper = $row7[CompanyName];
				}			
				
				
				if($FirstName == "") { $FirstName = $Company; }
			  ?>
  <tr> 
    <td bgcolor="#E6E6FF"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>" target="_blank"><? echo $CustomerID; ?></a>-<a href="PurchaseDetails.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>" target="_blank"><? echo $PurchaseID; ?></a></font></div></td>
    
	<td bgcolor="#E6E6FF"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">    <strong><? echo $FirstName; ?></strong></font></div></td>
	<td bgcolor="#E6E6FF"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">    <strong><? echo $LastName; ?></strong></font></div></td>
	<td bgcolor="#E6E6FF"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">    <strong><? echo $City; ?></strong></font></div></td>
	  <td bgcolor="#E6E6FF"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">    <strong><? echo $State; ?></strong></font></div></td>	
	  	<td bgcolor="#E6E6FF"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">    <strong><? echo $ZipCode; ?></strong></font></div></td>
	  <td bgcolor="#E6E6FF"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">    <strong><? echo $OrderDateTime; ?></strong></font></div></td>
	  	  <td bgcolor="#E6E6FF"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Type; ?></strong></font></div></td>	
	
	
	
	
	<? if ($chkcompany == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Company = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $Company; ?></strong></font></div></td>
	<? } ?>
	<? if ($chkaddress == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Address = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $Address; ?></strong></font></div></td>
	<? } ?>	
	  	<? if ($chkaddress2 == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Address2 = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $Address2; ?></strong></font></div></td>
	  	<? } ?>	
	  	  	<? if ($chkcountry == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Country =</font><font size="2" face="Arial, Helvetica, sans-serif"> <br>
	  <strong><? echo $Country; ?></strong></font></div></td>
	  	  	<? } ?>		
	  	  	<? if ($chkemail == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Email =</font><font size="2" face="Arial, Helvetica, sans-serif"> <br>
	  <strong><? echo $Email; ?></strong></font></div></td>
	  	  	<? } ?>		
	  	  	<? if ($chkphone == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Phone = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $Phone; ?></strong></font></div></td>
	  	  	<? } ?>		
	  	  	<? if ($chkebayname == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">EbayName = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $EbayName; ?></strong></font></div></td>
	  	  	<? } ?>		
	  	  	  	<? if ($chkschool == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">School = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $School; ?></strong></font></div></td>
	  	  	  	<? } ?>		
	  	  	  	<? if ($chkprepclass == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">PrepClass = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $PrepClass; ?></strong></font></div></td>
	  	  	  	<? } ?>		
	  
	  
	  	  	  	  	<? if ($chktestid == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Test =</font><font size="2" face="Arial, Helvetica, sans-serif"> <br>
	  <strong><? echo $Test; ?></strong></font></div></td>
	  	  	  	  	<? } ?>		
	  	  	  	  	<? if ($chktestdate == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">TestDate = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $TestDate; ?></strong></font></div></td>
	  	  	  	  	<? } ?>		
	  	  	  	  	<? if ($chkreferredby == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">ReferredBy = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $ReferredBy; ?></strong></font></div></td>
	  	  	  	  	<? } ?>		
	  	  	  	  	<? if ($chksubtotal == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Subtotal = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $Subtotal; ?></strong></font></div></td>
	  	  	  	  	<? } ?>		
	  	  	  	  	<? if ($chktax == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Tax = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $Tax; ?></strong></font></div></td>
	  	  	  	  	<? } ?>		
	  	  	  	  	<? if ($chkdiscount == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Discount = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $Discount; ?></strong></font></div></td>
	  	  	  	  	<? } ?>		
	  	  	  	  	<? if ($chkshippingcost == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">ShippingCost = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $ShippingCost; ?></strong></font></div></td>
	  	  	  	  	<? } ?>		
	  	  	  	  	<? if ($chkshipcostid == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">ShipCostID = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $ShipCostID; ?></strong></font></div></td>
	  	  	  	  	<? } ?>		
	  	  	  	  	<? if ($chkcardtype == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">CardType = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $CardType; ?></strong></font></div></td>
	  	  	  	  	<? } ?>		
	  	  	  	  	<? if ($chklast4 == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">LastFourCr =</font><font size="2" face="Arial, Helvetica, sans-serif"> <br>
	  <strong><? echo $LastFourCr; ?></strong></font></div></td>
	  	  	  	  	<? } ?>		
	  	  	  	  	<? if ($chkauth == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">BankCode =</font><font size="2" face="Arial, Helvetica, sans-serif"> <br>
	  <strong><? echo $BankCode; ?></strong></font></div></td>
	  	  	  	  	<? } ?>		
	  	  	  	  	<? if ($chkischeck == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">IsCheck = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $IsCheck; ?></strong></font></div></td>
	  	  	  	  	<? } ?>			
	  	  	  	  	<? if ($chkpaypalnumber == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Paypal # =</font><font size="2" face="Arial, Helvetica, sans-serif"> <br>
	  <strong><? echo $PaypalNumber; ?></strong></font></div></td>
	  	  	  	  	<? } ?>		
	  	  	  	  	<? if ($chkip == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">IP =</font><font size="2" face="Arial, Helvetica, sans-serif"> <br>
	  <strong><? echo $IP; ?></strong></font></div></td>
	  	  	  	  	<? } ?>		
	  	  	  	  	<? if ($chkstatus == "y") { ?><td bgcolor="#E6E6FF"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">	  <strong><? echo $Status; ?></strong></font></div></td>
	  	  	  	  	<? } ?>		
	  
	  
	  
	  	  	  	  	  	<? if ($chkproduct == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Product = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $Product; ?></strong></font></div></td>
	  	  	  	  	  	<? } ?>		
	  	  	  	  	  	<? if ($chkquantity == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Quantity = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $Quantity; ?></strong></font></div></td>
	  	  	  	  	  	<? } ?>		
	  	  	  	  	  	<? if ($chkshipped == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Shipped = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $Shipped; ?></strong></font></div></td>
	  	  	  	  	  	<? } ?>		
	  	  	  	  	  	<? if ($chkreplacement == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Replacement = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $Replacement; ?></strong></font></div></td>
	  	  	  	  	  	<? } ?>		
	  	  	  	  	  	<? if ($chkitemnumber == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Ebay Item # = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $EbayItemNumber; ?></strong></font></div></td>
	  	  	  	  	  	<? } ?>		
	  	  	  	  	  	<? if ($chkpstatus == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Product Status = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $ProductStatus; ?></strong></font></div></td>
	  	  	  	  	  	<? } ?>		
	  
	  
	  	  	  	  	  	<? if ($chkpaid == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Paid =</font><font size="2" face="Arial, Helvetica, sans-serif"> <br>
	  <strong><? echo $Paid; ?></strong></font></div></td>
	  	  	  	  	  	<? } ?>		
	  	  	  	  	  	<? if ($chkpaymentterms == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">PaymentTerms = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $PaymentTerms; ?></strong></font></div></td>
	  	  	  	  	  	<? } ?>		
	  	  	  	  	  	<? if ($chkinvoicenumber == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Invoice # = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $InvoiceNumber; ?></strong></font></div></td>
	  	  	  	  	  	<? } ?>		
	  	  	  	  	  	<? if ($chkponumber == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">PO # = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $PONumber; ?></strong></font></div></td>
	  	  	  	  	  	<? } ?>		
	  	  	  	  	  	<? if ($chkinvoicedate == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">InvoiceDate =</font><font size="2" face="Arial, Helvetica, sans-serif"> <br>
	  <strong><? echo $InvoiceDate; ?></strong></font></div></td>
	  	  	  	  	  	<? } ?>		
	  	  	  	  	  	<? if ($chknovapress == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">NovaPress = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $NovaPress; ?></strong></font></div></td>
	  	  	  	  	  	<? } ?>		
	  
	  
	  	  	  	  	  	<? if ($chkshipper == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Shipper = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $Shipper; ?></strong></font></div></td>
	  	  	  	  	  	<? } ?>		
	  	  	  	  	  	<? if ($chktrackingnumber == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">Tracking # =</font><font size="2" face="Arial, Helvetica, sans-serif"> <br>
	  <strong><? echo $TrackingNumber; ?></strong></font></div></td>
	  	  	  	  	  	<? } ?>		
	  	  	  	  	  	<? if ($chkshipdate == "y") { ?><td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">ShipDate = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	  <strong><? echo $ShipDate; ?></strong></font></div></td>
	  	  	  	  	  	<? } ?>		
	  
	  
	  
	  
	  
	  
	  
	
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
