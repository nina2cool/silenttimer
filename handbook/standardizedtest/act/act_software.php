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
<em>Handbook</em></font></strong></font> <font size="2"></p> 
</font> 
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>ACT Software</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Thanks to technology, preparing 
  for the ACT test has become somewhat easier in recent years. Not only are there 
  books to help you study, but now there&#8217;s software as well. ACTive Prep&#8482; 
  was designed to help train students to take the ACT, understand their scores 
  and identify areas that need improvement. It is no longer available directly 
  through the ACT website, but is still sold on <a href="http://www.amazon.com/exec/obidos/tg/detail/-/1560090383/qid=1131479732/sr=8-1/ref=sr_8_xs_ap_i1_xgl14/102-8098379-8668904?v=glance&s=books&n=507846" target="_blank">Amazon.com</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The ACT software includes 
  four virtual college students who guide the student through timed practice tests, 
  test-taking approaches, a personalized test preparation program, etc. Who needs 
  an ACT preparation course when students can easily be coached through taking 
  the ACT at home on their own time? </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">To order the ACT software, 
  ACTive Prep&#8482;, <a href="http://www.amazon.com/exec/obidos/tg/detail/-/1560090383/qid=1131479732/sr=8-1/ref=sr_8_xs_ap_i1_xgl14/102-8098379-8668904?v=glance&s=books&n=507846" target="_blank">visit 
  Amazon today</a>. OR, register for <a href="http://www.actstudent.org/onlineprep/index.html" target="_blank">ACT's 
  Official online preparation program.</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Many of the preparation 
  courses offer ACT software as well. <a href="act_test_prep.php">Learn more about 
  those courses here</a>.<br>
  </font></p>
<p> 
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
                  