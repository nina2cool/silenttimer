<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
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


	//$sql = "SELECT tblEmployee.FirstName, tblEmployee.LastName, tblBusinessCustomer.Name, tblBusinessCustomer.ContactName, tblBusinessCustomer.Phone1, tblBusinessCustomer.Fax,
//	tblBusinessCustomer.CustomerType, tblEmployeeCustomer.BusinessCustomerID, tblEmployeeCustomer.EmployeeID, tblBusinessCustomer.BusinessCustomerID
//	FROM tblBusinessCustomer INNER JOIN tblEmployeeCustomer ON
//	tblBusinessCustomer.BusinessCustomerID = tblEmployeeCustomer.BusinessCustomerID 
//	INNER JOIN tblEmployee ON
//	tblEmployee.EmployeeID = tblEmployeeCustomer.EmployeeID";
	
	$sql = "SELECT * from tblBusinessCustomer WHERE Status ='active' AND CustomerType = 'Bookstore' AND Chain = 'Borders'";
	
	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	$sum = mysql_num_rows($result);
	
	
	

	
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
  <tr bgcolor="#FFFFCC"> 
    <td width="20%" height="33" bgcolor="#FFFFCC" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../businesscustomer/BusCustView.php?sort=tblBusinessCustomer.Name&d=<? if ($sortBy=="tblBusinessCustomer.Name") {echo $sd;} else {echo "ASC";} ?>">Business 
        Name</a></font></strong></font></div></td>
    <td width="15%" class=sort><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Address</strong></font></td>
    <td width="15%" class=sort><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Address 
      2 </strong></font></td>
    <td width="15%" class=sort><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../businesscustomer/BusCustView.php?sort=tblBusinessCustomer.Chain&d=<? if ($sortBy=="tblBusinessCustomer.Chain") {echo $sd;} else {echo "ASC";} ?>">Chain 
        Name</a></font></strong></font></div></td>
    <td width="15%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>City</strong></font></div></td>
    <td width="12%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>State</strong></font></div></td>
    <td width="12%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Zip
    Code</strong></font></div></td>
    <td width="12%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../businesscustomer/BusCustView.php?sort=tblBusinessCustomer.Phone1&d=<? if ($sortBy=="tblBusinessCustomer.Phone1") {echo $sd;} else {echo "ASC";} ?>">Main 
        Number</a></strong></font></div></td>
  </tr>
  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$cID = $row[BusinessCustomerID];
				$BusinessName = $row[Name];
				$ContactFirstName = $row[ContactFirstName];
				$ContactLastName = $row[ContactLastName];
				$Address = $row[Address];
				$Address2 = $row[Address2];
				$OfficeNumber = $row[Phone1];
				$Fax = $row[Fax];
				$BusinessType = $row[CustomerType];
				$Chain = $row[Chain];
				$City = $row[City];
				$State = $row[State];
				$ZipCode = $row[ZipCode];
				

			  ?>
  <tr> 
    <td width="20%"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $BusinessName; ?></font></div></td>
    <td width="15%"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address; ?></font></div></td>
    <td width="15%"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address2; ?></font></div></td>
    <td width="15%"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Chain; ?></font></div></td>
    <td width="15%"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $OfficeNumber; ?></font></div></td>
  </tr>
  <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
</table>
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
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>