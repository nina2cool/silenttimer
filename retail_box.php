<?
//security for page
session_start();

$PageTitle = "The Silent Timer - Retail Box";

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

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>The 
  Retail Box</strong></font></p>
	
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Look for this
     box design in <a href="http://service.bfast.com/bfast/click?bfmid=2181&sourceid=41141421&bfpid=0975350307&bfmtype=book" target="_blank">Barnes 
  &amp; Noble</a>, <a href="http://www.bordersstores.com/search/title_detail.jsp?id=55720474&srchTerms=silent+timer&mediaType=1&srchType=Keyword" target="_blank">Borders</a>,
  Barnes &amp; Noble College Stores, Follett stores, Chapters and Indigo Books,
  your local campus bookstore,  and other retail locations.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Retail stores
    only carry The Silent Timer&#8482;; the silent digital watches are only available through the website.</font></p>
<p align="left"><font size="4" face="Arial, Helvetica, sans-serif"><u>The Silent
    Timer&#8482; for the LSAT</u></font></p>
<ul>
  <li><font size="2" face="Arial, Helvetica, sans-serif">LSAT boxes that look
      like this:</font></li>
</ul>
<table width="50%"  border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><img src="pics/Retail_2005box.jpg" alt="Get your timer today!" width="134" height="158" /><br>
    </font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><img src="pics/Retail_LSAT_2006.jpg" width="123" height="158" /></font></div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><em><font size="2" face="Arial, Helvetica, sans-serif">Different packaging - same product.</font></em></div></td>
  </tr>
</table>
<ul><li><font size="2" face="Arial, Helvetica, sans-serif">The ISBN is the same
          for both: 0-9753503-0-7, as is The Silent Timer&#8482; contained inside.</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"><em>From September 2006 to May 2007, The Silent Timer for the LSAT was a combo that included a free bonus timer.</em> We <u>no longer include</u> the Bonus Timer in the LSAT boxes due to a change in LSAC's test day rules. Therefore, some stores carry the LSAT box with the bonus timer, and some without. If you are intent on getting the bonus timer, a phone call to the bookstore is necessary to determine whether it is in the box or not. The bonus timer is no longer manufactured.</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Borders stores use the
            BINC (pronounced &quot;bink&quot;) number to search for the LSAT timer. The BINC
        number for the LSAT is 8026919.</font></li>
</ul>
<p align="left"><font size="4" face="Arial, Helvetica, sans-serif"><u>The Silent
    Timer&#8482; for the SAT/ACT</u></font></p>
<ul>
  <li><font size="2" face="Arial, Helvetica, sans-serif">There are two boxes of SAT/ACT timers in the stores. The 2005 version box
    and the new box. Both products are identical - only the packaging is updated.</font></li>
</ul>
<table width="50%"  border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><img src="pics/SAT%20Box%20edited.jpg" width="126" height="158"><br>
        The Silent Timer for SAT/ACT </font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><img src="pics/Retail_SAT_2006.jpg" width="121" height="158"><br>
        The Silent Timer for SAT/ACT</font></div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><em><font size="2" face="Arial, Helvetica, sans-serif">Different packaging - same product.</font></em></div></td>
  </tr>
</table>
<ul>
  <li><font size="2" face="Arial, Helvetica, sans-serif">The ISBN is the same
for both: 0-9753503-1-5.</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Borders stores use the
          BINC (pronounced &quot;bink&quot;) number to search for the SAT/ACT timer.
    The BINC number for the SAT/ACT  is 8251756.</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">This product is perfect for students studying for the MCAT,
      GMAT, GRE, or any other test, even the LSAT.</font></li>
</ul>
<p align="left">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
	