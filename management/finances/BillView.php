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


	//connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];
	
	$Now = date("Y-m-d");
	
	$TodayMonth = date("m");
	$TodayDay = date("d");
	$TodayYear = date("Y");
	
	//echo "<br>Today's Month = " .$TodayMonth;
	//echo "<br>Today's Day " .$TodayDay;
	//echo "<br>Today's Year = " .$TodayYear;
	
	//$NextMonth = mktime(0, 0, 0, date("m")-1, date("d"),  date("Y"));
	
	if($TodayMonth == 12)
	{
	$NextMonth = 1;
	$NextYear = $TodayYear + 1;
	}
	else
	{
	$NextMonth = $TodayMonth + 1;
	$NextYear = $TodayYear;
	}

	//echo "<br>NextMonth = " .$NextMonth;
	

	$NextMonth2 = "$NextYear-$NextMonth-$TodayDay";
	
	#get paid bills within past week
	#need to get proper day and month and year
	
	$PaidDay = $TodayDay - 7;
	$PaidMonth = $TodayMonth;
	$PaidYear = $TodayYear;
	
	if($TodayMonth == '05' OR $TodayMonth == '07' OR $TodayMonth == '10' OR $TodayMonth == '12')
		{
				if($PaidDay < 1)
				{
				$PaidDay = 30 + $PaidDay;
				$PaidMonth = $TodayMonth - 1;
				}
		}
	elseif($TodayMonth == "03")
		{
				if($PaidDay < 1)
				{
				$PaidDay = 28 + $PaidDay;
				$PaidMonth = $TodayMonth - 1;
				}
		}
	elseif($TodayMonth == "01")
		{
				if($PaidDay < 1)
				{
				$PaidMonth == "12";
				$PaidYear == $TodayYear - 1;
				}
		}

	elseif($TodayMonth == '02' OR $TodayMonth == '04' OR $TodayMonth == '06' OR $TodayMonth == '09' OR $TodayMonth == '11')
		{
				if($PaidDay < 1)
				{
				$PaidDay = 31 + $PaidDay;
				$PaidMonth = $TodayMonth - 1;
				}
		}
		
	else{
	
	$PaidDay = $TodayDay - 7;
	$PaidMonth = $TodayMonth;
	$PaidYear = $TodayYear;
	}
		
		
	$PaidDate = "$PaidYear-$PaidMonth-$PaidDay";



	$SoonDay = $TodayDay + 7;
	$SoonMonth = $TodayMonth;
	$SoonYear = $TodayYear;
	
	if($TodayMonth == '05' OR $TodayMonth == '07' OR $TodayMonth == '10' OR $TodayMonth == '12')
		{
				if($SoonDay < 1)
				{
				$SoonDay = 30 + $SoonDay;
				$SoonMonth = $TodayMonth - 1;
				}
		}
	elseif($TodayMonth == "03")
		{
				if($SoonDay < 1)
				{
				$SoonDay = 28 + $SoonDay;
				$SoonMonth = $TodayMonth - 1;
				}
		}
	elseif($TodayMonth == "01")
		{
				if($SoonDay < 1)
				{
				$SoonMonth == "12";
				$SoonYear == $TodayYear - 1;
				}
		}

	elseif($TodayMonth == '02' OR $TodayMonth == '04' OR $TodayMonth == '06' OR $TodayMonth == '09' OR $TodayMonth == '11')
		{
				if($SoonDay < 1)
				{
				$SoonDay = 31 + $SoonDay;
				$SoonMonth = $TodayMonth - 1;
				}
		}
		
	else{
	
	$SoonDay = $TodayDay - 7;
	$SoonMonth = $TodayMonth;
	$SoonYear = $TodayYear;
	}
		
		
	$SoonDate = "$SoonYear-$SoonMonth-$SoonDay";



		
	
	//echo $PaidDate;
	
	#Find out if due date is within five days of today
	
	/*
	if($TodayMonth == '01' OR $Month == '03' OR $Month == '05' OR $Month == '07' OR $Month == '08' OR $Month == '10' OR $Month == '12')
	{
	$FiveDay = $TodayDay + 5;
	
			if($FiveDay > 31)
			{
			$FiveDay2 = $FiveDay - 31;
			$NextMonth2 = $TodayMonth + 1;
					if($TodayMonth = 12)
					{
					$NextMonth2 = 1;
					}
			}
	
	$if($TodayDay > 30 AND $TodayMonth <> 2 AND $TodayMonth <> 12)
	{
	$NextDay = $TodayDay - 30 + 5;
	$NextYear2 = $TodayYear;
	}
	elseif($TodayMonth == 12 AND $TodayDay = 31)
	{
	$NextDay = 5;
	$NextYear2 = $TodayYear + 1;
	}
	elseif($TodayMonth == 2 AND $TodayDay 
	*/
	
	//echo "<br>Next Month's Date " .$NextMonth2;
	
	/*
			if($TodayMonth == '01' OR $Month == '03' OR $Month == '05' OR $Month == '07' OR $Month == '08' OR $Month == '10' OR $Month == '12')
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
	
	*/
		
	$sql = "SELECT * FROM tblBills WHERE Status = 'open' AND DueDate <= '$NextMonth2' OR Status = 'paid' AND DueDate >= '$PaidDate' AND DueDate <= '$NextMonth2' OR Status = 'auto' AND DueDate >= '$PaidDate' AND DueDate <= '$NextMonth2'";

	//sort results.....
	if ($sortBy == "")
	{
		$sql .= " ORDER BY DueDate ASC";
	}
	
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	//echo $sql;
	$result = mysql_query($sql) or die("Cannot get results from tblBills!");
