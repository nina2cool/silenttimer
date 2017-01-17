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
	if ($_POST['Confirm'] != "Processing, Please Wait")
	{
		$goto = "index.php";
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
	
	function escapePound($var)
	{
		if (isset($var))
		{
			$string = str_replace("#","NUM",$var);
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
		$Num = $_POST['cboNum'];
		$ShippingOption = $_POST['cboShippingOption'];
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
		
		if($Country != "US"){$InternationalShippingOption = $ForeignShipping;}
		
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
		$ReferredBy = $_POST['cboReferredBy'];
		
		$PromotionID = $_POST['txtPromotion'];
		$promoNotes = $_POST['txtPromoNotes'];
		
		if($promoNotes == "Invalid Code"){$PromotionID = "";} // if there was an invalid code entered... delete it from the code here...
		
		$OfficeCode = $_POST['txtOfficeCode'];
		$officeNotes = $_POST['txtOfficeNotes'];
		
		
		$Tax = $_POST['Tax'];
		$Total = $_POST['Total'];
		$Contract = $_POST['Contract'];
		
		// get stuff from last page necessary for receipt...
		$price = $_POST['ProductPrice'];
		$totalProduct = $_POST['TotalProduct'];
		$ShippingCompany = $_POST['ShippingCompany'];
		$ShippingName = $_POST['ShippingName'];
		$ShippingCost = $_POST['ShippingCost'];
		$TestName = $_POST['TestName'];
		
		// get affiliate person code that was looked up from the promotion code on the last page.
		// if it isn't empty, then credit their account with the necessary funds.
		$AffiliatePromotion = $_POST['AffiliatePromotion'];
		
		
		
		
		#########
		# Check Purchase Session.  If already purchased, do not go through with transaction
		#
			if($_SESSION['purchase'] != "y")
			{
		#
		#
		########
		

	
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
				&Total=$Total&Address=$Address&Zip=$ZipCode
				&CVV2Type=1&CVV2=$CVV2&HTML=No";
			}
			else
			{
				$data = "ePNAccount=040358&CardNo=$CreditCardNo&ExpMonth=$ExpMonth&ExpYear=$ExpYear
				&Total=$Total&Address=$AddressB&Zip=$ZipCodeB
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
				&Total=$Total&Address=$Address&City=$City&State=$State&Zip=$ZipCode&Phone=$Phone&HTML=No";
			}
			else
			{
				$data = "ePNAccount=040358&PaymentType=Check&AccountType=P&AccountClass=$AccountClass&FirstName=$FirstNameB
				&LastName=$LastNameB&BankName=$BankName&Routing=$CheckRouting&CheckAcct=$CheckAccount&Check=$CheckNumber
				&Total=$Total&Address=$AddressB&City=$CityB&State=$StateB&Zip=$ZipCodeB&Phone=$Phone&HTML=No";
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
			
			# link to Database...
			$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
			mysql_select_db($db) or die("Cannot select Database");			
		
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
			If ($cID == "")
			{
				$sql = "INSERT INTO tblCustomer(FirstName, LastName, Address, Address2, City, State, StateOther, ZipCode, Country, Phone, Email, School, PrepClass)
						  VALUES ('$FirstName', '$LastName', '$Address', '$Address2', '$City', '$State', '$State_Other', '$ZipCode', '$Country', '$Phone', '$Email', '$School', '$PrepClass')";
				mysql_query($sql) or die("Cannot insert customer, please try again.");
				
				//now, find out what their customerID is...
				$sql = "SELECT CustomerID FROM tblCustomer WHERE FirstName= '$FirstName' AND LastName = '$LastName' AND Address = '$Address' AND Phone = '$Phone' AND ZipCode = '$ZipCode'";
				$result = mysql_query($sql) or die("Cannot retrieve Customer ID, please try again.");
						
				while($row = mysql_fetch_array($result))
				{
					$cID = $row[CustomerID];
				}
				
			}
			
			//calculate and get totals, etc...   ------------------------------------------------->>>>>>>>>>
			
			// grab pricing and number in stock from product table....
			$sql = "SELECT NumInStock, Price FROM tblProduct WHERE ProductID = 1;";
			$result = mysql_query($sql) or die("Can't get product information, please try again.");
							
			while($row = mysql_fetch_array($result))
			{
				$NumInStock = $row[NumInStock];
				$Price = $row[Price];
			}
			
			$ProductID = 1;
			$TimerPrice = $Price;
			
				
			
			#  IF handed out in person, it does not need to be shipped, PUT a ' z ' in the DB instead of ' n '
			if($ShippingOption == 4){$isShipped='z';}
			
			#  IF timer is going to be picked up, put a " p ", not an " n "
			if($ShippingOption == 7){$isShipped='p';}
			
			#  IF it needs to be shipped... then put an " n "
			if($ShippingOption != 4 and $ShippingOption != 7){$isShipped='n';}
					
			//now, the customer is in the customer table, we have their customerID....we have all the totals......INSERT order into tblPurchase...
			$sql = "INSERT INTO tblPurchase(ProductID, CustomerID, TestID, TestDate, NumOrdered, ReferredBy, TimerPrice, ShippingOptionID, InternationalShippingOption, Tax, TotalCost, DateTime, Shipped, SameBillingAddress, IP, SignContract, ShippingCost, PromotionCodeID, AffOfficeID)
					VALUES ($ProductID, $cID, $Test, '$TestDate', $Num, '$ReferredBy', $TimerPrice, $ShippingOption, '$InternationalShippingOption', $Tax, $Total, '$now', '$isShipped', '$Same', '$ip', '$Contract', $ShippingCost, '$PromotionID', '$OfficeCode')";
			mysql_query($sql) or die("Cannot insert purchase, please try again.");
			
			//now, get purchase ID for this puchase, and enter info into tblPurchaseDetails......
			$sql = "SELECT PurchaseID FROM tblPurchase WHERE CustomerID = $cID AND IP = '$ip' AND DateTime = '$now'";
			$result = mysql_query($sql) or die("Cannot get Purchase ID, please try again.");
					
			while($row = mysql_fetch_array($result))
			{
				$pID = $row[PurchaseID];
			}


			//////// AFFILIATE PROMOTION CODE, inserts this sale record into /////
			#		 tblAffiliatePurchase if an affiliate promotion code was used.
			
			# see if there was an affiliate promotion code
			If ($AffiliatePromotion != "")
			{				
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
				mysql_query($sql) or die("Cannot insert partner promotion purchase, please try again.");
			}
			
			/////////////////////////////////////////////////////////////
			
			
			//////// affiliate code, inserts this sale record into /////
			#		 tblAffiliatePurchase if there is an affiliate 
			#  		 associated
			
			# see if session registered with name AND there is no affiliate promotion code used...
			If (session_is_registered('affiliate') and $AffiliatePromotion == "")
			{
				$affiliateID = $_SESSION['affiliate'];
				
				# get this affiliate's commission rate for current sales
				$sql = "SELECT Rate FROM tblAffiliate WHERE AffiliateID = '$affiliateID'";
				$result = mysql_query($sql) or die("Cannot get Partner Rate, please try again.");
						
				while($row = mysql_fetch_array($result))
				{
					$rate = $row[Rate] * $Num; #rate times the number of units they ordered.
				}
				
				$sql = "INSERT INTO tblAffiliatePurchase(PurchaseID, AffiliateID, Commission, TotalSale, Status)
						VALUES ($pID, '$affiliateID', '$rate', '$totalProduct','open')";
						
				mysql_query($sql) or die("Cannot insert partner purchase, please try again.");
			}
			
			/////////////////////////////////////////////////////////////
			
			
			//insert info into tblPurchaseDetails....
			
			// substr( string, where to start in string, how far to go in string)
			$LastFourCr = substr($CreditCardNo, strlen($CreditCardNo) -4, 4);
			
			//echo "$pID, $FirstNameB, $LastNameB, $AddressB, $CityB, $StateB, $ZipCodeB, $CardType, $LastFourCr, $Code, $AVS, $CVV2Code, $now";
			
			
			
		# if a credit card transaction... do this Purchase Details insert...
			if($isCheck != "y")
			{
			
				$sql = "INSERT INTO tblPurchaseDetails (PurchaseID, FirstName, LastName, Address, City, State, StateOther, ZipCode, Country, CardType, LastFourCr, BankCode, AddressVerification, CVV2Verification, DateTime, IsCheck, BankName, RoutingNumber, CheckNumber)
						VALUES ($pID, '$FirstNameB', '$LastNameB', '$AddressB', '$CityB', '$StateB', '$State_OtherB', '$ZipCodeB', '$CountryB', '$CardType', $LastFourCr, '$Code', '$AVS', '$CVV2Code', '$now', 'n', '', '', '')";
			}
			# use this for a CHECK transaction
			else
			{
				$sql = "INSERT INTO tblPurchaseDetails (PurchaseID, FirstName, LastName, Address, City, State, StateOther, ZipCode, Country, CardType, LastFourCr, BankCode, AddressVerification, CVV2Verification, DateTime, IsCheck, BankName, RoutingNumber, CheckNumber)
						VALUES ($pID, '$FirstNameB', '$LastNameB', '$AddressB', '$CityB', '$StateB', '$State_OtherB', '$ZipCodeB', '$CountryB', '$CardType', '$LastFourCr', '$Code', '$AVS', '$CVV2Code', '$now', 'y', '$BankName', '$CheckRouting', '$CheckNumber')";
			}
			
			
			//echo "$sql<br>";
			mysql_query($sql) or die("Cannot insert Purchase Details, please try again. <br><br>$sql");
			
			//Update the inventory level to the correct number of timers!!!
			$sql = "UPDATE tblProduct SET WebInventory = WebInventory - $Num WHERE ProductID = 1";
			mysql_query($sql) or die("Cannot remove from Inventory, please try again.");


	?>		


<?
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


	$totalProductS = number_format($totalProduct,2);
	$TaxS = number_format($Tax,2);
	$SubS = number_format($totalProduct + $Tax,2);
	$ShippingS = number_format($ShippingCost,2);
	$TotalS = number_format($Total,2);
	

	
	
	require "../code/class.phpmailer.php";
	
	$mail = new PHPMailer();
	
	$mail->From = "info@silenttimer.com";
	$mail->FromName = "The Silent Timer Team";
	$mail->AddAddress("$Email", "$FirstName $LastName");
	$mail->AddBCC("erik@silenttimer.com", "Erik");
	$mail->AddBCC("nina@silenttimer.com", "Christina");
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
    <td class='main'><p><font color='#003399' size='5' face='Arial, Helvetica, sans-serif'><strong>Your 
        Silent Timer Receipt</strong></font></p>
      <p><font color='#003399' size='2' face='Arial, Helvetica, sans-serif'><font color='#000000'><strong>$FirstName</strong></font></font><strong>,</strong> 
        <strong><font size='2' face='Arial, Helvetica, sans-serif'>t</font></strong><font size='2' face='Arial, Helvetica, sans-serif'><strong>hank 
        you for your order! You may use your order number to track your shipment, 
        so hold onto it! </strong></font></p>
      <p><font size='2' face='Arial, Helvetica, sans-serif'>Make sure to download<em> The Silent Timer Time Management Guide</em> from your receipt page. 
        It is in PDF format, and gives you some valuable pointers for how to use 
        your timer during practice and on test day. If you did not receive your 
        copy, please email us at <a href='mailto:info@silenttimer.com'>info@silenttimer.com</a>.</font></p>
      <p><strong><font size='2' face='Arial, Helvetica, sans-serif'>Order Number: 
        </font></strong> <font color='#000099' size='3' face='Arial, Helvetica, sans-serif'><strong>$pID</strong></font></p>
      <table width='100%' border='1' cellpadding='4' cellspacing='0' bordercolor='#003399'>
        <tr> 
          <td width='60%' align='left' valign='top' bgcolor='#003399'> <p><strong><font color='#FFFFFF' size='3' face='Arial, Helvetica, sans-serif'>Shipping 
              to:</font></strong></p></td>
          <td width='40%' align='left' valign='top'><div align='center'><font color='#003399' size='3' face='Arial, Helvetica, sans-serif'><strong>Order 
              Summary</strong></font> </div></td>
        </tr>
        <tr> 
          <td align='left' valign='top'><p><font color='#003399' size='2' face='Arial, Helvetica, sans-serif'><font color='#000000'>$FirstName $LastName</font></font><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'><br>
              $Address $Address2<br>$City, $State $ZipCode<br>$CountryName</font></p>
            <p><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'>$Phone
              <br>
              $Email</font><font size='2' face='Arial, Helvetica, sans-serif'><br>
              <br>
              </font></p></td>
          <td width='40%' rowspan='3' align='left' valign='top'><table width='100%' border='0' cellspacing='4' cellpadding='0'>
              <tr align='left' valign='top'> 
                <td colspan='2'> <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'><em><strong>$Num
                    Timer(s) Ordered</strong></em></font></p></td>
              </tr>
              <tr> 
                <td align='left' valign='top'><font size='2' face='Arial, Helvetica, sans-serif'>Product:</font></td>
                <td align='right' valign='top'> <div align='right'><font face='Arial, Helvetica, sans-serif'><font size='2'>\$</font><font face='Arial, Helvetica, sans-serif'><font size='2'>$totalProductS</font></font></font></div></td>
              </tr>
              <tr> 
                <td align='left' valign='top'><font size='2' face='Arial, Helvetica, sans-serif'>Tax:</font></td>
                <td align='right' valign='top'><font size='2' face='Arial, Helvetica, sans-serif'>$TaxS</font></td>
              </tr>
              <tr> 
                <td></td>
                <td align='right' bgcolor='#000000'><img src=pics/transparent-pixel.gif width=1 height=1 vspace=0 hspace=0></td>
              </tr>
              <tr> 
                <td align='left' valign='top'><font size='2' face='Arial, Helvetica, sans-serif'><strong>Subtotal:</strong></font></td>
                <td align='right' valign='top'><font size='2' face='Arial, Helvetica, sans-serif'>$SubS</font></td>
              </tr>
              <tr> 
                <td align='left' valign='top'><font size='2' face='Arial, Helvetica, sans-serif'>Shipping 
                  &amp; Handling<em>*</em>:</font></td>
                <td align='right' valign='top'><font size='2' face='Arial, Helvetica, sans-serif'>$ShippingS</font></td>
              </tr>
              <tr> 
                <td colspan='2' bgcolor='#000000'><img src=pics/transparent-pixel.gif width=1 height=1 vspace=0 hspace=0></td>
              </tr>
              <tr> 
                <td align='left' valign='top'><div align='left'><strong><font color='#FF0000' size='3' face='Arial, Helvetica, sans-serif'>Order Total: </font></strong></div></td>
                <td align='left' valign='top'><div align='right'><strong><font color='#FF0000' size='3' face='Arial, Helvetica, sans-serif'>\$$TotalS</font></strong></div></td>
              </tr>
            </table>
			";
			
			
# hide promo table if there is no promo code entered...
if($PromotionID != "")
{
$html .= "
			<br>
			<table width='100%' border='1' cellspacing='0' cellpadding='5'>
			<tr>
			  <td><font color='#0000FF' size='2' face='Arial, Helvetica, sans-serif'><strong>Promotion<br>
				<font color='#000000'>$promoNotes</font></strong></font></td>
			</tr>
			</table>
";
}

$html .= "
            <br> <table width='100%' border='1' cellspacing='0' cellpadding='4'>
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
            </table></td>
        </tr>
        <tr> 
          <td align='left' valign='top' bgcolor='#003399'> <p><font size='2' face='Arial, Helvetica, sans-serif'><strong><font color='#FFFFFF' size='3' face='Arial, Helvetica, sans-serif'>Shipping 
              Option:</font></strong><br>
              </font></p></td>
        </tr>
        <tr> 
          <td align='left' valign='top'><p><font size='2' face='Arial, Helvetica, sans-serif'>* ";

//if shipping to an office, put officeNotes here.  If not to an office, put shipping option here....
if($ShippingOption == "6")
{
	$html .= "$officeNotes";	
}
else
{
	$html .= "$ShippingName";
}

$html .= "<br>
              <br>
              </font></p></td>
        </tr>
      </table>
      
    </td>
  </tr>
</table>
";

//if($ShippingOption != "6") // if shipping to an office, DO NOT show the DHL shippign info...
//{
	//$html .= "<p><font size='2' face='Arial, Helvetica, sans-serif'>You will receive your tracking 
  //number in an email soon. Then you may go to <a href='http://www.dhl-usa.com'><strong>DHL</strong></a> 
  //to track your shipment.</font>";
//}

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
      
Order Summary:
$Num Timer(s) ordered.

Product: \$$totalProductS
Tax: $TaxS
Subtotal: $SubS
Shipping & Handling *: $ShippingS

ORDER TOTAL: \$$TotalS

";

# hide promo table if there is no promo code entered...
if($PromotionID != "")
{
$althtml .= "
Promotion Information
$promoNotes

";
}

$althtml .=
"Payment Method:
";
 
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
";
}

$althtml .= "
Shipping To:

$FirstName $LastName
$Address $Address2
$City, $State $ZipCode
$CountryName

Billing To:
";


if($Same != 'y')
{
$althtml .= "
$FirstNameB $LastNameB
$AddressB
$CityB, $StateB $ZipCodeB
$CountryNameB
";
}
else
{
$althtml .= "Same As Shipping";
}

$althtml .= 
"
Shipping Option:
";

//if shipping to an office, put officeNotes here.  If not to an office, put shipping option here....
if($ShippingOption == "6")
{
$althtml .= "$officeNotes";	
}
else
{
$althtml .= "$ShippingName";
}

if($ShippingOption != "6") // if shipping to an office, DO NOT show the DHL shippign info...
{
$althtml .="
You will receive your tracking number in an email soon. Then you may go to http://www.dhl-usa.com to track your shipment.";
}

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
$mail->AddAddress("erik@silenttimer.com", "Erik McMillan");
$mail->AddAddress("nina@silenttimer.com", "Christina Dilly");
$mail->IsHTML(false);
$mail->Subject = "$pID: $FirstName $LastName spent $$Total!";

$DetailedEmail =
"
Order Details ----------------------------

Shipping:          $ShippingName

Timer Price:       $price
Number Ordered:    $Num
Product Total:     $totalProduct
Tax:               $Tax
Shipping Cost:     $ShippingCost
Total Spent:       $Total

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


?>
     
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Your 
  Timer Receipt</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Thank you for your 
  order! Print this receipt for your records. You may use your order number to 
  track your shipment, so hold onto it!</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>You will receive 
  email verification of your order. <em><font color="#666666">Please be aware 
  your e-mail provider may filter your confirmation email as spam.</font></em></strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Don't forget to 
  download your time management guide.</strong></font></p>
<table width="48%" border="1" cellpadding="4" cellspacing="0" bordercolor="#000000">
  <tr>
    <td><p><font color="#FF3300" size="2" face="Arial, Helvetica, sans-serif"><strong><em>The 
        Silent Timer Time Management Guide</em></strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>File Name:</strong> 
        <em>ST_TimeManGuide_061405</em>.pdf<br>
        <strong>File Size:</strong> 235 KB </font><strong><font size="2" face="Arial, Helvetica, sans-serif"><br>
      <a href="guide/ST_TimeManGuide_061405.pdf" target="_blank">Click to Download</a></font></strong></p></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Please help spread
      the news of our product to your friends. <a href="../email/index.php" target="_blank">Visit
      our email page</a> to easily send a message to up to 5 of your testing
friends.</strong></font></p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Take our <a href="../survey/survey0525a.php">brief
      survey</a> and be entered to win a $20 gift certificate!</font></strong></p>
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
		
		
echo "<a href='print.php?wantreceipt=yes&cboNum=$Num&cboShippingOption=$ShippingOption&txtFirstName=$FirstName&txtLastName=$LastName&txtAddress=$R_Address&txtAddress2=$R_Address2&txtCity=$City&txtState=$State&txtZipCode=$ZipCode&CountryName=$CountryName&txtPhone=$Phone&txtEmail=$Email&chkSame=$Same&txtFirstNameB=$FirstNameB&txtLastNameB=$LastNameB&txtAddressB=$R_AddressB&txtCityB=$CityB&txtStateB=$StateB&txtZipCodeB=$ZipCodeB&CountryNameB=$CountryNameB&cboCardType=$CardType&LastFourCr=$LastFourCr&cboExpMonth=$ExpMonth&cboExpYear=$ExpYear&Tax=$Tax&Total=$Total&ProductPrice=$price&TotalProduct=$totalProduct&ShippingCompany=$ShippingCompany&ShippingName=$ShippingName&ShippingCost=$ShippingCost&TestName=$TestName&pID=$pID&OfficeNotes=$officeNotes&chkCheckPay=$isCheck&txtBankName=$BankName&AccountType=$AccountType&txtCheckRouting=$CheckRouting&txtCheckAccount=$CheckAccount&txtCheckNumber=$CheckNumber' target='_blank'>Click for a printable receipt</a>";
		
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
    <td width="60%" align="left" valign="top" bgcolor="#003399"> <p><strong><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">Shipping 
        to:</font></strong></p></td>
    <td width="40%" align="left" valign="top"><div align="center"><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>Order 
        Summary</strong></font> </div></td>
  </tr>
  <tr> 
    <td align="left" valign="top"><p><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><font color="#000000"><? echo $FirstName;?> 
        <? echo $LastName;?> </font></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><br>
        
		<? 
		   if($ShippingOption != "6") // don't show shipping address if going to a prep office for pick up.
		   {
		?>
		
		<? echo $Address;?> <br> <? if($Address2 != ""){echo $Address2."<br>";}?>
        <? echo $City;?> , <? echo $State;?> <? echo $ZipCode;?> 
		<br><? echo $CountryName;?></font></p>
      <p>
	  	<?
			} // end of if shipping address shouldn't be shown...
		?>
	  
	  <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Phone;?> 
        <br>
        <? echo $Email;?> </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
        <br>
        </font></p></td>
    <td width="40%" rowspan="3" align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
        <tr align="left" valign="top"> 
          <td colspan="2"> <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><em><strong><? echo $Num;?> 
              Timer 
              <? if($Num>1) {echo "s";}?>
              Ordered</strong></em></font></p></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif">Product:</font></td>
          <td align="right" valign="top"> <div align="right"><font face="Arial, Helvetica, sans-serif"><font size="2">$<font face="Arial, Helvetica, sans-serif"><? echo number_format($totalProduct,2);?></font></font></font></div></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif">Tax:</font></td>
          <td align="right" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($Tax,2);?></font></td>
        </tr>
        <tr> 
          <td></td>
          <td align="right" bgcolor="#000000"><img src=pics/transparent-pixel.gif width=1 height=1 vspace=0 hspace=0></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Subtotal:</strong></font></td>
          <td align="right" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($totalProduct + $Tax,2);?></font></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif">Shipping 
            &amp; Handling<em>*</em>:</font></td>
          <td align="right" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($ShippingCost,2);?></font></td>
        </tr>
        <tr> 
          <td colspan="2" bgcolor="#000000"><img src=pics/transparent-pixel.gif width=1 height=1 vspace=0 hspace=0></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><div align="left"><strong><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif">Order 
              Total: </font></strong></div></td>
          <td align="left" valign="top"><div align="right"><strong><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif">$<? echo number_format($Total,2);?></font></strong></div></td>
        </tr>
      </table>
	  
	  <?
		  # hide promo table if there is no promo code entered...
		  if($PromotionID != "")
			{
	  ?>
	  
		  <br>
		  <table width="100%" border="1" cellspacing="0" cellpadding="5">
			<tr>
			  <td><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong>Promotion<br>
				<font color="#000000"><? echo $promoNotes;?></font></strong></font></td>
			</tr>
		  </table>
	  <?
	  		} 
	  ?>
	  
      <br>
	  <table width="100%" border="1" cellspacing="0" cellpadding="4">
        <tr align="left" valign="top"> 
          <td> <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Payment 
              Method:<br></strong>
              
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
				
					<? echo $CardType;?>: ************<? echo $LastFourCr;?><br>
					Exp: <? echo $ExpMonth;?>/<? echo $ExpYear;?>
					
				<?
				}
				?>
			  
			  </font></p>
            <p><strong><font size="2" face="Arial, Helvetica, sans-serif">Billing 
              Address:<font color="#000000"><br>
              </font></font></strong> 
              <?
			  if($Same != "y")
			  {
			  ?>
              <font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><font color="#000000"><? echo $FirstNameB;?> 
              <? echo addQuote($LastNameB);?></font></font><font color="#000000"><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <? echo $AddressB;?><br>
              <? echo $CityB;?>, <? echo $StateB;?> <? echo $ZipCodeB;?>
			  <br><? echo $CountryNameB;?></font></font></p>
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
    <td align="left" valign="top" bgcolor="#003399"> <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">Shipping 
        Option:</font></strong><br>
        </font></p></td>
  </tr>
  <tr> 
    <td align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif">* 
        <? echo $ShippingCompany;?> 
        <? if($ShippingOption == "6"){echo $officeNotes;}else{echo $ShippingName;}?>
        <br>
        <br>
        </font></p></td>
  </tr>
</table>

<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000">Don't 
  Refresh This Browser Window</font></strong><br>
  Pressing your browsers refresh button will result in multiple charges to your 
  credit card. If you go to another page, do not press your browsers &quot;back 
  button&quot; to get back to this one. To be safe, after you print this page, 
  close the browser window.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Close this Browser 
  Window When Finished</strong><br>
  If you&#8217;re submitting this order on a public computer (as in a library 
  or at work), for your own security, please close this browser window once you 
  have completed the transaction. This will ensure the information you provided 
  is secure.</font></p>
  
  
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
	
	
	<!-- Begin Enhance Interactive Conversion Tracking Link --> 
		<img src="https://c.enhance.com/t?custid=135719&filltype=4" width="1" height="1" border="0"> 
	<!-- End Enhance Interactive Conversion Tracking Link -->


  
  	<?

			# Register a session for the Purchase.  #
			# This way if the page is refreshed they won't be charged TWICE! #
			session_register('purchase');
			$_SESSION['purchase'] = "y";
			
			
			mysql_close($link); // make sure to close connection to database!!!
  
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
<form action="index.php<? if($Custom=="yes"){echo "?a=$affiliateID";}?>" method="post" name="frmBack" id="frmBack">
  <div align="right"> 
		<input name='cboNum' type='hidden' id='cboNum3' value='<? echo "$Num";?>'>
		<input name='cboShippingOption' type='hidden' id='cboShippingOption2' value='<? echo "$ShippingOption";?>'>
		<!-- Shipping Address Info -->
		<input name='txtFirstName' type='hidden' id='txtFirstName2' value='<? echo "$FirstName";?>'>
		<input name='txtLastName' type='hidden' id='txtLastName2' value='<? echo "$LastName";?>'>
		<input name='txtAddress' type='hidden' id='txtAddress2' value='<? echo "$Address";?>'>
		<input name='txtAddress2' type='hidden' id='txtAddress2' value='<? echo "$Address2";?>'>
		<input name='txtCity' type='hidden' id='txtCity2' value='<? echo "$City";?>'>
		<input name='txtState' type='hidden' id='txtState2' value='<? echo "$State";?>'>
		<input name='txtState_Other' type='hidden' id='txtState_Other' value='<? echo "$State_Other";?>'>
		<input name='txtZipCode' type='hidden' id='txtZipCode' value='<? echo "$ZipCode";?>'>
		<input name='txtCountry' type='hidden' id='txtCountry' value='<? echo "$Country";?>'>
		<input name='CountryName' type='hidden' id='CountryName' value='<? echo "$CountryName";?>'>
		<input name='ForeignShipping' type='hidden' id='ForeignShipping' value='<? echo "$ForeignShipping";?>'>
		<input name='txtPhone' type='hidden' id='txtPhone2' value='<? echo "$Phone";?>'>
		<input name='txtEmail' type='hidden' id='txtEmail2' value='<? echo "$Email";?>'>
		<!-- Billing Address Info -->
		<input name='chkSame' type='hidden' id='chkSame2' value='<? echo "$Same";?>'>
		<input name='txtFirstNameB' type='hidden' id='txtFirstNameB2' value='<? echo "$FirstNameB";?>'>
		<input name='txtLastNameB' type='hidden' id='txtLastNameB2' value='<? echo "$LastNameB";?>'>
		<input name='txtAddressB' type='hidden' id='txtAddressB2' value='<? echo "$AddressB";?>'>
		<input name='txtCityB' type='hidden' id='txtCityB2' value='<? echo "$CityB";?>'>
		<input name='txtStateB' type='hidden' id='txtStateB2' value='<? echo "$StateB";?>'>
		<input name='txtState_OtherB' type='hidden' id='txtState_OtherB' value='<? echo "$State_OtherB";?>'>
	   	<input name='txtZipCodeB' type='hidden' id='txtZipCodeB' value='<? echo "$ZipCodeB";?>'>
		<input name='txtCountryB' type='hidden' id='txtCountryB' value='<? echo "$CountryB";?>'>
		<input name='CountryNameB' type='hidden' id='CountryNameB' value='<? echo "$CountryNameB";?>'>
		<!-- credit card info -->
		<input name='cboCardType' type='hidden' id='cboCardType2' value='<? echo "$CardType";?>'>
		<input name='txtCreditCardNo' type='hidden' id='txtCreditCardNo2' value='<? echo "$CreditCardNo";?>'>
		<input name='cboExpMonth' type='hidden' id='cboExpMonth2' value='<? echo "$ExpMonth";?>'>
		<input name='cboExpYear' type='hidden' id='cboExpYear2' value='<? echo "$ExpYear";?>'>
		<input name='txtCVV2' type='hidden' id='txtCVV22' value='<? echo "$CVV2";?>'>
		<!-- check info -->
          <input name='chkCheckPay' type='hidden' id='cboCardType' value='<? echo "$isCheck";?>'>
		  <input name='txtBankName' type='hidden' id='cboCardType' value='<? echo "$BankName";?>'>
          <input name='AccountType' type='hidden' id='txtCreditCardNo' value='<? echo "$AccountType";?>'>
          <input name='txtCheckRouting' type='hidden' id='cboExpMonth' value='<? echo "$CheckRouting";?>'>
          <input name='txtCheckAccount' type='hidden' id='cboExpYear' value='<? echo "$CheckAccount";?>'>
          <input name='txtCheckNumber' type='hidden' id='txtCVV2' value='<? echo "$CheckNumber";?>'>
		<!-- personal info -->
		<input name='cboTest' type='hidden' id='cboTest2' value='<? echo "$Test";?>'>
		<input name='txtTestDate' type='hidden' id='txtTestDate2' value='<? echo "$TestDate";?>'>
		<input name='txtSchool' type='hidden' id='txtSchool2' value='<? echo "$School";?>'>
		<input name='txtPrepClass' type='hidden' id='txtPrepClass2' value='<? echo "$PrepClass";?>'>
		<input name='cboReferredBy' type='hidden' id='cboReferredBy2' value='<? echo "$ReferredBy";?>'>
		
		<input name='txtPromotion' type='hidden' id='txtPromotion' value=''>
		<input name='txtOfficeCode' type='hidden' id='txtOfficeCode' value='<? echo "$OfficeCode";?>'>
		
		<!-- Customer agrees to our terms and conditions by checking here... -->
		<input name='Contract' type='hidden' id='Total2' value='<? echo "$Contract";?>'>
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
			
	<?
// ------- Order Declined, send notification to us with their email and name.
mail("info@silenttimer.com", "Declined Order", 
"
$now


Authorization: $auth
Code:          $Code
AVS:           $AVS
CVV2:          $CVV2Code


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
	
	
	
			######
			# CLOSE Purchase Session Check If Statement
				}
				else
				{
			#
			######
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
		  error and would actually like to place your order again, please <a href="index.php">click 
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