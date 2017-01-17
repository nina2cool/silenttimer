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

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	if($_GET['Delete'] == "YES")
	{
		
		$sql5 = "DELETE FROM tblCategory WHERE CategoryID = '$CategoryID'";
		mysql_query($sql5) or die("Cannot delete category, try again!");
	
	}
	

	$sql = "SELECT * FROM tblCategory WHERE Type = 'FAQ'";

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblCategory.Priority ASC";
		$sortBy ="tblCategory.Priority";
		$sortDirection = "ASC";
	}
		


	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View
      FAQ Categories
</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Column headings sort rows
    ASC or DESC.<br>
      <br>
  Click Category Name to edit the category.</font></p>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
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
  <tr valign="top">
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Priority</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../categories/index.php?sort=tblCategory.Name&d=<? if ($sortBy=="tblCategory.Name") {echo $sd;} else {echo "ASC";}?>">Category
              Name</a></font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Questions</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></div></td>
    <td><div align="center"><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><b>Delete</b></font></div></td>
  </tr>
  <?

		while($row = mysql_fetch_array($result))
		{
			$CategoryID = $row[CategoryID];
			$Category = $row[Name];
			$Status = $row[Status];
			$Priority = $row[Priority];

			
	?>
  <tr<? if($Status == "inactive") { ?> bgcolor="#CCCCCC"<? } ?>>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Priority; ?>&nbsp;</font></div></td>
    <td><a href="CategoryEdit.php?cat=<? echo $CategoryID; ?>"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Category; ?><br>
    </font></a></td>
    <td><div align="center"><a href="QuestionView.php?cat=<? echo $CategoryID; ?>"><font size="2" face="Arial, Helvetica, sans-serif">View
            Questions <br>
    </font></a></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Status; ?>&nbsp;</font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b><a href="index.php?Delete=YES&CategoryID=<? echo $CategoryID; ?>">X</a><font color="#FF0000">*</font></b></font></div></td>
    <?
  
  }
  ?>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><b>&gt; <a href="CategoryAdd.php">Add
        a Category</a></b></font></p>
<font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font>
<p><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">*If you
    delete a category/subcategory that has products associated with it, these
    products will no longer be available to our customers. If this happens, <a href="mailto:nina@silenttimer.com">email
    Christina</a> to fix it (can't just be re-added, needs to have same ID number).</font></p>
<p><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">Deleting
    a category disassociates the subcategories from it. These subcategories are
    not deleted, but the products they are attached to will not be available
    to customers. </font></p>
<p align="left">
<?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

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
</p>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
