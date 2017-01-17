<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
<?

	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblCustomer";
	$result = mysql_query($sql) or die("Cannot retrieve 1Customer info, please try again.");

	$NumCustomers = mysql_num_rows($result);
	
	$sql2 = "SELECT * FROM tblCustomer WHERE Type = '1'";
	$result2 = mysql_query($sql2) or die("Cannot retrieve 2Customer info, please try again.");
	
		$NumWebCustomers = mysql_num_rows($result2);
		
	$sql3 = "SELECT * FROM tblCustomer WHERE Type = '6'";
	$result3 = mysql_query($sql3) or die("Cannot retrieve 3Customer info, please try again.");
	
		$NumBulkCustomers = mysql_num_rows($result3);
		
	$sql4 = "SELECT * FROM tblCustomer WHERE Type = '4'";
	$result4 = mysql_query($sql4) or die("Cannot retrieve 4Customer info, please try again.");
	
		$NumEbayCustomers = mysql_num_rows($result4);
		
		
	$sql5 = "SELECT * FROM tblCustomer WHERE Type = '5'";
	$result5 = mysql_query($sql5) or die("Cannot retrieve 5Customer info, please try again.");
	
		$NumSamplesCustomers = mysql_num_rows($result5);

	
	$sql12 = "SELECT * FROM tblBusinessCustomer WHERE Status = 'active'";
	$result12 = mysql_query($sql12) or die("Cannot retrieve 5Customer info, please try again.");

	$NumBusinessCustomers = mysql_num_rows($result12);



	$sql13 = "SELECT * FROM tblCustomer WHERE Type = '2'";
	$result13 = mysql_query($sql13) or die("Cannot retrieve 13Customer info, please try again.");

	$NumPhoneCustomers = mysql_num_rows($result13);
	
	
	$sql14 = "SELECT * FROM tblCustomer WHERE Type = '3'";
	$result14 = mysql_query($sql14) or die("Cannot retrieve 14Customer info, please try again.");

	$NumAmazonCustomers = mysql_num_rows($result14);	

	
	$sql6 = "SELECT Sum(tblPurchaseDetails2.Quantity) AS TimerQuantity
			FROM tblPurchaseDetails2
			WHERE Status = 'active' AND ProductID = '1'";

	$result6 = mysql_query($sql6) or die("Cannot retrieve 6Customer info, please try again.");
	
		while($row6 = mysql_fetch_array($result6))
				{
				$NumTimers = $row6['TimerQuantity'];
				}

	/*
	$sql7 = "SELECT Sum(tblPurchase.NumOrdered) AS NumOrdered
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE tblCustomer.Type = 'bulk' AND Status = 'active'";

	$result7 = mysql_query($sql7) or die("Cannot retrieve 7Customer info, please try again.");
	
		while($row7 = mysql_fetch_array($result7))
				{
				$NumBulkTimers = $row7['NumOrdered'];
				}
				
	$sql8 = "SELECT Sum(tblPurchase.NumOrdered) AS NumOrdered
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE tblCustomer.Type = 'ebay' AND Status = 'active'";

	$result8 = mysql_query($sql8) or die("Cannot retrieve 8Customer info, please try again.");
	
		while($row8 = mysql_fetch_array($result8))
				{
				$NumEbayTimers = $row8['NumOrdered'];		
				}
				
	$sql9 = "SELECT Sum(tblPurchase.NumOrdered) AS NumOrdered
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE tblCustomer.Type = 'samples' AND Status = 'active'";

	$result9 = mysql_query($sql9) or die("Cannot retrieve 9Customer info, please try again.");
	
		while($row9 = mysql_fetch_array($result9))
				{
				$NumSampleTimers = $row9['NumOrdered'];		
				}
		


	$sql10 = "SELECT Sum(tblPurchase.NumOrdered) AS NumOrdered
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE tblCustomer.Type = 'phone' AND Status = 'active'";

	$result10 = mysql_query($sql10) or die("Cannot retrieve 10Customer info, please try again.");
	
		while($row10 = mysql_fetch_array($result10))
				{
				$NumPhoneTimers = $row10['NumOrdered'];		
				}
				
				
	$sql11 = "SELECT Sum(tblPurchase.NumOrdered) AS NumOrdered
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE tblCustomer.Type = 'amazon' AND Status = 'active'";

	$result11 = mysql_query($sql11) or die("Cannot retrieve 11Customer info, please try again.");
	
		while($row11 = mysql_fetch_array($result11))
				{
				$NumAmazonTimers = $row11['NumOrdered'];		
				}		
				
				*/
	
?>


<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Customers/Order
Statistics</strong></font>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3">We 
  have a total of </font></strong></font><font size="3" face="Arial, Helvetica, sans-serif"><strong><font color="#003399"><? echo $NumCustomers; ?></font> 
Customers!</strong></font><font size="4" face="Arial, Helvetica, sans-serif"></font></p>
            
<table width="63%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Type 
        of Customer</font></strong></font></div></td>
    <td width="33%"> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"># 
        of Customers</font></strong></font></div></td>
    <td width="28%"> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"># 
        of Timers Sold</font></strong></font></div></td>
  </tr>
  <tr> 
    <td width="39%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Web 
      Customers</font></strong></td>
    <td width="33%"> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumWebCustomers; ?></font></strong></font></div></td>
    <td width="28%"> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumTimers; ?></font></strong></font></div></td>
  </tr>
  <tr> 
    <td width="39%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Bulk 
      Customers</font></strong></td>
    <td width="33%"> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumBulkCustomers; ?></font></strong></font></div></td>
    <td width="28%"> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumBulkTimers; ?></font></strong></font></div></td>
  </tr>
  <tr> 
    <td width="39%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">eBay 
      Customers</font></strong></td>
    <td width="33%"> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumEbayCustomers; ?></font></strong></font></div></td>
    <td width="28%"> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumEbayTimers; ?></font></strong></font></div></td>
  </tr>
  <tr> 
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Sample 
      Customers</strong></font></td>
    <td width="33%"> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumSamplesCustomers; ?></font></strong></font></div></td>
    <td width="28%"> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumSampleTimers; ?></font></strong></font></div></td>
  </tr>
  <tr>
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Phone
    Customers</strong></font></td>
    <td><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumPhoneCustomers; ?></font></strong></font></div></td>
    <td><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumPhoneTimers; ?></font></strong></font></div></td>
  </tr>
  <tr>
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Amazon
    Customers</strong></font></td>
    <td><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumAmazonCustomers; ?></font></strong></font></div></td>
    <td><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumAmazonTimers; ?></font></strong></font></div></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Business Customers</strong></font></td>
    <td><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumBusinessCustomers; ?></font></strong></font></div></td>
    <td><div align="center">-</div></td>
  </tr>
</table>


<p align="left">
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);

// has links that show up at the bottom in it.

require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";

// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
