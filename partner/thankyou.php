<?
//security for page
session_start();

$PageTitle = "Silent Timer Partner - Contact Us";

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
<?
$name = $_GET['n'];
?>
			
<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Thank 
  you!</font></strong></p>
            
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Thank 
  you for taking the time to complete our Partner Application.</strong></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $name;?>,</font></p>
<p align="left"><font size='2' face='Arial, Helvetica, sans-serif'>You are now 
  one step closer to both helping your students increase their test scores and 
  earning money for your company. I would like to personally thank you for becoming 
  a partner in our mission to help students increase their time management skills.</font> 
</p>
<p align='left'><font size="2" face="Arial, Helvetica, sans-serif">An email has 
  automatically been sent to confirm your registration. Verify that the information 
  you entered is correct. If any information is incorrect, update it by <a href="login.php">logging 
  in</a> to the Partner Site.</font></p>
<p align='left'><font size="2" face="Arial, Helvetica, sans-serif">We will contact 
  you within 24 hours to complete your account activation. At that time I will 
  let you know how much commission you will earn per sale. I will also explain 
  the program and show you how to get your web site set up for timer sales. The 
  process is extremely simple, and you have complete control of your account from 
  our online partner site.</font></p>
<p align='left'><font size="2" face="Arial, Helvetica, sans-serif">In the meantime, 
  you may log into your account with your user name and password. Explore the 
  Partner Site for cool images, banners, and text links. While logged in, check 
  out the features of your site. <a href='login.php'>Access your login here</a>.</font></p>
<p align='left'><font size='2' face='Arial, Helvetica, sans-serif'>I look forward
     to speaking with you. If you need to contact me, feel free to email me at <a href='mailto:erik@silenttimer.com'>erik@silenttimer.com</a>,
  or call 512-340-0338.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Thank you again,</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Sincerely,</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../inventors.php">Erik 
  McMillan</a></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
  <em>President</em><br>
  Silent Technology LLC<br>
  <a href="http://www.SilentTimer.com">http://www.SilentTimer.com</a><br>
  512-340-0338</font></p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
            

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>