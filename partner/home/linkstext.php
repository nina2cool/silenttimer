<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

$PageTitle = "Silent Timer Partner - Text links";

//security check
If (session_is_registered('a'))
{

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
<?
	//get name of person/company	
	$aID = $_SESSION['a'];
	
	#connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			
		
	$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$aID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
			
	while($row = mysql_fetch_array($result))
	{
		$CompanyName = $row[CompanyName];
	}
	
	mysql_close($link);
?>
<script language="JavaScript">
<!--
function copyit(theField) {
  var tempval=eval("document."+theField);
  tempval.focus();
  tempval.select();
  therange=tempval.createTextRange();
  therange.execCommand("Copy");
}
 //-->
</script>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Text 
  Links</strong></font>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="linkshelp.php"><strong>Click 
  here for help on adding links to your site</strong></a><strong>.</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="linkspictures.php"><strong>Image 
  &amp; Banner Links</strong></a><strong> &gt; </strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Find the text link 
  you would like to use, and copy the code onto your site.</strong></font></p>
<table width="400" border=1 cellpadding=8 cellspacing=0>
  <tr> 
    <td width="416" bgcolor=#EEEEEE> <span class=bold><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.SilentTimer.com/index.php?a=<? echo $aID;?>">The 
      Silent Timer - beat your test time!</a></font></span></td>
  </tr>
  <tr> 
    <td align="left" valign="top"> <p><span class=bold><font size="2" face="Arial, Helvetica, sans-serif"><strong>Code 
        for Link</strong></font></span> <font size="2" face="Arial, Helvetica, sans-serif">- 
        <span class=text>This code must be placed on your site exactly as it appears.</span></font></p>
      <form action="" name="mycopy1" id="mycopy1">
        <p> 
          <textarea name="t1" cols=50 rows=4 wrap=physical class=text id="t1">&lt;a href=&quot;http://www.SilentTimer.com/index.php?a=<? echo $aID;?>&quot;&gt;The Silent Timer - beat your test time!&lt;/a&gt; </textarea>
        </p>
        <p> 
          <input onclick="copyit('mycopy1.t1')" type="button" name="cpy" value="Copy Link "  >
      </form>
      </td>
  </tr>
</table>
<br>
<table width="400" border=1 cellpadding=8 cellspacing=0>
  <tr> 
    <td width="416" bgcolor=#EEEEEE> <span class=bold><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.SilentTimer.com/index.php?a=<? echo $aID;?>">The Silent Testing Timer - get yours today!</a></font></span></td>
  </tr>
  <tr> 
    <td align="left" valign="top"> <p><span class=bold><font size="2" face="Arial, Helvetica, sans-serif"><strong>Code 
        for Link</strong></font></span> <font size="2" face="Arial, Helvetica, sans-serif">- 
        <span class=text>This code must be placed on your site exactly as it appears.</span></font></p>
      <form name="mycopy2" id="mycopy2" >
        <textarea name="t2" cols=50 rows=4 wrap=physical class=text id="t2">&lt;a href=&quot;http://www.SilentTimer.com/index.php?a=<? echo $aID;?>&quot;&gt;The Silent Testing Timer - get yours today!&lt;/a&gt; </textarea>
        <p> 
          <input onclick="copyit('mycopy2.t2')" type="button" name="cpy2" value="Copy Link "  >
      </form></td>
  </tr>
</table>
<br>
<table width="400" border=1 cellpadding=8 cellspacing=0>
  <tr> 
    <td width="416" bgcolor=#EEEEEE> <span class=bold><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.SilentTimer.com/index.php?a=<? echo $aID;?>">The LSAT Timer - learn LSAT Timing techniques.</a></font></span></td>
  </tr>
  <tr> 
    <td align="left" valign="top"> <p><span class=bold><font size="2" face="Arial, Helvetica, sans-serif"><strong>Code 
        for Link</strong></font></span> <font size="2" face="Arial, Helvetica, sans-serif">- 
        <span class=text>This code must be placed on your site exactly as it appears.</span></font></p>
      <form name="mycopy3" id="mycopy3" >
        <textarea name="t3" cols=50 rows=4 wrap=physical class=text id="t3">&lt;a href=&quot;http://www.SilentTimer.com/index.php?a=<? echo $aID;?>&quot;&gt;The LSAT Timer - learn LSAT Timing techniques.&lt;/a&gt; </textarea>
        <p> 
          <input onclick="copyit('mycopy3.t3')" type="button" name="cpy22" value="Copy Link "  >
      </form></td>
  </tr>
</table>
<p> 
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
	$http .= "partner";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>
</p>
