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
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?	

	//grab variables to get purchase info and customer info from DB.
	$purchaseID = $_GET['p'];
	$customerID = $_GET['c'];

	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
?>

<?  // -------- code to save values from form into tables, etc....

	if ($_POST['Submit'] == "Save")
	{
		$Lock = $_POST['chkLock'];
		$vNotes = $_POST['txtNotes'];
		
		$vNumOrdered = $_POST['txtNumOrdered'];
		$vTimerPrice = $_POST['txtTimerCost'];
		$vTax = $_POST['txtTax'];
		$vShippingOption = $_POST['cboShippingOption'];
		$vShippingCost = $_POST['txtShippingCost'];
		$vTotalCost = $_POST['txtTotalCost'];
		
		if ($Lock != "locked")
		{
			$sql = "UPDATE tblPurchase
					SET NumOrdered = $vNumOrdered, TimerPrice = $vTimerPrice, Tax = $vTax, ShippingOptionID = $vShippingOption, TotalCost = $vTotalCost, Notes = '$vNotes'
					WHERE PurchaseID = $purchaseID";
			mysql_query($sql) or die("Cannot update tblPurchase");
			
			if ($chkCancelOrder == "cancel")
			{
				$sql = "UPDATE tblPurchase
						SET Status = 'cancel'
						WHERE PurchaseID = $purchaseID";
				mysql_query($sql) or die("Cannot update to cancelled");
			}
			
		}	
	}
?>


<? // ---- code to fill page with information....
	
	
	//SQL to get data from purchase table
	$sql = "SELECT ProductName, DateTime, SameBillingAddress, NumOrdered, tblPurchase.ShippingCost, TimerPrice, Tax, tblPurchase.ShippingOptionID, TotalCost, TestID, ReferredBy, tblPurchase.Notes
			FROM tblPurchase INNER JOIN tblShippingOption ON tblPurchase.ShippingOptionID = tblShippingOption.ShippingOptionID
			INNER JOIN tblProduct ON tblPurchase.ProductID = tblProduct.productID
			WHERE PurchaseID = $purchaseID";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$NumOrdered = $row[NumOrdered];
		$TimerPrice = $row[TimerPrice];
		$Tax = $row[Tax];
		$ShippingOptionID = $row[ShippingOptionID];
		$ShippingCost = $row[ShippingCost];
		$TotalCost = $row[TotalCost];
		$ProductName = $row[ProductName];
		$DateTime = $row[DateTime];
		$SameAddress = $row[SameBillingAddress];
		// Test Info
		$TestID = $row[TestID];
		$ReferredBy = $row[ReferredBy];
		$Notes = $row[Notes];
	}
	
	//SQL to get data from customer table
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = $customerID";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query2!");
	
	while($row = mysql_fetch_array($result))
	{
		//shipping information
		$FirstName = $row[FirstName];
		$LastName = $row[LastName];
		$Address = $row[Address];
		$City = $row[City];
		$State = $row[State];
		$ZipCode = $row[ZipCode];
		$Phone = $row[Phone];
		$Email = $row[Email];
		// Test Info
		$PrepClass = $row[PrepClass];
		$School = $row[School];
	}
	
	//SQL to get data from PurchaseDetails Table
	$sql = "SELECT * FROM tblPurchaseDetails WHERE PurchaseID = $purchaseID";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		//Billing Information
		
		$FirstNameB = $row[FirstName];
		$LastNameB = $row[LastName];
		$AddressB =  $row[Address];
		$CityB = $row[City];
		$StateB = $row[State];
		$ZipCodeB = $row[ZipCode];
		
		$CardType = $row[CardType];
		$LastFourCr = $row[LastFourCr];
		$CVV2 = $row[CVV2];
		$BankCode = $row[BankCode];
		$AddressVerification = $row[AddressVerification];
		$CVV2Verification = $row[CVV2Verification];
	}
	
?>

			<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; 
              Purchases</strong></font></p>
            
