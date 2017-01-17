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

	
//beginning SQL statement that gets all data from tables.
	$sql = "SELECT tblTestDates.TestID, tblTestDates.TestDateID, tblTestDates.Date, tblTestDates.Info,
	tblTests.TestID, tblTests.Name
	FROM tblTestDates INNER JOIN tblTests ON
	tblTestDates.TestID = tblTests.TestID
	ORDER BY tblTests.Name ASC, tblTestDates.Date DESC";

	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>

			<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; 
             Test Dates</strong></font></p>
            
			<form>
			
  <table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
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
      <td width="10%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" 
				       face="Arial, Helvetica, sans-serif">Details</font></strong></font></div></td>
					   
					   
      <td width="20%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" 
				     face="Arial, Helvetica, sans-serif"><a href="../tests/ViewTestDate.php?sort=tblTests.Name&d=<? if ($sortBy=="tblTests.Name") {echo $sd;} else {echo "ASC";}?>">
      Name</a></font></strong></font></div></td>
		  
		  
      <td width="20%" class=sort> <div align="center"><font color="#000000"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif"><a href="../tests/ViewTestDate.php?sort=tblTestDates.Date&d=<? if 
					  ($sortBy=="tblTestDates.Date") {echo $sd;} else {echo "ASC";} ?>">Date 
      </a></font></strong></font></div></td>
				
				
 <td class=sort> <div align="center"><font color="#000000"><strong><font size="2" 
				       face="Arial, Helvetica, sans-serif">Additional Information</font></strong></font></div></td>
					   
						
	<!-- Sort by Info						
      <td width="75" class=sort> <div align="center"><font color="#003399"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif"><a href="../tests/ViewTestDate.php?sort=tblTestDates.Info&d=<? if 
					  ($sortBy=="tblTestDates.Info") {echo $sd;} else {echo "ASC";} ?>">Additional Information 
          				</a></font></strong></font></div></td>  -->
        
	
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{ 
				$TestDateID = $row[TestDateID]; //autonumer for each Test Date
				$Name = $row[Name];
				$Date = $row[Date];
				$Info = $row[Info];
				
					if($Info == "") { $Info = "-"; }
				
			  ?>
    <tr> 
      
      <td width="10%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="EditTestDate.php?id=<? echo $TestDateID; ?>">Edit</a></font></div></td>
      
      <td width="20%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Name; ?></font></div></td>
      <td width="20%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Date; ?></font></div></td>
     <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Info; ?></font></div></td>
	

    </tr>
    <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
  </table> 
		
            <p>&nbsp;</p>
      <p>&nbsp;</p>
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
