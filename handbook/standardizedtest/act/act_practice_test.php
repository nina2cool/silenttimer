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
<em>Handbook</em></font></strong></font><font size="2"> 
</font> 
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>ACT&reg; Practice 
  Tests</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Practice makes perfect. 
  What better way to study for the ACT test than to take an ACT practice test? 
  Can&#8217;t go wrong there. Included in your registration packet should be a 
  free booklet, <em>Preparing for the ACT Assessment</em>. Take the practice test 
  inside as well as the <a href="http://www.actstudent.org/sampletest/" target="_blank">sample 
  test questions here</a>. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Another book to look at 
  is <a href="http://www.amazon.com/exec/obidos/redirect?link_code=ur2&tag=thesilenttime-20&camp=1789&creative=9325&path=http%3A//www.amazon.com/gp/product/0156005352/qid=1134410791/sr=1-1/ref=sr_1_1?s=books%26v=glance%26n=283155" target="_blank">Getting 
  Into the ACT</a>, which is written by ACT. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Many of the prep courses 
  offer ACT practice tests as well. <a href="act_test_prep.php">Learn more about 
  ACT prep courses</a>.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Lastly, sample booklets 
  are $5 each and can be ordered from the <a href="http://www.act.org/store/index.html" target="_blank">ACT 
  store</a> by phone at 1-800-498-6065.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>ACT Practice Test 
  Links</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"> <a href="http://www.kaptest.com/repository/templates/LevMInitDroplet.jhtml?_levMParent=/www/KapTest/docs/repository/content/College/Learn_About_the_Tests/ACT" target="_blank">Kaplan 
  ACT Practice Lab</a><br>
  <a href="http://www.kaptest.com/repository/templates/ArticleInitDroplet.jhtml?_relPath=/repository/content/College/Learn_About_the_Tests/ACT/CO_aboutact_practiceACT.html" target="_blank">Kaplan 
  Practice ACT Test<br>
  </a><a href="http://www.kaplanpracticetest.com/index.cfm?client=3427088539856990060857303.41083292&p=201&layout_cookie=1&td=1" target="_blank">Kaplan 
  Practice Test Site</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.act-test.org/" target="_blank">ACT 
  Practice Test Site</a><br>
  <br>
  <a href="http://www.actstudent.org/sampletest/" target="_blank">Official ACT 
  Test Site Prep Questions</a><br>
  <br>
  <a href="http://www.learnatest.com/LearningExpressLibrary/Home.cfm?CFID=&CFTOKEN=&Refresh=1&HR=http://www.owatonna.lib.mn.us" target="_blank">Online 
  Practice tests &amp; tutorials with immediate answer advice</a><br>
  <br>
  <strong>ACT Books<br>
  <br>
  </strong><a href="http://www.amazon.com/exec/obidos/redirect?link_code=ur2&tag=thesilenttime-20&camp=1789&creative=9325&path=http%3A//www.amazon.com/gp/product/0375764542/qid=1134411064/sr=2-1/ref=pd_bbs_b_2_1?s=books%26v=glance%26n=283155" target="_blank">Cracking 
  the ACT</a></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
  <a href="http://www.amazon.com/exec/obidos/tg/detail/-/0743260414/qid=1131477194/sr=2-2/ref=pd_bbs_b_2_2/102-8098379-8668904?v=glance&s=books" target="_blank">Kaplan 
  &#8211; with 4 full length practice tests</a><br>
  </font></p>
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
                  