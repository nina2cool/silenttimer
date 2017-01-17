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
	$timeType = $_POST['cboTime'];
	
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
	
	
	# - calculate the totals for this office....
	$sql = "SELECT COUNT(PurchaseID) AS Num FROM tblPurchase WHERE AffOfficeID = '$aID'";	
	
	// - build dates for sql where statement
	$today = date("Y-m-d");			
	$week = mktime (0,0,0,date("m"),date("d")-7,  date("Y"));
	$month = mktime (0,0,0,date("m")-1,date("d"),  date("Y"));
	$year = mktime (0,0,0,date("m"),date("d"),  date("Y")-1);
	
	if($_POST['Submit'] == "Change")
	{		
		if ($timeType == "today")
		{
			$sql .= " AND tblPurchase.DateTime >= '$today'";
		}
		
		if ($timeType == "week")
		{
			$sql .= " AND tblPurchase.DateTime >= '$week'";
		}
		
		if ($timeType == "month")
		{
			$sql .= " AND tblPurchase.DateTime >= '$month'";
		}
		
		if ($timeType == "year")
		{
			$sql .= " AND tblPurchase.DateTime >= '$year'";
		}
		
		if ($timeType == "all")
		{
			//then don't do anything, because it is already selecting all.
		}
	}
	else // if no time period selected, then select the week mark...
	{
		$sql .= " AND tblPurchase.DateTime >= '$week'";
	}	
	
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$NumSold = $row[Num];
	}
	
	$TotalCash = $NumSold * $AffRate; // get total cash for this office
	
	mysql_close($link);
?>

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Sales 
  Activity </strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td align="left" valign="top"> <p><font size="2" face="Arial, Helvetica, sans-serif">From 
        here you may view how many timers have been purchased for your office 
        and how much money you have made.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">You can change your 
        reporting period below. </font></p>
      <form action="" method="post" name="frmPeriod" id="frmPeriod">
        <font size="2" face="Arial, Helvetica, sans-serif"><strong>Reporting Period</strong><br>
        <select name="cboTime" id="cboTime">
          <option value="all" <? if($timeType == 'all'){echo 'selected';}?>>All</option>
          <option value="today" <? if($timeType == 'today'){echo 'selected';}?>>Today</option>
          <option value="week" <? if($timeType == 'week'){echo 'selected';}?><? if($timeType != 'all' && $timeType != 'today' && $timeType != 'week' && $timeType != 'month' && $timeType != 'year'){echo 'selected';}?>>Week</option>
          <option value="month" <? if($timeType == 'month'){echo 'selected';}?>>Month</option>
          <option value="year"<? if($timeType == 'year'){echo 'selected';}?>>Year</option>
        </select>
        <input type="submit" name="Submit" value="Change">
        </font> 
      </form>
      <table width="300" border="0" cellspacing="0" cellpadding="5">
        <tr> 
          <td width="138"><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">Total 
              Timers</font></strong></div></td>
          <td width="142"><div align="left"><strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><? echo $NumSold;?></font></strong></div></td>
        </tr>
        <tr> 
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Total 
            Commission</strong></font></td>
          <td><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo $TotalCash;?></strong></font></td>
        </tr>
      </table>
      <p><strong><font size="2" face="Arial, Helvetica, sans-serif"> </font></strong></p>
      <p>&nbsp;</p>
      <p><strong><font size="2" face="Arial, Helvetica, sans-serif"> </font></strong></p>
      <p><strong><font size="2" face="Arial, Helvetica, sans-serif"> </font></strong></p></td>
  </tr>
</table>
<?
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
