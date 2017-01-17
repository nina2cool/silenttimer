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

	$E = $_GET['e'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$TodayDate = date("Y-m-d");

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Follow
      Up Contacts</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">View follow ups for: <a href="index.php?e=3">Christina</a>  | <a href="index.php?e=16">Eric</a> | <a href="index.php?e=4">Erik</a> | <a href="index.php?e=9">Dina</a></font> 
</p>
<div align="right"><font size="2" face="Arial, Helvetica, sans-serif">E = Edit | C = Complete |
  H = History</font>
</div><br>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
    <?
			  if($E <> "")
			  {
			  	$sql = "SELECT tblContact.FirstName, tblContact.LastName, tblContact.Email, tblContact.Phone, tblContact.Ext,
				tblContact.Fax, tblContact.Address, tblContact.Address2, tblContact.City, tblContact.State, tblContact.ZipCode,
				tblContactLog.Date, tblContactLog.Time, tblContactLog.ContactID, tblContactLog.ContactType, tblContactLog.AssignTo,
				tblContactLog.EmployeeID, tblContactLog.Notes, tblContact.Company, tblContactLog.ContactLogID
				FROM tblContactLog
				INNER JOIN tblContact
				ON tblContactLog.ContactID = tblContact.ContactID
				WHERE tblContactLog.Status <> 'complete' AND tblContactLog.Type = 'Follow Up' AND tblContactLog.AssignTo = '$E'
				";
				}
				else
				{
				$sql = "SELECT tblContact.FirstName, tblContact.LastName, tblContact.Email, tblContact.Phone, tblContact.Ext,
				tblContact.Fax, tblContact.Address, tblContact.Address2, tblContact.City, tblContact.State, tblContact.ZipCode,
				tblContactLog.Date, tblContactLog.Time, tblContactLog.ContactID, tblContactLog.ContactType, tblContactLog.AssignTo,
				tblContactLog.EmployeeID, tblContactLog.Notes, tblContact.Company, tblContactLog.ContactLogID
				FROM tblContactLog
				INNER JOIN tblContact
				ON tblContactLog.ContactID = tblContact.ContactID
				WHERE tblContactLog.Status <> 'complete' AND tblContactLog.Type = 'Follow Up'
				";
				}

			//echo $sql;
				//sort results.....
				if ($sortBy != "")
				{
					$sql .= " ORDER BY $sortBy $sortDirection";
				}
			
				else
				{
					$sql .= " ORDER BY tblContactLog.Date ASC";
					$sortBy ="tblContactLog.Date";
					$sortDirection = "ASC";
				}
				
				//put SQL statement into result set for loop through records
				$result = mysql_query($sql) or die("Cannot execute query!");

			  
			  
			  
			   // code to handle sort direction
			   // this following code just switches teh ascending order to descending and vice verca when necessary.
			   // The links in the titles of the colum fields are changed depending on the value in this variable and
			   // depending on what is being sorted by.
			   if ($sortDirection == "ASC")
			   {
			   		$sd = "DESC";
			   }
			   else
			   {
			   		$sd = "ASC";
			   }

			    
?>
    <tr bgcolor="#FFFFCC"> 
      <td class=sort> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="index.php?sort=tblContact.LastName&d=<? if ($sortBy=="tblContact.LastName") {echo $sd;} else {echo "ASC";}?>">Contact
      Name</a> &amp; <a href="index.php?sort=tblContact.Company&d=<? if ($sortBy=="tblContact.Company") {echo $sd;} else {echo "ASC";}?>">Company </a></strong></font></div></td>
      <td class=sort> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="index.php?sort=tblContactLog.ContactType&d=<? if ($sortBy=="tblContactLog.ContactType") {echo $sd;} else {echo "ASC";}?>">Contact
      Type</a></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="index.php?sort=tblContactLog.Notes&d=<? if ($sortBy=="tblContactLog.Notes") {echo $sd;} else {echo "ASC";}?>">Notes</a></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="index.php?sort=tblContactLog.Date&d=<? if ($sortBy=="tblContactLog.Date") {echo $sd;} else {echo "ASC";}?>">Date</a>/<a href="index.php?sort=tblContactLog.Time&d=<? if ($sortBy=="tblContactLog.Time") {echo $sd;} else {echo "ASC";}?>">Time</a></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="index.php?sort=tblContactLog.AssignTod&d=<? if ($sortBy=="tblContactLog.AssignTo") {echo $sd;} else {echo "ASC";}?>">Assigned
      To</a></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Actions</strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$ContactID = $row[ContactID];
				$ContactLogID = $row[ContactLogID];
				$FirstName = $row[FirstName];
				$LastName = $row[LastName];
				$CompanyName = $row[Company];
				$Address = $row[Address];
				$Address2 = $row[Address2];
				$City = $row[City];
				$State = $row[State];
				$ZipCode = $row[ZipCode];
				$Phone = $row[Phone];
				$Ext = $row[Ext];
				$Email = $row[Email];
				$Fax = $row[Fax];
				$ContactType = $row[ContactType];
				$Date = $row[Date];
				$Time = $row[Time];
				$AssignToID = $row[AssignTo];
				$EmployeeID = $row[EmployeeID];
				$Notes = $row[Notes];
				
							$sql2 = "SELECT * FROM tblEmployee WHERE EmployeeID = '$EmployeeID'";
							$result2 = mysql_query($sql2) or die("Cannot get employee info");
							while($row2 = mysql_fetch_array($result2))
							{
								$EmployeeName = $row2[FirstName];
							}
							
							$sql3 = "SELECT * FROM tblEmployee WHERE EmployeeID = '$AssignToID'";
							$result3 = mysql_query($sql3) or die("Cannot get employee info");
							while($row3 = mysql_fetch_array($result3))
							{
								$AssignedTo = $row3[FirstName];
							}
																	
							
			  ?>
    <tr valign="middle" <? if($TodayDate >= $Date) { ?>bgcolor="#FFCCCC"<? } ?>> 
      <td> <div align="left">
        <p><font size="2" face="Arial, Helvetica, sans-serif"><font><? echo $FirstName; ?></font> <? echo $LastName; ?> <br>
        @ </font><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?></font></p>
        </div></td>
 
      <td> 
	    <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="ContactHistory.php?c=<? echo $ContactID; ?>"><? echo $ContactType; ?></a></font></div></td>

      <td> <div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Notes; ?> </font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Date; ?>	  <br>
            <? if($Time <> "00:00:00") { ?>
        <? echo $Time; ?>
        <? } ?>
        <br>
      </font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $AssignedTo; ?></font></div></td>
      <td nowrap><div align="center">
        <div align="left">
          <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="ContactLogEdit.php?cl=<? echo $ContactLogID; ?>">E</a></font> | <font size="2" face="Arial, Helvetica, sans-serif"><a href="ContactLogComplete.php?cl=<? echo $ContactLogID; ?>&c=<? echo $ContactID; ?>">C</a> | </font><font size="2" face="Arial, Helvetica, sans-serif"><a href="ContactHistory.php?c=<? echo $ContactID; ?>">H</a></font></p>
        </div>
        </div></td>
    </tr>
    <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
</table> 
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";


// has links that show up at the bottom in it.
require "../include/footerlinks.php";



// finishes security for page
}
else
{
?>
</p>
           
            
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
