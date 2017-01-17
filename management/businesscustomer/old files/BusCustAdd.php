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

#Code for Adding to Table

#Double check the table names and spaces and commas in the code. Delete primary key IDs. 

// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

$Now = date("Y-m-d");

If ($_POST['Add'] == "Add")
{

$Name = $_POST['Name'];
$Chain = $_POST['Chain'];
$ChainID = $_POST['ChainID'];
$CustomerType = $_POST['CustomerType'];
$TPRType = $_POST['TPRType'];
$TPRRegion = $_POST['TPRRegion'];
$IncNumber = $_POST['IncNumber'];
$BNCBNumber = $_POST['BNCBNumber'];
$BordersStoreNumber = $_POST['BordersStoreNumber'];
$Address = $_POST['Address'];
$Address2 = $_POST['Address2'];
$Address3 = $_POST['Address3'];
$City = $_POST['City'];
$State = $_POST['State'];
$ZipCode = $_POST['ZipCode'];
$Country = $_POST['Country'];
$Phone1 = $_POST['Phone1'];
$Phone2 = $_POST['Phone2'];
$Fax1 = $_POST['Fax1'];
$Fax2 = $_POST['Fax2'];
$Email1 = $_POST['Email1'];
$Email2 = $_POST['Email2'];
$Website = $_POST['Website'];
$ContactFirstName = $_POST['ContactFirstName'];
$ContactLastName = $_POST['ContactLastName'];
$ContactPosition = $_POST['ContactPosition'];
$ContactEmail = $_POST['ContactEmail'];
$ContactFirstName2 = $_POST['ContactFirstName2'];
$ContactLastName2 = $_POST['ContactLastName2'];
$ContactPosition2 = $_POST['ContactPosition2'];
$ContactEmail2 = $_POST['ContactEmail2'];
$StoreDirector = $_POST['StoreDirector'];
$StoreManager = $_POST['StoreManager'];
$StoreTradeSupervisor = $_POST['StoreTradeSupervisor'];
$Notes = $_POST['Notes'];
$CheckStore = $_POST['CheckStore'];
$Rebate = $_POST['Rebate'];
$NewBNStore = $_POST['NewBNStore'];
$Status = $_POST['Status'];

$sql = "INSERT INTO tblBusinessCustomer(Name, Chain, ChainID, CustomerType, TPRType, TPRRegion, IncNumber, BNCBNumber, BordersStoreNumber, Address, Address2, Address3, City, State, ZipCode, Country, Phone1, Phone2, Fax1, Fax2, Email1, Email2, Website, ContactFirstName, ContactLastName, ContactPosition, ContactEmail, ContactFirstName2, ContactLastName2, ContactPosition2, ContactEmail2, StoreDirector, StoreManager, StoreTradeSupervisor, Notes, CheckStore, Rebate, NewBNStore, Status) 
VALUES('$Name', '$Chain', '$ChainID', '$CustomerType', '$TPRType', '$TPRRegion', '$IncNumber', '$BNCBNumber', '$BordersStoreNumber', '$Address', '$Address2', '$Address3', '$City', '$State', '$ZipCode', '$Country', '$Phone1', '$Phone2', '$Fax1', '$Fax2', '$Email1', '$Email2', '$Website', '$ContactFirstName', '$ContactLastName', '$ContactPosition', '$ContactEmail', '$ContactFirstName2', '$ContactLastName2', '$ContactPosition2', '$ContactEmail2', '$StoreDirector', '$StoreManager', '$StoreTradeSupervisor', '$Notes', '$CheckStore', '$Rebate', '$NewBNStore', '$Status');"; 

$result = mysql_query($sql) or die("Cannot insert into table"); 

}

#Create Table for User Input
?>

<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
Bookstore or Test Prep
</strong></font>
<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Name</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Name" type="text" id="Name" size="50"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Chain </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(ex:
      Barnes &amp; Noble, Kaplan, Princeton Review)</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Chain" type="text" id="Chain"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">CustomerType<br>
  </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(
  Must have
    a type listed - either Bookstore or Test Prep or University)</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="CustomerType" type="text" id="CustomerType" value="Bookstore" size="15"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Address</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Address" type="text" id="Address" size="30"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Address2</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Address2" type="text" id="Address2" size="30"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Address3</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Address3" type="text" id="Address3" size="30"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">City</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="City" type="text" id="City"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">State</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="State" type="text" id="State" size="5"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">ZipCode<br>
