<?
	/*///////////////////////////////////////////////////////////////
	*
	*  > grab affiliate ID from browser and make session variable
	*
	*//////////////////////////////////////////////////////////////
	
	$aID = $_GET['a'];
	
	# in case a form is used to POST
	if($aID == "")
	{
		$aID = $_POST['a'];
	}
	
	# AND, if the visitor is returning within 30 days from visiting from an Affiliate Site... get their cookie!!!
	# if aID is blank, and the affiliate session isnt' already registered, then check for cookie.
	
	If (!session_is_registered('visitor')) // only check for their cookie if this is their FIRST time to the site this session.
	{
		if($aID == "")
		{
				if (isset($HTTP_COOKIE_VARS['TimerAffiliate']))
				{
					$ActivateCookie = "1001"; // so I know this aID was set with a cookie!
					$aID = $HTTP_COOKIE_VARS['TimerAffiliate'];
				}
		}
	}
	
	#   if affiliate code isn't empty...
	if  ($aID != "")
	{
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		$sql = "SELECT Approved FROM tblAffiliate WHERE AffiliateID = '$aID'";
		$result = mysql_query($sql) or die("Can't look up partner, please try again. (include/headertop.php)");
						
		while($row = mysql_fetch_array($result))
		{
			$approved = $row[Approved];
		}
		
		#   if this affiliate is valid, and approved, then go ahead and register this session...
		if ($approved == "y")
		{
			session_register('affiliate');
			$_SESSION['affiliate'] = $aID;
			
			# set cookie only if the cookie isn't already on their machine.
			if($ActivateCookie != "1001")
			{
				setcookie ("TimerAffiliate", "$aID", time() + 30*24*60*60, "/", ".silenttimer.com"); // set cookie to last for one month (30 days)
			}
			
		}
		
		mysql_close($link);
		
	}
	///////////////////////////////////////////////////////////////
	
	
	
	
	
	/*///////////////////////////////////////////////////////////////
	*
	* > Code to insert counter information into database
	*
	*//////////////////////////////////////////////////////////////	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	# variables for both tables...
	$now = date("Y-m-d H:i:s"); # date time
	$page = 'http://'.$HTTP_HOST.$REQUEST_URI; # current page
	$fromPage = getenv("HTTP_REFERER"); # from address
	
	// if session is already started, then insert into tblTracker
	If (session_is_registered('visitor'))
	{
		# grab session variable...
		$vID = $_SESSION['visitor'];
		
		#insert info into tblWebTracker
		$sql = "INSERT INTO tblWebTracker (VisitorID, Page, FromPage, DateTime) 
				VALUES ('$vID', '$page', '$fromPage', '$now')";
		mysql_query($sql);
	}
	else
	{
		$ip = $_SERVER["REMOTE_ADDR"];
		$Browser = $_SERVER["HTTP_USER_AGENT"];
		
		#insert info into tblWebVisitor
		$sql = "INSERT INTO tblWebVisitors (Page, FromPage, DateTime, IP, Platform, AffiliateID)
				VALUES ('$page', '$fromPage', '$now', '$ip', '$Browser', '$aID')";
		mysql_query($sql);
		
		# find visitor ID
		$sql = "SELECT VisitorID FROM tblWebVisitors WHERE Page = '$page' AND FromPage = '$fromPage' AND DateTime = '$now' AND IP = '$ip' AND Platform = '$Browser'";
		$result = mysql_query($sql) or die("Cannot retrieve Customer ID, please try again.");
				
		while($row = mysql_fetch_array($result))
		{
			$vID = $row[VisitorID];
		}
		
		# create session
		session_register('visitor');
		$_SESSION['visitor'] = $vID;
	}
	
	mysql_close($link);
	///////////////////////////////////////////////////////////////


?>



<HTML>
<HEAD>
<TITLE><? if($PageTitle != ""){echo $PageTitle;}else{echo "The Silent Timer - quietly time your test";}?></TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<meta name="Keywords" content="LSAT, MCAT, SAT, ACT, GMAT, GRE, TOEFL, Test, LSAT Test, MCAT Test, SAT Test, ACT Test, GMAT Test, GRE Test, TOEFL Test, The Silent Timer, timer, CountDown, count down, silent, silent timer, quiet, quiet timer, test timer, standardized test, test prep, preparation, time, time management, score high">
<meta name="Description" content="The Silent Timer is the only timer made specifically for your test.  Increase your testing speed and accuracy with our unique, patent pending timing process.">
<link href="<? echo $https; ?>code/style.css" rel="stylesheet" type="text/css">

<SCRIPT LANGUAGE="JavaScript" SRC="<? echo $https; ?>code/CalendarPopup.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript">
document.write(CalendarPopup_getStyles());</SCRIPT>

<?
	# Code to track overture purchases
	# Only show if on the RECEIPT page
	if($REQUEST_URI == "/order/receipt2.php")
	{
?>

<SCRIPT LANGUAGE="JavaScript">
<!-- Overture Services Inc. 07/15/2003
var cc_tagVersion = "1.0";
var cc_accountID = "2220064650";
var cc_marketID =  "0";
var cc_protocol="http";
var cc_subdomain = "convctr";
if(location.protocol == "https:")
{
    cc_protocol="https";
     cc_subdomain="convctrs";
}
var cc_queryStr = "?" + "ver=" + cc_tagVersion + "&aID=" + cc_accountID + "&mkt=" + cc_marketID +"&ref=" + escape(document.referrer);
var cc_imageUrl = cc_protocol + "://" + cc_subdomain + ".overture.com/images/cc/cc.gif" + cc_queryStr;
var cc_imageObject = new Image();
cc_imageObject.src = cc_imageUrl;
// -->
</SCRIPT>

<?
	}
?>

<script language="JavaScript"> 
<!-- 
function Rcertify() 
{
popupWin = window.open('http://www.bbbonline.org/cks.asp?id=10403048351040370', 'Participant','location=yes,scrollbars=yes,width=450,height=300'); 
window.name = 'opener';
} 
// --> 
</script> 

</HEAD>
<BODY BGCOLOR=#FFFFFF LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>
<TABLE WIDTH=822 BORDER=0 CELLPADDING=0 CELLSPACING=0>
  <TR>	
    <TD height="156" COLSPAN=2 align="left" valign="top"> <a href="http://www.silenttimer.com"><IMG SRC="<? echo $https; ?>images/TopPic.gif" ALT="The Silent Timer" WIDTH=822 HEIGHT=156 border="0"></a></TD>
    <TD align="left" valign="top"> <IMG SRC="<? echo $https; ?>images/spacer.gif" WIDTH=1 HEIGHT=156 ALT=""></TD>
  </TR>
  <TR>
		
    
  <TD width="161" height="48" ROWSPAN=2 align="left" valign="top" background="<? echo $https; ?>images/behind-left-gray.gif"> 
    <IMG SRC="<? echo $https; ?>images/timer-pic.gif" WIDTH=161 HEIGHT=48 ALT="Silent Timer"></TD>
		
    <TD align="left" valign="top" background="<? echo $https; ?>images/bottom-curve.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
          <td width="57%">