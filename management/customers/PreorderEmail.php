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
		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$Now = date("Y-m-d H:i:s");

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
						$sql2 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
						$result2 = mysql_query($sql2) or die("Cannot execute query!");
						
						while($row2 = mysql_fetch_array($result2))
						{
							$CompanyName = $row2[BusinessName];
							$FirstName = $row2[FirstName];
							$LastName = $row2[LastName];
							$Address = $row2[Address];
							$City = $row2[City];
							$State = $row2[State];
							$ZipCode = $row2[ZipCode];
							$Email = $row2[Email];
						}
						
		
	#Need to add second charge to tblPurchasePreorder, mark as Paid, move to Not Shipped List

	if ($_POST['Send'] == "Send")
	{
		
			$sql = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, 
			tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.CountryID, tblCustomer.BusinessName, 
			tblCustomer.StateOther, tblCustomer.Type, tblPurchase2.Subtotal, tblPurchase2.Tax, tblPurchase2.Discount, tblPurchase2.ShippingCost,
			tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblPurchase2.ShipNotes, tblPurchase2.Bonus,
			tblPurchase2.ShipCostID, tblPurchase2.Status, tblPurchase2.Shipped, tblPurchase2.CardType, tblPurchase2.LastFourCr,
			tblCustomer.Address, tblCustomer.Address2, tblCustomer.Email
			FROM tblCustomer INNER JOIN tblPurchase2
			ON tblPurchase2.CustomerID = tblCustomer.CustomerID
			WHERE tblPurchase2.Preorder = 'y' AND tblPurchase2.Status = 'active' AND tblCustomer.Type <> '5' AND tblCustomer.Type <> '6' AND tblCustomer.Type <> '8'
			AND tblPurchase2.Shipped = 'n' OR tblPurchase2.Preorder = 'y' AND tblPurchase2.Status = 'active' AND tblCustomer.Type <> '5' AND tblCustomer.Type <> '6' AND tblCustomer.Type <> '8'
			AND tblPurchase2.Shipped = 'p'";
		
			$result = mysql_query($sql) or die("Cannot execute customer");
		
			while($row = mysql_fetch_array($result))
				{
				$PurchaseID = $row['PurchaseID'];
				$CustomerID = $row['CustomerID'];
				$ShipCostID = $row['ShipCostID'];
				$Quantity = $row['Quantity'];
				$Email = $row['Email'];
				$FirstName = $row['FirstName'];
				$LastName = $row['LastName'];
				$Address = $row['Address'];
				$Address2 = $row['Address2'];
				$City = $row['City'];
				$State = $row['State'];
				$ZipCode = $row['ZipCode'];
				$CountryID = $row['CountryID'];
				$CompanyName = $row['BusinessName'];
				$StateOther = $row['StateOther'];
				$Subtotal = $row['Subtotal'];
				$Tax = $row['Tax'];
				$Discount = $row['Discount'];
				$ShippingCost = $row['ShippingCost'];
				$CardType = $row['CardType'];
				$LastFourCr = $row['LastFourCr'];
				$Bonus = $row['Bonus'];

				
				$sql6 = "SELECT * FROM tblPurchasePreorder WHERE PurchaseID = '$PurchaseID'";
				$result6 = mysql_query($sql6) or die("Cannot execute shipcostID!");
							
					while($row6 = mysql_fetch_array($result6))
					{
					$AmountCharged = $row6['Amount'];
					}
				
				$Total = $Subtotal + $Tax + $ShippingCost - $Discount;
				$BalanceTotal = $Total - $AmountCharged;
				
				$Balance = number_format($BalanceTotal,2);
				
				
					$sql2 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID'";
					$result2 = mysql_query($sql2) or die("Cannot execute shipcostID!");
							
							while($row2 = mysql_fetch_array($result2))
							{
							$ShipperID = $row2['ShipperID'];
							$ShippingOptionID = $row2['ShippingOptionID'];
							
							
									$sql3 = "SELECT * FROM tblShippingOption2 WHERE ShippingOptionID = '$ShippingOptionID'";
									$result3 = mysql_query($sql3) or die("Cannot execute shipping option!");
									
									
									while($row3 = mysql_fetch_array($result3))
									{
									$ShippingOption = $row3['ShippingOption'];
									$ShippingOptionNickname = $row3['Nickname'];
									}
							
									
									
									$sql4 = "SELECT * FROM tblShipper WHERE ShipperID = '$ShipperID'";
									$result4 = mysql_query($sql4) or die("Cannot execute shipper!");
									
									
									while($row4 = mysql_fetch_array($result4))
									{
									$Shipper = $row4['CompanyName'];
									$ShipperNickname = $row4['Nickname'];
									}
							
							}
						
			if($Bonus <> "y") {

			$mail = new PHPMailer();
			
			$mail->From = "eric@silenttimer.com";
			$mail->FromName = "The SilentTimer.com Team";
			$mail->AddAddress("$Email", "$FirstName $LastName");
			$mail->AddBCC("nina@silenttimer.com", "Christina McMillan");
			$mail->AddBCC("eric@silenttimer.com", "Eric Trevino");
			#$mail->AddAttachment("Guide/Time Management Guide.pdf");
			$mail->IsHTML(true);
			$mail->Subject = "SilentTimer.com Order #$PurchaseID - Preorder Ship Date";
		
			if($State == "ZZ"){$State = $State_Other;}
		
		////// - HTML BUILDING
		$html=
		"

			<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'
			'http://www.w3.org/TR/html4/loose.dtd'>
			<html>
			<head>
			<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
			<title>Preorder Ship Date</title>
			</head>
			
			<body>
			<p><font size='2' face='Arial, Helvetica, sans-serif'>$FirstName,</font></p>
			<p><font size='2' face='Arial, Helvetica, sans-serif'>Your preorder for <u>The
				  Silent Timer LSAT Bonus Combo</u> is ready for shipment
			  by<strong> Monday, September 11, 2006</strong>. Your card ($CardType with
			  last 4 digits of $LastFourCr) will be charged the remaining balance
			  of $$Balance by that date.</font></p>
			<p><font size='2' face='Arial, Helvetica, sans-serif'>The order will be shipped via $Shipper $ShippingOption to the following address:</font></p>
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
			<p><font size='2' face='Arial, Helvetica, sans-serif'>If you have any questions about your order or if you need to update your shipping
			  information, please let us know before Friday, September 8, 2006. Once your
			  order has been shipped, you will receive an email with a tracking number.</font></p>
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

		
		
				echo "SHOULD BE DONE for " .$FirstName ." " .$LastName ."!!!<br>";
				
				}
		
		}#end of main loop statement
		
		
		
		/*
		$sql4 = "UPDATE tblPurchase2
		SET Preorder = 'n'
		WHERE PurchaseID = '$PurchaseID'";
		$result4 = mysql_query($sql4) or die("Cannot update to paid and move to not shipped page");
		
		$sql5 = "UPDATE tblPurchaseDetails2
		SET Status = 'active'
		WHERE PurchaseID = '$PurchaseID' AND Status = 'preorder'";
		$result5 = mysql_query($sql5) or die("Cannot update product info to not shipped page");		
		
		$goto = "PreorderView.php";
		header("location: $goto");
		*/
		
	}


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";



		

