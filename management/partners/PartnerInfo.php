<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
	//grab variables to get purchase info from DB.
	$AffID = $_GET['aff'];
	
	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

		$sql2 = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$AffID'";
		//put SQL statement into result set for loop through records
		$result2 = mysql_query($sql2) or die("Cannot execute query AffiliateID!");
		
		while($row = mysql_fetch_array($result2))
		{
			$AccountType = $row[AccountType];
			$CompanyName = $row[CompanyName];
			$FirstName = $row[FirstName];
			$LastName = $row[LastName];
			$Email = $row[Email];
			$Phone = $row[Phone];
			$Fax = $row[Fax];
			$Address = $row[Address];
			$Address2 = $row[Address2];
			$City = $row[City];
			$State = $row[State];
			$ZipCode = $row[ZipCode];
			$Country = $row[Country];
			$SiteName = $row[WebSiteName];
			$URL = $row[URL];
			$Description = $row[Description];
			$Visitors = $row[UniqueVisitors];
			$PageViews = $row[PageViews];
			$AnnualStudents = $row[AnnualStudents];
			$CheckPayableTo = $row[CheckToName];
			$UserName = $row[UserName];
			$Password = $row[Password];
			$Rate = $row[Rate];
			$AcceptTerms = $row[AcceptTerms];
			$DateTime = $row[DateTime];
			$IP = $row[IP];
			$Approved = $row[Approved];
			$Custom = $row[Custom];
			$Status = $row[Status];	
		}
	
	?>		


 <p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><b>Affiliate 
  Information for <? echo $CompanyName; ?></b></font></p>
 <p><font size="2"><font face="Arial, Helvetica, sans-serif"><b>&gt; <a href="PartnerInfoEdit.php?aff=<? echo $AffID; ?>">Edit
       Info </a></b></font></font></p>
 <p><font size="2" face="Arial, Helvetica, sans-serif"><b>&lt; <a href="CurrentSales.php?aff=<? echo $AffID; ?>">Back to Current Sales</a></b></font></p>
<table width="100%" border="1" cellpadding="8" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Affiliate
          ID</font></b></td>
      <td> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $AffID; ?></font> </td>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Account
      Type</font></b></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $AccountType; ?></font></td>
    </tr>
    <tr>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">User
          Name</font></b></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $UserName; ?></font></td>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Password</font></b></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Password; ?></font></td>
    </tr>
    <tr bgcolor="#FFFFCC">
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Company
          Name</font></b></td>
      <td colspan="3">
        <font size="2" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?></font> </td>
     </tr>
    <tr bgcolor="#FFFFCC">
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Contact
      Name </font></b></td>
      <td> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font>      </td>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Make
          Check Payable To</font></b></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CheckPayableTo; ?></font></td>
    </tr>
    <tr bgcolor="#FFFFCC">
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Email</font></b></td>
      <td colspan="3">
      <font size="2" face="Arial, Helvetica, sans-serif"><a href="mailto:<? echo $Email; ?>"><? echo $Email; ?></a></font> </td>
     </tr>
    <tr bgcolor="#FFFFCC">
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Phone</font></b></td>
      <td>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $Phone; ?></font> </td>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Fax</font></b></td>
      <td>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $Fax; ?></font> </td>
    </tr>
    <tr bgcolor="#FFFFCC">
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Address</font></b></td>
      <td colspan="3">
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address; ?></font>
	  <? if($Address2 <> "") { ?>
	  <br>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $AffID; ?></font>
	  <? } ?>
	  
	  </td>
     </tr>
    <tr bgcolor="#FFFFCC">
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">City,
          State Zip</font></b></td>
      <td>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?>, <? echo $State; ?> <? echo $ZipCode; ?></font> </td>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Country</font></b></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Country; ?></font></td>
    </tr>
    <tr>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">URL</font></b></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $URL; ?>" target="_blank"><? echo $URL; ?></a></font></td>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Web
          Site Name</font></b></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $SiteName; ?></font></td>
    </tr>
    <tr>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Description</font></b></td>
      <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Description; ?></font></td>
     </tr>
    <tr>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Unique
          Visitors</font></b></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Visitors; ?></font></td>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Page
          Views</font></b></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $PageViews; ?></font></td>
    </tr>
    <tr>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Annual
          Students</font></b></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $AnnualStudents; ?></font></td>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Rate</font></b></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Rate; ?></font></td>
    </tr>
    <tr>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Date
          and Time</font></b></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font> </font></td>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">IP</font></b></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;
        </font><font size="2" face="Arial, Helvetica, sans-serif"><? echo $IP; ?></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;              </font></td>
    </tr>
    <tr>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Approved?</font></b></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Approved; ?></font></td>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Custom</font></b></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Custom; ?></font></td>
    </tr>
    <tr>
      <td><b><font size="2" face="Arial, Helvetica, sans-serif">Status</font></b></td>
      <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Status; ?></font></td>
     </tr>
  </table>
  <p>&nbsp;</p>
  <p><font size="2" face="Arial, Helvetica, sans-serif">
</font><?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.

require "../include/footerlinks.php";



// finishes security for page
}
else
{
?>
  <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
