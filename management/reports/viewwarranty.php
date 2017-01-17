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
<p align="center"><font color="#0000FF" size="5" face="Arial, Helvetica, sans-serif"><strong>SILENT 
  TECHNOLOGY, LLC</strong></font></p>
<p align="center"><font size="5" face="Arial, Helvetica, sans-serif"><strong>Warranty 
  Report</strong></font> </p>
<?
	//users search mechanism
	$chk = $_POST['chkTime'];
	$chk1 = $_POST['chkState'];
	$chk2 = $_POST['chkCity'];
	$chk3 = $_POST['chkPrepClass'];
	$chk4 = $_POST['chkProblem'];
	$chk6 = $_POST['chkProduct'];
	$chk7 = $_POST['chkTest'];				
	
	//time search variables
	$timeType = $_POST['cboTime'];
	$fromDate = $_POST['txtFromDate'];
	$toDate = $_POST['txtToDate'];
	
	//State
	$state = $_POST['cboState'];
	
	//City
	$city = $_POST['cboCity'];
	
	//Prep Class
	$prepclass = $_POST['cboPrepClass'];
	
	//Problems
	$problem = $_POST['cboProblem'];
	
	//product
	$product = $_POST['cboProduct'];
	
	//Test
	$test = $_POST['cboTest'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//beginning SQL statement that gets all data from tables.
	$sql = "SELECT SUM( NumOrdered ) AS NumOrdered FROM tblPurchase"; 
			
	$result = mysql_query($sql) or die("Cannot execute query!");
				
	$query = "SELECT COUNT(ProblemDetails) AS ProblemDetails
              FROM tblCustomer INNER JOIN tblPurchase ON tblCustomer.CustomerID = tblPurchase.CustomerID
			  	INNER JOIN tblProblems ON tblPurchase.PurchaseID = tblProblems.PurchaseID
				INNER JOIN tblProblemDetail ON tblProblems.ProblemID = tblProblemDetail.ProblemID";
			
	$query2 = "SELECT ProblemDetails, CustRequest FROM tblProblems";
         
	$result3 = mysql_query($query2) or die("Cannot execute query3!");
	
	while($row = mysql_fetch_array($result3))
		{
		$prob = $row[ProblemDetails];
		$req = $row[CustRequest];
		}
	
	$today = date("Y-m-d");			
	$week = mktime (0,0,0,date("m"),date("d")-7,  date("Y"));
	$month = mktime (0,0,0,date("m")-1,date("d"),  date("Y"));
	$year = mktime (0,0,0,date("m"),date("d"),  date("Y")-1);
	
	if ($chk == "time")
	{
		if ($timeType == "other")
		{
			$query .= " WHERE tblProblems.DateTime >= '$fromDate' AND tblProblems.DateTime <= '$toDate'";
		}
		else
		{
			if ($timeType == "today")
			{
				$query .= " WHERE tblProblems.DateTime >= '$today'";
			}
			
			if ($timeType == "week")
			{
				$query .= " WHERE tblProblems.DateTime >= '$week'";
			}
			
			if ($timeType == "month")
			{
				$query .= " WHERE tblProblems.DateTime >= '$month'";
			}
			
			if ($timeType == "year")
			{
				$query .= " WHERE tblProblems.DateTime >= '$year'";
			}
			
			if ($timeType == "all")
			{
				//then don't do anything, because it is already selecting all.
			}
		}			
	}
	
	if ($chk1 == "state")
	{
		$query .= " WHERE tblCustomer.State = '$state'";
	}
	
	if ($chk2 == "city")
	{
		$query .= " WHERE tblCustomer.City = '$city'";
	}
	
	if ($chk3 == "prepclass")
	{
		$query .= " WHERE tblCustomer.PrepClass = '$prepclass'";
	}
	
	if ($chk4 == "problem")
	{
		$query .= " WHERE tblProblems.ProblemDetails = '$problem'";
	}	
		
	if ($chk6 == "product")
	{
		$query .= " WHERE tblProduct.ProductID = '$product'";
	}
	
	if ($chk7 == "test")
	{
		$query .= " WHERE tblTests.TestID = '$test'";
	}
	
	//sort results.....
	if ($sortBy != "")
	{
		$query .= " ORDER BY $sortBy $sortDirection";
	}
	
	//put SQL statement into result set for loop through records
	
	$result2 = mysql_query($query) or die("Cannot execute query2!");
			
	while($row = mysql_fetch_array($result2))
		{
		$numProblem = $row[ProblemDetails];
		}

?>
             
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
			               
			  <?
			  	$percent = 0.0;	
				// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$totNumOrdered = $row[NumOrdered];
				$totTax = $row[Tax];
				$totShipping = $row[ShippingCost];
				$totSales = $row[TotalCost];
				$totCost = $cost * $totNumOrdered;
				$profitorloss = $totSales - ($totCost + $totTax + $totShipping);
				$percent = $numProblem % $totNumOrdered;
				}					
			  ?>
	<p align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>Problem : <? echo $prob; ?></strong></font></p>
	<table width="70%" border="0" cellpadding="7" align="center" cellspacing="0" bordercolor="#003399">
		<tr bgcolor="#CCCCCC"> 
      <td width="70%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Claims/Solution</strong></font></div></td>
     <td width="30%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Frequency</strong></font></div></td>
     </tr>
     <tr> 
     <td><div><font size="2" face="Arial, Helvetica, sans-serif"><strong>Number 
        of Times the Problem Occurred</strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $numProblem; ?></strong></font></div></td>
    </tr>
	</table>
            
	
<table width="70%" border="0" cellpadding="7" align="center" cellspacing="0" bordercolor="#003399">
  <tr bgcolor="#CCCCCC"> 
    <td width="70%" class=sort> <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Related 
        Information</font></strong></font></div></td>
    <td width="30%" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Amount</strong></font></div></td>
  </tr>
  <tr> 
    <td><div><font size="2" face="Arial, Helvetica, sans-serif"><strong>Number 
        of Timers Sold</strong></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $totNumOrdered; ?></strong></font></div></td>
  </tr>
</table>

<table width="70%" border="0" cellpadding="7" align="center" cellspacing="0" bordercolor="#003399">
   <tr bgcolor="#CCCCCC"> 
    <td width="70%" class=sort> <div align="right"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Percent</font></strong></font></div></td>
    <td width="30%" class=sort> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $percent; ?></strong></font><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"></font></div></td>
  </tr>

					<?
						mysql_close($link);
					?>
 </table>

<p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>



<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
