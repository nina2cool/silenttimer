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
<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Online 
  Silent Timer Demo</font></strong></p>
<p align="right"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="onlinetimer.php">Start 
  Silent Timer Demo ...</a></font></strong></p>
	<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Managing time 
	    on a standardized test is crucial. How much time do you spend on each question? 
        <strong> <font color="#006600">Taking too long on one question could put your 
    questions, your test, and your score in jeopardy.</font></strong></font></p>
	<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Times New Roman, Times, serif"><font color="#000066"><a href="http://www.silenttimer.com">THE
	            SILENT TIMER</a></font></font><font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></strong> 
  will help you manage your time so you can focus on your results.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">This demo
    works  exactly like the real thing (except it does not have Auto Mode and
    Passage Mode). Play with the demo and see how the timer works. Then, <a href="../contactus.php">contact
    us</a> if
    you have any questions.</font></p>
	<p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Here's 
  how it works: </strong></font></p>
	
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr> 
    <td width="4%"><div align="center">1.</div></td>
    <td width="96%"><font size="2" face="Arial, Helvetica, sans-serif">Enter the 
      time of your test.</font></td>
  </tr>
  <tr> 
    <td><div align="center">2.</div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Enter the number of 
      questions on your test.</font></td>
  </tr>
</table>
	
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"> <font color="#000066" face="Times New Roman, Times, serif"><strong><a href="http://www.silenttimer.com">THE 
  SILENT TIMER</a></strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>&#8482;</strong></font></font> 
  will tell you everything you need to know about your test time:</font></p>
	<table width="100%" border="0" cellspacing="0" cellpadding="3">
	  <tr> 
		<td width="56%" align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr> 
          <td width="2%"><strong><font color="#FF0000"><em>-</em></font></strong></td>
          <td width="98%"><font size="2" face="Arial, Helvetica, sans-serif">Count 
            your time up or down </font></td>
        </tr>
        <tr> 
          <td><strong><font color="#FF0000"><em>-</em></font></strong></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">Average your 
            time per question</font></td>
        </tr>
        <tr> 
          <td><strong><font color="#FF0000"><em>-</em></font></strong></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">Allot the time 
            you can spend on each question</font></td>
        </tr>
        <tr> 
          <td><strong><font color="#FF0000"><em>-</em></font></strong></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">Show you the 
            number of questions answered</font></td>
        </tr>
        <tr>
          <td><strong><font color="#FF0000"><em>-</em></font></strong></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">Count number 
            of questions remaining</font></td>
        </tr>
        <tr> 
          <td><strong><font color="#FF0000"><em>-</em></font></strong></td>
          <td><p><font size="2" face="Arial, Helvetica, sans-serif"><a href="/timer/functions.php">Learn 
              more! </a></font></p></td>
        </tr>
      </table></td>
		<td width="44%"><p align="center"><a href="onlinetimer.php"><img src="../gallery/pics/small/front-nice.jpg" width="200" height="150"></a><strong><font size="5" face="Arial, Helvetica, sans-serif"><br>
        </font></strong><font size="5" face="Arial, Helvetica, sans-serif" class="links"><strong><a href="onlinetimer.php">Start 
        <font color="#000066" face="Times New Roman, Times, serif">THE SILENT 
        TIMER<font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></font> Demo</a></strong></font></p></td>
	  </tr>
	</table>
	
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">With </font><font size="2" face="Times New Roman, Times, serif"><strong><font color="#000066"><a href="http://www.silenttimer.com">THE 
  SILENT TIMER</a></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif">, 
  you are<strong> in control</strong> of your test time. After each question, 
  you press the red<font color="#FF0000"> <strong>&quot;Answer&quot;</strong> 
  </font>button, and all of your test statistics are updated. You always know 
  how much time you have to answer your current question, as well as if you are 
  spending more time than you should! </font></p>
	
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3"><em><font color="#000066">Imagine 
  this</font>:</em></font> You always know if you are ahead, or behind on your 
  time, just by looking at your timer.</strong></font></p>
<p align="left"><strong><font size="4" face="Arial, Helvetica, sans-serif"><a href="onlinetimer.php">Start 
  Silent Timer Demo &gt;</a></font></strong></p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<br>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>