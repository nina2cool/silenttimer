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
	
	$sql = "SELECT * FROM tblCustomer";
	$result = mysql_query($sql) or die("Cannot retrieve 1Customer info, please try again.");

		$NumCustomers = mysql_num_rows($result);
	
	$sql2 = "SELECT * FROM tblCustomer WHERE Type = 'web'";
	$result2 = mysql_query($sql2) or die("Cannot retrieve 2Customer info, please try again.");
	
		$NumWebCustomers = mysql_num_rows($result2);
		
	$sql3 = "SELECT * FROM tblCustomer WHERE Type = 'bulk'";
	$result3 = mysql_query($sql3) or die("Cannot retrieve 3Customer info, please try again.");
	
		$NumBulkCustomers = mysql_num_rows($result3);
		
	$sql4 = "SELECT * FROM tblCustomer WHERE Type = 'ebay'";
	$result4 = mysql_query($sql4) or die("Cannot retrieve 4Customer info, please try again.");
	
		$NumEbayCustomers = mysql_num_rows($result4);
		
		
	$sql5 = "SELECT * FROM tblCustomer WHERE Type = 'samples'";
	$result5 = mysql_query($sql5) or die("Cannot retrieve 5Customer info, please try again.");
	
		$NumSamplesCustomers = mysql_num_rows($result5);

	
	$sql10 = "SELECT * FROM tblBusinessCustomer WHERE Status = 'active'";
	$result10 = mysql_query($sql10) or die("Cannot retrieve 5Customer info, please try again.");

	$NumBusinessCustomers = mysql_num_rows($result10);


	
	$sql6 = "SELECT Sum(tblPurchase.NumOrdered) AS NumOrdered
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE Type = 'web' AND Status = 'active'";

	$result6 = mysql_query($sql6) or die("Cannot retrieve 6Customer info, please try again.");
	
		while($row6 = mysql_fetch_array($result6))
				{
				$NumWebTimers = $row6['NumOrdered'];
				}

	$sql7 = "SELECT Sum(tblPurchase.NumOrdered) AS NumOrdered
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE tblCustomer.Type = 'bulk' AND Status = 'active'";

	$result7 = mysql_query($sql7) or die("Cannot retrieve 7Customer info, please try again.");
	
		while($row7 = mysql_fetch_array($result7))
				{
				$NumBulkTimers = $row7['NumOrdered'];
				}
				
	$sql8 = "SELECT Sum(tblPurchase.NumOrdered) AS NumOrdered
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE tblCustomer.Type = 'ebay' AND Status = 'active'";

	$result8 = mysql_query($sql8) or die("Cannot retrieve 8Customer info, please try again.");
	
		while($row8 = mysql_fetch_array($result8))
				{
				$NumEbayTimers = $row8['NumOrdered'];		
				}
				
	$sql9 = "SELECT Sum(tblPurchase.NumOrdered) AS NumOrdered
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE tblCustomer.Type = 'samples' AND Status = 'active'";

	$result9 = mysql_query($sql9) or die("Cannot retrieve 9Customer info, please try again.");
	
		while($row9 = mysql_fetch_array($result9))
				{
				$NumSampleTimers = $row9['NumOrdered'];		
				}
		
				
	
?>


<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; My Account </strong></font>
<p align="left">My Account </p>
<p align="left">Check Order Status</p>
<p align="left">Find Order Number</p>
<p align="left">Give a testimonial</p>
<p align="left">Give a suggestion or comment   </p>
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