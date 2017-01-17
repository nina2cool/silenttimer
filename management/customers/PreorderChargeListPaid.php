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

require "../../code/class.phpmailer.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$CustomerID = $_GET['cust'];
	$PurchaseID = $_GET['purch'];

	$Now = date("Y-m-d H:i:s");

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "SELECT * FROM tblPurchase2 WHERE PurchaseID = '$PurchaseID'";
	//echo $sql;
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$Subtotal = $row[Subtotal];
		$Tax = $row[Tax];
		$Discount = $row[Discount];
		$ShippingCost = $row[ShippingCost];
		$IsCheck = $row[IsCheck];
		$Same = $row[SameAsShip];
		$FirstNameB = $row[FirstNameB];
		$LastNameB = $row[LastNameB];
		$AddressB = $row[AddressB];
		$CityB = $row[CityB];
		$StateB = $row[StateB];
		$ZipCodeB = $row[ZipB];
		
						$sql2 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
						$result2 = mysql_query($sql2) or die("Cannot execute query!");
						
						while($row2 = mysql_fetch_array($result2))
						{
							$FirstName = $row2[FirstName];
							$LastName = $row2[LastName];
							$Address = $row2[Address];
							$Address2 = $row2[Address2];
							$City = $row2[City];
							$State = $row2[State];
							$ZipCode = $row2[ZipCode];
							$Email = $row2[Email];
						}
						
						
						$sql3 = "SELECT * FROM tblPurchasePreorder WHERE PurchaseID = '$PurchaseID'";
						$result3 = mysql_query($sql3) or die("Cannot execute query!");
						
						while($row3 = mysql_fetch_array($result3))
						{
							$LastFourCr = $row3[LastFourCr];
							$CardType = $row3[CardType];
							$BankCode = $row3[BankCode];
							$DateTime = $row3[DateTime];
							$Amount = $row3[Amount];
						}

						
				
			if($Same == "y")
			{	
			$FirstNameB = $FirstName;
			$LastNameB = $LastName;
			$AddressB = $Address;
			$CityB = $City;
			$StateB = $State;
			$ZipCodeB = $ZipCode;
			}
		
		}
		
		$Total = $Subtotal + $Tax + $ShippingCost - $Discount;
		$Balance = $Total - $Amount;


	#Need to add second charge to tblPurchasePreorder, mark as Paid, move to Not Shipped List

	if ($_POST['Paid'] == "Mark as Paid")
	{

		$LastFourCr = $_POST['LastFourCr'];
		$CardType = $_POST['CardType'];
		$BankCode = $_POST['BankCode'];
		$DateCharged = $_POST['DateCharged'];
		$AmountCharged = $_POST['AmountCharged'];
		$AddressVerification = $_POST['AddressVerification'];
		$Receipt = $_POST['chkReceipt'];
		
		
		
		$sql3 = "INSERT INTO tblPurchasePreorder(PurchaseID, DateTime, Amount, CardType, LastFourCr, BankCode, AddressVerification,
		Status)
		VALUES('$PurchaseID', '$DateCharged', '$AmountCharged', '$CardType', '$LastFourCr', '$BankCode', '$AddressVerification',
		'paid');";
		$result3 = mysql_query($sql3) or die("Cannot insert charge data");

		$sql4 = "UPDATE tblPurchase2
		SET Paid = 'y',
		Preorder = 'n'
		WHERE PurchaseID = '$PurchaseID'";
		$result4 = mysql_query($sql4) or die("Cannot update to paid and move to not shipped page");
		
		$sql5 = "UPDATE tblPurchaseDetails2
		SET Status = 'active'
		WHERE PurchaseID = '$PurchaseID' AND Status = 'preorder'";
		$result5 = mysql_query($sql5) or die("Cannot update product info to not shipped page");		
		
		$sql6 = "UPDATE tblPurchasePreorder
		SET Status = 'paid'
		WHERE PurchaseID = '$PurchaseID' AND Status = 'active'";
		$result6 = mysql_query($sql6) or die("Cannot update product info to not shipped page");		


	if($Receipt == "y") 
	{
		
		
		$sql2 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
		$result2 = mysql_query($sql2) or die("Cannot execute query!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$FirstName = $row2[FirstName];
			$LastName = $row2[LastName];
			$Address = $row2[Address];
			$Address2 = $row2[Address2];
			$City = $row2[City];
			$State = $row2[State];
			$ZipCode = $row2[ZipCode];
			$Email = $row2[Email];
		}
		
		$AmountCharged = number_format($AmountCharged,2);
		//$Total = $Subtotal + $Tax + $ShippingCost - $Discount;
		//$Balance = $Total - $Amount;

			
		//mail("$Email, info@silenttimer.com", "Your SilentTimer.com Order is ready for shipment", "SilentTimer.com Purchase Number: Order #$PurchaseID\n\n$FirstName, \n\nYour Silent Timer LSAT Bonus Combo is ready for shipment.  Your $CardType card has been charged the remaining balance of $$AmountCharged.  It has been input into our system for shipment. When your order has been shipped, you will receive an email with your tracking number. Log into your account at http://www.silenttimer.com/customerservice/ to verify your shipping address.\n\nIf you have any questions or need help, please email us at info@silenttimer.com. We will be glad to help you!\n\nGood luck!\nThe Silent Timer Team\n1-800-552-0325\nwww.SilentTimer.com", "From:The Silent Timer Team<info@silenttimer.com>");
		
			
			$mail = new PHPMailer();
			
			$mail->From = "info@silenttimer.com";
			$mail->FromName = "The SilentTimer.com Team";
			$mail->AddAddress("$Email", "$FirstName $LastName");
			$mail->AddBCC("nina@silenttimer.com", "Silent Timer Orders");
			//$mail->AddBCC("erik@silenttimer.com", "Silent Timer Orders");
			#$mail->AddAttachment("Guide/Time Management Guide.pdf");
			$mail->IsHTML(true);
			$mail->Subject = "SilentTimer.com Order #$PurchaseID - Receipt";
		
			if($State == "ZZ"){$State = $State_Other;}
		
		////// - HTML BUILDING
		$html=
		"

			<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'
			'http://www.w3.org/TR/html4/loose.dtd'>
			<html>
			<head>
			<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
			<title>Untitled Document</title>
			</head>
			
			<body>
			<p><font size='2' face='Arial, Helvetica, sans-serif'>$FirstName,</font></p>
			<p><font size='2' face='Arial, Helvetica, sans-serif'>Your card ($CardType
			    with last 4 digits of $LastFourCr) has been charged the remaining
			    balance of $$AmountCharged.</font></p>
			<p><font size='2' face='Arial, Helvetica, sans-serif'>Your order will be shipped
			    to the following address within
			    one business day:</font></p>
			<blockquote>
			  <p><font size='2' face='Arial, Helvetica, sans-serif'>$FirstName $LastName<br>
				$Address<br>";
				
		if($Address2 <> "") {
		$html .= " 
			$Address2<br>
		";
			}
			
			$html .= "
				$City, $State $ZipCode</font></p>
			</blockquote>
			<p><font size='2' face='Arial, Helvetica, sans-serif'>Once your
			  order has been shipped, you will receive an email with a tracking
		      number.</font></p>
			<p><font size='2' face='Arial, Helvetica, sans-serif'>Contact me if you have any questions. Thanks!</font></p>
			<p><font size='2' face='Arial, Helvetica, sans-serif'>Eric Trevino<br>
			  The SilentTimer.com
				Team<br>
				<a href='http://www.silenttimer.com/'>www.SilentTimer.com</a><br>
			  800-552-0325<br>
			  <a href='mailto:eric@silenttimer.com'>eric@silenttimer.com</a></font></p>
			<p>&nbsp; </p>
			</body>
			</html>



		";
		////// - END HTML BUILDING
		
		
			$mail->Body = $html;
			$mail->AltBody = $althtml;
			
			if(!$mail->Send())
			{
			   echo "Email receipt could not be sent.<p>";
			   echo "Mailer Error: " . $mail->ErrorInfo;
			   exit;
			}
			
			echo "EMAIL HAS BEEN SENT!";

		
		}#end of Receipt = y
		
		
		
		?>
		<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customers/PreorderChargeList.php'>
		<?

		
	}





		

