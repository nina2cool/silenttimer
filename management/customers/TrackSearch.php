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
?> <font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Search for a 
Customer's Tracking Information</strong></font> 
<form name="form" method="post" action="TrackView2.php">
                
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
    <tr> 
      <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td width="10%" rowspan="2" align="center" valign="middle"> <div align="center"> 
                <label> 
                <input name="radioSelection" type="radio" value="time">
                </label>
              </div></td>
            <td width="20%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Time
              Period </font></strong></td>
            <td width="18%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">From</font></strong></td>
            <td width="52%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">To</font></strong></td>
          </tr>
          <tr> 
            <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="cboTime" id="cboTime">
                <option value="all">All</option>
                <option value="today">Today</option>
                <option value="week">Week</option>
                <option value="month">Month</option>
                <option value="year">Year</option>
                <option value="other" selected>Enter Time</option>
              </select>
              </font></td>
            <td align="left" valign="top"> <input name="txtFromDate" type="text" id="txtFromDate" size="10"></td>
            <td align="left" valign="top"> <input name="txtToDate" type="text" id="txtToDate" size="10"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td width="10%" rowspan="2" align="center" valign="middle"> <div align="center"> 
                <label> 
                <input type="radio" name="radioSelection" value="trackingnumber">
                </label>
              </div></td>
            <td width="90%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Tracking
              Number </font></strong></td>
          </tr>
          <tr> 
            <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="txtTrackingNumber" type="text" id="txtTrackingNumber">
              </font></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="chkfirstname" type="checkbox" id="chkfirstname" value="y">
              </font></strong></td>
            <td width="41%"><strong><font size="2" face="Arial, Helvetica, sans-serif">First 
              Name</font></strong></td>
            <td width="7%" rowspan="2"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chklastname" type="checkbox" id="chklastname" value="y">
                </font></strong></div></td>
            <td width="42%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Last 
              Name</font></strong></td>
          </tr>
          <tr> 
            <td><input name="txtFirstName" type="text" id="txtFirstName" size="20"></td>
            <td><input name="txtLastName" type="text" id="txtLastName" size="20"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td><input type="submit" name="Submit" value="Search"></td>
    </tr>
  </table>
</form>

			  
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.

require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
