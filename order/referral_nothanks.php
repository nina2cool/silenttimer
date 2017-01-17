<?
//security for page
session_start();

//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

$PageTitle = "The Silent Timer - Practice Your Way to Higher Scores!";

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom2.php";

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");		
	
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
	$CustomerID = $_GET['c'];
	$IP = $_GET['ip'];
	$now = date("Y-m-d h:i:s");

	if($CustomerID <> "" AND $IP <> "")
	{
	$sql = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, Type, IP, Status)
	VALUES('$CustomerID', '$now', 'refer-no', '$ip', 'active');";
	$result = mysql_query($sql) or die("Cannot insert refer-no");
	}
	
	$sql = "SELECT DATE_FORMAT(EndDate, '%m/%d/%y') AS EndDate FROM tblPromotionCode WHERE PromotionCodeID = '$CustomerID' AND Type = 'friend'";
	$result = mysql_query($sql) or die("Cannot get promo code end date");
	
	while($row = mysql_fetch_array($result))
	{
		$EndDate = $row[EndDate];
	}
	
?>
<p> 
  <font size="2"><strong><font color="#FF0000" size="5" face="Arial, Helvetica, sans-serif">Thank
you for your purchase! </font></strong></font></p>
<p><br>
  <font size="2" face="Arial, Helvetica, sans-serif">We would like to remind
    you that you can still use your referral promotion code <font color="#FF0000">(</font></font><font color="#FF0000" size="2" face="Arial"><strong><? echo $CustomerID; ?></strong></font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">)</font><font size="2" face="Arial, Helvetica, sans-serif">    for 90 days <font color="#FF0000">(expires on </font></font><font color="#FF0000" size="2" face="Arial"><strong><? echo $EndDate; ?></strong></font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">)</font><font size="2" face="Arial, Helvetica, sans-serif">    to take advantage of our <a href="referral.php?c=<? echo $CustomerID; ?>&ip=<? echo $IP; ?>">FREE
    PURCHASE</a> offer and save your friends 5% on
their purchases as well.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">To find out more, just
    log in to your account at <a href="http://www.silenttimer.com/customerservice/">http://www.silenttimer.com/customerservice/</a> for
    details. </font></p>
<p><strong><font size="4" face="Arial, Helvetica, sans-serif">Good Luck on your Test!</font></strong></p>
<hr>
<p><b><font color="#33CC33" size="3" face="Arial, Helvetica, sans-serif"><em>What
would you like to do now?</em></font></b></p>
<table width="75%"  border="1" cellspacing="0" cellpadding="8">
  <tr>
    <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com">Go
    back to SilentTimer.com Home Page</a></font></div></td>
  </tr>
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/timer/functions.php">Read
    more about The Silent Timer&#8482;</a></font></div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/handbook/">View
    the Test Handbook for information about my test </a></font></div></td>
  </tr>
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/news/">See
    recent articles and press releases about The Silent Timer&#8482;</a></font></div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/links.php">Go
    to the Links page to see the various testing links</a></font></div></td>
  </tr>
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/books/">Get
    suggestions on books for studying for my test</a> </font></div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://silenttimer.com/handbook/increasescores/reducetestanxiety.php">Receive
    information and tips for easing test anxiety</a></font></div></td>
  </tr>
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/stories/">Hear
    what other students have said about The Silent Timer&#8482; </a></font></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

?>