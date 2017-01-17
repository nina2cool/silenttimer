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
?>



<?
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$EmployeeID= $_SESSION['e'];
	

	
	//beginning SQL statement that gets all data from tables.
	
	if ($_POST['Add'] == "Add")
	{
	
	$BusinessCustomerID = $_POST['BusinessCustomerID'];
	
	$sql3 = "UPDATE tblBusinessCustomer
	SET CheckStore = 'y'
	WHERE BusinessCustomerID = '$BusinessCustomerID'";
	
	echo $sql3;
	
	$result3 = mysql_query($sql3) or die("Cannot execute query add check!");
		/*
		?>
		<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>businesscustomer/Kaplan2.php'>	
		<?
	*/
	}
	
	
	
	$sql = "SELECT * from tblBusinessCustomer WHERE Status ='active' AND Chain = 'Kaplan' AND CheckStore = 'n'";
	
	
	//sort results.....
						//sort results.....
			if ($sortBy != "")
			{
				$sql .= " ORDER BY $sortBy $sortDirection";
			}
		
			else
			{
				$sql .= " ORDER BY tblBusinessCustomer.Name ASC";
				$sortBy ="tblBusinessCustomer.Name";
				$sortDirection = "ASC";
			}
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query find stores!");
	
	$sum = mysql_num_rows($result);
	
	
	

	
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Kaplan</strong></font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">This is
     a list of all the test prep companies in our database. There are <? echo $sum; ?> Kaplans
      in the database.</font></p>

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
      <td width="" height="33" class=sort><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Details</font></strong></font></div></td>
      <td width="" bgcolor="#FFFFCC" class=sort><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">ID</font></strong></font></div></td>
      <td width="" bgcolor="#FFFFCC" class=sort><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../businesscustomer/BusCustViewBookstore.php?sort=tblBusinessCustomer.Name&d=<? if ($sortBy=="tblBusinessCustomer.Name") {echo $sd;} else {echo "ASC";} ?>">Store
                  Name</a></font></strong></font></div></td>
      <td width="" class=sort><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Address</font></strong></font></div></td>
      <td width="" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>City, <a href="../businesscustomer/BusCustViewBookstore.php?sort=tblBusinessCustomer.State&d=<? if ($sortBy=="tblBusinessCustomer.State") {echo $sd;} else {echo "ASC";} ?>">State</a></strong></font></div></td>
      <td width="" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../businesscustomer/BusCustViewBookstore.php?sort=tblBusinessCustomer.Phone1&d=<? if ($sortBy=="tblBusinessCustomer.Phone1") {echo $sd;} else {echo "ASC";} ?>">Main
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
				$OfficeNumber = $row[Phone1];
				$Fax = $row[Fax];
				$BusinessType = $row[CustomerType];
				$Chain = $row[Chain];
				$City = $row[City];
				$State = $row[State];
				$ZipCode = $row[ZipCode];
				$Address = $row[Address];
				$Address2 = $row[Address2];
				$Address3 = $row[Address3];
				$BusinessCustomerID = $row[BusinessCustomerID];
				

			  ?>
    <tr>
	
	<form name="form1" method="post" action="">
      <td width=""><div align="center">  
        
     
        <input name="Add" type="submit" id="Add" value="Add">
        
      </div></td>
      <td width=""><div align="center">
        <input name="BusinessCustomerID" type="text" id="BusinessCustomerID" value="<? echo $BusinessCustomerID; ?>" size="5">
      </div></td>
      <td width=""><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $BusinessName; ?></font></div></td>
      <td width=""><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address; ?><br>
            <? echo $Address2; ?><br>
            <? echo $Address3; ?> <br>
      </font></td>
      <td width=""><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?>, <? echo $State; ?> <? echo $ZipCode; ?></font></div></td>
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $OfficeNumber; ?></font></div></td>

</form>
    </tr>
    <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
  </table>
  <p>&nbsp;</p>

<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"></font></p>
<p>&nbsp;</p>
<p> 
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
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>