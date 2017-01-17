<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
		
// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";
		

?>
<p><font color="#003399"><strong><font size="5" face="Arial, Helvetica, sans-serif">Import NACSCORP Reports</font></strong></font></p>
<p>&nbsp;</p>
<ol>
  <li><font size="3" face="Arial, Helvetica, sans-serif"> Save as &quot;<strong>nacscorp.csv</strong>&quot;</font></li>
  <li><font size="3" face="Arial, Helvetica, sans-serif">Change Ship Date and Report Date to this format: 0000-00-00</font></li>
  <li><font size="3" face="Arial, Helvetica, sans-serif">No headings</font></li>
</ol>
<p>&nbsp;</p>
<p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.silenttimer.com/ship/import_nacscorp.php" target="_blank"><strong>Import Report
        (opens new link) </strong></a></font></p>
<p align="center"><font size="2" face="Arial, Helvetica, sans-serif">The page will tell you if there is a new store. </font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// finishes security for page
}
else
{
?>
</p>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>