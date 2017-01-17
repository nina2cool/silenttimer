<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has database username and password, so don't need to put it in the page.

require "../include/dbinfo.php";
// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			
	


		$sql5 = "SELECT MAX(PromotionCodeID) AS Max, State FROM tblBusinessCustomer WHERE CustomerType = 'Test Prep' AND State = 'TX' AND Status = 'active' GROUP BY State";
		//put SQL statement into result set for loop through records
		$result5 = mysql_query($sql5) or die("Cannot execute query customerID!");
		
		while($row5 = mysql_fetch_array($result5))
		{
			$Max = $row5[Max];
			$State = $row5[State];
		}
		
		echo "<br>max = " .$Max;
		
		$Split = explode($State,$Max);
		
		$Number = $Split[1];
		$Number1 = $Number + 1;
		
		
		echo "<br>number = " .$Number;
		echo "<br>number1 = " .$Number1;
		
		$PromoCode = $State .$Number1;
		
		echo "<br>promo = " .$PromoCode;


?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"></font></p>
<p>&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
}
//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.
require "../include/footerlinks.php";

?>