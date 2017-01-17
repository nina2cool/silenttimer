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

	
	$sql3 = "SELECT Count(TestID) As CountTotal FROM tblPurchase WHERE Status = 'active' AND TestID <> '0'";
	$result3 = mysql_query($sql3) or die("Cannot retrieve test ID info, please try again.");
	

	
	while($row3 = mysql_fetch_array($result3))
	{
	$Total = $row3[CountTotal];
	}
	
	
	
	$sql4 = "SELECT Count(TestID) As CountTotal2 FROM tblPurchase WHERE Status = 'active'";
	$result4 = mysql_query($sql4) or die("Cannot retrieve test ID info, please try again.");
	

	
	while($row4 = mysql_fetch_array($result4))
	{
	$Total2 = $row4[CountTotal2];
	}
	
	
	
	
	$sql = "Select * FROM tblTests";



	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>
<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Tests</strong></font>
<form>
			
  
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
  <table width="80%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
    <tr bgcolor="#FFFFCC"> 
      <td width="84" class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Details</strong></font></div></td>
      <td width="15%" class=sort> <div align="center"><a href="../tests/ViewTest.php?sort=tblTests.TestID&d=<? if ($sortBy=="tblTests.TestID") {echo $sd;} else {echo "ASC";}?>"><strong><font size="2" face="Arial, Helvetica, sans-serif">Test 
          ID</font></strong></a></div></td>
      <!--  <td width="64" class=sort> <div align="center"><font color="#003399"><strong><font size="2" 
				       face="Arial, Helvetica, sans-serif">Details</font></strong></font></div></td>
					   
-->
      <td width="84" class=sort> <div align="center"><font color="#003399"><strong><font size="2" 
				     face="Arial, Helvetica, sans-serif"><a href="../tests/ViewTest.php?sort=tblTests.Name&d=<? if ($sortBy=="tblTests.Name") {echo $sd;} else {echo "ASC";}?>">Test 
          </a></font></strong></font></div></td>
      <td width="75" class=sort> <div align="center"><font color="#003399"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif"><a href="../tests/ViewTest.php?sort=tblTests.Description&d=<? if ($sortBy=="tblTests.Description") {echo $sd;} else {echo "ASC";} ?>"># 
          of Students</a></font></strong></font></div></td>
      <td width="75" class=sort> <div align="center"><font color="#003399"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif">% of Whole Who Responded</font></strong></font></div></td>
      <td width="75" class=sort><div align="center"><font color="#003399"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif">% of Whole Everyone</font></strong></font></div></td>
    </tr>
    <!--     
		-->
    <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{ 
				$TestID = $row[TestID];
				$Name = $row[Name];
					
				$sql2 = "SELECT Count(TestID) As Count FROM tblPurchase WHERE Status = 'active' AND TestID = '$TestID'";
				
				
				$result2 = mysql_query($sql2) or die("Cannot retrieve test ID info, please try again.");
				
				while($row2 = mysql_fetch_array($result2))
					{
				
					$Num = $row2[Count];
	
					$Percent = number_format($Num / $Total * 100,2);
					
					$Percent2 = number_format($Num / $Total2 * 100,2);
						
					}		
			  ?>
    <tr> 
      <td height="35"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="EditTest.php?t=<? echo $TestID; ?>"><strong>Details</strong></a></font></div></td>
      <td width="15%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $TestID; ?></strong></font></div></td>
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Name; ?></strong></font></div></td>
      <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Num; ?></strong></font></div></td>
      <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Percent; ?></strong></font></div></td>
      <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Percent2; ?></strong></font></div></td>
    </tr>
    <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
  </table> 
		
            </form>
  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.

require "../include/footerlinks.php";



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
