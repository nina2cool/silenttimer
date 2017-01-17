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

	$sql = "Select * FROM tblProduct";



	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Product 
  Information</strong></font></p>
<p>&nbsp;</p>
<form>
			
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
      <td width="5%" class=sort> <div align="center"><strong><a href="../product/ProductView.php?sort=tblProduct.ProductID&d=<? if ($sortBy=="tblProduct.ProductID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Product 
          ID </font></a></strong></div></td>
      <td class=sort> <div align="center"><font color="#000000"><strong><font size="2" 
				     face="Arial, Helvetica, sans-serif"><a href="../product/ProductView.php?sort=tblProduct.ProductName&d=<? if ($sortBy=="tblProduct.ProductName") {echo $sd;} else {echo "ASC";}?>">Product 
          Name</a></font></strong></font></div></td>
      <td class=sort> <div align="center"><font color="#000000"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif"><a href="../product/ProductView.php?sort=tblProduct.NumInStock&d=<? if ($sortBy=="tblProduct.NumInStock") {echo $sd;} else {echo "ASC";}?>">Number in Stock</a></font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif"><a href="../product/ProductView.php?sort=tblProduct.Weight&d=<? if ($sortBy=="tblProduct.Weight") {echo $sd;} else {echo "ASC";}?>">Weight (lbs) </a></font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif"><a href="../product/ProductView.php?sort=tblProduct.Status&d=<? if ($sortBy=="tblProduct.Status") {echo $sd;} else {echo "ASC";}?>">Status</a></font></strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$pID = $row[ProductID]; //autonumer for each Customer
				$ProductName = $row[ProductName];
				$Description = $row[Description];
				$Weight = $row[Weight];
				$Status = $row[Status];
				$Num = $row[NumInStock];
												
			  ?>
    <tr> 
      <td width="5%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../product/ProductEdit.php?p=<? echo $pID; ?>"><strong><? echo $pID; ?></strong></a></font></div></td>
      <td width="30%"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ProductName; ?></font></div></td>
 
 <?
 	if($Num > 4)
	{ 
 ?>
      <td width="35%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Num; ?></font></div></td>
	  
	  <?
	  }
	  else
	  {
	  ?>
	  <td width="35%"> <div align="center"><font color = "FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>!! <? echo $Num; ?>  !!</strong></font></div></td>
	  	  
	  <?
	  }
	  ?>
      <td width="35%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Weight; ?></font></div></td>
      <td width="35%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Status; ?></font></div></td>
    </tr>
    <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
  </table> 
		
            <p align="left">&nbsp;</p>
            
<p align="center">
 <p>&nbsp;</p>
      <p>&nbsp;</p>
</form>
  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";


// has links that show up at the bottom in it.
require "../include/footerlinks.php";



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