?>
<p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Send
      Email to Customers </strong></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">This email tells customers the following:</font></p>
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#9900CC">
  <tr>
    <td><p><font size='2' face='Arial, Helvetica, sans-serif'>$FirstName,</font></p>
      <p><font size='2' face='Arial, Helvetica, sans-serif'>Your preorder for <u>The
            Silent Timer LSAT Bonus Combo</u> is ready for shipment by<strong> Monday,
            September 11, 2006</strong>. Your card ($CardType with last 4 digits
            of $LastFourCr) will be charged the remaining balance of $$Balance
            by that date.</font></p>
      <p><font size='2' face='Arial, Helvetica, sans-serif'>The order will be
          shipped via $Shipper $ShippingOption to the following address:</font></p>
      <blockquote>
        <p><font size='2' face='Arial, Helvetica, sans-serif'>$FirstName $LastName<br>
    $Address<br>
$Address2<br>
$City, $State $ZipCode</font></p>
      </blockquote>
      <p><font size='2' face='Arial, Helvetica, sans-serif'>If you have any questions
          about your order or if you need to update your shipping information,
          please let us know before Friday, September 8, 2006. Once your order
          has been shipped, you will receive an email with a tracking number.</font></p>
      <p><font size='2' face='Arial, Helvetica, sans-serif'>Contact me if you
          have any questions. Thanks!</font></p>
      <p><font size='2' face='Arial, Helvetica, sans-serif'>Eric Trevino<br>
  The SilentTimer.com Team<br>
                  <a href='http://www.silenttimer.com/'>www.SilentTimer.com</a><br>
  800-552-0325<br>
  <a href='mailto:eric@silenttimer.com'>eric@silenttimer.com</a></font></p></td>
  </tr>
</table>
<p align="left">&nbsp; </p>
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td><form name="form1" method="post" action="">
        <p>
          <input name="Send" type="submit" id="Send" value="Send">
          <font size="2" face="Arial, Helvetica, sans-serif">(Sends email to
          all preorder customers (does not include bulk customers)) <strong>PRESS ONLY
          ONCE!!!! </strong></font></p>
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
