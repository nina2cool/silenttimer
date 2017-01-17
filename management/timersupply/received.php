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
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	//beginning SQL statement that gets all data from tables.		
	$sql = "SELECT tblOrderShipped.OrderShippedID, DATE_FORMAT(tblOrderShipped.DateTime, '%m/%d/%y') AS DateTime, tblOrderShipped.NumShipped, 
			tblOrderShipped.TrackingNumber, tblSupplyOrder.SupplyOrderID, tblSupplyOrder.ProductID, tblShipper.CompanyName, tblSupplyOrder.NumOrdered
			FROM tblSupplyOrder INNER JOIN tblOrderShipped ON tblSupplyOrder.SupplyOrderID = tblOrderShipped.SupplyOrderID INNER JOIN tblShipper ON 
			tblOrderShipped.ShipperID = tblShipper.ShipperID LEFT JOIN tblOrderReceived ON tblOrderShipped.OrderShippedID = tblOrderReceived.OrderShippedID
			WHERE tblSupplyOrder.Complete = 'n' AND tblSupplyOrder.Received = 'y' AND tblOrderReceived.OrderShippedID IS NULL";
	
	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}
	
	//put SQL statement into result set for loop through records
	//echo $sql;
	$result = mysql_query($sql) or die("Cannot get info from tblSupplyOrder");

?>

			
<p><font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Supply Order 
  Received</strong></font></p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Which order has 
  been received? Click on &quot;Received&quot; for the corresponding Order Number 
  to enter arrival shipment details.</font></strong></p>
            
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
    <td width="5%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Details</font></strong></font></div></td>
    <td width="3%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="received.php?sort=tblOrderShipped.SupplyOrderID&d=<? if ($sortBy=="tblOrderShipped.SupplyOrderID") {echo $sd;} else {echo "ASC";}?>">oID</a></font></strong></font></div></td>
    <td width="6%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="received.php?sort=tblSupplyOrder.ProductID&d=<? if ($sortBy=="tblSupplyOrder.ProductID") {echo $sd;} else {echo "ASC";} ?>">ProdID</a></strong></font></div></td>
    <td width="7%" class=sort><div align="center"><font color="#003399" face="Arial, Helvetica, sans-serif"><strong><font size="2"><a href="received.php?sort=tblSupplyOrder.NumOrdered&d=<? if ($sortBy=="tblSupplyOrder.NumOrdered") {echo $sd;} else {echo "ASC";} ?>">#Ordered</a></font></strong></font></div></td>
    <td width="5%" class=sort> <div align="center"><font color="#003399" face="Arial, Helvetica, sans-serif"><strong><font size="2"><a href="received.php?sort=tblOrderShipped.NumShipped&d=<? if ($sortBy=="tblOrderShipped.NumShipped") {echo $sd;} else {echo "ASC";} ?>">#Sent</a></font></strong></font></div></td>
    <td width="8%" class=sort> <div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="received.php?sort=tblShipper.CompanyName&d=<? if ($sortBy=="tblShipper.CompanyName") {echo $sd;} else {echo "ASC";} ?>">Shipper</a></strong></font></div></td>
    <td width="21%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="received.php?sort=tblOrderShipped.TrackingNumber&d=<? if ($sortBy=="tblOrderShipped.TrackingNumber") {echo $sd;} else {echo "ASC";} ?>">Tracking#</a></strong></font></div></td>
    <td width="39%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="received.php?sort=tblOrderShipped.DateTime&d=<? if ($sortBy=="tblOrderShipped.DateTime") {echo $sd;} else {echo "ASC";} ?>">DateShipped</a></strong></font></div></td>
    <td width="6%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Received?</strong></font></div></td>
  </tr>
  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$soID = $row[SupplyOrderID];
				$OrderShippedID = $row[OrderShippedID];
				$productID = $row[ProductID];
				$dt = $row[DateTime];
				$numShipped = $row[NumShipped];
				$numOrdered = $row[NumOrdered];
				$trackingNum = $row[TrackingNumber];
				$shipCompany = $row[CompanyName];
				
				if ($received == "y")
				{$received = "yes";}
				else
				{$received = "no";}
				
				// grab total number shipped for this order from tblOrderShipped
				$sql2 = "SELECT SUM(NumShipped) AS TotalShipped
						 FROM tblOrderShipped 
						 WHERE SupplyOrderID = $soID";
						 
				$result2 = mysql_query($sql2) or die("Cannot get info from tblOrderShipped");
				while($row2 = mysql_fetch_array($result2))
				{
					$TotalShipped = $row2[TotalShipped];
				}
				
					if($TotalShipped > 0)
					{				
			  ?>
  <tr align="left" valign="top"> 
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="edit.php?so=<? echo $soID; ?>"><strong>Details</strong></a></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $soID; ?></strong></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $productID; ?></strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $numOrdered; ?></strong></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $numShipped; ?></strong></font></div></td>
    <td> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $shipCompany; ?></strong></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $trackingNum; ?></strong></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $dt; ?></strong></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="arrivaldetails.php?osID=<? echo $OrderShippedID; ?>">Received&gt;</a></strong></font></div></td>
  </tr>
  <?
			  		}
				}
				//close connection to database
				mysql_close($link);
			  ?>
</table>


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
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
