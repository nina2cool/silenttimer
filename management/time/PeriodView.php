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
	$EmployeeIDTime = $_GET['e'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	$sql2 = "SELECT * FROM tblEmployee WHERE EmployeeID = '$EmployeeIDTime'";
	$result2 = mysql_query($sql2) or die("Cannot get employee ID");
	
	while($row2 = mysql_fetch_array($result2))
	{
		$FirstName = $row2[FirstName];
		$Rate = $row2[HourlyRate];
	}	
	
	
	
	//beginning SQL statement that gets all data from tables.
	$sql3 = "SELECT Sum(Hours) as Sum, EmployeeID
	from tblTime WHERE EmployeeID = '$EmployeeIDTime' AND Paid = 'n' AND Status = 'active' GROUP BY EmployeeID
	ORDER BY Date DESC";
	
	//put SQL statement into result set for loop through records
	$result3 = mysql_query($sql3) or die("Cannot execute query!");
	
	while($row3 = mysql_fetch_array($result3))
				{
				$Sum = $row3[Sum];
				}
	
	$sql = "SELECT * from tblTime WHERE EmployeeID = '$EmployeeIDTime' AND Paid = 'n' AND Status = 'active' ORDER BY Date";
	
	//echo $sql;
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}
	
	$result = mysql_query($sql) or die("Cannot execute query!");

	//$sum = mysql_num_rows($result);

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Current
Pay Period for <? echo $FirstName; ?></strong></font></p>
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
    <td width="20%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Date</font></strong></font></div></td>
    <td width="16%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Hours</font></strong></font></div></td>
    <td width="16%" class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Rate</strong></font></div></td>
    <td width="16%" class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Total</strong></font></div></td>
    <td width="16%" class=sort> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Type</strong></font></div></td>
  </tr>
  <?
 	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$Hours = $row[Hours];
				$Date = $row[Date];
				$Type = $row[Type];
				$Status = $row[Status];
				//$Sum = $row[Sum];
				
				$Total = $Hours * $Rate;
				
	?>
  <tr> 
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Date; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Hours; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Rate,2); ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Total,2); ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Type; ?></font></div></td>
  </tr>
  <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif">Total Number of Hours for this Pay Period: <strong><? echo $Sum; ?></strong></font></p>
<p>&nbsp;</p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Tell Christina
      if you made a mistake on your timesheet.</font></p>
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