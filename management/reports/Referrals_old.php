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

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2003-08-31 23:59:59' AND DateTime < '2003-10-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Sept2003 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2003-09-30 23:59:59' AND DateTime < '2003-11-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Oct2003 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2003-10-31 23:59:59' AND DateTime < '2003-12-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Nov2003 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2003-11-30 23:59:59' AND DateTime < '2004-01-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Dec2003 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2003-12-31 23:59:59' AND DateTime < '2004-02-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Jan2004 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-01-31 23:59:59' AND DateTime < '2004-03-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Feb2004 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-02-29 23:59:59' AND DateTime < '2004-04-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Mar2004 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-03-31 23:59:59' AND DateTime < '2004-05-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Apr2004 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-04-30 23:59:59' AND DateTime < '2004-06-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$May2004 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-05-31 23:59:59' AND DateTime < '2004-07-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Jun2004 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-06-30 23:59:59' AND DateTime < '2004-08-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Jul2004 = $row[Sum];
		}


	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-07-31 23:59:59' AND DateTime < '2004-09-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Aug2004 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-08-31 23:59:59' AND DateTime < '2004-10-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Sept2004 = $row[Sum];
		}


	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-09-30 23:59:59' AND DateTime < '2004-11-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Oct2004 = $row[Sum];
		}


	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-10-31 23:59:59' AND DateTime < '2004-12-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Nov2004 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-11-30 23:59:59' AND DateTime < '2005-01-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Dec2004 = $row[Sum];
		}


	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2004-12-31 23:59:59' AND DateTime < '2005-02-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Jan2005 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2005-01-31 23:59:59' AND DateTime < '2005-03-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Feb2005 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2005-02-28 23:59:59' AND DateTime < '2005-04-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Mar2005 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2005-03-31 23:59:59' AND DateTime < '2005-05-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Apr2005 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2005-04-30 23:59:59' AND DateTime < '2005-06-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$May2005 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2005-05-31 23:59:59' AND DateTime < '2005-07-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Jun2005 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2005-06-30 23:59:59' AND DateTime < '2005-08-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Jul2005 = $row[Sum];
		}


	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2005-07-31 23:59:59' AND DateTime < '2005-09-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Aug2005 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2005-08-31 23:59:59' AND DateTime < '2005-10-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Sept2005 = $row[Sum];
		}


	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2005-09-30 23:59:59' AND DateTime < '2005-11-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Oct2005 = $row[Sum];
		}


	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2005-10-31 23:59:59' AND DateTime < '2005-12-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Nov2005 = $row[Sum];
		}

	$sql = "SELECT Sum(NumOrdered) AS Sum FROM tblPurchase WHERE DateTime > '2005-11-30 23:59:59' AND DateTime < '2006-01-01 00:00:00' AND Status = 'active' AND ReferredBy = 'prep class'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Dec2005 = $row[Sum];
		}
		
	
	$Total2003 = $Sept2003 + $Oct2003 + $Nov2003 + $Dec2003;
	$Total2004 = $Jan2004 + $Feb2004 + $Mar2004 + $Apr2004 + $May2004 + $Jun2004 + $Jul2004 + $Aug2004 + $Sept2004 + $Oct2004 + $Nov2004 + $Dec2004;
	$Total2005 = $Jan2005 + $Feb2005 + $Mar2005 + $Apr2005 + $May2005 + $Jun2005 + $Jul2005 + $Aug2005 + $Sept2005 + $Oct2005 + $Nov2005 + $Dec2005;

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Monthly 
  Sales </strong></font></p>
<p><strong><font size="3" face="Arial, Helvetica, sans-serif">Referred By:</font></strong></p>
<p><strong><font size="3" face="Arial, Helvetica, sans-serif"><a href="ReferralsPrepClass.php">Prep Class</a></font></strong></p>
<p><strong><font size="3" face="Arial, Helvetica, sans-serif"><a href="ReferralsSearchEngine.php">Search Engine</a></font></strong></p>
<p><strong><font size="3" face="Arial, Helvetica, sans-serif"><a href="ReferralsFriend.php">Friend</a></font></strong></p>
<p>&nbsp; </p>
<p>&nbsp;</p>
<p> 
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.

require "../include/footerlinks.php";



// finishes security for page
}
?>
</p>
