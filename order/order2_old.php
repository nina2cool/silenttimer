<?
//security for page
session_start();

//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");
$Custom = "no";

$PageTitle = "Step 2: Shipping Information";


# ------------------------------------------------------------------------------------------------------------
#   make sure host is secure! If it isn't, redirect to secure page.
# ------------------------------------------------------------------------------------------------------------

	$host = $HTTP_HOST; # current host (www.silenttimer.com OR secure.silenttimer.com)
	$page = $REQUEST_URI; # current page
	
	if($host!="secure.silenttimer.com")
	{
		$goto = "https://secure.silenttimer.com" . $page;
		header("location: $goto");
	}

# ------------------------------------------------------------------------------------------------------------
#  END check page for security.
# ------------------------------------------------------------------------------------------------------------

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

		


# link to DB for page calls to it.
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
# Remove item from cart

	$Remove=$_POST['remove'];
	$cLocation=$_POST['cart'];
		
	if($Remove == "y")
	{
		# code to search array and delete item from cart...
		for($i=0; $i < count($ShoppingCart); $i++)
		{
			if($i == $cLocation)
			{
				$ShoppingCart[$i][0] = "";
				$ShoppingCart[$i][1] = "";
				$ShoppingCart[$i][2] = "";
				
			}
		}
	}
	
	# Update Quantity in cart...

	$Update = $_POST['update'];
	$cLocation = $_POST['cart'];
	$Quantity = $_POST['quantity'];
	$Quantity = number_format($Quantity, 0);
	
	if($Update == "y")
	{
		# code to search array and update item quantity from cart...
		for($i=0; $i < count($ShoppingCart); $i++)
		{
			if($i == $cLocation)
			{
				if ($Quantity == '0')
				{
					$ShoppingCart[$i][0] = "";
					$ShoppingCart[$i][1] = "";
					$ShoppingCart[$i][2] = "";
					
				}
				else
				{
					if ($Quantity < 0)
					{
						$Quantity = $Quantity;
					}
					else
					{
						$tempProductID = $ShoppingCart[$i][0];
						
						$sql = "SELECT * FROM tblProductNew WHERE ProductID = $tempProductID";
						$result = mysql_query($sql) or die("Cannot get product info position $i!");
						$row = mysql_fetch_array($result);
						
						$tempWeight = $row[Weight];
						$ShoppingCart[$i][2] = ($tempWeight * $Quantity);
						$ShoppingCart[$i][1] = $Quantity;
					}
				}
			}
		}
	}
# check to see if cart is empty, if empty can't be on this page
		
		$e = 0;
		
		for($i=0; $i < count($ShoppingCart); $i++)
		{
			if($ShoppingCart[$i][0] != "")
			{
				$e = 1;
			}
		}
		
		if ( $e != 1)
		{
			header("location: https://www.silenttimer.com/product.php");
		}

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom2.php";




// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
<script>
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
	
	function CheckOrder()
	{
	
		//set error variable equal to 0
			var e = 0;
			var ship = "error";
			var test = 1;
			if (document.frmOrder.ShipCostID.length > 1 )
			{
				
				for (i=0; i < document.frmOrder.ShipCostID.length; i++)
				{
					
					if (document.frmOrder.ShipCostID[i].checked)
					{
						ship = document.frmOrder.ShipCostID[i].value;
										
					}
									
				}
			}
			else
			{
				if (document.frmOrder.ShipCostID.checked)
					{
						ship = document.frmOrder.ShipCostID.value;
											
					}
										
			}
						

			if (ship == "error")
			{
				e = 1;
			}
			// if an error occurs, don't submit form, and tell them what to fill in.
			if (e == 1) 
			{
				alert("Please choose a Shipping Option.");
				return false;
			}
			else //if all is clear, send them to next confirm page...
			{				
				return true;
			}
			
	}


	</script>
<? 

# --------------------------------------------------------------------------------------------
#   Function to take words in sentence and capitlize the first letters according to MLA Handbook!
# --------------------------------------------------------------------------------------------	
#
#   This function capitalizes the words in a title according to the MLA Handbook,
#   that is, no articles, prepositions, and conjunctions are capitalized. (I also
#   added any forms of the verb 'to be'.)
#
#   ex. the brown fox is too close  -->  The Brown Fox is too Close
#
#   Suggestion: If this function is called many times, move the first five lines
#   to the beginning of your php script and set $exceptions as a global.   */
#
#
function Capitalize($title, $delimiter = " ")
{

  /* Capitalizes the words in a title according to the MLA Handbook.
	 $delimiter parameter is optional. It is only needed if delimiter
	 is not a space.    */
	 
	$articles = 'a|an|the';
	$prepositions = 'aboard|above|according|across|against|along|around|as|at|because|before|below|beneath|beside|between|beyond|by|concerning|during|except|for|from|inside|into|like|near|next|of|off|on|out|outside|over|past|since|through|to|toward|underneath|until|upon|with';
	$conjunctions = 'and|but|nor|or|so|yet';
	$verbs = 'are|be|did|do|is|was|were|will';
	$exceptions = explode('|',$articles.'|'.$prepositions.'|'.$conjunctions.'|'.$verbs); 
	$words = explode($delimiter,$title);
	$lastWord = count($words)-1;   // first & last words are always capitalized
	$words[0] = ucfirst($words[0]);
	$words[$lastWord] = ucfirst($words[$lastWord]);
	for($i=1; $i<$lastWord; $i++) {
		if (!in_array($words[$i],$exceptions)) {
			$words[$i] = ucfirst($words[$i]);
			}
		}
	$newTitle = implode(' ',$words);
	return $newTitle;
}
#
# --------------------------------------------------------------------------------------------
	# --------------------------------------------------------------------------------------------
	#   Function to insert back slashes into characters with a single or a double quote in them.
	# --------------------------------------------------------------------------------------------

	function addQuote($var)
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
			$string = str_replace("'","\'",$var);
			$string = str_replace('"','\"',$string);
		}

		return $string;
	}
	# --------------------------------------------------------------------------------------------

