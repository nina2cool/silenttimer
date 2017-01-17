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

	$DateButton = $_POST['DateButton'];
	$DateRange = $_POST['DateRange'];
	$Day = $_POST['Day'];
	
	$Date = $_POST['Date'];
	
	$StartDate = $_POST['StartDate'];
	$EndDate = $_POST['EndDate'];
	
	$StateCheck = $_POST['StateCheck'];
	$State = $_POST['State'];
	
	$Year = $_POST['YearBox'];
	$Month = $_POST['MonthBox'];
	

	
	
	if($DateButton == 'y')
	{
	$FromDate = "$Year-$Month-01";
		
			if($Month == '01' OR $Month == '03' OR $Month == '05' OR $Month == '07' OR $Month == '08' OR $Month == '10' OR $Month == '12')
			{
				$ToDate2 = "$Year-$Month-31";
					if($Month <> '12')
					{
						$Month2 = $Month + 1;
						$ToDate = "$Year-$Month2-01";
					}
					elseif($Month == '12')
					{
					$Month2 = "01";
					$Year2 = $Year + 1;
					$ToDate = "$Year2-$Month2-01";
					}
			}
			elseif($Month == '04' OR $Month == '06' OR $Month == '09' OR $Month == '11')
			{
				$Month2 = $Month + 1;
				$ToDate = "$Year-$Month2-01";
			}

			elseif($Month == '02')
			{
				$Month2 = $Month + 1;
				$ToDate = "$Year-$Month2-01";
				
			}
			else
			{
				echo "invalid month";
			}
			
			
		if($Month == "01"){$MonthName = "January";}
		if($Month == "02"){$MonthName = "February";}
		if($Month == "03"){$MonthName = "March";}
		if($Month == "04"){$MonthName = "April";}
		if($Month == "05"){$MonthName = "May";}
		if($Month == "06"){$MonthName = "June";}
		if($Month == "07"){$MonthName = "July";}
		if($Month == "08"){$MonthName = "August";}
		if($Month == "09"){$MonthName = "September";}
		if($Month == "10"){$MonthName = "October";}
		if($Month == "11"){$MonthName = "November";}
		if($Month == "12"){$MonthName = "December";}
		
		}
		elseif($DateRange == "y")
		{
		
			$FromDate = $StartDate;
			$ToDate = $EndDate;
		
		}

		?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Monthly
Sales Report for  <u><?php echo $MonthName; ?></u></strong></font> <u><font color="#003399"
 size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $Year; ?></strong></font></u>
<form>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr bgcolor="#FFFFCC">
      <td><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Customer
              Type</font></strong></font></div></td>
      <td><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Number Sold</font></strong></font></div></td>
      <td><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Products
              &amp; Qty</font></strong></font></div></td>
    </tr>
<?
		
		$sql = "SELECT * FROM tblCustomerType WHERE Status = 'active'";
		$result = mysql_query($sql) or die("Cannot get customer types");
		
		while($row = mysql_fetch_array($result))
		{
		$TypeID = $row[TypeID];
		$Type = $row[Type];
		
		//echo "<br>StartDate =" .$FromDate;
		//echo "<br>EndDate =" .$ToDate;
		
				$sql2 = "SELECT tblPurchase2.PurchaseID, Sum(tblPurchaseDetails2.Quantity) as Sum, tblPurchaseDetails2.ProductID,
				tblProduct.Nickname, tblCustomer.Type
				FROM tblPurchase2
				INNER JOIN tblCustomer ON tblPurchase2.CustomerID = tblCustomer.CustomerID
				INNER JOIN tblPurchaseDetails2 ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
				INNER JOIN tblProduct ON tblPurchaseDetails2.ProductID = tblProduct.ProductID
				WHERE OrderDateTime > '$FromDate' AND OrderDateTime < '$ToDate' AND tblPurchase2.Status = 'active' AND Type = '$TypeID'";
				
				$result2 = mysql_query($sql2) or die("Cannot get sales info");
				
				while($row2 = mysql_fetch_array($result2))
				{
				$NumberSold = $row2[Sum];
				$ProductID = $row2[ProductID];
				$Nickname = $row2[Nickname];
				$Type = $row2[Type];



?>	
	    <tr>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Type; ?></font></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $NumberSold; ?></font></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
	  	
		
	  
	  
	  
	  <?php echo $Nickname; ?></font> (<font size="2" face="Arial, Helvetica, sans-serif"><?php echo $NumProductSold; ?>)
	  
	  
	  </font></td>
    </tr>
	
	<?
	}
	}
	?>
	
  </table>
  <br>
 <p>&nbsp;</p>
</form>
  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.

require "../include/footerlinks.php";

}

// finishes security for page
?>
