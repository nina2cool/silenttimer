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


	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2003-08-31 23:59:59' AND tblPurchase2.OrderDateTime < '2003-10-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Sept2003 = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2003-09-30 23:59:59' AND tblPurchase2.OrderDateTime < '2003-11-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Oct2003 = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2003-10-30 23:59:59' AND tblPurchase2.OrderDateTime < '2003-12-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Nov2003 = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2003-11-30 23:59:59' AND tblPurchase2.OrderDateTime < '2004-01-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Dec2003 = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2003-12-31 23:59:59' AND 
	tblPurchase2.OrderDateTime < '2004-02-01' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
	
		while($row = mysql_fetch_array($result))
		{
			$Jan2004 = $row[Sum];
		}


	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-01-31 23:59:59' AND 
	tblPurchase2.OrderDateTime < '2004-03-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
	
		while($row = mysql_fetch_array($result))
		{
			$Feb2004 = $row[Sum];
		}

$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-02-28 23:59:59' AND 
	tblPurchase2.OrderDateTime < '2004-04-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
		
		while($row = mysql_fetch_array($result))
		{
			$Mar2004 = $row[Sum];
		}

$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-03-31 23:59:59' AND 
	tblPurchase2.OrderDateTime < '2004-05-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Apr2004 = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-04-30 23:59:59' AND 
	tblPurchase2.OrderDateTime < '2004-06-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$May2004 = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-05-31 23:59:59' AND tblPurchase2.OrderDateTime < '2004-07-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Jun2004 = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-06-30 23:59:59' AND tblPurchase2.OrderDateTime < '2004-08-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Jul2004 = $row[Sum];
		}


	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-07-31 23:59:59' AND tblPurchase2.OrderDateTime < '2004-09-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Aug2004 = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-08-31 23:59:59' AND tblPurchase2.OrderDateTime < '2004-10-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Sept2004 = $row[Sum];
		}


	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-09-30 23:59:59' AND tblPurchase2.OrderDateTime < '2004-11-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Oct2004 = $row[Sum];
		}


	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-10-31 23:59:59' AND tblPurchase2.OrderDateTime < '2004-12-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Nov2004 = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-11-30 23:59:59' AND tblPurchase2.OrderDateTime < '2005-01-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Dec2004 = $row[Sum];
		}


	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-12-31 23:59:59' AND tblPurchase2.OrderDateTime < '2005-02-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Jan2005 = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-01-31 23:59:59' AND tblPurchase2.OrderDateTime < '2005-03-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Feb2005 = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-02-28 23:59:59' AND tblPurchase2.OrderDateTime < '2005-04-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Mar2005 = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-03-31 23:59:59' AND tblPurchase2.OrderDateTime < '2005-05-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Apr2005 = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-04-30 23:59:59' AND tblPurchase2.OrderDateTime < '2005-06-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$May2005 = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-05-31 23:59:59' AND tblPurchase2.OrderDateTime < '2005-07-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Jun2005 = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-06-30 23:59:59' AND tblPurchase2.OrderDateTime < '2005-08-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Jul2005 = $row[Sum];
		}


	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-07-31 23:59:59' AND tblPurchase2.OrderDateTime < '2005-09-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Aug2005 = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-08-31 23:59:59' AND tblPurchase2.OrderDateTime < '2005-10-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Sept2005 = $row[Sum];
		}


	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-09-30 23:59:59' AND tblPurchase2.OrderDateTime < '2005-11-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Oct2005 = $row[Sum];
		}


	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-10-31 23:59:59' AND tblPurchase2.OrderDateTime < '2005-12-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Nov2005 = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblPurchase2.OrderDateTime, tblPurchaseDetails2.ProductID
	FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE tblPurchaseDetails2.ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-11-30 23:59:59' AND tblPurchase2.OrderDateTime < '2006-01-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	GROUP BY tblPurchaseDetails2.ProductID";
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
       Sales</strong></font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>LSAT Timers Sold
      Total</strong></font></p>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000066">
  <tr>
    <td width="8%" height="26"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">1/04</font></div></td>
    <td width="8%"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">2/04</font></div></td>
    <td width="8%"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">3/04</font></div></td>
    <td width="8%"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">4/04</font></div></td>
    <td width="8%"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">5/04</font></div></td>
    <td width="8%"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">6/04</font></div></td>
    <td width="8%"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">7/04</font></div></td>
    <td width="8%"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">8/04</font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><strong><font color="#FF0000"><? echo $Sept2003;
 ?></font></strong></strong></font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Oct2003;
 ?></font></strong></font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Nov2003;
 ?></font></strong></font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Dec2003;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><font color="#00FF00"><? echo $Total2003;
 ?></font></font></strong></div></td>
  </tr>
  <tr> 
    <td width="8%" height="26"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">1/04</font></div></td>
    <td width="8%"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">2/04</font></div></td>
    <td width="8%"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">3/04</font></div></td>
    <td width="8%"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">4/04</font></div></td>
    <td width="8%"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">5/04</font></div></td>
    <td width="8%"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">6/04</font></div></td>
    <td width="8%"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">7/04</font></div></td>
    <td width="8%"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">8/04</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">9/03</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">10/03</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">11/03</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">12/03</font></div></td>
    <td width="8%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">TOTAL</font></strong></div></td>
  </tr>
