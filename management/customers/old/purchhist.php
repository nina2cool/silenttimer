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
?>

<?
	# get CustomerID from previous page
	$CustomerID = $_GET['cust'];

	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
	$result = mysql_query($sql) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result))
		{
			$CustomerID = $row[CustomerID];
			$FirstName = $row[FirstName];
			$LastName = $row[LastName];
			$Phone = $row[Phone];
			$Email = $row[Email];
			$Type = $row[Type];
		}
	
		if($Email == "")
		{
			$Email = "n/a";
		}
		else
		{	$Email = $Email;
		}
		
		if($Phone == "")
		{
			$Phone = "n/a";
		}
		else
		{	$Phone = $Phone;
		}
		
		
		
		
		
?>

<div align="right"> 
  <p><font face="Arial, Helvetica, sans-serif"><a href="main.php?cust=<? echo $CustomerID; ?>">Main 
    Page</a> | <a href="option.php?cust=<? echo $CustomerID; ?>"></a><a href="ship.php?cust=<? echo $CustomerID; ?>">Shipping 
    Information</a> | <a href="option.php?cust=<? echo $CustomerID; ?>">Optional 
    Information</a> | <a href="claimhist.php">Claim History</a> | <a href="notes.php">Notes</a></font></p>
  <hr>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>

	
      <td><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Purchase 
        History for <strong><?php echo $FirstName; ?> <? echo $LastName; ?></strong></strong></font></td>
      <td><div align="right"><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"><strong><?php echo $Type; ?></strong></font></div></td>
    

	
	</tr>

	
  </table>
  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
    <tr bgcolor="#FFFFCC"> 
      <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>pID</strong></font></div></td>
      <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Date/Time</strong></font></div></td>
      <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Qty</strong></font></div></td>
      <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Total 
          Cost</strong></font></div></td>
      <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Status</strong></font></div></td>
    </tr>
    <tr> 
	
		<?
	
		$sql2 = "SELECT * FROM tblPurchase WHERE CustomerID = '$CustomerID'";
		$result2 = mysql_query($sql2) or die("Cannot execute query customerID!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$CustomerID = $row2[CustomerID];
			$PurchaseID = $row2[PurchaseID];
			$NumOrdered = $row2[NumOrdered];
			$TotalCost = $row2[TotalCost];
			$Status = $row2[Status];
			$DateTime = $row2[DateTime];
			
	?>
	
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="purchdetails.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>"><?php echo $PurchaseID; ?></a></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $DateTime; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $NumOrdered; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<?php echo number_format($TotalCost,2); ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Status; ?>&nbsp;</font></div></td>
   
 
   
    </tr>  		<?
	}
	?>
  </table>
  <br>
  <hr>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; Make 
    a claim</font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; Ship a replacement</font></p>
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
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>