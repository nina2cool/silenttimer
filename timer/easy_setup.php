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

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><a name="top"></a>Easy
Setup </strong></font></p>


<p align="right"><a href="functions_2005.php"><strong><font size="2" face="Arial, Helvetica, sans-serif">&lt; Back
to Functions Home Page</font></strong></a></p>
<p align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" face="Times New Roman, Times, serif">THE
          SILENT TIMER</font>&#8482;</strong></font><font size="2" face="Arial, Helvetica, sans-serif"> can
          look intimidating to use with all of the buttons, but it is actually
          very intuitive and easy to use. Just play around with it before
          you start using so that you are aware of all of its <a href="features.php">features</a> and
          how it works. It does have some more complicated features
  that just need to be practiced with.<br>
        </font></p>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td rowspan="2"><p align="left"><strong><font size="3" face="Arial, Helvetica, sans-serif">The
            steps to set up your Silent Timer are outlined below:</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> <em><br>
            (make
            sure you have properly installed your battery before you begin) </em></font></p>
      <ol>
        <li>
          <p><font size="3" face="Arial, Helvetica, sans-serif"> Press &ldquo;MODE&rdquo; until
          you see: </font></p>
        </li>
        <p> <font size="3"><img src="pics/LCD-first-test-mode.jpg" alt="Test Setup Mode" width="171" height="87"><br>
          </font>
        </p>
        <li>
          <p><font size="3" face="Arial, Helvetica, sans-serif"> Press &ldquo;TIME&rdquo;,
              enter test time.<br>
          </font></p>
        </li>
        <li>
          <p><font size="3" face="Arial, Helvetica, sans-serif"> Press &ldquo;#
              of Q&rsquo;s&rdquo;, enter <a href="features.php#6" target="_blank">number of questions</a>.<br>
          </font></p>
        </li>
        <li>
          <p><font size="3" face="Arial, Helvetica, sans-serif"> Press &ldquo;Start/Stop&rdquo;.<br>
          </font></p>
        </li>
        <li>
          <p><font size="3" face="Arial, Helvetica, sans-serif"> Press red button
          after finishing each question.</font><font size="3" face="Arial, Helvetica, sans-serif"><br>
          </font></p>
        </li>
      </ol>
      <p><font size="3" face="Arial, Helvetica, sans-serif"> <em>Optional functions:</em></font></p>
      <blockquote>
        <p><font size="3" face="Arial, Helvetica, sans-serif">Press &ldquo;LIGHT&rdquo; to
                      turn warning <a href="features.php#2" target="_blank">light</a> on/off.<br>
          </font> <font size="3" face="Arial, Helvetica, sans-serif">Press &ldquo;SET&rdquo; to
                    switch to <a href="features.php#5" target="_blank">Count
                    Up</a>.<br>
          </font><font size="3" face="Arial, Helvetica, sans-serif">Press &ldquo;AUTO&rdquo; to
                    enable <a href="features.php#7" target="_blank">Auto Mode</a>.<br>
        </font></p>
    </blockquote></td>
    <td><p align="center"><a href="functions_detail.php"><img src="pics/buttons-right.jpg" alt="Keypad - Find out more!" width="250" height="188" border="0"></a></p>
    </td>
  </tr>
  <tr>
    <td>      <p align="center"><a href="functions_detail.php"><img src="pics/lcd_close_small2.jpg" alt="LCD Screen - Learn more!" width="250" height="187" border="0"></a></p>      </td>
  </tr>
</table>
<br>
<table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFCC">
  <tr>
    <td><div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif">USE OUR <a href="demo.php">ONLINE
    DEMO</a> AND SEE FOR YOURSELF! </font></strong></div></td>
  </tr>
</table>
<form name="form1" method="post" action="http://www.silenttimer.com/product.php">
  <div align="center">
    <input type="submit" name="Submit" value="ORDER YOUR TIMER TODAY!">
  </div>
</form>
<p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><br>
</font> </strong></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Read more about</font> <font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" size="2" face="Times New Roman, Times, serif">THE
SILENT TIMER</font><font color="#000000">&#8482;</font></strong></font>:</p>
<ul>
  <li>
    <p><font color="#CC0000" size="4" face="Arial, Helvetica, sans-serif"><a href="why_silent_timer.php">Why
          use The Silent Timer&#8482;?</a></font></p>
  </li>
  <li>
    <p><font color="#CC0000" size="4" face="Arial, Helvetica, sans-serif"><a href="summary.php">Summary</a></font></p>
  </li>
  <li>
    <p><font color="#CC0000" size="4" face="Arial, Helvetica, sans-serif"><a href="features.php">Feature
          Overview</a></font></p>
  </li>
  <li><font color="#CC0000" size="4" face="Arial, Helvetica, sans-serif"><a href="faq.php">FAQ</a></font></li>
</ul>
<p align="left">&nbsp; </p>
<p align="left">&nbsp;</p>

  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>