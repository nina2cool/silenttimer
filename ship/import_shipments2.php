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
		$PurchaseID = $data[0];
		$TrackingNumber = $data[1];
		$NumShipped = $data[2];
		$DateShipped = $data[3];
		$Cost = $data[4];
		$Code = $data[5];
		
		# split date up and put it into correct order for DB
		$month = substr($DateShipped, 0, 2);
		$day = substr($DateShipped, 2, 2);
		$year = substr($DateShipped, 4, 4);
		
		$D = $year . "-" . $month . "-" . $day;
		### - end split date		
		
		# see if the order is now complete with the number we shipped compared to what they ordered.
		$sql = "SELECT NumOrdered FROM tblPurchase WHERE PurchaseID = '$PurchaseID'";
		$result = mysql_query($sql) or die("Cannot retrieve Number Ordered, please try again.");
				
		while($row = mysql_fetch_array($result))
		{
			$NumOrdered = $row[NumOrdered];
		}
		
		if($NumOrdered == $NumShipped)
		{
			$ShipmentComplete = "y";
		}
		else
		{
			$ShipmentComplete = "n";
		}
		
		# insert data into database for shipment...
		$sql = "INSERT INTO tblShipment2(PurchaseID, DateTime, NumShipped, ShipmentComplete, TrackingNumber, ShipmentCost, ShipmentCode, OrderShippedID)
				VALUES ('$PurchaseID', '$D', '$NumShipped', '$ShipmentComplete', '$TrackingNumber', '$Cost', '$Code', '1')";
		mysql_query($sql) or die("Cannot insert customer, please try again.");
		
		# change order shipped in the purchase table to YES
		$sql = "UPDATE tblPurchase 
				SET Shipped = 'y'
				WHERE PurchaseID = '$PurchaseID'";
		mysql_query($sql) or die("Cannot insert customer, please try again.");
		
		#update product inventory.  Subtract shipments from actual inventory when shipped...
		$sql = "UPDATE tblProduct SET NumInStock = NumInStock - $NumShipped WHERE ProductID = '1'";
		mysql_query($sql) or die("Cannot update inventory, please try again.");
		
		
		
		
		# ---------------------------------------------------------------------------------------
		# send out email with tracking info to customer...get their email and name info first...
		# ---------------------------------------------------------------------------------------
		
			$sql = "SELECT tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.Address, tblCustomer.City, 
					tblCustomer.State, tblCustomer.ZipCode, tblCustomer.Email, tblCustomer.Type, tblCustomer.BusinessName
					FROM tblCustomer INNER JOIN tblPurchase ON tblCustomer.CustomerID = tblPurchase.CustomerID 
					WHERE PurchaseID = '$PurchaseID'";
			$result = mysql_query($sql) or die("Cannot retrieve Customer Info, please try again.");
					
			while($row = mysql_fetch_array($result))
			{
				$FirstName = $row[FirstName];
				$LastName = $row[LastName];
				$BusinessName = $row[BusinessName];
				$Email = $row[Email];
				$Type = $row[Type];
				$Address = $row[Address];
				$City = $row[City];
				$State = $row[State];
				$Zip = $row[ZipCode];
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
	$mail->Subject = "Silent Timer Shipment";

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
                      $Address<br>
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
$Address
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
	$mail->Subject = "eBay - Silent Timer Shipment";

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
                      $Address<br>
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
$Address
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
	$mail->Subject = "Silent Timer Shipment";

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
                      $Address<br>
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
$Address
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
	$mail->Subject = "Silent Timer Shipment";

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
                      $Address<br>
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
$Address
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



	
	echo "$FirstName $LastName   -   $TrackingNumber - $Type<br>";
	
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "<p>import and emails complete. DO NOT REFRESH THIS PAGE! DELETE Export.csv from the server NOW!";
?>