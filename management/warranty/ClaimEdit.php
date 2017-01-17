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

	$_SESSION['userName'] = $userName;
	
	//grab variables to get purchase info and customer info from DB.
	$ClaimID = $_GET['claim'];


	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	If ($_POST['Update'] == "Update")
	{
		$ClaimType = $_POST['ClaimType'];
		$PurchaseID = $_POST['PurchaseID'];
		$DetailID = $_POST['DetailID'];
		$RequestDate = $_POST['RequestDate'];
		$RequestAmount = $_POST['RequestAmount'];
		$RequestType = $_POST['RequestType'];
		$RequestedTo = $_POST['RequestedTo'];
		$Reason = addslashes($_POST['Reason']);
		$Reason2 = addslashes($_POST['Reason2']);
		$UnderWarranty = $_POST['UnderWarranty'];
		$ProductReturned = $_POST['ProductReturned'];
		$ReturnDate = $_POST['ReturnDate'];
		$SignedForm = $_POST['SignedForm'];
		$FormType = $_POST['FormType'];
		$DateToReturn = $_POST['DateToReturn'];
		$RefundDate = $_POST['RefundDate'];
		$RefundAmount = $_POST['RefundAmount'];
		$ChargeAmount = $_POST['ChargeAmount'];
		$ChargeDate = $_POST['ChargeDate'];
		$ChargedBy = $_POST['ChargedBy'];
		$ChargeAuthorization = $_POST['ChargeAuthorization'];
		$ProblemConclusion = addslashes($_POST['ProblemConclusion']);
		$Notes = addslashes($_POST['Notes']);
		$Status = $_POST['Status'];
		$SignForm = $_POST['SignForm'];
		$ckReturn = $_POST['ckReturn'];
		$ckDamaged = $_POST['ckDamaged'];
		$ckReturnToMan = $_POST['ckReturnToMan'];
		$Loss = $_POST['Loss'];
		$DateofLoss = $_POST['DateofLoss'];
		$Name = $_POST['Name'];
		$RefundedBy = $_POST['RefundedBy'];
				
		$sql = "UPDATE tblCustomerClaims2 SET ClaimType = '$ClaimType', PurchaseID = '$PurchaseID', DetailID = '$DetailID', 
		RequestDate = '$RequestDate', RequestAmount = '$RequestAmount', RequestType = '$RequestType', RequestedTo = '$RequestedTo', Reason = '$Reason', 
		Reason2 = '$Reason2', UnderWarranty = '$UnderWarranty', ProductReturned = '$ProductReturned', ReturnDate = '$ReturnDate', SignForm = '$SignForm', 
		SignedForm = '$SignedForm', FormType = '$FormType', DateToReturn = '$DateToReturn', RefundDate = '$RefundDate', RefundAmount = '$RefundAmount', 
		ChargeAmount = '$ChargeAmount', ChargeDate = '$ChargeDate', ChargedBy = '$ChargedBy', ChargeAuthorization = '$ChargeAuthorization', 
		ProblemConclusion = '$ProblemConclusion', Notes = '$Notes', Status = '$Status', Loss = '$Loss', DateofLoss = '$DateofLoss', Name = '$Name', RefundedBy = '$RefundedBy'
		WHERE ClaimID = '$ClaimID'"; 
		
		//echo $sql;
		
		mysql_query($sql) or die("Cannot insert into table"); 	
		
		/*
		echo "<br>status =" .$Status;
		echo "<br>Claimtype =" .$ClaimType;
		echo "<br>DetailID =" .$DetailID;
		*/
		
		if($Loss == "y" AND $DetailID <> '0')
		{
					
				$sql5 = "UPDATE tblPurchaseDetails2
				SET Loss = 'y'
				WHERE DetailID = '$DetailID'";
				$result5 = mysql_query($sql5) or die("Cannot loss order");

		}#end loss if loop with detailID
		
		elseif($Loss == "y" AND $DetailID == '0')
		{

			$sql4 = "UPDATE tblPurchaseDetails2
			SET Loss = 'y'
			WHERE PurchaseID = '$PurchaseID'";
			$resul4 = mysql_query($sql4) or die("Cannot loss order");			
		}#end loss if loop without detailID
		
		
		if($ClaimType == "Cancel" AND $DetailID <> '0')
		{
				

				
				
				$sql5 = "UPDATE tblPurchaseDetails2
				SET Status = 'cancel'
				WHERE DetailID = '$DetailID'";
				$result5 = mysql_query($sql5) or die("Cannot cancel order");
					
				
				$sql4 = "SELECT * FROM tblPurchaseDetails2 WHERE DetailID = '$DetailID'";
				//echo "<br>sql4 =" .$sql4;
				$result4 = mysql_query($sql4) or die("Cannot execute query! detail ID");
				
				while($row4 = mysql_fetch_array($result4))
				{
				$ProductID = $row4[ProductID];
				$Quantity = $row4[Quantity];

							/*
							$sql4 = "UPDATE tblFriendSale
							SET Return = 'y'
							WHERE PurchaseID = '$PurchaseID' AND ProductID = '$ProductID' AND Status = 'active'";
							$result4 = mysql_query($sql4) or die("Cannot update tblFriendSale");
*/
							

							$sql2 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
							//echo "<br>sql2 =" .$sql2;
							$result2 = mysql_query($sql2) or die("Cannot execute query! product ID");
							
							while($row2 = mysql_fetch_array($result2))
							{
							$OnHand = $row2[OnHand];
							$WebInventory = $row2[WebInventory];
							$Damaged = $row2[Damaged];
							$ReturnToMan = $row2[ReturnToMan];
							$SubProductID1 = $row2[SubProductID1];
							$SubProductID2 = $row2[SubProductID2];
							$SubProductID3 = $row2[SubProductID3];
							
							if($SubProductID1 == 0 AND $SubProductID2 == 0 AND $SubProductID3 == 0)
							{
							
									
										$OnHandNew = $OnHand + $Quantity;
										$WebInventoryNew = $WebInventory + $Quantity;
										
										$sql3 = "UPDATE tblProductNew
										SET WebInventory = '$WebInventoryNew'
										WHERE ProductID = '$ProductID'";
										$result3 = mysql_query($sql3) or die("Cannot update On Hand for Return");

								}#end of negative subproduct loop
								else
								{

						
												$WebInventoryNew = $WebInventory + $Quantity;
												
												$sql3 = "UPDATE tblProductNew
												SET WebInventory = '$WebInventoryNew'
												WHERE ProductID = '$SubProductID1' OR ProductID = '$SubProductID2' OR ProductID = '$SubProductID3'";
												$result3 = mysql_query($sql3) or die("Cannot update On Hand for Return subproduct");

								}#end of positive subproduct loop
							
							
							}#end of product table loop

					}#end of product quantity loop

					
		
		}#end cancel if loop with detailID
		elseif($ClaimType == "Cancel" AND $DetailID == '0')
		{			
					
					$sql4 = "UPDATE tblFriendSale
					SET Return = 'y'
					WHERE PurchaseID = '$PurchaseID' AND Status = 'active'";
					$result4 = mysql_query($sql4);

					$sql6 = "UPDATE tblPurchase2
					SET Status = 'cancel'
					WHERE PurchaseID = '$PurchaseID'";
					$result6 = mysql_query($sql6) or die("Cannot cancel order");
		
		
					$sql7 = "UPDATE tblPurchaseDetails2
					SET Status = 'cancel'
					WHERE PurchaseID = '$PurchaseID'";
					$result7 = mysql_query($sql7) or die("Cannot cancel order");


				$sql4 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID'";
				//echo "<br>sql4 =" .$sql4;
				$result4 = mysql_query($sql4) or die("Cannot execute query! detail ID");
				
				while($row4 = mysql_fetch_array($result4))
				{
				$ProductID = $row4[ProductID];
				$Quantity = $row4[Quantity];



							$sql2 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
							//echo "<br>sql2 =" .$sql2;
							$result2 = mysql_query($sql2) or die("Cannot execute query! product ID");
							
							while($row2 = mysql_fetch_array($result2))
							{
							$OnHand = $row2[OnHand];
							$WebInventory = $row2[WebInventory];
							$Damaged = $row2[Damaged];
							$ReturnToMan = $row2[ReturnToMan];
							$SubProductID1 = $row2[SubProductID1];
							$SubProductID2 = $row2[SubProductID2];
							$SubProductID3 = $row2[SubProductID3];
							
							if($SubProductID1 == 0 AND $SubProductID2 == 0 AND $SubProductID3 == 0)
							{
							
									
										$OnHandNew = $OnHand + $Quantity;
										$WebInventoryNew = $WebInventory + $Quantity;
										
										$sql3 = "UPDATE tblProductNew
										SET WebInventory = '$WebInventoryNew'
										WHERE ProductID = '$ProductID'";
										$result3 = mysql_query($sql3) or die("Cannot update On Hand for Return");

								}#end of negative subproduct loop
								else
								{

						
												$WebInventoryNew = $WebInventory + $Quantity;
												
												$sql3 = "UPDATE tblProductNew
												SET WebInventory = '$WebInventoryNew'
												WHERE ProductID = '$SubProductID1' OR ProductID = '$SubProductID2' OR ProductID = '$SubProductID3'";
												$result3 = mysql_query($sql3) or die("Cannot update On Hand for Return subproduct");

								}#end of positive subproduct loop
							
							
							}#end of product table loop

					}#end of product quantity loop




		}#end cancel if loop without detailID
		
		
		if($Status == "closed" AND $ClaimType == "Return" AND $DetailID <> '0')
		{
		
				
				

				
		
				$sql4 = "SELECT * FROM tblPurchaseDetails2 WHERE DetailID = '$DetailID'";
				//echo "<br>sql4 =" .$sql4;
				$result4 = mysql_query($sql4) or die("Cannot execute query! detail ID");
				
				while($row4 = mysql_fetch_array($result4))
				{
				$ProductID = $row4[ProductID];
				$Quantity = $row4[Quantity];


				$sql4 = "UPDATE tblFriendSale
				SET Return = 'y'
				WHERE PurchaseID = '$PurchaseID' AND ProductID = '$ProductID' AND Status = 'active'";
				$result4 = mysql_query($sql4) or die("Cannot update tblFriendSale");


							$sql2 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
							//echo "<br>sql2 =" .$sql2;
							$result2 = mysql_query($sql2) or die("Cannot execute query! product ID");
							
							while($row2 = mysql_fetch_array($result2))
							{
							$OnHand = $row2[OnHand];
							$WebInventory = $row2[WebInventory];
							$Damaged = $row2[Damaged];
							$ReturnToMan = $row2[ReturnToMan];
							$SubProductID1 = $row2[SubProductID1];
							$SubProductID2 = $row2[SubProductID2];
							$SubProductID3 = $row2[SubProductID3];
							
							if($SubProductID1 == 0 AND $SubProductID2 == 0 AND $SubProductID3 == 0)
							{
							
									if($ckReturn == "y")
									{
										$OnHandNew = $OnHand + $Quantity;
										$WebInventoryNew = $WebInventory + $Quantity;
										
										$sql3 = "UPDATE tblProductNew
										SET OnHand = '$OnHandNew',
										WebInventory = '$WebInventoryNew'
										WHERE ProductID = '$ProductID'";
										$result3 = mysql_query($sql3) or die("Cannot update On Hand for Return");
										
									}#end ckReturn loop
									
									elseif($ckDamaged == "y")
									{
										$DamagedNew = $Damaged + $Quantity;
										
										$sql3 = "UPDATE tblProductNew
										SET Damaged = '$DamagedNew'
										WHERE ProductID = '$ProductID'";
										$result3 = mysql_query($sql3) or die("Cannot update On Hand for Damaged");
									
									}#end ckDamaged loop
									
									elseif($ckReturnToMan == "y")
									{
										$ReturnToManNew = $ReturnToMan + $Quantity;
										
										$sql3 = "UPDATE tblProductNew
										SET ReturnToMan = '$ReturnToManNew'
										WHERE ProductID = '$ProductID'";
										$result3 = mysql_query($sql3) or die("Cannot update On Hand for Return to Man");
									
									}#end ckReturnToMan loop
								
								}#end of negative subproduct loop
								else
								{
										if($ckReturn == "y")
											{
												$OnHandNew = $OnHand + $Quantity;
												$WebInventoryNew = $WebInventory + $Quantity;
												
												$sql3 = "UPDATE tblProductNew
												SET OnHand = '$OnHandNew'
												WHERE ProductID = '$SubProductID1' OR ProductID = '$SubProductID2' OR ProductID = '$SubProductID3'";
												$result3 = mysql_query($sql3) or die("Cannot update On Hand for Return subproduct");
												
												
											}#end ckReturn loop
											
											
											elseif($ckDamaged == "y")
											{
												$DamagedNew = $Damaged + $Quantity;
												
												$sql3 = "UPDATE tblProductNew
												SET Damaged = '$DamagedNew'
												WHERE ProductID = '$SubProductID1' OR ProductID = '$SubProductID2' OR ProductID = '$SubProductID3'";
												$result3 = mysql_query($sql3) or die("Cannot update On Hand for Damaged");
											
											}#end ckDamaged loop
											
											elseif($ckReturnToMan == "y")
											{
												$ReturnToManNew = $ReturnToMan + $Quantity;
												
												$sql3 = "UPDATE tblProductNew
												SET ReturnToMan = '$ReturnToManNew'
												WHERE ProductID = '$SubProductID1' OR ProductID = '$SubProductID2' OR ProductID = '$SubProductID3'";
												$result3 = mysql_query($sql3) or die("Cannot update On Hand for Return to Man");
											
											}#end ckReturnToMan loop
											
								}#end of positive subproduct loop
							
							
							}#end of product table loop

					}#end of product quantity loop

		}#end of "closed" loop
		else
		{							
										
										$sql5 = "SELECT * FROM tblFriendSale WHERE PurchaseID = '$PurchaseID' AND Status = 'active'";
										//echo $sql5;
										$result5 = mysql_query($sql5) or die("Cannot find Purchase in tblFriendSale");
										$NumFriends = mysql_num_rows($result5);
										
										if($NumFriends > 0)
										{
										$sql4 = "UPDATE tblFriendSale
										SET Return = 'y'
										WHERE PurchaseID = '$PurchaseID' AND Status = 'active'";
										$result4 = mysql_query($sql4) or die("Cannot update tblFriendSale");
										}
		
		}
		
		
		$goto = "index.php";
		header("location: $goto");
		
	}#end if loop

	
	$sql2 = "SELECT * FROM tblCustomerClaims2 WHERE ClaimID = '$ClaimID'";
	$result2 = mysql_query($sql2) or die("Cannot get company rep info, please try again.");

	while($row2 = mysql_fetch_array($result2))
		{
			
			$ClaimType = $row2[ClaimType];
			$PurchaseID = $row2[PurchaseID];
			$DetailID = $row2[DetailID];
			$RequestDate = $row2[RequestDate];
			$RequestAmount = $row2[RequestAmount];
			$RequestType = $row2[RequestType];
			$RequestedTo = $row2[RequestedTo];
			$Reason = $row2[Reason];
			$Reason2 = $row2[Reason2];
			$UnderWarranty = $row2[UnderWarranty];
			$ProductReturned = $row2[ProductReturned];
			$ReturnDate = $row2[ReturnDate];
			$SignForm = $row2[SignForm];
			$SignedForm = $row2[SignedForm];
			$FormType = $row2[FormType];
			$DateToReturn = $row2[DateToReturn];
			$RefundDate = $row2[RefundDate];
			$RefundAmount = $row2[RefundAmount];
			$ChargeAmount = $row2[ChargeAmount];
			$ChargeDate = $row2[ChargeDate];
			$ChargedBy = $row2[ChargedBy];
			$ChargeAuthorization = $row2[ChargeAuthorization];
			$ProblemConclusion = $row2[ProblemConclusion];
			$Notes = $row2[Notes];
			$Status = $row2[Status];
			$Name = $row2[Name];
			$RefundedBy = $row2[RefundedBy];
		}
	
	
		
	$sql3 = "SELECT * FROM tblPurchase2 WHERE PurchaseID = '$PurchaseID'";
	$result3 = mysql_query($sql3) or die("Cannot get company rep info, please try again.");

	while($row3 = mysql_fetch_array($result3))
		{
			$CustomerID = $row3[CustomerID];
			
					$sql4 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
					$result4 = mysql_query($sql4) or die("Cannot get company rep info, please try again.");
					
					while($row4 = mysql_fetch_array($result4))
					{
					$FirstName1 = $row4[FirstName];
					$LastName1 = $row4[LastName];
					}
		}


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";
			
	
?>

