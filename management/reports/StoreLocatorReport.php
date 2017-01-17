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
?>

<?
	$Link = $_GET['link'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");



?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Report
for <? echo $Link; ?></strong></font>
<form>
  <?

	$sql = "SELECT Count(CustomerZipCode) as Count, CustomerZipCode, Link, DateTime FROM tblRebate WHERE Link = 'storelocator.php' GROUP BY CustomerZipCode ORDER BY CustomerZipCode, Count DESC";
	$result = mysql_query($sql) or die("Cannot retrieve storelocator info, please try again.");
	
	
	$sql3 = "SELECT * FROM tblRebate WHERE Link = 'storelocator.php'";
	$result3 = mysql_query($sql3) or die("Cannot get storelocator count");
	
	$Total = mysql_num_rows($result3);
	
	$sql4 = "SELECT * FROM tblRebate WHERE Link = 'rebate.php' OR Link = 'rebate-storelocator.php'";
	$result4 = mysql_query($sql4) or die("Cannot get rebate count");
	
	$Total2 = mysql_num_rows($result4);
	
	$sql2 = "SELECT Count(BusinessCustomerID) as Count2, BusinessCustomerID, Link, DateTime FROM tblRebate 
	WHERE Link = 'rebate.php' GROUP BY BusinessCustomerID ORDER BY Count2 DESC";
	$result2 = mysql_query($sql2) or die("Cannot retrieve rebate info, please try again.");
	
	
	
	if($Link == 'locations_state.php')
	{	

?>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr bgcolor="#FFFFCC">
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Store</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Count</font></strong></div></td>
    </tr>
    <tr>
	<?	
		$sql = "SELECT Count(BusinessCustomerID) as Count, BusinessCustomerID, Link, RebateID FROM tblRebate WHERE Link = 'locations_state.php' GROUP BY BusinessCustomerID ORDER BY Count DESC";
		//echo $sql;
		$result = mysql_query($sql) or die("Cannot get locations_state");
		
		while($row = mysql_fetch_array($result))
		{
		$BusinessCustomerID = $row[BusinessCustomerID];
		$Count = $row[Count];
		
		
					$sql2 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
					$result2 = mysql_query($sql2) or die("Cannot get locations_state 2");
					
					while($row2 = mysql_fetch_array($result2))
					{
					$Chain = $row2[Chain];
					$Store = $row2[Name];
					}
		
	
	
	?>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
	  <?	
	  if($Chain <> '')
	  {
	  ?>
	  <?php echo $Chain; ?> - 
	  <?
	  }
	  ?>
	  <?php echo $Store; ?> (<?php echo $BusinessCustomerID; ?>) </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Count; ?></font></td>
    </tr>
	<?
	}
	?>
	
	
  </table>
  
  
  <?
  }
  
  
 	if($Link == 'storelocator-rebate.php')
	{	

?>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr bgcolor="#FFFFCC">
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Store</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Count</font></strong></div></td>
    </tr>
    <tr>
	<?	
		$sql = "SELECT Count(BusinessCustomerID) as Count, BusinessCustomerID, Link, RebateID FROM tblRebate WHERE Link = 'storelocator-rebate.php' GROUP BY BusinessCustomerID ORDER BY Count DESC";
		//echo $sql;
		$result = mysql_query($sql) or die("Cannot get storelocator-rebate.php");
		
		while($row = mysql_fetch_array($result))
		{
		$BusinessCustomerID = $row[BusinessCustomerID];
		$ZipCode = $row[CustomerZipCode];
		$Count = $row[Count];
		
		
					$sql2 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
					$result2 = mysql_query($sql2) or die("Cannot get storelocator-rebate.php 2");
					
					while($row2 = mysql_fetch_array($result2))
					{
					$Chain = $row2[Chain];
					$Store = $row2[Name];
					}

	?>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
	  <?	
	  if($Chain <> '')
	  {
	  ?>
	  <?php echo $Chain; ?> - 
	  <?
	  }
	  ?>
	  <?php echo $Store; ?> (<?php echo $BusinessCustomerID; ?>) </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Count; ?></font></td>
    </tr>
	<?
	}
	?>
	
  </table>
   
  <?
  } 
  

 	if($Link == "storelocator-search.php" AND $CustomerZipCode == '')
	{	

?>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr bgcolor="#FFFFCC">
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Store</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Count</font></strong></div></td>
    </tr>
    <tr>
	<?	
		$sql = "SELECT Count(BusinessCustomerID) as Count, BusinessCustomerID, Link, RebateID FROM tblRebate WHERE Link = 'storelocator-search.php' AND CustomerZipCode = '' GROUP BY BusinessCustomerID ORDER BY Count DESC";
		//echo $sql;
		$result = mysql_query($sql) or die("Cannot get storelocator-search.php and business customerID");
		
		while($row = mysql_fetch_array($result))
		{
		$BusinessCustomerID = $row[BusinessCustomerID];
		$ZipCode = $row[CustomerZipCode];
		$Count = $row[Count];
		
		
					$sql2 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
					$result2 = mysql_query($sql2) or die("Cannot get storelocator-search.php and business customerID 2");
					
					while($row2 = mysql_fetch_array($result2))
					{
					$Chain = $row2[Chain];
					$Store = $row2[Name];
					}

	?>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
	  <?	
	  if($Chain <> '')
	  {
	  ?>
	  <?php echo $Chain; ?> - 
	  <?
	  }
	  ?>
	  <?php echo $Store; ?> (<?php echo $BusinessCustomerID; ?>) </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Count; ?></font></td>
    </tr>
	<?
	}
	?>
	
  </table>
   <br>
   <br>
  <?
  }

	if($Link == 'storelocator-search.php' AND $BusinessCustomer == '')
	{	

?>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr bgcolor="#FFFFCC">
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Radius</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Count</font></strong></div></td>
    </tr>
    <tr>
	<?	
		$sql = "SELECT Count(Radius) as Count, CustomerZipCode, Radius, BusinessCustomerID, Link, RebateID FROM tblRebate WHERE Link = 'storelocator-search.php' AND BusinessCustomerID = '' GROUP BY Radius ORDER BY Count DESC";
		//echo $sql;
		$result = mysql_query($sql) or die("Cannot get storelocator-search.php and rebate");
		
		while($row = mysql_fetch_array($result))
		{
		$BusinessCustomerID = $row[BusinessCustomerID];
		$ZipCode = $row[CustomerZipCode];
		$Count = $row[Count];
		$Radius = $row[Radius];
		
		

	?>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Radius; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Count; ?></font></td>
    </tr>
	<?
	}
	?>

  </table>
   	<br>
	<br>
  <?
  }



 	if($Link == 'storelocator-search.php' AND $BusinessCustomer == '')
	{	

?>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr bgcolor="#FFFFCC">
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Zip
              Code </font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Count</font></strong></div></td>
    </tr>
    <tr>
	<?	
		$sql = "SELECT Count(CustomerZipCode) as Count, CustomerZipCode, Radius, BusinessCustomerID, Link, RebateID FROM tblRebate WHERE Link = 'storelocator-search.php' AND BusinessCustomerID = '' GROUP BY CustomerZipCode ORDER BY Count DESC";
		//echo $sql;
		$result = mysql_query($sql) or die("Cannot get storelocator-search.php and zip code");
		
		while($row = mysql_fetch_array($result))
		{
		$BusinessCustomerID = $row[BusinessCustomerID];
		$ZipCode = $row[CustomerZipCode];
		$Count = $row[Count];
		$Radius = $row[Radius];
		
		

	?>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ZipCode; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Count; ?></font></td>
    </tr>
	<?
	}
	?>
	
  </table>
   
  <?
  }


 	if($Link == 'storelocator.php')
	{	

?>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr bgcolor="#FFFFCC">
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Zip
              Code </font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Count</font></strong></div></td>
    </tr>
    <tr>
	<?	
		$sql = "SELECT Count(CustomerZipCode) as Count, CustomerZipCode, Radius, BusinessCustomerID, Link, RebateID FROM tblRebate WHERE Link = 'storelocator.php' GROUP BY CustomerZipCode ORDER BY Count DESC";
		//echo $sql;
		$result = mysql_query($sql) or die("Cannot get storelocator.php");
		
		while($row = mysql_fetch_array($result))
		{
		$BusinessCustomerID = $row[BusinessCustomerID];
		$ZipCode = $row[CustomerZipCode];
		$Count = $row[Count];
		$Radius = $row[Radius];
		
		

	?>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ZipCode; ?></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Count; ?></font></td>
    </tr>
	<?
	}
	?>
	
  </table>
   
  <?
  }

	if($Link == 'instore2.php')
	{
?>

<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr bgcolor="#FFFFCC">
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Store</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Count</font></strong></div></td>
    </tr>
    <tr>
	<?	
		$sql = "SELECT Count(BusinessCustomerID) as Count, BusinessCustomerID, Link, RebateID FROM tblRebate WHERE Link = 'instore2.php' GROUP BY BusinessCustomerID ORDER BY Count DESC";
		//echo $sql;
		$result = mysql_query($sql) or die("Cannot get locations_state");
		
		while($row = mysql_fetch_array($result))
		{
		$BusinessCustomerID = $row[BusinessCustomerID];
		$Count = $row[Count];
		
		
					$sql2 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
					$result2 = mysql_query($sql2) or die("Cannot get locations_state 2");
					
					while($row2 = mysql_fetch_array($result2))
					{
					$Chain = $row2[Chain];
					$Store = $row2[Name];
					}
		
	
	
	?>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
	  <?	
	  if($Chain <> '')
	  {
	  ?>
	  <?php echo $Chain; ?> - 
	  <?
	  }
	  ?>
	  <?php echo $Store; ?> (<?php echo $BusinessCustomerID; ?>) </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Count; ?></font></td>
    </tr>
	<?
	}
	?>
	
	
  </table>
  
  
  <?
  }
  
  if($Link == 'Rebate')
	{
?>

<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr bgcolor="#FFFFCC">
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Store</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"># of Rebates</font></strong></div></td>
    </tr>
    <tr>
	<?	
		$sql77 = "SELECT Count(BusinessCustomerID) as Count, BusinessCustomerID, Link, RebateID FROM tblRebate WHERE Link = 'Rebate' GROUP BY BusinessCustomerID ORDER BY Count DESC";
		//echo $sql;
		$result77 = mysql_query($sql77) or die("Cannot get locations_state");
		
		while($row77 = mysql_fetch_array($result77))
		{
		$BusinessCustomerID = $row77[BusinessCustomerID];
		$Count = $row77[Count];
		
		
					$sql88 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
					$result88 = mysql_query($sql88) or die("Cannot get locations_state 2");
					
					while($row88 = mysql_fetch_array($result88))
					{
					$Chain = $row88[Chain];
					$Store = $row88[Name];
					}
		
	
	
	?>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
	  <?	
	  if($Chain <> '')
	  {
	  ?>
	  <?php echo $Chain; ?> - 
	  <?
	  }
	  ?>
	  <?php echo $Store; ?> (<?php echo $BusinessCustomerID; ?>) </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Count; ?></font></td>
    </tr>
	<?
	}
	?>
	
	
  </table>
  
  
  <?
  }
  ?>
  
  <p>&nbsp;</p>
</form>
  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.

require "../include/footerlinks.php";

}

// finishes security for page
?>
