<?
//security for page
session_start();

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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>SAT Test Dates</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The SAT test may be taken an unlimited 
  number of times. Most students typically take it first the spring semester of 
  their junior year and then again in the fall semester of their senior year. 
  </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Check directly with your
    schools  of choice to determine if they require the SAT or SAT II tests before
    you register.</font></p>
<p><strong><font size="3" face="Arial, Helvetica, sans-serif">Future Test Dates </font></strong></p>
<table width="100%" border="0" cellspacing="0">
  <?
			$now = date("Y-m-d");
	
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

		
		$sql = "SELECT DATE_FORMAT(Date, '%W, %M %d, %Y') AS TestDate, Info FROM tblTestDates WHERE TestID = '3' AND Date >= '$now' ORDER BY Date ASC";
		$result = mysql_query($sql) or die("Cannot execute query");
		
  		while($row = mysql_fetch_array($result))
			{
				$Date = $row[TestDate];
				$Information = $row[Info];
				
				
?>
  <tr valign="top">
    <td width="2%"><strong>-</strong></td>
    <td width="98%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Date; ?> <? echo $Information; ?></font></td>
  </tr>
  <?
}
?>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif">Register to receive <a href="sat_registration.php">FREE
      SAT registration information</a>, including test dates and deadlines. </font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>

  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
