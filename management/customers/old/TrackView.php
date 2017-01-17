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
?>

<?
	
	//purchaseID
	$FirstName= $_POST['txtFirstName'];
	
	//LastName
	$lastName = $_POST['txtLastName'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$Now = date("Y-m-d");

$sql = "SELECT tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.CustomerID, 
		tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblShipment3.PurchaseID, 
		tblShipment3.TrackingNumber, tblShipment3.DateTime, tblShipment3.ShipmentID, tblShipment3.ShipperID,
		tblCustomer.CountryID
		FROM tblCustomer INNER JOIN tblPurchase2 ON
		tblCustomer.CustomerID = tblPurchase2.CustomerID
		INNER JOIN tblShipment3 ON
		tblShipment3.PurchaseID = tblPurchase2.PurchaseID";


	
		//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblPurchase2.PurchaseID DESC";
		$sortBy ="tblPurchase2.PurchaseID";
		$sortDirection = "ASC";
	}
		

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");


	$Num = mysql_num_rows($result);

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; 
  Tracking #'s</strong></font></p>
<form>
			
  <p><font size="2" face="Arial, Helvetica, sans-serif"># of Packages: <? echo $Num; ?></font></p>
  <table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
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
      <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Ship 
          Details</strong></font></div></td>
      <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Cust 
          Details</strong></font></div></td>
      <td class=sort> <div align="center"><strong><a href="../customers/TrackView.php?sort=tblShipment.PurchaseID&d=<? if ($sortBy=="tblShipment.PurchaseID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Purchase 
          ID</font></a></strong></div></td>
      <td class=sort> <div align="center"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/TrackView.php?sort=tblCustomer.FirstName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";}?>">First 
          Name</a></font></strong></div></td>
      <td class=sort> <div align="center"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/TrackView.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";} ?>">Last 
          Name</a></font></strong></div></td>
      <td class=sort> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/TrackView.php?sort=tblShipment.TrackingNumber&d=<? if ($sortBy=="tblShipment.TrackingNumber") {echo $sd;} else {echo "ASC";}?>">Tracking 
          #</a></strong></font></div></td>
      <td class=sort> <div align="center"><strong><a href="../customers/TrackView.php?sort=tblShipment.DateTime&d=<? if ($sortBy=="tblShipment.DateTime") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Ship 
          Date </font></a></strong></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$CustomerID = $row[CustomerID];
				$PurchaseID = $row[PurchaseID];
				$FirstName = $row[FirstName];
				$LastName = $row[LastName];
				$TrackingNumber = $row[TrackingNumber];
				$ShippedDate = $row[DateTime];
				$ShipmentID = $row[ShipmentID];
				$ShipperID = $row[ShipperID];
				$CountryID = $row[CountryID];
				
				if($TrackingNumber == '')
				{
				$TrackingNumber = '-';
				}
				
												
			  ?>
    <tr> 
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="ShippingDetails.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Ship</a></font></div></td>
      <td width="9%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">Cust</a></font></div></td>
      <td width="12%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $PurchaseID; ?></font></div></td>
      <td width="11%"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font></div></td>
      <td> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font></div></td>

<? if($ShipperID == '6') { ?>
      <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.dhl-usa.com/cgi-bin/tracking.pl?AWB=<? echo $TrackingNumber; ?>" target="_blank" ><? echo $TrackingNumber; ?></a></font></div></td>
<? } elseif($ShipperID == '8') { ?>
      <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://trkcnfrm1.smi.usps.com/netdata-cgi/db2www/cbd_243.d2w/output?CAMEFROM=OK&strOrigTrackNum=<? echo $TrackingNumber; ?>&strEditedTrackNum=<? echo $TrackingNumber; ?>" target="_blank" ><? echo $TrackingNumber; ?></a></font></div></td>
<? } elseif($ShipperID == '9') { ?>
      <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://wwwapps.ups.com/WebTracking/processInputRequest?HTMLVersion=5.0&loc=en_US&Requester=UPSHome&tracknum=<? echo $TrackingNumber; ?>&AgreeToTermsAndConditions=yes&track.x=12&track.y=6" target="_blank" ><? echo $TrackingNumber; ?></a></font></div></td>
<? } else { ?>
      <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $TrackingNumber; ?></font></div></td>
<? } ?>


      <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ShippedDate; ?></font></div></td>
    </tr>
    <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
  </table> 
		
            
  <p align="left">&nbsp;</p>
</form>
  
  
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
