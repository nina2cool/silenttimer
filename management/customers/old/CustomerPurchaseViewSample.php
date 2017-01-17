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

	$sql = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.City, tblCustomer.State, tblCustomer.Type, tblCustomer.ZipCode, tblCustomer.BusinessName,
			tblPurchase.PurchaseID, tblPurchase.CustomerID, tblPurchase.TimerPrice, tblPurchase.Tax, tblPurchase.TotalCost, tblPurchase.Shipped, tblPurchase.Notes, tblPurchase.NumOrdered, tblPurchase.DateTime
			FROM tblCustomer INNER JOIN tblPurchase
			ON tblCustomer.CustomerID = tblPurchase.CustomerID
			WHERE Type = 'samples' AND Status = 'active'";

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
      <td width="15%" class=sort> <div align="center"><strong><a href="../customers/CustomerPurchaseViewSample.php?sort=tblPurchase.PurchaseID&d=<? if ($sortBy=="tblPurchase.PurchaseID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Purchase 
          ID </font></a></strong></div></td>
      <td width="11%" class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerPurchaseViewBulk.php?sort=tblCustomer.BusinessName&d=<? if ($sortBy=="tblCustomer.BusinessName") {echo $sd;} else {echo "ASC";}?>">Company</a></font></strong></div></td>
      <td width="11%" class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerPurchaseViewSample.php?sort=tblCustomer.FirstName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";}?>">Contact 
          Name</a> </font></strong></div></td>
      <td width="6%" class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerPurchaseViewSample.php?sort=tblCustomer.City&d=<? if ($sortBy=="tblCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a></font></strong></div></td>
      <td width="7%" class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerPurchaseViewSample.php?sort=tblCustomer.State&d=<? if ($sortBy=="tblCustomer.State") {echo $sd;} else {echo "ASC";}?>">State</a></font></strong></div></td>
      <td width="9%" class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/CustomerPurchaseViewSample.php?sort=tblCustomer.ZipCode&d=<? if ($sortBy=="tblCustomer.ZipCode") {echo $sd;} else {echo "ASC";}?>">Zip 
          Code</a></strong></font></div></td>
      <td width="11%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerPurchaseViewSample.php?sort=tblPurchase.TotalCost&d=<? if ($sortBy=="tblPurchase.TotalCost") {echo $sd;} else {echo "ASC";} ?>">Total 
          Cost </a></font></strong></font></div></td>
      <td width="11%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerPurchaseViewSample.php?sort=tblPurchase.Shipped&d=<? if ($sortBy=="tblPurchase.Shipped") {echo $sd;} else {echo "ASC";}?>">Shipped?</a></font></strong></font></div></td>
      <td class=sort>Number</td>
      <td class=sort>Date Time </td>
      <td class=sort><div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"> 
          Claim</font></strong></div></td>
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
				$CompanyName = $row['BusinessName'];
				$Num = $row['NumOrdered'];
				$DateTime = $row['DateTime'];
			  ?>
    <tr> 
      <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="BulkCustEdit.php?purch=<? echo $caID; ?>&cust=<? echo $CustomerID; ?>">+++</a></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $caID; ?></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?> 
        <? echo $LastName; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $State; ?></font></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
      <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($TotalCost,2); ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Shipped; ?></font></div></td>
      <td width="12%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Num; ?></font></td>
      <td width="12%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font></td>
      <td width="12%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../warranty/addclaim2.php?p=<? echo $caID; ?>&c=<? echo $CustomerID; ?>" target="_blank">Claim</a></font></div></td>
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
