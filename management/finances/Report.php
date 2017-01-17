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

// has top menu for this page in it, you can change these links in this folders include folder.
require "../include/topmenu.php";

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

	$DateButton = $_POST['DateButton'];
	$DateRange = $_POST['DateRange'];
	$Day = $_POST['Day'];
	
	$Date = $_POST['Date'];
	
	$StartDate = $_POST['StartDate'];
	$EndDate = $_POST['EndDate'];
	
	$CompanyCheck = $_POST['CompanyCheck'];
	$CompanyID = $_POST['Company'];
	
	$Year = $_POST['YearBox'];
	$Month = $_POST['MonthBox'];
	
	$radioDate = $_POST['radioDate'];
					
			
					
	
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
		

		
		if($StateCheck == 'y')
		{
		?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Bill Report for <u><?php echo $Name; ?></u></strong></font>
		<?
		}
		else
		{
				?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Bill Report for <u><?php echo $MonthName; ?></u></strong></font> <u><font color="#003399"
 size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $Year; ?></strong></font></u>
		<?
		}
	}
	elseif($DateRange == 'y')
	{
	
	$FromDate = $StartDate;
	$ToDate = $EndDate;
	
	

		
		if($CompanyCheck == 'y')
		{
		?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Bill
Report from <u><?php echo $StartDate; ?></u></strong></font> <strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">to</font></strong> <u><font color="#003399"
 size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $EndDate; ?> for <? echo $Name; ?></strong></font></u>
		<?		
		}
		else
		{
				
		?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Bill
Report from <u><?php echo $StartDate; ?></u></strong></font> <strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">to</font></strong> <u><font color="#003399"
 size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $EndDate; ?></strong></font></u>
		<?
		}
	}


	if($radioDate == "DueDate")
	{
			if($CompanyCheck == "y")
			{
			$sql = "SELECT tblBillCompany.CompanyID, tblBills.DateReceived, tblBills.Company, tblBills.Amount, tblBills.DueDate, tblBills.AmountPaid,
			tblBills.DatePaid, tblBills.Status, tblBills.BillID
			FROM tblBills
			INNER JOIN tblBillCompany
			ON tblBills.Company = tblBillCompany.CompanyID
			WHERE tblBills.DueDate >= '$FromDate' AND tblBills.DueDate < '$ToDate' AND tblBillCompany.CompanyID = '$CompanyID'";
				//echo $sql;
			}
			else
			{
			$sql = "SELECT tblBillCompany.CompanyID, tblBills.DateReceived, tblBills.Company, tblBills.Amount, tblBills.DueDate, tblBills.AmountPaid,
			tblBills.DatePaid, tblBills.Status, tblBills.BillID
			FROM tblBills
			INNER JOIN tblBillCompany
			ON tblBills.Company = tblBillCompany.CompanyID
			WHERE tblBills.DueDate >= '$FromDate' AND tblBills.DueDate < '$ToDate'";
			}
			
			
			//sort results.....
			if ($sortBy == "")
			{
				$sql .= " ORDER BY tblBills.DueDate ASC";
			}
			
	}
	elseif($radioDate == "DatePaid")
	{
			if($CompanyCheck == "y")
			{
			$sql = "SELECT tblBillCompany.CompanyID, tblBills.DateReceived, tblBills.Company, tblBills.Amount, tblBills.DueDate, tblBills.AmountPaid,
			tblBills.DatePaid, tblBills.Status, tblBills.BillID
			FROM tblBills
			INNER JOIN tblBillCompany
			ON tblBills.Company = tblBillCompany.CompanyID
			WHERE tblBills.DatePaid >= '$FromDate' AND tblBills.DatePaid < '$ToDate' AND tblBillCompany.CompanyID = '$CompanyID'";
			}
			else
			{
			$sql = "SELECT tblBillCompany.CompanyID, tblBills.DateReceived, tblBills.Company, tblBills.Amount, tblBills.DueDate, tblBills.AmountPaid,
			tblBills.DatePaid, tblBills.Status, tblBills.BillID
			FROM tblBills
			INNER JOIN tblBillCompany
			ON tblBills.Company = tblBillCompany.CompanyID
			WHERE tblBills.DatePaid >= '$FromDate' AND tblBills.DatePaid < '$ToDate'";
			}
			
			
			//sort results.....
			if ($sortBy == "")
			{
				$sql .= " ORDER BY tblBills.DatePaid ASC";
			}
			
			
	}
	else
	{
	
			if($CompanyCheck == "y")
			{
			$sql = "SELECT tblBillCompany.CompanyID, tblBills.DateReceived, tblBills.Company, tblBills.Amount, tblBills.DueDate, tblBills.AmountPaid,
			tblBills.DatePaid, tblBills.Status, tblBills.BillID
			FROM tblBills
			INNER JOIN tblBillCompany
			ON tblBills.Company = tblBillCompany.CompanyID
			WHERE tblBills.DueDate >= '$FromDate' AND tblBills.DueDate < '$ToDate' AND tblBillCompany.CompanyID = '$CompanyID'";
			}
			else
			{
			$sql = "SELECT tblBillCompany.CompanyID, tblBills.DateReceived, tblBills.Company, tblBills.Amount, tblBills.DueDate, tblBills.AmountPaid,
			tblBills.DatePaid, tblBills.Status, tblBills.BillID
			FROM tblBills
			INNER JOIN tblBillCompany
			ON tblBills.Company = tblBillCompany.CompanyID
			WHERE tblBills.DueDate >= '$FromDate' AND tblBills.DueDate < '$ToDate'";
			}
			
			//sort results.....
			if ($sortBy == "")
			{
				$sql .= " ORDER BY tblBills.DueDate ASC";
			}
			
	}	
	
	//echo $sql;
		
		
		
		
		$result = mysql_query($sql) or die("Cannot execute get monthly data!");
	


		
