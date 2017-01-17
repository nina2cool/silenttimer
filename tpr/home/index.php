<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('a'))
{

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	//get name of person/company	
	$aID = $_SESSION['a'];
	
	#connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			
		
	$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$aID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
			
	while($row = mysql_fetch_array($result))
	{
		$CompanyName = $row[CompanyName];
		$City = $row[City];
		$AffRate = $row[Rate];
	}
	
	
	$now = date("Y-m-d");
	# - get next deadline for this office
	$sql = "SELECT Date
			FROM tblAffOfficeDeadlines 
			WHERE AffiliateID = '$aID' AND Date >= '$now'
			ORDER BY Date ASC
			LIMIT 0,1";
	$result = mysql_query($sql) or die("Cannot execute query!");
	while($row = mysql_fetch_array($result))
	{
		$newDeadline = $row[Date];
		$newDeadlineFormat = substr($newDeadline,5,2) . "/" . substr($newDeadline,8,2) . "/" . substr($newDeadline,0,4);
	}
	
	# - get prior deadline for this office
	$sql = "SELECT Date
			FROM tblAffOfficeDeadlines 
			WHERE AffiliateID = '$aID' AND Date <= '$now'
			ORDER BY Date ASC
			LIMIT 0,1";
	$result = mysql_query($sql) or die("Cannot execute query!");
	while($row = mysql_fetch_array($result))
	{
		$oldDeadline = $row[Date];
		$oldDeadlineFormat = substr($oldDeadline,5,2) . "/" . substr($oldDeadline,8,2) . "/" . substr($oldDeadline,0,4);
	}
	
	# - Get number of sales and total commissions coming to office for this period
	$sql = "SELECT COUNT(PurchaseID) AS Num
			FROM tblPurchase
			WHERE AffOfficeID = '$aID' AND DateTime >= '$oldDeadline' AND DateTime < '$newDeadline'";
			
	$result = mysql_query($sql) or die("Cannot execute query!");
	while($row = mysql_fetch_array($result))
	{
		$NumSold = $row[Num];
	}
	
	# - get total money going to them for this period
	$Sales  = $NumSold * $AffRate;
?>

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Welcome 
  <font color="#000000"><? echo $CompanyName;?> - <? echo $City;?></font> </strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr> 
    <td align="left" valign="top"> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Office 
        code: <? echo $aID;?></strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Tell your students 
        to enter your office code, <strong><? echo $aID;?></strong>, on <a href="http://www.SilentTimer.com/order/" target="_blank">The 
        Silent Timer order page</a>, and their timer will be sent to your office 
        for them to pick up.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">The next deadline 
        for timers to be shipped to you is: <strong><? echo $newDeadlineFormat;?></strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">You have <strong><? echo $NumSold;?></strong> 
        timers, and <strong>$<? echo $Sales;?></strong> coming to your office so far.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="students.php">Click 
        for a list of students who will be picking up their timers</a></font></p>
      </td>
  </tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<?
mysql_close($link);
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
	$http .= "tpr";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>
