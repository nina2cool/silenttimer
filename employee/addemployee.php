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

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	
	$EmployeeID= $_SESSION['e'];
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	if ($_POST['NewEmployee'] == "Add")
	{

		$EmployeeID = $_POST['txtSSN'];
		$RIN = $_POST['txtRIN'];
		$FirstName = $_POST['txtFirstName'];
		$LastName = $_POST['txtLastName'];
		$Address = $_POST['txtAddress'];
		$Address2 = $_POST['txtAddress2'];
		$City = $_POST['txtCity'];
		$State = $_POST['txtState'];
		$ZipCode = $_POST['txtZipCode'];
		$Country = $_POST['txtCountry'];
		$HomePhone = $_POST['txtHomePhone'];
		$CellPhone = $_POST['txtCellPhone'];
		$Fax = $_POST['txtFax'];
		$Email = $_POST['txtEmail'];
		$UserName = $_POST['txtUserName'];
		$Password = $_POST['txtPassword'];
		$DateStarted = $_POST['txtDateStarted'];
		$DateEnded = $_POST['txtDateEnded'];
		$CommissionRate = $_POST['txtCommissionRate'];
		$CompanyRepID = $_POST['txtCompanyRepID'];
		$Type = $_POST['txtType'];
		$AffiliateID = $_POST['txtAffiliateID'];
		$Notes = $_POST['txtNotes'];
		
			
		
		
		$sql = "INSERT INTO tblEmployee(EmployeeID, RIN, FirstName, LastName, Address, Address2, City, State, ZipCode, Country, HomePhone, CellPhone, Fax, Email, DateStarted, DateEnded, CommissionRate, CompanyRepID, Type, AffiliateID, UserName, Password, Notes) 
				VALUES ('$EmployeeID', '$RIN', '$FirstName', '$LastName', '$Address', '$Address2', '$City', '$State', '$ZipCode', '$Country', '$HomePhone', '$CellPhone', '$Fax', '$Email', '$DateStarted', '$DateEnded', '$CommissionRate', '$CompanyRepID', '$Type', '$AffiliateID', '$UserName', '$Password', '$Notes');";
		mysql_query($sql) or die("Cannot Insert New Employee, try again!");

		}
?>


<title></title>
<link href="../mgt/todo/style.css" rel="stylesheet" type="text/css">
<div align="center"> 
  <p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add 
    an Employee</strong></font></p>
  <p align="right"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif">&lt;&lt;<a href="../owners/EmployeeView.php">View 
    Employees </a></font></p>
  <table width="95%" border="0" cellspacing="0" cellpadding="10">
    <tr>
      <td>
<table width="100%" border="1" cellspacing="0" cellpadding="7">
          <tr>
            <td> 
              <form action="" method="post" name="frmCreate" id="frmCreate">
                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tr> 
                    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">First 
                      Name</font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Last 
                      Name</font></td>
                  </tr>
                  <tr> 
                    <td width="50%">
<input name="txtFirstName" type="text" id="txtFirstName"></td>
                    <td><input name="txtLastName" type="text" id="txtLastName"></td>
                  </tr>
                  <tr> 
                    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">SSN 
                      (Employee ID)</font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">RIN</font></td>
                  </tr>
                  <tr> 
                    <td width="50%">
<input name="txtSSN" type="text" id="txtSSN"></td>
                    <td><input name="txtRIN" type="text" id="txtRIN"></td>
                  </tr>
                </table>
                <p>&nbsp;</p>
                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tr>
                    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Address</font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Address2</font></td>
                  </tr>
                  <tr>
                    <td width="50%">
<textarea name="txtAddress" id="textarea"></textarea></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">
                      <textarea name="txtAddress2" id="textarea2"></textarea>
                      </font></td>
                  </tr>
                </table>
                <p><font size="2" face="Arial, Helvetica, sans-serif"> </font></p>
                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tr>
                    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">City</font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">State 
                      (two-letter abbreviation) </font></td>
                  </tr>
                  <tr>
                    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="txtCity" type="text" id="txtCity2">
                      </font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="txtState" type="text" id="txtState2" maxlength="3">
                      </font></td>
                  </tr>
                  <tr>
                    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Zip 
                      Code</font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Country</font></td>
                  </tr>
                  <tr>
                    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="txtZipCode" type="text" id="txtZipCode2">
                      </font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="txtCountry" type="text" id="txtCountry2">
                      </font></td>
                  </tr>
                </table>
                <p>&nbsp; </p>
                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tr> 
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Home 
                      Phone</font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Cell 
                      Phone </font></td>
                  </tr>
                  <tr> 
                    <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="txtHomePhone" type="text" id="txtHomePhone">
                      </font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="txtCellPhone" type="text" id="txtCellPhone">
                      </font></td>
                  </tr>
                  <tr> 
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Fax 
                      Number</font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Email 
                      Address</font></td>
                  </tr>
                  <tr> 
                    <td><input name="txtFax" type="text" id="txtFax"></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="txtEmail" type="text" id="txtEmail">
                      </font></td>
                  </tr>
                </table>
                <p>&nbsp;</p>
                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tr> 
                    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">User 
                      Name</font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Password</font></td>
                  </tr>
                  <tr> 
                    <td width="50%">
<input name="txtUserName" type="text" id="txtUserName"></td>
                    <td><input name="txtPassword" type="text" id="txtPassword"></td>
                  </tr>
                </table>
                <p>&nbsp;</p>
                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tr> 
                    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Date 
                      Started (0000-00-00)</font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Date 
                      Ended (0000-00-00)</font></td>
                  </tr>
                  <tr> 
                    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="txtDateStarted" type="text" id="txtDateStarted">
                      </font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="txtDateEnded" type="text" id="txtDateEnded">
                      </font></td>
                  </tr>
                </table>
                <br>
                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tr> 
                    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Commision 
                      Rate</font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Company 
                      Rep ID</font></td>
                  </tr>
                  <tr> 
                    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="txtCommissionRate" type="text" id="txtCommissionRate">
                      </font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="txtCompanyRepID" type="text" id="txtCompanyRepID">
                      </font></td>
                  </tr>
                </table>
                <br>
                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tr> 
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Type</font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Affiliate 
                      ID</font></td>
                  </tr>
                  <tr> 
                    <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="txtType" type="text" id="txtType">
                      </font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="txtAffiliateID" type="text" id="txtAffiliateID">
                      </font></td>
                  </tr>
                </table>
                <p><font size="2" face="Arial, Helvetica, sans-serif">Notes</font><br>
                  <textarea name="txtNotes" cols="75" rows="5" id="txtNotes"></textarea>
                </p>
                <p><font size="2" face="Arial, Helvetica, sans-serif"> </font><font size="2" face="Arial, Helvetica, sans-serif"> 
                  </font></p>
                <p> 
                  <input name="NewEmployee" type="submit" id="NewEmployee" value="Add">
                </p>
              </form>
              <p>&nbsp;</p>
        </td>
          </tr>
        </table>
        
      </td>
    </tr>
  </table>
  <p><font size="3" face="Arial, Helvetica, sans-serif"></font></p>
</div>
<?


// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

	//close connection to database
	mysql_close($link);
		
// finishes security for page
}
else
{
	$http .= "employee";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>