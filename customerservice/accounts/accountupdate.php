<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

//security check
If (session_is_registered('custID'))
{

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
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
?>

<?	

	//grab variables to get purchase info from DB.
	#$CustomerID = $_GET['cust'];

	$custID = $_SESSION['custID'];

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	#<Add button being pushed>
	if ($_POST['Save'] == "Save")
	{
		// Customer Table
		$FirstName = dbQuote($_POST['txtFirstName']);
		$LastName = dbQuote($_POST['txtLastName']);
		$Address = dbQuote($_POST['txtAddress']);
		$Address2 = dbQuote($_POST['txtAddress2']);
		$City = dbQuote($_POST['txtCity']);
		$State = $_POST['txtState'];
		$StateOther = dbQuote($_POST['txtStateOther']);
		$ZipCode = $_POST['txtZipCode'];
		$Country = $_POST['txtCountry'];
		$Phone = $_POST['txtPhone'];
		$Email = $_POST['txtEmail'];
		$School = dbQuote($_POST['txtSchool']);
		$PrepClass = dbQuote($_POST['txtPrepClass']);
		$EbayName = $_POST['txtEbayName'];
		$Type = $_POST['txtType'];
		$BusinessName = dbQuote($_POST['txtBusinessName']);
		$BusinessType = $_POST['txtBusinessType'];
		

		
		$sql3 = "UPDATE tblCustomer
			SET FirstName = '$FirstName', 
			LastName = '$LastName', 
			Address = '$Address', 
			Address2 = '$Address2',
			City = '$City', 
			State = '$State', 
			ZipCode = '$ZipCode',
			Country = '$Country', 
			Phone = '$Phone',
			Email = '$Email',
			School = '$School',
			EbayName = '$EbayName',
			Type = '$Type',
			BusinessType = '$BusinessType',
			BusinessName = '$BusinessName',
			PrepClass = '$PrepClass',
			StateOther = '$StateOther'
			WHERE CustomerID = '$custID'";

		
		mysql_query($sql3) or die("Cannot update customer information");
		
		}
		
				
	
		$sql3 = "SELECT * FROM tblCustomer WHERE CustomerID = '$custID'";
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
			$Country = $row[Country];
			$Phone = $row[Phone];
			$Email = $row[Email];
			$School = $row[School];
			$PrepClass = $row[PrepClass];
			$EbayName = $row[EbayName];
			$Type = $row[Type];
			$BusinessType = $row[BusinessType];
			$BusinessName = $row[BusinessName];

		}
		
		
	?>		

<?
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

?>





<p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Update
      Your Account Information</strong></font></p>
<p align="left"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Change
      the items you wish to update, and press &quot;<font color="#003399">Save</font>&quot; at the bottom. </font></strong></p>
<form name="form1" method="post" action="">
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td height="274" align="left" valign="top"><p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>&nbsp; &gt; Shipping
              Address and Contact Information </strong></font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr align="left" valign="top"> 
            <td colspan="2"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Business 
              Name</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtBusinessName" type="text" id="txtBusinessName3" value="<? echo addQuote($BusinessName);?>" size="35" maxlength="30">
              </font></td>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr align="left" valign="top"> 
            <td width="39%" colspan="2"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">First 
              Name</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtFirstName" type="text" id="txtFirstName3" size="30" value="<? echo addQuote($FirstName);?>">
              </font></td>
            <td width="61%" colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Last 
              Name</font></strong><br>
              <input name="txtLastName" type="text" id="txtLastName3" value="<? echo addQuote($LastName);?>" size="30">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Shipping
                    Address</font></strong><br>
              <input name="txtAddress" type="text" id="txtAddress5" value="<? echo addQuote($Address);?>" size="35" maxlength="30">
              </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Shipping
                    Address 2 </font></strong><br>
              <input name="txtAddress2" type="text" id="txtAddress22" value="<? echo addQuote($Address2);?>" size="35" maxlength="30">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>City</strong><br>
              <input name="txtCity" type="text" id="txtCity4" size="20" value="<? echo addQuote($City);?>">
              </font></td>
            <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State</strong><br>
              <input name="txtState" type="text" id="txtState5" value="<? echo addQuote($State);?>" size="10">
              <br>
              <strong>State Other</strong><br>
              <input name="txtStateOther" type="text" id="txtStateOther" value="<? echo $StateOther; ?>" size="20">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip 
              Code</strong><br>
              <input name="txtZipCode" type="text" id="txtZipCode5" size="11" maxlength="10" value="<? echo $ZipCode;?>">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Country </strong>(<a href="../../management/customers/CountryCodes.php" target="_blank">country
                  codes</a>) <strong><br>
                  <input name="txtCountry" type="text" id="txtCountry5" value="<? echo $Country;?>">
                  </strong></font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="4"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Phone 
              Number</font></strong><br>
              <input name="txtPhone" type="text" id="txtPhone3" size="20" value="<? echo $Phone;?>">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Email 
              Address</font></strong><br>
              <input name="txtEmail" type="text" id="txtEmail2" size="50" maxlength="50" value="<? echo $Email;?>">
              </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">eBay/Amazon 
              Name </font></strong></font><br> <input name="txtEbayName" type="text" id="txtEbayName3" value="<? echo $EbayName; ?>" size="35"></td>
          </tr>
        </table>
      </td>
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
                <input name="txtSchool" type="text" id="txtSchool22" value="<? echo addQuote($School);?>">
            </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Prep
                  Class</strong><br>
              <input name="txtPrepClass" type="text" id="txtPrepClass22" value="<? echo addQuote($PrepClass);?>">
            </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Type </strong>(default:
                web, ebay, bulk, samples, amazon, replacement, phone)<br>
                <input name="txtType" type="text" id="txtType" value="<? echo $Type;?>">
            </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Business
                  Type</strong></font><font size="2" face="Arial, Helvetica, sans-serif"> (Bookstore,
                  Test Prep, University) <br>
                <input name="txtBusinessType" type="text" id="txtBusinessType" value="<? echo $BusinessType;?>">
                </font></td>
          </tr>
          <?
		  	if($Custom != "yes")
			{
		  ?>
          <?
		  	}
		  ?>
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

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

?>