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

// has top menu for this page in it, you can change these links in this folders include folder.
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
	
	
	
	//grab variables to get purchase info and customer info from DB.
	$ClaimID = $_GET['claim'];
	$PurchaseID = $_GET['purch'];
	$CustomerID = $_GET['cust'];


	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


	$sql5 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
	$result5 = mysql_query($sql5) or die("Cannot execute query customerID!");
		
		while($row5 = mysql_fetch_array($result5))
		{
			$CustomerID = $row5[CustomerID];
			$FirstName = $row5[FirstName];
			$LastName = $row5[LastName];
			$Phone = $row5[Phone];
			$Email = $row5[Email];
			$Type = $row5[Type];
			$CompanyName = $row5[BusinessName];
		}
	
		if($Email == "")
		{
			$Email = "n/a";
		}
		else
		{	$Email = $Email;
		}
		
		if($Phone == "")
		{
			$Phone = "n/a";
		}
		else
		{	$Phone = $Phone;
		}
		
				if($CompanyName == "")
		{
			$CompanyName = "<br> ";
		}
		else
		{
			$CompanyName = $CompanyName;
		}
		




	//SQL to get data from purchase table
	
	$sql = "SELECT * FROM tblCustomerClaims WHERE ClaimID = '$ClaimID'";
	$result = mysql_query($sql) or die("Cannot get company rep info, please try again.");

	while($row = mysql_fetch_array($result))
		{
			$ClaimType = $row[ClaimType];
			$CompanyRepID = $row[CompanyRepID];
			$CustomerType = $row[CustomerType];
			$PersonRequesting = $row[PersonRequesting];
			$DateTimeRequest = $row[DateTimeRequest];
			$AmountRequested = $row[AmountRequested];
			$RequestType = $row[RequestType];
			$ShipmentCodeRequested = $row[ShipmentCodeRequested];
			$Reason = $row[Reason];
			$UnderWarranty = $row[UnderWarranty];
			$DateProductReturned = $row[DateProductReturned];
			$DateTimeRefunded = $row[DateTimeRefunded];
			$AmountRefunded = $row[AmountRefunded];
			$AuthorizationCode = $row[AuthorizationCode];
			$DateNewProductSent = $row[DateNewProductSent];
			$ProblemConclusion = $row[ProblemConclusion];
			$ReturnToChina = $row[ReturnToChina];
			$Notes = $row[Notes];
			$Status = $row[Status];
			$NumReturned = $row[NumReturned];
			$NumSent = $row[NumSent];
		}
	
	
	  If ($_POST['Submit'] == "Update")
	   {
		$ClaimType = $_POST['txtClaimType'];
		$PurchaseID = $_POST['txtPurchaseID'];
		$CustomerType = $_POST['txtCustomerType'];
		$PersonRequesting = dbQuote($_POST['txtPersonRequesting']);
		$DateTimeRequest = $_POST['txtDateTimeRequest'];
		$AmountRequested = $_POST['txtAmountRequested'];
		$RequestType = $_POST['txtRequestType'];
		$ShipmentCodeRequested = $_POST['txtShipmentCodeRequested'];
		$Reason = dbQuote($_POST['txtReason']);
		$UnderWarranty = $_POST['txtUnderWarranty'];
		$DateProductReturned = $_POST['txtDateProductReturned'];
		$DateTimeRefunded = $_POST['txtDateTimeRefunded'];
		$AmountRefunded = $_POST['txtAmountRefunded'];
		$AuthorizationCode = $_POST['txtAuthorizationCode'];
		$CompanyRepID = $_POST['txtCompanyRepID'];
		$DateNewProductSent = $_POST['txtDateNewProductSent'];
		$ProblemConclusion = dbQuote($_POST['txtProblemConclusion']);
		$ReturnToChina = dbQuote($_POST['txtReturnToChina']);
		$Notes = dbQuote($_POST['txtNotes']);
		$Status = $_POST['txtStatus'];
		$NumReturned = $_POST['txtNumReturned'];
		$NumSent = $_POST['txtNumSent'];
	

		//SQL to get data from problem table
		$sql = "UPDATE tblCustomerClaims
		SET ClaimType = '$ClaimType',
		PurchaseID = '$PurchaseID',
		CustomerType = '$CustomerType',
		PersonRequesting = '$PersonRequesting',
		DateTimeRequest = '$DateTimeRequest',
		AmountRequested = '$AmountRequested',
		RequestType = '$RequestType',
		ShipmentCodeRequested = '$ShipmentCodeRequested',
		Reason = '$Reason',
		UnderWarranty = '$UnderWarranty',
		DateProductReturned = '$DateProductReturned',
		DateTimeRefunded = '$DateTimeRefunded', 
		AmountRefunded = '$AmountRefunded',
		AuthorizationCode = '$AuthorizationCode',
		CompanyRepID = '$CompanyRepID',
		DateNewProductSent = '$DateNewProductSent',
		ProblemConclusion = '$ProblemConclusion',
		ReturnToChina = '$ReturnToChina',
		Notes = '$Notes',
		Status = '$Status',
		NumReturned = '$NumReturned',
		NumSent = '$NumSent'
		WHERE ClaimID = '$ClaimID'";
		
		
		mysql_query($sql) or die("Cannot update claim, please try again.");

		
	   }
	
		$PersonRequesting = addQuote($PersonRequesting);
		$Reason = addQuote($Reason);
		$ProblemConclusion = addQuote($ProblemConclusion);
		$ReturnToChina = addQuote($ReturnToChina);
		$Notes = dbQuote($Notes);
		
		}
		
