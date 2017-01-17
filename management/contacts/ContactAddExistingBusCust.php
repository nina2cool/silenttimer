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


#Code for Adding to Table

#Double check the table names and spaces and commas in the code. Delete primary key IDs.

// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

$Now = date("Y-m-d");

If ($_POST['Add'] == "Add")
{

			$BusinessCustomerID = $_POST['BusinessCustomerID'];
			$Notes = $_POST['Notes'];
			
			$sql2 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
			$result2 = mysql_query($sql2) or die("Cannot populate customer");
			
			while($row2 = mysql_fetch_array($result2))
			{
			$FirstName = $row2[ContactFirstName];
			$LastName = $row2[ContactLastName];
			$Company = $row2[Chain];
			$Name = $row2[Name];
			$Address = $row2[Address];
			$Address2 = $row2[Address2];
			$City = $row2[City];
			$State = $row2[State];
			$ZipCode = $row2[ZipCode];
			$Phone = $row2[Phone1];
			$Ext = $row2[Ext1];
			$Fax = $row2[Fax1];
			$Email = $row2[Email1];
			$URL = $row2[URL];
			}
			
			if($Company == "") { $Company = $Name; }


$sql = "INSERT INTO tblContact(BusinessCustomerID, FirstName, LastName, Company, Title, Address, Address2, City, State, ZipCode, Phone, Ext, Fax, Email, URL, Notes, Status)
VALUES('$BusinessCustomerID', '$FirstName', '$LastName', '$Company', '$Title', '$Address', '$Address2', '$City', '$State', '$ZipCode', '$Phone', '$Ext', '$Fax', '$Email', '$URL', '$Notes', 'active');";

$result = mysql_query($sql) or die("Cannot insert into contact add");



				$goto = "ContactView.php";
				header("location: $goto");

}
// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";
#Create Table for User Input
?>

<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
a New Contact from Existing BusinessCustomer List </strong></font>

<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Find BusinessCustomerID</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <select name="BusinessCustomerID" class="text" id="BusinessCustomerID">
        <option value = "" selected>Please Select</option>
        <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT *
								FROM tblBusinessCustomer
								WHERE Status = 'active'
								ORDER BY Chain, Name, ContactLastName, ContactFirstName";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
        <option value="<? echo $row[BusinessCustomerID];?>" <? if($row[BusinessCustomerID] == $BusinessCustomerID){echo "selected";}?>><? echo $row[Chain];?> - <? echo $row[Name]; ?> in <? echo $row[City]; ?>, <? echo $row[State];?> Contact: <? echo $ContactFirstName; ?> <? echo $ContactLastName; ?></option>
        <?
						}
					?>
      </select>
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <textarea name="Notes" id="Notes"></textarea>
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