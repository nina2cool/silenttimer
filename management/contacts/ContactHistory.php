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
	
	$ContactID = $_GET['c'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$TodayDate = date("Y-m-d");
	
	
	
	$sql3 = "SELECT * FROM tblContact WHERE ContactID = '$ContactID'";
	$result3 = mysql_query($sql3) or die("Cannot get contact info");
	
	while($row3 = mysql_fetch_array($result3))
	{
			$CustomerID = $row3[CustomerID];
			$BusinessCustomerID = $row3[BusinessCustomerID];
			$FirstName = $row3[FirstName];
			$LastName = $row3[LastName];
			$Company = $row3[Company];
			$Title = $row3[Title];
			$Address = $row3[Address];
			$Address2 = $row3[Address2];
			$City = $row3[City];
			$State = $row3[State];
			$ZipCode = $row3[ZipCode];
			$Phone = $row3[Phone];
			$Ext = $row3[Ext];
			$Fax = $row3[Fax];
			$Email = $row3[Email];
			$URL = $row3[URL];
			$Notes = $row3[Notes];
			$Status = $row3[Status];
	}
	
	

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Contact
      History</strong></font></p>
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr valign="top">
    <td><p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Contact
            Name: <font color="#0000FF"><? echo $FirstName; ?> <? echo $LastName; ?></font></strong></font></p>
      <? if($Title <> "") { ?>
	  <p><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Title: <font color="#0000FF"><? echo $Title; ?></font></strong></font></strong></p>
     <? } ?>
	  <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Company: <font color="#0000FF"><? echo $Company; ?></font></strong></font></p>
      <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><b>Address:</b><br>
        <? echo $Address; ?><br>
        <? if($Address2 <> "") { ?><? echo $Address2; ?><br><? } ?>
    <? echo $City; ?>, <? echo $State; ?> <? echo $ZipCode; ?></font></p></td>
    <td><p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><b>Phone:</b> <? echo $Phone; ?><? if($Ext <> ""){ ?> Ext: <? echo $Ext; ?><? } ?></font></p>
      <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><b>Fax: </b><? echo $Fax; ?></font></p>
    <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><b>Email:</b> <a href="mailto:<? echo $Email; ?>"><? echo $Email; ?></a></font></p>
    <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><b>URL:</b> <a href="<? echo $URL; ?>" target="_blank"><? echo $URL; ?></a></font></p>
    <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="ContactEdit.php?c=<? echo $ContactID; ?>">Edit</a></font></p></td>
  </tr>
  <tr valign="top">
    <td colspan="2"><p><font size="2" face="Arial, Helvetica, sans-serif"><b>Notes:</b></font></p>
    <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Notes; ?></font></p></td>
  </tr>
</table>
<p><strong><font color="#000000" size="3" face="Arial, Helvetica, sans-serif">Contact
History</font></strong></p>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
    <?
			  
			  	$sql = "SELECT * FROM tblContactLog
				WHERE ContactID = '$ContactID' AND Type = 'Contact' AND Status <> 'inactive'
				";

			//echo $sql;
				//sort results.....
				if ($sortBy != "")
				{
					$sql .= " ORDER BY $sortBy $sortDirection";
				}
			
				else
				{
					$sql .= " ORDER BY tblContactLog.Date DESC";
					$sortBy ="tblContactLog.Date";
					$sortDirection = "DESC";
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
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ContactHistory.php?c=<? echo $ContactID; ?>&sort=tblContactLog.Date&d=<? if ($sortBy=="tblContactLog.Date") {echo $sd;} else {echo "ASC";}?>">Date</a></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ContactHistory.php?c=<? echo $ContactID; ?>&sort=tblContactLog.Time&d=<? if ($sortBy=="tblContactLog.Time") {echo $sd;} else {echo "ASC";}?>">Time</a></strong></font></div></td> 
      <td class=sort> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ContactHistory.php?c=<? echo $ContactID; ?>&sort=tblContactLog.ContactType&d=<? if ($sortBy=="tblContactLog.ContactType") {echo $sd;} else {echo "ASC";}?>">Contact
      Type</a></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ContactHistory.php?c=<? echo $ContactID; ?>&sort=tblContactLog.Notes&d=<? if ($sortBy=="tblContactLog.Notes") {echo $sd;} else {echo "ASC";}?>">Notes</a></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ContactHistory.php?c=<? echo $ContactID; ?>&sort=tblContactLog.AssignTod&d=<? if ($sortBy=="tblContactLog.AssignTo") {echo $sd;} else {echo "ASC";}?>">Employee</a></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Actions</strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$ContactID = $row[ContactID];
				$ContactLogID = $row[ContactLogID];
				$ContactType = $row[ContactType];
				$Date = $row[Date];
				$Time = $row[Time];
				$EmployeeID = $row[EmployeeID];
				$Notes = $row[Notes];
				
							$sql2 = "SELECT * FROM tblEmployee WHERE EmployeeID = '$EmployeeID'";
							$result2 = mysql_query($sql2) or die("Cannot get employee info");
							while($row2 = mysql_fetch_array($result2))
							{
								$Employee = $row2[FirstName];
							}
							
			  ?>
    <tr>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Date; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Time; ?></font></div></td> 
      <td> 
	    <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ContactType; ?> </font></div></td>

      <td> <div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Notes; ?> </font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Employee; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="ContactLogEdit.php?cl=<? echo $ContactLogID; ?>">View</a></font></div></td>
    </tr>
    <?
			  	}
				
			  ?>
</table> 
		<p><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="ContactLogAdd.php?c=<? echo $ContactID; ?>">Add a new contact log </a></font></p>
		<p><strong><font color="#000000" size="3" face="Arial, Helvetica, sans-serif">Follow
		      Up 
        History</font></strong></p>
		<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
          <?
			  
			  	$sql = "SELECT * FROM tblContactLog
				WHERE ContactID = '$ContactID' AND Type = 'Follow Up' AND Status <> 'inactive'
				";

			//echo $sql;
				//sort results.....
				if ($sortBy != "")
				{
					$sql .= " ORDER BY $sortBy $sortDirection";
				}
			
				else
				{
					$sql .= " ORDER BY tblContactLog.Date DESC";
					$sortBy ="tblContactLog.Date";
					$sortDirection = "DESC";
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
            <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ContactHistory.php?c=<? echo $ContactID; ?>&sort=tblContactLog.Date&d=<? if ($sortBy=="tblContactLog.Date") {echo $sd;} else {echo "ASC";}?>">Date</a></strong></font></div></td>
            <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ContactHistory.php?c=<? echo $ContactID; ?>&sort=tblContactLog.Time&d=<? if ($sortBy=="tblContactLog.Time") {echo $sd;} else {echo "ASC";}?>">Time</a></strong></font></div></td>
            <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ContactHistory.php?c=<? echo $ContactID; ?>&sort=tblContactLog.ContactType&d=<? if ($sortBy=="tblContactLog.ContactType") {echo $sd;} else {echo "ASC";}?>">Contact
                      Type</a></strong></font></div></td>
            <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ContactHistory.php?c=<? echo $ContactID; ?>&sort=tblContactLog.Notes&d=<? if ($sortBy=="tblContactLog.Notes") {echo $sd;} else {echo "ASC";}?>">Notes</a></strong></font></div></td>
            <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ContactHistory.php?c=<? echo $ContactID; ?>&sort=tblContactLog.AssignTod&d=<? if ($sortBy=="tblContactLog.AssignTo") {echo $sd;} else {echo "ASC";}?>">Assigned
                      To</a></strong></font></div></td>
            <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ContactHistory.php?c=<? echo $ContactID; ?>&sort=tblContactLog.AssignTod&d=<? if ($sortBy=="tblContactLog.AssignTo") {echo $sd;} else {echo "ASC";}?>">Complete?</a></strong></font></div></td>
            <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Actions</strong></font></div></td>
            <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$ContactID = $row[ContactID];
				$ContactLogID = $row[ContactLogID];
				$ContactTypeF = $row[ContactType];
				$DateF = $row[Date];
				$TimeF = $row[Time];
				$AssignToID = $row[AssignTo];
				$NotesF = $row[Notes];
				$Status = $row[Status];
				
				if($Status == "complete") { $Complete = "yes"; }
				else { $Complete = "NO!"; }
				
							
							$sql3 = "SELECT * FROM tblEmployee WHERE EmployeeID = '$AssignToID'";
							$result3 = mysql_query($sql3) or die("Cannot get employee info");
							while($row3 = mysql_fetch_array($result3))
							{
								$AssignTo = $row3[FirstName];
							}
																	
							
			  ?>
          <tr>
            <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DateF; ?></font></div></td>
            <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $TimeF; ?></font></div></td>
            <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ContactTypeF; ?> </font></div></td>
            <td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $NotesF; ?> </font></div></td>
            <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $AssignTo; ?></font></div></td>
            <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Complete; ?></font></div></td>
            <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="ContactLogEdit.php?cl=<? echo $ContactLogID; ?>">View</a></font></div></td>
          </tr>
          <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
        </table>
		<p><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="ContactLogAdd.php?c=<? echo $ContactID; ?>">Add a new follow up entry </a></font></p>
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
