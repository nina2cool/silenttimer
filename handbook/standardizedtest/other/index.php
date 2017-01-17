<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../../../include/dbinfo.php";

// has top header in it.
require "../../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../../../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> <strong><font color="#003399" size="4" face="Times New Roman, Times, serif"> 
</font></strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font size="4" face="Times New Roman, Times, serif"><font size="2">THE 
SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></font><font color="#000000" size="2"> 
<em>Handbook</em></font></strong></font> 
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>Other Life Tests</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Since our society is based 
  on success and striving for the best, exams are a way to evaluate our progress 
  and measure us up against others. Competition to be the smartest or get into 
  the best school can be rough on a student, but it doesn&#8217;t have to be. 
  <em> <strong><font color="#33CC33">With adequate preparation, a student can do anything or be anything.</font></strong></em></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Becoming whom you want
    to  be is a journey-- a maze of tests and hurdles that must be passed before
    you  achieve your ultimate destination. Whether you&#8217;re a middle school
    student  or a professional looking to earn certification, life is a series
    of tests.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Use the links on the left
     to guide you through an overview of examples of tests you may run into along
     your path.</font></p>
<p>&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>