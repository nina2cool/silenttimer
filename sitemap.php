<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> 
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Site 
  Map</strong></font></p>
<table width="100%" border="0">
  <tr>
    <td width="60%"><p><font size="3" face="Arial, Helvetica, sans-serif"><strong>About
             Us and Contact Us </strong></font><br>
        <font size="2" face="Arial, Helvetica, sans-serif"><a href="aboutus.php">About
         Us</a> | <a href="contactus.php">Contact Us</a> | <a href="inventors.php">Meet
         the Inventors</a> | <a href="timerstory.php">Read
          The Silent Timer&#8482; Story</a></font> | <font size="2" face="Arial, Helvetica, sans-serif"><a href="news/index.php">News
          &amp; Press Releases</a> | <a href="resell/">Partner Opportunity</a></font></p>
      <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>About The 
        Silent Timer</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&#8482;<br>
        <a href="/timer">About The Silent Timer&#8482;</a></font> | <font size="2" face="Arial, Helvetica, sans-serif"><a href="/timer/functions.php">Timer
         Features</a> | <a href="/timer/demo.php">Online
         Demo</a> | <a href="/gallery">Image
          and Video Gallery</a> | <a href="testdates.php">Test Dates</a> | <a href="/timer/video.php">Timer
      Intro Video</a> | <a href="/handbook">Test Handbook</a></font></p>
    </td>
    <td width="40%"><p align="center"><font size="2" face="Arial, Helvetica, sans-serif"> </font><font size="3" face="Arial, Helvetica, sans-serif"><strong><img src="gallery/owners/group/sitting.jpg" width="218" height="145"></strong></font></p>
    </td>
  </tr>
</table>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Products</strong></font><br>
  <font size="2" face="Arial, Helvetica, sans-serif"><a href="product.php#14">Products</a> |
  <a href="product.php#15">Study Packages</a> | <a href="timer/functions_2005.php">The
  Silent Timer&#8482;</a> | <a href="silent_watch.php">Silent
  Watches</a> | <a href="bonus_timer.php">LSAT Bonus Timer</a></font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Silent Timer&#8482; Features</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="/timer/functions.php"><br>
  Timer Features</a> | <a href="timer/easy_setup.php">Easy Setup</a> | <a href="/timer/functions.php#1">Designed
  for your Test</a> 
  | <a href="/timer/functions.php#2">Completely Silent</a> | <a href="/timer/functions.php#3">Testing
   Screen Details</a> | <a href="/timer/functions.php#4">Red, Answer Button</a> 
  | <a href="/timer/functions.php#5">Flashing Alert Light</a> | <a href="/timer/functions.php#6">Test
   Memory Buttons</a> | <a href="/timer/functions.php#7">Control Buttons</a> | 
  <a href="/timer/functions.php#8">Keypad Entry</a> </font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Why Use The Silent
      Timer&#8482;?</strong></font><br>
  <font size="2" face="Arial, Helvetica, sans-serif"><a href="/timer/why.php">Why
  Use The Silent Timer&#8482;?</a> | <a href="timer/increase.php">Increase Your
  Score</a></font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Test Home Pages</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
  <a href="/testhome/act.php">ACT Test</a> | <a href="/testhome/bar.php">Bar Exam</a> 
  | <a href="/testhome/gmat.php">GMAT Test</a> | <a href="/testhome/gre.php">GRE 
  Test</a> | <a href="/testhome/lsat.php">LSAT Test</a> | <a href="/testhome/mcat.php">MCAT 
  Test</a> | <a href="/testhome/other.php">Other Tests</a> | <a href="/testhome/sat_test.php">SAT 
  Test</a> | <a href="/testhome/other.php?test=PSAT">PSAT Test</a> | <a href="/testhome/other.php?test=SAT%20II">SAT 
  II Test</a> | <a href="/testhome/other.php?test=AP%20Test">AP Test</a> | <a href="/testhome/other.php?test=College%20Test">College 
  Test</a> | <a href="/testhome/other.php?test=USMLE">USMLE Test</a> | <a href="/testhome/other.php?test=COMLEX">COMLEX 
  Test</a> | <a href="/testhome/other.php?test=CME">CME Test</a> | <a href="/testhome/other.php?test=DAT">DAT 
  Test</a> | <a href="/testhome/other.php?test=NBDE">NBDE Test</a> | <a href="/testhome/other.php?test=NCLEX">NCLEX 
  Exam</a> | <a href="/testhome/other.php?test=OAT">OAT Test</a> | <a href="/testhome/other.php?test=PCAT">PCAT 
  Test</a> | <a href="/testhome/other.php?test=NAPLEX">NAPLEX Exam</a> | <a href="/testhome/other.php?test=TOEFL">TOEFL 
  Test</a> | <a href="/testhome/other.php?test=TOEIC">TOEIC Test</a> | <a href="/testhome/other.php?test=CPA%20Exam">CPA 
  Exam</a> | <a href="/testhome/other.php?test=MAT">MAT Test</a> | <a href="/testhome/other.php?test=PE%20Exam">PE 
  Exam</a> | <a href="/testhome/other.php?test=Real%20Estate%20Exam">Real Estate 
  Exam</a> | <a href="/testhome/other.php?test=Certification%20Exam">Certification 
  Exam</a> | <a href="/testhome/other.php?test=High%20School%20Test">High School 
  Test</a> | <a href="/testhome/other.php?test=Middle%20School%20Test">Middle 
  School Test</a> </font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Books and Study
      Guides </strong></font><br>
  <font size="2" face="Arial, Helvetica, sans-serif"><a href="/books/act_books.php">ACT
        Books and Study Guides </a> | <a href="/books/bar_books.php">Bar Exam Books
        and Study Guides </a> | <a href="/books/gmat_books.php">GMAT
        Books and Study Guides </a> | <a href="/books/gre_books.php">GRE Books and
        Study Guides </a> | <a href="/books/lsat_books.php">LSAT
        Books and Study Guides </a> | <a href="/books/mcat_books.php">MCAT Books
        and Study Guides</a> | <a href="/books/books.php">Other
