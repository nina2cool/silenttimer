<?
//security for page
session_start();

$PageTitle = "Silent Timer Partner - Terms";

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

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Anti-Spam 
  Policy</strong></font></p>
	
<p> <font size="2" face="Arial, Helvetica, sans-serif">Considering the use of 
  bulk email, bulk newsgroup postings, unsolicited AOL/ICQ &quot;instant messages&quot;, 
  or other &quot;dirty tricks&quot; to promote Silent Technology LLC? </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">In a word, <strong>DON'T</strong>. 
  </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Silent Technology LLC (makers 
  of <strong><font color="#000066" face="Times New Roman, Times, serif"><a href="http://www.silenttimer.com">THE 
  SILENT TIMER</a></font><font color="#000033" face="Times New Roman, Times, serif"><font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></font></strong>) 
  has a strict ZERO-TOLERANCE anti-spam policy. Silent Technology LLC does not, 
  and will not, honor any traffic or referrals that result from so-called &quot;SPAM&quot; 
  activities, newsgroup postings, IM spam, and other abusive tactics. In fact, 
  if Silent Technology LLC observes your use of such tactics to promote the sites 
  of Silent Technology LLC marketing partners, not only will we terminate your 
  account, suspend all credits, and add your account information to a well-circulated 
  &quot;black list&quot;, we will also notify your ISP and upstream carriers of 
  your violation of those firms' acceptable-use policies (AUPs). </font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>How to report spam 
  to us</strong>:<br>
  Email the full text of the spam, including subject line plus all headers (if
   available), to <a href="mailto:info@silenttimer.com">info@silenttimer.com</a>. 
  <br>
  <br>
  </font></p>
<p><br>
</p>
<p align="left"> 
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
	