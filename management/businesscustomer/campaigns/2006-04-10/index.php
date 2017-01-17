<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../../../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Marketing
      Campaign - April 11-12, 2006 </strong></font></p>
<p>&nbsp;</p>
<ul>
  <li>
    <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="TPRIndex.php">Princeton
          Review letters</a></font></p>
  </li>
  <li>
    <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="KaplanIndex.php">Kaplan
          letters</a></font></p>
  </li>
</ul>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="left">&nbsp;</p>

  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
mysql_close($link);


// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";
// has links that show up at the bottom in it - found in home management folder
require "../../../include/footerlinks.php";



// finishes security for page
}
else
{
?>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>