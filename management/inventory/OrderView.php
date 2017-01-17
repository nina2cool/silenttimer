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

	$sql = "Select * FROM tblProductOrder WHERE Status = 'active'";

	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblProductOrder.Date DESC";
		$sortBy ="tblProductOrder.Date";
		$sortDirection = "DESC";
	}
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Inventory
      Update History</strong></font></p>
			
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
      <td class=sort> <div align="center"><font size="1"><strong><a href="../inventory/OrderView.php?sort=tblProductOrder.ProductID&d=<? if ($sortBy=="tblProductOrder.ProductID") {echo $sd;} else {echo "ASC";}?>"><font face="Arial, Helvetica, sans-serif">OrderID</font></a></strong></font></div></td>
      <td class=sort> <div align="center"><font color="#000000" size="1"><strong><font 
				     face="Arial, Helvetica, sans-serif"><a href="../inventory/OrderView.php?sort=tblProductOrder.Nickname&d=<? if ($sortBy=="tblProductOrder.Nickname") {echo $sd;} else {echo "ASC";}?>">Product</a></font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="1"><strong><font 
				      face="Arial, Helvetica, sans-serif"><a href="../inventory/OrderView.php?sort=tblProductOrder.Date&d=<? if ($sortBy=="tblProductOrder.Date") {echo $sd;} else {echo "ASC";}?>">Date</a></font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="1"><strong><font 
				      face="Arial, Helvetica, sans-serif"><a href="../inventory/OrderView.php?sort=tblProductOrder.Quantity&d=<? if ($sortBy=="tblProductOrder.Quantity") {echo $sd;} else {echo "ASC";}?>">Quantity</a></font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="1"><strong><font 
				      face="Arial, Helvetica, sans-serif"><a href="../inventory/OrderView.php?sort=tblProductOrder.TotalCost&d=<? if ($sortBy=="tblProductOrder.TotalCost") {echo $sd;} else {echo "ASC";}?>">From
                  Here</a></font></strong></font></div></td>
      <td width="5%" class=sort> <div align="center"><font color="#000000" size="1"><strong><font 
				      face="Arial, Helvetica, sans-serif">To There </font></strong></font></div></td>
      <td width="5%" class=sort><div align="center"><font color="#000000" size="1"><strong><font 
				      face="Arial, Helvetica, sans-serif">Reason</font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="1"><strong><font 
				      face="Arial, Helvetica, sans-serif">Employee</font></strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$ProductID = $row[ProductID];
				$Status = $row[Status];
				$FromHere = $row[FromHere];
				$ToThere = $row[ToThere];
				$Date = $row[Date];
				$EmployeeID = $row[EmployeeID];
				$Quantity = $row[Quantity];
				$OrderID = $row[OrderID];
				$Reason = $row[Reason];
				
					$sql2 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
					$result2 = mysql_query($sql2) or die("cannot get product nickname");
					while($row2 = mysql_fetch_array($result2))
					{
						$Nickname = $row2[Nickname];
						$Color = $row2[Color];
					}
					
					
					$sql3 = "SELECT * FROM tblEmployee WHERE EmployeeID = '$EmployeeID'";
					$result3 = mysql_query($sql3) or die("cannot get product nickname");
					while($row3 = mysql_fetch_array($result3))
					{
						$Employee = $row3[FirstName];
					}
					
					if($EmployeeID == 0)
					{
					$Employee = "-";
					}
				
				
				
										
			  ?>
    <tr> 
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../inventory/OrderEdit.php?order=<? echo $OrderID; ?>"><? echo $OrderID; ?></a></font></strong></div></td>
      <td> <div align="left"><strong><font color="#<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><? echo $Nickname; ?></font></strong></div></td>
 
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Date; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($Quantity); ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FromHere; ?></font></div></td>
      <td width="5%"> <div align="center">	  <font size="2" face="Arial, Helvetica, sans-serif"><? echo $ToThere; ?></font>	  </div></td>

      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Reason; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Employee; ?></font></div></td>
    </tr>
    <?
			  	
				}
				//close connection to database
				mysql_close($link);
			  ?>
</table> 
		<p><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="OrderViewInactive.php">Cancelled Orders</a></font></p>

  
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
