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
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	$userName = $_SESSION['userName'];
	
	//connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];
	

	if($_GET['Complete'] == "YES")
	{
		$theBill = $_GET['BillID'];
		
		$Now = date("Y-m-d");
		
		$sql5 = "UPDATE tblBills
				SET Status = 'complete'
				WHERE BillID = '$theBill';";
		mysql_query($sql5) or die("Cannot update status of the bill, try again!");
	
		?>
		<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>finances/billview.php'>	
		<?
	}
	
	
	//get person's tasks!!!
	$sql = "SELECT * FROM tblBills WHERE Status <> 'complete'";
	
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

  <title>Bills</title><div align="left">
    <p align="left"><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">&gt;
          Bills</font></strong></p>
    <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
      <tr>
        <td width="50%" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="bills_complete.php">Completed
                bills<br>
                </a></font></strong><font size="2"><strong><font face="Arial, Helvetica, sans-serif">&gt; <a href="billadd.php">Add
        a new bill</a></font></strong></font><font size="2"><strong><font face="Arial, Helvetica, sans-serif"><br>
        &gt; <a href="compview.php">Edit/Add/View Companies</a></font></strong></font></td>
        <td width="50%" valign="middle">
          <form action="bills.php?compID=<? echo $CompanyID; ?>" method="get" name="frmJump" id="frmJump">
            
            <div align="right">
  <select name="compID" id="compID">
              <option value="home" selected>Select Company</option>
              <?
					//get list of Company Names!
					$sql = "SELECT CompanyID, Name
							FROM tblBillCompany
							WHERE Status = 'active'
							ORDER BY Name;";
					//put SQL statement into result set for loop through records
					$result2 = mysql_query($sql) or die("Cannot get company names!");
					while($row = mysql_fetch_array($result2))
					{
		
			  ?>
              <option value="<? echo $row[CompanyID];?>"><? echo "$row[Name]";?></option>
              <?
			  		}
			  ?>
              </select>
    <input type="submit" name="Submit" value="Go">
            </div>
          </form>
          <p align="right"><strong><font size="2" face="Arial, Helvetica, sans-serif">OR
          BY</font></strong>            </p>
          <form action="billcat.php?cID=<? echo $CategoryID; ?>" method="get" name="frmJump" id="frmJump">
            <div align="right"><select name="cID" id="cID">
              <option value="home" selected>Select Category</option>
              <?
					//get list of Company Reps!
					$sql7 = "SELECT CategoryID, Name
							FROM tblBillCategory
							WHERE Status = 'active'
							ORDER BY Name;";
					//put SQL statement into result set for loop through records
					$result7 = mysql_query($sql7) or die("Cannot get category names!");
					while($row7 = mysql_fetch_array($result7))
					{
		
			  ?>
              <option value="<? echo $row7[CategoryID];?>"><? echo "$row7[Name]";?></option>
              <?
			  		}
			  ?>
              </select>
        <input type="submit" name="Submit" value="Go">
            </div>
          </form>
        </td>
      </tr>
    </table>
    <br>
    <form name="form1" method="post" action="">
      <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
        
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
          <td><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Edit</font></strong></font></div></td>
          <td><div align="center"><font color="#003399"><strong><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="billview.php?sort=tblBills.DueDate&d=<? if ($sortBy=="tblBills.DueDate") {echo $sd;} else {echo "ASC";}?>">Due
                          Date </a></font></strong></strong></font></div></td>
          <td><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Company</font></strong></font></div></td>
          <td><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Amount</font></strong></font></div></td>
          <td><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Category</font></strong></font></div></td>
          <td><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></font></div></td>
          <td><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Finish</font></strong></font></div></td>
        </tr>
        <tr>
		
		<?
		
		while($row = mysql_fetch_array($result))
				{
					$BillID = $row[BillID];
					$CompID = $row[Company];
					$Amount = $row[Amount];
					$DueDate = $row[DueDate];
					$Cat = $row[Category];
					$Status = $row[Status];
					$Sent = $row[Sent];
					$Shared = $row[Shared];
					
					
				
				$sql2 = "SELECT * FROM tblBillCategory WHERE CategoryID = '$Cat'";
				$result2 = mysql_query($sql2) or die("Cannot execute Category!");
				
				while($row2 = mysql_fetch_array($result2))
				{
					$Category = $row2[Name];
				}
				
				
				
				$sql3 = "SELECT * FROM tblBillCompany WHERE CompanyID = '$CompID'";
				$result3 = mysql_query($sql3) or die("Cannot get company name!");
				
				while($row3 = mysql_fetch_array($result3))
				{
					$Company = $row3[Name];
				}
				
		
		?>
		
	    <tr class="info" <? if($Status =='open'){echo "bgcolor='#CCCCFF'";}?>>
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="billedit.php?bill=<? echo $BillID;?>">E</a></font></div></td>
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DueDate;?></font></div></td>
          <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Company;?></font></div></td>
          <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">$<? echo number_format($Amount,2);?></font></div></td>
          <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Category;?></font></div></td>
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Status;?></font></div></td>
          <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="billview.php?Complete=YES&BillID=<? echo $BillID; ?>";?>X</a></font></div></td>
    </tr>    <?
		
		}
		
		?>
		
		
		
		
      </table>
      <p><em></em></p>
    </form>
    <p><strong><font color="#9900FF" size="5" face="Arial, Helvetica, sans-serif"></font></strong></p>
    <p></p>
  </div>
  
  
      <?
	//close connection to database
	mysql_close($link);
?>
      <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>



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

