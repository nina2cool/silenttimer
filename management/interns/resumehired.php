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

	
		if($_GET['Status'] == "inactive")
	{
		$ResumeID = $_GET['ResumeID'];
		
		$sql = "UPDATE tblResume
				SET Status = 'inactive' 
				WHERE ResumeID = '$ResumeID';";
		mysql_query($sql) or die("Cannot delete resume, try again!");
	}
	
	
	$sql = "Select * FROM tblResume WHERE Status = 'hired'";



	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Hired 
Interns Resume Index</strong></font> 
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
      <td width="15%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Resume</font></strong></font></div></td>
      <td width="15%" class=sort> <div align="center"><strong><a href="../interns/resumeindex.php?sort=tblResume.LocationID&d=<? if ($sortBy=="tblResume.LocationID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Location 
          ID </font></a></strong></div></td>
      <td width="30%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" 
				     face="Arial, Helvetica, sans-serif"><a href="../interns/resumeindex.php?sort=tblResume.FirstName&d=<? if ($sortBy=="tblResume.FirstName") {echo $sd;} else {echo "ASC";}?>">First 
          Name</a></font></strong></font></div></td>
      <td width="35%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif"><a href="../interns/resumeindex.php?sort=tblResume.LastName&d=<? if ($sortBy=="tblResume.LastName") {echo $sd;} else {echo "ASC";} ?>">Last 
          Name</a></font></strong></font></div></td>
      <td width="35%" class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Edit 
          Resume</font></strong></font></div></td>
      <td width="35%" class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Delete 
          Resume </font></strong></font></div></td>
      <!--          <td width="17%" class=sort> <div align="left"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="management/managepurchases/viewpurchases.php?sort=tblProduct.ProductName&d=<? if ($sortBy=="tblCustomer.FirstName") {echo $sd;} else {echo "ASC";} ?>">Product</a></strong></font></div></td>
                <td width="6%" class=sort> <div align="center"><font color="#003399" face="Arial, Helvetica, sans-serif"><strong><font size="2"><a href="management/managepurchases/viewpurchases.php?sort=tblPurchase.NumOrdered&d=<? if ($sortBy=="tblCustomer.LastName") {echo $sd;} else {echo "ASC";} ?>">#</a></font></strong></font></div></td>
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
				$LocID = $row[LocationID]; //autonumer for each Customer
				$FirstName = $row[FirstName];
				$LastName = $row[LastName];
				$FileName = $row[FileName];
				$ResumeID = $row[ResumeID];
								
			  ?>
    <tr> 
      <td width="15%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../interns/resumes/<? echo $FileName; ?>" target="_blank">View 
          Resume</a></font></div></td>
      <!--					<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="management/managepurchases/editpurchases.php?p=<? echo $pID; ?>&c=<? echo $cID; ?>"><strong>Details</strong></a></font></div></td> -->
      <td width="5%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $LocID; ?></font></div></td>
      <!--	<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $pID; ?></strong></font></div></td> -->
      <td width="35%"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font></div></td>
      <td width="35%"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font></div></td>
      <td width="35%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="resumeedit.php?rID=<? echo $ResumeID; ?>">Edit</a></font></div></td>
      <td width="35%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="resumehired.php?<? echo "ResumeID=$ResumeID&Status=inactive";?>">Delete</a></font></div></td>
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
		
            
  <p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; 
    <a href="resumeindex.php">Active Resumes</a></font></strong></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; 
    <a href="resumedeleted.php">Deleted/Inactive Resumes</a></strong></font></p>
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
