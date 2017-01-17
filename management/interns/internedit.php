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
?>

<?	

	//grab variables to get purchase info and customer info from DB.
	$EmployeeID = $_GET['int'];
	
	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	if ($_POST['Update'] == "Update")
	{
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
		$CompanyRepID = $_POST['CompanyRepID'];
		$Type = $_POST['Type'];
		$LocationID = $_POST['Location'];
		$Notes = $_POST['Notes'];
	
		
		$sql = "UPDATE tblEmployee
		SET FirstName = '$FirstName', 
		LastName = '$LastName', 
		EmployeeID = '$EmployeeID', 
		Address = '$Address', 
		Address2 = '$Address2', 
		City = '$City', 
		State = '$State', 
		ZipCode = '$ZipCode', 
		Country = '$Country', 
		HomePhone = '$HomePhone', 
		CellPhone = '$CellPhone', 
		Fax = '$Fax', 
		Email = '$Email', 
		DateStarted = '$DateStarted', 
		DateEnded = '$DateEnded', 
		CompanyRepID = '$CompanyRepID', 
		Type = '$Type', 
		LocationID = '$LocationID',
		UserName = '$UserName', 
		Password = '$Password', 
		Notes = '$Notes'
		WHERE EmployeeID = '$EmployeeID'";

		
		mysql_query($sql) or die("Cannot update employee information, please try again.");

	}
	
	$sql = "SELECT * FROM tblEmployee WHERE EmployeeID = '$EmployeeID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$FirstName = $row[FirstName];
		$LastName = $row[LastName];
		$EmployeeID = $row[EmployeeID];
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
		$CompanyRepID = $row[CompanyRepID];
		$Type = $row[Type];
		$LocationID = $row[LocationID];
		$UserName = $row[UserName];
		$Password = $row[Password];
		$Notes = $row[Notes];
	}
	

	
?>

<?  // -------- code to save values from form into tables, etc....


?>


<? // ---- code to fill page with information....
	
		
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View/Edit 
  Intern Information</strong></font></p>
<form action="" method="post" name="frmChange" id="frmChange">
  <table width="100%" border="0" cellspacing="0" cellpadding="8">
                <tr> 
                  
      <td align="left" valign="top"><table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">First 
              Name</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="FirstName" type="text" id="FirstName3" value="<? echo $FirstName; ?>">
              </font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Last 
              Name</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="LastName" type="text" id="LastName2" value="<? echo $LastName; ?>">
              </font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">SSN 
              (Employee ID)</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> <? echo $EmployeeID; ?> 
              <font color="#FF0000"></font></font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Address</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <textarea name="Address" cols="30" rows="2" id="textarea4"><? echo $Address; ?></textarea>
              </font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Address 
              2</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <textarea name="Address2" cols="30" rows="2" id="textarea5"><? echo $Address2; ?></textarea>
              </font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">City</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="City" type="text" id="City3" value="<? echo $City; ?>">
              </font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">State</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="State" type="text" id="State3" value="<? echo $State; ?>">
              </font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Zip 
              Code</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="ZipCode" type="text" id="ZipCode3" value="<? echo $ZipCode; ?>">
              </font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Country</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="Country" type="text" id="Country3" value="<? echo $Country; ?>">
              </font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Home 
              Phone </font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="HomePhone" type="text" id="HomePhone3" value="<? echo $HomePhone; ?>">
              </font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Cell 
              Phone </font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="CellPhone" type="text" id="CellPhone3" value="<? echo $CellPhone; ?>">
              </font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Fax</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="Fax" type="text" id="Fax3" value="<? echo $Fax ?>">
              </font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Email</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="Email" type="text" id="Email3" value="<? echo $Email; ?>">
              </font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">User 
              Name </font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="UserName" type="text" id="UserName3" value="<? echo $UserName; ?>">
              </font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Password</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="Password" type="password" id="Password4" value="<? echo $Password; ?>">
              </font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Date 
              Started (0000-00-00)</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="DateStarted" type="text" id="DateStarted3" value="<? echo $DateStarted; ?>">
              </font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Date 
              Ended (0000-00-00)</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="DateEnded" type="text" id="DateEnded3" value="<? echo $DateEnded; ?>">
              </font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Company 
              Rep ID</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="CompanyRepID" type="text" id="CompanyRepID3" value="<? echo $CompanyRepID; ?>">
              </font></td>
          </tr>
          <tr> 
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Type</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="Type" type="text" id="Type3" value="<? echo $Type; ?>">
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
            <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Notes</font></strong></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <textarea name="Notes" cols="50" rows="3" id="textarea6"><? echo $Notes; ?></textarea>
              </font></td>
          </tr>
        </table></td>
                </tr>
                <tr> 
                  
      <td align="left" valign="top"> <br>
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