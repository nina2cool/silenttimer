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

	$_SESSION['userName'] = $userName;

	$PurchaseID = $_GET['purch'];
	$DetailID = $_GET['detail'];
	
	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "SELECT tblCustomer.FirstName, tblCustomer.LastName, tblPurchase2.CustomerID, tblCustomer.CustomerID
	FROM tblCustomer
	INNER JOIN tblPurchase2 ON tblCustomer.CustomerID = tblPurchase2.CustomerID
	WHERE tblPurchase2.PurchaseID = '$PurchaseID'";
	$result = mysql_query($sql) or die("Cannot get customer info");
	while($row = mysql_fetch_array($result))
	{
	$FirstName = $row[FirstName];
	$LastName = $row[LastName];
	}
	
	
	If ($_POST['Add'] == "Add")
	{
		$ClaimType = $_POST['ClaimType'];
		$PurchaseID = $_POST['PurchaseID'];
		$DetailID = $_POST['DetailID'];
		$RequestDate = $_POST['RequestDate'];
		$RequestAmount = $_POST['RequestAmount'];
		$RequestType = $_POST['RequestType'];
		$RequestedTo = $_POST['RequestedTo'];
		$Reason = addslashes($_POST['Reason']);
		$Reason2 = addslashes($_POST['Reason2']);
		$UnderWarranty = $_POST['UnderWarranty'];
		$ProductReturned = $_POST['ProductReturned'];
		$ReturnDate = $_POST['ReturnDate'];
		$SignForm = $_POST['SignForm'];
		$SignedForm = $_POST['SignedForm'];
		$FormType = $_POST['FormType'];
		$DateToReturn = $_POST['DateToReturn'];
		$RefundDate = $_POST['RefundDate'];
		$RefundAmount = $_POST['RefundAmount'];
		$ChargeAmount = $_POST['ChargeAmount'];
		$ChargeDate = $_POST['ChargeDate'];
		$ChargedBy = $_POST['ChargedBy'];
		$ChargeAuthorization = $_POST['ChargeAuthorization'];
		$ProblemConclusion = addslashes($_POST['ProblemConclusion']);
		$Notes = addslashes($_POST['Notes']);
		$Status = $_POST['Status'];
		$Loss = $_POST['Loss'];
		$DateofLoss = $_POST['DateofLoss'];
		$Name = $_POST['Name'];
		$RefundedBy = $_POST['RefundedBy'];
		
		$sql = "INSERT INTO tblCustomerClaims2(ClaimType, PurchaseID, DetailID, RequestDate, RequestAmount, RequestType, RequestedTo, 
		Reason, Reason2, UnderWarranty, ProductReturned, ReturnDate, SignForm, SignedForm, FormType, DateToReturn, RefundDate, RefundAmount, 
		ChargeAmount, ChargeDate, ChargedBy, ChargeAuthorization, ProblemConclusion, Notes, Status, Loss, DateofLoss, Name, RefundedBy) 
		VALUES('$ClaimType', '$PurchaseID', '$DetailID', '$RequestDate', '$RequestAmount', '$RequestType', '$RequestedTo', 
		'$Reason', '$Reason2', '$UnderWarranty', '$ProductReturned', '$ReturnDate', '$SignForm', '$SignedForm', '$FormType', '$DateToReturn', 
		'$RefundDate', '$RefundAmount', '$ChargeAmount', '$ChargeDate', '$ChargedBy', '$ChargeAuthorization', '$ProblemConclusion', 
		'$Notes', '$Status', '$Loss', '$DateofLoss', '$Name', '$RefundedBy');"; 
		//echo $sql;
		
		$result = mysql_query($sql) or die("Cannot insert into table"); 

		$goto = "index.php";
		header("location: $goto");

	}
	
	$Now = date("Y-m-d");


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Create
a Claim
 <?
 if($PurchaseID <> '')
 {
 ?>
 for <? echo $FirstName; ?> <? echo $LastName; ?>
 <?
 }
 ?></strong></font>
<br>
<br>
<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
  <td><p><font size="2" face="Arial, Helvetica, sans-serif">Claim Type</font></p>
    <ul>
      <li><font size="1" face="Arial, Helvetica, sans-serif">Refund - item has been shipped, need partial refund, customer keeps item</font></li>
      <li><font size="1" face="Arial, Helvetica, sans-serif">Return - item has been shipped and returned to us</font></li>
      <li><font size="1" face="Arial, Helvetica, sans-serif">Replacement - item has been shipped and they need a replacement</font></li>
      <li><font size="1" face="Arial, Helvetica, sans-serif">Cancel - order NOT shipped and will not be shipped</font></li>
    </ul></td>
<td><p><font size="2" face="Arial, Helvetica, sans-serif">
  <select name="ClaimType" id="ClaimType">
    <option value="Cancel">Cancel</option>
    <option value="Refund">Refund</option>
    <option value="Replacement" selected>Replacement</option>
    <option value="Return">Return</option>
  </select>
</font></p>
  </td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Name (only if customer
      is not already in database)</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Name" type="text" id="Name">
