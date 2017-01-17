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

//when the user is logged in, their userName is in this session, store it into variable
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
	
	//echo $EmployeeID2;
?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Track
      Time </strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Submit timesheets, view
    payments, etc. </font>
  <?


if($Level == '1')
{

//$EmployeeID = $_POST['Employee'];

?>
</p>
<form name="form1" method="post" action="Pay.php?e=<? echo $EmployeeID; ?>">
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#FFCC99" bgcolor="#FFFFCC">
    <tr>
      <td><p><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="CurrentAll.php">Current
              Time Period for All</a></font></p>
        <p><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="PastAll.php">Past
              Paychecks </a></font></p>
        <p><font size="2" face="Arial, Helvetica, sans-serif">&gt; Pay Employee
              <select name="Employee" tabindex="" id="Employee" class="text">
                <option value="" selected>Select</option>
                <? 
					$sql3 = "SELECT * FROM tblEmployee WHERE Status = 'active' ORDER BY FirstName";
					$result3 = mysql_query($sql3) or die("Cannot get State");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
                <option value="<? echo $row3[EmployeeID]; ?>"><? echo $row3[FirstName]; ?></option>
                <?
					
					
					}
					
					
					
				?>
              </select>
              <input name="Go" type="submit" id="Go" value="Go">
        </font></p></td>
    </tr>
  </table>
  <p></p>
</form>
<p>&nbsp;</p>
<p>
  <?

}
else
{
?>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>time/Current.php'>
<?

}
?>
</p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

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