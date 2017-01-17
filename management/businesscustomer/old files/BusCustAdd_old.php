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


	
			# link to Database...
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");			
		
		
	$Now = date("Y-m-d H:i:s");

	#<Add button being pushed>
	if ($_POST['Add'] == "Add")
	{
		// Customer Table
		
		$Chain = $_POST['txtChain'];
		$CustomerType = $_POST['txtCustomerType'];
		$Name = $_POST['txtName'];
		$TPRType = $_POST['txtTPRType'];
		$TPRRegion = $_POST['txtTPRRegion'];
		$IncNumber = $_POST['txtIncNumber'];
		$BNCBNumber = $_POST['txtBNCBNumber'];
		$ContactFirstName = $_POST['txtContactFirstName'];
		$ContactLastName = $_POST['txtContactLastName'];
		$ContactPosition = $_POST['txtContactPosition'];
		$ContactEmail = $_POST['txtContactEmail'];
		$ContactFirstName2 = $_POST['txtContactFirstName2'];
		$ContactLastName2 = $_POST['txtContactLastName2'];
		$ContactPosition2 = $_POST['txtContactPosition2'];
		$ContactEmail2 = $_POST['txtContactEmail2'];
		$StoreDirector = $_POST['txtStoreDirector'];	
		$StoreManager = $_POST['txtStoreManager'];	
		$StoreTradeSupervisor = $_POST['txtStoreTradeSupervisor'];	
		$Notes = $_POST['txtNotes'];	
		$Status = $_POST['txtStatus'];	
		$Address = dbQuote($_POST['txtAddress']);
		$Address2 = dbQuote($_POST['txtAddress2']);
		$Address3 = dbQuote($_POST['txtAddress3']);
		$City = dbQuote($_POST['txtCity']);
		$State = $_POST['State'];
		$ZipCode = $_POST['txtZipCode'];
		$Country = $_POST['txtCountry'];
		$Phone1 = $_POST['txtPhone1'];
		$Phone2 = $_POST['txtPhone2'];
		$Fax1 = $_POST['txtFax1'];
		$Fax2 = $_POST['txtFax2'];
		$Email1 = $_POST['txtEmail1'];
		$Email2 = $_POST['txtEmail2'];
		$Website = $_POST['txtWebsite'];
		$BordersStoreNumber = $_POST['BordersStoreNumber'];
		$Rebate = $_POST['Rebate'];
		

	
		
		//check to see if customer already exists... if they don't add them..if they do, grab their CustomerID to use.
			$sql = "SELECT * FROM tblBusinessCustomer WHERE Name='$Name' AND Chain = '$Chain' AND ZipCode = '$ZipCode' AND Phone1 = '$Phone1'";
			echo $sql;
			
			$result = mysql_query($sql) or die("Cannot execute query");
						
			while($row = mysql_fetch_array($result))
			{
				$cID = $row[BusinessCustomerID];
			}
			
			//if there is no customer record for them, add them to customer table...
			If ($cID == "")
			{
				$sql = "INSERT INTO tblBusinessCustomer
				(Name, Chain, IncNumber, BNCBNumber, Address, Address2, Address3, City, 
				State, ZipCode, Country, Phone2, Fax1, Fax2, Website, ContactFirstName,
				ContactLastName, ContactPosition, ContactEmail, ContactFirstName2,
				ContactLastName2, ContactPosition2, ContactEmail2, StoreDirector, StoreManager,
				StoreTradeSupervisor, Notes, Status, TPRType, TPRRegion,
				Phone1, Email1, Email2, CustomerType, BordersStoreNumber, Rebate)
				
				VALUES 
				('$Name', '$Chain', '$IncNumber', '$BNCBNumber', '$Address', '$Address2',
				'$Address3', '$City', '$State', '$ZipCode', '$Country', '$Phone2', '$Fax1',
				'$Fax2', '$Website', '$ContactFirstName', '$ContactLastName', '$ContactPosition',
				'$ContactEmail', '$ContactFirstName2', '$ContactLastName2', 
				'$ContactPosition2', '$ContactEmail2', '$StoreDirector', '$StoreManager',
				'$StoreTradeSupervisor', '$Notes', '$Status', '$TPRType', '$TPRRegion',
				'$Phone1', '$Email1', '$Email2', '$CustomerType', '$BordersStoreNumber', '$Rebate')";
				 
				//echo $sql;
				
				mysql_query($sql) or die("Cannot insert customer, please try again.");
		
		
				
		$goto = "index.php";
		header("location: $goto");
	
		}
			
	
		?>		

<?
		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		$FirstName = addQuote($FirstName);
		$LastName = addQuote($LastName);
		$Address = addQuote($Address);
		$City = addQuote($City);
		$FirstNameB = addQuote($FirstNameB);
		$LastNameB = addQuote($LastNameB);
		$AddressB = addQuote($AddressB);
		$CityB = addQuote($CityB);		
		$School = addQuote($School);
		$PrepClass = addQuote($PrepClass);
		

		
		
		}
		
?>





