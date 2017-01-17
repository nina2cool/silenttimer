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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>GRE Subject Tests</strong></font></p>
<p> <font size="2" face="Arial, Helvetica, sans-serif">Similar to the <a href="../sat/sat_II.php">SAT
       II tests</a>, GRE subject tests are intended to assist graduate schools
       in measuring  the qualifications of applicants in specific areas of study.
       Subject tests are  available in biochemistry; cell and molecular biology;
       biology; chemistry; computer  science; literature in English; mathematics,
       physics and psychology.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The GRE subject tests are
    given at paper-based centers three times a year: November, December, and
    April. You can register for a paper-based administration <a href="http://www.ets.org/portal/site/ets/menuitem.1488512ecfd5b8849a77b13bc3921509/?vgnextoid=e7f42d3631df4010VgnVCM10000022f95190RCRD&vgnextchannel=9a9a46f1674f4010VgnVCM10000022f95190RCRD" target="_blank">online</a> or via mail.
    Click here to view the <a href="http://www.ets.org/portal/site/ets/menuitem.1488512ecfd5b8849a77b13bc3921509/?vgnextoid=b5ddb23616795010VgnVCM10000022f95190RCRD&vgnextchannel=c9da46f1674f4010VgnVCM10000022f95190RCRD" target="_blank">subject
    test centers</a>.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">These two hour and 50 minute 
  tests are supposed to demonstrate students&#8217; knowledge of particular subjects 
  stressed in many undergraduate programs as preparation for graduate study. Because 
  they identify areas of weakness, students should attempt to use the GRE subject 
  test scores to help plan their future studies.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Candidates should contact 
  graduate schools of choice to determine which, if any, of the GRE subject tests 
  should be taken.</font></p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>