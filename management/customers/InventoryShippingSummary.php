<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{


// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "SELECT Sum(Quantity) as Sum, ProductID, DetailID, Status, Shipped FROM tblPurchaseDetails2 
	WHERE Shipped = 'n' AND Status = 'active' GROUP BY ProductID";
	
	//echo $sql;

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblPurchaseDetails2.DetailID DESC";
		$sortBy ="tblPurchaseDetails2.DetailID";
		$sortDirection = "ASC";
	}
	

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?><title>Inventory Shipping Summary</title>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Inventory
Shipping Summary </strong></font></p>
<div align="center"></div>
<table width="50%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr bgcolor="#FFFFCC">
    <td><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></font></div></td>
    <td><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"># to Ship </font></strong></font></div></td>
  </tr>
  <tr>
  <?
  
  while($row = mysql_fetch_array($result))
  {
  $ProductID = $row[ProductID];
  $DetailID = $row[DetailID];
  $Quantity = $row[Sum];
  $Shipped = $row[Shipped];
  $Status = $row[Status];
  
  		
			$sql2 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
			$result2 = mysql_query($sql2) or die("Cannot get product info");
			
			while($row2 = mysql_fetch_array($result2))
			{
			$ProductNickname = $row2[Nickname];
			}
		
		
		
  
  ?>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ProductNickname; ?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Quantity; ?></font></td>
  </tr>
  
  <?
  }
  ?>
  
  
</table>
<p align="left"></p>
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);



// finishes security for page
}
else
{
?>

<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
