<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{


// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";



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
	$BusinessCustomerID = $_GET['bc'];

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	#<Add button being pushed>
	if ($_POST['Save'] == "Save")
	{
		$Chain = dbQuote($_POST['Chain']);
		$Name = dbQuote($_POST['Name']);
		$ContactFirstName = dbQuote($_POST['ContactFirstName']);
		$ContactLastName = dbQuote($_POST['ContactLastName']);
		$ContactPosition = $_POST['ContactPosition'];
		$ContactEmail = $_POST['ContactEmail'];
		$ContactFirstName2 = dbQuote($_POST['ContactFirstName2']);
		$ContactLastName2 = dbQuote($_POST['ContactLastName2']);
		$ContactPosition2 = dbQuote($_POST['ContactPosition2']);
		$ContactEmail2 = $_POST['ContactEmail2'];
		$Notes = dbQuote($_POST['Notes']);	
		$Status = $_POST['Status'];	
		$Address = dbQuote($_POST['Address']);
		$Address2 = dbQuote($_POST['Address2']);
		$Address3 = dbQuote($_POST['Address3']);
		$City = dbQuote($_POST['City']);
		$State = $_POST['State'];
		$ZipCode = $_POST['ZipCode'];
		$Country = $_POST['Country'];
		$Phone1 = $_POST['Phone1'];
		$Phone2 = $_POST['Phone2'];
		$Fax1 = $_POST['Fax1'];
		$Fax2 = $_POST['Fax2'];
		$Email1 = $_POST['Email1'];
		$Email2 = $_POST['Email2'];
		$Website = $_POST['Website'];
		$TPRType = $_POST['TPRType'];
		$TPRRegion = $_POST['TPRRegion'];
		
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
				Phone2 = '$Phone2',
				Fax1 = '$Fax1',
				Fax2 = '$Fax2',
				TPRType = '$TPRType',
				TPRRegion = '$TPRRegion',
				Website = '$Website',
				ContactFirstName = '$ContactFirstName',
				ContactLastName = '$ContactLastName',
				ContactPosition = '$ContactPosition',
				ContactEmail = '$ContactEmail',
				ContactFirstName2 = '$ContactFirstName2',
				ContactLastName2 = '$ContactLastName2',
				ContactPosition2 = '$ContactPosition2',
				ContactEmail2 = '$ContactEmail2',
				Notes = '$Notes',
				Status = '$Status',
				Phone1 = '$Phone1',
				Email1 = '$Email1',
				Email2 = '$Email2',
				Phone2 = '$Phone2'
				WHERE BusinessCustomerID = '$BusinessCustomerID'";
					
		$result = mysql_query($sql) or die("Cannot update test prep information!");
		
		$goto = "index.php";
		header("location: $goto");
		
		
		
		} 
		
	
		$sql3 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";

		
		//put SQL statement into result set for loop through records
		$result3 = mysql_query($sql3) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result3))
		{
			$Chain = $row[Chain];
			$Name = $row[Name];
			$ContactFirstName = $row[ContactFirstName];
			$ContactLastName = $row[ContactLastName];
			$ContactPosition = $row[ContactPosition];
			$ContactEmail = $row[ContactEmail];
			$ContactFirstName2 = $row[ContactFirstName2];
			$ContactLastName2 = $row[ContactLastName2];
			$ContactPosition2 = $row[ContactPosition2];
			$ContactEmail2 = $row[ContactEmail2];
			$Notes = $row[Notes];	
			$Status = $row[Status];	
			$Address = $row[Address];
			$Address2 = $row[Address2];
			$Address3 = $row[Address3];
			$City = $row[City];
			$State = $row[State];
			$ZipCode = $row[ZipCode];
			$Country = $row[Country];
			$Phone1 = $row[Phone1];
			$Phone2 = $row[Phone2];
			$Fax1 = $row[Fax1];
			$Fax2 = $row[Fax2];
			$Email1 = $row[Email1];
			$Email2 = $row[Email2];
			$Website = $row[Website];
			$TPRType = $row[TPRType];
			$TPRRegion = $row[TPRRegion];
		}
	
			
	
		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		$Chain = addQuote($Chain);
		$Name = addQuote($Name);
		$ContactFirstName = addQuote($ContactFirstName);
		$ContactLastName = addQuote($ContactLastName);
		$ContactFirstName2 = addQuote($ContactFirstName2);
		$ContactLastName2 = addQuote($ContactLastName2);
		$ContactPosition2 = addQuote($ContactPosition2);
		$Notes = addQuote($Notes);	
		$Address = addQuote($Address);
		$Address2 = addQuote($Address2);
		$Address3 = addQuote($Address3);
		$City = addQuote($City);		

		
		}
		
		
// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";
		

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
      - 
<? echo $Name; ?><? if ($Chain <> "") { ?> (<? echo $Chain; ?>)<? } ?></strong></font></p>
<form name="form1" method="post" action="">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td width="70%"><font size="2" face="Arial, Helvetica, sans-serif">Business
            Name<br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Name" type="text" id="Name3" value="<? echo $Name;?>" size="50"></font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Chain Name (ex:
          Barnes &amp; Noble, Kaplan, Princeton Review)<br>
                </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Chain" type="text" id="Chain2" value="<? echo $Chain;?>" size="30">
      </font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Address</font><br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Address" type="text" id="Address5" value="<? echo $Address;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Address
            2<br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Address2" type="text" id="Address25" value="<? echo $Address2;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Address
            3 <br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Address3" type="text" id="Address32" value="<? echo $Address3;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">City<br>
      </font></td>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="City" type="text" id="City3" value="<? echo $City;?>">
      </font></strong></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">State<br>
      </font></td>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="State" type="text" id="State4" value="<? echo $State;?>" maxlength="50">
      </font></strong></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Zip
            Code <br>
              </font></td>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="ZipCode" type="text" id="ZipCode4" value="<? echo $ZipCode;?>" maxlength="20">
      </font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Country<br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Country" type="text" id="Country4" value="<? echo $Country?>">
      </font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Phone
              Number</font> 1<br>
        Ex:
        512-258-8668<br>
                  </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Phone1" type="text" id="Phone1" value="<? echo $Phone1;?>">
      </font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Phone Number
            2<br>
        Ex:
        512-258-8668<br>
                  </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Phone2" type="text" id="Phone24" value="<? echo $Phone2;?>">
      </font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Fax 1<br>
        Ex:
        512-258-8668<br>
                  </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Fax1" type="text" id="Fax1" value="<? echo $Fax1;?>">
      </font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Fax 2<br>
        Ex:
        512-258-8668<br>
                  </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Fax2" type="text" id="Fax22" value="<? echo $Fax2?>">
      </font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Email
              Address</font> 1<br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Email1" type="text" id="Email1" value="<? echo $Email1;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Email Address
            2<br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Email2" type="text" id="Email24" value="<? echo $Email2;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Website (include
          http://, etc) <font size="1"><a href="<? echo $Website; ?>" target="_blank">check link </a></font><br>
                </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Website" type="text" id="Website" value="<? echo $Website;?>" size="60">
      </font></strong></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Contact
      First Name</font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                  </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ContactFirstName" type="text" id="ContactFirstName" value="<? echo $ContactFirstName;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Contact
              Last Name</font><br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ContactLastName" type="text" id="ContactLastName" value="<? echo $ContactLastName;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Contact
      Position </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                  </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ContactPosition" type="text" id="ContactPosition" value="<? echo $ContactPosition;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Contact
      Email</font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                  </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ContactEmail" type="text" id="ContactEmail" value="<? echo $ContactEmail;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Contact
      First Name</font><font size="2" face="Arial, Helvetica, sans-serif"> 2 <br>
                  </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ContactFirstName2" type="text" id="ContactFirstName2" value="<? echo $ContactFirstName2;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Contact
              Last Name</font> 2<br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ContactLastName2" type="text" id="ContactLastName2" value="<? echo $ContactLastName2;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Contact
      Position </font><font size="2" face="Arial, Helvetica, sans-serif"> 2 <br>
                  </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ContactPosition2" type="text" id="ContactPosition2" value="<? echo $ContactPosition2;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Contact
      Email</font><font size="2" face="Arial, Helvetica, sans-serif"> 2 <br>
                  </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ContactEmail2" type="text" id="ContactEmail2" value="<? echo $ContactEmail2;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">TPR Type (COS,
          INDP, etc) (Princeton Review only)<br>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="TPRType" type="text" id="TPRType2" value="<? echo $TPRType;?>">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">TPR Region (SW,
          Central, etc) (Princeton Review only)<br>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="TPRRegion" type="text" id="TPRRegion2" value="<? echo $TPRRegion;?>">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="Notes" cols="40" id="Notes"><? echo $Notes;?></textarea>
      </font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Status" type="text" id="Status" value="<? echo $Status;?>">
      </font></strong></td>
    </tr>
  </table>
  <br>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Save" type="submit" id="Save" value="Save">
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
require "../../include/footerlinks.php";



?>