?>
<p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Mark
as Paid</strong></font></p>
<p align="left"><strong><font size="3" face="Arial, Helvetica, sans-serif">Customer:</font><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"> <font color="#FF0000"><? echo $FirstName; ?> <? echo $LastName; ?></font><br>
  </font><font size="3" face="Arial, Helvetica, sans-serif">PurchaseID:</font><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"> <font color="#FF0000"><? echo $PurchaseID; ?><br>
  </font></font><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>" target="_blank"><font size="1" face="Arial, Helvetica, sans-serif">(view
  cust info)
</font></a></strong></p>
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr valign="top">
    <td><font size="2" face="Arial, Helvetica, sans-serif">Billing Information:</font></td>
    <td>
	<p><font size="2" face="Arial, Helvetica, sans-serif">
	
	<? echo $FirstNameB; ?> <? echo $LastNameB; ?><br>
    <? echo $AddressB; ?><br>
    <? echo $CityB; ?>, <? echo $StateB; ?> <? echo $ZipCodeB; ?></font></p>
    </td>
  </tr>
  <tr valign="top">
    <td><font size="2" face="Arial, Helvetica, sans-serif">Preorder Purchase Date: </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font></td>
  </tr>
  <tr valign="top">
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Total Order
          Cost: </strong></font><font color="#00CC66" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
  Initially Charged:</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
  <font color="#FF0000">Balance Remaining: </font></strong></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>$ <font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo number_format($Total,2); ?></strong></font><font color="#00CC66"><br>
  $ <? echo number_format($Amount,2); ?></font></strong><br>
    </font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>$ <? echo number_format($Balance,2); ?></strong></font></td>
  </tr>
  <tr valign="top">
    <td><font size="2" face="Arial, Helvetica, sans-serif"> Authorization Code:</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <? if($IsCheck <> "y") { ?>
      <? echo $BankCode; ?>
      <? } else { ?>
    CHECK
    <? } ?>
    </font></td>
  </tr>
  <tr valign="top">
    <td><font size="2" face="Arial, Helvetica, sans-serif">Card Type &amp; Last
        4 Digits: </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CardType; ?> <? echo $LastFourCr; ?></font></td>
  </tr>
