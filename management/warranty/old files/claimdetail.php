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
	$_SESSION['userName'] = $userName;
	
	//grab variables to get purchase info and customer info from DB.
	$purchaseID = $_GET['p'];
	$lName = $_GET['ln'];

	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	//SQL to get data from purchase table
	$sql = "SELECT ProductName, DATE_FORMAT(tblPurchase.DateTime, '%m/%d/%Y') as DateTime, SameBillingAddress, NumOrdered, TimerPrice, Tax, tblPurchase.ShippingOptionID, tblShippingOption.Cost, TotalCost, TestID, ReferredBy
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
		$ShippingCost = $row[Cost];
		$TotalCost = $row[TotalCost];
		$ProductName = $row[ProductName];
		$DateTime = $row[DateTime];
		$SameAddress = $row[SameBillingAddress];
		// Test Info
		$TestID = $row[TestID];
		$ReferredBy = $row[ReferredBy];
	}

	//SQL to get data from customer table
	$sql = "SELECT * FROM tblCustomer WHERE LastName = '$lName'";
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
		$BankCode = $row[BankCode];
		$AddressVerification = $row[AddressVerification];
	}
?>
<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Processed a Warranty 
Claim Details</strong></font> 
<form action="" method="post" name="form" id="form">
		
            <table width="100%" border="0" cellspacing="0" cellpadding="8">
              <tr>
             <td align="left" valign="top"> <strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">&gt; 
        Problem Info and Manager's Decision</font></strong><font face="Arial, Helvetica, sans-serif"><strong><font color="#333333" size="3"> 
        </font></strong></font> </tr>
		<?
		//SQL to get data from problem table
		$sql = "SELECT PurchaseID, ProblemID, DATE_FORMAT(tblProblems.DateTime, '%m/%d/%Y') as DateTime, ProblemDetails, CustRequest, SubmitType
		     	FROM tblProblems
				WHERE PurchaseID = $purchaseID";
		//put SQL statement into result set for loop through records
		$result = mysql_query($sql) or die("Cannot execute query4!");

		while($row = mysql_fetch_array($result))
		{
			$probID = $row[ProblemID];
			$probDetail = $row[ProblemDetails];
			$custRequest = $row[CustRequest];
			$dateReceived = $row[DateTime];
			$SType = $row[SubmitType];
		}
		 
		//SQL to get data from problem table
		$sql = "SELECT DateTime, Status, NumShipped, CostOfReturn, ManagerDecision FROM tblProblemDetail WHERE ProblemID = $probID;";
		
		//put SQL statement into result set for loop through records
		$query = mysql_query($sql) or die("Cannot execute query5!");

		while($row = mysql_fetch_array($query))
		{
			$dateProcessed = $row[DateTime];
			$Status = $row[Status];
			$quan = $row[NumShipped];
			$cost = $row[CostOfReturn];
			$decision = $row[ManagerDecision];
		}
		
   	?>

                <tr>
               <td align="left" valign="top">
		<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
		  <tr>
			<p><td align="left" valign="top"> <font color="#333333" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt;&gt;
              Problem Information and Manager's Decision</strong></font></p>

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr align="left" valign="top">

                  <td width="33%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Problem
                   ID<br>
                                <input name="txtProbID" type="text" id="txtProbID2" size="10" value="<? echo $probID; ?>">
                                </font></strong></td>

                  <td width="39%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Date
                    Received <br>
                                <input name="txtDateReceived" type="text" id="txtDateReceived2" value="<? echo $dateReceived; ?>">
                                </font></strong></td>
				 <td width="28%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Submit
                    Type<br>
                                <input name="txtSType" type="text" id="txtSType2" value="<? echo $SType; ?>">
                                </font></strong></td>
                            </tr>
		  </table> <br>

			 <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>

			  <td colspan="2"> <font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">Problem</font></strong><br>
				<input name="txtClaim" type="text" id="txtClaim2" size="100" value="<? echo $probDetail; ?>">
				</font> </td>
			</tr>
			 </table>
                 <br>
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>

      			  <td colspan="2"> <font size="2" face="Arial, Helvetica, sans-serif"><strong>What
                    would you like us to do? (ex. get a new timer or get a refund)
                    </strong><br>
			   <input name="txtCustRequest" type="text" id="txtCustRequest2" size="100" value="<? echo $custRequest; ?>">
					 </font>
					 </td>
				</tr>
              </table>
			  	<br>

				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr align="left" valign="top">
                  
                  <td width="72%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Manager's 
                    Decision<br>
                                <input name="txtDecision" type="text" id="txtDecision2" size="33" value="<? echo $decision; ?>">
                                </font></strong></td>

                  <td width="28%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Quantity 
                    Shipped<br>
                                <input name="txtQuantity" type="text" id="txtQuantity2" value="<? echo $quan; ?>">
                                </font></strong></td>

                            </tr>
                          </table> <br>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr align="left" valign="top">
                  <td width="33%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Status<br>
					<input name="txtStatus" type="text" id="txtStatus2"  value="<? echo $Status; ?>">
                    </font></strong></td>
				  <td width="39%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Cost 
                    Of Return<br>
                                <input name="txtCostOfReturn" type="text" id="txtCostOfReturn2"  value="<? echo $cost; ?>">
                                </font></strong></td>


                  <td width="28%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Date<br>
                                <input name="txtToday" type="text" id="txtToday" value="<? echo $dateProcessed; ?>">
                                </font></strong></td>
                            </tr>
                  </table>

              			</td>
                      </tr>
                    </table><br>
							 
        <p align="left"><strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">&gt;
          Customer Info</font><font color="#333333" size="3" face="Arial, Helvetica, sans-serif">
          </font></strong></p>

        <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
		  <tr>
			<td align="left" valign="top"><p><strong><font color="#333333" size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;
				Shipping Address </font></strong></p>
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr align="left" valign="top">
				  <td width="38%"><strong><font size="2" face="Arial, Helvetica, sans-serif">First
					Name<br>
					<input name="txtFirstName" type="text" id="txtFirstName2" value="<? echo $FirstName; ?>">
					</font></strong></td>
				  <td width="62%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Last
					Name<br>
					<input name="txtLastName" type="text" id="txtLastName2" value="<? echo $LastName; ?>">
					</font></strong></td>
				</tr>
		</table>
                          <br>
	    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr align="left" valign="top">
			  <td> <p><strong><font size="2" face="Arial, Helvetica, sans-serif">Address<br>
				  <input name="txtAddress" type="text" id="txtAddress" value="<? echo $Address; ?>" size="40">
				  </font></strong></p></td>
			</tr>
	    </table>
	    <br>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr align="left" valign="top">
			  <td width="38%"><strong><font size="2" face="Arial, Helvetica, sans-serif">City<br>
				<input name="txtCity" type="text" id="txtCity2" value="<? echo $City; ?>">
				</font></strong></td>
			  <td width="24%"><strong><font size="2" face="Arial, Helvetica, sans-serif">State<br>
				<input name="txtState" type="text" id="txtState2" value="<? echo $State; ?>" size="3">
				</font></strong></td>
			  <td width="38%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Zip
				Code<br>
				<input name="txtZipCode" type="text" id="txtZipCode2" value="<? echo $ZipCode; ?>" size="10">
				</font></strong></td>
			</tr>
	    </table>
                          <br> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr align="left" valign="top">
                              <td width="38%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Email
                                Address </strong></font><br> <input name="txtEmail" type="text" id="txtEmail" value="<? echo $Email; ?>" size="15">
                              </td>
                              <td width="62%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Phone
                                Number</strong></font><br> <input name="txtPhone" type="text" id="txtPhone" value="<? echo $Phone; ?>" size="15">
                              </td>
                            </tr>
                          </table>
                          <br> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr align="left" valign="top">
                              <td width="38%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Test<br>
                                <select name="cboTest" id="select">
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
                              <td width="24%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Prep
                                Class<br>
                                <input name="txtPrepClass" type="text" id="txtPrepClass2" value="<? echo $PrepClass; ?>">
                                </font></strong></td>
                              <td width="38%"><strong><font size="2" face="Arial, Helvetica, sans-serif">School<br>
                                <input name="txtSchool" type="text" id="txtSchool2" value="<? echo $School; ?>">
                                </font></strong></td>
                            </tr>
                          </table>
                          <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Referred
                            By</strong></font><br>
                            <input name="txtReferredBy" type="text" id="txtReferredBy2" value="<? echo $ReferredBy; ?>">
                          </p></td>
                      </tr>
                    </table>
        
		  <p><strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">&gt; 
          Purchase Info</font></strong></p>
       	 <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
                      <tr>
                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                            <tr>
                              <td><font face="Arial, Helvetica, sans-serif"><strong><font color="#333333" size="3"><? echo $ProductName; ?></font></strong></font></td>
                             </tr>
                          </table>
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
			  <td width="29%" align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Number
				Ordered<br>
				<input name="txtNumOrdered" type="text" id="txtNumOrdered3" value="<? echo $NumOrdered; ?>" size="10">
				</strong></font><font face="Arial, Helvetica, sans-serif"><strong></strong></font></td>
			  <td width="23%" align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Timer
				Cost<br>
				<input name="txtTimerCost" type="text" id="txtTimerCost2" value="<? echo $TimerPrice; ?>" size="10">
				</strong></font></td>
			  <td width="20%" align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Tax<br>
				<input name="txtTax" type="text" id="txtTax2" value="<? echo $Tax; ?>" size="10"></strong></font></td>
			  <td width="28%" align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Date of
			   Purchase<br>
				<input name="txtDate" type="text" id="txtDate" value="<? echo $DateTime; ?>" size="10"></strong></font></td>

			<font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font>
			</tr>
		  </table>
                          <br>
						  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr align="left" valign="top">
                              <td width="29%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping
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
								mysql_close($link);
							?>
                                </select>
                                </strong></font></td>
                              <td width="23%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping
                                Cost<br>
                                <input name="txtShippingCost" type="text" id="txtShippingCost3" value="<? echo $ShippingCost; ?>" size="10">
                                </strong></font></td>
                              <td width="20%"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000">Total
                                Cost</font><br>
                                <input name="txtTotalCost" type="text" id="txtTotalCost3" value="<? echo $TotalCost; ?>" size="10">
                                </strong></font></td>

                  <td width="28%" align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000">Warranty
                    Expiration Date</font><br>
                                <input name="txtWDate" type="text" id="txtWDate" value="<? echo "Not Working "; ?>" size="10"></strong></font></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
				<br><br>
				      <p>
    <input type="submit" name="Submit" value="Close">
                      &nbsp;&nbsp;
                      </td>
                </tr>
              </table>
            </form>
            <p>&nbsp;</p>


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