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
require "../../code/class.phpmailer.php";

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
	{#open add button
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
		$TestDate = $_POST['TestDate'];
		$OrderDateTime = $_POST['OrderDateTime'];
		$ReferredByID = $_POST['ReferredBy'];
		$ShipCostID = $_POST['ShipCostID'];
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
		/*
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
		*/
				
		$CardType = $_POST['cboCardType'];
		$ExpMonth = $_POST['cboExpMonth'];
		$ExpYear = $_POST['cboExpYear'];
		$CVV2 = $_POST['txtCVV2'];
		$CreditCardNo = $_POST['txtCreditCardNo'];
		$chkCheckPay = $_POST['chkCheckPay'];
		$AccountType = $_POST['AccountType'];
		$IsCheck = $_POST['chkCheckPay'];
		$BankName = $_POST['BankName'];
		$CheckRouting = $_POST['txtCheckRouting'];
		$CheckNumber = $_POST['txtCheckNumber'];
		$CheckAccount = $_POST['txtCheckAccount'];
		
		if($IsCheck <> "y") { $IsCheck = 'n'; }
		
		$ShipNotes = dbQuote($_POST['ShipNotes']);
		$ChkWholesale = $_POST['ChkWholesale'];
		$Preorder = $_POST['Preorder'];
		$Preordered = $_POST['Preordered'];
		
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
		
		$Subtotal1 = $PurchasePrice1 * $Quantity1;
		$Subtotal2 = $PurchasePrice2 * $Quantity2;
		$Subtotal3 = $PurchasePrice3 * $Quantity3;
		$Subtotal4 = $PurchasePrice4 * $Quantity4;
		
		$Subtotal = $Subtotal1 + $Subtotal2 + $Subtotal3 + $Subtotal4;
		
		$TotalCost = $Subtotal - $Discount + $ShippingCost;
		
			if($State == "TX" AND $chkWholesale <> "y")
			{
				$Tax = 0.0825 * $TotalCost;
			}
			else
			{
				$Tax = 0;
			}
			
		if($Tax <> 0) { $TotalCost = $TotalCost + $Tax; }
		
		$Tax = number_format($Tax,2);
		$TotalCost = number_format($TotalCost,2);
		$Subtotal = number_format($Subtotal,2);
		$ShippingCost = number_format($ShippingCost,2);
		$Discount = number_format($Discount,2);
		
		#############################################################################################
		# Check Purchase Session.  If already purchased, do not go through with transaction
		#
		//if($_SESSION['purchase'] != "y")
		//{
		#
		#
		#############################################################################################
	
		////////////////////////////////////////////////////////////////////
		# PAYMENT PROCESSING
		////////////////////////////////////////////////////////////////////
		

		##<check credit card info>
		$ch=curl_init("https://www.eProcessingNetwork.Com/cgi-bin/tdbe/transact.pl"); //initiates cURL w/ protocol & URL of remote host
		curl_setopt($ch,CURLOPT_POST,1); //sets type normal POST request
		
		# if it isn't a check, then it is a credit card!
		if($IsCheck != "y")
		{# is check <> y
			// credit card processing ...................................
			// check to see whether to use shipping or billing address...
			if ($Same == "y")
			{
				$data = "ePNAccount=040358&CardNo=$CreditCardNo&ExpMonth=$ExpMonth&ExpYear=$ExpYear
				&Total=$TotalCost&Address=$Address&Zip=$ZipCode
				&CVV2Type=1&CVV2=$CVV2&HTML=No";
			}
			else
			{
				$data = "ePNAccount=040358&CardNo=$CreditCardNo&ExpMonth=$ExpMonth&ExpYear=$ExpYear
				&Total=$TotalCost&Address=$AddressB&Zip=$ZipCodeB
				&CVV2Type=1&CVV2=$CVV2&HTML=No";
			}
			
		
			curl_setopt($ch,CURLOPT_POSTFIELDS,$data); //inputs field data to the transfer
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); //sets response to return as variable
			$response=curl_exec($ch); //traps response into $response var
			curl_close($ch); //closes cURL transfer
			##</check credit card info>
			
			$r = split(",",$response); //split response into array
			
			//remove quotes from around strings...
			$r[0] = substr($r[0],1,-1); // approval code
			$r[1] = substr($r[1],1,-1); //address information
			$r[2] = substr($r[2],1,-1); // CVV2 information

		} # end credit card data
		
		# now, if it is a check, make this data stream...
		else 
		{
			# change to capital first letter...
			if($AccountType == "checking"){$AccountClass = "Checking";}
			if($AccountType == "savings"){$AccountClass = "Savings";}
			
			// CHECK DATA processing ...................................
			// check to see whether to use shipping or billing address...
			if ($Same == "y")
			{
				$data = "ePNAccount=040358&PaymentType=Check&AccountType=P&AccountClass=$AccountClass&FirstName=$FirstName
				&LastName=$LastName&BankName=$BankName&Routing=$CheckRouting&CheckAcct=$CheckAccount&Check=$CheckNumber
				&Total=$TotalCost&Address=$Address&City=$City&State=$State&Zip=$ZipCode&Phone=$Phone&HTML=No";
			}
			else
			{
				$data = "ePNAccount=040358&PaymentType=Check&AccountType=P&AccountClass=$AccountClass&FirstName=$FirstNameB
				&LastName=$LastNameB&BankName=$BankName&Routing=$CheckRouting&CheckAcct=$CheckAccount&Check=$CheckNumber
				&Total=$TotalCost&Address=$AddressB&City=$CityB&State=$StateB&Zip=$ZipCodeB&Phone=$Phone&HTML=No";
			}
			
			curl_setopt($ch,CURLOPT_POSTFIELDS,$data); //inputs field data to the transfer
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); //sets response to return as variable
			$response=curl_exec($ch); //traps response into $response var
			curl_close($ch); //closes cURL transfer
			##</check credit card info>
			
			$r = split(",",$response); //split response into array
			
			//remove quotes from around strings...
			$r[0] = substr($r[0],1,-1); // approval code
				
		} # end Check data
			

		////////////////////////////////////////////////////////////////////
		# Now we have the approval Code, strip the Y, N, or U from beginning
		# of code to know what to do with it.
		////////////////////////////////////////////////////////////////////

		$auth=substr($r[0],0,1); //grabs the "Y" or "N" for approval
		
		# <if payment is approved>
