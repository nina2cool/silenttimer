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


				//connect to database
				$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
				mysql_select_db($db) or die("Cannot select Database");

				
				$sql = "SELECT * FROM tblMomedia WHERE Status = 'active' ORDER BY Test ASC";
				$result = mysql_query($sql) or die("Cannot get tests");
				
				$Count = mysql_num_rows($result);
				

?>


<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Exam Secrets Study Guides from Morrison Media LLC</strong></font></p>
<p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">Still looking for some test prep help? Find your test below and check out what Morrison Media has to offer.</font></p>
<table width="100%" border="1" cellpadding="1" cellspacing="0" bordercolor="#003399">
    <tr>
    <td width="33%" align="left" valign="top" bgcolor="#003399"><div align="center"><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong>Test</strong></font></div></td>
    <td width="33%" align="left" valign="top" bgcolor="#003399"><div align="center"><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong>Study Guide</strong></font></div></td>
    <td align="left" valign="top" bgcolor="#003399"><div align="center"><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong>Flashcards (if available)</strong></font></div></td>
  </tr>
  <?
  						while($row = mysql_fetch_array($result))
						{
						$Test = $row[Test];
						$TestURL2 = $row[URL];
						$FlashcardURL2 = $row[FlashcardURL];
						
						$TestURLexp = explode("http://",$TestURL2);
						$FlashcardURLexp = explode("http://",$FlashcardURL2);
						
						//echo $URLexp[0];
						//echo $URLexp[1];
						
						//$URL = $URLexp;
						
?>
  <tr> 
    <td width="33%" align="left" valign="top"> 
    <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Test; ?>&nbsp;</font></p>    </td>
    <td width="33%" align="left" valign="top"><p align="center"><font size="2" face="Arial, Helvetica, sans-serif">
    
    <? if($TestURL2 <> "") { ?>
    <a href="http://www.mcssl.com/app/aftrack.asp?AFID=167299&u=<? echo $TestURLexp[1]; ?>" target="_blank"><? echo $Test; ?> Secrets Study Guide</a>
    <? } else { ?>
    ---
    <? } ?>
    
    
    </font></p></td>
    <td align="left" valign="top">
    
    <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
    <? if($FlashcardURL2 <> "") { ?>
    <a href="http://www.mcssl.com/app/aftrack.asp?AFID=167299&amp;u=<? echo $FlashcardURLexp[1]; ?>" target="_blank"><? echo $Test; ?> Flashcards</a></font>
    <? } else { ?>
    ---
    <? } ?>
    </div></td>
  </tr>

  <?
  }
  ?>
</table>


<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
mysql_close($link);

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>