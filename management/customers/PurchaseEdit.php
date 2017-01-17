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

	//grab variables to get purchase info from DB.
	$PurchaseID = $_GET['purch'];
	$CustomerID = $_GET['cust'];

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	#<Add button being pushed>
	if ($_POST['Save'] == "Save")
	{
		
		
		// Purchase Table
		
		$TestID = $_POST['txtTestID'];
		if($Test == ""){$Test = "0";} #fixes integer problem for test being blank if none is selected.		
		$TestDate = $_POST['txtTestDate'];
		
		$ReferredBy = $_POST['txtReferredBy'];
		
		$ShippingOption = $_POST['txtShippingOption'];
		$Tax = $_POST['txtTax'];
		$TotalCost = $_POST['txtTotalCost'];
		$DateTime1 = $_POST['txtDateTime1'];
		
		$Same = $_POST['txtSame'];
		$IP = $_POST['txtIP'];
		$Contract = "y";
		$ShippingCost = $_POST['txtShippingCost'];
		
		$Notes = $_POST['txtNotes'];
		$Status = $_POST['txtStatus'];
		$AffClassID = $_POST['txtAffClassID'];
		$AffOfficeID = $_POST['txtAffOfficeID'];
		$EbayItemNumber = $_POST['txtItemNumber'];
		$PaypalNumber = $_POST['txtPaypalNumber'];
		$PONumber = $_POST['txtPONumber'];
		$InvoiceNumber = $_POST['txtInvoiceNumber'];	
		$InvoiceDate = $_POST['txtInvoiceDate'];
		$ShipNotes = $_POST['ShipNotes'];
		
		$PaymentTerms = $_POST['txtPaymentTerms'];
		
		$ReplacementType = $_POST['txtReplacementType'];
		$Replacement = $_POST['txtReplacement'];
		
		
		
			
		$sql = "UPDATE tblPurchase
			SET TestID = '$TestID',
				TestDate = '$TestDate',
				ReferredBy = '$ReferredBy',
				ShippingOptionID = '$ShippingOption',
				Tax = '$Tax',
				TotalCost = '$TotalCost',
				DateTime = '$DateTime1',
				SameBillingAddress = '$Same',
				IP = '$IP',
				SignContract = '$Contract',
				ShippingCost = '$ShippingCost',
				Notes = '$Notes',
				AffClassID = '$AffClassID',
				AffOfficeID = '$AffOfficeID',
				EbayItemNumber = '$EbayItemNumber',
				PaypalNumber = '$PaypalNumber',
				PONumber = '$PONumber',
				InvoiceNumber = '$InvoiceNumber',
				InvoiceDate = '$InvoiceDate',
				PaymentTerms = '$PaymentTerms',
				Status = '$Status',
				ShipNotes = '$ShipNotes',
				Replacement = '$Replacement',
				ReplacementType = '$ReplacementType'
			WHERE PurchaseID = '$PurchaseID'";

		mysql_query($sql) or die("Cannot update customer purchase information");
		
				
			
	} 
		
	
		$sql = "SELECT * FROM tblPurchase WHERE PurchaseID = '$PurchaseID' AND CustomerID = '$CustomerID'";
	
		//put SQL statement into result set for loop through records
		$result = mysql_query($sql) or die("Cannot execute query! purchase ID");
	
		while($row = mysql_fetch_array($result))
		{
				$PurchaseID = $row[PurchaseID];
				
				$CustomerID = $row[CustomerID];
				$TestID = $row[TestID];
				$TestDate = $row[TestDate];
				
				$ReferredBy = $row[ReferredBy];
				
				$ShippingOption = $row[ShippingOptionID];
				$Tax = $row[Tax];
				$TotalCost = $row[TotalCost];
				$DateTime1 = $row[DateTime];
				
				$Same = $row[SameBillingAddress];
				$IP = $row[IP];
				$Contract = $row[SignContract];
				$ShippingCost = $row[ShippingCost];
				
				$Notes = $row[Notes];
				
				$AffClassID = $row[AffClassID];
				$AffOfficeID = $row[AffOfficeID];
				$EbayItemNumber = $row[EbayItemNumber];
				$PaypalNumber = $row[PaypalNumber];
				$PONumber = $row[PONumber];
				$InvoiceNumber = $row[InvoiceNumber];
				$InvoiceDate = $row[InvoiceDate];
				$Status = $row[Status];
				$ShipNotes = $row[ShipNotes];
				
				$PaymentTerms = $row[PaymentTerms];
				$ReplacementType = $row[ReplacementType];
				$Replacement = $row[Replacement];
		}
	

		
	?>		

<?
		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		
		}

?>





<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">Customer
Information</a> | <a href="Notes.php?cust=<? echo $CustomerID; ?>">Notes</a></font></p>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit 
    Purchase Details</strong></font></p>
<form name="form1" method="post" action="">
  <table width="75%" border="1" cellpadding="5" cellspacing="0">
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Date / Time of Purchase:</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtDateTime1" type="text" id="txtDateTime1" value="<? echo $DateTime1;?>" size="25">
      </font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Status:</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtStatus" type="text" id="txtStatus2" value="<? echo $Status;?>" size="8">
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
          <option value="<? echo $row[Status];?>" <? if($row[Status] == $Status){echo "selected";}?>><? echo $row[Status];?></option>
          <?
						}
					?>
        </select>
