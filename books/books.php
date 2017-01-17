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
                <td bgcolor="#FFCC66"><strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">Recommended
                Study Guides </font></strong></td>
              </tr>
              <tr>
                <td><p><font face="Arial, Helvetica, sans-serif"><strong><a href="http://www.mcssl.com/app/aftrack.asp?AFID=167299&u=www.pcat-test.com"><font size="3"><br>
                PCAT
                        Secrets Study Guide </font></a> </strong><font size="2">-
                  How to Ace the PCAT by Morrison Media LLC </font></font></p>
                <p><font face="Arial, Helvetica, sans-serif"><strong><a href="http://www.mcssl.com/app/aftrack.asp?AFID=167299&u=www.mo-media.com/naplex" target="_blank"><font size="3">NAPLEX
                          Secrets Study Guide </font></a> </strong><font size="2">-
                  How to Ace the NAPLEX by Morrison Media LLC </font></font></p>
                <p><font face="Arial, Helvetica, sans-serif"><strong><a href="http://www.mcssl.com/app/aftrack.asp?AFID=167299&u=www.dat-test.com" target="_blank"><font size="3">DAT
                          Secrets Study Guide </font></a> </strong><font size="2">-
                  How to Ace the DAT by Morrison Media LLC </font></font></p>
                <p><font face="Arial, Helvetica, sans-serif"><strong><a href="http://www.mcssl.com/app/aftrack.asp?AFID=167299&u=www.nclex-test.com" target="_blank"><font size="3">NCLEX
                          Secrets Study Guide </font></a> </strong><font size="2">-
                  How to Ace the NCLEX by Morrison Media LLC </font></font></p>
                <p><font face="Arial, Helvetica, sans-serif"><strong><a href="http://www.mcssl.com/app/aftrack.asp?AFID=167299&u=www.toefl-secrets.com" target="_blank"><font size="3">TOEFL
                          Secrets Study Guide </font></a> </strong><font size="2">-
                  How to Ace the TOEFL by Morrison Media LLC </font></font></p>
                <p><font face="Arial, Helvetica, sans-serif"><strong><a href="http://www.mcssl.com/app/aftrack.asp?AFID=167299&u=www.cpaexamsecrets.com" target="_blank"><font size="3">CPA
                          Exam 
                          Secrets Study Guide </font></a> </strong><font size="2">-
                  How to Ace the CPA Exam by Morrison Media LLC </font></font></p>
                <table width="56%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
                  <tr>
                    <td bgcolor="#FFFFCC"><font face="Arial, Helvetica, sans-serif"><font size="4"><a href="../studyguides.php">MORE STUDY GUIDES FROM MORRISON MEDIA LLC</a></font><font size="2"><br />
                    </font></font></td>
                  </tr>
                </table>
              </td>
              </tr>
              <tr>
                <td bgcolor="#FFCC66"><strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">Recommended
                Books</font></strong></td>
              </tr>
              <tr>
                <td><p align="center">&nbsp;<iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=20&l=qs1&f=ifr" width="120" height="90" frameborder="0" scrolling="no"></iframe></p>
                  <table width="100%"  border="0" cellpadding="5" cellspacing="5">
                  <tr>
                    <td><div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif">NCLEX-RN<br>
                                <iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0721603475&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                    </font></strong></div></td>
                    <td><div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif">CPA
                            Exam<br>
                                <iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0471668486&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                    </font></strong></div></td>
                    <td><div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif">TOEFL<br>
                                <iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=088685203X&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                    </font></strong></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif">DAT<br>
                                <iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0743241495&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                    </font></strong></div></td>
                    <td><div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif">PCAT<br>
                                <iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0768922283&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                    </font></strong></div></td>
                    <td><div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif">NAPLEX<br>
                                <iframe src="http://rcm.amazon.com/e/cm?t=thesilenttime-20&o=1&p=8&l=as1&asins=0781728347&=1&fc1=000000&IS2=1&&#108;&#116;1=_blank&lc1=0000ff&bc1=000000&bg1=ffffff&f=ifr" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
                    </font></strong></div></td>
                  </tr>
                </table></td>
              </tr>
            </table>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
            <p><font size="2" face="Arial, Helvetica, sans-serif">If you have
            one you'd like to add, email us at <a href="mailto:info@silenttimer.com?subject=Book%20Suggestion">info@silenttimer.com</a>.</font></p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>