</font></strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Look
it up on <a href="http://www.usps.com/zip4/">USPS website</a>.</font> </td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ZipCode" type="text" id="ZipCode" size="10" maxlength="15"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Country</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> <font size="2" face="Arial, Helvetica, sans-serif">(US,
      CA for Canada) </font></font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Country" type="text" id="Country" value="US" size="5"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Phone1<br>
  </font></strong><font size="2" face="Arial, Helvetica, sans-serif">Ex:
      512-258-8668</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Phone1" type="text" id="Phone1"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Fax1<br>
  </font></strong><font size="2" face="Arial, Helvetica, sans-serif">Ex: 512-258-8668</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Fax1" type="text" id="Fax1"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Email1</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Email1" type="text" id="Email1"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Website</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Website" type="text" id="Website"></font></td>
</tr>
<tr>
  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Rebate</font></strong></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Rebate" type="text" id="Rebate">
  </font></td>
</tr>
<tr>
  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Phone2<br>
    </font></strong><font size="2" face="Arial, Helvetica, sans-serif">Ex: 512-258-8668</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Phone2" type="text" id="Phone2">
  </font></td>
</tr>
<tr>
  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Fax2<br>
    </font></strong><font size="2" face="Arial, Helvetica, sans-serif">Ex: 512-258-8668</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Fax2" type="text" id="Fax2">
  </font></td>
</tr>
<tr>
  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Email2</font></strong></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Email2" type="text" id="Email2">
  </font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">ContactFirstName</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ContactFirstName" type="text" id="ContactFirstName"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">ContactLastName</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ContactLastName" type="text" id="ContactLastName"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">ContactPosition</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ContactPosition" type="text" id="ContactPosition"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">ContactEmail</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ContactEmail" type="text" id="ContactEmail"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">ContactFirstName2</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ContactFirstName2" type="text" id="ContactFirstName2"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">ContactLastName2</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ContactLastName2" type="text" id="ContactLastName2"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">ContactPosition2</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ContactPosition2" type="text" id="ContactPosition2"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">ContactEmail2</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ContactEmail2" type="text" id="ContactEmail2"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">StoreDirector</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="StoreDirector" type="text" id="StoreDirector"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">StoreManager</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="StoreManager" type="text" id="StoreManager"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">StoreTradeSupervisor</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> (B &amp; N
    only)</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="StoreTradeSupervisor" type="text" id="StoreTradeSupervisor"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Notes" type="text" id="Notes"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">CheckStore</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="CheckStore" type="text" id="CheckStore"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">NewBNStore</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="NewBNStore" type="text" id="NewBNStore" value="n" size="3" maxlength="1"></font></td>
</tr>
<tr>
  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">TPR Type</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> (COS,
      INDP, etc) (Princeton Review only)<strong><br>
      </strong></font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="TPRType" type="text" id="TPRType">
  </font></td>
</tr>
<tr>
  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">TPR Region </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(SW,
      Central, etc) (Princeton Review only)<strong><br>
      </strong></font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="TPRRegion" type="text" id="TPRRegion">
  </font></td>
</tr>
<tr>
  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Inc. Number
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(B &amp; N
      only)<strong><br>
      </strong></font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="IncNumber" type="text" id="IncNumber">
  </font></td>
</tr>
<tr>
  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">BNCB Number
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(B &amp; N
      only)<strong><br>
      </strong></font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="BNCBNumber" type="text" id="BNCBNumber">
  </font></td>
</tr>
<tr>
  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">BordersStoreNumber </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(Borders
      only) </font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="BordersStoreNumber" type="text" id="BordersStoreNumber">
  </font></td>
</tr>
<tr>
<td height="34"><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Status" type="text" id="Status" value="active"></font></td>
</tr>
</table>
<p>
<input name="Add" type="submit" id="Add" value="Add">
</p>
</form>

<?
mysql_close($link);


// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.
require "../include/footerlinks.php";


}
?>