// get info from other page 

		
			// --- *****
			// Grab all variables from order page and display for user.
				
				$ShipCostID = $_POST['ShipCostID'];
		   
			// -- Shipping Address Info -- ##
		
				$FirstName = Capitalize(strtolower(escapeQuote($_POST['txtFirstName'])));
				$LastName = Capitalize(strtolower(escapeQuote($_POST['txtLastName'])));
				$Address = Capitalize(strtolower(escapeQuote($_POST['txtAddress'])));
				$Address2 = Capitalize(strtolower(escapeQuote($_POST['txtAddress2'])));
				$City = Capitalize(strtolower(escapeQuote($_POST['txtCity'])));
				$State = $_POST['txtState'];
				$State_Other = Capitalize(strtolower(escapeQuote($_POST['txtState_Other'])));
				
				
				$Country = $_POST['txtCountry'];
				
				if($Country == '225' OR $Country == '241' OR $Country == '242' OR $Country == '243')
				{
				$ZipCode = escapeQuote($_POST['txtZipCode']);
				}
				else
				{
				$ZipCode = Capitalize(strtoupper(escapeQuote($_POST['txtZipCode'])));
				}
				
				$Phone = $_POST['txtPhone'];
				$Email = $_POST['txtEmail'];
				$Foreign = $_POST['ckForeignShipping'];
				$Military = $_POST['ckMilitary'];
				$POBox = $_POST['ckPOBox'];
		   
			// -- Billing Address Info -- ##
				$Same = $_POST['chkSame'];
				
				$FirstNameB = Capitalize(strtolower(escapeQuote($_POST['txtFirstNameB'])));
				$LastNameB = Capitalize(strtolower(escapeQuote($_POST['txtLastNameB'])));
				$AddressB = Capitalize(strtolower(escapeQuote($_POST['txtAddressB'])));
				$CityB = Capitalize(strtolower(escapeQuote($_POST['txtCityB'])));
				$StateB = $_POST['txtStateB'];
				$State_OtherB = Capitalize(strtolower(escapeQuote($_POST['txtState_OtherB'])));
				$CountryB = $_POST['txtCountryB'];
				
				if($CountryB == '225' OR $CountryB == '241' OR $CountryB == '242' OR $CountryB == '243')
				{
				$ZipCodeB = escapeQuote($_POST['txtZipCodeB']);
				}
				else
				{
				$ZipCodeB = Capitalize(strtoupper(escapeQuote($_POST['txtZipCodeB'])));
				}
				
				
				
		   
			// -- credit card info -- ##
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
		
			// -- personal info -- ##
				$Test = $_POST['cboTest'];
				$TestDate = $_POST['txtTestDate'];
				$TestMonth = $_POST['TestMonth'];
				$TestDay = $_POST['TestDay'];
				$TestYear = $_POST['TestYear'];
				$School = $_POST['txtSchool'];
				$PrepClass = escapeQuote($_POST['txtPrepClass']);
				$PrepClass2 = $_POST['txtPrepClass2'];
				$ReferredBy = $_POST['cboReferredBy'];
				
				$PromotionID = $_POST['txtPromotion'];
				$OfficeCode = $_POST['txtOfficeCode'];
				
				$Contract = $_POST['Contract'];
			

				$Weight = $ShoppingCart[0][3];
		
# link to DB for page calls to it.
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
			
?>

<table width="184" border="0" cellpadding="1" cellspacing="0">
  <tr> 
    <td width="30" valign="middle"><div align="center"><font face="Arial, Helvetica, sans-serif"><img src="pics/ssl_lock.gif" width="16" height="17" border="0">&nbsp;</font> 
        </div></td>
    <td width="150" valign="middle"><div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="#" onClick="MM_openBrWindow('secureorder.php','SecureOrder','scrollbars=yes,width=450,height=300')">Secure
              Order Form</a></strong></font></div></td>
  </tr>
