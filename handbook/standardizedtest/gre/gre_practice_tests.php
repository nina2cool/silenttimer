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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>GRE Practice Tests</strong></font></p>
<p> <font size="2" face="Arial, Helvetica, sans-serif">The best way to identify 
  areas in which you need improvement is to take several GRE practice tests. This 
  will not only introduce you to the test format, but it will also help you clearly 
  see areas that you need to focus on. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Definitely take the <a href="ftp://ftp.ets.org/pub/gre/14614.pdf" target="_blank">GRE 
  Practice General Test</a>, which is mailed to candidates upon registration for 
  the paper-based exam. If you will be taking the computer-based test, you may 
  still follow the link to download the GRE practice test as a study aid. This 
  particular practice test contains test-taking strategies, sample writing topics, 
  scored sample essays and more. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.gre.org/practice_test/index.html" target="_blank">Practice 
  the interactive verbal and quantitative section sample questions</a>. This interactive 
  test provides instant scores for a quick look at areas you should spend more 
  time on. Definitely worth your time.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">LearningExpress, LLC <a href="http://www.learnatest.com/products/2222220043V002.cfm" target="_blank">also 
  provides an excellent GRE practice test</a> at a discounted price. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Many resources are available 
  when it comes to GRE practice tests. The more you take, the better prepared 
  you will be for the actual exam. </font></p>
<p>&nbsp;</p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Get the ETS's GRE General
    Test from Amazon:</font></p>
<p><iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0886852129&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe></p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>