<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; 
  Add  Bookstore or Test Prep </strong></font></p>
<form name="form1" method="post" action="">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Business
            Name<font color="#FF0000" size="3">*</font></font></strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                  </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtName" type="text" id="txtName3" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Chain Name</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> (ex:
          Barnes &amp; Noble, Kaplan, Princeton Review)<strong><br>
                  </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtChain" type="text" id="txtChain2">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Customer
            Type<font color="#FF0000" size="3">*</font> </font></strong><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Must have a type listed - either Bookstore or Test Prep or University<strong><br>
    </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtCustomerType" type="text" id="txtCustomerType2" value="Bookstore">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Address</font><font color="#FF0000" size="3">*</font></font></strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
      </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtAddress" type="text" id="txtAddress5">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Address
            2<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtAddress2" type="text" id="txtAddress25">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Address
            3 <br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtAddress3" type="text" id="txtAddress32">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">City</font><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3">*</font></font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><br>
      </font></strong></td>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtCity" type="text" id="txtCity3">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">State</font><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3">*</font></font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> </font></strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
      </strong></font></td>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> </font><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="State" tabindex="" id="State" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql3 = "SELECT * FROM tblState ORDER BY State";
					$result3 = mysql_query($sql3) or die("Cannot get State");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
          <option value="<? echo $row3[State]; ?>"><? echo $row3[State]; ?></option>
          <?
					}
				?>
        </select>
      </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> </font></strong></td>
    </tr>
    <tr>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Zip
            Code</font><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3">*</font></font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><br>
                    </font></strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">L</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">ook
                    it up on <a href="http://www.usps.com/zip4/"><strong>USPS
                    website</strong></a>.<strong><br>
                  </strong></font></td>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtZipCode" type="text" id="txtZipCode4" maxlength="20">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Country </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(US,
          CA for Canada) <strong><br>
                      </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtCountry" type="text" id="txtCountry" value="US">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Phone
              Number</font> 1<br>
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">Ex:
        512-258-8668<strong><br>
                  </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtPhone1" type="text" id="txtPhone1">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Fax 1<br>
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">Ex:
        512-258-8668<strong><br>
                  </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtFax1" type="text" id="txtFax1">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Email
              Address</font> 1<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtEmail1" type="text" id="txtEmail1">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Website </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(include
          http://, etc)<strong><br>
                  </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtWebsite" type="text" id="txtWebsite">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Phone Number
            2<br>
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">Ex:
        512-258-8668<strong><br>
                  </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtPhone2" type="text" id="txtPhone24">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Fax 2<br>
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">Ex:
        512-258-8668<strong><br>
                  </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtFax2" type="text" id="txtFax22">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Email Address
            2<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtEmail2" type="text" id="txtEmail24">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Contact
              First Name</font></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                  </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtContactFirstName" type="text" id="txtContactFirstName">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Contact
              Last Name</font><br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtContactLastName" type="text" id="txtContactLastName">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Contact
              Position </font></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                  </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtContactPosition" type="text" id="txtContactPosition">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Contact
              Email</font></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                  </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtContactEmail" type="text" id="txtContactEmail">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Contact
              First Name</font></font><font size="2" face="Arial, Helvetica, sans-serif"> 2 <br>
                  </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtContactFirstName2" type="text" id="txtContactFirstName2">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Contact
              Last Name</font> 2<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtContactLastName2" type="text" id="txtContactLastName2">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Contact
              Position </font></font><font size="2" face="Arial, Helvetica, sans-serif"> 2 <br>
                  </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtContactPosition2" type="text" id="txtContactPosition2">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Contact
              Email</font></font><font size="2" face="Arial, Helvetica, sans-serif"> 2 <br>
                  </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtContactEmail2" type="text" id="txtContactEmail2">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Store Director</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtStoreDirector" type="text" id="txtStoreDirector">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Store Manager</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtStoreManager" type="text" id="txtStoreManager">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Store Trade
            Supervisor</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> (B &amp; N
            only)</font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtStoreTradeSupervisor" type="text" id="txtStoreTradeSupervisor">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">TPR Type </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(COS,
          INDP, etc) (Princeton Review only)<strong><br>
                      </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtTPRType" type="text" id="txtTPRType2">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">TPR Region </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(SW,
          Central, etc) (Princeton Review only)<strong><br>
                      </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtTPRRegion" type="text" id="txtTPRRegion2">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Inc. Number </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(B &amp; N
          only)<strong><br>
                      </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtIncNumber" type="text" id="txtIncNumber2">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">BNCB Number</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> (B &amp; N
          only)<strong><br>
                      </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtBNCBNumber" type="text" id="txtBNCBNumber2">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="txtNotes" id="txtNotes"></textarea>
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Status<font color="#FF0000" size="3">*</font></font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtStatus" type="text" id="txtStatus" value="active">
      </font></strong></td>
    </tr>
  </table>
  <br>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Add" type="submit" id="Add" value="Add">
    <input type="reset" name="Submit2" value="Reset">
    </font></strong></p>
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


}
?>