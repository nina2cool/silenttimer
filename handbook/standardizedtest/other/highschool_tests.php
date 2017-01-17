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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>High School Tests</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">So you&#8217;ve grown up 
  a little bit and now you&#8217;re transitioning to the life of high school football 
  games, getting your driver&#8217;s license, prom and the dreaded preparation 
  for college. Seems so far away, right? Wrong. Most of, if not all, your high 
  school years should be spent preparing yourself for higher learning. If you 
  waste your time and GPA on being the most popular kid in school, you&#8217;ll 
  find yourself without a university to call your own in four years.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The most obvious tests you&#8217;ll 
  be taking in high school are college entrance exams including the <a href="../sat/psat.php">PSAT</a>, 
  <a href="../sat/">SAT</a>, <a href="../sat/sat_II.php">SAT II</a> and <a href="../act/">ACT</a>. 
  Chances are if you&#8217;re planning on going to college, you&#8217;ll be taking 
  either the <a href="../act/">ACT</a> or <a href="../sat/">SAT</a>.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.collegeboard.com/student/testing/ap/about.html">Advanced 
  Placement exams</a> are among the other major high school tests you might find 
  yourself studying for. These tests are typically taken your junior or senior 
  year in high school and are an attempt at earning college-level credit in particular 
  subjects. If you plan on taking an AP test, which is highly recommended, you 
  should first take some AP, or honors, classes. You want to try to earn as much 
  college credit as possible before you get to college so that you can graduate 
  on time if not earlier. Given in more than 30 subjects, AP tests are offered 
  in May every year. See your guidance counselor if interested in taking these 
  exams.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Statewide tests are required
     of high school students in most states, except for Iowa and Nebraska. They
    test  students&#8217; basic skill levels in mathematics, reading, English
    and other  core subjects. Much importance is placed on test scores because
    these exams  evaluate the teaching excellence of both school districts and
    their teachers,  and some states even require passing scores to graduate
    from high school.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">No need for panic, though;
     there are ways to help you prepare for these state tests. Many school districts
     offer school-wide prep programs, much like any other standardized test prep
     course. Find out if your school offers these programs by contacting your
    school  office or guidance counselor today. If they don&#8217;t offer prep
    programs  or if you just want more practice, private tutors are available
    as well as some  books focusing just on your particular state&#8217;s testing
    system.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The frequency of statewide 
  testing varies from state to state. Some states may require it once a year, 
  while others may only require it every other year. Check with your school district.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Essays are required on
    some of these tests, and some high school students may not feel adequately
    prepared to be able to produce a well thought-out essay. If you feel you
    may need help in this area, the best idea is to train yourself to think critically
    and get writing critiques on practice samples. Contact a freelance
  proofreader today to ensure a high score on this portion of the exam.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Using </font><font color="#003399" size="2" face="Times New Roman, Times, serif"><strong><a href="../../silent_timer/index.php"><font color="#000066">THE
          SILENT TIMER</font></a><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
  when studying and taking practice tests for all of these exams will help you 
  feel more comfortable when it comes to the actual test. You will have already 
  figured out how many minutes per question you may spend, saving you time and 
  stress. You also don&#8217;t want to be left scribbling answers to unanswered 
  questions when the bell rings or time concludes for the test. Start improving 
  your scores today by <a href="../../../order/index.php">ordering </a></font><a href="../../../order/index.php"><font color="#000066" size="2" face="Times New Roman, Times, serif"><strong>THE
  SILENT TIMER</strong></font></a><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>&#8482;</strong></font><font size="2" face="Arial, Helvetica, sans-serif">.</font></p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>