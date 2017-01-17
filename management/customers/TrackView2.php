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


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
	//users search mechanism
	$radio = $_POST['radioSelection'];
	$chkfirstname = $_POST['chkfirstname'];
	$chklastname = $_POST['chklastname'];
	
	//time search variables
	$timeType = $_POST['cboTime'];
	$fromDate = $_POST['txtFromDate'];
	$toDate = $_POST['txtToDate'];
	
	$TrackingNumber = $_POST['txtTrackingNumber'];
	
	$FirstName = $_POST['txtFirstName'];
	$LastName = $_POST['txtLastName'];
		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT 
	tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.CustomerID, tblCustomer.BusinessName, tblPurchase2.ShipCostID,
	tblPurchase2.PurchaseID, tblPurchase2.ShippingCost, tblPurchase2.CustomerID,
	tblPurchase2.Subtotal, tblShipment3.PurchaseID, tblShipment3.TrackingNumber,
	tblShipment3.ShipperID,
	DATE_FORMAT(tblShipment3.DateTime, '%m/%d/%y') AS ShipDateTime,
	tblPurchase2.Shipped, tblShipment3.ShipmentID
	FROM tblPurchase2
	INNER JOIN tblCustomer ON tblCustomer.CustomerID = tblPurchase2.CustomerID
	INNER JOIN tblShipment3 ON tblShipment3.PurchaseID = tblPurchase2.PurchaseID 
	WHERE 1 = 1 ";

	$today = date("Y-m-d");			
	$week = mktime (0,0,0,date("m"),date("d")-7,  date("Y"));
	$month = mktime (0,0,0,date("m")-1,date("d"),  date("Y"));
	$year = mktime (0,0,0,date("m"),date("d"),  date("Y")-1);
	
		
	if ($radio == "time")
	{
		if ($timeType == "other")
		{
			$sql .= " AND tblShipment3.DateTime >= '$fromDate' AND tblShipment3.DateTime <= '$toDate'";
		}
		else
		{
			if ($timeType == "today")
			{
				$sql .= " AND tblShipment3.DateTime >= '$today'";
			}
			
			if ($timeType == "week")
			{
				$sql .= " WHERE tblShipment3.DateTime >= '$week'";
			}
			
			if ($timeType == "month")
			{
				$sql .= " WHERE tblShipment3.DateTime >= '$month'";
			}
			
			if ($timeType == "year")
			{
				$sql .= " WHERE tblShipment3.DateTime >= '$year'";
			}
			
			if ($timeType == "all")
			{
				//then don't do anything, because it is already selecting all.
			}
		}			
	}
	
			if ($radio == "trackingnumber")
			{
				$sql .= " AND tblShipment3.TrackingNumber = '$TrackingNumber'";
			}
			
			
			if ($chkfirstname == "y")
			{
				$sql .= " AND tblCustomer.FirstName = '$FirstName'";
			}

			if ($chklastname == "y")
			{
				$sql .= " AND tblCustomer.LastName = '$LastName'";
			}
	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblPurchase2.PurchaseID DESC";
		$sortBy ="tblPurchase2.PurchaseID";
		$sortDirection = "DESC";
	}
	

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query 2!");

?>

			
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Customer Search 
  Results</strong></font></p>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
  <?
			   // code to handle sort direction
			   // this following code just switches teh ascending order to descending and vice verca when necessary.
			   // The links in the titles of the colum fields are changed depending on the value in this variable and
			   // depending on what is being sorted by.
			   if ($sortDirection == "ASC")
			   {
			   		$sd = "DESC";
			   }
			   else
			   {
			   		$sd = "ASC";
			   }

			    
