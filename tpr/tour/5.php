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
  <em><font size="3">Quick Tour</font></em></font></strong></font> </p>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
  <tr> 
    <td align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr> 
          <td width="50%"><font size="4" face="Arial, Helvetica, sans-serif"><a href="4.php">&lt; 
            Previous</a></font></td>
          <td width="50%"> <div align="right"><font size="4" face="Arial, Helvetica, sans-serif"> 
              <a href="students.php">Next &gt;</a></font></div></td>
        </tr>
      </table>
      <p><font size="4" face="Arial, Helvetica, sans-serif"><strong><font size="5">Step 
        Five<font size="2"><br>
        Become familiar with your timer site</font></font></strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">While you are logged 
        in to your site, you can:</font></p>
      <ul>
        <li><font size="2" face="Arial, Helvetica, sans-serif"> <a href="students.php">view 
          a list of students who have ordered timers from your office</a></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="students.php">view 
          a list of students who have picked their timer up from your office and 
          when</a></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="deadlines.php">set 
          timer shipment delivery dates (when you want timers shipped to your 
          office for your students)</a></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="fliers.php">download 
          <strong><font face="Times New Roman, Times, serif">SILENT TIMER</font></strong>&#8482; 
          fliers for your office</a></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="reports.php">view 
          reports on how much money your office has made from timer sales</a></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">update your account 
          profile</font></li>
      </ul>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Click any of the above 
        links to find out more, or, click <a href="students.php">next</a> below 
        to go through each feature step by step.</font></p>
      <p>&nbsp;</p>
      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr> 
          <td width="50%"><font size="4" face="Arial, Helvetica, sans-serif"><a href="4.php">&lt; 
            Previous</a></font></td>
          <td width="50%"> <div align="right"><font size="4" face="Arial, Helvetica, sans-serif"> 
              <a href="students.php">Next &gt;</a></font></div></td>
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
