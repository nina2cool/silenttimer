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

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

//CODE GOES BELOW-----------------------------------------------------------

	# get CustomerID from previous page
	$CustomerID = $_GET['cust'];

	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
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
	
		
		
	$sql22 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
	$result22 = mysql_query($sql22) or die("Cannot execute query TypeID!");
		
		while($row22 = mysql_fetch_array($result22))
		{
			$Type = $row22[Type];
		}
		
		
		if($Email == "") {	$Email = "-";	}
		if($Phone == "") {  $Phone = "-";   }
		if($School == "") {  $School = "-";  }
		if($EbayName == "")  { $EbayName = "-";  }
		if($PrepClass == "") {   $PrepClass = "-";  }


		$sql23 = "SELECT * FROM tblShipLocation WHERE LocationID = '$CountryID'";
		$result23 = mysql_query($sql23) or die("Cannot execute query countryID!");
		
		while($row23 = mysql_fetch_array($result23))
		{
			$Country = $row23[Name];
		}
			
		if($CompanyName == "") { $CompanyName = "<br> "; }
		
	$sql2 = "SELECT Max(DateTime) as DateTime, Email, TestID FROM tblRegistration WHERE Email = '$Email' GROUP BY Email";
	$result2 = mysql_query($sql2) or die("Cannot execute query LSAT reg!");
	while($row2 = mysql_fetch_array($result2))
		{
			$RegEmail = $row2[Email];
			$TestID = $row2[TestID];
			$RegDateTime = $row2[DateTime];
			
			
				$RegEmail = strtolower($RegEmail);
				$Email = strtolower($Email);
		

				if($RegEmail == $Email OR $RegEmail )
				{  $Reg = 'yes';  }
				else
				{	$Reg = "";  }
			}
			
			if($Reg == "")  {  $Reg = 'no';  }
			//echo "<br> LSAT 2 = " .$LSAT;
			
 							$sql6 = "SELECT * FROM tblTests WHERE TestID = '$TestID'";
							//echo $sql6;
							$result6 = mysql_query($sql6) or die("Cannot execute query test name!");
							
							while($row6 = mysql_fetch_array($result6))
							{
								$Test = $row6[Name];
							}
			

	$sql3 = "SELECT Max(date) AS date, email FROM tblTimerContacts WHERE type = 'Timer' AND email = '$Email' GROUP BY email";
	$result3 = mysql_query($sql3) or die("Cannot execute query timer interest!");
		
		while($row3 = mysql_fetch_array($result3))
		{
			$TimerEmail = $row3[email];
			$TimerDateTime = $row3[date];
				
				
			$TimerEmail = strtolower($TimerEmail);
			$Email = strtolower($Email);
		
			if($TimerEmail == $Email)  {  $Timer = 'yes';  }
		}
		
		if($Timer == "")  {  $Timer = 'no';  }


	$sql4 = "SELECT Max(date) AS date, email FROM tblTimerContacts WHERE type = 'Watch' AND email = '$Email' GROUP BY email";
	$result4 = mysql_query($sql4) or die("Cannot execute query watch interest!");
		
		while($row4 = mysql_fetch_array($result4))
		{
			$WatchEmail = $row4[email];
			$WatchDateTime = $row4[date];
			
			$WatchEmail = strtolower($WatchEmail);
			$Email = strtolower($Email);
		
			if($WatchEmail == $Email)  {  $Watch = 'yes';  }
		}
		
		if($Watch == "")  {  $Watch = 'no';  }
		
		
		$sql7 = "SELECT BusinessCustomerID FROM tblBusinessCustomer WHERE CustomerID = '$CustomerID'";
		$result7 = mysql_query($sql7) or die("Cannot get bus cust info");
		$NumBus = mysql_num_rows($result7);
		if($NumBus > 0)
			{	while($row7 = mysql_fetch_array($result7))
				{
					$BusinessCustomerID = $row7[BusinessCustomerID];
				}
			}
		
		
?>

<div align="right">
<div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">Customer
           Information</a> | <a href="Notes.php?cust=<? echo $CustomerID; ?>">Notes</a> </font>
