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

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

//CODE GOES BELOW-----------------------------------------------------------

	# get CustomerID from previous page
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
  <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">Customer
  Information</a> | <a href="Notes.php?cust=<? echo $CustomerID; ?>">Notes</a> </font></p>
  <hr>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFCC">
    <tr>
      <td><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong><?php echo $CompanyName; ?></strong></font></td>
      <td><div align="left"><font color="#FF0000" size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $FirstName; ?> <? echo $LastName; ?></strong></font></div></td>
      <td><div align="right"><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"><strong><?php echo $Type; ?></strong></font></div></td>
      <td width="10%">&nbsp;</td>
    </tr>
  </table>
  <div align="left">
    <p><strong><font size="3" face="Arial, Helvetica, sans-serif">Shipping History
          for Purch ID = <? echo $PurchaseID; ?>:</font></strong><br>
    </p>
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
		elseif($Count > 0)
		{

?>
    
      
		<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
    <tr bgcolor="#FFFFCC"> 
      <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Shipment
              ID</strong></font></div></td>
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Product</strong></font></div></td>
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
			
					
			
			$sql33 = "SELECT * FROM tblShipper WHERE ShipperID = '$ShipperID'";
			$result33 = mysql_query($sql33) or die("Cannot execute query ShipperID!");
		
			while($row33 = mysql_fetch_array($result33))
			{
				$Shipper = $row33[CompanyName];
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
	

	
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="ShippingDetails.php?ship=<? echo $ShipmentID; ?>&cust=<? echo $CustomerID; ?>&purch=<? echo $PurchaseID; ?>"><?php echo $ShipmentID; ?></a></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
	  
	  <?
			$sql5 = "SELECT * FROM tblShipmentProduct WHERE ShipmentID = '$ShipmentID'";
			$result5 = mysql_query($sql5) or die("Cannot execute purch details 2!");
			
			while($row5 = mysql_fetch_array($result5))
			{
			$DetailID = $row5['DetailID'];
			$Quantity = $row5['Quantity'];
						
						$sql7 = "SELECT * FROM tblPurchaseDetails2 WHERE DetailID = '$DetailID'";
						$result7 = mysql_query($sql7) or die("Cannot execute DetailID info!");
						
						while($row7 = mysql_fetch_array($result7))
						{
						$ProductID = $row7['ProductID'];
						
						
						
						$sql6 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
						$result6 = mysql_query($sql6) or die("Cannot execute product info!");
						
						while($row6 = mysql_fetch_array($result6))
						{
						$ProductName = $row6['Nickname'];
						$Color = $row6['Color'];
						
	?>
	    <font color="<? echo $Color; ?>"><? echo $ProductName; ?>(<? echo $Quantity; ?>)</font><br><?
						}
						}
						}
	?>
	  
	  
	  </font></td>
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
   elseif($ShipperID == '11')
	{
	?>
 <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.fedex.com/Tracking?ascend_header=1&clienttype=dotcom&cntry_code=us&language=english&tracknumbers=<? echo $TrackingNumber; ?>+" target="_blank" ><? echo $TrackingNumber; ?> </a></font></div></td>
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
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="../warranty/ClaimAdd.php">Make
  a claim</a></font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="Order_Replacement.php?cust=<? echo $CustomerID; ?>">Ship
  a replacement</a></font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="Order_Reorder.php?cust=<? echo $CustomerID; ?>">New
        order for <? echo $FirstName; ?> <? echo $LastName; ?></a></font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="mailto:<? echo $Email; ?>">Send
        an email</a></font></p>
</div>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>