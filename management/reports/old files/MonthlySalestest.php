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
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Monthly
Sales<br>
</strong></font><br>
<?
	
	$sql = "SELECT DATE_FORMAT(OrderDateTime, '%Y') as Year FROM tblPurchase6 WHERE Status = 'active' GROUP BY Year ORDER BY Year ASC";
	//echo $sql;
	$result = mysql_query($sql) or die("Cannot get year");
	
	while($row = mysql_fetch_array($result))
	{
	
	$Year = $row[Year];
	
			?>
</p>
<table width="100%"  border="1" cellpadding="2" cellspacing="0" bordercolor="#CCCCCC">
		<tr>
		
		<?
		for($i=1; $i<= 12; $i++)
		{
			
			$pm = $i - 1;
			$nm = $i + 1;
			$py = $Year;
			$ny = $Year;
			
			if($i == 1)
			{
			$pm = 12;
			$py = $Year - 1;
			}
			
			if($i == 12)
			{
			$nm = 1;
			$ny = $Year + 1;
			}
		
			$sql3 = "SELECT tblPurchase6.PurchaseID, tblCustomer.CustomerID, tblPurchase6.CustomerID, tblPurchase6.OrderDateTime, tblPurchaseDetails3.PurchaseID,
			tblPurchaseDetails3.ProductID, Sum(tblPurchaseDetails3.Quantity) as Quantity, tblPurchase6.Status, tblPurchaseDetails3.Status
			FROM tblCustomer
			INNER JOIN tblPurchase6
			ON tblCustomer.CustomerID = tblPurchase6.CustomerID
			INNER JOIN tblPurchaseDetails3
			ON tblPurchase6.PurchaseID = tblPurchaseDetails3.PurchaseID
			WHERE tblPurchase6.Status = 'active' AND tblPurchase6.OrderDateTime > '$py-$pm-31 23:59:59' AND tblPurchase6.OrderDateTime < '$ny-$nm-01 00:00:00'
			GROUP BY tblPurchaseDetails3.ProductID";
		
			$result3 = mysql_query($sql3) or die("Cannot retrieve purchase info, please try again.");
			
			?>		  
		  
	  	  <td align="left" valign="top">
		  
			<p align="center">
			    <strong><font size="2" face="Arial, Helvetica, sans-serif">
			    <u>
			    <?= $i;?>/<?= $Year;?></u>                </font> </strong></p>		        
			  
		   <?
			while($row3 = mysql_fetch_array($result3))
			{
			$Quantity = $row3[Quantity];
			$ProductID = $row3[ProductID];

			
						$sql2 = "SELECT * FROM tblProduct WHERE ProductID = '$ProductID'";
						$result2 = mysql_query($sql2) or die("Cannot get product information");
						
						while($row2 = mysql_fetch_array($result2))
						{
						$Nickname = $row2[Nickname];
						$Color = $row2[Color];
						}
			?>
				   
			      <div align="center"></div>
			      <div align="center"><strong><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><? echo $Quantity; ?></font></strong><br>
					  
			        <?
				}
			?>
     	            </div></td>
			<?
			  	}
			?>
	</tr>
</table>
		 <br>
		     
		      <?
	
	}
	

?>
<br>
		  
		  
		  <table width="45%"  border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td><div align="left"><font size="2"><strong><font face="Arial, Helvetica, sans-serif"><u>Color Chart</u> </font></strong></font></div></td>

  </tr>
  <tr>
     
     <?
  $sql4 = "SELECT * FROM tblProduct WHERE Color <> ''";
  $result4 = mysql_query($sql4) or die("Cannot get colors");
  
  while($row4 = mysql_fetch_array($result4))
  {
  $Color = $row4[Color];
  $Nickname = $row4[Nickname];
  ?>
  
   
    <td><div align="left"><font size="2"><strong><font color="<? echo $Color; ?>" face="Arial, Helvetica, sans-serif"><? echo $Nickname; ?></font></strong></font></div></td>
	

  
  
  </tr>
  	<?
	}
	?>

</table>
		  
		  

       
          <br>
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
?>
</p>
