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

			<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Recommended
            Books</font></strong></p>
            

            <p><font size="2" face="Arial, Helvetica, sans-serif">These books
                are recommended by our previous customers as good resources when
                studying for various tests. If you have one you'd like to add,
                email us at <a href="mailto:info@silenttimer.com?subject=Book%20Suggestion">info@silenttimer.com</a>. </font></p>
            <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
              <tr>
                <td><div align="center">
<iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0721603475&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                </div></td>
                <td><div align="center">
<iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0471668486&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                </div></td>
                <td><div align="center">
<iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=088685203X&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                </div></td>
              </tr>
              <tr>
                <td><div align="center">
<iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0743241495&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                </div></td>
                <td><div align="center">
<iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0768922283&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                </div></td>
                <td><div align="center">
<iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0781728347&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                </div></td>
              </tr>
            </table>
            <p><strong><font color="#9900CC" size="3" face="Arial, Helvetica, sans-serif"></font></strong></p>
            <p>&nbsp;</p>
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>