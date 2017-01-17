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


	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			
	


	#<Add button being pushed>
	if ($_POST['Add'] == "Add")
	{	

	
		$Chain = dbQuote($_POST['txtChain']);
		$CustomerType = $_POST['txtCustomerType'];
		$Name = dbQuote($_POST['txtName']);
		$Notes = $_POST['txtNotes'];	
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
		
		$sql5 = "SELECT MAX(PromotionCodeID) AS Max FROM tblBusinessCustomer WHERE CustomerType = 'Test Prep' AND State = '$State'";
		//put SQL statement into result set for loop through records
		
		//echo "<br>max promo = " .$sql5;
		
		$result5 = mysql_query($sql5) or die("Cannot execute query customerID!");
		
		while($row5 = mysql_fetch_array($result5))
		{
			$Max = $row5[Max];
		}
		
		//echo "<br>max = " .$Max;
		
		//echo "<br>State = " .$State;
				
		if($State == "CO") { $State1 = "CL"; }
		elseif($State == "HI") { $State1 = "HW"; }
		elseif($State == "IA") { $State1 = "AW"; }
		elseif($State == "ID") { $State1 = "DH"; }
		elseif($State == "IL") { $State1 = "LL"; }
		elseif($State == "IN") { $State1 = "NA"; }
		elseif($State == "MI") { $State1 = "MC"; }
		elseif($State == "MO") { $State1 = "MR"; }
		elseif($State == "OH") { $State1 = "HH"; }
		elseif($State == "OK") { $State1 = "KL"; }
		elseif($State == "ON") { $State1 = "NT"; }
		elseif($State == "OR") { $State1 = "RE"; }
		elseif($State == "RI") { $State1 = "RH"; }
		elseif($State == "WI") { $State1 = "WS"; }
		else { $State1 = $State; }
		//echo "<br>State1 = " .$State1;
		$Split = explode($State1,$Max);
		
		$Number = $Split[1];
		$Number1 = $Number + 1;
		
		
		//echo "<br>number = " .$Number;
		//echo "<br>number1 = " .$Number1;
		
		//$PromoCode = $State1 .$Number1;
		
		//echo "<br>promo = " .$PromoCode;


		$Now = date("Y-m-d H:i:s");
		$IP = $_SERVER["REMOTE_ADDR"];
			
		

		$sql = "INSERT INTO tblBusinessCustomer (Name, Chain, Address , Address2, Address3,  City,  State, ZipCode, Country,
		Fax1, Website, Notes, Status, Phone1, Email1, CustomerType, TestPrepUpdated, TestPrepStatus, PromotionCodeID)
		VALUES ('$Name', '$Chain', '$Address', '$Address2', '$Address3', '$City', '$State', '$ZipCode', '$Country', '$Fax1',
		 '$Website', '$Notes', '$Status', '$Phone1', '$Email1', '$CustomerType', '$Updated', '$TestPrepStatus', '$PromoCode');";
					
		$result = mysql_query($sql) or die("Cannot add customer information!");
		
		/*
		# insert data into database for shipment...
		$sql2 = "INSERT INTO tblPromotionCode
		(PromotionCodeID, PromotionID, StartDate, EndDate, Amount, Local, Status, DateCreated) 
	 	VALUES ('$PromoCode', 'percent', '2006-01-01', '2006-03-17', '0.2', 'n', 'active', '$Now')";
		echo "<br>$sql2 = " .$sql2;
		 
		mysql_query($sql2) or die("Cannot insert add promo code, please try again.");
		*/
		
			$goto = "campaign-testprep-index.php";
			header("location: $goto");
		
		} 
		

		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		$FirstName = addQuote($FirstName);
		$LastName = addQuote($LastName);
		$Address = addQuote($Address);
		$City = addQuote($City);
		$Chain = addQuote($Chain);
		$Name = addQuote($Name);
		

		
		}
		
// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
      New Test Prep</strong></font></p>
<form name="form1" method="post" action="">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Business
            Name<font color="#FF0000" size="3">*</font></font></strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
      </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtName" type="text" id="txtName3" size="50">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Chain Name</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> (ex:
          Barnes &amp; Noble, Kaplan, Princeton Review)<strong><br>
                  </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtChain" type="text" id="txtChain2" size="30">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Customer
            Type<font color="#FF0000" size="3">*</font> </font></strong><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Must have a type listed - either Bookstore or Test Prep or University<strong><br>
    </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtCustomerType" type="text" id="txtCustomerType2" value="Test Prep">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Address</font><font color="#FF0000" size="3">*</font></font></strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
      </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtAddress" type="text" id="txtAddress5" size="50">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Address
            2<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtAddress2" type="text" id="txtAddress25" size="50">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Address
            3 <br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtAddress3" type="text" id="txtAddress32" size="50">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">City</font><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3">*</font></font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><br>
      </font></strong></td>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtCity" type="text" id="txtCity3" size="25">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">State</font><font size="2" face="Arial, Helvetica, sans-serif"><font color="#FF0000" size="3">*</font></font></strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
      </strong></font></td>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtState" type="text" id="txtState4" maxlength="50">
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
        <input name="txtZipCode" type="text" id="txtZipCode4" maxlength="20">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Country<br>
      </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="txtCountry" type="text" id="txtCountry4" value="US">
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
        <input name="txtWebsite" type="text" id="txtWebsite" size="50">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Updated</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Updated" type="text" id="Updated" value="y" size="3" maxlength="1">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Test Prep
            Status<font color="#FF0000" size="3">*</font></font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="TestPrepStatus" id="TestPrepStatus">
          <option value="" <? if ($TestPrepStatus1 == ''){echo 'selected';}?>>no
          change</option>
          <option value="out of business" <? if ($TestPrepStatus1 == 'out of business'){echo 'selected';}?>>out
          of business</option>
          <option value="new address" <? if ($TestPrepStatus1 == 'new address'){echo 'selected';}?>>new
          address</option>
          <option value="cannot find address" <? if ($TestPrepStatus1 == 'cannot find address'){echo 'selected';}?>>cannot
          find address</option>
          <option value="changed name" <? if ($TestPrepStatus1 == 'changed name'){echo 'selected';}?>>changed
          name</option>
          <option value="new center">new center</option>
        </select>
      </font></strong></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="txtNotes" cols="50" id="txtNotes"></textarea>
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



?>