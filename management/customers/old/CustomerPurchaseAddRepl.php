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
?>

<?	
	$CustomerID = $_GET['cust'];
	$Now = date("Y-m-d H:i:s");

			
	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	#<Add button being pushed>
	if ($_POST['Add'] == "Add")
	{
		// Customer Table
		$FirstName = dbQuote($_POST['txtFirstName']);
		$LastName = dbQuote($_POST['txtLastName']);
		$Address = dbQuote($_POST['txtAddress']);
		$Address2 = dbQuote($_POST['txtAddress2']);
		$City = dbQuote($_POST['txtCity']);
		$State = $_POST['State'];
		$StateOther = $_POST['StateOther'];
		$ZipCode = $_POST['txtZipCode'];
		$Country = $_POST['Country'];
		$Phone = $_POST['txtPhone'];
		$Email = $_POST['txtEmail'];
		//$School = dbQuote($_POST['txtSchool']);
		//$PrepClass = dbQuote($_POST['txtPrepClass']);
		//$Type = $_POST['txtType'];
		//$EbayName = $_POST['txtEbayName'];
		
		// Purchase Table
		//$ProductID = "1";
		//$TestID = $_POST['txtTestID'];
		//if($Test == ""){$Test = "0";} #fixes integer problem for test being blank if none is selected.		
		//$TestDate = $_POST['txtTestDate'];
		//$Num = $_POST['txtNum'];
		//$ReferredBy = $_POST['txtReferredBy'];
		//$TimerPrice = "0";
		$ShipCostID = $_POST['ShipCostID'];
		//$Tax = "0";
		//$TotalCost = "0";
		$Shipped = $_POST['OrderShipped'];
		//$Same = $_POST['txtSame'];
		//$IP = $_POST['txtIP'];
		//$Contract = "y";
		//$ShippingCost = $_POST['txtShippingCost'];
		//$Promotion = $_POST['txtPromotion'];
		//$Notes = $_POST['txtNotes'];
		$Status = $_POST['Status'];
		//$AffClassID = $_POST['txtAffClassID'];
		//$AffOfficeID = $_POST['txtAffOfficeID'];
		//$EbayItemNumber = $_POST['txtItemNumber'];
		//$PaypalNumber = $_POST['txtPaypalNumber'];
		//$Replacement = $_POST['txtReplacement'];
		//$ReplacementType = $_POST['txtReplacementType'];	
			$Paid = $_POST['Paid'];
		
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
		
		$sql3 = "UPDATE tblCustomer
				SET FirstName = '$FirstName', 
				LastName = '$LastName', 
				Address = '$Address', 
				Address2 = '$Address2',
				City = '$City', 
				State = '$State',
				StateOther = '$StateOther', 
				ZipCode = '$ZipCode',
				CountryID = '$Country', 
				Phone = '$Phone',
				Email = '$Email'
				WHERE CustomerID = '$CustomerID'";

			mysql_query($sql3) or die("Cannot update customer information");
		
		
		//now, the customer is in the customer table, we have their customerID....we have all the totals......INSERT order into tblPurchase...
		$sql = "INSERT INTO tblPurchase2(CustomerID, Tax, Discount, Subtotal, ShipCostID, 
		OrderDateTime, Shipped, ShippingCost, Status, Paid)
		
		VALUES ('$CustomerID', '$Tax', '$Discount', '$Subtotal',
		'$ShipCostID', '$Now', '$Shipped', '$ShippingCost', '$Status', 'y')";
		

		mysql_query($sql) or die("Cannot insert purchase, please try again.");
		
		//now, get purchase ID for this puchase, and enter info into tblPurchaseDetails......
		$sql = "SELECT PurchaseID FROM tblPurchase2 WHERE CustomerID = $CustomerID AND OrderDateTime = '$Now'";
		$result = mysql_query($sql) or die("Cannot get Purchase ID, please try again.");
		
		while($row = mysql_fetch_array($result))
		{
		$PurchaseID = $row[PurchaseID];
		}
		
		
		if($Quantity1 <> '')
		{
			$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Shipped, Status, Replacement) 
			VALUES ('$PurchaseID', '$Product1', '$Quantity1', '$PurchasePrice1', '$EbayItemNumber1', '$Shipped1', '$Status1', 'y');";
			mysql_query($sql) or die("Cannot Insert Purchase Details1 information, try again!");
			
			$sql2 = "UPDATE tblProductNew SET WebInventory = WebInventory - $Quantity1 WHERE ProductID = '$Product1'";
			$result2 = mysql_query($sql2) or die("Cannot update WebInventory 1");
			
		}
		else
		{
			echo "Quantity 1 is blank - Product not entered";
		}
		
		
		if($Quantity2 <> '')
		{	
			$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Shipped, Status, Replacement)
			VALUES ('$PurchaseID', '$Product2', '$Quantity2', '$PurchasePrice2', '$EbayItemNumber2', '$Shipped2', '$Status2', 'y');";
			mysql_query($sql) or die("Cannot Insert Purchase Details2 information, try again!");
			
			$sql2 = "UPDATE tblProductNew SET WebInventory = WebInventory - $Quantity2 WHERE ProductID = '$Product2'";
			$result2 = mysql_query($sql2) or die("Cannot update WebInventory 2");
			
		}
		else
		{
			echo "Quantity 2 is blank - Product not entered";
		}

		if($Quantity3 <> '')
		{	
			$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Shipped, Status, Replacement) 
			VALUES ('$PurchaseID', '$Product3', '$Quantity3', '$PurchasePrice3', '$EbayItemNumber3', '$Shipped3', '$Status3', 'y');";
			mysql_query($sql) or die("Cannot Insert Purchase Details3 information, try again!");
			
			$sql2 = "UPDATE tblProductNew SET WebInventory = WebInventory - $Quantity3 WHERE ProductID = '$Product3'";
			$result2 = mysql_query($sql2) or die("Cannot update WebInventory 3");
			
		}
		
		else
		{
			echo "Quantity 3 is blank - Product not entered";
		}


		if($Quantity4 <> '')
		{	
			$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Shipped, Status, Replacement) 
			VALUES ('$PurchaseID', '$Product4', '$Quantity4', '$PurchasePrice4', '$EbayItemNumber4', '$Shipped4', '$Status4', 'y');";
			mysql_query($sql) or die("Cannot Insert Purchase Details4 information, try again!");
			
			$sql2 = "UPDATE tblProductNew SET WebInventory = WebInventory - $Quantity4 WHERE ProductID = '$Product4'";
			$result2 = mysql_query($sql2) or die("Cannot update WebInventory 4");
			
		}
		else
		{
			echo "Quantity 4 is blank - Product not entered";
		}
		
		
		$Subtotal1 = $PurchasePrice1 * $Quantity1;
		$Subtotal2 = $PurchasePrice2 * $Quantity2;
		$Subtotal3 = $PurchasePrice3 * $Quantity3;
		$Subtotal4 = $PurchasePrice4 * $Quantity4;
		
		$Subtotal = $Subtotal1 + $Subtotal2 + $Subtotal3 + $Subtotal4;
		
		//$TotalCost = $Subtotal + $ShippingCost;
		
		if($State == 'TX')
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
		


		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		$FirstName = addQuote($FirstName);
		$LastName = addQuote($LastName);
		$Address = addQuote($Address);
		$Address2 = addQuote($Address2);
		$City = addQuote($City);

		$goto = "NotShippedView.php";
		header("location: $goto");


		}
		
		
