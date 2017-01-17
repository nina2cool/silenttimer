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

	//grab variables to get purchase info from DB.
	$PurchaseID = $_GET['purch'];
	$CustomerID = $_GET['cust'];


	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
	$result = mysql_query($sql) or die("Cannot retrieve affiliate info, please try again.");

		while($row = mysql_fetch_array($result))
			{
			$CompanyName = $row['BusinessName'];
			$FirstName = $row['FirstName'];
			$LastName = $row['LastName'];
			$Address = $row['Address'];
			$City = $row['City'];
			$State = $row['State'];
			$ZipCode = $row['ZipCode'];
			}




	
	$sql = "SELECT DATE_FORMAT(InvoiceDate, '%m/%d/%y') AS InvoiceDate, Subtotal, InvoiceNumber, Discount, PONumber, ShippingCost, NovaPress, Tax FROM tblPurchase2 WHERE PurchaseID = '$PurchaseID'";

	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
			$InvoiceDate = $row['InvoiceDate'];
			$InvoiceNumber = $row['InvoiceNumber'];
			$Subtotal = $row['Subtotal'];
			$PONumber = $row['PONumber'];
			$Discount = $row['Discount'];
			
			$ShippingCost = $row['ShippingCost'];
			$Tax = $row['Tax'];
			$Total = $Subtotal + $Tax - $Discount;
			
			
			$sql3 = "SELECT * FROM tblPurchaseDetails2 WHERE PurchaseID = '$PurchaseID'";
			$result3 = mysql_query($sql3) or die("Cannot retrieve purchasedetails info, please try again.");

				while($row3 = mysql_fetch_array($result3))
					{
					$ProductID = $row3['ProductID'];
					$Quantity = $row3['Quantity'];
					$PurchasePrice = $row3['PurchasePrice'];
					}
			
			//echo "date = " .$InvoiceDate;
			
			}
	



	$sql = "SELECT * FROM tblProduct WHERE ProductID = '$ProductID'";
	$result = mysql_query($sql) or die("Cannot retrieve purchase info, please try again.");

		while($row = mysql_fetch_array($result))
			{
			$Item = $row['ISBN'];
			$RetailPrice = $row['RetailPrice'];
			$Description = $row['ProductName'];
			}


  		$sql2 = "SELECT * FROM tblAffiliate WHERE AffiliateID = 'novatimer'";
		$result2 = mysql_query($sql2) or die("Cannot get affiliate information");
					
		while($row = mysql_fetch_array($result2))
			{
				$CompanyName1 = $row['CompanyName'];
				$Address1 = $row['Address'];
				$City1 = $row['City'];
				$State1 = $row['State'];
				$ZipCode1 = $row['ZipCode'];
			}
  

	
	$Now = date("m/d/y");

	
?><title>Nova Press Packing List</title>

<table width="650" border="0" cellpadding="5" cellspacing="0">
  <tr> 
    <td width="22%"><font size="2" face="Arial, Helvetica, sans-serif"><img src="../partners/images/Front_Logo_01.jpg" width="123" height="79"></font></td>
    <td width="39%"><div align="left"><font size="4" face="Arial, Helvetica, sans-serif"><strong>Silent 
        Technology LLC<br>
        </strong></font><font size="2" face="Arial, Helvetica, sans-serif">3415
        Greystone Drive, Suite 103<br>
        Austin, TX 78731<br>
        Office: 512.340.0338<br>
        Fax: 512.532.6187 </font></div></td>
    <td width="39%"><font size="6" face="Arial, Helvetica, sans-serif"><strong>PACKING 
      LIST </strong></font></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="650" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td width="50%" bgcolor="#CCCCCC"><strong><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><em>For:</em></font> 
      </font></strong></td>
    <td bgcolor="#CCCCCC"><strong><font size="2" face="Arial, Helvetica, sans-serif"><em>Send 
      Payment To:</em>&nbsp;</font></strong></td>
  </tr>
  <tr> 
    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?><br>
      <? echo "$FirstName $LastName"; ?><br>
      <? echo $Address; ?></font><br>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font>, 
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font> 
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font> 
      </font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><br>
      <? echo $CompanyName1; ?><br>
      <? echo $Address1; ?></font><br>
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $City1; ?></font>, 
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $State1; ?></font> 
      <font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode1; ?></font></font></td>
  </tr>
</table>
<br>
<hr noshade>
<br>
<table width="300" border="1" cellpadding="3" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td width="75%"><font size="2" face="Arial, Helvetica, sans-serif">Shipment 
      Date:</font></td>
    <td width="62%"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Now; ?></font></div></td>
  </tr>
  <tr> 
    <td width="75%" height="29"><font size="2" face="Arial, Helvetica, sans-serif">P.O. 
      No.</font></td>
    <td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $PONumber; ?></font></div></td>
  </tr>
  <tr> 
    <td height="29"><font size="2" face="Arial, Helvetica, sans-serif">Invoice 
      Date </font></td>
    <td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $InvoiceDate; ?></font></div></td>
  </tr>
  <tr> 
    <td height="29"><font size="2" face="Arial, Helvetica, sans-serif">Invoice</font> 
      # </td>
    <td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $InvoiceNumber; ?></font></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="650" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
  <tr bgcolor="#CCCCCC"> 
    <td width="90" height="45"> 
      <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Item</font></strong></div></td>
    <td width="310" height="45"> 
      <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Title/Description</font></strong></div></td>
    <td width="50" height="45"> 
      <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Qty</font></strong></div></td>
    <td width="50" height="45"> 
      <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Cost</font></strong></div></td>
    <td width="50" height="45"> 
      <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Retail 
        Price </font></strong></div></td>
    <td width="50" height="45"> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Amount</font></strong></div></td>
  </tr>
  <tr valign="top"> 
    <td width="90" height="93"> 
      <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Item; ?></font></div></td>
    <td width="310"> 
      <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Description; ?> -
          by Silent Technology LLC</font></div></td>
    <td width="50"> 
    <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Quantity; ?></font></div></td>
    <td width="50"> 
      <div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($PurchasePrice,2); ?></font></div></td>
    <td width="50"> 
      <div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($RetailPrice,2); ?></font></div></td>
    <td width="50"> 
      <div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Total,2); ?></font></div></td>
  </tr>
  <tr valign="top"> 
    <td colspan="2" rowspan="3">&nbsp;</td>
    <td height="30" colspan="3" valign="middle"> <p><font size="2" face="Arial, Helvetica, sans-serif">Subtotal</font></p></td>
    <td><p align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Total,2); ?></font></p></td>
  </tr>
  <tr valign="top"> 
    <td height="30" colspan="3" valign="middle"><font size="2" face="Arial, Helvetica, sans-serif">Sales 
      Tax (0.0 %)</font></td>
    <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Tax,2); ?></font></div></td>
  </tr>
  <tr valign="top"> 
    <td height="30" colspan="3" valign="middle"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Total</strong></font></td>
    <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Total,2); ?></font></div></td>
  </tr>
</table>



<p><br>
</p>
<p align="left">&nbsp;</p>
<table width="300" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><em><strong>* Please 
      place on the shelf in the test prep section.</strong></em></font></td>
  </tr>
</table>
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