Test Books and Study Guides </a> | <a href="/books/sat_books.php">SAT Books
and Study Guides</a></font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Order Products </strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
  <a href="product.php">Order Form</a> | <a href="/legal/guarantee.php">Money Back 
  Guarantee</a> | <a href="/legal/terms.php">Terms and Conditions</a></font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Find a Retail Location</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
    <a href="location_search.php">Search for a store</a> | <a href="locations_all.php">View
    all stores</a> | <a href="location_search.php">Search by zip code</a></font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Money Back Guarantee</strong></font><br>
  <font size="2" face="Arial, Helvetica, sans-serif"><a href="/legal/guarantee.php">30
  Day Money Back Guarantee</a></font></p>
<table width="100%" border="0">
  <tr>
    <td width="28%"><p><font size="3" face="Arial, Helvetica, sans-serif"><strong><img src="gallery/pics/small/push-button-papers.jpg" width="200" height="150"></strong></font></p>
    </td>
    <td width="72%"><p><font size="3" face="Arial, Helvetica, sans-serif"><strong>The 
        Silent Timer&#8482; Demo<br>
        </strong></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="/timer/demo.php">Online 
        Demo</a></font></p>
      <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Picture Gallery</strong></font><br>
        <font size="2" face="Arial, Helvetica, sans-serif"><a href="/gallery">Picture 
        Gallery</a> | <a href="/gallery/photos.php">Photos</a> | <a href="/gallery/videos.php">Videos</a></font></p>
      <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Stories and 
        Testimonials</strong></font><br>
        <font size="2" face="Arial, Helvetica, sans-serif"><a href="/stories">Testimonials</a></font></p>
    </td>
  </tr>
</table>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Frequently Asked 
  Questions<br>
  </strong></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="/timer/faq.php">FAQ</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3">Test
        and Test Prep Links</font></strong><a href="links.php"><br>
  Test and Test Prep Links</a></font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Test Dates</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
  <a href="testdates.php#act">ACT</a> | <a href="testdates.php#gmat">GMAT &amp; 
  GRE</a> | <a href="testdates.php#lsat">LSAT</a> | <a href="testdates.php#mcat">MCAT</a> 
  | <a href="testdates.php#sat">SAT I &amp; II</a></font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Legal<br>
</strong></font><font size="3" face="Arial, Helvetica, sans-serif"><a href="/legal/terms.php"><font size="2">Terms 
  and Conditions</font></a><strong><font size="2"> | </font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="/legal/privacy.php">Privacy 
