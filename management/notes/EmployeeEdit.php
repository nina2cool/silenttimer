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

$EmployeeID = $_GET['e'];

#Code for Updating to Table

#Add the WHERE clause in the sql statement, double check the table names. Delete primary key IDs. 

// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

$Now = date("Y-m-d");

If ($_POST['Update'] == "Update")
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
$AffiliateID = $_POST['AffiliateID'];
$UserName = $_POST['UserName'];
$Password = $_POST['Password'];
$Level = $_POST['Level'];
$Status = $_POST['Status'];
$Notes = $_POST['Notes'];

$sql = "UPDATE tblEmployee SET FirstName = '$FirstName', LastName = '$LastName', Address = '$Address', Address2 = '$Address2', City = '$City', 
State = '$State', ZipCode = '$ZipCode', Country = '$Country', HomePhone = '$HomePhone', CellPhone = '$CellPhone', Fax = '$Fax', 
Email = '$Email', DateStarted = '$DateStarted', DateEnded = '$DateEnded', CommissionRate = '$CommissionRate', HourlyRate = '$HourlyRate', 
Type = '$Type', AffiliateID = '$AffiliateID', UserName = '$UserName', Password = '$Password', Level = '$Level', Status = '$Status', 
Notes = '$Notes' WHERE EmployeeID = '$EmployeeID'"; 

$result = mysql_query($sql) or die("Cannot update EmployeeID"); 

}

#Code for Filling out the table

$sql2 = "SELECT * FROM tblEmployee WHERE EmployeeID = '$EmployeeID'";
$result2 = mysql_query($sql2) or die("Cannot populate table");

while($row2 = mysql_fetch_array($result2))
{
$FirstName = $row2[FirstName];
$LastName = $row2[LastName];
$Address = $row2[Address];
$Address2 = $row2[Address2];
$City = $row2[City];
$State = $row2[State];
$ZipCode = $row2[ZipCode];
$Country = $row2[Country];
$HomePhone = $row2[HomePhone];
$CellPhone = $row2[CellPhone];
$Fax = $row2[Fax];
$Email = $row2[Email];
$DateStarted = $row2[DateStarted];
$DateEnded = $row2[DateEnded];
$CommissionRate = $row2[CommissionRate];
$HourlyRate = $row2[HourlyRate];
$Type = $row2[Type];
$AffiliateID = $row2[AffiliateID];
$UserName = $row2[UserName];
$Password = $row2[Password];
$Level = $row2[Level];
$Status = $row2[Status];
$Notes = $row2[Notes];

}

#Create Table for User Input
?>

<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
Info for <? echo $FirstName; ?> <? echo $LastName; ?>
</strong></font>
<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">FirstName</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="FirstName" type="text" id="FirstName" value="<? echo $FirstName; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">LastName</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="LastName" type="text" id="LastName" value="<? echo $LastName; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Address</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Address" type="text" id="Address" value="<? echo $Address; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Address2</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Address2" type="text" id="Address2" value="<? echo $Address2; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">City</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="City" type="text" id="City" value="<? echo $City; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">State</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="State" type="text" id="State" value="<? echo $State; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">ZipCode</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ZipCode" type="text" id="ZipCode" value="<? echo $ZipCode; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Country</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Country" type="text" id="Country" value="<? echo $Country; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Home Phone</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="HomePhone" type="text" id="HomePhone" value="<? echo $HomePhone; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Cell Phone</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="CellPhone" type="text" id="CellPhone" value="<? echo $CellPhone; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Fax</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Fax" type="text" id="Fax" value="<? echo $Fax; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Email</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Email" type="text" id="Email" value="<? echo $Email; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Date Started</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="DateStarted" type="text" id="DateStarted" value="<? echo $DateStarted; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Date Ended</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="DateEnded" type="text" id="DateEnded" value="<? echo $DateEnded; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Commission Rate</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="CommissionRate" type="text" id="CommissionRate" value="<? echo $CommissionRate; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Hourly Rate</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="HourlyRate" type="text" id="HourlyRate" value="<? echo $HourlyRate; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Job Title </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Type" type="text" id="Type" value="<? echo $Type; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">AffiliateID</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="AffiliateID" type="text" id="AffiliateID" value="<? echo $AffiliateID; ?>"></font></td>
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
  <td><font size="2" face="Arial, Helvetica, sans-serif">Level (1, 2 or 3) </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Level" type="text" id="Level" value="<? echo $Level; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <textarea name="Notes" cols="40" rows="3" id="Notes"><? echo $Notes; ?></textarea>
  </font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Status" type="text" id="Status" value="<? echo $Status; ?>"></font></td>
</tr>
</table>
<p>
<input name="Update" type="submit" id="Update" value="Update">
</p>
</form>

<?
mysql_close($link);
?>






  <?
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