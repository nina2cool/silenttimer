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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>GRE &amp; <font face="Times New Roman, Times, serif">THE 
  SILENT TIMER<font face="Arial, Helvetica, sans-serif">&#8482;</font></font></strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The Silent Timer will help
     you practice your timing on the GRE. Obviously getting the answers correct
    is important, but that doesn't matter if you cannot answer the questions
    on time!</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Timing is especially important
    on the GRE computer-adapted test. When taking the test on the computer, the
    screen only shows one question at a time, and you have to answer that question
    because you cannot come back to it later. Taking too long in the beginning
    of the GRE will use up time you will need later on.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Using The Silent Timer
    in practice is essential in helping you learn the time constraints you will
    face on test day. Even though you cannot bring your silent timer into the
    test, you will at least have had months of practice with it, so on test day
    - you don't even need it!</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Let The Silent Timer help
    you perform your best on the GRE. After all, your graduate school career
    depends partly on this test. No pressure, though, right?</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/product.php">Buy The Silent Timer today
    and start improving your time! </a></font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>