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

	$Type = $_GET['type'];
		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$now = date("Y-m-d");
	
	if($Type == "")
	{  $sql = "SELECT * FROM tblPromotionCode WHERE EndDate >= '$now'";  }
	else
	{ $sql = "SELECT * FROM tblPromotionCode WHERE EndDate >= '$now' AND PromotionID = '$Type'"; }

	

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblPromotionCode.StartDate ASC";
		$sortBy ="tblPromotionCode.StartDate";
		$sortDirection = "ASC";
	}
		


	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>View
      Active Promotion Codes </strong></font></p>
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
    <td><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="PromoView.php?sort=tblPromotionCode.PromotionCodeID&d=<? if ($sortBy=="tblPromotionCode.PromotionCodeID") {echo $sd;} else {echo "ASC";}?>">Promo
            Code</a> </font></strong></div></td>
    <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="PromoView.php?sort=tblPromotionCode.StartDate&d=<? if ($sortBy=="tblPromotionCode.StartDate") {echo $sd;} else {echo "ASC";}?>">Start
          Date</a>      - <a href="PromoView.php?sort=tblPromotionCode.EndDate&d=<? if ($sortBy=="tblPromotionCode.EndDate") {echo $sd;} else {echo "ASC";}?>">End
          Date</a></font></strong></td>
    <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="PromoView.php?sort=tblPromotionCode.PromotionID&d=<? if ($sortBy=="tblPromotionCode.PromotionID") {echo $sd;} else {echo "ASC";}?>">Type</a> / <a href="PromoView.php?sort=tblPromotionCode.Amount&d=<? if ($sortBy=="tblPromotionCode.Amount") {echo $sd;} else {echo "ASC";}?>">Amount</a> </font></strong></td>
    <td><div align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="PromoView.php?sort=tblPromotionCode.PromotionCodeID&d=<? if ($sortBy=="tblPromotionCode.PromotionCodeID") {echo $sd;} else {echo "ASC";}?>">Date
              Created</a></font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Edit</font></strong></div></td>
  </tr>
  <?

		while($row = mysql_fetch_array($result))
		{
			$PromotionCodeID = $row[PromotionCodeID];
			$PromotionID = $row[PromotionID];
			$StartDate = $row[StartDate];
			$EndDate = $row[EndDate];
			$AffiliateID = $row[AffiliateID];
			$Amount = $row[Amount];
			$DateCreated = $row[DateCreated];
			$BusinessCustomerID = $row[BusinessCustomerID];
			$Status = $row[Status];
			
			$Amount = number_format($Amount,2);
			
			$Percent = $Amount * 100;
			
			if($DateCreated == "0000-00-00") { $DateCreated = "-"; }
			
	?>
  <tr <? if($Status ==  'cancel') { ?>bgcolor="#999966"<? } ?>>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $PromotionCodeID; ?><? if($PromotionID == "rebate") { ?> - <a href="../businesscustomer/BusCustEdit.php?bc=<? echo $BusinessCustomerID; ?>" target="_blank"><? echo $BusinessCustomerID; ?></a><? } ?></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $StartDate; ?> to <?php echo $EndDate; ?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $PromotionID; ?><? if($PromotionID == "affiliate") { ?> (<? echo $AffiliateID; ?>)<? } ?> / <? if($Amount < 1) { ?><?php echo number_format($Percent,0); ?> %<? } else { ?>$ <? echo $Amount; ?><? } ?></font></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? if($DateCreated <> "") { ?><?php echo $DateCreated; ?><? } else { ?>-<? } ?></font></div></td>
    <td><div align="center"><a href="PromoEdit.php?promo=<? echo $PromotionCodeID; ?>"><font size="2" face="Arial, Helvetica, sans-serif">Edit</font></a></div></td>
    <?
  
  }
  ?>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><b>&gt; <a href="PromoAdd.php">Add
        a Promo Code </a></b></font></p>
<p><b><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="PromoViewAll.php">View
All Promo Codes </a> </font></b></p>
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
