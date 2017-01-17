<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

$PageTitle = "Silent Timer Partner - Create Links";

//security check
If (session_is_registered('a'))
{

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	//get name of person/company	
	$aID = $_SESSION['a'];
	
	#connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			
		
	$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$aID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
			
	while($row = mysql_fetch_array($result))
	{
		$CompanyName = $row[CompanyName];
	}
	
	mysql_close($link);
?>

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Creating 
  Links</strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td width="71%" align="left" valign="top"><p><font size="3" face="Arial, Helvetica, sans-serif"><strong> 
        <br>
        Creating your partner link to us is as easy as 1-2-3!</strong></font></p>
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr align="left" valign="top"> 
          <td width="3%"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">1.</font></div></td>
          <td width="97%"><font size="2" face="Arial, Helvetica, sans-serif">Find 
            a page on our site that you would like to send your timer visitors.</font></td>
        </tr>
        <tr align="left" valign="top"> 
          <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">2.</font></div></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">Add your affiliate 
            code (<strong><font color="#000000"><? echo $aID;?></font></strong>) 
            to the end of the link. Example: <strong><font color="#CC0000">http://www.SilentTimer.com/order?a=<? echo $aID;?></font></strong></font></td>
        </tr>
        <tr align="left" valign="top"> 
          <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">3.</font></div></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">Download some 
            nice <strong><font color="#000066">SILENT TIMER</font></strong>&#8482; 
            <a href="linkspictures.php">pictures</a>.</font></td>
        </tr>
      </table>
      <p><font size="2" face="Arial, Helvetica, sans-serif">That's it. Now select 
        a page on your site where you want to sell timers. Put up a couple of 
        cool pictures and mention how important time management is to doing well 
        on your students' tests. The better your pitch is, the more timers your 
        students will buy.</font></p>
      <p><font size="3" face="Arial, Helvetica, sans-serif"><strong><br>
        <br>
        Choose the type of link you would like to use on your site.</strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Text and Email Links 
        are test-based and can be used in emails or in text in place of images. 
        Banners &amp; Images are image-based links and great for advertisements.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="linkstext.php"><strong>&gt; 
        Text &amp; Email links<br>
        </strong></a><strong><a href="linkspictures.php">&gt; Banners &amp; Images</a></strong></font></p>
      <p><font size="3" face="Arial, Helvetica, sans-serif"><strong> <br>
        <br>
        Still confused about how to create links?</strong></font><br>
        <br>
        <font size="2" face="Arial, Helvetica, sans-serif">We have developed a 
        <a href="linkshelp.php">page dedicated to creating links</a> and it lists 
        more explicit, detailed instructions. As always, if you need further assistance, 
        don't hesitate to <a href="contactus.php">contact us</a>. We are here 
        to help.</font></p>
    </td>
    <td width="29%" align="left" valign="top" bgcolor="#FFFFCC"> 
      <table width="100%" border="0" cellspacing="6" cellpadding="0">
        <tr> 
          <td><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">Create 
            Links</font></strong></td>
        </tr>
        <tr> 
          <td align="right" bgcolor="#000000"><img src=../../pics/transparent-pixel.gif width=1 height=1 vspace=0 hspace=0></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
              <a href="linkspictures.php">&gt; Images and Banners</a></strong></font><font size="2"><strong><font color="#003399" face="Arial, Helvetica, sans-serif"><br>
              </font><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="linkstext.php">&gt; 
              Text Links</a></strong></font><font color="#003399" face="Arial, Helvetica, sans-serif"> 
              <br>
              </font><font face="Arial, Helvetica, sans-serif"> <a href="customize.php">&gt; 
              Customize Our Order Page</a></font></strong></font></p>
            <p>&nbsp;</p></td>
        </tr>
        <tr> 
          <td><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">Links 
            Help </font></strong></td>
        </tr>
        <tr> 
          <td align="right" bgcolor="#000000"><img src=../../pics/transparent-pixel.gif width=1 height=1 vspace=0 hspace=0></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><a href="linkshelp.php"><strong>&gt; 
            Detailed link help</strong></a></font> 
            <p>&nbsp;</p></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
<p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
	$http .= "partner";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>
</p>
