<?

//security for page
session_start();

// has http variable in it to populate links on page.
require "url.php";

//security check
If (session_is_registered('userName'))
{


// has database username and password, so don't need to put it in the page.
require "dbinfo.php";

	$userName = $_SESSION['userName'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	$sql2 = "SELECT * FROM tblEmployee WHERE UserName = '$userName'";
	$result2 = mysql_query($sql2) or die("Cannot get employee ID");
	
	while($row2 = mysql_fetch_array($result2))
	{
		$EmployeeID2 = $row2[EmployeeID];
		$Level = $row2[Level];
	}


	if($Level <> '10')
	{
	
?>

		  <table width="95%" border="0" cellspacing="0" cellpadding="4">
  <tr> 
    <td width="2%">&nbsp;</td>
    <td class=box> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"> 
        <a href="<? echo $http; ?>customers/index.php">View</a>  
        | <a href="<? echo $http; ?>customers/Search.php" target="_blank">Search</a> |
        <a href="<? echo $http; ?>customers/NotShippedView.php">Not Shipped</a></font></div>
</td>
  </tr>
</table>

<?

mysql_close($link);

}
else
{


}

}
?>
