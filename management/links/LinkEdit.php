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
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";


// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


$LinkID = $_GET['link'];


// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

$Now = date("Y-m-d");

If ($_POST['Update'] == "Update")
{

$Title = $_POST['Title'];
$Link = $_POST['Link'];
$Description = $_POST['Description'];
$Test = $_POST['Test'];
$Type = $_POST['Type'];
$IsOfficial = $_POST['IsOfficial'];
$Status = $_POST['Status'];
$Priority = $_POST['Priority'];

$sql = "UPDATE tblLinks SET Title = '$Title', Link = '$Link', Description = '$Description', 
Test = '$Test', Type = '$Type', IsOfficial = '$IsOfficial', Status = '$Status', Priority = '$Priority' WHERE LinkID = '$LinkID'"; 

$result = mysql_query($sql) or die("Cannot update table"); 

}

#Code for Filling out the table

$sql2 = "SELECT * FROM tblLinks WHERE LinkID = '$LinkID'";
$result2 = mysql_query($sql2) or die("Cannot populate table");

while($row2 = mysql_fetch_array($result2))
{

$Title = $row2[Title];
$Link = $row2[Link];
$Description = $row2[Description];
$Test = $row2[Test];
$Type = $row2[Type];
$IsOfficial = $row2[IsOfficial];
$Status = $row2[Status];
$Priority = $row2[Priority];

}






?>

<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
Link </strong></font>
<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Title</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Title" type="text" id="Title" value="<? echo $Title; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Link</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Link" type="text" id="Link" value="<? echo $Link; ?>" size="50"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Description</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <textarea name="Description" cols="40" rows="3" id="Description"><? echo $Description; ?></textarea>
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Priority (if priority
      doesn't matter, then leave at 100) </font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Priority" type="text" id="Priority" value="100">
  </font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Test (one per link;
      leave blank if no test) </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Test" type="text" id="Test" value="<? echo $Test; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Type</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <select name="Type" class="text" id="Type">
    <option value = "" selected>Please Select</option>
    <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT * FROM tblLinks WHERE Type <> ''
								GROUP BY Type";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
    <option value="<? echo $row[Type];?>" <? if($row[Type] == $Type){echo "selected";}?>><? echo $row[Type];?></option>
    <?
						}
					?>
  </select>
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Is Official site?</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="IsOfficial" type="text" id="IsOfficial" value="<? echo $IsOfficial; ?>" size="3" maxlength="1"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Status" type="text" id="Status" value="<? echo $Status; ?>" size="10"></font></td>
</tr>
</table>
<p>
<input name="Update" type="submit" id="Update" value="Update">
<input type="reset" name="Reset" value="Reset">
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
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>