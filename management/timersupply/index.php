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
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	//beginning SQL statement that gets all data from tables.		
	$sql = "SELECT SUM(NumShipped) AS TotalShipped
			FROM tblOrderShipped";
	
	$result = mysql_query($sql) or die("Cannot get info from tblSupplyOrder");
	
			while($row = mysql_fetch_array($result))
			{
				$TotalShipped = $row[TotalShipped];
			}

?>



<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Timer Supply</strong></font> 
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">From 
              here you may: view, edit &amp; create supply orders, view Timer 
              shipment details, and enter in orders received.</font></p>
            
<p align="left">&nbsp;</p>
<p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Total 
  # of Timers Shipped To Date: <font color="#000099"><? echo $TotalShipped; ?></font></strong></font></p>
<p align="left">&nbsp;</p>
<p></p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
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