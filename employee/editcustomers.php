<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

$PageTitle = "Customer Details";

//security check
If (session_is_registered('e'))
{


// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?	

	//grab variables to get purchase info and customer info from DB.
	$BusinessCustomerID = $_GET['c'];
	
	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$BusinessName = $row[BusinessName];
		$Address = $row[Address];
		$Address2 = $row[Address2];
		$City = $row[City];
		$State = $row[State];
		$ZipCode = $row[ZipCode];
		$Country = $row[Country];
		$ContactName = $row[ContactName];
		$OfficePhone1 = $row[OfficePhone1];
		$Ext1 = $row[Ext1];
		$OfficePhone2 = $row[OfficePhone2];
		$Ext2 = $row[Ext2];
		$Fax = $row[Fax];
		$Email1 = $row[Email1];
		$Email2 = $row[Email2];
		$URL = $row[URL];
		$BusinessType = $row[BusinessType];
		$Notes = $row[Notes];


	}
	
	
		
	
?>

<?  // -------- code to save values from form into tables, etc....

	if ($_POST['Update'] == "Update")
	{
		$Lock = $_POST['chkLock'];
		$Notes = $_POST['Notes'];
		
		$BusinessName = $_POST['BusinessName'];
		$Address = $_POST['Address'];
		$Address2 = $_POST['Address2'];
		$City = $_POST['City'];
		$State = $_POST['State'];
		$ZipCode = $_POST['ZipCode'];
		$Country = $_POST['Country'];
		$ContactName = $_POST['ContactName'];
		$OfficePhone1 = $_POST['OfficePhone1'];
		$Ext1 = $_POST['Ext1'];
		$OfficePhone2 = $_POST['OfficePhone2'];
		$Ext2 = $_POST['Ext2'];
		$Fax = $_POST['Fax'];
		$Email1 = $_POST['Email1'];
		$Email2 = $_POST['Email2'];
		$URL = $_POST['URL'];
		$BusinessType = $_POST['BusinessType'];
		$Notes = $_POST['Notes'];
		if ($Lock != "locked")
		{
		
		$sql = "UPDATE tblBusinessCustomer SET BusinessName = '$BusinessName', Address = '$Address', Address2 = '$Address2', City = '$City', State = '$State', ZipCode = '$ZipCode', Country = '$country', ContactName = '$ContactName', OfficePhone1 = '$OfficePhone1', Ext1 = '$Ext1', OfficePhone2 = '$OfficePhone2', Ext2 = '$Ext2', Fax = '$Fax', 
		Email1 = '$Email1', Email2 = '$Email2', URL = '$URL', BusinessType = '$BusinessType', Notes = '$Notes'
		WHERE BusinessCustomerID = '$BusinessCustomerID'";
		
		
		mysql_query($sql) or die("Cannot update customer information, please try again.");
		
			
			
		}	
	}
?>


<? // ---- code to fill page with information....
	
		
?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Customer Details</strong></font> 
</p>
<p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong>If 
  you want to edit the Customer Information, <font color="#FF0000">UNLOCK the 
  page</font>, or your updates will not be saved in the database.</strong></font></p>
<p align="right"><font size="3" face="Arial, Helvetica, sans-serif">&lt;&lt;<a href="customers.php">Back 
  to Customer Lis</a>t</font></p>
<form action="" method="post" name="frmChange" id="frmChange">
  <table width="100%" border="0" cellspacing="0" cellpadding="8">
                <tr> 
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%"><strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">Customer 
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
            <td align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif">Business 
                Name<br>
                <input name="BusinessName" type="text" id="BusinessName" value="<? echo $BusinessName; ?>">
                </font></p>
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
              <p><font size="2" face="Arial, Helvetica, sans-serif">Contact Name<br>
                <textarea name="ContactName" id="ContactName"><? echo $ContactName; ?></textarea>
                </font></p>
              <p>&nbsp;</p>
              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Office 
                    Phone #1</font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Ext. 
                    #1</font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="OfficePhone1" type="text" id="OfficePhone1" value="<? echo $OfficePhone1; ?>">
                    </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="Ext1" type="text" id="Ext1" value="<? echo $Ext1; ?>">
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
                    <input name="OfficePhone2" type="text" id="txtOfficePhone22" value="<? echo $OfficePhone2; ?>">
                    </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="Ext2" type="text" id="Ext2" value="<? echo $Ext2; ?>">
                    </font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Fax</font></td>
                  <td>&nbsp;</td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="Fax" type="text" id="Fax" value="<? echo $Fax ?>">
                    </font></td>
                  <td>&nbsp;</td>
                </tr>
              </table>
              <p>&nbsp;</p>
              <table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tr> 
                  <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Email 
                    #1</font></td>
                  <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Email 
                    #2</font></td>
                </tr>
                <tr> 
                  <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="Email1" type="text" id="Email1" value="<? echo $Email1; ?>">
                    </font></td>
                  <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <input name="Email2" type="text" id="Email2" value="<? echo $Email2; ?>">
                    </font></td>
                </tr>
                <tr> 
                  <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">URL</font></td>
                  <td width="50%">&nbsp;</td>
                </tr>
                <tr> 
                  <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <textarea name="URL" id="URL"><? echo $URL; ?></textarea>
                    </font></td>
                  <td width="50%">&nbsp;</td>
                </tr>
              </table>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="#" onClick="MM_openBrWindow('bustypes.php','','scrollbars=yes,width=600,height=600')">Business 
                Type &lt;&lt; Click for explanation of Types</a><br>
                <select name="BusinessType" id="BusinessType">
                  <option value="Tutor" <? if($BusinessType == 'Tutor'){echo "selected";}?>>Tutor</option>
                  <option value="Individual Tutor"<? if($BusinessType == 'Individual Tutor'){echo "selected";}?>>Individual Tutor</option>
                  <option value="Bookstore"<? if($BusinessType == 'Bookstore'){echo "selected";}?>>Bookstore</option>
                  <option value="College Bookstore"<? if($BusinessType == 'College Bookstore'){echo "selected";}?>>College Bookstore</option>
                  <option value="Test Prep Company" <? if($BusinessType == 'Test Prep Company'){echo "selected";}?>>Test Prep Company</option>
                  <option value="Elementary School"<? if($BusinessType == 'Elementary School'){echo "selected";}?>>Elementary School</option>
                  <option value="Middle/Junior High School"<? if($BusinessType == 'Middle/Junior High School'){echo "selected";}?>>Middle/Junior High 
                  School</option>
                  <option value="High School"<? if($BusinessType == 'High School'){echo "selected";}?>>High School</option>
                  <option value="College/University"<? if($BusinessType == 'College/University'){echo "selected";}?>>College/University</option>
                  <option value="Private School"<? if($BusinessType == 'Private School'){echo "selected";}?>>Private School</option>
                  <option value="Other"<? if($BusinessType == 'Other'){echo "selected";}?>>Other</option>
                </select>
                </font></p>
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