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

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	//beginning SQL statement that gets all data from tables.		
	$sql = "SELECT * FROM tblOrderShipped";

	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}
	
	$result = mysql_query($sql) or die("Cannot get info from tblSupplyOrder");

?> 
<p><font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Orders Received<br>
  </strong></font></p>
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
    <td width="9%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Details</font></strong></font></div></td>
    <td width="11%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="orderreceived.php?sort=tblOrderShipped.OrderShippedID&d=<? if ($sortBy=="tblOrderShipped.OrderShippedID") {echo $sd;} else {echo "ASC";}?>">Order 
        Shipped ID</a></font></strong></font></div></td>
    <td width="8%" class=sort> <div align="center"><font color="#003399" face="Arial, Helvetica, sans-serif"><strong><font size="2"><a href="orderreceived.php?sort=tblOrderShipped.NumShipped&d=<? if ($sortBy=="tblOrderShipped.NumShipped") {echo $sd;} else {echo "ASC";} ?>">Num 
        Shipped</a></font></strong></font></div></td>
    <td width="10%" class=sort> <div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Shipper</strong></font></div></td>
    <td width="18%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="orderreceived.php?sort=tblOrderShipped.DateTime&d=<? if ($sortBy=="tblOrderShipped.DateTime") {echo $sd;} else {echo "ASC";} ?>">Date 
        Received</a></strong></font></div></td>
    <td width="28%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="orderreceived.php?sort=tblOrderShipped.Notes&d=<? if ($sortBy=="tblOrderShipped.Notes") {echo $sd;} else {echo "ASC";} ?>">Notes</a></strong></font></div></td>
  </tr>
  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$OrderShippedID = $row[OrderShippedID];
				$DateTimeReceived = $row[DateTime];
				$NumShipped = $row[NumShipped];
				$Notes = $row[Notes];
				$TrackingNumber = $row[TrackingNumber];
				$ShipperID = $row[ShipperID];
				
				
				if ($TrackingNumber == "")
				{$TrackingNumber = "-";}
				else
				{$TrackingNumber = "$TrackingNumber";}
				
				if ($Notes == "")
				{$Notes = "-";}
				else
				{$Notes = "$Notes";}
				
				// grab total number shipped for this order from tblOrderShipped
				$sql2 = "SELECT ShipperID, CompanyName
						 FROM tblShipper 
						 WHERE ShipperID = $ShipperID";
						 
				$result2 = mysql_query($sql2) or die("Cannot get info from tblShipper");
				while($row2 = mysql_fetch_array($result2))
				{
					$ShipperID = $row2[ShipperID];
					$Shipper = $row2[CompanyName];
				}
				
						
			  ?>
  <tr align="left" valign="top"> 
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="editorderreceived.php?os=<? echo $OrderShippedID; ?>"><strong>Details</strong></a></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $OrderShippedID; ?></strong></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $NumShipped; ?></strong></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Shipper; ?></strong></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $DateTimeReceived; ?></strong></font></div></td>
    <td> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Notes; ?></strong></font></div></td>
  </tr>
  <?
			  
				}
				//close connection to database
				mysql_close($link);
			  ?>
</table>


<p>&nbsp;</p><p>&nbsp;</p>
<p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.
require "../include/footerlinks.php";



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