</table>
<p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="https://www.eprocessingnetwork.com/MSCLogin.html" target="_blank">Go to eProcessing Network</a></font></strong></p>
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
  <tr>
    <td><p align="left"><strong><font size="3" face="Arial, Helvetica, sans-serif">Charge
            the remaining amount $<? echo $Balance; ?> to their card:</font></strong></p>
      <form name="form1" method="post" action="">
        <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
          <tr>
            <td height="38"><font size="2" face="Arial, Helvetica, sans-serif">Charge
                Date: </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
              <input name="DateCharged" type="text" id="DateCharged5" value="<? echo $Now; ?>" size="15">
            </font></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Amount Charged:</font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#00CC66"> </font></strong> $
                  <input name="AmountCharged" type="text" id="AmountCharged4" value="<? echo number_format($Balance,2); ?>" size="5">
            </font></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> Authorization
                Code:</font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
              <input name="BankCode" type="text" id="BankCode5" value="AUTH/TKT " size="18">
            </font></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Card Type &amp; Last
                4 Digits: </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="CardType" class="text" id="select4">
                <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql5 = "SELECT CardType FROM tblPurchase2
						WHERE CardType <> 'amazon'
						GROUP BY CardType ORDER BY CardType ASC";
						//put SQL statement into result set for loop through records
						$result5 = mysql_query($sql5) or die("Cannot execute query!");
						
						while($row5 = mysql_fetch_array($result5))
						{
					?>
                <option value="<? echo $row5[CardType];?>" <? if($row5[CardType] == $CardType){echo "selected";}?>><? echo $row5[CardType];?></option>
                <?
						}
					?>
              </select>
              <input name="LastFourCr" type="text" id="LastFourCr5" value="<? echo $LastFourCr; ?>" size="4" maxlength="4">
            </font></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Address Verification: </font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
              <strong><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="AddressVerification" id="AddressVerification">
                <option selected>n/a</option>
                <option value="5 Digit Zip Matches - Address Does Not (Z)">5
                Digit Zip Matches - Address Does Not (Z)</option>
                <option value="9 Digit Zip Matches - Address Does Not (W)">9
                Digit Zip Matches - Address Does Not (W)</option>
                <option value="Address and Zip Code Do Not Match (N)">Address
                and Zip Code Do Not Match (N)</option>
                <option value="Address Matches - Zip Code Does Not (A)">Address
                Matches - Zip Code Does Not (A)</option>
                <option value="AVS Info Not Available (U)">AVS Info Not Available
                (U)</option>
                <option value="AVS Match 5 Digit Zip and Address (Y)">AVS Match
                5 Digit Zip and Address (Y)</option>
                <option value="AVS Match 9 Digit Zip and Address (X)">AVS Match
                9 Digit Zip and Address (X)</option>
                <option value="AVS Service Not Supported (S)">AVS Service Not
                Supported (S)</option>
                <option value="Non-Domestic AVS Info Not Available (G)">Non-Domestic
                AVS Info Not Available (G)</option>
                <option value="Reenter - AVS System Unavailable (R)">Reenter
                - AVS System Unavailable (R)</option>
                <option value="Unknown AVS Response (D)">Unknown AVS Response
                (D)</option>
              </select>
            </font></strong> </font></td>
          </tr>
        </table>
        <p>
          <strong><font color="#0000FF">
          <input name="chkReceipt" type="checkbox" id="chkReceipt" value="y" checked>
          <font size="2" face="Arial, Helvetica, sans-serif">          Send email notifying of shipment? </font></font></strong></p>
        <p>
          <input name="Paid" type="submit" id="Paid2" value="Mark as Paid">
          <font size="2" face="Arial, Helvetica, sans-serif">(marks customer
          as paid and moves them to Not Shipped List) </font></p>
      </form></td>
  </tr>
</table>
<p align="left">&nbsp;</p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="PreorderView.php">Back to
Preorder Customers</a></font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
				mysql_close($link);
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
