<?
//security for page
session_start();

$PageTitle = "Use The Silent Timer for Your MCAT Practice";

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
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../../../order/index.php?t=MCAT">MCAT 
  Timer</a> | <a href="mcat_practice_test.php">MCAT Practice Tests</a> | &nbsp;<a href="../../../testhome/mcat.php">MCAT 
  Test</a></strong></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>MCAT &amp; <font face="Times New Roman, Times, serif">THE
         SILENT TIMER<font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></font></strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">One of the hardest aspects 
  of the MCAT test is the lack of time allowed to answer questions. There is no 
  real trick to beat your <a href="index.php"> MCAT test</a>, only hard work, 
  a LOT of practice and dedication will get you the score you deserve. Although, 
  you will significantly increase your score by knowing the test inside and out 
  and understanding which question types are easy or difficult for you. Having 
  this security, coupled with the right <em><strong>time efficiency</strong></em> 
  will allow you to finish your MCAT in time to bubble all of your answers.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">It is extremely important
    to understand how the MCAT works; this will save you on test day. You want
    to make sure and get all the easy questions correct because you know they
    are a given to increase your score. And, if you aren't in the 90th percentile
    of MCAT takers, maybe you shouldn't attempt to answer the really difficult
    questions if it is taking too much time and you will most likely miss them
    anyway. It might be best to make an educated guess. Why try and answer a
  question that only 5 percent of test takers will correctly answer?</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The MCAT does not penalize
    for incorrect answers, but it is still important that you spend your time
    wisely. Spending a long time on hard questions just uses up time you could
    spend on the easy questions. Use timed practice tests to help you gauge how
    well you are doing on time and help condition yourself to what exam day will
    be like. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Very important in your quest 
  for MCAT enlightenment is <font color="#000000"><strong><em>time management</em></strong></font>. 
  While practicing for your test, always time yourself as if you are in the actual 
  test. If you don't take this step, you will not train your brain to answer questions 
  fast enough. And, if you do <font color="#000000">NOT</font> answer your questions 
  quick enough, you will not finish the test. You can guess how your MCAT score 
  might be affected.</font></p>
<p><font color="#000066" size="2" face="Times New Roman, Times, serif"><strong>THE 
  SILENT TIMER<font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></strong></font><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
  </font></strong><font size="2" face="Arial, Helvetica, sans-serif">is a timer 
  that will help you learn not to spend too much time on any one question. It 
  lets you know how much time on average you have to answer each question. And 
  based on how quickly you are answering questions, it recalculates the amount 
  of time you have on future questions. And it is perfectly SILENT! **</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">In order to avoid the traps
     of difficult question types, always be aware of how much time you have spent
     on your current question. If you notice you have spent too much time, then
    your  time will be better used going on to other questions and returning
    to the difficult  one later.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.SilentTimer.com">Order 
  your <font color="#000066" face="Times New Roman, Times, serif">SILENT TIMER<font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></font> 
  today</a>, and get an edge on your competition.**</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><b><i>We also have silenced digital
    watches on our web site. </i></b></font></p>
<p>&nbsp;</p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><em>** The MCAT  
    disallows the use of desktop timers in the test room, and instead prefers analog
        watches.</em></font></p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>