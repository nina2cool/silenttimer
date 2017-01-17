<?
//security for page
session_start();

$PageTitle = "The Silent Timer Online Demo";

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
<p><strong><font size="5" face="Arial, Helvetica, sans-serif">The <font color="#000066" face="Times New Roman, Times, serif">SILENT 
  TIMER<font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></font> 
  Demo <br>
  </font></strong><font size="5" face="Arial, Helvetica, sans-serif"><font size="3"><em>-
  Read the directions, and then practice using a demo version of the real thing! </em></font></font></p>
<p align="left"><font color="#003399" size="4" face="Arial, Helvetica, sans-serif"><strong><em>HOW
        IT WORKS:</em></strong></font></p>
<table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFCC">
  <tr>
    <td width="3%"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>-</strong></font></div></td>
    <td width="97%"><font size="2" face="Arial, Helvetica, sans-serif">Press &quot;<strong>TIME</strong>&quot;,
        then enter your test time with the numbered keypad, the test memory buttons,
        or your keyboard.<em> (Enter hours, then minutes, then seconds: for 35 minutes,
        press &quot;0&quot; then &quot;3&quot; then &quot;5&quot;)</em></font></td>
  </tr>
  <tr>
    <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>-</strong></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Press &quot;<strong>#
          of Q's</strong>&quot;, then enter the number of questions with the
          keypad, or your keyboard.<em>      (Enter the tens digit, then the ones digit:
      for 25 questions, press &quot;2&quot; then &quot;5&quot;. </em></font></td>
  </tr>
  <tr>
    <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>-</strong></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Press &quot;<strong>Start</strong>&quot;</font></td>
  </tr>
  <tr>
    <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>-</strong></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Press the <font color="#FF0000"><strong>Red
            Button</strong></font> on top of the timer to move to the next question.
            <em>(You can also use the spacebar)</em></font></td>
  </tr>
  <tr>
    <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>-</strong></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Press &quot;<strong>SET</strong>&quot; if
        you would like to switch to count up mode</font></td>
  </tr>
  <tr>
    <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>-</strong></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Press &quot;<strong>LIGHT</strong>&quot; to
        turn the warning light on and off.</font></td>
  </tr>
</table>
<p>  <font color="#CC0000"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><em>This
  demo has all of the functionality as the actual timer; the only exceptions
  are Auto Mode and Passage Mode. Read more about the <a href="functions.php">features</a> of
The Silent Timer.</em></font></font></p>
<p align="center"><font size="2" face="Arial, Helvetica, sans-serif"> 
	  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="450" height="320">
		<param name="movie" value="../flashmovies/flash/onlinetimer.swf">
		<param name="quality" value="high">
		<embed src="../flashmovies/flash/onlinetimer.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="450" height="320"></embed></object>
	  </font></p>
	
<p align="center"><font size="2" face="Arial, Helvetica, sans-serif">Like this
test timer? <a href="<? echo $https;?>product.php">Buy it now!</a></font></p>
	
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="4"><em>Having 
  trouble?</em></font></strong><br>
  Having trouble seeing or using The Silent Timer demo? Make sure you have the 
  newest version of <a href="http://www.macromedia.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" target="_blank">Macromedia 
  Flash</a>, <a href="http://www.macromedia.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" target="_blank">get 
  it here</a>. To install the Flash Player, follow the instructions given to you 
  at this link: <a href="http://www.macromedia.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" target="_blank">click 
here</a>.<br>
</font></p>
<table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFCC">
  <tr>
    <td><strong><font size="2" face="Arial, Helvetica, sans-serif">If you have
          questions about how to use the timer, <a href="http://www.silenttimer.com/contactus.php">contact
    us</a> and let our excellent staff help you out.</font></strong></td>
  </tr>
</table>
<p align="left">&nbsp;</p>
<p align="left"><strong></strong></p>
<p align="left">&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>