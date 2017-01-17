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
	$PurchaseID = $_GET['purch'];

	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
	$result = mysql_query($sql) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result))
		{
			$FirstName = $row[FirstName];
			$LastName = $row[LastName];
			$Phone = $row[Phone];
			$Email = $row[Email];
			$TypeID = $row[Type];
			$CompanyName = $row[BusinessName];
		}
	
	
		$sql2 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
	$result2 = mysql_query($sql2) or die("Cannot execute query TypeID!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$Type = $row2[Type];
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
		
				if($CompanyName == "")
		{
			$CompanyName = "<br> ";
		}
		else
		{
			$CompanyName = $CompanyName;
		}
		
		
		
?>

<div align="right"> 
  <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">Contact
        Information</a> | <a href="PurchaseHistory.php?cust=<? echo $CustomerID; ?>">Purchase
  History</a></font></p>
  <hr>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFCC">
    <tr>
      <td><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong><?php echo $CompanyName; ?></strong></font></td>
      <td><div align="left"><font color="#FF0000" size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $FirstName; ?> <? echo $LastName; ?></strong></font></div></td>
      <td><div align="right"><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"><strong><?php echo $Type; ?></strong></font></div></td>
      <td width="10%">&nbsp;</td>
    </tr>
  </table>
  <div align="left">
    <p><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong>Claim History
          for Purchase ID: </strong></font><font color="#000000"><strong><font size="3" face="Arial, Helvetica, sans-serif"><?php echo $PurchaseID; ?></a></font></strong></font><br>
    </p>
  </div>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
    <tr bgcolor="#FFFFCC"> 
      <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/ClaimHistory.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>&sort=tblCustomerClaims2.ClaimID&d=<? if ($sortBy=="tblCustomerClaims2.ClaimID") {echo $sd;} else {echo "ASC";}?>">Claim
              ID </a></strong></font></div></td>
      <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/ClaimHistory.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>&sort=tblCustomerClaims2.RequestDate&d=<? if ($sortBy=="tblCustomerClaims2.RequestDate") {echo $sd;} else {echo "ASC";}?>">Date
                of Claim </a></strong></font></div></td>
      <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/ClaimHistory.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>&sort=tblCustomerClaims2.ClaimType&d=<? if ($sortBy=="tblCustomerClaims2.ClaimType") {echo $sd;} else {echo "ASC";}?>">Claim
              Type </a></strong></font></div></td>
      <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/ClaimHistory.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>&sort=tblCustomerClaims2.Status&d=<? if ($sortBy=="tblCustomerClaims2.Status") {echo $sd;} else {echo "ASC";}?>">Status</a></strong></font></div></td>
    </tr>
    <tr> 
	
		<?
	
		$sql2 = "SELECT * FROM tblCustomerClaims2 WHERE PurchaseID = '$PurchaseID'";
		$result2 = mysql_query($sql2) or die("Cannot execute query claims!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$ClaimID = $row2[ClaimID];
			$ClaimType = $row2[ClaimType];
			$DateTime = $row2[RequestDate];
			$Status = $row2[Status];
			
			
	?>
	
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../warranty/ClaimEdit.php?claim=<? echo $ClaimID; ?>" target="_blank"><?php echo $ClaimID; ?></a></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $DateTime; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ClaimType; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Status; ?>&nbsp;</font></div></td>
   
 
   
    </tr>  		<?
	}
	?>
  </table>
  <br>
  <hr>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="../warranty/ClaimAdd.php">Make 
    a claim</a></font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="CustomerPurchaseAddRepl.php?cust=<? echo $CustomerID; ?>">Ship
  a replacement</a></font></p>
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