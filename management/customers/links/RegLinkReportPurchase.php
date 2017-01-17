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

	$Link = $_GET['link'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
	$sql = "SELECT tblRegistration.Email, tblRegistration.FirstName, tblRegistration.LastName,
	tblRegistration.DateTime, tblRegistration.TestID, tblCustomer.CustomerID, tblPurchase2.CustomerID, tblRegistration.Link,
	tblPurchase2.PurchaseID, tblPurchase2.OrderDateTime FROM
	tblRegistration INNER JOIN tblCustomer
	ON tblRegistration.Email = tblCustomer.Email
	INNER JOIN tblPurchase2
	ON tblCustomer.CustomerID = tblPurchase2.CustomerID
	WHERE tblRegistration.Link = '$Link' AND tblPurchase2.Status = 'active' AND tblRegistration.Email <> '' AND tblCustomer.Email <> ''";

	//echo $sql;

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
		

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	$NumPurchased = mysql_num_rows($result);
	
	
	$sql2 = "SELECT * FROM tblRegistration WHERE Link = '$Link'";
	$result2 = mysql_query($sql2) or die("Cannot execute query2!");
	
	$NumTotal = mysql_num_rows($result2);
	
	$Percent = $NumPurchased / $NumTotal * 100;
	
	
	
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><? echo number_format($NumPurchased); ?>  Registration
      People Who Purchased Products for <? echo $Link; ?></strong></font></p>
<p><font face="Times New Roman, Times, serif"><font face="Times New Roman, Times, serif"><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="RegLinkReport.php">Back
to Link Report</a> </font></font></font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Percent
    Sold: <strong><font color="#CC0000"><? echo number_format($Percent,2); ?> % </font></strong></font></p>
<form>
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
      <td width="19%" class=sort> <div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif"><a href="RegLinkReportPurchase.php?link=<? echo $Link; ?>&sort=tblRegistration.FirstName&d=<? if ($sortBy=="tblRegistration.FirstName") {echo $sd;} else {echo "ASC";}?>">First 
          Name</a> </font></strong></font></div></td>
      <td width="18%" class=sort> <div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif"><a href="RegLinkReportPurchase.php?link=<? echo $Link; ?>&sort=tblRegistration.LastName&d=<? if ($sortBy=="tblRegistration.LastName") {echo $sd;} else {echo "ASC";}?>">Last 
          Name</a></font></strong></font></div></td>
      <td width="11%" class=sort> <div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif"><a href="RegLinkReportPurchase.php?link=<? echo $Link; ?>&sort=tblRegistration.Email&d=<? if ($sortBy=="tblRegistration.Email") {echo $sd;} else {echo "ASC";}?>">Email</a></font></strong></font></div></td>
      <td width="11%" class=sort><div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif"><a href="RegLinkReportPurchase.php?link=<? echo $Link; ?>&sort=tblRegistration.TestID&d=<? if ($sortBy=="tblRegistration.TestID") {echo $sd;} else {echo "ASC";}?>">Test</a></font></strong></font></div></td>
      <td width="25%" class=sort><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="RegLinkReportPurchase.php?link=<? echo $Link; ?>&sort=tblRegistration.DateTime&d=<? if ($sortBy=="tblRegistration.DateTime") {echo $sd;} else {echo "ASC";}?>">Registration
                DateTime</a></strong></font></div></td>
      <td width="25%" class=sort> <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="RegLinkReportPurchase.php?link=<? echo $Link; ?>&sort=tblRegistration.DateTime&d=<? if ($sortBy=="tblRegistration.DateTime") {echo $sd;} else {echo "ASC";}?>">Order
          DateTime</a></strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$RegID = $row['RegistrationID'];
				$FirstName = $row['FirstName'];
				$LastName = $row['LastName'];
				$TestID = $row['TestID'];
				$Email = $row['Email'];
				$DateTime = $row['DateTime'];
				$PurchaseID = $row['PurchaseID'];
				$OrderDateTime = $row['OrderDateTime'];
				$CustomerID = $row['CustomerID'];
				
				if($TestID == 1) { $Test = 'LSAT'; }
				if($TestID == 2) { $Test = 'MCAT'; }
				if($TestID == 3) { $Test = 'SAT'; }
				if($TestID == 4) { $Test = 'GMAT'; }
				if($TestID == 5) { $Test = 'GRE'; }
				if($TestID == 6) { $Test = 'ACT'; }
												
			  ?>
    <tr> 
      <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font></td>
      <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font></td>
      <td><font size="1" face="Arial, Helvetica, sans-serif"><a href="mailto:<? echo $Email; ?>"><? echo $Email; ?></a></font></td>
      <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Test; ?></font></div></td>
      <td width="25%"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font></div></td>
      <td width="25%"> <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="../CustomerInfo.php?cust=<? echo $CustomerID; ?>" target="_blank"><? echo $PurchaseID; ?></a> - <? echo $OrderDateTime; ?></font></div></td>
    </tr>
    <?
			  	}
				
				
				//close connection to database
				mysql_close($link);
			  ?>
  </table> 
		
            
  <br>
  <p align="left">&nbsp;</p>

</form>
  
  
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
