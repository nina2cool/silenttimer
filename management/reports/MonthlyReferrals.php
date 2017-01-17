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
      Referrals
<br>
</strong></font><br>
<?
	
	$sql = "SELECT DATE_FORMAT(OrderDateTime, '%Y') as Year FROM tblPurchase2 WHERE Status = 'active' GROUP BY Year ORDER BY Year ASC";
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
		
			$sql3 = "SELECT tblPurchase2.PurchaseID, tblCustomer.CustomerID, tblPurchase2.CustomerID, tblPurchase2.OrderDateTime,
			tblPurchase2.Status, count(tblPurchase2.ReferredByID) as Count, tblPurchase2.ReferredByID
			FROM tblCustomer
			INNER JOIN tblPurchase2
			ON tblCustomer.CustomerID = tblPurchase2.CustomerID
			WHERE tblPurchase2.Status = 'active' AND tblPurchase2.OrderDateTime > '$py-$pm-31 23:59:59' AND tblPurchase2.OrderDateTime < '$ny-$nm-01 00:00:00'
			GROUP BY tblPurchase2.ReferredByID
			ORDER BY ReferredBYID ASC";
		
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
			$Count = $row3[Count];
			$ReferredByID = $row3[ReferredByID];

			
						
			?>
				   
			      <div align="center"></div>
			      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ReferredByID; ?> (<? echo $Count; ?>)</font><br>
					  
			        <?
				}
			?>
            </div></td>
			<?
			  	}
			?>
	</tr>
</table>
		 <p><br>
		       
		      <?
	
	}
	

?>
           <br>
</p>
		 <table width="50%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
		 
		<?
		 
		 $sql2 = "SELECT * FROM tblReferredBy ORDER BY ReferredByID ASC";
		$result2 = mysql_query($sql2) or die("Cannot get product information");
						
						
		 ?>
		 
           <tr>
             <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Referred By ID </font></strong></div></td>
             <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Referral</font></strong></div></td>
           </tr>
           <tr>
		   <?
		   
		   while($row2 = mysql_fetch_array($result2))
						{
						$Referral = $row2[Name];
						$ReferredByID = $row2[ReferredByID];
						
		   
		   ?>
		   
             <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ReferredByID; ?></font></td>
             <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Referral; ?></font></td>
           </tr>
		   <?
		   }
		   ?>
         </table>
		 <p>&nbsp;               </p>
		 <p><br>
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
                  </p>
