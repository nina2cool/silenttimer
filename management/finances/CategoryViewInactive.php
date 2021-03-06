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
	$sql = "SELECT * from tblBillCategory WHERE Status = 'inactive' AND Type = 'finance'";

		
						//sort results.....
			if ($sortBy != "")
			{
				$sql .= " ORDER BY $sortBy $sortDirection";
			}
		
			else
			{
				$sql .= " ORDER BY tblBillCategory.Name ASC";
				$sortBy ="tblBillCategory.Name";
				$sortDirection = "ASC";
			}
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>
<p><font color="#000099" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt;
      Inactive Category List</strong></font></p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="CategoryAdd.php">Add
a category</a></font></strong></p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="CategoryView.php">View
      active categories</a></font></strong></p>
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
    <td width="13%" class=sort> <div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><strong>View/Edit</strong></font></div></td>
    <td width="20%" class=sort> <div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="CategoryView.php?sort=tblBillCategory.Name&d=<? if ($sortBy=="tblBillCategory.Name") {echo $sd;} else {echo "ASC";}?>">Name</a></strong></font></div></td>
  </tr>
  <?
 	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$CategoryID = $row[CategoryID];
				$Status = $row[Status];
				$Name = $row[Name];
				
	?>
  <tr> 
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CategoryEdit.php?c=<? echo $CategoryID; ?>">Edit</a></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Name; ?></font></div></td>
  </tr>
  <?
			  	}

			  ?>
</table>
<p>
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