<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Marketing
      Campaigns</strong></font></p>
<p>&nbsp;</p>
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr bgcolor="#FFFFCC">
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Campaign
            Index </font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Date(s)</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Description</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">For Whom? </font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Files Used </font></strong></div></td>
  </tr>
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="2006-10-31/index.php">Index</a></font></div></td>
    <td><p><font size="2" face="Arial, Helvetica, sans-serif">Oct. 31 - Nov. 1, 2006 </font></p>
    </td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Postcard for LSAT students - describes 3 options (combo, watch, test
      day timer) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Princeton Review,
    Kaplan, and Other Select Test Prep Companies (same people as last
    campaign) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">LSAT Postcard 2006-10-30_FRONT.ai<br>
    LSAT Postcard 2006-10-30_4BACK.ai</font></td>
  </tr>
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="2006-08-01/index.php">Index</a></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">August 9-11, 2006<br>
      (mail
        on August 11) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Annoucing The Silent
        Timer Bonus Combo (includes letter and flier)</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Princeton Review,
    Kaplan, and Other Select Test Prep Companies </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Letter-2006-08-01<br>
    Flier printed separately</font></td>
  </tr>
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="2006-04-10/index.php">Index</a></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">April 11 - 12, 2006 </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Sending rebate info
        and 2 for 1 timer deal</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Princeton Review &amp; Kaplan</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Letter-2006-04-10-Kaplan<br>
    Letter-2006-04-10-TPR </font></td>
  </tr>
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="2006-01-15/index.php">Index</a></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">January 2006 </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Intro letter and fliers
        for 10% off </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Princeton Review</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Letter-2006-01-15</font></td>
  </tr>
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="2005-09-13/index.php">Index</a></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Sept 13, 2005 </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Letter to new B&amp;N
        store managers </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">New BN Store managers </font></td>
    <td><p><font size="2" face="Arial, Helvetica, sans-serif">Letter-2005-09-13</font></p></td>
  </tr>
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="2005-09-07/index.php">Index</a></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Sept 7, 2005 </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Telling about being
        in the new B&amp;N stores </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Princeton Review &amp; Kaplan </font></td>
    <td><p><font size="2" face="Arial, Helvetica, sans-serif">Letter-2005-09-07<br>
      Also a flier (from Word doc) </font></p></td>
  </tr>
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Index</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Aug 2005 </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Letter to Borders
        Managers </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Borders managers </font></td>
    <td><p><font size="2" face="Arial, Helvetica, sans-serif">Letters to Borders
          Managers 8-16-05.doc</font></p></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"></font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="left">&nbsp;</p>

  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
mysql_close($link);


// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";
// has links that show up at the bottom in it - found in home management folder
require "../../include/footerlinks.php";



// finishes security for page
}
else
{
?>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>