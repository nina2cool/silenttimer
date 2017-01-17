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

	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");



?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Survey
PP3 Silent Timer Respondents</strong></font>
<form>
  <?

	//$sql = "SELECT OrderDateTime, CustomerID FROM tblPurchase2 WHERE PromotionCodeID = 'ST0405' AND Status = 'active' GROUP BY PurchaseID";

	$sql = "SELECT * FROM tblSurvey WHERE SurveyName = 'PP3ST'";


	$result = mysql_query($sql) or die("Cannot retrieve survey info, please try again.");

	$Total = mysql_num_rows($result);


?>
  <font size="2" face="Arial, Helvetica, sans-serif"># of Respondents so far: <strong><font size="4"><? echo $Total; ?></font></strong></font>
  <br>
  <br>  
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
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
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Survey
              ID </strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Submission
              Date</strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>First
              Name</strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Last
              Name</strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Email</strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>IP</strong></font></div></td>
      <?
   


		while($row = mysql_fetch_array($result))
	
	{
		$Date = $row['DateTime'];
		$FirstName = $row['FirstName'];
		$LastName = $row['LastName'];
		$Email = $row['Email'];
		$Test = $row['Test'];
		$IP = $row['IP'];
		$SurveyID = $row['SurveyID'];


		if($FirstName == "") { $FirstName = "-"; }
		if($LastName == "") { $LastName = "-"; }
		if($Email == "") { $Email = "-"; }
		if($Test == "") { $Test = "-"; }


	?>
    <tr>
     <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="surveypp3stresult.php?s=<? echo $SurveyID; ?>" target="_blank"><? echo $SurveyID; ?></a></font></div></td>
     <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Date; ?></font></div></td>
      <td><div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font></div></td>
      <td><div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font></div></td>
      <td><div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $Email; ?></font></div></td>
      <td><div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $IP; ?></font></div></td>
    </tr>
    <?
	
			
			  	}
			
			  ?>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
  
  
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