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
	
	$now = date("Y-m-d");
	

	$sql = "SELECT PromotionID, count(PromotionID) as Count, EndDate FROM tblPromotionCode WHERE EndDate >= '$now' GROUP BY PromotionID";

	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblPromotionCode.PromotionID ASC";
		$sortBy ="tblPromotionCode.PromotionID";
		$sortDirection = "ASC";
	}
		


	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

	//echo $sql;
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View
      Promotion Codes </strong></font></p>
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
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Promotion
              Type</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"># of Active
          Promos </font></strong></div></td>
  </tr>
  <?

		while($row = mysql_fetch_array($result))
		{
			$Count = $row[Count];
			$PromotionID = $row[PromotionID];
			
			
	?>
  <tr>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="PromoView.php?type=<? echo $PromotionID; ?>"><?php echo $PromotionID; ?></a></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Count; ?></font></div></td>
    <?
  
  }
  ?>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><b>&gt; <a href="PromoAdd.php">Add
        a Promo Code </a></b></font></p>
<p><b><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="PromoView.php">View
All Active Promo Codes </a> </font></b></p>
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
