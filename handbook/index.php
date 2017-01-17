<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> <strong><font color="#003399" size="4" face="Times New Roman, Times, serif"> 
</font></strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font size="4" face="Times New Roman, Times, serif"> 
THE SILENT TIMER<font color="#000000" size="3" face="Arial, Helvetica, sans-serif">&#8482;</font></font><font color="#000000" size="4"> 
<em>Handbook<font size="2"><br>
Written by Silent Technology LLC and writer, Jennifer Jones.<br>
</font></em></font></strong></font>
<p><font size="2" face="Arial, Helvetica, sans-serif">We have compiled a testing
    guide to </font><font size="2" face="Arial, Helvetica, sans-serif">help 
                    make your testing experience as valuable as possible. </font></p>
                  
<p><font size="2"><font face="Arial, Helvetica, sans-serif">Here you will find 
  <font color="#FF0000"><em><strong>hot</strong></em></font> tips on time management, 
  testing strategies, </font><font color="#000000" face="Arial, Helvetica, sans-serif"> standardized
  tests, utilizing <font color="#000066" face="Times New Roman, Times, serif"><strong>THE
  SILENT TIMER</strong></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>&#8482;</strong></font>, </font><font face="Arial, Helvetica, sans-serif">how to increase your 
  scores and even which prep courses might help.</font></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">This is your <strong><font color="#000066" face="Times New Roman, Times, serif">SILENT 
  TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></strong> 
  guide to all you need to know about your test and time management.</font></p>
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#003399" bgcolor="#FFFFCC">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>&lt;&lt;Use
    the links on the left to navigate your Testing Handbook or click on a link
          below.</strong></font></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif">Learn how to <a href="http://silenttimer.com/timer/increase.php">increase 
  your scores</a> by utilizing good <a href="timemanagement/index.php">time management</a> 
  during your <a href="standardizedtest/index.php">standardized test</a>, whether 
  it be the <a href="standardizedtest/act/index.php"> ACT</a>, <a href="standardizedtest/bar/index.php">BAR 
  exam</a>, <a href="standardizedtest/gmat/index.php">GMAT</a>, <a href="standardizedtest/gre/index.php">GRE</a>, 
  <a href="standardizedtest/lsat/index.php">LSAT</a>, <a href="standardizedtest/mcat/index.php">MCAT</a>, 
  <a href="standardizedtest/sat/index.php">SAT</a> or <a href="standardizedtest/other/index.php">another 
  test</a>. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Using <font color="#000066" face="Times New Roman, Times, serif"> 
  <strong><a href="silent_timer/index.php">THE SILENT TIMER</a></strong></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>&#8482;</strong></font> 
  can help you <a href="increasescores/intoschool.php">get into your school of 
  choice</a>; maximizing your <a href="timemanagement/index.php">time efficiency</a> 
  will <a href="http://silenttimer.com/timer/increase.php">increase your scores</a>.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="increasescores/reducetestanxiety.php">Test
      day anxiety?</a> We have
    a page full of great tips to help you past this.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Read specific tips for
    beating the <a href="standardizedtest/lsat/lsat_tips.php">LSAT test</a> and
    the <a href="standardizedtest/sat/sat_tips.php">SAT
    test</a>.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">You might want to take a 
  <a href="prep_courses/index.php">preparation course</a> to help you learn your 
  test. Just knowing the material or getting good grades in school does not guarantee 
  a good score. You must learn how to beat your test's tricks. A <a href="prep_courses/index.php">prep 
  course</a> could be the key to your success.</font></p>
<p>&nbsp;</p>
			
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>