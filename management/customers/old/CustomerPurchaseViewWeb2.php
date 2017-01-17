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

	$sql = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.City, tblCustomer.State, tblCustomer.Type, tblCustomer.ZipCode,
			tblPurchase.PurchaseID, tblPurchase.CustomerID, tblPurchase.TimerPrice, tblPurchase.Tax, tblPurchase.TotalCost, tblPurchase.Shipped, tblPurchase.Notes, tblPurchase.Status
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE Type = 'web' AND Status = 'active' AND PurchaseID < '1000'";

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY PurchaseID DESC";
		$sortBy ="tblPurchase.PurchaseID";
		$sortDirection = "DESC";
	}
		


	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View 
  Customer Purchase Information</strong></font></p>
<p><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><a href="CustomerPurchaseViewWeb.php">1000+</a> 
  <strong>|</strong> &lt;1000</font></p>
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
      <td width="7%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">+++</font></strong></font></div></td>
      <td class=sort> <div align="center"><strong><a href="../customers/CustomerPurchaseViewWeb.php?sort=tblPurchase.PurchaseID&d=<? if ($sortBy=="tblPurchase.PurchaseID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Purchase 
          ID </font></a></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerPurchaseViewWeb.php?sort=tblCustomer.FirstName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";}?>">First 
          Name</a> </font></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerPurchaseViewWeb.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";}?>">Last 
          Name</a></font></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerPurchaseViewWeb.php?sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a></font></strong></div></td>
      <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerPurchaseViewWeb.php?sort=tblCustomer.State&d=<? if ($sortBy=="tblCustomer.State") {echo $sd;} else {echo "ASC";}?>">State</a></font></strong></div></td>
      <td class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/CustomerPurchaseViewWeb.php?sort=tblCustomer.ZipCode&d=<? if ($sortBy=="tblCustomer.ZipCode") {echo $sd;} else {echo "ASC";}?>">Zip 
          Code</a></strong></font></div></td>
      <td class=sort> <div align="center"><font color="#000000"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerPurchaseViewWeb.php?sort=tblPurchase.TotalCost&d=<? if ($sortBy=="tblPurchase.TotalCost") {echo $sd;} else {echo "ASC";} ?>">Total 
          Cost </a></font></strong></font></div></td>
      <td class=sort> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerPurchaseViewWeb.php?sort=tblPurchase.Shipped&d=<? if ($sortBy=="tblPurchase.Shipped") {echo $sd;} else {echo "ASC";}?>">Shipped?</a></font></strong></font></div></td>
      <td class=sort><div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"> 
          C</font></strong></div></td>
      <td class=sort><div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">R</font></strong></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$caID = $row['PurchaseID'];
				$CustomerID = $row['CustomerID'];
				$TimerPrice = $row['TimerPrice'];
				$Tax = $row['Tax'];
				$TotalCost = $row['TotalCost'];
				$Shipped = $row['Shipped'];
				$Notes = $row['Notes'];
				$FirstName = $row['FirstName'];
				$LastName = $row['LastName'];
				$City = $row['City'];
				$State = $row['State'];
				$ZipCode = $row['ZipCode'];										
			  ?>
    <tr> 
      <td width="7%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerPurchaseEdit.php?purch=<? echo $caID; ?>&cust=<? echo $CustomerID; ?>">+++</a></font></div></td>
      <td width="13%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $caID; ?></font></div></td>
      <td width="8%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font></td>
      <td width="11%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font></td>
      <td width="11%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></td>
      <td width="9%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></td>
      <td width="9%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
      <td width="9%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($TotalCost,2); ?></font></div></td>
      <td width="11%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Shipped; ?></font></div></td>
      <td width="12%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../warranty/addclaim2.php?p=<? echo $caID; ?>&c=<? echo $CustomerID; ?>" target="_blank">C</a></font></div></td>
      <td width="12%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerPurchaseAddRepl.php?cust=<? echo $CustomerID; ?>" target="_blank">R</a></font></div></td>
    </tr>
    <?
			  	}
				
				//close connection to database
				mysql_close($link);
			  ?>
  </table> 
		
            <p align="left">&nbsp;</p>
            
  <p align="center">
</form>
  
  
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
