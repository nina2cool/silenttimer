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
	
	

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


?><title>Friend Referral Program - Step 4: Referral Rebates</title>
			<table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFCC">
              <tr>
                <td><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><em><font color="#000000" size="4">Friend
                        Referral Program</font></em><strong><br>
      Step 4: Print In-Store Rebates </strong></font></td>
                <td><div align="right">
                    <p><strong><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="Referral_Tips.php">Step
                  3: Referral Tips</a></font></strong></p>
                    <p><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="Referral_History.php">Step
                            5: Track My Referral Sales </a></font></strong></p>
                </div></td>
              </tr>
            </table>
			<p><font color="#33CC33" size="4" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000">Help
                  your friends out, spread the word, and get your purchase for
            free!</font></strong></font><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"></font></p>
			<p><font size="2" face="Arial, Helvetica, sans-serif">Your friends can also make their qualifying purchases by buying The Silent
  Timer&#8482; at a local bookstore.</font></p>
			<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt;
			        </strong><a href="http://www.silenttimer.com/location_search.php" target="_blank"><strong>Find
			        bookstores near you and/or your friends</strong></a> <em>(opens
			        new window) </em></font></p>
			<p><font size="2" face="Arial, Helvetica, sans-serif">Click below to download
    a printable form that you can pass out to your friends to let them know your
    promotion code. <em>(This will open a new window) </em></font></p>
<table width="100%"  border="0" cellspacing="0" cellpadding="8">
  <tr>
    <td valign="middle" bgcolor="#FFFFCC"><div align="center">
      <p><font size="2" face="Arial, Helvetica, sans-serif">Click below:</font></p>
      <form name="form1" method="post" action="Referral_RebateForm.php" target="_blank">
        <input name="Print" type="submit" id="Print" value="PRINT REBATE FORM">
      </form>
      </div></td>
  </tr>
</table>
<p><strong><font size="3" face="Arial, Helvetica, sans-serif">Printing Guidelines for In-Store rebates:</font></strong></p>
<ul>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Adjust your page settings to have 0.5 inch margins on each side</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Use the &quot;Print Preview&quot; option to make sure both rebates appear on one
    sheet.</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Firefox users: use Internet Explorer if you are having trouble setting
    the margins. </font></li>
</ul>
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
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
</p>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customerservice/index.php'>
<?
}
?>