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
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Referral
  Report and Test Report</strong></font></p>
<p>  <?

	$sql = "SELECT Count(ReferredByID) as Count, ReferredByID FROM tblPurchase2 GROUP BY ReferredByID ORDER BY Count DESC, Status";
	$result = mysql_query($sql) or die("Cannot retrieve customer info, please try again.");
	
	
	$sql3 = "SELECT * FROM tblPurchase2";
	$result3 = mysql_query($sql3) or die("Cannot retrieve customer info, please try again.");
	
	$Total = mysql_num_rows($result3);


	$sql2 = "SELECT Count(TestID) as CountTest, TestID FROM tblPurchase2 GROUP BY TestID ORDER BY CountTest DESC";
	$result2 = mysql_query($sql2) or die("Cannot retrieve customer info, please try again.");


?>
</p>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td valign="top"><table width="294" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
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
          <td width="130" class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Percent</strong></font></div></td>
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
	
	?>
        <tr>
          <td width="130"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Type; ?></font></div></td>
          <td width="130"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Num; ?></font></div></td>
          <td width="130"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($Percent,1); ?>%</font></div></td>
        </tr>
        <?
	
	
			  	}
			
			  ?>
      </table></td>
      <td valign="top"><table width="294" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
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
          <td width="130" class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Percent</strong></font></div></td>
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
	
	?>
        <tr>
          <td width="130"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Test; ?></font></div></td>
          <td width="130"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumTest; ?></font></div></td>
          <td width="130"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($PercentTest,1); ?>%</font></div></td>
        </tr>
        <?
	}
	
			  	
			  ?>
      </table></td>
    </tr>
</table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>

  
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>