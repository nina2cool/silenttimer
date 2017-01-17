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
		$State = $_POST['txtState'];
		$ZipCode = $_POST['txtZipCode'];
		$Country = $_POST['txtCountry'];
		$Phone = $_POST['txtPhone'];
		$Email = $_POST['txtEmail'];
		$School = dbQuote($_POST['txtSchool']);
		$PrepClass = dbQuote($_POST['txtPrepClass']);
		$Type = $_POST['txtType'];
		$EbayName = $_POST['txtEbayName'];
		
		
		// Purchase Table
		$ProductID = "1";
		$TestID = $_POST['txtTestID'];
		if($Test == ""){$Test = "0";} #fixes integer problem for test being blank if none is selected.		
		$TestDate = $_POST['txtTestDate'];
		$Num = $_POST['txtNum'];
		$ReferredBy = $_POST['txtReferredBy'];
		$TimerPrice = "0";
		$ShippingOption = $_POST['txtShippingOption'];
		$Tax = "0";
		$TotalCost = "0";
		$Shipped = $_POST['txtShipped'];
		$Same = $_POST['txtSame'];
		$IP = $_POST['txtIP'];
		$Contract = "y";
		$ShippingCost = $_POST['txtShippingCost'];
		$Promotion = $_POST['txtPromotion'];
		$Notes = $_POST['txtNotes'];
		$Status = "active";
		$AffClassID = $_POST['txtAffClassID'];
		$AffOfficeID = $_POST['txtAffOfficeID'];
		$EbayItemNumber = $_POST['txtItemNumber'];
		$PaypalNumber = $_POST['txtPaypalNumber'];
		$Replacement = $_POST['txtReplacement'];
		$ReplacementType = $_POST['txtReplacementType'];	
			
		
		$sql3 = "UPDATE tblCustomer
				SET FirstName = '$FirstName', 
				LastName = '$LastName', 
				Address = '$Address', 
				Address2 = '$Address2',
				City = '$City', 
				State = '$State', 
				ZipCode = '$ZipCode',
				Country = '$Country', 
				Phone = '$Phone',
				Email = '$Email'
				WHERE CustomerID = '$CustomerID'";

			mysql_query($sql3) or die("Cannot update customer information");
		
		
		//now, the customer is in the customer table, we have their customerID....we have all the totals......INSERT order into tblPurchase...
		$sql = "INSERT INTO tblPurchase(ProductID, CustomerID, TestID, TestDate, NumOrdered,
		ReferredBy, TimerPrice, ShippingOptionID, Tax, TotalCost, DateTime, Shipped, 
		SameBillingAddress, IP, SignContract, ShippingCost, PromotionCodeID, Notes, Status, 
		AffClassID, AffOfficeID, EbayItemNumber, PaypalNumber, Replacement, ReplacementType)
		
		VALUES ('$ProductID', '$CustomerID', '$TestID', '$TestDate', '$Num', '$ReferredBy', '$TimerPrice',
		'$ShippingOption', '$Tax', '$TotalCost', '$Now', '$Shipped', '$Same', '$IP', '$Contract', 
		'$ShippingCost', '$Promotion', '$Notes', '$Status', '$AffClassID', '$AffOfficeID', 
		'$EbayItemNumber', '$PaypalNumber', '$Replacement', '$ReplacementType')";
		

		mysql_query($sql) or die("Cannot insert purchase, please try again.");
		
		//now, get purchase ID for this puchase, and enter info into tblPurchaseDetails......
		$sql = "SELECT PurchaseID FROM tblPurchase WHERE CustomerID = $CustomerID AND Replacement = 'y' AND DateTime = '$Now'";
		$result = mysql_query($sql) or die("Cannot get Purchase ID, please try again.");
		
		while($row = mysql_fetch_array($result))
		{
		$PurchaseID = $row[PurchaseID];
		}
		
		

	?>		

<?
		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		$FirstName = addQuote($FirstName);
		$LastName = addQuote($LastName);
		$Address = addQuote($Address);
		$Address2 = addQuote($Address2);
		$City = addQuote($City);

		}
		
		
?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

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
			$ZipCode = $row4[ZipCode];
			$Country = $row4[Country];
			$Phone = $row4[Phone];
			$Email = $row4[Email];
			$School = $row4[School];
			$PrepClass = $row4[PrepClass];
			$EbayName = $row4[EbayName];
			$Type = $row4[Type];
		}
		
?>


<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">Contact
      Information</a> | <a href="OptionalInfo.php?cust=<? echo $CustomerID; ?>">Optional
      Information</a> | <a href="PurchaseHistory.php?cust=<? echo $CustomerID; ?>">Purchase
History</a> | <a href="#">Claim History</a> | <a href="#">Notes</a></font></p>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Customer 
    and Purchase Information</strong></font></p>
