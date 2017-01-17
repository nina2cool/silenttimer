<?
//security for page
session_start();
//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

// has http variable in it to populate links on page.
require "../../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
			
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><font size="3">The 
  Princeton Review<font color="#000000"> Partner Program</font></font><font color="#000000"><br>
  <em><font size="3">Quick Tour</font></em></font></strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
  <tr> 
    <td align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr> 
          <td width="50%"><font size="4" face="Arial, Helvetica, sans-serif"><a href="index.php">&lt; 
            Previous</a></font></td>
          <td width="50%"> <div align="right"><font size="4" face="Arial, Helvetica, sans-serif"> 
              <a href="3.php">Next &gt;</a></font></div></td>
        </tr>
      </table> 
      <p><font size="4" face="Arial, Helvetica, sans-serif"><strong><font size="5">Step 
        Three</font><font size="2"><br>
        </font></strong></font><font size="3" face="Arial, Helvetica, sans-serif"><strong>Let 
        your teachers and students know how to order <font face="Times New Roman, Times, serif">THE 
        SILENT TIMER</font>&#8482;</strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">In your welcome packet, 
        you will receive copies of handouts you may give your teachers and students. 
        A great place to put the fliers for your students is in their Test Manual 
        they receive the first day of class. </font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Here's how 
        your students get a timer delivered to your office.</strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Tell your students 
        to go to our order page at <a href="http://www.SilentTimer.com/order/" target="_blank">http://www.SilentTimer.com/order/</a>. 
        On the order form, there is a blank for them to enter your office code. 
        Your office code must be entered so we know that they want the timer delivered 
        to your office.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><img src="pics/order.jpg" width="541" height="151"></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Students purchase 
        their timer online through our secure order form. After we have received 
        all of your students' orders, we send all of their timers to your office. 
        With the box of timers you get a list of who will be picking their timer 
        up. You also receive a check from us with a commission for each timer 
        that you sold.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Students now come 
        and pick up their timer from your office. We provide a very easy way to 
        track which students have picked up timers, and which have not. Click 
        next below to find out how to track your students' sales.</font></p>
      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td width="50%"><font size="4" face="Arial, Helvetica, sans-serif"><a href="2.php">&lt; 
            Previous</a></font></td>
          <td width="50%">
<div align="right"><font size="4" face="Arial, Helvetica, sans-serif"> <a href="4.php">Next 
              &gt;</a></font></div></td>
        </tr>
      </table> </td>
  </tr>
</table>
<p>&nbsp;</p>
<p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>
</p>
