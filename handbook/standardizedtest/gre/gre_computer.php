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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>The GRE Computer 
  Test</strong></font></p>
<p> <font size="2" face="Arial, Helvetica, sans-serif">A three and one-fourth 
  hour test, the computer-based version of the GRE test is composed of four sections 
  as well as a possible unrevealed pretest section appearing anywhere after the 
  writing section. This pretest section does not count towards the <a href="gre_score.php">final 
  score</a>. There may also be an identified research section appearing in the 
  final portion of the GRE test used by the Educational Testing Service. </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">In the computer-based version, 
  questions are strategically selected as the test is taken so the questions adjust 
  to the test taker&#8217;s ability level. A moderately difficult question is 
  given first, and if it is answered correctly, a harder question is given. If 
  the moderately difficult question is answered incorrectly, an easier question 
  is given. This pattern is repeated for the remainder of the GRE exam.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The testing software used 
  for the GRE exam uses an elementary word processor so that individuals who are 
  familiar with a particular type of program don&#8217;t have an unfair advantage 
  over those who aren&#8217;t so computer-savvy.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Spelling and grammar checkers 
  are not available on the computer-based version because that would also be an 
  unfair advantage over the individuals taking the paper-based version of the 
  GRE test.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Research studies show that
     verbal and quantitative scores on the computer-based test are comparable
    to  paper-based test scores.</font></p>
<p>&nbsp;</p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Suggested GRE CD-ROM resources:</font></p>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><div align="center">
<iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0764178784&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
    </div></td>
    <td><div align="center">
<iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0375764755&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
    </div></td>
    <td><div align="center">
<iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0743251709&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>