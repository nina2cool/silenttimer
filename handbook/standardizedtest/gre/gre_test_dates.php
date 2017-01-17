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

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$now = date("Y-m-d H:i:s");

?> <strong><font color="#003399" size="4" face="Times New Roman, Times, serif"> 
</font></strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font size="4" face="Times New Roman, Times, serif"><font size="2">THE 
SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></font><font color="#000000" size="2"> 
<em>Handbook</em></font></strong></font> 
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>GRE Test Dates</strong></font></p>
<p> <font size="2" face="Arial, Helvetica, sans-serif">The GRE test can be taken 
  once a month up to five times in one year. Though many students retake the exam 
  more than once, it&#8217;s not necessarily recommended by experts. Studies have 
  shown that candidates who retake the test show slight score gain. Unless your 
  scores are unusually low compared to other signs of your ability level, retaking 
  the GRE exam won&#8217;t dramatically improve your score, and your score may 
  even go down. The key here is completely preparing yourself to take the test 
  the first time around.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The computer-based GRE test 
  is given all year at computer-based testing centers. This form of the test is 
  available when paper-based testing is not available. <a href="gre_registration.php">Register 
  early to get your preferred test date</a>. Appointments are scheduled on a first 
  come, first serve basis. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><em>*Paper-based GRE tests 
  are offered where computer-based testing is not available.</em></font></p>
<p><strong><font size="3" face="Arial, Helvetica, sans-serif">Computer-based
      tests</font></strong><font size="2" face="Arial, Helvetica, sans-serif">:<br>
  Given
year-round.</font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Paper-based tests:</strong></font></p>
<table width="100%" border="0" cellspacing="0">
  <?
		$sql = "SELECT DATE_FORMAT(Date, '%W, %M %d, %Y') AS TestDate, Info FROM tblTestDates WHERE TestID = '5' AND Date >= '$now' ORDER BY Date ASC";
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
<p>&nbsp;</p>
<?

mysql_close($link);

// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>