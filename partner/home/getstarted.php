<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

$PageTitle = "Silent Timer Partner - Getting Started";

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
			
<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Getting 
  Started </font></strong></p>
            
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Setting up 
  your web site to sell <strong><font color="#000099" face="Times New Roman, Times, serif"><a href="http://www.silenttimer.com" target="_blank">THE 
  SILENT TIMER</a></font><a href="http://www.silenttimer.com">&#8482;</a></strong> 
  is easy. Link to us from your site with your special link code (<strong><? echo $aID;?></strong>), 
  and we will credit your account for every timer your visitors purchase. At the 
  beginning of each month, we will send you a check for your commission on each 
  timer you have sold.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>The 
  steps below describe how to get started:</strong><br>
  </font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr> 
    <td width="8%" bgcolor="#003399"> 
      <p align="left"><strong><font color="#FFFFFF" size="5" face="Arial, Helvetica, sans-serif"># 
        1</font><font size="2" face="Arial, Helvetica, sans-serif"><br>
        </font></strong></p></td>
    <td width="92%" bgcolor="#FFFFCC"><strong><font size="3" face="Arial, Helvetica, sans-serif">Talk 
      about the Importance of Using a Timer</font></strong></td>
  </tr>
  <tr> 
    <td colspan="2"><p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Some 
        students don't know how difficult the time constraint is for an exam. 
        If they fail to practice under timed conditions, they might have a big 
        surprise on test day. Let your visitors know how important having a good 
        timer is for practicing for their test. Then, mention a few of our timer's 
        cool features and how it can help them master time management. You can 
        include a picture for added effect. <a href="linkexamples.php">Click here 
        for a sample timer link page</a>.<br>
        <br>
        </font></p></td>
  </tr>
  <tr> 
    <td width="8%" bgcolor="#003399"> 
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FFFFFF" size="5"># 
        2</font><br>
        </strong></font></p></td>
    <td width="92%" bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3">Pick 
      your Timer Images or Banners</font></strong></font></td>
  </tr>
  <tr> 
    <td colspan="2"><p align="left"><font size="2" face="Arial, Helvetica, sans-serif">We 
        have a nice selection of images you can use on your site. Browse our selection 
        and find the ones you like. Use them on your website to advertise the 
        timer or even link to our site. <a href="linkspictures.php">Find the images 
        and banners here</a>.<br>
        <br>
        </font></p></td>
  </tr>
  <tr> 
    <td width="8%" bgcolor="#003399"> 
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FFFFFF" size="5"># 
        3</font></strong><br>
        </font></p></td>
    <td width="92%" bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3">Create 
      your Link to our Site</font></strong></font></td>
  </tr>
  <tr> 
    <td colspan="2"><p align="left"><font size="2" face="Arial, Helvetica, sans-serif">In 
        order for us to know that you sent a customer from your site, you must 
        include your Partner Code in your link. It is extremely easy to build 
        your link to any page on our site, <a href="linkshelp.php">click here 
        for details</a>. Find a page on our site that you want to send your visitor, 
        and then add &quot;?a=&quot; plus your partner code, <? echo $aID;?>. 
        By doing this, we are able to track your visitors and credit your account 
        for each purchase they make. For more links help, <a href="linkshelp.php">click 
        here</a>.</font></p>
      <blockquote> 
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Crediting 
          your Account<br>
          </strong>We take special measures to make sure you get credit for each 
          customer you send us. <em>Here is how it works:</em></font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">You 
          put a link on your site with your special code (<strong><? echo $aID;?></strong>), 
          that links to any page on <a href="http://www.silenttimer.com">SilentTimer.com</a>. 
          When your visitor arrives at our site, we look up your account, and 
          track the customer's movement through our site. If they buy a timer, 
          your account is credited for their purchase.</font></p>
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Extra 
          Sale Protection </strong><br>
          If a student from your site does not buy a timer on their first visit, 
          we place a cookie onto their computer. If that customer returns to our 
          site within a month, you still get credit for the sale. This way, if 
          a visitor wants to think about it first or do some research before they 
          buy, they can return to the site later and you still get credit for 
          their purchase.</font></p>
        <br>
      </blockquote></td>
  </tr>
  <tr> 
    <td width="8%" bgcolor="#003399"> 
      <p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong><font color="#FFFFFF" size="5"># 
        4</font><br>
        </strong></font></p></td>
    <td width="92%" bgcolor="#FFFFCC"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Receive 
      your Checks in the Mail</strong></font></td>
  </tr>
  <tr> 
    <td colspan="2"><p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><font size="2">At 
        the beginning of each month, we calculate your total commission from timer 
        sales for that payment period and send you a check along with your monthly 
        statement. You will receive a payment as long as you have at least $25 
        credit in your account.</font></font><br>
        <br>
      </p></td>
  </tr>
  <tr> 
    <td width="8%" bgcolor="#003399"><font size="3" face="Arial, Helvetica, sans-serif"><strong><font color="#FFFFFF" size="5"># 
      5</font></strong></font></td>
    <td width="92%" bgcolor="#FFFFCC"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Learn 
      to Use the Reporting Tools</strong></font></td>
  </tr>
  <tr> 
    <td colspan="2"><p><font size="2" face="Arial, Helvetica, sans-serif">We have 
        made it easy for you to track your sales and see how many students have 
        clicked through to our site from yours. On your reporting pages, you can 
        find statistics for everything about your account. <a href="reports/">Click 
        here to run a report</a>.</font></p>
      <p><br>
        <br>
      </p>
      </td>
  </tr>
</table>
<p align="left">
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
