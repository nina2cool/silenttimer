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
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");



?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Referral
  Report and Test Report since Jan 1, 2007<br>
  <font size="3">(When LSAC banned all timers)</font></strong></font>
  
  <?

	$sql = "SELECT Count(ReferredByID) as Count, ReferredByID FROM tblPurchase2 WHERE OrderDateTime >= '2007-01-01' AND Status = 'active' GROUP BY ReferredByID ORDER BY Count DESC, Status";
	$result = mysql_query($sql) or die("Cannot retrieve customer info, please try again.");
	
	
	$sql3 = "SELECT * FROM tblPurchase2 WHERE OrderDateTime >= '2007-01-01' AND Status = 'active'";
	$result3 = mysql_query($sql3) or die("Cannot retrieve customer info, please try again.");
	
	$Total = mysql_num_rows($result3);
	
	//echo "total = " .$Total;
	
	
	
	$sql4 = "SELECT * FROM tblPurchase2 WHERE OrderDateTime >= '2007-01-01' AND ReferredByID <> '0' AND Status = 'active'";
	$result4 = mysql_query($sql4) or die("Cannot retrieve customer info, please try again.");
	
	$Total2 = mysql_num_rows($result4);

	//echo "<br>total2 = " .$Total2;
	
	
	
	$sql5 = "SELECT * FROM tblPurchase2 WHERE OrderDateTime >= '2007-01-01' AND TestID <> '0' AND Status = 'active'";
	$result5 = mysql_query($sql5) or die("Cannot retrieve customer info, please try again.");
	
	$Total3 = mysql_num_rows($result5);

	//echo "<br>total3 = " .$Total3;
	

	$sql2 = "SELECT Count(TestID) as CountTest, TestID FROM tblPurchase2 WHERE OrderDateTime >= '2007-01-01' AND Status = 'active' GROUP BY TestID ORDER BY CountTest DESC";
	$result2 = mysql_query($sql2) or die("Cannot retrieve customer info, please try again.");


?>
</p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="MonthlyReferrals.php">Referrals by Month</a></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="Referrals.php">Referrals Overall </a></font> </p>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td valign="top"><table width="440" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
        <?
			   // code to handle sort direction
			   // this following code just switches teh ascending order to descending and vice verca when necessary.
			   // The links in the titles of the colum fields are changed depending on the value in this variable and
			   // depending on what is being sorted by.
	//sort results.....
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
          <td width="130" class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Referral
                  Type</strong></font></div></td>
          <td width="130" class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>#
                  of People</strong></font></div></td>
          <td width="130" class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Percent
                  of Total </strong></font></div></td>
          <td width="130" class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Percent
                  of Non-Zero Responses </strong></font></div></td>
          <?
   


		while($row = mysql_fetch_array($result))
	
	{
		$ReferredByID = $row['ReferredByID'];
		$Num = $row['Count'];
	
		
							$sql3 = "SELECT * FROM tblReferredBy WHERE ReferredByID = '$ReferredByID'";
							$result3 = mysql_query($sql3) or die("Cannot retrieve ReferredByID info, please try again.");
							
							while($row3 = mysql_fetch_array($result3))
							
							{
							$Type = $row3['Name'];
							}
	
	$Percent = ($Num / $Total) * 100;
	
	$Percent2 = ($Num / $Total2) * 100;
	
	?>
        <tr>
          <td width="130"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Type; ?></font></div></td>
          <td width="130"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Num; ?></font></div></td>
          <td width="130"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($Percent,1); ?>%</font></div></td>
          <td width="130"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($Percent2,1); ?>%</font></div></td>
        </tr>
        <?
	
	
			  	}
			
			  ?>
      </table></td>
      <td valign="top"><table width="440" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
        <?
		
		
		
		
		
			   // code to handle sort direction
			   // this following code just switches teh ascending order to descending and vice verca when necessary.
			   // The links in the titles of the colum fields are changed depending on the value in this variable and
			   // depending on what is being sorted by.
	//sort results.....
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
          <td width="130" class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Test</strong></font></div></td>
          <td width="130" class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>#
                  of People</strong></font></div></td>
          <td width="130" class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Percent
                  of Total </strong></font></div></td>
          <td width="130" class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Percent
                  of Non-Zero Responses </strong></font></div></td>
          <?
   


		while($row2 = mysql_fetch_array($result2))
	
	{
		$TestID = $row2['TestID'];
		$NumTest = $row2['CountTest'];
	
		$sql3 = "SELECT * FROM tblTests WHERE TestID = '$TestID'";
		$result3 = mysql_query($sql3) or die("Cannot retrieve customer info, please try again.");
		
			while($row3 = mysql_fetch_array($result3))
			{
				$Test = $row3['Name'];
			}
		
		$PercentTest = ($NumTest / $Total) * 100;
		
		$PercentTest2 = ($NumTest / $Total3) * 100;
	
	?>
        <tr>
          <td width="130"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Test; ?></font></div></td>
          <td width="130"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumTest; ?></font></div></td>
          <td width="130"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($PercentTest,1); ?>%</font></div></td>
          <td width="130"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($PercentTest2,1); ?>%</font></div></td>
        </tr>
        <?
	}
	
			  	
			  ?>
      </table></td>
    </tr>
</table>
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
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>