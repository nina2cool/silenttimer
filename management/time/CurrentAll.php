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
	


?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Current
Pay Period for All </strong></font></p>
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr bgcolor="#FFFFCC">
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Employee</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Hours</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Rate</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Total</font></strong></div></td>
  </tr>
  <tr>
  <?
  	
	//beginning SQL statement that gets all data from tables.
	$sql3 = "SELECT Sum(Hours) as Sum, EmployeeID
	from tblTime WHERE Paid = 'n' AND Status = 'active' GROUP BY EmployeeID";
	//echo $sql3;
	
	//put SQL statement into result set for loop through records
	$result3 = mysql_query($sql3) or die("Cannot execute query!");
	
	while($row3 = mysql_fetch_array($result3))

			{
			$Sum = $row3[Sum];
			$EmployeeIDTime = $row3[EmployeeID];
			
			
			
						$sql2 = "SELECT * FROM tblEmployee WHERE EmployeeID = '$EmployeeIDTime'";
						//echo $sql2;
						$result2 = mysql_query($sql2) or die("Cannot get employee ID");
						
						while($row2 = mysql_fetch_array($result2))
						{
						$FirstName = $row2[FirstName];
						$Rate = $row2[HourlyRate];
						}
			
				$Total = $Sum * $Rate;
  
  ?>
  
    <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="PeriodView.php?e=<? echo $EmployeeIDTime; ?>"><? echo $FirstName; ?></a></font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Sum; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Rate,2); ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Total,2); ?></font></div></td>
  </tr>
  <?
  }
  
  
  ?>
  
</table>
<p> 
<p>
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
