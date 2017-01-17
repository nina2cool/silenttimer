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
	
		//grab variables to get purchase info and customer info from DB.
	$PurchaseID = $_GET['purch'];
	$CustomerID = $_GET['cust'];
	
	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
 // -------- code to save values from form into table, etc....

	if ($_POST['Go'] == "Go")
	{
		
		$ShipCostID = $_POST['ShipCostID'];
		$Date = $_POST['Date'];
		$Quantity = $_POST['Quantity'];
		$TrackingNumber = $_POST['TrackingNumber'];
		$SendEmail = $_POST['SendEmail'];
		$ShipmentCost = $_POST['ShipmentCost'];
		$Ck = $_POST['Ck'];
		$CkM = $_POST['CkM'];
		$Num = $_POST['Num'];
		
		
		#if All items were shipped and in one box
		if($Ck == 'y' AND $CkM == '')
		{
		
		$sql = "INSERT INTO tblShipment3(PurchaseID, DateTime, 
		ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID) 
		
		VALUES ('$PurchaseID', '$Date', 'y', 
		'$TrackingNumber', '$ShipmentCost', '$ShipCostID')";
		mysql_query($sql) or die("Cannot insert Shipment");
		
		/*
		$sql22 = "INSERT INTO tblShipment2(PurchaseID, DateTime, 
		ShipmentComplete, TrackingNumber, ShipmentCost, ShipCostID) 
		
		VALUES ('$PurchaseID', '$Date', 'y', 
		'$TrackingNumber', '$ShipmentCost', '$ShipCostID')";
		mysql_query($sql22) or die("Cannot insert Shipment");
		*/
		
		
		$sql11 = "SELECT * FROM tblShipment3 WHERE PurchaseID = '$PurchaseID' AND TrackingNumber = '$TrackingNumber'";
		//put SQL statement into result set for loop through records
		$result11 = mysql_query($sql11) or die("Cannot Find ShipperID in tblShipment3!");
		
		while($row11 = mysql_fetch_array($result11))
		{
		$ShipmentID = $row11[ShipmentID];
		}
		
		
		$sql33 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID'";
		//put SQL statement into result set for loop through records
		$result33 = mysql_query($sql33) or die("Cannot Find ShipperID in tblShippingCost5!");
		
		while($row33 = mysql_fetch_array($result33))
		{
		$ShipperID = $row33[ShipperID];
		}
		
		$sql5 = "UPDATE tblShipment3
		SET ShipperID = '$ShipperID'
		WHERE ShipmentID = '$ShipmentID'";
		
		$result5 = mysql_query($sql5) or die("Cannot update Shipper ID!");
		
		
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
			
			
					$sql12 = "INSERT INTO tblShipmentProduct(ShipmentID, DetailID, 
					Quantity, Complete) 
					
					VALUES ('$ShipmentID', '$DetailID', '$Quantity', 
					'y')";
					mysql_query($sql12) or die("Cannot insert ShipmentProduct");
					

					$sql22 = "UPDATE tblPurchaseDetails2
					SET Shipped = 'y'
					WHERE DetailID = '$DetailID'";
					$result22 = mysql_query($sql22) or die("Cannot update Shipped in tblPurchaseDetails2!");
					//echo $sql22;


					$sql8 = "UPDATE tblProductNew
					SET OnHand = OnHand - $Quantity
					WHERE ProductID = '$ProductID'";
					$result8 = mysql_query($sql8) or die("Cannot update tblProduct!");
					
					/*
						if($SendEmail <> 'y')
						{
						header("location: NotShippedView.php");
						}
					*/

			}

	}
	#if not all of the items were shipped and there was one box
	elseif($Ck == '' AND $CkM == '')
			{
					
					//$goto = "NotShippedDetails2.php?cust=$CustomerID&purch=$PurchaseID";
					//header("location: $goto");
					?>
					<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customers/NotShippedDetails2.php?cust=<? echo $CustomerID; ?>&purch=<? echo $PurchaseID; ?>'>
					<?

			}
			#if not all of the items were shipped and there were multiple boxes
			elseif($Ck == '' AND $CkM == 'y')
			{
							//$goto = "NotShippedDetails4.php?cust=$CustomerID&purch=$PurchaseID";
							//header("location: $goto");
							
							?>
							<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customers/NotShippedDetails4.php?cust=<? echo $CustomerID; ?>&purch=<? echo $PurchaseID; ?>'>
							<?
							
			}
			#if all items were shipped and there were multiple boxes
			elseif($Ck == 'y' AND $CkM == 'y')
			{
							//$goto = "NotShippedDetails5.php?cust=$CustomerID&purch=$PurchaseID";
							//header("location: $goto");


					?>
					<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customers/NotShippedDetails5.php?cust=<? echo $CustomerID; ?>&purch=<? echo $PurchaseID; ?>'>
					<?


			}
			#for any other combo
			else
			{
			echo "Tell Christina - option not available.";
			}
	
		
		#code for sending an email to the customers with the tracking information	
		if($SendEmail == 'y')
		{
		
			# declares class for emails...
			require "../../code/class.phpmailer.php";
		
				$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
				//put SQL statement into result set for loop through records
				$result = mysql_query($sql) or die("Cannot execute query!");
				
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
				}
				
				
				#check for which company it was sent through so we send the right link
				$sql33 = "SELECT * FROM tblShippingCost5 WHERE ShipCostID = '$ShipCostID'";
				//put SQL statement into result set for loop through records
				$result33 = mysql_query($sql33) or die("Cannot Find ShipperID in tblShippingCost5!");
				
				while($row33 = mysql_fetch_array($result33))
				{
				$ShipperID = $row33[ShipperID];
				}
				
				#ShipperID = 6 = DHL
				#ShipperID = 8 = USPS
				#ShipperID = 9 = UPS
				#ShipperID = 11 = FedEx
				
				if($ShipperID == '6')
				{

					$mail = new PHPMailer();
					
					$mail->From = "info@silenttimer.com";
					$mail->FromName = "The Silent Timer Team";
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
							  <td><p><font color='#000000' size='3' face='Arial, Helvetica, sans-serif'><em>$FirstName</em></font><font size='2' face='Arial, Helvetica, sans-serif'>,</font></p>
								<p><font size='3' face='Arial, Helvetica, sans-serif'><strong>Your order
									has been shipped!</strong></font></p>
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
					"The Silent Timer
					Shipment Notification
					
					Shipped To:
					
					$FirstName $LastName
					$Address $Address2
					$City, $State $Zip
					
					$FirstName,
					
					Your order has been shipped.
					
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
					
					
						#echo "$FirstName $LastName   -   $TrackingNumber - $Type<br>";
						
				} #close ShipperID = 6 loop
						

				elseif($ShipperID == '8')
				{

					$mail = new PHPMailer();
					
					$mail->From = "info@silenttimer.com";
					$mail->FromName = "The Silent Timer Team";
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
							  <td><p><font color='#000000' size='3' face='Arial, Helvetica, sans-serif'><em>$FirstName</em></font><font size='2' face='Arial, Helvetica, sans-serif'>,</font></p>
								<p><font size='3' face='Arial, Helvetica, sans-serif'><strong>Your order
									has been shipped!</strong></font></p>
								<p><font size='2' face='Arial, Helvetica, sans-serif'>USPS Tracking Number: <strong>$TrackingNumber</strong></font></p>
								<p><font size='2' face='Arial, Helvetica, sans-serif'><strong>Click 
								  here to track your shipment: </strong><strong><a href='http://trkcnfrm1.smi.usps.com/netdata-cgi/db2www/cbd_243.d2w/output?CAMEFROM=OK&strOrigTrackNum=$TrackingNumber&strEditedTrackNum=$TrackingNumber'><br>
								  </a></strong><a href='http://trkcnfrm1.smi.usps.com/netdata-cgi/db2www/cbd_243.d2w/output?CAMEFROM=OK&strOrigTrackNum=$TrackingNumber&strEditedTrackNum=$TrackingNumber'>http://trkcnfrm1.smi.usps.com/netdata-cgi/db2www/cbd_243.d2w/output?CAMEFROM=OK&strOrigTrackNum=$TrackingNumber&strEditedTrackNum=$TrackingNumber</a>
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
					"The Silent Timer
					Shipment Notification
					
					Shipped To:
					
					$FirstName $LastName
					$Address $Address2
					$City, $State $Zip
					
					$FirstName,
					
					Your order has been shipped.
					
					USPS tracking number: $TrackingNumber
					Track Shipment: http://trkcnfrm1.smi.usps.com/netdata-cgi/db2www/cbd_243.d2w/output?CAMEFROM=OK&strOrigTrackNum=$TrackingNumber&strEditedTrackNum=$TrackingNumber (copy and paste into your browser if you cannot click)
					
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
					
					
						#echo "$FirstName $LastName   -   $TrackingNumber - $Type<br>";
						
							
					}#close ShipperID = 8 loop
			

				elseif($ShipperID == '9')
				{

					$mail = new PHPMailer();
					
					$mail->From = "info@silenttimer.com";
					$mail->FromName = "The Silent Timer Team";
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
							  <td><p><font color='#000000' size='3' face='Arial, Helvetica, sans-serif'><em>$FirstName</em></font><font size='2' face='Arial, Helvetica, sans-serif'>,</font></p>
								<p><font size='3' face='Arial, Helvetica, sans-serif'><strong>Your order
									has been shipped!</strong></font></p>
								<p><font size='2' face='Arial, Helvetica, sans-serif'>UPS Tracking Number: <strong>$TrackingNumber</strong></font></p>
								<p><font size='2' face='Arial, Helvetica, sans-serif'><strong>Click 
								  here to track your shipment: </strong><strong><a href='http://wwwapps.ups.com/WebTracking/processInputRequest?HTMLVersion=5.0&loc=en_US&Requester=UPSHome&tracknum=$TrackingNumber&AgreeToTermsAndConditions=yes&track.x=12&track.y=6'><br>
								  </a></strong><a href='http://wwwapps.ups.com/WebTracking/processInputRequest?HTMLVersion=5.0&loc=en_US&Requester=UPSHome&tracknum=$TrackingNumber&AgreeToTermsAndConditions=yes&track.x=12&track.y=6'>http://wwwapps.ups.com/WebTracking/processInputRequest?HTMLVersion=5.0&loc=en_US&Requester=UPSHome&tracknum=$TrackingNumber&AgreeToTermsAndConditions=yes&track.x=12&track.y=6</a> 
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
					"The Silent Timer
					Shipment Notification
					
					Shipped To:
					
					$FirstName $LastName
					$Address $Address2
					$City, $State $Zip
					
					$FirstName,
					
					Your order has been shipped.
					
					UPS tracking number: $TrackingNumber
					Track Shipment: http://wwwapps.ups.com/WebTracking/processInputRequest?HTMLVersion=5.0&loc=en_US&Requester=UPSHome&tracknum=$TrackingNumber&AgreeToTermsAndConditions=yes&track.x=12&track.y=6 (copy and paste into your browser if you cannot click)
					
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
					
					
						echo "$FirstName $LastName   -   $TrackingNumber - $Type<br>";

					}#close ShipperID = 9 loop

				elseif($ShipperID == '11')
				{

					$mail = new PHPMailer();
					
					$mail->From = "info@silenttimer.com";
					$mail->FromName = "The Silent Timer Team";
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
							  <td><p><font color='#000000' size='3' face='Arial, Helvetica, sans-serif'><em>$FirstName</em></font><font size='2' face='Arial, Helvetica, sans-serif'>,</font></p>
								<p><font size='3' face='Arial, Helvetica, sans-serif'><strong>Your order
									has been shipped!</strong></font></p>
								<p><font size='2' face='Arial, Helvetica, sans-serif'>FedEx Tracking Number: <strong>$TrackingNumber</strong></font></p>
								<p><font size='2' face='Arial, Helvetica, sans-serif'><strong>Click 
								  here to track your shipment: </strong><strong><a href='http://www.fedex.com/Tracking?ascend_header=1&clienttype=dotcom&cntry_code=us&language=english&tracknumbers=$TrackingNumber'><br>
								  </a></strong><a href='http://www.fedex.com/Tracking?ascend_header=1&clienttype=dotcom&cntry_code=us&language=english&tracknumbers=$TrackingNumber'>http://www.fedex.com/Tracking?ascend_header=1&clienttype=dotcom&cntry_code=us&language=english&tracknumbers=$TrackingNumber</a> 
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
					"The Silent Timer
					Shipment Notification
					
					Shipped To:
					
					$FirstName $LastName
					$Address $Address2
					$City, $State $Zip
					
					$FirstName,
					
					Your order has been shipped.
					
					FedEx tracking number: $TrackingNumber
					Track Shipment: http://www.fedex.com/Tracking?ascend_header=1&clienttype=dotcom&cntry_code=us&language=english&tracknumbers=$TrackingNumber (copy and paste into your browser if you cannot click)
					
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
					
					
						#echo "$FirstName $LastName   -   $TrackingNumber - $Type<br>";

							
					}#close ShipperID = 11 loop
					
					else
					{
					echo "Could not send email.  Send it manually.";
					}
					
					fclose ($handle);

			}
	

	
	}


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$FirstName = $row[FirstName];
		$LastName = $row[LastName];
		$CompanyName = $row[BusinessName];
	}

