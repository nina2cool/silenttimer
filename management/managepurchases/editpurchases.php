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

	//grab variables to get purchase info from DB.
	$PurchaseID = $_GET['p'];
	$CustomerID = $_GET['c'];

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
		$City = dbQuote($_POST['txtCity']);
		$State = $_POST['txtState'];
		$ZipCode = $_POST['txtZipCode'];
		$Country = $_POST['txtCountry'];
		$Phone = $_POST['txtPhone'];
		$Email = $_POST['txtEmail'];
		$School = dbQuote($_POST['txtSchool']);
		$PrepClass = dbQuote($_POST['txtPrepClass']);
		$Type = $_POST['txtType'];
		
		// Purchase Table
		$ProductID = "1";
		$TestID = $_POST['txtTestID'];
		if($Test == ""){$Test = "0";} #fixes integer problem for test being blank if none is selected.		
		$TestDate = $_POST['txtTestDate'];
		$Num = $_POST['txtNum'];
		$ReferredBy = $_POST['txtReferredBy'];
		$TimerPrice = $_POST['txtTimerPrice'];
		$ShippingOption = $_POST['txtShippingOption'];
		$Tax = $_POST['txtTax'];
		$TotalCost = $_POST['txtTotalCost'];
		$DateTime1 = $_POST['txtDateTime1'];
		$Shipped = $_POST['txtShipped'];
		$Same = $_POST['txtSame'];
		$IP = $_POST['txtIP'];
		$Contract = "y";
		$ShippingCost = $_POST['txtShippingCost'];
		$Promotion = $_POST['txtPromotion'];
		$Notes = $_POST['txtNotes'];
		$Status = "active";
		$AffClassID = $_POST['txtAffClassID'];
		$AffOfficeID = $_POST['txtAffOfficeID'];
		
		// Purchase Details Table
		$FirstNameB = dbQuote($_POST['txtFirstNameB']);
		$LastNameB = dbQuote($_POST['txtLastNameB']);
		$AddressB = dbQuote($_POST['txtAddressB']);
		$CityB = dbQuote($_POST['txtCityB']);
		$StateB = $_POST['txtStateB'];
		$ZipCodeB = $_POST['txtZipCodeB'];
		$CardType = $_POST['txtCardType'];
		$LastFourCr = $_POST['txtLastFourCr'];
		$CVV2 = $_POST['txtCVV2'];
		$BankCode = $_POST['txtBankCode'];
		$AddressVerification = $_POST['txtAddressVerification'];
		$CVV2Verification = $_POST['txtCVV2Verification'];
		$DateTime2 = $_POST['txtDateTime2'];
		$IsCheck = $_POST['txtIsCheck'];
		$BankName = $_POST['txtBankName'];
		$RoutingNumber = $_POST['txtRoutingNumber'];
		$CheckNumber = $_POST['txtCheckNumber'];
		
		$sql3 = "UPDATE tblCustomer
			SET FirstName = '$FirstName', 
			LastName = '$LastName', 
			Address = '$Address', 
			City = '$City', 
			State = '$State', 
			ZipCode = '$ZipCode',
			Country = '$Country', 
			Phone = '$Phone',
			Email = '$Email',
			School = '$School',
			PrepClass = '$PrepClass'
			Type = '$Type'
			WHERE CustomerID = '$CustomerID'";

		
		mysql_query($sql3) or die("Cannot update customer information");
	
		$sql = "UPDATE tblPurchase
			SET ProductID = '$ProductID', 
				TestID = '$TestID',
				TestDate = '$TestDate',
				NumOrdered = '$Num',
				ReferredBy = '$ReferredBy',
				TimerPrice = '$TimerPrice',
				ShippingOptionID = '$ShippingOption',
				Tax = '$Tax',
				TotalCost = '$TotalCost',
				DateTime = '$DateTime1',
				Shipped = '$Shipped',
				SameBillingAddress = '$Same',
				IP = '$IP',
				SignContract = '$Contract',
				ShippingCost = '$ShippingCost',
				PromotionCodeID = '$Promotion',
				Notes = '$Notes',
				Status = '$Status',
				AffClassID = '$AffClassID',
				AffOfficeID = '$AffOfficeID'
			WHERE PurchaseID = '$PurchaseID'";

		mysql_query($sql) or die("Cannot update customer purchase information");
		
		$sql2 = "UPDATE tblPurchaseDetails
			SET FirstName = '$FirstNameB', 
				LastName = '$LastNameB',
				Address = '$AddressB',
				City = '$CityB',
				State = '$StateB',
				ZipCode = '$ZipCodeB',
				CardType = '$CardType',
				LastFourCr = '$LastFourCr',
				CVV2 = '$CVV2',
				BankCode = '$BankCode',
				AddressVerification = '$AddressVerification',
				CVV2Verification = '$CVV2Verification',
				DateTime = '$DateTime2',
				IsCheck = '$IsCheck',
				BankName = '$BankName',
				RoutingNumber = '$RoutingNumber',
				CheckNumber = '$CheckNumber'
			WHERE PurchaseID = '$PurchaseID'";

		mysql_query($sql2) or die("Cannot update tblPurchaseDetails 234");
			
	} 
		
	
		$sql3 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";

		
		//put SQL statement into result set for loop through records
		$result3 = mysql_query($sql3) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result3))
		{
			
			$FirstName = $row[FirstName];
			$LastName = $row[LastName];
			$Address = $row[Address];
			$City = $row[City];
			$State = $row[State];
			$ZipCode = $row[ZipCode];
			$Country = $row[Country];
			$Phone = $row[Phone];
			$Email = $row[Email];
			$School = $row[School];
			$PrepClass = $row[PrepClass];
			$Type = $row[Type];	
		}
	
	
		$sql = "SELECT * FROM tblPurchase WHERE PurchaseID = '$PurchaseID' AND CustomerID = '$CustomerID'";
	
		//put SQL statement into result set for loop through records
		$result = mysql_query($sql) or die("Cannot execute query! purchase ID");
	
		while($row = mysql_fetch_array($result))
		{
				$PurchaseID = $row[PurchaseID];
				$ProductID = $row[ProductID];
				$CustomerID = $row[CustomerID];
				$TestID = $row[TestID];
				$TestDate = $row[TestDate];
				$Num = $row[NumOrdered];
				$ReferredBy = $row[ReferredBy];
				$TimerPrice = $row[TimerPrice];
				$ShippingOption = $row[ShippingOptionID];
				$Tax = $row[Tax];
				$TotalCost = $row[TotalCost];
				$DateTime1 = $row[DateTime];
				$Shipped = $row[Shipped];
				$Same = $row[SameBillingAddress];
				$IP = $row[IP];
				$Contract = $row[SignContract];
				$ShippingCost = $row[ShippingCost];
				$Promotion = $row[PromotionCodeID];
				$Notes = $row[Notes];
				$Status = $row[Status];
				$AffClassID = $row[AffClassID];
				$AffOfficeID = $row[AffOfficeID];	
		}
	
	$sql2 = "SELECT * FROM tblPurchaseDetails WHERE PurchaseID = '$PurchaseID'";
	
	$result2 = mysql_query($sql2) or die("Cannot execute query! purchase details");

	while($row = mysql_fetch_array($result2))
	{
				
				$FirstNameB = $row[FirstName];
				$LastNameB = $row[LastName];
				$AddressB = $row[Address];
				$CityB = $row[City];
				$StateB = $row[State];
				$ZipCodeB = $row[ZipCode];
				$CardType = $row[CardType];
				$LastFourCr = $row[LastFourCr];
				$CVV2 = $row[CVV2];
				$BankCode = $row[BankCode];
				$AddressVerification = $row[AddressVerification];
				$CVV2Verification = $row[CVV2Verification];
				$DateTime2 = $row[DateTime];
				$IsCheck = $row[IsCheck];
				$BankName = $row[BankName];
				$RoutingNumber = $row[RoutingNumber];
				$CheckNumber = $row[CheckNumber];
				
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
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>




<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Customer 
  and Purchase Information</strong></font></p>
<form name="form1" method="post" action="">
  <font size="2" face="Arial, Helvetica, sans-serif"><strong> </strong></font> 
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top"> <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; 
          Purchase Information</font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr> 
            <td width="51%"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Number 
              of Timers?<br>
              <input name="txtNum" type="text" id="txtNum" value="<? echo $Num;?>">
              </font></strong></font></td>
            <td width="44%" rowspan="5" bordercolor="#0000FF" bgcolor="#FFFFCC"> 
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Timer 
                Price</strong><br>
                $
<input name="txtTimerPrice" type="text" id="txtTimerPrice2" value="<? echo number_format($TimerPrice,2);?>">
                </font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong> <font size="2" face="Arial, Helvetica, sans-serif"><a href="#" onClick="MM_openBrWindow('../customers/ShipOptions.php','','scrollbars=yes,width=600,height=600')">Shipping 
                Cost</a></font></strong><br>
                $ 
                <input name="txtShippingCost" type="text" id="txtShippingCost2" value="<? echo number_format($ShippingCost,2);?>">
                </font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong> Tax</strong><br>
                $
<input name="txtTax" type="text" id="txtTax2" value="<? echo number_format($Tax,2);?>">
                </font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Total 
                Cost</strong><br>
                $ 
                <input name="txtTotalCost" type="text" id="txtTotalCost2" value="<? echo number_format($TotalCost,2);?>">
                </font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Date 
                Time</strong></font><br>
                <input name="txtDateTime1" type="text" id="txtDateTime1" value="<? echo $DateTime1;?>">
              </p>
              </td>
          </tr>
          <tr> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033"><a href="#" onClick="MM_openBrWindow('../customers/ShipOptions.php','','scrollbars=yes,width=600,height=600')">Shipping 
              Preference?</a></font></strong><font color="#000033"><strong><br>
              <input name="txtShippingOption" type="text" id="txtShippingOption" value="<? echo $ShippingOption;?>">
              </strong></font></font></td>
          </tr>
          <tr> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipped?</strong><br>
              <input name="txtShipped" type="text" id="txtShipped3" value="<? echo $Shipped;?>">
              </font></td>
          </tr>
          <tr> 
            <td><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Promotional 
              Code</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtPromotion" type="text" id="txtPromotion3"  value="<? echo $Promotion;?>">
              </font></td>
          </tr>
          <tr> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase 
              Notes<br>
              <textarea name="txtNotes" cols="40" rows="4" id="textarea"><? echo $Notes;?></textarea>
              </strong></font></td>
          </tr>
        </table>
        
      </td>
    </tr>
  </table>
  <p>&nbsp;</p><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td height="274" align="left" valign="top"> 
        <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; 
          Customer Information</font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr align="left" valign="top"> 
            <td width="27%"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">First 
              Name</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtFirstName" type="text" id="txtFirstName" size="20" value="<? echo addQuote($FirstName);?>">
              </font></td>
            <td width="73%"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Last 
              Name</font></strong><br>
              <input name="txtLastName" type="text" id="txtLastName" value="<? echo addQuote($LastName);?>">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Address</font></strong><br>
              <input name="txtAddress" type="text" id="txtAddress" value="<? echo addQuote($Address);?>">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="2"> <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                <tr> 
                  <td width="23%" align="left" valign="top"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>City</strong><br>
                    <input name="txtCity" type="text" id="txtCity" size="15" value="<? echo addQuote($City);?>">
                    </font></td>
                  <td width="32%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State</strong><br>
                    <input name="txtState" type="text" id="txtState" value="<? echo addQuote($State);?>">
                    </font></td>
                  <td width="20%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip 
                    Code</strong><br>
                    <input name="txtZipCode" type="text" id="txtZipCode" size="11" maxlength="10" value="<? echo $ZipCode;?>">
                    </font></td>
                  <td width="25%"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    Country<br>
                    <input name="txtCountry" type="text" id="txtCountry" value="<? echo $Country;?>">
                    </strong></font></td>
                </tr>
              </table></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Phone 
              Number</font></strong><br>
              <input name="txtPhone" type="text" id="txtPhone" size="12" maxlength="10" value="<? echo $Phone;?>">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Email 
              Address</font></strong><br>
              <input name="txtEmail" type="text" id="txtEmail" size="25" maxlength="50" value="<? echo $Email;?>">
              </font></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <p>&nbsp;</p><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top"> <p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&gt; 
          Billing Information</strong></font></p>
        <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">Same? 
          <input name="txtSame" type="text" id="txtSame" value="<? echo addQuote($Same);?>">
          </font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr align="left" valign="top"> 
              
            <td width="27%"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">First 
              Name</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                
              <input name="txtFirstNameB" type="text" id="txtFirstNameB" size="20" value="<? echo addQuote($FirstNameB);?>">
                </font> </td>
              
            <td width="73%"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Last 
              Name</font></strong><br>
                
              <input name="txtLastNameB" type="text" id="txtLastNameB" value="<? echo addQuote($LastNameB);?>">
                </font> </td>
            </tr>
            <tr align="left" valign="top"> 
              
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Address</font></strong><br>
                
              <input name="txtAddressB" type="text" id="txtAddressB" value="<? echo addQuote($AddressB);?>">
                </font> </td>
            </tr>
            <tr align="left" valign="top"> 
              <td colspan="2"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr> 
                    
                  <td width="26%" align="left" valign="top"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>City</strong><br>
                      
                    <input name="txtCityB" type="text" id="txtCityB" size="15" value="<? echo addQuote($CityB);?>">
                      </font> </td>
                    
                  <td width="40%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State</strong><br>
                      <input name="txtStateB" type="text" id="txtStateB" value="<? echo addQuote($StateB);?>">
                      </font> </td>
                    
                  <td width="34%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip 
                    Code</strong><br>
                      
                    <input name="txtZipCodeB" type="text" id="txtZipCodeB" size="11" maxlength="10" value="<? echo $ZipCodeB;?>">
                      </font> </td>
                  </tr>
                </table></td>
            </tr>
          </table>
        </div></td>
    </tr>
  </table>
  <p>&nbsp; </p>
  <div style="display:<? if($isCheck == "y"){echo "none";}?>" id = "credit"> 
    <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
      <tr> 
        <td align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr> 
              <td><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt; 
                Credit Card</strong></font> </td>
              <td><div align="right"></div></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr align="left" valign="top"> 
              <td width="27%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('../customers/CardType.php','','scrollbars=yes,width=600,height=600')">Card 
                Type</a></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                <input name="txtCardType" type="text" id="txtCardType" value="<? echo $CardType;?>">
                </font></td>
              <td width="32%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Last 
                Four Digits</strong><br>
                <input name="txtLastFourCr" type="text" id="LastFourCr3" value="<? echo $LastFourCr;?>">
                </font></td>
              <td width="20%"><font face="Arial, Helvetica, sans-serif"><b><font color="#000033" size="2">CVV2 
                #</font></b>&nbsp; <br>
                <input name="txtCVV2" type="text" id="txtCVV25" size="5" maxlength=4  value="<? echo $CVV2;?>">
                </font></td>
            </tr>
            <tr align="left" valign="top"> 
              <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">Bank 
                Code Authorization <br>
                <input name="txtBankCode" type="text" id="txtBankCode5" value="<? echo $BankCode;?>" size="50">
                </font></strong></td>
              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Address 
                Verification <br>
                <input name="txtAddressVerification" type="text" id="txtAddressVerification6" value="<? echo $AddressVerification;?>" size="50">
                </font></strong></td>
            </tr>
            <tr align="left" valign="top"> 
              <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">CVV2 
                Verification <br>
                <input name="txtCVV2Verification" type="text" id="txtCVV2Verification7" value="<? echo $CVV2Verification;?>" size="50">
                </font></strong></td>
              <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date 
                and Time<br>
                <input name="txtDateTime2" type="text" id="txtDateTime25" value="<? echo $DateTime2;?>">
                </font></strong></td>
            </tr>
            <tr align="left" valign="top"> 
              <td colspan="3">&nbsp;</td>
            </tr>
          </table>
        
        </td>
      </tr>
    </table>
  </div>
    
  <p>&nbsp;</p>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
        
      <td align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
              <td width="38%"><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt; 
                eCheck</strong></font> </td>
              <td width="62%"><div align="right"></div></td>
            </tr>
          </table>
          
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr align="left" valign="top"> 
            <td width="35%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Is it a check?</font></strong><br> 
              <input name="txtIsCheck" type="text" id="txtIsCheck" value="<? echo $IsCheck;?>"> 
            </td>
            <td width="34%" valign="top"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Bank 
              Name</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <input name="txtBankName" type="text" id="txtBankName"  value="<? echo $BankName;?>" size="20">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="2"><TABLE WIDTH=100% BORDER=0 cellpadding=0 cellspacing=0>
                <TR> 
                  <TD width="35%" ALIGN=RIGHT valign="top"> <div align="left"> 
                      <p><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Routing 
                        Number</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                        <input name="txtRoutingNumber" type="text" id="txtRoutingNumber"  value="<? echo $RoutingNumber;?>" size="15">
                        </font></p>
                    </div>
                    <div align="left"></div></TD>
                  <TD width="34%" ALIGN=RIGHT valign="top"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Check 
                      Number</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                      <input name="txtCheckNumber" type="text" id="txtCheckNumber3"  value="<? echo $CheckNumber;?>" size="6">
                      </font></div></TD>
                </TR>
              </TABLE></td>
          </tr>
        </table></td>
      </tr>
    </table>
  <p>&nbsp;</p><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top"> <p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong> 
          &nbsp; &gt; Extra Information</strong></font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"> <strong>Test 
              ID Number</strong><br>
              <input name="txtTestID" type="text" id="txtTestID" value="<? echo $TestID;?>">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>School</strong><br>
              <input name="txtSchool" type="text" id="txtSchool22" value="<? echo addQuote($School);?>">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Test 
              Date</strong><br>
              <input name="txtTestDate" type="text" id="txtTestDate" value="<? echo $TestDate;?>">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Prep 
              Class</strong><br>
              <input name="txtPrepClass" type="text" id="txtPrepClass22" value="<? echo addQuote($PrepClass);?>">
              </font></td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('../customers/ReferredBy.php','','scrollbars=yes,width=600,height=600')">Referred 
              By</a></strong><br>
              <input name="txtReferredBy" type="text" id="txtReferredBy" value="<? echo $ReferredBy;?>">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>IP 
              Address</strong></font><br> <input name="txtIP" type="text" id="txtIP2" value="<? echo addQuote($IP);?>"> 
            </td>
          </tr>
          <tr align="left" valign="top"> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Affiliate 
              Class ID</strong><br>
              <input name="txtAffClassID" type="text" id="txtAffClassID" value="<? echo $AffClassID;?>">
              </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Affiliate 
              Office ID</strong><br>
              <input name="txtAffOfficeID" type="text" id="txtAffOfficeID" value="<? echo $AffOfficeID;?>">
              </font></td>
          </tr>
          <tr align="left" valign="top">
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Type</strong></font><br>
              <font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="txtType" type="text" id="txtType" value="<? echo $Type;?>">
              </font><br>
            </td>
            <td>&nbsp;</td>
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
    <input name="Save" type="submit" id="Save" value="Save">
    <input type="reset" name="Submit2" value="Reset">
    </font></strong></p>
  </form>
<p>&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

?>