<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{


// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	//grab variables to get purchase info from DB.
	$AffID = $_GET['aff'];
	

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	#<Add button being pushed>
	if ($_POST['Save'] == "Save")
	{
		$AccountType = $_POST['txtAccountType'];
		$CompanyName = $_POST['txtCompanyName'];
		$FirstName = $_POST['txtFirstName'];
		$LastName = $_POST['txtLastName'];
		$Email = $_POST['txtEmail'];
		$Phone = $_POST['txtPhone'];
		$Fax = $_POST['txtFax'];
		$Address = $_POST['txtAddress'];
		$Address2 = $_POST['txtAddress2'];
		$City = $_POST['txtCity'];
		$State = $_POST['txtState'];
		$ZipCode = $_POST['txtZipCode'];
		$Country = $_POST['txtCountry'];
		$WebSiteName = $_POST['txtWebSiteName'];
		$URL = $_POST['txtURL'];
		$Description = $_POST['txtDescription'];
		$UniqueVisitors = $_POST['txtUniqueVisitors'];
		$PageViews = $_POST['txtPageViews'];
		$AnnualStudents = $_POST['txtAnnualStudents'];
		$CheckToName = $_POST['txtCheckToName'];
		$UserName = $_POST['txtUserName'];
		$Password = $_POST['txtPassword'];
		$Rate = $_POST['txtRate'];
		$AcceptTerms = $_POST['txtAcceptTerms'];
		$DateTime = $_POST['txtDateTime'];
		$IP = $_POST['txtIP'];
		$Approved = $_POST['txtApproved'];
		$Custom = $_POST['txtCustom'];
		$Status = $_POST['txtStatus'];
		
		
		$sql = "UPDATE tblAffiliate
			SET
			AccountType = '$AccountType',
			CompanyName = '$CompanyName',
			FirstName = '$FirstName', 
			LastName = '$LastName', 
			Email = '$Email',
			Phone = '$Phone',
			Fax = '$Fax',
			Address = '$Address', 
			Address2 = '$Address2', 
			City = '$City', 
			State = '$State', 
			ZipCode = '$ZipCode',
			Country = '$Country',
			WebSiteName = '$WebSiteName',
			URL = '$URL',
			Description = '$Description',
			UniqueVisitors = '$UniqueVisitors',
			PageViews = '$PageViews', 
			AnnualStudents = '$AnnualStudents', 
			CheckToName = '$CheckToName', 
			UserName = '$UserName', 
			Password = '$Password', 
			Rate = '$Rate',
			AcceptTerms = '$AcceptTerms', 
			DateTime = '$DateTime',
			IP = '$IP',
			Approved = '$Approved',
			Custom = '$Custom',
			Status = '$Status'
			WHERE AffiliateID = '$AffID'";
		
		mysql_query($sql) or die("Cannot update affiliate information");
		
		header("location: PartnerInfo.php?aff=$AffID");		
		
	} 
		
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
			$WebSiteName = $row[WebSiteName];
			$URL = $row[URL];
			$Description = $row[Description];
			$UniqueVisitors = $row[UniqueVisitors];
			$PageViews = $row[PageViews];
			$AnnualStudents = $row[AnnualStudents];
			$CheckToName = $row[CheckToName];
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


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";


	
	?>		


 <p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Affiliate 
  Information for <? echo $CompanyName; ?></strong></font></p>
<form name="form1" method="post" action="">
   

  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Account
          Type</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtAccountType" type="text" id="txtAccountType" value="<? echo $AccountType; ?>">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Company
          Name</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="txtCompanyName" cols="50" rows="2" id="txtCompanyName"><? echo $CompanyName; ?></textarea>
      </font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">First
          Name</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"> <strong>
        <input name="txtFirstName" type="text" id="txtFirstName" value="<? echo $FirstName; ?>">
      </strong> </font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Last
          Name</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtLastName" type="text" id="txtLastName2" value="<? echo $LastName; ?>">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Email</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="txtEmail" cols="50" rows="2" id="txtEmail"><? echo $Email; ?></textarea>
      </font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Phone</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtPhone" type="text" id="txtPhone2" value="<? echo $Phone;?>">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Fax</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtFax" type="text" id="txtPhone3" value="<? echo $Fax;?>">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Address</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="txtAddress" cols="50" rows="2" id="txtAddress"><? echo $Address;?></textarea>
      </font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Address2</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="txtAddress2" cols="50" rows="2" id="txtAddress2"><? echo $Address2;?></textarea>
      </font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">City</font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtCity" type="text" id="txtCity2" value="<? echo $City;?>">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">State</font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtState" type="text" id="txtState2" value="<? echo $State;?>">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Zip
          Code</font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtZipCode" type="text" id="txtZipCode2" value="<? echo $ZipCode;?>">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Country</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="txtCountry" type="text" id="txtCountry2" value="<? echo $Country;?>">
      </strong></font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Web
          Site Name</font></td>
      <td><input name="txtWebSiteName" type="text" id="txtWebSiteName" value="<? echo $WebSiteName;?>" size="50"></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">URL</font></td>
      <td><textarea name="txtURL" cols="50" rows="2" id="txtURL"><? echo $URL;?></textarea></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Description</font></td>
      <td><textarea name="txtDescription" cols="50" rows="3" id="txtDescription"><? echo $Description;?></textarea></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Unique
          Visitors</font></td>
      <td><input name="txtUniqueVisitors" type="text" id="txtUniqueVisitors" value="<? echo $UniqueVisitors;?>"></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Page
          Views</font></td>
      <td><input name="txtPageViews" type="text" id="txtPageViews" value="<? echo $PageViews;?>"></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Annual
          Students</font></td>
      <td><input name="txtAnnualStudents" type="text" id="txtAnnualStudents" value="<? echo $AnnualStudents;?>"></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Make
          Check Payable To</font></td>
      <td><input name="txtCheckToName" type="text" id="txtCheckToName" value="<? echo $CheckToName;?>"></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">User
          Name</font></td>
      <td><input name="txtUserName" type="text" id="txtUserName" value="<? echo $UserName;?>"></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Password</font></td>
      <td><input name="txtPassword" type="text" id="txtPassword" value="<? echo $Password;?>"></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Rate</font></td>
      <td><input name="txtRate" type="text" id="txtRate" value="<? echo $Rate;?>"></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Date
          and Time</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
      <input name="txtDateTime" type="text" id="txtDateTime" value="<? echo $DateTime;?>">
</strong></font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">IP</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtIP" type="text" id="txtIP" value="<? echo $IP;?>">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Approved?</font></td>
      <td><input name="txtApproved" type="text" id="txtApproved" value="<? echo $Approved;?>"></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Custom</font></td>
      <td><input name="txtCustom" type="text" id="txtCustom" value="<? echo $Custom;?>"></td>
    </tr>
    <tr>
      <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
      <td><input name="txtStatus" type="text" id="txtStatus" value="<? echo $Status;?>"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Save" type="submit" id="Save" value="Save">
    <input type="reset" name="Submit2" value="Reset">
    </font></strong></p>
</form>
<p>&nbsp;</p>

  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

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
