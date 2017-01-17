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
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> <font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Timer Supply</strong></font> 
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">From 
              here you may: view, edit &amp; create supply orders, view Timer 
              shipment details, and enter in orders received.</font></p>
            
<p align="left"><strong><font face="Arial, Helvetica, sans-serif">View Supply 
  Orders </font></strong></p>
<form name="form" method="post" action="viewsupplyorders.php?sort=tblSupplyOrder.DateTime&d=ASC">
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
    <tr> 
      <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td width="10%" rowspan="2" align="center" valign="middle"> <div align="center"> 
                <label> 
                <input name="radioSelection" type="radio" value="time" checked>
                </label>
              </div></td>
            <td width="18%"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong>Time 
              Period </strong></font></strong></td>
            <td width="22%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">From</font></strong></td>
            <td width="50%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">To</font></strong></td>
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
            <td align="left" valign="top"> <SCRIPT LANGUAGE="JavaScript">
						var now = new Date();
						var calendar = new CalendarPopup("calendarDiv");
			  		
</SCRIPT> <input name="txtFromDate" type="text" id="txtFromDate" size="15"> <font size="2" face="Arial, Helvetica, sans-serif"><A HREF="#" onClick="calendar.select(document.forms[0].txtFromDate,'calendarPosition','yyyy-MM-dd'); return false;">Cal</A></font></td>
            <td align="left" valign="top"> <input name="txtToDate" type="text" id="txtToDate" size="15"> 
              <font size="2" face="Arial, Helvetica, sans-serif"><A HREF="#" onClick="calendar.select(document.forms[0].txtToDate,'calendarPosition','yyyy-MM-dd'); return false;">Cal</A><a name="calendarPosition" id="calendarPosition"> 
              </a></font></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="radio" name="radioSelection" value="OrderID">
              </font></strong></td>
            <td width="90%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Supply 
              Order ID</font></strong></td>
          </tr>
          <tr> 
            <td><input name="txtSupplyOrderID" type="text" id="txtPurchaseID2" size="20"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td><input type="submit" name="Submit" value="Get Orders"></td>
    </tr>
  </table>
</form>

			  
<p></p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
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
?>