<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

#This is the second post purchase survey created on October 26, 2005.


		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		$now = date("Y-m-d H:i:s");
		$IP = $_SERVER["REMOTE_ADDR"];
				
		?><title>BestFit Peer Survey - Complete</title>
		<p><font face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="5">BestFit Media Peer Review</font></strong></font></p>
        <p align="left">&nbsp;</p>
        <p align="left"><font size="3" face="Arial, Helvetica, sans-serif">Thank you! </font></p>
        <p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/survey/BFpeer2.php">Click here to review another peer.</a></font></p>
<p>&nbsp;</p>
<p align="left"><font face="Arial, Helvetica, sans-serif">
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
		mysql_close($link);
		
?>
            </font></p>