?>
  <tr bgcolor="#CCCCCC"> 
    <td bgcolor="#FFFFCC" class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Ship</strong></font></div></td>
    <td bgcolor="#FFFFCC" class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Cust</strong></font></div></td>
    <td bgcolor="#FFFFCC" class=sort> <div align="center"><strong><a href="TrackView2.php?sort=tblShipment.PurchaseID&d=<? if ($sortBy=="tblShipment.PurchaseID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">pID</font></a></strong></div></td>
    <td bgcolor="#FFFFCC" class=sort><div align="center"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="TrackView2.php?sort=tblCustomer.BusinessName&d=<? if ($sortBy=="tblCustomer.BusinessName") {echo $sd;} else {echo "ASC";}?>">Company</a></font></strong></div></td>
    <td bgcolor="#FFFFCC" class=sort> <div align="center"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="TrackView2.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";} ?>">    Name</a></font></strong></div></td>
    <td bgcolor="#FFFFCC" class=sort> <div align="center"><strong><a href="TrackView2.php?sort=tblShipment.TrackingNumber&d=<? if ($sortBy=="tblShipment.TrackingNumber") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Tracking 
    #</font></a></strong></div></td>
    <td bgcolor="#FFFFCC" class=sort><div align="center"><strong><a href="TrackView2.php?sort=tblShipment.DateTime&d=<? if ($sortBy=="tblShipment.DateTime") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Ship
              Date </font></a></strong></div></td>
    <td bgcolor="#FFFFCC" class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Ship
            Method</font></strong></div></td>
    <td bgcolor="#FFFFCC" class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">List</font></strong></div></td>
    <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
			
				$CustomerID = $row[CustomerID];
				$PurchaseID = $row[PurchaseID];
				$FirstName = $row[FirstName];
				$LastName = $row[LastName];
				$TrackingNumber = $row[TrackingNumber];
				$ShippedDate = $row[ShipDateTime];
				$ShipmentID = $row[ShipmentID];
				$ShipperID = $row[ShipperID];
				$CountryID = $row[CountryID];
				$CompanyName = $row[BusinessName];
				$ShipCostID = $row[ShipCostID];
				
			

			  if($TrackingNumber == '')
			  { $TrackingNumber = '-'; }
			  
				if($FirstName == "") { $FirstName = "-"; }
				if($LastName == "") { $LastName = "-"; }
				if($CompanyName == "") { $CompanyName = "-"; }
			  
			  
			  
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
									$ShippingOption = $row3['Nickname'];
									//$ShippingOptionNickname = $row3['Nickname'];
									}
							

									$sql4 = "SELECT * FROM tblShipper WHERE ShipperID = '$ShipperID'";
									$result4 = mysql_query($sql4) or die("Cannot execute shipper!");
									while($row4 = mysql_fetch_array($result4))
									{
									$Shipper = $row4['Nickname'];
									}

			  
			  ?>
  <tr <? if($ShippingOption <> "G") { ?>bgcolor="#CCFFFF"<? } ?>> 
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="ShippingHistory.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>" target="_blank">Sh</a></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>" target="_blank">Cu</a></font></div></td>
    <td> <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $PurchaseID; ?></font></div></td>
    <td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?></font></div></td>
    <td> <div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?> <? echo $LastName; ?></font></div></td>

<td>
     <font size="1" face="Arial, Helvetica, sans-serif">
     <? if($ShipperID == '6') { ?>
     </font>
     <div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><a href="http://track.dhl-usa.com/TrackByNbr.asp?ShipmentNumber=<? echo $TrackingNumber; ?>" target="_blank" ><? echo $TrackingNumber; ?></a></font></div>
     <font size="1" face="Arial, Helvetica, sans-serif">
     <? } elseif($ShipperID == '8' AND $CountryID <> '225' AND $CountryID <> '241' AND $CountryID <> '242' AND $CountryID <> '243') { ?>
      </font>
     <div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><a href="http://trkcnfrm1.smi.usps.com/PTSInternetWeb/InterLabelInquiry.do?origTrackNum=<? echo $TrackingNumber; ?>" target="_blank" ><? echo $TrackingNumber; ?></a></font></div>
     <font size="1" face="Arial, Helvetica, sans-serif">
     <? } elseif($ShipperID == '9') { ?>
     </font>
     <div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><a href="http://wwwapps.ups.com/WebTracking/processInputRequest?HTMLVersion=5.0&loc=en_US&Requester=UPSHome&tracknum=<? echo $TrackingNumber; ?>&AgreeToTermsAndConditions=yes&track.x=12&track.y=6" target="_blank" ><? echo $TrackingNumber; ?></a></font></div>
     <font size="1" face="Arial, Helvetica, sans-serif">
     <? } elseif($ShipperID == '11') { ?>
     </font>
     <div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><a href="http://www.fedex.com/Tracking?ascend_header=1&clienttype=dotcom&cntry_code=us&language=english&tracknumbers=<? echo $TrackingNumber; ?>+" target="_blank" ><? echo $TrackingNumber; ?></a></font></div>
     <font size="1" face="Arial, Helvetica, sans-serif">
     <? } else { ?>
     </font>
     <div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $TrackingNumber; ?></font></div>
     <font size="1" face="Arial, Helvetica, sans-serif">
     <? } ?>
    </font></td>

    <td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ShippedDate; ?></font></div></td>
    <td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Shipper; ?> - <? echo $ShippingOption; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="custpackinglist_individual.php?purch=<? echo $PurchaseID; ?>" target="_blank">PL/RS</a></font></div></td>
  </tr>
  <?
			  	}
				}
				//close connection to database
				mysql_close($link);
			  ?>
</table>
<p>&nbsp;</p>
            
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


// has links that show up at the bottom in it.

require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
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