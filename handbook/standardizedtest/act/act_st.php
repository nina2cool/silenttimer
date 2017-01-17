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
?> <font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font size="4" face="Times New Roman, Times, serif"><font size="2">THE 
SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></font><font color="#000000" size="2"> 
<em>Handbook</em></font></strong></font> 
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>ACT&reg; &amp; <font face="Times New Roman, Times, serif">THE 
  SILENT TIMER</font><font color="#000000" size="4" face="Arial, Helvetica, sans-serif">&#8482;</font></strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The hardest aspect of the 
  ACT test is the strict time limit. The trick to conquering the <a href="index.php">ACT 
  test</a> is not related to what grades you made in high school, or even prior
  knowledge you acquired before test day. No, the trick to the ACT test is knowing
  the test inside and out and understanding which question types are easy or
  difficult for you. This will help you better manage your test time for optimal
  performance.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Time management is key in 
  raising your score. While practicing for your test, always time yourself as 
  if you are in the actual test. By doing this, you will train your brain to answer 
  questions at a steady pace. As your timing improves, you will be able to answer 
  more questions. Since ACT test scores are based on the number of questions answered 
  correctly, answering every question can be very beneficial to your ACT score. 
  </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">In order to avoid the traps 
  of difficult question types, always be aware of how much time you have spent 
  on your current question. If you notice you have spent too much time, then your 
  time will be better used going on to other questions and returning to the difficult 
  ones later. </font></p>
<p><font color="#000066" size="2" face="Times New Roman, Times, serif"><strong>THE 
  SILENT TIMER</strong></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>&#8482;</strong></font><font size="2" face="Arial, Helvetica, sans-serif">is 
  a timer that will help you learn not to spend too much time on any one question. 
  It lets you know how much time on average you have to answer each question. 
  And based on how quickly you are answering questions, it recalculates the amount 
  of time you have on future questions. By practicing with this innovative study 
  tool, you can work on improving your pacing before you even step foot in the 
  test room. Remember, &quot;Success is Just a Matter of Time....&quot;</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.SilentTimer.com">Order 
  Your <font color="#000066" face="Times New Roman, Times, serif">SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>&#8482;</strong></font> 
  Today</a>.</font></p>
<p><br>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
