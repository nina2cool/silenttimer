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
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "Select * FROM tblLinks WHERE Status = 'inactive'";


	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Links</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">All Inactive links </font></p>

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
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Edit</strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Title</strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Description</strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Priority</strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Test</strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row2 = mysql_fetch_array($result))
				{
				$LinkID = $row2[LinkID];
				$Title = $row2[Title];
				$Link = $row2[Link];
				$Description = $row2[Description];
				$Test = $row2[Test];
				$Type = $row2[Type];
				$IsOfficial = $row2[IsOfficial];
				$Priority = $row2[Priority];
				$Status = $row2[Status];
				
				if($Description == "") { $Description = "-"; }
				if($Test == "") { $Test = "-"; }
												
			  ?>
    <tr>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="LinkEdit.php?link=<? echo $LinkID; ?>">Edit</a></font></div></td>
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $Link; ?>" target="_blank"><? echo $Title; ?></a></font></div></td>
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Description; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Priority; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Test; ?></font></div></td>
    </tr>
    <?
			  	}
			  ?>
  </table>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="LinkView.php">View
  active links</a> </font></p>
            
  <p align="center">
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
