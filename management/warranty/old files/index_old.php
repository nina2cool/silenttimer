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
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


?> 

<? 
	//declare an integer as a counter
		$x = 0;
	
	//connection to db
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT * FROM tblCustomerClaims
			WHERE tblCustomerClaims.Status = 'open'";

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
		while($row = mysql_fetch_array($result))
				{
				$pID = $row[PurchaseID];
				$x += 1;
				}			
		 
?>
	<p><font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Customer Problem 
    Information </strong></font> </p>
	
	<p>
	<strong>
	<font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif">
	<? echo(" **$x** New Claims, fix them now.") ?>
	</font>
	</strong>
	</p>
   
<?
	//time search variables
	$timeType = $_POST['cboTime'];
	$fromDate = $_POST['txtFromDate'];
	$toDate = $_POST['txtToDate'];
	
	//purchaseID
	$purchaseID = $_POST['txtPurchaseID'];
	
	//LastName
	$lastName = $_POST['txtLastName'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT tblCustomerClaims.PurchaseID, tblCustomerClaims.Reason, tblCustomerClaims.ClaimID,
			tblCustomer.LastName, tblCustomerClaims.DateTimeRequest, tblCustomer.FirstName,
			tblCustomerClaims.ClaimType
			FROM tblCustomer 
			INNER JOIN tblPurchase2 ON tblCustomer.CustomerID = tblPurchase2.CustomerID
			INNER JOIN tblCustomerClaims ON tblPurchase2.PurchaseID = tblCustomerClaims.PurchaseID
			WHERE tblCustomerClaims.Status = 'open'";

	$today = date("Y-m-d");			
	$week = mktime (0,0,0,date("m"),date("d")-7,  date("Y"));
	$month = mktime (0,0,0,date("m")-1,date("d"),  date("Y"));
	$year = mktime (0,0,0,date("m"),date("d"),  date("Y")-1);
		
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>
		
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
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
  <tr bgcolor="#CCCCCC"> 
    <td width="11%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Process 
        Claim</font></strong></font></div></td>
    <td width="10%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="index.php?sort=tblProblems.PurchaseID&d=<? if ($sortBy=="tblProblems.PurchaseID") {echo $sd;} else {echo "ASC";}?>
				">Purchase ID</a></font></strong></font></div></td>
    <td width="16%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="index.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";} ?>">Customer 
        Name </a></font></strong></font></div></td>
    <td width="34%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="index.php?sort=tblProblems.ProblemDetails&d=<? if ($sortBy=="tblProblems.ProblemDetails") {echo $sd;} else {echo "ASC";} ?>">Reason</a></strong></font></div></td>
    <td width="14%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="index.php?sort=tblProblems.DateTime&d=<? if ($sortBy=="tblProblems.DateTime") {echo $sd;} else {echo "ASC";} ?>">Date 
        Submitted </a></strong></font></div></td>
    <td width="15%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="index.php?sort=tblProblems.SubmitType&d=<? if ($sortBy=="tblProblems.SubmitType") {echo $sd;} else {echo "ASC";} ?>">Claim 
        Type </a></strong></font></div></td>
    <td width="15%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Edit 
        Claim </strong></font></div></td>
  </tr>
  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$pID = $row[PurchaseID];
				$cID = $row[CustomerID];
				$lName = $row[LastName];
				$fName = $row[FirstName];
				$Reason = $row[Reason];
				$companyrepid = $row[CompanyRepID];
				$ClaimType = $row[ClaimType];
				$DateTimeRequest = $row[DateTimeRequest];
				$claimID = $row[ClaimID];
							
			  ?>
  <tr> 
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="executeclaim3.php?claim=<? echo $claimID; ?>">Process</a></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $pID; ?></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $fName; ?> 
        <? echo $lName; ?></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Reason; ?></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DateTimeRequest; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ClaimType; ?><strong></a></strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="editclaim.php?claim=<? echo $claimID; ?>">Edit</a></font></div></td>
  </tr>
  <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
</table>
            <p align="left">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>

   
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
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