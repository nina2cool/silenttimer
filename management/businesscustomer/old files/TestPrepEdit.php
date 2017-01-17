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

	# --------------------------------------------------------------------------------------------
	#   Function to insert back slashes into characters with a single or a double quote in them.
	# --------------------------------------------------------------------------------------------
	function escapeQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("'","||",$var);
			$string = str_replace('"','||||',$string);
		}

		return $string;
	}
	
	function removeBars($var)
	{
		if (isset($var))
		{
			$string = str_replace("||","'",$var);
			$string = str_replace('||||','"',$string);
		}

		return $string;
	}

	function addQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("\'","'",$var);
			$string = str_replace('\"','"',$string);
		}

		return $string;
	}
	
	function dbQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("||","\'",$var);
			$string = str_replace('||||','\"',$string);
		}

		return $string;
	}
	# --------------------------------------------------------------------------------------------


	//grab variables to get purchase info from DB.
	$bcID = $_GET['bc'];
	
	$userName = $_SESSION['userName'];
	
	
		# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			
	
	$sql6 = "SELECT * FROM tblEmployee WHERE UserName = '$userName'";
	//put SQL statement into result set for loop through records
	$result6 = mysql_query($sql6) or die("Cannot execute query EmployeeID!");
	
	while($row6 = mysql_fetch_array($result6))
	{
		
		$EmployeeID = $row6[EmployeeID];
	}



	#<Add button being pushed>
	if ($_POST['Save'] == "Save")
	{	
	
		$sql5 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$bcID'";
		//put SQL statement into result set for loop through records
		$result5 = mysql_query($sql5) or die("Cannot execute query customerID!");
		
		while($row5 = mysql_fetch_array($result5))
		{
			$Chain1 = $row5[Chain];
			$CustomerType1 = $row5[CustomerType];
			$Name1 = $row5[Name];
			$Notes1 = $row5[Notes];	
			$Status1 = $row5[Status];	
			$Address1 = $row5[Address];
			$Address21 = $row5[Address2];
			$Address31 = $row5[Address3];
			$City1 = $row5[City];
			$State1 = $row5[State];
			$ZipCode1 = $row5[ZipCode];
			$Country1 = $row5[Country];
			$Phone11 = $row5[Phone1];
			$Fax11 = $row5[Fax1];
			$Email11 = $row5[Email1];
			$Website1 = $row5[Website];
			$Updated1 = $row5[TestPrepUpdated];
			$TestPrepStatus1 = $row5[TestPrepStatus];
		}

	
		$Chain = dbQuote($_POST['txtChain']);
		$CustomerType = $_POST['txtCustomerType'];
		$Name = dbQuote($_POST['txtName']);
		$Notes = dbQuote($_POST['txtNotes']);	
		$Status = $_POST['txtStatus'];	
		$Address = dbQuote($_POST['txtAddress']);
		$Address2 = dbQuote($_POST['txtAddress2']);
		$Address3 = dbQuote($_POST['txtAddress3']);
		$City = dbQuote($_POST['txtCity']);
		$State = $_POST['txtState'];
		$ZipCode = $_POST['txtZipCode'];
		$Country = $_POST['txtCountry'];
		$Phone1 = $_POST['txtPhone1'];
		$Fax1 = $_POST['txtFax1'];
		$Email1 = $_POST['txtEmail1'];
		$Website = $_POST['txtWebsite'];
		$Updated = $_POST['Updated'];
		$Update = $_POST['Update'];
		$TestPrepStatus = $_POST['TestPrepStatus'];
		$Name1 = dbQuote($Name1);
		
		if($Update == 'y') { $Updated = "y"; }
		
		
		$Now = date("Y-m-d H:i:s");
		$IP = $_SERVER["REMOTE_ADDR"];
		
		
		if($Chain <> $Chain1)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$Chain1', '$Chain', 'Edit', '$EmployeeID');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert Chain information");
		}
		if($CustomerType <> $CustomerType1)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$CustomerType1', '$CustomerType', 'Edit', '$EmployeeID');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert Customer Type information");
		}
		if($Address <> $Address1)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$Address1', '$Address', 'Edit', '$EmployeeID');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert address information");
		}
		if($Address2 <> $Address21)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$Address21', '$Address2', 'Edit', '$EmployeeID');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert addresss2 information");
		}
		if($Address3 <> $Address31)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$Address31', '$Address3', 'Edit', '$EmployeeID');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert addresss3 information");
		}
		if($City <> $City1)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$City1', '$City', 'Edit', '$EmployeeID');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert city information");
		}
		if($State <> $State1)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$State1', '$State', 'Edit', '$EmployeeID');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert state information");
		}
		if($StateOther <> $StateOther1)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$StateOther1', '$StateOther', 'Edit', '$EmployeeID');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert state other information");
		}
		if($ZipCode <> $ZipCode1)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$ZipCode1', '$ZipCode', 'Edit', '$EmployeeID');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert zip code information");
		}
		if($Country <> $Country1)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$Country1', '$Country', 'Edit', '$EmployeeID');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert country information");
		}
		if($Phone1 <> $Phone11)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$Phone11', '$Phone1', 'Edit', '$EmployeeID');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert phone information");
		}
		if($Fax1 <> $Fax11)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$Fax11', '$Fax1', 'Edit', '$EmployeeID');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert fax information");
		}
		if($Website <> $Website1)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$Website1', '$Website', 'Edit', '$EmployeeID');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert website information");
		}
		if($Email1 <> $Email11)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$Email11', '$Email1', 'Edit', '$EmployeeID');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert email information");
		}
		if($Name <> $Name1)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$Name1', '$Name', 'Edit', '$EmployeeID');";
			echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert Name information");
		}
		if($Notes <> $Notes1)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$Notes1', '$Notes', 'Edit', '$EmployeeID');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert notes information");
		}
		if($TestPrepStatus <> $TestPrepStatus1)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$TestPrepStatus1', '$TestPrepStatus', 'Edit', '$EmployeeID');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert test prep status information");
		}
		if($Updated <> $Updated1)
		{
			$sql = "INSERT INTO tblCustomerEdit(BusinessCustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type, EmployeeID)
			VALUES ('$bcID', '$Now', '$IP', '$Updated1', '$Updated', 'Edit', '$EmployeeID');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert updated information");
		}

		$sql = "UPDATE tblBusinessCustomer
				SET Name = '$Name',
				Chain = '$Chain',
				Address = '$Address',
				Address2 = '$Address2',
				Address3 = '$Address3',
				City = '$City', 
				State = '$State',
				ZipCode = '$ZipCode',
				Country = '$Country',
				Fax1 = '$Fax1',
				Website = '$Website',
				Notes = '$Notes',
				Status = '$Status',
				Phone1 = '$Phone1',
				Email1 = '$Email1',
				CustomerType = '$CustomerType',
				TestPrepUpdated = '$Updated',
				TestPrepStatus = '$TestPrepStatus'
				WHERE BusinessCustomerID = '$bcID'";
					
		$result = mysql_query($sql) or die("Cannot update customer information!");
				
		
		} 
		
	
		$sql3 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$bcID'";

		
		//put SQL statement into result set for loop through records
		$result3 = mysql_query($sql3) or die("Cannot execute query customerID!");
		
		while($row3 = mysql_fetch_array($result3))
		{
			$Chain1 = $row3[Chain];
			$CustomerType1 = $row3[CustomerType];
			$Name1 = $row3[Name];
			$Notes1 = $row3[Notes];	
			$Status1 = $row3[Status];	
			$Address1 = $row3[Address];
			$Address21 = $row3[Address2];
			$Address31 = $row3[Address3];
			$City1 = $row3[City];
			$State1 = $row3[State];
			$ZipCode1 = $row3[ZipCode];
			$Country1 = $row3[Country];
			$Phone11 = $row3[Phone1];
			$Fax11 = $row3[Fax1];
			$Email11 = $row3[Email1];
			$Website1 = $row3[Website];
			$Updated1 = $row3[TestPrepUpdated];
			$TestPrepStatus1 = $row3[TestPrepStatus];
		}
	
			
		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		$Name = addQuote($Name);
		$Chain = addQuote($Chain);
		$Address = addQuote($Address);
		$City = addQuote($City);
		$Address2 = addQuote($Address2);
		$Address3 = addQuote($Address3);
		$Notes = addQuote($Notes);		
		$Name1 = addQuote($Name1);

		}

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
<? echo $Name; ?></strong></font></p>
<form name="form1" method="post" action="">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Business
            Name<font color="#FF0000" size="3">*</font></font></strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
      </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtName" type="text" id="txtName3" value="<? echo $Name1;?>" size="50">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Chain Name</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> (ex:
          Barnes &amp; Noble, Kaplan, Princeton Review)<strong><br>
                  </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtChain" type="text" id="txtChain2" value="<? echo $Chain1;?>" size="30">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Customer
            Type<font color="#FF0000" size="3">*</font> </font></strong><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Must have a type listed - either Bookstore or Test Prep or University<strong><br>
    </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtCustomerType" type="text" id="txtCustomerType2" value="<? echo $CustomerType1;?>">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Address</font><font color="#FF0000" size="3">*</font></font></strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
      </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtAddress" type="text" id="txtAddress5" value="<? echo $Address1;?>" size="50">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Address
            2<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtAddress2" type="text" id="txtAddress25" value="<? echo $Address21;?>" size="50">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Address
            3 <br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtAddress3" type="text" id="txtAddress32" value="<? echo $Address31;?>" size="50">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">City</font><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3">*</font></font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><br>
      </font></strong></td>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtCity" type="text" id="txtCity3" value="<? echo $City1;?>" size="25">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">State</font><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3">*</font></font></strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
      </strong></font></td>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtState" type="text" id="txtState4" value="<? echo $State1;?>" maxlength="50">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Zip
            Code</font><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3">*</font></font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><br>
                    </font></strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">L</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">ook
                    it up on <a href="http://www.usps.com/zip4/"><strong>USPS
                    website</strong></a>.<strong><br>
                  </strong></font></td>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtZipCode" type="text" id="txtZipCode4" value="<? echo $ZipCode1;?>" maxlength="20">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Country<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtCountry" type="text" id="txtCountry4" value="<? echo $Country1?>">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Phone
              Number</font> 1<br>
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">Ex:
        512-258-8668<strong><br>
                  </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtPhone1" type="text" id="txtPhone1" value="<? echo $Phone11;?>">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Fax 1<br>
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">Ex:
        512-258-8668<strong><br>
                  </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtFax1" type="text" id="txtFax1" value="<? echo $Fax11;?>">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Email
              Address</font> 1<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtEmail1" type="text" id="txtEmail1" value="<? echo $Email11;?>">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Website </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(include
          http://, etc)<strong><br>
                  </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtWebsite" type="text" id="txtWebsite" value="<? echo $Website1;?>" size="50">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Updated</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Updated" type="text" id="Updated" value="<? echo $Updated1;?>" size="3" maxlength="1">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Test Prep
            Status<font color="#FF0000" size="3">*</font></font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="TestPrepStatus" id="TestPrepStatus">
        <option value="" <? if ($TestPrepStatus1 == ''){echo 'selected';}?>>no change</option>
		<option value="out of business" <? if ($TestPrepStatus1 == 'out of business'){echo 'selected';}?>>out of business</option>
		<option value="new address" <? if ($TestPrepStatus1 == 'new address'){echo 'selected';}?>>new address</option>
		<option value="cannot find address" <? if ($TestPrepStatus1 == 'cannot find address'){echo 'selected';}?>>cannot find address</option>
		<option value="changed name" <? if ($TestPrepStatus1 == 'changed name'){echo 'selected';}?>>changed name</option>
		<option value="new center">new center</option>
        </select>
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="txtNotes" cols="50" id="txtNotes"><? echo $Notes1;?></textarea>
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Status<font color="#FF0000" size="3">*</font></font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtStatus" type="text" id="txtStatus" value="<? echo $Status1;?>">
      </font></strong></td>
    </tr>
  </table>
  <br>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Save" type="submit" id="Save" value="Save">
    <input type="reset" name="Submit2" value="Reset">
    <input name="Update" type="checkbox" id="Update" value="y" checked> 
  </font></strong><font size="2" face="Arial, Helvetica, sans-serif">auto update</font></p>
</form>
<p>&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.
require "../include/footerlinks.php";



?>