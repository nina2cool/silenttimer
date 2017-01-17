<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

$PageTitle = "Silent Timer Partner - Photos";

//security check
If (session_is_registered('a'))
{

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

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

	
	// take in picture type, and limit photos!!!!!
	if($_POST['Submit'] == "Get Pictures")
	{
		$ImageType = $_POST['Category'];

		
		$goto = "linkspictures_result.php?cat=$ImageType";
		header("location: $goto");
	}
	
	mysql_close($link);
	
// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";
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
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><a name="top"></a>Images</strong></font> 
</p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Here we provide you with 
  a wide variety of product photos, logos, and banners that you may use on your 
  site. </font><font size="2" face="Arial, Helvetica, sans-serif">To find more 
  images for your site, you<font color="#000000"> may also</font><strong> <a href="http://www.silenttimer.com/gallery">visit 
  our online gallery</a></strong>.</font></p>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
  <tr>
    <td align="left" valign="top"> 
      <form name="form1" method="post" action="">
        <p><strong><font size="2" face="Arial, Helvetica, sans-serif">Image Type<br>
          </font></strong><font size="2" face="Arial, Helvetica, sans-serif">Select 
          the type of images you would like to use for your site, then click &quot;<font color="#FF0000"><strong>Get 
          Pictures</strong></font>&quot;. Once you find an image you want to use, 
          you may download it or copy the image link code below it. <a href="linkshelp.php"><strong>Click 
          here for help on adding links to your site</strong></a>.</font><font size="2" face="Arial, Helvetica, sans-serif"> 
          </font></p>
        <p><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
          <select name="Category" id="select">
            <option value="" selected>Select Image Type</option>
            <option value="logo">Logos</option>
            <option value="act">ACT</option>
            <option value="gmat">GMAT</option>
            <option value="gre">GRE</option>
            <option value="lsat">LSAT</option>
            <option value="mcat">MCAT</option>
            <option value="sat">SAT</option>
            <option value="any">Miscellaneous</option>
            <option value="all">All</option>
          </select>
          </font></strong></p>
        <p><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input type="submit" name="Submit" value="Get Pictures">
          </font></strong>
      </form>
      
    </td>
  </tr>
</table>
<p><strong></strong></p>


<p><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
  Back to Top</font></strong></a><br>
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
