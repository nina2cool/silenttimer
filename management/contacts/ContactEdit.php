<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{



//require "include/sidemenu.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

$ContactID = $_GET['c'];

#Code for Updating to Table

#Add the WHERE clause in the sql statement, double check the table names. Delete primary key IDs.

// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");


If ($_POST['Update'] == "Update")
{

$CustomerID = $_POST['CustomerID'];
$BusinessCustomerID = $_POST['BusinessCustomerID'];
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Company = $_POST['Company'];
$Title = $_POST['Title'];
$Address = $_POST['Address'];
$Address2 = $_POST['Address2'];
$City = $_POST['City'];
$State = $_POST['State'];
$ZipCode = $_POST['ZipCode'];
$Phone = $_POST['Phone'];
$Ext = $_POST['Ext'];
$Fax = $_POST['Fax'];
$Email = $_POST['Email'];
$URL = $_POST['URL'];
$Notes = $_POST['Notes'];
$Status = $_POST['Status'];

$sql = "UPDATE tblContact SET CustomerID = '$CustomerID', BusinessCustomerID = '$BusinessCustomerID', FirstName = '$FirstName', LastName = '$LastName', Company = '$Company', Title = '$Title', Address = '$Address', Address2 = '$Address2', City = '$City', State = '$State', ZipCode = '$ZipCode', Phone = '$Phone', Ext = '$Ext', Fax = '$Fax', Email = '$Email', URL = '$URL', Notes = '$Notes', Status = '$Status' WHERE ContactID = '$ContactID'";

$result = mysql_query($sql) or die("Cannot update table");


$goto = "ContactView.php";
header("location: $goto");

}

#Code for Filling out the table

$sql2 = "SELECT * FROM tblContact WHERE ContactID = '$ContactID'";
$result2 = mysql_query($sql2) or die("Cannot populate ContactID");

while($row2 = mysql_fetch_array($result2))
{
$CustomerID = $row2[CustomerID];
$BusinessCustomerID = $row2[BusinessCustomerID];
$FirstName = $row2[FirstName];
$LastName = $row2[LastName];
$Company = $row2[Company];
$Title = $row2[Title];
$Address = $row2[Address];
$Address2 = $row2[Address2];
$City = $row2[City];
$State = $row2[State];
$ZipCode = $row2[ZipCode];
$Phone = $row2[Phone];
$Ext = $row2[Ext];
$Fax = $row2[Fax];
$Email = $row2[Email];
$URL = $row2[URL];
$Notes = $row2[Notes];
$Status = $row2[Status];

}

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
Contact Info </strong></font></p>
<p><b><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="ContactHistory.php?c=<? echo $ContactID; ?>">View
      Contact History</a> </font> </b></p>
<form name="form1" method="post" action="">
<p><font size="2" face="Arial, Helvetica, sans-serif">Updating the information on this page only updates the information for the
  contact table (it won't update the customer or business customer information) </font></p>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">CustomerID</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="CustomerID" type="text" id="CustomerID" value="<? echo $CustomerID; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">BusinessCustomerID</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="BusinessCustomerID" type="text" id="BusinessCustomerID" value="<? echo $BusinessCustomerID; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">FirstName</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="FirstName" type="text" id="FirstName" value="<? echo $FirstName; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">LastName</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="LastName" type="text" id="LastName" value="<? echo $LastName; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Company</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Company" type="text" id="Company" value="<? echo $Company; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Title</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Title" type="text" id="Title" value="<? echo $Title; ?>"></font></td>
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
<td><font size="2" face="Arial, Helvetica, sans-serif">Phone</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Phone" type="text" id="Phone" value="<? echo $Phone; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Ext</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Ext" type="text" id="Ext" value="<? echo $Ext; ?>"></font></td>
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
<td><font size="2" face="Arial, Helvetica, sans-serif">URL</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="URL" type="text" id="URL" value="<? echo $URL; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <textarea name="Notes" cols="40" id="Notes"><? echo $Notes; ?></textarea>
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
</font> 
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<font face="Arial"> 
<?
}
?>
</font>