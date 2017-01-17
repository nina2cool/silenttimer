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

	$TestID = $_GET['t'];

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$Now = date("Y-m-d");
	

	$sql2 = "SELECT * FROM tblTests WHERE TestID = '$TestID'";
	$result2 = mysql_query($sql2) or die("Cannot execute query!");
	while($row2 = mysql_fetch_array($result2))
	{ 
	$Name = $row2[Name];
	}	
	
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT * FROM tblTestDates WHERE TestID = '$TestID'";

	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblTestDates.Date DESC";
		$sortBy ="tblTestDates.Date";
		$sortDirection = "DESC";
	}
		

	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Test
      Dates for <? echo $Name; ?></strong></font></p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="TestDateAdd.php?t=<? echo $TestID; ?>">Add
      New Test Dates</a></font></strong></p><br>
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
      <td width="10%"> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Edit</strong></font></div></td>
					   
					   
      <td width="20%"> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="TestDateViewDetail.php?t=<? echo $TestID; ?>&sort=tblTestDates.Date&d=<? if 
					  ($sortBy=="tblTestDates.Date") {echo $sd;} else {echo "ASC";} ?>">Date </a></strong></font></div></td>
 <td class=sort> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Additional
      Information</strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{ 
				$TestDateID = $row[TestDateID];
				$Date = $row[Date];
				$Info = $row[Info];
				
					if($Info == "") { $Info = "-"; }
				
			  ?>
    <tr<? if($Date <= $Now) { ?> bgcolor="#CCCCCC"<? } ?>> 
      
      <td width="10%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="TestDateEdit.php?tID=<? echo $TestDateID; ?>">Edit</a></font></div></td>
      <td width="20%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Date; ?></font></div></td>
     <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Info; ?></font></div></td>
	

    </tr>
    <?
			  	}
			  ?>
</table> 
  
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.

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