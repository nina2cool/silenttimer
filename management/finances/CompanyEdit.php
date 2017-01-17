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
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


$CompanyID = $_GET['c'];


// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

$Now = date("Y-m-d");

If ($_POST['Update'] == "Update")
{

$Name = $_POST['Name'];
$Person = $_POST['Person'];
$UserName = $_POST['UserName'];
$Password = $_POST['Password'];
$URL = $_POST['URL'];
$MakePayableTo = $_POST['MakePayableTo'];
$MailingName = $_POST['MailingName'];
$Address = $_POST['Address'];
$Address2 = $_POST['Address2'];
$City = $_POST['City'];
$State = $_POST['State'];
$ZipCode = $_POST['ZipCode'];
$AccountNumber = $_POST['AccountNumber'];
$AutoPay = $_POST['AutoPay'];
$Monthly = $_POST['Monthly'];
$Day = $_POST['Day'];
$Amount = $_POST['Amount'];
$Category = $_POST['Category2'];
$Notes = $_POST['Notes'];
$Status = $_POST['Status'];

$sql = "UPDATE tblBillCompany SET Name = '$Name', Person = '$Person', UserName = '$UserName', Password = '$Password', URL = '$URL', 
MakePayableTo = '$MakePayableTo', MailingName = '$MailingName', Address = '$Address', Address2 = '$Address2', City = '$City', 
State = '$State', ZipCode = '$ZipCode', AccountNumber = '$AccountNumber', AutoPay = '$AutoPay', Monthly = '$Monthly', Day = '$Day', 
Amount = '$Amount', Category = '$Category', Notes = '$Notes', Status = '$Status' WHERE CompanyID = '$CompanyID'";

$result = mysql_query($sql) or die("Cannot update table");

}

#Code for Filling out the table

$sql2 = "SELECT * FROM tblBillCompany WHERE CompanyID = '$CompanyID'";
$result2 = mysql_query($sql2) or die("Cannot populate table");

while($row2 = mysql_fetch_array($result2))
{

$Name = $row2[Name];
$Person = $row2[Person];
$UserName = $row2[UserName];
$Password = $row2[Password];
$URL = $row2[URL];
$MakePayableTo = $row2[MakePayableTo];
$MailingName = $row2[MailingName];
$Address = $row2[Address];
$Address2 = $row2[Address2];
$City = $row2[City];
$State = $row2[State];
$ZipCode = $row2[ZipCode];
$AccountNumber = $row2[AccountNumber];
$AutoPay = $row2[AutoPay];
$Monthly = $row2[Monthly];
$Day = $row2[Day];
$Amount = $row2[Amount];
$Category = $row2[Category];
$Notes = $row2[Notes];
$Status = $row2[Status];

}

#Create Table for User Input
?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit <? echo $Name; ?></strong></font>
</p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="BillHistory.php?c=<? echo $CompanyID; ?>">View
      History</a></font></p>
<form name="form1" method="post" action="">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Name</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Name" type="text" id="Name" value="<? echo $Name; ?>" size="40"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">UserName</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="UserName" type="text" id="UserName" value="<? echo $UserName; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Password</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Password" type="text" id="Password" value="<? echo $Password; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">URL</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="URL" type="text" id="URL" value="<? echo $URL; ?>" size="40">
  </font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Make Check Payable To</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="MakePayableTo" type="text" id="MakePayableTo" value="<? echo $MakePayableTo; ?>" size="30"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">MailingName</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="MailingName" type="text" id="MailingName" value="<? echo $MailingName; ?>" size="30"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Address</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Address" type="text" id="Address" value="<? echo $Address; ?>" size="30"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Address2</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Address2" type="text" id="Address2" value="<? echo $Address2; ?>" size="30"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">City</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="City" type="text" id="City" value="<? echo $City; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">State</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="State" type="text" id="State" value="<? echo $State; ?>" size="5"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Zip Code</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ZipCode" type="text" id="ZipCode" value="<? echo $ZipCode; ?>" size="10"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Account Number</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="AccountNumber" type="text" id="AccountNumber" value="<? echo $AccountNumber; ?>" size="30"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">AutoPay?</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="AutoPay" type="text" id="AutoPay" value="<? echo $AutoPay; ?>" size="3"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Monthly?</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Monthly" type="text" id="Monthly" value="<? echo $Monthly; ?>" size="3"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Day of Month for Billing
      (15, Last, First, etc) </font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Day" type="text" id="Day" value="<? echo $Day; ?>">
  </font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Amount of Bill (if repeated) </font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">$
        <input name="Amount" type="text" id="Amount" value="<? echo $Amount; ?>" size="10">
  </font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Category (Phone, Credit
      Card, etc) </font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <select name="Category2" tabindex="" id="Category2" class="text">
      <option value="" selected>Select</option>
      <? 
					$sql3 = "SELECT * FROM tblBillCategory WHERE Type = 'finance' AND Status = 'active' ORDER BY Name";
					$result3 = mysql_query($sql3) or die("Cannot get Category");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
      <option value="<? echo $row3[CategoryID]; ?>"<? if($row3[CategoryID] == $Category){echo "selected";}?>><? echo $row3[Name]; ?></option>
      <?
					}
				?>
    </select>
    <font size="1"><a href="catadd.php" target="_blank">add</a> | <a href="catview.php" target="_blank">view</a></font></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <textarea name="Notes" cols="40" rows="3" id="Notes"><? echo $Notes; ?></textarea>
  </font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Status (active, inactive) </font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Status" type="text" id="Status" value="<? echo $Status; ?>" size="10">
  </font></td>
</tr>
</table>
<p>
<input name="Update" type="submit" id="Update" value="Update">
</p>
</form>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// finishes security for page
}
else
{
	header("location: index.php"); //redirects user via PHP to this page... better than meta refresh...
}
?>