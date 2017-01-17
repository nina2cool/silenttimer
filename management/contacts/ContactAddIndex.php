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

	$sql = "Select * FROM tblProductOrder WHERE Status = 'active'";

	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblProductOrder.Date DESC";
		$sortBy ="tblProductOrder.Date";
		$sortDirection = "DESC";
	}
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Contact
      Add Index</strong></font></p>
<p>&nbsp;</p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&gt;
      <a href="ContactAdd.php">New Contact </a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&gt;
    <a href="ContactAddExistingCust.php">Existing Customer</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="ContactAddExistingBusCust.php">Existing
      Business Customer </a></font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>
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
                   
            
</p>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
