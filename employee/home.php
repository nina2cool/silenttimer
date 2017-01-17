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
    <td width="71%" align="left" valign="top"><p><font size="3" face="Arial, Helvetica, sans-serif"><strong>This 
        site is made for our employees and sales representatives.</strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Here you can view 
        and update your personal information, as well as view and add customers.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Refer to the <em><a href="SalesRepresentativeHandbook.doc" target="_blank">Sales 
        Representative Handbook</a></em> if you have questions about your responsibilities 
        and your commission. Updates to the Handbook will occur and an announcement 
        placed on this page.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Coming soon:</strong></font></p>
      <ul>
        <li><font size="2" face="Arial, Helvetica, sans-serif">View your commissions earned</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Download files</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Receive updates to important 
          files</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Submit orders</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">View all customers in the 
          database</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">And more!</font></li>
      </ul>
      <p><font size="2" face="Arial, Helvetica, sans-serif">If you have any other suggestion 
        on how this site might be more useful, <a href="mailto:nina@silenttimer.com">email 
        Christina</a>.</font><br>
      </p></td>
    <td width="29%" align="left" valign="middle" bgcolor="#FFFFCC"> <p align="left"><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;<a href="profile.php">Your 
        Profile</a></font></p>
      <p align="left"><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;<a href="customers.php">Your 
        Contact List</a></font></p>
      <p align="left"><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;<a href="allcustomers.php">Retail 
        Stores</a></font></p>
      <p align="left"><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;Test 
        Prep Offices</font></p>
      <p align="left"><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;<a href="addcustomer.php">Add 
        a Customer</a></font></p>
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
