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
	
	//grab customers and information that have NOT been shipped, and that need to be.
	
	


?> 
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><a name="top"></a>Frequently 
  Asked Questions</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">This section will help
    answer some of your questions. Click on the link corresponding to the nature
    of your question.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">If you still need more
    help or information after browsing through the site, don't hesitate to <a href="../contactus.php">contact
    us</a> at any time. We even have AOL instant messenger (screen name: SilentTimer)
    so that we may serve you better!</font></p>
<hr noshade>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><p><font size="2" face="Arial, Helvetica, sans-serif">Click on a category
          below to view the FAQ: </font> </p>
      <ul>
        <font size="2" face="Arial, Helvetica, sans-serif">
        <?

	$sql = "SELECT * FROM tblCategory WHERE Type = 'FAQ' AND Status = 'active' ORDER BY Priority";
	$result = mysql_query($sql) or die("Cannot execute query");

	while($row = mysql_fetch_array($result))
	{
			$CategoryName = $row[Name];
			$CategoryID = $row[CategoryID];
			
			

?>
        </font>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="faq2.php?cat=<? echo $CategoryID; ?>"><?php echo $CategoryName; ?></a></font></li>
        <font size="2" face="Arial, Helvetica, sans-serif">
        <?

}


?>
        </font>
    </ul></td>
    <td><div align="center"><img src="../gallery/pics/small/light-desk-cool-back.jpg" width="200" height="150"></div></td>
  </tr>
</table>
<hr noshade>
<p align="left">&nbsp;</p>
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);


// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>