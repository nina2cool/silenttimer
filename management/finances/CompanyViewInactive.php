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
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT * from tblBillCompany WHERE Status = 'inactive'";

	//sort results.....
	if ($sortBy == "")
	{
		$sql .= " ORDER BY Name ASC";
	}
	
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>
<p><font color="#000099" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt;
      Inactive Company List</strong></font></p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="CompanyAdd.php">Add
a company</a></font></strong></p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="CompanyView.php">View
        active companies</a></font></strong></p>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCFF">
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
    <td class=sort><div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><strong>Add
            Bill </strong></font></div></td> 
    <td class=sort> <div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><strong>Edit</strong></font></div></td>
    <td class=sort><div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="CompanyViewInactive.php?sort=tblBillCompany.Name&d=<? if ($sortBy=="tblBillCompany.Name") {echo $sd;} else {echo "ASC";}?>">Name</a></strong></font></div></td>
    <td class=sort><div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="CompanyViewInactive.php?sort=tblBillCompany.Person&d=<? if ($sortBy=="tblBillCompany.Person") {echo $sd;} else {echo "ASC";}?>">Person</a></strong></font></div></td>
    <td class=sort> <div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="CompanyViewInactive.php?sort=tblBillCompany.Category&d=<? if ($sortBy=="tblBillCompany.Category") {echo $sd;} else {echo "ASC";}?>">Category</a></strong></font></div></td>
  </tr>
  <?
 	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				
					$CompanyID = $row[CompanyID];
					$Name = $row[Name];
					$Person = $row[Person];
					$CategoryID = $row[Category];
					
					if($Person == "")
					{
					$Person = "-";
					}
					
					$sql2 = "SELECT * FROM tblBillCategory WHERE CategoryID = '$CategoryID'";
					$result2 = mysql_query($sql2) or die("Cannot get category name");
					while($row2 = mysql_fetch_array($result2))
					{
						$Category = $row2[Name];
					}
				
	?>
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="BillAdd.php?c=<? echo $CompanyID; ?>">Add</a></font></div></td> 
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CompanyEdit.php?c=<? echo $CompanyID; ?>">Edit</a></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Name; ?></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Person; ?></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Category; ?></font></div></td>
  </tr>
  <?
			  	}
				
			  ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
  
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// finishes security for page
}
else
{
	header("location: index.php"); //redirects user via PHP to this page... better than meta refresh...
}
?>