</table>
<br>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000066">
  <tr> 
    <td width="8%">
<div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Jan2004;
 ?></font></strong></font></div></td>
    <td width="8%">
<div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Feb2004;
 ?></font></strong></font></div></td>
    <td width="8%">
<div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Mar2004;
 ?></font></strong></font></div></td>
    <td width="8%">
<div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Apr2004;
 ?></font></strong></font></div></td>
    <td width="8%">
<div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $May2004;
 ?></font></strong></font></div></td>
    <td width="8%">
<div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Jun2004;
 ?></font></strong></font></div></td>
    <td width="8%">
<div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Jul2004;
 ?></font></strong></font></div></td>
    <td width="8%">
<div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Aug2004;
 ?></font></strong></font></div></td>
    <td width="8%">
<div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Sept2004;
 ?></font></strong></font></div></td>
    <td width="8%">
<div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Oct2004;
 ?></font></strong></font></div></td>
    <td width="8%">
<div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Nov2004;
 ?></font></strong></font></div></td>
    <td width="8%">
<div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Dec2004;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><font color="#00FF00"><? echo $Total2004;
 ?></font></font></strong></div></td>
  </tr>
  <tr> 
    <td width="8%" height="26"> 
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">1/04</font></div></td>
    <td width="8%">
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif">2/04</font></div></td>
    <td width="8%">
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif">3/04</font></div></td>
    <td width="8%">
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif">4/04</font></div></td>
    <td width="8%">
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif">5/04</font></div></td>
    <td width="8%">
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif">6/04</font></div></td>
    <td width="8%">
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif">7/04</font></div></td>
    <td width="8%">
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif">8/04</font></div></td>
    <td width="8%">
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif">9/04</font></div></td>
    <td width="8%">
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif">10/04</font></div></td>
    <td width="8%">
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif">11/04</font></div></td>
    <td width="8%">
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif">12/04</font></div></td>
    <td width="8%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">TOTAL</font></strong></div></td>
  </tr>
</table>
<br>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000066">
  <tr>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Jan2005;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Feb2005;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Mar2005;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Apr2005;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $May2005;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Jun2005;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Jul2005;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Aug2005;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Sept2005;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Oct2005;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Nov2005;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000"><? echo $Dec2005;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><strong><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><font color="#00FF00"><? echo $Total2005;
 ?></font></font></strong></div></td>
  </tr>
  <tr>
    <td width="8%" height="26"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">1/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">2/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">3/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">4/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">5/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">6/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">7/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">8/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">9/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">10/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">11/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">12/05</font></div></td>
    <td width="8%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">TOTAL</font></strong></div></td>
  </tr>
