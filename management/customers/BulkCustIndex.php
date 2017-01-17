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
	


		
	$sql3 = "SELECT * FROM tblCustomer WHERE Type = '6'";
	$result3 = mysql_query($sql3) or die("Cannot retrieve 3Customer info, please try again.");
	
		$NumBulkCustomers = mysql_num_rows($result3);
		

				
	
?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Bulk Customers</strong></font> 
<p align="left"><font size="4" face="Arial, Helvetica, sans-serif">We have a
    total of </font><font size="4" face="Arial, Helvetica, sans-serif"><font color="#003399"><? echo $NumBulkCustomers; ?></font> 
  Bulk Customers!</font></p>
            
<hr noshade>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; 
    <a href="Order_Bulk.php">Add a Bulk or Sample Order </a></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; 
  <a href="Order_Bulk_Reorder.php">Bulk  
  Reorder Form</a></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; 
  <a href="Order_Bulk_BusCust.php">Add Bulk Customer 
  and Business Customer at the same time</a></font><br>
</p>
<hr noshade>
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
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>