(First and Last Name) </font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Purchase ID</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
  <input name="PurchaseID" type="text" id="PurchaseID" value="<? echo $PurchaseID; ?>" size="5">
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Detail ID (not for cancels,
      single product only)</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><? if($DetailID == '') { ?>
<input name="DetailID" type="text" id="DetailID" value="0">
<?
} else {
?>
 <input name="DetailID" type="text" id="DetailID" value="<? echo $DetailID; ?>">
 <? } ?>
 
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Requested on this Date
      (0000-00-00) </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <input name="RequestDate" type="text" id="RequestDate" value="<? echo $Now; ?>">
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Requested Amount</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  $
  <input name="RequestAmount" type="text" id="RequestAmount" size="10">
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Request Type (phone,
      mail, email, etc) </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <input name="RequestType" type="text" id="RequestType">
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Requested To Employee</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <select name="RequestedTo" class="text" id="RequestedTo">
    <option value = "" selected>Please Select</option>
    <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT * FROM tblEmployee
								WHERE Status = 'active'								
								ORDER BY FirstName";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
    <option value="<? echo $row[EmployeeID];?>" <? if($row[EmployeeID] == $RequestedTo){echo "selected";}?>><? echo $row[FirstName];?></option>
    <?
						}
					?>
  </select>
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Reason&nbsp;</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <textarea name="Reason" cols="40" rows="4" id="Reason"></textarea>
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Reason 2 (if applicable) </font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <select name="Reason2" class="text" id="Reason2">
      <option value = "" selected>Please Select</option>
      <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT * FROM tblCustomerClaims2
								GROUP BY Reason2";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
      <option value="<? echo $row[Reason2];?>" <? if($row[Reason2] == $Reason2){echo "selected";}?>><? echo $row[Reason2];?></option>
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
    <td><font size="2" face="Arial, Helvetica, sans-serif">Under Warranty? (y
        or n) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">      <select name="UnderWarranty" id="UnderWarranty">
        <option value="y" selected>y</option>
        <option value="n">n</option>
          </select>
</font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Product Returned?
        (y or n) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">      <select name="ProductReturned" id="ProductReturned">
        <option value="y">y</option>
        <option value="n" selected>n</option>
      </select>
</font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Date Returned (0000-00-00) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="ReturnDate" type="text" id="ReturnDate2" value="0000-00-00">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Need to Sign the Form?
        (y or n) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">      <select name="SignForm" id="SignForm">
        <option value="y">y</option>
        <option value="n" selected>n</option>
      </select>
</font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Signed the Form? (y
        or n) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">      <select name="SignedForm" id="SignedForm">
        <option value="y">y</option>
        <option value="n" selected>n</option>
      </select>
</font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Form Type (fax, phone,
        email) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="FormType" type="text" id="FormType2">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Date Product Needs
        to be Returned By </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="DateToReturn" type="text" id="DateToReturn2" value="0000-00-00">
    </font></td>
  </tr>
</table>
<br>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Refund Date&nbsp;and
        Time (include time in military format) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="RefundDate" type="text" id="RefundDate2" value="0000-00-00 00:00:00">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Refunded Amount</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"> $
          <input name="RefundAmount" type="text" id="RefundAmount2" size="10">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Refunded By?</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <select name="RefundedBy" class="text" id="select3">
        <option value = "" selected>Please Select</option>
        <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT * FROM tblEmployee
								WHERE Status = 'active'								
								ORDER BY FirstName";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
        <option value="<? echo $row[EmployeeID];?>" <? if($row[EmployeeID] == $RefundedBy){echo "selected";}?>><? echo $row[FirstName];?></option>
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
    <td><font size="2" face="Arial, Helvetica, sans-serif">ChargeAmount (when
        charging for late return) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"> $
          <input name="ChargeAmount" type="text" id="ChargeAmount2" size="10">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">ChargeDate&nbsp;</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="ChargeDate" type="text" id="ChargeDate2" value="0000-00-00">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">ChargedBy&nbsp;</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <select name="ChargedBy" class="text" id="select2">
        <option value = "" selected>Please Select</option>
        <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT * FROM tblEmployee
								WHERE Status = 'active'								
								ORDER BY FirstName";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
        <option value="<? echo $row[EmployeeID];?>" <? if($row[EmployeeID] == $ChargedBy){echo "selected";}?>><? echo $row[FirstName];?></option>
        <?
						}
					?>
      </select>
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Charge Authorization&nbsp;Code
        (AUTH/TKT _____) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="ChargeAuthorization" type="text" id="ChargeAuthorization2" value="AUTH/TKT ">
    </font></td>
  </tr>
</table>
<br>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Our Conclusion to
        the Problem </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <textarea name="ProblemConclusion" cols="40" rows="4" id="textarea"></textarea>
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Notes&nbsp;</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <textarea name="Notes" cols="40" rows="4" id="textarea2"></textarea>
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Write off as a Loss?&nbsp;(y
        or n)</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">      <select name="Loss" id="Loss">
        <option value="y">y</option>
        <option value="n" selected>n</option>
            </select>
</font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Date Loss was Called</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="DateofLoss" type="text" id="DateofLoss2" value="0000-00-00">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <select name="Status" id="select">
        <option value="open" selected>open</option>
        <option value="closed">closed</option>
      </select>
    </font></td>
  </tr>
</table>
<p>
  <input name="Add" type="submit" id="Add" value="Add">
</p>
</form>
        
<p></p>
<p></p>
<p></p>
<?
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