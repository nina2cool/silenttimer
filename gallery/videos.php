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
  Video Gallery</strong></font></p>
	
<p><font size="2" face="Arial, Helvetica, sans-serif">Here we have compiled some 
  short QuickTime videos to introduce you to <strong><font color="#000066" face="Times New Roman, Times, serif">THE 
  SILENT TIMER</font>&#8482;</strong>. If you do not have QuickTime, <a href="http://www.apple.com/quicktime/download/" target="_blank">please 
  download it here</a>.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Soon we will have more video 
  for you to see. For now, watch this short clip. It will give you an idea of 
  the look and feel of your new timer.</font></p>
<p><font size="3" face="Arial, Helvetica, sans-serif"><strong><font size="4">The 
  3D Feel</font><br>
  </strong></font> 
  <object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" width="243" height="198" codebase="http://www.apple.com/qtactivex/qtplugin.cab">
    <param name="autoplay" value="true">
    <param name="controller" value="true">
    <param name="pluginspage" value="http://www.apple.com/quicktime/download/indext.html">
    <param name="target" value="myself">
    <param name="type" value="video/quicktime">
    <param name="src" value="../timer/video/SilentTimer.mov">
    <embed src="../timer/video/SilentTimer.mov" width="243" height="198" autoplay="true" controller="true" border="0" pluginspage="http://www.apple.com/quicktime/download/indext.html" target="myself"></embed></object>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>
</p>
