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

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Customize 
  Our Order Page</strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr> 
    <td width="71%" align="left" valign="top"><p><font size="3" face="Arial, Helvetica, sans-serif"><strong> 
        Make our order page look like your site!</strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">If your web site is 
        seeing lots of traffic and receiving many orders for the timer, we will 
        be glad to work with you on a custom ordering page.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">The order page will 
        look like your site, but we still take and ship the order. This way customers 
        feel as if they are ordering from you and not us.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Here's how it works:</font></p>
      <ul>
        <li><font size="2" face="Arial, Helvetica, sans-serif">We make the order 
          page look like your site</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Your customer places 
          an order</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Your customer is 
          then sent back to a specified page on your site</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">We ship the product 
          and send email confirmation to your customer</font></li>
      </ul>
      <p><font size="2" face="Arial, Helvetica, sans-serif">If you are interested, 
        <a href="contactus.php">contact us</a> and we will be glad to work with 
        you.</font></p></td>
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
              </font><font face="Arial, Helvetica, sans-serif"> <a href="#">&gt; 
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
