<?
//security for page
session_start();

//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

$PageTitle = "Pre-Order for The Silent Timer PLUS Bonus Timer";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

# link to DB for page calls to it.
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");
	
#grab test name from the URL to customize order page...
$tURL = $_GET['t'];
if($tURL == ""){$TextTest = "test";}else{$TextTest = $tURL;}

if ($tURL == "")
{
	$PageTitle = "Thank you for pre-ordering!";
}
else
{
	$PageTitle = "Thank you for pre-ordering for your $tURL!";
}
/*
# ------------------------------------------------------------------------------------------------------------
#   make sure host is secure! If it isn't, redirect to secure page.
# ------------------------------------------------------------------------------------------------------------

	$host = $HTTP_HOST; # current host (www.silenttimer.com OR secure.silenttimer.com)
	$page = $REQUEST_URI; # current page
	
	if($host!="secure.silenttimer.com")
	{
		$goto = "https://secure.silenttimer.com" . $page;
		header("location: $goto");
	}
*/
# ------------------------------------------------------------------------------------------------------------
#  END check page for security.
# ------------------------------------------------------------------------------------------------------------

// has http variable in it to populate links on page.
require "../include/url.php";

	// has top header in it.
	require "include/headertop.php";

	// has top menu for this page in it, you can change these links in this folders include folder.
	require "../include/topmenu.php";
	
	// has bottom header in it, ths goes under the top menu for this page.
	require "include/headerbottom2.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Thank
you! </strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Your information has been
    stored successfully.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">You will be notified via
    e-mail when the product is available for purchase. As a pre-order customer,
    you will enjoy the benefit of having first notice of the availability of
    the product. </font></p>

<p>&nbsp;</p>
<p><b><font color="#33CC33" size="3" face="Arial, Helvetica, sans-serif">What would you like to do now?</font></b></p>
<table width="100%"  border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td bgcolor="#FFFF99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com">Go
    back to SilentTimer.com Home Page </a></font></div></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCFF"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/timer/functions.php">Read
    more about The Silent Timer&#8482;</a></font></div></td>
  </tr>
  <tr>
    <td bgcolor="#33FF99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/handbook/">View the Test Handbook for information about my test </a></font></div></td>
  </tr>
  <tr>
    <td bgcolor="#FFCCFF"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/news/">See
    recent artciles and press releases about The Silent Timer&#8482;</a></font></div></td>
  </tr>
  <tr>
    <td bgcolor="#FF9900"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/links.php">Go to the Links page to see the various testing links</a></font></div></td>
  </tr>
  <tr>
    <td bgcolor="#33CCFF"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/books/">Get suggestions on books for studying for my test</a> </font></div></td>
  </tr>
  <tr>
    <td bgcolor="#FF6666"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://silenttimer.com/handbook/increasescores/reducetestanxiety.php">Receive information and tips for easing test anxiety</a></font></div></td>
  </tr>
  <tr>
    <td bgcolor="#9966FF"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/stories/">Hear
    what other students have said about The Silent Timer&#8482; </a></font></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
<p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenublank.php";

?>
</p>
