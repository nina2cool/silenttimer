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

	$sql = "Select * FROM tblProductNew";

	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblProductNew.Status ASC";
		$sortBy ="tblProductNew.Status";
		$sortDirection = "ASC";
	}
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Inventory</strong></font></p>
			
  <table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
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
      <td class=sort> <div align="center"><font size="1"><strong><a href="../inventory/ProductView.php?sort=tblProductNew.ProductID&d=<? if ($sortBy=="tblProductNew.ProductID") {echo $sd;} else {echo "ASC";}?>"><font face="Arial, Helvetica, sans-serif">Product 
      ID </font></a></strong></font></div></td>
      <td class=sort> <div align="center"><font color="#000000" size="1"><strong><font 
				     face="Arial, Helvetica, sans-serif"><a href="../inventory/ProductView.php?sort=tblProductNew.Nickname&d=<? if ($sortBy=="tblProductNew.Nickname") {echo $sd;} else {echo "ASC";}?>">Product</a></font></strong></font></div></td>
      <td width="5%" class=sort><div align="center"><font size="1" face="Arial, Helvetica, sans-serif">Notes</font></div></td>
      <td width="5%" class=sort> <div align="center"><font color="#000000" size="1"><strong><font 
				      face="Arial, Helvetica, sans-serif"><a href="../inventory/ProductView.php?sort=tblProductNew.OnHand&d=<? if ($sortBy=="tblProductNew.OnHand") {echo $sd;} else {echo "ASC";}?>">On
      Hand</a></font></strong></font></div></td>
      <td width="5%" class=sort><div align="center"><font color="#000000" size="1"><strong><font 
				      face="Arial, Helvetica, sans-serif">Web Inventory </font></strong></font></div></td>
      <td width="5%" class=sort><div align="center"><font color="#000000" size="1"><strong><font 
				      face="Arial, Helvetica, sans-serif">Category</font></strong></font></div></td>
      <td width="5%" class=sort><div align="center"><font color="#000000" size="1"><strong><font 
				      face="Arial, Helvetica, sans-serif">Total</font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="1"><strong><font 
				      face="Arial, Helvetica, sans-serif"><a href="../inventory/ProductView.php?sort=tblProductNew.RetailPrice&d=<? if ($sortBy=="tblProductNew.RetailPrice") {echo $sd;} else {echo "ASC";}?>">Online
                  Price</a></font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="1"><strong><font 
				      face="Arial, Helvetica, sans-serif"><a href="../inventory/ProductView.php?sort=tblProductNew.RetailPrice&d=<? if ($sortBy=="tblProductNew.RetailPrice") {echo $sd;} else {echo "ASC";}?>">Retail
      Price</a></font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="1"><strong><font 
				      face="Arial, Helvetica, sans-serif"><a href="../inventory/ProductView.php?sort=tblProductNew.Priority&d=<? if ($sortBy=="tblProductNew.Priority") {echo $sd;} else {echo "ASC";}?>">Priority</a></font></strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$ProductID = $row[ProductID];
				$Status = $row[Status];
				$OnHand = $row[OnHand];
				$Demo = $row[Demo];
				$Damaged = $row[Damaged];
				$ReturnToMan = $row[ReturnToMan];
				$Nickname = $row[Nickname];
				$RetailPrice = $row[RetailPrice];
				$OnlinePrice = $row[OnlinePrice];
				$Color = $row[Color];
				$Warehouse = $row[Warehouse];
				$WebInventory = $row[WebInventory];
				$Priority = $row[Priority];
				$CategoryID = $row[CategoryID];
				$Notes = $row[Notes];
				
				if($Status == "active")
				{
				$BackgroundColor = "#FFD2FF";
				}
				else
				{
				$BackgroundColor = "";
				}
				
				if($Notes == "") { $Notes = "-"; }
				
				$Total = $OnHand + $Damaged + $ReturnToMan + $Warehouse;
				
				if($CategoryID == "") { $CategoryID = "0"; }
				
						$sql2 = "SELECT * FROM tblCategory WHERE CategoryID = '$CategoryID'";
						$result2 = mysql_query($sql2) or die("Cannot get category name");
						
						while($row2 = mysql_fetch_array($result2))
						{
							$Category = $row2[Name];
						}
							
				
				
										
			  ?>
    <tr bgcolor="<? echo $BackgroundColor; ?>"> 
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../inventory/ProductEdit.php?p=<? echo $ProductID; ?>"><? echo $ProductID; ?></a></font></strong></div></td>
      <td> <div align="left"><strong><font color="#<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><? echo $Nickname; ?></font></strong></div></td>
 
      <td width="5%"><strong><font color="#<? echo $Color; ?>" size="1" face="Arial, Helvetica, sans-serif"><? echo $Notes; ?></font></strong></td>
      <td width="5%"> <div align="center">
	  <? if($OnHand > 3)
	  {?>
	  <font size="2" face="Arial, Helvetica, sans-serif"><? echo $OnHand; ?></font>
	  <? }
	  elseif($OnHand < 4 AND $Status == 'active')
	  {
	  ?>
	  <font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $OnHand; ?></strong></font>
	  <?
	  }
	  else
	  {
	  ?>
	  <font size="2" face="Arial, Helvetica, sans-serif"><? echo $OnHand; ?></font>
	  <?
	  }
	  ?>
	  </div></td>

      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $WebInventory; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Category; ?></font></div></td>
      <td width="5%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Total; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($OnlinePrice,2); ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($RetailPrice,2); ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Priority; ?></font></div></td>
    </tr>
    <?
			  	}
				
				//close connection to database
				mysql_close($link);
			  ?>
</table> 
<p>&nbsp;</p>

  
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