</table>
<p><strong><font size="1" face="Arial, Helvetica, sans-serif">Step1: Shipping/ Billing Info </font><font size="1">| <font color="#FF0000" face="Arial, Helvetica, sans-serif">Step2: Select Shipping Option</font></font><font size="1" face="Arial, Helvetica, sans-serif"> | Step3: Payment Information | Step4: Submit Order</font> </strong></p>
<form action="order1.php" method="post" name="frmBack" id="frmBack">
<input name="Back" type="submit" id="Back" value="&lt; Go Back">
<input name='goback' type='hidden' id='goback' value='yes'>
<input name='weight' type='hidden' id='weight' value='<? echo "$Weight";?>'>
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
<input name='ckForeignShipping' type='hidden' id='ckForeignShipping' value='<? echo "$Foreign";?>'>
<input name='ckMilitary' type='hidden' id='ckMilitary' value='<? echo "$Military";?>'>
<input name='ckPOBox' type='hidden' id='ckPOBox' value='<? echo "$POBox";?>'>
<input name='txtPhone' type='hidden' id='txtPhone' value='<? echo "$Phone";?>'>
<input name='txtEmail' type='hidden' id='txtEmail' value='<? echo "$Email";?>'>
<!-- Billing Address Info -->
<input name='chkSame' type='hidden' id='chkSame' value='<? echo "$Same";?>'>
<input name='txtFirstNameB' type='hidden' id='txtFirstNameB' value='<? echo "$FirstNameB";?>'>
<input name='txtLastNameB' type='hidden' id='txtLastNameB' value='<? echo "$LastNameB";?>'>
<input name='txtAddressB' type='hidden' id='txtAddressB' value='<? echo "$AddressB";?>'>
<input name='txtCityB' type='hidden' id='txtCityB' value='<? echo "$CityB";?>'>
<input name='txtStateB' type='hidden' id='txtStateB' value='<? echo "$StateB";?>'>
<input name='txtState_OtherB' type='hidden' id='txtState_OtherB' value='<? echo "$State_OtherB";?>'>
<input name='txtZipCodeB' type='hidden' id='txtZipCodeB' value='<? echo "$ZipCodeB";?>'>
<input name='txtCountryB' type='hidden' id='txtCountryB' value='<? echo "$CountryB";?>'>
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
<!-- Customer agrees to our terms and conditions by checking here... -->
<input name='Contract' type='hidden' id='Contract' value='<? echo "$Contract";?>'>
</form>
<p><strong><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif">

  <input name="chkCart" type="checkbox" id="chkCart" value="y" onclick="visible('cart')" <? if ( $Update == "y" OR $Remove == "y" ) { echo " checked "; }  ?> >
  <font color="#000099" size="3">To View Shopping Cart </font><font color="#333333"><em>Check here.</em></font></font></strong></p>

 
 <div  id = "cart" style=" <? if ( $Update == "y" OR $Remove == "y" ) { echo " display: "; } else { echo "display: none";} ?> "> 
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000099">
  <tr bgcolor="#CCCCCC" >
    <td >
    <div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><strong>Qty</strong></font></div></td>
    <td ><strong><font color="#000099" size="2" face="Arial, Helvetica, sans-serif">Description</font></strong></td>
    <td >
    <div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><strong>Price</strong></font></div></td>
    <td >
    <div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><strong>Total</strong></font></div></td>
  </tr>
  <?
  	$DispShipOpt = 'n';
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
					$sql = "SELECT * FROM tblProductNew WHERE ProductID='$ProductID'";
					$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
					
					$DHLnum1 = 0;
					$USPSnum1 = 0;
					$Splitnum1 = 0;
					$Free1 = 0;
					
					while($row = mysql_fetch_array($result))
					{
						$ProductID = $row[ProductID];
						$ProductName = $row[ProductName];
						$ISBN = $row[ISBN];
						$Description = $row[Description];
						$Retail = $row[Retail];
						$OnlinePrice = $row[OnlinePrice];
						$RetailPrice = $row[RetailPrice];
						$WebInventory = $row[WebInventory];
						$ship = $row[Ship];
						$DHL = $row[DHL];
						$USPS = $row[USPS];
						$Split = $row[Split];
						$Free = $row[FreeShipping];
						
						if ($ship == 'y' ) 
						{
							$DispShipOpt = 'y';
						}
						
						# Some products cannot be shipped USPS, or not shipped DHL.  This is to find out if they can or cannot.
						
						if($DHL == 'y')
						{$DHLnum = 1;}
						else
						{$DHLnum = 0;}
						
						if($USPS == 'y')
						{$USPSnum = 1;}
						else
						{$USPSnum = 0;}
						
						
						if($Split == 'y')
						{$Splitnum = 1;}
						else
						{$Splitnum = 0;}
						
						
						
						
						//$Splitnum = 0;
						
						if($Free == 'y')
						{$Free = 0;}
						else{$Free = 1;}
						
						$DHLnum2 = $DHLnum3 + $DHLnum;
						$USPSnum2 = $USPSnum3 + $USPSnum;
						$Splitnum2 = $Splitnum3 + $Splitnum;
						$Free2 = $Free3 + $Free;

						
						
					# end while	
					}
					
				$DHLnum3 = $DHLnum1 + $DHLnum2;
				$USPSnum3 = $USPSnum1 + $USPSnum2;
				$Splitnum3 = $Splitnum1 + $Splitnum2;
				$Free3 = $Free1 + $Free2;
				
				//echo "DHL = " .$DHLnum3. "<br>";
				
				//echo "USPS = " .$USPSnum3. "<br>";
				
				//echo "Split = " .$Splitnum3. "<br>";
					//echo "1st= " .$Retail;
				//echo "Free = " .$Free3. "<br>";
					?>
  <tr>
    <td align="center"><font size="2">
	<form action="" method="post" name="frmUpdate" id="frmUpdate">
					  
					  <font size="2" face="Arial, Helvetica, sans-serif">
					<? # Check inventory for enough product
					$test = $Num_Ordered + 5;
					if ($WebInventory >= $test ){?>
					<input name="quantity" type="text" id="quantity" value="<? echo $Num_Ordered;?>" size="3">
					<? }
					else
					{
						$Num_Ordered = $WebInventory - 5; 
						$ShoppingCart[$i][1] = $Num_Ordered;
						$Extra = no; ?>
					<input name="quantity" type="text" id="quantity" value="<? echo $Num_Ordered;?>" size="3">
					<? } ?>
          			<input name="update" type="hidden" id="update" value="y">
          			<input name="cart" type="hidden" id="cart" value="<? echo $i;?>">
          			<br>
					<font color="#FF0000" face="Arial, Helvetica, sans-serif" size="2">
					<? if ($Extra != "" ){ ?>
		  </font>
					  <div align="center"><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong><? echo "There is not enough inventory to fill your request.";  ?> </strong></font></div>
		  <font size="2" face="Arial, Helvetica, sans-serif">
					<? } ?>
					<input name="Update" type="image" id="Update" value="Update" src="../images/cartupdate.jpg" alt="Update" width="81" height="26">
					<br>
         			<input name='goback' type='hidden' id='goback' value='yes'>
                    <input name='weight' type='hidden' id='weight' value='<? echo "$Weight";?>'>
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
                    <input name='ckForeignShipping' type='hidden' id='ckForeignShipping' value='<? echo "$Foreign";?>'>
                    <input name='ckMilitary' type='hidden' id='ckMilitary' value='<? echo "$Military";?>'>
                    <input name='ckPOBox' type='hidden' id='ckPOBox' value='<? echo "$POBox";?>'>
                    <input name='txtPhone' type='hidden' id='txtPhone' value='<? echo "$Phone";?>'>
                    <input name='txtEmail' type='hidden' id='txtEmail' value='<? echo "$Email";?>'>
                    <!-- Billing Address Info -->
                    <input name='chkSame' type='hidden' id='chkSame' value='<? echo "$Same";?>'>
                    <input name='txtFirstNameB' type='hidden' id='txtFirstNameB' value='<? echo "$FirstNameB";?>'>
                    <input name='txtLastNameB' type='hidden' id='txtLastNameB' value='<? echo "$LastNameB";?>'>
                    <input name='txtAddressB' type='hidden' id='txtAddressB' value='<? echo "$AddressB";?>'>
                    <input name='txtCityB' type='hidden' id='txtCityB' value='<? echo "$CityB";?>'>
                    <input name='txtStateB' type='hidden' id='txtStateB' value='<? echo "$StateB";?>'>
                    <input name='txtState_OtherB' type='hidden' id='txtState_OtherB' value='<? echo "$State_OtherB";?>'>
                    <input name='txtZipCodeB' type='hidden' id='txtZipCodeB' value='<? echo "$ZipCodeB";?>'>
                    <input name='txtCountryB' type='hidden' id='txtCountryB' value='<? echo "$CountryB";?>'>
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
                    <!-- Customer agrees to our terms and conditions by checking here... -->
                    <input name='Contract' type='hidden' id='Contract' value='<? echo "$Contract";?>'>
		  </font>
		</form>
		
		<form action="" method="post" name="frmRemove" id="frmRemove">
		<input name="Remove" type="image" id="Remove" value="Remove" src="../images/cartremove.jpg" alt="Remove" width="85" height="25">
		<input name="cart" type="hidden" id="cart" value="<? echo $i;?>">
		<input name="remove" type="hidden" id="remove" value="y">
                    <input name='weight' type='hidden' id='weight' value='<? echo "$Weight";?>'>
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
                    <input name='ckForeignShipping' type='hidden' id='ckForeignShipping' value='<? echo "$Foreign";?>'>
                    <input name='ckMilitary' type='hidden' id='ckMilitary' value='<? echo "$Military";?>'>
                    <input name='ckPOBox' type='hidden' id='ckPOBox' value='<? echo "$POBox";?>'>
                    <input name='txtPhone' type='hidden' id='txtPhone' value='<? echo "$Phone";?>'>
                    <input name='txtEmail' type='hidden' id='txtEmail' value='<? echo "$Email";?>'>
                    <!-- Billing Address Info -->
                    <input name='chkSame' type='hidden' id='chkSame' value='<? echo "$Same";?>'>
                    <input name='txtFirstNameB' type='hidden' id='txtFirstNameB' value='<? echo "$FirstNameB";?>'>
                    <input name='txtLastNameB' type='hidden' id='txtLastNameB' value='<? echo "$LastNameB";?>'>
                    <input name='txtAddressB' type='hidden' id='txtAddressB' value='<? echo "$AddressB";?>'>
                    <input name='txtCityB' type='hidden' id='txtCityB' value='<? echo "$CityB";?>'>
                    <input name='txtStateB' type='hidden' id='txtStateB' value='<? echo "$StateB";?>'>
                    <input name='txtState_OtherB' type='hidden' id='txtState_OtherB' value='<? echo "$State_OtherB";?>'>
                    <input name='txtZipCodeB' type='hidden' id='txtZipCodeB' value='<? echo "$ZipCodeB";?>'>
                    <input name='txtCountryB' type='hidden' id='txtCountryB' value='<? echo "$CountryB";?>'>
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
                    <!-- Customer agrees to our terms and conditions by checking here... -->
                    <input name='Contract' type='hidden' id='Contract' value='<? echo "$Contract";?>'>		
		</form>		
					</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><b><? echo $ProductName; ?></b></font></td>
    <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($OnlinePrice, 2); ?></font></div></td>
    <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$
            <? $ProductTotal = $Num_Ordered*$OnlinePrice;
					echo number_format($ProductTotal, 2);  ?>
    </font></div></td>
  </tr>
  <? 
				$TotalWeight += $ProductWeight;
				$Total += $ProductTotal;
				$Extra = "";
				# end if	
				}
				
			# end for	
			}
	$ShoppingCart[0][3] = $TotalWeight;
	$Weight = $ShoppingCart[0][3];
	$ShoppingCart[0][3];
