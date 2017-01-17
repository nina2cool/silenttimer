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

	$Now = date("Y-m-d H:i:s");

	#<Add button being pushed>
	if ($_POST['Add'] == "Add")
	{
		// Customer Table
		$CompanyName = dbQuote($_POST['CompanyName']);
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
		$Fax = $_POST['Fax'];
		$Email = $_POST['Email'];
		$School = dbQuote($_POST['School']);
		$PrepClass = dbQuote($_POST['PrepClass']);
		$Type = $_POST['Type'];
		$EbayName = dbQuote($_POST['EbayName']);
		$Receipt = $_POST['ckReceipt'];
		
		
		// Purchase2 Table
		
			
		$TestID = $_POST['Test'];
		//if($Test == ""){$Test = "0";} #fixes integer problem for test being blank if none is selected.		
		$TestDate = $_POST['TestDate'];
		$OrderDateTime = $_POST['OrderDateTime'];
		$ReferredByID = $_POST['ReferredBy'];
		$ShipCostID = $_POST['ShipCostID'];
		//$Tax = $_POST['Tax'];
		//$Subtotal = $_POST['Subtotal'];
		$Discount = $_POST['Discount'];
		$OrderShipped = $_POST['OrderShipped'];
		$Same = $_POST['Same'];
		$IP = $_POST['IP'];
		$ShippingCost = $_POST['ShippingCost'];
		$PromotionCodeID = $_POST['PromotionCodeID'];
		$Notes = dbQuote($_POST['Notes']);
		$Status = $_POST['Status'];
		$AffOfficeID = $_POST['AffOfficeID'];
		$NovaPress = $_POST['NovaPress'];
		$PaypalNumber = $_POST['PaypalNumber'];
		$Paid = $_POST['Paid'];
		$FirstNameB = dbQuote($_POST['FirstNameB']);
		$LastNameB = dbQuote($_POST['LastNameB']);
		$AddressB = dbQuote($_POST['AddressB']);
		$CityB = dbQuote($_POST['CityB']);
		$StateB = dbQuote($_POST['StateB']);
		$OtherStateB = dbQuote($_POST['OtherStateB']);
		$ZipCodeB = $_POST['ZipCodeB'];
		$CountryIDB = $_POST['CountryB'];
		$CardType = $_POST['CardType'];
		$LastFourCr = $_POST['LastFourCr'];
		$CVV2 = $_POST['CVV2'];
		$BankCode = $_POST['BankCode'];
		$AddressVerification = $_POST['AddressVerification'];
		$CVV2Verification = $_POST['CVV2Verification'];
		$IsCheck = $_POST['IsCheck'];
		$BankName = $_POST['BankName'];
		$RoutingNumber = $_POST['RoutingNumber'];
		$CheckNumber = $_POST['CheckNumber'];
		$ShipNotes = dbQuote($_POST['ShipNotes']);
		$ChkWholesale = $_POST['ChkWholesale'];
		
		
		// Purchase Details2 Table
		$Product1 = $_POST['Product1'];
		$Product2 = $_POST['Product2'];
		$Product3 = $_POST['Product3'];
		$Product4 = $_POST['Product4'];
		$Quantity1 = $_POST['Quantity1'];
		$Quantity2 = $_POST['Quantity2'];
		$Quantity3 = $_POST['Quantity3'];
		$Quantity4 = $_POST['Quantity4'];
		$PurchasePrice1 = $_POST['PurchasePrice1'];
		$PurchasePrice2 = $_POST['PurchasePrice2'];
		$PurchasePrice3 = $_POST['PurchasePrice3'];
		$PurchasePrice4 = $_POST['PurchasePrice4'];
		$Shipped1 = $_POST['Shipped1'];
		$Shipped2 = $_POST['Shipped2'];
		$Shipped3 = $_POST['Shipped3'];
		$Shipped4 = $_POST['Shipped4'];
		$EbayItemNumber1 = $_POST['EbayItemNumber1'];
		$EbayItemNumber2 = $_POST['EbayItemNumber2'];
		$EbayItemNumber3 = $_POST['EbayItemNumber3'];
		$EbayItemNumber4 = $_POST['EbayItemNumber4'];
		$Status1 = $_POST['Status1'];
		$Status2 = $_POST['Status2'];
		$Status3 = $_POST['Status3'];
		$Status4 = $_POST['Status4'];
		
		
		//check to see if customer already exists... if they don't add them..if they do, grab their CustomerID to use.
			$sql = "SELECT * FROM tblCustomer WHERE FirstName='$FirstName' AND LastName = '$LastName' 
			AND ZipCode = '$ZipCode' AND Email = '$Email'";
			$result = mysql_query($sql) or die("Cannot execute query");
						
			while($row = mysql_fetch_array($result))
			{
				$CustomerID = $row[CustomerID];
			}
			
			//if there is no customer record for them, add them to customer table...
			If ($CustomerID == "")
			{
				$sql = "INSERT INTO tblCustomer(BusinessName, FirstName, LastName, Address, Address2, City, State, ZipCode, CountryID, Phone, Email, Fax,
				School, PrepClass, Type, EbayName, StateOther)
				
				VALUES ('$CompanyName', '$FirstName', '$LastName', '$Address', '$Address2', '$City', '$State', '$ZipCode', '$CountryID', '$Phone', '$Email', '$Fax',
				'$School', '$PrepClass', '$Type', '$EbayName', '$StateOther')";
				
				mysql_query($sql) or die("Cannot insert customer, please try again.");
				
		
		//now, find out what their customerID is...
		$sql = "SELECT CustomerID FROM tblCustomer WHERE FirstName= '$FirstName' AND LastName = '$LastName' 
		AND Address = '$Address' AND Phone = '$Phone' AND ZipCode = '$ZipCode'";
		
		$result = mysql_query($sql) or die("Cannot retrieve Customer ID, please try again.");
		
		while($row = mysql_fetch_array($result))
		{
			$CustomerID = $row[CustomerID];
		}
	
		}
		
		
		if($Type == '4')
		{
		$CardType = "paypal";
		$BankCode = $PaypalNumber;
		}
		
		
					
		//now, the customer is in the customer table, we have their customerID....we have all the totals......INSERT order into tblPurchase...
		$sql = "INSERT INTO tblPurchase2(CustomerID, TestID, TestDate, ReferredByID, Discount, OrderDateTime, 
			ShipCostID, ShippingCost, PromotionCodeID, AffOfficeID, IP, SameAsShip, FirstNameB, LastNameB, AddressB, CityB, StateB, 
			OtherStateB, CountryIDB, ZipB, Paid, Status, Notes, PaypalNumber, InvoiceNumber, InvoiceDate, PONumber, Shipped, 
			CardType, LastFourCr, BankCode, AddressVerification, CVV2Verification, IsCheck, BankName, RoutingNumber, CheckNumber,
			ShipNotes, NovaPress)
			
			VALUES ('$CustomerID', '$TestID', '$TestDate', '$ReferredByID', '$Discount', '$OrderDateTime', '$ShipCostID', '$ShippingCost', 
			'$PromotionCodeID', '$AffOfficeID', '$IP', '$Same', '$FirstNameB', '$LastNameB', '$AddressB', '$CityB', '$StateB',  '$OtherStateB',
			'$CountryID', '$ZipCodeB', '$Paid', '$Status', '$Notes', '$PaypalNumber', '$InvoiceNumber', '$InvoiceDate', '$PONumber', '$OrderShipped',
			'$CardType', '$LastFourCr', '$BankCode', '$AddressVerification', '$CVV2Verification', '$IsCheck', '$BankName', '$RoutingNumber', '$CheckNumber',
			'$ShipNotes', '$NovaPress')";

		
		
		mysql_query($sql) or die("Cannot insert purchase2, please try again.");
		
			
			
			//now, get purchase ID for this puchase, and enter info into tblPurchaseDetails......
			$sql = "SELECT PurchaseID FROM tblPurchase2 WHERE CustomerID = '$CustomerID' AND IP = '$IP' AND OrderDateTime = '$OrderDateTime'";
		
			
			$result = mysql_query($sql) or die("Cannot get Purchase ID, please try again.");
					
			while($row = mysql_fetch_array($result))
			{
				$PurchaseID = $row[PurchaseID];
			}
				

		//echo "$pID, $FirstNameB, $LastNameB, $AddressB, $CityB, $StateB, $ZipCodeB, $CardType, $LastFourCr, $Code, $AVS, $CVV2Code, $now";
		
		
		if($Quantity1 <> '')
		{	
			
			// Insert into purchase details table
			$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Shipped, Status) 
			VALUES ('$PurchaseID', '$Product1', '$Quantity1', '$PurchasePrice1', '$EbayItemNumber1', '$Shipped1', '$Status1');";
			mysql_query($sql) or die("Cannot Insert Purchase Details1 information, try again!");
			
			$sql2 = "UPDATE tblProductNew SET WebInventory = WebInventory - $Quantity1 WHERE ProductID = '$Product1'";
			$result2 = mysql_query($sql2) or die("Cannot update WebInventory 1");
			
		}
		//else
		//{
		//echo "Quantity 1 is blank - Product not entered";
		
		//}
		
		
		if($Quantity2 <> '')
		{	
		
			// Insert into purchase details table
			$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Shipped, Status) 
			VALUES ('$PurchaseID', '$Product2', '$Quantity2', '$PurchasePrice2', '$EbayItemNumber2', '$Shipped2', '$Status2');";
			mysql_query($sql) or die("Cannot Insert Purchase Details2 information, try again!");
			
			$sql2 = "UPDATE tblProductNew SET WebInventory = WebInventory - $Quantity2 WHERE ProductID = '$Product2'";
			$result2 = mysql_query($sql2) or die("Cannot update WebInventory 2");
		}
		//else
		//{
		//echo "Quantity 2 is blank - Product not entered";
		
		//}

		if($Quantity3 <> '')
		{	
		
			// Insert into purchase details table
			$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Shipped, Status) 
			VALUES ('$PurchaseID', '$Product3', '$Quantity3', '$PurchasePrice3', '$EbayItemNumber3', '$Shipped3', '$Status3');";
			mysql_query($sql) or die("Cannot Insert Purchase Details3 information, try again!");
			
			$sql2 = "UPDATE tblProductNew SET WebInventory = WebInventory - $Quantity3 WHERE ProductID = '$Product3'";
			$result2 = mysql_query($sql2) or die("Cannot update WebInventory 3");
						
		}
		
		//else
		//{
		//echo "Quantity 3 is blank - Product not entered";
		
		//}


		if($Quantity4 <> '')
		{	
		
			// Insert into purchase details table
			$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Shipped, Status) 
			VALUES ('$PurchaseID', '$Product4', '$Quantity4', '$PurchasePrice4', '$EbayItemNumber4', '$Shipped4', '$Status4');";
			mysql_query($sql) or die("Cannot Insert Purchase Details4 information, try again!");
			
			$sql2 = "UPDATE tblProductNew SET WebInventory = WebInventory - $Quantity4 WHERE ProductID = '$Product4'";
			$result2 = mysql_query($sql2) or die("Cannot update WebInventory 4");
						
		}
		//else
		//{
		//echo "Quantity 4 is blank - Product not entered";
		
		//}
		
		
		$Subtotal1 = $PurchasePrice1 * $Quantity1;
		$Subtotal2 = $PurchasePrice2 * $Quantity2;
		$Subtotal3 = $PurchasePrice3 * $Quantity3;
		$Subtotal4 = $PurchasePrice4 * $Quantity4;
		
		$Subtotal = $Subtotal1 + $Subtotal2 + $Subtotal3 + $Subtotal4;
		
		$TotalCost = $Subtotal - $Discount + $ShippingCost;
		
		if($State == 'TX' AND $chkWholesale <> 'y')
		{
		$Tax = 0.0825 * $TotalCost;
		}
		else
		{
		$Tax = 0;
		}
		
		
		$sql6 = "UPDATE tblPurchase2
		SET Tax = '$Tax',
		Subtotal = '$Subtotal'
		WHERE PurchaseID = '$PurchaseID'";
		
		$result6 = mysql_query($sql6) or die("Cannot update Purchase 2 information, try again!");


		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		$CompanyName = addQuote($CompanyName);
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
		$StateOther = addQuote($StateOther);
		$Notes = addQuote($Notes);
		$OtherStateB = addQuote($OtherStateB);
		$EbayName = addQuote($EbayName);
		$ShipNotes = addQuote($ShipNotes);
		
		
		if($Receipt == 'y')
		{
		
//////////////////////
//   Send Out receipt, and copy us on it... ------- Order is complete, send email to both Company email, and to customer.....
//////////////////////
	
	/*
	
			require "../../code/class.phpmailer.php";
			
			$mail = new PHPMailer();
			
			$mail->From = "info@silenttimer.com";
			$mail->FromName = "The Silent Timer Team";
			$mail->AddAddress("$Email", "$FirstName $LastName");
			$mail->AddBCC("nina@silenttimer.com", "Silent Timer Orders");
			//$mail->AddBCC("dina@silenttimer.com", "Silent Timer Orders");
			//$mail->AddBCC("erik@silenttimer.com", "Silent Timer Orders");
			#$mail->AddAttachment("Guide/Time Management Guide.pdf");
			$mail->IsHTML(true);
			$mail->Subject = "Your Silent Timer Receipt";
		
		
			if($State == "ZZ"){$State = $State_Other;}
			if($StateB == "ZZ"){$StateB = $State_OtherB;}
		

		////// - HTML BUILDING
		$html=
		"
		<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
		<html>
		<head>
		<title>The Silent Timer Receipt</title>
		<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
		</head>
		<body>
		
				<table width='800' border='0' cellspacing='0' cellpadding='0'>
		  <tr>
			<td class='main'><p><font color='#003399' size='2' face='Arial, Helvetica, sans-serif'><strong>Your 
				Silent Timer Receipt</strong></font></p>
			  <p><font color='#003399' size='2' face='Arial, Helvetica, sans-serif'><font color='#000000'><strong>$FirstName</strong></font></font><strong>,</strong> 
				<strong><font size='2' face='Arial, Helvetica, sans-serif'>thank you for your order! You may use your order number to track your shipment, 
				so hold onto it! </strong></font></p>
			  <p><font size='2' face='Arial, Helvetica, sans-serif'><a href='guide/ST_TimeManGuide_061405.pdf' target='_blank'>Click
			        here</a> to
			      download<em> &quot;The
			        Silent Timer Time Management Guide</em>&quot;. It is in PDF format,
			        and gives you some valuable pointers for how to use your
			        timer during practice and on test day. If you have trouble
			        downloading it, please email us at <a href='mailto:info@silenttimer.com?subject=Time%20Management%20Guide%20Help'>info@silenttimer.com</a>.</font></p>
			  <p><strong><font size='2' face='Arial, Helvetica, sans-serif'>Order Number: 
				</font></strong> <font color='#000099' size='2' face='Arial, Helvetica, sans-serif'><strong>$pID</strong></font></p>
			  <table width='100%' border='1' cellpadding='4' cellspacing='0' bordercolor='#003399'>
				<tr> 
				  <td width='60%' align='left' valign='top' bgcolor='#003399'> <p><strong>
				  <font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Shipping to:</font></strong></p></td>
				  
				</tr>
				<tr> 
				  <td align='left' valign='top'><p><font color='#003399' size='2' face='Arial, Helvetica, sans-serif'><font color='#000000'>$FirstName $LastName</font></font><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'><br>
					  $Address $Address2<br>$City, $State $ZipCode<br>$CountryName</font></p>
					<p><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>$Phone
					  <br>
					  $Email</font><font size='2' face='Arial, Helvetica, sans-serif'><br>
					  <br>
					  </font></p></td></tr>
			  </table>
				
				<table width='100%' border='1' cellpadding='4' cellspacing='0' bordercolor='#003399'>
					<tr><td width='60%' align='left' valign='top' bgcolor='#003399' colspan = '4'><strong>
				  <font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Order 
					  Summary</strong></font> </td></tr>
						<tr><td>Qty</td><td>Product</td><td>Price</td><td>Total</td></tr>";
					#Insert into Product Details
			for($i=0; $i < count($ShoppingCart); $i++)
			{
				
				if($ShoppingCart[$i][0] != "")
				{				
					# get current product from the cart...
					$ProductID = $ShoppingCart[$i][0];
					$Num_Ordered = $ShoppingCart[$i][1];
										
					# Get all information from table for this part number ID
					$sql = "SELECT * FROM tblProduct WHERE ProductID='$ProductID'";
					$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
	
					while($row = mysql_fetch_array($result))
					{
						
						$RetailPrice = number_format($row[RetailPrice],2);
						$ProductTotal = $RetailPrice*$Num_Ordered;
						$ProductTotal = number_format($ProductTotal, 2);
						$Description = $row[Description];
						$ProductName = $row[ProductName];
						
					# end while	
					}
					$html .= " <tr>
					<td><font size='2' face='Arial, Helvetica, sans-serif'>$Num_Ordered</font></td>
					<td><font size='2' face='Arial, Helvetica, sans-serif'><b>$ProductName</b><br>$Description</font></td>
					<td><font size='2' face='Arial, Helvetica, sans-serif'>$$RetailPrice</font></td>					
					<td><font size='2' face='Arial, Helvetica, sans-serif'>$$ProductTotal</font></td>					
					</tr>";
					$OrderTotal += $ProductTotal;
				#end if	
				}
					
			#end for		
			}
					$html .= "<tr><td colspan='3'><font size='2' face='Arial, Helvetica, sans-serif'>Subtotal</font></td><td><font size='2' face='Arial, Helvetica, sans-serif'>$$SubS</font></td></tr>
					<tr><td colspan='3'><font size='2' face='Arial, Helvetica, sans-serif'>Tax</font></td><td><font size='2' face='Arial, Helvetica, sans-serif'>$$TaxS</font></td></tr>";
					if ($DiscountS != 0){ $html .= "<tr><td colspan='3'><font size='2' face='Arial, Helvetica, sans-serif'>Discount</font></td><td><font size='2' face='Arial, Helvetica, sans-serif'>-$$DiscountS</font></td></tr>";}
					$html .= "<tr><td colspan='3'><font size='2' face='Arial, Helvetica, sans-serif'>Shipping Cost</font></td><td><font size='2' face='Arial, Helvetica, sans-serif'>$$ShippingS</font></td></tr>
					<tr><td colspan='3'><font size='2' face='Arial, Helvetica, sans-serif'>Grand Total</font></td><td><font size='2' face='Arial, Helvetica, sans-serif'>$$TotalS</font></td></tr></table>";
		# hide promo table if there is no promo code entered...
		if($PromotionID != "")
		{
		$html .= "
					<table width='100%' border='1' cellspacing='0' cellpadding='5' bordercolor='#003399'>
					<tr><td width='60%' align='left' valign='top' bgcolor='#003399'> <strong>
				  <font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Promotion Information</strong></font></td></tr>
					<tr>
					  <td><font color='#0000FF' size='2' face='Arial, Helvetica, sans-serif'><strong>Promotion<br>
						<font color='#000000'>$promoNotes</font></strong></font></td>
					</tr>
					</table>
		";
		}
		
		
		$html .= "
					<table width='100%' border='1' cellspacing='0' cellpadding='4' bordercolor='#003399'>
					 <tr><td width='60%' align='left' valign='top' bgcolor='#003399'> <strong>
				  <font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Billing Information</strong></font></td></tr>
					  <tr align='left' valign='top'> 
						<td> <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'><strong>Payment Method:<br></strong>
		";
		
		
		 
					   //if they are using a check, then put the check details...if they are using a credit card, use the card info.
					   if($isCheck=="y")
					   {
		$html .= "			   
							$BankName eCheck<br>
							Routing Number: $CheckRouting<br>
							Account Number: $CheckAccount<br>
							Check Number: $CheckNumber				
		";				 
						} 
						else
						{
		$html .= "				
						
							$CardType: ************$LastFourCr<br>
							Exp: $ExpMonth/$ExpYear
		";					
						
						}
		$html .= "				
		
							
							</font></p>
						  <p><strong><font size='2' face='Arial, Helvetica, sans-serif'>Billing Address:<font color='#000000'><br>
							</font></font></strong> 
		";
					  
		if($Same != 'y')
		{
		
		$html .= "
		<font color='#003399' size='2' face='Arial, Helvetica, sans-serif'><font color='#000000'>$FirstNameB
		$LastNameB</font></font><font color='#000000'><font size='2' face='Arial, Helvetica, sans-serif'><br>
		$AddressB<br>
		$CityB, $StateB $ZipCodeB<br>$CountryNameB</font></font></p>
		";
		}
		else
		{
		$html .= "<font color='#003399' size='2' face='Arial, Helvetica, sans-serif'><font color='#000000'>Same As Shipping</font></font>";
		}
		
		$html .=
		"
						</td>
					  </tr>
					</table>
				 ";
		
		 # Get shipping info
			  	$sql = "SELECT * FROM tblShippingCost5 WHERE ShipCostID='$ShipCostID'";
				$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
				$row = mysql_fetch_array($result);
				$ShipperID = $row[ShipperID];
				$Type = $row[ShippingOptionID];
				$tempCost = number_format($row[Cost],2);
				#get type display
				$sql99= "SELECT * FROM tblShippingOption2 WHERE ShippingOptionID = $Type";
				$result99 = mysql_query($sql99) or die("Cannot get Type. Please try again. $sql99");
				$row99 = mysql_fetch_array($result99);
				$TypeDisplay = $row99[ShippingOption];
				# GEt shipper info
				$sql = "SELECT * FROM tblShipper WHERE ShipperID='$ShipperID'";
				$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
				$row = mysql_fetch_array($result);
				$Shipper = $row[CompanyName];
				
				$html .= "<table width='100%' border='1' cellpadding='2' cellspacing='0' bordercolor='#003399'>
				<tr><td width='60%' align='left' valign='top' bgcolor='#003399' colspan='4'> <strong>
				  <font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'>Shipping Option</strong></font></td></tr>
				<tr bgcolor='#CCCCCC'>
           </tr>
          <tr bgcolor='#CCCCCC'>
            <td  >
            <div align='center'><font color='#003399' size='2' face='Arial, Helvetica, sans-serif'><strong>Shipper</strong></font></div></td>
            <td >
            <div align='center'><font color='#003399' size='2' face='Arial, Helvetica, sans-serif'><strong>Type</strong></font></div></td>
            <td ><div align='center'><font color='#003399' size='2' face='Arial, Helvetica, sans-serif'><strong>Cost</strong></font></div></td>
            
          </tr>     
		  <tr>
				<td><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'> $Shipper</font></div></td>
				<td><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'> $TypeDisplay</font></div></td>
				<td><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>$tempCost</font></div> </td>
		</tr>
		</table>";
		
		
		$html .= " 
			</td>
		  </tr>
		</table>
		";
		
		if($Shipper == "6") 
		{
			$html .= "<p><font size='2' face='Arial, Helvetica, sans-serif'>You will receive your tracking 
		  number in an email soon. Then you may go to <a href='http://www.dhl-usa.com'><strong>DHL</strong></a> 
		  to track your shipment.</font>";
		}
		
		$html .= "
		<p><font size='2' face='Arial, Helvetica, sans-serif'>If you have any questions at all, please email us. You will 
		  have your Silent Timer soon!</font>
		<p><font size='2' face='Arial, Helvetica, sans-serif'><strong>The Silent Timer 
		  Team</strong><br>
		  <a href='http://www.SilentTimer.com'>http://www.SilentTimer.com</a><br>
		  <a href='mailto:info@silenttimer.com'>info@silenttimer.com</a><br>
		  1-800-552-0325</font>
		</body>
		</html>
		";
		////// - END HTML BUILDING

*/


mail("$Email, info@silenttimer.com", "Your Silent Timer Order", "Silent Timer Order Receipt: Order #$PurchaseID\n\n$FirstName, thank you for your order!\n\nIt has been input into our system for shipment. When your order has been shipped, you will receive an email with your tracking number. Download The Silent Timer Time Management Guide at http://www.silenttimer.com/order/guide/ST_TimeManGuide_061405.pdf to further help you in your timing.\n\nIf you have any questions or need help, please email us at info@silenttimer.com. We will be glad to help you!\n\nGood luck!\nThe Silent Timer Team\n1-800-552-0325\nwww.SilentTimer.com", "From:The Silent Timer Team<info@silenttimer.com>");

			}#end Receipt if statement
			
			
			
		$goto = "NotShippedView.php";
		header("location: $goto");
			
			
			
			
		}
		
		
		// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

		
		
