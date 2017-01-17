<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has database username and password, so don't need to put it in the page.
require "../../../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
		

	$State = $_GET['state'];

		
# link to Database...
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database2");			


$sql9 = "SELECT * FROM tblEmployee WHERE EmployeeID = '10'";
	$result9 = mysql_query($sql9) or die("Cannot retrieve company info, please try again.");
	
		while($row9 = mysql_fetch_array($result9))
				{
				$CAddress = $row9['Address'];
				$CAddress2 = $row9['Address2'];
				$CCity = $row9['City'];
				$CState = $row9['State'];
				$CZipCode = $row9['ZipCode'];
				$CPhone = $row9['CellPhone'];
				$CFax = $row9['Fax'];
				$CEmail = $row9['Email'];
				}
		
		
		$Today = date("F j, Y");
	
		
				
	$sql = "SELECT * FROM tblBusinessCustomer WHERE State = '$State' AND CustomerType = 'Test Prep' AND Status = 'active' AND Chain = 'Princeton Review'";
	//echo $sql;
	$result = mysql_query($sql) or die("Cannot retrieve affiliate info, please try again.");

		while($row = mysql_fetch_array($result))
			{
			
?><title>Letter and Flier</title> 
<STYLE>
@media print { DIV.PAGEBREAK {page-break-before: always}}
</STYLE>

<?					

			
			
			$Name = $row['Name'];
			$Chain = $row['Chain'];
			$FirstName = $row['ContactFirstName'];
			$LastName = $row['ContactLastName'];
			$Address = $row['Address'];
			$Address2 = $row['Address2'];
			$Address3 = $row['Address3'];
			$City = $row['City'];
			$State = $row['State'];
			$StateOther = $row['StateOther'];
			$ZipCode = $row['ZipCode'];
			$Email = $row['Email'];
			$TypeID = $row['Type'];
			$Phone = $row['Phone'];
			$Email = $row['Email'];
			$CountryID = $row['CountryID'];
			$CheckStore = $row['CheckStore'];
			$zipOne = $row[ZipCode];
			$PromotionCode = $row[PromotionCodeID];
	
	
	
				$sql2 = "SELECT DATE_FORMAT(EndDate, '%m/%d/%y') AS EndDate2 FROM tblPromotionCode WHERE PromotionCodeID = '$PromotionCode'";
				//echo $sql2;
				$result2 = mysql_query($sql2) or die("Cannot retrieve PromotionCodeID info, please try again.");
			
				while($row2 = mysql_fetch_array($result2))
				{
				$ExpirationDate = $row2['EndDate2'];
				}#end of Promotion Code loop

	
?>

<hr noshade>
<table width="650" border="0" cellpadding="5" cellspacing="0">
  <tr> 
    <td width="28%"><font size="4" face="Arial, Helvetica, sans-serif"><strong><font size="2">Silent
          Technology LLC</font><br>
    </strong></font><font size="2" face="Arial, Helvetica, sans-serif">9111 Jollyville
    Road<br>
    Suite 245 <br>
    Austin, TX 78759</font></td>
    <td width="37%"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><img src="../../images/Front_Logo_01.jpg" width="96" height="61"></font></div></td>
    <td width="39%"><font size="6" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
</table>
<hr noshade>
<p>&nbsp;</p>
<p><br>
</p>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr valign="top">
    <td><div align="left"><font size="2" face="Times New Roman, Times, serif"><font size="3">The
            Princeton Review           <br>
        ATTN: Center Director
        <br>
        <?
	  if($Address2 == '' AND $Address3 == '')
	  {
	  ?>
        <? echo $Address; ?> <br>
        <?
	  }
	  elseif($Address3 == '')
	  {
	  ?>
        <? echo $Address; ?><br>
    </font></font> <font size="3" face="Times New Roman, Times, serif"><? echo $Address2; ?><br>
    <?
	  }
	  else
	  {
	  ?>
    <? echo $Address; ?><br>
    </font> <font size="3" face="Times New Roman, Times, serif"><? echo $Address2; ?><br>
    </font> <? echo $Address3; ?><br>
    <?
	  }
	  ?>
    <? echo $City; ?>, <? echo $State; ?> <font size="3" face="Times New Roman, Times, serif"><? echo $ZipCode; ?></font> </div></td>
    <td valign="bottom"><div align="right"><font size="3" face="Times New Roman, Times, serif"><? echo $Today; ?></font></div></td>
  </tr>
</table>
<font size="3" face="Times New Roman, Times, serif"></font>
<p><font size="3" face="Times New Roman, Times, serif"> <br>
Dear Center Director:</font></p>
<p> <font size="3" face="Times New Roman, Times, serif">I would like to introduce
    you to The Silent Timer&trade;, a timer designed
  specifically for the standardized tests taught at your office. It is equipped
  with key features to help your students better manage their exam time. The
  advantage of this product is that it is silent and helps students develop the
pacing strategy they will learn in your test prep classes.</font></p>
<p><font size="3" face="Times New Roman, Times, serif">Hopefully you have already
    seen The Silent Timer&trade; used by some of your
  students. The concept has spread to many test prep centers, and our timers
  are now available at over 400 retail stores nationwide. Some of these stores
are near you! (see Store List included in this package) </font></p>
<p><font size="3" face="Times New Roman, Times, serif">For a better idea of how the Timer works, I encourage you to look over the
  attached product features page. You can also visit <a href="http://www.silenttimer.com/">www.SilentTimer.com</a> and
  test out our online demo. We are confident that you will see how these unique
features can benefit your students. </font></p>
<p><font size="3" face="Times New Roman, Times, serif"><strong><em> &nbsp;</em>Spread the word to your Students </strong></font></p>
<p><font size="3" face="Times New Roman, Times, serif">We hope you will help your students by simply informing them of an alternative
  to de-beeping watches/other timers. We are not asking that you sell or endorse
  our product; we just want students to know that they now have a new, better
  option for managing time during their test. </font></p>
<p><font size="3" face="Times New Roman, Times, serif">In this package, I have
    included a promotional flyer that you can make copies of, if necessary. With
    your promotion code of <? echo $PromotionCode; ?>, your students will receive
    20% off their online purchase (valid until <? echo $ExpirationDate; ?>). Please give them the
    chance to take advantage of this offer by posting the fliers at your office.</font></p>
<p><font size="3" face="Times New Roman, Times, serif"><strong> &nbsp;</strong>Please feel free to contact me with any questions
  at 512-340-0338. I hope to speak with you soon.</font></p>
<p><font size="3" face="Times New Roman, Times, serif">Sincerely,<br>
    <img width="236" height="54" src="../../images/Dina.jpg"><br>
</font>
  <font size="3" face="Times New Roman, Times, serif">
  <?
if($Address2 == '')
{
?>
  <br>
Dina Kushner<br>
Marketing Director, Silent Technology LLC </font></p>
<font size="3" face="Times New Roman, Times, serif">
<?
}
else
{
?>
<br>
Dina Kushner, Marketing Director
 
for
Silent Technology LLC </p>
<?
}
?>


<DIV CLASS="PAGEBREAK"></DIV>


<?
/*
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
		
*/

?>



<div align="center"><font size="10"><strong><font face="Arial, Helvetica, sans-serif"><u>SILENT</u>,<br>
  TEST-TAKING<br>
  TIMER</font></strong></font></div>
<div align="center"> <font size="2" face="Arial, Helvetica, sans-serif"> <img src="../../../../timer/pics/timerDetails2.jpg" width="171" height="142"></font>
    <p align="left"><strong><font size="4">THE SILENT TIMER&trade;</font></strong><font size="4"><strong> is
          the <em>only</em> timer made specifically for your test: </strong></font></p>
</div>
<table width="73%"  border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="6%"><font size="4"><img src="../../images/check.jpg" width="16" height="16"></font></td>
    <td width="94%"><font size="4"><strong> Counts time up or down</strong></font></td>
  </tr>
  <tr>
    <td><font size="4"><img src="../../images/check.jpg" width="16" height="16"></font></td>
    <td><font size="4"><strong>Calculates amount of time available per question</strong></font></td>
  </tr>
  <tr>
    <td><font size="4"><img src="../../images/check.jpg" width="16" height="16"></font></td>
    <td><font size="4"><strong> Alerts with a red, flashing light instead of
          an audible signal</strong></font></td>
  </tr>
  <tr>
    <td><font size="4"><img src="../../images/check.jpg" width="16" height="16"></font></td>
    <td><font size="4"><strong>Improves pacing and answering speed!</strong></font></td>
  </tr>
</table>
<hr>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="20%"><div align="center"><img src="../../images/Front_Logo_01.jpg" width="148" height="96"></div></td>
    <td><div align="center"><strong><font size="4">1- Go to <a href="http://www.silenttimer.com/">www.SilentTimer.com</a><br>
        2- Enter Promotion Code: </font><font size="3" face="Arial, Helvetica, sans-serif"><u><strong><font size="4"><? echo $PromotionCode; ?></font></strong></u></font><font size="4"> (exp.
        <? echo $ExpirationDate; ?>) <br>
        3- Save 20% off your entire purchase! </font></strong></div></td>
    <td width="20%"><div align="center"><img src="../../images/percent.jpg" width="100" height="100"></div></td>
  </tr>
</table>
<hr>
<p align="center"><font size="5"><strong>Please take one and save online! <br>
</strong></font></p>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#EBEBEB">
  <tr align="center" valign="middle">
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="../../images/website2.jpg" width="43" height="165"><br>
        Promo<br>
        Code: <br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="../../images/website2.jpg" width="43" height="165"><br>
        Promo<br>
        Code: <br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="../../images/website2.jpg" width="43" height="165"><br>
        Promo<br>
        Code: <br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="../../images/website2.jpg" width="43" height="165"><br>
        Promo<br>
        Code: <br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="../../images/website2.jpg" width="43" height="165"><br>
        Promo<br>
        Code: <br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="../../images/website2.jpg" width="43" height="165"><br>
        Promo<br>
        Code: <br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="../../images/website2.jpg" width="43" height="165"><br>
        Promo<br>
        Code: <br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="../../images/website2.jpg" width="43" height="165"><br>
        Promo<br>
        Code: <br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="../../images/website2.jpg" width="43" height="165"><br>
        Promo<br>
        Code: <br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
    <td><div style="border-width:1px; border-left-style:dashed; border-right-style:dashed; border-color:#EBEBEB" align="center"><font size="3" face="Arial, Helvetica, sans-serif"><img src="../../images/website2.jpg" width="43" height="165"><br>
        Promo<br>
        Code: <br>
        <strong><font size="4"><? echo $PromotionCode; ?></font></strong><u><strong></strong></u> </font></div></td>
  </tr>
</table>



<?



}#end of businesscustomer loop



// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

}
?>
