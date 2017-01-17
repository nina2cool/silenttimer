<?
//security for page
session_start();

$PageTitle = "The Silent Timer - Order Receipt";

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

# ------------------------------------------------------------------------------------------------------------
#  Check for Affiliate Custom Order Configurations.  If they have their account set up this way, then put their
#  page around the order page, and alter page properties to make it look good and work flawlessly...
# ------------------------------------------------------------------------------------------------------------

	$affiliateID = $_GET['a'];
	
	# in case a form is used to POST
	if($affiliateID == "")
	{
		$affiliateID = $_POST['a'];
	}

	# Check to see if this affiliate has provided their code for the page...
	
	if($affiliateID != "")
	{		
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		$sql = "SELECT TopCode, BottomCode FROM tblAffCustomPage INNER JOIN tblAffiliate 
				ON tblAffCustomPage.AffiliateID = tblAffiliate.AffiliateID 
				WHERE tblAffCustomPage.AffiliateID = '$affiliateID' AND tblAffiliate.Custom = 'y'";
				
		$result = mysql_query($sql) or die("Cannot pull custom order code.  Please try again.");
						
		while($row = mysql_fetch_array($result))
		{
			$Custom = "yes";
			$TopCode = $row[TopCode];
			$BottomCode = $row[BottomCode];
		}
		
		mysql_close($link);
	}

# ------------------------------------------------------------------------------------------------------------
#  END check Affiliate info...
# ------------------------------------------------------------------------------------------------------------

	// if not coming from the confirm page... send them back to order page...
	if ($_POST['order4'] != "yes")
	{
		$goto = "order4test.php";
		if($Custom== "yes"){$goto.="?a=$affiliateID";}
		header("location: $goto");
	}


//only require this if the affiliate doesn't have a custom order page...
if($Custom == "yes")
{
	# put a special top header to track clicks here...
	require "include/headertopcustom.php";
	
	# put custom page info around our order page...
	echo $TopCode;
	
	# put code for calendar pop up...
	require "include/headertopcustomJS.php";
}
else
{
	// has top header in it.
	require "include/headertop.php";

	// has top menu for this page in it, you can change these links in this folders include folder.
	require "../include/topmenu.php";
	
	// has bottom header in it, ths goes under the top menu for this page.
	require "include/headerbottom.php";
}


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
# link to Database...
			$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
			mysql_select_db($db) or die("Cannot select Database");		

?>

