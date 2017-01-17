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
		$goto = "order4.php";
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
		
				$cbDHL = $_POST['cbDHL'];
				$cbUSPS = $_POST['cbUSPS'];
				$cbSig = $_POST['cbSig'];
		
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
			$mail->AddBCC("erik@silenttimer.com", "Silent Timer Orders");
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
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Thank you for your 
  order! Print this receipt for your records. You may use your order number to 
  track your shipment, so hold onto it!</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>You will receive
       email verification of your order. <em><font color="#666666">Please be
       aware  your e-mail provider may filter your confirmation email as spam.
       Add &quot;info@silenttimer.com&quot; to your Safe Email list. </font></em></strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Take the <a href="<? echo $http; ?>survey/survey0525a.php">Time
  Survey</a> and be entered to win a $20 gift certificate!</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Don't forget to
      download your time management guide.</strong></font></p>
<table width="48%" border="1" cellpadding="4" cellspacing="0" bordercolor="#000000">
  <tr>
    <td><p><font color="#FF3300" size="2" face="Arial, Helvetica, sans-serif"><strong><em>The 
        Silent Timer Time Management Guide</em></strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>File Name:</strong> 
        <em>ST_TimeManGuide</em>_061405.pdf<br>
        <strong>File Size:</strong> 235 KB</font><strong><font size="2" face="Arial, Helvetica, sans-serif"><br>
        <a href="guide/ST_TimeManGuide_061405.pdf" target="_blank">Click to Download</a></font></strong></p></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Please help spread
      the news of our product to your friends. <a href="../email/index.php" target="_blank">Visit
      our email page</a> to easily send a message to up to 5 of your testing
friends. </strong></font></p>
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
<form action="order4.php<? if($Custom=="yes"){echo "?a=$affiliateID";}?>" method="post" name="frmBack" id="frmBack">
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
		  			<input name='cbDHL' type='hidden' id='cbDHL' value='<? echo "$cbDHL";?>'>
			<input name='cbUSPS' type='hidden' id='cbUSPS' value='<? echo "$cbUSPS";?>'>
			<input name='cbSig' type='hidden' id='cbSig' value='<? echo "$cbSig";?>'>
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
	
	?>

<?
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