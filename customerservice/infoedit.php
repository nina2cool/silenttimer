<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('custID'))
{
// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";


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



//CODE GOES BELOW-----------------------------------------------------------

	$custID = $_SESSION['custID'];
	
	$CustomerID = $custID;



	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	#<Add button being pushed>
	if ($_POST['Save'] == "Save")
	{
		
		$sql5 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
		//put SQL statement into result set for loop through records
		$result5 = mysql_query($sql5) or die("Cannot execute query customerID!");
		
		while($row5 = mysql_fetch_array($result5))
		{
			$FirstName1 = $row5[FirstName];
			$LastName1 = $row5[LastName];
			$Address1 = $row5[Address];
			$Address21 = $row5[Address2];
			$City1 = $row5[City];
			$State1 = $row5[State];
			$StateOther1 = $row5[StateOther];
			$ZipCode1 = $row5[ZipCode];
			$Country1 = $row5[CountryID];
			$Phone1 = $row5[Phone];
			$Email1 = $row5[Email];
			$School1 = $row5[School];
			$PrepClass21 = $row5[PrepClass];
			$EbayName1 = $row5[EbayName];
		}
		
		$Now = date("Y-m-d H:i:s");
		$IP = $_SERVER["REMOTE_ADDR"];
		
		// Customer Table
		$FirstName = dbQuote($_POST['FirstName']);
		$LastName = dbQuote($_POST['LastName']);
		$Address = dbQuote($_POST['Address']);
		$Address2 = dbQuote($_POST['Address2']);
		$City = dbQuote($_POST['City']);
		$State = $_POST['State'];
		$StateOther = dbQuote($_POST['StateOther']);
		$ZipCode = $_POST['ZipCode'];
		$CountryID = $_POST['Country'];
		$Phone = $_POST['Phone'];
		$Email = $_POST['Email'];
		$School = dbQuote($_POST['School']);
		$PrepClass = $_POST['PrepClass'];
		$PrepClass2 = dbQuote($_POST['PrepClass']);
		
		
		if($PrepClass == '')  { $PrepClass3 = $PrepClass2; }	else	{ $PrepClass3 = $PrepClass;	}
		
				
		if($FirstName <> $FirstName1)
		{
			$sql = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type)
			VALUES ('$CustomerID', '$Now', '$IP', '$FirstName1', '$FirstName', 'Edit');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert First Name information");
		}
		if($LastName <> $LastName1)
		{
			$sql = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type)
			VALUES ('$CustomerID', '$Now', '$IP', '$LastName1', '$LastName', 'Edit');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert last Name information");
		}
		if($Address <> $Address1)
		{
			$sql = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type)
			VALUES ('$CustomerID', '$Now', '$IP', '$Address1', '$Address', 'Edit');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert address information");
		}
		if($Address2 <> $Address21)
		{
			$sql = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type)
			VALUES ('$CustomerID', '$Now', '$IP', '$Address21', '$Address2', 'Edit');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert addresss2 information");
		}
		if($City <> $City1)
		{
			$sql = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type)
			VALUES ('$CustomerID', '$Now', '$IP', '$City1', '$City', 'Edit');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert city information");
		}
		if($State <> $State1)
		{
			$sql = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type)
			VALUES ('$CustomerID', '$Now', '$IP', '$State1', '$State', 'Edit');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert First Name information");
		}
		if($StateOther <> $StateOther1)
		{
			$sql = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type)
			VALUES ('$CustomerID', '$Now', '$IP', '$StateOther1', '$StateOther', 'Edit');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert First Name information");
		}
		if($ZipCode <> $ZipCode1)
		{
			$sql = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type)
			VALUES ('$CustomerID', '$Now', '$IP', '$ZipCode1', '$ZipCode', 'Edit');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert First Name information");
		}
		if($CountryID <> $Country1)
		{
			$sql = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type)
			VALUES ('$CustomerID', '$Now', '$IP', '$Country1', '$CountryID', 'Edit');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert First Name information");
		}
		if($Phone <> $Phone1)
		{
			$sql = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type)
			VALUES ('$CustomerID', '$Now', '$IP', '$Phone1', '$Phone', 'Edit');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert First Name information");
		}
		if($Email <> $Email1)
		{
			$sql = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type)
			VALUES ('$CustomerID', '$Now', '$IP', '$Email1', '$Email', 'Edit');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert First Name information");
		}
		if($School <> $School1)
		{
			$sql = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type)
			VALUES ('$CustomerID', '$Now', '$IP', '$School1', '$School', 'Edit');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert First Name information");
		}
		if($PrepClass3 <> $PrepClass21)
		{
			$sql = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, IP, ChangeFrom, ChangeTo, Type)
			VALUES ('$CustomerID', '$Now', '$IP', '$PrepClass21', '$PrepClass3', 'Edit');";
			//echo $sql;
			$result = mysql_query($sql) or die("Cannot update insert First Name information");
		}
		
		
		$sql3 = "UPDATE tblCustomer
			SET FirstName = '$FirstName', 
			LastName = '$LastName', 
			Address = '$Address', 
			Address2 = '$Address2',
			City = '$City', 
			State = '$State',
			StateOther = '$StateOther',
			ZipCode = '$ZipCode',
			CountryID = '$CountryID', 
			Phone = '$Phone',
			Email = '$Email',
			School = '$School',
			EbayName = '$EbayName',
			Type = '$TypeID',
			BusinessType = '$BusinessType',
			BusinessName = '$BusinessName',
			PrepClass = '$PrepClass3',
			StateOther = '$StateOther'
			WHERE CustomerID = '$CustomerID'";
		
		mysql_query($sql3) or die("Cannot update customer information");
		
		
		echo "Your information has been saved.";
				
		}
		
				
	
		$sql3 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
		//put SQL statement into result set for loop through records
		$result3 = mysql_query($sql3) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result3))
		{
			
			$FirstName1 = $row[FirstName];
			$LastName1 = $row[LastName];
			$Address1 = $row[Address];
			$Address21 = $row[Address2];
			$City1 = $row[City];
			$State1 = $row[State];
			$StateOther1 = $row[StateOther];
			$ZipCode1 = $row[ZipCode];
			$Country1 = $row[CountryID];
			$Phone1 = $row[Phone];
			$Email1 = $row[Email];
			$School1 = $row[School];
			$PrepClass21 = $row[PrepClass];
			$EbayName1 = $row[EbayName];

		
		}
		
		
		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		$FirstName = addQuote($FirstName);
		$LastName = addQuote($LastName);
		$Address = addQuote($Address);
		$Address2 = addQuote($Address2);
		$City = addQuote($City);
		$FirstNameB = addQuote($FirstNameB);
		$LastNameB = addQuote($LastNameB);
		$AddressB = addQuote($AddressB);
		$CityB = addQuote($CityB);		
		$School = addQuote($School);
		$PrepClass = addQuote($PrepClass);
		$BusinessName = addQuote($BusinessName);
		$StateOther = addQuote($StateOther);
		