<?
	# --------------------------------------------------------------------------------------------
	#   Function to insert back slashes into characters with a single or a double quote in them.
	# --------------------------------------------------------------------------------------------
	function addQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("\'","'",$var);
			$string = str_replace('\"','"',$string);
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

	
	function escapeQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("\'","||",$var);
			$string = str_replace('\"','||||',$string);
		}

		return $string;
	}
	function escapePound($var)
	{
		if (isset($var))
		{
			$string = str_replace("#","NUM",$var);
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
	#<Confirm button being pushed>
	if ($_POST['ConfirmButton'] == "Pressed")
	{
		
		
		// get all variables sent from page  ----------------------->>>>>>		
		$ShipCostID = $_POST['ShipCostID'];
		$Discount = $_POST['Discount'];
		$Total = $_POST['Total'];
		$TaxTotal = number_format($_POST['TaxTotal'],2);
		$ShipCost = $_POST['ShipCost'];
		$GrandTotal = $_POST['GrandTotal'];
		
		$FirstName = dbQuote($_POST['txtFirstName']);
		$LastName = dbQuote($_POST['txtLastName']);
		$Address = dbQuote($_POST['txtAddress']);
		$Address2 = dbQuote($_POST['txtAddress2']);
		$City = dbQuote($_POST['txtCity']);
		$State = $_POST['txtState'];
		$State_Other = dbQuote($_POST['txtState_Other']);
		$ZipCode = $_POST['txtZipCode'];
		$Country = $_POST['txtCountry'];
		$CountryName = $_POST['CountryName'];
		$ForeignShipping = $_POST['ForeignShipping'];
			
		$Phone = $_POST['txtPhone'];
		$Email = $_POST['txtEmail'];
			
		$Same = $_POST['chkSame'];
		$FirstNameB = dbQuote($_POST['txtFirstNameB']);
		$LastNameB = dbQuote($_POST['txtLastNameB']);
		$AddressB = dbQuote($_POST['txtAddressB']);
		$CityB = dbQuote($_POST['txtCityB']);
		$StateB = $_POST['txtStateB'];
		$State_OtherB = dbQuote($_POST['txtState_OtherB']);
		$ZipCodeB = $_POST['txtZipCodeB'];
		$CountryB = $_POST['txtCountryB'];
		$CountryNameB = $_POST['CountryNameB'];
			
		$CardType = $_POST['cboCardType'];
		$CreditCardNo = $_POST['txtCreditCardNo'];
		$ExpMonth = $_POST['cboExpMonth'];
		$ExpYear = $_POST['cboExpYear'];
		$CVV2 = $_POST['txtCVV2'];
		
		// -- check info -- ##
		$isCheck = $_POST['chkCheckPay'];
		$BankName = $_POST['txtBankName'];
		$AccountType = $_POST['AccountType'];
		$CheckRouting = $_POST['txtCheckRouting'];
		$CheckAccount = $_POST['txtCheckAccount'];
		$CheckNumber = $_POST['txtCheckNumber'];
			
		$Test = $_POST['cboTest'];
		if($Test == ""){$Test = "0";} #fixes integer problem for test being blank if none is selected.		
		$TestDate = $_POST['txtTestDate'];
		$School = dbQuote($_POST['txtSchool']);
		$PrepClass = dbQuote($_POST['txtPrepClass']);
		$PrepClass2 = dbQuote($_POST['txtPrepClass2']);
		if ( $PrepClass2 != "Other")
		{
			$PrepClass = $PrepClass2;
		}
		
		if ($PrepClass2 == "None")
		{
			$PrepClass = "";
		}
		$ReferredByID = $_POST['cboReferredBy'];
		
		
		$PromotionID = $_POST['txtPromotion'];
		$promoNotes = $_POST['txtPromoNotes'];
		
		if($promoNotes == "Invalid Code"){$PromotionID = "";} // if there was an invalid code entered... delete it from the code here...
		
		$OfficeCode = $_POST['txtOfficeCode'];
		$officeNotes = $_POST['txtOfficeNotes'];
	
		$Contract = $_POST['Contract'];
		
		// get stuff from last page necessary for receipt...
		$ShippingCompany = $_POST['ShippingCompany'];
		$ShippingName = $_POST['ShippingName'];
		$ShippingCost = $_POST['ShippingCost'];
		$TestName = $_POST['TestName'];
		
		// get affiliate person code that was looked up from the promotion code on the last page.
		// if it isn't empty, then credit their account with the necessary funds.
		$AffiliatePromotion = $_POST['AffiliatePromotion'];
		
		#############################################################################################
		# Check Purchase Session.  If already purchased, do not go through with transaction
		#
			if($_SESSION['purchase'] != "y")
			{
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
		if($isCheck != "y")
		{

			// credit card processing ...................................
			// check to see whether to use shipping or billing address...
			if ($Same == "y")
			{
				$data = "ePNAccount=040358&CardNo=$CreditCardNo&ExpMonth=$ExpMonth&ExpYear=$ExpYear
				&Total=$GrandTotal&Address=$Address&Zip=$ZipCode
				&CVV2Type=1&CVV2=$CVV2&HTML=No";
			}
			else
			{
				$data = "ePNAccount=040358&CardNo=$CreditCardNo&ExpMonth=$ExpMonth&ExpYear=$ExpYear
				&Total=$GrandTotal&Address=$AddressB&Zip=$ZipCodeB
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
				&Total=$GrandTotal&Address=$Address&City=$City&State=$State&Zip=$ZipCode&Phone=$Phone&HTML=No";
			}
			else
			{
				$data = "ePNAccount=040358&PaymentType=Check&AccountType=P&AccountClass=$AccountClass&FirstName=$FirstNameB
				&LastName=$LastNameB&BankName=$BankName&Routing=$CheckRouting&CheckAcct=$CheckAccount&Check=$CheckNumber
				&Total=$GrandTotal&Address=$AddressB&City=$CityB&State=$StateB&Zip=$ZipCodeB&Phone=$Phone&HTML=No";
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
{
			$Code = substr($r[0],1,16); // take "Y" off beginning of code
			
			# only for credit card transactions... for a CHECK, these don't matter...
			$AVS = $r[1];
			$CVV2Code = $r[2];
			
				
		
			$now = date("Y-m-d H:i:s");
			$ip = $_SERVER["REMOTE_ADDR"];
		
			//check to see if customer already exists... if they don't add them..if they do, grab their CustomerID to use.
			$sql = "SELECT * FROM tblCustomer WHERE FirstName='$FirstName' AND LastName = '$LastName' AND ZipCode = '$ZipCode' AND Email = '$Email'";
			$result = mysql_query($sql) or die("Cannot execute query");
						
			while($row = mysql_fetch_array($result))
			{
				$cID = $row[CustomerID];
			}
			
			//if there is no customer record for them, add them to customer table...
			if ($cID == "")
			{
				$sql = "INSERT INTO tblCustomer(FirstName, LastName, Address, Address2, City, State, StateOther, ZipCode, CountryID, Phone, Email, School, PrepClass)
						  VALUES ('$FirstName', '$LastName', '$Address', '$Address2', '$City', '$State', '$State_Other', '$ZipCode', '$Country', '$Phone', '$Email', '$School', '$PrepClass')";
				mysql_query($sql) or die("Cannot insert customer, please try again. $sql");
				
				//now, find out what their customerID is...
				$sql = "SELECT CustomerID FROM tblCustomer 
				WHERE FirstName= '$FirstName' AND LastName = '$LastName' AND Email = '$Email' AND 
				Phone = '$Phone' AND ZipCode = '$ZipCode'";
				$result = mysql_query($sql) or die("Cannot retrieve Customer ID, please try again.");
						
				while($row = mysql_fetch_array($result))
				{
					$cID = $row[CustomerID];
				}
				
			}
			else
			{
			// update customer info with new input
				$sql = "UPDATE tblCustomer
				SET Address = '$Address', 
				Address2 = '$Address2', 
				City = '$City', 
				State = '$State', 
				StateOther = '$State_Other',
				CountryID = '$Country',
				Phone = '$Phone',
				School = '$School', 
				PrepClass = '$PrepClass' 
				WHERE CustomerID = $cID ";
				mysql_query($sql) or die("Cannot update Customer, please try again. $sql");
			}
			
			if ($Discount == ""){$Discount = 0; }
	
			//now, the customer is in the customer table, we have their customerID....we have all the totals......INSERT order into tblPurchase...
			$sql = "INSERT INTO tblPurchase2(CustomerID, TestID, TestDate, ReferredByID, Tax, Subtotal,  Discount, OrderDateTime, 
			ShipCostID, ShippingCost, PromotionCodeID, AffOfficeID, IP, SameAsShip, FirstNameB, LastNameB, AddressB, CityB, StateB, 
			OtherStateB, CountryIDB, ZipB, Paid, Status)
			VALUES ($cID, '$Test', '$TestDate', '$ReferredByID', $TaxTotal, $Total, $Discount, '$now', '$ShipCostID', $ShipCost, 
			'$PromotionID', '$OfficeCode', '$ip', '$Same', '$FirstNameB', '$LastNameB', '$AddressB', '$CityB', '$StateB',  '$State_OtherB',
			'$CountryB', '$ZipCodeB', 'y', 'active')";
		
			mysql_query($sql) or die("Cannot insert purchase, please try again. $sql");
			
			//now, get purchase ID for this puchase, and enter info into tblPurchaseDetails......
			$sql = "SELECT PurchaseID FROM tblPurchase2 WHERE CustomerID = $cID AND IP = '$ip' AND OrderDateTime = '$now'";
			$result = mysql_query($sql) or die("Cannot get Purchase ID, please try again.");
					
			while($row = mysql_fetch_array($result))
			{
				$pID = $row[PurchaseID];
			}
			
			#Insert into Product Details
			for($i=0; $i < count($ShoppingCart); $i++)
			{
				
				if($ShoppingCart[$i][0] != "")
				{				
					# get current product from the cart...
					$ProductID = $ShoppingCart[$i][0];
					$Num_Ordered = $ShoppingCart[$i][1];
					$ProductWeight = $ShoppingCart[$i][2];
					
					 //Update the inventory level to the correct number of products!!!
					$sql = "UPDATE tblProductTest SET WebInventory = WebInventory - $Num_Ordered WHERE ProductID = $ProductID";
					mysql_query($sql) or die("Cannot update Inventory, please try again.");
					
					# Get all information from table for this part number ID
					$sql = "SELECT * FROM tblProduct WHERE ProductID='$ProductID'";
					$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
	
					while($row = mysql_fetch_array($result))
					{
						
						$RetailPrice = $row[RetailPrice];
						
					# end while	
					}
					$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, PurchasePrice, Quantity, Status)
					VALUES($pID, $ProductID, $RetailPrice, $Num_Ordered, 'active')";
					
					mysql_query($sql) or die("Cannot insert purchase details from shoppingcart array [$i], please try again.");
				#end if	
				}	
			#end for		
			}
			
			//////// AFFILIATE PROMOTION CODE, inserts this sale record into /////
			#		 tblAffiliatePurchase if an affiliate promotion code was used.
			
			# see if there was an affiliate promotion code
			if ($AffiliatePromotion != "")
			{				
				# get this affiliate's commission rate for current sales
				$sql = "SELECT Percent FROM tblAffiliate WHERE AffiliateID = '$AffiliatePromotion'";
				$result = mysql_query($sql) or die("Cannot get Partner Rate, please try again.");
						
				while($row = mysql_fetch_array($result))
				{
					#$rate = $row[Rate] * $Num; #rate times the number of units they ordered.
					$rate = $row[Percent] * $Total; #rate times product Subtotal
				}
				
				$rate2 = number_format($rate, 2);
				$rate3 = round($rate2,2);
				
				$sql = "INSERT INTO tblAffiliatePurchase(PurchaseID, AffiliateID, Commission, TotalSale, Status)
						VALUES ($pID, '$affiliateID', '$rate3', '$Total','open')";
						
				/* mysql_query($sql) or die("Cannot insert partner purchase, please try again.");
				
				# How many timers has this person already sold in this period?
				$sql = "SELECT COUNT(PurchaseID) AS dummynumber FROM tblAffiliatePurchase 
						WHERE AffiliateID = '$AffiliatePromotion' AND Status = 'open'";
				$result = mysql_query($sql) or die("Cannot get Partner Rate, please try again.");
				$NewAffNum = mysql_num_rows($result) + 1; # add 1 to total number of sales for this person...
				
				#Get rate for this sale number...
				if($NewAffNum < 10)
				{
					$NumRange = "Ten";
				}
				elseif($NewAffNum > 9 and $NewAffNum < 20)
				{
					$NumRange = "Twenty";
				}
				elseif($NewAffNum > 19 and $NewAffNum < 30)
				{
					$NumRange = "Thirty";
				}
				elseif($NewAffNum > 29 and $NewAffNum < 45)
				{
					$NumRange = "FortyFive";
				}
				elseif($NewAffNum > 44)
				{
					$NumRange = "Up";
				}
				
				# get this affiliate's commission rate for current sales
				$sql = "SELECT $NumRange AS Rate FROM tblAffPercent WHERE AffiliateID = '$AffiliatePromotion'";
				$result = mysql_query($sql) or die("Cannot get Partner Rate, please try again.");
						
				while($row = mysql_fetch_array($result))
				{
					$ThisRate = $row[Rate]; #rate for current level of sales
				}
				
				#calculate total commission for this sales amount
				$ThisCommission = $totalProduct * $ThisRate;
				
				# insert data into Affiliate Purchase Table
				$sql = "INSERT INTO tblAffiliatePurchase(PurchaseID, AffiliateID, Commission, TotalSale, Status)
						VALUES ($pID, '$AffiliatePromotion', '$ThisCommission', '$totalProduct','open')";
				mysql_query($sql) or die("Cannot insert partner promotion purchase, please try again."); */
			} 
			
			/////////////////////////////////////////////////////////////
			
			
			//////// affiliate code, inserts this sale record into /////
			#		 tblAffiliatePurchase if there is an affiliate 
			#  		 associated
			
			# see if session registered with name AND there is no affiliate promotion code used...
			if (session_is_registered('affiliate') and $AffiliatePromotion == "")
			{
				$affiliateID = $_SESSION['affiliate'];
				
				# get this affiliate's commission rate for current sales
				$sql = "SELECT Percent FROM tblAffiliate WHERE AffiliateID = '$affiliateID'";
				$result = mysql_query($sql) or die("Cannot get Partner Rate, please try again.");
						
				while($row = mysql_fetch_array($result))
				{
					#$rate = $row[Rate] * $Num; #rate times the number of units they ordered.
					$rate = $row[Percent] * $Total; #rate times product Subtotal
				}
				
				$rate4 = round($rate,2);
				
				$sql = "INSERT INTO tblAffiliatePurchase(PurchaseID, AffiliateID, Commission, TotalSale, Status)
						VALUES ($pID, '$affiliateID', '$rate4', '$Total','open')";

						
				mysql_query($sql) or die("Cannot insert partner purchase, please try again.");
			}
			
			/////////////////////////////////////////////////////////////
			
			
			//insert transaction info into tblPurchase2....
			
			// substr( string, where to start in string, how far to go in string)
			$LastFourCr = substr($CreditCardNo, strlen($CreditCardNo) -4, 4);
			
			//echo "$pID, $FirstNameB, $LastNameB, $AddressB, $CityB, $StateB, $ZipCodeB, $CardType, $LastFourCr, $Code, $AVS, $CVV2Code, $now";
			
			
			
		# if a credit card transaction... do this Purchase Details insert...
			if($isCheck <> "y")
			{
			
				$sql = "UPDATE tblPurchase2 
				SET CardType = '$CardType', 
				LastFourCr = $LastFourCr, 
				BankCode = '$Code', 
				AddressVerification= '$AVS', 
				CVV2Verification= '$CVV2Code', 
				IsCheck = 'n'
				WHERE PurchaseID = $pID";
			}
			# use this for a CHECK transaction
			else
			{
				$sql = "UPDATE tblPurchase2
				SET CardType = '$CardType', 
				LastFourCr = $LastFourCr, 
				BankCode = '$Code', 
				AddressVerification= '$AVS', 
				CVV2Verification= '$CVV2Code', 
				IsCheck = 'y', 
				BankName = '$BankName', 
				RoutingNumber = '$CheckRouting', 
				CheckNumber = '$CheckNumber'
				WHERE PurchaseID = $pID";
			}
			
			
			//echo "$sql<br>";
			mysql_query($sql) or die("Cannot insert Purchase Transaction Details, please try again. <br><br>$sql");
	#------------------------------------------
	#-------------------------------------------	
			
				////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
				$FirstName = addQuote($FirstName);
				$LastName = addQuote($LastName);
				$Address = addQuote($Address);
				$City = addQuote($City);
				$State_Other = addQuote($State_Other);
				$CountryName = addQuote($CountryName);
				$FirstNameB = addQuote($FirstNameB);
				$LastNameB = addQuote($LastNameB);
				$AddressB = addQuote($AddressB);
				$CityB = addQuote($CityB);
				$State_OtherB = addQuote($State_OtherB);
				$CountryNameB = addQuote($CountryNameB);		
				$School = addQuote($School);
				$PrepClass = addQuote($PrepClass);
				
		
		
		//////////////////////
		//   Send Out receipt, and copy us on it... ------- Order is complete, send email to both Company email, and to customer.....
		//////////////////////
		
		
			$totalProductS = number_format($Total,2);
			$TaxS = number_format($TaxTotal,2);
			$SubS = number_format($Total,2);
			$DiscountS = number_format($Discount,2);
			$ShippingS = number_format($ShipCost,2);
			$TotalS = number_format($GrandTotal,2);
			
			# Get all information for referredbyid
			$sql = "SELECT * FROM tblReferredBy WHERE ReferredByID='$ReferredByID'";
			$result = mysql_query($sql) or die("Cannot get ReferredBy Information.  Please try again. <br>$sql<br>");
			
			while($row = mysql_fetch_array($result))
			{
							
				$ReferredBy = $row[Name];
										
			# end while	
			}
			
			require "../code/class.phpmailer.php";
			
			$mail = new PHPMailer();
			
			$mail->From = "info@silenttimer.com";
			$mail->FromName = "The Silent Timer Team";
			$mail->AddAddress("$Email", "$FirstName $LastName");
			$mail->AddBCC("info@silenttimer.com", "Silent Timer Orders");
			#$mail->AddBCC("erik@silenttimer.com", "Silent Timer Orders");
			#$mail->AddAttachment("Guide/Time Management Guide.pdf");
			$mail->IsHTML(true);
			$mail->Subject = "Your Silent Timer Receipt";
		
		
			if($State == "ZZ"){$State = $State_Other;}
			if($StateB == "ZZ"){$StateB = $State_OtherB;}
		
			$GrandTotal = number_format($GrandTotal,2);
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
			  <p><font size='2' face='Arial, Helvetica, sans-serif'>Make sure to download<em> The Silent Timer Time Management Guide</em> from your receipt page. 
				It is in PDF format, and gives you some valuable pointers for how to use 
				your timer during practice and on test day. If you did not receive your 
				copy, please email us at <a href='mailto:info@silenttimer.com'>info@silenttimer.com</a>.</font></p>
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
		
		
		/////  - ALTERNATE NON-HTML
		$althtml = "
		Your Silent Timer Receipt
		
		$FirstName, thank you for your order! You may use your order number to track your shipment, so hold onto it!
		
		Make sure to download The Silent Timer Time Management Guide from your receipt page. It is in PDF format, and gives you some valuable pointers for how to use your timer during practice and on test day. If you did not receive your copy, please email us at info@silenttimer.com.
		
		Order Number: $pID
		_________________________________________
			  
		Order Summary:
		------------------------------------------";
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
		$althtml .= "
		
		Product: $ProductName  | $Description
		Number Ordered: $Num_Ordered					
		Price: $$RetailPrice					
		Product Total: $$ProductTotal";
					
				#end if	
				}
					
			#end for		
			}
		
		$althtml .= "
		
		Subtotal: \$$Total";
		if ($DiscountS != ""){ 
		$althtml .= 
		"Discount: -\$$DiscountS";}
		$althtml .= 
		"Tax: \$$TaxTotal
		Shipping & Handling *: \$$ShipCost
		
		ORDER TOTAL: \$$GrandTotal
		------------------------------------------
		";
		
		# hide promo table if there is no promo code entered...
		if($PromotionID != "")
		{
		$althtml .= "
		Promotion Information
		------------------------------------------
		$promoNotes
		
		------------------------------------------";
		}
		
		$althtml .=
		"
		Payment Method:
		------------------------------------------		";
		 
		//if they are using a check, then put the check details...if they are using a credit card, use the card info.
		if($isCheck=="y")
		{
		$althtml .= "			   
		$BankName eCheck
		Routing Number: $CheckRouting
		Account Number: $CheckAccount
		Check Number: $CheckNumber
		";				 
		} 
		else
		{
		$althtml .= "				
		$CardType: ************$LastFourCr
		Exp: $ExpMonth/$ExpYear
		------------------------------------------";
		}
		
		$althtml .= "
		
		Shipping To:
		------------------------------------------
		$FirstName $LastName
		$Address $Address2
		$City, $State $ZipCode
		$CountryName
		------------------------------------------
		
		Billing To:
		------------------------------------------		";
		
		
		if($Same != 'y')
		{
		$althtml .= "
		$FirstNameB $LastNameB
		$AddressB
		$CityB, $StateB $ZipCodeB
		$CountryNameB
		------------------------------------------";
		}
		else
		{
		$althtml .= "
		Same As Shipping
		------------------------------------------";
		}
		
		$althtml .= 
		"
		
		Shipping Option:
		------------------------------------------
		";
		 # Get shipping info
			  	$sql = "SELECT * FROM tblShippingCost5 WHERE ShipCostID='$ShipCostID'";
				$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
				$row = mysql_fetch_array($result);
				$ShipperID = $row[ShipperID];
				$Type = $row[ShippingOptionID];
				$tempCost = $row[Cost];
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
				
		$althtml .= "
		Shipper: $Shipper
		Type: $TypeDisplay
		Cost: \$$ShipCost
		------------------------------------------";
		
		$althtml .= "$ShippingName";
		
		
		
		$althtml .="
		You will receive your tracking number in an email soon. Then you may go to http://www.dhl-usa.com to track your shipment.";
		
		
		$althtml .="
		
		If you have any questions at all, please email us. You will have your Silent Timer soon!
		
		The Silent Timer Team
		http://www.SilentTimer.com
		info@silenttimer.com
		1-800-552-0325
		";
		/////  - End of Alternate HTML Building
		
			
			$mail->Body = $html;
			$mail->AltBody = $althtml;
			
			if(!$mail->Send())
			{
			   echo "Email receipt could not be sent.<p>";
			   echo "Mailer Error: " . $mail->ErrorInfo;
			   exit;
			}
			
		
		
		# -----------------------------------------------------
		# SEND and email with ALL data to our email address...
		# -----------------------------------------------------
		
		$mail = new PHPMailer();
			
		$mail->From = "$Email";
		$mail->FromName = "Timer Order";
		$mail->AddAddress("info@silenttimer.com", "Silent Technology");
		$mail->AddAddress("erik@silenttimer.com", "Erik McMillan");
		$mail->IsHTML(false);
		$mail->Subject = "$pID: $FirstName $LastName spent $$GrandTotal!";
		
		$DetailedEmail =
		"
		Order Details ----------------------------
		
		Shipping:		$Shipper
		Type:			$TypeDisplay
		Shipping Cost:	$ShipCost
		
		";
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
		$DetailedEmail .= "
		
		Product: $ProductName  
		Number Ordered: $Num_Ordered					
		Price: $$RetailPrice					
		Product Total: $$ProductTotal
		
		";
					
				#end if	
				}
					
			#end for		
			}
		
		
		
		
		$DetailedEmail .= 
		"		
		Subtotal:          $Total
		Tax:               $TaxTotal
		Discount:		-$DiscountS
		Shipping Cost:     $ShipCost
		Total Spent:       $GrandTotal
		
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
		
		Paid By Check?:    $isCheck
		Bank Name:         $BankName
		Routing Number:    $CheckRouting
		Check Number:      $CheckNumber
		
		Sign Contract?     $Contract
			
		
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


 // make sure to close connection to database!!!
?>
     
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Your 
  Receipt</strong></font></p>
<p><font size="4" face="Arial, Helvetica, sans-serif">Thank you for your order!</font><font size="2" face="Arial, Helvetica, sans-serif"> Print
    this receipt for your records. You may use your order number to track your
shipment, so hold onto it!</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">You will receive email
      verification of your order.<br>
          <font color="#666666">* <em>Please be aware your e-mail provider may
            filter your confirmation email as spam. Add &quot;info@silenttimer.com&quot; to
  your Safe Email list.*</em></font></font></p>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="48%"><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Don't forget
            to download your time management guide:</strong></font></p>
      <table width="100%" border="1" cellpadding="4" cellspacing="0" bordercolor="#000000">
        <tr>
          <td><p><font color="#FF3300" size="3" face="Arial, Helvetica, sans-serif"><strong>The
                  Silent Timer&#8482; Time Management Guide<br>
                  <font color="#003399" size="2">Free with your purchase!
                  </font> </strong></font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>File
                    Name:</strong> <em>ST_TimeManGuide_061405.pdf</em><br>
                    <strong>File Size:</strong> 235 KB</font><strong><font size="2" face="Arial, Helvetica, sans-serif"><br>
                    <a href="guide/ST_TimeManGuide_061405.pdf" target="_blank">Click
                    to Download</a></font></strong></p></td>
        </tr>
      </table></td>
    <td><?
				
				//connect to database
				$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
				mysql_select_db($db) or die("Cannot select Database");

				
				
				$Now = date("Y-m-d");
				
				$sql = "SELECT * FROM tblNotice WHERE StartDate <= '$Now' AND EndDate >= '$Now' AND HomePage = 'y' AND Status = 'active' ORDER BY Priority ASC";
				$result = mysql_query($sql) or die("Cannot get notice");
				
				$Count = mysql_num_rows($result);
				
				if($Count > 0)
				{
				
						while($row = mysql_fetch_array($result))
						{
						$Notice = $row[Notice];
						
						
						?>
        <br>
        <? echo $Notice; ?><br>
        <?
						}
				}
						?>
    </td>
  </tr>
</table>
<br>

    <form name="form1" method="post" action="">

<table width="85%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
  <tr>
    <td colspan="2" align="left" valign="top"><p><font size="4" face="Arial, Helvetica, sans-serif">Spread
          the News! </font></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif">We know you'll love
        your Silent Timer, and so would your friends. Don't let them miss out
        on this valuable time management tool. Enter up to five names and email
      addresses for your friends.</font></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif">When you do, you are
        automatically entered in a monthly drawing to win a rebate for the cost
        of your Silent Timer! This means your purchase could be free! Your friends
        will receive a promotion code worth <strong>10%
          off</strong> of
      their purchase, that is valid for 30 days.</font></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="FriendsDetail.php" target="_blank">Click
    for more details (opens new window).</a></font></p></td>
  </tr>
  <tr>
    <td align="left" valign="top"><p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; Friends'
            Info</font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="4">
          <tr>
            <td width="3%"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
            <td width="30%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Name</strong></font></td>
            <td width="33%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Email</strong></font></td>
            <td width="34%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Test</strong></font></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>1.</strong></font></td>
            <td><input name="name1" type="text" id="name1"></td>
            <td><input name="email1" type="text" id="email1"></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="test1" id="test1">
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
                <option value="<? echo $row[Name]; ?>"><? echo $row[Name]; ?></option>
                <?
					}
				?>
              </select>
            </font></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>2.</strong></font></td>
            <td><input name="name2" type="text" id="name2"></td>
            <td><input name="email2" type="text" id="email2"></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="test2" id="test2">
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
                <option value="<? echo $row[Name]; ?>"><? echo $row[Name]; ?></option>
                <?
					}
				?>
              </select>
            </font></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>3.</strong></font></td>
            <td><input name="name3" type="text" id="name3"></td>
            <td><input name="email3" type="text" id="email3"></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="test3" id="test3">
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
                <option value="<? echo $row[Name]; ?>"><? echo $row[Name]; ?></option>
                <?
					}
				?>
              </select>
            </font></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>4.</strong></font></td>
            <td><input name="name4" type="text" id="name4"></td>
            <td><input name="email4" type="text" id="email4"></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="test4" id="test4">
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
                <option value="<? echo $row[Name]; ?>"><? echo $row[Name]; ?></option>
                <?
					}
				?>
              </select>
            </font></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>5.</strong></font></td>
            <td><input name="name5" type="text" id="name5"></td>
            <td><input name="email5" type="text" id="email5"></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="test5" id="test5">
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
                <option value="<? echo $row[Name]; ?>"><? echo $row[Name]; ?></option>
                <?
					}
				?>
              </select>
            </font></td>
          </tr>
      </table></td>
    <td align="left" valign="top"><p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; Add
            a Personal Note</font></strong></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Your
              note will be added to your friends' emails.</strong></font></p>
      <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="Note" cols="40" rows="4" id="Note"></textarea>
