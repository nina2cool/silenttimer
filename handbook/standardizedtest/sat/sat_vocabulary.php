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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>SAT Vocabulary</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">To help improve your score 
  for the SAT verbal section, expand your vocabulary. A large part of this section 
  will be spent trying to discern meanings of uncommon words as a definition as 
  well as in context. It would be very frustrating to arrive at the test to find 
  out the most difficult questions for you were vocabulary words that you could 
  have easily learned prior to the exam.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">- <em><strong>Utilize study 
  aids</strong></em>. Many study aids are available for you to help you broaden 
  your SAT vocabulary, such as <a href="http://www.soundkeepers.com/SAT" target="_blank">flashcards</a> 
  with words that tend to appear on the SAT test often along with many software 
  programs and books like <a href="http://www.target.com/gp/detail.html/602-8399338-3481400?asin=0764525468" target="_blank"><em>SAT 
  Vocabulary for Dummies</em></a>. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">- <em><strong>Learn from 
  your mistakes</strong></em>. Write down words you weren&#8217;t familiar with 
  when taking practice SAT tests and learn them.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">- <em><strong>Read</strong></em><strong><em>!</em></strong> 
  Reading a broad range of books, newspapers, and magazines is also important 
  to familiarizing yourself with new vocabulary words for the SAT.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Check out these sites for 
  daily practice with new vocabulary words:<br>
  <a href="http://www.sheppardsoftware.com/web_games_vocab.htm" target="_blank"><br>
  Free Vocabulary Web Games</a><br>
  <a href="http://www.nytimes.com/learning/students/wordofday/" target="_blank">NY 
  Times Word of the Day</a><br>
  <a href="http://education.yahoo.com/college/wotd/" target="_blank">Peterson's 
  Word of the Day</a><br>
  <a href="http://www.vocabtest.com/" target="_blank">Interactive SAT Vocabulary 
  Quiz</a></font></p>
<p>&nbsp;</p>
<p> 
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
