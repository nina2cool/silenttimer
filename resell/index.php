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
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Sell 
  our Products</strong></font></p>
<p><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">If 
  your company would like to sell <font color="#000066" face="Times New Roman, Times, serif">THE 
  SILENT TIMER</font>&#8482; to your students/customers, or if you know someone 
  who should hear about our product, please <a href="../contactus.php">contact 
  us</a>. If you are a student taking a preparation course, and would like to 
  see our timer sold in your prep office, please <a href="mailto:info@silenttimer.com?subject=My%20Prep%20Course%20Info">email 
  us</a> your course's contact information.</font></strong></p>
<table width="100" border="0" cellspacing="0" cellpadding="5" class="right">
  <tr>
    <td><div align="center"><img src="pics/partner.jpg" alt="Parter with us." width="175" height="193"></div></td>
  </tr>
</table><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">We are currently 
  looking into quality resale locations, including:</font>
<ul>
  <li><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Test 
    Preparation Courses</font></li>
  <li><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">College 
    Campuses</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Book Stores</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Educational Stores</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Educational Web Sites</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Schools</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">And More</font></li>
</ul>
<p><font size="2" face="Arial, Helvetica, sans-serif">Our product is aimed at 
  helping students manage their test time during preparation for major exams (ACT, 
  LSAT, MCAT, SAT, USMLE, etc). <a href="../stories/index.php">Read our testimonials</a> 
  to find out what students are saying about their new timer.</font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Retail &amp; Partner 
  Opportunities</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">There is an excellent opportunity 
  for your company to help students across the world and to build your business 
  at the same time. We are offering generous profit opportunities for whole sale 
  purchases, as well as web partner sales.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Please contact us to discuss product
    purchasing and partner opportunities.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">We look forward to speaking 
  with you and to your participation in our mission.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Contact:</font></p>
<table width="60%"  border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Silent Technology LLC<br>
<a href="mailto:info@silenttimer.com">info@silenttimer.com </a></font></td>
  </tr>
</table>
<p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="left">
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>
</p>
	