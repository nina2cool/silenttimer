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
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	$_SESSION['userName'] = $userName;
	
	//grab variables to get purchase info and customer info from DB.
	$PurchaseID = $_GET['purch'];
	$CustomerID = $_GET['cust'];


	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	//SQL to get data from purchase table
	
	$sql = "SELECT * FROM tblEmployee WHERE UserName = '$userName'";
	$result = mysql_query($sql) or die("Cannot get company rep info, please try again.");

	while($row = mysql_fetch_array($result))
		{
			$FirstNameComp = $row[FirstName];
			$LastNameComp = $row[LastName];
			$CompanyRepID = $row[CompanyRepID];
		}
	
	$now = date("Y-m-d H:i:s");


?>
<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Add a Warranty 
Claim</strong></font>
<form action="" method="post" name="form" id="form">
  <p align="left"><strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">&gt; Problem
        Info and Manager's Decision</font></strong><font face="Arial, Helvetica, sans-serif"><strong><font color="#333333" size="3"> </font></strong></font></p>
  <p><font color="#FF0033" size="4" face="Arial, Helvetica, sans-serif"><strong>*</strong></font><font size="2" face="Arial, Helvetica, sans-serif">Please
      Fill in These Requests.</font></p>
	  
	  
	  
	     <?
	  If ($_POST['Submit'] == "Add")
	   {

		$ClaimType = $_POST['txtClaimType'];
		$PurchaseID = $_POST['txtPurchaseID'];
		$CustomerType = $_POST['txtCustomerType'];
		$PersonRequesting = $_POST['txtPersonRequesting'];
		$DateTimeRequest = $_POST['txtDateTimeRequest'];
		$AmountRequested = $_POST['txtAmountRequested'];
		$RequestType = $_POST['txtRequestType'];
		$ShipmentCodeRequested = $_POST['txtShipmentCodeRequested'];
		$Reason = $_POST['txtReason'];
		$UnderWarranty = $_POST['txtUnderWarranty'];
		$DateProductReturned = $_POST['txtDateProductReturned'];
		$DateTimeRefunded = $_POST['txtDateTimeRefunded'];
		$AmountRefunded = $_POST['txtAmountRefunded'];
		$AuthorizationCode = $_POST['txtAuthorizationCode'];
		$CompanyRepID = $_POST['txtCompanyRepID'];
		$DateNewProductSent = $_POST['txtDateNewProductSent'];
		$ProblemConclusion = $_POST['txtProblemConclusion'];
		$NumSent = $_POST['txtNumSent'];
		$ReturnToChina = $_POST['txtReturnToChina'];
		$Notes = $_POST['txtNotes'];
		$Status = $_POST['txtStatus'];
		$NumReturned = $_POST['txtNumReturned'];
	
	
		//SQL to get data from problem table
		$sql = "INSERT INTO tblCustomerClaims
		(ClaimType, PurchaseID, CustomerType, PersonRequesting, DateTimeRequest, AmountRequested, RequestType, 
		ShipmentCodeRequested, Reason, UnderWarranty, DateProductReturned,
		DateTimeRefunded, AmountRefunded, AuthorizationCode, CompanyRepID,
		DateNewProductSent, ProblemConclusion, ReturnToChina, Notes, Status, NumReturned, NumSent)
		
		VALUES ('$ClaimType', '$PurchaseID', '$CustomerType', '$PersonRequesting',
		'$DateTimeRequest', '$AmountRequested',
		'$RequestType', '$ShipmentCodeRequested', '$Reason', '$UnderWarranty',
		'$DateProductReturned', '$DateTimeRefunded', '$AmountRefunded',
		'$AuthorizationCode', '$CompanyRepID', '$DateNewProductSent', '$ProblemConclusion',
		'$ReturnToChina', '$Notes', '$Status', '$NumReturned', '$NumSent')";

		
		mysql_query($sql) or die("Cannot insert claim, please try again.");

		
	   }
   	?>
	  
	  
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Claim Type</strong></font><font color="#FF0000">*</font><font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
        </strong>(Refund, Return, Replacement)</font><br>
      </td>
      <td><input name="txtClaimType" type="text" id="txtClaimType2"></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Name of
            Person Requesting Refund/Return<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtPersonRequesting" type="text" id="txtPersonRequesting4">
      </font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase
            ID</strong></font><font color="#FF0000">*</font><br>
      </td>
      <td><input name="txtPurchaseID" type="text" id="txtPurchaseID5" value="<? echo $PurchaseID; ?>"></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date of
            Request<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtDateTimeRequest" type="text" id="DateTimeRequest4">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Amount Requested</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">$
              <input name="txtAmountRequested" type="text" id="txtAmountRequested4" size="10">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">How Request
            Was Made<br>
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(email,
        phone, etc)<strong><br>
          </strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="txtRequestType" type="text" id="txtRequestType4">
      </strong></font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Under Warranty?<br>
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">Check
        original purchase date. Must be within 6 months.<strong><br>
          </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtUnderWarranty" type="text" id="txtUnderWarranty4" value="y" size="5" maxlength="1">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Reason for
            Refund or Return</font><font color="#FF0000">*</font></strong></td>
      <td><textarea name="txtReason" cols="25" id="textarea10"></textarea></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date Pruduct
            Was Returned<br>
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">Date
        we received the product back. No full refunds without product back.</font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtDateProductReturned" type="text" id="txtDateProductReturned4" value="0000-00-00">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Number of
            Timers Returned<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtNumReturned" type="text" id="txtNumReturned4" size="5" maxlength="11">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date and
            Time Refunded<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtDateTimeRefunded" type="text" id="txtDateTimeRefunded4" value="0000-00-00 00:00:00">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Amount Refunded<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">$
              <input name="txtAmountRefunded" type="text" id="txtAmountRefunded4" size="10">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Authorization
            Code </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(successful)<strong><br>
              </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtAuthorizationCode" type="text" id="txtAuthorizationCode4">
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
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Number of
            Timers Sent</strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtNumSent" type="text" id="txtNumReturned5" size="5" maxlength="11">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date New
            Pruduct Was Sent<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtDateNewProductSent" type="text" id="txtDateNewProductSent4" value="0000-00-00">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Our Conclusion
            to the Problem<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="txtProblemConclusion" cols="25" id="textarea11"></textarea>
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Return to
            China?<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtReturnToChina" type="text" id="txtReturnToChina4" value="n" size="5" maxlength="1">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Notes<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="txtNotes" cols="25" id="textarea12"></textarea>
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font><font color="#FF0000">*</font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtStatus" type="text" id="txtStatus4" value="open">
      </font></strong></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>
    <input type="submit" name="Submit" value="Add">
&nbsp;&nbsp;
  <input type="reset" name="Submit2" value="Reset">
  </p>
		
</form>
            <p>&nbsp;</p>


<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
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