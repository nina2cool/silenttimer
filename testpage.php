<?
//security for page
session_start();

$PageTitle = "The Silent Timer - About Us";

// has http variable in it to populate links on page.
require "include/url.php";

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database 1");



// let's say you have a number
$number = 26;

// to test whether $number is odd you could use the arithmetic
// operator '%' (modulus) like this
if( $odd = $number%2 )
{
    // $odd == 1; the remainder of 25/2
    echo 'ODD Number!';
}
else
{
    // $odd == 0; nothing remains if e.g. $number is 48 instead,
    // as in 48 / 2
    echo 'EVEN Number!';
}



?>







<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>

	