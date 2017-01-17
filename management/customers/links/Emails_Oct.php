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
?>

<?
	
		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
	$sql = "SELECT tblPurchase2.PurchaseID, tblCustomer.CustomerID, tblCustomer.BusinessName, tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.Email, 
	tblCustomer.Type, tblPurchase2.OrderDateTime, tblPurchase2.TestID, tblPurchase2.TestDate 
	FROM tblCustomer 
	INNER JOIN tblPurchase2 ON tblCustomer.CustomerID = tblPurchase2.CustomerID 
	WHERE tblPurchase2.Status = 'active' AND tblPurchase2.OrderDateTime > '2005-10-01' AND tblPurchase2.OrderDateTime < '2006-01-01' 
	AND tblCustomer.Type <> '6' AND tblCustomer.Type <> '5' AND TestID = '0' OR tblPurchase2.Status = 'active' 
	AND tblPurchase2.OrderDateTime > '2005-10-01' AND tblPurchase2.OrderDateTime < '2006-01-01' AND tblCustomer.Type <> '6' AND 
	tblCustomer.Type <> '5' AND TestID = '1'
	GROUP BY tblCustomer.CustomerID";

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblCustomer.Email ASC";
		$sortBy ="tblCustomer.Email";
		$sortDirection = "ASC";
	}
		

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	$NumTotal = mysql_num_rows($result);
	

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><? echo number_format($NumTotal); ?> Customers
      to email since Oct. 1, 2005 thru Dec. 31, 2005 </strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">don't do Leslie McMillan or Jose Rodriguez at Test Prep Institute, or the
  people with no email address. </font></p>
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
      <td width="11%" class=sort> <div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif"><a href="../customers/links/TimerInterestView.php?sort=tblTimerContacts.email&d=<? if ($sortBy=="tblTimerContacts.email") {echo $sd;} else {echo "ASC";}?>">Email</a></font></strong></font></div></td>
      <td width="25%" class=sort><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong>Name</strong></font></div></td>
      <td width="25%" class=sort><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong>Type</strong></font></div></td>
      <td width="25%" class=sort><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong>TestID</strong></font></div></td>
      <td width="25%" class=sort> <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/links/TimerInterestView.php?sort=tblTimerContacts.date&d=<? if ($sortBy=="tblTimerContacts.date") {echo $sd;} else {echo "ASC";}?>">Date 
      and Time</a></strong></font></div></td>
      <?
			  	
				// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$FirstName = $row['FirstName'];
				$LastName = $row['LastName'];
				$Email = $row['Email'];
				$DateTime = $row['OrderDateTime'];
				$TestID = $row['TestID'];
				$TypeID = $row['Type'];
				$CustomerID = $row['CustomerID'];
				
						$sql2 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
						$result2 = mysql_query($sql2) or die("Cannot get type");
						
						while($row2 = mysql_fetch_array($result2))
						{
							$Type = $row2[Type];
						}
												
			  ?>
    <tr> 
      <td><font size="1" face="Arial, Helvetica, sans-serif"><a href="mailto:<? echo $Email; ?>?subject=Important LSAT and Silent Timer Update"><? echo $Email; ?></a></font></td>
      <td width="25%"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?> <? echo $LastName; ?> <a href="../CustomerInfo.php?cust=<? echo $CustomerID; ?>" target="_blank">@</a></font></div></td>
      <td width="25%"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Type; ?></font></div></td>
      <td width="25%"><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $TestID; ?></font></div></td>
      <td width="25%"> <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font></div></td>
    </tr>
    <?
			  	}
				
				
				//close connection to database
				mysql_close($link);
			  ?>
  </table> 
		
            
  <br>
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