?>
<?

		$sql4 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
		//put SQL statement into result set for loop through records
		$result4 = mysql_query($sql4) or die("Cannot execute query customerID 3!");
		
		while($row4 = mysql_fetch_array($result4))
		{
			
			$FirstName = $row4[FirstName];
			$LastName = $row4[LastName];
			$Address = $row4[Address];
			$Address2 = $row4[Address2];
			$City = $row4[City];
			$State = $row4[State];
			$StateOther = $row4[StateOther];
			$ZipCode = $row4[ZipCode];
			$Country = $row4[CountryID];
			$Phone = $row4[Phone];
			$Email = $row4[Email];
			//$School = $row4[School];
			//$PrepClass = $row4[PrepClass];
			//$EbayName = $row4[EbayName];
			//$Type = $row4[Type];
		}
		
?>


<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">Contact
      Information</a> |  <a href="PurchaseHistory.php?cust=<? echo $CustomerID; ?>">Purchase
History</a></font></p>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Customer 
    and Purchase Information</strong></font></p>
<form name="form1" method="post" action="">
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">First
              Name</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">        <input name="txtFirstName" type="text" id="txtFirstName2" value="<? echo addQuote($FirstName);?>" size="30">
</font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Last
              Name</font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtLastName" type="text" id="txtLastName2" value="<? echo addQuote($LastName);?>" size="30">
