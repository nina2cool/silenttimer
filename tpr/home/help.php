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

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Help</strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr> 
    <td align="left" valign="top"> <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>How 
        it works<br>
        </strong>Your office has a special office code,<strong> <? echo $aID;?></strong>. 
        Tell your students this code. When they go to our order page, <a href="http://www.SilentTimer.com" target="_blank">http://www.SilentTimer.com</a>, 
        and order their timer, they must enter your office code.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">There is also an office 
        deadline, that you can <a href="#">set up or change here</a>. After each 
        deadline, we package all your students' orders, and send them to your 
        office. <a href="students.php">You can view a list of your students who 
        will pick up timers here</a>. Once they pick up their timer, you can remove 
        their name from your pick up list.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">It is very easy to 
        track which students have ordered, and which students still need to pick 
        up their timer.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Problems?<br>
        </strong>If you are having any problems at all, please call us at 512-542-9981, 
        or email us at <a href="mailto:info@silenttimer.com">info@silenttimer.com</a>. 
        We will help you as quick as possible.</font></p>
      <p>&nbsp;</p>
      </td>
  </tr>
</table>

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