<form action="" method="post" name="frmChange" id="frmChange">
  <table width="100%" border="0" cellspacing="0" cellpadding="8">
                <tr> 
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%"><strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">&gt; 
              Purchase Info</font></strong><font face="Arial, Helvetica, sans-serif"><strong><font color="#333333" size="3"> 
              <br>
              </font></strong></font></td>
            <td width="50%"><div align="right"><font face="Arial, Helvetica, sans-serif"><strong><font color="#333333" size="3"> 
                <input name="chkLock" type="checkbox" id="chkLock" value="locked" checked>
                <font size="2">locked</font></font></strong></font></div></td>
          </tr>
        </table>
        
      </td>
                </tr>
                <tr> 
                  <td align="left" valign="top"> <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
                      <tr>
                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                            <tr> 
                              <td><font face="Arial, Helvetica, sans-serif"><strong><font color="#333333" size="3"><? echo $ProductName; ?></font></strong></font></td>
                              <td><div align="right"><font face="Arial, Helvetica, sans-serif"><strong><font color="#333333" size="3"><? echo $DateTime; ?></font></strong></font></div></td>
                            </tr>
                          </table>
                          <br> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr> 
                              <td width="30%" align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Number 
                                Ordered<br>
                                <input name="txtNumOrdered" type="text" id="txtNumOrdered3" value="<? echo $NumOrdered; ?>" size="10">
                                </strong></font><font face="Arial, Helvetica, sans-serif"><strong></strong></font></td>
                              <td width="29%" align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Timer 
                                Cost<br>
                                <input name="txtTimerCost" type="text" id="txtTimerCost2" value="<? echo $TimerPrice; ?>" size="10">
                                </strong></font></td>
                              <td width="41%" align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Tax<br>
                                <input name="txtTax" type="text" id="txtTax2" value="<? echo $Tax; ?>" size="10">
                                </strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                            </tr>
                          </table>
                          <br> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr align="left" valign="top"> 
                              <td width="30%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping 
                                Option<br>
                                <select name="cboShippingOption" id="select3">
                            <?    
								// build combo box for he shipping options from the database.
								// SQL to get data from shippingoption and shipper table
								$sql = "SELECT ShippingOptionID, Name, CompanyName
										FROM tblShippingOption INNER JOIN tblShipper ON tblShippingOption.ShipperID = tblShipper.ShipperID";
								//put SQL statement into result set for loop through records
								$result = mysql_query($sql) or die("Cannot execute query!");
								
								while($row = mysql_fetch_array($result))
								{

						  	?>
                                  <option value="<? echo $row[ShippingOptionID]; ?>" <? if ($row[ShippingOptionID] == $ShippingOptionID) {echo "selected";} ?>><? echo $row[CompanyName]; ?> 
                                  <? echo $row[Name]; ?></option>
                                  <?
							 	}
							?>
                                </select>
                                </strong></font></td>
                              <td width="29%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping 
                                Cost<br>
                                <input name="txtShippingCost" type="text" id="txtShippingCost3" value="<? echo $ShippingCost; ?>" size="10">
                                </strong></font></td>
                              <td width="41%"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000">Total 
                                Cost</font><br>
                                <input name="txtTotalCost" type="text" id="txtTotalCost3" value="<? echo $TotalCost; ?>" size="10">
                                </strong></font></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    
        <br>
        <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
          <tr> 
            <td align="left" valign="top"><p><font color="#333333" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt;&gt; 
                Credit Transaction Information</strong></font></p>
              <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr> 
                  <td width="33%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Card 
                    Type</font></strong></td>
                  <td width="35%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Last 
                    4 Credit Card #</strong></font></td>
                  <td width="32%"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    CVV2</strong></font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CardType; ?></font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $LastFourCr; ?></font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CVV2; ?></font></td>
                </tr>
              </table>
              <br> <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr> 
                  <td width="33%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Bank 
                    Code </font></strong></td>
                  <td width="35%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Address 
                    Verification </strong></font></td>
                  <td width="32%"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    CVV2 Verification</strong></font></td>
                </tr>
                <tr> 
                  <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $BankCode; ?></font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $AddressVerification; ?></font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CVV2Verification; ?></font></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <br>
        <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
          <tr> 
            <td align="left" valign="top"><p><font color="#333333" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt;&gt; 
                Purchase Notes</strong></font></p>
              <p><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">If 
                you change any of the above information, you will have to charge 
                back their credit card, and update inventory. Make sure to note 
                below what steps you have taken to correct the situation. If you 
                charged back their card, say how much. If you changed number of 
                timers, say if you decreased or added to it.</font></strong></p>
              <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr> 
                  <td width="33%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Notes<br>
                    <textarea name="txtNotes" cols="75" rows="5" id="txtNotes"><? echo $Notes;?></textarea>
                    </font></strong></td>
                </tr>
              </table>
              <p><strong><font color="#333333" size="3" face="Arial, Helvetica, sans-serif">&gt;&gt; 
                Cancel Order</font></strong></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif">If you need 
                to cancel this order, make sure to make note above the reason 
                and exactly what was done to fix system. You must Charge back 
                their card, and add number of timers back to inventory.</font></p>
              <p> <font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chkCancelOrder" type="checkbox" id="chkCancelOrder" value="cancel">
                <strong>Cancel Order</strong></font></p>
              </td>
          </tr>
        </table>
        <p align="left">&nbsp;</p>
        <p align="left"> 
          <input type="submit" name="Submit" value="Save">
          &nbsp;&nbsp; 
          <input type="reset" name="Submit2" value="Reset">
        </p>
        <p align="left">&nbsp;</p>
        <p align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Use 
          the below information to justify customer information. If you need to 
          change customer information, <a href="#">click here</a>.</strong></font></p>
        <p align="left"><strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">&gt; 
          Customer Info</font></strong><strong><font color="#333333" size="3" face="Arial, Helvetica, sans-serif"> 
          </font></strong></p>
                    
        <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
          <tr> 
                        <td align="left" valign="top"><p><strong><font color="#333333" size="3" face="Arial, Helvetica, sans-serif">&gt;&gt; 
                            Shipping Address </font></strong></p>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr align="left" valign="top"> 
                              <td width="42%"><strong><font size="2" face="Arial, Helvetica, sans-serif">First 
                                Name<br>
                                <input name="txtFirstName" type="text" id="txtFirstName2" value="<? echo $FirstName; ?>" readonly>
                                </font></strong></td>
                              <td width="58%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Last 
                                Name<br>
                                <input name="txtLastName" type="text" id="txtLastName2" value="<? echo $LastName; ?>" readonly>
                                </font></strong></td>
                            </tr>
                          </table>
                          <br> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr align="left" valign="top"> 
                              <td> <p><strong><font size="2" face="Arial, Helvetica, sans-serif">Address<br>
                                  <input name="txtAddress" type="text" id="txtAddress" value="<? echo $Address; ?>" size="40" readonly>
                                  </font></strong></p></td>
                            </tr>
                          </table>
                          <br> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr align="left" valign="top"> 
                              <td width="38%"><strong><font size="2" face="Arial, Helvetica, sans-serif">City<br>
                                <input name="txtCity" type="text" id="txtCity2" value="<? echo $City; ?>" readonly>
                                </font></strong></td>
                              <td width="15%"><strong><font size="2" face="Arial, Helvetica, sans-serif">State<br>
                                <input name="txtState" type="text" id="txtState2" value="<? echo $State; ?>" size="3" readonly>
                                </font></strong></td>
                              <td width="47%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Zip 
                                Code<br>
                                <input name="txtZipCode" type="text" id="txtZipCode2" value="<? echo $ZipCode; ?>" size="10" readonly> 
                                </font></strong></td>
                            </tr>
                          </table>
                          <br> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr align="left" valign="top"> 
                              <td width="37%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Email 
                                Address </strong></font><br> <input name="txtEmail" type="text" id="txtEmail" value="<? echo $Email; ?>" size="15" readonly> 
                              </td>
                              <td width="63%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Phone 
                                Number</strong></font><br> <input name="txtPhone" type="text" id="txtPhone" value="<? echo $Phone; ?>" size="15" readonly> 
                              </td>
                            </tr>
                          </table>
                          <br> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr align="left" valign="top"> 
                              <td width="23%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Test<br>
                                <select name="cboTest" id="select" disabled>
                            <?    
								// build combo box for the test options from the database.
								// SQL to get data from test table
								$sql = "SELECT * FROM tblTests";
								//put SQL statement into result set for loop through records
								$result = mysql_query($sql) or die("Cannot execute query!");
								
								while($row = mysql_fetch_array($result))
								{

						  	?>
                                  <option value="<? echo $row[TestID]; ?>" <? if ($row[TestID] == $TestID) {echo "selected";} ?>><? echo $row[Name]; ?></option>
                                  <?
							 	}
							?>
                                </select>
                                </font></strong></td>
                              <td width="39%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Prep 
                                Class<br>
                                <input name="txtPrepClass" type="text" id="txtPrepClass2" value="<? echo $PrepClass; ?>" readonly>
                                </font></strong></td>
                              <td width="38%"><strong><font size="2" face="Arial, Helvetica, sans-serif">School<br>
                                <input name="txtSchool" type="text" id="txtSchool2" value="<? echo $School; ?>" readonly>
                                </font></strong></td>
                            </tr>
                          </table>
                          <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Referred 
                            By</strong></font><br>
                            <input name="txtReferredBy" type="text" id="txtReferredBy2" value="<? echo $ReferredBy; ?>" readonly>
                          </p></td>
                      </tr>
                    </table>
                    

        <br>
        <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
          <tr> 
            <td align="left" valign="top">
