<?
//security for page
session_start();

$PageTitle = "Use The Silent Timer on Practice Tests for the MCAT";

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
SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></font><font size="2"> 
<em><font color="#000000">Handbook</font></em></font></strong></font> 
<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../../../order/index.php?t=MCAT">MCAT 
  Timer</a> | <a href="mcat_practice.php">MCAT Preparation</a> | &nbsp;<a href="../../../testhome/mcat.php">MCAT 
  Test</a></strong></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>MCAT Practice Tests</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#CC0000">Practice
        with a purpose.</font></strong>  There is no better way to study for
        the MCAT exam than to take MCAT practice  tests repeatedly. Get your
        hands on every test you can.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The <a href="http://www.aamc.org/students/mcat/" target="_blank">Association 
  of American Medical Colleges Web site</a> offers <a href="https://services.aamc.org/Publications/index.cfm?fuseaction=Catalog.displayProductList&queryType=TC&chr_id=22&cfid=1&cftoken=48C09592-9472-4BC3-A086946551726366" target="_blank">tests 
  made up of actual MCAT questions</a> used in previous versions of the exam. 
  The tests range from free to $80. The best value appears to be the MCAT Practice 
  Online Full Membership if you plan on purchasing multiple practice tests&#8212;which 
  you should! The Web versions of MCAT practice tests also offer additional features 
  such as automated scoring, solutions and diagnostic reports.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Taking the MCAT practice 
  test repeatedly will also help to identify your weaknesses, which is an excellent 
  study strategy. You can then use these weaknesses as a guide for where you should 
  focus extra time.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">When taking these MCAT
    practice  tests, try your best to simulate the testing atmosphere. For example,
    reduce  any possible distractions, sit at a desk (rather than your bed or
    the sofa)  and <a href="mcat_st.php">time yourself</a>. Ideally, this approach
    should help  you feel more comfortable during the actual MCAT exam.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Taking practice
      tests under timed conditions</strong> is critical for your success on test day. You could probably
    get most of the answers correct if you had unlimited time; however, this
    is not the case. Don't allow yourself to be surprised - time yourself on
    your practice tests. This will help condition yourself for the time constraints
    of the exam. Use a timer, such as the <a href="mcat_st.php">timer</a> featured on our web site, or
    a wristwatch. Be aware that the AAMC does not allow timers in the test, but
    instead prefers analog watches.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">A free online MCAT practice
     test recommended by <a href="http://www.aamc.org/students/mcat/" target="_blank">AAMC</a> 
  is <a href="http://www.e-mcat.com" target="_blank">available here</a>.</font></p>
<p>&nbsp;</p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Relevant Links</font></strong></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.aamc.org/students/mcat/start.htm" target="_blank">Medical 
  College Admission Test Web site</a><br>
  <a href="http://www.aamc.org/students/mcat/practicetests.htm" target="_blank">MCAT Practice 
  Tests from AAMC<br>
  </a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.e-mcat.com/mcat2/login.asp" target="_blank">MCAT 
  Practice Online<br>
  </a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.princetonreview.com/grad/testprep/testprep.asp?TPRPAGE=82" target="_blank">Free 
  Online MCAT Practice Test from the Princeton Review<br>
  </a></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.testbooksonline.com/mcat.htm" target="_blank">Textbooks 
  Online - MCAT Practice Tests</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Additional Search 
  Help for MCAT Practice Test<br>
  </strong>Click below to search for &quot;MCAT practice test&quot; in the following 
  search engines: </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.google.com/search?hl=en&lr=&ie=UTF-8&oe=UTF-8&q=MCAT%2Bpractice%2Btest" target="_blank">Google</a> 
  | <a href="http://search.msn.com/results.aspx?q=MCAT%2Bpractice%2Btest&FORM=SMCRT" target="_blank">MSN</a> 
  | <a href="http://altavista.com/web/results?q=MCAT%2Bpractice%2Btest&kgs=0&kls=1&avkw=aapt" target="_blank">Altavista</a> 
  | <a href="http://search.yahoo.com/search?p=MCAT%2Bpractice%2Btest&ei=UTF-8&fr=fp-top&n=20&fl=0&x=wrt" target="_blank">Yahoo</a> 
  | <a href="http://search.aol.com/aolcom/search?invocationType=topsearchbox./aolcom/jsp/search.jsp&query=MCAT%2Bpractice%2Btest&x=29&y=14" target="_blank">AOL</a> 
  | <a href="http://web.ask.com/web?q=MCAT%2Bpractice%2Btest&qsrc=1" target="_blank">Ask 
  Jeeves</a></font></p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>