</font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Address</font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">        <input name="txtAddress" type="text" id="txtAddress" value="<? echo addQuote($Address);?>" size="35" maxlength="30">
</font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Address
              2 </font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">        <input name="txtAddress2" type="text" id="txtAddress2" value="<? echo addQuote($Address2);?>" size="35" maxlength="30">
</font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>City</strong></font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">        <input name="txtCity" type="text" id="txtCity" value="<? echo addQuote($City);?>" size="20">
</font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">        <select name="State" class="text" id="State">
          <option value = "" selected>Please Select</option>
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT State, Name
								FROM tblState
								
								ORDER BY Name";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[State];?>" <? if($row[State] == $State){echo "selected";}?>><? echo $row[Name];?></option>
          <?
						}
					?>
        </select>
</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp; </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State
            Other</strong></font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="StateOther" type="text" id="StateOther" value="<? echo $StateOther; ?>" size="20">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip
            Code</strong></font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">        <input name="txtZipCode" type="text" id="txtZipCode3" value="<? echo $ZipCode;?>" size="11" maxlength="10">
</font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Country</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> </strong>            <select name="Country" class="text" id="Country">
              <option value = "" selected>Please Select</option>
              <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT LocationID, Name
								FROM tblShipLocation
								
								ORDER BY Name";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
              <option value="<? echo $row[LocationID];?>" <? if($row[LocationID] == $Country){echo "selected";}?>><? echo $row[Name];?></option>
              <?
						}
					?>
            </select>            
      <strong> </strong></font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Phone
              Number</font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Phone" type="text" id="Phone" value="<? echo $Phone; ?>" size="20">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Email
              Address</font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">        <input name="txtEmail" type="text" id="txtOrderEmail3" value="<? echo $Email;?>" size="45" maxlength="50">
</font></td>
    </tr>
  </table>
  <br>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Quantity</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Purchase
            Price </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipped? </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(y/n) </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">eBay Item
            Number </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product1" tabindex="" id="Product1" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew";
					
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
      <td><font size="2" face="Arial, Helvetica, sans-serif"> $
            <input name="PurchasePrice1" type="text" id="PurchasePrice1" size="8">
      </font></td>
      <td><input name="Shipped1" type="text" id="Shipped1" value="n" size="5"></td>
      <td><input name="EbayItemNumber1" type="text" id="EbayItemNumber1" size="12"></td>
      <td><input name="Status1" type="text" id="Status1" value="active" size="12" maxlength="10"></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product2" tabindex="" id="Product2" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew";
					
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
      <td><font size="2" face="Arial, Helvetica, sans-serif"> $
            <input name="PurchasePrice2" type="text" id="PurchasePrice2" size="8">
      </font></td>
      <td><input name="Shipped2" type="text" id="Shipped2" value="n" size="5"></td>
      <td><input name="EbayItemNumber2" type="text" id="EbayItemNumber2" size="12"></td>
      <td><input name="Status2" type="text" id="Status2" value="active" size="12" maxlength="10"></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product3" tabindex="" id="Product3" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew";
					
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
      <td><font size="2" face="Arial, Helvetica, sans-serif"> $
            <input name="PurchasePrice3" type="text" id="PurchasePrice3" size="8">
      </font></td>
      <td><input name="Shipped3" type="text" id="Shipped3" value="n" size="5"></td>
      <td><input name="EbayItemNumber3" type="text" id="EbayItemNumber3" size="12"></td>
      <td><input name="Status3" type="text" id="Status3" value="active" size="12" maxlength="10"></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product4" tabindex="" id="Product4" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew";
					
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
      <td><font size="2" face="Arial, Helvetica, sans-serif"> $
            <input name="PurchasePrice4" type="text" id="PurchasePrice4" size="8">
      </font></td>
      <td><input name="Shipped4" type="text" id="Shipped4" value="n" size="5"></td>
      <td><input name="EbayItemNumber4" type="text" id="EbayItemNumber4" size="12"></td>
      <td><input name="Status4" type="text" id="Status4" value="active" size="12" maxlength="10"></td>
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
        <input name="Status" type="text" id="Status2" value="active" size="8">
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Entire order
            shipped? </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(y/n/p)</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="OrderShipped" type="text" id="Status2" value="n" size="8">
      </font></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="ShipCostID.php" target="_blank">Shipping
              Cost ID</a>:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>
        <input name="ShipCostID" type="text" id="ShipCostID" size="10">
      </strong></font></font></font></td>
    </tr>
  </table>
  <p>&nbsp;</p>
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

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
}
?>