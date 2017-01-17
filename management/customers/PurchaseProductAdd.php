<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.


// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	# --------------------------------------------------------------------------------------------

	//grab variables to get purchase info from DB.
	$DetailID = $_GET['d'];
	$PurchaseID = $_GET['purch'];
	$CustomerID = $_GET['cust'];

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	#<Add button being pushed>
	if ($_POST['Add'] == "Add")
	{
	
		// PurchaseProduct Table
		$ProductID = $_POST['Product'];
		$Quantity = $_POST['Quantity'];
		$Shipped = $_POST['Shipped'];
		$EbayItemNumber = $_POST['EbayItemNumber'];
		$PurchasePrice = $_POST['PurchasePrice'];
		$Status = $_POST['Status'];

		$sql = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, Shipped, EbayItemNumber, Status)
		VALUES('$PurchaseID', '$ProductID', '$Quantity', '$PurchasePrice', '$Shipped', '$EbayItemNumber', '$Status');";
		
		mysql_query($sql) or die("Cannot add customer purchase details 2 information");
		
		$Total = $Quantity * $PurchasePrice;
		
		if($Status == "cancel") { $Total = 0; }
		
		$sql2 = "SELECT * FROM tblPurchase2 WHERE PurchaseID = '$PurchaseID'";
		$result2 = mysql_query($sql2) or die("Cannot execute query!");
		
		while($row2 = mysql_fetch_array($result2))
		{
		$Subtotal = $row2[Subtotal];
		$Tax = $row2[Tax];
		$ShippingCost = $row2[ShippingCost];
		$Discount = $row2[Discount];
		}
		
		$SubtotalNew = $Subtotal + $Total;
		
		if($Tax > 0)
		{
		$TaxNew = ($SubtotalNew + $ShippingCost - $Discount) * 0.0825;
		}
		else
		{
		$TaxNew = 0;
		}
		
		$sql3 = "UPDATE tblPurchase2
		SET Subtotal = '$SubtotalNew',
		Tax = '$TaxNew'
		WHERE PurchaseID = '$PurchaseID'";
		
		$result3 = mysql_query($sql3) or die("cannot update new subtotal");
		
	
	
		$goto = "PurchaseDetails.php?purch=$PurchaseID&cust=$CustomerID";
		header("location: $goto");

		
		
	} 
		
		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		
		}


require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

?>


<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">Contact
      Information</a> | <a href="PurchaseHistory.php?cust=<? echo $CustomerID; ?>">Purchase
History</a></font></p>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
      a 
     Product to Order # <?php echo $PurchaseID; ?></strong></font></p>
<form name="form1" method="post" action="">
  <table width="50%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp;
        </font><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product" class="text" id="Product">
          <option value = "" selected>Please Select</option>
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT * FROM tblProductNew ORDER BY Nickname ASC";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[ProductID];?>" ><? echo $row[Nickname];?></option>
          <?
						}
					?>
        </select>
      </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp;        </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Quantity</font></strong></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>
      <input name="Quantity" type="text" id="Num4" size="10">
</strong></font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Purchase
      Price </font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$
        <input name="PurchasePrice" type="text" id="PurchasePrice" size="10">
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Ebay Item
            Number</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="EbayItemNumber" type="text" id="EbayItemNumber">
</font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipped?</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Shipped" id="Shipped">
          <option value="y">y</option>
          <option value="n" selected>n</option>
                </select>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Replacement?</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Replacement" id="Replacement">
          <option value="y">y</option>
          <option value="n" selected>n</option>
                                </select>
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Status" class="text" id="select2">
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT Status FROM tblPurchaseDetails2
						GROUP BY Status ORDER BY Status ASC";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[Status];?>" <? if($row[Status] == "active"){echo "selected";}?>><? echo $row[Status];?></option>
          <?
						}
					?>
        </select>
      </font></td>
    </tr>
  </table>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&lt; <a href="PurchaseDetails.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Back to Purchase Details</a><br>
  </strong></font></p>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Add" type="submit" id="Add" value="Add">
  </font></strong></p>
</form>
<p>&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

?>