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
		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];
	$Letter = $_GET['abc'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "SELECT * FROM tblCustomer WHERE tblCustomer.LastName LIKE '$Letter%'";

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
<p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View
Customers with Last Names starting with &quot;<?php echo $Letter; ?>&quot; </strong></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="CustomerView.php?abc=a">A</a> </strong><font color="#FF0000">|</font><strong> <a href="CustomerView.php?abc=b">B</a></strong><font color="#FF0000"> |</font> <strong><a href="CustomerView.php?abc=c">C</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=d">D</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=e">E</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=f">F</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=g">G</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=h">H</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=i">I</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=j">J</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=k">K</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=l">L</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=m">M</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=n">N</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=o">O</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=p">P</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=q">Q</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=r">R</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=s">S</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=t">T</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=u">U</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=v">V</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=w">W</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=x">X</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=y">Y</a> </strong><font color="#FF0000">|</font> <strong><a href="CustomerView.php?abc=z">Z</a></strong></font></p>

<table width="99%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
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
      <td class=sort> <div align="center"><strong><a href="../customers/CustomerView.php?abc=<? echo $Letter; ?>&sort=tblCustomer.CustomerID&d=<? if ($sortBy=="tblCustomer.CustomerID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Cust
      ID </font></a></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerView.php?abc=<? echo $Letter; ?>&sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";}?>">Last
      Name</a></font></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerView.php?abc=<? echo $Letter; ?>&sort=tblCustomer.FirstName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";}?>">First 
      Name</a> </font></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerView.php?abc=<? echo $Letter; ?>&sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a></font></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerView.php?abc=<? echo $Letter; ?>&sort=tblCustomer.State&d=<? if ($sortBy=="tblCustomer.State") {echo $sd;} else {echo "ASC";}?>">State</a></font></strong></div></td>
      <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/CustomerView.php?abc=<? echo $Letter; ?>&sort=tblCustomer.ZipCode&d=<? if ($sortBy=="tblCustomer.ZipCode") {echo $sd;} else {echo "ASC";}?>">Zip 
      Code</a></strong></font></div></td>
      <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/CustomerView.php?abc=<? echo $Letter; ?>&sort=tblCustomer.Type&d=<? if ($sortBy=="tblCustomer.Type") {echo $sd;} else {echo "ASC";}?>">Type</a></strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$caID = $row['PurchaseID'];
				$CustomerID = $row['CustomerID'];
				$FirstName = $row['FirstName'];
				$LastName = $row['LastName'];
				$City = $row['City'];
				$State = $row['State'];
				$ZipCode = $row['ZipCode'];
				$TypeID = $row['Type'];
				
						$sql2 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
						$result2 = mysql_query($sql2) or die("Cannot execute query!");
							while($row2 = mysql_fetch_array($result2))
							{
							$Type = $row2['Type'];
							}
												
			  ?>
  <tr> 
      <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">View</a></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CustomerID; ?></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Type; ?></font></div></td>
  </tr>
    <?			}
			  	
				
				//close connection to database
				mysql_close($link);
			  ?>
</table> 
		
            <p align="left">&nbsp;</p>
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

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
