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

			<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Rebate
	        Information </font></strong></p>
            

            <p><strong><font color="#9900CC" size="3" face="Arial, Helvetica, sans-serif">Occasionally
                  we offer rebates for Silent Timer purchases in select retail
                  stores:</font></strong></p>
            <ol>
              <li>
                <p><font size="2" face="Arial, Helvetica, sans-serif">Rebates can be found by searching for retail stores on the
                  <a href="locations.php">Search page</a>.</font></p>
              </li>
              <li>
                <p><font size="2" face="Arial, Helvetica, sans-serif">Eligible stores will have a link next to them. Click on the
                  link to open a new page with the rebate form on it. <em>NOTE: Eligible
                  stores may change without warning.</em></font></p>
              </li>
              <li>
                <p><font size="2" face="Arial, Helvetica, sans-serif">Print out the form and purchase <strong><font color="#000066" face="Times New Roman, Times, serif">THE
                        SILENT TIMER</font></strong><font color="#000033" face="Times New Roman, Times, serif"><strong><font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></strong></font> at that particular
                  store.</font></p>
              </li>
              <li>
                <p><font size="2" face="Arial, Helvetica, sans-serif">Fill out the form and follow its instructions for submittal.
                  Note expiration dates. Rebates submitted after the deadline will
                  not be considered. </font></p>
              </li>
            </ol>
            <p><font size="2" face="Arial, Helvetica, sans-serif">Please <a href="mailto:info@silenttimer.com?subject=Rebate%20Question">email
            us</a> if you have any questions. </font></p>
            <p>&nbsp;</p>
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>