<p><font color="#333333" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt;&gt; 
                Billing Information</strong></font></p>
                          <p> 
                            <input name="chkSameBilling" type="checkbox" id="chkSameBilling2" value="y" <? if ($SameAddress == "y") {echo "checked";} ?> readonly>
                            <strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                            Same as above</font></strong></p>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr align="left" valign="top"> 
                              <td width="42%"><strong><font size="2" face="Arial, Helvetica, sans-serif">First 
                                Name<br>
                                <input name="txtFirstNameB" type="text" id="txtFirstNameB2" value="<? echo $FirstNameB; ?>" readonly>
                                </font></strong></td>
                              <td width="58%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Last 
                                Name<br>
                                <input name="txtLastNameB" type="text" id="txtLastNameB2" value="<? echo $LastNameB; ?>" readonly>
                                </font></strong></td>
                            </tr>
                          </table>
                          <br> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr align="left" valign="top"> 
                              <td> <p><strong><font size="2" face="Arial, Helvetica, sans-serif">Address<br>
                                  <input name="txtAddressB" type="text" id="txtAddressB2" value="<? echo $AddressB; ?>" size="40" readonly>
                                  </font></strong></p></td>
                            </tr>
                          </table>
                          <br> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr align="left" valign="top"> 
                              <td width="38%"><strong><font size="2" face="Arial, Helvetica, sans-serif">City<br>
                                <input name="txtCityB" type="text" id="txtCityB2" value="<? echo $CityB; ?>" readonly>
                                </font></strong></td>
                              <td width="15%"><strong><font size="2" face="Arial, Helvetica, sans-serif">State<br>
                                <input name="txtStateB" type="text" id="txtStateB2" value="<? echo $StateB; ?>" size="3" readonly>
                                </font></strong></td>
                              <td width="47%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Zip 
                                Code<br>
                                <input name="txtZipCodeB" type="text" id="txtZipCodeB2" value="<? echo $ZipCodeB; ?>" size="10" readonly>
                                </font></strong></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                    
        
      </td>
                </tr>
              </table>
            </form>
            
<p></p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>