<form name="form1" method="post" action="">
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Edit
  Claim for <? if($Name == "") { ?><? echo $FirstName1; ?> <? echo $LastName1; ?><? } else { ?><? echo $Name; ?><? } ?> - Claim # <? echo $ClaimID; ?> </strong></font></p>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
<td><p><font size="2" face="Arial, Helvetica, sans-serif">Claim Type</font></p>
  <ul>
    <li><font size="1" face="Arial, Helvetica, sans-serif">Refund - item has been shipped, need partial refund, customer keeps item</font></li>
    <li><font size="1" face="Arial, Helvetica, sans-serif">Return - item has been shipped and returned to us</font></li>
    <li><font size="1" face="Arial, Helvetica, sans-serif">Replacement - item has been shipped and they need a replacement</font></li>
    <li><font size="1" face="Arial, Helvetica, sans-serif">Cancel - order NOT shipped and will not be shipped</font></li>
  </ul></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">  <select name="ClaimType" id="ClaimType">
    <option value="Cancel" <? if($ClaimType == "Cancel") { ?>selected<? } ?>>Cancel</option>
    <option value="Refund" <? if($ClaimType == "Refund") { ?>selected<? } ?>>Refund</option>
    <option value="Replacement" <? if($ClaimType == "Replacement") { ?>selected<? } ?>>Replacement</option>
    <option value="Return" <? if($ClaimType == "Return") { ?>selected<? } ?>>Return</option>
  </select>
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Name (only if customer
      is not already in database)</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Name" type="text" id="Name" value="<? echo $Name; ?>">
  </font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Purchase ID
  
