<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";


// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

  <div align="center">
    <p align="left"><font size="1" face="Arial, Helvetica, sans-serif">REMEMBER:
    Only for fun! </font></p>
    <p align="center"><font face="Arial, Helvetica, sans-serif"><b> <font color="#003399" size="4">&ldquo;Silent
            Timer&rdquo; Kills
    Local Business</font></b></font></p>
    <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"> By
        someone from The Princeton Review in College
        Station, Texas </font></p>
    <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b>Only
    for fun!</b></font></p>
    <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"> Snook,
    TX &mdash; </font></p>
    <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Ray&rsquo;s
        Timer De-Beepery in downtown Snook, open since 1994, closed its doors
        for the final time today. &nbsp;Ray Arnold,
        proprietor, told reporters and gathered Snookians that the closure was
        caused by the arrival in College Station of the new &ldquo;Silent Timer,&rdquo; so
        titled because it is a timer that, allegedly, makes no noise. &nbsp;&nbsp;<br>
    <br>
&ldquo;Them &lsquo;Silent Timers&rsquo; is what forced me out,&rdquo; Arnold
  said. &nbsp;&ldquo;Of course, I was barely makin&rsquo; it as it was. &nbsp;They
  ain&rsquo;t much call for timer de-beepin&rsquo;, and when folks found out
  that all I was doin&rsquo; was snippin&rsquo; the speaker wire, they pretty
  much started doin&rsquo; it themselves, so you don&rsquo;t get a whole lot
  of repeat business.&rdquo; <br>
    <br>
    When asked about his future plans, Arnold said, &ldquo;Well, I don&rsquo;t
    rightly know, but they&rsquo;s gotta be something out there for a man with
    a itty-bitty screwdriver, a pair of wire cutters, and the know-how to use &lsquo;em
    right.&rdquo;</font></p>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><i>This spoof article is only for fun, and does not reflect the beliefs or opinions
of Silent Technology LLC, The Silent Timer&#8482;, or The Princeton Review.</i></font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../../include/sidemenu.php";
?>
