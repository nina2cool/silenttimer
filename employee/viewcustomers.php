<?
//security for page
session_start();

$PageTitle = "View Your Customers";

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('e'))
{

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>



<?
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$EmployeeID= $_SESSION['e'];
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT tblBusinessCustomer.BusinessCustomerID, BusinessName, ContactName, OfficePhone1, Fax, BusinessType
			FROM tblBusinessCustomer INNER JOIN tblEmployeeCustomer 
			ON tblBusinessCustomer.BusinessCustomerID = tblEmployeeCustomer.BusinessCustomerID 
			WHERE EmployeeID = '$EmployeeID'";
			
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
   
   //sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

	$sum = mysql_num_rows($result);

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Your 
  Customer List </strong></font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">This is 
  a list of the customers associated with your RIN. You have a total of <? echo $sum; ?> 
  customers.</font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Contact 
  Log</font></p>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr> 
    <td width="25%"><font size="2" face="Arial, Helvetica, sans-serif">Date and 
      Time</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <tr> 
    <td width="25%"><font size="2" face="Arial, Helvetica, sans-serif">Log Entry</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <tr> 
    <td width="25%"><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Customer 
  Contact Information</font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Business 
  Name<br>
  Contact Name<br>
  Address</font><font size="2" face="Arial, Helvetica, sans-serif"><br>
  Address2<br>
  City, State Zip Code, Country</font></p>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr> 
    <td><font size="2" face="Arial, Helvetica, sans-serif">Office Phone #1</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Ext. #1</font></td>
  </tr>
  <tr> 
    <td><font size="2" face="Arial, Helvetica, sans-serif">Office Phone #2</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Ext. #2</font></td>
  </tr>
  <tr> 
    <td><font size="2" face="Arial, Helvetica, sans-serif">Fax</font></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td><font size="2" face="Arial, Helvetica, sans-serif">Email #1</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Email #2</font></td>
  </tr>
  <tr> 
    <td><font size="2" face="Arial, Helvetica, sans-serif">URL</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Business Type</font></td>
  </tr>
</table>
<p>Notes: </p>
<p>&nbsp;</p>
<p><br>
  <br>
</p>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
  <tr bgcolor="#FFFFCC"> 
    <td width="20%" bgcolor="#FFFFCC" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="customers.php?sort=tblBusinessCustomer.BusinessName&d=<? if ($sortBy=="tblBusinessCustomer.BusinessName") {echo $sd;} else {echo "ASC";} ?>">Business 
        Name</a></font></strong></font></div></td>
    <td width="16%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="customers.php?sort=tblBusinessCustomer.ContactName&d=<? if ($sortBy=="tblBusinessCustomer.ContactName") {echo $sd;} else {echo "ASC";} ?>">Contact 
        Name </a></font></strong></font></div></td>
    <td width="17%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="customers.php?sort=tblBusinessCustomer.OfficePhone1&d=<? if ($sortBy=="tblBusinessCustomer.OfficePhone1") {echo $sd;} else {echo "ASC";} ?>">Office 
        Number </a></strong></font></div></td>
    <td width="18%" class=sort> <div align="center"><font color="#003399" face="Arial, Helvetica, sans-serif"><strong><font size="2"><a href="customers.php?sort=tblBusinessCustomer.Fax&d=<? if ($sortBy=="tblBusinessCustomer.Fax") {echo $sd;} else {echo "ASC";} ?>">Fax 
        Number</a></font></strong></font></div></td>
    <td width="16%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="customers.php?sort=tblBusinessCustomer.BusinessType&d=<? if ($sortBy=="tblBusinessCustomer.BusinessType") {echo $sd;} else {echo "ASC";} ?>">Business 
        Type</a></strong></font></div></td>
  </tr>
  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
					$cID = $row[BusinessCustomerID];
					$BusinessName = $row[BusinessName];
					$ContactName = $row[ContactName];
					$OfficeNumber = $row[OfficePhone1];
					$Fax = $row[Fax];
					$BusinessType = $row[BusinessType];

			  ?>
  <tr> 
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $BusinessName; ?></strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $ContactName; ?></strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $OfficeNumber; ?></strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Fax; ?></strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $BusinessType; ?></strong></font></div></td>
  </tr>
  <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
</table>
<p>&nbsp;</p>
<p><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;<a href="addcustomer.php">Edit 
  Customer Information</a></font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p> 
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


// finishes security for page
}
else
{
?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}

// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


// has links that show up at the bottom in it.
require "include/footerlinks.php";

?>

