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

			$ContactID = $_GET['c'];
			
			// build connection to database
			$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
			mysql_select_db($db) or die("Cannot select Database");
			
		
			If ($_POST['Add'] == "Add")
			{
			
			$Notes = $_POST['Notes'];
			$Date = $_POST['Date'];
			$Time = $_POST['Time'];
			$Employee = $_POST['Employee'];
			$ContactType = $_POST['ContactType'];
			$Type = $_POST['Type'];
			
						if($Type == "Follow Up")
						{
						
						$sql = "INSERT INTO tblContactLog(ContactID, Notes, Date, Time, AssignTo, ContactType, Status, Type)
						VALUES('$ContactID', '$Notes', '$Date', '$Time', '$Employee', '$ContactType', 'active', '$Type');"; 
						
						$result = mysql_query($sql) or die("Cannot add follow up ContactLogID"); 
						
						}
						else
						{
						
						$sql = "INSERT INTO tblContactLog(ContactID, Notes, Date, Time, EmployeeID, ContactType, Status, Type)
						VALUES('$ContactID', '$Notes', '$Date', '$Time', '$Employee', '$ContactType', 'active', '$Type');"; 

						$result = mysql_query($sql) or die("Cannot add ContactLogID"); 
						
						}
			
				$goto = "ContactHistory.php?c=$ContactID";
				header("location: $goto");
			
			
			
			}


#Code for Filling out the table

				$sql2 = "SELECT * FROM tblContact WHERE ContactID = '$ContactID'";
				$result2 = mysql_query($sql2) or die("Cannot populate table");
				
				while($row2 = mysql_fetch_array($result2))
				{
				$FirstName = $row2[FirstName];
				$LastName = $row2[LastName];
				}


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";



?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add Contact
      Log Entry for <? echo $FirstName; ?> <? echo $LastName; ?></strong></font></p>
<form name="form1" method="post" action="">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Contact Type</font></td>
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
<td><font size="2" face="Arial, Helvetica, sans-serif">Date Contacted (or follow
    up date) </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Date" type="text" id="Date" value="0000-00-00" size="30">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Time Contacted (or follow
    up time)</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Time" type="text" id="Time" value="00:00:00"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
<textarea name="Notes" cols="40" rows="4" id="Notes"></textarea>
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Employee (who talked
      to the contact or who needs to follow up with contact) </font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <select name="Employee" class="text" id="Employee">
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
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif"> Type</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <select name="Type" id="Type">
      <option value="Follow Up">Follow Up</option>
      <option value="Contact">Contact</option>
    </select>
  </font></td>
</tr>
</table>
  <p>
    <input name="Add" type="submit" id="Add" value="Add">
  </p>
</form>





<?	
 // -------------- END MY CODE -------------------

mysql_close($link);

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