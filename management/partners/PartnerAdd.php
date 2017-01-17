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


#Code for Adding to Table

#Double check the table names and spaces and commas in the code. Delete primary key IDs. 

// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

$Now = date("Y-m-d");

If ($_POST['Add'] == "Add")
{

$AffiliateID = $_POST['AffiliateID'];
$AccountType = $_POST['AccountType'];
$CompanyName = $_POST['CompanyName'];
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$Fax = $_POST['Fax'];
$Address = $_POST['Address'];
$Address2 = $_POST['Address2'];
$City = $_POST['City'];
$State = $_POST['State'];
$ZipCode = $_POST['ZipCode'];
$Country = $_POST['Country'];
$WebSiteName = $_POST['WebSiteName'];
$URL = $_POST['URL'];
$Description = $_POST['Description'];
$UniqueVisitors = $_POST['UniqueVisitors'];
$PageViews = $_POST['PageViews'];
$AnnualStudents = $_POST['AnnualStudents'];
$CheckToName = $_POST['CheckToName'];
$UserName = $_POST['UserName'];
$Password = $_POST['Password'];
$Rate = $_POST['Rate'];
$Percent = $_POST['Percent'];
$AcceptTerms = $_POST['AcceptTerms'];
$DateTime = $_POST['DateTime'];
$IP = $_POST['IP'];
$Approved = $_POST['Approved'];
$Custom = $_POST['Custom'];
$Status = $_POST['Status'];

$sql = "INSERT INTO tblAffiliate(AffiliateID, AccountType, CompanyName, FirstName, LastName, Email, Phone, Fax, Address, Address2, City, State, ZipCode, Country, WebSiteName, URL, Description, UniqueVisitors, PageViews, AnnualStudents, CheckToName, UserName, Password, Rate, Percent, AcceptTerms, DateTime, IP, Approved, Custom, Status) 
VALUES('$AffiliateID', '$AccountType', '$CompanyName', '$FirstName', '$LastName', '$Email', '$Phone', '$Fax', '$Address', '$Address2', '$City', '$State', '$ZipCode', '$Country', '$WebSiteName', '$URL', '$Description', '$UniqueVisitors', '$PageViews', '$AnnualStudents', '$CheckToName', '$UserName', '$Password', '$Rate', '$Percent', '$AcceptTerms', '$DateTime', '$IP', '$Approved', '$Custom', '$Status');"; 

$result = mysql_query($sql) or die("Cannot insert into tblAffiliate"); 

header("location: index.php");

}

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";


?>

<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
a Partner/Affiliate</strong></font>
<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Affiliate ID </font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="AffiliateID" type="text" id="AffiliateID">
  </font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Account Type (person or
    web) </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="AccountType" type="text" id="AccountType"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">CompanyName</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="CompanyName" type="text" id="CompanyName"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">FirstName</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="FirstName" type="text" id="FirstName"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">LastName</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="LastName" type="text" id="LastName"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Email</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Email" type="text" id="Email"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Phone</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Phone" type="text" id="Phone"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Fax</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Fax" type="text" id="Fax"></font></td>
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
<td><font size="2" face="Arial, Helvetica, sans-serif">Country</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Country" type="text" id="Country"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">WebSiteName</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="WebSiteName" type="text" id="WebSiteName"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">URL</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="URL" type="text" id="URL"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Description</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Description" type="text" id="Description"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">UniqueVisitors</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="UniqueVisitors" type="text" id="UniqueVisitors"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">PageViews</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="PageViews" type="text" id="PageViews"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">AnnualStudents</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="AnnualStudents" type="text" id="AnnualStudents"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">CheckToName</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="CheckToName" type="text" id="CheckToName"></font></td>
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
<td><font size="2" face="Arial, Helvetica, sans-serif">Rate</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Rate" type="text" id="Rate"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Percent</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Percent" type="text" id="Percent"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">AcceptTerms</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="AcceptTerms" type="text" id="AcceptTerms" value="y"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">DateTime</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="DateTime" type="text" id="DateTime" value="<? echo $Now; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Approved</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Approved" type="text" id="Approved" value="y"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Custom</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Custom" type="text" id="Custom" value="n"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Status" type="text" id="Status" value="active"></font></td>
</tr>
</table>
<p>
<input name="Add" type="submit" id="Add" value="Add">
</p>
</form>

<?
mysql_close($link);
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

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
