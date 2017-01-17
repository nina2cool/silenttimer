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

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
 
	//declare an integer as a counter
	$x = 0;
	
	//connection to db
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT * FROM tblCustomerClaims2
			WHERE tblCustomerClaims2.Status = 'open'";
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
		while($row = mysql_fetch_array($result))
				{
				$PurchaseID = $row[PurchaseID];
				$x += 1;
				}			
		 
?>
	<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Open Claims </strong></font> </p>
	
	<p>
	<strong>
	<font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif">
<? echo(" **$x** New Claims.") ?><br>
	</font></strong>
	<?
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//beginning SQL statement that gets all data from tables.
	/*
	$sql2 = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, tblPurchase2.PurchaseID, tblPurchase2.CustomerID,
	tblCustomerClaims2.ClaimType, tblCustomerClaims2.Reason, tblCustomerClaims2.RequestDate, tblCustomerClaims2.PurchaseID, tblCustomerClaims2.ClaimID,
	tblCustomerClaims2.DateToReturn, tblCustomerClaims2.SignedForm, tblCustomerClaims2.SignForm
	FROM tblCustomer
	INNER JOIN tblPurchase2
	ON tblCustomer.CustomerID = tblPurchase2.CustomerID
	INNER JOIN tblCustomerClaims2
	ON tblPurchase2.PurchaseID = tblCustomerClaims2.PurchaseID
	WHERE tblCustomerClaims2.Status = 'open'";
	*/
	
	$sql2 = "SELECT * FROM tblCustomerClaims2 WHERE Status = 'open'";
	
	//echo $sql2;
		
	//sort results.....
	if ($sortBy != "")
	{
		$sql2 .= " ORDER BY $sortBy $sortDirection";
	}
	else
	{
		$sql2 .= " ORDER BY tblCustomerClaims2.RequestDate DESC";
		$sortBy ="tblCustomerClaims2.RequestDate";
		$sortDirection = "DESC";
	}
	
	//put SQL statement into result set for loop through records
	$result2 = mysql_query($sql2) or die("Cannot execute query!");

?>
</p>
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
    <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="index.php?sort=tblCustomerClaims2.ClaimID&d=<? if ($sortBy=="tblCustomerClaims2.ClaimID") {echo $sd;} else {echo "ASC";}?>
				">Claim ID</a></strong></font></div></td>
    <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Customer
              Name </strong></font></div></td>
    <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="index.php?sort=tblCustomerClaims2.Reason&d=<? if ($sortBy=="tblCustomerClaims2.Reason") {echo $sd;} else {echo "ASC";} ?>">Reason</a></strong></font></div></td>
    <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="index.php?sort=tblCustomerClaims2.RequestDate&d=<? if ($sortBy=="tblCustomerClaims2.RequestDate") {echo $sd;} else {echo "ASC";} ?>">Date
              Requested</a></strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="index.php?sort=tblCustomerClaims2.ClaimType&d=<? if ($sortBy=="tblCustomerClaims2.ClaimType") {echo $sd;} else {echo "ASC";} ?>">Claim 
        Type </a></strong></font></div></td>
    <td class=sort><div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Waiting
            on form? / Product Return Past Due? </font></strong></div></td>
  </tr>
  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result2))
				{
				$PurchaseID = $row[PurchaseID];
				$Name = $row[Name];
				$Reason = $row[Reason];
				$DateToReturn = $row[DateToReturn];
				$ClaimType = $row[ClaimType];
				$RequestDate = $row[RequestDate];
				$ClaimID = $row[ClaimID];
				$SignedForm = $row[SignedForm];
				$SignForm = $row[SignForm];
				
						
						if($Name == "")
						{
						
							$sql3 = "SELECT tblCustomer.FirstName, tblCustomer.LastName, tblPurchase2.CustomerID FROM tblPurchase2
							INNER JOIN tblCustomer
							ON tblPurchase2.CustomerID = tblCustomer.CustomerID
							WHERE tblPurchase2.PurchaseID = '$PurchaseID'";
							
							$result3 = mysql_query($sql3) or die("Cannot get customer info");
							
							while($row3 = mysql_fetch_array($result3))
							{
								$CustomerID = $row3[CustomerID];
								$LastName = $row3[LastName];
								$FirstName = $row3[FirstName];
							}
						}
						
				
				$Now = date("Y-m-d");
				
				if($ClaimType == "Replacement" AND $DateToReturn < $Now AND $DateToReturn <> "0000-00-00")
				{
				$PastDue = "yes";
				}
				else
				{
				$PastDue = "-";
				}
				
				if($ClaimType == "Replacement" AND $SignForm == "y" AND $SignedForm == "n")
				{
				$Form = "yes";
				}
				else
				{
				$Form = "-";
				}
				
			  ?>
  <tr> 
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="ClaimEdit.php?claim=<? echo $ClaimID; ?>"><strong><? echo $ClaimID; ?></strong></a></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? if($Name == "") { ?><a href="../customers/CustomerInfo.php?cust=<? echo $CustomerID; ?>" target="_blank"><? echo $FirstName; ?> 
        <? echo $LastName; ?></a><? } else { ?><? echo $Name; ?><? } ?></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Reason; ?></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $RequestDate; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ClaimType; ?><strong></a></strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#970000"><? echo $Form; ?></font></strong> / <strong><font color="#970000"><? echo $PastDue; ?></font></strong></font></div></td>
  </tr>
  <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
</table>
            <p>            
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>

   
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// has links that show up at the bottom in it - found in home management folder
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