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
	$Chain = $_GET['chain'];
	
	//echo $Chain;
	

	
	//echo $Link;
	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	?><HEAD>
<TITLE>Letter</TITLE>
<STYLE>
@media print { DIV.PAGEBREAK {page-break-before: always}}
</STYLE>
</HEAD>

<?
	
	
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
				

				
				
	$sql = "SELECT * FROM tblBusinessCustomer WHERE State = '$State' AND Status = 'active' AND AugCampaign = 'y' ORDER BY City ASC";
	//echo "<br>sql = " .$sql;
	$result = mysql_query($sql) or die("Cannot retrieve store info, please try again.");
	
	$Num = mysql_num_rows($result);
	//echo "<br>Number of Kaplans: " .$Num;
	if($Num > 0)
	{
	
	while($row = mysql_fetch_array($result))
			{
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
			$CountryID = $row['Country'];
			$CheckStore = $row['CheckStore'];
			$zipOne = $row[ZipCode];
	
	
	
			if($FirstName == '')
			{
			$FirstName = "Director";
			}
			
			if($Chain == "Kaplan")
			{
			$Chain = "Kaplan Test Prep";
			}
	
		
	$Now = date("F d, Y");
		

	
?><title><? echo $Chain; ?> Letter</title>

<hr noshade>
<table width="650" border="0" cellpadding="5" cellspacing="0">
  <tr> 
    <td width="39%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Silent
          Technology LLC<br>
</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $CAddress; ?> <?php echo $CAddress2; ?><br>
    <?php echo $CCity; ?>, <?php echo $CState; ?> <?php echo $CZipCode; ?><br>
 </font></td>
    <td>&nbsp;</td>
    <td width="39%"><font size="6" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
</table>
<hr noshade>
<p>&nbsp;</p>
<p><br>
  <br>
</p>
<p><font size="3" face="Times New Roman, Times, serif">
	<? if($Chain <> "") { ?><? echo $Chain; ?><br><? } ?>
    <? if($Chain == "") { ?><? echo $Name; ?><br><? } ?>
    <? echo $Address; ?> <br>
    <? if($Address2 <> "") { ?><? echo $Address2; ?><br><? } ?>
	<? echo $City; ?>, <? echo $State; ?> <? echo $ZipCode; ?>
	<? if($CountryID == "CA") { ?><br>Canada<? } ?>
	</font></p>
	
<div align="right"><font size="3" face="Times New Roman, Times, serif">  August 11, 2006 </font>
</div>
<p><font size="3" face="Times New Roman, Times, serif"> Dear Center Director:</font></p>
<p>   New timing products are now available for your students!</p>
<p><strong> Two Timers for the Price of One</strong></p>
<table width="100%"  border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td><div align="center"><strong>The new Silent Timer&trade; LSAT Package = $29.95 + shipping &amp; handling</strong><br>
  *Available at <a href="http://www.silenttimer.com/">www.SilentTimer.com</a> and
  soon at participating Borders Books, eFollett, and Barnes &amp; Noble stores.</div></td>
  </tr>
</table>
<p>Beginning in mid August, The LSAT Silent Timer&trade; will be bundled with a
Bonus Timer at no extra cost. This additional timer is completely silent, counts
up &amp; down, and is simple enough to be used on test day. With this unbeatable
combination, students will be able to improve their pacing skills through practice
with The Silent Timer&trade;, while using the basic timer on their actual exam.
The addition is valuable for students taking tests where multifunctional timers
are not permitted. </p>
<p><strong> Silenced Watch</strong><br>
  We are also offering a silenced watch that is useful for any exam, especially
    for those where desktop timers aren&rsquo;t allowed- SAT, ACT, MCAT, BAR,
etc. The watch is already available on our web site for $24.95.</p>
<p>Please let your students know about these great new offers. If you have any
  questions or are interested in our partner office program, you can contact
  me at (512) 340-0338 or visit us at <a href="http://www.SilentTimer.com">www.SilentTimer.com</a>.</p>
<p>Thank you for working with&nbsp;us to help students increase their test scores!</p>
<p>Sincerely,<font size="3" face="Times New Roman, Times, serif"><br>
  <img width="106" height="70" src="../../images/Eric.jpg"><br>
  </font>
  <font size="3" face="Times New Roman, Times, serif">
  
  
  Eric Trevino <br>
Marketing Director, Silent Technology LLC </font></p>
<font size="3" face="Times New Roman, Times, serif">


<DIV CLASS="PAGEBREAK"></DIV>
<?
}# end of looping through Kaplans
}#end of Num > 0
else
{
echo "No Locations in this state.";
}

// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

// finishes security for page
}
else
{
?>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