if ($auth=="Y")
{# authotization = y
			$Code = substr($r[0],1,16); // take "Y" off beginning of code
			
			# only for credit card transactions... for a CHECK, these don't matter...
			$AVS = $r[1];
			$CVV2Code = $r[2];
		
		
		
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
				$Code = $PaypalNumber;
				}
			
			// substr( string, where to start in string, how far to go in string)
			$LastFourCr = substr($CreditCardNo, strlen($CreditCardNo) -4, 4);
			
			//now, the customer is in the customer table, we have their customerID....we have all the totals......INSERT order into tblPurchase...
			$sql = "INSERT INTO tblPurchase2(CustomerID, TestID, TestDate, ReferredByID, Discount, OrderDateTime, 
			ShipCostID, ShippingCost, PromotionCodeID, AffOfficeID, IP, SameAsShip, FirstNameB, LastNameB, AddressB, CityB, StateB, 
			OtherStateB, CountryIDB, ZipB, Paid, Status, Notes, PaypalNumber, InvoiceNumber, InvoiceDate, PONumber, Shipped, 
			CardType, LastFourCr, BankCode, AddressVerification, CVV2Verification, IsCheck, BankName, RoutingNumber, CheckNumber,
			ShipNotes, NovaPress, Preorder, Preordered, Subtotal, Tax)
			
			VALUES ('$CustomerID', '$TestID', '$TestDate', '$ReferredByID', '$Discount', '$OrderDateTime', '$ShipCostID', '$ShippingCost', 
			'$PromotionCodeID', '$AffOfficeID', '$IP', '$Same', '$FirstNameB', '$LastNameB', '$AddressB', '$CityB', '$StateB',  '$OtherStateB',
			'$CountryID', '$ZipCodeB', '$Paid', '$Status', '$Notes', '$PaypalNumber', '$InvoiceNumber', '$InvoiceDate', '$PONumber', '$OrderShipped',
			'$CardType', '$LastFourCr', '$Code', '$AVS', '$CVV2Code', '$IsCheck', '$BankName', '$CheckRouting', '$CheckNumber',
			'$ShipNotes', '$NovaPress', '$Preorder', '$Preordered', '$Subtotal', '$Tax')";

			mysql_query($sql) or die("Cannot insert purchase2, please try again.");
		

			//now, get purchase ID for this puchase, and enter info into tblPurchaseDetails......
			$sql = "SELECT PurchaseID FROM tblPurchase2 WHERE CustomerID = '$CustomerID' AND IP = '$IP' AND OrderDateTime = '$OrderDateTime'";
			$result = mysql_query($sql) or die("Cannot get Purchase ID, please try again.");
					
			while($row = mysql_fetch_array($result))
			{
				$PurchaseID = $row[PurchaseID];
			}


			$PromoStartDate = date("Y-m-d");
			
			$PromoStartDay = date("d");
			$PromoStartMonth = date("m");
			$PromoStartYear = date("Y");
			
			$PromoEndMonth = $PromoStartMonth + 3;
			$PromoEndYear = $PromoStartYear;
			$PromoEndDay = $PromoStartDay;
			
			if($PromoStartMonth == "11") 
			{ $PromoEndMonth = "02"; 
				$PromoEndYear = "2007"; }
			
			if($PromoStartMonth == "12") 
			{ $PromoEndMonth = "03"; 
				$PromoEndYear = "2007";}
			
			if($PromoStartMonth == "10") 
			{ $PromoEndMonth = "01"; 
				$PromoEndYear = "2007";}


			/*if($PromoStartMonth == "12")
			{
				$PromoEndMonth = "01";
				$PromoEndYear = $PromoStartYear + 1;
			}
			*/
			
			$TodayDate = date("Y-m-d");
			
			$PromoEndDate = "$PromoEndYear-" . "$PromoEndMonth-" . "$PromoEndDay";

			$sql8 = "INSERT INTO tblPromotionCode(PromotionCodeID, PromotionID, StartDate, EndDate, Amount, Local, DateCreated, Type)
			VALUES('$CustomerID', 'percent', '$PromoStartDate', '$PromoEndDate', '0.05', 'n', '$TodayDate', 'friend');";
			//echo $sql8;
			$result8 = mysql_query($sql8) or die("Cannot create promotion code ID");

		
		if($Quantity1 <> '')
		{	
			
			// Insert into purchase details table
			$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Shipped, Status) 
			VALUES ('$PurchaseID', '$Product1', '$Quantity1', '$PurchasePrice1', '$EbayItemNumber1', '$Shipped1', '$Status1');";
			mysql_query($sql) or die("Cannot Insert Purchase Details1 information, try again!");
			
			$sql2 = "UPDATE tblProductNew SET WebInventory = WebInventory - $Quantity1 WHERE ProductID = '$Product1'";
			$result2 = mysql_query($sql2) or die("Cannot update WebInventory 1");
			
		}
		
		if($Quantity2 <> '')
		{	
		
			// Insert into purchase details table
			$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Shipped, Status) 
			VALUES ('$PurchaseID', '$Product2', '$Quantity2', '$PurchasePrice2', '$EbayItemNumber2', '$Shipped2', '$Status2');";
			mysql_query($sql) or die("Cannot Insert Purchase Details2 information, try again!");
			
			$sql2 = "UPDATE tblProductNew SET WebInventory = WebInventory - $Quantity2 WHERE ProductID = '$Product2'";
			$result2 = mysql_query($sql2) or die("Cannot update WebInventory 2");
		}

		if($Quantity3 <> '')
		{	
		
			// Insert into purchase details table
			$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Shipped, Status) 
			VALUES ('$PurchaseID', '$Product3', '$Quantity3', '$PurchasePrice3', '$EbayItemNumber3', '$Shipped3', '$Status3');";
			mysql_query($sql) or die("Cannot Insert Purchase Details3 information, try again!");
			
			$sql2 = "UPDATE tblProductNew SET WebInventory = WebInventory - $Quantity3 WHERE ProductID = '$Product3'";
			$result2 = mysql_query($sql2) or die("Cannot update WebInventory 3");
						
		}
		
		if($Quantity4 <> '')
		{	
		
			// Insert into purchase details table
			$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Shipped, Status) 
			VALUES ('$PurchaseID', '$Product4', '$Quantity4', '$PurchasePrice4', '$EbayItemNumber4', '$Shipped4', '$Status4');";
			mysql_query($sql) or die("Cannot Insert Purchase Details4 information, try again!");
			
			$sql2 = "UPDATE tblProductNew SET WebInventory = WebInventory - $Quantity4 WHERE ProductID = '$Product4'";
			$result2 = mysql_query($sql2) or die("Cannot update WebInventory 4");
						
		}
	


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
		
			$mail = new PHPMailer();
			
			$mail->From = "info@silenttimer.com";
			$mail->FromName = "The SilentTimer.com Team";
			$mail->AddAddress("$Email", "$FirstName $LastName");
			$mail->AddBCC("nina@silenttimer.com", "Silent Timer Orders");
			//$mail->AddBCC("erik@silenttimer.com", "Silent Timer Orders");
			#$mail->AddAttachment("Guide/Time Management Guide.pdf");
			$mail->IsHTML(true);
			$mail->Subject = "Your SilentTimer.com Receipt";
		
		
			if($State == "ZZ"){$State = $State_Other;}
			if($StateB == "ZZ"){$StateB = $State_OtherB;}
		
			$GrandTotal = number_format($TotalCost,2);
		
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
			  <p><font size='2' face='Arial, Helvetica, sans-serif'><a href='http://www.silenttimer.com/order/guide/ST_TimeManGuide_061405.pdf' target='_blank'>Click
			        here</a> to
			      download<em> &quot;The
			        Silent Timer Time Management Guide</em>&quot;. It is in PDF format,
			        and gives you some valuable pointers for how to use your
			        timer during practice and on test day. If you have trouble
			        downloading it, please email us at <a href='mailto:info@silenttimer.com?subject=Time%20Management%20Guide%20Help'>info@silenttimer.com</a>.</font></p>
			  <p><font size='2' face='Arial, Helvetica, sans-serif'>You can also log in
			      to our web site and check the status of your order, view your
			      order history,  get downloads, and refer friends to earn money. Go to <a href='http://www.silenttimer.com/customerservice/'>http://www.silenttimer.com/customerservice/</a>		      and fill in your information.</font></p>
			  <p><strong><font size='2' face='Arial, Helvetica, sans-serif'>Order Number: 
				</font></strong> <font color='#000099' size='2' face='Arial, Helvetica, sans-serif'><strong>$PurchaseID</strong></font></p>
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
						<tr><td><font size='2' face='Arial, Helvetica, sans-serif'>Qty</font></td>
						<td><font size='2' face='Arial, Helvetica, sans-serif'>Product</font></td>
						<td><font size='2' face='Arial, Helvetica, sans-serif'>Price</font></td>
						<td><font size='2' face='Arial, Helvetica, sans-serif'>Total</font></td>
						</tr>";
					
					
					#Insert into Product Details
													
					# Get all information from table for this part number ID
					$sql = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Status <> 'cancel'";
					$result = mysql_query($sql) or die("Cannot get PurchaseDetails Information.  Please try again. <br>$sql<br>");
	
					while($row = mysql_fetch_array($result))
					{
						$ProductID = $row[ProductID];
						$OnlinePrice = number_format($row[PurchasePrice],2);
						$Quantity = $row[Quantity];
						$ProductTotal = $OnlinePrice*$Quantity;
						$ProductTotal = number_format($ProductTotal, 2);
						
								
								$sql2 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
								$result2 = mysql_query($sql2) or die("Cannot get product info.");
								while($row2 = mysql_fetch_array($result2))
								{
						
									$Description = $row2[Description];
									$ProductName = $row2[ProductName];
								
					$html .= " <tr>
					<td><font size='2' face='Arial, Helvetica, sans-serif'>$Quantity</font></td>
					<td><font size='2' face='Arial, Helvetica, sans-serif'><b>$ProductName</font></td>
					<td><font size='2' face='Arial, Helvetica, sans-serif'>$$OnlinePrice</font></td>					
					<td><font size='2' face='Arial, Helvetica, sans-serif'>$$ProductTotal</font></td>					
					</tr>";
					//$OrderTotal += $ProductTotal;
				#end if	
				}
				}
					$html .= "<tr><td colspan='3'><font size='2' face='Arial, Helvetica, sans-serif'>Subtotal</font></td><td><font size='2' face='Arial, Helvetica, sans-serif'>$$Subtotal</font></td></tr>
					<tr><td colspan='3'><font size='2' face='Arial, Helvetica, sans-serif'>Tax</font></td><td><font size='2' face='Arial, Helvetica, sans-serif'>$$Tax</font></td></tr>";
					if ($Discount != 0){ $html .= "<tr><td colspan='3'><font size='2' face='Arial, Helvetica, sans-serif'>Discount</font></td><td><font size='2' face='Arial, Helvetica, sans-serif'>-$$Discount</font></td></tr>";}
					$html .= "<tr><td colspan='3'><font size='2' face='Arial, Helvetica, sans-serif'>Shipping Cost</font></td><td><font size='2' face='Arial, Helvetica, sans-serif'>$$ShippingCost</font></td></tr>
					<tr><td colspan='3'><font size='2' face='Arial, Helvetica, sans-serif'>Grand Total</font></td><td><font size='2' face='Arial, Helvetica, sans-serif'>$$TotalCost</font></td></tr></table>";
		
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
				<td><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'> $$ShippingCost</font></div> </td>
		</tr>
		</table>";
		
		
		$html .= " 
			</td>
		  </tr>
		</table>
		";
		
		if($ShipperID == "6") 
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



			$mail->Body = $html;
			
			if(!$mail->Send())
			{
			   echo "Email receipt could not be sent.<p>";
			   echo "Mailer Error: " . $mail->ErrorInfo;
			   exit;
			}
			

		$mail = new PHPMailer();
			
		$mail->From = "$Email";
		$mail->FromName = "Timer Order";
		$mail->AddAddress("nina@silenttimer.com", "Silent Technology");
		$mail->AddAddress("erik@silenttimer.com", "Erik McMillan");
		$mail->IsHTML(false);
		$mail->Subject = "Phone Order $PurchaseID: $FirstName $LastName spent $$TotalCost!";
		
		$DetailedEmail =
		"
		Order Details ----------------------------
		
		Shipping:		$Shipper
		Type:			$TypeDisplay
		Shipping Cost:	$ShippingCost
		
		";
					# Get all information from table for this part number ID
					$sql = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Status <> 'cancel'";
					$result = mysql_query($sql) or die("Cannot get PurchaseDetails Information.  Please try again. <br>$sql<br>");
	
					while($row = mysql_fetch_array($result))
					{
						$ProductID = $row[ProductID];
						$OnlinePrice = number_format($row[PurchasePrice],2);
						$Quantity = $row[Quantity];
						$ProductTotal = $OnlinePrice*$Quantity;
						$ProductTotal = number_format($ProductTotal, 2);
						
								
								$sql2 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
								$result2 = mysql_query($sql2) or die("Cannot get product info.");
								while($row2 = mysql_fetch_array($result2))
								{
						
									$Description = $row2[Description];
									$ProductName = $row2[ProductName];
								}

		$DetailedEmail .= "
		
		Product: $ProductName  
		Number Ordered: $Quantity					
		Price: $$OnlinePrice					
		Product Total: $$ProductTotal
		
		";
					
				#end if	
				}
	
		
		$DetailedEmail .= 
		"		
		Subtotal:          $Subtotal
		Tax:               $Tax
		Discount:		  -$Discount
		Shipping Cost:     $ShippingCost
		Total Spent:       $TotalCost
		
		Promotion Details -----------------------
		
		PromotionID:       $PromotionID
		Promotion Notes:   $promoNotes
		
		Personal Information --------------------
		
		Test Name:         $TestName
		Test Date:         $TestDate
		School:            $School
		Prep Class:        $PrepClass
		Referred By:       $ReferredBy
		
		Shipping Information --------------------
		
		$FirstName $LastName
		$Address $Address2
		$City, $State $ZipCode
		$CountryName
		
		Phone:             $Phone
		Email:             $Email
		
		Billing Information ---------------------
		
		$FirstNameB $LastNameB
		$AddressB
		$CityB, $StateB $ZipCodeB
		$CountryNameB
		
		CREDIT Information ----------------------
		
		Card Type:         $CardType
		Number:            *$LastFourCr
		Epiration Date:    $ExpMonth / $ExpYear
		
		Sign Contract?     $Contract
		
		CHECK Information ----------------------
		
		Paid By Check?:    $IsCheck
		Bank Name:         $BankName
		Routing Number:    $CheckRouting
		Check Number:      $CheckNumber
		
		Web Affiliate Data ----------------------
		
		AffiliateID:       $affiliateID
		Total Commission:  $rate
		
		Person Affiliate Data -------------------
		
		AffilateID:        $AffiliatePromotion
		Total Commission:  $ThisCommission
		Sale Number:       $NewAffNum
		Commission Rate:   $ThisRate
		";
		
			$mail->Body = $DetailedEmail;
			
			if(!$mail->Send())
			{
			   echo "Email receipt could not be sent to support team.<p>";
			   echo "Mailer Error: " . $mail->ErrorInfo;
			   exit;
			}