?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>




<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
      a Phone Order </strong></font></p>
<form name="form1" method="post" action="">
  <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; Customer
  Information</font></strong></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Company
      Name</font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="CompanyName" type="text" id="FirstName2" size="30">
      </font></td>
    </tr>
    <tr>
      <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">First
      Name</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="FirstName" type="text" id="FirstName2" size="30">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Last
      Name</font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="LastName" type="text" id="LastName2" size="30">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Address</font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Address" type="text" id="Address" size="35" maxlength="30">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Address
      2 </font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Address2" type="text" id="Address2" size="35" maxlength="30">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>City</strong></font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="City" type="text" id="City" size="20">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
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
      </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp;
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State
      Other</strong></font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="StateOther" type="text" id="StateOther" size="20">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip
      Code</strong></font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="ZipCode" type="text" id="ZipCode3" size="11" maxlength="10">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Country</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
</strong>
          
		  <select name="Country" tabindex="" id="Country" class="text">
            <option value="" selected>Select</option>
            <? 
					$sql3 = "SELECT * FROM tblShipLocation ORDER BY Name";
					$result3 = mysql_query($sql3) or die("Cannot get CountryB");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
            <option value="<? echo $row3[LocationID]; ?>"<? if($row3[LocationID] == 225){echo "selected";}?>><? echo $row3[Name]; ?></option>
            <?
					}
				?>
          </select>
		  
      <strong>      </strong></font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Phone
      Number</font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Phone" type="text" id="Phone" size="20">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Email
      Address</font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Email" type="text" id="OrderEmail3" size="45" maxlength="50">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Fax</font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Fax" type="text" id="Fax" size="20">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">eBay/Amazon
      Name </font></strong></font></td>
      <td><input name="EbayName" type="text" id="EbayName3" size="30"></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>School</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="School" type="text" id="School22">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Prep Class
            <a href="PrepClass.php" target="_blank"><font size="1">VIEW LIST</font></a></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="PrepClass" type="text" id="PrepClass22">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Type</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Type" tabindex="" id="Type" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql3 = "SELECT * FROM tblCustomerType ORDER BY Type";
					$result3 = mysql_query($sql3) or die("Cannot get State");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
          <option value="<? echo $row3[TypeID]; ?>"<? if($row3[Type] == "phone"){echo "selected";}?>><? echo $row3[Type]; ?></option>
          <?
					}
				?>
        </select>
      </font></td>
    </tr>
  </table>
  <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&gt; Purchase
  Information</font></strong></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Quantity</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Purchase Price </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipped?
            </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(y/n) </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">eBay Item
            Number </font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product1" tabindex="" id="Product1" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew";
					
					$result = mysql_query($sql) or die("Cannot get tblProductNew1");
					
					while($row = mysql_fetch_array($result))
					{
				?>
          <option value="<? echo $row[ProductID]; ?>"><? echo $row[Nickname]; ?></option>
          <?
					}
				?>
        </select>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Quantity1" type="text" id="Quantity1" size="5">
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        $
        <input name="PurchasePrice1" type="text" id="PurchasePrice1" size="8">
      </font></td>
      <td><input name="Shipped1" type="text" id="Shipped1" value="n" size="5"></td>
      <td><input name="EbayItemNumber1" type="text" id="EbayItemNumber1" size="12"></td>
      <td><input name="Status1" type="text" id="Status1" value="active" size="12" maxlength="10"></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product2" tabindex="" id="Product2" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew";
					
					$result = mysql_query($sql) or die("Cannot get tblProductNew2");
					
					while($row = mysql_fetch_array($result))
					{
				?>
          <option value="<? echo $row[ProductID]; ?>" <? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
          <?
					}
				?>
        </select>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Quantity2" type="text" id="Quantity2" size="5">
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        $
        <input name="PurchasePrice2" type="text" id="PurchasePrice2" size="8">
      </font></td>
      <td><input name="Shipped2" type="text" id="Shipped2" value="n" size="5"></td>
      <td><input name="EbayItemNumber2" type="text" id="EbayItemNumber2" size="12"></td>
      <td><input name="Status2" type="text" id="Status2" value="active" size="12" maxlength="10"></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product3" tabindex="" id="Product3" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew";
					
					$result = mysql_query($sql) or die("Cannot get tblProductNew3");
					
					while($row = mysql_fetch_array($result))
					{
				?>
          <option value="<? echo $row[ProductID]; ?>" <? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
          <?
					}
				?>
        </select>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Quantity3" type="text" id="Quantity3" size="5">
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        $
        <input name="PurchasePrice3" type="text" id="PurchasePrice3" size="8">
      </font></td>
      <td><input name="Shipped3" type="text" id="Shipped3" value="n" size="5"></td>
      <td><input name="EbayItemNumber3" type="text" id="EbayItemNumber3" size="12"></td>
      <td><input name="Status3" type="text" id="Status3" value="active" size="12" maxlength="10"></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product4" tabindex="" id="Product4" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew";
					
					$result = mysql_query($sql) or die("Cannot get tblProductNew4");
					
					while($row = mysql_fetch_array($result))
					{
				?>
          <option value="<? echo $row[ProductID]; ?>" <? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
          <?
					}
				?>
        </select>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Quantity4" type="text" id="Quantity4" size="5">
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        $
        <input name="PurchasePrice4" type="text" id="PurchasePrice4" size="8">
      </font></td>
      <td><input name="Shipped4" type="text" id="Shipped4" value="n" size="5"></td>
      <td><input name="EbayItemNumber4" type="text" id="EbayItemNumber4" size="12"></td>
      <td><input name="Status4" type="text" id="Status4" value="active" size="12" maxlength="10"></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date / Time
            of Purchase:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="OrderDateTime" type="text" id="OrderDateTime" value="<? echo $Now;?>" size="25">
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Purchase
            Order Status:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Status" type="text" id="Status2" value="active" size="8">
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Entire order
            shipped? </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(y/n/p)</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="OrderShipped" type="text" id="Status2" value="n" size="3" maxlength="1">
      </font></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Discount:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"> $
            <input name="Discount" type="text" id="Discount" size="10">
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Tax:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
      &lt;automatically calculated for Texas&gt;<br>
        <input name="chkWholesale" type="checkbox" id="chkWholesale" value="y">
        <strong>WHOLESALE? (check if yes) </strong></font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipping
            Cost:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$
            <input name="ShippingCost" type="text" id="ShippingCost" size="10">
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="ShipCostID.php" target="_blank">Shipping
              Cost ID</a>:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033"><strong>
        <input name="ShipCostID" type="text" id="ShipCostID" size="10">
      </strong></font></font></font></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Referred
            By:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="ReferredBy" tabindex="" id="ReferredBy" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblReferredBy";
					
					$result = mysql_query($sql) or die("Cannot get ReferredBy");
					
					while($row = mysql_fetch_array($result))
					{
				?>
          <option value="<? echo $row[ReferredByID]; ?>" <? if($row[ReferredByID] == $ReferredBy){echo "selected";}?>><? echo $row[Name]; ?></option>
          <?
					}
				?>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Test:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Test" tabindex="" id="Test">
          <option value="" selected>Test</option>
          <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql = "SELECT * FROM tblTests ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot execute query!");
					
					while($row = mysql_fetch_array($result))
					{
				?>
          <option value="<? echo $row[TestID]; ?>" <? if($row[TestID] == $TestID){echo "selected";}?><? if($row[Name] == $tURL){echo "selected";}?>><? echo $row[Name]; ?></option>
          <?
					}
				?>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Test Date:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="TestDate" type="text" id="TestDate2" value="0000-00-00" size="15">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Paid?</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="Paid" type="text" id="PONumber2" value="y" size="3" maxlength="1">
      </strong></font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Promotion
            Code ID: </font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="PromotionCodeID" type="text" id="PromotionCodeID" size="30">
      </strong></font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase
            Notes:</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <textarea name="Notes" cols="50" rows="4" id="textarea"></textarea>
      </strong></font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping
            Notes:<br>
            </strong>(Notes related to whether to <br>
        email customer, print packing list,
        etc) </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <textarea name="ShipNotes" cols="50" rows="4" id="textarea"></textarea>
      </strong></font></td>
    </tr>
  </table>
  <br>
  <table width="75%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Same billing
            address?:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">
        <input name="Same" type="text" id="Same2" value="y" size="3" maxlength="1">
      </font></strong></font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">PayPal Transaction
      Number:</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="PaypalNumber" type="text" id="PaypalNumber" size="20">
      </strong></font></td>
    </tr>
  </table>
  <br>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&gt; Billing
           Information</font></strong></font></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">First
              Name</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="FirstNameB" type="text" id="FirstNameB" size="30">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Last
              Name</font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="LastNameB" type="text" id="LastNameB" size="30">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#000033">Address</font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="AddressB" type="text" id="AddressB2" size="35" maxlength="30">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>City</strong></font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="CityB" type="text" id="CityB2" size="20">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="StateB" tabindex="" id="StateB" class="text">
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
      </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp;      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Other
            State</strong></font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="OtherStateB" type="text" id="StateB3" size="10">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip
            Code</strong></font></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="ZipCodeB" type="text" id="ZipCodeB3" size="11" maxlength="10">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Country</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="CountryB" tabindex="" id="CountryB" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql3 = "SELECT * FROM tblShipLocation ORDER BY Name";
					$result3 = mysql_query($sql3) or die("Cannot get CountryB");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
          <option value="<? echo $row3[LocationID]; ?>"<? if($row3[LocationID] == 225){echo "selected";}?>><? echo $row3[Name]; ?></option>
          <?
					}
				?>
        </select>
		
		
      </font></td>
    </tr>
  </table>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&gt; Credit
          Card Information</font></strong></font></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Card
            Type </strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="CardType" tabindex="" id="CardType" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql3 = "SELECT * FROM tblCreditCard";
					$result3 = mysql_query($sql3) or die("Cannot get Credit Card types");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
          <option value="<? echo $row3[CardID]; ?>"><? echo $row3[CardName]; ?></option>
          <?
					}
				?>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Last
            Four Digits </strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="LastFourCr" type="text" id="LastFourCr3" size="5" maxlength="4">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Authorization
            Code </strong></font></td>
      <td><font face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="BankCode" type="text" id="BankCode5" value="AUTH/TKT " size="50">
      </font></strong> </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Address
      Verification</strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="AddressVerification" id="AddressVerification">
          <option selected>n/a</option>
          <option value="5 Digit Zip Matches - Address Does Not (Z)">5 Digit
          Zip Matches - Address Does Not (Z)</option>
          <option value="9 Digit Zip Matches - Address Does Not (W)">9 Digit
          Zip Matches - Address Does Not (W)</option>
          <option value="Address and Zip Code Do Not Match (N)">Address and Zip
          Code Do Not Match (N)</option>
          <option value="Address Matches - Zip Code Does Not (A)">Address Matches
          - Zip Code Does Not (A)</option>
          <option value="AVS Info Not Available (U)">AVS Info Not Available (U)</option>
          <option value="AVS Match 5 Digit Zip and Address (Y)">AVS Match 5 Digit
          Zip and Address (Y)</option>
          <option value="AVS Match 9 Digit Zip and Address (X)">AVS Match 9 Digit
          Zip and Address (X)</option>
          <option value="AVS Service Not Supported (S)">AVS Service Not Supported
          (S)</option>
          <option value="Non-Domestic AVS Info Not Available (G)">Non-Domestic
          AVS Info Not Available (G)</option>
          <option value="Reenter - AVS System Unavailable (R)">Reenter - AVS
          System Unavailable (R)</option>
          <option value="Unknown AVS Response (D)">Unknown AVS Response (D)</option>
        </select>
      </font></strong></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>CVV2
            Verification </strong></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="CVV2Verification" id="CVV2Verification">
          <option selected>n/a</option>
          <option value="CVV2 Match (M)">CVV2 Match (M)</option>
          <option value="CVV2 Not a Match (N)">CVV2 Not a Match (N)</option>
        </select>
      </font></strong></td>
    </tr>
  </table>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&gt; Check
  Information</font></strong></font></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Is it a
            check?</font></strong></td>
      <td><input name="IsCheck" type="text" id="IsCheck2" value="n" size="3" maxlength="1"></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Bank
            Name</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="BankName" type="text" id="BankName3" size="20">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Routing
            Number</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="RoutingNumber" type="text" id="RoutingNumber2" size="20">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Check
            Number</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="CheckNumber" type="text" id="CheckNumber" size="6">
      </font></td>
    </tr>
  </table>
  <p>
    <input name="ckReceipt" type="checkbox" id="ckReceipt" value="y" checked>
    <font size="2" face="Arial, Helvetica, sans-serif">Send e-mail receipt?</font></p>
  
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

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
}
?>