?>


                <font size="5" face="Arial, Helvetica, sans-serif"><strong><font color="#000000">&gt; Shipment
                Detail:</font></strong></font><font face="Arial, Helvetica, sans-serif"><strong><font color="#000000" size="5"><font color="#FF0000"> <font color="#003399"><? echo "$FirstName $LastName";?></font></font></font><font color="#003399"> 
                <?

	if($CompanyName <> "")
	{
?> 
                (<font size="3"><? echo $CompanyName;?></font>)
                <?
}
?>
                </font></strong></font><font color="#003399">
                </p>
                </font>			
                <form name="form1" method="post" action="">
			  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
                <tr bgcolor="#FFFFCC">
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipment
                  Date </font></strong></td>
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">ShipCostID <a href="ShipCostID.php" target="_blank">view
                  list</a></font></strong></td>
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Tracking
                  Number </font></strong></td>
                  <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Shipment
                  Cost</font></strong></td>
                </tr>


<?
				$sql3 = "SELECT * FROM tblPurchase2 WHERE PurchaseID = '$PurchaseID'";
				//put SQL statement into result set for loop through records
				$result3 = mysql_query($sql3) or die("Cannot execute query!");
				
				while($row3 = mysql_fetch_array($result3))
				{
				$ShipCostID = $row3[ShipCostID];
				$PurchaseID = $row3[PurchaseID];
				
				
				if($ShipCostID == '34' OR $ShipCostID == '117' OR $ShipCostID == '118' OR $ShipCostID == '120' OR $ShipCostID == '133')
				{
				$Cost = 4.05;
				}
				elseif($ShipCostID == '11')
				{
				$Cost = 7;
				}
				elseif($ShipCostID == '115' OR $ShipCostID == '116' OR $ShipCostID == '119' OR $ShipCostID == '120' OR $ShipCostID == '134')
				{
				$Cost = 14.40;
				}
				else
				{
				$Cost = '';
				}


?>

                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="Date" type="text" id="Date" value="<? echo date("Y-m-d");?>" size="8">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="ShipCostID" type="text" id="ShipCostID" value="<? echo $ShipCostID; ?>" size="4">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="TrackingNumber" type="text" id="TrackingNumber" size="20">
                  </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">$
                      <input name="ShipmentCost" type="text" id="ShipmentCost" value="<? echo $Cost; ?>" size="5">
                  </font></td>
                </tr>

<?

	}

