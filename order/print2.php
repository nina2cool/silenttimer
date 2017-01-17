<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

		// if not coming from the confirm page... send them back to order page...
		if ($_GET['wantreceipt'] != "yes")
		{
			header("location: index.php");
		}

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	# --------------------------------------------------------------------------------------------
	#   Function to insert back slashes into characters with a single or a double quote in them.
	# --------------------------------------------------------------------------------------------
	
	function removeBars($var)
	{
		if (isset($var))
		{
			$string = str_replace("||","'",$var);
			$string = str_replace('||||','"',$string);
		}

		return $string;
	}
	
	function removePound($var)
	{
		if (isset($var))
		{
			$string = str_replace("NUM","#",$var);
		}

		return $string;
	}
	# --------------------------------------------------------------------------------------------
	
	
	
	#<Confirm button being pushed>
	if ($_GET['wantreceipt'] == "yes")
	{
	
		// get all variables sent from page  ----------------------->>>>>>		
		$Num = $_GET['cboNum'];
		$ShipCostID = $_GET['ShipCostID'];
		$FirstName = removeBars($_GET['txtFirstName']);
		$LastName = removeBars($_GET['txtLastName']);
		$Address = removePound(removeBars($_GET['txtAddress']));
		$Address2 = removePound(removeBars($_GET['txtAddress2']));
		$City = removeBars($_GET['txtCity']);
		$State = $_GET['txtState'];
		$ZipCode = $_GET['txtZipCode'];
		$CountryName = $_GET['CountryName'];
		$Phone = $_GET['txtPhone'];
		$Email = $_GET['txtEmail'];
			
		$Same = $_GET['chkSame'];
		$FirstNameB = removeBars($_GET['txtFirstNameB']);
		$LastNameB = removeBars($_GET['txtLastNameB']);
		$AddressB = removePound(removeBars($_GET['txtAddressB']));
		$CityB = removeBars($_GET['txtCityB']);
		$StateB = $_GET['txtStateB'];
		$ZipCodeB = $_GET['txtZipCodeB'];
		$CountryNameB = $_GET['CountryNameB'];
			
		$CardType = $_GET['cboCardType'];
		$LastFourCr = $_GET['LastFourCr'];
		$ExpMonth = $_GET['cboExpMonth'];
		$ExpYear = $_GET['cboExpYear'];
		
		// -- check info -- ##
		$isCheck = $_GET['chkCheckPay'];
		$BankName = $_GET['txtBankName'];
		$AccountType = $_GET['AccountType'];
		$CheckRouting = $_GET['txtCheckRouting'];
		$CheckAccount = $_GET['txtCheckAccount'];
		$CheckNumber = $_GET['txtCheckNumber'];
			
		$TaxTotal = $_GET['Tax'];
		$Total = $_GET['Total'];

		// get stuff from last page necessary for receipt...
		$price = $_GET['ProductPrice'];
		$totalProduct = $_GET['TotalProduct'];
		$ShippingCompany = $_GET['ShippingCompany'];
		$ShippingName = $_GET['ShippingName'];
		$ShippingCost = $_GET['ShippingCost'];
		$TestName = $_GET['TestName'];
		$pID = $_GET['pID'];
		$Discount = $_GET['Discount'];
		$officeNotes = $_GET['OfficeNotes'];
		

		
		# link to Database...
			$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
			mysql_select_db($db) or die("Cannot select Database");				
	?>
	
<link href="../code/style.css" rel="stylesheet" type="text/css">

<table width="640" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td class="main"><p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Your
            Receipt</strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Thank you 
        for your order! Print this receipt for your records. You may use your 
        order number to track your shipment, so hold onto it! </strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>You will receive 
        email verification of your order. Also, don't forget to download your 
        copy of <em><font color="#000066">The Silent Timer Time Management Guide</font> 
        </em>when you close this window<em>. </em></strong></font></p>
      <p><strong><font size="2" face="Arial, Helvetica, sans-serif">Order Number: 
        </font></strong> <font color="#000099" size="3" face="Arial, Helvetica, sans-serif"><strong><? echo $pID;?></strong></font></p>
      <table width="100%" border="1" cellpadding="4" cellspacing="0" bordercolor="#003399">
        <tr><td width="60%" align="left" valign="top" bgcolor="#003399" colspan="2"><div align="center"> <p><strong><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">Order Summary</font></strong></p></div></td></tr>
		<tr ><td colspan="2">
		<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
        <tr bgcolor="#CCCCCC">
          <td >
          <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Qty</strong></font></div></td>
          <td ><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Description</font></strong></td>
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
	
	
	$GrandTotal = $Total + $Tax + $ShipCost - $Discount;
	
	
?>
        <tr >
          <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Subtotal</strong></font></td>
          <td>
            <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($Total, 2);?></strong></font></div></td>
        </tr>
		<? if ($Discount != 0){?> <tr >
          <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Discount</strong></font></td>
          <td>
          <div align="center"><font size="2" face="Arial, Helvetica, sans-serif" color="#FF0000"><strong>-$<? echo number_format($Discount, 2);?></strong></font></div></td>
        </tr><? } ?>
        <tr >
          <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Tax</strong></font></td>
          <td>
            <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($TaxTotal, 2);?></strong></font></div></td>
        </tr>
        <tr >
          <td colspan="3"><font  size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping Total</strong></font>
</td>
          <td><div align="center"><font  size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($ShipCost, 2);?></strong></font></div></td>
        </tr>
        <tr>
          <td colspan="3"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>Total</strong></font>
</td>
          <td><div align="center"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($GrandTotal, 2);?></strong></font></div></td>
        </tr>
      </table>
	  </td></tr>
		<tr> 
          <td width="60%" align="left" valign="top" bgcolor="#003399"> <p><strong><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">Shipping 
              to:</font></strong></p></td>
          <td width="40%" align="left" valign="top"><div align="center"><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong>Payment Summary</strong></font> </div></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName;?> <? echo $LastName;?> </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><br>
 
			  <? echo $Address;?> <br> <? if($Address2 != ""){echo $Address2."<br>";}?>
              <? echo $City;?> , <? echo $State;?> <? echo $ZipCode;?> 
			  <br><? echo $CountryName;?></font></p>
            <p>
			 
			<font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Phone;?> 
              <br>
              <? echo $Email;?> </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
              <br>
              </font></p></td>
          <td width="40%" rowspan="3" align="left" valign="top">            <table width="100%" border="1" cellspacing="0" cellpadding="4">
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
                      <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstNameB;?> <? echo $LastNameB;?></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><br>
                      <? echo $AddressB;?><br>
                      <? echo $CityB;?>, <? echo $StateB;?> <? echo $ZipCodeB;?> <br>
                      <? echo $CountryNameB;?></font></p>
                    <?
			  }
			  else
			  {
			  		echo "<font color='#003399' size='2' face='Arial, Helvetica, sans-serif'><font color='#000000'>Same As Shipping</font></font>";
			  }
			  ?>
                  </td>
                </tr>
          </table></td></tr>
        <tr> 
          <td align="left" valign="top" bgcolor="#003399"> <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">Shipping 
              Option:</font></strong><br>
              </font></p></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif">
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
              <br>
              </font></p></td>
        </tr>
      </table>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="javascript:window.close();">X 
        Close Receipt</a></font></p></td>
  </tr>
</table>
<p> 
  <?		
	}
	#</Confirm button being pushed>
	// this is the end of the else statement for the confirm button being pushed....
	
?>
  <?
  mysql_close($link);

// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
?>