?>

  <tr >
    <td colspan="3"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>Subtotal</strong></font> </td>
    <td>
    <div align="center"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($Total, 2);?></strong></font></div></td>
  </tr>
</table>
</div>

<? 
if ($DispShipOpt == 'n') 
{
?>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>The product being purchased is downloaded after checkout. Please continue by pressing 'Next >'.</strong></font> </p>
<form action="order3.php" method="post" name="frmorder3" id="frmorder3">
  <input name="Back" type="submit" id="Back" value="Next &gt;">
  <input name='goback' type='hidden' id='goback' value='yes'>
  <input name='weight' type='hidden' id='weight' value='<? echo "$Weight";?>'>
  <input name='ShipCostID' type='hidden' id='ShipCostID' value='36'>
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
  <input name='ckForeignShipping' type='hidden' id='ckForeignShipping' value='<? echo "$Foreign";?>'>
  <input name='ckMilitary' type='hidden' id='ckMilitary' value='<? echo "$Military";?>'>
  <input name='ckPOBox' type='hidden' id='ckPOBox' value='<? echo "$POBox";?>'>
  <input name='txtPhone' type='hidden' id='txtPhone' value='<? echo "$Phone";?>'>
  <input name='txtEmail' type='hidden' id='txtEmail' value='<? echo "$Email";?>'>
  <!-- Billing Address Info -->
  <input name='chkSame' type='hidden' id='chkSame' value='<? echo "$Same";?>'>
  <input name='txtFirstNameB' type='hidden' id='txtFirstNameB' value='<? echo "$FirstNameB";?>'>
  <input name='txtLastNameB' type='hidden' id='txtLastNameB' value='<? echo "$LastNameB";?>'>
  <input name='txtAddressB' type='hidden' id='txtAddressB' value='<? echo "$AddressB";?>'>
  <input name='txtCityB' type='hidden' id='txtCityB' value='<? echo "$CityB";?>'>
  <input name='txtStateB' type='hidden' id='txtStateB' value='<? echo "$StateB";?>'>
  <input name='txtState_OtherB' type='hidden' id='txtState_OtherB' value='<? echo "$State_OtherB";?>'>
  <input name='txtZipCodeB' type='hidden' id='txtZipCodeB' value='<? echo "$ZipCodeB";?>'>
  <input name='txtCountryB' type='hidden' id='txtCountryB' value='<? echo "$CountryB";?>'>
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
  <!-- Customer agrees to our terms and conditions by checking here... -->
  <input name='Contract' type='hidden' id='Contract' value='<? echo "$Contract";?>'>
  <input name='BusinessCustomerID' type = 'hidden' id='BusinessCustomerID' value='<? echo $BusinessCustomerIDS;?>'>
</form>

<?
}
else
{
?>
<?

if($Country == '225' OR $Country == '241' OR $Country == '242' OR $Country == '243')
{

//echo "2nd= " .$Retail;

if($Retail == 'y')
{

//echo "3rd= " .$Retail;

	# ------------------------------------------------------------------------------------------------------------
	#  ZIP CODE STORE LOOK UP!
	#  If person's shipping Zipcode is within 40 miles of a retail location... show them the stores!
	# ------------------------------------------------------------------------------------------------------------
		$Radius = 15;
		$StoreClose = "n";
	
		$zipOne = $ZipCode;
	
		include_once ("../include/db_mysql.inc");
		include_once ("../include/phpZipLocator.php");
		
		$db = new db_sql;
		$zipLoc = new zipLocator;
		$radius = $Radius;
		
		$zipArray = $zipLoc->inradius($zipOne,$radius);
		
		
	
				
		#echo "hello world<br><br>";
		
		for($i=1;$i < count($zipArray);$i++)
		{
			$sql = "SELECT * FROM tblBusinessCustomer WHERE ZipCode= '$zipArray[$i]' AND CustomerType = 'Bookstore' AND Status = 'active'";
			$result = mysql_query($sql) or die("Cannot pull Store Locations.  Please try again.");		
			while($row = mysql_fetch_array($result))
			{
				$StoreClose = "y";
				//$BusinessCustomerIDS = $row[BusinessCustomerID];
			}
		}
		
		
?>
<? 



if($StoreClose == "y"){?>

<br>
<table width="100%" border="0" cellpadding="2" cellspacing="0" >
  <tr>
    <td bgcolor="#000099"><p><strong><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"> Retail
            Store Availability</font></strong></p></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>You live near a
         store that sells our timer!</strong> Picking your timer up in the store
         will  be quick and easy. That way you can start studying with it now!
         <em>Call first to make sure they have timers in stock.</em>  Remember,
         the stores only carry the timer, not any other products. The following
stores are within <? echo $Radius; ?> miles of you:</font></p>

<form action="instore2.php?s=<? echo $BusinessCustomerIDS; ?>" method="post" name="frmStore" id="frmStore">

<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#003399">
          <tr bgcolor="#FFFFCC">
            <td  >
            <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Local
              Store</strong></font></div></td>
            <td >
            <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Distance</strong></font></div></td>
			<td >
            <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase
              In-Store</strong></font></div></td>
    </tr> 
  <?		
  		
	
		$db = new db_sql;
		$zipLoc = new zipLocator;
		$radius = $Radius;
		
		$TODAY = date("Y-m-d h:i:s");
		
		$zipArray = $zipLoc->inradius($zipOne,$radius);
		
		for($i=1;$i < count($zipArray);$i++)
		{
			$sql = "SELECT * FROM tblBusinessCustomer WHERE ZipCode= '$zipArray[$i]' AND CustomerType = 'Bookstore' AND Status = 'active'";
			$result = mysql_query($sql) or die("Cannot pull Store Locations.  Please try again.");		
			while($row = mysql_fetch_array($result))
			{
				$NameS = escapeQuote($row[Name]);
				$AddressS = escapeQuote($row[Address]);
				$Address2S = escapeQuote($row[Address2]);
				$Address3S = escapeQuote($row[Address3]);
				$CityS = escapeQuote($row[City]);
				$StateS = $row[State];
				$ZipCodeS = $row[ZipCode];
				$PhoneS = $row[Phone1];
				$WebsiteS = $row[Website];
				$BusinessCustomerIDS = $row[BusinessCustomerID];
				$Chain = escapeQuote($row[Chain]);
				$Rebate = $row[Rebate];
				
				
				
				$db = new db_sql;
				$zipDistance = new zipLocator;
				
				$distance = number_format($zipDistance->distance($zipOne,$ZipCodeS),2);
				
				if($distance == 0)
				{
					$distance = 0;
				}
				
				
				
				#insert information into tblDistance
				$sql2 = "INSERT INTO tblDistance(BusinessCustomerID, Name, Address, Address2, Address3, City, State, ZipCode, Phone, Website, Chain, Rebate, DateTime, IP, ZipCodeSearch, Distance)
				VALUES('$BusinessCustomerIDS', '$NameS', '$AddressS', '$Address2S', '$Address3S', '$CityS', '$StateS', '$ZipCodeS', '$PhoneS',
				'$WebsiteS', '$Chain', '$Rebate', '$TODAY', '$IP', '$zipOne', '$distance');";
				
				$result2 = mysql_query($sql2) or die("Cannot insert into tblDistance");
				
				
				
				
			}
			}
				 
				#recall information from tblDistance but sort by Distance
				$sql3 = "SELECT * FROM tblDistance WHERE DateTime = '$TODAY' AND IP = '$IP' AND ZipCodeSearch = '$zipOne' ORDER BY Distance ASC";
				
				//echo "<br><br>" .$sql3;
				
				$result3 = mysql_query($sql3) or die("Cannot pull distances.  Please try again.");		
				
				
				while($row3 = mysql_fetch_array($result3))
				{
					$NameS1 = $row3[Name];
					$AddressS1 = $row3[Address];
					$Address2S1 = $row3[Address2];
					$Address3S1 = $row3[Address3];
					$CityS1 = $row3[City];
					$StateS1 = $row3[State];
					$ZipCodeS1 = $row3[ZipCode];
					$PhoneS1 = $row3[Phone1];
					$WebsiteS1 = $row3[Website];
					$Chain1 = $row3[Chain];
					$BusinessCustomerIDS1 = $row3[BusinessCustomerID];
					$Rebate1 = $row3[Rebate];
					$Distance1 = $row3[Distance];
				
				
  ?>
  
  <tr>
    <td >
	<p>
		<?
		if($Chain1 <> '')
		{
		?>
		<font size="2" face="Arial, Helvetica, sans-serif">
			<strong>
				<font color="#666666" size="3">
					<font color="#000000" size="2"><? echo $Chain1; ?> - <? echo $NameS1;?></font><br>
			</font>
		  </strong>
		  <?
		  }
		  else
		  {
		  ?>
			<font size="2" face="Arial, Helvetica, sans-serif">
			<strong>
				<font color="#666666" size="3">
					<font color="#000000" size="2"><? echo $NameS1;?></font><br>
			</font>
		  </strong>
		  <?
		  }
		  ?>
			
			<? echo "$AddressS1";?><br>
			<? if($Address2S1 != ""){echo "$Address2S1<br>";}?>
			<? if($Address3S1 != ""){echo "$Address3S1<br>";}?>
			<? echo "$CityS1";?>, <? echo "$StateS1";?> <? echo "$ZipCodeS1";?><br>
			<strong><? echo "$PhoneS1";?><br></strong>
			<? if($WebsiteS != ""){?><a href="<? echo "$WebsiteS1";?>" target="_blank">Visit Online</a><? } ?>
		</font>
	</p></td>
	<td align="center">
      <p> <font size="2" face="Arial, Helvetica, sans-serif"> <em>~<? echo number_format($Distance1,1);?> 
        miles away from you<br>
        </em></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://us.rd.yahoo.com/maps/us/insert/Tmap/extmap%0D/*-http://maps.yahoo.com/maps_result?addr=<? echo $AddressS1;?>&csz=<? echo $CityS1;?>%2C+<? echo $StateS1;?>+<? echo $ZipCodeS1;?>&country=us" target="_blank">Map</a> 
        | <a href="http://us.rd.yahoo.com/maps/us/insert/Tmap/extDD/*-http://maps.yahoo.com/dd?taddr=<? echo $AddressS1;?>&tcsz=<? echo $CityS1;?>%2C+<? echo $StateS1;?>+<? echo $ZipCodeS1;?>&tcountry=us" target="_blank">Driving 
        Directions</a></font> </p>
    </td>
	<td align="center"><p>
	    <a href="instore2.php?s=<? echo $BusinessCustomerIDS1; ?>"><img src="pics/instore.jpg" width="146" height="58" border="0"></a>	    <br>
	      <?
	if($Rebate == 'y')
	{
	?>
	      <a href="rebate.php?rebate=<? echo $BusinessCustomerIDS1; ?>&zip=<? echo $ZipCode; ?>" target="_blank"><font size="2" face="Arial, Helvetica, sans-serif">Print
	    this form for
	    a <br>
	    $5 mail-in rebate for this store! </font></a>	</p>
	  <?
	}
	?></td>
  </tr>
  <?	
			}
			}
			
			
			$sql4 = "DELETE FROM tblDistance WHERE DateTime = '$TODAY' AND IP = '$IP' AND ZipCodeSearch = '$zipOne'";
			$result4 = mysql_query($sql4) or die("Cannot delete");
		
		
		
?>
</table>
<input name='goback' type='hidden' id='goback' value='yes'>
  <input name='weight' type='hidden' id='weight' value='<? echo "$Weight";?>'>
  <input name='ShipCostID' type='hidden' id='ShipCostID' value='36'>
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
  <input name='ckForeignShipping' type='hidden' id='ckForeignShipping' value='<? echo "$Foreign";?>'>
  <input name='ckMilitary' type='hidden' id='ckMilitary' value='<? echo "$Military";?>'>
  <input name='ckPOBox' type='hidden' id='ckPOBox' value='<? echo "$POBox";?>'>
  <input name='txtPhone' type='hidden' id='txtPhone' value='<? echo "$Phone";?>'>
  <input name='txtEmail' type='hidden' id='txtEmail' value='<? echo "$Email";?>'>
  <!-- Billing Address Info -->
  <input name='chkSame' type='hidden' id='chkSame' value='<? echo "$Same";?>'>
  <input name='txtFirstNameB' type='hidden' id='txtFirstNameB' value='<? echo "$FirstNameB";?>'>
  <input name='txtLastNameB' type='hidden' id='txtLastNameB' value='<? echo "$LastNameB";?>'>
  <input name='txtAddressB' type='hidden' id='txtAddressB' value='<? echo "$AddressB";?>'>
  <input name='txtCityB' type='hidden' id='txtCityB' value='<? echo "$CityB";?>'>
  <input name='txtStateB' type='hidden' id='txtStateB' value='<? echo "$StateB";?>'>
  <input name='txtState_OtherB' type='hidden' id='txtState_OtherB' value='<? echo "$State_OtherB";?>'>
  <input name='txtZipCodeB' type='hidden' id='txtZipCodeB' value='<? echo "$ZipCodeB";?>'>
  <input name='txtCountryB' type='hidden' id='txtCountryB' value='<? echo "$CountryB";?>'>
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
  <!-- Customer agrees to our terms and conditions by checking here... -->
  <input name='Contract' type='hidden' id='Contract' value='<? echo "$Contract";?>'>
  <input name='BusinessCustomerID' type = 'hidden' id='BusinessCustomerID' value='<? echo $BusinessCustomerIDS;?>'>

</form>

<?

}
?>


<p><font size="2" face="Arial, Helvetica, sans-serif">For locations that sell
    The Silent Timer&#8482;, you can also search our entire list of stores <a href="http://www.silenttimer.com/location_search.php" target="_blank">here</a>. <strong>If
    you prefer, continue your order online by selecting a shipping option below. </strong></font> 
</p>
<?		
		
		}
  ?>


<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><em>Please choose from the following delivery options available:</em></strong></font> 
</p>
<form action="order3.php<? if($Custom=="yes"){echo "?a=$affiliateID";}?>" method="post" name="frmOrder" id="frmOrder" onSubmit="return CheckOrder();">
<table width="100%" border="0" cellpadding="2" cellspacing="0" >
          <tr><td bgcolor="#000099"><p><strong><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"> 
          Shipping Options </font></strong></p></td></tr></table>
<p align="right"><em><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://silenttimer.com/timer/faq2.php?cat=9#86" target="_blank">Help!
        I don't know which to choose - DHL, USPS, or UPS?</a></font></em></p>
<p align="right"><em><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://webapps.usps.com/expressmailcommitments/landing.jsp?origin=78759" target="_blank">Will
      my USPS Overnight be one day or two?</a> </font></em></p>
<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#003399">
          <tr bgcolor="#FFFFCC">
            <td  >
            <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Shipper</strong></font></div></td>
            <td >
            <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Type</strong></font></div></td>
            <td ><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Cost</strong></font></div></td>
            <td width="15%"><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Select
                    Option </strong></font></div></td>
          </tr>          
		

<?
	
	if($Country == '225' OR $Country == '241' OR $Country == '242' OR $Country == '243')
	{
	
	/*
	OLD WAY TO DETERMINE IF THEY ARE IN AUSTIN
	##check zip for austinites
	$sql = "SELECT * FROM tblZipCode WHERE City = 'Austin' AND State = 'TX' AND ZipCode = $ZipCode";
	$result = mysql_query($sql) or die("Cannot get Zip.  Please try again.");
	$IsAustin = mysql_num_rows($result);
	*/
	
	
			#NEW WAY TO DETERMINE IF THEY ARE IN AUSTIN
			if($State == "TX")
			{
					
					if($City == "Austin" OR $City == "Cedar Park" OR $City == "Round Rock" OR $City == "Georgetown" OR $City == "Pflugerville"
					OR $City == "Buda" OR $City == "Leander" OR $City == "Lakeway" OR $City == "Waco" OR $City == "Wimberley")
					{
					$IsAustin = "y";
					}
					else
					{
					$IsAustin = "n";
					}
					
			}
	}
		
	# get total order weight
	
	$sql = "SELECT * FROM tblShipper WHERE Status = 'active'";
	if ($Country != 225){ $sql .= " AND International = 'y'";}
	if ($Military == "Military"){ $sql .= " AND Military = 'y'";}
	if ($POBox == "POBox") { $sql .= " AND POBox = 'y'";}
					
	//echo "<br>first = " .$sql;			
	//echo "<br>POBOX = " .$POBox;	
	
	if($DHLnum3 > '0' AND $USPSnum3 == 0 AND $Splitnum3 == 0 AND $POBox <> 'POBox')
		{
		//$tempShipper = 6;
		$sql .= " AND ShipperID = '6' ORDER BY CompanyName";
		//echo "<br>9 = " .$sql;
		}
	if($DHLnum3 > '0' AND $USPSnum3 == 0 AND $Splitnum3 == 0 AND $POBox == 'POBox')
		{
		//$tempShipper = 6;
		$sql .= " AND ShipperID = '8' AND ShippingOptionID = '13' ORDER BY CompanyName";
		//echo "<br>8 = " .$sql;
		}
	if($DHLnum3 > '0' AND $USPSnum3 > '0' AND $Splitnum3 == 0)
		{
		//$tempShipper = 6;
		$sql .= " ORDER BY CompanyName";
		//$sql2 .= " ORDER BY Cost";
		//echo "<br>2 = " .$sql;
		//$result2 = mysql_query($sql2) or die("Cannot get Shipping Options.  Please try again. $sql2");
		}
	
	if($DHLnum3 > '0' AND $USPSnum3 > '0' AND $Splitnum3 > '0' AND $POBox <> 'POBox')
		{
		$sql .= " ORDER BY CompanyName";
		//echo "<br>7 = " .$sql;
		$banana = 1;
		}
	if($DHLnum3 > '0' AND $USPSnum3 > '0' AND $Splitnum3 > '0' AND $POBox == 'POBox')
		{
		$sql .= " AND ShipperID = '8' ORDER BY CompanyName";
		//echo "<br>6 = " .$sql;
		$apple = 1;
		}
	if($DHLnum3 == 0 AND $USPSnum3 > '0' AND $Splitnum3 > '0')
		{
		$sql .= " AND ShipperID = '8' ORDER BY CompanyName";
		//echo "<br>5 = " .$sql;
		$apple = 1;
		}
	if($DHLnum3 > '0' AND $USPSnum3 == '0' AND $Splitnum3 > '0')
		{
		$sql .= " ORDER BY CompanyName";
		//echo "<br>4 = " .$sql;
		$banana = 1;
		}	
	if($DHLnum3 == 0 AND $USPSnum3 > '0' AND $Splitnum3 == 0)
		{
		$sql .= " AND ShipperID = '8' ORDER BY CompanyName";
		//$sql2 .= " ORDER BY Cost";
		//echo "<br>3 = " .$sql;
		//$result2 = mysql_query($sql2) or die("Cannot get Shipping Options.  Please try again. $sql2");
		}
	if($DHLnum3 == '0' AND $USPSnum3 == '0' AND $Splitnum == 0)
		{
		$sql .= " ORDER BY CompanyName";
		//echo "<br>10 = " .$sql;
		//$sql2 = " SELECT * FROM tblShippingCost5 WHERE ShipperID = $tempShipperID AND LocationID = $Country AND FromWeight <= $Weight AND ToWeight > $Weight AND ShippingOptionID != 10 AND Active = 'y'";
		//$sql2 .= " ORDER BY Cost";
		//echo "4 = " .$sql2;
		//$result2 = mysql_query($sql2) or die("Cannot get Shipping Options.  Please try again. $sql2");
		}
	/*
	else
		{
		$sql .= " ORDER BY CompanyName";
		}
	*/
	//$sql .= " ORDER BY CompanyName";
	
	//echo "<br>final sql = " .$sql;
	//echo "<br>apple = " .$apple;
	//echo "<br>banana = " .$banana;
	
	$result = mysql_query($sql) or die("Cannot get Shippers.  Please try again.");
	
	//echo $result;
	
	while($row = mysql_fetch_array($result))
	{
		$tempShipper= $row[CompanyName];
		$tempShipperID = $row[ShipperID];
		
		if($apple == 1)
		{
		$sql2 = "SELECT * FROM tblShippingCost5 WHERE ShipperID = $tempShipperID AND LocationID = $Country AND FromWeight <= $Weight AND ToWeight > $Weight AND ShippingOptionID = '13' AND Active = 'y'";
		$sql2 .= " ORDER BY Cost";
		//echo "<br> 5 = " .$sql2;
		//$result2 = mysql_query($sql2) or die("Cannot get Shipping Options.  Please try again. $sql2");
		}
		elseif($banana == 1)
		{
		$sql2 = "SELECT * FROM tblShippingCost5 WHERE ShipperID = $tempShipperID AND LocationID = $Country AND FromWeight <= $Weight AND ToWeight > $Weight AND ShippingOptionID != 10 AND ShippingOptionID <> 4 AND ShippingOptionID <> 5 AND ShippingOptionID <> 9 AND ShippingOptionID <> 12 AND Active = 'y'";
		$sql2 .= " ORDER BY Cost";
		//echo "<br>sql2 = " .$sql2;
		}
		else
		{
		$sql2 = "SELECT * FROM tblShippingCost5 WHERE ShipperID = $tempShipperID AND LocationID = $Country AND FromWeight <= $Weight AND ToWeight > $Weight AND ShippingOptionID <> 10 AND Active = 'y'";
		$sql2 .= " ORDER BY Cost";
		}
		
		$result2 = mysql_query($sql2) or die("Cannot get Shipping Options.  Please try again. $sql2");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$Type = $row2[ShippingOptionID];
			$Cost = $row2[Cost];
			$ShippingCostID = $row2[ShipCostID];
			#get type 
			
			if($Free3 == 0 AND $Type <> '2' AND $Type <> '3' AND $Type <> '5' AND $Type <> '7' AND $Type <> '8' AND $Type <> '9' AND $Type <> '10' AND $Type <> '11' AND $Type <> '12' AND $Type <> '13' AND $Type <> '15' AND $Type <> '16')
			{$Cost = 0;}
			else{$Cost = $Cost;}
			
			$sql99= "SELECT * FROM tblShippingOption2 WHERE ShippingOptionID = $Type AND Status = 'active'";
			$result99 = mysql_query($sql99) or die("Cannot get Type. Please try again. $sql99");
			$row99 = mysql_fetch_array($result99);
			$TypeDisplay = $row99[ShippingOption];
?>
		
			<tr valign = "center">
			<td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"> <strong><? echo $tempShipper; ?></strong></font></div></td>
			<td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><? echo $TypeDisplay; ?></font></div></td>
			<td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>
			  <? if ($Cost == '0') { ?>
			  <font color="#FF0000"> FREE </font>
			  <? } else { ?>
$ <? echo number_format($Cost,2); }?></strong></font></div></td>
			<td width="15%" valign="bottom"><div align="center"  >		      <p>
			      <label>
			      <input type="radio" name="ShipCostID" value="<? echo "$ShippingCostID";?>" <? if ($ShipCostID == $ShippingCostID){ echo "checked";} ?>>
    <font size="2" face="Arial, Helvetica, sans-serif">Select</font></label>
		        </p>
			  </div></td></tr>

<?
		
		}
		
	}
