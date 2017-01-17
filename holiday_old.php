<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> 
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Office &amp; Shipping Schedule</strong></font></p>
<p>Normal shipping days are Monday through Friday. The dates highlighted in yellow on the calendar indicate the days when our office will be closed and shipments will not be going out.  If you place an order on a yellow day, it will be shipped the next business day. Limited access to email may be available during these times.</p>
<table width="100%" border="0" cellpadding="1" cellspacing="0">
  <tr> 
    <td width="73%" align="left" valign="top"> 
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Our office
            will be closed and we will not be shipping on the following days in 2008:</strong></font></p>
      <ul>
        <li> <font size="2" face="Arial, Helvetica, sans-serif">Tuesday,         January 1 - New Year's Day </font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"> Monday,         January 21 - Martin Luther King Jr's Birthday </font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"> Monday,         February 18 - Washington's         Birthday (President's Day) </font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"> Monday,         May 26 - Memorial Day </font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"> Friday,         July 4 - Independence Day </font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"> Monday,         September 1 - Labor Day </font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"> Monday,         October 13 - Columbus Day </font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"> Tuesday,         November 11 - Veterans Day </font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"> Thursday,         November 27 - Thanksgiving Day</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Friday, November 28</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Wednesday, December 24 </font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Thursday,         December 25 - Christmas Day</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Friday, December 26</font></li>
        <li> <font size="2" face="Arial, Helvetica, sans-serif"><span a0c="13" java.lang.object="">Thursday,         January 1, 2009</span><span a0c="14" java.lang.object=""> - New Year's Day</span></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Friday, January 2, 2009</font></li>
      </ul>      
      <p><font size="2" face="Arial, Helvetica, sans-serif">If you need immediate assistance, please email us at <a href="mailto:info@silenttimer.com">info@silenttimer.com</a>.
      We will be available via email.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"> Ground shipments
          may be delayed due to increased holiday packages.</font></p>
      <table width="100%" border="0" bordercolor="#FFFFCC">
        <tr>
          <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">If
                you have questions when we are closed, please <a href="mailto:info@silenttimer.com">email</a> us.
                We will have access to email messages during this timeframe.</font></div></td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </td>
    <td width="27%" align="left" valign="top"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="8">
        <tr>
          <td><div align="center"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/product.php"><img src="gallery/pics/small/army-02.jpg" alt="The Silent Timer" width="200" height="150" border="0"></a><br>
              </font><font size="2" face="Arial, Helvetica, sans-serif"><em><strong>Success
              is just a matter of time! </strong></em></font></div></td>
        </tr>
      </table>
      <p align="center">&nbsp;</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>