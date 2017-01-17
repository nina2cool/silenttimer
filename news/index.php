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
			<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">News
	        &amp; Press Releases </font></strong></p>
            
            <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Silent
                Technology LLC is a fast growing company and has been featured
                in many articles and press releases. Please <a href="<? echo $http;?>contactus.php">contact
                us</a> with any
                comments or questions. </font></p>
            <p><font size="1" face="Arial, Helvetica, sans-serif">(each link
                opens a new window)</font></p>
            <table width="100%"  border="0" cellspacing="0" cellpadding="4">
              <tr>
                <td bgcolor="#FFFFCC"><font color="#000099" size="3" face="Arial, Helvetica, sans-serif"><strong>News
                Articles</strong></font></td>
              </tr>
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif">7/17/06
                    - KXAN Morning News <a href="http://www.kxan.com/" target="_blank"><font size="1">website</font></a> -
                    &quot;<strong><a href="articles/KXAN_2006_07_17.php" target="_blank">Local Invents
                    Silent Timer</a></strong>&quot;</font></td>
              </tr>
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif">6/22/06
                    - Inc. Magazine </font><font color="#000000" size="1" face="Arial, Helvetica, sans-serif"><a href="http://www.inc.com/" target="_blank">website</a></font> <font size="2" face="Arial, Helvetica, sans-serif">- &quot;<a href="http://www.inc.com/slideshow_INC/slideviewer.cgi?list=30under30&dir=&config=&refresh=-1&direction=forward&scale=0&cycle=on&slide=2&design=default&total=29" target="_blank"><strong>30
                    Under 30: America's Coolest Young Entrepreneurs</strong></a>&quot;</font></td>
              </tr>
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif">Fall 2005
                    - McCombs
                    School of Business </font><font color="#000000" size="1" face="Arial, Helvetica, sans-serif"><a href="http://www.mccombs.utexas.edu/" target="_blank">website</a></font> <font size="2" face="Arial, Helvetica, sans-serif">- &quot;<a href="http://www.mccombs.utexas.edu/news/magazine/05f/cio.asp" target="_blank"><strong><span class="h1">The CIO: Driving Competitive Advantage
                    One Byte at a Time</span></strong></a>&quot; </font></td>
              </tr>
              <tr>
                <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">9</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">/25/2005
                    - Fort
                    Worth Star Telegram <font size="1"><a href="http://www.dfw.com/mld/dfw/" target="_blank">website</a></font> - &quot;<strong><a href="articles/FWST_2005_09_25.php" target="_blank">Test
                    Timer is: a) quiet, b) handy, c) lucrative</a></strong>&quot;</font></td>
              </tr>
              <tr>
                <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">5/9/2005
                    - Austin
                    Business Journal <font size="1"><a href="http://austin.bizjournals.com/" target="_blank">website</a></font> - &quot;<strong><a href="http://austin.bizjournals.com/salespower/2005/05/09/" target="_blank">Perfect
                Timing</a></strong>&quot;</font></td>
              </tr>
              <tr>
                <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">4/28/2005
                    - entrepreneur.co.uk <font size="1"><a href="http://www.entrepreneur.co.uk" target="_blank">website</a></font> - &quot;<strong><a href="http://www.entrepreneur.co.uk/?p=23" target="_blank">Keeping
                Good Time, The Key To Success For This Inventor-Entrepreneur</a></strong>&quot;</font></td>
              </tr>
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif">11/11/2004
                    - McCombs
                    School of Business </font><font color="#000000" size="1" face="Arial, Helvetica, sans-serif"><a href="http://www.mccombs.utexas.edu/" target="_blank">website</a></font> <font size="2" face="Arial, Helvetica, sans-serif">- &quot;<A href="http://www.mccombs.utexas.edu/news/speaker_series/McMillan_bba_11_04.asp" target="_blank" class=headline><strong>McCombs
                    2003 MIS Graduate and Successful Entrepreneur Speaks on Inventing
                Your Future</strong></A>&quot;</font></td>
              </tr>
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif">8/18/2003
                    - The University
                    of Texas @ Austin </font><font color="#000000" size="1" face="Arial, Helvetica, sans-serif"><a href="http://www.utexas.edu" target="_blank">website</a></font> <font size="2" face="Arial, Helvetica, sans-serif">- &quot;<a href="http://www.utexas.edu/features/archive/2003/bridge.html" target="_blank"><strong>More
                  than a virtual solution</strong></a>&quot;</font></td>
              </tr>
            </table>
            <p>&nbsp;</p>
            <table width="100%"  border="0" cellspacing="0" cellpadding="4">
              <tr>
                <td bgcolor="#FFFFCC"><font color="#000099" size="3" face="Arial, Helvetica, sans-serif"><strong>Press
                Releases</strong></font></td>
              </tr>
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif">6/20/2006
                    -  <a href="articles/PR_2006_06_20.php" target="_blank"><b>Standardized
                    test takers add extra product to test prep arsenal</b></a></font></td>
              </tr>
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif">8/30/2005
                    - 


                    <a href="articles/PR_2005_08_30.php" target="_blank">                    <strong>Testing
                    timer invention now sold in nearly 300 retail stores nationwide</strong></a></font></td>
              </tr>
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif">7/26/2005
                    - <a href="articles/PR_2005_07_26.php" target="_blank"><strong>Innovative
                    classroom timer introduced at annual Texas Conference for
                    Mathematics Teachers</strong></a></font></td>
              </tr>
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif">4/26/2005
                    - <a href="articles/PR_2005_04_26.php" target="_blank"><strong>Young
                    Entrepreneur invents Silent Timer designed specifically for
                standardized tests</strong></a></font></td>
              </tr>
            </table>
            <p>&nbsp;</p>
            <p><font size="2" face="Arial, Helvetica, sans-serif">This is a fun
                  spoof news article written by someone at The Princeton Review
              in College Station, Texas. Remember - this is only for fun!</font> </p>
            <blockquote>
              <p><font size="2" face="Arial, Helvetica, sans-serif">&quot;<a href="articles/LocalBusiness.php" target="_blank"><strong>Silent
              Timer Kills Local Business</strong></a>&quot;</font></p>
</blockquote>
            <p>            
            <p>&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>