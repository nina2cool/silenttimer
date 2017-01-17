<?
//security for page
session_start();

$PageTitle = "Employee Details";

// has http variable in it to populate links on page.
require "include/url.php";

//security check
If (session_is_registered('e'))
{


// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?	

	//grab variables to get purchase info and customer info from DB.
	$EmployeeID = $_GET['c'];
	
	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblEmployee WHERE EmployeeID = '$EmployeeID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$FirstName = $row[FirstName];
		$LastName = $row[LastName];
		$EmployeeID = $row[EmployeeID];
		$RIN = $row[RIN];
		$Address = $row[Address];
		$Address2 = $row[Address2];
		$City = $row[City];
		$State = $row[State];
		$ZipCode = $row[ZipCode];
		$Country = $row[Country];
		$HomePhone = $row[HomePhone];
		$CellPhone = $row[CellPhone];
		$Fax = $row[Fax];
		$Email = $row[Email];
		$DateStarted = $row[DateStarted];
		$DateEnded = $row[DateEnded];
		$CommissionRate = $row[CommissionRate];
		$CompanyRepID = $row[CompanyRepID];
		$Type = $row[Type];
		$AffiliateID = $row[AffiliateID];
		$UserName = $row[UserName];
		$Password = $row[Password];
		$Notes = $row[Notes];


	}
	
	
		
	
?>

<?  // -------- code to save values from form into tables, etc....

	if ($_POST['Update'] == "Update")
	{
		$Lock = $_POST['chkLock'];
		$Notes = $_POST['Notes'];
		
		$EmployeeID = $_POST['EmployeeID'];
		$RIN = $_POST['RIN'];
		$FirstName = $_POST['FirstName'];
		$LastName = $_POST['LastName'];
		$Address = $_POST['Address'];
		$Address2 = $_POST['Address2'];
		$City = $_POST['City'];
		$State = $_POST['State'];
		$ZipCode = $_POST['ZipCode'];
		$Country = $_POST['Country'];
		$HomePhone = $_POST['HomePhone'];
		$CellPhone = $_POST['CellPhone'];
		$Fax = $_POST['Fax'];
		$Email = $_POST['Email'];
		$UserName = $_POST['UserName'];
		$Password = $_POST['Password'];
		$DateStarted = $_POST['DateStarted'];
		$DateEnded = $_POST['DateEnded'];
		$CommissionRate = $_POST['CommissionRate'];
		$CompanyRepID = $_POST['CompanyRepID'];
		$Type = $_POST['Type'];
		$AffiliateID = $_POST['AffiliateID'];
		$Notes = $_POST['Notes'];
		if ($Lock != "locked")
		{
		
		$sql = "UPDATE tblEmployee SET FirstName = '$FirstName', LastName = '$LastName', EmployeeID = '$EmployeeID', RIN = '$RIN', Address = '$Address', Address2 = '$Address2', City = '$City', State = '$State', ZipCode = '$ZipCode', Country = '$Country', HomePhone = '$HomePhone', CellPhone = '$CellPhone', Fax = '$Fax', Email = '$Email', DateStarted = '$DateStarted', 
		DateEnded = '$DateEnded', CommissionRate = '$CommissionRate', CompanyRepID = '$CompanyRepID', Type = '$Type', UserName = '$UserName', Password = '$Password', Notes = '$Notes'
		WHERE EmployeeID = '$EmployeeID'";
		
		mysql_query($sql) or die("Cannot update employee information, please try again.");
		
			
			
		}	
	}
?>


<? // ---- code to fill page with information....
	
		
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Employee 
  Details</strong></font> </p>
<p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong>If 
  you want to edit the Employee Information, <font color="#FF0000">UNLOCK the 
  page</font>, or your updates will not be saved in the database.</strong></font></p>
<p align="right"><font size="3" face="Arial, Helvetica, sans-serif">&lt;&lt;<a href="employees.php">Back 
  to Employee List</a></font></p>
