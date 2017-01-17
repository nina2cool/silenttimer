<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

$PageTitle = "Add a Customer";

//security check
If (session_is_registered('e'))
{

	// has database username and password, so don't need to put it in the page.
	require "include/dbinfo.php";
	
	$EmployeeID= $_SESSION['e'];
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	

	
	if ($_POST['NewCustomer'] == "Add")
	{
		$BusinessName = $_POST['txtBusinessName'];
		$Address = $_POST['txtAddress'];
		$Address2 = $_POST['txtAddress2'];
		$City = $_POST['txtCity'];
		$State = $_POST['txtState'];
		$ZipCode = $_POST['txtZipCode'];
		$Country = $_POST['txtCountry'];
		$ContactName = $_POST['txtContactName'];
		$OfficePhone1 = $_POST['txtOfficePhone1'];
		$Ext1 = $_POST['txtExt1'];
		$OfficePhone2 = $_POST['txtOfficePhone2'];
		$Ext2 = $_POST['txtExt2'];
		$Fax = $_POST['txtFax'];
		$Email1 = $_POST['txtEmail1'];
		$Email2 = $_POST['txtEmail2'];
		$URL = $_POST['txtURL'];
		$BusinessType = $_POST['txtBusinessType'];
		$RIN = $_POST['txtRIN'];
		$Notes = $_POST['txtNotes'];
	
		
		
		$sql = "INSERT INTO tblBusinessCustomer(BusinessName, Address, Address2, City, State, ZipCode, Country, ContactName, OfficePhone1, Ext1, OfficePhone2, Ext2, Fax, Email1, Email2, URL, BusinessType, RIN, Notes) 
				VALUES ('$BusinessName', '$Address', '$Address2', '$City', '$State', '$ZipCode', '$Country', '$ContactName', '$OfficePhone1', '$Ext1', '$OfficePhone2', '$Ext2', '$Fax', '$Email1', '$Email2', '$URL', '$BusinessType', '$RIN', '$Notes');";
		mysql_query($sql) or die("Cannot Insert New Customer, try again!");

		$sql = "SELECT BusinessCustomerID from tblBusinessCustomer WHERE BusinessName = '$BusinessName' and ZipCode = '$ZipCode' and OfficePhone1 = '$OfficePhone1';";
		
		$result = mysql_query($sql) or die("Cannot execute query!");
				
				while($row = mysql_fetch_array($result))
				{
					$bcID = $row[BusinessCustomerID];
				}
		
		$Now = date("Y-m-d");
		
		$sql = "INSERT INTO tblEmployeeCustomer(BusinessCustomerID, EmployeeID, DateAssigned) 
				VALUES ('$bcID', '$EmployeeID', '$Now');";
		mysql_query($sql) or die("Cannot Insert New Task, try again!");		
		
	}
?>


<title></title>
<link href="../mgt/todo/style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<div align="center"> 
  <p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add 
    a Customer</strong></font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Before adding a customer, 
    check the <a href="allcustomers.php">list of all customers</a> to make sure 
    there are no duplications.</font></p>
  <p align="right"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif">&lt;&lt;<a href="customers.php">Back 
    to Customer List</a></font></p>
  <table width="95%" border="0" cellspacing="0" cellpadding="10">
    <tr>
      <td>
<table width="100%" border="1" cellspacing="0" cellpadding="7">
          <tr>
            <td> 
              <form action="" method="post" name="frmCreate" id="frmCreate">
                <p><font size="2" face="Arial, Helvetica, sans-serif">Business 
                  Name</font><br>
                  <input name="txtBusinessName" type="text" id="txtBusinessName">
                </p>
                <p><font size="2" face="Arial, Helvetica, sans-serif"> Address</font><br>
                  <textarea name="txtAddress" id="txtAddress"></textarea>
                </p>
                <p><font size="2" face="Arial, Helvetica, sans-serif">Address2<br>
                  <textarea name="txtAddress2" id="txtAddress2"></textarea>
                  </font></p>
                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tr>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">City</font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">State 
                      (two-letter abbreviation) </font></td>
                  </tr>
                  <tr>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="txtCity" type="text" id="txtCity2">
                      </font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="txtState" type="text" id="txtState2" maxlength="3">
                      </font></td>
                  </tr>
                  <tr>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Zip 
                      Code</font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Country</font></td>
                  </tr>
                  <tr>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="txtZipCode" type="text" id="txtZipCode2">
                      </font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="txtCountry" type="text" id="txtCountry2">
                      </font></td>
                  </tr>
                </table>
                <p><font size="2" face="Arial, Helvetica, sans-serif">Contact 
                  Name</font><br>
                  <textarea name="txtContactName" id="txtContactName"></textarea>
                </p>
                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tr> 
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Office 
                      Phone #1</font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Ext. 
                      #1</font></td>
                  </tr>
                  <tr> 
                    <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="txtOfficePhone1" type="text" id="txtOfficePhone1">
                      </font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="txtExt1" type="text" id="txtExt1">
                      </font></td>
                  </tr>
                  <tr> 
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Office 
                      Phone #2</font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Ext. 
                      #2</font></td>
                  </tr>
                  <tr> 
                    <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="txtOfficePhone2" type="text" id="txtOfficePhone2">
                      </font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="txtExt2" type="text" id="txtExt2">
                      </font></td>
                  </tr>
                  <tr>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Fax Number</font></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><input name="txtFax" type="text" id="txtFax"></td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                <br>
                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                  <tr> 
                    <td><p><font size="2" face="Arial, Helvetica, sans-serif">Email 
                        Address #1</font></p></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">Email 
                      Address #2</font></td>
                  </tr>
                  <tr> 
                    <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="txtEmail1" type="text" id="txtEmail1">
                      </font></td>
                    <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="txtEmail2" type="text" id="txtEmail2">
                      </font></td>
                  </tr>
                  <tr>
                    <td><font size="2" face="Arial, Helvetica, sans-serif">URL:</font></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><textarea name="txtURL" id="txtURL"></textarea></td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                <p><br>
                  <font size="2" face="Arial, Helvetica, sans-serif"><a href="#" onClick="MM_openBrWindow('bustypes.php','','scrollbars=yes,width=600,height=600')">Business 
                  Type &lt;&lt; click for explanation of types</a><br>
                  <select name="txtBusinessType" id="txtBusinessType">
                    <option value="Tutor">Tutor</option>
                    <option value="Individual Tutor">Individual Tutor</option>
                    <option value="Bookstore">Bookstore</option>
                    <option value="College Bookstore">College Bookstore</option>
                    <option value="Test Prep Company">Test Prep Company</option>
                    <option value="Elementary School">Elementary School</option>
                    <option value="Middle/Junior High School">Middle/Junior High 
                    School</option>
                    <option value="High School">High School</option>
                    <option value="College/University">College/University</option>
                    <option value="Private School">Private School</option>
                    <option value="Other">Other</option>
                  </select>
                  </font></p>
                <p><font size="2" face="Arial, Helvetica, sans-serif">Notes:<br>
                  <textarea name="txtNotes" cols="50" id="txtNotes"></textarea>
                  </font><font size="2" face="Arial, Helvetica, sans-serif"> </font></p>
                <p> 
                  <input name="NewCustomer" type="submit" id="NewCustomer" value="Add">
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