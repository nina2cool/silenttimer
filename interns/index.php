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

			
<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Internship 
  Opportunities</font></strong></p>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><p><font size="2" face="Arial, Helvetica, sans-serif">Silent Technology 
        LLC is looking for hard-working, motivated interns in 25 cities across 
        the nation to help with new product marketing. The Silent Timer is a new 
        product hitting store shelves as we speak. We need help to spread the 
        word.</font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Our <a href="<? echo $http;?>interns/description.php">internship</a> 
        slots offer students the ability to work firsthand with an upstart company 
        and really make a difference. The interns will get to learn about local 
        and national marketing strategies and will be an integral part of The 
        Silent Timer team.</font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><br>
        &gt; <a href="<? echo $http;?>interns/description.php">See a detailed 
        description of what you'd being doing for us.</a></font></p>
      </td>
    <td bgcolor="#FFFFCC"><img src="images/27.JPG" width="211" height="158"></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
  <tr>
    <td bgcolor="#FFFFCC"><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>Why 
      Intern for Our Company?</strong></font> </td>
  </tr>
</table>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Silent Technology 
  LLC is a young, startup company. Working with us will give you an opportunity 
  to see how a company works up close and personal. Your work really benefits 
  the team, and you'll be helping us succeed.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">We were students 
  not too long ago, and we understand the importance of having an internship when 
  searching for a full time position. Companies love to see that students have 
  had some prior work experience. Interning also gives you an opportinuty to decide 
  if you are genuinely interested in your major or work field.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">We would like 
  to see all of our interns succeed, and we'll be happy to write recommendations 
  and be references. Our company is a great resume builder!</font></p>
<p align="left"><br>
  &gt; <font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http;?>interns/cities.php">Check 
  to see if we're hiring interns in your area.</a></font></p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>