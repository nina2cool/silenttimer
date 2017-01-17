<?
//security for page
session_start();

$PageTitle = "The Silent Timer Features";

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
<link href="../code/style.css" rel="stylesheet" type="text/css">
<?
$TheTest = $_GET['test'];
?>

	
<p><font size="2" face="Arial, Helvetica, sans-serif"><a name="top"></a></font><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>
The Silent Timer&#8482; Features</strong></font></p>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><strong><font color="#CC0000" size="3" face="Arial, Helvetica, sans-serif">The
          ONLY timer <em>designed</em> to increase your pacing skills.</font></strong></td>
  </tr>
</table>
<p> <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000066" face="Times New Roman, Times, serif"><a name="2004"></a><a href="http://www.silenttimer.com">THE 
  SILENT TIMER</a></font>&#8482;</strong> is designed to help you develop your 
  pacing skills for your 
  <? if($TheTest != ""){echo $TheTest;}else{echo "test";}?>
  . Choose from the options below to learn more about <strong><font color="#000066" face="Times New Roman, Times, serif"><a href="http://www.silenttimer.com">THE 
  SILENT TIMER</a></font>&#8482;</strong> and how it works.</font></p>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td bgcolor="#FFFFCC"><ul>
      <li>
        <p><font color="#CC0000" size="4" face="Arial, Helvetica, sans-serif"><a href="why_silent_timer.php">Why
              use The Silent Timer&#8482;?</a></font></p>
      </li>
	        <li>
        <p><font color="#CC0000" size="4" face="Arial, Helvetica, sans-serif"><a href="summary.php">Summary</a></font></p>
      </li>
      <li>
        <p><font color="#CC0000" size="4" face="Arial, Helvetica, sans-serif"><a href="features.php">Feature
                  Overview</a></font></p>
      </li>
      <li>
        <p><font color="#CC0000" size="4" face="Arial, Helvetica, sans-serif"><a href="easy_setup.php">Easy
              Set-up</a></font></p>
      </li>
      <li><font color="#CC0000" size="4" face="Arial, Helvetica, sans-serif"><a href="faq.php">FAQ</a></font></li>
    </ul></td>
    <td><div align="center"><img src="pics/ST-close.jpg" alt="The Silent Timer - for the LSAT, MCAT, SAT, ACT, and more!" width="243" height="182" border="0"></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<form name="form1" method="post" action="http://www.silenttimer.com/product.php">
  <div align="center">
    <input type="submit" name="Submit" value="ORDER YOUR TIMER TODAY!">
  </div>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p> 
</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>
