<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('custID'))
{
// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";




// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	$custID = $_SESSION['custID'];


	//connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Databaasdfasdfasdfasdfdsse2");			
		
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$custID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
			
	while($row = mysql_fetch_array($result))
	{
		$FirstName = $row[FirstName];
		$LastName = $row[LastName];
	}



?>


<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Downloads</strong></font></p>
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr bgcolor="#FFFFCC">
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Item</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Size</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Download</font></strong></div></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Silent Timer&#8482; User
    Manual</font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">364 KB </font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/order/manual/ST_Manual_2005_v2.pdf" target="_blank">Download</a></font></div></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Silent Digital Watch
        Instructions </font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">568
          KB </font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/order/manual/Watch_Instructions.pdf" target="_blank">Download</a></font></div></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Silent Timer&#8482; Time Management Guide </font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">206 KB </font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/order/guide/ST_TimeManGuide_061405.pdf" target="_blank">Download</a></font></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/test_sidemenu.php";

// finishes security for page
}
else
{
?>
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customerservice/test_index.php'>
<?
}
?>