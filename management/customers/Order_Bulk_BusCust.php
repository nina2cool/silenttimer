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

	# --------------------------------------------------------------------------------------------
	#   Function to insert back slashes into characters with a single or a double quote in them.
	# --------------------------------------------------------------------------------------------
	function escapeQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("'","||",$var);
			$string = str_replace('"','||||',$string);
		}

		return $string;
	}
	
	function removeBars($var)
	{
		if (isset($var))
		{
			$string = str_replace("||","'",$var);
			$string = str_replace('||||','"',$string);
		}

		return $string;
	}

	function addQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("\'","'",$var);
			$string = str_replace('\"','"',$string);
		}

		return $string;
	}
	
	function dbQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("||","\'",$var);
			$string = str_replace('||||','\"',$string);
		}

		return $string;
	}
	# --------------------------------------------------------------------------------------------


	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	$Now = date("Y-m-d H:i:s");

	#<Add button being pushed>
	if ($_POST['Add'] == "Add")
	{
		// Customer Table
		$BusinessName = dbQuote($_POST['BusinessName']);
		$CompanyName = dbQuote($_POST['CompanyName']);
		$Chain = dbQuote($_POST['Chain']);
		$FirstName = dbQuote($_POST['FirstName']);
		$LastName = dbQuote($_POST['LastName']);
		$Address = dbQuote($_POST['Address']);
		$Address2 = dbQuote($_POST['Address2']);
		$City = dbQuote($_POST['City']);
		$State = $_POST['State'];
		$StateOther = dbQuote($_POST['StateOther']);
		$ZipCode = $_POST['ZipCode'];
		$CountryID = $_POST['Country'];
		$Phone = $_POST['Phone'];
		$Ext = $_POST['Ext'];
		$Fax = $_POST['Fax'];
		$Phone2 = $_POST['Phone2'];
		$Ext2 = $_POST['Ext2'];
		$Email = $_POST['Email'];
		$Email2 = $_POST['Email2'];
		$URL = $_POST['URL'];
		$Type = $_POST['Type'];
		$CustomerType = $_POST['CustomerType'];
		$Notes = dbQuote($_POST['Notes']);
		$DiscountRate = $_POST['DiscountRate'];
		$WePayShip = $_POST['WePayShip'];
		$Terms = $_POST['Terms'];
		$NameB = dbQuote($_POST['NameB']);
		$AttentionTo = dbQuote($_POST['AttentionTo']);
		$AddressB = dbQuote($_POST['AddressB']);
		$Address2B = dbQuote($_POST['Address2B']);
		$CityB = dbQuote($_POST['CityB']);
		$StateB = $_POST['StateB'];
		$StateOtherB = dbQuote($_POST['StateOtherB']);
		$ZipCodeB = $_POST['ZipCodeB'];
		$CountryBID = $_POST['CountryBID'];
		$Same = $_POST['Same'];
		$Contact1 = dbQuote($_POST['Contact1']);
		$Contact2 = dbQuote($_POST['Contact2']);

		// Purchase2 Table
		$OrderDateTime = $_POST['OrderDateTime'];
		$ShipCostID = $_POST['ShipCostID'];
		$Discount = $_POST['Discount'];
		$OrderShipped = $_POST['OrderShipped'];
		$ShippingCost = $_POST['ShippingCost'];
		$PurchaseNotes = dbQuote($_POST['PurchaseNotes']);
		$Status = $_POST['Status'];
		$NovaPress = $_POST['NovaPress'];
		$Paid = $_POST['Paid'];
		
		$LSAT = $_POST['LSAT'];
		$SAT = $_POST['SAT'];
		$SpecialOrder = $_POST['SpecialOrder'];


		
		$ShipNotes = dbQuote($_POST['ShipNotes']);
		$ChkWholesale = $_POST['ChkWholesale'];
		
		
		// Purchase Details2 Table
		$Product1 = $_POST['Product1'];
		$Product2 = $_POST['Product2'];
		$Product3 = $_POST['Product3'];
		$Product4 = $_POST['Product4'];
		$Quantity1 = $_POST['Quantity1'];
		$Quantity2 = $_POST['Quantity2'];
		$Quantity3 = $_POST['Quantity3'];
		$Quantity4 = $_POST['Quantity4'];
		$PurchasePrice1 = $_POST['PurchasePrice1'];
		$PurchasePrice2 = $_POST['PurchasePrice2'];
		$PurchasePrice3 = $_POST['PurchasePrice3'];
		$PurchasePrice4 = $_POST['PurchasePrice4'];
		$Shipped1 = $_POST['Shipped1'];
		$Shipped2 = $_POST['Shipped2'];
		$Shipped3 = $_POST['Shipped3'];
		$Shipped4 = $_POST['Shipped4'];
		$EbayItemNumber1 = $_POST['EbayItemNumber1'];
		$EbayItemNumber2 = $_POST['EbayItemNumber2'];
		$EbayItemNumber3 = $_POST['EbayItemNumber3'];
		$EbayItemNumber4 = $_POST['EbayItemNumber4'];
		$Status1 = $_POST['Status1'];
		$Status2 = $_POST['Status2'];
		$Status3 = $_POST['Status3'];
		$Status4 = $_POST['Status4'];
		
		

		$sql2 = "INSERT INTO tblCustomer(BusinessName, FirstName, LastName, Address, Address2, City, State, StateOther, ZipCode, CountryID, 
		Phone, Ext, Fax, Phone2, Ext2, Email, Email2, URL, School, PrepClass, EbayName, BusinessType, Contact1, Contact2, DiscountRate, 
		WePayShip, Terms, NameB, AttentionTo, AddressB, Address2B, CityB, StateB, StateOtherB, ZipCodeB, CountryBID, Same, Notes, Type) 
		VALUES('$BusinessName', '$FirstName', '$LastName', '$Address', '$Address2', '$City', '$State', '$StateOther', '$ZipCode', '$CountryID',
		'$Phone', '$Ext', '$Fax', '$Phone2', '$Ext2', '$Email', '$Email2', '$URL', '$School', '$PrepClass', '$EbayName', '$BusinessType', 
		'$Contact1', '$Contact2', '$DiscountRate', '$WePayShip', '$Terms', '$NameB', '$AttentionTo', '$AddressB', '$Address2B', '$CityB', 
		'$StateB', '$StateOtherB', '$ZipCodeB', '$CountryBID', '$Same', '$Notes', '$Type');"; 

		
		$result2 = mysql_query($sql2) or die("Cannot insert into table");

				
		
		//now, find out what their customerID is...
		$sql3 = "SELECT CustomerID FROM tblCustomer WHERE FirstName= '$FirstName' AND LastName = '$LastName' 
		AND Address = '$Address' AND Phone = '$Phone' AND ZipCode = '$ZipCode' AND BusinessName = '$BusinessName'";
		
		$result3 = mysql_query($sql3) or die("Cannot retrieve Customer ID, please try again.");
		
		while($row3 = mysql_fetch_array($result3))
		{
			$CustomerID = $row3[CustomerID];
			
		}
		
		
		$PaymentTerms = $Terms;
		
		if($Same == "y")
		{
	
		//now, the customer is in the customer table, we have their customerID....we have all the totals......INSERT order into tblPurchase...
		$sql = "INSERT INTO tblPurchase2(CustomerID, Tax, Subtotal, Discount, Paid, PaymentTerms, PONumber, 
		InvoiceNumber, InvoiceDate, NovaPress, OrderDateTime, Shipped, ShipCostID, ShippingCost, Notes, 
		ShipNotes, SameAsShip, Status, IsCheck) 
		VALUES('$CustomerID', '$Tax', '$Subtotal', '$Discount', '$Paid', '$PaymentTerms', 
		'$PONumber', '$InvoiceNumber', '$InvoiceDate', '$NovaPress', '$OrderDateTime', '$OrderShipped', '$ShipCostID', 
		'$ShippingCost', '$PurchaseNotes', '$ShipNotes', 'y', '$Status', 'n');"; 
		
		mysql_query($sql) or die("Cannot insert purchase2, please try again.");
		
		}
		else
		{

		//now, the customer is in the customer table, we have their customerID....we have all the totals......INSERT order into tblPurchase...
		$sql = "INSERT INTO tblPurchase2(CustomerID, Tax, Subtotal, Discount, Paid, PaymentTerms, PONumber, 
		InvoiceNumber, InvoiceDate, NovaPress, OrderDateTime, Shipped, ShipCostID, ShippingCost, Notes, 
		ShipNotes, SameAsShip, FirstNameB, LastNameB, AddressB, CityB, StateB, OtherStateB, CountryIDB, ZipB, Status) 
		VALUES('$CustomerID', '$Tax', '$Subtotal', '$Discount', '$Paid', '$PaymentTerms', 
		'$PONumber', '$InvoiceNumber', '$InvoiceDate', '$NovaPress', '$OrderDateTime', '$OrderShipped', '$ShipCostID', 
		'$ShippingCost', '$PurchaseNotes', '$ShipNotes', 'n', '$NameB', '$AttentionTo', '$AddressB', 
		'$CityB', '$StateB', '$StateOtherB', '$CountryBID', '$ZipCodeB', '$Status');"; 
		
		mysql_query($sql) or die("Cannot insert purchase2, please try again.");
		

		}
		
			
			
			//now, get purchase ID for this puchase, and enter info into tblPurchaseDetails......
			$sql4 = "SELECT PurchaseID FROM tblPurchase2 WHERE CustomerID = '$CustomerID' AND InvoiceNumber = '$InvoiceNumber'
			AND OrderDateTime = '$OrderDateTime'";
		
			
			$result4 = mysql_query($sql4) or die("Cannot get Purchase ID, please try again.");
					
			while($row4 = mysql_fetch_array($result4))
			{
				$PurchaseID = $row4[PurchaseID];
			}
				

		//echo "$pID, $FirstNameB, $LastNameB, $AddressB, $CityB, $StateB, $ZipCodeB, $CardType, $LastFourCr, $Code, $AVS, $CVV2Code, $now";
		
		
		if($Quantity1 <> '')
		{	
			
			// Insert into purchase details table
			$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Shipped, Status) 
			VALUES ('$PurchaseID', '$Product1', '$Quantity1', '$PurchasePrice1', '$EbayItemNumber1', '$Shipped1', '$Status1');";
			mysql_query($sql) or die("Cannot Insert Purchase Details1 information, try again!");
			
			$sql2 = "UPDATE tblProductNew SET WebInventory = WebInventory - $Quantity1 WHERE ProductID = '$Product1'";
			$result2 = mysql_query($sql2) or die("Cannot update WebInventory 1");
			
		}
		//else
		//{
		//echo "Quantity 1 is blank - Product not entered";
		
		//}
		
		
		if($Quantity2 <> '')
		{	
		
			// Insert into purchase details table
			$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Shipped, Status) 
			VALUES ('$PurchaseID', '$Product2', '$Quantity2', '$PurchasePrice2', '$EbayItemNumber2', '$Shipped2', '$Status2');";
			mysql_query($sql) or die("Cannot Insert Purchase Details2 information, try again!");
			
			$sql2 = "UPDATE tblProductNew SET WebInventory = WebInventory - $Quantity2 WHERE ProductID = '$Product2'";
			$result2 = mysql_query($sql2) or die("Cannot update WebInventory 2");
		}
		//else
		//{
		//echo "Quantity 2 is blank - Product not entered";
		
		//}

		if($Quantity3 <> '')
		{	
		
			// Insert into purchase details table
			$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Shipped, Status) 
			VALUES ('$PurchaseID', '$Product3', '$Quantity3', '$PurchasePrice3', '$EbayItemNumber3', '$Shipped3', '$Status3');";
			mysql_query($sql) or die("Cannot Insert Purchase Details3 information, try again!");
			
			$sql2 = "UPDATE tblProductNew SET WebInventory = WebInventory - $Quantity3 WHERE ProductID = '$Product3'";
			$result2 = mysql_query($sql2) or die("Cannot update WebInventory 3");
						
		}
		
		//else
		//{
		//echo "Quantity 3 is blank - Product not entered";
		
		//}


		if($Quantity4 <> '')
		{	
		
			// Insert into purchase details table
			$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Shipped, Status) 
			VALUES ('$PurchaseID', '$Product4', '$Quantity4', '$PurchasePrice4', '$EbayItemNumber4', '$Shipped4', '$Status4');";
			mysql_query($sql) or die("Cannot Insert Purchase Details4 information, try again!");
			
			$sql2 = "UPDATE tblProductNew SET WebInventory = WebInventory - $Quantity4 WHERE ProductID = '$Product4'";
			$result2 = mysql_query($sql2) or die("Cannot update WebInventory 4");
						
		}
		//else
		//{
		//echo "Quantity 4 is blank - Product not entered";
		
		//}
		
		$Subtotal1 = $PurchasePrice1 * $Quantity1;
		$Subtotal2 = $PurchasePrice2 * $Quantity2;
		$Subtotal3 = $PurchasePrice3 * $Quantity3;
		$Subtotal4 = $PurchasePrice4 * $Quantity4;
		
		$Subtotal = $Subtotal1 + $Subtotal2 + $Subtotal3 + $Subtotal4;
		
		$TotalCost = $Subtotal - $Discount + $ShippingCost;
		
		if($State == 'TX' AND $chkWholesale <> 'y')
		{
		$Tax = 0.0825 * $TotalCost;
		}
		else
		{
		$Tax = 0;
		}
		
		
		$sql6 = "UPDATE tblPurchase2
		SET Tax = '$Tax',
		Subtotal = '$Subtotal'
		WHERE PurchaseID = '$PurchaseID'";
		
		$result6 = mysql_query($sql6) or die("Cannot update Purchase 2 information, try again!");
		


		$sql = "INSERT INTO tblBusinessCustomer(Name, Chain, CustomerType, Address, Address2, City, State, ZipCode, Country,
		Phone1, Phone2, Email1, Email2, Website, Fax1, LSAT, SAT, SpecialOrder, Status)
		
		VALUES ('$CompanyName', '$Chain', '$CustomerType', '$Address', '$Address2', '$City',
		'$State', '$ZipCode', '$Country', '$Phone', '$Phone2', '$Email', '$Email2',
		'$URL', '$Fax', '$LSAT', '$SAT', '$SpecialOrder', 'active')";
			
		mysql_query($sql) or die("Cannot insert business customer, please try again.");





		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		$BusinessName = addQuote($BusinessName);
		$CompanyName = addQuote($CompanyName);
		$Chain = addQuote($Chain);
		$FirstName = addQuote($FirstName);
		$LastName = addQuote($LastName);
		$Address = addQuote($Address);
		$Address2 = addQuote($Address2);
		$City = addQuote($City);
		
		$NameB = addQuote($NameB);
		$AttentionTo = addQuote($AttentionTo);
		$AddressB = addQuote($AddressB);
		$Address2B = addQuote($Address2B);
		$CityB = addQuote($CityB);		
		$Contact1 = addQuote($Contact1);
		$Contact2 = addQuote($Contact2);
		
		$StateOther = addQuote($StateOther);
		$Notes = addQuote($Notes);
		$PurchaseNotes = addQuote($PurchaseNotes);
		$StateOtherB = addQuote($StateOtherB);
		
		
		$goto = "NotShippedView.php";
		header("location: $goto");

		
		}
		
// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";
		
		
		
?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>




<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
      an Order for a New Bulk Customer &amp; New Business Customer </strong></font></p>
<form name="form1" method="post" action="">
  <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; Customer
  Information</font></strong></p>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">BusinessName (for
      orders) </font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="BusinessName" type="text" id="BusinessName" size="40"></font></td>
</tr>
<tr>
  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">BusinessName
        (for web site) </font></strong></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="CompanyName" type="text" id="CompanyName" size="40">
  </font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Chain Name</strong></font><br>              </td>
  <td><input name="Chain" type="text" id="Chain" size="35"></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">FirstName</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="FirstName" type="text" id="FirstName"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">LastName</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="LastName" type="text" id="LastName"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Address</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Address" type="text" id="Address"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Address2</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Address2" type="text" id="Address2"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">City</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="City" type="text" id="City"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">State</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <select name="State" tabindex="" id="State" class="text">
    <option value="" selected>Select</option>
    <? 
					$sql3 = "SELECT * FROM tblState ORDER BY State";
					$result3 = mysql_query($sql3) or die("Cannot get State");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
    <option value="<? echo $row3[State]; ?>"><? echo $row3[State]; ?></option>
    <?
					}
				?>
  </select>
</font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">StateOther</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="StateOther" type="text" id="StateOther" size="10"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">ZipCode</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ZipCode" type="text" id="ZipCode" size="10"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">CountryID</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <select name="Country" tabindex="" id="Country" class="text">
    <option value="" selected>Select</option>
    <? 
					$sql3 = "SELECT * FROM tblShipLocation ORDER BY Name";
					$result3 = mysql_query($sql3) or die("Cannot get CountryB");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
    <option value="<? echo $row3[LocationID]; ?>"<? if($row3[LocationID] == 225){echo "selected";}?>><? echo $row3[Name]; ?></option>
    <?
					}
				?>
  </select>
