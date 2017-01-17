<?
//security for page
session_start();

//security check
If (session_is_registered('userName'))
{

// has http variable in it to populate links on page.
require "../include/url.php";

require "../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
		$BusinessCustomerID = $_GET['id'];
		
		# link to Database...
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database2");			

	
		$sql = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
		$result = mysql_query($sql) or die("Cannot execute query BusinessCustomerID!");
		while($row = mysql_fetch_array($result))
		{
			$zipOne = $row[ZipCode];
			$Name = $row[FirstName];
			$PromotionCode = $row[PromotionCodeID];
		}
	
	
		$sql2 = "SELECT DATE_FORMAT(EndDate, '%m/%d/%y') AS EndDate2 FROM tblPromotionCode WHERE PromotionCodeID = '$PromotionCode'";
		$result2 = mysql_query($sql2) or die("Cannot retrieve PromotionCodeID info, please try again.");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$ExpirationDate = $row2['EndDate2'];
		}
		

?><title>Flier</title> 

<div align="center"><font size="10"><strong><font face="Arial, Helvetica, sans-serif"><u>SILENT</u>,<br>
  TEST-TAKING<br>
  TIMER</font></strong></font></div>
<div align="center"> <font size="2" face="Arial, Helvetica, sans-serif"> <img src="../../timer/pics/timerDetails2.jpg" width="171" height="142"></font>
    <p align="left"><strong><font size="4">THE SILENT TIMER&trade;</font></strong><font size="4"><strong> is
          the <em>only</em> timer made specifically for your test: </strong></font></p>
</div>
<table width="73%"  border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="6%"><font size="4"><img src="check.jpg" width="16" height="16"></font></td>
    <td width="94%"><font size="4"><strong> Counts time up or down</strong></font></td>
  </tr>
  <tr>
    <td><font size="4"><img src="check.jpg" width="16" height="16"></font></td>
    <td><font size="4"><strong>Calculates amount of time available per question</strong></font></td>
  </tr>
  <tr>
    <td><font size="4"><img src="check.jpg" width="16" height="16"></font></td>
    <td><font size="4"><strong> Alerts with a red, flashing light instead of
          an audible signal</strong></font></td>
  </tr>
  <tr>
    <td><font size="4"><img src="check.jpg" width="16" height="16"></font></td>
    <td><font size="4"><strong>Improves pacing and answering speed!</strong></font></td>
  </tr>
</table>
<hr>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="15%"><div align="center"><img src="Front_Logo_01.jpg" width="132" height="85"></div></td>
    <td><div align="center"><strong><font size="4">1- Go to <a href="http://www.silenttimer.com/">www.SilentTimer.com</a><br>
        2- Enter Promotion Code: <font size="3" face="Arial, Helvetica, sans-serif"><u><strong><? echo $PromotionCode; ?></strong></u></font> </font></strong><font size="4"><font size="2" face="Times New Roman, Times, serif">(exp.
        <? echo $ExpirationDate; ?>) </font><strong><br>
        3- Save 20% off your entire purchase! </strong></font></div></td>
    <td width="15%"><div align="center"><img src="percent.jpg" width="92" height="92"></div></td>
  </tr>
</table>
<hr>
<p align="center"><font size="5"><strong>Please take one and save online! 
</strong></font></p>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#EBEBEB">
  <tr align="center" valign="middle">
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="website2.jpg" width="43" height="165"><br>
          <font size="2">Promo Code: </font><br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="website2.jpg" width="43" height="165"><br>
          <font size="2">Promo Code: </font><br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="website2.jpg" width="43" height="165"><br>
          <font size="2">Promo Code: </font><br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="website2.jpg" width="43" height="165"><br>
          <font size="2">Promo Code: <br>
        </font>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="website2.jpg" width="43" height="165"><br>
          <font size="2">Promo Code: </font><br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="website2.jpg" width="43" height="165"><br>
          <font size="2">Promo Code: </font><br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="website2.jpg" width="43" height="165"><br>
          <font size="2">Promo Code: </font><br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="website2.jpg" width="43" height="165"><br>
          <font size="2">Promo Code: </font><br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="website2.jpg" width="43" height="165"><br>
          <font size="2">Promo Code: </font><br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="website2.jpg" width="43" height="165"><br>
          <font size="2">Promo Code: </font><br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
  </tr>
</table>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

}
?>
