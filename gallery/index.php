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

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>The 
  Gallery</strong></font></p>
	
<p><font size="2" face="Arial, Helvetica, sans-serif">Here you will find detailed 
  photos and videos of <strong><font color="#000066" face="Times New Roman, Times, serif">THE 
  SILENT TIMER</font>&#8482;</strong>. We want you to know how much effort we 
  put into making our timer not only extremely functional, but also extremely 
  cool to have sitting on your desk!</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Take a look at our photos, 
  descriptions, and videos. See what owning a <strong><font color="#000066" face="Times New Roman, Times, serif">SILENT 
  TIMER</font>&#8482;</strong> is all about.</font></p>
<table width="100%" border="1" cellpadding="6" cellspacing="0" bordercolor="#003399">
  <tr>
    <td align="left" valign="top"><p><font size="4" face="Arial, Helvetica, sans-serif">Photos<br>
        <font size="2">Look at cool pictures of the timer that will help you score 
        high. <a href="photos.php"> Click for our Photo Gallery &gt;</a></font></font></p>
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr> 
          <td width="12%"><a href="photos.php"><img src="pics/small/army-01.jpg" width="132" height="100" border="0"></a></td>
          <td width="6%"><a href="photos.php"><img src="pics/small/logo-back-cool-02.jpg" width="132" height="100" border="0"></a></td>
          <td width="82%" align="left" valign="top"><a href="photos.php"><img src="pics/small/front-nice.jpg" width="132" height="100" border="0"></a></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<br>
<table width="100%" border="1" cellpadding="6" cellspacing="0" bordercolor="#003399">
  <tr> 
    <td align="left" valign="top"><p><font size="4" face="Arial, Helvetica, sans-serif">Videos<br>
        <font size="2">Watch some different clips that will give you a better 
        idea of what the timer is all about.</font></font></p>
      <p><a href="videos.php"><font size="2" face="Arial, Helvetica, sans-serif">Click 
        here for videos &gt;</font></a></p></td>
  </tr>
</table>
<br>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>
