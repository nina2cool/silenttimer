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

			<table width="100%"  border="0" cellspacing="0" cellpadding="5">
              <tr>
                <td><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Recommended
                Books and Study Guides </font></strong></td>
                <td></td>
              </tr>
            </table>
			<p><font size="2" face="Arial, Helvetica, sans-serif">We have compiled
                a list of some test preparation books and study guides that students
                have recommended to us. If you have some to add, just let us
                know - <a href="mailto:info@silenttimer.com">info@silenttimer.com</a>. <br>
            </font></p>
			<p><font size="2" face="Arial, Helvetica, sans-serif">Select your
            test below: </font></p>
            <table width="100%"  border="0" cellpadding="5" cellspacing="5" bordercolor="#CCCCCC">
              <tr>
                <td width="33%" bgcolor="#FFFF66"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="act_books.php">ACT</a> </font></strong></div></td>
                <td width="34%" bgcolor="#66CC66"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="bar_books.php">BAR</a> </font></strong></div></td>
                <td width="33%" bgcolor="#FF7575"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="gmat_books.php">GMAT</a> </font></strong></div></td>
              </tr>
              <tr>
                <td width="33%" bgcolor="#CC66FF"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="gre_books.php">GRE</a></font></strong></div></td>
                <td width="34%" bgcolor="#FFCCFF"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="lsat_books.php">LSAT</a></font></strong></div></td>
                <td width="33%" bgcolor="#0066FF"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="mcat_books.php">MCAT</a></font></strong></div></td>
              </tr>
              <tr>
                <td width="33%" bgcolor="#99CCFF"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="sat_books.php">SAT</a></font></strong></div></td>
                <td width="34%" bgcolor="#FFCC66"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="books.php">OTHER</a></font></strong></div></td>
                <td width="33%">&nbsp;</td>
              </tr>
            </table>
          
            <p align="center"><iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=20&l=qs1&f=ifr" width="120" height="90" frameborder="0" scrolling="no"></iframe>
            </p>
            <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
              <tr>
                <td bgcolor="#FFFFCC"><div align="center"><font face="Arial, Helvetica, sans-serif"><font size="4"><a href="../studyguides.php">EXAM SECRETS STUDY GUIDES FROM MORRISON MEDIA LLC</a></font><font size="2"><br />
                </font></font></div></td>
              </tr>
            </table>
            <p align="center"><br>
              <br>
            </p>
<p>&nbsp;</p>
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>