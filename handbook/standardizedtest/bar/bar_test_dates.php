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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>BAR Exam Test Dates</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Boards usually expect to hear from 
  candidates during their final year of law school, so your last year is no time 
  to &#8220;ease up a bit.&#8221; It is highly recommended that you contact the 
  board of bar examiners in the <a href="http://www.abanet.org/legaled/baradmissions/barcont.html" target="_blank">jurisdiction 
  where you hope to practice</a>.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The MBE is offered at the end of 
  February and July, however more students tend to take the July examination since 
  it&#8217;s soon after graduation. Therefore you should either register early 
  for the summer BAR exam or take the test in February when not as many people 
  are taking it.</font></p>
<p><br>
  <font size="3" face="Arial, Helvetica, sans-serif"><strong>To find the test 
  dates, choose your state's BAR exam URL from the <a href="http://silenttimer.com/handbook/standardizedtest/bar/bar_exam_list.php">List 
  of State BAR Exams</a>.</strong></font></p>
<p>&nbsp;</p>
			
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>