</font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="PurchaseDetailsEdit.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Same
             billing address?</a>:</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">
        <input name="txtSame" type="text" id="txtSame2" value="<? echo addQuote($Same);?>" size="3" maxlength="1">
        </font></strong></font></td>
    </tr>
  </table>
  <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>        <font size="2">Pricing 
  Information</font></strong></font></p>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Tax</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$
        <input name="txtTax" type="text" id="txtTax" value="<? echo number_format($Tax,2);?>" size="5">
        </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Shipping Price</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$
        <input name="txtShippingCost" type="text" id="txtShippingCost" value="<? echo number_format($ShippingCost,2);?>" size="5">
        </font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">Total Cost</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$
        <input name="txtTotalCost" type="text" id="txtTotalCost" value="<? echo number_format($TotalCost,2);?>" size="5">
        </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Shipping Option</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>
        <input name="txtShippingOption" type="text" id="txtShippingOption" value="<? echo $ShippingOption;?>" size="3">
        </strong></font></font></font></td>
    </tr>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif">eBay Item Number</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="txtItemNumber" type="text" id="txtItemNumber" value="<? echo $EbayItemNumber;?>" size="12">
        </strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">PayPal Transaction 
        Number</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="txtPaypalNumber" type="text" id="txtPaypalNumber" value="<? echo $PaypalNumber;?>" size="20">
        </strong></font></td>
    </tr>
  </table>
  <br>
  <table width="75%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr align="left" valign="top">
      <td width="43%"><font size="2" face="Arial, Helvetica, sans-serif">Purchase
            Order Number<br>
      </font></td>
      <td width="57%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="txtPONumber" type="text" id="txtPONumber2" value="<? echo $PONumber;?>" size="30">
      </strong></font></td>
    </tr>
    <tr align="left" valign="top">
      <td><font size="2" face="Arial, Helvetica, sans-serif">Invoice
            Number <br>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="txtInvoiceNumber" type="text" id="txtInvoiceNumber2" value="<? echo $InvoiceNumber;?>" size="30">
      </strong></font></td>
    </tr>
    <tr align="left" valign="top">
      <td><font size="2" face="Arial, Helvetica, sans-serif">Invoice
            Date<br>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="txtInvoiceDate" type="text" id="txtInvoiceDate" value="<? echo $InvoiceDate;?>" size="30">
      </strong></font></td>
    </tr>
    <tr align="left" valign="top">
      <td><font size="2" face="Arial, Helvetica, sans-serif">Payment
            Terms</font><br>            </td>
      <td><input name="txtPaymentTerms" type="text" id="txtPaymentTerms2" value="<? echo $PaymentTerms;?>" size="30"></td>
    </tr>
  </table>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Optional 
    Information</strong></font></p>
  <div align="left">
    <table width="50%" border="1" cellpadding="5" cellspacing="0">
      <tr> 
        <td><font size="2" face="Arial, Helvetica, sans-serif">Referred By:</font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtReferredBy" type="text" id="txtReferredBy3" value="<? echo $ReferredBy;?>" size="20">
        </font></td>
      </tr>
      <tr> 
        <td><font size="2" face="Arial, Helvetica, sans-serif">Test:</font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtTestID" type="text" id="txtTestID2" value="<? echo $TestID;?>" size="3">
        </font></td>
      </tr>
      <tr> 
        <td><font size="2" face="Arial, Helvetica, sans-serif">Test Date:</font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtTestDate" type="text" id="txtTestDate2" value="<? echo $TestDate;?>" size="10">
        </font></td>
      </tr>
    </table>
  </div>
  <p align="left"><br>
    <font size="2" face="Arial, Helvetica, sans-serif"><strong>Miscellaneous
  Information</strong></font></p>
  <div align="left">
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
      <tr> 
        <td><font size="2" face="Arial, Helvetica, sans-serif">IP Address</font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtIP" type="text" id="txtIP" value="<? echo addQuote($IP);?>" size="15">
          </font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">Sign Contract?</font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtSign" type="text" id="txtSign" value="<? echo $Sign; ?>" size="3" maxlength="1">
          </font></td>
      </tr>
      <tr> 
        <td><font size="2" face="Arial, Helvetica, sans-serif">Affiliate Class ID</font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtAffClassID" type="text" id="txtAffClassID2" value="<? echo $AffClassID;?>" size="10">
          </font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">Affiliate Office 
          ID</font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtAffOfficeID" type="text" id="txtAffOfficeID2" value="<? echo $AffOfficeID;?>" size="10">
          </font></td>
      </tr>
      <tr> 
        <td><font size="2" face="Arial, Helvetica, sans-serif">Replacement?(y or 
          n) <br>
          </font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtReplacement" type="text" id="txtReplacement2" value="<? echo $Replacement;?>" size="3" maxlength="1">
          </font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">Replacement Type 
          <font size="2" face="Arial, Helvetica, sans-serif">(web, ebay, powerscore, 
          bn)</font></font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtReplacementType" type="text" id="txtReplacementType" value="<? echo $ReplacementType;?>" size="10">
          </font></td>
      </tr>
    </table>
    <br>
  </div>
  <table width="100%"  border="1" cellspacing="0" cellpadding="5">
    <tr>
      <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase
              Notes:</strong></font></p>
        <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>
          <textarea name="txtNotes" cols="50" rows="4" id="textarea"><? echo $Notes;?></textarea>
        </strong></font></p></td>
      <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping
              Notes:</strong></font></p>
        <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>
          <textarea name="ShipNotes" cols="50" rows="4" id="textarea"><? echo $ShipNotes;?></textarea>
        </strong></font></p></td>
    </tr>
  </table>
  <p><br>
  </p>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Save" type="submit" id="Save" value="Save">
    <input type="reset" name="Submit2" value="Reset">
    </font></strong></p>
</form>
<p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

?>
</p>

