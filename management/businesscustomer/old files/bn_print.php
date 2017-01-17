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

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "SELECT * FROM tblBusinessCustomer WHERE Chain = 'Barnes & Noble' AND Status = 'active'";
			

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblBusinessCustomer.State ASC";
		$sortBy ="tblBusinessCustomer.State";
		$sortDirection = "ASC";
	}

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	$Count = mysql_num_rows($result);
	
	
?><title>B&amp;N New Store Campaign</title>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>All B&amp;N
      Stores = <? echo $Count; ?> total</strong></font></p>
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
    <td class=sort> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">ID</font></strong></div></td>
    <td class=sort><strong><font size="2" face="Arial, Helvetica, sans-serif">St.
    # </font></strong></td>
    <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Name </font></strong></div></td>
    <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Address</font></strong></div></td>
    <td class=sort><strong><font size="2" face="Arial, Helvetica, sans-serif">City,
          St Zip </font></strong></td>
    <td class=sort> <div align="center"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Phone
    #(s) </font></strong></div></td>
    <?
	
				
	
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
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
				$Phone1 = $row[Phone1];
				$Phone2 = $row[Phone2];
				$StoreNumber = $row[BNCBNumber];
				
	
						
												
			  ?>
  <tr valign="top"> 
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="bn_edit.php?bc=<? echo $BusinessCustomerID; ?>"><? echo $BusinessCustomerID; ?></a>
    </font></div></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif">      # <? echo $StoreNumber; ?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $BusinessName; ?></font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Address; ?><br>

		<?  if($Address2 <> "") { ?>
        
		<? echo $Address2; ?><br>
		
		<?  }
			if($Address3 <> "") { ?>   
		
		<? echo $Address3; ?> <br>
		
		<?  }  ?>



    </font></td>
    <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $City; ?>, <? echo $State; ?> <? echo $ZipCode; ?></font></td>
    <td> <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Phone1; ?>
	
        <?  if($Phone2 <> "") { ?>
	
        <br>
        <? echo $Phone2; ?>
	
        <?  } ?>
	
	</font></div></td>
  </tr>
  <?
			  	}
				
				//close connection to database
				mysql_close($link);
			  ?>
</table> 

            
  <br>
  
  
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