</font></strong></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif">*If your friend
    does not receive the email, have them check their spam folder - just in case
    it got filtered out. </font></p>
    <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&gt; Send
          Emails </font></strong></p>

      
        <div align="left">
          <input name="Send" type="submit" id="Send" value="Send Emails">
          <input type="reset" name="Reset" value="Reset">
        </div>
      </td>
  </tr>
</table>
 </form> 

<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>
  <? 
		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		$FirstName = escapeQuote($FirstName);
		$LastName = escapeQuote($LastName);
		$Address = escapeQuote($Address);
		$Address2 = escapeQuote($Address2);
		$City = escapeQuote($City);
		$FirstNameB = escapeQuote($FirstNameB);
		$LastNameB = escapeQuote($LastNameB);
		$AddressB = escapeQuote($AddressB);
		$CityB = escapeQuote($CityB);		
		$School = escapeQuote($School);
		$PrepClass = escapeQuote($PrepClass);
		
		# addresses with # removed so that it will work for receipt!
		$R_Address = escapePound($Address);
		$R_Address2 = escapePound($Address2);
		$R_AddressB = escapePound($AddressB);																																																																																												
		
		
echo "<a href='print2.php?wantreceipt=yes&Discount=$Discount&ShipCostID=$ShipCostID&txtFirstName=$FirstName&txtLastName=$LastName&txtAddress=$R_Address&txtAddress2=$R_Address2&txtCity=$City&txtState=$State&txtZipCode=$ZipCode&CountryName=$CountryName&txtPhone=$Phone&txtEmail=$Email&chkSame=$Same&txtFirstNameB=$FirstNameB&txtLastNameB=$LastNameB&txtAddressB=$R_AddressB&txtCityB=$CityB&txtStateB=$StateB&txtZipCodeB=$ZipCodeB&CountryNameB=$CountryNameB&cboCardType=$CardType&LastFourCr=$LastFourCr&cboExpMonth=$ExpMonth&cboExpYear=$ExpYear&Tax=$TaxTotal&Total=$Total&ProductPrice=$price&TotalProduct=$totalProduct&ShippingCompany=$ShippingCompany&ShippingName=$ShippingName&ShippingCost=$ShippingCost&TestName=$TestName&pID=$pID&OfficeNotes=$officeNotes&chkCheckPay=$isCheck&txtBankName=$BankName&AccountType=$AccountType&txtCheckRouting=$CheckRouting&txtCheckAccount=$CheckAccount&txtCheckNumber=$CheckNumber' target='_blank'>Click for a printable receipt</a>";
		
		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		$FirstName = removeBars($FirstName);
		$LastName = removeBars($LastName);
		$Address = removeBars($Address);
		$Address2 = removeBars($Address2);
		$City = removeBars($City);
		$FirstNameB = removeBars($FirstNameB);
		$LastNameB = removeBars($LastNameB);
		$AddressB = removeBars($AddressB);
		$CityB = removeBars($CityB);		
		$School = removeBars($School);
		$PrepClass = removeBars($PrepClass);

