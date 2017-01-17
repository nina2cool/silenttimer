<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "Select * FROM tblSurvey WHERE SurveyName = 'Peer' GROUP BY FirstName";

	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblSurvey.FirstName ASC";
		$sortBy ="tblSurvey.FirstName";
		$sortDirection = "ASC";
	}
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>BestFit Survey Results</strong></font></p>
<p><font face="Arial, Helvetica, sans-serif">BESTFIT MEDIA SURVEY</font></p>
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
    <td class="sort"><div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif">Person</font></strong></font></div></td>
    <td class="sort"><div align="center"><font color="#000000" size="1"><strong><font 
				     face="Arial, Helvetica, sans-serif">Results</font></strong></font></div></td>
    <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$Person = $row[FirstName];
			
										
								
							$sql6 = "SELECT COUNT(SurveyID) as NumSurveys FROM tblSurvey WHERE FirstName = '$Person' AND SurveyName = 'Peer'";
						//echo $sql2;
						$result6 = mysql_query($sql6) or die("Cannot execute query6!");
					
						while($row6 = mysql_fetch_array($result6))
									{
									$NumSurveys = $row6[NumSurveys];
									}
	
										
			  ?>
  </tr>
  <tr>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Person; ?></font></strong></div></td>
    <td><div align="center"><a href="BFResults.php?p=<? echo $Person; ?>"><font size="2" face="Arial, Helvetica, sans-serif">View Results</font></a> <font size="2" face="Arial, Helvetica, sans-serif">(<? echo $NumSurveys; ?> reviews)</font></div></td>
  </tr>
  <?
			  	}
				
				//close connection to database
				mysql_close($link);
			  ?>
</table>
<p>&nbsp;</p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);
// has side menu, and bottom HTML TAGS - found in local folder
require "../include/sidemenu.php";
// has links that show up at the bottom in it - found in home management folder
require "../../include/footerlinks.php";


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