?>

<form>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
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
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Edit</strong></font></div></td>
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="Report.php?sort=tblBills.DueDate&d=<? if ($sortBy=="tblBills.DueDate") {echo $sd;} else {echo "ASC";}?>">Due
                Date </a></strong></font></div></td>
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Company</strong></font></div></td>
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="Report.php?sort=tblBills.Amount&d=<? if ($sortBy=="tblBills.Amount") {echo $sd;} else {echo "ASC";}?>">Amount</a></strong></font></div></td>
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Category</strong></font></div></td>
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="Report.php?sort=tblBills.Status&d=<? if ($sortBy=="tblBills.Status") {echo $sd;} else {echo "ASC";}?>">Status</a></strong></font></div></td>
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Date
              Paid </strong></font></div></td>
      <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Late?</strong></font></div></td>
    </tr>
    <tr>
      <?
		
		while($row = mysql_fetch_array($result))
				{
					$BillID = $row[BillID];
					$CompID = $row[Company];
					$Amount = $row[Amount];
					$DueDate = $row[DueDate];
					//$Cat = $row[Category];
					$Status = $row[Status];
					$DatePaid = $row[DatePaid];
					
					
					
						$sql3 = "SELECT * FROM tblBillCompany WHERE CompanyID = '$CompID'";
						$result3 = mysql_query($sql3) or die("Cannot get company name!");
						
						while($row3 = mysql_fetch_array($result3))
						{
							$Company = $row3[Name];
							$CategoryID = $row3[Category];
							$Person = $row3[Person];
						}
					
					if($Amount == "0")
					{ $Amount = "?"; }
				
				$Now = date("Y-m-d");
				
				if($DatePaid > $DueDate OR $DatePaid == "0000-00-00" AND $DueDate < $Now)
				{
				$Late = "yes";
				}
				else
				{
				$Late = "no";
				}
					
				
					$sql2 = "SELECT * FROM tblBillCategory WHERE CategoryID = '$CategoryID'";
					$result2 = mysql_query($sql2) or die("Cannot get category name");
					while($row2 = mysql_fetch_array($result2))
					{
						$Category = $row2[Name];
					}
		
		?>
    <tr class="info" <? if($Status =='open' AND $DueDate > $Now){echo "bgcolor='#FFFFFF'";}elseif($Status == 'open' AND $DueDate <= $Now){echo "bgcolor='#FF0000'";}elseif($Status == 'auto' OR $Status == 'paid'){echo "bgcolor='#CCF2CC'";}?>>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="billedit.php?bill=<? echo $BillID;?>" target="_blank">E</a></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DueDate;?></font></div></td>
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Company;?>
                <? if($Person <> ""){?>
                (<? echo $Person; ?>)
                <? } ?>
      </font></div></td>
      <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Amount,2);?></font></div></td>
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Category;?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Status;?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DatePaid;?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Late;?></font></div></td>
    </tr>
    <?
		
		}
		
		?>
  </table>
</form>
  
  
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// finishes security for page
}
else
{
	header("location: index.php"); //redirects user via PHP to this page... better than meta refresh...
}
?>