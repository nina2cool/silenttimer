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

	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "Select * FROM tblEmployee WHERE Type = 'Intern' AND Status = 'active'";
	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?> <font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View 
Active Interns</strong></font> 
<form>
			
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
    <tr bgcolor="#CCCCCC"> 
      <td width="15%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">View/Edit</font></strong></font></div></td>
      <td width="35%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" 
				     face="Arial, Helvetica, sans-serif"><a href="../interns/internview.php?sort=tblEmployee.FirstName&d=<? if ($sortBy=="tblEmployee.FirstName") {echo $sd;} else {echo "ASC";}?>">First 
          Name</a></font></strong></font></div></td>
      <td width="20%" class=sort><font color="#000000"><strong><font size="2" 
				     face="Arial, Helvetica, sans-serif"><a href="../interns/internview.php?sort=tblEmployee.LastName&d=<? if ($sortBy=="tblEmployee.LastName") {echo $sd;} else {echo "ASC";}?>">Last 
        Name</a></font></strong></font></td>
      <td width="20%" class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Location</font></strong></div></td>
      <td width="20%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif"><a href="../interns/internview.php?sort=tblEmployee.City&d=<? if ($sortBy=="tblEmployee.City") {echo $sd;} else {echo "ASC";} ?>">City</a></font></strong></font></div></td>
      <td width="35%" class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../interns/internview.php?sort=tblEmployee.State&d=<? if ($sortBy=="tblEmployee.State") {echo $sd;} else {echo "ASC";} ?>">State</a></font></strong></div></td>
      <td width="35%" class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Email</font></strong></div></td>

      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
					$LocationID = $row[LocationID];
					$FirstName = $row[FirstName];
					$LastName = $row[LastName];
					$City = $row[City];
					$State = $row[State];
					$Email = $row[Email];
					$EmployeeID = $row[EmployeeID];
				
					$sql2 = "SELECT * FROM tblInternshipLocation WHERE LocationID = '$LocationID'";
					$result2 = mysql_query($sql2) or die("Cannot execute query!");
					
					while($row2 = mysql_fetch_array($result2))
					{
						$LocationID = $row2[LocationID];
						$LocationName = $row2[LocationName];
					}
								
			  ?>
    <tr> 
      <td width="5%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="internedit.php?int=<? echo $EmployeeID; ?>">View/Edit</a></strong></font></div></td>
      <td width="35%"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $FirstName; ?></strong></font></div></td>
      <td width="25%"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $LastName; ?></strong></font></td>
      <td width="25%"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $LocationName; ?></strong></font></td>
      <td width="25%"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $City; ?></strong></font></div></td>
      <td width="5%"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $State; ?></strong></font></td>
      <td width="20%"><font size="2" face="Arial, Helvetica, sans-serif"><a href="mailto:<? echo $Email; ?>" target="_blank"><strong>Send 
        Email </strong></a></font></td>

    </tr>
    <?
			  	
				}
				//close connection to database
				mysql_close($link);
			  ?>
  </table> 
		
            
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; 
    <a href="interninactiveview.php">View Inactive Interns</a></strong></font></p>
  <p align="left">&nbsp;</p>
            
  <p align="center"> 
</form>
  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.

require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

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