?>

  <title>Bills</title>
    <p align="left"><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">&gt;
          Current Bills (for next month) </font></strong></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; <a href="BillAdd.php">Add
    a new bill</a></strong></font></p>
	
    <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; <a href="CompanyView.php">Edit/Add/View
    Companies</a></strong></font></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; <a href="BillView_All.php">View
            All  Bills </a></strong></font><br>
    </p>
    <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <?
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
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="BillView.php?sort=tblBills.DueDate&d=<? if ($sortBy=="tblBills.DueDate") {echo $sd;} else {echo "ASC";}?>">Due
                  Date </a></strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Company</strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="BillView.php?sort=tblBills.Amount&d=<? if ($sortBy=="tblBills.Amount") {echo $sd;} else {echo "ASC";}?>">Amount</a></strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Category</strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="BillView.php?sort=tblBills.Status&d=<? if ($sortBy=="tblBills.Status") {echo $sd;} else {echo "ASC";}?>">Status</a></strong></font></div></td>
      </tr>
      <tr>
        <?
		
		while($row = mysql_fetch_array($result))
				{
					$BillID = $row[BillID];
					$CompID = $row[Company];
					$Amount = $row[Amount];
					$DueDate = $row[DueDate];
					$Status = $row[Status];
					
						$sql3 = "SELECT * FROM tblBillCompany WHERE CompanyID = '$CompID'";
						$result3 = mysql_query($sql3) or die("Cannot get company name!");
						
						while($row3 = mysql_fetch_array($result3))
						{
							$Company = $row3[Name];
							$CategoryID = $row3[Category];
							$Person = $row3[Person];
							$URL = $row3[URL];
						}
					
					
					$sql2 = "SELECT * FROM tblBillCategory WHERE CategoryID = '$CategoryID'";
					$result2 = mysql_query($sql2) or die("Cannot get category name");
					while($row2 = mysql_fetch_array($result2))
					{
						$Category = $row2[Name];
					}
					
		
		?>
    <tr class="info" <? if($Status =='open' AND $DueDate >= $Now AND $DueDate <= $SoonDate){echo "bgcolor='#FFFF00'";}elseif($Status == 'open' AND $DueDate <= $Now){echo "bgcolor='#FF0000'";}elseif($Status == 'auto' OR $Status == 'paid'){echo "bgcolor='#CCF2CC'";}else{?>bgcolor='#FFFFFF'<? }?>>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="BillEdit.php?bill=<? echo $BillID;?>">E</a></font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DueDate;?></font></div></td>
        <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CompanyEdit.php?c=<? echo $CompID;?>"><? echo $Company;?></a> <? if ($URL <> ""){?><a href="<? echo $URL; ?>" target="_blank"><font size="1">login</font></a><? } ?></font></div></td>
        <td><div align="right">
		
		
		<? if($Amount == 0) { ?>
		<font size="2" color="FF0000" face="Arial, Helvetica, sans-serif">$<? echo number_format($Amount,2);?></font>
		<? } else { ?>
		<font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Amount,2);?></font>
		<? } ?>
		
		
		</div></td>
        <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Category;?></font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Status;?></font></div></td>
      </tr>
      <?
		
		}
		
		?>
    </table>
    <p></p>
    <p></p>
    <p></p>
    <p></p>

  
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