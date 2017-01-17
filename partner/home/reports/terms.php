<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../../include/url.php";

$PageTitle = "Silent Timer Partner - Definitions";

//security check
If (session_is_registered('a'))
{

// has database username and password, so don't need to put it in the page.
require "../../../include/dbinfo.php";

// has top header in it.
require "../../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	//get name of person/company	
	$aID = $_SESSION['a'];
	
	#connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			
		
	$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$aID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
			
	while($row = mysql_fetch_array($result))
	{
		$CompanyName = $row[CompanyName];
		$Rate = $row[Rate];
	}

	mysql_close($link);
?>

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Reporting 
  Definitions</strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td width="71%" align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="1"></a>Total 
        Clicks</font><br>
        </strong>This is the total number of times (this reporting period) people 
        have clicked through from your site to ours. The higher this number is, 
        the more people are coming to us from you.</font></p>
      <p>&nbsp;</p>
      <p><font size="3" face="Arial, Helvetica, sans-serif"><strong><a name="2"></a>Total 
        # of Sales</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
        This is the total number of products (this reporting period) your visitors 
        have bought from us. If this number is 10, then you have sold 10 timers 
        though your account during this reporting period.</font></p>
      <p>&nbsp;</p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="3"></a>Sale/Click 
        Ratio</font></strong><br>
        This number is your <em>Total # of Sales divided by your Total Clicks</em>. 
        It lets you know how often a visitor from your site actually buys a product 
        when they click through to us.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">If this ratio is low, 
        that means that many students click through but are not purchasing the 
        timer. Try explaining time management and the timer more thoroughly on 
        your site before sending your students to us.</font></p>
      <p>&nbsp;</p>
      <p><font size="3" face="Arial, Helvetica, sans-serif"><strong><a name="4"></a>Total 
        Sales</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
        This number is equal to the total amount of sales your site has generated.
        If you have sold 20 timers this reporting period, then this number might
        be ($29.95 * 20) $599.00. This number does not include tax or shipping. </font></p>
      <p>&nbsp;</p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="5"></a> 
        Commission on Sales </font></strong><br>
        This is the total number of sales times your commission rate. If your
         commission rate is $5 per sale, and you  sold 20 timers, your
        commission would be $100. Your commission rate may also be a percentage
        of the order subtotal (timers, books, batteries, etc) without shipping
        and tax. </font></p>
      <p>&nbsp;</p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="8" id="8"></a>Total
              Returns </font></strong><br>
The Total Returns reflects how many returns and/or cancelled orders occurred
during the reporting period. The number is the total amount of the returns (not
including shipping or tax).
</font></p>
      <p>&nbsp;</p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="9" id="9"></a>Commission
              on Returns </font></strong><br>
This is the amount of commissions you would have earned on the return transactions,
if they had not been returns or cancelled. Returned and cancelled orders are
not valid for earning commission. </font></p>
      <p>&nbsp;</p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="10" id="10"></a>Final
              Commission </font></strong><br>
This is the amount of valid commissions you earned. The number is derived by
subtracting the Commission on Returns from Commission on Sales. For example,
if you earned $200 in commission, but had $10 in returns, your total earned is
$190. </font></p>
      <p>&nbsp;</p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3">Closing 
        Date</font></strong><br>
        Your closing date is the last date in a pay period. This is the day we 
        cut off sales for the current period to calculate your total commissions 
        and send you a check. It is usually the last day in each month.</font></p>
      <p>&nbsp;</p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3">Date 
        Sent</font></strong><br>
        This is the date we actually sent your check to you; it went in the mail 
        on this day. Remember that you only get a check if your account has $25 
        or more in it.</font></p>
      <p>&nbsp;</p>
    </td>
    <td width="29%" align="left" valign="top" bgcolor="#FFFFCC"> <table width="100%" border="0" cellspacing="6" cellpadding="0">
        <tr> 
          <td><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">Sales 
            and Activity</font></strong></td>
        </tr>
        <tr> 
          <td align="right" bgcolor="#000000"><img src=../../../pics/transparent-pixel.gif width=1 height=1 vspace=0 hspace=0></td>
        </tr>
        <tr> 
          <td align="left" valign="top"> <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="index.php"><strong>&gt; 
              Current Pay Period</strong></a><strong><br>
              <a href="previous.php">&gt; Search Previous Pay Periods</a></strong></font><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><br>
              <a href="payments.php"><font size="2">&gt; Payment History</font></a></font></strong></p>
            <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><a href="terms.php"><font size="2">&gt; 
              Definitions</font></a></font></strong></p></td>
        </tr>
      </table></td>
  </tr>
</table>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";

// finishes security for page
}
else
{
	$http .= "partner";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>
