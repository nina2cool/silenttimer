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


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	$custID = $_SESSION['custID'];
	$CustomerID = $custID;
	
	
	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");		
	
	$sql = "SELECT DATE_FORMAT(EndDate, '%m/%d/%y') AS EndDate FROM tblPromotionCode WHERE PromotionCodeID = '$CustomerID' AND Type = 'friend'";
	$result = mysql_query($sql) or die("Cannot get promo code end date");
	
	while($row = mysql_fetch_array($result))
	{
		$EndDate = $row[EndDate];
	}
	

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


?><title>Referral Rebate Form</title>
			<table width="650" height="802"  border="0" align="center" cellpadding="5" cellspacing="0">
              <tr>
                <td height="400"><table width="100%"  border="0" cellspacing="2" cellpadding="5">
                  <tr>
                    <td colspan="2" bgcolor="#FFFFCC"><div align="center"><font size="4" face="Times New Roman, Times, serif"><strong><u>Get
                            a 5% off  your in-store purchase!</u></strong></font></div>
                        <div align="center"><font size="2" face="Times New Roman, Times, serif"><em> </em></font></div></td>
                    <td><div align="right"><font size="2" face="Times New Roman, Times, serif"><em><img src="../images/Logo.jpg" width="73" height="47"></em></font><font size="1" face="Times New Roman, Times, serif"><em>Promotion
                            Code: <? echo $CustomerID; ?></em></font></div></td>
                  </tr>
                  <tr>
                    <td colspan="3" valign="bottom"><p align="center"><strong><font size="4"><em>2
                              Ways to Save! </em></font></strong><font size="3"><em>Buy
                              in the store or online at SilentTimer.com</em></font></p></td>
                  </tr>
                  <tr valign="top">
                    <td width="65%"><p><font size="3" face="Times New Roman, Times, serif"><strong><u><font size="2">In
                                order to receive your rebate check for in-store
                                purchases: </font></u></strong></font></p>
                        <ol>
                          <li><font size="2" face="Times New Roman, Times, serif">Buy
                              The Silent Timer&#8482; at a retail store near
                              you. (http://www.silenttimer.com/locations.php)</font></li>
                          <li><font size="2" face="Times New Roman, Times, serif"> Copy
                              your receipt, &amp; cut out the UPC symbol from the
                              box.</font></li>
                          <li><font size="2" face="Times New Roman, Times, serif"> Mail
                              UPC symbol, completed form, and photocopy of receipt
                              to: <strong>Silent
                              Technology LLC, ATTN: Rebates, 9111 Jollyville
                              Road, Suite 245, Austin, TX 78759.<br>
                              <br>
                              </strong></font><font size="2" face="Times New Roman, Times, serif">Please
                            print legibly.<strong> Must be postmarked by <? echo $EndDate; ?>.</strong></font></li>
                      </ol>
                    </td>
                    <td colspan="2"><p align="left"><font size="3" face="Times New Roman, Times, serif"><u><font size="2"><strong>You
                                can also receive 5% off online:</strong></font></u></font></p>
                        <p align="left"><font size="2" face="Times New Roman, Times, serif">Go
                            to <strong>SilentTimer.com</strong> and enter &quot;<strong><? echo $CustomerID; ?></strong>&quot; as
                            your promotion code. You will receive 5% off of your
                            entire order.</font></p>
                        <p align="left"><font size="2" face="Times New Roman, Times, serif">We also offer
                            silent watches and study books online.</font></p>
                        <p align="center"><font size="2" face="Times New Roman, Times, serif"><strong>Discount
                    expires <? echo $EndDate; ?>.</strong></font></p></td>
                  </tr>
                </table>
                  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
                  <tr>
                    <td><p align="left"><font size="3" face="Times New Roman, Times, serif">Name:___________________________________________________________________</font></p>
                        <p><font size="3" face="Times New Roman, Times, serif">Address:_________________________________________________________________</font></p>
                        <p><font size="3" face="Times New Roman, Times, serif">City,
                            State Zip:_____________________________________________________________</font></p>
                        <p><font size="3" face="Times New Roman, Times, serif">Email:__________________________________</font> <font size="3" face="Times New Roman, Times, serif">Test
                            (<em>circle</em>):</font><font size="2" face="Times New Roman, Times, serif"> LSAT | MCAT | SAT | ACT | OTHER</font> </p>
                    </td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="400"><table width="100%"  border="0" cellspacing="2" cellpadding="5">
                  <tr>
                    <td colspan="2" bgcolor="#FFFFCC"><div align="center"><font size="4" face="Times New Roman, Times, serif"><strong><u>Get
                            a 5% off your in-store purchase!</u></strong></font></div>
                        <div align="center"><font size="2" face="Times New Roman, Times, serif"><em> </em></font></div></td>
                    <td><div align="right"><font size="2" face="Times New Roman, Times, serif"><em><img src="../images/Logo.jpg" width="73" height="47"></em></font><font size="1" face="Times New Roman, Times, serif"><em>Promotion
                            Code: <? echo $CustomerID; ?></em></font></div></td>
                  </tr>
                  <tr>
                    <td colspan="3" valign="bottom"><p align="center"><strong><font size="4"><em>2
                              Ways to Save! </em></font></strong><font size="3"><em>Buy
                              in the store or online at SilentTimer.com</em></font></p></td>
                  </tr>
                  <tr valign="top">
                    <td width="65%"><p><font size="3" face="Times New Roman, Times, serif"><strong><u><font size="2">In
                                order to receive your rebate check for in-store
                                purchases: </font></u></strong></font></p>
                        <ol>
                          <li><font size="2" face="Times New Roman, Times, serif">Buy
                              The Silent Timer&#8482; at a retail store near
                          you.                               (http://www.silenttimer.com/locations.php)</font></li>
                          <li><font size="2" face="Times New Roman, Times, serif"> Copy
                              your receipt, &amp; cut out the UPC symbol from
                              the box.</font></li>
                          <li><font size="2" face="Times New Roman, Times, serif"> Mail
                              UPC symbol, completed form, and photocopy of receipt
                              to: <strong>Silent Technology LLC, ATTN: Rebates,
                              9111 Jollyville Road, Suite 245, Austin, TX 78759.<br>
                                        <br>
                                        </strong></font><font size="2" face="Times New Roman, Times, serif">Please
                                        print legibly.<strong> Must be postmarked
                                        by <? echo $EndDate; ?>.</strong></font></li>
                      </ol></td>
                    <td colspan="2"><p align="left"><font size="3" face="Times New Roman, Times, serif"><u><font size="2"><strong>You
                                can also receive 5% off online:</strong></font></u></font></p>
                        <p align="left"><font size="2" face="Times New Roman, Times, serif">Go
                            to <strong>SilentTimer.com</strong> and enter &quot;<strong><? echo $CustomerID; ?></strong>&quot; as
                            your promotion code. You will receive 5% off of your
                            entire order.</font></p>
                        <p align="left"><font size="2" face="Times New Roman, Times, serif">We
                            also offer silent watches and study books online.</font></p>
                        <p align="center"><font size="2" face="Times New Roman, Times, serif"><strong>Discount
                              expires <? echo $EndDate; ?>.</strong></font></p></td>
                  </tr>
                </table>
                <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
                    <tr>
                      <td><p align="left"><font size="3" face="Times New Roman, Times, serif">Name:___________________________________________________________________</font></p>
                          <p><font size="3" face="Times New Roman, Times, serif">Address:_________________________________________________________________</font></p>
                          <p><font size="3" face="Times New Roman, Times, serif">City,
                              State Zip:_____________________________________________________________</font></p>
                          <p><font size="3" face="Times New Roman, Times, serif">Email:__________________________________</font> <font size="3" face="Times New Roman, Times, serif">Test
                              (<em>circle</em>):</font><font size="2" face="Times New Roman, Times, serif"> LSAT
                              | MCAT | SAT | ACT | OTHER</font> </p></td>
                    </tr>
                  </table></td>
              </tr>
</table>
			<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// finishes security for page
}
else
{
?>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customerservice/test_index.php'>
<?
}
?>