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

?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Testing 
  Links</strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr> 
    <td width="71%" align="left" valign="top"> <p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Standardized 
        Tests' Official Sites</strong></font></p>
      <table width="100%"  border="0" cellspacing="0" cellpadding="1">
        <tr>

<?
		$sql = "SELECT * FROM tblLinks WHERE Type = 'Test' AND IsOfficial = 'y' AND Status = 'active' GROUP BY Title ORDER BY Title";
		$result = mysql_query($sql) or die("Cannot get links");
		
		while($row = mysql_fetch_array($result))
		{
		$Link = $row[Link];
		$Description = $row[Description];
		$Title = $row[Title];
		
		
?>
		
          <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $Link; ?>" target="_blank"><? echo $Title; ?></a></font></td>
        </tr>
<?
}
?>


      </table>
      <p align="left"><strong><font size="3" face="Arial, Helvetica, sans-serif">Test 
        Preparation Links</font></strong></p>
      <table width="100%"  border="0" cellspacing="0" cellpadding="1">
        <tr>
          <?
		$sql2 = "SELECT * FROM tblLinks WHERE Type = 'Test Prep' AND IsOfficial = 'n' AND Status = 'active' GROUP BY Title ORDER BY Title";
		$result2 = mysql_query($sql2) or die("Cannot get links");
		
		while($row2 = mysql_fetch_array($result2))
		{
		$Link2 = $row2[Link];
		$Description2 = $row2[Description];
		$Title2 = $row2[Title];
		
		
?>
          <td><font size="2"><a href="<? echo $Link2; ?>" target="_blank"><font face="Arial, Helvetica, sans-serif"><? echo $Title2; ?></font></a> <font face="Arial, Helvetica, sans-serif">
            <?
		  if($Description2 <> "")
		  {
		  ?>
      - <? echo $Description2; ?>
      <?
		  }
		  ?>
          </font></font> </td>
        </tr>
        <?
}
?>
      </table>      <p><strong><font size="3" face="Arial, Helvetica, sans-serif">College Web 
        Sites - excited? Get prepared!</font></strong></p>
      <table width="100%"  border="0" cellspacing="0" cellpadding="3">
        <tr>
          <?
		$sql3 = "SELECT * FROM tblLinks WHERE Type = 'College' AND IsOfficial = 'n' AND Status = 'active' GROUP BY Title ORDER BY Title";
		$result3 = mysql_query($sql3) or die("Cannot get links");
		
		while($row3 = mysql_fetch_array($result3))
		{
		$Link3 = $row3[Link];
		$Description3 = $row3[Description];
		$Title3 = $row3[Title];
		
		
?>
          <td><font size="2"><a href="<? echo $Link3; ?>" target="_blank"><font face="Arial, Helvetica, sans-serif"><? echo $Title3; ?></font></a> <font face="Arial, Helvetica, sans-serif">
            <?
		  if($Description3 <> "")
		  {
		  ?>
      - <? echo $Description3; ?>
      <?
		  }
		  ?>
          </font></font> </td>
        </tr>
        <?
}
?>
      </table>      <p><strong><font size="3" face="Arial, Helvetica, sans-serif">Testing 
        Forums - get in touch with people in the know!</font></strong></p>
      <table width="100%"  border="0" cellspacing="0" cellpadding="3">
        <tr>
          <?
		$sql4 = "SELECT * FROM tblLinks WHERE Type = 'Forum' AND IsOfficial = 'n' AND Status = 'active' GROUP BY Title ORDER BY Title";
		$result4 = mysql_query($sql4) or die("Cannot get links");
		
		while($row4 = mysql_fetch_array($result4))
		{
		$Link4 = $row4[Link];
		$Description4 = $row4[Description];
		$Title4 = $row4[Title];
		
		
?>
          <td><font size="2"><a href="<? echo $Link4; ?>" target="_blank"><font face="Arial, Helvetica, sans-serif"><? echo $Title4; ?></font></a> <font face="Arial, Helvetica, sans-serif">
            <?
		  if($Description4 <> "")
		  {
		  ?>
      - <? echo $Description4; ?>
      <?
		  }
		  ?>
          </font></font> </td>
        </tr>
        <?
}
?>
      </table>      
      <p><strong><font size="3" face="Arial, Helvetica, sans-serif">Tests in
            the News </font></strong></p>
      <table width="100%"  border="0" cellspacing="0" cellpadding="3">
        <tr>
          <?
		$sql5 = "SELECT * FROM tblLinks WHERE Type = 'News' AND Status = 'active' GROUP BY Title ORDER BY Title";
		$result5 = mysql_query($sql5) or die("Cannot get links");
		
		while($row5 = mysql_fetch_array($result5))
		{
		$Link5 = $row5[Link];
		$Description5 = $row5[Description];
		$Title5 = $row5[Title];
		
		
?>
          <td><font size="2"><a href="<? echo $Link5; ?>" target="_blank"><font face="Arial, Helvetica, sans-serif"><? echo $Title5; ?></font></a> <font face="Arial, Helvetica, sans-serif">
            <?
		  if($Description5 <> "")
		  {
		  ?>
      - <? echo $Description5; ?>
      <?
		  }
		  ?>
          </font></font> </td>
        </tr>
        <?
}
?>
      </table>
      <p align="left">&nbsp;</p></td>
    <td width="29%" align="left" valign="top"><table width="200" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="6">
              <tr> 
                <td bgcolor="#003399"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Link
                  Trade </strong></font></td>
              </tr>
              <tr> 
                <td align="left" valign="top" bgcolor="#FFFFFF"> <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">If 
                    you would like to add your company's web site to our list, 
                    <a href="mailto:info@SilentTimer.com?subject=Link%20Exchange">please 
                    email us.</a></font></p></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <br> <table width="200" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="6">
              <tr> 
                <td bgcolor="#FF0000"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Suggest
                  a Site</strong></font></td>
              </tr>
              <tr> 
                <td align="left" valign="top" bgcolor="#FFFFFF"> <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Suggest 
                    one of your favorite test sites to us, and we will add it 
                    to the list. <a href="mailto:info@SilentTimer.com?subject=Suggested%20Test%20Site">Please 
                    email us.</a></font></p></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <br>
      <table width="200" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="6">
              <tr> 
                <td bgcolor="#FF6600"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Test 
                  Dates </strong></font></td>
              </tr>
              <tr> 
                <td align="left" valign="top" bgcolor="#FFFFFF"> <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Check 
                    out the testing dates for your test. <a href="testdates.php">Click 
                    Here</a>.</font></p></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <br>
	
      <? #marketing survey was in a purple box, looked nice. ?>
	  
	        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
</table>

<br>
<br>
<?

mysql_close($link);
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