//mail("$Email, info@silenttimer.com", "Your Silent Timer Order", "Silent Timer Order Receipt: Order #$PurchaseID\n\n$FirstName, thank you for your order!\n\nIt has been input into our system for shipment. When your order has been shipped, you will receive an email with your tracking number. Download The Silent Timer Time Management Guide at http://www.silenttimer.com/order/guide/ST_TimeManGuide_061405.pdf to further help you in your timing.\n\nIf you have any questions or need help, please email us at info@silenttimer.com. We will be glad to help you!\n\nGood luck!\nThe Silent Timer Team\n1-800-552-0325\nwww.SilentTimer.com", "From:The Silent Timer Team<info@silenttimer.com>");

			
			
			
			}#end of payment is approved

			
			# Register a session for the Purchase.  #
			# This way if the page is refreshed they won't be charged TWICE! #
			//session_register('purchase');
			//$_SESSION['purchase'] = "y";
			
		//$goto = "NotShippedView.php";
		//header("location: $goto");

		
		else # shite, your card was declined mo' fo'.........
		{
	?>		
			
<p><font color="#FF0000" size="5" face="Arial, Helvetica, sans-serif"><strong>Payment 
  Problem</strong></font></p>
			<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>There has been
      a problem charging the account. You might have accidentally entered your
      incorrect billing information, such as <font color="#FF0000">address</font> and <font color="#FF0000">zip
       code</font>. Also, make sure you enter the correct <font color="#FF0000">CVV2</font> 
  number on the form for credit card orders, this verifies your identity.</strong></font></p>
			
<p>&nbsp;</p>
<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			
	<?
// ------- Order Declined, send notification to us with their email and name.
mail("info@silenttimer.com", "Declined Order", 
"
$Now

$FirstName $LastName tried to ordered a timer.
Email: $Email
Phone: $Phone

SHIPPING

$Address
$City, $State $ZipCode

BILLING

$FirstNameB $LastNameB
$AddressB
$CityB, $StateB $ZipCodeB

Card: $CardType
Expiration: $ExpMonth, $ExpYear

TEST

Test: $Test
Test Date: $TestDate
School: $School
Prep Class: $PrepClass

Referred By: $ReferredBy

", "From:$FirstName $LastName<$Email>");
			
				}

		}#end of receipt
		
					
		
	} #end of add button being pushed
		
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


	// this code hides and shows content on the page like the check ordering info...
	function visible(content)
	{
	  if (document.getElementById(content).style.display == "none") {
		document.getElementById(content).style.display = "";
		return true;
	  } else {
		document.getElementById(content).style.display = "none";
		return true;
	  }
	}



