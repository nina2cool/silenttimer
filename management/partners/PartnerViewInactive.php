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

	$sql = "SELECT tblAffiliate.AffiliateID, tblAffiliate.FirstName, tblAffiliate.LastName, tblAffiliate.CompanyName, tblAffiliate.Status,
			tblAffiliatePurchase.AffiliateID, tblAffiliatePurchase.TotalSale, tblAffiliatePurchase.Commission
			FROM tblAffiliate INNER JOIN tblAffiliatePurchase
			ON tblAffiliate.AffiliateID = tblAffiliatePurchase.AffiliateID
			WHERE tblAffiliate.Status = 'inactive'";

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}


	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View
       Inactive Affiliates</strong></font></p>
			
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
      <td width="5%" class=sort> 
        <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Details</font></strong></div></td>
      <td width="5%" class=sort> 
        <div align="center"><strong><a href="../partners/PartnerInfoView.php?sort=tblAffiliate.AffiliateID&d=<? if ($sortBy=="tblAffiliate.AffiliateID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Affiliate 
          ID</font></a></strong></div></td>
      <td class=sort> 
        <div align="center"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="../partners/PartnerInfoView.php?sort=tblAffiliate.CompanyName&d=<? if ($sortBy=="tblAffiliate.CompanyName") {echo $sd;} else {echo "ASC";}?>">Company
          Name</a></font></strong></div></td>
      <td class=sort> 
        <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Contact 
          Name</font></strong></div></td>
      <td class=sort> 
        <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Total 
          Sales to Date</font></strong></div></td>
      <td class=sort> 
        <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Total 
          Commissions to Date</font></strong></div></td>
      <?
			  $sql3 = "SELECT * FROM tblAffiliate WHERE Status = 'inactive'";
			  $result3 = mysql_query($sql3) or die("Cannot total amounts!");
				
				
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row3 = mysql_fetch_array($result3))
				{
				$AffID = $row3['AffiliateID'];
				$FirstName = $row3['FirstName'];
				$LastName = $row3['LastName'];
				$CompanyName = $row3['CompanyName'];
				
				
				$sql2 = "SELECT Sum(TotalSale) as TotalSale, Sum(Commission) as Commission FROM tblAffiliatePurchase WHERE AffiliateID = '$AffID'";
				$result2 = mysql_query($sql2) or die("Cannot total amounts!");
				
				while($row2 = mysql_fetch_array($result2))
				{
					$TotalSale = $row2['TotalSale'];
					$Commission = $row2['Commission'];
				}
												
				
												
			  ?>
    <tr> 
      <td width="9%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../partners/PartnerInfoEdit.php?affiliate=<? echo $AffID; ?>"><strong>Details</strong></a></font></div></td>
      <td width="5%">
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $AffID; ?></font></div></td>
      <td width="12%"> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?></font></div></td>
      <td width="11%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo "$FirstName $LastName"; ?></font></td>
      <td width="15%"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($TotalSale,2); ?></font></td>
      <td width="15%"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Commission,2); ?></font></td>
    </tr>
    <?
			  	}
				
			  ?>
  </table> 
		
            
  <p align="left"><b><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="PartnerView.php">Active 
    Affiliates</a></font></b></p>
  <p align="left">&nbsp;</p>
            
  
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