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
	
		
	$week = mktime (0,0,0,date("m"),date("d")-7,  date("Y"));
	$month = mktime (0,0,0,date("m")-1,date("d"),  date("Y"));
	$year = mktime (0,0,0,date("m"),date("d"),  date("Y")-1);

$sql = "SELECT tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.CustomerID, 
		tblPurchase.PurchaseID, tblPurchase.CustomerID, tblShipment.PurchaseID, 
		tblShipment.TrackingNumber, tblShipment.DateTime, tblShipment.ShipmentID
		FROM tblCustomer INNER JOIN tblPurchase ON
		tblCustomer.CustomerID = tblPurchase.CustomerID
		INNER JOIN tblShipment ON
		tblShipment.PurchaseID = tblPurchase.PurchaseID
		WHERE tblShipment.DateTime >= '$week'";


	
		//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblPurchase.PurchaseID DESC";
		$sortBy ="tblPurchase.PurchaseID";
		$sortDirection = "ASC";
	}
		

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");




?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; 
  Tracking #'s for </strong></font><font size="5" face="Arial, Helvetica, sans-serif"><strong><? echo $Now; ?></strong></font></p>
<form>
			
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
      <td width="8%" class=sort><font size="2" face="Arial, Helvetica, sans-serif"><strong>Details</strong></font></td>
      <td width="11%" class=sort> <div align="center"><strong><a href="../customers/TrackView.php?sort=tblShipment.PurchaseID&d=<? if ($sortBy=="tblShipment.PurchaseID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Purchase 
          ID</font></a></strong></div></td>
      <td width="21%" class=sort> <div align="center"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/TrackView.php?sort=tblCustomer.FirstName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";}?>">First 
          Name</a></font></strong></div></td>
      <td width="23%" class=sort> <div align="center"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/TrackView.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";} ?>">Last 
          Name</a></font></strong></div></td>
      <td width="15%" class=sort> <div align="center"><strong><a href="../customers/TrackView.php?sort=tblShipment.TrackingNumber&d=<? if ($sortBy=="tblShipment.TrackingNumber") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Tracking 
          #</font></a></strong></div></td>
      <td width="22%" class=sort> <div align="center"><strong><a href="../customers/TrackView.php?sort=tblShipment.DateTime&d=<? if ($sortBy=="tblShipment.DateTime") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Ship 
          Date </font></a></strong></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$cID = $row[CustomerID];
				$pID = $row[PurchaseID];
				$FirstName = $row[FirstName];
				$LastName = $row[LastName];
				$TrackingNumber = $row[TrackingNumber];
				$ShippedDate = $row[DateTime];
				$ShipmentID = $row[ShipmentID];
												
			  ?>
    <tr> 
      <td width="8%"><font size="2" face="Arial, Helvetica, sans-serif"><a href="TrackEdit.php?ship=<? echo $ShipmentID; ?>">Details</a></font></td>
      <td width="11%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $pID; ?></font></div></td>
      <td width="21%"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font></div></td>
      <td width="23%"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font></div></td>
      <td width="15%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $TrackingNumber; ?></font></div></td>
      <td width="22%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ShippedDate; ?></font></div></td>
    </tr>
    <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
  </table> 
		
            <p align="left">&nbsp;</p>
            
  <p align="left"><font size="3" face="Arial, Helvetica, sans-serif"><strong><a href="http://www.dhl-usa.com" target="_blank">&gt; 
    Track via DHL</a></strong></font> 
  <p>&nbsp;</p>
      <p>&nbsp;</p>
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
