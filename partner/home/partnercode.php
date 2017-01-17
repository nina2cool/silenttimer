<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

$PageTitle = "Silent Timer Partner - Link Examples";

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

<? $aID = $_SESSION['a']; ?>

<link href="../../code/style.css" rel="stylesheet" type="text/css">


			
<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Your 
  Partner Code</font></strong></p>
            
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">This code is 
  important. It is the key to getting credit for each timer your web site sells. 
  It must be added to the end of each link that goes to our site.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Your 
  code is:</strong></font></p>
<p align="left"><font color="#CC0000" size="6" face="Arial, Helvetica, sans-serif"><strong><? echo $aID;?></strong></font></p>
<p align="left"><br>
  <font size="2" face="Arial, Helvetica, sans-serif">Here is an example of using 
  your partner code to send a visitor to our site:</font></p>
<p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong>http://www.silenttimer.com?a=<? echo $aID;?></strong></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="linkshelp.php"><strong>Click 
  here to learn details about linking to us and receiving credit for your sales</strong></a><strong>.</strong></font></p>
<p align="left">&nbsp;</p>
<p align="left"><br>
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
            