</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;
</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <input name="PurchaseID" type="text" id="PurchaseID4" value="<? echo $PurchaseID; ?>" size="10">
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Detail ID
      (not for cancels, single product only) </font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="DetailID" type="text" id="DetailID3" value="<? echo $DetailID; ?>" size="10">
  </font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Requested on this Date
    (0000-00-00)</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <input name="RequestDate" type="text" id="RequestDate" value="<? echo $RequestDate; ?>">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Requested Amount</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"> $
<input name="RequestAmount" type="text" id="RequestAmount" value="<? echo $RequestAmount; ?>" size="10">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Request Type (phone, mail,
    email, etc) </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <input name="RequestType" type="text" id="RequestType" value="<? echo $RequestType; ?>">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Requested To Employee</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">  <select name="RequestedTo" class="text" id="RequestedTo">
    <option value = "" selected>Please Select</option>
    <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT * FROM tblEmployee
								WHERE Status = 'active'								
								ORDER BY FirstName";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
    <option value="<? echo $row[EmployeeID];?>" <? if($row[EmployeeID] == $RequestedTo){echo "selected";}?>><? echo $row[FirstName];?></option>
    <?
						}
					?>
  </select>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Reason&nbsp;</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <textarea name="Reason" cols="40" rows="4" id="Reason"><? echo $Reason; ?></textarea>
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Reason 2  (if applicable) </font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <select name="Reason2" class="text" id="Reason2">
      <option value = "" selected>Please Select</option>
      <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT * FROM tblCustomerClaims2
								GROUP BY Reason2";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
      <option value="<? echo $row[Reason2];?>" <? if($row[Reason2] == $Reason2){echo "selected";}?>><? echo $row[Reason2];?></option>
      <?
						}
					?>
    </select>
  </font></td>
