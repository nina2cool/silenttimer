<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
<p><strong><font color="#003399" size="4" face="Times New Roman, Times, serif"> </font></strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font size="4" face="Times New Roman, Times, serif"><font size="2">THE
          SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></font><font color="#000000" size="2"> <em>Handbook</em></font></strong></font> </p>
<p><strong><font size="4" face="Arial, Helvetica, sans-serif"><br>
  Test Day Tips </font></strong></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Avoid
        any actions on test day that may contribute to test anxiety.</font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">As always,
        be prepared, think positively, and try to relax.</font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Gather
        all necessary materials (pencil, your Timer, ID, calculator, test ticket,
        etc.) the night before and bring water and a light snack to eat during
        your break (if allowed).</font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Arrive
        early to your test center and visualize yourself completing the exam successfully.</font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Imagine
        post-exam rewards and how it will feel to have done well on this exam.</font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Take
        deep breaths and clear your mind of negative thoughts.</font></p>
<p>&nbsp;</p>
<blockquote>
  <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>handbook/standardizedtest/lsat/lsat_tips.php">LSAT Test-taking
          Tips</a></font></p>
  <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>handbook/standardizedtest/sat/sat_tips.php">SAT Test-taking
        Tips</a></font></p>
  <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>handbook/increasescores/reducetestanxiety.php">Reduce
        Test Anxiety</a></font></p>
</blockquote>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