</table>
<br>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr valign="top">
    <td><ul>
      <li><a href="AugSales2004.php"><font size="2" face="Arial, Helvetica, sans-serif">Aug
            2004</font></a>: <font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Aug2004;
 ?></font></font></strong></font></li>
      <li><a href="SeptSales2004.php"><font size="2" face="Arial, Helvetica, sans-serif">Sept
            2004: </font></a><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Sept2004;
 ?></font></font></strong></font></li>
      <li><a href="OctSales2004.php"><font size="2" face="Arial, Helvetica, sans-serif">Oct
            2004:</font></a><strong><a href="SeptSales2004.php"><font size="2" face="Arial, Helvetica, sans-serif"> </font></a><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Oct2004;
 ?></font></font></strong></font></strong></li>
      <li><a href="NovSales2004.php"><font size="2" face="Arial, Helvetica, sans-serif">Nov
            2004:</font></a><strong><a href="SeptSales2004.php"><font size="2" face="Arial, Helvetica, sans-serif"> </font></a><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Nov2004;
 ?></font></font></strong></font></strong></li>
      <li><a href="DecSales2004.php"><font size="2" face="Arial, Helvetica, sans-serif">Dec
            2004:</font></a><strong><a href="SeptSales2004.php"><font size="2" face="Arial, Helvetica, sans-serif"> </font></a><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Dec2004;
 ?></font></font></strong></font></strong></li>
    </ul></td>
    <td><ul>
      <li><a href="JanSales2005.php"><font size="2" face="Arial, Helvetica, sans-serif">Jan 2005:</font></a><strong> <font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Jan2005;
 ?></font></font></strong></font></strong></li>
      <li><a href="FebSales2005.php"><font size="2" face="Arial, Helvetica, sans-serif">Feb
            2005:</font></a><strong> <font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Feb2005;
 ?></font></font></strong></font></strong></li>
      <li><a href="MarSales2005.php"><font size="2" face="Arial, Helvetica, sans-serif">Mar
            2005:</font></a><strong> <font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Mar2005;
 ?></font></font></strong></font></strong></li>
      <li><a href="AprilSales2005.php"><font size="2" face="Arial, Helvetica, sans-serif">Apr
        2005:</font></a><strong> <font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Apr2005;
 ?></font></font></strong></font></strong></li>
      <li><a href="MaySales2005.php"><font size="2" face="Arial, Helvetica, sans-serif">May         2005:</font></a><strong> <font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $May2005;
 ?></font></font></strong></font></strong></li>
    </ul></td>
    <td><ul>
      <li><a href="JuneSales2005.php"><font size="2" face="Arial, Helvetica, sans-serif">June
            2005:</font></a><strong> <font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Jun2005;
 ?></font></font></strong></font></strong></li>
      <li><a href="JulySales2005.php"><font size="2" face="Arial, Helvetica, sans-serif">July
        2005:</font></a><strong> <font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Jul2005;
 ?></font></font></strong></font></strong></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="AugSales2005.php">Aug
            2005:</a></font><strong> <font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Aug2005;
 ?></font></font></strong></font></strong></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="SeptSales2005.php">Sept
            2005</a>:</font><strong> <font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Sept2005;
 ?></font></font></strong></font></strong></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif">Oct
            2005:</font><strong> <font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Oct2005;
 ?></font></font></strong></font></strong></li>
    </ul></td>
    <td><ul>
      <li><font size="2" face="Arial, Helvetica, sans-serif">Nov
            2005:</font><strong> <font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Nov2005;
 ?></font></font></strong></font></strong></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif">Dec 2005:</font><strong> <font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Dec2005;
 ?></font></font></strong></font></strong></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif">Jan 2006:</font><strong> <font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Jan2006;
 ?></font></font></strong></font></strong></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif">Feb 2006:</font><strong> <font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Feb2006;
 ?></font></font></strong></font></strong></li>
      <li><font size="2" face="Arial, Helvetica, sans-serif">Mar 2006:</font><strong> <font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"><? echo $Mar2006;
 ?></font></font></strong></font></strong></li>
    </ul></td>
  </tr>
