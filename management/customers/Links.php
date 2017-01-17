<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>More
Customer Links</strong></font></p>
<hr>
<table width="100%"  border="0" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="links/RegView.php?test=1">LSAT
          Reg.</a> | <a href="links/RegView.php?test=2">MCAT Reg.</a> | <a href="links/RegView.php?test=5">GRE
          Reg.</a> | <a href="links/RegView.php?test=4">GMAT Reg.</a> | <a href="links/RegView.php?test=3">SAT
    Reg.</a> | <a href="links/RegView.php?test=6">ACT Reg.</a> | <a href="links/RegLinkReport.php">Link Report</a> </font></td>
  </tr>
  <tr>
    <td><a href="links/CustomerLoginView.php"><font size="2" face="Arial, Helvetica, sans-serif">Logins</font></a></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="links/Refer.php">Email
        Referrals</a></font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="links/FriendSales.php">Friend
          Referral Sales</a></font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="links/YesNoIndex.php">Yes/No Statistics</a></font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><a href="<? echo $http; ?>customers/CancelTestOrder.php"><font size="2" face="Arial, Helvetica, sans-serif">Cancel
    Test Order </font></a>| <a href="<? echo $http; ?>customers/TableBuilder.php" target="_blank"><font size="2" face="Arial, Helvetica, sans-serif">Table
    Builder </font></a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>customers/links/TimerInterestView.php">Timer
          Interest Emails</a></font></span> | <font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>customers/links/WatchInterestView.php">Watch
          Interest Emails</a> | <a href="links/TimerInterestView_2006-01-23.php">Timer
          1/22/06</a> | <a href="links/WatchInterestView_2006-01-23.php">Watch
          1/22/06</a> </font></td>
  </tr>
  <tr>
    <td><a href="links/Preorder.php"><font size="2" face="Arial, Helvetica, sans-serif">Preorders</font></a></td>
  </tr>
  <tr>
    <td><a href="links/stats.php"><font size="2" face="Arial, Helvetica, sans-serif">Order
    Stats</font></a></td>
  </tr>
  <tr>
    <td><a href="links/Emails_30day.php"><font size="2" face="Arial, Helvetica, sans-serif">30-Day
          Customers</font></a><font size="2" face="Arial, Helvetica, sans-serif"> |
          <a href="links/Emails_Oct.php">Since Oct 1 Customers</a></font></td>
  </tr>
</table>
<hr>

<p>&nbsp;</p>
<p></p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		//mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>

<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>