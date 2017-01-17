<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../../../include/dbinfo.php";
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
	
		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "SELECT * FROM tblState";
	
	//echo $sql;

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblState.State ASC";
		$sortBy ="tblState.State";
		$sortDirection = "ASC";
	}

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	

?><title>Test Prep Campaign</title>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Princeton
      Reviews 
      by State :</strong></font></p>
<p><font size="3"><font color="#000000" face="Arial, Helvetica, sans-serif">Click
      on the state to view the letters (this will open them all in one window
      to print all at once)</font></font></p>
<?	
  
  		$Num1 = 0;
		while($row = mysql_fetch_array($result))
		{
			$State = $row[State];
			
						$sql2 = "SELECT Count(BusinessCustomerID) as Count FROM tblBusinessCustomer WHERE Chain = 'Princeton Review' AND Status = 'active' AND State = '$State' GROUP BY State";
						$result2 = mysql_query($sql2) or die("Cannot execute query!");
						while($row2 = mysql_fetch_array($result2))
							{
								$Num = $row2[Count];
						
						$Num2 = $Num + $Num3;
						
						
?>
<li><font size="2" face="Arial, Helvetica, sans-serif"><a href="../letters/Letter-2006-01-15.php?state=<? echo $State; ?>&chain=TPR" target="_blank"><? echo $State; ?></a> - <? echo $Num; ?></font></li>
<?
}

	$Num3 = $Num1 + $Num2;
}
?>


<p align="left"><font size="3"><strong><font face="Arial, Helvetica, sans-serif">Total
# of Princeton Reviews: <font color="#FF0000"><? echo $Num3; ?></font></font></strong></font></p>

  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";
// has links that show up at the bottom in it - found in home management folder
require "../../../include/footerlinks.php";

// finishes security for page
}
else
{
?>

            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