?>
    
<? if ( $ShippingCostID == "" ) { ?> <tr ><td colspan="4">  <div align="center"><font face="Arial, Helvetica, sans-serif"><? echo "Currently there are no shipping options to accomodate your order. <br><br> Please contact a sales representative at "; ?> <font color="#FF0000"><? echo "800-552-0325" ; ?></font> or<font color="#FF0000"><? echo " 512-340-0338"; ?> </font>
<? echo "so we can help you place your order."; ?></font></div></td>
</tr> <? } ?></table>
<br>
<?
$Now = date("Y-m-d");
				
				$sql = "SELECT * FROM tblNotice WHERE StartDate <= '$Now' AND EndDate >= '$Now' AND Order2 = 'y' AND Status = 'active' ORDER BY Priority ASC";
				$result = mysql_query($sql) or die("Cannot get notice");
				
				$Count = mysql_num_rows($result);
				
				if($Count > 0)
				{
				
						while($row = mysql_fetch_array($result))
						{
						$Notice = $row[Notice];
						
						
						?>
						<br><? echo $Notice; ?><br>
						<?
						}
				}
						?>
            <?
#if ($IsAustin >= 1)
if ($IsAustin == "y")
{ ### put in a self pick up option table
?>
<p></p>
<table width="100%" border="0" cellpadding="2" cellspacing="0" >
          <tr><td bgcolor="#000099"><p><strong><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"> 
          Pick Up Options </font></strong></p></td></tr></table>
<p><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Your
      shipping address indicates you live near our office. Select this option
      if you wish to avoid shipping charges by picking up your timer in person.
  Call our office at 512-340-0338 to arrange a pickup time.</font></strong></p>
 <table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#003399">
 <tr bgcolor="#FFFFCC">
            <td  >
      <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Type</strong></font></div></td>
            <td >
      <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Pick-up
            Location</strong></font></div></td>
      <td ><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Cost</strong></font></div></td>
      <td width="15%"><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Select
              Option </strong></font></div></td>
   </tr>        
 
			<tr valign = "center">
			<td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Pick
			        up</strong></font></div></td>
			<td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Silent
			      Technology LLC<br>
9111 Jollyville Road, Ste 245 <br>
Austin, TX 78759</font></div></td>
			<td><div align="center"><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong> FREE </strong></font></div></td>
			<td width="15%" valign="center"><div align="center" valign="center" >		      <p>
			      <label>
			      <input type="radio" name="ShipCostID" value="36" <? if ($ShipCostID == 36){ echo "checked";} ?> >
    <font size="2" face="Arial, Helvetica, sans-serif">Select</font></label>								
			</p></div>
			  </td></tr>

</table>
<?
}
?>
			<input name='order2' type='hidden' id='order2' value='yes'>
			
			<input name='goback' type='hidden' id='goback' value='yes'>
			<input name='weight' type='hidden' id='weight' value='<? echo "$Weight";?>'>
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
			<input name='ckForeignShipping' type='hidden' id='ckForeignShipping' value='<? echo "$Foreign";?>'>
			<input name='ckMilitary' type='hidden' id='ckMilitary' value='<? echo "$Military";?>'>
			<input name='ckPOBox' type='hidden' id='ckPOBox' value='<? echo "$POBox";?>'>
			<input name='txtPhone' type='hidden' id='txtPhone' value='<? echo "$Phone";?>'>
			<input name='txtEmail' type='hidden' id='txtEmail' value='<? echo "$Email";?>'>
			<!-- Billing Address Info -->
			<input name='chkSame' type='hidden' id='chkSame' value='<? echo "$Same";?>'>
			<input name='txtFirstNameB' type='hidden' id='txtFirstNameB' value='<? echo "$FirstNameB";?>'>
			<input name='txtLastNameB' type='hidden' id='txtLastNameB' value='<? echo "$LastNameB";?>'>
			<input name='txtAddressB' type='hidden' id='txtAddressB' value='<? echo "$AddressB";?>'>
			<input name='txtCityB' type='hidden' id='txtCityB' value='<? echo "$CityB";?>'>
			<input name='txtStateB' type='hidden' id='txtStateB' value='<? echo "$StateB";?>'>
			<input name='txtState_OtherB' type='hidden' id='txtState_OtherB' value='<? echo "$State_OtherB";?>'>
			<input name='txtZipCodeB' type='hidden' id='txtZipCodeB' value='<? echo "$ZipCodeB";?>'>
			<input name='txtCountryB' type='hidden' id='txtCountryB' value='<? echo "$CountryB";?>'>
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
			<!-- Customer agrees to our terms and conditions by checking here... -->
			<input name='Contract' type='hidden' id='Contract' value='<? echo "$Contract";?>'>
			<input name='BusinessCustomerID' type = 'hidden' id='BusinessCustomerID' value='<? echo $BusinessCustomerIDS;?>'>
			<br>
            <br>
            <input type="submit" name="Submit" value="Next &gt;" >
</form>
      
 
<br>
<?
	mysql_close($link);
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

	}
# end Dispshipopt else
}
?>