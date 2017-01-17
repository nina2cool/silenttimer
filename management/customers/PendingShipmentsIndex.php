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
	
	$Date = date("Y-m-d");
	
	if ($_POST['Submit'] == ">> Go")	
	{
			$radio = $_POST['radio'];
			
			if($radio == "Snapshot") //make all current orders Pending Shipment
			{
					
						$sql = "SELECT tblPurchase2.PurchaseID FROM tblCustomer
						INNER JOIN tblPurchase2
						ON tblCustomer.CustomerID = tblPurchase2.CustomerID
						INNER JOIN tblPurchaseDetails2
						ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
						WHERE tblPurchaseDetails2.Status = 'active' AND tblPurchase2.Status <> 'cancel'
						AND tblPurchase2.Shipped = 'n'
						GROUP BY tblPurchase2.PurchaseID";
						$result = mysql_query($sql) or die("Cannot get snapshot of orders");
						
						while($row = mysql_fetch_array($result))
						{
							$PurchaseID = $row[PurchaseID];
							
								
								$sql2 = "UPDATE tblPurchase2 SET Shipped = 'p' WHERE PurchaseID = '$PurchaseID'";
								$result2 = mysql_query($sql2) or die("Cannot update set shipped = p for Snapshot");
						}

			}#end of Radio = Snapshot
			
			elseif($radio == "Before2") //find orders that were placed prior to 2pm CST
			{
			
			$CutoffTime = "12:00:00";
			$CutoffDateTime = $Date . " " . $CutoffTime;
			
						$sql = "SELECT tblPurchase2.PurchaseID FROM tblCustomer
						INNER JOIN tblPurchase2
						ON tblCustomer.CustomerID = tblPurchase2.CustomerID
						INNER JOIN tblPurchaseDetails2
						ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
						WHERE tblPurchaseDetails2.Status = 'active' AND tblPurchase2.Status <> 'cancel'
						AND tblPurchase2.Shipped = 'n' AND tblPurchase2.OrderDateTime <= '$CutoffDateTime'
						GROUP BY tblPurchase2.PurchaseID";
						$result = mysql_query($sql) or die("Cannot get orders Before2");
						//echo $sql;
						
						while($row = mysql_fetch_array($result))
						{
							$PurchaseID = $row[PurchaseID];
							
								
								$sql2 = "UPDATE tblPurchase2 SET Shipped = 'p' WHERE PurchaseID = '$PurchaseID'";
								$result2 = mysql_query($sql2) or die("Cannot update set shipped = p for Before2");
						}
			
			
			}#end of Radio = Before2
			
			elseif($radio == "NoBulk") //find orders that are not bulk orders
			{
			
						$sql = "SELECT tblPurchase2.PurchaseID FROM tblCustomer
						INNER JOIN tblPurchase2
						ON tblCustomer.CustomerID = tblPurchase2.CustomerID
						INNER JOIN tblPurchaseDetails2
						ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
						WHERE tblPurchaseDetails2.Status = 'active' AND tblPurchase2.Status <> 'cancel'
						AND tblPurchase2.Shipped = 'n'
						AND tblCustomer.Type <> '6'
						GROUP BY tblPurchase2.PurchaseID";
						$result = mysql_query($sql) or die("Cannot get NoBulk orders");
						//echo $sql;
						
						while($row = mysql_fetch_array($result))
						{
							$PurchaseID = $row[PurchaseID];
							
								
								$sql2 = "UPDATE tblPurchase2 SET Shipped = 'p' WHERE PurchaseID = '$PurchaseID'";
								$result2 = mysql_query($sql2) or die("Cannot update set shipped = p for NoBulk");
						}
			}# end of Radio = NoBulk

			
			elseif($radio == "Individual") //select indiviudally which orders you want to ship
			{
			
			
			
			}# end of Radio = Individual
			
			
			elseif($radio == "Domestic") //find orders that are only domestic
			{

						$sql = "SELECT tblPurchase2.PurchaseID FROM tblCustomer
						INNER JOIN tblPurchase2
						ON tblCustomer.CustomerID = tblPurchase2.CustomerID
						INNER JOIN tblPurchaseDetails2
						ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
						WHERE tblPurchaseDetails2.Status = 'active' AND tblPurchase2.Status <> 'cancel'
						AND tblPurchase2.Shipped = 'n'
						AND tblCustomer.CountryID = '225' 
						OR tblPurchaseDetails2.Status = 'active' AND tblPurchase2.Status <> 'cancel'
						AND tblPurchase2.Shipped = 'n'
						AND tblCustomer.CountryID = '241' 
						OR tblPurchaseDetails2.Status = 'active' AND tblPurchase2.Status <> 'cancel'
						AND tblPurchase2.Shipped = 'n'
						AND tblCustomer.CountryID = '242'
						OR tblPurchaseDetails2.Status = 'active' AND tblPurchase2.Status <> 'cancel'
						AND tblPurchase2.Shipped = 'n'
						AND tblCustomer.CountryID = '243'
						GROUP BY tblPurchase2.PurchaseID";
						$result = mysql_query($sql) or die("Cannot get Domestic orders");
						//echo $sql;
						
						while($row = mysql_fetch_array($result))
						{
							$PurchaseID = $row[PurchaseID];
							
								
								$sql2 = "UPDATE tblPurchase2 SET Shipped = 'p' WHERE PurchaseID = '$PurchaseID'";
								$result2 = mysql_query($sql2) or die("Cannot update set shipped = p for Domestic");
						}


			
			}# end of Radio = Domestic
			
			
			
			
			elseif($radio == "International")  //find orders that are only international
			{
			
						$sql = "SELECT tblPurchase2.PurchaseID FROM tblCustomer
						INNER JOIN tblPurchase2
						ON tblCustomer.CustomerID = tblPurchase2.CustomerID
						INNER JOIN tblPurchaseDetails2
						ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
						WHERE tblPurchaseDetails2.Status = 'active' AND tblPurchase2.Status <> 'cancel'
						AND tblPurchase2.Shipped = 'n' 
						AND tblCustomer.CountryID <> '225' 
						AND tblCustomer.CountryID <> '241' 
						AND tblCustomer.CountryID <> '242'
						AND tblCustomer.CountryID <> '243'
						GROUP BY tblPurchase2.PurchaseID";
						$result = mysql_query($sql) or die("Cannot get International orders");
						//echo $sql;
						
						while($row = mysql_fetch_array($result))
						{
							$PurchaseID = $row[PurchaseID];
							
								
								$sql2 = "UPDATE tblPurchase2 SET Shipped = 'p' WHERE PurchaseID = '$PurchaseID'";
								$result2 = mysql_query($sql2) or die("Cannot update set shipped = p for International");
						}


			}# end of Radio = International



			else
			{
			
			}# end of else			

		}# end of pushing Go button
				
	

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Pending
Shipments Index </strong></font></p>
  

<p>&nbsp;</p>
<form name="form1" method="post" action="">
  <table width="50%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td width="5%"><div align="center">
        <input name="radio" type="radio" value="Snapshot">
      </div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Snapshot of all current orders</font></td>
    </tr>
    <tr>
      <td width="5%"><div align="center">
        <input name="radio" type="radio" value="Before2">
      </div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Only orders prior to 2:00pm CST</font></td>
    </tr>
    <tr>
      <td width="5%"><div align="center">
        <input name="radio" type="radio" value="NoBulk">
      </div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">All orders except for bulk orders</font></td>
    </tr>
    <tr>
      <td width="5%"><div align="center">
        <input name="radio" type="radio" value="Individual">
      </div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Select individual orders</font></td>
    </tr>
    <tr>
      <td width="5%"><div align="center">
        <input name="radio" type="radio" value="Domestic">
      </div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Ony domestic orders</font></td>
    </tr>
    <tr>
      <td width="5%"><div align="center">
        <input name="radio" type="radio" value="International">
      </div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Only international orders </font></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>
    <input type="submit" name="Submit" value="&gt;&gt; Go"> 
  </p>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
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
