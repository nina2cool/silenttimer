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

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

?> 
<p><font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Sales Tax Reports</strong></font> 
</p>
<p>&nbsp;</p>
<form name="form" method="post" action="viewsalestax.php">
                
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
    <tr> 
      <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td width="10%" rowspan="2" align="center" valign="middle"> <div align="center"> 
                <label> 
                <input type="checkbox" name="chkTime" value="time">
                </label>
              </div></td>
            <td width="20%"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong>Time 
              Period </strong></font></strong></td>
            <td width="18%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">From</font></strong></td>
            <td width="52%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">To</font></strong></td>
          </tr>
          <tr> 
            <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="cboTime" id="cboTime">
                <option value="all" selected>All</option>
                <option value="today">Today</option>
                <option value="week">Week</option>
                <option value="month">Month</option>
                <option value="year">Year</option>
                <option value="other">Enter Time</option>
              </select>
              </font></td>
            <td align="left" valign="top"> <input name="txtFromDate" type="text" id="txtFromDate" size="10"></td>
            <td align="left" valign="top"> <input name="txtToDate" type="text" id="txtToDate" size="10"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td><input type="submit" name="Submit" value="Get Report"></td>
    </tr>
  </table>
              </form>

				
				
				
				
				
				<p align="left">&nbsp;</p>
				<p align="left">&nbsp;</p>
				<p align="left">&nbsp;</p>
				<p align="left">&nbsp;</p>



<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

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
mysql_close($link);
?>