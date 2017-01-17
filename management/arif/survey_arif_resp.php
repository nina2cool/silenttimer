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
require "../include/topmenu.php";

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
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Survey
Respondents</strong></font>
<form>
  <?

	//$sql = "SELECT OrderDateTime, CustomerID FROM tblPurchase2 WHERE PromotionCodeID = 'ST0405' AND Status = 'active' GROUP BY PurchaseID";

	$sql = "SELECT * FROM tblSurvey WHERE SurveyName = 'Arif'";


	$result = mysql_query($sql) or die("Cannot retrieve survey info, please try again.");

	$Total = mysql_num_rows($result);


?>
  <font size="2" face="Arial, Helvetica, sans-serif"># of Respondents so far: <strong><font size="4"><? echo $Total; ?></font></strong></font>
  <p><font size="2" face="Arial, Helvetica, sans-serif">Click on the survey ID to view that person's responses. An
      &quot;inactive&quot; status means they did not enter information, or it was a duplicate
  entry.</font></p>
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
      <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Survey
                ID </font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Submission
      Date</font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">First
              Name</font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Last
              Name</font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Email</font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">IP</font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></font></div></td>
      <?
   


		while($row = mysql_fetch_array($result))
	
	{
		$Date = $row['DateTime'];
		$FirstName = $row['FirstName'];
		$LastName = $row['LastName'];
		$Email = $row['Email'];
		$IP = $row['IP'];
		$SurveyID = $row['SurveyID'];
		$Status = $row['Status'];
		
		if($FirstName == "") { $FirstName = "-"; }
		if($LastName == "") { $LastName = "-"; }
		if($Email == "") { $Email = "-"; }
		
		
	?>
    <tr>
     <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="survey_arif_result.php?s=<? echo $SurveyID; ?>" target="_blank"><? echo $SurveyID; ?></a></font></div></td>
	
     <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Date; ?></font></div></td>
      <td><div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font></div></td>
      <td><div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font></div></td>
      <td><div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"><a href="mailto:<? echo $Email; ?>"><? echo $Email; ?></a></font></div></td>
      <td><div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $IP; ?></font></div></td>
      <td><div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"><? echo $Status; ?></font></div></td>
    </tr>
    <?
	
			
			  	}
			
			  ?>
  </table>
  <p>&nbsp;</p>
</form>
  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

require "../include/footerlinks.php";
// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.



}

// finishes security for page
?>
