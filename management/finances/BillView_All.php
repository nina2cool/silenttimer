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


	$userName = $_SESSION['userName'];
	
	//connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];
	
	$Now = date("Y-m-d");
	
	$sql = "SELECT * FROM tblBills";
	
	//sort results.....
	if ($sortBy == "")
	{
		$sql .= " ORDER BY DueDate ASC";
	}
	
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	//put SQL statement into result set for loop through records
	//echo $sql;
	$result = mysql_query($sql) or die("Cannot get results from tblBills!");
?>

  <title>All Bills</title>
    <p align="left"><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">&gt;
          All Bills </font></strong></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; <a href="BillAdd.php">Add
    a new bill</a></strong></font></p>
	
    <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; <a href="CompanyView.php">Edit/Add/View
            Companies</a></strong></font></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; <a href="BillView.php">View
            Current Bills</a></strong></font><br>
    </p>
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
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="BillView_All.php?sort=tblBills.DueDate&d=<? if ($sortBy=="tblBills.DueDate") {echo $sd;} else {echo "ASC";}?>">Due
                  Date </a></strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Company</strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="BillView_All.php?sort=tblBills.Amount&d=<? if ($sortBy=="tblBills.Amount") {echo $sd;} else {echo "ASC";}?>">Amount</a></strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Category</strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="BillView_All.php?sort=tblBills.Status&d=<? if ($sortBy=="tblBills.Status") {echo $sd;} else {echo "ASC";}?>">Status</a></strong></font></div></td>
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
						}
					
					
					$sql2 = "SELECT * FROM tblBillCategory WHERE CategoryID = '$CategoryID'";
					$result2 = mysql_query($sql2) or die("Cannot get category name");
					while($row2 = mysql_fetch_array($result2))
					{
						$Category = $row2[Name];
					}
					
		
		?>
    <tr class="info" <? if($Status =='open' AND $DueDate > $Now){echo "bgcolor='#FFFFFF'";}elseif($Status == 'open' AND $DueDate <= $Now){echo "bgcolor='#FF0000'";}elseif($Status == 'auto' OR $Status == 'paid'){echo "bgcolor='#CCF2CC'";}?>>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="billedit.php?bill=<? echo $BillID;?>">E</a></font></div></td>
        <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DueDate;?></font></div></td>
        <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Company;?> <? if($Person <> ""){?>(<? echo $Person; ?>)<? } ?></font></div></td>
        <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Amount,2);?></font></div></td>
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