</div>
<hr>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFCC">
    <tr>
      <td><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong><?php echo $CompanyName; ?></strong></font></td>
      <td><div align="left"><font color="#FF0000" size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $FirstName; ?> 
      <? echo $LastName; ?></strong></font></div></td>
      <td><font size="3" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td><div align="right"><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"><strong><?php echo $Type; ?></strong></font></div></td>
      <td width="10%"><div align="right"></div></td>
    </tr>
  </table>
  <?
  		if($NumBus > 0 AND $BusinessCustomerID <> "0")
		{
		?>
		<p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="../businesscustomer/bookstores/BookstoreEdit.php?bc=<? echo $BusinessCustomerID; ?>" target="_blank">Go to Bookstore Page</a></font></strong></p>
		<?
		}
		else
		{
		?>
		<br>
		<?
		}
  ?>
  <table width="100%"  border="1" cellpadding="3" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td width="50%"><strong><font size="3" face="Arial, Helvetica, sans-serif">Contact
      Information: </font><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfoEdit.php?cust=<? echo $CustomerID; ?>">Edit
      Customer Information </a></font></strong></td>
      <td width="50%"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Shipping
      Address:</strong></font></td>
    </tr>
    <tr valign="middle">
      <td width="50%"><p align="left"><font size="2" face="Arial, Helvetica, sans-serif">e-mail: <a href="mailto:<?php echo $Email; ?>"><?php echo $Email; ?><strong><br>
        </strong></a></font><font size="2" face="Arial, Helvetica, sans-serif">phone: <?php echo $Phone; ?><strong><br>
        <br>
        </strong>School: <?php echo $School; ?><strong><br>
        </strong>Prep
            class: <?php echo $PrepClass; ?><strong><br>
            </strong>eBay
            name: <?php echo $EbayName; ?></font></p>
      </td>
      <td width="50%"><div align="right">
	  
        <blockquote>
          <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">
		    <? if($CompanyName <> "") { ?><? echo $CompanyName; ?><br><? } ?>
			<? echo $FirstName; ?> <? echo $LastName; ?><br>
			<?php echo $Address; ?><br>
		    <? if($Address2 <> "") { ?><? echo $Address2; ?><br><? } ?>
            <?php echo $City; ?>, <?php echo $State; ?> <?php echo $ZipCode; ?><br>
            <?php echo $Country; ?></font></p>
        </blockquote>
      </div>
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
				$sql2 .= " ORDER BY tblPurchase2.PurchaseID DESC";
				$sortBy ="tblPurchase2.PurchaseID";
				$sortDirection = "DESC";
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
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase
                ID</strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Date/Time</strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Total
                Cost</strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Status</strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Claim
                History</strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping
                History</strong></font></div></td>
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
			$PONumber = $row2[PONumber];
			$InvoiceNumber = $row2[InvoiceNumber];
			
			$TotalCost = $Subtotal + $Tax + $ShippingCost - $Discount;
			
			$sql3 = "SELECT * FROM tblCustomerClaims2 WHERE PurchaseID = '$PurchaseID'";
			$result3 = mysql_query($sql3) or die("Cannot execute query customerID!");
				
			$Count = mysql_num_rows($result3);
			
			
	?>
      <tr>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="PurchaseDetails.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>"><strong><?php echo $PurchaseID; ?></strong></a></font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $DateTime; ?></font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($TotalCost,2); ?></font></div></td>
        
		
		<? if($PONumber <> "" OR $InvoiceNumber <> "") { ?>
		
		<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $PONumber; ?> / <? echo $InvoiceNumber; ?> (<?php echo $Status; ?>)</font></div></td>
        
		<? } else { ?>
		
		<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Status; ?></font></div></td>
		
		<?
		}
		?>
		
		<?
	
	if($Count > 0)
	{
	?>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="ClaimHistory.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Claim</a></font></div></td>
        <?
	}
	else
	{
	$Claim = " ";
	?>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Claim; ?>&nbsp;</font></div></td>
        <?
	}
	?>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="ShippingHistory.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>">Ship</a></font></div></td>
      </tr>
      <?
	}
	?>
    </table>
</div>
<p></p>
  <hr>
   <p align="left"><strong><font size="3" face="Arial, Helvetica, sans-serif">Login History:</font></strong></p>
   
      <?
   
   $sql4 = "SELECT DATE_FORMAT(DateTime, '%m/%d/%Y %H:%i:%s') as DateTime, IP FROM tblCustomerEdit WHERE CustomerID = '$CustomerID' ORDER BY DateTime DESC";
	

	//put SQL statement into result set for loop through records
	$result4 = mysql_query($sql4) or die("Cannot execute query!");
	
	$NumLogins = mysql_num_rows($result4);
   
   	if($NumLogins > 0)
	{
   	
   ?>
   
   <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
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
       <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Date &amp; Time </font></strong></div></td>
       <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">IP Address </font></strong></div></td>
     </tr>
	 
	 <?
	 
	 while($row4 = mysql_fetch_array($result4))
		{
			$LoginDateTime = $row4[DateTime];
			$IP = $row4[IP];
			
	 
	 
	 ?>
	 
	 
     <tr>
	   <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $LoginDateTime; ?></font></div></td>
       <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $IP; ?></font></div></td>
     </tr>
	 
	 <?
	 }
	 ?>
	 
	 
</table>
   <?
   }
   else
   {
   ?>
   
   <div align="left"><font size="2" face="Arial, Helvetica, sans-serif">No logins at this time.</font>
       <?
   }
   ?>
   
     <br>
   </div>
   <hr>
   <div align="left">
     <table width="100%"  border="0" cellpadding="5" cellspacing="0">
    <tr>
      <td width="40%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Other
            Information:</font></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="40%"><font size="2" face="Arial, Helvetica, sans-serif">Did they register
          on the  registration page? </font></td>
      <td <? if ($Reg == "yes") { ?> bgcolor="#00FF00" <? } ?>><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><?php echo $Reg; ?> <? if ($Reg == "yes") { ?> - <? echo $Test; ?> (<? echo $RegDateTime; ?>)
      <? } ?></font></td>
    </tr>
    <tr>
      <td width="40%"><font size="2" face="Arial, Helvetica, sans-serif">Did they request
          a timer email?</font></td>
      <td <? if ($Timer == "yes") { ?> bgcolor="#00FF00" <? } ?>><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Timer; ?> <? if ($Timer == "yes") { ?> - <? echo $TimerDateTime; ?><? } ?></font></td>
    </tr>
    <tr>
      <td width="40%"><font size="2" face="Arial, Helvetica, sans-serif">Did they request
          a watch email? </font></td>
      <td <? if ($Watch == "yes") { ?> bgcolor="#00FF00" <? } ?>><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Watch; ?><? if ($Watch == "yes") { ?> - <? echo $WatchDateTime; ?><? } ?></font></td>
    </tr>
  </table>

    <hr>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="../warranty/ClaimAdd.php">Make 
        a claim</a></font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="Order_Replacement.php?cust=<? echo $CustomerID; ?>">Ship a replacement</a></font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="Order_Reorder.php?cust=<? echo $CustomerID; ?>">New
        order for <? echo $FirstName; ?> <? echo $LastName; ?></a></font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="mailto:<? echo $Email; ?>">Send 
    an email</a></font></p>
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
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>