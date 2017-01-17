<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{



// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

			$ContactLogID = $_GET['cl'];
			
			
			// build connection to database
			$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
			mysql_select_db($db) or die("Cannot select Database");
			
		
			If ($_POST['Update'] == "Update")
			{
			
			$Notes = $_POST['Notes'];
			$Date = $_POST['Date'];
			$Time = $_POST['Time'];
			$AssignTo = $_POST['AssignTo'];
			$ContactType = $_POST['ContactType'];
			$Status = $_POST['Status'];
			
			if($Type == "Follow Up")
			{
			$sql = "UPDATE tblContactLog SET Notes = '$Notes', Date = '$Date', Time = '$Time', AssignTo = '$AssignTo', 
			ContactType = '$ContactType', 
			Status = '$Status' WHERE ContactLogID = '$ContactLogID'"; 
			}
			else
			{
			$sql = "UPDATE tblContactLog SET Notes = '$Notes', Date = '$Date', Time = '$Time', EmployeeID = '$AssignTo', 
			ContactType = '$ContactType', 
			Status = '$Status' WHERE ContactLogID = '$ContactLogID'"; 
			}
			
			$result = mysql_query($sql) or die("Cannot update ContactLogID"); 
			
				$goto = "index.php";
				header("location: $goto");
			
			
			}



#Code for Filling out the table

				$sql2 = "SELECT * FROM tblContactLog WHERE ContactLogID = '$ContactLogID'";
				$result2 = mysql_query($sql2) or die("Cannot populate table");
				
				while($row2 = mysql_fetch_array($result2))
				{
				$Notes = $row2[Notes];
				$Date = $row2[Date];
				$Time = $row2[Time];
				$AssignTo = $row2[AssignTo];
				$EmployeeID = $row2[EmployeeID];
				$ContactType = $row2[ContactType];
				$Status = $row2[Status];
				$Type = $row2[Type];
				
				}


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";



?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
      Contact Log Entry </strong></font>
</p>
<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Contact Type </font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <select name="ContactType" id="ContactType">
      <option value="Phone" <? if($ContactType == "Phone") { ?>selected<? } ?>>Phone</option>
      <option value="Email" <? if($ContactType == "Email") { ?>selected<? } ?>>Email</option>
      <option value="Fax" <? if($ContactType == "Fax") { ?>selected<? } ?>>Fax</option>
      <option value="Mail" <? if($ContactType == "Mail") { ?>selected<? } ?>>Mail</option>
      <option value="In Person" <? if($ContactType == "In Person") { ?>selected<? } ?>>In Person</option>
        </select>
  </font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Date </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Date" type="text" id="Date" value="<? echo $Date; ?>" size="30">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Time </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Time" type="text" id="Time" value="<? echo $Time; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
<textarea name="Notes" cols="40" rows="4" id="Notes"><? echo $Notes; ?></textarea>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Employee/Assigned To </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <select name="AssignTo" class="text" id="AssignTo">
    <option value = "" selected>Please Select</option>
    <?  
						
						if($Type == "Follow Up")
						{
						
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
					}
					else
					{
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
    <option value="<? echo $row[EmployeeID];?>" <? if($row[EmployeeID] == $EmployeeID){echo "selected";}?>><? echo $row[FirstName];?></option>
    <?
						}
					}	
					?>
  </select>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">    <select name="Status" id="Status">
      <option value="active" <? if($Status == "active") { ?>selected<? } ?>>active</option>
      <option value="inactive"<? if($Status == "inactive") { ?>selected<? } ?>>inactive</option>
      <option value="complete"<? if($Status == "complete") { ?>selected<? } ?>>complete</option>
    </select>
</font></td>
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
 // -------------- END MY CODE -------------------

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// has links that show up at the bottom in it
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