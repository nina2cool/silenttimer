<?
//security for page
session_start();

$PageTitle = "The Silent Timer - Retail Box";

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

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>The 
  Retail Box</strong></font></p>
	
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Look for this
     box design in <a href="http://service.bfast.com/bfast/click?bfmid=2181&sourceid=41141421&bfpid=0975350307&bfmtype=book" target="_blank">Barnes 
  &amp; Noble</a>, <a href="http://bordersstores.com/search/title_detail.jsp?id=55720474&srchTerms=silent+timer&mediaType=1&srchType=Keyword" target="_blank">Borders</a>,
  your local campus bookstore, <a href="http://www.ebay.com" target="_blank">eBay</a>,
   and other retail locations. ISBN: 0-9753503-0-7. The Silent Timer for SAT/ACT
  has a different ISBN: 0-9753503-1-5. </font></p>
<p align="center"><img src="pics/Retail_2005box.jpg" alt="Get your timer today!" width="420" height="500"></p>
<p align="center">&nbsp;</p>
<p align="left">
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
	