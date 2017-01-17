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
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Schools</strong></font>
    <?

	$sql = "SELECT Count(School) as Count, School FROM tblCustomer WHERE Type = '1' OR Type = '2' GROUP BY School ORDER BY Count DESC, School";
	$result = mysql_query($sql) or die("Cannot retrieve customer info, please try again.");
	
	
	$sql3 = "SELECT * FROM tblCustomer WHERE Type = '1' OR Type = '2'";
	$result3 = mysql_query($sql3) or die("Cannot retrieve customer info2, please try again.");
	
	$Total = mysql_num_rows($result3);
	
	//echo "total = " .$Total;
	$sql4 = "SELECT * FROM tblCustomer WHERE School <> '' AND Type = '1' OR Type = '2' AND School <> ''";
	$result4 = mysql_query($sql4) or die("Cannot retrieve customer info3, please try again.");
	
	$Total2 = mysql_num_rows($result4);

?>
</p>
<p>&nbsp;</p>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
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
      <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>School</strong></font></div></td>
      <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>#
      of People</strong></font></div></td>
      <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Percent
      of Total</strong></font></div></td>
      <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Percent
      of Non-Zero Responses </strong></font></div></td>
      <?
   


		while($row = mysql_fetch_array($result))
	
	{
		$School = $row['School'];
		$Num = $row['Count'];
		
		if($School == "") { $School = '-'; }
		
	$Percent = ($Num / $Total) * 100;
	
	$Percent2 = ($Num / $Total2) * 100;
	
	?>
    <tr>
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $School; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Num; ?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($Percent,1); ?>%</font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($Percent2,1); ?>%</font></div></td>
    </tr>
    <?
			  	}
			
			  ?>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>
    <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.

require "../include/footerlinks.php";

// finishes security for page
}

?>
  </p>