</script>


<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
      a  Phone Order</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&gt;
      <a href="Order_Phone.php">Process order without charging card</a></font></p>
<form name="form1" method="post" action="">
  <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; Customer
  Information</font></strong></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Company
      Name</strong></font></td>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="CompanyName" type="text" id="FirstName2" size="30">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>First
      Name</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="FirstName" type="text" id="FirstName2" size="30">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Last
      Name</strong></font></td>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="LastName" type="text" id="LastName2" size="30">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Address</strong></font></td>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Address" type="text" id="Address" size="35" maxlength="30">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Address
      2 </strong></font></td>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Address2" type="text" id="Address2" size="35" maxlength="30">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>City</strong></font></td>
      <td colspan="2"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
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
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>State
      Other </strong>
          <input name="StateOther" type="text" id="StateOther" size="20">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip
      Code</strong></font></td>
      <td colspan="2"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="ZipCode" type="text" id="ZipCode3" size="11" maxlength="10">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Country</strong></font></td>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
          
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
		  
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Phone
      Number</strong></font></td>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Phone" type="text" id="Phone" size="20">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Email
      Address</strong></font></td>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Email" type="text" id="OrderEmail3" size="45" maxlength="50">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Fax</strong></font></td>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Fax" type="text" id="Fax" size="20">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>eBay/Amazon
      Name </strong></font></td>
      <td colspan="2"><input name="EbayName" type="text" id="EbayName3" size="30"></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>School</strong></font></td>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="School" type="text" id="School22">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Prep Class
            <a href="PrepClass.php" target="_blank"><font size="1">VIEW LIST</font></a></strong></font></td>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="PrepClass" type="text" id="PrepClass22">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Type</strong></font></td>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
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
					$sql = "SELECT * FROM tblProductNew ORDER BY Nickname ASC";
					
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
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Shipped1" id="select3">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
      </font> <font size="2" face="Arial, Helvetica, sans-serif">&nbsp; </font></td>
      <td><input name="EbayItemNumber1" type="text" id="EbayItemNumber1" size="12"></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Status1" class="text" id="select7">
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT Status FROM tblPurchaseDetails2
						GROUP BY Status ORDER BY Status ASC";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[Status];?>" <? if($row[Status] == "active"){echo "selected";}?>><? echo $row[Status];?></option>
          <?
						}
					?>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product2" tabindex="" id="Product2" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew ORDER BY Nickname ASC";
					
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
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Shipped2" id="select4">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
      </font></td>
      <td><input name="EbayItemNumber2" type="text" id="EbayItemNumber2" size="12"></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Status2" class="text" id="select8">
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT Status FROM tblPurchaseDetails2
						GROUP BY Status ORDER BY Status ASC";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[Status];?>" <? if($row[Status] == "active"){echo "selected";}?>><? echo $row[Status];?></option>
          <?
						}
					?>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product3" tabindex="" id="Product3" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew ORDER BY Nickname ASC";
					
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
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Shipped3" id="select5">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
      </font></td>
      <td><input name="EbayItemNumber3" type="text" id="EbayItemNumber3" size="12"></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Status3" class="text" id="select9">
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT Status FROM tblPurchaseDetails2
						GROUP BY Status ORDER BY Status ASC";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[Status];?>" <? if($row[Status] == "active"){echo "selected";}?>><? echo $row[Status];?></option>
          <?
						}
					?>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product4" tabindex="" id="Product4" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew ORDER BY Nickname ASC";
					
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
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Shipped4" id="select6">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
      </font></td>
      <td><input name="EbayItemNumber4" type="text" id="EbayItemNumber4" size="12"></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Status4" class="text" id="select10">
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT Status FROM tblPurchaseDetails2
						GROUP BY Status ORDER BY Status ASC";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[Status];?>" <? if($row[Status] == "active"){echo "selected";}?>><? echo $row[Status];?></option>
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
        <select name="Status" class="text" id="select2">
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT Status FROM tblPurchase2
						GROUP BY Status ORDER BY Status ASC";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[Status];?>" <? if($row[Status] == "active"){echo "selected";}?>><? echo $row[Status];?></option>
          <?
						}
					?>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Entire order
            shipped? </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(y/n/p)</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="OrderShipped" id="OrderShipped">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Currently
            on Preorder?</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> (only &quot;y&quot; if
            currenlty a preorder, once it is ready to ship, it is a &quot;n&quot;)</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Preorder" id="Preorder">
          <option value="y"<? if($Preorder == "y") { ?> selected<? } ?>>y</option>
          <option value="n" selected<? if($Preorder == "n") { ?> selected<? } ?>>n</option>
        </select>
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Originally
            preordered?</font></strong><font size="2" face="Arial, Helvetica, sans-serif"> (if
            it ever was a preorder, then this stays &quot;y&quot;)</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Preordered" id="Preordered">
          <option value="y"<? if($Preordered == "y") { ?> selected<? } ?>>y</option>
          <option value="n" selected<? if($Preordered == "n") { ?> selected<? } ?>>n</option>
        </select>
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
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>
      <input name="ShipCostID" type="text" id="ShipCostID" size="10">
      </strong></font></td>
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
      <td><font size="2" face="Arial, Helvetica, sans-serif">
          <select name="Paid" id="Paid">
            <option value="y" selected>y</option>
            <option value="n">n</option>
          </select>
      </font></td>
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
      <td><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif">
      <select name="Same" id="select">
        <option value="y" selected>y</option>
        <option value="n">n</option>
      </select>
      </font><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
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
  <p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt; Billing
        Information</strong></font></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>First
            Name</strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="FirstNameB" type="text" id="FirstNameB" size="30">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Last
            Name</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="LastNameB" type="text" id="LastNameB" size="30">
      </font></td>
    </tr>
    <tr>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Address</strong></font></td>
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
  <p>&nbsp;</p>
  
  <table width="100%" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="48%"><font color="#000099" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt; Payment Options </strong></font></td>
      <td width="52%"><div align="right"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif">
        <input name="chkCheckPay" type="checkbox" id="chkCheckPay" value="y" onClick="visible('check'); visible('credit');" <? if($IsCheck =="y"){echo "checked";}?>>          
        <strong><font size="3">Want to Pay by Check? </font></strong><font color="#333333"><em>Check 
          here.</em></font></font></div></td>
    </tr>
  </table>
  
  <div style="display:<? if($IsCheck == "y"){echo "none";}?>" id = "credit"> 
  
    <table width="100%" border="0" cellpadding="2" cellspacing="0" bordercolor="#000099">
      <tr>
      <td align="left" valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td bgcolor="#000099"><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong> 
              Credit Card</strong></font> </td>
          </tr>
		  <tr><td><div align="right"></div></td></tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr align="left" valign="top"> 
            <td width="27%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Card 
              Type <font color="#FF0000">*</font></strong></font> <font size="2" face="Arial, Helvetica, sans-serif"><br>
              <select name="cboCardType" tabindex="1" id="cboCardType">
                <option value="0" selected>Select</option>
                <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql = "SELECT * FROM tblCreditCard";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot execute query!");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                <option value="<? echo $row[CardID]; ?>"><? echo $row[CardName]; ?></option>
                <?
					}
				?>
              </select>
