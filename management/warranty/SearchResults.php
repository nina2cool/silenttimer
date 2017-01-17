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

	//Check boxes
	$chkAll = $_POST['chkAll'];
	$chkPurchaseID = $_POST['chkPurchaseID'];
	$chkDateTime = $_POST['chkDateTime'];
	$chkClaimType = $_POST['chkClaimType'];
	$chkStatus = $_POST['chkStatus'];
	
	//Information from text and list boxes
	$PurchaseID = $_POST['PurchaseID'];
	$DateTime = $_POST['DateTime'];
	$ClaimType = $_POST['ClaimType'];
	$Status = $_POST['Status'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT * FROM tblCustomerClaims2 WHERE ClaimID <> ''";
	
	if ($chkPurchaseID == "y")	{	$sql .= " AND PurchaseID = '$PurchaseID'";	}
	if ($chkDateTime == "y")	{	$sql .= " AND RequestDate = '$DateTime'";	}
	if ($chkClaimType == "y")	{	$sql .= " AND ClaimType = '$ClaimType'";	}
	if ($chkStatus == "y")	{	$sql .= " AND Status = '$Status'";	}

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
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Claim
      Search Results </strong></font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"># of results: <? echo $Num; ?> </font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Results
    highlighted in pink indicate claims that are still &quot;open&quot;. <br>
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
				$PurchaseID = $row[PurchaseID];
				$ClaimID = $row[ClaimID];
				$Name = $row[Name];
				$Reason = $row[Reason];
				$RequestDate = $row[RequestDate];
				$ClaimType = $row[ClaimType];
				$Status = $row[Status];
				
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
				
							
			  ?>
				  <tr<? if($Status == "open") { ?> bgcolor="#FFCCFF"<? } ?>> 
					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="ClaimEdit.php?claim=<? echo $ClaimID; ?>" target="_blank">Details</a></font></div></td>
					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $PurchaseID; ?></font></div></td>
					<td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? if($Name == "") { ?><a href="../customers/CustomerInfo.php?cust=<? echo $CustomerID; ?>&purch=<? echo $PurchaseID; ?>" target="_blank"><? echo $FirstName; ?> <? echo $LastName; ?></a><? } else { ?><? echo $Name; ?><? } ?></font></div></td>
					<td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Reason; ?></font></div></td>
					<td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $RequestDate; ?></font></div></td>
					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ClaimType; ?></a></font></div></td>
				  </tr>
			  <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
			  
</table>
            
<p></p>
<p></p>

	<p></p>
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
