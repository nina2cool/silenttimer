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
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>#
of People with First Name</strong></font>
<?

	$sql = "SELECT Count(FirstName) as Count, FirstName FROM tblCustomer GROUP BY FirstName ORDER BY Count DESC, FirstName ASC";
	$result = mysql_query($sql) or die("Cannot retrieve customer info, please try again.");


?>
<br>
  <table width="294" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
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
      <td width="130" class=sort> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Name</strong></font></div></td>
      <td width="130" class=sort> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>#
              of People</strong></font></div></td>
      <?
   


		while($row = mysql_fetch_array($result))
	
	{
		$FirstName = $row['FirstName'];
		$Num = $row['Count'];
	

	?>
    <tr> 
      <td width="130"> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font></strong></div></td>
      <td width="130"> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Num; ?></font></strong></div></td>
    </tr>
    <?
	}
	
			  ?>
  </table>
  <p>&nbsp;</p>

  
  
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);
// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";
// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";



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