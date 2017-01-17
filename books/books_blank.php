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

			<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Recommended
            GMAT Books</font></strong></p>
            

            <p><font size="2" face="Arial, Helvetica, sans-serif">These books
                are recommended by our previous customers as good resources when
                studying for the GMAT. If you have one you'd like to add, email
              us at <a href="mailto:info@silenttimer.com?subject=GMAT%20Book%20Suggestion">info@silenttimer.com</a>. </font></p>
            <table width="100%"  border="0" cellpadding="5" cellspacing="5" bordercolor="#CCCCCC">
              <tr>
                <td><div align="center">

                </div></td>
                <td><div align="center">

                </div></td>
                <td><div align="center">

                </div></td>
              </tr>
              <tr>
                <td><div align="center">

                </div></td>
                <td><div align="center">

                </div></td>
                <td><div align="center">

                </div></td>
              </tr>
            </table>
            <p><strong><font color="#9900CC" size="3" face="Arial, Helvetica, sans-serif"></font></strong></p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>