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

//require "include/sidemenu.php";

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




$sql = "INSERT INTO tblContact(CustomerID, BusinessCustomerID, FirstName, LastName, Company, Title, Address, Address2, City, State, ZipCode, Phone, Ext, Fax, Email, URL, Notes, Status)
VALUES('$CustomerID', '$BusinessCustomerID', '$FirstName', '$LastName', '$Company', '$Title', '$Address', '$Address2', '$City', '$State', '$ZipCode', '$Phone', '$Ext', '$Fax', '$Email', '$URL', '$Notes', 'active');";

$result = mysql_query($sql) or die("Cannot insert into table");

}

#Create Table for User Input
?>

<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
a New Contact </strong></font>

<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">CustomerID (if existing
    customer) </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <select name="CustomerID" class="text" id="CustomerID">
    <option value = "" selected>Please Select</option>
    <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT *
								FROM tblCustomer
								ORDER BY LastName, FirstName";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
    <option value="<? echo $row[CustomerID];?>" <? if($row[CustomerID] == $CustomerID){echo "selected";}?>><? echo $row[LastName];?>, <? echo $row[FirstName]; ?> in <? echo $row[City]; ?>, <? echo $row[State];?></option>
    <?
						}
					?>
  </select>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">BusinessCustomerID (if
    existing business customer) </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <select name="BusinessCustomerID" class="text" id="BusinessCustomerID">
    <option value = "" selected>Please Select</option>
    <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT *
								FROM tblEmployee
								ORDER BY FirstName";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
    <option value="<? echo $row[EmployeeID];?>" <? if($row[EmployeeID] == $AssignTo){echo "selected";}?>><? echo $row[FirstName];?></option>
    <?
						}
					?>
  </select>
</font></td>
</tr>
</table>
<blockquote>
  <p><font color="#0000FF" size="3" face="Arial, Helvetica, sans-serif"><b>OR</b></font></p>
</blockquote>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">FirstName</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="FirstName" type="text" id="FirstName">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">LastName</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="LastName" type="text" id="LastName">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Company</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="Company" type="text" id="Company">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Title</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="Title" type="text" id="Title">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Address</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="Address" type="text" id="Address">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Address2</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="Address2" type="text" id="Address2">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">City</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="City" type="text" id="City">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">State</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="State" type="text" id="State">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">ZipCode</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="ZipCode" type="text" id="ZipCode">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Phone</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="Phone" type="text" id="Phone">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Ext</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="Ext" type="text" id="Ext">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Fax</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="Fax" type="text" id="Fax">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Email</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="Email" type="text" id="Email">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">URL</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="URL" type="text" id="URL">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="Notes" type="text" id="Notes">
    </font></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>
  <input name="Add" type="submit" id="Add" value="Add">
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