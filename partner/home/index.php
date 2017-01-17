<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

$PageTitle = "Silent Timer Partner - Home";

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

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Welcome, 
  <font color="#003399"><? echo $CompanyName;?></font>!</strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td width="71%" align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>This 
          is your Partner Site. Navigate the site using the links to the right and 
          left.</strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">You know how important 
        time management and pacing strategies are to scoring well on standardized 
        exams. By passing this knowledge on to your students, they will be better 
        prepared for their tests and score higher by utilizing good time control.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">For each timer a student 
        buys, your account is credited. <a href="getstarted.php">Find out how 
        this process works</a>. You will receive a check at the start of each 
        month, as long as you have at least $25 in your account.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">When logged into your 
        account you may download images, see how many sales you have made, view 
        your commission amount, see when you are paid and much more. Use the links 
        on the right and left of this page to explore the site.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">If you have any questions, 
        please feel free to <a href="contactus.php">contact us</a> or offer any 
        <a href="suggestion.php">suggestions</a> to help us improve our service 
        to you. We will help you in any way possible.</font></p>
      <p>&nbsp;</p></td>
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
          <td align="left" valign="top"> <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="links.php">&gt; 
              Create your own Links</a></strong></font><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"></font></strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="linkstext.php"><br>
              &gt; Text Links</a><br>
              <a href="linkspictures.php">&gt; Images and Banners</a></strong></font><font size="2"><strong><font color="#003399" face="Arial, Helvetica, sans-serif"><br>
              </font><font face="Arial, Helvetica, sans-serif"> <a href="customize.php">&gt; 
              Customize Our Order Page</a></font></strong></font></p>
            <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">
              </font></strong></p>
          </td>
        </tr>
        <tr> 
          <td><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">Run Reports</font></strong></td>
        </tr>
        <tr> 
          <td align="right" bgcolor="#000000"><img src=../../pics/transparent-pixel.gif width=1 height=1 vspace=0 hspace=0></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><a href="reports/index.php"><strong>&gt; 
            Click Here</strong></a></font> 
            <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">
              </font></strong></p>
          </td>
        </tr>
        <tr> 
          <td><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">Your 
            Account</font></strong></td>
        </tr>
        <tr>
          <td align="right" bgcolor="#000000"><img src=../../pics/transparent-pixel.gif width=1 height=1 vspace=0 hspace=0></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><a href="profile.php"><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; 
            Update Profile</strong></font></a></td>
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
