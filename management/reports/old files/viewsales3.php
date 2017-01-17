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
	
	//Search mechanism that users provided
	$chk1 = $_POST['chkState'];
	
	//State
	$state = $_POST['cboState'];
			
			
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	
	$sql = 'SELECT sum(TotalCost) AS Sum, sum(Tax) AS Tax, sum(ShippingCost) AS ShippingCost, sum(NumOrdered) AS NumOrdered
			FROM tblPurchase';
	$result = mysql_query($sql) or die("Cannot execute query!");
	
		while($row = mysql_fetch_array($result))
				{
				$sum = $row[Sum];
				$Tax = $row[Tax];
				$ShippingCost = $row[ShippingCost];
				$NumOrdered = $row[NumOrdered];
				}
				
				$Revenue = $sum - $Tax - $ShippingCost;
								

?>

<p align='center'>&nbsp;</p>

<p align="center"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Silent 
  Technology LLC</strong></font></p>
<p align="center"><font size="4" face="Arial, Helvetica, sans-serif"><strong>Sales 
  Report Summary</strong></font></p>
<table width="75%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr> 
    <td width="81%"><font size="3" face="Arial, Helvetica, sans-serif">Total Amount 
      Collected from Customers</font></td>
    <td width="19%"><div align="right"><font size="3" face="Arial, Helvetica, sans-serif">$<? echo number_format($sum,2); ?></font></div></td>
  </tr>
  <tr> 
    <td width="81%"><font size="3" face="Arial, Helvetica, sans-serif">Total Amount 
      of Tax Collected from TX Customers</font></td>
    <td><div align="right"><font size="3" face="Arial, Helvetica, sans-serif">$<? echo number_format($Tax,2); ?></font></div></td>
  </tr>
  <tr> 
    <td width="81%"><font size="3" face="Arial, Helvetica, sans-serif">Total Shipping 
      Costs (according to EasyShip)</font></td>
    <td><div align="right"><font size="3" face="Arial, Helvetica, sans-serif">$<? echo number_format($ShippingCost,2); ?></font></div></td>
  </tr>
  <tr> 
    <td width="81%"><font size="3" face="Arial, Helvetica, sans-serif">Number 
      of Timers Ordered</font></td>
    <td><div align="right"><font size="3" face="Arial, Helvetica, sans-serif"><? echo $NumOrdered; ?></font></div></td>
  </tr>
  <tr> 
    <td width="81%"><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td><div align="right"><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></div></td>
  </tr>
  <tr bgcolor="#66FF33"> 
    <td width="81%" height="40"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif">Total 
      Revenue (Total Amount - Tax - Shipping Costs)</font></td>
    <td><div align="right"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif">$<? echo number_format($Revenue,2); ?></font></div></td>
  </tr>
</table>
<p>&nbsp; </p>
<p>&nbsp;</p>
<p> 
  <?
	
	//close connection to database
	mysql_close($link);	
}
?>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
