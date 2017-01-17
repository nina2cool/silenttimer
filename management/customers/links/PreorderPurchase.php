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

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$TestID = $_GET['test'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
	$sql = "SELECT tblPreOrder.Email, tblPreOrder.FirstName, tblPreOrder.LastName,
	tblPreOrder.DateTime, tblPreOrder.TestID, tblCustomer.CustomerID, tblPurchase2.CustomerID,
	tblPurchase2.PurchaseID, tblPurchase2.OrderDateTime
	FROM tblPreOrder 
	INNER JOIN tblCustomer
	ON tblPreOrder.Email = tblCustomer.Email
	INNER JOIN tblPurchase2
	ON tblCustomer.CustomerID = tblPurchase2.CustomerID
	WHERE tblPurchase2.Status = 'active' AND tblPreOrder.Email <> '' AND tblCustomer.Email <> '' AND tblPreOrder.Status = 'active'
	GROUP BY tblCustomer.CustomerID";

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblPurchase2.OrderDateTime DESC";
		$sortBy ="tblPurchase2.OrderDateTime";
		$sortDirection = "DESC";
	}
	
	//echo $sql;

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	$NumPurchased = mysql_num_rows($result);
	
	
	$sql2 = "SELECT * FROM tblPreOrder WHERE Status = 'active'";
	$result2 = mysql_query($sql2) or die("Cannot execute query!");
	
	$NumTotal = mysql_num_rows($result2);
	
	$Percent = $NumPurchased / $NumTotal * 100;
	
	
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><? echo number_format($NumPurchased); ?> <? echo $Test; ?>
       Preorder Customers Actually Ordered</strong></font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&gt;
      <a href="Preorder.php">View all preorders </a></font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Percent
    Sold: <strong><font color="#CC0000"><? echo number_format($Percent,2); ?> % </font></strong></font></p>

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
    <tr bgcolor="#FFFFCC"> 
      <td width="19%" class=sort> <div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif"><a href="PreorderPurchase.php?test=<? echo $TestID; ?>&sort=tblPreOrder.FirstName&d=<? if ($sortBy=="tblPreOrder.FirstName") {echo $sd;} else {echo "ASC";}?>">First 
          Name</a> </font></strong></font></div></td>
      <td width="18%" class=sort> <div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif"><a href="PreorderPurchase.php?test=<? echo $TestID; ?>&sort=tblPreOrder.LastName&d=<? if ($sortBy=="tblPreOrder.LastName") {echo $sd;} else {echo "ASC";}?>">Last 
          Name</a></font></strong></font></div></td>
      <td width="11%" class=sort> <div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif"><a href="PreorderPurchase.php?test=<? echo $TestID; ?>&sort=tblPreOrder.Email&d=<? if ($sortBy=="tblPreOrder.Email") {echo $sd;} else {echo "ASC";}?>">Email</a></font></strong></font></div></td>
      <td width="25%" class=sort><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="PreorderPurchase.php?test=<? echo $TestID; ?>&sort=tblPreOrder.DateTime&d=<? if ($sortBy=="tblPreOrder.DateTime") {echo $sd;} else {echo "ASC";}?>">Preorder
                DateTime</a></strong></font></div></td>
      <td width="25%" class=sort> <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="PreorderPurchase.php?test=<? echo $TestID; ?>&sort=tblPreOrder.DateTime&d=<? if ($sortBy=="tblPreOrder.DateTime") {echo $sd;} else {echo "ASC";}?>">Order
          DateTime</a></strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$PreorderID = $row['PreorderID'];
				$FirstName = $row['FirstName'];
				$LastName = $row['LastName'];
				$TestID = $row['TestID'];
				$Email = $row['Email'];
				$DateTime = $row['DateTime'];
				$PurchaseID = $row['PurchaseID'];
				$OrderDateTime = $row['OrderDateTime'];
				$CustomerID = $row['CustomerID'];
				
				
												
			  ?>
    <tr> 
      <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font></td>
      <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font></td>
      <td><font size="1" face="Arial, Helvetica, sans-serif"><a href="mailto:<? echo $Email; ?>"><? echo $Email; ?></a></font></td>
      <td width="25%"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font></div></td>
      <td width="25%"> <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="../CustomerInfo.php?cust=<? echo $CustomerID; ?>" target="_blank"><? echo $PurchaseID; ?></a> - <? echo $OrderDateTime; ?></font></div></td>
    </tr>
    <?
			  	}
				
				
				//close connection to database
				mysql_close($link);
			  ?>
  </table> 
		
            
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

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