?>





<p align="right"><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="orderhistory.php">Back to
    Order History Page </a></font></p>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Update
      Customer and Shipping Information</strong></font></p>
<form name="form1" method="post" action="">
  <font size="2" face="Arial, Helvetica, sans-serif"><strong> </strong></font> 
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">First
              Name</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                        </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="FirstName" type="text" id="FirstName3" value="<? echo addQuote($FirstName1);?>" size="30" maxlength="50">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Last
      Name</font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="LastName" type="text" id="LastName3" value="<? echo addQuote($LastName1);?>" size="30" maxlength="50">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Shipping
              Address</font></strong><br>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Address" type="text" id="Address5" value="<? echo addQuote($Address1);?>" size="35" maxlength="50">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Shipping
              Address 2 </font></strong><br>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Address2" type="text" id="Address22" value="<? echo addQuote($Address21);?>" size="35" maxlength="50">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>City</strong><br>
      </font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="City" type="text" id="City4" value="<? echo addQuote($City1);?>" size="20" maxlength="50">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State</strong><br>
        </font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;
        
      </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp; </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="State" class="text" id="State">
          <option value = "" selected>Please Select</option>
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT State, Name
								FROM tblState
								
								ORDER BY Name";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[State];?>" <? if($row[State] == $State1){echo "selected";}?>><? echo $row[Name];?></option>
          <?
						}
					?>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State
            Other</strong><br>
      </font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="StateOther" type="text" id="StateOther" value="<? echo $StateOther1; ?>" size="20" maxlength="50">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip
            Code</strong><br>
      </font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="ZipCode" type="text" id="ZipCode5" size="11" maxlength="10" value="<? echo $ZipCode1;?>">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Country</strong><strong><br>
        </strong>
            
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Country" class="text" id="Country">
          <option value = "" selected>Please Select</option>
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT LocationID, Name
								FROM tblShipLocation
								
								ORDER BY Name";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[LocationID];?>" <? if($row[LocationID] == $Country1){echo "selected";}?>><? echo $row[Name];?></option>
          <?
						}
					?>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Phone
              Number</font></strong> (xxx-xxx-xxxx)<br>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Phone" type="text" id="Phone3" value="<? echo $Phone1;?>" size="20" maxlength="30">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Email
              Address</font></strong><br>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Email" type="text" id="Email2" size="50" maxlength="100" value="<? echo $Email1;?>">
      </font></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top"> <p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong> 
          <a name="Optional"></a>&nbsp; &gt; Optional Information</strong></font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr align="left" valign="top"> 
            <td width="59%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>School</strong><br>
                <input name="School" type="text" id="School22" value="<? echo addQuote($School1);?>" maxlength="50">
            </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Prep
                  Class</strong><br>
                  <select name="PrepClass" class="text" id="PrepClass" onChange="visible_state('PrepClass');">
                    <option value="None" selected>Select</option>
                    <?     
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql = "SELECT Name, PrepClassID
							FROM tblPrepClass
							WHERE Status = 'active'
							ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot execute query!");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                    <option value="<? echo $row[Name]; ?>" <? if($row[Name] == $PrepClass1){echo "selected";} ?> ><? echo $row[Name]; ?></option>
                    <?
					}
				?>
                  </select> 
                  OR 
              <input name="PrepClass" type="text" id="PrepClass22" value="<? echo addQuote($PrepClass21);?>" maxlength="50">
            </font></td>
          </tr>
        </table> </td>
    </tr>
  </table>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <br>
    <input name="Save" type="submit" id="Save" value="Save">
    <input type="reset" name="Submit2" value="Reset">
    </font></strong></p>
</form>
<p>&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customerservice/index.php'>
<?
}
?>