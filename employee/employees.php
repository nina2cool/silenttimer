<?
//security for page
session_start();

$PageTitle = "Silent Technology LLC Employees";

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('e'))
{

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>



<?
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$EmployeeID= $_SESSION['e'];
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT * from tblEmployee";

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

	$sum = mysql_num_rows($result);

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Silent 
  Technology Employee List</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">There are <? echo $sum; ?> employees.</font></p>
            
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
  <?
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
    <td width="13%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Details</font></strong></font></div></td>
    <td width="20%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="employees.php?sort=tblEmployee.FirstName&d=<? if ($sortBy=="tblEmployee.FirstName") {echo $sd;} else {echo "ASC";} ?>">First 
        Name </a></font></strong></font></div></td>
    <td width="16%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="employees.php?sort=tblEmployee.LastName&d=<? if ($sortBy=="tblEmployee.LastName") {echo $sd;} else {echo "ASC";} ?>">Last 
        Name </a></font></strong></font></div></td>
    <td width="17%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="employees.php?sort=tblEmployee.CellPhone&d=<? if ($sortBy=="tblEmployee.CellPhone") {echo $sd;} else {echo "ASC";} ?>">Cell 
        Phone </a></strong></font></div></td>
    <td width="18%" class=sort> <div align="center"><font color="#003399" face="Arial, Helvetica, sans-serif"><strong><font size="2"><a href="employees.php?sort=tblEmployee.Email&d=<? if ($sortBy=="tblEmployee.Email") {echo $sd;} else {echo "ASC";} ?>">Email</a></font></strong></font></div></td>
    <td width="16%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="employees.php?sort=tblEmployee.Type&d=<? if ($sortBy=="tblEmployee.Type") {echo $sd;} else {echo "ASC";} ?>">Type</a></strong></font></div></td>
  </tr>
  <?
 	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$EmployeeID = $row[EmployeeID];
				
				$sql2 = "SELECT * from tblEmployee WHERE EmployeeID = '$EmployeeID'";
				$result2 = mysql_query($sql2) or die("Cannot execute query!");
				
				while($row = mysql_fetch_array($result2))
				{
					$EmployeeID = $row[EmployeeID];
					$FirstName = $row[FirstName];
					$LastName = $row[LastName];
					$CellPhone = $row[CellPhone];
					$Email = $row[Email];
					$Type = $row[Type];
				}
			  ?>
  <tr> 
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="editemployees.php?c=<? echo $EmployeeID; ?>"><strong>Details</strong></a></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $FirstName; ?></strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $LastName; ?></strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $CellPhone; ?></strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Email; ?></strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Type; ?></strong></font></div></td>
  </tr>
  <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
</table>
<p>&nbsp;</p>
<p><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;<a href="addemployee.php">Add 
  New Employee</a></font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p> 
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


// finishes security for page
}
else
{
?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}

// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


// has links that show up at the bottom in it.
require "include/footerlinks.php";

?>

