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

	$sql = "SELECT * FROM tblBusinessCustomer WHERE CheckStore = 'y' AND Chain = 'Kaplan' AND Status = 'active'";
			

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
	
	
	
?><title>Kaplan Campaign</title>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Letters
and Fliers for Kaplan </strong></font></p>
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
    <td class=sort> <div align="center"><strong><a href="../customers/NotShippedViewPrint.php?sort=tblPurchase.PurchaseID&d=<? if ($sortBy=="tblPurchase.PurchaseID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">BusCustID</font></a></strong></div></td>
    <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Chain
            - Name </font></strong></div></td>
    <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Address</font></strong></div></td>
    <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/NotShippedView.php?sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a>, <a href="../customers/NotShippedView.php?sort=tblCustomer.State&d=<? if ($sortBy=="tblCustomer.State") {echo $sd;} else {echo "ASC";}?>">St.</a> Zip </font></strong></div></td>
    <td width="5%" class=sort> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Letter</font></strong></div></td>
    <td width="5%" class=sort> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Flier</font></strong></div></td>
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
				
	
			
				
						$Radius = 33;
						$StoreClose = "n";
					
						$zipOne = $ZipCode;
						
						include_once ("../../include/db_mysql.inc");
						include_once ("../../include/phpZipLocator.php");
						
						
						$db = new db_sql;
						$zipLoc = new zipLocator;
						$radius = $Radius;
						
						$zipArray = $zipLoc->inradius($zipOne,$radius);
				
										
						for($i=1;$i < count($zipArray);$i++)
						{
							$sql8 = "SELECT * FROM tblBusinessCustomer WHERE ZipCode= '$zipArray[$i]' AND CustomerType = 'Bookstore' AND Status = 'active' AND Chain = 'Borders'";
							$result8 = mysql_query($sql8) or die("Cannot pull Store Locations.  Please try again.");		
							while($row8 = mysql_fetch_array($result8))
							{
								$StoreClose = "y";
							}
						}
						
												
			  ?>
  <tr> 
    <td width="6%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>"><? echo $BusinessCustomerID; ?><br>
    </a></font></div></td>
    <td width="11%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Chain; ?> - <? echo $BusinessName; ?></font></td>
    <td width="11%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address; ?><br>
      <? echo $Address2; ?><br>
      <? echo $Address3; ?>      <br>
    </font></td>
    <td width="8%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?>, <? echo $State; ?> <? echo $ZipCode; ?></font></td>
    <td width="5%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="letter-k.php?id=<? echo $BusinessCustomerID; ?>" target="_blank">Letter</a></font></div></td>
    <td width="5%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"> 
        <? if($StoreClose == 'y'){?>
        <a href="flier.php?id=<? echo $BusinessCustomerID; ?>" target="_blank">Flier</a> 
        <? } ?>
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