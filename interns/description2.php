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

			
<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Internship 
  Description</font></strong></p>
<p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Part-time 
  Summer Internship</strong></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Length of Internship: 
  Flexible start/end dates</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">What we&#8217;re looking for:</font></p>
<ul>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Self-starter, motivated</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Car recommended</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Energetic</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Professional appearance/attitude</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Genuinely interested in learning 
    about marketing and new product development</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Staying in college town for the 
    summer</font></li>
</ul>
<p><font size="2" face="Arial, Helvetica, sans-serif">Internship Details:</font></p>
<ul>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Visit stores and make sure product 
    placement is correct</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Develop relationship with vendors</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Local marketing through fliers, 
    newspaper ads, test prep offices, tutors</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Help with national marketing 
    campaigns</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Design own fliers</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Submit budget request and use 
    money for ads, copies, etc</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Develop marketing plan with help 
    from intern coordinator and follow through</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Come up with new ideas to target 
    SAT kids/parents</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Design in store promotional items</font><br>
  </li>
</ul>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http;?>interns/cities.php">Check 
  to see if we're hiring interns in your area.</a></font></p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>