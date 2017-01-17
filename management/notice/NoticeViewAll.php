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

	
		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	

	$sql = "SELECT * FROM tblNotice";

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblNotice.StartDate ASC";
		$sortBy ="tblNotice.StartDate";
		$sortDirection = "ASC";
	}
		


	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View
      Active Notices </strong></font></p>
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
  <tr valign="top">
    <td><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">Notice</font></strong></div></td>
    <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date Range</font></strong></td>
    <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Edit</font></strong></div></td>
  </tr>
  <?

		while($row = mysql_fetch_array($result))
		{
			$NoticeID = $row[NoticeID];
			$Notice = $row[Notice];
			$StartDate = $row[StartDate];
			$EndDate = $row[EndDate];
			$Status = $row[Status];
			

			
	?>
  <tr>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Notice; ?>&nbsp;</font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $StartDate; ?> to <?php echo $EndDate; ?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Status; ?></font></td>
    <td><div align="center"><a href="NoticeEdit.php?notice=<? echo $NoticeID; ?>"><font size="2" face="Arial, Helvetica, sans-serif">Edit</font></a></div></td>
    <?
  
  }
  ?>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><b>&gt; <a href="NoticeAdd.php">Add
        a Notice </a></b></font></p>
<p><b><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="NoticeViewAll.php">View All Notices</a> </font></b></p>
<font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font>
<p>&nbsp;</p>
<p align="left">
<?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

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
</p>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
