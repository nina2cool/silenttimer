<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
	
	$Type = $_GET['type'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	/*
	$sql = "SELECT tblCustomer.FirstName, tblCustomer.LastName, tblCustomerEdit.CustomerID, tblCustomerEdit.DateTime, tblCustomerEdit.IP
	FROM tblCustomerEdit
	INNER JOIN tblCustomer
	ON tblCustomerEdit.CustomerID = tblCustomer.CustomerID
	WHERE tblCustomerEdit.Status = 'active' AND tblCustomerEdit.Type = '$Type' AND tblCustomerEdit.CustomerID <> '0'
	";
	*/
	
	$sql = "SELECT tblCustomerEdit.CustomerID, tblCustomerEdit.DateTime, tblCustomerEdit.IP, Count(tblCustomerEdit.CustomerID) as Count,
	tblCustomer.FirstName, tblCustomer.LastName
	FROM tblCustomerEdit
	INNER JOIN tblCustomer
	ON tblCustomerEdit.CustomerID = tblCustomer.CustomerID
	WHERE tblCustomerEdit.Type = '$Type' AND tblCustomerEdit.Status = 'active' AND tblCustomerEdit.CustomerID <> '0'
	GROUP BY tblCustomerEdit.CustomerID";
	
	//echo $sql;
	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblCustomerEdit.DateTime DESC";
		$sortBy ="tblCustomerEdit.DateTime";
		$sortDirection = "DESC";
	}
		
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	$NumTotal = mysql_num_rows($result);
	


?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Yes/No
Statistic Detail</strong></font></p>
<p>&nbsp;</p>
  <table width="100%" border="1" cellpadding="3" cellspacing="0" bordercolor="#CCCCCC">
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
      <td width="11%" bgcolor="#FFFFCC" class=sort> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="CustomerLoginViewMgt.php?sort=tblCustomerEdit.EmployeeID&d=<? if ($sortBy=="tblCustomerEdit.EmployeeID") {echo $sd;} else {echo "ASC";}?>">Customer</a></strong></font></div></td>
      <td width="25%" class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerLoginViewMgt.php?sort=tblCustomerEdit.DateTime&d=<? if ($sortBy=="tblCustomerEdit.DateTime") {echo $sd;} else {echo "ASC";}?>">DateTime</a></font></div></td>
      <td width="25%" class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerLoginViewMgt.php?sort=tblCustomerEdit.DateTime&d=<? if ($sortBy=="tblCustomerEdit.DateTime") {echo $sd;} else {echo "ASC";}?>">IP</a></font></div></td>
      <td width="25%" bgcolor="#FFFFCC" class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">#
      of Hits</font></div></td>
      <?
			  	
				// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$FirstName = $row[FirstName];
				$LastName = $row[LastName];
				$IP = $row[IP];
				$DateTime = $row[DateTime];
				$CustomerID = $row[CustomerID];
				$Count = $row[Count];
							
							/*
							$sql3 = "SELECT Count(CustomerID) as Count FROM tblCustomerEdit WHERE Type = '$Type' AND Status = 'active' GROUP BY CustomerID";
							$result3 = mysql_query($sql3) or die("Cannot execute query!");
							while($row3 = mysql_fetch_array($result3))
							{
								$Count = $row3[Count];
							}
							
							$sql2 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
							$result2 = mysql_query($sql2) or die("Cannot get customer name!");
							while($row2 = mysql_fetch_array($result2))
								{
								$FirstName = $row2[FirstName];
								$LastName = $row2[LastName];
								}
							*/
												
			  ?>
    <tr> 
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../CustomerInfo.php?cust=<? echo $CustomerID; ?>"><? echo $FirstName; ?> <? echo $LastName; ?></a></font></div></td>
      <td width="25%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font></div></td>
      <td width="25%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $IP; ?></font></div></td>
      <td width="25%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Count; ?> <a href="YesNoDetail2.php?cust=<? echo $CustomerID; ?>"><strong><font size="1">view</font></strong></a> </font></div></td>
    </tr>
    <?
			  	
				
				}
			  ?>
  </table> 
		
            
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
      <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
				mysql_close($link);
// has links that show up at the bottom in it.

require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";

// finishes security for page
}
else
{
?>
  <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