</table>
<?


	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2003-08-31 23:59:59' AND tblPurchase2.OrderDateTime < '2003-10-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Sept2003a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND Type = '6' AND tblPurchase2.OrderDateTime > '2003-09-30 23:59:59' AND tblPurchase2.OrderDateTime < '2003-11-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Oct2003a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2003-10-31 23:59:59' AND tblPurchase2.OrderDateTime < '2003-12-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Nov2003a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2003-11-30 23:59:59' AND tblPurchase2.OrderDateTime < '2004-01-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Dec2003a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2003-12-31 23:59:59' AND tblPurchase2.OrderDateTime < '2004-02-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Jan2004a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-01-31 23:59:59' AND tblPurchase2.OrderDateTime < '2004-03-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Feb2004a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-02-29 23:59:59' AND tblPurchase2.OrderDateTime < '2004-04-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Mar2004a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-03-31 23:59:59' AND tblPurchase2.OrderDateTime < '2004-05-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Apr2004a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-04-30 23:59:59' AND tblPurchase2.OrderDateTime < '2004-06-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$May2004a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-05-31 23:59:59' AND tblPurchase2.OrderDateTime < '2004-07-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Jun2004a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-06-30 23:59:59' AND tblPurchase2.OrderDateTime < '2004-08-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Jul2004a = $row[Sum];
		}


	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-07-31 23:59:59' AND tblPurchase2.OrderDateTime < '2004-09-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Aug2004a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-08-31 23:59:59' AND tblPurchase2.OrderDateTime < '2004-10-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Sept2004a = $row[Sum];
		}


	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-09-30 23:59:59' AND tblPurchase2.OrderDateTime < '2004-11-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Oct2004a = $row[Sum];
		}


	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-10-31 23:59:59' AND tblPurchase2.OrderDateTime < '2004-12-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Nov2004a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-11-30 23:59:59' AND tblPurchase2.OrderDateTime < '2005-01-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Dec2004a = $row[Sum];
		}

	
	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2004-12-31 23:59:59' AND tblPurchase2.OrderDateTime < '2005-02-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Jan2005a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-01-31 23:59:59' AND tblPurchase2.OrderDateTime < '2005-03-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Feb2005a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-02-28 23:59:59' AND tblPurchase2.OrderDateTime < '2005-04-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Mar2005a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-03-31 23:59:59' AND tblPurchase2.OrderDateTime < '2005-05-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY ProductID";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Apr2005a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-04-30 23:59:59' AND tblPurchase2.OrderDateTime < '2005-06-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$May2005a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-05-31 23:59:59' AND tblPurchase2.OrderDateTime < '2005-07-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Jun2005a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-06-30 23:59:59' AND tblPurchase2.OrderDateTime < '2005-08-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Jul2005a = $row[Sum];
		}


	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-07-31 23:59:59' AND tblPurchase2.OrderDateTime < '2005-09-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Aug2005a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-08-31 23:59:59' AND tblPurchase2.OrderDateTime < '2005-10-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Sept2005a = $row[Sum];
		}


	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-09-30 23:59:59' AND tblPurchase2.OrderDateTime < '2005-11-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Oct2005a = $row[Sum];
		}


	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-10-31 23:59:59' AND tblPurchase2.OrderDateTime < '2005-12-01 00:00:00' AND tblPurchaseDetails2.Status = 'active'
	 AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Nov2005a = $row[Sum];
		}

	$sql = "SELECT Sum(tblPurchaseDetails2.Quantity) AS Sum, tblCustomer.Type, tblPurchaseDetails2.ProductID
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	INNER JOIN tblPurchaseDetails2
	ON tblPurchaseDetails2.PurchaseID = tblPurchase2.PurchaseID
	WHERE ProductID = '1' AND tblPurchase2.OrderDateTime > '2005-11-30 23:59:59' AND tblPurchase2.OrderDateTime < '2006-01-01 00:00:00' AND tblPurchaseDetails2.Status = 'active' AND tblCustomer.Type = '6'
	GROUP BY Type";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		while($row = mysql_fetch_array($result))
		{
			$Dec2005a = $row[Sum];
		}


	$Sept2003b = $Sept2003 - $Sept2003a;
	$Oct2003b = $Oct2003 - $Oct2003a;
	$Nov2003b = $Nov2003 - $Nov2003a;
	$Dec2003b = $Dec2003 - $Dec2003a;
	$Jan2004b = $Jan2004 - $Jan2004a;
	$Feb2004b = $Feb2004 - $Feb2004a;
	$Mar2004b = $Mar2004 - $Mar2004a;
	$Apr2004b = $Apr2004 - $Apr2004a;
	$May2004b = $May2004 - $May2004a;
	$Jun2004b = $Jun2004 - $Jun2004a;
	$Jul2004b = $Jul2004 - $Jul2004a;
	$Aug2004b = $Aug2004 - $Aug2004a;
	$Sept2004b = $Sept2004 - $Sept2004a;
	$Oct2004b = $Oct2004 - $Oct2004a;
	$Nov2004b = $Nov2004 - $Nov2004a;
	$Dec2004b = $Dec2004 - $Dec2004a;
	$Jan2005b = $Jan2005 - $Jan2005a;
	$Feb2005b = $Feb2005 - $Feb2005a;
	$Mar2005b = $Mar2005 - $Mar2005a;
	$Apr2005b = $Apr2005 - $Apr2005a;
	$May2005b = $May2005 - $May2005a;
	$Jun2005b = $Jun2005 - $Jun2005a;
	$Jul2005b = $Jul2005 - $Jul2005a;
	$Aug2005b = $Aug2005 - $Aug2005a;
	$Sept2005b = $Sept2005 - $Sept2005a;
	$Oct2005b = $Oct2005 - $Oct2005a;
	$Nov2005b = $Nov2005 - $Nov2005a;
	$Dec2005b = $Dec2005 - $Dec2005a;

