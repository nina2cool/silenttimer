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

	$sql = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.City, tblCustomer.State, 
			tblCustomer.ZipCode, tblCustomer.BusinessName, tblCustomer.Type,
			tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblPurchase2.Subtotal, tblPurchase2.Tax, tblPurchase2.Discount, 
			tblPurchase2.Shipped, tblPurchase2.Notes, tblPurchase2.OrderDateTime, tblPurchase2.Paid, tblPurchase2.PaymentTerms,
			tblPurchase2.ShippingCost, tblPurchaseDetails2.PurchaseID, tblPurchaseDetails2.Quantity, tblPurchaseDetails2.ProductID,
			tblPurchaseDetails2.Status, tblPurchaseDetails2.PurchasePrice, sum(tblPurchaseDetails2.Quantity) as Sum,
			tblPurchase2.InvoiceNumber, tblPurchase2.PONumber
			FROM tblCustomer INNER JOIN tblPurchase2
			ON tblCustomer.CustomerID = tblPurchase2.CustomerID
			INNER JOIN tblPurchaseDetails2
			ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
			WHERE tblPurchase2.Paid <> 'y' AND tblCustomer.Type = '6' AND tblPurchase2.PaymentTerms = 'pay to Nova Press'
			AND tblPurchase2.Status = 'active'
			GROUP BY tblPurchaseDetails2.PurchaseID";


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

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Nova 
  Press Outstanding Balances</strong></font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Jeff Kolby 
  automatically retains $2.50 per timer sold.</font></p>
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
      <td class=sort> <div align="center"><strong><a href="../customers/CustomerPurchaseView.php?sort=tblPurchase.PurchaseID&d=<? if ($sortBy=="tblPurchase.PurchaseID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Purch 
          ID </font></a></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerPurchaseView.php?sort=tblCustomer.BusinessName&d=<? if ($sortBy=="tblCustomer.BusinessName") {echo $sd;} else {echo "ASC";}?>">Business 
          Name</a> </font></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">City,
              St Zip </font></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Invoice
              # </font></strong></div></td>
      <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>PO          # </strong></font></div></td>
      <td class=sort> <div align="center"><font color="#000000"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerPurchaseView.php?sort=tblPurchase.TotalCost&d=<? if ($sortBy=="tblPurchase.TotalCost") {echo $sd;} else {echo "ASC";} ?>">Shipping 
          Cost </a></font></strong></font></div></td>
      <td class=sort> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerPurchaseView.php?sort=tblPurchase.Shipped&d=<? if ($sortBy=="tblPurchase.Shipped") {echo $sd;} else {echo "ASC";}?>">Date/Time 
          Ordered </a></font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif">Subtotal</font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerPurchaseView.php?sort=tblPurchase.TotalCost&d=<? if ($sortBy=="tblPurchase.TotalCost") {echo $sd;} else {echo "ASC";} ?>">Amnt 
          Owed to Us</a></font></strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	
				$TotalOwed = 0;
				
				while($row = mysql_fetch_array($result))
				{
				$PurchaseID = $row['PurchaseID'];
				$CustomerID = $row['CustomerID'];
				$PurchasePrice = $row['PurchasePrice'];
				$Tax = $row['Tax'];
				$Discount = $row['Discount'];
				$Shipped = $row['Shipped'];
				$Notes = $row['Notes'];
				$FirstName = $row['FirstName'];
				$BusinessName = $row['BusinessName'];
				$LastName = $row['LastName'];
				$City = $row['City'];
				$State = $row['State'];
				$ZipCode = $row['ZipCode'];
				$DateTime = $row['OrderDateTime'];
				$Subtotal = $row['Subtotal'];
				$ShippingCost = $row['ShippingCost'];
				$Quantity = $row['Quantity'];
				$ProductID = $row['ProductID'];
				$Sum = $row['Sum'];
				$InvoiceNumber = $row['InvoiceNumber'];
				$PONumber = $row['PONumber'];
		
				
				$Cut = 2.5;
				
		

					/*
			  
					$sql2 = "SELECT * FROM tblShipment3 WHERE PurchaseID = '$PurchaseID'";
					$result2 = mysql_query($sql2) or die("Cannot retrieve shipment info, please try again.");
					
					while($row2 = mysql_fetch_array($result2))
					{
					$ShippingCost = $row2['ShipmentCost'];
					}
					
					*/

			  	$TotalCut = $Cut * $Sum;
		
				$Total = $Subtotal + $ShippingCost;
				
				$Cost = $Total - $TotalCut;
			
				$TotalOwed = $TotalOwed + $Cost;
			  
			  
			  ?>
    <tr> 
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="PurchaseDetailsEdit.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>"><? echo $PurchaseID; ?></a></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $BusinessName; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?>, <? echo $State; ?> <? echo $ZipCode; ?></font></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $InvoiceNumber; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $PONumber; ?></font></div></td>
      <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($ShippingCost,2); ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Subtotal,2); ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Cost,2); ?></font></div></td>
    </tr>
    <?
			  	}
				
			


			  ?>
  </table> 
		
            
  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399" bgcolor="#FFFFCC">
    <tr> 
      <td><font color="#003399" size="4" face="Arial, Helvetica, sans-serif"><strong>Total 
        Amount Outstanding: <font color="#FF0000">$<? echo number_format($TotalOwed,2); ?></font></strong></font></td>
    </tr>
  </table>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="<? echo $http; ?>customers/NovaPressStatement.php" target="_blank">Create 
    printable statement</a></font></p>
            
  <p align="center">
</form>
  
  
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
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
