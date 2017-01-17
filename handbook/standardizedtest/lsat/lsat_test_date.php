<?
//security for page
session_start();

$PageTitle = "LSAT Test Dates and Deadlines";

// has http variable in it to populate links on page.
require "../../../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../../../include/dbinfo.php";

// has top header in it.
require "../../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../../../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> <strong><font color="#003399" size="4" face="Times New Roman, Times, serif"> 
</font></strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font size="4" face="Times New Roman, Times, serif"><font size="2">THE 
SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></font><font color="#000000" size="2"> 
<em>Handbook</em></font></strong></font> 
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="<? echo $https;?>product.php?t=LSAT">LSAT 
  Timer</a> | <a href="lsat_registration.php">LSAT Registration</a> | &nbsp;<a href="../../../testhome/lsat.php">LSAT 
  Test</a></strong></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong><font size="5">LSAT Test Dates</font></strong></font></p>
                  
<p><font size="2" face="Arial, Helvetica, sans-serif">The LSAT is given four times a year-- 
  February, June, September or October and December. The February, September, 
  October and December exams are given at 8:30 a.m. The June LSAT is the only 
  one that begins at 12:30 p.m. Be sure and take into consideration your best 
  test taking skills when deciding to take your test!</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Typically, students applying to law 
  school should take the test by the October before they apply for law school.</font></p>
<p><font face="Arial, Helvetica, sans-serif"><strong><font size="4">Upcoming Test Dates:</font></strong></font></p>
<table width="100%" border="0" cellspacing="0">
  <?
  
  	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$now = date("Y-m-d");
	
		$sql = "SELECT DATE_FORMAT(Date, '%W, %M %d, %Y') AS TestDate, Info FROM tblTestDates WHERE TestID = '1' AND Date >= '$now' ORDER BY Date ASC";
		$result = mysql_query($sql) or die("Cannot execute query");
		
  		while($row = mysql_fetch_array($result))
			{
				$Date = $row[TestDate];
				$Information = $row[Info];
				
				
?>
  <tr>
    <td width="2%"><strong>-</strong></td>
    <td width="94%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Date; ?> <? echo $Information; ?></font></td>
  </tr>
  <?
}
mysql_close($link);
?>
</table>
<p><br>
</p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links</font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.lsac.org/LSAC.asp?url=lsac/test-dates-deadlines.asp" target="_blank">Law 
  School Admission Council - Test Dates and Deadlines</a></font></p>
<p> 
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
