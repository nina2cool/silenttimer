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

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";
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


?><title>Friend Referral Program</title>
			<table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFCC">
              <tr>
                <td><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><em><font color="#000000" size="4">Friend
                        Referral Program</font></em><strong><br>
Step 1: How the program works</strong></font></td>
                <td><div align="right"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="test_Referral_Emails.php">Step 2: Sending Emails</a> </font></strong></div></td>
              </tr>
            </table>
			<p><font size="2"><strong><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif">Get
            Your Order for FREE! </font></strong></font></p>
			<p><font size="2" face="Arial, Helvetica, sans-serif">Refer others. Make 5 sales. Get your purchase absolutely free*!</font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif">To qualify
                for this &ldquo;free purchase offer&rdquo; just
            follow these easy steps:</font></p>
            <table width="100%"  border="1" cellpadding="8" cellspacing="0" bordercolor="#CCCCCC">
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif"><img src="../images/checkbox-check.jpg" width="50" height="50"></font></td>
                <td><font color="#FF0000" size="5" face="Arial, Helvetica, sans-serif"><strong>1</strong></font></td>
                <td><font size="2" face="Arial, Helvetica, sans-serif">Make a
                purchase of $24.95 or more at www.SilentTimer.com.</font></td>
              </tr>
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif"><img src="../images/checkbox.jpg" width="50" height="50"></font></td>
                <td><strong><font color="#FF0000" size="5" face="Arial, Helvetica, sans-serif">2</font></strong></td>
                <td><p><font size="2" face="Arial, Helvetica, sans-serif">Refer
                      The Silent Timer&trade; and our other products to others.
                      We make it easy for you to refer your friends with e-mail
                templates, print-out rebates, and referral suggestions!</font></p>
                <p><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="test_Referral_Emails.php">Step
                    2: Send an email to your friends.</a><br>
                </font><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="test_Referral_Tips.php">Step
                3: Read some Referral Suggestions.</a><br>
                &gt; <a href="test_Referral_Rebates.php">Step 4: Print out in-store
                      rebates.</a><br>
                </font></p>
                </td>
              </tr>
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif"><img src="../images/checkbox.jpg" width="50" height="50"></font></td>
                <td><strong><font color="#FF0000" size="5" face="Arial, Helvetica, sans-serif">3</font></strong></td>
                <td><font size="2" face="Arial, Helvetica, sans-serif">As a perk
                    to your friends, they automatically receive 5%
                off their purchase, whether they purchase online or <a href="test_Referral_Rebates.php">in
                the store</a>. </font><FONT size="2" face=Arial><SPAN class=375342916-25072006>By
                using your&nbsp;</SPAN>referral promotion code<SPAN class=375342916-25072006>,
                they&nbsp;</SPAN>receive the discount,&nbsp;<SPAN class=375342916-25072006>and
                you receive&nbsp;credit for their purchase.</SPAN></FONT></td>
              </tr>
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif"><img src="../images/checkbox.jpg" width="50" height="50"></font></td>
                <td><strong><font color="#FF0000" size="5" face="Arial, Helvetica, sans-serif">4</font></strong></td>
                <td><font size="2" face="Arial, Helvetica, sans-serif"> When
                    five (5) Referrals make a purchase (each totaling $24.95+)<strong>,</strong> you
                    receive a full refund on the product price of your original
                purchase*!</font></td>
              </tr>
            </table>
            <br>
            <p><font size="2" face="Arial, Helvetica, sans-serif"><em>* </em></font><FONT size="2" face=Arial><SPAN class=375342916-25072006><EM>Refund
                    up to $29.95 issued on purchase cost of product only. This
            offer does not include refunds for shipping costs or taxes.</EM></SPAN></FONT></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="#FAQ">Want to learn more? Read below for our FAQ.</a></font></p>
            <p>&nbsp;</p>
            <hr>
            <p>&nbsp;</p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"><a name="FAQ"></a><strong><font color="#003399" size="5">Details</font></strong></font></p>
            <table width="100%"  border="0" cellspacing="2" cellpadding="8">
              <tr>
                <td bgcolor="#FFFFCC"><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>1.
                        Who is eligible to participate?</strong></font></p>
                </td>
              </tr>
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif">Our <em>free
                      purchase offer</em> is only available to those purchasing
                      products from <a href="http://www.silenttimer.com/">www.SilentTimer.com</a>.
                      Customers purchasing our products at retail stores are
                not eligible to participate at this time.<br>
                </font></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif">                    <strong>2. What can I purchase to qualify for the free purchase
                offer?</strong></font></td>
              </tr>
              <tr>
                <td><p><font size="2" face="Arial, Helvetica, sans-serif">To
                      be eligible, you may purchase any of the following products
                      from our website (product price must be $24.95 or greater):</font></p>
                  <ol>
                    <li><font size="2" face="Arial, Helvetica, sans-serif">The
                        Silent Timer&#8482;</font></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif">The
                        Silent Timer&#8482;/Bonus Timer Combo</font></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif">Silent
                        Digital Watch</font></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif"> The
                        Silent Timer&trade; and Silent Digital Watch Combo</font></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif"> MASTER
                        THE LSAT by Nova</font></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif"> Silent
                        Digital Watch and MASTER THE LSAT by Nova</font></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif"> The
                        Silent Timer&#8482; and MASTER THE LSAT by Nova</font></li>
                  </ol>
                  <p><font size="2" face="Arial, Helvetica, sans-serif">Each
                item listed above is considered &quot;one&quot; product (even
                the combos).<br>
                <br>
                </font></p></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong>3.
                What happens once I make my purchase?</strong></font></td>
              </tr>
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif">At this
                    point, you will receive a referral promotional code that
                    should be used by your referrals when they make a purchase.
                    This promotional code will allow them to receive <strong><em>5%
                    off</em></strong> their purchase and will give you credit
                toward your <strong><em>free purchase.<br>
                </em></strong></font></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong>4.
                When I refer someone, do they have to order online? </strong></font></td>
              </tr>
              <tr>
                <td><p><font size="2" face="Arial, Helvetica, sans-serif">No.
                      Your referrals may purchase online OR at a participating
                      retail store. Either way, they will receive a 5% discount,
                      and you will receive credit for the purchase. If they are
                      purchasing at a retail store, however, they must follow
                      the instructions found on the &ldquo;<a href="test_Referral_Rebates.php">print-out
                      retail rebates</a>&quot;.</font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                <br>
                </font></p>
                </td>
              </tr>
              <tr>
                <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong>5.
                What counts as a credit toward my free purchase?</strong></font></td>
              </tr>
              <tr>
                <td><p><font size="2" face="Arial, Helvetica, sans-serif">  Each of the following items purchased by your referrals counts as <strong>ONE</strong> credit
  toward your free purchase:</font></p>
                  <ol>
                    <li><font size="2" face="Arial, Helvetica, sans-serif">The
                        Silent Timer&#8482;</font></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif">The
                        Silent Timer&#8482;/Bonus Timer Combo</font></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif">Silent
                        Digital Watch</font></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif"> The
                        Silent Timer&trade; and Silent Digital Watch Combo</font></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif"> MASTER
                        THE LSAT by Nova</font></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif"> Silent
                        Digital Watch and MASTER THE LSAT by Nova</font></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif"> The
                        Silent Timer&#8482; and MASTER THE LSAT by Nova</font></li>
                  </ol>
                  <ul>
                    <li><FONT face=Arial size=2><SPAN class=375342916-25072006>Any
                              product returned by your referrals does not count
                          as a valid credit toward this offer.</SPAN></FONT></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif">All
                        purchases must be made before your referral promotion
                        code expires. For mail-in rebates, the rebate must be
                        postmarked by the promotion code expiration date. <br>
                    <br>
                    </font></li>
                </ul></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong>6.
                When and how do I get paid? </strong></font></td>
              </tr>
              <tr>
                <td><DIV>
                  <p><FONT size=2 face="Arial">After you receive 5 credits, you
                      will be issued a check for the product price of your original
                      order<SPAN class=375342916-25072006> (up to $29.95)</SPAN>.&nbsp;<BR>
                        <SPAN class=375342916-25072006>If your&nbsp;original
                        purchase total exceeds $29.95, only $29.95 will be refunded.</SPAN></FONT></p>
                  </DIV>
                  <DIV><FONT size=2 face="Arial, Helvetica, sans-serif"><EM><SPAN 
