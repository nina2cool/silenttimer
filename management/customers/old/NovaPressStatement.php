<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
<?


	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = 'novatimer'";
	$result = mysql_query($sql) or die("Cannot retrieve affiliate info, please try again.");

		while($row = mysql_fetch_array($result))
			{
			$FirstName = $row['FirstName'];
			$LastName = $row['LastName'];
			$CheckToName = $row['CheckToName'];
			$CompanyName = $row['CompanyName'];
			$Address = $row['Address'];
			$City = $row['City'];
			$State = $row['State'];
			$ZipCode = $row['ZipCode'];
			}


	
	$Now = date("F j, Y");

	
?>

<table width="650" border="0" cellpadding="5" cellspacing="0">
  <tr> 
    <td width="38%"><font size="4" face="Arial, Helvetica, sans-serif"><strong>Silent 
      Technology LLC</strong></font></td>
    <td width="62%" colspan="2"><div align="right"><font size="6" face="Arial, Helvetica, sans-serif"><strong>STATEMENT</strong></font></div></td>
  </tr>
  <tr> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><em><strong>Timing 
      Matters...</strong></em></font></td>
    <td colspan="2"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"> 
        </font></div></td>
  </tr>
</table>
<br>
<table width="650" border="0" cellpadding="5" cellspacing="0">
  <tr> 
    <td width="34%"><p><font size="2" face="Arial, Helvetica, sans-serif">3415 
        Greystone, Suite 103<br>
        Austin, TX 78731<br>
        Office: 512.340.0338<br>
        Fax: 512.532.6187</font></p></td>
    <td width="33%" valign="top">
<div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><em>For:</em><br>
        <? echo $CompanyName; ?><br>
        <? echo "$FirstName $LastName"; ?><br>
        <? echo $Address; ?></font><br>
        <font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font>, 
        <font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font> 
        <font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font> 
        </font></div></td>
    <td width="33%"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><img src="../partners/images/Front_Logo_01.jpg" width="161" height="104"></font></div></td>
  </tr>
</table>
<br>
<hr noshade>
<br>
<table width="364" border="0" align="right" cellpadding="3" cellspacing="0" bordercolor="#CCCCCC">
  <tr> 
    <td width="30%"><font size="2" face="Arial, Helvetica, sans-serif">Statement 
      Date:</font></td>
    <td width="70%"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Now; ?></font></td>
  </tr>
</table>
<p>&nbsp; </p>
<p><strong><font size="3" face="Arial, Helvetica, sans-serif">SALES SUMMARY TO 
  DATE</font></strong></p>




  <?  
	  $sql = "SELECT * FROM tblPurchase2 WHERE NovaPress = 'y' AND Paid = 'n'";
	  $result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");
	
		$TotalOwed = 0;
		
		while($row = mysql_fetch_array($result))
			{
			$InvoiceNumber = $row['InvoiceNumber'];
			$PONumber = $row['PONumber'];
			$CustomerID = $row['CustomerID'];
			$Subtotal = $row['Subtotal'];
			$Tax = $row['Tax'];
			//$TotalCost = $row['TotalCost'];
			//$Shipped = $row['Shipped'];
			$Notes = $row['Notes'];
			$OrderDateTime = $row['DateTime'];
			//$Total = $row['Total'];
			//$NumOrdered = $row['NumOrdered'];
			$ShippingCost = $row['ShippingCost'];
			$Paid = $row['Paid'];
			$InvoiceDate = $row['InvoiceDate'];
			$Shipped = $row['Shipped'];
			$PurchaseID = $row['PurchaseID'];
					
					$sql2 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID' AND Status = 'active'";
					$result2 = mysql_query($sql2) or die("Cannot get purchase details info");
					
					//echo $sql2;
					
					while($row2 = mysql_fetch_array($result2))
					{
					$Quantity = $row2[Quantity];
					$PurchasePrice = $row2[PurchasePrice];
					}
			
			$TotalCost = $Subtotal + $ShippingCost;
			
			
			$Cut = 2.5;
			$TotalCut = $Cut * $Quantity;
			$Cost = $TotalCost - $TotalCut;
			$TotalOwed = $TotalOwed + $Cost;
			
		
			
			$sql2 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
			$result2 = mysql_query($sql2) or die("Cannot retrieve purchase info, please try again.");
	

				while($row2 = mysql_fetch_array($result2))
				{
				$CompanyName1 = $row2['BusinessName'];
				$FirstName1 = $row2['FirstName'];
				$LastName1 = $row2['LastName'];
				$City1 = $row2['City'];
				$State1 = $row2['State'];
				}
			
?>
<table width="600" border="1" cellspacing="0" cellpadding="5">
  <tr bgcolor="#FFFFCC"> 
    <td colspan="2" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo "$CompanyName1"; ?></strong><br>
      <? echo $City1; ?>, <? echo $State1; ?></font></td>
    <td valign="bottom"><font size="2" face="Arial, Helvetica, sans-serif">Invoice 
      Number:<br>
      <? echo $InvoiceNumber; ?></font> </td>
    <td valign="bottom"><font size="2" face="Arial, Helvetica, sans-serif">Purchase 
      Order:<br>
      <? echo $PONumber; ?></font> </td>
    <td valign="bottom"><font size="2" face="Arial, Helvetica, sans-serif">Invoice 
      Date:<br>
      <? echo $InvoiceDate; ?></font> </td>
    <td valign="bottom"><font size="2" face="Arial, Helvetica, sans-serif">Shipped?<br>
      <? echo $Shipped; ?></font> </td>
  </tr>
  <tr> 
    <td width="123"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"># 
        of Timers Ordered</font></div></td>
    <td width="94"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Timer 
        Cost </font></div></td>
    <td width="77"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Shipping 
        Cost </font></div></td>
    <td width="73"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Total 
        Cost </font></div></td>
    <td width="92"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Commission 
        Amount </font></div></td>
    <td width="67"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">Total 
        Owed </font></div></td>
  </tr>
  <tr> 
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Quantity; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($PurchasePrice,2); ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($ShippingCost,2); ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($TotalCost,2); ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($TotalCut,2); ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Cost,2); ?></font></div></td>
  </tr>
</table>
<br>
  <?
 
 }

 ?>


<br>
<table width="600" border="1" cellpadding="5" cellspacing="0" bordercolor="#666666">
  <tr> 
    <td height="31"><font size="3" face="Arial, Helvetica, sans-serif"><strong>TOTAL 
      OWED TO DATE: </strong></font><font size="3" face="Arial, Helvetica, sans-serif"><strong>$<? echo number_format($TotalOwed,2); ?></strong></font></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif">Make checks payable to Silent Technology 
  LLC.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><em><strong>Send payment 
  to:</strong></em><br>
  Silent Technology LLC<br>
  3415 Greystone, Suite 103<br>
  Austin, TX 78731</font><br>
  <font size="2" face="Arial, Helvetica, sans-serif"> </font></p>
<table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><div align="center"><font size="4" face="Arial, Helvetica, sans-serif">www.SilentTimer.com</font></div></td>
  </tr>
</table>
<p align="left">&nbsp;</p>
<p align="left">
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);


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