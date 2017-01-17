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
?>

<?
	
		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];
	$TypeID = $_GET['type'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
	$sql2 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
	$result2 = mysql_query($sql2) or die("Cannot execute TypeID!");
	
	while($row2 = mysql_fetch_array($result2))
				{
				$Type = $row2['Type'];
				}
	
	
	$sql = "SELECT * FROM tblCustomer WHERE Type = '$TypeID'";

	if($TypeID == '5' OR $TypeID == '6')
	{
		//sort results.....
			if ($sortBy != "")
			{
				$sql .= " ORDER BY $sortBy $sortDirection";
			}
		
			else
			{
				$sql .= " ORDER BY tblCustomer.BusinessName ASC";
				$sortBy ="tblCustomer.BusinessName";
				$sortDirection = "ASC";
			}



	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

	?>
	<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View
	Customers - <?php echo $Type; ?></strong></font></p>
				
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
    <tr bgcolor="#FFFFCC"> 
      <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>View</strong></font></div></td>
      <td class=sort> <div align="center"><strong><a href="../customers/CustomerViewType.php?type=<? echo $TypeID; ?>&sort=tblCustomer.CustomerID&d=<? if ($sortBy=="tblCustomer.CustomerID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Cust
      ID </font></a></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerViewType.php?type=<? echo $TypeID; ?>&sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";}?>">Company
      Name</a></font></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerViewType.php?type=<? echo $TypeID; ?>&sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";}?>">Last
      Name</a></font></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerViewType.php?type=<? echo $TypeID; ?>&sort=tblCustomer.FirstName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";}?>">First
      Name</a></font></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerViewType.php?type=<? echo $TypeID; ?>&sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a></font></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerViewType.php?type=<? echo $TypeID; ?>&sort=tblCustomer.State&d=<? if ($sortBy=="tblCustomer.State") {echo $sd;} else {echo "ASC";}?>">State</a></font></strong></div></td>
      <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/CustomerViewType.php?type=<? echo $TypeID; ?>&sort=tblCustomer.ZipCode&d=<? if ($sortBy=="tblCustomer.ZipCode") {echo $sd;} else {echo "ASC";}?>">Zip
      Code</a></strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$PurchaseID = $row['PurchaseID'];
				$CustomerID = $row['CustomerID'];
				$FirstName = $row['FirstName'];
				$LastName = $row['LastName'];
				$City = $row['City'];
				$State = $row['State'];
				$ZipCode = $row['ZipCode'];
				$CompanyName = $row['BusinessName'];
				
				
				if($CompanyName == "")
				{
					$CompanyName = "<br> ";
				}
				else
				{
					$CompanyName = $CompanyName;
				}
				
				
				if($LastName == "")
				{
					$LastName = "<br> ";
				}
				else
				{
					$LastName = $LastName;
				}
				
				if($FirstName == "")
				{
					$FirstName = "<br> ";
				}
				else
				{
					$FirstName = $FirstName;
				}
				
			  ?>
    <tr> 
      <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">View</a></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CustomerID; ?></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
    </tr>
    <?
			  	}
				
				
			  ?>
</table> 
<?
}
else
{
		//sort results.....
			if ($sortBy != "")
			{
				$sql .= " ORDER BY $sortBy $sortDirection";
			}
		
			else
			{
				$sql .= " ORDER BY tblCustomer.LastName ASC";
				$sortBy ="tblCustomer.LastName";
				$sortDirection = "ASC";
			}



	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

	?>
	<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View
	Customers - <?php echo $Type; ?></strong></font></p>
				
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
    <tr bgcolor="#FFFFCC"> 
      <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>View</strong></font></div></td>
      <td class=sort> <div align="center"><strong><a href="../customers/CustomerViewType.php?type=<? echo $TypeID; ?>&sort=tblCustomer.CustomerID&d=<? if ($sortBy=="tblCustomer.CustomerID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Cust
      ID </font></a></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerViewType.php?type=<? echo $TypeID; ?>&sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";}?>">Company
      Name</a></font></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerViewType.php?type=<? echo $TypeID; ?>&sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";}?>">Last
      Name</a></font></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerViewType.php?type=<? echo $TypeID; ?>&sort=tblCustomer.FirstName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";}?>">First
      Name</a></font></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerViewType.php?type=<? echo $TypeID; ?>&sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a></font></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerViewType.php?type=<? echo $TypeID; ?>&sort=tblCustomer.State&d=<? if ($sortBy=="tblCustomer.State") {echo $sd;} else {echo "ASC";}?>">State</a></font></strong></div></td>
      <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/CustomerViewType.php?type=<? echo $TypeID; ?>&sort=tblCustomer.ZipCode&d=<? if ($sortBy=="tblCustomer.ZipCode") {echo $sd;} else {echo "ASC";}?>">Zip
      Code</a></strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$PurchaseID = $row['PurchaseID'];
				$CustomerID = $row['CustomerID'];
				$FirstName = $row['FirstName'];
				$LastName = $row['LastName'];
				$City = $row['City'];
				$State = $row['State'];
				$ZipCode = $row['ZipCode'];
				$CompanyName = $row['BusinessName'];
				
				
				if($CompanyName == "")
				{
					$CompanyName = "<br> ";
				}
				else
				{
					$CompanyName = $CompanyName;
				}
				
				
				if($LastName == "")
				{
					$LastName = "<br> ";
				}
				else
				{
					$LastName = $LastName;
				}
				
				if($FirstName == "")
				{
					$FirstName = "<br> ";
				}
				else
				{
					$FirstName = $FirstName;
				}
				
			  ?>
    <tr> 
      <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">View</a></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CustomerID; ?></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
    </tr>
    <?
			  	}
				
				
			  ?>
</table>   
<?
}


// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.

require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
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
