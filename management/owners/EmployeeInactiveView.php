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

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>



<?
	//$_SESSION['userName'] = $userNameNew;
	
	//when the user is logged in, their userName is in this session, store it into variable
	$userName = $_SESSION['userName'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT * from tblEmployee WHERE Status = 'inactive'";
						//sort results.....
			if ($sortBy != "")
			{
				$sql .= " ORDER BY $sortBy $sortDirection";
			}
		
			else
			{
				$sql .= " ORDER BY tblEmployee.LastName ASC";
				$sortBy ="tblEmployee.LastName";
				$sortDirection = "ASC";
			}
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

	$sum = mysql_num_rows($result);

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Silent 
  Technology Employee List</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">There are <? echo $sum; ?> 
  inactive employees.</font></p>
            
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
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
    <td width="20%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../owners/EmployeeView.php?sort=tblEmployee.FirstName&d=<? if ($sortBy=="tblEmployee.FirstName") {echo $sd;} else {echo "ASC";} ?>">First 
        Name </a></font></strong></font></div></td>
    <td width="16%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../owners/EmployeeView.php?sort=tblEmployee.LastName&d=<? if ($sortBy=="tblEmployee.LastName") {echo $sd;} else {echo "ASC";} ?>">Last 
        Name </a></font></strong></font></div></td>
    <td width="17%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../owners/EmployeeView.php?sort=tblEmployee.CellPhone&d=<? if ($sortBy=="tblEmployee.CellPhone") {echo $sd;} else {echo "ASC";} ?>">Cell 
        Phone </a></strong></font></div></td>
    <td width="18%" class=sort> <div align="center"><font color="#003399" face="Arial, Helvetica, sans-serif"><strong><font size="2"><a href="../owners/EmployeeView.php?sort=tblEmployee.Email&d=<? if ($sortBy=="tblEmployee.Email") {echo $sd;} else {echo "ASC";} ?>">Email</a></font></strong></font></div></td>
    <td width="16%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../owners/EmployeeView.php?sort=tblEmployee.Type&d=<? if ($sortBy=="tblEmployee.Type") {echo $sd;} else {echo "ASC";} ?>">Type</a></strong></font></div></td>
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
				
				
				if($FirstName == "")
				{ $FirstName = "-"; }
				
				if($LastName == "")
				{ $LastName = "-"; }
				
				if($CellPhone == "")
				{ $CellPhone = "-"; }
				
				if($Email == "")
				{ $Email = "-"; }
				
				if($Type == "")
				{ $Type = "-"; }
				
	?>
  <tr> 
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../owners/EmployeeEdit.php?e=<? echo $EmployeeID; ?>">Details</a></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CellPhone; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Email; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Type; ?></font></div></td>
  </tr>
  <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="EmployeeView.php">View 
  Active Employees</a></font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p> 
  <?

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