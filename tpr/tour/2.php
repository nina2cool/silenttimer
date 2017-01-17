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
        Two</font><font size="2"><br>
        </font></strong></font><font size="3" face="Arial, Helvetica, sans-serif"><strong>Receive 
        cool stuff from us!</strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">After you sign up 
        for an account, we will contact your office to complete the sign up process 
        and let you know how everything works.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">We will then send 
        you two demo timers for your office to use and show in class. In your 
        welcome packet, you will also receive details for how you can get timers 
        for your students.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Please let us know 
        if you have any questions, or have any suggestions that will make ordering 
        timers easier for your office or students. You are the test preparation 
        experts, and we would like to make it as simple as possible for you and 
        your students to work with us.</font></p>
      <p>&nbsp;</p>
      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
          <td width="50%"><font size="4" face="Arial, Helvetica, sans-serif"><a href="index.php">&lt; 
            Previous</a></font></td>
          <td width="50%">
<div align="right"><font size="4" face="Arial, Helvetica, sans-serif"> <a href="3.php">Next 
              &gt;</a></font></div></td>
        </tr>
      </table> </td>
  </tr>
</table>
<p>&nbsp;</p>
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
