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
?>

			<p><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="index.php">Back
	        to Books &amp; Study Guides</a></font> </p>
			<table width="100%"  border="0" cellspacing="0" cellpadding="8">
              <tr>
                <td bgcolor="#CC66FF"><strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">Recommended
                GRE Study Guides</font></strong></td>
              </tr>
              <tr>
                <td><p><br>
                  <font face="Arial, Helvetica, sans-serif"><strong><a href="http://www.mcssl.com/app/aftrack.asp?AFID=167299&u=www.gre-secrets.com" target="_blank"><font size="3">GRE
                          Secrets Study Guide </font></a> </strong><font size="2">-
                How to Ace the GRE by Morrison Media LLC </font></font><br>
                <br>
                </p>
                </td>
              </tr>
              <tr>
                <td bgcolor="#CC66FF"><strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">Recommended
                GRE Books</font></strong></td>
              </tr>
              <tr>
                <td><p align="center">&nbsp;<iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=20&l=qs1&f=ifr" width="120" height="90" frameborder="0" scrolling="no"></iframe></p>
                  <table width="100%"  border="0" cellpadding="5" cellspacing="5" bordercolor="#CCCCCC">
                  <tr>
                    <td><div align="center">
                        <iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0743241304&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                    </div></td>
                    <td><div align="center">
                        <iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0764554735&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                    </div></td>
                    <td><div align="center">
                        <iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0764132709&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                    </div></td>
                  </tr>
                  <tr>
                    <td><div align="center">
                        <iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0764117823&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                    </div></td>
                    <td><div align="center">
                        <iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0375764755&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                    </div></td>
                    <td><div align="center">
                        <iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0743265440&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                    </div></td>
                  </tr>
                </table>                  
                <p></td>
              </tr>
            </table>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
            <p><font size="2" face="Arial, Helvetica, sans-serif">If you have
            one you'd like to add, email us at <a href="mailto:info@silenttimer.com?subject=GRE%20Book%20Suggestion">info@silenttimer.com</a>.</font></p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>