</font></td>
            <td width="32%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Card 
              Number <font color="#FF0000">*</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
              <font color="#999999">(no spaces)</font><br>
              <input name="txtCreditCardNo" tabindex="2" type="text" id="txtCreditCardNo">
</font></td>
            <td width="41%"><p><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Expiration 
                Date <font color="#FF0000">*</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                <select name="cboExpMonth" tabindex="3" id="select5">
                  <option value="1" selected>01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
                <? $year = date("Y"); ?>
                <? $year2 = date("y"); ?>
                <select name="cboExpYear" tabindex="4" id="cboExpYear">
                  <option value="<? echo $year2; ?>" selected><? echo $year; ?></option>
                  <?
			  //this year plus 15 years... go into a loop.
			  $x = 1;
			  while ($x <= 10)
			  {
			  		$year = $year + 1;
					$year2 = $year2 + 1;	
		      ?>
                  <option value="<? if($year2<10){$year2 = "0$year2";} echo $year2; ?>"><? echo $year; ?></option>
                  <? 
		  	  		$x = $x + 1;
			  } 
		      ?>
                </select>
                </font></p></td>
          </tr>
          <tr align="left" valign="top"> 
            <td colspan="3"><TABLE WIDTH=100% BORDER=0 cellpadding=0 cellspacing=0>
                  <TR> 
                    <TD width="25%" ALIGN=RIGHT valign="top"> <div align="left"> 
                        <p><font face="Arial, Helvetica, sans-serif"><B><font color="#000033" size="2">CVV2 
                          # <font color="#FF0000">*</font></font></b><font color="#FF0000">&nbsp;</font> <br>
                          <INPUT NAME="txtCVV2" tabindex="5" TYPE="text" id="txtCVV2" SIZE="5" maxlength=4>
                        </FONT></p>
                        <font size="2" face="Arial, Helvetica, sans-serif"><b><a href="#" onClick="MM_openBrWindow('cvv2.php','','scrollbars=yes,width=640,height=480')">What
                        is CVV2?</a></b></font> </div>
                    </TD>
                    <TD width="75%" ALIGN=RIGHT valign="bottom">
