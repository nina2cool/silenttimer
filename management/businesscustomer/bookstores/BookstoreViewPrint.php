<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];
	
	$Letter = $_GET['abc'];
	$Chain = $_GET['chain'];
	$State = $_GET['state'];
	
	if($Chain == "Other") { $Chain = ""; }
	if($Chain == "BN") { $Chain = "Barnes & Noble"; }

	
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
		
	
	if($Letter <> "") {
	$sql = "SELECT * from tblBusinessCustomer WHERE CustomerType = 'Bookstore' AND Status ='active' AND Name LIKE '$Letter%'";
	}
	
	if($Letter == "" AND $State == "") {
	$sql = "SELECT * from tblBusinessCustomer WHERE CustomerType = 'Bookstore' AND Status ='active' AND Chain = '$Chain'";
	}
	
	if($State <> "") {
	$sql = "SELECT * from tblBusinessCustomer WHERE CustomerType = 'Bookstore' AND Status ='active' AND State = '$State'";
	}
	


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
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	$Number = mysql_num_rows($result);
	
	
	$ChainName = $Chain;
	
	if($Chain == "Barnes & Noble") { $ChainName = "BN"; }
	
	
?>
<title>Printable List</title>
<? if($Letter <> "") { ?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Bookstores
beginning with &quot;<? echo $Letter; ?>&quot; </strong></font></p>
<? }

if($Letter == "" AND $State == "") { 

if($Chain == "") { $Chain = "Other"; }

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><? echo $Chain; ?> Bookstores</strong></font></p>
<? }

if($State <> "") { ?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Bookstores in <? echo $State; ?></strong></font></p>
<? } ?>

<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">There
    are <? echo $Number; ?> active bookstores.</font></td>
    <td><div align="right"><em><font size="2" face="Arial, Helvetica, sans-serif">LCD
    = Last Contact Date</font></em></div></td>
  </tr>
</table>
<br>
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
    <td bgcolor="#FFFFCC" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Chain -
    Name</strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Address<br>
    City, St Zip    </strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Phone</strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Fax</strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>LCD</strong></font></div></td>
    <td width="20%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Notes</strong></font></div></td>
  </tr>
  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$BusinessCustomerID = $row[BusinessCustomerID];
				$BusinessName = $row[Name];
				$ContactFirstName = $row[ContactFirstName];
				$ContactLastName = $row[ContactLastName];
				$OfficeNumber = $row[Phone1];
				$Fax = $row[Fax1];
				$BusinessType = $row[CustomerType];
				$Chain = $row[Chain];
				$City = $row[City];
				$State = $row[State];
				$Address = $row[Address];
				$Address2 = $row[Address2];
				$ZipCode = $row[ZipCode];
					
				if($Chain == "Barnes & Noble") { $Chain = "B&N"; }

								$sql4 = "SELECT Max(DateTime) as DateTime FROM tblNotes WHERE BusinessCustomerID = '$BusinessCustomerID'";
								$result4 = mysql_query($sql4) or die("Cannot execute query customerID!");
								
								while($row4 = mysql_fetch_array($result4))
								{
									$LastDate = $row4[DateTime];
								
								
								if($LastDate == "") { $LastDate = "none"; }
								if($Fax == "") { $Fax = "-"; }
				
			  ?>
  <tr> 
    <td> <div align="left">
    
      <strong><font size="2"><a href="BookstoreEdit.php?bc=<? echo $BusinessCustomerID; ?>" target="_blank">
    
      <font face="Arial, Helvetica, sans-serif">
    <? if($Chain <> "") { ?>
    <? echo $Chain; ?> - 
    <? } ?>
    <? echo $BusinessName; ?></font></a></font></strong></div></td>
	
	
    <td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">
	
	<? echo $Address; ?>
    <? if($Address2 <> "") { ?>
    <br>
    <? echo $Address2; ?>
        <? } ?>
        <br>
    <? echo $City; ?>, <? echo $State; ?> <? echo $ZipCode; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $OfficeNumber; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Fax; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $LastDate; ?></font></div></td>
    <td width="20%"><div align="center">-  </div></td>
  </tr>
  <?
			  	}
				}
				//close connection to database
				mysql_close($link);
			  ?>
</table>
<p>&nbsp;</p>

  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


// finishes security for page
}
else
{
?>

            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>