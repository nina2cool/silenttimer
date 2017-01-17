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
	$_SESSION['userName'] = $userName;
	
	//grab variables to get purchase info and customer info from DB.
	$claimID = $_GET['claim'];


	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	//SQL to get data from purchase table
	
	$sql = "SELECT * FROM tblCustomerClaims WHERE ClaimID = '$claimID'";
	$result = mysql_query($sql) or die("Cannot get company rep info, please try again.");

	while($row = mysql_fetch_array($result))
		{
			$ClaimType = $row[ClaimType];
			$CompanyRepID = $row[CompanyRepID];
			$PurchaseID = $row[PurchaseID];
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
	
?>
<strong><font size="5" face="Arial, Helvetica, sans-serif">&gt; Process the Claim</font></strong> 
<form action="" method="post" name="form" id="form">
		
            <table width="100%" border="0" cellspacing="0" cellpadding="8">
              <tr>
             <td align="left" valign="top"><p align="left"><strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">&gt; 
          Problem Info and Manager's Decision</font></strong><font face="Arial, Helvetica, sans-serif"><strong><font color="#333333" size="3"> 
          </font></strong></font></p>
					   
        <p><font color="#FF0033" size="4" face="Arial, Helvetica, sans-serif"><strong>*</strong></font><font size="2" face="Arial, Helvetica, sans-serif">Please 
          Fill in These Requests.</font></p>
        </tr>

        <?
	  If ($_POST['Submit'] == "Process Claim")
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
		$ReturnToChina = $_POST['txtReturnToChina'];
		$Notes = $_POST['txtNotes'];
		
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
		Status = 'closed',
		NumReturned = '$NumReturned',
		NumSent = '$NumSent'
		WHERE ClaimID = '$claimID'";
		
		
		mysql_query($sql) or die("Cannot update claim, please try again.");

		//echo "<p align='left'><font color='#0000FF' size='4' face='Arial, Helvetica, sans-serif'><strong>The Claim has been Processed and Saved in the Database.</strong></font></p>";

		//echo "<meta http-equiv='refresh' content='0;URL=savedclaim.php'>";

		$goto = "index.php";
		header("location: $goto");
		
		
	   }
   	?>

                
    <tr> 
      <td align="left" valign="top">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
          <tr> 
            <td><table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Claim 
                    Type</strong></font><font color="#FF0000">*</font><font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                    </strong>(Refund, Return, Replacement)</font><br> </td>
                  <td><input name="txtClaimType" type="text" id="txtClaimType2" value="<? echo $ClaimType; ?>"></td>
                </tr>
                <tr> 
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Name 
                    of Person Requesting Refund/Return<br>
                    </font></strong></td>
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="txtPersonRequesting" type="text" id="txtPersonRequesting4" value="<? echo $PersonRequesting; ?>">
                    </font></strong></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase 
                    ID</strong></font><font color="#FF0000">*</font><br> </td>
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
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date 
                    and Time of Request<br>
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
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">How 
                    Request Was Made<br>
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
                      2, 3, etc)<strong> </strong>Make sure this code matches 
                      the code entered in tblPurchase before shipping.<strong><br>
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
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date 
                    Pruduct Was Returned<br>
                    </font></strong><font size="2" face="Arial, Helvetica, sans-serif">Date 
                    we received the product back. No full refunds without product 
                    back.</font></td>
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
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date 
                    and Time Refunded<br>
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
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date 
                    New Pruduct Was Sent<br>
                    </font></strong></td>
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="txtDateNewProductSent" type="text" id="txtDateNewProductSent4" value="<? echo $DateNewProductSent; ?>">
                    </font></strong></td>
                </tr>
                <tr> 
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Our 
                    Conclusion to the Problem<br>
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
              </table></td>
          </tr>
        </table>
        <br>
        <br>

                    <p>
                      
          <input type="submit" name="Submit" value="Process Claim">
                      &nbsp;&nbsp;
                      <input type="reset" name="Submit2" value="Reset">
                    </p></td>
                </tr>
              </table>
            </form>
            <p>&nbsp;</p>


<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.
require "../include/footerlinks.php";



// finishes security for page
}
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>