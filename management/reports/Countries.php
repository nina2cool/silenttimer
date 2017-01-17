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



?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>#
      of Customers 
  by Country</strong></font>
<p>
    <?

	$sql2 = "SELECT * FROM tblCustomer WHERE Type <> '5' AND Type <> '6' AND Type <> '8' AND Type <> '7'";
	$result2 = mysql_query($sql2) or die("Cannot retrieve customer info, please try again.");
	$Total = mysql_num_rows($result2);


	$sql = "SELECT Count(CountryID) as Count, CountryID FROM tblCustomer WHERE Type <> '5' AND Type <> '6' AND Type <> '8' AND Type <> '7' GROUP BY CountryID ORDER BY Count DESC";
	$result = mysql_query($sql) or die("Cannot retrieve customer info, please try again.");
		

?>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
  <?
			   // code to handle sort direction
			   // this following code just switches teh ascending order to descending and vice verca when necessary.
			   // The links in the titles of the colum fields are changed depending on the value in this variable and
			   // depending on what is being sorted by.
	//sort results.....
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
    <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Country</font></strong></font></div></td>
    <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
    of Customers </font></strong></font></div></td>
    <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Percent</font></strong></font></div></td>
    <?
   


		while($row = mysql_fetch_array($result))
	
	{
		$CountryID = $row['CountryID'];
		$Num = $row['Count'];
	
		
							$sql3 = "SELECT * FROM tblShipLocation WHERE LocationID = '$CountryID'";
							$result3 = mysql_query($sql3) or die("Cannot retrieve ReferredByID info, please try again.");
							
							while($row3 = mysql_fetch_array($result3))
							
							{
							$Country = $row3['Name'];
							}
	
		$Percent = ($Num / $Total) * 100;
	
	?>
  <tr>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Country; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Num; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($Percent,1); ?>%</font></div></td>
  </tr>
  <?
	
	
			  	}
				
				//close connection to database
mysql_close($link);
			
			  ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>

  
  
  <?
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