?>
</strong></font></p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Order Number: </font></strong>
  <font color="#000099" size="3" face="Arial, Helvetica, sans-serif"><strong><? echo $pID;?></strong></font></p>
  
<table width="100%" border="1" cellpadding="4" cellspacing="0" bordercolor="#003399">
  <tr>
      <td width="40%" align="left" valign="top" bgcolor="#003399"><div align="center"><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong>Order Summary</strong></font> </div></td>
  </tr>
 <tr><td>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
        <tr bgcolor="#FFFFCC">
          <td >
          <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Qty</strong></font></div></td>
          <td ><strong><font size="2" face="Arial, Helvetica, sans-serif"><font color="#003399">Description</font></font></strong></td>
          <td >
          <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Price</strong></font></div></td>
          <td >
          <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Total</strong></font></div></td>
        </tr>
        <?
 # loop out all shopping cart items
			for($i=0; $i < count($ShoppingCart); $i++)
			{
				
				if($ShoppingCart[$i][0] != "")
				{				
					# get current product from the cart...
					$ProductID = $ShoppingCart[$i][0];
					$Num_Ordered = $ShoppingCart[$i][1];
					$ProductWeight = $ShoppingCart[$i][2];
					 
					# Get all information from table for this part number ID
					$sql = "SELECT * FROM tblProduct WHERE ProductID = $ProductID";
					$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
	
					while($row = mysql_fetch_array($result))
					{
						$ProductID = $row[ProductID];
						$ProductName = $row[ProductName];
						$ISBN = $row[ISBN];
						$Description = $row[Description];
						$Price = $row[Price];
						$RetailPrice = $row[RetailPrice];
						
					# end while	
					}
					?>
        <tr>
          <td><div align="center"> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $Num_Ordered;?> </font></div></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><b><? echo $ProductName; ?></b><br>
              <? echo $Description; ?></font></td>
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($RetailPrice, 2); ?></font></div></td>
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? $ProductTotal = $Num_Ordered*$RetailPrice;
					echo number_format($ProductTotal, 2); ?>
          </font></div></td>
        </tr>
        <? 
				
				# end if	
				}
				
			# end for	
			}
	
	#get shipping info
	$sql = "SELECT * FROM tblShippingCost5 WHERE ShipCostID='$ShipCostID'";
	$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
	$row = mysql_fetch_array($result);
	
	$ShipCost = $row[Cost];
	
	