?><br>
<font size="3" face="Arial, Helvetica, sans-serif"><strong>LSAT Timers Sold to
Web/eBay/Amazon/Samples Customers</strong></font>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000066">
  <tr> 
    <td width="8%" height="26"> <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">1/04</font></div></td>
    <td width="8%"> <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">2/04</font></div></td>
    <td width="8%"> <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">3/04</font></div></td>
    <td width="8%"> <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">4/04</font></div></td>
    <td width="8%"> <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">5/04</font></div></td>
    <td width="8%"> <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">6/04</font></div></td>
    <td width="8%"> <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">7/04</font></div></td>
    <td width="8%"> <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">8/04</font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><strong><font color="#0000FF"><? echo $Sept2003b;
 ?></font></strong></strong></font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Oct2003b;
 ?></font></strong></font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Nov2003b;
 ?></font></strong></font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Dec2003b;
 ?></font></strong></font></div></td>
  </tr>
  <tr> 
    <td width="8%" height="26"> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">1/04</font></div></td>
    <td width="8%"> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">2/04</font></div></td>
    <td width="8%"> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">3/04</font></div></td>
    <td width="8%"> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">4/04</font></div></td>
    <td width="8%"> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">5/04</font></div></td>
    <td width="8%"> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">6/04</font></div></td>
    <td width="8%"> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">7/04</font></div></td>
    <td width="8%"> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">8/04</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">9/03</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">10/03</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">11/03</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">12/03</font></div></td>
  </tr>
</table>
<br>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000066">
  <tr> 
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Jan2004b;
 ?></font></strong></font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Feb2004b;
 ?></font></strong></font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Mar2004b;
 ?></font></strong></font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Apr2004b;
 ?></font></strong></font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $May2004b;
 ?></font></strong></font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Jun2004b;
 ?></font></strong></font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Jul2004b;
 ?></font></strong></font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Aug2004b;
 ?></font></strong></font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Sept2004b;
 ?></font></strong></font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Oct2004b;
 ?></font></strong></font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Nov2004b;
 ?></font></strong></font></div></td>
    <td width="8%"> <div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Dec2004b;
 ?></font></strong></font></div></td>
  </tr>
  <tr> 
    <td width="8%" height="26"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">1/04</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">2/04</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">3/04</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">4/04</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">5/04</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">6/04</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">7/04</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">8/04</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">9/04</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">10/04</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">11/04</font></div></td>
    <td width="8%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">12/04</font></div></td>
  </tr>
</table>
<br>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000066">
  <tr>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Jan2005b;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Feb2005b;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Mar2005b;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Apr2005b;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $May2005b;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Jun2005b;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Jul2005b;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Aug2005b;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Sept2005b;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Oct2005b;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Nov2005b;
 ?></font></strong></font></div></td>
    <td width="8%"><div align="center"><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF"><? echo $Dec2005b;
 ?></font></strong></font></div></td>
  </tr>
  <tr>
    <td width="8%" height="26"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">1/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">2/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">3/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">4/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">5/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">6/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">7/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">8/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">9/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">10/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">11/05</font></div></td>
    <td width="8%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">12/05</font></div></td>
  </tr>
</table>
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
