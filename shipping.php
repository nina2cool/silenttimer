<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> 
<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Shipping 
  and Returns</font></strong></p>
<p align="left"><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>Shipping 
  FAQ</strong></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>When 
  will my order be shipped?</strong></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"> Domestic orders 
  received before 4:00 PM CST will be shipped out the same business day. International 
  orders will ship out the next business day. Any orders received after this time 
  will go out the next business day.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Who 
  is your shipping carrier?</strong></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">DHL is currently 
  our shipping carrier for all domestic packages (except HI and AK) and our air 
  international packages. You can track DHL shipments on their website using a 
  tracking number. USPS ships to HI, AK, and all ground international packages. 
  Tracking is not available with USPS.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>How 
  do I know when my order is shipped?</strong></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"> A tracking 
  number is sent to you via email the day it is shipped out. You can track DHL 
  shipments on their website using a tracking number. Although tracking is not 
  available with USPS for international orders, you will still receive an email 
  confirming shipment.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>How 
  long will it take?</strong></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"> Use the following 
  map for an estimated travel time. For a more accurate estimate, you can go to 
  the DHL website and enter your zip code as the destination code and 78726 as 
  the origin zip code.</font></p>
<p align="center"><img src="images/Transit%20Map.jpg" width="640" height="426"></p>
<p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Returns</strong></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">If you would 
  like to return your timer for any reason, please <a href="mailto:info@silenttimer.com?subject=Silent%20Timer%20Returns">contact 
  us</a> for details on how to do this.</font></p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left"> 
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
