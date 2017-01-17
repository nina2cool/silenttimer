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

	$sql = "SELECT State FROM tblBusinessCustomer WHERE Chain = '' AND CustomerType = 'Test Prep' AND Status = 'active' AND State <> '' AND Country = 'US' GROUP BY State";
	
	//echo $sql;

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblBusinessCustomer.State ASC";
		$sortBy ="tblBusinessCustomer.State";
		$sortDirection = "ASC";
	}

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	$Count = mysql_num_rows($result);
	
?><title>Test Prep Campaign</title>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Choose
a state:</strong></font></p>
  <?
		while($row = mysql_fetch_array($result))
		{
			$State = $row[State];
?>
<li><font size="2" face="Arial, Helvetica, sans-serif"><a href="campaign-testprep.php?state=<? echo $State; ?>"><? echo $State; ?></a></font></li>
<?
}
?>


<p align="center">

  
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
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