<form name="form1" method="post" action="">
  <font size="2" face="Arial, Helvetica, sans-serif"><strong> </strong></font> 
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top"> <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; 
          Purchase Information</font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr align="left" valign="top"> 
            <td width="41%"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Number 
              of Timers?<br>
              <input name="txtNum" type="text" id="txtNum">
              </font><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033"> 
              </font></strong></font></strong></font></strong></font><font color="#000033"> 
              </font></strong></font></td>
            <td width="27%"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033"><a href="#" onClick="MM_openBrWindow('ShipOptions.php','','scrollbars=yes,width=600,height=600')">Shipping 
              Preference?</a></font></strong><font color="#000033"><strong><br>
              <input name="txtShippingOption" type="text" id="txtShippingOption">
              </strong></font><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong> 
              </strong></font></font></font><font color="#000033"><strong> </strong></font></font></td>
            <td width="32%"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="#" onClick="MM_openBrWindow('ShipOptions.php','','scrollbars=yes,width=600,height=600')">Shipping 
              Cost</a></font></strong><br> 
              <input name="txtShippingCost" type="text" id="txtShippingCost"> 
              <font size="2" face="Arial, Helvetica, sans-serif">&nbsp; </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> Purchase 
              Notes</strong><strong></strong><strong> 
              <textarea name="txtNotes" cols="40" rows="4" id="textarea3"></textarea>
              </strong></font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipped?</strong><br>
              <input name="txtShipped" type="text" id="txtShipped" value="n">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Paypal 
              Number/Order Number<br>
              <input name="txtPaypalNumber" type="text" id="txtPaypalNumber" size="30">
              </strong></font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Item 
              # / Listing ID<br>
              <input name="txtItemNumber" type="text" id="txtItemNumber" size="30">
              </strong></font></td>
          </tr>
        </table>
      
        
      </td>
    </tr>
  </table>
  <p>&nbsp;</p><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td height="310" align="left" valign="top"> 
        <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; 
          Customer Information</font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr align="left" valign="top"> 
            <td colspan="2"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">First 
              Name</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtFirstName" type="text" id="txtFirstName2" value="<? echo addQuote($FirstName);?>" size="30">
              </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Last 
              Name</font></strong><br>
              <input name="txtLastName" type="text" id="txtLastName2" value="<? echo addQuote($LastName);?>" size="30">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Address</font></strong><br>
              <input name="txtAddress" type="text" id="txtAddress" value="<? echo addQuote($Address);?>" size="35" maxlength="30">
              </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Address 
              2 </font></strong><br>
              <input name="txtAddress2" type="text" id="txtAddress2" value="<? echo addQuote($Address2);?>" size="35" maxlength="30">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>City</strong><br>
              <input name="txtCity" type="text" id="txtCity" value="<? echo addQuote($City);?>" size="20">
              </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp; 
              </font></td>
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State</strong><br>
              <input name="txtState" type="text" id="txtState3" value="<? echo addQuote($State);?>" size="10">
              </font></td>
            <td width="21%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip 
              Code</strong><br>
              <input name="txtZipCode" type="text" id="txtZipCode3" value="<? echo $ZipCode;?>" size="11" maxlength="10">
              </font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
            <td width="27%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Country<br>
              <input name="txtCountry" type="text" id="txtCountry3" value="<? echo $Country;?>" size="20">
              </strong></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="4"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Phone 
              Number</font></strong><br>
              <input name="txtPhone" type="text" id="txtPhone" value="<? echo $Phone;?>" size="20">
              </font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp; </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Email 
              Address</font></strong><br>
              <input name="txtEmail" type="text" id="txtOrderEmail3" value="<? echo $Email;?>" size="45" maxlength="50">
              </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">eBay/Amazon 
              Name </font></strong></font><br> 
              <input name="txtEbayName" type="text" id="txtEbayName3" value="<? echo $EbayName; ?>" size="30"> 
            </td>
          </tr>
        </table>
        
      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top"> <p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong> 
          &nbsp; &gt; Extra Information</strong></font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr align="left" valign="top"> 
            <td width="100%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Replacement</strong> 
              (default: n)<br>
              <input name="txtReplacement" type="text" id="txtReplacement" value="y">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Replacement 
              Type</strong></font> <font size="2" face="Arial, Helvetica, sans-serif">(web, 
              ebay, powerscore, bn)</font><br> <input name="txtReplacementType" type="text" id="txtReplacementType" value="web"> 
            </td>
          </tr>
          <?
		  	if($Custom != "yes")
			{
		  ?>
          <?
		  	}
		  ?>
        </table> 
        
      </td>
    </tr>
  </table>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Add" type="submit" id="Add" value="Add">
    <input type="reset" name="Submit2" value="Reset">
    </font></strong></p>
</form>
<p>&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
}
?>