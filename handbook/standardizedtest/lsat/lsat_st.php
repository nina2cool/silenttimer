<?
//security for page
session_start();

$PageTitle = "Use The Silent Timer on your LSAT";

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
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="<? echo $https;?>product.php?t=LSAT">LSAT 
  Timer</a> | <a href="lsat_practice.php">LSAT Practice</a> | <a href="lsat_prep.php">LSAT 
  Score</a></strong></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>LSAT &amp; <font face="Times New Roman, Times, serif">THE 
  SILENT TIMER</font><font color="#000000" size="4" face="Arial, Helvetica, sans-serif">&#8482;</font></strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The hardest aspect of the 
  LSAT is the strict time limit. The trick to conquering the LSAT is not related 
  to what grades you made in college, or even prior knowledge you acquired before 
  test day. No, the trick to the LSAT is knowing the test inside and out and understanding 
  which question types are easy or difficult for you. This will help you better 
  manage your test time for optimal performance.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Time management is key in 
  raising your score. While practicing for your test, always time yourself as 
  if you are in the actual test. By doing this, you will train your brain to answer 
  questions at a steady pace. As your timing improves, you will be able to answer 
  more questions. Since LSAT scores are based on the number of questions answered 
  correctly, answering as many questions as possible can be very beneficial to 
  your score. </font></p>
<p><font color="#000066" size="2" face="Times New Roman, Times, serif"><strong>THE 
  SILENT TIMER</strong></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>&#8482;</strong></font><font size="2" face="Arial, Helvetica, sans-serif">is 
  a timer that will help you learn not to spend too much time on any one question. 
  It lets you know how much time on average you have to answer each question. 
  And based on how quickly you are answering questions, it recalculates the amount 
  of time you have on future questions. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">With this innovative study 
  tool, you will be more prepared for beating the test's time limit. </font><font color="#000066" size="2" face="Times New Roman, Times, serif"><strong>THE 
  SILENT TIMER</strong></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>&#8482;</strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
  will train you to move steadily through your exam and avoid being trapped on 
  difficult questions that can cost you valuable test time. </font></p>
<p align="center">&nbsp;</p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="../../../timer/demo.php">Try 
  an online demo of <strong><font color="#000066" face="Times New Roman, Times, serif">THE 
  SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></strong>.</a></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif"><a href="<? echo $https;?>product.php">Order 
  your Silent Timer today. </a></font></p>
                  <p>&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>