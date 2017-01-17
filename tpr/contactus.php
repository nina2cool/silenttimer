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
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

			<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Contact 
              Us</font></strong></p>
            <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Feel 
              free to contact us with any questions you might have. Email is easiest, 
              and we will reply to you quickly.</font></p>
            <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Email</strong><br>
              <a href="mailto:info@silenttimer.com">info@SilentTimer.com</a></font></p>
            
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Phone<br>
  </strong>(512) 542 - 9981</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Information</strong></font>
</p><table width="400" border="0" cellspacing="0" cellpadding="3">
  <tr> 
    <td><font size="2" face="Arial, Helvetica, sans-serif">Erik McMillan</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="mailto:erik@silenttimer.com?subject=The%20Silent%20Timer">erik@silenttimer.com</a></font></td>
  </tr>
  <tr> 
    <td><font size="2" face="Arial, Helvetica, sans-serif">Mark Blecher</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="mailto:mark@silenttimer.com?subject=The%20Silent%20Timer">mark@silenttimer.com</a></font></td>
  </tr>
  <tr> 
    <td><font size="2" face="Arial, Helvetica, sans-serif">Christina Dilly</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="mailto:nina@silenttimer.com?subject=The%20Silent%20Timer">nina@silenttimer.com</a></font></td>
  </tr>
</table>
            
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Address</strong><br>
  Silent Technology LLC<br>
  3111 Tom Green Street<br>
  Suite #310<br>
  Austin, TX 78705</font></p>
            <p align="left">&nbsp;</p>
            

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>