<div align="right"><font color="#333333" size="2" face="Arial, Helvetica, sans-serif"><strong><em>Pay 
                        with your checking account by clicking box above </em></strong></font><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">(USA 
                        only)</font><font color="#333333" size="2" face="Arial, Helvetica, sans-serif"><strong><em>. 
                        </em> </strong></font></div></TD>
                  </TR>
                </TABLE></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  
  </div>
  
  <div style="<? if($IsCheck == "y"){echo "display:";}else{echo "display:none";}?>" id = "check">
  
    <table width="100%" border="0" cellpadding="2" cellspacing="0" bordercolor="#000099">
      <tr> 
      <td align="left" valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
              <td width="38%" bgcolor="#000099"><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong>
                eCheck</strong></font> <font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">(USA 
                Orders only)</font></td>
            </tr>
		  <tr>
		  <td width="62%"><div align="right"></div></td>
      
		  </tr>
        </table>
     
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr align="left" valign="top"> 
              <td width="35%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Bank 
                Name <font color="#FF0000">*</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                &nbsp;&nbsp;&nbsp; 
                <input name="txtBankName" tabindex="6" type="text" id="txtBankName" size="20">
              </font></td>
              <td width="34%" valign="top">                <font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Account 
                Type <font color="#FF0000">*</font></strong></font><br> 
                <table width="100%" border="0" cellspacing="0" cellpadding="4">
                  <tr> 
                    <td width="46%"><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input name="AccountType" tabindex="7" type="radio" value="checking" checked>
                      Checking </font></td>
                    <td width="54%"><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input type="radio" tabindex="8" name="AccountType" value="savings" <? if($AccountType == "savings"){echo "checked";}?>>
                      Savings</font></td>
                  </tr>
              </table></td>
              <td width="31%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
            </tr>
            <tr align="left" valign="top"> 
              <td colspan="3"><TABLE WIDTH=100% BORDER=0 cellpadding=0 cellspacing=0>
                  <TR> 
                    <TD width="35%" ALIGN=RIGHT valign="top"> <div align="left"> 
                        <p><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Routing 
                          Number<font color="#FF0000"> *</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                          <input name="txtCheckRouting" tabindex="9" type="text" id="txtCheckRouting2" size="15">
                        </font></p>
                        <font size="2" face="Arial, Helvetica, sans-serif"></font></div>
                    </TD>
                    <TD width="34%" ALIGN=RIGHT valign="top"><div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Account 
                        Number <font color="#FF0000">*</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                        <input name="txtCheckAccount" tabindex="10" type="text" id="txtCheckAccount2" size="15">
                        </font></div></TD>
                    <TD width="31%" ALIGN=RIGHT valign="top"> 
                      <div align="left"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Check 
                        Number<font color="#FF0000"> *</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                        <input name="txtCheckNumber" tabindex="11" type="text" id="txtCheckNumber2" size="6">
                      </font></div></TD>
                  </TR>
                </TABLE></td>
            </tr>
          </table></td>
    </tr>
  </table>
  
  </div>
  
  <? /*
  
  <p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt; Credit
  Card Information</strong></font></p>
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
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
      <input name="BankCode" type="text" id="BankCode5" value="AUTH/TKT " size="50">
</strong> </font></td>
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
  <p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt; Check
  Information</strong></font></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Is it a
            check?</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="IsCheck" id="IsCheck">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
      </font></td>
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
  
  */ ?>
  
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

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
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