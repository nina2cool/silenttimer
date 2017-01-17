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
          <td width="50%"><font size="4" face="Arial, Helvetica, sans-serif"><a href="5.php">&lt; 
            Previous</a></font></td>
          <td width="50%"> <div align="right"><font size="4" face="Arial, Helvetica, sans-serif"> 
              <a href="deadlines.php">Next &gt;</a></font></div></td>
        </tr>
      </table>
      <p><font size="4" face="Arial, Helvetica, sans-serif"><strong><font size="5">Track 
        Student Timers<font size="2"><br>
        Allow your students to pick up their timers from your office, and track 
        pick-ups easily.</font></font></strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000000"><strong>&gt;</strong> 
        </font>When you log in, you click on: &quot;Student List&quot;. Then you 
        will automatically see a list of all students who will be picking a timer 
        up from your office.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><img src="pics/student_list.jpg" width="637" height="109"></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt;</strong> 
        When the student, in this case &quot;Roger Moore&quot;, comes to pick 
        up their timer, you look their name up on your list, and click their name.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><img src="pics/student_pickup.jpg" width="545" height="243"></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; </strong>When 
        you click their name, a screen pops up which asks you if this person has 
        picked up their timer. Press &quot;Picked Up&quot;.</font></p>
      <p><img src="pics/student_off_list.jpg" width="635" height="83"></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; </strong>After 
        you click &quot;Picked Up&quot;, this person's name disappears from your 
        pick up list. You can also view all of the students who have picked up 
        their timer and what date they picked them up.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><img src="pics/students_pickedup.jpg" width="634" height="165"></font></p>
      <p><font size="3" face="Arial, Helvetica, sans-serif"><a href="5.php">&lt; 
        Return to web site list</a><br>
        </font></p>
      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr> 
          <td width="50%"><font size="4" face="Arial, Helvetica, sans-serif"><a href="5.php">&lt; 
            Previous</a></font></td>
          <td width="50%"> <div align="right"><font size="4" face="Arial, Helvetica, sans-serif"> 
              <a href="deadlines.php">Next &gt;</a></font></div></td>
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
