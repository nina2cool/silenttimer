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

$CategoryID = $_GET['cat'];

$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");
	
	//grab customers and information that have NOT been shipped, and that need to be.
	

$sql = "SELECT * FROM tblCategory WHERE CategoryID = '$CategoryID'";
$result = mysql_query($sql) or die("Cannot get category name.");

while($row = mysql_fetch_array($result))
{
$CategoryName = $row[Name];
}


?> 
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><a name="top"></a></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><font color="#003399" size="5"><strong><?php echo $CategoryName; ?></strong></font></font> <font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>FAQ</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">If you still need more
    help or information after browsing through the site, don't hesitate to <a href="../contactus.php">contact
    us</a> at any time. We even have AOL instant messenger (screen name: SilentTimer)
so that we may serve you better!</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="faq3.php">Back
to FAQ Home Page</a></font></p>
<hr noshade>
<p><font size="2" face="Arial, Helvetica, sans-serif"><font color="#003399" size="4"><a name="General"></a></font></font><font size="2" face="Arial, Helvetica, sans-serif"><font color="#003399" size="4"><strong><font color="#000000" size="2">Choose
a question below:</font></strong></font></font></p>
<ol>
  
  <font size="2" face="Arial, Helvetica, sans-serif">
  <?

	$sql = "SELECT * FROM tblFAQ WHERE CategoryID = '$CategoryID' AND Status = 'active' ORDER BY Question";
	$result = mysql_query($sql) or die("Cannot execute query");

	while($row = mysql_fetch_array($result))
	{
			$Question = $row[Question];
			$Answer = $row[Answer];
			$CategoryID = $row[CategoryID];
			$Status = $row[Status];
			$FAQID = $row[FAQID];
			
			$sql2 = "SELECT * FROM tblCategory WHERE CategoryID = '$CategoryID'";
			//echo $sql2;
			
			$result2 = mysql_query($sql2) or die("Catgegory info cannot get");

			while($row2 = mysql_fetch_array($result2))
			{
			$CategoryName = $row2[Name];
			

?>

  </font>
  <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#<? echo $FAQID; ?>"><?php echo $Question; ?></a></font></li>
  <font size="2" face="Arial, Helvetica, sans-serif">
  <?

}
}

?>
  </font>
</ol>

<hr noshade>
<br>
<table width="100%" border="0" cellpadding="8" cellspacing="0">
<?


	$sql = "SELECT * FROM tblFAQ WHERE CategoryID = '$CategoryID' AND Status = 'active' ORDER BY Question";
	//echo $sql;

	$result = mysql_query($sql) or die("Cannot execute query");

	while($row = mysql_fetch_array($result))
	{
			$Question = $row[Question];
			$Answer = $row[Answer];
			$CategoryID = $row[CategoryID];
			$Status = $row[Status];
			$FAQID = $row[FAQID];


?>


  <tr>
  
    <td bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="<? echo $FAQID; ?>" id="<? echo $FAQID; ?>"></a><?php echo $Question; ?></strong></font></td>
    <td bgcolor="#003399"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></td>
  </tr>
  <tr>
    <td colspan="2"><p><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Answer; ?></font></p>
        <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^
                Back to Top</font></strong></a></p></td>
  </tr>

<?

}

?>  
  
  
</table>
<hr noshade>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="faq3.php">Back
  to FAQ Home Page<br>
  <br>
  <br>
  </a></font>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);


// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>
</p>
