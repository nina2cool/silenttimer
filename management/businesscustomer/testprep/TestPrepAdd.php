<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";


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
		$Address = $_POST['Address'];
		$Address2 = $_POST['Address2'];
		$Address3 = $_POST['Address3'];
		$City = $_POST['City'];
		$State = $_POST['State'];
		$ZipCode = $_POST['ZipCode'];
		$Country = $_POST['Country'];
		$Phone1 = $_POST['Phone1'];
		$Fax1 = $_POST['Fax1'];
		$Email1 = $_POST['Email1'];
		$Website = $_POST['Website'];
		$Notes = $_POST['Notes'];
		$Status = $_POST['Status'];
		

		$sql = "INSERT INTO tblBusinessCustomer(Name, Chain, CustomerType, Address, Address2, Address3, City, State, ZipCode, Country, Phone1, Fax1, Email1, Website, Notes, Status) 
		VALUES('$Name', '$Chain', 'Test Prep', '$Address', '$Address2', '$Address3', '$City', '$State', '$ZipCode', '$Country', '$Phone1', '$Fax1', '$Email1', 
		'$Website', '$Notes', '$Status');"; 
		
		$result = mysql_query($sql) or die("Cannot insert new test prep"); 
		
		}

#Create Table for User Input
?>

<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
a New Test Prep Company</strong></font>
<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Name</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Name" type="text" id="Name" size="50"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Chain (ex:
      Barnes &amp; Noble, Kaplan, Princeton Review)</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Chain" type="text" id="Chain"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Address</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Address" type="text" id="Address" size="30"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Address2</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Address2" type="text" id="Address2" size="30"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Address3</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Address3" type="text" id="Address3" size="30"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">City</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="City" type="text" id="City"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">State</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="State" type="text" id="State" size="5"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">ZipCode</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ZipCode" type="text" id="ZipCode" size="10" maxlength="15"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Country (US, CA for Canada) </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Country" type="text" id="Country" value="US" size="5"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Phone1<br>
  Ex:
      512-258-8668</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Phone1" type="text" id="Phone1"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Fax1<br>
  Ex: 512-258-8668</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Fax1" type="text" id="Fax1"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Email1</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Email1" type="text" id="Email1"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Website</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Website" type="text" id="Website"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Notes" type="text" id="Notes"></font></td>
</tr>
<tr>
<td height="34"><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
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
require "../../include/footerlinks.php";


}
?>