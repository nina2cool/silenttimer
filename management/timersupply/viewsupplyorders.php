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
	//users search mechanism
	$radio = $_POST['radioSelection'];
	
	//time search variables
	$timeType = $_POST['cboTime'];
	$fromDate = $_POST['txtFromDate'];
	$toDate = $_POST['txtToDate'];
	
	// Supply Order ID
	$SupplyOrderID = $_POST['txtSupplyOrderID'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT tblSupplyOrder.SupplyOrderID, tblProduct.ProductName, tblSupplyOrder.ProductID, DATE_FORMAT(tblSupplyOrder.DateTime, '%m/%d/%y') AS DateTime, 
			tblSupplyOrder.NumOrdered, tblShipper.CompanyName, tblSupplyOrder.ShippingPref, DATE_FORMAT(tblSupplyOrder.NeedBy, '%m/%d/%y') AS NeedBy, 
			tblSupplyOrder.Received FROM tblSupplyOrder INNER JOIN tblProduct ON tblSupplyOrder.ProductID = tblProduct.ProductID INNER JOIN tblShipper ON 
			tblSupplyOrder.ShipperID = tblShipper.ShipperID
			WHERE tblSupplyOrder.Status = 'active'";

	$today = date("Y-m-d");			
	$week = mktime (0,0,0,date("m"),date("d")-7,  date("Y"));
	$month = mktime (0,0,0,date("m")-1,date("d"),  date("Y"));
	$year = mktime (0,0,0,date("m"),date("d"),  date("Y")-1);
	
	if ($radio == "time")
	{
		if ($timeType == "other")
		{
			$sql .= " AND tblPurchase.DateTime >= '$fromDate' AND tblPurchase.DateTime <= '$toDate'";
		}
		else
		{
			if ($timeType == "today")
			{
				$sql .= " AND tblSupplyOrder.DateTime >= '$today'";
			}
			
			if ($timeType == "week")
			{
				$sql .= " AND tblSupplyOrder.DateTime >= '$week'";
			}
			
			if ($timeType == "month")
			{
				$sql .= " AND tblSupplyOrder.DateTime >= '$month'";
			}
			
			if ($timeType == "year")
			{
				$sql .= " AND tblSupplyOrder.DateTime >= '$year'";
			}
			
			if ($timeType == "all")
			{
				//then don't do anything, because it is already selecting all.
			}
		}			
	}
	
	if ($radio == "OrderID")
	{
		$sql .= " AND tblSupplyOrder.SupplyOrderID = $SupplyOrderID";
	}

	
	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}
	
	//put SQL statement into result set for loop through records
	//echo $sql;
	$result = mysql_query($sql) or die("Cannot get info from tblSupplyOrder");

?>

			
<p><font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Supply Orders</strong></font></p>
            
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
    <td width="7%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Details</font></strong></font></div></td>
    <td width="3%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="viewsupplyorders.php?sort=tblSupplyOrder.SupplyOrderID&d=<? if ($sortBy=="tblSupplyOrder.SupplyOrderID") {echo $sd;} else {echo "ASC";}?>">ID</a></font></strong></font></div></td>
    <td width="5%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="viewsupplyorders.php?sort=tblSupplyOrder.ProductID&d=<? if ($sortBy=="tblSupplyOrder.ProductID") {echo $sd;} else {echo "ASC";} ?>">ProdID</a></strong></font><font color="#003399"><strong></strong></font></div></td>
    <td width="5%" class=sort> <div align="center"><font color="#003399" face="Arial, Helvetica, sans-serif"><strong><font size="2"><a href="viewsupplyorders.php?sort=tblSupplyOrder.NumOrdered&d=<? if ($sortBy=="tblSupplyOrder.NumOrdered") {echo $sd;} else {echo "ASC";} ?>">#</a></font></strong></font><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"></font></div></td>
    <td width="11%" class=sort> <div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="viewsupplyorders.php?sort=tblShipper.CompanyName&d=<? if ($sortBy=="tblShipper.CompanyName") {echo $sd;} else {echo "ASC";} ?>">Shipper</a></strong></font></div></td>
    <td width="10%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="viewsupplyorders.php?sort=tblSupplyOrder.ShippingPref&d=<? if ($sortBy=="tblSupplyOrder.ShippingPref") {echo $sd;} else {echo "ASC";} ?>">ShipPref</a></strong></font></div></td>
    <td width="23%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="viewsupplyorders.php?sort=tblSupplyOrder.DateTime&d=<? if ($sortBy=="tblSupplyOrder.DateTime") {echo $sd;} else {echo "ASC";} ?>">Date</a></strong></font></div></td>
    <td width="20%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="viewsupplyorders.php?sort=tblSupplyOrder.NeedBy&d=<? if ($sortBy=="tblSupplyOrder.NeedBy") {echo $sd;} else {echo "ASC";} ?>">Expect</a></strong></font></div></td>
    <td width="8%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="viewsupplyorders.php?sort=tblSupplyOrder.Received&d=<? if ($sortBy=="tblSupplyOrder.Received") {echo $sd;} else {echo "ASC";} ?>">Accepted?</a></strong></font></div></td>
    <td width="8%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Shipped?</strong></font></div></td>
  </tr>
  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$soID = $row[SupplyOrderID];
				$productID = $row[ProductID];
				$dt = $row[DateTime];
				$numOrdered = $row[NumOrdered];
				$shipCompany = $row[CompanyName];
				$shipPref = $row[ShippingPref];
				$needBy = $row[NeedBy];
				$received = $row[Received];
				
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
				{$shipped = "yes";}
				else
				{$shipped = "no";}
				
			  ?>
  <tr align="left" valign="top"> 
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? if($received =="no"){?><a href="editsupplyorder.php?so=<? echo $soID; ?>"><strong>Details</strong></a><? }else{?><strong>Details</strong><? }?></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $soID; ?></strong></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $productID; ?></strong></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $numOrdered; ?></strong></font></div></td>
    <td> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $shipCompany; ?></strong></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $shipPref; ?></strong></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $dt; ?></strong></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $needBy; ?></strong></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $received; ?></strong></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $shipped;?></strong></font></div></td>
  </tr>
  <?
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
