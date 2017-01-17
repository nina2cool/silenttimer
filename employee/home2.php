<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

$PageTitle = "Silent Technology LLC Employee Home Page";

//security check
If (session_is_registered('e'))
{

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	//get name of person/company	
	$eID = $_SESSION['e'];
	
	#connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			
		
	$sql = "SELECT * FROM tblEmployee WHERE EmployeeID = '$eID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
			
	while($row = mysql_fetch_array($result))
	{
		$EmployeeName = $row[FirstName];
	}
	
	mysql_close($link);
?>

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Welcome, 
  <? echo $EmployeeName;?>!</strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr> 
    <td width="71%" align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif">These 
        pages are for Management only.</font></p>
      <p><font size="5" face="Arial, Helvetica, sans-serif">Enjoy!</font></p>
      </td>
    <td width="29%" align="left" valign="middle" bgcolor="#FFFFCC">
<p align="left"><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;<a href="profile.php">Your 
        Employee Profile</a></font></p>
      <p align="left"><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;<a href="employees.php">View 
        All Employees</a></font></p>
      <p align="left"><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;<a href="addemployee.php">Add 
        an Employee</a></font></p>
      <p align="left"><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;<a href="customers.php">Your 
        Customer List</a></font></p>
      <p align="left"><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;<a href="addcustomer.php">Add 
        a Customer</a></font></p>
      <p align="left"><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;<a href="allcustomers.php">View 
        All Customers</a></font></p>
      <p align="left"><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;<a href="<? echo $http; ?>index.php">Silent 
        Timer Home Page</a></font></p>
      <p align="left"><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;<a href="contacthq.php">Contact 
        Headquarters</a></font></p>
      <p align="left"><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;<a href="logout.php">Log 
        Out </a></font></p></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";



// finishes security for page
}
else
{
	$http .= "employee";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>
</p>
