<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../include/top.php";


require "include/sidemenu.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	
	
	//grab variables to get purchase info from DB.
	$CatID = $_GET['cat'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
		if($_GET['Delete'] == "YES")
	{
		
		$Now = date("Y-m-d");
		
		$sql5 = "DELETE FROM tblCategory WHERE CategoryID = '$SubcategoryID'";
		mysql_query($sql5) or die("Cannot delete subcategory, try again!");
	
	}
	

	
	$sql2 = "SELECT * FROM tblCategory WHERE CategoryID = '$CatID'";

	//put SQL statement into result set for loop through records
	$result2 = mysql_query($sql2) or die("Cannot execute query!");
	
		while($row2 = mysql_fetch_array($result2))
		{
			$Category = $row2[Name];	
		}
	
	
	$sql = "SELECT * FROM tblCategory WHERE BelongsTo = '$CatID'";

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblCategory.Name ASC";
		$sortBy ="tblCategory.Name";
		$sortDirection = "ASC";
	}
		


	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");


		

?>
<p><font color="#000000" size="5" face="Arial, Helvetica, sans-serif"><strong>Subcategories 
  for <? echo $Category; ?><br>
  </strong></font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></p>
<form>
  <p><font size="2" face="Arial, Helvetica, sans-serif">Column heading sorts rows 
    ASC or DESC.</font></p>
 
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
      <td width="25%" height="34"> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../categories/index.php?sort=tblCategory3.Category&d=<? if ($sortBy=="tblCategory3.Category") {echo $sd;} else {echo "ASC";}?>">Subcategory 
          Name</a></font></strong></div></td>
      <td width="65%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Description</font></strong></div></td>
      <td width="10%"><div align="center"><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><b>Delete</b></font></div></td>
    </tr>
    <?

		while($row = mysql_fetch_array($result))
		{
			$Name = $row[Name];
			$SubcategoryID = $row[CategoryID];
			$Details = $row[Details];

			
	?>
    <tr valign="top"> 
      <td width="25%"> <a href="../categories/SubcategoryEdit.php?subcat=<? echo $SubcategoryID; ?>"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Name; ?><br>
        </font></a></td>
      <td width="65%"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Details; ?>&nbsp;</font></td>
      <td width="10%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b><a href="SubcategoryView.php?Delete=YES&SubcategoryID=<? echo $SubcategoryID; ?>&cat=<? echo $CatID; ?>">X</a><font color="#FF0000">*</font></b></font></div></td>
      <?
  
  }
  ?>
    </tr>
  </table>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; <a href="../categories/SubcategoryAdd.php?cat=<? echo $CatID; ?>">Add 
    a new Subcategory under <? echo $Category; ?></a></strong></font></p>
  <p><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">*If you 
    delete a category/subcategory that has products associated with it, these 
    products will no longer be available to your customers. If this happens, <a href="mailto:erik@proace.com">email 
    Erik</a> to fix it (can't just be re-added, needs to have same ID number).</font> 
  </p>
</form>
  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.

require "../include/bottom.php";
mysql_close($link);


// finishes security for page
}
else
{
	header("location: $http_admin"); //redirects user via PHP to this page... better than meta refresh...
}
?>
