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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>SAT Practice Test</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Taking SAT practice tests 
  is crucial for increasing your SAT score. Studying test material without taking 
  several SAT practice tests will not be useful if you can't learn to apply your 
  skills throughout a full-length exam. A full test requires strategy, concentration, 
  and good pacing, all of which can be learned by taking practice tests under 
  <a href="#Test">simulated test conditions</a>. Luckily, there are many resources 
  available for students when it comes to SAT practice tests: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000000">1.</font><font color="#000066"><strong> 
  The <a href="psat.php" target="_blank">PSAT</a></strong></font>- Take advantage 
  of this exam by using it as part of your preparation for the SAT. Make sure 
  you take it seriously.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">2. <font color="#000066"><strong>Visit 
  a bookstore</strong></font>- Go to the nearest Barnes &amp; Nobles or Borders 
  store to purchase books such as <a href="http://www.amazon.com/exec/obidos/redirect?link_code=ur2&tag=thesilenttime-20&camp=1789&creative=9325&path=http%3A//www.amazon.com/gp/product/0874477050/qid=1134409015/sr=8-1/ref=pd_bbs_1?n=507846%26s=books%26v=glance" target="_blank">10 
  Real SATs</a>, <a href="http://www.amazon.com/exec/obidos/redirect?link_code=ur2&tag=thesilenttime-20&camp=1789&creative=9325&path=http%3A//www.amazon.com/gp/product/0375764852/qid=1134410528/sr=2-1/ref=pd_bbs_b_2_1?s=books%26v=glance%26n=283155" target="_blank">Cracking 
  the New SAT</a><img src="http://www.assoc-amazon.com/e/ir?t=thesilenttime-20&amp;l=ur2&amp;o=1" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" /> 
  and <a href="http://www.amazon.com/exec/obidos/redirect?link_code=ur2&tag=thesilenttime-20&camp=1789&creative=9325&path=http%3A%2F%2Fwww.amazon.com%2Fgp%2Fproduct%2F0764123610%2Fqid%3D1134410427%2Fsr%3D8-1%2Fref%3Dpd_bbs_1%3Fn%3D507846%2526s%3Dbooks%2526v%3Dglance">How 
  to Prepare for the New SAT</a>. These books were designed to teach students 
  the skills necessary to take the exam. They include SAT practice tests as well 
  as test-taking tips and techniques. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">3. <strong><font color="#000066">Search 
  the internet. </font></strong>Use the Internet to your advantage. Online SAT 
  practice tests are available on many websites. Visit <a href="http://www.4tests.com/" target="_blank">4tests.com</a>, 
  <a href="http://www.collegeboard.com/student/testing/sat/prep_one/test.html" target="_blank">College 
  Board </a>and <a href="http://www.kaptest.com/Kaplan/3/College/SAT" target="_blank">Kaplan</a>. 
  Many online practice exams are free, so what have you got to lose?</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><br>
  <a name="Test"></a>Simulated Test Conditions</font></strong><br>
  <br>
  </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">When 
  you are ready to begin taking practice tests, try as much as possible to recreate 
  &quot;test day&quot;:<br>
  <br>
  <strong>- </strong>Take the test at the time of day that you will be taking 
  your SAT (approximately 8:00 AM). This may take some getting used to, as some 
  people concentrate better in the afternoon or at night. <br>
  <strong>-</strong> Find a location where there is <em>some</em> noise distraction. 
  Contrary to popular belief, there are still minor distractions in the actual 
  exam room- paper shuffling, pencil clicking, coughing, etc. Get used to these 
  types of distractions by practicing at a place like the library.<br>
  <strong>-</strong> Make sure you are timing yourself to get a feel for the time 
  pressure you will feel on test day. Buy </font><font color="#000000" size="2"><strong><a href="http://silenttimer.com/product.php" target="_blank">THE 
  SILENT TIMER&#8482;</a></strong></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> 
  to help you pace yourself. </font></p>
<p> 
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
