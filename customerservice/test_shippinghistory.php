<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('custID'))
{
// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";


//CODE GOES BELOW-----------------------------------------------------------

	$custID = $_SESSION['custID'];
	
	$PurchaseID = $_GET['purch'];
	$CustomerID = $_GET['cust'];

	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
	$result = mysql_query($sql) or die("Cannot execute query CustomerID!");
		
		while($row = mysql_fetch_array($result))
		{
			$CustomerID = $row[CustomerID];
			$FirstName = $row[FirstName];
			$LastName = $row[LastName];
			$Phone = $row[Phone];
			$Email = $row[Email];
			$TypeID = $row[Type];
			$CompanyName = $row[BusinessName];
		}
		
		
	$sql2 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
	$result2 = mysql_query($sql2) or die("Cannot execute query TypeID!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$Type = $row2[Type];
		}

?>

<div align="right"> 
  <p><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="test_orderhistory.php">Back
  to Order History Page </a></font> </p>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFCC">
    <tr>
      <td><font color="#000000" size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td><div align="left"><font color="#FF0000" size="5" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">Shipping
                History for Order # <? echo $PurchaseID; ?>:</font></strong></font></div></td>
      <td><div align="right"><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"></font></div></td>
      <td width="10%">&nbsp;</td>
    </tr>
  </table>
  <div align="left">
    <p>&nbsp;</p>
  </div>
  
  <?	
  
		$sql3 = "SELECT * FROM tblShipment3 WHERE PurchaseID = '$PurchaseID'";
		//echo $sql3;
		$result3 = mysql_query($sql3) or die("Cannot execute query PurchaseID!");
		
		$Count = mysql_num_rows($result3);
		//echo "count= " .$Count;
		
		if($Count == 0)
		{
		?>
		<div align="center"><font size="2" face="Arial, Helvetica, sans-serif">No Shipments at this time.</font></div>
		<?
		}		
		elseif($Count == 1)
		{

?>
    
      
		<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
    <tr bgcolor="#FFFFCC"> 
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Product</strong></font></div></td>
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Qty</strong></font></div></td>
      <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Date
              Shipped </strong></font></div></td>
      <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Shipper</strong></font></div></td>
      <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Tracking
              Number </strong></font></div></td>
    </tr>
    <tr> 
	
		<?
	
			while($row3 = mysql_fetch_array($result3))
			{
			
			$ShipperID = $row3[ShipperID];
			$ShipmentID = $row3[ShipmentID];
			$TrackingNumber = $row3[TrackingNumber];
			$DateTime = $row3[DateTime];
			$ShipmentCost = $row3[ShipmentCost];
			$ShipCostID = $row3[ShipCostID];
			$MultiplePieces = $row3[MultiplePieces];
			
			
			
				$sql8 = "SELECT * FROM tblShipmentProduct WHERE ShipmentID = '$ShipmentID'";
				//echo "<br>sql8 =" .$sql8;
				$result8 = mysql_query($sql8) or die("Cannot execute query DetailID!");
			
				while($row8 = mysql_fetch_array($result8))
				{
					$DetailID = $row8[DetailID];
					$Quantity = $row8[Quantity];
					//$Complete = $row8[Complete];
					

						$sql9 = "SELECT * FROM tblPurchaseDetails2 WHERE DetailID = '$DetailID'";
						
						//echo "<br>sql9 =" .$sql9;
						$result9 = mysql_query($sql9) or die("Cannot execute query ShipperID!");
					
						while($row9 = mysql_fetch_array($result9))
						{
							$ProductID = $row9[ProductID];
						
						
								$sql5 = "SELECT * FROM tblProduct WHERE ProductID = '$ProductID'";
								$result5 = mysql_query($sql5) or die("Cannot execute query ProductID!");
								
								while($row5 = mysql_fetch_array($result5))
								{
								$ProductNickname = $row5[Nickname];
								$Product = $row5[ProductName];
								}
						}
				
			
			$sql3 = "SELECT * FROM tblShipper WHERE ShipperID = '$ShipperID'";
			$result3 = mysql_query($sql3) or die("Cannot execute query ShipperID!");
		
			while($row3 = mysql_fetch_array($result3))
			{
				$Shipper = $row3[CompanyName];
			}
			

			
			if($ShippingOptionID == '12' AND $TrackingNumber == "")
			{
				$TrackingNumber = 'International';
			}
			else
			{
				$TrackingNumber = $TrackingNumber;
			}
			
	?>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Product; ?></font></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Quantity; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $DateTime; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Shipper; ?></font></div></td>
 
 	<?
	if($ShipperID == '8' AND $TrackingNumber <> "International")
		{ 
	?>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://trkcnfrm1.smi.usps.com/PTSInternetWeb/InterLabelInquiry.do?origTrackNum=<? echo $TrackingNumber; ?>" target="_blank" ><? echo $TrackingNumber; ?> </a></font></div></td>
 	<?
		}
	elseif($ShipperID == '6')
		{
	?>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=<? echo $TrackingNumber; ?>" target="_blank" ><? echo $TrackingNumber; ?> </a></font></div></td>
	<?
	}
	elseif($ShipperID == '9')
	{
	?>
 <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://wwwapps.ups.com/WebTracking/processInputRequest?HTMLVersion=5.0&loc=en_US&Requester=UPSHome&tracknum=<? echo $TrackingNumber; ?>&AgreeToTermsAndConditions=yes&track.x=12&track.y=6" target="_blank" ><? echo $TrackingNumber; ?> </a></font></div></td>
	<?
	}
   
	else
	{
	?>
 <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $TrackingNumber; ?> </a></font></div></td>
	<?
	}
	}
	}
	
	?>
  </table>
  
  <?
}
elseif($Count > 1)
{
?>
		
    
      
		<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
    <tr bgcolor="#FFFFCC"> 
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Product</strong></font></div></td>
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Qty</strong></font></div></td>
      <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Date
              Shipped </strong></font></div></td>
      <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Shipper</strong></font></div></td>
      <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Tracking
              Number </strong></font></div></td>
    </tr>
     
	
		<?
	
			while($row3 = mysql_fetch_array($result3))
			{
			
			$ShipperID = $row3[ShipperID];
			$ShipmentID = $row3[ShipmentID];
			$TrackingNumber = $row3[TrackingNumber];
			$DateTime = $row3[DateTime];
			$ShipmentCost = $row3[ShipmentCost];
			$ShipCostID = $row3[ShipCostID];
			$MultiplePieces = $row3[MultiplePieces];
			
			
			
			//echo "<br>shipID = " .$ShipmentID;
			
			
			
				$sql8 = "SELECT * FROM tblShipmentProduct WHERE ShipmentID = '$ShipmentID'";
				//echo "<br>sql8 =" .$sql8;
				$result8 = mysql_query($sql8) or die("Cannot execute query DetailID!");
			
				while($row8 = mysql_fetch_array($result8))
				{
					$DetailID = $row8[DetailID];
					$Quantity = $row8[Quantity];
					//$Complete = $row8[Complete];
					

						$sql9 = "SELECT * FROM tblPurchaseDetails2 WHERE DetailID = '$DetailID'";
						
						//echo "<br>sql9 =" .$sql9;
						$result9 = mysql_query($sql9) or die("Cannot execute query ShipperID!");
					
						while($row9 = mysql_fetch_array($result9))
						{
							$ProductID = $row9[ProductID];
						
						
								$sql5 = "SELECT * FROM tblProduct WHERE ProductID = '$ProductID'";
								//echo "<br>sql5 =" .$sql5;
								$result5 = mysql_query($sql5) or die("Cannot execute query ProductID!");
								
								while($row5 = mysql_fetch_array($result5))
								{
								$ProductNickname = $row5[Nickname];
								$Product = $row5[ProductName];
								}
						}
				}
			
			$sql66 = "SELECT * FROM tblShipper WHERE ShipperID = '$ShipperID'";
			//echo "<br>sql66 =" .$sql66;
			$result66 = mysql_query($sql66) or die("Cannot execute query ShipperID!");
		
			while($row66 = mysql_fetch_array($result66))
			{
				$Shipper = $row66[CompanyName];
			}
			
		

			if($ShippingOptionID == '12' AND $TrackingNumber == "")
			{
				$TrackingNumber = 'International';
			}
			else
			{
				$TrackingNumber = $TrackingNumber;
			}
			
	?>
	<tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Product; ?></font></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Quantity; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $DateTime; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Shipper; ?></font></div></td>
 	
	
 	<?
	
	if($ShipperID == '8' AND $TrackingNumber <> "International")
		{ 
	?>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://trkcnfrm1.smi.usps.com/PTSInternetWeb/InterLabelInquiry.do?origTrackNum=<? echo $TrackingNumber; ?>" target="_blank" ><? echo $TrackingNumber; ?> </a></font></div></td>
 	<?
		}
	elseif($ShipperID == '6')
		{
	?>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=<? echo $TrackingNumber; ?>" target="_blank" ><? echo $TrackingNumber; ?> </a></font></div></td>
	<?
	}
	elseif($ShipperID == '9')
	{
	?>
 <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://wwwapps.ups.com/WebTracking/processInputRequest?HTMLVersion=5.0&loc=en_US&Requester=UPSHome&tracknum=<? echo $TrackingNumber; ?>&AgreeToTermsAndConditions=yes&track.x=12&track.y=6" target="_blank" ><? echo $TrackingNumber; ?> </a></font></div></td>
	<?
	}
	else
	{
	?>
 <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $TrackingNumber; ?> </a></font></div></td>
	
	<?
	}
	}
	
	?>
	</tr>
	<?
	

	
	?>
  </table>

<?
}
else
{
echo "oops";
}


  ?>
  
<p></p>
  <hr>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
</div>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/test_sidemenu.php";

// finishes security for page
}
else
{
?>
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customerservice/test_index.php'>
<?
}
?>