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


	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Bookstores
      and Test Prep </strong></font></p>
<font size="2" face="Arial, Helvetica, sans-serif"><strong>All
Types</strong></font>
<table width="50%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">

<?

$sql = "SELECT Count(CustomerType) as Count, CustomerType FROM tblBusinessCustomer WHERE Status = 'active' GROUP BY CustomerType ORDER BY CustomerType";
$result = mysql_query($sql) or die("Cannot get customer type count");

while($row = mysql_fetch_array($result))
{

$Count = $row['Count'];
$CustomerType = $row['CustomerType'];

		if($CustomerType == "Bookstore") { $URL = "businesscustomer/bookstores/index.php";}
		if($CustomerType == "Test Prep") { $URL = "businesscustomer/testprep/index.php";}

?>

  <tr> 
    <td width="52%"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?><? echo $URL;?>"><strong><? echo $CustomerType; ?></strong></a></font></td>
    <td width="48%"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Count; ?></font></td>
  </tr>
  <?
  
  }
  
  ?>
  
  
</table>
<font size="2" face="Arial, Helvetica, sans-serif">
<br>
<strong>Bookstore Chains</strong></font>
<table width="75%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <?

$sql2 = "SELECT Count(Chain) as Count, Chain, CustomerType FROM tblBusinessCustomer WHERE Status = 'active' AND CustomerType = 'Bookstore' GROUP BY Chain ORDER BY Chain";
$result2 = mysql_query($sql2) or die("Cannot get customer type count");

while($row2 = mysql_fetch_array($result2))
{

$Count2 = $row2['Count'];
$Chain = $row2['Chain'];
$CustomerType2 = $row2['CustomerType'];

if($Chain == "")
{
$Chain = "Other";
}

?>
  <tr>
    <td width="52%"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Chain; ?></font></td>
    <td width="48%"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Count2; ?></font></td>
  </tr>
  <?
  
  }
  
  ?>
</table>
<font size="2" face="Arial, Helvetica, sans-serif"><br>
<strong>Other Chains</strong></font>
<table width="75%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <?

$sql3 = "SELECT Count(Chain) as Count, Chain, CustomerType FROM tblBusinessCustomer WHERE Status = 'active' AND CustomerType <> 'Bookstore' GROUP BY Chain ORDER BY Chain";
$result3 = mysql_query($sql3) or die("Cannot get customer type count");

while($row3 = mysql_fetch_array($result3))
{

$Count3 = $row3['Count'];
$Chain = $row3['Chain'];


if($Chain == "")
{
$Chain = "Other";
}

?>
  <tr>
    <td width="52%"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Chain; ?></font></td>
    <td width="48%"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Count3; ?></font></td>
  </tr>
  <?
  
  }
  
  ?>
</table>
<p align="left">&nbsp;</p>

  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
mysql_close($link);
// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";
// has links that show up at the bottom in it - found in home management folder
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