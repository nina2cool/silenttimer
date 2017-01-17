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
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>GRE Online</strong></font></p>
<p> <font size="2" face="Arial, Helvetica, sans-serif">Online shopping, online
     banking, online classes&#8212;welcome to the World Wide Web. You can do
     practically  anything online. Take the GRE test? Well not yet, but you can
     find some great  information about the exam and practice materials on the
     Internet.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">The first place to start 
  would be the <a href="http://www.GRE.org" target="_blank">official GRE Web site</a>. 
  Everything you needed to know about the test is on the <a href="http://www.GRE.org" target="_blank">GRE 
  online site</a>. Preparation tips, registration information, rules, etc. are 
all explained in great detail. A GRE test library is at your fingertips.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">After you&#8217;ve learned 
  every nook and cranny of that Web site, surf around. There&#8217;s endless amounts 
  of GRE test information available online. Go to the <a href="http://www.google.com" target="_blank">Google 
  search engine</a>, type in GRE and see what you come up with. New pages are 
  being added to the Information Superhighway every minute of every day. Familiarize 
  yourself with GRE online. </font></p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>