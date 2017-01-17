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

			$FollowUp = $_POST['FollowUp'];
			
			$NotesF = $_POST['NotesF'];
			$DateF = $_POST['DateF'];
			$TimeF = $_POST['TimeF'];
			$AssignTo = $_POST['AssignTo'];
			$ContactTypeF = $_POST['ContactTypeF'];

						
			$sql = "INSERT INTO tblContactLog(ContactID, Notes, Date, Time, EmployeeID, ContactType, Status, Type)
			VALUES('$ContactID', '$Notes', '$Date', '$Time', '$Employee', '$ContactType', 'active', 'Contact');"; 
			echo $sql;
			$result = mysql_query($sql) or die("Cannot add ContactLogID"); 
			
			
			$sql3 = "UPDATE tblContactLog SET Status = 'complete' WHERE ContactLogID = '$ContactLogID'";
			$result3 = mysql_query($sql3) or die("Cannot update contact log ID with complete status");
			
			echo "<br><br>Information for this contact session has been entered.";
			
			
						if($FollowUp == "y")
						{			
									
						$sql = "INSERT INTO tblContactLog(ContactID, Notes, Date, Time, AssignTo, ContactType, Status, Type)
						VALUES('$ContactID', '$NotesF', '$DateF', '$TimeF', '$AssignTo', '$ContactTypeF', 'active', 'Follow Up');"; 
						
						$result = mysql_query($sql) or die("Cannot add follow up ContactLogID"); 
					
						echo "<br><br>Follow up information has been entered.";
						
						}

			
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
				$ContactType = $row2[ContactType];
				$Status = $row2[Status];
				
				}


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";



?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Complete
      Contact Log Entry</strong></font>
</p>
<form name="form1" method="post" action="">
  <p><font color="#CC33FF"><b><font size="3" face="Arial, Helvetica, sans-serif">Fill out this section
      once the contact with the customer has been completed: </font></b></font></p>
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
<td><font size="2" face="Arial, Helvetica, sans-serif">Date Contacted</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Date" type="text" id="Date" value="<? echo $Date; ?>" size="30">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Time Contacted </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Time" type="text" id="Time" value="<? echo $Time; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Notes (what was talked
    about)</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
<textarea name="Notes" cols="40" rows="4" id="Notes"><? echo $Notes; ?></textarea>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Employee</font></td>
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
</table>
  <p><font color="#0000FF"><b><font size="3" face="Arial, Helvetica, sans-serif">Need
  to follow up with this contact? </font></b></font></p>
  <p><font color="#0000FF"><b><font size="3" face="Arial, Helvetica, sans-serif">check
          if yes </font> <font size="3" face="Arial, Helvetica, sans-serif">
            <input name="FollowUp" type="checkbox" id="FollowUp" value="y">
          </font> </b></font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif">If a follow up is required,
      fill out the information below: </font></p>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Contact Type</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="ContactTypeF" id="ContactTypeF">
          <option value="Phone" <? if($ContactType == "Phone") { ?>selected<? } ?>>Phone</option>
          <option value="Email" <? if($ContactType == "Email") { ?>selected<? } ?>>Email</option>
          <option value="Fax" <? if($ContactType == "Fax") { ?>selected<? } ?>>Fax</option>
          <option value="Mail" <? if($ContactType == "Mail") { ?>selected<? } ?>>Mail</option>
          <option value="In Person" <? if($ContactType == "In Person") { ?>selected<? } ?>>In
          Person</option>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Follow Up Date</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="DateF" type="text" id="DateF" value="0000-00-00" size="30">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Follow Up Time </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="TimeF" type="text" id="TimeF" value="00:00:00">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="NotesF" cols="40" rows="4" id="NotesF"></textarea>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Assign To</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="AssignTo" class="text" id="AssignTo">
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