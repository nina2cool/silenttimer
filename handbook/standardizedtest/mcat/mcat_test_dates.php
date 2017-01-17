<?
//security for page
session_start();

$PageTitle = "MCAT Test Dates and Deadlines";

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

$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> <strong><font color="#003399" size="4" face="Times New Roman, Times, serif"> 
</font></strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font size="4" face="Times New Roman, Times, serif"><font size="2">THE 
SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></font><font color="#000000" size="2"> 
<em>Handbook</em></font></strong></font> 
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../../../order/index.php?t=MCAT">MCAT 
  Timer</a> | <a href="mcat_registration.php">MCAT Registration</a> | &nbsp;<a href="../../../testhome/mcat.php">MCAT 
  Test</a></strong></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>MCAT Test Dates</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Students are generally only 
  allowed to take the MCAT test three times unless you receive special permission. 
  Experts encourage students to take the test 18 months before they plan to enter 
  medical school, and medical schools would rather students test in April because 
  of the limited time available between the August MCAT test date and school application 
  deadlines. Though there is typically enough time allotted between the August 
  MCAT test date and school application deadlines, they would still prefer to 
  have your scores earlier rather than rushing at the last minute to get them 
  in. Many candidates take the MCAT test in April of their junior year.</font></p>
<p><b><font size="4" face="Arial, Helvetica, sans-serif">Changes for 2007</font></b></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Beginning in 2007, the
    number of MCAT administrations increases from twice a year to 22 test dates!
    The MCAT is also going computerized, so no more paper tests. According to
    the AAMC, students can take the MCAT up to three times per year. Sessions
    are available in the morning or in the afternoon, weekdays and Saturdays. </font></p>
<p><font color="003399" size="3" face="Arial, Helvetica, sans-serif"><strong>Upcoming
      MCAT Test Dates </strong></font></p>
<table width="100%" border="0" cellspacing="0">
  <?
		
		$now = date("Y-m-d");
		
		$sql = "SELECT DATE_FORMAT(Date, '%W, %M %d, %Y') AS TestDate, Info FROM tblTestDates WHERE TestID = '2' AND Date >= '$now'";
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
?>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="mcat_registration.php">Click
here for MCAT registration information.</a></font></p>
<p>&nbsp;</p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links</font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.aamc.org/students/mcat/registration.htm" target="_blank">AAMC 
  MCAT Test Dates and Deadlines</a></font></p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>