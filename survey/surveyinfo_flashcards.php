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

		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
?>

		<p><font face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="5">Flashcards
		        Marketing Survey Information </font></strong></font></p>
		<table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#53FF7E">
          <tr>
            <td><strong><font size="3" face="Arial, Helvetica, sans-serif">Take
                  the <a href="survey_flashcards.php">survey</a> and enter yourself
            in a monthly drawing for a $50 gift certificate!</font></strong></td>
          </tr>
        </table>
		<p><font size="2" face="Arial, Helvetica, sans-serif">All we need is your name
		    and a valid email address.</font></p>
		<p><font size="2" face="Arial, Helvetica, sans-serif">Drawings are held on the last day of each month, and the winner will be
		  notified via email within 3 business days.</font></p>
		<p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Winners get their
		      choice of vendor: <a href="http://www.starbucks.com" target="_blank">Starbucks</a>,
		    <a href="http://www.bestbuy.com" target="_blank">Best Buy</a>, <a href="http://www.bedbathandbeyond.com" target="_blank">Bed
		  Bath &amp; Beyond</a>, <a href="http://www.blockbuster.com" target="_blank">Blockbuster</a>,
		  <a href="http://www.bn.com" target="_blank">Barnes and Noble</a>, and <a href="http://www.borders.com" target="_blank">Borders</a>. </strong></font></p>
		<p><font size="2" face="Arial, Helvetica, sans-serif">There is only one winner
		    each month. You are only eligible for the drawing in the month in
		    which you participated in the survey. You cannot win more than once;
		    submitting multiple surveys will invalidate the duplicate surveys.</font></p>
		<p><font size="2" face="Arial, Helvetica, sans-serif">The purpose of the survey
		    is to get some information about how students study with flashcards.
		    Understanding our customers will allow us to focus on what's important.</font></p>
		<p><font size="2" face="Arial, Helvetica, sans-serif">Your information is kept
	      private and not shared with anyone else.</font></p>
		<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>If you have any questions, please email us at <a href="mailto:info@silenttimer.com?subject=Survey%20Question">info@silenttimer.com</a>.</strong></font></p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
           
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
		mysql_close($link);
		
// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>
    
