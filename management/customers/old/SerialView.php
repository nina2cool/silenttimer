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
	
	//purchaseID
	$FirstName= $_POST['txtFirstName'];
	
	//LastName
	$lastName = $_POST['txtLastName'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

$sql = "SELECT tblCustomer.FirstName, tblCustomer.LastName, tblCustomer.CustomerID, tblPurchase.PurchaseID, tblPurchase.CustomerID, tblPurchaseSerial.PurchaseID, tblPurchaseSerial.Serial, tblPurchaseSerial.Notes
		FROM tblCustomer INNER JOIN tblPurchase ON
		tblCustomer.CustomerID = tblPurchase.CustomerID
		INNER JOIN tblPurchaseSerial ON
		tblPurchaseSerial.PurchaseID = tblPurchase.PurchaseID";


	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; 
Customer Serial Information</strong></font> 
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
      <td width="5%" class=sort><font size="2" face="Arial, Helvetica, sans-serif"><strong>Edit</strong></font></td>
      <td width="5%" class=sort><div align="center"><strong><a href="../customers/SerialView.php?sort=tblPurchaseSerial.PurchaseID&d=<? if ($sortBy=="tblPurchaseSerial.PurchaseID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Purchase 
          ID</font></a></strong></div></td>
      <td width="5%" class=sort> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/SerialView.php?sort=tblCustomer.CustomerID&d=<? if ($sortBy=="tblCustomer.CustomerID") {echo $sd;} else {echo "ASC";}?>">Customer 
          ID</a></font></strong></div></td>
      <td width="5%" class=sort> <div align="center"><strong><a href="../customers/SerialView.php?sort=tblPurchaseSerial.Serial&d=<? if ($sortBy=="tblPurchaseSerial.Serial") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Serial 
          #</font></a></strong></div></td>
      <td width="20%" class=sort> <div align="center"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/SerialView.php?sort=tblCustomer.FirstName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";}?>">First 
          Name</a></font></strong></div></td>
      <td width="20%" class=sort> <div align="center"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/SerialView.php?sort=tblCustomer.LastName&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";} ?>">Last 
          Name</a></font></strong></div></td>
      <td class=sort> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/SerialView.php?sort=tblPurchaseSerial.Notes&d=<? if ($sortBy=="tblPurchaseSerial.Notes") {echo $sd;} else {echo "ASC";}?>">Notes</a></font></strong></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$cID = $row[CustomerID];
				$pID = $row[PurchaseID];
				$FirstName = $row[FirstName];
				$LastName = $row[LastName];
				$Serial = $row[Serial];
				$Notes = $row[Notes];
								
			  ?>
    <tr>
      <td width="5%"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="SerialEdit.php?purch=<? echo $pID; ?>">Edit</a></strong></font></td>
      <td width="5%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $pID; ?></strong></font></div></td>
      <td width="5%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $cID; ?></strong></font></div></td>
      <td width="5%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Serial; ?></strong></font></div></td>
      <td width="20%"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $FirstName; ?></strong></font></div></td>
      <td width="20%"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $LastName; ?></strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Notes; ?></strong></font></td>
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
