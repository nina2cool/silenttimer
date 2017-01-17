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


// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

$Now = date("Y-m-d");

If ($_POST['Add'] == "Add")
{

$Name = $_POST['Name'];
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

$sql = "INSERT INTO tblBillCompany(Name, UserName, Password, URL, MakePayableTo, MailingName, Address, Address2, City, State, ZipCode, AccountNumber, AutoPay, Monthly, Day, Amount, Category, Notes, Status)
VALUES('$Name', '$UserName', '$Password', '$URL', '$MakePayableTo', '$MailingName', '$Address', '$Address2', '$City', '$State', '$ZipCode', '$AccountNumber', '$AutoPay', '$Monthly', '$Day', '$Amount', '$Category', '$Notes', '$Status');";

$result = mysql_query($sql) or die("Cannot insert into table");

}

#Create Table for User Input
?>

<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
a Company</strong></font>
<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Name</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Name" type="text" id="Name"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">UserName</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="UserName" type="text" id="UserName"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Password</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Password" type="text" id="Password"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">URL</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="URL" type="text" id="URL"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">MakePayableTo</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="MakePayableTo" type="text" id="MakePayableTo"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">MailingName</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="MailingName" type="text" id="MailingName"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Address</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Address" type="text" id="Address"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Address2</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Address2" type="text" id="Address2"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">City</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="City" type="text" id="City"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">State</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="State" type="text" id="State"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">ZipCode</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ZipCode" type="text" id="ZipCode"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">AccountNumber</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="AccountNumber" type="text" id="AccountNumber"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">AutoPay?</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="AutoPay" type="text" id="AutoPay" value="n" size="5" maxlength="1">
  </font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Monthly?</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Monthly" type="text" id="Monthly" value="y" size="5" maxlength="1">
  </font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Day</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Day" type="text" id="Day"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Amount of Bill (if repeated) </font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">$
        <input name="Amount" type="text" id="Amount">
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
					$result3 = mysql_query($sql3) or die("Cannot get category");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
      <option value="<? echo $row3[CategoryID]; ?>"><? echo $row3[Name]; ?></option>
      <?
					}
				?>
    </select>
  </font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <textarea name="Notes" cols="40" rows="3" id="Notes"></textarea>
  </font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Status (active, inactive) </font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Status" type="text" id="Status" value="active" size="10">
  </font></td>
</tr>
</table>
<p>
<input name="Add" type="submit" id="Add" value="Add">
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