?>
        <tr >
          <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Subtotal</strong></font></td>
          <td>
            <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($Total, 2);?></strong></font></div></td>
        </tr>
<? if ($Discount != ""){?> <tr >
          <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Discount</strong></font></td>
          <td>
          <div align="center"><font size="2" face="Arial, Helvetica, sans-serif" color="#FF0000"><strong>-$<? echo number_format($Discount, 2);?></strong></font></div></td>
        </tr><? } ?>
           <tr >
          <td colspan="3"><font  size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping Total</strong></font>
</td>
          <td><div align="center"><font  size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($ShipCost, 2);?></strong></font></div></td>
        </tr>
		<tr >
          <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Tax</strong></font></td>
          <td>
            <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($TaxTotal, 2);?></strong></font></div></td>
        </tr>
     
        <tr>
          <td colspan="3"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>Total</strong></font>
</td>
          <td><div align="center"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($GrandTotal, 2);?></strong></font></div></td>
        </tr>
      </table>
	  </td></tr>
</table>
<table width="100%" border="1" cellpadding="4" cellspacing="0" bordercolor="#003399">
  <tr>
    <td width="60%" align="left" valign="top" bgcolor="#003399">
      <p><strong><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">Shipping to:</font></strong></p></td>
    <td width="40%" align="left" valign="top" bgcolor="#003399"><div align="center"><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong>Payment Summary</strong></font> </div></td>
  </tr>
  <tr>
    <td align="left" valign="top"><p><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><font color="#000000"><? echo addQuote($FirstName);?> <? echo addQuote($LastName);?> </font></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><br>
              <? 
			  
		  	?>
              <? echo addQuote($Address);?> <br>
              <? if($Address2 != ""){echo addQuote($Address2)."<br>";}?>
              <? echo addQuote($City);?>,
              <? if($State != "ZZ"){echo $State;}else{echo $State_Other;}?>
              <? echo $ZipCode;?> <br>
              <? # Get conutry info
			  	$sql = "SELECT * FROM tblShipLocation WHERE LocationID='$Country'";
				$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
				$row = mysql_fetch_array($result);
				$CountryName = $row[Name];
				echo $CountryName;?> </font></p>
        <p> <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Phone;?> <br>
              <? echo $Email;?> </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <br>
          </font></p></td>
    <td width="40%" rowspan="5" align="left" valign="top">
      <?
		  # hide promo table if there is no promo code entered...
		  if($PromotionID != "")
			{
	  ?>
      <br>
      <table width="100%" border="1" cellspacing="0" cellpadding="5" bordercolor="#003399">
        <tr>
          <td><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong>Promotion<br>
                  <font color="#000000"><? echo $promoNotes;?></font></strong></font></td>
        </tr>
      </table>
      <?
	  		} 
	  ?>
      <br>
      <table width="100%" border="1" cellspacing="0" cellpadding="4" bordercolor="#003399">
        <tr align="left" valign="top">
          <td>
            <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Payment Method:<br>
              </strong>
                  <? 
			   //if they are using a check, then put the check details...if they are using a credit card, use the card info.
			   if($isCheck=="y")
			   {
			   ?>
                  <? echo $BankName;?> eCheck<br>
              Routing Number: <? echo $CheckRouting;?><br>
              Account Number: <? echo $CheckAccount;?><br>
              Check Number: <? echo $CheckNumber;?>
              <? 
				} 
				else
				{
				?>
              <? echo $CardType;?>: <? echo $CreditCardNo;?><br>
              Exp: <? echo $ExpMonth;?>/<? echo $ExpYear;?>
              <?
				}
				?>
            </font></p>
            <p><strong><font size="2" face="Arial, Helvetica, sans-serif">Billing Address:<font color="#000000"><br>
			                </font></font></strong>
                <?
			  if($Same != "y")
			  {
			  ?>
                <font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><font color="#000000"><? echo addQuote($FirstNameB);?> <? echo addQuote($LastNameB);?></font></font><font color="#000000"><font size="2" face="Arial, Helvetica, sans-serif"><br>
                <? echo addQuote($AddressB);?><br>
                <? echo addQuote($CityB);?>,
                <? if($StateB != "ZZ"){echo $StateB;}else{echo $State_OtherB;}?>
                <? echo $ZipCodeB;?> <br>
                <? echo $CountryNameB;?></font></font></p>
            <?
			  }
			  else
			  {
			  		echo "<font color='#003399' size='2' face='Arial, Helvetica, sans-serif'><font color='#000000'>Same As Shipping</font></font>";
			  }
			  ?>
          </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#003399"> <strong><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">Shipping Option:</font></strong> </td>
  </tr>
  <tr>
    <td align="left" valign="top">
	<? # Get shipping info
			  	$sql = "SELECT * FROM tblShippingCost5 WHERE ShipCostID='$ShipCostID'";
				$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
				$row = mysql_fetch_array($result);
				$ShipperID = $row[ShipperID];
				$Type = $row[ShippingOptionID];
				$tempCost = $row[Cost];
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
				?>
				<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#003399">
          <tr bgcolor="#CCCCCC">
            <td  >
            <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Shipper</strong></font></div></td>
            <td >
            <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Type</strong></font></div></td>
            <td ><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Cost</strong></font></div></td>
            
          </tr>     
		  <tr>
				<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Shipper;?></font></div></td>
				<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $TypeDisplay; ?></font></div></td>
				<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? if ($tempCost == '0') { ?><font color="#FF0000"> FREE </font><? } else { ?> $ <? echo number_format($tempCost,2); }?></font></div> </td>
		</tr>
		</table>
    </td>
  </tr>
  
