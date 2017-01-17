<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	$custID = $_SESSION['custID'];
	
	//connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			
		
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$custID'";
	$result = mysql_query($sql) or die("Cannot find customer!");
			
	while($row = mysql_fetch_array($result))
	{
		$fName = $row[FirstName];
		$lName = $row[LastName];
	}
	
	$name = $fName;
	$name .= " ";
	$name .= $lName;
	
	mysql_close($link);
	
?>



			<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt;Home</strong></font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif">Welcome to
               your account home page,<strong> <font color="#0000FF"> <? echo $name; ?></font></strong>.</font></p>
            <p>&nbsp;</p>
            <p><font size="2" face="Arial, Helvetica, sans-serif">View purchases,
                addresses, etc. Make claims. </font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Use
              the links above and to the left to navigate through the site.</strong></font></p>
            <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Remember 
              to <strong><a href="logout.php">LOG OUT</a> </strong>after using 
              system.</font></p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>



// has links that show up at the bottom in it - found in home management folder
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// finishes security for page
}
else
{
	header("location: index.php"); //redirects user via PHP to this page... better than meta refresh...
}
?>