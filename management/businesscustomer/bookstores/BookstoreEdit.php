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
		$Chain = $_POST['Chain'];
		$ChainDropDown = $_POST['ChainDropDown'];
		$Name = dbQuote($_POST['Name']);
		$IncNumber = $_POST['IncNumber'];
		$BNCBNumber = $_POST['BNCBNumber'];
		$ContactFirstName = dbQuote($_POST['ContactFirstName']);
		$ContactLastName = dbQuote($_POST['ContactLastName']);
		$ContactPosition = $_POST['ContactPosition'];
		$ContactEmail = $_POST['ContactEmail'];
		$ContactFirstName2 = dbQuote($_POST['ContactFirstName2']);
		$ContactLastName2 = dbQuote($_POST['ContactLastName2']);
		$ContactPosition2 = dbQuote($_POST['ContactPosition2']);
		$ContactEmail2 = $_POST['ContactEmail2'];
		$StoreDirector = dbQuote($_POST['StoreDirector']);	
		$StoreManager = dbQuote($_POST['StoreManager']);	
		$StoreTradeSupervisor = dbQuote($_POST['StoreTradeSupervisor']);	
		$Notes = dbQuote($_POST['Notes']);	
		$Status = $_POST['Status'];	
		$Address = dbQuote($_POST['Address']);
		$Address2 = dbQuote($_POST['Address2']);
		$Address3 = dbQuote($_POST['Address3']);
		$City = dbQuote($_POST['City']);
		$State = $_POST['State'];
		$ZipCode = $_POST['ZipCode'];
		$Country = $_POST['Country'];
		$CountryDropDown = $_POST['CountryDropDown'];
		$Phone1 = $_POST['Phone1'];
		$Phone2 = $_POST['Phone2'];
		$Fax1 = $_POST['Fax1'];
		$Fax2 = $_POST['Fax2'];
		$Email1 = $_POST['Email1'];
		$Email2 = $_POST['Email2'];
		$Website = $_POST['Website'];
		$BordersStoreNumber = $_POST['BordersStoreNumber'];
		$FollettStoreNumber = $_POST['FollettStoreNumber'];
		$LSAT = $_POST['LSAT'];
		$SAT = $_POST['SAT'];
		$CallFirst = $_POST['CallFirst'];
		$SpecialOrder = $_POST['SpecialOrder'];
		$nacsID = $_POST['nacsID'];


		if($Chain == "") { $Chain = $ChainDropDown; }
		if($Country == "") { $Country = $CountryDropDown; }

		
		$sql = "UPDATE tblBusinessCustomer
				SET Name = '$Name',
				Chain = '$Chain',
				IncNumber = '$IncNumber',
				BNCBNumber = '$BNCBNumber',
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
				Website = '$Website',
				ContactFirstName = '$ContactFirstName',
				ContactLastName = '$ContactLastName',
				ContactPosition = '$ContactPosition',
				ContactEmail = '$ContactEmail',
				ContactFirstName2 = '$ContactFirstName2',
				ContactLastName2 = '$ContactLastName2',
				ContactPosition2 = '$ContactPosition2',
				ContactEmail2 = '$ContactEmail2',
				StoreDirector = '$StoreDirector',
				StoreManager = '$StoreManager',
				StoreTradeSupervisor = '$StoreTradeSupervisor',
				Notes = '$Notes',
				Status = '$Status',
				Phone1 = '$Phone1',
				Email1 = '$Email1',
				Email2 = '$Email2',
				Phone2 = '$Phone2',
				BordersStoreNumber = '$BordersStoreNumber',
				FollettStoreNumber = '$FollettStoreNumber',
				LSAT = '$LSAT',
				SAT = '$SAT',
				CallFirst = '$CallFirst',
				SpecialOrder = '$SpecialOrder',
				nacsID = '$nacsID'
				WHERE BusinessCustomerID = '$BusinessCustomerID'";
					
		$result = mysql_query($sql) or die("Cannot update bookstore information!");
		
		$goto = "BookstoreEdit.php?bc=$BusinessCustomerID";
		header("location: $goto");
		
		} 
		
	
		$sql3 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
		//echo $sql3;
		$result3 = mysql_query($sql3) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result3))
		{
			$Chain = $row[Chain];
			$Name = $row[Name];
			$IncNumber = $row[IncNumber];
			$BNCBNumber = $row[BNCBNumber];
			$ContactFirstName = $row[ContactFirstName];
			$ContactLastName = $row[ContactLastName];
			$ContactPosition = $row[ContactPosition];
			$ContactEmail = $row[ContactEmail];
			$ContactFirstName2 = $row[ContactFirstName2];
			$ContactLastName2 = $row[ContactLastName2];
			$ContactPosition2 = $row[ContactPosition2];
			$ContactEmail2 = $row[ContactEmail2];
			$StoreDirector = $row[StoreDirector];	
			$StoreManager = $row[StoreManager];	
			$StoreTradeSupervisor = $row[StoreTradeSupervisor];	
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
			$BordersStoreNumber = $row[BordersStoreNumber];
			$FollettStoreNumber = $row[FollettStoreNumber];
			$LSAT = $row[LSAT];
			$SAT = $row[SAT];
			$CallFirst = $row[CallFirst];
			$SpecialOrder = $row[SpecialOrder];
			$nacsID = $row[nacsID];
		}
	
			
	
		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		$Chain = addQuote($Chain);
		$Name = addQuote($Name);
		$ContactFirstName = addQuote($ContactFirstName);
		$ContactLastName = addQuote($ContactLastName);
		$ContactFirstName2 = addQuote($ContactFirstName2);
		$ContactLastName2 = addQuote($ContactLastName2);
		$ContactPosition2 = addQuote($ContactPosition2);
		$StoreDirector = addQuote($StoreDirector);	
		$StoreManager = addQuote($StoreManager);	
		$StoreTradeSupervisor = addQuote($StoreTradeSupervisor);	
		$Notes = addQuote($Notes);	
		$Address = addQuote($Address);
		$Address2 = addQuote($Address2);
		$Address3 = addQuote($Address3);
		$City = addQuote($City);		

		
		
		
		
		$sql4 = "SELECT Max(DateTime) as DateTime FROM tblNotes WHERE BusinessCustomerID = '$BusinessCustomerID'";
		$result4 = mysql_query($sql4) or die("Cannot execute query customerID!");
		
		while($row4 = mysql_fetch_array($result4))
		{
			$LastDate = $row4[DateTime];
		}
		
		if($LastDate == "") { $LastDate = "none"; }

		
// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";
		

?>
<table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#E2F5E2">
  <tr>
    <td><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><? echo $Name; ?>
          <? if ($Chain <> "") { ?><br>
          <font size="3"><? echo $Chain; ?></font>
          <? } ?>
    </strong></font></td>
    <td><div align="right">
      <p><font size="2" face="Arial, Helvetica, sans-serif">      </font><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; <a href="ContactHistory.php?bc=<? echo $BusinessCustomerID; ?>">View
        All Contact History</a></strong></font></p>
		
		
		
      <p><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="OrderHistory.php?nacs=<? echo $nacsID; ?>&bc=<? echo $BusinessCustomerID; ?>">          Order History<br>
      </a></font></strong></p>
			
    </div></td>
  </tr>
</table>
<br>
<form name="form1" method="post" action="">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFFFCC">
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Store
          Name<br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Name" type="text" id="Name" value="<? echo $Name;?>" size="50">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Chain<br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="ChainDropDown" class="text" id="select4">
          <option value = "" selected>Please Select</option>
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT Chain FROM tblBusinessCustomer
						WHERE Chain <> '' GROUP BY Chain ORDER BY Chain";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[Chain];?>" <? if($row[Chain] == $Chain){echo "selected";}?>><? echo $row[Chain];?></option>
          <?
						}
					?>
        </select>
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">OR<strong>
        <input name="Chain" type="text" id="Chain" value="<? echo $Chain;?>" size="20">
      </strong></font></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Address</font><br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Address" type="text" id="Address" value="<? echo $Address;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Address
          2<br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Address2" type="text" id="Address2" value="<? echo $Address2;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Address
          3 (avoid if possible) <br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Address3" type="text" id="Address3" value="<? echo $Address3;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">City<br>
      </font></td>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="City" type="text" id="City" value="<? echo $City;?>">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">State<br>
      </font></td>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> </font><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="State" class="text" id="select5">
          <option value = "" selected>State</option>
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT State, Name
								FROM tblState
								
								ORDER BY State";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[State];?>" <? if($row[State] == $State){echo "selected";}?>><? echo $row[State];?></option>
          <?
						}
					?>
        </select>
      </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Zip
          Code (5 digits only) <br>
      </font></td>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="ZipCode" type="text" id="ZipCode" value="<? echo $ZipCode;?>" size="10" maxlength="20">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Country<br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="CountryDropDown" id="select7">
          <option value="US" selected>US</option>
          <option value="CA">Canada</option>
        </select>
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">OR<strong>
        <input name="Country" type="text" id="Country" value="<? echo $Country?>" size="5">
      </strong></font></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Phone
      Number</font> 1 (Ex: 512-258-8668)</font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Phone1" type="text" id="Phone13" value="<? echo $Phone1;?>">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Fax
      1 (Ex: 512-258-8668)</font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Fax1" type="text" id="Fax14" value="<? echo $Fax1;?>">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Email
      Address</font> 1</font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Email1" type="text" id="Email13" value="<? echo $Email1;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Website
          (include http://, etc) <font size="1"><a href="<? echo $Website; ?>" target="_blank">check
      link </a></font></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Website" type="text" id="Website3" value="<? echo $Website;?>" size="60">
      </font></strong></td>
    </tr>
  </table>
  <br>
  <table width="100%"  border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="50%"><table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFDFFF">
        <tr>
          <td><font size="2" face="Arial, Helvetica, sans-serif">B&amp;N Inc.
              Number<br>
          </font></td>
          <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
              <input name="IncNumber" type="text" id="IncNumber3" value="<? echo $IncNumber;?>" size="10">
          </font></strong></div></td>
        </tr>
        <tr>
          <td><font size="2" face="Arial, Helvetica, sans-serif">B&amp;N College
              Bookstore Number<br>
          </font></td>
          <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
              <input name="BNCBNumber" type="text" id="BNCBNumber3" value="<? echo $BNCBNumber;?>" size="10">
          </font></strong></div></td>
        </tr>
        <tr>
          <td><font size="2" face="Arial, Helvetica, sans-serif">Borders Store
              Number<br>
          </font></td>
          <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
              <input name="BordersStoreNumber" type="text" id="BordersStoreNumber3" value="<? echo $BordersStoreNumber;?>" size="10">
          </font></strong></div></td>
        </tr>
        <tr>
          <td><font size="2" face="Arial, Helvetica, sans-serif">Follett Store
              Number</font></td>
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
              <input name="FollettStoreNumber" type="text" id="FollettStoreNumber3" value="<? echo $FollettStoreNumber; ?>" size="10">
          </font></div></td>
        </tr>
        <tr>
          <td><font size="2" face="Arial, Helvetica, sans-serif">NACSCORP ID </font></td>
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
              <input name="nacsID" type="text" id="FollettStoreNumber3" value="<? echo $nacsID; ?>" size="10">
          </font></div></td>
        </tr>
      </table>
      <div align="center"></div></td>
      <td><table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#E8F3FF">
        <tr>
          <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Carries
              LSAT timers? </font></td>
          <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
            <select name="LSAT" id="select13">
              <option value="y"<? if($LSAT == "y") { ?>selected<? } ?>>y</option>
              <option value="n"<? if($LSAT == "n") { ?>selected<? } ?>>n</option>
            </select>
          </font></td>
        </tr>
        <tr>
          <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Carries
              SAT timers? </font></td>
          <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
            <select name="SAT" id="select14">
              <option value="y"<? if($SAT == "y") { ?>selected<? } ?>>y</option>
              <option value="n"<? if($SAT == "n") { ?>selected<? } ?>>n</option>
            </select>
          </font></td>
        </tr>
        <tr>
          <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Call
              First? </font></td>
          <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
            <select name="CallFirst" id="select15">
              <option value="y"<? if($CallFirst == "y") { ?>selected<? } ?>>y</option>
              <option value="n"<? if($CallFirst == "n") { ?>selected<? } ?>>n</option>
            </select>
          </font></td>
        </tr>
        <tr>
          <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Special
              Order only? </font></td>
          <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
            <select name="SpecialOrder" id="select16">
              <option value="y"<? if($SpecialOrder == "y") { ?>selected<? } ?>>y</option>
              <option value="n"<? if($SpecialOrder == "n") { ?>selected<? } ?>>n</option>
            </select>
          </font></td>
        </tr>
        <tr>
          <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
          <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">
            <select name="Status" id="select17">
              <option value="active"<? if($Status == "active") { ?> selected<? } ?>>active</option>
              <option value="inactive"<? if($Status == "inactive") { ?> selected<? } ?>>inactive</option>
            </select>
          </font></strong></td>
        </tr>
      </table>
      <div align="center"></div></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Phone
      Number 2 (Ex: 512-258-8668)</font> </td>
      <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Phone2" type="text" id="Phone22" value="<? echo $Phone2;?>">
      </font></strong><strong><font size="2" face="Arial, Helvetica, sans-serif">
      </font></strong></td>
    </tr>
    <tr>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Fax
      2 (Ex: 512-258-8668)</font></td>
      <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Fax2" type="text" id="Fax23" value="<? echo $Fax2?>">
      </font></strong><strong><font size="2" face="Arial, Helvetica, sans-serif"></font></strong></td>
    </tr>
    <tr>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Email Address
            2<br>
      </font></td>
      <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Email2" type="text" id="Email24" value="<? echo $Email2;?>" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Contact
          First &amp; Last Name<br>
      </font><strong><font size="2" face="Arial, Helvetica, sans-serif">
        </font></strong></td>
      <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ContactFirstName" type="text" id="ContactFirstName4" value="<? echo $ContactFirstName;?>" size="20">
        <input name="ContactLastName" type="text" id="ContactLastName5" value="<? echo $ContactLastName;?>" size="20">
      </font></strong></td>
    </tr>
    <tr>
      <td width="46%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Contact
          Position </font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      </font></td>
      <td width="16%"><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ContactPosition" type="text" id="ContactPosition3" value="<? echo $ContactPosition;?>" size="20">
      </font></strong></td>
      <td width="14%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Contact
      Email</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td width="24%"><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ContactEmail" type="text" id="ContactEmail3" value="<? echo $ContactEmail;?>" size="20">
      </font></strong></td>
    </tr>
    <tr>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Contact First &amp;
          Last Name 2 <br>
      </font><strong><font size="2" face="Arial, Helvetica, sans-serif">
        </font></strong></td>
      <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ContactFirstName2" type="text" id="ContactFirstName23" value="<? echo $ContactFirstName2;?>" size="20">
        <input name="ContactLastName2" type="text" id="ContactLastName24" value="<? echo $ContactLastName2;?>" size="20">
      </font></strong></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Contact
          Position </font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif"> 2<br>
            </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ContactPosition2" type="text" id="ContactPosition22" value="<? echo $ContactPosition2;?>" size="20">
      </font></strong></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Contact
          Email</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif"> 2 </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ContactEmail2" type="text" id="ContactEmail22" value="<? echo $ContactEmail2;?>" size="20">
      </font></strong></td>
    </tr>
    <tr>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Store Director</font></td>
      <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="StoreDirector" type="text" id="StoreDirector" value="<? echo $StoreDirector;?>">
      </font></strong></td>
    </tr>
    <tr>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Store Manager</font></td>
      <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="StoreManager" type="text" id="StoreManager" value="<? echo $StoreManager?>">
      </font></strong></td>
    </tr>
    <tr>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Store Trade
            Supervisor (B &amp; N
            only)</font></td>
      <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="StoreTradeSupervisor" type="text" id="StoreTradeSupervisor" value="<? echo $StoreTradeSupervisor;?>">
      </font></strong></td>
    </tr>
    <tr>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
      <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="Notes" cols="40" id="Notes"><? echo $Notes;?></textarea>
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


// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>