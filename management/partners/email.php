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

	$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$AffID'";
	$result = mysql_query($sql) or die("Cannot retrieve affiliate info, please try again.");

	while($row = mysql_fetch_array($result))
			{
			$FirstName = $row['FirstName'];
			$LastName = $row['LastName'];
			$CheckToName = $row['CheckToName'];
			$CompanyName = $row['CompanyName'];
			$Address = $row['Address'];
			$City = $row['City'];
			$State = $row['State'];
			$ZipCode = $row['ZipCode'];
			//$AffID = $row['AffiliateID'];
			$UserName = $row['UserName'];
			}


			$sql2 = "SELECT Sum(Amount) AS CommPaid
			FROM tblAffiliatePayment WHERE AffiliateID = '$AffID'";
			$result2 = mysql_query($sql2) or die("Cannot total amounts!");
						
			while($row2 = mysql_fetch_array($result2))
			{
				$CommPaid = $row2[CommPaid];
			}
	
	
			$Now = date("F j, Y");

?><title>Affiliate Email</title>

<p><strong><font color="#0000CC" size="2" face="Arial, Helvetica, sans-serif">&nbsp;<? echo $FirstName; ?>,</font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">First of all, Silent Technology
    thanks you for your participation in our affiliate program! Your
    total commissions paid to date is: <strong><font color="#33CC33">$ <? echo number_format($CommPaid,2); ?></font></strong>!</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Secondly,
      the purpose of this email is to update your information and give you some
      tips on how to drive more sales to our site, thereby increasing your commissions. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000CC">To update your profile, follow these steps:</font></strong></font></p>
<ol>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Log in to your account
      at <a href="http://www.silenttimer.com/partner/">http://www.silenttimer.com/partner/</a> using
  your user name (<font color="#FF0000"><strong><? echo $UserName; ?></strong></font>) and password. <em>(If
  you have forgotten or lost your password, respond to this email and I can reset
  it.)</em></font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Click on the link on
  the left &quot;Update Profile&quot;.</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Make any changes, and
  press &quot;Update&quot; at the bottom.</font></li>
</ol>
<p><font size="2" face="Arial, Helvetica, sans-serif">Email me if you have questions about this process.<em> If for some reason, you
  would like to cancel your account, please let me know and I can take care of
  it.</em></font></p>
<p><font color="#0000CC" size="2" face="Arial, Helvetica, sans-serif"><strong>Tips to Increase Sales:</strong></font></p>
<ol>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Verify that  the links
      to our web site have your affiliate code (<font color="#FF0000"><strong><? echo $AffID; ?></strong></font>)
      in the URL. Example: <a href="http://www.silenttimer.com/index.php?a=<? echo $AffID; ?>">http://www.silenttimer.com/index.php?a=<? echo $AffID; ?></a><br>
  </font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Place these links in
      visible locations or high traffic areas. Remember, we also have graphic
      banners and text ads for you to choose from. You can find these on the
      partner web site (see log in information above).<br>
  </font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Place links in various
      locations on your site, not just one page. This will increase the possibility
      of it being seen. <br>
  </font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">It also might be a good
      idea to have a page devoted to time management. Time management is one
      of the hardest aspects of tests for some students. You can discuss the
      importance of taking practice tests under timed conditions. Suggest our
      timer as a resource to help students improve their timing. Don't forget
      to remind students to check with their exam board about using it on test
      day, as some tests won't allow it (such as MCAT, GMAT, and GRE). The Silent
      Timer is still a great practice tool, to get students used to the time
      pressures on the day of the exam.</font></li>
</ol>
<p><font size="2" face="Arial, Helvetica, sans-serif">If you have any questions
    about the program or need more advice on how to increase your commissions,
    just let us know! I will be happy to help you out in any way I can!</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Thank you,</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Christina McMillan</font></p>



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