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
			
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><font size="3">The 
  Princeton Review<font color="#000000"> Partner Program</font></font><font color="#000000"><br>
  <em><font size="3">Quick Tour</font></em></font></strong></font>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
  <tr> 
    <td align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr> 
          <td width="50%"><font size="4" face="Arial, Helvetica, sans-serif"><a href="students.php">&lt; 
            Previous</a></font></td>
          <td width="50%"> <div align="right"><font size="4" face="Arial, Helvetica, sans-serif"> 
              <a href="fliers.php">Next &gt;</a></font></div></td>
        </tr>
      </table>
      <p><font size="4" face="Arial, Helvetica, sans-serif"><strong><font size="5">Create 
        Shipment Dates<font size="2"><br>
        Figure out when you would like to get all of your students' timers to 
        your office, and set it up.</font></font></strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000000"><strong>&gt;</strong> 
        </font>When you log in, click on: &quot;Deadlines&quot;. You can then 
        create, edit, and view shipment dates for timers coming to your office. 
        After each deadline, your students' timers are sent to your office for 
        pick up.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&nbsp;View 
        Shipment Deadlines</strong></font><br>
        <img src="pics/view_deadline.jpg" width="355" height="58"></p>
      <p>&nbsp;<font size="2" face="Arial, Helvetica, sans-serif"><strong>Create 
        New Shipment Deadlines</strong></font><br>
        <img src="pics/add_deadline.jpg" width="348" height="72"></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt;<font size="3"> 
        </font></strong>It is important to create a good shipping date. You want 
        to give all of your students enough time to order before having us ship 
        to you. Once the deadline has past, students from your office can still 
        get a timer, but they will have to pay shipping costs.</font></p>
      <p>&nbsp;</p>
      <p><font size="3" face="Arial, Helvetica, sans-serif"><a href="5.php">&lt; 
        Return to web site list</a><br>
        </font></p>
      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr> 
          <td width="50%"><font size="4" face="Arial, Helvetica, sans-serif"><a href="students.php">&lt; 
            Previous</a></font></td>
          <td width="50%"> <div align="right"><font size="4" face="Arial, Helvetica, sans-serif"> 
              <a href="fliers.php">Next &gt;</a></font></div></td>
        </tr>
      </table></td>
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