</tr>
</table>
<br>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Under
        Warranty? (y or n) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="UnderWarranty" type="text" id="UnderWarranty2" value="<? echo $UnderWarranty; ?>" size="3" maxlength="1">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Product
        Returned? (y or n) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="ProductReturned" type="text" id="ProductReturned2" value="<? echo $ProductReturned; ?>" size="3" maxlength="1">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Date Returned
        (0000-00-00) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="ReturnDate" type="text" id="ReturnDate2" value="<? echo $ReturnDate; ?>">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Need to
        Sign the Form? (y or n) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="SignForm" type="text" id="SignForm2" value="<? echo $SignForm; ?>" size="3" maxlength="1">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Signed
        the Form? (y or n) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="SignedForm" type="text" id="SignedForm2" value="<? echo $SignedForm; ?>" size="3" maxlength="1">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Form Type
        (fax, phone, email) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="FormType" type="text" id="FormType2" value="<? echo $FormType; ?>">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Date Product
        Needs to be Returned By (0000-00-00) </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="DateToReturn" type="text" id="DateToReturn2" value="<? echo $DateToReturn; ?>">
    </font></td>
  </tr>
</table>
<br>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Refund
        Date and Time &nbsp;(include time in military format) (0000-00-00 00:00:00) </font></td>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="RefundDate" type="text" id="RefundDate3" value="<? echo $RefundDate; ?>">
    </font></td>
  </tr>
  <tr>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Refunded
        Amount</font></td>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"> $
          <input name="RefundAmount" type="text" id="RefundAmount3" value="<? echo $RefundAmount; ?>" size="10">
    </font></td>
  </tr>
  <tr>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Refunded
        By? &nbsp;</font></td>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
      <select name="RefundedBy" class="text" id="select4">
        <option value = "" selected>Please Select</option>
        <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT * FROM tblEmployee
								WHERE Status = 'active'								
								ORDER BY FirstName";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
        <option value="<? echo $row[EmployeeID];?>" <? if($row[EmployeeID] == $RefundedBy){echo "selected";}?>><? echo $row[FirstName];?></option>
        <?
						}
					?>
      </select>
    </font></td>
  </tr>
