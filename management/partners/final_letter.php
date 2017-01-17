<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	//grab variables to get purchase info from DB.
	$AffID = $_GET['affiliate'];

	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


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
	
	$Now = date("F d, Y");

	$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$AffID'";
	//echo $sql;
	$result = mysql_query($sql) or die("Cannot retrieve affiliate info, please try again.");

	while($row = mysql_fetch_array($result))
			{
			$FirstName = $row[FirstName];
			$LastName = $row[LastName];
			$CheckToName = $row[CheckToName];
			$CompanyName = $row[CompanyName];
			$Address = $row[Address];
			$City = $row[City];
			$State = $row[State];
			$ZipCode = $row[ZipCode];
			//$AffID = $row[AffiliateID];
			$UserName = $row[UserName];
			}


			$sql2 = "SELECT Sum(Amount) AS CommPaid
			FROM tblAffiliatePayment WHERE AffiliateID = '$AffID'";
			$result2 = mysql_query($sql2) or die("Cannot total amounts!");
						
			while($row2 = mysql_fetch_array($result2))
			{
				$CommPaid = $row2[CommPaid];
			}
	
	
			$Now = date("F j, Y");

?><title>Affiliate Final Letter</title>

<hr noshade>
<table width="650" border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td width="22%"><font size="2" face="Arial, Helvetica, sans-serif"><img src="images/Front_Logo_01.jpg" width="96" height="61"></font></td>
    <td width="39%"><div align="left"><font size="4" face="Arial, Helvetica, sans-serif"><strong><font size="2">Silent
              Technology LLC<br>
        </font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $CAddress; ?> <?php echo $CAddress2; ?><br>
        <?php echo $CCity; ?>, <?php echo $CState; ?> <?php echo $CZipCode; ?><br>
        Office: <?php echo $CPhone; ?><br>
        Fax: <?php echo $CFax; ?></font></div></td>
    <td width="39%"><font size="6" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
</table>
<hr noshade>
<p>&nbsp;</p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Now; ?></font></p>
<p>&nbsp;</p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?><br>
  <? echo "$FirstName $LastName"; ?><br>

  <? echo $Address; ?><br>
<? if($Address2 <> "") {
		?>
  <? echo $Address2; ?><br>
  <?
		}
		?>
<? echo $City; ?>, <? echo $State; ?> <? echo $ZipCode; ?></font> </p>
<p>&nbsp;</p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Dear <? echo $FirstName; ?>,</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">First of all, Silent Technology
    thanks you for your participation in our affiliate program! Your
    total commissions paid to date is: <font color="#000000"><b>$ <? echo number_format($CommPaid,2); ?></b>!</font></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Secondly, there has been
    no activity on your account for at least 6 months. We are to assume that
    you are no longer an active member of  our affiliate program.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Therefore, this is the
    final check that closes out your account.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Your participation thus
    far is much appreciated, and should you wish to re-activate your account,
    please let us know.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Thank you,</font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Christina McMillan<br>
  Silent Technology LLC</font>
  <?
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