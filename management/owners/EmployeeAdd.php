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

	//when the user is logged in, their userName is in this session, store it into variable
	$userName = $_SESSION['userName'];

// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

	//beginning SQL statement that gets all data from tables.
	$sql3 = "SELECT * from tblEmployee WHERE UserName = '$userName'";

	$result3 = mysql_query($sql3) or die("Cannot execute query!");
	while($row3 = mysql_fetch_array($result3))
	{
	$Level = $row3[Level];
	}
	
	if($Level == '1')
	{
	

#Code for Adding to Table

#Double check the table names and spaces and commas in the code. Delete primary key IDs. 



$Now = date("Y-m-d");

If ($_POST['Add'] == "Add")
{

$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Address = $_POST['Address'];
$Address2 = $_POST['Address2'];
$City = $_POST['City'];
$State = $_POST['State'];
$ZipCode = $_POST['ZipCode'];
$Country = $_POST['Country'];
$HomePhone = $_POST['HomePhone'];
$CellPhone = $_POST['CellPhone'];
$Fax = $_POST['Fax'];
$Email = $_POST['Email'];
$DateStarted = $_POST['DateStarted'];
$DateEnded = $_POST['DateEnded'];
$CommissionRate = $_POST['CommissionRate'];
$HourlyRate = $_POST['HourlyRate'];
$Type = $_POST['Type'];
$LocationID = $_POST['LocationID'];
$UserName = $_POST['UserName'];
$Password = $_POST['Password'];
$Level = $_POST['Level'];
$Status = $_POST['Status'];
$Notes = $_POST['Notes'];

$sql = "INSERT INTO tblEmployee(FirstName, LastName, Address, Address2, City, State, ZipCode, Country, HomePhone, CellPhone, Fax, Email, DateStarted, DateEnded, CommissionRate, HourlyRate, Type, AffiliateID, UserName, Password, Level, Status, Notes) 
VALUES('$FirstName', '$LastName', '$Address', '$Address2', '$City', '$State', '$ZipCode', '$Country', '$HomePhone', '$CellPhone', '$Fax', '$Email', '$DateStarted', '$DateEnded', '$CommissionRate', '$HourlyRate', '$Type', '$AffiliateID', '$UserName', '$Password', '$Level', '$Status', '$Notes');"; 

$result = mysql_query($sql) or die("Cannot insert into table"); 

}

#Create Table for User Input
?>

<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
an Employee</strong></font>
<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">FirstName</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="FirstName" type="text" id="FirstName"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">LastName</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="LastName" type="text" id="LastName"></font></td>
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
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Country" type="text" id="Country" value="US"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Home Phone</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="HomePhone" type="text" id="HomePhone"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Cell Phone</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="CellPhone" type="text" id="CellPhone"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Fax</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Fax" type="text" id="Fax"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Email</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Email" type="text" id="Email"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Date Started</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="DateStarted" type="text" id="DateStarted" value="<? echo $Now; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Date Ended</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="DateEnded" type="text" id="DateEnded" value="0000-00-00"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Commission Rate</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="CommissionRate" type="text" id="CommissionRate"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Hourly Rate</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="HourlyRate" type="text" id="HourlyRate"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Job Title </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Type" type="text" id="Type"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">AffiliateID</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="AffiliateID" type="text" id="AffiliateID"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">UserName</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="UserName" type="text" id="UserName"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Password</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Password" type="password" id="Password"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Level (1, 2 or 3) </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Level" type="text" id="Level" size="3"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <textarea name="Notes" cols="40" rows="3" id="Notes"></textarea>
  </font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Status" type="text" id="Status" value="active">
  </font></td>
</tr>
</table>
<p>
<input name="Add" type="submit" id="Add" value="Add">
</p>
</form>

<?

mysql_close($link);

}
else
{


?>

<p><font size="2" face="Arial, Helvetica, sans-serif">You are not eligible
    to view this page.</font></p>




<?


}
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// has links that show up at the bottom in it - found in home management folder
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