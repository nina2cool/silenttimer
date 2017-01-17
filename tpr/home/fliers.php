<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

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
		$City = $row[City];
		$AffRate = $row[Rate];
	}
	
	
	$now = date("Y-m-d");
	# - get next deadline for this office
	$sql = "SELECT Date
			FROM tblAffOfficeDeadlines 
			WHERE AffiliateID = '$aID' AND Date >= '$now'
			ORDER BY Date ASC
			LIMIT 0,1";
	$result = mysql_query($sql) or die("Cannot execute query!");
	while($row = mysql_fetch_array($result))
	{
		$newDeadline = $row[Date];
		$newDeadlineFormat = substr($newDeadline,5,2) . "/" . substr($newDeadline,8,2) . "/" . substr($newDeadline,0,4);
	}
	
	# - get prior deadline for this office
	$sql = "SELECT Date
			FROM tblAffOfficeDeadlines 
			WHERE AffiliateID = '$aID' AND Date <= '$now'
			ORDER BY Date ASC
			LIMIT 0,1";
	$result = mysql_query($sql) or die("Cannot execute query!");
	while($row = mysql_fetch_array($result))
	{
		$oldDeadline = $row[Date];
		$oldDeadlineFormat = substr($oldDeadline,5,2) . "/" . substr($oldDeadline,8,2) . "/" . substr($oldDeadline,0,4);
	}
	
	# - Get number of sales and total commissions coming to office for this period
	$sql = "SELECT COUNT(PurchaseID) AS Num
			FROM tblPurchase
			WHERE AffOfficeID = '$aID' AND DateTime >= '$oldDeadline' AND DateTime < '$newDeadline'";
			
	$result = mysql_query($sql) or die("Cannot execute query!");
	while($row = mysql_fetch_array($result))
	{
		$NumSold = $row[Num];
	}
	
	# - get total money going to them for this period
	$Sales  = $NumSold * $AffRate;
?>

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Download 
  Fliers </strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr> 
    <td align="left" valign="top"> <p><font size="3" face="Arial, Helvetica, sans-serif">Office 
        code:<strong> <? echo $aID;?></strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Download any of the 
        following Silent Timer fliers. Make sure to put your correct office code,<strong> 
        <? echo $aID;?></strong>, on your fliers.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Once you download 
        your fliers, personalize them with your <strong><em>office code (<? echo $aID;?>)</em></strong>, 
        and <em> <strong>deadline date (<? echo $newDeadlineFormat;?>)</strong></em>. 
        All files are in Microsoft Word format.</font></p>
      <table width="100%" border="1" cellpadding="6" cellspacing="0" bordercolor="#CCCCCC">
        <tr> 
          <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="6">
              <tr> 
                <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="fliers/TPR_Full%20Page.doc">Full 
                  Page Student Flier</a> | </strong></font><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="fliers/TPR_halfpage.doc">Half 
                  Page Student Flier</a></strong></font></td>
              </tr>
              <tr> 
                <td><p><font size="2" face="Arial, Helvetica, sans-serif">Has 
                    a quick description of The Silent Timer, and gives ordering 
                    instructions to your students.</font></p>
                  <p><font size="2" face="Arial, Helvetica, sans-serif">These 
                    fliers can be placed in your LSAT, SAT, and MCAT testing manuals 
                    on the page where you tell your students to get a timer.</font></p></td>
              </tr>
            </table> </td>
        </tr>
        <tr> 
          <td align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="6">
              <tr> 
                <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="fliers/TPR_Teacher_Memo.doc">Teacher 
                  Memo</a></strong></font></td>
              </tr>
              <tr>
                <td><p><font size="2" face="Arial, Helvetica, sans-serif">This 
                    memo explains to your teachers that there is a new timer you 
                    are promoting to your students and explains the ordering process. 
                    It also lets your teachers know that there are Silent Timer 
                    demos in the front office. </font></p>
                  <p><font size="2" face="Arial, Helvetica, sans-serif">You can 
                    place this into your teachers' mail boxes, or attach it in 
                    an email.</font></p></td>
              </tr>
            </table>
            
          </td>
        </tr>
        <tr> 
          <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="6">
              <tr> 
                <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="fliers/TPR_FrontDeskInstr.doc">Front 
                  Desk Instructions</a></strong></font></td>
              </tr>
              <tr> 
                <td><p><font size="2" face="Arial, Helvetica, sans-serif">These 
                    instructions will let your front desk worker know how to handle 
                    timer pick ups. It also gives a phone number where they can 
                    get help when they need it.</font></p>
                  <p><font size="2" face="Arial, Helvetica, sans-serif">Put this 
                    sheet of paper in the front office. Remember to put your correct 
                    office code and password on your sheet.</font></p>
                  </td>
              </tr>
            </table>
            
          </td>
        </tr>
      </table>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Contact us if you 
        have any questions about these documents at 512-542-9981 or <a href="mailto:info@silenttimer.com">info@silenttimer.com</a>.</font></p>
      </td>
  </tr>
</table>

<p>
  <?
mysql_close($link);
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
	$http .= "tpr";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>
</p>