</table>
<br>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">ChargeAmount
        (when charging for late return) </font></td>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"> $
          <input name="ChargeAmount" type="text" id="ChargeAmount2" value="<? echo $ChargeAmount; ?>" size="10">
    </font></td>
  </tr>
  <tr>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">ChargeDate&nbsp;</font></td>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="ChargeDate" type="text" id="ChargeDate2" value="<? echo $ChargeDate; ?>">
    </font></td>
  </tr>
  <tr>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">ChargedBy&nbsp;</font></td>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
      <select name="ChargedBy" class="text" id="select">
        <option value = "" selected>Please Select</option>
        <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT * FROM tblEmployee
								WHERE Status = 'active'								
								ORDER BY FirstName";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
        <option value="<? echo $row[EmployeeID];?>" <? if($row[EmployeeID] == $ChargedBy){echo "selected";}?>><? echo $row[FirstName];?></option>
        <?
						}
					?>
      </select>
    </font></td>
  </tr>
  <tr>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Charge
        Authorization&nbsp;Code (AUTH/TKT _____) </font></td>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="ChargeAuthorization" type="text" id="ChargeAuthorization2" value="<? echo $ChargeAuthorization; ?>">
    </font></td>
  </tr>
</table>
<br>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Our Conclusion
        to the Problem </font></td>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
      <textarea name="ProblemConclusion" cols="40" rows="4" id="textarea3"><? echo $ProblemConclusion; ?></textarea>
    </font></td>
  </tr>
  <tr>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Notes&nbsp;</font></td>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
      <textarea name="Notes" cols="40" rows="4" id="textarea4"><? echo $Notes; ?></textarea>
    </font></td>
  </tr>
  <tr>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Write
        off as a Loss?&nbsp;(y or n)</font></td>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="Loss" type="text" id="Loss3" value="<? echo $Loss; ?>" size="3" maxlength="1">
    </font></td>
  </tr>
  <tr>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Date Loss
        was Called (0000-00-00) </font></td>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="DateofLoss" type="text" id="DateofLoss3" value="<? echo $DateofLoss; ?>">
    </font></td>
  </tr>
  <tr>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Status&nbsp;(open
        or closed)</font></td>
    <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
      <select name="Status" id="select5">
        <option value="open" <? if($Status == "open") { ?>selected<? } ?>>open</option>
        <option value="closed" <? if($Status == "closed") { ?>selected<? } ?>>closed</option>
      </select>
    </font></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><em>When closing a Return
          claim, check one of the following boxes (only one!):</em></font>
  </p>
<blockquote>
  <p>
      <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="ckReturn" type="checkbox" id="ckReturn" value="y"> 
      Return to stock?<br>
      </font><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="ckDamaged" type="checkbox" id="ckDamaged" value="y"> 
      Damaged
      <br>
      </font><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="ckReturnToMan" type="checkbox" id="ckReturnToMan" value="y"> 
      Return to manufacturer</font></p>
  </blockquote>
<p>
    <input name="Update" type="submit" id="Update" value="Update">
</p>
</form>



<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.
require "../include/footerlinks.php";



// finishes security for page
}
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>