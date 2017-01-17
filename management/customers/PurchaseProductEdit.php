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

	//grab variables to get purchase info from DB.
	$DetailID = $_GET['d'];
	$PurchaseID = $_GET['purch'];
	$CustomerID = $_GET['cust'];

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	#<Add button being pushed>
	if ($_POST['Save'] == "Save")
	{
	
		// PurchaseProduct Table
		$ProductID_New = $_POST['Product'];
		$Quantity_New = $_POST['Quantity'];
		$PurchasePrice_New = $_POST['PurchasePrice'];
		$EbayItemNumber_New = $_POST['EbayItemNumber'];
		$Shipped_New = $_POST['Shipped'];
		$Replacement_New = $_POST['Replacement'];
		$Status_New = $_POST['Status'];
		
		$sql = "SELECT * FROM tblPurchaseDetails2 WHERE DetailID = '$DetailID'";
		$result = mysql_query($sql) or die("Cannot execute query! detail ID");
	
		while($row = mysql_fetch_array($result))
		{
				$ProductID_Old = $row[ProductID];
				$Quantity_Old = $row[Quantity];
				$PurchasePrice_Old = $row[PurchasePrice];
				$EbayItemNumber_Old = $row[EbayItemNumber];
				$Shipped_Old = $row[Shipped];
				$Replacement_Old = $row[Replacement];
				$Status_Old = $row[Status];
		}
	
		$Total_Old = $PurchasePrice_Old * $Quantity_Old;
		$Total_New = $PurchasePrice_New * $Quantity_New;
		
		if($Status_Old == "cancel") { $Total_Old = 0; }
		if($Status_New == "cancel") { $Total_New = 0; }
		
		$sql = "UPDATE tblPurchaseDetails2
			SET ProductID = '$ProductID_New', 
				Quantity = '$Quantity_New',
				PurchasePrice = '$PurchasePrice_New',
				Shipped = '$Shipped_New',
				EbayItemNumber = '$EbayItemNumber_New',
				Status = '$Status_New',
				Replacement = '$Replacement_New'
			WHERE DetailID = '$DetailID'";

		mysql_query($sql) or die("Cannot update customer purchase details 2 information");
		
		
		$sql2 = "SELECT * FROM tblPurchase2 WHERE PurchaseID = '$PurchaseID'";
		$result2 = mysql_query($sql2) or die("Cannot execute query! customer purchase join");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$Discount_Old = $row2[Discount];
			$ShippingCost_Old = $row2[ShippingCost];
			$Tax_Old = $row2[Tax];
			$Subtotal_Old = $row2[Subtotal];
		}
		
		$Subtotal_New = $Subtotal_Old - $Total_Old + $Total_New;
		
		if($Tax_Old > 0)
		{
			$Tax_New = ($Subtotal_New + $ShippingCost_Old - $Discount_Old) * 0.0825;
		}
		else
		{
			$Tax_New = 0;
		}
		
		$sql3 = "UPDATE tblPurchase2
		SET Tax = '$Tax_New',
		Subtotal = '$Subtotal_New'
		WHERE PurchaseID = '$PurchaseID'";
		$result3 = mysql_query($sql3) or die("Cannot execute query! detail ID");

		$goto = "PurchaseDetails.php?purch=$PurchaseID&cust=$CustomerID";
		header("location: $goto");
		
	
	} 
	
	
			// has top header in it.
		require "../include/headertop.php";
		
		// has top menu for this page in it, you acn change these links in this folders include folder.
		require "include/topmenu.php";
		
		// has bottom header in it, ths goes under the top menu for this page.
		require "../include/headerbottom.php";

	
	
		
				$sql = "SELECT * FROM tblPurchaseDetails2 WHERE DetailID = '$DetailID'";
			
				//put SQL statement into result set for loop through records
				$result = mysql_query($sql) or die("Cannot execute query! detail ID");
			
				while($row = mysql_fetch_array($result))
				{
						$PurchaseID = $row[PurchaseID];
						$ProductID = $row[ProductID];
						$Quantity = $row[Quantity];
						$PurchasePrice = $row[PurchasePrice];
						$Shipped = $row[Shipped];
						$EbayItemNumber = $row[EbayItemNumber];
						$Status = $row[Status];
						$Replacement = $row[Replacement];
				}
	
		

		
		}
		
		
		

?>





<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">Customer
Information</a> | <a href="Notes.php?cust=<? echo $CustomerID; ?>">Notes</a></font></p>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
     Product Details</strong></font></p>
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
          <option value="<? echo $row[ProductID];?>" <? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname];?></option>
          <?
						}
					?>
        </select>
      </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">&nbsp;        </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Quantity</font></strong></td>
      <td><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>
      <input name="Quantity" type="text" id="Num4" value="<? echo $Quantity;?>" size="10">
</strong></font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Purchase
      Price </font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$
        <input name="PurchasePrice" type="text" id="PurchasePrice" value="<? echo $PurchasePrice; ?>" size="10">
      </font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Ebay Item
            Number</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="EbayItemNumber" type="text" id="EbayItemNumber"  value="<? echo $EbayItemNumber;?>">
</font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipped?</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">        <select name="Shipped" id="Shipped">
          <option value="y"<? if($Shipped == "y") { ?> selected<? } ?>>y</option>
          <option value="n"<? if($Shipped == "n") { ?> selected<? } ?>>n</option>
        </select>
</font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Replacement?</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">        <select name="Replacement" id="Replacement">
          <option value="y"<? if($Replacement == "y") { ?> selected<? } ?>>y</option>
          <option value="n"<? if($Replacement == "n") { ?> selected<? } ?>>n</option>
        </select>
</font></td>
    </tr>
    <tr>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">        <select name="Status" class="text" id="select2">
          
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
          <option value="<? echo $row[Status];?>" <? if($row[Status] == $Status){echo "selected";}?>><? echo $row[Status];?></option>
          <?
						}
					?>
        </select>
</font></td>
    </tr>
  </table>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Save" type="submit" id="Save" value="Save">
    <input type="reset" name="Submit2" value="Reset">
  </font></strong></p>
</form>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&lt; <a href="PurchaseDetails.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Back
to Purchase Details </a></strong></font></p>

<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; <a href="../warranty/ClaimAdd.php?purch=<? echo $PurchaseID; ?>&detail=<? echo $DetailID; ?>">Create
        a Claim for this Item </a></strong></font></p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

?>