</table>


	<!--  Code to track what purchases come from Traffic Logic Clicks  -->
	<img src="https://tk.admin-account.com:88/sc.cgi?a=5082" width="1" height="1" alt="" style="width:1px;height:1px;" />
	<!--  Code to track what purchases come from Traffic Logic Clicks  -->
  
  
	<!-- Google Conversion Code -->
	<script language="JavaScript">
	<!--
	google_conversion_id = 1071954407;
	google_conversion_language = "en_US";
	-->
	</script>
	<script language="JavaScript" src="https://www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<a href="https://services.google.com/sitestats/en_US.html" target=_blank>
	<img height=27 width=135 border=0 src="https://www.googleadservices.com/pagead/conversion/1071954407/?hl=en">
	</a>
	</noscript>
	<!-- Google Conversion Code -->
	
	<!-- Google Conversion Code -->
	<script language="JavaScript">
	<!--
	google_conversion_id = 1070812694;
	google_conversion_language = "en_US";
	-->
	</script>
	<script language="JavaScript" src="https://www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<a href="https://services.google.com/sitestats/en_US.html" target=_blank>
	<img height=27 width=135 border=0 src="https://www.googleadservices.com/pagead/conversion/1070812694/?hl=en">
	</a>
	</noscript>
	<!-- Google Conversion Code -->
  
  
	<?
		
			# Register a session for the Purchase.  #
			# This way if the page is refreshed they won't be charged TWICE! #
			session_register('purchase');
			$_SESSION['purchase'] = "y";
		}
		else # shite, your card was declined mo' fo'.........
		{
	?>		
			
<p><font color="#FF0000" size="5" face="Arial, Helvetica, sans-serif"><strong>Payment 
  Problem</strong></font></p>
			<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>We're sorry:</strong></font></p>
			
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>There has been a 
  problem charging your account. You might have accidentally entered your incorrect 
  billing information, such as <font color="#FF0000">address</font> and <font color="#FF0000">zip 
  code</font>. Also, make sure you enter the correct <font color="#FF0000">CVV2</font> 
  number on the form for credit card orders, this verifies your identity.</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Please press <font color="#FF0000">&quot;Return 
  to Order Page&quot;</font>, below, and see if you can fix it. </strong></font></p>
<form action="order4test.php<? if($Custom=="yes"){echo "?a=$affiliateID";}?>" method="post" name="frmBack" id="frmBack">
  <div align="right"> 
		
		 <input name='ShipCostID' type='hidden' id='ShipCostID' value='<? echo "$ShipCostID";?>'>
          <!-- Shipping Address Info -->
          <input name='txtFirstName' type='hidden' id='txtFirstName' value='<? echo "$FirstName";?>'>
          <input name='txtLastName' type='hidden' id='txtLastName' value='<? echo "$LastName";?>'>
          <input name='txtAddress' type='hidden' id='txtAddress' value='<? echo "$Address";?>'>
          <input name='txtAddress2' type='hidden' id='txtAddress2' value='<? echo "$Address2";?>'>
          <input name='txtCity' type='hidden' id='txtCity' value='<? echo "$City";?>'>
          <input name='txtState' type='hidden' id='txtState' value='<? echo "$State";?>'>
          <input name='txtState_Other' type='hidden' id='txtState_Other' value='<? echo "$State_Other";?>'>
          <input name='txtZipCode' type='hidden' id='txtZipCode' value='<? echo "$ZipCode";?>'>
          <input name='txtCountry' type='hidden' id='txtCountry' value='<? echo "$Country";?>'>
          <input name='CountryName' type='hidden' id='CountryName' value='<? echo "$CountryName";?>'>
          <input name='ckForeignShipping' type='hidden' id='ckForeignShipping' value='<? echo "$Foreign";?>'>
			<input name='ckMilitary' type='hidden' id='ckMilitary' value='<? echo "$Military";?>'>
			<input name='ckPOBox' type='hidden' id='ckPOBox' value='<? echo "$POBox";?>'>
          <input name='txtPhone' type='hidden' id='txtPhone' value='<? echo "$Phone";?>'>
          <input name='txtEmail' type='hidden' id='txtEmail' value='<? echo "$Email";?>'>
          <!-- Billing Address Info -->
          <input name='chkSame' type='hidden' id='chkSame2' value='<? echo "$Same";?>'>
          <input name='txtFirstNameB' type='hidden' id='txtFirstNameB' value='<? echo "$FirstNameB";?>'>
          <input name='txtLastNameB' type='hidden' id='txtLastNameB' value='<? echo "$LastNameB";?>'>
          <input name='txtAddressB' type='hidden' id='txtAddressB' value='<? echo "$AddressB";?>'>
          <input name='txtCityB' type='hidden' id='txtCityB' value='<? echo "$CityB";?>'>
          <input name='txtStateB' type='hidden' id='txtStateB' value='<? echo "$StateB";?>'>
          <input name='txtState_OtherB' type='hidden' id='txtState_OtherB' value='<? echo "$State_OtherB";?>'>
          <input name='txtZipCodeB' type='hidden' id='txtZipCodeB' value='<? echo "$ZipCodeB";?>'>
          <input name='txtCountryB' type='hidden' id='txtCountryB' value='<? echo "$CountryB";?>'>
          <input name='CountryNameB' type='hidden' id='CountryNameB' value='<? echo "$CountryNameB";?>'>
          <!-- credit card info -->
          <input name='cboCardType' type='hidden' id='cboCardType' value='<? echo "$CardType";?>'>
          <input name='txtCreditCardNo' type='hidden' id='txtCreditCardNo' value='<? echo "$CreditCardNo";?>'>
          <input name='cboExpMonth' type='hidden' id='cboExpMonth' value='<? echo "$ExpMonth";?>'>
          <input name='cboExpYear' type='hidden' id='cboExpYear' value='<? echo "$ExpYear";?>'>
          <input name='txtCVV2' type='hidden' id='txtCVV2' value='<? echo "$CVV2";?>'>
          <!-- check info -->
          <input name='chkCheckPay' type='hidden' id='cboCardType' value='<? echo "$isCheck";?>'>
          <input name='txtBankName' type='hidden' id='cboCardType' value='<? echo "$BankName";?>'>
          <input name='AccountType' type='hidden' id='txtCreditCardNo' value='<? echo "$AccountType";?>'>
          <input name='txtCheckRouting' type='hidden' id='cboExpMonth' value='<? echo "$CheckRouting";?>'>
          <input name='txtCheckAccount' type='hidden' id='cboExpYear' value='<? echo "$CheckAccount";?>'>
          <input name='txtCheckNumber' type='hidden' id='txtCheckNumber' value='<? echo "$CheckNumber";?>'>
          <!-- personal info -->
          <input name='cboTest' type='hidden' id='cboTest' value='<? echo "$Test";?>'>
          <input name='txtTestDate' type='hidden' id='txtTestDate' value='<? echo "$TestDate";?>'>
		  <input name='TestMonth' type='hidden' id='TestMonth' value='<? echo "$TestMonth";?>'>
		  <input name='TestDay' type='hidden' id='TestDay' value='<? echo "$TestDay";?>'>
		  <input name='TestYear' type='hidden' id='TestYear' value='<? echo "$TestYear";?>'>
          <input name='txtSchool' type='hidden' id='txtSchool' value='<? echo "$School";?>'>
          <input name='txtPrepClass' type='hidden' id='txtPrepClass' value='<? echo "$PrepClass";?>'>
		  <input name='txtPrepClass2' type='hidden' id='txtPrepClass2' value='<? echo "$PrepClass2";?>'>
          <input name='cboReferredBy' type='hidden' id='cboReferredBy' value='<? echo "$ReferredBy";?>'>
          <input name='txtPromotion' type='hidden' id='txtPromotion' value='<? if($WebPromotion != "yes"){echo "$PromotionID";}?>'>
          <input name='txtOfficeCode' type='hidden' id='txtOfficeCode' value='<? echo "$OfficeCode";?>'>
		<!-- these suckers pass some values to the next page in order to validate receipt -->
		<input name='goback' type='hidden' id='goback' value='yes'>
		<input name="Back" type="submit" id="Back" value="&lt; Return to Order Page">
  </div>
</form>
<p>&nbsp;</p>
			
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">If you are receiving 
  an error you don't believe to be correct, please contact us <a href="mailto:info@silenttimer.com?subject=billing%20problem"> 
  via email</a> or AOL Instant Messenger, screen name <a href="aim:goim?screenname=SilentTimer&message=Hello.">SilentTimer</a>. 
  You may also call us toll free at 1-800-552-0325.</font></strong></p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			
	<?
// ------- Order Declined, send notification to us with their email and name.
mail("info@silenttimer.com", "Declined Order", 
"
$now

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
		# </if credit card is approved>
					
	////////////////////////////////////////////////////////////////////
			
			############################################
			# CLOSE Purchase Session Check If Statement
				}
				else
				{
			#
			##############################################
	?>
	
		<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>Order Already Processed</strong></font></p>
		<p><font size="2" face="Arial, Helvetica, sans-serif">Your order has been processed 
		  and you should receive a receipt and order number in your email soon. You have 
		  tried to reload your order page either by refreshing, or pressing &quot;Back&quot; 
		  on your browser. In order to avoid charging your account twice, we have intercepted 
		  your second order request. If you did not print your order details, and you 
		  do not get an order confirmation via email, please <a href="../contactus.php">contact 
		  us</a> for further help.</font></p>
		<p><font size="2" face="Arial, Helvetica, sans-serif">If you have reached this page in 
		  error and would actually like to place your order again, please <a href="../shoppingcart.php">click 
		  here</a>.</font></p>
			
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
	
	<?	
				} # end of if purchase session already placed...
	
	}
	#</Confirm button being pushed>
	// this is the end of the else statement for the confirm button being pushed....
	
	
		# code to grab emails and data...then send emails...
	if($_POST['Send'] == "Send Emails") # if button has been pressed...
	{
		$Note = $_POST['Note'];
		
		$Name = $_POST['name'];
		if($Name == ""){$Name = "Your Friend";}
		$Email = $_POST['email'];
		
		$Name1 = $_POST['name1'];
		if($Name1 == ""){$Name1 = "Buddy";}
		$Email1 = $_POST['email1'];
		$Test1 = $_POST['test1'];
		if($Test1 == ""){$Test1 = "Test";}
		
		$Name2 = $_POST['name2'];
		if($Name2 == ""){$Name2 = "Buddy";}
		$Email2 = $_POST['email2'];
		$Test2 = $_POST['test2'];
		if($Test2 == ""){$Test2 = "Test";}
		
		$Name3 = $_POST['name3'];
		if($Name3 == ""){$Name3 = "Buddy";}
		$Email3 = $_POST['email3'];
		$Test3 = $_POST['test3'];
		if($Test3 == ""){$Test3 = "Test";}
		
		$Name4 = $_POST['name4'];
		if($Name4 == ""){$Name4 = "Buddy";}
		$Email4 = $_POST['email4'];
		$Test4 = $_POST['test4'];
		if($Test4 == ""){$Test4 = "Test";}
		
		$Name5 = $_POST['name5'];
		if($Name5 == ""){$Name5 = "Buddy";}
		$Email5 = $_POST['email5'];
		$Test5 = $_POST['test5'];
		if($Test5 == ""){$Test5 = "Test";}
		
		$Now = date("Y-m-d H:m:s");
		
		# if the senders email isn't empty, go for it....
		if($Email != "")
		{
			require "../code/class.phpmailer.php";
				
				$sql = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, Status)
				VALUES('$Name', '$Email', '$Now', 'email.php', 'sender', 'active');";	
				mysql_query($sql) or die("Cannot insert sender into tblFriend!");
				
			if($Email1 != "")
			{
				SendEmails($Name, $Email, $Name1, $Email1, $Test1, $Note);
				
				$sql2 = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, ReferName, ReferEmail, Test, Note)
				VALUES('$Name1', '$Email1', '$Now', 'email.php', 'receiver', '$Name', '$Email', '$Test1', '$Note');";
				
				$result2 = mysql_query($sql2) or die("Cannot insert person 1 into tblFriend!");				
					
			}
			
			if($Email2 != "")
			{
				SendEmails($Name, $Email, $Name2, $Email2, $Test2, $Note);
			
				$sql3 = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, ReferName, ReferEmail, Test, Note)
				VALUES('$Name2', '$Email2', '$Now', 'email.php', 'receiver', '$Name', '$Email', '$Test2', '$Note');";
				
				$result3 = mysql_query($sql3) or die("Cannot insert person 2 into tblFriend!");				
			}
			
			if($Email3 != "")
			{
				SendEmails($Name, $Email, $Name3, $Email3, $Test3, $Note);
				
				$sql4 = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, ReferName, ReferEmail, Test, Note)
				VALUES('$Name3', '$Email3', '$Now', 'email.php', 'receiver', '$Name', '$Email', '$Test3', '$Note');";
				
				$result4 = mysql_query($sql4) or die("Cannot insert person 3 into tblFriend!");				
			}
			
			if($Email4 != "")
			{
				SendEmails($Name, $Email, $Name4, $Email4, $Test4, $Note);

				$sql5 = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, ReferName, ReferEmail, Test, Note)
				VALUES('$Name4', '$Email4', '$Now', 'email.php', 'receiver', '$Name', '$Email', '$Test4', '$Note');";
				
				$result5 = mysql_query($sql5) or die("Cannot insert person 4 into tblFriend!");				
			}
			
			if($Email5 != "")
			{
				SendEmails($Name, $Email, $Name5, $Email5, $Test5, $Note);
				
				$sql6 = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, ReferName, ReferEmail, Test, Note)
				VALUES('$Name5', '$Email5', '$Now', 'email.php', 'receiver', '$Name', '$Email', '$Test5', '$Note');";
				
				$result6 = mysql_query($sql6) or die("Cannot insert person 5 into tblFriend!");				
			}
			
			if($SentSomething = "yes")
			{
				header("location: thankyou.php");
			}

		}
		
	
	
	
	
	function SendEmails($FromName, $FromEmail, $ToName, $ToEmail, $Test, $Note)
	{
		$SentSomething = "yes";
	
		$mail = new PHPMailer();
		
		$mail->From = "$FromEmail";
		$mail->FromName = "$FromName";
		$mail->AddAddress("$ToEmail", "$ToName");
		$mail->AddBCC("info@silenttimer.com", "Friend Referral");
		$mail->IsHTML(false);
		$mail->Subject = "A Silent Timer for your $Test!";
	
$text =
"$ToName,

The Silent Timer is the perfect choice to help you time your upcoming $Test.  It is completely silent and has some cool features made for your test.

Here are a few:

   - It is silent!
   - It counts up or down.
   - It tells you exactly how much time you can spend on each question (no more guessing)!
   - It has easy to use memory buttons so you can easily use it on your $Test.
   
Visit http://www.SilentTimer.com to find out why I think this is a great option for your test.  If you like it, you can easily buy it online and get it fast!
";
if($Note != "")
{
$text .=
"
_________________________________________________
- Personal Note from $FromName:

$Note
_________________________________________________
";
}

$text .=
"
I hope this info helps,

$FromName
"; # end building message

		$mail->Body = $text;
		
		if(!$mail->Send())
		{
		   echo "Emails receipt could not be sent.<p>";
		   echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}
	
	
	} // end send emails....




