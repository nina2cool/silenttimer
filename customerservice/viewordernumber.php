<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
<?
		# link to Database...
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");			
	
		$Now = date("Y-m-d H:i:s");
		
		// Customer Table
		$CustomerID = $_POST['$cID'];
		
		
		//now, get purchase ID for this puchase, and enter info into tblPurchaseDetails......
		$sql = "SELECT PurchaseID FROM tblPurchase WHERE CustomerID = '$CustomerID'";
		echo $sql;
		
		$result = mysql_query($sql) or die("Cannot get Purchase ID, please try again.");
			
			while($row = mysql_fetch_array($result))
				{
				$pID = $row[PurchaseID];
				}
	
			
	


?>
<p><strong><font size="5" face="Arial, Helvetica, sans-serif">Find Your Order 
  Number</font></strong></p>
<p>&nbsp;</p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Your Order Number 
  is: <? echo $pID; ?></strong></font></p>
<p>&nbsp;</p>
<p align="left">
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>