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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>SAT Prep Course 
  </strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Different students have
    different studying needs when preparing for the SAT. If you are good at managing
    your time and disciplined enough to study on your own, you may want to invest
    in several SAT prep books and practice on your own. If, however, you are
    like most students and need extra direction, you might be a good candidate
  for an SAT prep course. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">SAT prep courses offer individual 
  coaching, classroom sessions, practice exams and much more. They are a good 
  way to learn strategic tips and techniques for increasing your SAT score. Several 
  good resources to check out are <a href="http://www.princetonreview.com/college/testprep/" target="_blank">The 
  Princeton Review</a> and <a href="http://www.kaptest.com/repository/templates/Lev3InitDroplet.jhtml?_lev3Parent=/www/KapTest/docs/repository/content/College/SAT-PSAT" target="_blank">Kaplan 
  Test Prep and Admissions</a>. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">For interactive instruction 
  outside the classroom setting, consider purchasing SAT prep course software 
  or an online course. From <a href="https://satonlinecourse.collegeboard.com/loginAction.do" target="_blank">College 
  Board's Official SAT Prep Course</a> to <a href="http://novapress.net/sat/software.html" target="_blank">Nova 
  Press</a> and <a href="http://www.mathmadeeasy.com/satsoft.html" target="_blank">Math 
  Made Easy</a>, there are countless programs designed to provide students with 
  the skills necessary to take the SAT test.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">If you take a prep course, 
  your instructor will talk to you about the importance of time management on 
  the SAT. And, if they are on our network of prep schools, they will offer you 
  </font><font color="#003399" size="2" face="Times New Roman, Times, serif"><strong><a href="sat_st.php">THE
  SILENT TIMER</a><font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif">. 
  Take the opportunity to improve your pacing skills before test day with this 
  innovative tool. </font></p>
<p>&nbsp; </p>
<p> 
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