<form action="" method="post" name="frmChange" id="frmChange">
  <table width="100%" border="0" cellspacing="0" cellpadding="8">
                <tr> 
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%"><strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">Employee 
              Contact Information</font></strong><font face="Arial, Helvetica, sans-serif"><strong><font color="#333333" size="3"><br>
              </font></strong></font></td>
            <td width="50%"><div align="right"><font face="Arial, Helvetica, sans-serif"><strong><font color="#333333" size="3"> 
                <input name="chkLock" type="checkbox" id="chkLock" value="locked" checked>
                <font color="#FF0000" size="2">Locked</font></font></strong></font></div></td>
          </tr>
        </table>
        
      </td>
                </tr>
                <tr> 
                  <td align="left" valign="top"> <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
          <tr> 
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif">First 
                    Name</font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Last 
                    Name</font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="FirstName" type="text" id="FirstName" value="<? echo $FirstName; ?>">
                    </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="LastName" type="text" id="LastName" value="<? echo $LastName; ?>">
                    </font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif">SSN (Employee 
                    ID)</font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">RIN</font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="EmployeeID" type="text" id="EmployeeID" value="<? echo $EmployeeID; ?>">
                    </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="RIN" type="text" id="RIN" value="<? echo $RIN; ?>">
                    </font></td>
                </tr>
              </table>
              <p>&nbsp;</p>
              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Address</font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Address2</font></td>
                </tr>
                <tr> 
                  <td> <font size="2" face="Arial, Helvetica, sans-serif"> 
                    <textarea name="Address" id="Address"><? echo $Address; ?></textarea>
                    </font></td>
                  <td> <font size="2" face="Arial, Helvetica, sans-serif"> 
                    <textarea name="Address2" id="Address2"><? echo $Address2; ?></textarea>
                    </font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif">City</font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">State</font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="City" type="text" id="City" value="<? echo $City; ?>">
                    </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="State" type="text" id="State" value="<? echo $State; ?>">
                    </font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Zip Code</font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Country</font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="ZipCode" type="text" id="ZipCode" value="<? echo $ZipCode; ?>">
                    </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="Country" type="text" id="Country" value="<? echo $Country; ?>">
                    </font></td>
                </tr>
              </table>
              <p>&nbsp;</p>
              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Home 
                    Phone </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Cell 
                    Phone </font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="HomePhone" type="text" id="HomePhone" value="<? echo $HomePhone; ?>">
                    </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="CellPhone" type="text" id="CellPhone" value="<? echo $CellPhone; ?>">
                    </font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Fax</font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Email</font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="Fax" type="text" id="Fax" value="<? echo $Fax ?>">
                    </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="Email" type="text" id="Email" value="<? echo $Email; ?>">
                    </font></td>
                </tr>
              </table>
              <p>&nbsp;</p>
              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tr> 
                  <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">User 
                    Name </font></td>
                  <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Password</font></td>
                </tr>
                <tr> 
                  <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="UserName" type="text" id="UserName" value="<? echo $UserName; ?>">
                    </font></td>
                  <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="Password" type="text" id="Password" value="<? echo $Password; ?>">
                    </font></td>
                </tr>
              </table>
              <font size="2" face="Arial, Helvetica, sans-serif"><br>
              </font> <table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Date 
                    Started (0000-00-00)</font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Date 
                    Ended (0000-00-00)</font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="DateStarted" type="text" id="DateStarted" value="<? echo $DateStarted; ?>">
                    </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="DateEnded" type="text" id="DateEnded" value="<? echo $DateEnded; ?>">
                    </font></td>
                </tr>
              </table>
              <font size="2" face="Arial, Helvetica, sans-serif"><br>
              </font> <table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Commission 
                    Rate</font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Company 
                    Rep ID</font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="CommissionRate" type="text" id="CommissionRate" value="<? echo $CommissionRate; ?>">
                    </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="CompanyRepID" type="text" id="CompanyRepID" value="<? echo $CompanyRepID; ?>">
                    </font></td>
                </tr>
              </table>
              <font size="2" face="Arial, Helvetica, sans-serif"><br>
              </font> <table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Type</font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Affiliate 
                    ID</font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="Type" type="text" id="Type" value="<? echo $Type; ?>">
                    </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="AffiliateID" type="text" id="AffiliateID" value="<? echo $AffiliateID; ?>">
                    </font></td>
                </tr>
              </table>
              <p><font size="2" face="Arial, Helvetica, sans-serif">Notes<br>
                <textarea name="Notes" id="Notes"><? echo $Notes; ?></textarea>
                </font> </p></td>
          </tr>
        </table>
                    
        <br>
        <p align="left"> 
          <input name="Update" type="submit" id="Update" value="Update">
          &nbsp;&nbsp; 
          <input type="reset" name="Submit2" value="Reset">
          <br>
        </p>
      </td>
                </tr>
              </table>
            </form>
            
<p></p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";


// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>