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

	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblBusinessCustomer WHERE Status = 'active'";
	$result = mysql_query($sql) or die("Cannot retrieve Store info, please try again.");

		$NumStores = mysql_num_rows($result);
	
	
	$sql = "SELECT * FROM tblBusinessCustomer WHERE Status = 'active' AND CustomerType = 'bookstore'";
	$result = mysql_query($sql) or die("Cannot retrieve book store info, please try again.");
	
		$NumBookStores = mysql_num_rows($result);


	$sql = "SELECT * FROM tblBusinessCustomer WHERE Status = 'active' AND CustomerType = 'testprep'";
	$result = mysql_query($sql) or die("Cannot retrieve test prep info, please try again.");
	
		$NumTestPrep = mysql_num_rows($result);

	
?>
<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Manage Retail 
Locations </strong></font> 
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">From here you 
  may: view current interns and edit interns. </font></p>
            
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="4">We 
  have a total of </font></strong></font><font size="4" face="Arial, Helvetica, sans-serif"><strong><font color="#003399"><? echo $NumStores; ?></font> 
  Active Business Customers!</strong></font></p>
<table width="50%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
  <tr> 
    <td width="52%"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Book 
      Stores </font></td>
    <td width="48%"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $NumBookStores; ?>&nbsp;</font></td>
  </tr>
  <tr> 
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Test 
      Prep </font></td>
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $NumTestPrep; ?>&nbsp;</font></td>
  </tr>
</table>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
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