?>
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">Contact
      Information</a> | <a href="OptionalInfo.php?cust=<? echo $CustomerID; ?>">Optional
      Information</a> | <a href="PurchaseHistory.php?cust=<? echo $CustomerID; ?>">Purchase
      History</a></font></p>
<hr>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFCC">
  <tr>
    <td><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong><?php echo $CompanyName; ?></strong></font></td>
    <td><div align="left"><font color="#FF0000" size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $FirstName; ?> <? echo $LastName; ?></strong></font></div></td>
    <td><div align="right"><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"><strong><?php echo $Type; ?></strong></font></div></td>
    <td width="10%">&nbsp;</td>
  </tr>
</table>
<p><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong>Claim
        History for Purchase ID: </strong></font><font color="#000000"><strong><font size="3" face="Arial, Helvetica, sans-serif"><?php echo $PurchaseID; ?></a></font></strong></font></p>
  <form name="form1" method="post" action="">
    <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Claim
              Type</strong></font><font color="#FF0000">*</font><font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                               </strong>(Refund, Return, Replacement)</font><br>
        </td>
        <td><input name="txtClaimType" type="text" id="txtClaimType2" value="<? echo $ClaimType; ?>"></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Name of
              Person Requesting Refund/Return<br>
        </font></strong></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtPersonRequesting" type="text" id="txtPersonRequesting4" value="<? echo $PersonRequesting; ?>">
        </font></strong></td>
      </tr>
      <tr>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase
              ID</strong></font><font color="#FF0000">*</font><br>
        </td>
        <td><input name="txtPurchaseID" type="text" id="txtPurchaseID5" value="<? echo $PurchaseID; ?>"></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Customer
              Type<br>
        </font></strong></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtCustomerType" type="text" id="txtCustomerType4" value="<? echo $CustomerType; ?>">
        </font></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date and
              Time of Request<br>
        </font></strong></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtDateTimeRequest" type="text" id="DateTimeRequest4" value="<? echo $DateTimeRequest; ?>">
        </font></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Amount
              Requested</font></strong></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">$
                <input name="txtAmountRequested" type="text" id="txtAmountRequested4" value="<? echo number_format($AmountRequested,2); ?>" size="10">
        </font></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">How Request
              Was Made<br>
          </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(email,
          phone, etc)<strong><br>
                         </strong></font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
          <input name="txtRequestType" type="text" id="txtRequestType4" value="<? echo $RequestType; ?>">
        </strong></font></td>
      </tr>
      <tr>
        <td><p><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipping
                Option ID Requested<br>
            </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(1,
            2, 3, etc)<strong> </strong>Make sure this code matches the code
            entered in tblPurchase before shipping.<strong><br>
                           </strong></font></p></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtShipmentCodeRequested" type="text" id="txtShipmentCodeRequested4" value="<? echo $ShipmentCodeRequested; ?>" size="5" maxlength="4">
        </font></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Under
              Warranty?<br>
          </font></strong><font size="2" face="Arial, Helvetica, sans-serif">Check
          original purchase date. Must be within 6 months.<strong><br>
                         </strong></font></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtUnderWarranty" type="text" id="txtUnderWarranty4" value="<? echo $UnderWarranty; ?>" size="5" maxlength="1">
        </font></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Reason
              for Refund or Return</font><font color="#FF0000">*</font></strong></td>
        <td><textarea name="txtReason" cols="25" id="textarea10"><? echo $Reason; ?></textarea></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date Pruduct
              Was Returned<br>
          </font></strong><font size="2" face="Arial, Helvetica, sans-serif">Date
          we received the product back. No full refunds without product back.</font></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtDateProductReturned" type="text" id="txtDateProductReturned4" value="<? echo $DateProductReturned; ?>">
        </font></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Number
              of Timers Returned<br>
        </font></strong></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtNumReturned" type="text" id="txtNumReturned4" value="<? echo $NumReturned; ?>" size="5" maxlength="11">
        </font></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date and
              Time Refunded<br>
        </font></strong></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtDateTimeRefunded" type="text" id="txtDateTimeRefunded4" value="<? echo $DateTimeRefunded; ?>">
        </font></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Amount
              Refunded<br>
        </font></strong></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">$
                <input name="txtAmountRefunded" type="text" id="txtAmountRefunded4" value="<? echo number_format($AmountRefunded,2); ?>" size="10">
        </font></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Authorization
              Code<br>
        </font></strong></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtAuthorizationCode" type="text" id="txtAuthorizationCode4" value="<? echo $AuthorizationCode; ?>">
        </font></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Company
              Rep ID</font><font color="#FF0000">*</font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                             </font></strong></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtCompanyRepID" type="text" id="txtCompanyRepID4" value="<? echo $CompanyRepID; ?>" size="5">
        </font></strong></td>
      </tr>
      <tr>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Number
              of Timers Sent</strong></font></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtNumSent" type="text" id="txtNumReturned5" value="<? echo $NumSent; ?>" size="5" maxlength="11">
        </font></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date New
              Pruduct Was Sent<br>
        </font></strong></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtDateNewProductSent" type="text" id="txtDateNewProductSent4" value="<? echo $DateNewProductSent; ?>">
        </font></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Our Conclusion
              to the Problem<br>
        </font></strong></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
          <textarea name="txtProblemConclusion" cols="25" id="textarea11"><? echo $ProblemConclusion; ?></textarea>
        </font></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Return
              to China?<br>
        </font></strong></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtReturnToChina" type="text" id="txtReturnToChina4" value="<? echo $ReturnToChina; ?>" size="5" maxlength="1">
        </font></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Notes<br>
        </font></strong></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
          <textarea name="txtNotes" cols="25" id="textarea12"><? echo $Notes; ?></textarea>
        </font></strong></td>
      </tr>
      <tr>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font><font color="#FF0000">*</font><font size="2" face="Arial, Helvetica, sans-serif"><br>
        </font></strong></td>
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtStatus" type="text" id="txtStatus4" value="<? echo $Status; ?>">
        </font></strong></td>
      </tr>
    </table>
    <br>

  <input type="submit" name="Submit" value="Update">
&nbsp;&nbsp;
    <input type="reset" name="Submit2" value="Reset">
        
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

?>