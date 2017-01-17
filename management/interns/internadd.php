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
		$CompanyRepID = $_POST['txtCompanyRepID'];
		$Type = $_POST['txtType'];
		$LocationID = $_POST['Location'];
		$ResumeID = $_POST['Resume'];
		$Status = $_POST['txtStatus'];
		$Notes = $_POST['txtNotes'];
		
			
		
		
		$sql = "INSERT INTO tblEmployee(EmployeeID, FirstName, LastName, Address, Address2, City, State, ZipCode, Country, HomePhone, CellPhone, Fax, Email, DateStarted, DateEnded, CompanyRepID, Type, LocationID, ResumeID, UserName, Password, Status, Notes) 
				VALUES ('$EmployeeID', '$FirstName', '$LastName', '$Address', '$Address2', '$City', '$State', '$ZipCode', '$Country', '$HomePhone', '$CellPhone', '$Fax', '$Email', '$DateStarted', '$DateEnded', '$CompanyRepID', '$Type', '$LocationID', '$ResumeID', '$UserName', '$Password', '$Status', '$Notes');";
		mysql_query($sql) or die("Cannot Insert New Intern, try again!");

		}
?>


<title></title>
<link href="../../mgt/todo/style.css" rel="stylesheet" type="text/css">
<div align="center"> 
  <p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add 
    an Intern</strong></font></p>
  <form action="" method="post" name="frmCreate" id="frmCreate">
    <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr> 
        <td width="50%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">First 
          Name</font></strong></td>
        <td><input name="txtFirstName" type="text" id="txtFirstName"></td>
      </tr>
      <tr> 
        <td width="50%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Last 
          Name</font> </strong></td>
        <td><input name="txtLastName" type="text" id="txtLastName2"></td>
      </tr>
      <tr> 
        <td width="50%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">SSN 
          (Employee ID)</font></strong></td>
        <td><input name="txtSSN" type="text" id="txtSSN"></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Address</font></strong></td>
        <td><textarea name="txtAddress" cols="30" rows="2" id="textarea"></textarea></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Address 
          2</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"> 
          <textarea name="txtAddress2" cols="30" rows="2" id="textarea2"></textarea>
          </font></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">City</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="txtCity" type="text" id="txtCity">
          </font></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">State</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="txtState" type="text" id="txtState2" size="3" maxlength="3">
          </font></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Zip 
          Code</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="txtZipCode" type="text" id="txtZipCode2">
          </font></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Country</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="txtCountry" type="text" id="txtCountry2" value="US">
          </font></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Home 
          Phone</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="txtHomePhone" type="text" id="txtHomePhone">
          </font></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Cell 
          Phone </font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="txtCellPhone" type="text" id="txtCellPhone">
          </font></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Fax 
          Number</font></strong></td>
        <td><input name="txtFax" type="text" id="txtFax"></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Email 
          Address</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="txtEmail" type="text" id="txtEmail">
          </font></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">User 
          Name</font></strong></td>
        <td><input name="txtUserName" type="text" id="txtUserName"></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Password</font></strong></td>
        <td><input name="txtPassword" type="text" id="txtPassword"></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Date 
          Started (0000-00-00)</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="txtDateStarted" type="text" id="txtDateStarted">
          </font></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Date 
          Ended (0000-00-00)</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="txtDateEnded" type="text" id="txtDateEnded">
          </font></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Company 
          Rep ID</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="txtCompanyRepID" type="text" id="txtCompanyRepID">
          </font></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Type</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="txtType" type="text" id="txtType" value="Intern">
          </font></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Location 
          ID </font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <select name="Location" class="text" id="Location">
            <option value = "" selected>Please Select</option>
            <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT LocationID, LocationName
								FROM tblInternshipLocation
								ORDER BY LocationName";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
            <option value="<? echo $row[LocationID];?>" <? if($row[LocationID] == $LocationID){echo "selected";}?>><? echo $row[LocationName];?> 
            - <? echo $row[LocationID]; ?></option>
            <?
						}
					?>
          </select>
          </font></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="txtStatus" type="text" id="txtStatus" value="active">
          </font></td>
      </tr>
      <tr> 
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Notes</font></strong></td>
        <td><textarea name="txtNotes" cols="50" rows="3" id="textarea6"></textarea></td>
      </tr>
      <tr> 
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Resume 
          ID </font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <select name="Resume" class="text" id="Resume">
            <option value = "" selected>Please Select</option>
            <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT ResumeID, FirstName, LastName
								FROM tblResume
								ORDER BY ResumeID";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
            <option value="<? echo $row[ResumeID];?>" <? if($row[ResumeID] == $ResumeID){echo "selected";}?>><? echo $row[FirstName];?> <? echo $row[LastName]; ?></option>
            <?
						}
					?>
          </select>
          </font></td>
      </tr>
    </table>
    <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"> </font></p>
    <p align="left"> 
      <input name="NewEmployee" type="submit" id="NewEmployee3" value="Add">
    </p>
  </form>
  <p>&nbsp;</p>
</div>
<?


// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>

            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>