?>				
				
              </table>
			  <p><font size="2" face="Arial, Helvetica, sans-serif">Shipped All? 
                        <input name="Ck" type="checkbox" id="Ck" value="y" checked>
</font></p>
			  <p><font size="2" face="Arial, Helvetica, sans-serif">Multiple pieces? 
			    <input name="CkM" type="checkbox" id="CkM" value="y">
			  </font> </p>
			  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
                          <tr bgcolor="#FFFFCC">
                            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></td>
                            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Quantity</font></strong></td>
                          </tr>
						  
	<?
	
			$sql2 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Shipped = 'n'";
			//put SQL statement into result set for loop through records
			$result2 = mysql_query($sql2) or die("Cannot execute query!");
			
			while($row2 = mysql_fetch_array($result2))
			{
			$ProductID = $row2[ProductID];
			$Quantity = $row2[Quantity];
			$DetailID = $row2[DetailID];
			
			
	
	
	
	
	?>						  
						  
						  
						  
						  
                          <tr>
                            <td><font size="2" face="Arial, Helvetica, sans-serif">
                              <select name="Product" tabindex="" id="Product" class="text">
                                <option value="" selected>Select</option>
                                <? 
					$sql = "SELECT * FROM tblProductNew";
					
					$result = mysql_query($sql) or die("Cannot get tblProduct1");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                                <option value="<? echo $row[ProductID]; ?>"<? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
                                <?
					}
				?>
                              </select>
                            </font></td>
                            <td><font size="2" face="Arial, Helvetica, sans-serif">
                              <input name="Quantity" type="text" id="Quantity" value="<? echo $Quantity; ?>" size="4">
                            </font></td>
                          </tr>
						  
						  <?
						  
						  
						  }
						  
						  
						  ?>
						  
						  
						  
              </table>
                        <p><font size="2" face="Arial, Helvetica, sans-serif">Send tracking information via email?</font>                          
                          <input name="SendEmail" type="checkbox" id="SendEmail" value="y">
                        </p>
                        <p>
                          <input name="Go" type="submit" id="Go" value="Go">
                        </p>
			</form>
			<p>&nbsp;</p>
			
			
			
			<p><font size="2" face="Arial, Helvetica, sans-serif">
			  </font></p>
			<p></p>
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