class=375342916-25072006>*</SPAN>This offer does not include refunds on shipping
                        costs&nbsp;<SPAN class=375342916-25072006>or</SPAN> taxes.
                        Only the cost of the product<SPAN class=375342916-25072006> (up
                        to $29.95)</SPAN>&nbsp;minus any discounts that were </EM></FONT><font size="2" face="Arial, Helvetica, sans-serif"><em>given
                        when purchased. </em></font><font size="2" face="Arial, Helvetica, sans-serif"><em><br>
                            <br>
                  </em></font></DIV>                  
                </td>
              </tr>
              <tr>
                <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong>7.
                When does my referral promotional code expire? </strong></font></td>
              </tr>
              <tr>
                <td><p><font size="2" face="Arial, Helvetica, sans-serif">Your unique
                      code (<? echo $CustomerID; ?>) is active <strong>90 days</strong> from
                      the day of YOUR online purchase.</font></p>
                  <p><font size="2" face="Arial, Helvetica, sans-serif">Your promotion code expiration date is <? echo $EndDate; ?>.</font></p>
                  <p><font size="2" face="Arial, Helvetica, sans-serif">After
                        this date, it can no longer be used. Purchases made using
                        inactive promo codes will NOT be eligible for a 5% discount
                        and will NOT count as credit toward your purchase refund.
                        Mail-in rebates must be submitted by the promotion code
                        expiration date. <br>
                      </font></p></td>
              </tr>
            </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;            </p>
            <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/test_sidemenu.php";

// finishes security for page
}
else
{
?>
</p>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customerservice/test_index.php'>
<?
}
?>