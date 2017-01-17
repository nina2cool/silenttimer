<?
//security for page
session_start();

$PageTitle = "The Silent Timer - About Us";

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

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>About 
  Us</strong></font></p>
	
<table width="100" border="0" cellspacing="0" cellpadding="8" class="right">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="gallery/owners/group/sitting_big.jpg" target="_blank"><img src="gallery/owners/group/sitting.jpg" width="298" height="200" border="0"></a></font></td>
  </tr>
</table>
<font size="2" face="Arial, Helvetica, sans-serif">We were students just like
you. We took an LSAT preparation course near <a href="http://www.utexas.edu" target="_blank">The
 University of Texas at Austin</a>. During the course, we were instructed to
 buy  a timer so that we could time our practice tests. The point was to make
 sure we  were not spending too much time on the questions. The course stressed
 the importance  of having a timer that could be used on test day*. <strong><em>The
 catch was that  it could not make any noise</em></strong>.</font> 
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">We searched 
  the market extensively but could not find a timer that did not beep. Therefore, 
  we made our own to use on the June 10, 2002, LSAT. After the test, we worked 
  hard to make our timer, <strong><font color="#000066" face="Times New Roman, Times, serif">THE 
  SILENT TIMER</font>&#8482;</strong>, available to all test takers. We also added 
  the time per question features to facilitate time management and provide self-assurance 
  to students.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Any student 
  now has the advantage of using the only timer specifically designed to improve 
  pacing skills!</font></p>
	
<p><span class="links"><strong><font size="4" face="Arial, Helvetica, sans-serif">  &gt; <a href="inventors.php">Meet the Inventors</a></font></strong></span>
      <br>
<span class="links"><strong><font size="4" face="Arial, Helvetica, sans-serif">&gt; <a href="timerstory.php">Read <font face="Times New Roman, Times, serif">THE SILENT TIMER</font>&#8482; Story</a></font></strong></span></p>
  <p>&nbsp;</p>
  <p><strong><font size="4" face="Arial, Helvetica, sans-serif">&gt; <a href="<? echo $http;?>contactus.php">Contact
          Us</a><br>
  &gt; <a href="<? echo $http;?>resell">Partner Opportunity</a><br>
&gt; <a href="<? echo $http;?>news">News and Articles</a></font></strong></p>
  <p align="left">&nbsp;</p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">* You may want to check with your testing administration, as
    not all tests allow students to bring in timers.</font> </p>
  <p>&nbsp;</p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>