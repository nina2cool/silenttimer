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
	$handle = fopen ("shippingexport/export.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		$PurchaseID = $data[6];
		$TrackingNumber = $data[3];
		$NumShipped = 1;
		$now = date("Y-m-d");
		$DateShipped = $now;
		$Cost = $data[28];
		$ShipCode = $data[24];
		
	
		# split date up and put it into correct order for DB
		#$month = substr($DateShipped, 0, 2);
		#$day = substr($DateShipped, 2, 2);
		#$year = substr($DateShipped, 4, 4);
		
		#$D = $year . "-" . $month . "-" . $day;
		$D = $DateShipped;
		
		### - end split date		
		
		
		#find out ShipCostID
		$sql3 = "SELECT * FROM tblPurchase2 WHERE PurchaseID = '$PurchaseID'";
		$result3 = mysql_query($sql3) or die("Cannot execute shipping option!");
			while($row3 = mysql_fetch_array($result3))
			{
			$ShipCostID = $row3['ShipCostID'];
			}
			
		
		# insert data into database for shipment...
		$sql = "INSERT INTO tblShipment3
				(PurchaseID, DateTime, ShipmentComplete, TrackingNumber, ShipmentCost, ShipperID, ShipCostID)
				VALUES ('$PurchaseID', '$D', 'y', '$TrackingNumber', '$Cost', '6', '$ShipCostID')";
		mysql_query($sql) or die("Cannot insert shipment3, please try again.");
		
		

			#update tblShipment3 with ShipperID
			$sql11 = "SELECT * FROM tblShipment3 WHERE PurchaseID = '$PurchaseID' AND TrackingNumber = '$TrackingNumber'";
			//echo "<br>sql11 = " .$sql11;
			$result11 = mysql_query($sql11) or die("Cannot Find ShipperID in tblShipment3!");
			
			while($row11 = mysql_fetch_array($result11))
			{
			$ShipmentID = $row11[ShipmentID];
			}
			//echo "<br>ShipmentID = " .$ShipmentID;
						
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
								WHERE DetailID = '$DetailID'";
								$result88 = mysql_query($sql88) or die("Cannot update tblProduct!");
								
								$sql77 = "UPDATE tblPurchase2
								SET Shipped = 'y'
								WHERE PurchaseID = '$PurchaseID'";
								$result77 = mysql_query($sql77) or die("Cannot update tblProduct!");
								
			
			
								$sql12 = "INSERT INTO tblShipmentProduct
								(ShipmentID, DetailID, Quantity, Complete) 
								VALUES ('$ShipmentID', '$DetailID', '$Quantity', 'y')";
								
								//echo "<br>sql12 = " .$sql12;
								
								mysql_query($sql12) or die("Cannot insert ShipmentProduct");
				
				
							$sql8 = "UPDATE tblProductNew
							SET OnHand = OnHand - $Quantity
							WHERE ProductID = '$ProductID'";
							$result8 = mysql_query($sql8) or die("Cannot update tblProduct2!");
						}#end else for getting product detail information
		
		
		
		
		# ---------------------------------------------------------------------------------------
		# send out email with tracking info to customer...get their email and name info first...
		# ---------------------------------------------------------------------------------------
		
			$sql = "SELECT tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.Address, tblCustomer.Address2, tblCustomer.City, 
					tblCustomer.State, tblCustomer.ZipCode, tblCustomer.Email, tblCustomer.Type, tblCustomer.BusinessName, 
					tblPurchase2.PaypalNumber 
					FROM tblCustomer INNER JOIN tblPurchase2 ON tblCustomer.CustomerID = tblPurchase2.CustomerID 
					WHERE tblPurchase2.PurchaseID = '$PurchaseID'";
			
			//echo "<br>$sql<br>";
			
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
				
			}
	

# If customer type is web, then send simple polite email.  
# If it is bulk, send more professional email.  
# If it is a sample, send simple, professional email.

	$mail = new PHPMailer();
	
	$mail->From = "info@silenttimer.com";
	$mail->FromName = "The SilentTimer.com Team";
	$mail->AddAddress("$Email", "$FirstName $LastName");
	$mail->AddBCC("info@silenttimer.com", "SilentTimer.com Shipment");
	$mail->IsHTML(true);
	$mail->Subject = "SilentTimer.com Shipment - $FirstName $LastName # $PurchaseID";

$html =
"
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<title>SilentTimer.com Shipment</title>
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
                <td width='49%' align='left' valign='top'><p><font size='3' face='Arial, Helvetica, sans-serif'><strong><font color='#0000FF'>Silent</font>Timer.com<br>
                    </strong> <font size='2'>Shipment Notification</font></font></p>
                </td>
                <td width='51%' align='right' valign='top'> <div align='right'>
                    <p align='left'>&nbsp;</p>
                    </div></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr> 
          <td><p><font color='#000000' size='3' face='Arial, Helvetica, sans-serif'><em><br>
            $FirstName</em></font><font size='2' face='Arial, Helvetica, sans-serif'>,</font></p>
            <p><font size='3' face='Arial, Helvetica, sans-serif'><strong>Your order
                has been shipped!</strong></font></p>
            <p><a href='http://www.silenttimer.com/customerservice/'><font size='2' face='Arial, Helvetica, sans-serif'>Click
            to log in and view your order history and account information.</font></a></p>
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
</html>";




$alt_html = 
"SilentTimer.com
Shipment Notification

$FirstName,

Your order has been shipped.

Log in to view your order history and account information here:  http://www.silenttimer.com/customerservice/

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


	echo "<br>$FirstName $LastName   -   $TrackingNumber - $Type<br>";
	
	} // end of while loop and program
	
	fclose ($handle);
	
	
	
	mysql_close($link);
	
	echo "<p>import and emails complete. DO NOT REFRESH THIS PAGE! DELETE Export.csv from the server NOW!";
?>