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

	//grab variables to get customer info from DB.
	$AffID = $_GET['aff'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$AffID'";
	
	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}


	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

		while($row = mysql_fetch_array($result))
			{
			$FirstName = $row['FirstName'];
			$LastName = $row['LastName'];
			$CheckToName = $row['CheckToName'];
			}


?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View 
  Sales for <u><? echo $AffID; ?></u></strong></font></p>
<form>
  <table width="50%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr> 
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Affiliate 
        ID </font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $AffID; ?></font></td>
    </tr>
    <tr> 
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Contact 
        Name</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo "$FirstName $LastName"; ?></font></td>
    </tr>
    <tr> 
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Make 
        Check Payable To</font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CheckToName; ?></font></td>
    </tr>
  </table>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><b>&gt; <a href="PartnerInfo.php?aff=<? echo $AffID; ?>">View
        Partner Info</a></b></font></p>
  <table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
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
      <td class=sort> 
        <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase
          ID </strong></font></div></td>
      <td class=sort> 
        <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Date
          and Time</strong></font></div></td>
      <td class=sort> 
        <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Amount
          of Sale</strong></font></div></td>
      <td class=sort> 
        <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Commission
        Amount</strong></font></div></td>
      <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Status</strong></font></div></td>
      <?
			  
			  $sql4 = "SELECT * FROM tblAffiliatePurchase WHERE AffiliateID = '$AffID' AND Status = 'open' ORDER BY PurchaseID ASC";
			
			  $result4 = mysql_query($sql4) or die("Cannot find purchases!");
			  
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row4 = mysql_fetch_array($result4))
				{
					$AffID = $row4['AffiliateID'];
					$PurchaseID = $row4['PurchaseID'];
					$Sale = $row4['TotalSale'];
					$Commission = $row4['Commission'];
			
					
					
					$sql3 = "SELECT * FROM tblPurchase2 WHERE PurchaseID = '$PurchaseID' AND Status = 'active'";							
					$result3 = mysql_query($sql3) or die("Cannot get purchase info!");
					
					while($row3 = mysql_fetch_array($result3))
					{
						$CustomerID = $row3['CustomerID'];
						$Subtotal = $row3['Subtotal'];
						$Tax = $row3['Tax'];
						$Discount = $row3['Discount'];
						$ShippingCost = $row3['ShippingCost'];
						$DateTime = $row3['OrderDateTime'];
					
						//$Sale = $Subtotal + $Tax + $ShippingCost - $Discount;
					
					}
					
						$sql5 = "SELECT * FROM tblCustomerClaims2 WHERE PurchaseID = '$PurchaseID'";							
						$result5 = mysql_query($sql5) or die("Cannot get purchase info!");
						
						$Count = mysql_num_rows($result5);
						
				
						while($row5 = mysql_fetch_array($result5))
						{
						$ClaimType = $row5[ClaimType];
						$ClaimID = $row5[ClaimID];
						}

					
					if($Count == 0)
					{ $Status = "-"; }
					elseif($Count > 0 AND $ClaimType == "Return")
					{ $Status = $ClaimType; }
					elseif($Count > 0 AND $ClaimType == "Cancel")
					{ $Status = $ClaimType; }
					else
					{ $Status = "-"; }
					
					
			  ?>
    <tr> 
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/CustomerInfo.php?cust=<? echo $CustomerID; ?>" target="_blank"><? echo $PurchaseID; ?></a></strong></font></div></td>
      <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Sale,2); ?></font></div></td>
      <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Commission,2); ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../warranty/ClaimEdit.php?claim=<? echo $ClaimID; ?>" target="_blank"><? echo $Status; ?></a></font></div>
      </td>
    </tr>
    <?
			  	
				
				
				}
				
				
				
			  ?>
  </table> 
		
            
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt;
          </strong><a href="statement.php?affiliate=<? echo $AffID; ?>" target="_blank"><strong>Create
          Payment Statement</strong></a></font></p>
  <p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="sheet.php?aff=<? echo $AffID; ?>" target="_blank">Create
        Sheet on How to Increase Commissions</a> </font></strong></p>
  <p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="statementnopay.php?affiliate=<? echo $AffID; ?>" target="_blank">Create 
    Non-Payment Statement</a></font></strong></p>
  <p align="left"><strong><font size="2"><font size="2" face="Arial, Helvetica, sans-serif">&gt; </font><font face="Arial, Helvetica, sans-serif"><a href="Paid.php?aff=<? echo $AffID; ?>">Commission 
    Paid</a></font> <font color="#FF0000">&lt;= Make note of purchase IDs above!</font></font></strong></p>
  <p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="PaymentHistory.php?affiliate=<? echo $AffID; ?>">View 
    Payment History</a></font></strong> </p>
  <p align="left">&nbsp;</p>
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.

require "../include/footerlinks.php";

// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
