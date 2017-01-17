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

	//users search mechanism
	$radio = $_POST['radioSelection'];
	
	//time search variables
	$timeType = $_POST['cboTime'];
	$fromDate = $_POST['txtFromDate'];
	$toDate = $_POST['txtToDate'];
	
	//purchaseID
	$purchaseID = $_POST['txtPurchaseID'];
	
	//LastName
	$claimtype = $_POST['txtClaimType'];
	$datetimerequest = $_POST['txtDateTimeRequest'];

	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT tblCustomerClaims2.PurchaseID, tblCustomerClaims2.Reason, tblCustomerClaims2.ClaimID,
			tblCustomer.LastName, tblCustomerClaims2.RequestDate, tblCustomer.FirstName,
			tblCustomerClaims2.ClaimType
			FROM tblCustomer 
			INNER JOIN tblPurchase2 ON tblCustomer.CustomerID = tblPurchase2.CustomerID
			INNER JOIN tblCustomerClaims2 ON tblPurchase2.PurchaseID = tblCustomerClaims2.PurchaseID
			WHERE tblCustomerClaims2.Status = 'closed'"; 

	
	if ($radio == "purchaseID")
	{
		$sql .= " AND tblCustomerClaims2.PurchaseID = $purchaseID";
	}
	
	if ($radio == "datetimerequest")
	{
		$sql .= " AND tblCustomerClaims2.RequestDate = '$datetimerequest'";
	}
	
	if ($radio == "claimtype")
	{
		$sql .= " AND tblCustomerClaims2.ClaimType = '$claimtype'";
	}
		
	else
	{
		$sql .= " AND tblCustomerClaims2.Status = 'closed'";
	}	
	

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}
	else
	{
		$sql .= " ORDER BY tblCustomerClaims2.RequestDate DESC";
		$sortBy ="tblCustomerClaims2.RequestDate";
		$sortDirection = "DESC";
	}
	
	
	
	//echo $sql;
	
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	$Num = mysql_num_rows($result);

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Processed
      Warranty  Information</strong></font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"># of results: <? echo $Num; ?> <br>
</font></p>
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
                <td width="11%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Details</strong></font></div></td>
                <td width="10%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase
                        ID</strong></font></div></td>
                <td width="16%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Customer
                        Name </strong></font></div></td>
                <td width="34%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Reason</strong></font></div></td>
                <td width="14%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Date 
        Requested </strong></font></div></td>
                <td width="15%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Claim 
        Type</strong></font></div></td>
              </tr>
              
			  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$pID = $row[PurchaseID];
				$ClaimID = $row[ClaimID];
				$lName = $row[LastName];
				$fName = $row[FirstName];
				$Reason = $row[Reason];
				$DateTimeRequest = $row[RequestDate];
				$ClaimType = $row[ClaimType];
							
			  ?>
				  <tr> 
					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="ClaimEdit.php?claim=<? echo $ClaimID; ?>">Details</a></font></div></td>
					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $pID; ?></font></div></td>
					<td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $fName; ?> 
        <? echo $lName; ?> </font></div></td>
					<td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Reason; ?></font></div></td>
					<td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DateTimeRequest; ?></font></div></td>
					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ClaimType; ?></a></font></div></td>
				  </tr>
			  <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
			  
</table>
            
<p align="left">&nbsp;</p>
            <p align="center">&nbsp;</p>



<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
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
