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

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "Select * FROM tblBusinessCustomer WHERE CustomerType = 'Bookstore' AND Status = 'active'";

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}
	else
	{
		$sql .= " ORDER BY State, City";
	}

	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>
<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Customer Close To Retail</strong></font> 
<form>
  <table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#999999">
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
      <td width="67%" class=sort> <div align="left"><strong><a href="../customers/CustomerView.php?sort=tblCustomer.CustomerID&d=<? if ($sortBy=="tblCustomer.CustomerID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Store 
          Name </font></a></strong></div></td>
      <td width="11%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" 
				     face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerView.php?sort=tblCustomer.FirstName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";}?>">City</a></font></strong></font></div></td>
      <td width="11%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerView.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";} ?>">State</a></font></strong></font></div></td>
      <td width="11%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerView.php?sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">Phone</a></font></strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
					$BusinessCustomerID = $row[BusinessCustomerID];
					$NameS = $row[Name];
					$AddressS = $row[Address];
					$Address2S = $row[Address2];
					$Address3S = $row[Address3];
					$CityS = $row[City];
					$StateS = $row[State];
					$ZipCodeS = $row[ZipCode];
					$PhoneS = $row[Phone1];
					$WebsiteS = $row[Website];
								
		?>
    <tr bgcolor="#FFFFCC"> 
      <td> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $NameS;?></strong></font></div></td>
      <td width="11%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $CityS;?></strong></font></div></td>
      <td width="11%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $StateS;?></strong></font></div></td>
      <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $PhoneS;?></strong></font></div></td>
    </tr>
    <tr> 
      <td colspan="4">
	  
	  	<?
					# ------------------------------------------------------------------------------------------------------------
					#  ZIP CODE STORE LOOK UP!
					#  If person's shipping Zipcode is within 20 miles of a retail location... show the customers!
					# ------------------------------------------------------------------------------------------------------------
					$Radius = 5;
					$StoreClose = "n";
				
					$zipOne = $ZipCodeS;
				
					include_once ("../../include/db_mysql.inc");
					include_once ("../../include/phpZipLocator.php");
					
					$db = new db_sql;
					$zipLoc = new zipLocator;
					$radius = $Radius;
					
					$zipArray = $zipLoc->inradius($zipOne,$radius);
					
					require "../include/dbinfo.php";
					
					#echo "hello world<br><br>";
					
					for($i=1;$i < count($zipArray);$i++)
					{
						$sql3 = "SELECT * FROM tblCustomer WHERE ZipCode= '$zipArray[$i]'";
						$result3 = mysql_query($sql) or die("Cannot pull Store Locations.  Please try again.");		
						while($row3 = mysql_fetch_array($result3))
						{
							$CustomerClose = "y";
						}
					}

					# If this store has customers near it, list them out!!!
					if($CustomerClose == "y")
					{
		?>
	  
	  
	  
	  	<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
		
		   <tr>
            <td width="13%"><strong><font size="2" face="Arial, Helvetica, sans-serif">First Name</font></strong></td>
            <td width="21%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Last Name</font></strong></td>
            <td width="9%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Distance</font></strong></div></td>
            <td width="29%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Email</font></strong></td>
            <td width="9%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Phone</font></strong></div></td>
            <td width="9%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">OrderDate</font></strong></div></td>
            <td width="10%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Directions</font></strong></div></td>
          </tr>
		
        <?
			
			$db = new db_sql;
			$zipLoc = new zipLocator;
			$radius = $Radius;
			$zipOne = $ZipCodeS;
			$zipArray = $zipLoc->inradius($zipOne,$radius);
			
			for($i=1;$i < count($zipArray);$i++)
			{
				$sql2 = "SELECT * FROM tblCustomer WHERE ZipCode= '$zipArray[$i]'";
				
				//sort results.....
				if ($sortByC != "")
				{
					$sql2 .= " ORDER BY $sortByC $sortDirectionC";
				}
				else
				{
					$sql2 .= " ORDER BY LastName";
				}
				
				$result2 = mysql_query($sql2) or die("Cannot pull Store Locations.  Please try again.");		
			  	
				while($row2 = mysql_fetch_array($result2))
				{
					$FirstName = $row2[FirstName];
					$LastName = $row2[LastName];
					$Email = $row2[Email];
					$Phone = $row2[Phone];
					$Address = $row2[Address];
					$ZipCode = $row2[ZipCode];
					$CustomerID = $row2[CustomerID];
					
					$db = new db_sql;
					$zipDistance = new zipLocator;
					
					$distance = number_format($zipDistance->distance($ZipCode,$ZipCodeS),2);
					
					if($distance == 0)
					{
						$distance = 0;
					}
			
					# get most recent purcahse date for this customer
					$sql3 = "Select DATE_FORMAT(DateTime, '%m/%d/%y') AS DateTime FROM tblPurchase WHERE CustomerID = '$CustomerID' ORDER BY DateTime";
					//put SQL statement into result set for loop through records
					$result3 = mysql_query($sql3) or die("Cannot execute query!");
					while($row3 = mysql_fetch_array($result3))
					{
						$DateTime = $row3[DateTime];
					}
									
		?>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName;?></font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $LastName;?></font></td>
            <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $distance;?> Miles</font></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="mailto:<? echo $Email;?>"><? echo $Email;?></a></font></td>
            <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Phone;?></font></div></td>
            <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DateTime;?></font></div></td>
            <td>
			<div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
<a href="http://maps.yahoo.com/dd_result?addr=<? echo $Address;?>&csz=<? echo $ZipCode;?>&country=us&taddr=<? echo $AddressS;?>&tcsz=<? echo $ZipCodeS;?>&tcountry=us" target="_blank">Directions</a>
			</font></div></td>
			
			
			
			
			
          </tr>
        <?
		  
				} # END While
			} # END FOR
		?>
        </table>
		
		<?
					} #### END if any customer is close
		?>
		
		
		
        <p>&nbsp;</p>
		
	  </td>
    </tr>
    <?
			  	}
				//close connection to database
				mysql_close($link);
	?>
  </table> 
		
            
<p>&nbsp;</p>
<p>&nbsp;</p>

</form>
  
  
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>
// has links that show up at the bottom in it.

require "../include/footerlinks.php";
// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>

            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
