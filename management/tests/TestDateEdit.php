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

$TestDateID = $_GET['tID'];

#Code for Updating to Table

#Add the WHERE clause in the sql statement, double check the table names. Delete primary key IDs. 

// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

$Now = date("Y-m-d");

If ($_POST['Update'] == "Update")
{

$TestID = $_POST['TestID'];
$Date = $_POST['Date'];
$Info = $_POST['Info'];

$sql = "UPDATE tblTestDates SET TestID = '$TestID', Date = '$Date', Info = '$Info' WHERE TestDateID = '$TestDateID'"; 

$result = mysql_query($sql) or die("Cannot update table"); 

}

#Code for Filling out the table

$sql2 = "SELECT * FROM tblTestDates WHERE TestDateID = '$TestDateID'";
$result2 = mysql_query($sql2) or die("Cannot populate table");

while($row2 = mysql_fetch_array($result2))
{
$TestID = $row2[TestID];
$Date = $row2[Date];
$Info = $row2[Info];
}

#Create Table for User Input
?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
  Test Date</strong></font>
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">TestID</font></td>
<td><select name="TestID" id="select">
  <?    
		// build combo box for the test options from the database.
		// SQL to get data from test table
	
		$sql = "SELECT * FROM tblTests ORDER BY Name";
		//put SQL statement into result set for loop through records
		$result = mysql_query($sql) or die("Cannot execute 1st query!");
		
		while($row = mysql_fetch_array($result))
		{

	?>
  <option value="<? echo $row[TestID]; ?>" <? if ($row[TestID] == $TestID) {echo "selected";} ?>><? echo $row[Name]; ?></option>
  <?
		}
	?>
</select></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Date</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Date" type="text" id="Date" value="<? echo $Date; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Info</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <textarea name="Info" cols="40" rows="3" id="Info"><? echo $Info; ?></textarea>
</font></td>
</tr>
</table>
<p>&nbsp;</p>
  <input name="Update" type="submit" id="Update" value="Update">
  <input type="reset" name="Reset" value="Reset">
</form>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<?

// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
mysql_close($link);

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