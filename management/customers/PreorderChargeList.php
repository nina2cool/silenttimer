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
	$Letter = $_GET['abc'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "SELECT tblCustomer.FirstName, tblCustomer.LastName, tblPurchasePreorder.PurchaseID, tblPurchasePreorder.BankCode,
	tblPurchasePreorder.DateTime, tblPurchasePreorder.LastFourCr, tblPurchasePreorder.Amount, tblPurchase2.Subtotal, tblPurchase2.Tax,
	tblPurchase2.Discount, tblPurchase2.ShippingCost, tblPurchasePreorder.IsCheck, tblCustomer.CustomerID
	FROM tblPurchasePreorder
	INNER JOIN tblPurchase2
	ON tblPurchasePreorder.PurchaseID = tblPurchase2.PurchaseID
	INNER JOIN tblCustomer
	ON tblPurchase2.CustomerID = tblCustomer.CustomerID
	WHERE tblPurchasePreorder.Status = 'active' AND tblPurchase2.Status = 'active'";
	
	//echo $sql;
	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblPurchasePreorder.DateTime ASC";
		$sortBy ="tblPurchasePreorder.DateTime";
		$sortDirection = "ASC";
	}
		

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	$Number = mysql_num_rows($result);

?>
<p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Preorder
      Charge List</strong></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Lists
      out how much to charge and when they were first charged.</font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Need
      to charge 
    <? echo number_format($Number,0); ?> customers</strong></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="PreorderView.php">Back to
    Preorder Customers</a></font></p>
<table width="99%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
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
    <tr bgcolor="#FFFFCC"> 
      <td class=sort> <div align="center"><font size="1"><strong><a href="PreorderChargeList.php?sort=tblPurchasePreorder.PurchaseID&d=<? if ($sortBy=="tblPurchasePreorder.PurchaseID") {echo $sd;} else {echo "ASC";}?>"><font face="Arial, Helvetica, sans-serif">pID</font></a></strong></font></div></td>
      <td class=sort><div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif"><a href="PreorderChargeList.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";}?>">Last, </a> <a href="PreorderChargeList.php?sort=tblCustomer.FirstName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";}?>">First</a> Name</font></strong></font></div></td>
      <td class=sort><div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif"><a href="PreorderChargeList.php?sort=tblPurchasePreorder.DateTime&d=<? if ($sortBy=="tblPurchasePreorder.DateTime") {echo $sd;} else {echo "ASC";}?>">Purchase
                Date</a></font></strong></font></div></td>
      <td class=sort><div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif"><a href="PreorderChargeList.php?sort=tblPurchasePreorder.LastFourCr&d=<? if ($sortBy=="tblPurchasePreorder.LastFourCr") {echo $sd;} else {echo "ASC";}?>">Last
              4 Digits</a> </font></strong></font></div></td>
      <td class=sort><div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif"><a href="PreorderChargeList.php?sort=tblPurchasePreorder.BankCode&d=<? if ($sortBy=="tblPurchasePreorder.BankCode") {echo $sd;} else {echo "ASC";}?>">Authorization
              Code</a> </font></strong></font></div></td>
      <td class=sort><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="PreorderChargeList.php?sort=tblPurchasePreorder.Amount&d=<? if ($sortBy=="tblPurchasePreorder.Amount") {echo $sd;} else {echo "ASC";}?>">Initial</a> /
              Remaining</strong></font></div></td>
      <td class=sort><div align="center"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong>Paid</strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$PurchaseID = $row['PurchaseID'];
				$CustomerID = $row['CustomerID'];
				$LastFourCr = $row['LastFourCr'];
				$FirstName = $row['FirstName'];
				$LastName = $row['LastName'];
				$BankCode = $row['BankCode'];
				$DateTime = $row['DateTime'];
				$Amount = $row['Amount'];
				$Subtotal = $row['Subtotal'];
				$Tax = $row['Tax'];
				$Discount = $row['Discount'];
				$ShippingCost = $row['ShippingCost'];
				$IsCheck = $row['IsCheck'];
				
				$Total = $Subtotal + $Tax + $ShippingCost - $Discount;
				$Remainder = $Total - $Amount;
				

			  ?>
  <tr> 
      <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>"><? echo $PurchaseID; ?></a></font></div></td>
      <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?>, <? echo $FirstName; ?></font></td>
      <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font></div></td>
      <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $LastFourCr; ?></font></div></td>
      <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">
        <? if($IsCheck <> "y") { ?>
        <? echo $BankCode; ?>
        <? } else { ?>
        CHECK
        <? } ?>
      </font></div></td>
      <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><font color="#00CC33">$ <? echo number_format($Amount,2); ?></font></strong> /
            <font color="#FF0000"><strong>$ <? echo number_format($Remainder,2); ?></strong></font></font></div></td>
      <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="PreorderChargeListPaid.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Mark as Paid</a> </strong></font></div></td>
  </tr>
    <?			}
			  	
				
				//close connection to database
				mysql_close($link);
			  ?>
</table> 
		
            <p align="left">&nbsp;</p>
  
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
