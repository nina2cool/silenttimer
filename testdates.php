<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$now = date("Y-m-d");
	
	$sql = "SELECT * FROM tblTestDates WHERE Date >= '$now'";
	$result = mysql_query($sql) or die("Cannot execute query");
	
	


?> 
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Test 
  Dates</strong></font></p>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td bgcolor="#FFFFCC"><div align="center"><font color="#000000"><strong><font size="3" face="Arial, Helvetica, sans-serif"><a href="#act">ACT</a> - <a href="#gmat">GMAT</a> - <a href="#gre">GRE</a> - <a href="#lsat">LSAT</a> - <a href="#mcat">MCAT</a> - <a href="#sat">SAT
    I &amp; II</a> </font></strong></font></div></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif">Be sure to check your <a href="links.php">test's
       website</a> for alternate dates and registration deadlines. The dates
below are as accurate as possible, but not absolute. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="act"></a><font color="#003399"><a href="http://silenttimer.com/handbook/standardizedtest/act/">ACT</a></font></font></strong></font></p>
<table width="100%" border="0" cellspacing="0">
  <?
		$sql = "SELECT DATE_FORMAT(Date, '%W, %M %d, %Y') AS TestDate, Info FROM tblTestDates WHERE TestID = '6' AND Date >= '$now' ORDER BY Date ASC";
		$result = mysql_query($sql) or die("Cannot execute query");
		
  		while($row = mysql_fetch_array($result))
			{
				$Date = $row[TestDate];
				$Information = $row[Info];
				
				
?>
  <tr> 
    <td width="2%"><strong>-</strong></td>
    <td width="94%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Date; ?> 
      <? echo $Information; ?></font></td>
  </tr>
  <?
}
?>
</table>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong><a name="gmat"></a><font color="#003399"><a href="http://silenttimer.com/handbook/standardizedtest/gmat/">GMAT</a></font></strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Schedule whenever you want; 
  test centers have their own dates</font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong><a name="gre" id="gre"></a><font color="#003399"><a href="http://silenttimer.com/handbook/standardizedtest/gre/">GRE
          &amp; GRE Subject Tests </a></font></strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Computer-based tests: Given
    year-round.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Paper-based tests:</font></p>
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
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="lsat"></a><font color="003399"><a href="http://silenttimer.com/handbook/standardizedtest/lsat/">LSAT</a></font></font></strong></font></p>
<table width="100%" border="0" cellspacing="0">
  <?
		$sql = "SELECT DATE_FORMAT(Date, '%W, %M %d, %Y') AS TestDate, Info FROM tblTestDates WHERE TestID = '1' AND Date >= '$now' ORDER BY Date ASC";
		$result = mysql_query($sql) or die("Cannot execute query");
		
  		while($row = mysql_fetch_array($result))
			{
				$Date = $row[TestDate];
				$Information = $row[Info];
				
				
?>
  <tr> 
    <td width="2%"><strong>-</strong></td>
    <td width="94%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Date; ?> 
      <? echo $Information; ?></font></td>
  </tr>
  <?
}
?>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="mcat"></a><font color="003399"><a href="http://silenttimer.com/handbook/standardizedtest/mcat/">MCAT</a></font></font></strong></font></p>
<table width="100%" border="0" cellspacing="0">
  <?
		$sql = "SELECT DATE_FORMAT(Date, '%W, %M %d, %Y') AS TestDate, Info FROM tblTestDates WHERE TestID = '2' AND Date >= '$now' ORDER BY Date ASC";
		$result = mysql_query($sql) or die("Cannot execute query");
		
  		while($row = mysql_fetch_array($result))
			{
				$Date = $row[TestDate];
				$Information = $row[Info];
				
				
?>
  <tr> 
    <td width="2%"><strong>-</strong></td>
    <td width="94%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Date; ?> 
      <? echo $Information; ?></font></td>
  </tr>
  <?
}
?>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="sat"></a><font color="003399"><a href="http://silenttimer.com/handbook/standardizedtest/sat/">SAT
  I &amp; II</a></font></font></strong></font></p>
<table width="100%" border="0" cellspacing="0">
  <?
		$sql = "SELECT DATE_FORMAT(Date, '%W, %M %d, %Y') AS TestDate, Info FROM tblTestDates WHERE TestID = '3' AND Date >= '$now' ORDER BY Date ASC";
		$result = mysql_query($sql) or die("Cannot execute query");
		
  		while($row = mysql_fetch_array($result))
			{
				$Date = $row[TestDate];
				$Information = $row[Info];
				
				
?>
  <tr> 
    <td width="2%"><strong>-</strong></td>
    <td width="98%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Date; ?> 
      <? echo $Information; ?></font></td>
  </tr>
  <?
}
?>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><br>
  </font><font face="Arial, Helvetica, sans-serif"> </font> </p>
<p align="left">&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>