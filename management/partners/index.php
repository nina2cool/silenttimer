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

	$sql = "SELECT tblAffiliate.AffiliateID, tblAffiliate.FirstName, tblAffiliate.LastName,
			tblAffiliatePurchase.AffiliateID
			FROM tblAffiliate INNER JOIN tblAffiliatePurchase
			ON tblAffiliate.AffiliateID = tblAffiliatePurchase.AffiliateID
			WHERE tblAffiliate.Status = 'active' AND tblAffiliatePurchase.Status = 'open'
			GROUP BY tblAffiliatePurchase.AffiliateID";

	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}


	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View 
  Partner Sales</strong></font></p>
			
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
      <td width="9%" class=sort> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Details</font></strong></div></td>
      <td class=sort> <div align="center"><strong><a href="index.php?sort=tblAffiliatePurchase.AffiliateID&d=<? if ($sortBy=="tblAffiliatePurchase.AffiliateID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Affiliate 
      ID </font></a></strong></div></td>
      <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Contact
              Name </strong></font></div></td>
      <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Total
              Amount of Sales</strong></font></div></td>
      <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Total
              Amount of Commissions (returns not considered) </strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
					$AffID = $row['AffiliateID'];
					$FirstName = $row['FirstName'];
					$LastName = $row['LastName'];
				
				$sql2 = "SELECT Sum(TotalSale) AS TotalSale, Sum(Commission) AS Commission 
				FROM tblAffiliatePurchase WHERE AffiliateID = '$AffID' AND Status = 'open'";
				
				$result2 = mysql_query($sql2) or die("Cannot total amounts!");
				
				while($row2 = mysql_fetch_array($result2))
				{
					$TotalSale = $row2[TotalSale];
					$Commission = $row2[Commission];
				}
												
			  ?>
    <tr> 
      <td width="9%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CurrentSales.php?aff=<? echo $AffID; ?>">Details</a></font></div></td>
      <td width="12%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $AffID; ?></font></div></td>
      <td width="12%"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo "$FirstName $LastName"; ?></font></div></td>
      <td width="15%"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$ <? echo number_format($TotalSale,2); ?></font></div></td>
      <td width="12%"> <div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$ <? echo number_format($Commission,2); ?></font></div></td>
    </tr>
    <?
			  	}
				
				
				
			  ?>
  </table> 
		
            <p align="left">&nbsp;</p>
            

  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
				mysql_close($link);
// has links that show up at the bottom in it.
// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

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