?>
<script>
// write funciton to check and make sure emaisl aer correct...

	function OtherEmailCheck(EmailField)
	{
		// function to grab email content to see if it is valid!
		// ------ this checks to make sure it is a valid email address
		var str = EmailField;
		var at="@";
		var dot=".";
		var lat=str.indexOf(at);
		var lstr=str.length;
		var ldot=str.indexOf(dot);
		
		if (str.indexOf(at)==-1)
		{
			email = 1;
		}
	
		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr)
		{
			email = 1;
		}
	
		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr)
		{
			email = 1;
		}
	
		if (str.indexOf(at,(lat+1))!=-1)
		{
			email = 1;
		}
	
		if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot)
		{
			email = 1;
		}
	
		if (str.indexOf(dot,(lat+2))==-1)
		{
			email = 1;
		}
	
		if (str.indexOf(" ")!=-1)
		{
			email = 1;
		}
		
		if (email == 1)
		{
			return false;
		}
	}
	
	function CheckEmails()
	{
	
		// loop through names/emails and see if they are valid...
		var e = 0;
		var eText = "";
		
		//make sure at least one email address is entered!!!
		if(document.Emails.email1.value == "" && document.Emails.email2.value == "" && document.Emails.email3.value == "" && document.Emails.email4.value == "" && document.Emails.email5.value == "")
		{
			if(eText != "")
			{
				eText = eText + ", and please enter at least one friend's email address";
			}
			else
			{
				eText = "Please enter at least one friend's email address";
			}
			
			e = 1;
		}
		else
		{
			// email
			var email = 0;
			
			if(document.Emails.email.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and please enter your email address";
				}
				else
				{
					eText = "Please enter your email address";
				}
				
				e = 1;
			}
			else
			{
				// ------ this checks to make sure it is a valid email address
		
				var str = document.Emails.email.value;
				var at="@";
				var dot=".";
				var lat=str.indexOf(at);
				var lstr=str.length;
				var ldot=str.indexOf(dot);
				
				if (str.indexOf(at)==-1)
				{
					email = 1;
				}
		
				if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr)
				{
					email = 1;
				}
		
				if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr)
				{
					email = 1;
				}
		
				if (str.indexOf(at,(lat+1))!=-1)
				{
					email = 1;
				}
		
				if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot)
				{
					email = 1;
				}
		
				if (str.indexOf(dot,(lat+2))==-1)
				{
					email = 1;
				}
		
				if (str.indexOf(" ")!=-1)
				{
					email = 1;
				}
		
				// ------ this checks to make sure it is a valid email address
		
				if (email == 1)
				{
					if(eText != "")
					{
						eText = eText + ", and enter your valid email address";
					}
					else
					{
						eText = "Enter your valid email address";
					}
					
					e = 1;
				}
		
			}
			
			if(document.Emails.email1.value != "")
			{
				// if the email is filled in, check to make sure it is valid
				if(OtherEmailCheck(document.Emails.email1.value) == false)
				{
					if(eText != "")
					{
						eText = eText + ", and " + document.Emails.email1.value + " is not a valid email address";
					}
					else
					{
						eText = document.Emails.email1.value + " is not a valid email address";
					}
					
					e = 1;
				}
			}
			
			if(document.Emails.email2.value != "")
			{
				// if the email is filled in, check to make sure it is valid
				if(OtherEmailCheck(document.Emails.email2.value) == false)
				{
					if(eText != "")
					{
						eText = eText + ", and " + document.Emails.email2.value + " is not a valid email address";
					}
					else
					{
						eText = document.Emails.email2.value + " is not a valid email address";
					}
					
					e = 1;
				}
			}
			
			if(document.Emails.email3.value != "")
			{
				// if the email is filled in, check to make sure it is valid
				if(OtherEmailCheck(document.Emails.email3.value) == false)
				{
					if(eText != "")
					{
						eText = eText + ", and " + document.Emails.email3.value + " is not a valid email address";
					}
					else
					{
						eText = document.Emails.email3.value + " is not a valid email address";
					}
					
					e = 1;
				}
			}
			
			if(document.Emails.email4.value != "")
			{
				// if the email is filled in, check to make sure it is valid
				if(OtherEmailCheck(document.Emails.email4.value) == false)
				{
					if(eText != "")
					{
						eText = eText + ", and " + document.Emails.email4.value + " is not a valid email address";
					}
					else
					{
						eText = document.Emails.email4.value + " is not a valid email address";
					}
					
					e = 1;
				}
			}
			
			if(document.Emails.email5.value != "")
			{
				// if the email is filled in, check to make sure it is valid
				if(OtherEmailCheck(document.Emails.email5.value) == false)
				{
					if(eText != "")
					{
						eText = eText + ", and " + document.Emails.email5.value + " is not a valid email address";
					}
					else
					{
						eText = document.Emails.email5.value + " is not a valid email address";
					}
					
					e = 1;
				}
			}

		} // end one email address at least...
		
		
		// if an error occurs, don't submit form, and tell them what to fill in.
		if (e == 1) 
		{
			alert("Please correct the following:\n\n" + eText + ".");
			return false;
		}
		else //if all is clear, let emails be sent!!!
		{
			return true;
		}
	}


</script>
	
<?

		$goto = "http://www.silenttimer.com/email/thankyou.php";
		header("location: $goto");
	

} // end if button is pushed



mysql_close($link);
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

if($Custom == "yes")
{
	# put custom page info around our order page...
	echo $BottomCode;
	
}
else
{
// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
}
?>