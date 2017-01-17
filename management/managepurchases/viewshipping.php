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
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?	

	//grab variables to get purchase info and customer info from DB.
	$purchaseID = $_GET['p'];
	$customerID = $_GET['c'];

	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
?>

<? // ---- code to fill page with information....
	
	
	//SQL to get data from purchase table
	$sql = "SELECT ProductName, DateTime, SameBillingAddress, NumOrdered, tblPurchase.ShippingCost, TimerPrice, Tax, tblPurchase.ShippingOptionID, TotalCost, TestID, ReferredBy, tblPurchase.Notes
			FROM tblPurchase INNER JOIN tblShippingOption ON tblPurchase.ShippingOptionID = tblShippingOption.ShippingOptionID
			INNER JOIN tblProduct ON tblPurchase.ProductID = tblProduct.productID
			WHERE PurchaseID = $purchaseID";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$NumOrdered = $row[NumOrdered];
		$ShippingOptionID = $row[ShippingOptionID];
		$ProductName = $row[ProductName];
	}
	
	//SQL to get data from customer table
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = $customerID";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query2!");
	
	while($row = mysql_fetch_array($result))
	{
		//shipping information
		$FirstName = $row[FirstName];
		$LastName = $row[LastName];
		$Address = $row[Address];
		$City = $row[City];
		$State = $row[State];
		$ZipCode = $row[ZipCode];
		$Phone = $row[Phone];
		$Email = $row[Email];
	}
	
	// SQL to get data from shippingoption and shipper table
	$sql = "SELECT ShippingOptionID, Name, CompanyName
			FROM tblShippingOption INNER JOIN tblShipper ON tblShippingOption.ShipperID = tblShipper.ShipperID 
			WHERE ShippingOptionID = $ShippingOptionID";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
	  $ShippingCompany =  $row[CompanyName];
	  $ShippingName =  $row[Name];
	}
	
	$sql = "SELECT * FROM tblShipment WHERE PurchaseID = $purchaseID";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot get shipment info");
	
	while($row = mysql_fetch_array($result))
	{
	  $DateTime =  $row[DateTime];
	  $NumShipped =  $row[NumShipped];
	  $ShipmentComplete =  $row[ShipmentComplete];
	  $TrackingNumber =  $row[TrackingNumber];
	  $BatchID =  $row[OrderShippedID];
	  $Notes =  $row[Notes];
	}
	

?>
<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Ship Purchases</strong></font></p> 
<form action="" method="post" name="frmChange" id="frmChange">
  <table width="100%" border="0" cellspacing="0" cellpadding="8">
                <tr> 
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">&gt; 
              Shipping Info</font></strong><font face="Arial, Helvetica, sans-serif"><strong><font color="#333333" size="3"> 
              <br>
              </font></strong></font> <div align="right"><font face="Arial, Helvetica, sans-serif"><strong><font color="#333333" size="3"></font></strong></font></div></td>
          </tr>
        </table>
        
      </td>
          </tr>
                
    <tr> 
      <td align="left" valign="top">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
          <tr> 
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="41%" align="left" valign="top"> 
                    <p><font color="#333333" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt;&gt; 
                      Ship To:</strong></font></p>
                    <p><font face="Arial, Helvetica, sans-serif"><strong><font size="2"><? echo "$FirstName $LastName";?><font color="#333333"><br>
                      </font><? echo "$Address";?><br>
                      <? echo "$City";?>, <? echo "$State";?> <? echo "$ZipCode";?></font></strong></font></p>
                    <p><font face="Arial, Helvetica, sans-serif"><strong><font size="2"><? echo "$Email";?><br>
                      <? echo "$Phone";?> </font></strong></font></p>
                    <p><strong><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><? echo "$ShippingCompany";?> 
                      <? echo "$ShippingName";?></font></strong></p>
                    </td>
                  <td width="59%" align="left" valign="top"> 
                    <p><font color="#333333" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt;&gt; 
                      Shipping Details</strong></font></p>
                    <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Date 
                      &amp; Time</strong><br>
                      <? echo "$DateTime";?></font></p>
                    <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Number 
                      Shipped</strong><br>
                      <? echo "$NumShipped";?> </font></p>
                    <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Order 
                      Complete?</strong><br>
                      <? echo "$ShipmentComplete";?></font></p>
                    <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Tracking 
                      Number</strong><br>
                      <? echo "$TrackingNumber";?> </font></p>
                    <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Timer 
                      batch ID?</strong><br>
                      <? echo "$BatchID";?> <br>
                      </font></p>
                    </td>
                </tr>
              </table>
              <p><font color="#333333" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt;&gt; 
                Shipping Notes</strong></font></p>
              <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr> 
                  <td width="33%" align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif"><? echo "$Notes";?></font></p>
                    </td>
                </tr>
              </table>
              
            </td>
          </tr>
        </table>
        
      </td>
                </tr>
              </table>
            </form>
            
<p></p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
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