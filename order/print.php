<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

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
		$ShippingOption = $_GET['cboShippingOption'];
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
			
		$Tax = $_GET['Tax'];
		$Total = $_GET['Total'];

		// get stuff from last page necessary for receipt...
		$price = $_GET['ProductPrice'];
		$totalProduct = $_GET['TotalProduct'];
		$ShippingCompany = $_GET['ShippingCompany'];
		$ShippingName = $_GET['ShippingName'];
		$ShippingCost = $_GET['ShippingCost'];
		$TestName = $_GET['TestName'];
		$pID = $_GET['pID'];
		
		$officeNotes = $_GET['OfficeNotes'];
		
	?>
<link href="../code/style.css" rel="stylesheet" type="text/css">

<table width="640" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="main"><p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Your 
        Timer Receipt</strong></font></p>
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
                <td align="right" valign="top"> <div align="right"><font face="Arial, Helvetica, sans-serif"><font size="2">$</font><font face="Arial, Helvetica, sans-serif"><font size="2"><? echo number_format($totalProduct,2);?></font></font></font></div></td>
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
                <td align="right" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($ShippingCost * $Num,2);?></font></td>
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
            <br> <table width="100%" border="1" cellspacing="0" cellpadding="4">
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
                    <? echo $LastNameB;?></font></font><font color="#000000"><font size="2" face="Arial, Helvetica, sans-serif"><br>
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
              <? if($ShippingOption == "6"){echo $officeNotes;}else{echo $ShippingName;}?><br>
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
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
?>
</p>
<p>&nbsp;</p>
