<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../../../include/dbinfo.php";

// has top header in it.
require "../../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../../../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> <strong><font color="#003399" size="4" face="Times New Roman, Times, serif"> 
</font></strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font size="4" face="Times New Roman, Times, serif"><font size="2">THE 
SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></font><font color="#000000" size="2"> 
<em>Handbook</em></font></strong></font> 
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>GMAT &amp; <font face="Times New Roman, Times, serif">THE 
  SILENT TIMER</font>&#8482; </strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Get yourself our</font> 
  <font size="2"><strong><font color="#000066">SILENT TIMER</font><font face="Arial, Helvetica, sans-serif">&#8482; 
  and have an edge on all the other test takers out there!<br>
  <br>
  </font></strong><font face="Arial, Helvetica, sans-serif">Improving your GMAT 
  score is all about practice. More specifically, timed practice. </font><strong><font color="#000066">THE 
  SILENT TIMER</font><font face="Arial, Helvetica, sans-serif">&#8482; </font></strong></font><font size="2" face="Arial, Helvetica, sans-serif">is 
  a timer that will help you learn not to spend too much time on any one question. 
  It lets you know how much time on average you have to answer each question. 
  And based on how quickly you are answering questions, it recalculates the amount 
  of time you have on future questions. The GMAT may be on the computer, but by 
  <em> <strong>practicing</strong></em> with this innovative study tool, you can 
  work on improving your pacing before you even step foot in the test room. Remember, 
  &quot;Success is Just a Matter of Time....&quot;</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Order <strong><font color="#000066" face="Times New Roman, Times, serif">THE 
  SILENT TIMER</font></strong>&#8482; now, and receive our free Time Management 
  Guide to help you on your test.</font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>