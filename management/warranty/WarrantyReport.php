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


	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	

	$sql3 = "SELECT * FROM tblCustomerClaims2 WHERE Status = 'closed'";
	//echo $sql;
	$result3 = mysql_query($sql3) or die("Cannot get claim info1, please try again. <br>$sql");
	
	$ClosedClaims = mysql_num_rows($result3);
	
	
	$sql4 = "SELECT * FROM tblCustomerClaims2 WHERE Status = 'open'";
	//echo $sql;
	$result4 = mysql_query($sql4) or die("Cannot get claim info1, please try again. <br>$sql");
	
	$OpenClaims = mysql_num_rows($result4);


	
	$sql = "SELECT * FROM tblCustomerClaims2 WHERE ClaimType = 'Refund'";
	//echo $sql;
	$result = mysql_query($sql) or die("Cannot get claim info1, please try again. <br>$sql");
		
	$Refunds = mysql_num_rows($result);

	$sql2 = "SELECT * FROM tblCustomerClaims2 WHERE ClaimType = 'Replacement'";
	$result2 = mysql_query($sql2) or die("Cannot get claim info2, please try again.");
		
	$Replacements = mysql_num_rows($result2);
			
	$sql = "SELECT * FROM tblCustomerClaims2 WHERE ClaimType = 'Return'";
	$result = mysql_query($sql) or die("Cannot get claim info3, please try again.");
		
	$Returns = mysql_num_rows($result);
	

	$sql = "SELECT * FROM tblCustomerClaims2 WHERE ClaimType = 'Cancel'";
	$result = mysql_query($sql) or die("Cannot get claim info3, please try again.");
		
	$Cancels = mysql_num_rows($result);
			

		$sql6 = "SELECT Sum(tblPurchaseDetails2.Quantity) AS NumOrdered
				FROM tblCustomer INNER JOIN tblPurchase2
				ON tblCustomer.CustomerID = tblPurchase2.CustomerID
				INNER JOIN tblPurchaseDetails2
				ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
				INNER JOIN tblProductNew ON tblPurchaseDetails2.ProductID = tblProductNew.ProductID
				WHERE tblPurchase2.Status = 'active' AND tblProductNew.Timer = 'y'
				GROUP BY tblProductNew.Timer";
				
				//echo $sql6;
	
		$result6 = mysql_query($sql6) or die("Cannot retrieve 6Customer info, please try again.");
		
		while($row6 = mysql_fetch_array($result6))
		{
			$Total = $row6['NumOrdered'];
		}
					
		$PercentRefunds = $Refunds / $Total * 100;
		$PercentReplacements = $Replacements / $Total * 100;
		$PercentReturns = $Returns / $Total * 100;
		$PercentCancels = $Cancels / $Total * 100;
?>


<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt;  Warranty
  Report Summary <br>
</strong></font> </p>

<table width="50%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFFFCC">
  <tr>
    <td width="53%"><font size="2" face="Arial, Helvetica, sans-serif">Open Claims </font></td>
    <td width="47%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $OpenClaims; ?></font></div></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Closed Claims </font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ClosedClaims; ?></font></div></td>
  </tr>
</table>
<br>
<table width="50%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFCCFF">
  <tr>
    <td width="53%"><font size="2" face="Arial, Helvetica, sans-serif">Refunds</font></td>
    <td width="47%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Refunds; ?></font></div></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Replacements</font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Replacements; ?></font></div></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Returns</font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Returns; ?></font></div></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Cancels</font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Cancels; ?></font></div></td>
  </tr>
</table>
<br>
<table width="50%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#99CCFF">
<?
	$sql8 = "SELECT Count(Reason2) as Reason2Count, Reason2 FROM tblCustomerClaims2 GROUP BY Reason2 ORDER BY Reason2Count DESC";
	$result8 = mysql_query($sql8) or die("Cannot count Reason2");
?>
  <tr>
  <? 
  	while($row8 = mysql_fetch_array($result8))
	{
		$Reason2Count = $row8[Reason2Count];
		$Reason2 = $row8[Reason2];
		
		if($Reason2 == "") { $Reason2 = "Other"; }
	?>
		
    <td width="53%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Reason2; ?></font></td>
    <td width="47%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Reason2Count; ?></font></div></td>
  </tr>
  <?
  }
  ?>
</table>
<br>
<table width="50%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#99FF99">
  <tr>
    <td width="53%"><font size="2" face="Arial, Helvetica, sans-serif"># of Timers Ordered</font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($Total); ?></font></div></td>
  </tr>
  <tr>
    <td width="53%"><font size="2" face="Arial, Helvetica, sans-serif">% Refunds</font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($PercentRefunds,2); ?> %</font></div></td>
  </tr>
  <tr>
    <td width="53%"><font size="2" face="Arial, Helvetica, sans-serif">% Replacements</font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($PercentReplacements,2); ?> %</font></div></td>
  </tr>
  <tr>
    <td width="53%"><font size="2" face="Arial, Helvetica, sans-serif">% Returns</font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($PercentReturns,2); ?> %</font></div></td>
  </tr>
  <tr>
    <td width="53%"><font size="2" face="Arial, Helvetica, sans-serif">% Cancels </font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($PercentCancels,2); ?> %</font></div></td>
  </tr>
</table>
<p align="left">&nbsp;</p>
<p align="center">&nbsp;</p>



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
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
