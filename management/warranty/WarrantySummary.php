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

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
 
	//declare an integer as a counter
	$x = 0;
	
	//connection to db
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT * FROM tblCustomerClaims2
			WHERE tblCustomerClaims2.Status = 'open'";
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
		while($row = mysql_fetch_array($result))
				{
				$PurchaseID = $row[PurchaseID];
				$x += 1;
				}			
		 
?>
	<p><font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Claim Summary </strong></font> </p>
	
	<p>
	<strong>
	<font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif">
	<? echo(" **$x** New Claims.") ?>
	</font>
	</strong>
	</p>
   
<?
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//beginning SQL statement that gets all data from tables.
	$sql2 = "SELECT * FROM tblCustomerClaims2 GROUP BY ClaimType";
	
	//echo $sql2;
		
	//sort results.....
	if ($sortBy != "")
	{
		$sql2 .= " ORDER BY $sortBy $sortDirection";
	}
	else
	{
		$sql2 .= " ORDER BY tblCustomerClaims2.ClaimType DESC";
		$sortBy ="tblCustomerClaims2.ClaimType";
		$sortDirection = "DESC";
	}
	
	//put SQL statement into result set for loop through records
	$result2 = mysql_query($sql2) or die("Cannot execute query!");

?>
		
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
    <td class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Claim
              Type </font></strong></font></div></td>
    <td class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Reason2</font></strong></font></div></td>
  </tr>
  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row= mysql_fetch_array($result2))
				{
				$ClaimType = $row[ClaimType];
				$ClaimID = $row[ClaimID];				

				
			  ?>
  <tr> 
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $ClaimType; ?></strong></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
	
	<?
	$sql3 = "SELECT Count(Reason2) as Count, Reason2 FROM tblCustomerClaims2 WHERE ClaimType = '$ClaimType' GROUP BY Reason2";
	//echo $sql3;
	$result3 = mysql_query($sql3) or die("Cannot count reasons");
	
	while($row3 = mysql_fetch_array($result3))
	{
		$Reason2 = $row3[Reason2];
		$Count = $row3[Count];
		
		if($Reason2 == "") { $Reason2 = "Other"; }
	?>
	
	</font>
        <li><font color="#00E600" size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Reason2; ?></strong></font><font size="2" face="Arial, Helvetica, sans-serif"> - <font color="#FF0000"><? echo $Count; ?></font></font></li>
        <font size="2" face="Arial, Helvetica, sans-serif">
        <?
	}
	?>
	
	
	    </font></div></td>
  </tr>
  <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
</table>
            <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"></font></p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>

   
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";


// finishes security for page
}
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>