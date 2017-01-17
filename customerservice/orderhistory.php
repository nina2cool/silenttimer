<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('custID'))
{
// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";


//CODE GOES BELOW-----------------------------------------------------------

	$custID = $_SESSION['custID'];
	$CustomerID = $custID;
	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$custID'";
	$result = mysql_query($sql) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result))
		{
			
			$FirstName = $row[FirstName];
			$LastName = $row[LastName];
			$Address = $row[Address];
			$Address2 = $row[Address2];
			$City = $row[City];
			$State = $row[State];
			$StateOther = $row[StateOther];
			$ZipCode = $row[ZipCode];
			$CountryID = $row[CountryID];
			$Phone = $row[Phone];
			$Email = $row[Email];
			$School = $row[School];
			$PrepClass = $row[PrepClass];
			$EbayName = $row[EbayName];
			$TypeID = $row[Type];
			$BusinessType = $row[BusinessType];
			$CompanyName = $row[BusinessName];
			$EbayName = $row[EbayName];
			$School = $row[School];
			$PrepClass = $row[PrepClass];
			
		}
	

		$sql2 = "SELECT * FROM tblShipLocation WHERE LocationID = '$CountryID'";
		$result2 = mysql_query($sql2) or die("Cannot execute query countryID!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$Country = $row2[Name];
		}
			

?><title>Order History</title>
<br>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFCC">
    <tr>
      <td><font color="#000000" size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td><div align="left"><font color="#FF0000" size="5" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">Order
                History: </font><font color="#33CC33" size="4"><?php echo $FirstName; ?></font> 
                  <font color="#33CC33" size="4"><? echo $LastName; ?></font></strong></font></div></td>
      <td><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td>&nbsp;</td>
      <td width="10%">&nbsp;</td>
    </tr>
</table>
  <br>
  <table width="100%"  border="1" cellpadding="3" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td width="50%"><strong><font size="3" face="Arial, Helvetica, sans-serif">Contact
      Information:</font></strong></td>
      <td width="50%"><strong><font size="3" face="Arial, Helvetica, sans-serif">Shipping
      Address:</font></strong></td>
    </tr>
    <tr valign="top">
      <td width="50%"><p>      
      <p align="left">
	  
	  	<font size="2" face="Arial, Helvetica, sans-serif">
		
		<? if($Email <> "") { ?>e-mail: <a href="mailto:<?php echo $Email; ?>"><?php echo $Email; ?></a><br><? } ?>
		
		<? if($Phone <> "") { ?>phone: <?php echo $Phone; ?><br><? } ?>
        
        <br>
		
		<? if($School <> "") { ?>School: <?php echo $School; ?><br><? } ?>
        
		<? if($PrepClass <> "") { ?>Prep class: <?php echo $PrepClass; ?><br><? } ?>
		
		<? if($EbayName <> "") { ?>eBay name: <?php echo $EbayName; ?><br><? } ?>
		
		
		</font></p>
      </td>
      <td width="50%">
          <font size="2" face="Arial, Helvetica, sans-serif"><br>
                    
					<? if($CompanyName <> "") { ?><? echo $CompanyName; ?><br><? } ?>
					<? echo $FirstName; ?> <? echo $LastName; ?><br>
					<?php echo $Address; ?><br>
					<? if($Address2 <> "") { ?><? echo $Address2; ?><br><? } ?>
                     <?php echo $City; ?>, <?php echo $State; ?> <?php echo $ZipCode; ?><br>
                    <?php echo $Country; ?><br><br>
        </font>
      </td>
    </tr>
</table>
  <div align="left">
    <p>    <strong><font size="3" face="Arial, Helvetica, sans-serif">Purchase
          History: </font></strong>    </p>
	
	<?
			$sql2 = "SELECT * FROM tblPurchase2 WHERE CustomerID = '$CustomerID'";
			
			
			//sort results.....
			if ($sortBy != "")
			{
				$sql2 .= " ORDER BY $sortBy $sortDirection";
			}
		
			else
			{
				$sql2 .= " ORDER BY tblPurchase2.PurchaseID ASC";
				$sortBy ="tblPurchase2.PurchaseID";
				$sortDirection = "ASC";
			}
			
			
			$result2 = mysql_query($sql2) or die("Cannot execute query customerID!");
	
	?>

	
    <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
	
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
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Order
                # </strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Date/Time</strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Order
                Total </strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Status</strong></font></div></td>
      </tr>
      <?

		while($row2 = mysql_fetch_array($result2))
		{
			$PurchaseID = $row2[PurchaseID];
			$Subtotal = $row2[Subtotal];
			$Tax = $row2[Tax];
			$Discount = $row2[Discount];
			$ShippingCost = $row2[ShippingCost];
			$Status = $row2[Status];
			$DateTime = $row2[OrderDateTime];
			$Shipped = $row2[Shipped];
			
			
			
			$TotalCost = $Subtotal + $Tax + $ShippingCost - $Discount;
			
			if($Status <> "cancel" AND $Shipped == "y")
			{
			$Status = "shipped";
			}
			elseif($Status <> "cancel" AND $Shipped <> "y")
			{
			$Status = "not shipped";
			}
			else
			{
			$Status = $Status;
			}
			
			if($Status == "cancel") { $Status = "cancelled"; }
			if($Preorder == "y") { $Status = "pre-order"; }
			
	?>
      <tr>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="orderdetails.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>"><strong><?php echo $PurchaseID; ?></strong></a></font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $DateTime; ?></font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($TotalCost,2); ?></font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
		<?
		if($Status == "shipped")
		{
		?>
		<a href="shippinghistory.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>"><?php echo $Status; ?></a>
		<?
		}
		else
		{
		?>
		<?php echo $Status; ?>
		<?
		}
		?>
		</font></div></td>
      </tr>
<?
}
?>
	
    </table>
</div>
<p></p>
  <div align="left">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customerservice/index.php'>
<?
}
?>