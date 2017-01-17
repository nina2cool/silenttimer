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
	$CustomerID = $_GET['cust'];

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	#<Add button being pushed>
	if ($_POST['Save'] == "Save")
	{
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
		$EbayName = $_POST['EbayName'];
		$TypeID = $_POST['Type'];
		$BusinessName = dbQuote($_POST['BusinessName']);
		$BusinessType = $_POST['BusinessType'];
		
		if($PrepClass == '')
		{
		$PrepClass3 = $PrepClass2;
		}
		else
		{
		$PrepClass3 = $PrepClass;
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
		
		
		$goto = "CustomerInfo.php?cust=$CustomerID";
		header("location: $goto");
		
		
		}
		
				
	
		$sql3 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
		//put SQL statement into result set for loop through records
		$result3 = mysql_query($sql3) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result3))
		{
			
			$FirstName = $row[FirstName];
			$LastName = $row[LastName];
			$Address = $row[Address];
			$Address2 = $row[Address2];
			$City = $row[City];
			$State = $row[State];
			$StateOther = $row[StateOther];
			$ZipCode = $row[ZipCode];
			$Country = $row[CountryID];
			$Phone = $row[Phone];
			$Email = $row[Email];
			$School = $row[School];
			$PrepClass2 = $row[PrepClass];
			$EbayName = $row[EbayName];
			$TypeID = $row[Type];
			$BusinessType = $row[BusinessType];
			$BusinessName = $row[BusinessName];

		
		
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
		}

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";


?>





<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">Contact
      Information</a> | <a href="PurchaseHistory.php?cust=<? echo $CustomerID; ?>">Purchase
History</a></font></p>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
  Customer Info</strong></font></p>
<form name="form1" method="post" action="">
   
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td height="274" align="left" valign="top"><p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>&nbsp; &gt; Shipping
              Address and Contact Information </strong></font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr align="left" valign="top"> 
            <td colspan="2"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Business
                  Name</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="BusinessName" type="text" id="BusinessName3" value="<? echo addQuote($BusinessName);?>" size="35" maxlength="40">
            </font></td>
            <td>&nbsp;</td>
          </tr>
          <tr align="left" valign="top"> 
            <td width="39%" colspan="2"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>First
                  Name</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="FirstName" type="text" id="FirstName3" size="30" value="<? echo addQuote($FirstName);?>">
            </font></td>
            <td width="61%"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Last 
              Name</font></strong><br>
              <input name="LastName" type="text" id="LastName3" value="<? echo addQuote($LastName);?>" size="30">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Shipping
                    Address</font></strong><br>
              <input name="Address" type="text" id="Address5" value="<? echo addQuote($Address);?>" size="35" maxlength="30">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Shipping
                    Address 2 </font></strong><br>
              <input name="Address2" type="text" id="Address22" value="<? echo addQuote($Address2);?>" size="35" maxlength="30">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>City</strong><br>
              <input name="City" type="text" id="City4" size="20" value="<? echo addQuote($City);?>">
              </font></td>
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State</strong><br>
              </font><font size="2" face="Arial, Helvetica, sans-serif">
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
                <option value="<? echo $row[State];?>" <? if($row[State] == $State){echo "selected";}?>><? echo $row[Name];?></option>
                <?
						}
					?>
              </select>
              </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">              <br>
              <strong>State Other</strong><br>
              <input name="StateOther" type="text" id="StateOther" value="<? echo $StateOther; ?>" size="20">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip 
              Code</strong><br>
              <input name="ZipCode" type="text" id="ZipCode5" size="11" maxlength="10" value="<? echo $ZipCode;?>">
              </font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
</tr>
          <tr align="left" valign="top">
            <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Country</strong><strong><br>
            </strong>
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
                  <option value="<? echo $row[LocationID];?>" <? if($row[LocationID] == $Country){echo "selected";}?>><? echo $row[Name];?></option>
                  <?
						}
					?>
                </select>
            </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Phone
                     Number</font></strong> (xxx-xxx-xxxx)<br>
              <input name="Phone" type="text" id="Phone3" size="20" value="<? echo $Phone;?>">
            </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Email 
              Address</font></strong><br>
              <input name="Email" type="text" id="Email2" size="50" maxlength="50" value="<? echo $Email;?>">
              </font></td>
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>eBay/Amazon
                  Name </strong></font><br> 
            <input name="EbayName" type="text" id="EbayName3" value="<? echo $EbayName; ?>" size="35"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <br>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top"> <p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong> 
          <a name="Optional"></a>&nbsp; &gt; Optional Information</strong></font></p>
        <table width="100%"  border="0" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">School</font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
              <input name="School" type="text" id="School22" value="<? echo addQuote($School);?>">
            </font></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Prep
            Class</font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
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
                <option value="<? echo $row[Name]; ?>" <? if($row[Name] == $PrepClass){echo "selected";} ?> ><? echo $row[Name]; ?></option>
                <?
					}
				?>
              </select>
OR
<input name="PrepClass" type="text" id="PrepClass22" value="<? echo addQuote($PrepClass2);?>">
            </font></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Type</font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="Type" tabindex="" id="Type" class="text">
                <option value="" selected>Select</option>
                <? 
					$sql3 = "SELECT * FROM tblCustomerType";
					$result3 = mysql_query($sql3) or die("Cannot get State");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
                <option value="<? echo $row3[TypeID]; ?>"<? if($row3[TypeID] == $TypeID){echo "selected";}?>><? echo $row3[Type]; ?></option>
                <?
					}
				?>
              </select>
            </font></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Business
                  Type (Bookstore,
            Test Prep, University) </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
              <input name="BusinessType" type="text" id="BusinessType" value="<? echo $BusinessType;?>">
            </font></td>
          </tr>
        </table>        
      </td>
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

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

?>