Policy</a> | <a href="/legal/patentpending.php">Patent Pending</a></font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>The Silent Timer&#8482; 
  Handbook<br>
  </strong></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook">Test 
  Handbook</a></font></p>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bordercolor="#000000">
  <tr bgcolor="003399"> 
    <td width="25%" bordercolor="#FF9900"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>ACT 
        Test</strong></font></div></td>
    <td width="25%" bordercolor="#FF9900"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>BAR 
        Exam</strong></font></div></td>
    <td width="25%" bordercolor="#FF9900"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>GMAT 
        Test</strong></font></div></td>
    <td width="25%" bordercolor="#FF9900"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>GRE 
        Test</strong> </font></div></td>
  </tr>
  <tr valign="top" bgcolor="#FFFFCA"> 
    <td height="22" bordercolor="#FF9900"> 
      <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/act">ACT 
        Test<br>
        </a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/act/act_test_prep.php">ACT 
        Test Prep</a></font><br>
        <font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/act/act_practice_test.php">ACT 
        Practice Tests</a></font><br>
        <font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/act/act_score.php">ACT 
        Score</a></font><br>
        <font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/act/act_software.php">ACT 
        Software<br>
        </a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/act/act_st.php">ACT 
        &amp; THE SILENT TIMER&#8482;</a></font></p></td>
    <td bordercolor="#FF9900"> 
      <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/bar">The 
        BAR EXAM</a><br>
        <a href="/handbook/standardizedtest/bar/bar_prep.php">Study for the BAR</a></font><br>
        <font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/bar/bar_other.php">MEE, 
        MPT and MPRE<br>
        </a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/bar/">American 
        Bar Association</a></font><br>
        <font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/bar/association_list.php">List 
        of State Associations</a></font><br>
        <font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/bar/bar_exam_list.php">List 
        of State BAR Exams</a></font><br>
        <font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/bar/bar_test_dates.php">Test 
        Dates</a></font><br>
        <font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/bar/bar_st.php">BAR 
        &amp; THE SILENT TIMER&#8482;</a></font></p></td>
    <td bordercolor="#FF9900"><font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/gmat">GMAT 
      Test<br>
      </a> <a href="/handbook/standardizedtest/gmat/gmat_prep.php">GMAT Prep Course</a><a href="/handbook/standardizedtest/gmat/gmat_score.php"><br>
      GMAT Score</a><a href="/handbook/standardizedtest/gmat/gmat_practice.php"><br>
      GMAT Preparation</a><a href="/handbook/standardizedtest/gmat/gmat_practice_test.php"><br>
      GMAT Practice Tests</a><a href="/handbook/standardizedtest/gmat/gmat_registration.php"><br>
      GMAT Registration</a><a href="/handbook/standardizedtest/gmat/gmat_test_date.php"><br>
      GMAT Test Date</a><a href="/handbook/standardizedtest/gmat/gmat_st.php"><br>
      GMAT &amp; THE SILENT TIMER&#8482;</a></font></td>
    <td bordercolor="#FF9900"><font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/gre">GRE 
      Test</a><a href="/handbook/standardizedtest/gre/gre_online.php"><br>
      GRE Online</a><a href="/handbook/standardizedtest/gre/gre_subject_tests.php"><br>
      GRE Subject Tests</a><a href="/handbook/standardizedtest/gre/gre_computer.php"><br>
      GRE Computer</a><a href="/handbook/standardizedtest/gre/gre_paper.php"><br>
      GRE Paper</a><a href="/handbook/standardizedtest/gre/gre_vocabulary.php"><br>
      GRE Vocabulary</a><a href="/handbook/standardizedtest/gre/gre_prep.php"><br>
      GRE Test Prep</a><a href="/handbook/standardizedtest/gre/gre_score.php"><br>
      GRE Score</a><a href="/handbook/standardizedtest/gre/gre_practice_tests.php"><br>
      GRE Practice Tests</a><a href="/handbook/standardizedtest/gre/gre_registration.php"><br>
      GRE Registration</a><a href="/handbook/standardizedtest/gre/gre_test_dates.php"><br>
      GRE Test Dates</a><a href="/handbook/standardizedtest/gre/gre_st.php"><br>
      GRE &amp; THE SILENT TIMER&#8482;</a></font></td>
  </tr>
  <tr bgcolor="003399"> 
    <td width="25%" bordercolor="#FF9900"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>LSAT 
        Test</strong></font></div></td>
    <td bordercolor="#FF9900"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>MCAT 
        Test</strong></font></div></td>
    <td bordercolor="#FF9900"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>SAT 
        Test</strong></font></div></td>
    <td bordercolor="#FF9900"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Other 
        Tests</strong></font></div></td>
  </tr>
  <tr valign="top" bgcolor="#FFFFCA"> 
    <td bordercolor="#FF9900"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <a href="/handbook/standardizedtest/lsat">LSAT Test</a><a href="/handbook/standardizedtest/lsat/lsat_test_prep.php"><br>
      LSAT Test Prep</a><a href="/handbook/standardizedtest/lsat/lsat_score.php"><br>
      LSAT Score</a><a href="/handbook/standardizedtest/lsat/lsat_prep.php"><br>
      LSAT Preparation</a><a href="/handbook/standardizedtest/lsat/lsat_practice.php"><br>
      LSAT Practice</a><a href="/handbook/standardizedtest/lsat/lsat_practice_test.php"><br>
      LSAT Practice Tests</a><a href="/handbook/standardizedtest/lsat/lsat_registration.php"><br>
      LSAT Registration</a><a href="/handbook/standardizedtest/lsat/lsat_test_date.php"><br>
      LSAT Test Dates</a><a href="/handbook/standardizedtest/lsat/lsat_tips.php"><br>
      LSAT Tips</a><a href="/handbook/standardizedtest/lsat/lsat_st.php"><br>
      LSAT &amp; THE SILENT TIMER&#8482;</a></font></td>
    <td bordercolor="#FF9900"><font size="2" face="Arial, Helvetica, sans-serif"> 
      <a href="/handbook/standardizedtest/mcat">MCAT Test</a><a href="/handbook/standardizedtest/mcat/mcat_test_prep.php"><br>
      MCAT Test Prep</a><a href="/handbook/standardizedtest/mcat/mcat_score.php"><br>
      MCAT Score</a><a href="/handbook/standardizedtest/mcat/mcat_practice.php"><br>
      MCAT Preparation</a><a href="/handbook/standardizedtest/mcat/mcat_practice_test.php"><br>
      MCAT Practice Tests</a><a href="/handbook/standardizedtest/mcat/mcat_registration.php"><br>
      MCAT Registration</a><a href="/handbook/standardizedtest/mcat/mcat_test_dates.php"><br>
      MCAT Test Dates</a><a href="/handbook/standardizedtest/mcat/mcat_st.php"><br>
      MCAT &amp; THE SILENT TIMER&#8482;</a></font></td>
    <td bordercolor="#FF9900"><p><font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/sat">SAT 
        Test</a><a href="/handbook/standardizedtest/sat/psat.php"><br>
        PSAT Test</a><a href="/handbook/standardizedtest/sat/sat_II.php"><br>
        SAT II</a><a href="/handbook/standardizedtest/sat/sat_score.php"><br>
        SAT Score</a><a href="/handbook/standardizedtest/sat/sat_prep_course.php"><br>
        SAT Prep Course</a><a href="/handbook/standardizedtest/sat/sat_practice.php"><br>
        SAT Practice</a><a href="/handbook/standardizedtest/sat/sat_practice_test.php"><br>
        SAT Practice Test</a><a href="/handbook/standardizedtest/sat/sat_registration.php"><br>
        SAT Registration</a><a href="/handbook/standardizedtest/sat/sat_test_dates.php"><br>
        SAT Test Dates<br>
        </a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/sat/sat_tips.php">SAT Tips</a><a href="/handbook/standardizedtest/sat/sat_vocabulary.php"><br>
        SAT Vocabulary</a><a href="/handbook/standardizedtest/sat/sat_st.php"><br>
        SAT &amp; THE SILENT TIMER&#8482;</a></font></p>
    </td>
    <td bordercolor="#FF9900"><font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest/other">Tests 
      Intro</a><a href="/handbook/standardizedtest/other/juniorhigh_tests.php"><br>
      Junior High Tests</a><a href="/handbook/standardizedtest/other/highschool_tests.php"><br>
      High School Tests</a><a href="/handbook/standardizedtest/other/college_tests.php"><br>
      College Tests</a><a href="/handbook/standardizedtest/other/college_essays.php"><br>
      College Essays</a><a href="/handbook/standardizedtest/other/professional_tests.php"><br>
      Professional Tests</a><a href="/handbook/silent_timer"><br>
      THE SILENT TIMER&#8482;</a></font></td>
  </tr>
  <tr bgcolor="003399"> 
    <td bordercolor="#FF9900"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Standardized 
        Tests</strong></font></div></td>
    <td bordercolor="#FF9900"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Get 
        Into School &amp; Increasing Your Scores</strong></font></div></td>
    <td bordercolor="#FF9900"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Prep 
        Courses</strong></font></div></td>
    <td bordercolor="#FF9900"> 
      <div align="center"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Time 
        Management</strong></font></div></td>
  </tr>
  <tr valign="top" bgcolor="#FFFFCA"> 
    <td bordercolor="#FF9900"><font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/standardizedtest">Standardized 
      Tests</a></font></td>
    <td bordercolor="#FF9900"><font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/increasescores">Increasing 
      your Scores</a> <br>
      <a href="/handbook/increasescores/intoschool.php">Get into School</a><br>
      <a href="/handbook/increasescores/reducetestanxiety.php">Reducing Test
      Anxiety</a></font></td>
    <td bgcolor="#FFFFCA"><font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/prep_courses">Prep 
      Courses</a></font></td>
    <td bordercolor="#FF9900"><font size="2" face="Arial, Helvetica, sans-serif"><a href="/handbook/timemanagement">Time 
      Management</a></font></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>



<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
