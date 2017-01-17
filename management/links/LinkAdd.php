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

$Title = $_POST['Title'];
$Link = $_POST['Link'];
$Description = $_POST['Description'];
$Test = $_POST['Test'];
$Type = $_POST['Type'];
$IsOfficial = $_POST['IsOfficial'];
$Status = $_POST['Status'];
$Priority = $_POST['Priority'];

$sql = "INSERT INTO tblLinks(Title, Link, Description, Test, Type, IsOfficial, Status, Priority) 
VALUES('$Title', '$Link', '$Description', '$Test', '$Type', '$IsOfficial', '$Status', '$Priority');"; 

$result = mysql_query($sql) or die("Cannot insert into table"); 



		$sql4 = "SELECT * FROM tblLinks WHERE Title = '$Title' AND Link  = '$Link' AND Description = '$Description' AND Test = '$Test'
		AND Type = '$Type' AND IsOfficial = '$IsOfficial' AND Status = '$Status' AND Priority = '$Priority'";
		
		$result4 = mysql_query($sql4) or die("Cannot get link");
		
			while($row4 = mysql_fetch_array($result4))
			{
			$LinkID = $row4[LinkID];
			}



		if($Type == "News")
		{
		
		$sql2 = "SELECT Max(NewsID) as Max from tblLinks";
		$result2 = mysql_query($sql2) or die("Cannot get max link");
		
			while($row2 = mysql_fetch_array($result2))
			{
			$Max = $row2[Max];
			}
		
		$NewsID = $Max + 1;
		
		$sql3 = "UPDATE tblLinks SET NewsID = '$NewsID' WHERE LinkID = '$LinkID'";
		$result3 = mysql_query($sql3) or die("cannot update newsID");


		}

}

#Create Table for User Input
?>

<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
a Link</strong></font>
<br>
<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Title</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Title" type="text" id="Title"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Link</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Link" type="text" id="Link" size="50"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Description</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <textarea name="Description" cols="40" rows="3" id="Description"></textarea>
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
<td><font size="2" face="Arial, Helvetica, sans-serif">Test (one per link; leave
    blank if no test) </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Test" type="text" id="Test"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Type (Test, Test Prep,
    College, Forum) </font></td>
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
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="IsOfficial" type="text" id="IsOfficial" value="n" size="3" maxlength="1"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Status" type="text" id="Status" value="active" size="10">
</font></td>
</tr>
</table>
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
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>