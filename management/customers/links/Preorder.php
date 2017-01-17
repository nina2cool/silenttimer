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

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "SELECT * FROM tblPreOrder";

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblPreOrder.DateTime ASC";
		$sortBy ="tblPreOrder.DateTime";
		$sortDirection = "ASC";
	}
		
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	$NumTotal = mysql_num_rows($result);

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Preorders</strong></font></p>
<ul>
  <li><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $NumTotal; ?> number
    of preorders</font></li>
  <li><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="PreorderPurchase.php">Preorders
      who actually purchased </a></font></li>
</ul>
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
      <td> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="Preorder.php?sort=tblPreOrder.FirstName&d=<? if ($sortBy=="tblPreOrder.FirstName") {echo $sd;} else {echo "ASC";}?>">First</a> and
              <a href="Preorder.php?sort=tblPreOrder.LastName&d=<? if ($sortBy=="tblPreOrder.LastName") {echo $sd;} else {echo "ASC";}?>">Last</a> Name</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Test</font></strong></div></td>
      <td> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="Preorder.php?sort=tblPreOrder.Email&d=<? if ($sortBy=="tblPreOrder.Email") {echo $sd;} else {echo "ASC";}?>">Email</a></font></strong></div></td>
      <td> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="Preorder.php?sort=tblPreOrder.DateTime&d=<? if ($sortBy=="tblPreOrder.DateTime") {echo $sd;} else {echo "ASC";}?>">Date 
      and Time</a></font></strong></div></td>
      <td> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">View</font></strong></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$PreorderID = $row[PreorderID];
				$FirstName = $row[FirstName];
				$LastName = $row[LastName];
				$TestID = $row[TestID];
				$Email = $row[Email];
				$DateTime = $row[DateTime];
				$Status = $row[Status];
						
						
						$sql3 = "SELECT Count(Email) as Count FROM tblPreOrder WHERE Email = '$Email'";
						$result3 = mysql_query($sql3) or die("Cannot count");
						
						while($row3 = mysql_fetch_array($result3))
						{
							$Count = $row3[Count];
						}

			
				$sql2 = "SELECT * FROM tblTests WHERE TestID = '$TestID'";
				$result2 = mysql_query($sql2) or die("Cannot count");
				
				while($row2 = mysql_fetch_array($result2))
				{
					$Test = $row2[Name];
				



			  ?>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?> <? echo $LastName; ?></font></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Test; ?></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Email; ?></font></td>
      <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerLoginView2.php?cust=<? echo $CustomerID; ?>"><font size="1">View
                All (<? echo $Count; ?>) </font></a></font></div></td>
				<? } ?>
  </tr>
    <?
			  	}
				
				
				//close connection to database
				mysql_close($link);
			  ?>
  </table> 
		
            
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
  
  
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
