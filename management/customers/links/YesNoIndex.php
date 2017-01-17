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
		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
	$sql = "SELECT * FROM tblCustomerEdit WHERE CustomerID <> '0' AND Type = 'refer-yes' AND Status = 'active'";
	$result = mysql_query($sql) or die("Cannot execute query!");
	$CountYes = mysql_num_rows($result);
	
	$sql2 = "SELECT * FROM tblCustomerEdit WHERE CustomerID <> '0' AND Type = 'refer-no' AND Status = 'active'";
	$result2 = mysql_query($sql2) or die("Cannot execute query!");
	$CountNo = mysql_num_rows($result2);

	$sql3 = "SELECT * FROM tblCustomerEdit WHERE CustomerID <> '0' AND Type = 'refer-no' AND Status = 'active' OR CustomerID <> '0' AND Type = 'refer-yes' AND Status = 'active'";
	$result3 = mysql_query($sql3) or die("Cannot execute query!");
	$CountTotal = mysql_num_rows($result3);


	$PercentYes = $CountYes / $CountTotal * 100;
	$PercentNo = $CountNo / $CountTotal * 100;

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Yes/No
Statistics</strong></font></p>
<ul>
  <li><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CountTotal; ?> of
      Total Responses</font></li>
  <li><font size="2"><font size="2"><font face="Arial, Helvetica, sans-serif"><? echo number_format($PercentYes,2); ?></font></font><font face="Arial, Helvetica, sans-serif">%
        Yes</font></font></li>
  <li><font size="2"><font size="2"><font face="Arial, Helvetica, sans-serif"><? echo number_format($PercentNo,2); ?></font></font><font face="Arial, Helvetica, sans-serif">%
        No</font></font></li>
</ul>
<table width="50%" border="1" cellpadding="3" cellspacing="0" bordercolor="#CCCCCC">
    <tr bgcolor="#FFFFCC"> 
      <td width="11%" bgcolor="#FFFFCC" class=sort> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Yes
              or No </strong></font></div></td>
      <td width="25%" class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">#
            of Hits</font></div></td>
    <tr>
      <td height="26"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">#
            of Yes</font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CountYes; ?> <a href="YesNoDetail.php?type=refer-yes"><font size="1">View</font></a></font></div></td>
    </tr>
    <tr> 
      <td height="26"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">#
            of No </font></div></td>
      <td width="25%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CountNo; ?> <a href="YesNoDetail.php?type=refer-no"><font size="1">View</font></a></font></div></td>
    </tr>
  </table> 
		
            
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
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
