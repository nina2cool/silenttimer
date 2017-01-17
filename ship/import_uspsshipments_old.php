<?
# ---------------------------------------------------------------------------
#   Code to import shipments and send out tracking numbers/emails...
# ---------------------------------------------------------------------------

	# has database username and password, so don't need to put it in the page.
	require "../include/dbinfo.php";
	# declares class for emails...
	require "../code/class.phpmailer.php";
	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	#open up CSV Import file (read only)
	$handle = fopen ("shippingexport/usps2.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		$DateShipped = $data[0];
		$TransactionNumber = $data[1];
		$Service = $data[2];
		$LabelNumber = $data[3];
		$FirstName = $data[4];
		$LastName = $data[5];
		$City = $data[6];
		$State = $data[7];
		$Amount = $data[8];
		
		$D = date("Y-m-d");
		/*
		
		# split date up and put it into correct order for DB
		$month = substr($DateShipped, 0, 2);
		$day = substr($DateShipped, 2, 2);
		$year = substr($DateShipped, 4, 4);
		
		$D = $year . "-" . $month . "-" . $day;
		#$D = $DateShipped;
		
		### - end split date		
		*/
		
		$sql4 = "SELECT * FROM tblCustomer WHERE FirstName = '$FirstName' AND LastName = '$LastName' AND City = '$City' AND State = '$State'";
		$result4 = mysql_query($sql4) or die("Cannot get customerID.");
		
		$CustomerCount = mysql_num_rows($result4);
		
			if($CustomerCount <> '1')
			{
				echo "Customer ID Error - enter manually.";
			}
		else
		{
		#start of else when there is a customer in the database who matches
				
			while($row4 = mysql_fetch_array($result4))
			{
			$CustomerID = $row4[CustomerID];
			
				
				#find the purchases not shipped yet
				$sql5 = "SELECT * FROM tblPurchase2 WHERE CustomerID = '$CustomerID' AND Status = 'active' AND Shipped = 'n'";
				$result5 = mysql_query($sql5) or die("Cannot get customerID.");
			
				while($row5 = mysql_fetch_array($result5))
				{
				$PurchaseID = $row5[PurchaseID];
				$Shipped = $row5[Shipped];
				$ShipCostID = $row5[ShipCostID];
			
						#get shipperID
						$sql33 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID'";
						$result33 = mysql_query($sql33) or die("Cannot Find ShipperID in tblShippingCost5!");
						
							while($row33 = mysql_fetch_array($result33))
							{
							$ShipperID = $row33[ShipperID];
							}
						
						#insert info into tblShipment3	
						$sqlzz = "INSERT INTO tblShipment3
						(PurchaseID, DateTime, ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID) 
						VALUES ('$PurchaseID', '$D', 'y', '$LabelNumber', '$Amount', '$ShipCostID')";
						mysql_query($sqlzz) or die("Cannot insert Shipment3");

						#insert info into tblShipment2						
						$sql22 = "INSERT INTO tblShipment2
						(PurchaseID, DateTime, ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID) 
						VALUES ('$PurchaseID', '$D', 'y', '$LabelNumber', '$Amount', '$ShipCostID')";
						mysql_query($sql22) or die("Cannot insert Shipment2");
				
						
						#update tblShipment3 with ShipperID
						$sql11 = "SELECT * FROM tblShipment3 WHERE PurchaseID = '$PurchaseID' AND TrackingNumber = '$LabelNumber'";
						$result11 = mysql_query($sql11) or die("Cannot Find ShipperID in tblShipment3!");
				
							while($row11 = mysql_fetch_array($result11))
							{
							$ShipmentID = $row11[ShipmentID];

									$sql555 = "UPDATE tblShipment3
									SET ShipperID = '$ShipperID'
									WHERE ShipmentID = '$ShipmentID'";
									$result555 = mysql_query($sql555) or die("Cannot update Shipper ID!");
							}
			
						$sql6 = "UPDATE tblPurchase2
						SET Shipped = 'y'
						WHERE PurchaseID = '$PurchaseID'";
						$result6 = mysql_query($sql6) or die("Cannot update Shipped in tblPurchaseDetails2!");
						//echo $sql6;
		

						$sql9 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Shipped = 'n'";
						//put SQL statement into result set for loop through records
						$result9 = mysql_query($sql9) or die("Cannot execute query!");
						
						while($row9 = mysql_fetch_array($result9))
						{
						$DetailID = $row9[DetailID];
						$Quantity = $row9[Quantity];
						$ProductID = $row9[ProductID];


								$sql88 = "UPDATE tblPurchaseDetails2
								SET Shipped = 'y'
								WHERE PurchaseID = '$PurchaseID'";
								$result88 = mysql_query($sql88) or die("Cannot update tblProduct!");
			
			
								$sql12 = "INSERT INTO tblShipmentProduct
								(ShipmentID, DetailID, Quantity, Complete) 
								VALUES ('$ShipmentID', '$DetailID', '$Quantity', 'y')";
								mysql_query($sql12) or die("Cannot insert ShipmentProduct");
				
				
								$sql8 = "UPDATE tblProductNew
								SET OnHand = OnHand - $Quantity,
								WHERE ProductID = '$ProductID'";
								$result8 = mysql_query($sql8) or die("Cannot update tblProduct!");
							
							
						}#end else for getting product detail information
				}#end else where customerID = customerID in tblPurchase2
			}#end of else for finding customer info that matches the customers that were shipped
		}#end of else for data gathering
		
/*
		
		# ---------------------------------------------------------------------------------------
		# send out email with tracking info to customer...get their email and name info first...
		# ---------------------------------------------------------------------------------------
		
			$sql = "SELECT tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.Address, tblCustomer.Address2, tblCustomer.City, 
					tblCustomer.State, tblCustomer.ZipCode, tblCustomer.Email, tblCustomer.Type, tblCustomer.BusinessName, 
					tblPurchase.PaypalNumber, tblPurchase.EbayItemNumber 
					FROM tblCustomer INNER JOIN tblPurchase ON tblCustomer.CustomerID = tblPurchase.CustomerID 
					WHERE PurchaseID = '$PurchaseID'";
			
			#echo "<br>$sql<br>";
			
			$result = mysql_query($sql) or die("Cannot retrieve Customer Info, please try again.");
		
			while($row = mysql_fetch_array($result))
			{
				$FirstName = $row[FirstName];
				$LastName = $row[LastName];
				$BusinessName = $row[BusinessName];
				$Email = $row[Email];
				$Type = $row[Type];
				$Address = $row[Address];
				$Address2 = $row[Address2];
				$City = $row[City];
				$State = $row[State];
				$Zip = $row[ZipCode];
				
				$PaypalNumber = $row[PaypalNumber];
				$ItemNumber = $row[EbayItemNumber];
			}
	

# If customer type is web, then send simple polite email.  
# If it is bulk, send more professional email.  
# If it is a sample, send simple, professional email.

if($Type == "web")
{
	$mail = new PHPMailer();
	
	$mail->From = "info@silenttimer.com";
	$mail->FromName = "Silent Technology LLC";
	$mail->AddAddress("$Email", "$FirstName $LastName");
	$mail->AddBCC("info@silenttimer.com", "Silent Timer Shipment");
	$mail->IsHTML(true);
	$mail->Subject = "Silent Timer Shipment - $FirstName $LastName # $PurchaseID";

$html =
"
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<title>Silent Timer Shipment</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>

<body>
<table width='100%' border='1' cellpadding='1' cellspacing='0' bordercolor='#003399'>
  <tr>
    <td align='left' valign='top'>
		<table width='100%' border='0' cellspacing='0' cellpadding='3'>
        <tr> 
          <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
              <tr> 
                <td width='49%' align='left' valign='top'><p><font size='3' face='Arial, Helvetica, sans-serif'><strong>The 
                    <font color='#0000FF'>Silent</font> Timer&#8482;<br>
                    </strong> <font size='2'>Shipment Notification</font></font></p>
                  </td>
                <td width='51%' align='right' valign='top'> <div align='right'>
                    <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'><strong>Shipped 
                      To:</strong></font></p>
                    <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'> 
                      $FirstName $LastName<br>
                      $Address $Address2<br>
                      $City, $State $Zip</font></p>
                    </div></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr> 
          <td><p><font color='#000000' size='3' face='Arial, Helvetica, sans-serif'><strong><em>$FirstName</em></strong></font><font size='2' face='Arial, Helvetica, sans-serif'>,</font></p>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>Your shipment 
              is on the way! Items Shipped:</font></p>
            <table width='100%' border='1' cellpadding='2' cellspacing='0' bordercolor='#CCCCCC'>
              <tr> 
                <td width='48%'><strong><font size='2' face='Arial, Helvetica, sans-serif'>Product</font></strong></td>
                <td width='52%'><div align='left'><strong><font size='2' face='Arial, Helvetica, sans-serif'>Quantity</font></strong></div></td>
              </tr>
              <tr> 
                <td><font size='2' face='Arial, Helvetica, sans-serif'>The Silent 
                  Timer</font></td>
                <td><div align='left'><font size='2' face='Arial, Helvetica, sans-serif'>$NumOrdered</font></div></td>
              </tr>
            </table>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>DHL Tracking Number: <strong>$TrackingNumber</strong></font></p>
            <p><font size='2' face='Arial, Helvetica, sans-serif'><strong>Click 
              here to track your shipment: </strong><strong><a href='http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber'><br>
              </a></strong><a href='http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber'>http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber</a> 
              (copy and paste into your browser if you cannot click) </font></p>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>Thank you, good 
              luck studying for your test! </font></p>
            <p><font color='#FF3300' size='2' face='Arial, Helvetica, sans-serif'><font color='#000000'><strong><font color='#FF3300'>Silent 
              Technology LLC</font></strong></font></font><font color='#FF3300' size='2' face='Arial, Helvetica, sans-serif'></font><font size='2' face='Arial, Helvetica, sans-serif'><br>
              <a href='http://www.SilentTimer.com'>http://www.SilentTimer.com</a><br>
              <a href='mailto:info@silenttimer.com'>info@silenttimer.com</a><br>
              800.552.0325</font></p>
            </td>
        </tr>
      </table>
   </td>
  </tr>
</table>
</body>
</html>
";




$alt_html = 
"The Silent Timer
Shipment Notification

Shipped To:

$FirstName $LastName
$Address $Address2
$City, $State $Zip

$FirstName,

Your Shipment is on the way. Items shipped:

Product                      Quantity
The Silent Timer              $NumOrdered

DHL tracking number: $TrackingNumber
Track Shipment: http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber (copy and paste into your browser if you cannot click)

Thank you, good luck studying for your test!

Silent Technology LLC
http://www.SilentTimer.com<br>
info@silenttimer.com<br>
800.552.0325
";

	
	$mail->Body = $html;
	$mail->AltBody = $alt_html;
	
	if(!$mail->Send())
	{
	   echo "Email receipt could not be sent.<p>";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}

} #end of web customer email...
else if($Type == "ebay")
{

	$mail = new PHPMailer();
	
	$mail->From = "info@silenttimer.com";
	$mail->FromName = "Silent Technology LLC";
	$mail->AddAddress("$Email", "$FirstName $LastName");
	$mail->AddBCC("info@silenttimer.com", "Silent Timer Shipment");
	$mail->IsHTML(true);
	$mail->Subject = "eBay - Silent Timer Shipment - $FirstName $LastName # $PurchaseID";

$html =
"
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<title>Silent Timer Shipment</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>

<body>
<table width='100%' border='1' cellpadding='1' cellspacing='0' bordercolor='#003399'>
  <tr>
    <td align='left' valign='top'>
		<table width='100%' border='0' cellspacing='0' cellpadding='3'>
        <tr> 
          <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
              <tr> 
                <td width='49%' align='left' valign='top'><p><font size='3' face='Arial, Helvetica, sans-serif'><strong>The 
                    <font color='#0000FF'>Silent</font> Timer&#8482;<br>
                    </strong> <font size='2'>Shipment Notification</font></font></p>
                  <p align='center'><font size='2' face='Arial, Helvetica, sans-serif'>Thank 
                    you for your <br>
                    <em><strong><font size='3'>eBay</font></strong></em> purchase!</font></p></td>
                <td width='51%' align='right' valign='top'> <div align='right'>
                    <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'><strong>Shipped 
                      To:</strong></font></p>
                    <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'> 
                      $FirstName $LastName<br>
                      $Address $Address2<br>
                      $City, $State $Zip</font></p>
                    </div></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr> 
          <td><p><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'><strong><em>$FirstName</em></strong></font><font size='2' face='Arial, Helvetica, sans-serif'>,</font></p>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>Your shipment 
              is on the way. Items shipped:</font></p>
            <table width='100%' border='1' cellpadding='2' cellspacing='0' bordercolor='#CCCCCC'>
              <tr> 
                <td width='48%'><strong><font size='2' face='Arial, Helvetica, sans-serif'>Product</font></strong></td>
                <td width='52%'><div align='left'><strong><font size='2' face='Arial, Helvetica, sans-serif'>Quantity</font></strong></div></td>
              </tr>
              <tr> 
                <td><font size='2' face='Arial, Helvetica, sans-serif'>The Silent 
                  Timer</font></td>
                <td><div align='left'><font size='2' face='Arial, Helvetica, sans-serif'>$NumOrdered</font></div></td>
              </tr>
            </table>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>DHL Tracking Number: <strong>$TrackingNumber</strong></font></p>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>Click here to 
              track your shipment: <a href='http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber'></a><strong><a href='http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber'><br>
              http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber</a></strong></font></p>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>Thank you, good 
              luck studying for your test!</font></p>
            <p><font color='#FF3300' size='2' face='Arial, Helvetica, sans-serif'><font color='#000000'>Silent 
              Technology LLC</font></font><font size='2' face='Arial, Helvetica, sans-serif'><br>
              <a href='http://www.SilentTimer.com'>http://www.SilentTimer.com</a><br>
              <a href='mailto:info@silenttimer.com'>info@silenttimer.com</a><br>
              800.552.0325</font></p>
            </td>
        </tr>
      </table>
   </td>
  </tr>
</table>
</body>
</html>
";


$alt_html = 
"The Silent Timer
eBay Shipment Notification

Shipped To:

$FirstName $LastName
$Address $Address2
$City, $State $Zip

$FirstName,

Your Shipment is on the way. Items shipped:

Product                      Quantity
The Silent Timer              $NumOrdered

DHL tracking number: $TrackingNumber
Track Shipment: http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber

Thank you, good luck studying for your test!

Silent Technology LLC
http://www.SilentTimer.com<br>
info@silenttimer.com<br>
800.552.0325
";

	$mail->Body = $html;
	$mail->AltBody = $alt_html;
	
	if(!$mail->Send())
	{
	   echo "Email receipt could not be sent.<p>";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}

}#end of ebay customer email...
else if($Type == "bulk")
{

	$mail = new PHPMailer();
	
	$mail->From = "info@silenttimer.com";
	$mail->FromName = "Silent Technology LLC";
	$mail->AddAddress("$Email", "$FirstName $LastName");
	$mail->AddBCC("info@silenttimer.com", "Silent Timer Shipment");
	$mail->IsHTML(true);
	$mail->Subject = "Silent Timer Shipment - Order # $PurchaseID";

$html = 
"
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<title>Silent Timer Shipment</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>

<body>
<table width='100%' border='1' cellpadding='1' cellspacing='0' bordercolor='#003399'>
  <tr>
    <td align='left' valign='top'>
		<table width='100%' border='0' cellspacing='0' cellpadding='3'>
        <tr> 
          <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
              <tr> 
                <td width='49%' align='left' valign='top'><font size='3' face='Arial, Helvetica, sans-serif'><strong>The 
                  <font color='#0000FF'>Silent</font> Timer&#8482;<br>
                  </strong> <font size='2'>Shipment Notification</font></font></td>
                <td width='51%' align='right' valign='top'> <div align='right'>
                    <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'><strong>Shipped 
                      To:</strong></font></p>
                    <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'>$BusinessName<br>
                      $FirstName $LastName<br>
                      $Address $Address2<br>
                      $City, $State $Zip</font></p>
                  </div></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr> 
          <td><p><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'><strong><em>$FirstName</em></strong></font><font size='2' face='Arial, Helvetica, sans-serif'>,</font></p>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>Your shipment 
              is on the way. Items shipped: </font></p>
            <table width='100%' border='1' cellpadding='2' cellspacing='0' bordercolor='#CCCCCC'>
              <tr> 
                <td width='34%'><strong><font size='2' face='Arial, Helvetica, sans-serif'>Title</font></strong></td>
                <td width='42%'><strong><font size='2' face='Arial, Helvetica, sans-serif'>ISBN</font></strong></td>
                <td width='24%'><div align='center'><strong><font size='2' face='Arial, Helvetica, sans-serif'>Quantity</font></strong></div></td>
              </tr>
              <tr> 
                <td><font size='2' face='Arial, Helvetica, sans-serif'>The Silent 
                  Timer</font></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>0-9753503-0-7</font></td>
                <td><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>$NumOrdered</font></div></td>
              </tr>
            </table>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>DHL Tracking Number: <strong>$TrackingNumber</strong></font></p>
            <p><font size='2' face='Arial, Helvetica, sans-serif'><strong>Track 
              Shipment: <a href='http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber'>http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber</a></strong></font></p>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>Thank you,</font></p>
            <p><font color='#FF3300' size='2' face='Arial, Helvetica, sans-serif'><font color='#000000'>Silent 
              Technology LLC</font></font><font size='2' face='Arial, Helvetica, sans-serif'><br>
              <a href='http://www.SilentTimer.com'>http://www.SilentTimer.com</a><br>
              <a href='mailto:info@silenttimer.com'>info@silenttimer.com</a><br>
              800.552.0325</font></p>
            </td>
        </tr>
      </table>
   </td>
  </tr>
</table>
</body>
</html>
";


$alt_html = 
"The Silent Timer
Shipment Notification

Shipped To:

$BusinessName
$FirstName $LastName
$Address $Address2
$City, $State $Zip

$FirstName,

Your Shipment is on the way. Items shipped:

Title                 ISBN                    Quantity
The Silent Timer       0-9753503-0-7           $NumOrdered

DHL tracking number: $TrackingNumber
Track Shipment: http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber


Thank you,

Silent Technology LLC
http://www.SilentTimer.com<br>
info@silenttimer.com<br>
800.552.0325
";

	$mail->Body = $html;
	$mail->AltBody = $alt_html;
	
	if(!$mail->Send())
	{
	   echo "Email receipt could not be sent.<p>";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}


}#end of bulk customer email...
else if($Type == "samples")
{

	$mail = new PHPMailer();
	
	$mail->From = "info@silenttimer.com";
	$mail->FromName = "Silent Technology LLC";
	$mail->AddAddress("$Email", "$FirstName $LastName");
	$mail->AddBCC("info@silenttimer.com", "Silent Timer Shipment");
	$mail->IsHTML(true);
	$mail->Subject = "Silent Timer Shipment - Order # $PurchaseID";

$html=
"
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<title>Silent Timer Shipment</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>

<body>
<table width='100%' border='1' cellpadding='1' cellspacing='0' bordercolor='#003399'>
  <tr>
    <td align='left' valign='top'>
		<table width='100%' border='0' cellspacing='0' cellpadding='3'>
        <tr> 
          <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
              <tr> 
                <td width='49%' align='left' valign='top'><p><font size='3' face='Arial, Helvetica, sans-serif'><strong>The 
                    <font color='#0000FF'>Silent</font> Timer&#8482;<br>
                    </strong> <font size='2'>Shipment Notification</font></font></p>
                  <p><font size='2' face='Arial, Helvetica, sans-serif'>Silent 
                    Timer - <em>Samples</em></font></p></td>
                <td width='51%' align='right' valign='top'> <div align='right'>
                    <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'><strong>Shipped 
                      To:</strong></font></p>
                    <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'>$BusinessName<br>
                      $FirstName $LastName<br>
                      $Address $Address2<br>
                      $City, $State $Zip</font></p>
                  </div></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr> 
          <td><p><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'><strong><em>$FirstName</em></strong></font><font size='2' face='Arial, Helvetica, sans-serif'>,</font></p>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>Your shipment 
              is on the way. Items shipped:</font></p>
            <table width='100%' border='1' cellpadding='2' cellspacing='0' bordercolor='#CCCCCC'>
              <tr> 
                <td width='34%'><strong><font size='2' face='Arial, Helvetica, sans-serif'>Title</font></strong></td>
                <td width='42%'><strong><font size='2' face='Arial, Helvetica, sans-serif'>ISBN</font></strong></td>
                <td width='24%'><div align='center'><strong><font size='2' face='Arial, Helvetica, sans-serif'>Quantity</font></strong></div></td>
              </tr>
              <tr> 
                <td><font size='2' face='Arial, Helvetica, sans-serif'>The Silent 
                  Timer</font></td>
                <td><font size='2' face='Arial, Helvetica, sans-serif'>0-9753503-0-7</font></td>
                <td><div align='center'><font size='2' face='Arial, Helvetica, sans-serif'>$NumOrdered</font></div></td>
              </tr>
            </table>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>DHL Tracking Number: <strong>$TrackingNumber</strong></font></p>
            <p><font size='2' face='Arial, Helvetica, sans-serif'><strong>Track 
              Shipment: <a href='http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber'>http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber</a></strong></font></p>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>Thank you,</font></p>
            <p><font color='#FF3300' size='2' face='Arial, Helvetica, sans-serif'><font color='#000000'>Silent 
              Technology LLC</font></font><font size='2' face='Arial, Helvetica, sans-serif'><br>
              <a href='http://www.SilentTimer.com'>http://www.SilentTimer.com</a><br>
              <a href='mailto:info@silenttimer.com'>info@silenttimer.com</a><br>
              800.552.0325</font></p>
            </td>
        </tr>
      </table>
   </td>
  </tr>
</table>
</body>
</html>
";

$alt_html =
"The Silent Timer
Shipment Notification - Timer Samples

Shipped To:

$BusinessName
$FirstName $LastName
$Address $Address2
$City, $State $Zip

$FirstName,

Your Shipment is on the way. Items shipped:

Product               ISBN                    Quantity
The Silent Timer       0-9753503-0-7           $NumOrdered

DHL tracking number: $TrackingNumber
Track Shipment: http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber


Thank you,

Silent Technology LLC
http://www.SilentTimer.com<br>
info@silenttimer.com<br>
800.552.0325
";

	$mail->Body = $html;
	$mail->AltBody = $alt_html;
	
	if(!$mail->Send())
	{
	   echo "Email receipt could not be sent.<p>";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}

}#end of samples customer email...
else if($Type == "amazon")
{

	$mail = new PHPMailer();
	
	$mail->From = "info@silenttimer.com";
	$mail->FromName = "Silent Technology LLC";
	$mail->AddAddress("$Email", "$FirstName $LastName");
	$mail->AddBCC("info@silenttimer.com", "Silent Timer Shipment");
	$mail->IsHTML(true);
	$mail->Subject = "Amazon - Silent Timer Shipment - $FirstName $LastName # $PurchaseID";

$html =
"
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<title>Silent Timer Shipment</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>

<body>
<table width='100%' border='1' cellpadding='1' cellspacing='0' bordercolor='#003399'>
  <tr>
    <td align='left' valign='top'>
		<table width='100%' border='0' cellspacing='0' cellpadding='3'>
        <tr> 
          <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
              <tr> 
                <td width='49%' align='left' valign='top'><p><font size='3' face='Arial, Helvetica, sans-serif'><strong>The 
                    <font color='#0000FF'>Silent</font> Timer&#8482;<br>
                    </strong> <font size='2'>Shipment Notification</font></font></p>
                  <p align='center'><font size='2' face='Arial, Helvetica, sans-serif'>Thank 
                    you for your <br>
                    <em><strong><font size='3'>Amazon</font></strong></em> purchase!</font></p></td>
                <td width='51%' align='right' valign='top'> <div align='right'>
                    <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'><strong>Shipped 
                      To:</strong></font></p>
                    <p align='left'><font size='2' face='Arial, Helvetica, sans-serif'> 
                      $FirstName $LastName<br>
                      $Address $Address2<br>
                      $City, $State $Zip</font></p>
                    </div></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr> 
          <td><p><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'><strong><em>$FirstName</em></strong></font><font size='2' face='Arial, Helvetica, sans-serif'>,</font></p>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>Your shipment 
              is on the way. Items shipped:</font></p>
            <table width='100%' border='1' cellpadding='2' cellspacing='0' bordercolor='#CCCCCC'>
              <tr> 
                <td width='48%'><strong><font size='2' face='Arial, Helvetica, sans-serif'>Product</font></strong></td>
                <td width='52%'><div align='left'><strong><font size='2' face='Arial, Helvetica, sans-serif'>Quantity</font></strong></div></td>
              </tr>
              <tr> 
                <td><font size='2' face='Arial, Helvetica, sans-serif'>The Silent 
                  Timer</font></td>
                <td><div align='left'><font size='2' face='Arial, Helvetica, sans-serif'>$NumOrdered</font></div></td>
              </tr>
            </table>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>Amazon Listing ID: $ItemNumber<br>
              Amazon Order Number: $PaypalNumber</font></p>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>DHL Tracking 
              Number: <strong>$TrackingNumber</strong></font></p>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>Click here to 
              track your shipment: <a href='http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber'></a><strong><a href='http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber'><br>
              http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber</a></strong></font></p>
            <p><font size='2' face='Arial, Helvetica, sans-serif'>Thank you, good 
              luck studying for your test!</font></p>
            <p><font color='#FF3300' size='2' face='Arial, Helvetica, sans-serif'><font color='#000000'>Silent 
              Technology LLC</font></font><font size='2' face='Arial, Helvetica, sans-serif'><br>
              <a href='http://www.SilentTimer.com'>http://www.SilentTimer.com</a><br>
              <a href='mailto:info@silenttimer.com'>info@silenttimer.com</a><br>
              800.552.0325</font></p>
            </td>
        </tr>
      </table>
   </td>
  </tr>
</table>
</body>
</html>
";


$alt_html = 
"The Silent Timer
Amazon Shipment Notification

Amazon Listing ID:     $ItemNumber
Amazon Order Number:   $PaypalNumber

Shipped To:

$FirstName $LastName
$Address $Address2
$City, $State $Zip

$FirstName,

Your Shipment is on the way. Items shipped:

Product                      Quantity
The Silent Timer              $NumOrdered

DHL tracking number: $TrackingNumber
Track Shipment: http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=$TrackingNumber

Thank you, good luck studying for your test!

Silent Technology LLC
http://www.SilentTimer.com<br>
info@silenttimer.com<br>
800.552.0325
";

	$mail->Body = $html;
	$mail->AltBody = $alt_html;
	
	if(!$mail->Send())
	{
	   echo "Email receipt could not be sent.<p>";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}

}#end of amazon customer email...

*/
	
	echo "$FirstName $LastName   -   $LabelNumber - $Type<br>";
	
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "<p>import and emails complete. DO NOT REFRESH THIS PAGE! DELETE Export.csv from the server NOW!";
?>