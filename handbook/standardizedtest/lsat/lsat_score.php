<?
//security for page
session_start();

$PageTitle = "Use The Silent Timer to help raise your LSAT score";

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
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="lsat_prep.php">LSAT 
  Score</a> | <a href="lsat_practice_test.php">LSAT Practice Tests</a> | <a href="<? echo $https;?>product.php?t=LSAT">LSAT 
  Timer</a> &nbsp;</strong></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong><font size="5">Your LSAT Score</font></strong></font></p>
                  
<p><font size="2" face="Arial, Helvetica, sans-serif">Ah, what the LSAT really 
  comes down to&#8212;your <strong><a href="lsat_prep.php">LSAT score</a></strong>. 
  Yes, the unavoidable result of all your hard work and preparation. Make sure 
  you understand the scoring process before you take the exam so you will know 
  how to interpret your score. You don&#8217;t want to be staring at your <strong>LSAT 
  score</strong> with a blank face or scrambling to understand exactly what that 
  161 means when you receive your score&#8212;&#8220;A 161 out of 1600?!. That&#8217;s 
  a terrible SAT score&#8221;&#8212; This isn&#8217;t the SAT or ACT. It&#8217;s 
  probably been at least four years since you took your last entrance exam, so 
  make sure you know a little bit about how the LSAT works.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Your <strong>LSAT score</strong> 
  is based on the number of questions answered correctly and is scored on a scale 
  of 120 to 180, with the median score being a 150. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Along with your <strong>LSAT 
  score</strong>, you will receive a percentile ranking. The average <strong>LSAT 
  score</strong>, a 150, gives you a percentile of approximately 50. A small five 
  point jump can bump you up to a percentile of as much as 20 points. Remember, 
  you can make quite a few errors and still do very well on the test. A competitive 
  score of 160, which would put you in approximately the 83rd percentile, allows 
  you to miss about 28 out of the 101 questions.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Law schools use percentile 
  rank to determine where your score places you in comparison to your competition. 
  More than 50 percent of test takers receive scores between 145 and 159. The 
  difference between the 50th and 75th percentiles is about three extra questions 
  right per section. So, it is important to realize that only a couple questions 
  can push you ahead of most of your competition. The difference between the 90th 
  and 95th percentiles is less than two additional correct answers per section.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Of course, different law 
  schools have different average scores, so check with your desired law schools 
  to determine the approximate LSAT score you need to achieve.</font></p>
                  
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.kaptest.com/repository/templates/ArticleInitDroplet.jhtml?_relPath=/repository/content/Law/Learn_About_the_LSAT/Learn/LS_lsat_scoring.html" target="_blank"><strong>Read 
  more about your LSAT score here.</strong></a></font></p>
                  
<p>&nbsp;</p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links<br>
  <br>
  </font></strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.powerscore.com/lsat/help/scale.htm" target="_blank">The 
  LSAT Scoring Scale Explained</a> </font><font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
  </strong><a href="http://www.studentdoc.com/lsat-scores.html" target="_blank"> 
  Is Your LSAT Score Competitive?</a><br>
  <a href="http://www.lsat-center.com/lsat-page2.html" target="_blank">How law 
  schools use your LSAT scores</a> <br>
  <a href="http://www.4lawschool.com/cancelscore.htm" target="_blank">Should You 
  Cancel Your LSAT Score?</a> </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Additonal Search 
  Help for LSAT Score<br>
  </strong>Click below to search for &quot;LSAT score&quot; in the following search 
  engines: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.google.com/search?hl=en&lr=&ie=UTF-8&oe=UTF-8&q=LSAT%2Bscore" target="_blank">Google</a> 
  | <a href="http://search.msn.com/results.aspx?q=LSAT%2Bscore&FORM=SMCRT" target="_blank">MSN</a> 
  | <a href="http://altavista.com/web/results?q=LSAT%2Bscore&kgs=0&kls=1&avkw=aapt" target="_blank">Altavista</a> 
  | <a href="http://search.yahoo.com/search?p=LSAT%2Bscore&ei=UTF-8&fr=fp-top&n=20&fl=0&x=wrt" target="_blank">Yahoo</a> 
  | <a href="http://search.aol.com/aolcom/search?invocationType=topsearchbox./aolcom/jsp/search.jsp&query=LSAT%2Bscore&x=29&y=14" target="_blank">AOL</a> 
  | <a href="http://web.ask.com/web?q=LSAT%2Bscore&qsrc=1" target="_blank">Ask 
  Jeeves</a></font></p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>