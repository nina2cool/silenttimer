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
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Test 
  Dates</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Be sure to check your <a href="links.php">test's 
  website</a> for alternate dates and registration deadlines. The dates below 
  may not be updated or complete.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="act"></a><font color="#003399">ACT</font></font></strong></font></p>
<ul>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> June 12, 2004</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> September 25, 2004 (available 
    only in Arizona, California, Florida, Georgia, Illinois, Indiana, Maryland, 
    Nevada, North Carolina, Pennsylvania, South Carolina, Texas, and Washington)</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> October 23, 2004</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> December 11, 2004</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> February 12, 2005</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> April 9, 2005</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> June 11, 2005</font></li>
</ul>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong><a name="gmat"></a><font color="#003399">GMAT 
  &amp; GRE</font></strong></font></p>
<ul>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Schedule whenever you 
    want; test centers have their own dates</font></li>
</ul>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="lsat"></a><font color="003399">LSAT</font></font></strong></font></p>
<ul>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Monday, June 14, 2004</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Saturday, October 2, 
    2004</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Wednesday, October 4, 
    2004 (Saturday Sabbath Observers)</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Saturday, December 4, 
    2004</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Monday, December 6, 2004 
    (Saturday Sabbath Observers)</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Saturday, February 12, 
    2005</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Monday, February 14, 
    2005 (Saturday Sabbath Observers)</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Monday, June 6, 2005</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Saturday, October 1, 
    2005</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Monday, October 3, 2005 
    (Saturday Sabbath Observers)</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Saturday, December 3, 
    2005</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Monday, December 5, 2005 
    (Saturday Sabbath Observers)</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Saturday, February 4, 
    2006</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Monday, February 6, 2006 
    (Saturday Sabbath Observers)</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Monday, June 12, 2006</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Saturday, September 30, 
    2006</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Monday, October 2, 2006 
    (Saturday Sabbath Observers)</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Saturday, December 2, 
    2006</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Monday, December 4, 2006 
    (Saturday Sabbath Observers)</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Saturday, February 10, 
    2007</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Monday, February 12, 
    2007 (Saturday Sabbath Observers)</font></li>
</ul>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="mcat"></a><font color="003399">MCAT</font></font></strong></font></p>
<ul>
  <li><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><font size="2"> 
    </font></font></strong> Saturday, August 14, 2004</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Saturday, April 16, 
    2005</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> Saturday, August 20, 
    2005</font></li>
</ul>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><a name="sat"></a><font color="003399">SAT 
  I &amp; II</font></font></strong></font></p>
<ul>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> June 5, 2004 (SAT I 
    &amp; SAT II)</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">October 9, 2004 (SAT 
    I &amp; SAT II)</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> November 6, 2004 (SAT 
    I, SAT II, and Language Tests with Listening including ELPT)</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> December 4, 2004 (SAT 
    I &amp; SAT II)</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> January 22, 2005 (SAT 
    I, SAT II, and ELPT)</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> March 12, 2005 (SAT 
    I only) <font color="#FF6600"><strong>New SAT!</strong></font></font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> May 7, 2005 (SAT I &amp; 
    SAT II) <font color="#FF6600"><strong>New SAT!</strong></font></font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> June 4, 2005 (SAT I 
    &amp; SAT II) <font color="#FF6600"><strong>New SAT!</strong></font><br>
    </font><font face="Arial, Helvetica, sans-serif"> </font> </li>
</ul>
            <p align="left">&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>