</font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Phone</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Phone" type="text" id="Phone"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Ext</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Ext" type="text" id="Ext"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Fax</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Fax" type="text" id="Fax"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Phone2</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Phone2" type="text" id="Phone2"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Ext2</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Ext2" type="text" id="Ext2"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Email</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Email" type="text" id="Email" size="40">
</font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Email2</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Email2" type="text" id="Email2" size="40"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">URL</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="URL" type="text" id="URL" size="40"></font></td>
</tr>
</table>

  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="Notes" cols="40" rows="4" id="Notes"></textarea>
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Customer
            Type</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Type" tabindex="" id="Type" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql3 = "SELECT * FROM tblCustomerType ORDER BY Type";
					$result3 = mysql_query($sql3) or die("Cannot get State");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
          <option value="<? echo $row3[TypeID]; ?>"<? if($row3[TypeID] == 6){echo "selected";}?>><? echo $row3[Type]; ?></option>
          <?
					}
				?>
        </select>
        </font>        <font size="2" face="Arial, Helvetica, sans-serif">&nbsp; </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Business
      Customer Type</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;        </font>
              <select name="CustomerType" id="CustomerType">
                <option value="Bookstore" selected>Bookstore</option>
                <option value="Test Prep">Test Prep</option>
        </select>
      <font size="2" face="Arial, Helvetica, sans-serif">&nbsp;      </font></td>
    </tr>
  </table>
  <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&gt; Purchase
  Information</font></strong></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Quantity</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Purchase Price </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipped?
            </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(y/n) </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product1" tabindex="" id="Product1" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew ORDER BY Nickname ASC";
					
					$result = mysql_query($sql) or die("Cannot get tblProductNew1");
					
					while($row = mysql_fetch_array($result))
					{
				?>
          <option value="<? echo $row[ProductID]; ?>"><? echo $row[Nickname]; ?></option>
          <?
					}
				?>
        </select>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Quantity1" type="text" id="Quantity1" size="5">
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        $
        <input name="PurchasePrice1" type="text" id="PurchasePrice1" size="8">
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Shipped1" id="select3">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
      </font> <font size="2" face="Arial, Helvetica, sans-serif">&nbsp; </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Status1" class="text" id="select7">
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT Status FROM tblPurchaseDetails2
						GROUP BY Status ORDER BY Status ASC";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[Status];?>" <? if($row[Status] == "active"){echo "selected";}?>><? echo $row[Status];?></option>
          <?
						}
					?>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product2" tabindex="" id="Product2" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew ORDER BY Nickname ASC";
					
					$result = mysql_query($sql) or die("Cannot get tblProductNew2");
					
					while($row = mysql_fetch_array($result))
					{
				?>
          <option value="<? echo $row[ProductID]; ?>" <? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
          <?
					}
				?>
        </select>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Quantity2" type="text" id="Quantity2" size="5">
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        $
        <input name="PurchasePrice2" type="text" id="PurchasePrice2" size="8">
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Shipped2" id="select4">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Status2" class="text" id="select8">
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT Status FROM tblPurchaseDetails2
						GROUP BY Status ORDER BY Status ASC";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[Status];?>" <? if($row[Status] == "active"){echo "selected";}?>><? echo $row[Status];?></option>
          <?
						}
					?>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product3" tabindex="" id="Product3" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew ORDER BY Nickname ASC";
					
					$result = mysql_query($sql) or die("Cannot get tblProductNew3");
					
					while($row = mysql_fetch_array($result))
					{
				?>
          <option value="<? echo $row[ProductID]; ?>" <? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
          <?
					}
				?>
        </select>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Quantity3" type="text" id="Quantity3" size="5">
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        $
        <input name="PurchasePrice3" type="text" id="PurchasePrice3" size="8">
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Shipped3" id="select5">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Status3" class="text" id="select9">
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT Status FROM tblPurchaseDetails2
						GROUP BY Status ORDER BY Status ASC";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[Status];?>" <? if($row[Status] == "active"){echo "selected";}?>><? echo $row[Status];?></option>
          <?
						}
					?>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product4" tabindex="" id="Product4" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew ORDER BY Nickname ASC";
					
					$result = mysql_query($sql) or die("Cannot get tblProductNew4");
					
					while($row = mysql_fetch_array($result))
					{
				?>
          <option value="<? echo $row[ProductID]; ?>" <? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
          <?
					}
				?>
        </select>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Quantity4" type="text" id="Quantity4" size="5">
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        $
        <input name="PurchasePrice4" type="text" id="PurchasePrice4" size="8">
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Shipped4" id="select6">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Status4" class="text" id="select10">
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT Status FROM tblPurchaseDetails2
						GROUP BY Status ORDER BY Status ASC";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[Status];?>" <? if($row[Status] == "active"){echo "selected";}?>><? echo $row[Status];?></option>
          <?
						}
					?>
        </select>
      </font></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date / Time
            of Purchase:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="OrderDateTime" type="text" id="OrderDateTime" value="<? echo $Now;?>" size="25">
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Purchase
            Order Status:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Status" class="text" id="select2">
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT Status FROM tblPurchase2
						GROUP BY Status ORDER BY Status ASC";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[Status];?>" <? if($row[Status] == "active"){echo "selected";}?>><? echo $row[Status];?></option>
          <?
						}
					?>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Entire order
            shipped? </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(y/n/p)</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="OrderShipped" id="OrderShipped">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Same Billing
            Address?</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Same" id="select">
          <option value="y" selected>y</option>
          <option value="n">n</option>
        </select>
      </font></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Discount:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"> $
            <input name="Discount" type="text" id="Discount" size="10">
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Tax:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
      &lt;automatically calculated for Texas&gt;<br>
        <input name="chkWholesale" type="checkbox" id="chkWholesale" value="y" checked>
        <strong>WHOLESALE? (check if yes) </strong></font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipping
            Cost:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$
            <input name="ShippingCost" type="text" id="ShippingCost" size="10">
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="ShipCostID.php" target="_blank">Shipping
              Cost ID</a>:</font></strong></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>
      <input name="ShipCostID" type="text" id="ShipCostID" size="10">
      </strong></font></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Paid?</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Paid" id="Paid">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Nova Press?</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="NovaPress" id="select11">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">PO #: </font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="PONumber" type="text" id="PONumber2" size="30">
      </strong></font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Invoice
            #: </font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="InvoiceNumber" type="text" id="InvoiceNumber2" size="30">
      </strong></font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Invoice
            Date: </font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="InvoiceDate" type="text" id="InvoiceDate" value="0000-00-00" size="15">
      </strong></font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase
            Notes:</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <textarea name="PurchaseNotes" cols="50" rows="4" id="textarea"></textarea>
      </strong></font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping
            Notes:<br>
            </strong>(Notes related to whether to <br>
        email customer, print packing list,
        etc) </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <textarea name="ShipNotes" cols="50" rows="4" id="textarea"></textarea>
      </strong></font></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Carries
            LSAT timers? </strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
          <select name="LSAT" id="select12">
            <option value="y" selected>y</option>
            <option value="n">n</option>
                    </select>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Carries
            SAT timers? </strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
          <select name="SAT" id="select13">
            <option value="y">y</option>
            <option value="n" selected>n</option>
          </select>
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Special
            Order only? </font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
          <select name="SpecialOrder" id="select14">
            <option value="y">y</option>
            <option value="n" selected>n</option>
          </select>
      </font></td>
    </tr>
  </table>
  <p><br>
  </p>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Add" type="submit" id="Add" value="Add">
    <input type="reset" name="Submit2" value="Reset">
    </font></strong></p>
</form>
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
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>