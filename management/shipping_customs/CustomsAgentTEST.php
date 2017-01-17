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
	//users search mechanism
	//$radio = $_POST['radioSelection'];
	
	//time search variables
//	$timeType = $_POST['cboTime'];
	//$fromDate = $_POST['txtFromDate'];
	//$toDate = $_POST['txtToDate'];
	
	//purchaseID
	$FirstName= $_POST['txtFirstName'];
	
	//LastName
	$lastName = $_POST['txtLastName'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

$sql = "Select * FROM tblCustomsAgent";
/*	
//beginning SQL statement that gets all data from tables.
	$sql = "SELECT tblPurchase.PurchaseID, tblPurchase.CustomerID, tblCustomer.LastName, 
	         tblProduct.ProductName, tblPurchase.NumOrdered, 
	         tblPurchase.TotalCost, tblPurchase.DateTime, tblPurchase.Shipped
			FROM tblCustomer INNER JOIN tblPurchase ON 
			tblCustomer.CustomerID = tblPurchase.CustomerID INNER JOIN 
			tblProduct ON tblPurchase.ProductID = tblProduct.ProductID";

	
	
	
*/	
	if ($radio == "LastName")
	{
		$sql .= " WHERE tblCustomsAgent.LastName = '$LastName'";
	}

	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>

			<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; 
              Customs Agents</strong></font></p>
            
			<form>
			<table width="50%" border="1" align="left" cellpadding="7" cellspacing="0" bordercolor="#003399">
              
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
			  
                <td width="9%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" 
				       face="Arial, Helvetica, sans-serif">Details</font></strong></font></div></td>
					   
                <td width="6%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" 
				     face="Arial, Helvetica, sans-serif"><a href="CustomsAgentTEST.php?sort=CustomsAgent.FirstName&d=<? if ($sortBy=="tblCustomsAgent.FirstName") {echo $sd;} else {echo "ASC";}?>%0A%09%09%09%09">First
					  Name</a></font></strong></font></div></td>
        
		    <td width="17%" class=sort> <div align="left"><font color="#003399"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif"><a href="CustomsAgentTEST.php?sort=tblCustomsAgent.LastName&d=<? if ($sortBy=="tblCustomsAgent.LastName") {echo $sd;} else {echo "ASC";} ?>">Last 
                      Name</a></font></strong></font></div></td>
					  
					  
          <!--          <td width="17%" class=sort> <div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="management/managepurchases/viewpurchases.php?sort=tblProduct.ProductName&d=<? if ($sortBy=="tblProduct.ProductName") {echo $sd;} else {echo "ASC";} ?>">Product</a></strong></font></div></td>
                <td width="6%" class=sort> <div align="center"><font color="#003399" face="Arial, Helvetica, sans-serif"><strong><font size="2"><a href="management/managepurchases/viewpurchases.php?sort=tblPurchase.NumOrdered&d=<? if ($sortBy=="tblPurchase.NumOrdered") {echo $sd;} else {echo "ASC";} ?>">#</a></font></strong></font></div></td>
                <td width="11%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="management/managepurchases/viewpurchases.php?sort=tblPurchase.TotalCost&d=<? if ($sortBy=="tblPurchase.TotalCost") {echo $sd;} else {echo "ASC";} ?>">Total</a></strong></font></div></td>
                <td width="22%" class=sort> <div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="management/managepurchases/viewpurchases.php?sort=tblPurchase.DateTime&d=<? if ($sortBy=="tblPurchase.DateTime") {echo $sd;} else {echo "ASC";} ?>">Date 
                    Time </a></strong></font></div></td>
                <td width="12%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="management/managepurchases/viewpurchases.php?sort=tblPurchase.Shipped&d=<? if ($sortBy=="tblPurchase.Shipped") {echo $sd;} else {echo "ASC";} ?>">Shipped?</a></strong></font></div></td>
              </tr>
        
		-->      
			  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$caID = $row[CustomsAgentID]; //autonumer for each Agent
				$FirstName = $row[FirstName];
				$LastName = $row[LastName];
								
			  ?>
				  <tr> 
<!--					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="management/managepurchases/editpurchases.php?p=<? echo $pID; ?>&c=<? echo $cID; ?>"><strong>Details</strong></a></font></div></td> -->
<td width="43"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../../editpurchasesTEST.php?ca=<? echo $caID; ?>"><strong>Details</strong></a></font></div></td>
				<!--	<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $pID; ?></strong></font></div></td> -->
					<td width="93"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $FirstName; ?></strong></font></div></td>
					<td width="95"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $LastName; ?></strong></font></div></td>
<!--					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $numOrdered; ?></strong></font></div></td>
					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>$<? echo $total; ?></strong></font></div></td>
					<td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $dt; ?></strong></font></div></td>
					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="#"><strong><? echo $shipped; ?></strong></a></font></div></td>  -->
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
