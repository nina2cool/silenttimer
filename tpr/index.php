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
<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Special
      deal for TPR students only! </font></strong></p>
<p><font color="#33CC33" size="3" face="Arial, Helvetica, sans-serif"><strong><em>As
      a student of the <a href="http://www.review.com" target="_blank">Princeton
Review</a>, we are giving you this exclusive offer:</em></strong></font></p>
<p>&nbsp;</p>
<p>  <font size="3" face="Arial, Helvetica, sans-serif"><strong>For a limited time, when
        you purchase one of our <font color="#0000FF">Silent Timers</font> online, you will receive a bonus countdown
  timer <font color="#3300FF">FREE</font>!</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">All you need to do is enter
    the promotion code &quot;<strong><font color="#FF0000">tproffer</font></strong>&quot; in the promotion code field of your order form.
    Your extra timer will be included in your package.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">This offer is valid through
    May 15, 2006, or while supplies last. You receive one additional timer per
    order (regardless of how many Silent Timers are purchased).</font></p>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><div align="center"><font color="#33CC33" size="3" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/product.php"><img src="../images/BuyToday.jpg" alt="Practice your way to higher scores - buy your Silent Timer today!" width="175" height="50" border="0"></a></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><em>Extra
              timers in stock :</em> <font color="#CC0000"><br>
        LIMITED QUANTITY AVAILABLE</font></strong></font></div></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif">The extra timer is just
    a simple countdown/count up timer that is completely silent. It is always
    a good idea to have a backup for test day - for such an important test you
want the piece of mind of being prepared for test day.</font></p>
<p align="left">&nbsp;</p>
<p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Great
      test links to check out: </strong></font></p>
<blockquote>
  <p><font size="2"><a href="http://www.silenttimer.com/testhome/lsat.php" target="_blank"><font face="Arial, Helvetica, sans-serif">Want
      to raise your LSAT score?</font></a><font face="Arial, Helvetica, sans-serif"> -
      learn how!</font></font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://silenttimer.com/handbook/standardizedtest/lsat/index.php" target="_blank">All
      about the LSAT</a> - our test handbook has tons of information about the
      LSAT &amp; other standardized tests </font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://silenttimer.com/handbook/test_tips/index.php" target="_blank">General
    Test-taking Tips</a> - tips on taking exams </font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://silenttimer.com/handbook/standardizedtest/lsat/lsat_tips.php" target="_blank">LSAT
        Test-taking Tips</a> - oodles  of useful LSAT tips</font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://silenttimer.com/handbook/increasescores/reducetestanxiety.php" target="_blank">Reducing
        Test Day Anxiety </a>- beat those test day blues! </font></p>
</blockquote>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>



// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>