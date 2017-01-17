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

$StoreID = $_POST['StoreID'];
$Date = $_POST['Date'];


$sql = "INSERT INTO tblRebate(BusinessCustomerID, DateTime, Link) 
VALUES('$StoreID', '$Date', 'Rebate');"; 

echo $sql;

$result = mysql_query($sql) or die("Cannot insert into table"); 

}

#Create Table for User Input
?>

<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
Rebate for Customers
</strong></font>
<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Store ID </font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="StoreID" type="text" id="StoreID" target="1"></font></td>
</tr>
<tr>
<td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date</font></strong></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Date" type="text" id="Date" value="0000-00-00" target="2"></font></td>
</tr>
</table>
<p>
<input name="Add" type="submit" id="Add" value="Add" target="3">
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