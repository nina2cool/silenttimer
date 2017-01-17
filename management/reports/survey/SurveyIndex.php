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


	$sql4 = "SELECT Count(SurveyID) as Total from tblSurvey WHERE Status = 'active' AND SurveyName = 'Timing'";
	$result4 = mysql_query($sql4) or die("Cannot retrieve answer info, please try again.");
	
	while($row4 = mysql_fetch_array($result4))
	{
	$NumTiming = $row4[Total];
	}


	$sql5 = "SELECT Count(SurveyID) as Total from tblSurvey WHERE Status = 'active' AND SurveyName = 'PP1'";
	$result5 = mysql_query($sql5) or die("Cannot retrieve answer info, please try again.");
	
	while($row5 = mysql_fetch_array($result5))
	{
	$NumPP1 = $row5[Total];
	}
	
	$sql6 = "SELECT Count(SurveyID) as Total from tblSurvey WHERE Status = 'active' AND SurveyName = 'PP2'";
	$result6 = mysql_query($sql6) or die("Cannot retrieve answer info, please try again.");
	
	while($row6 = mysql_fetch_array($result6))
	{
	$NumPP2 = $row6[Total];
	}

	$sql7 = "SELECT Count(SurveyID) as Total from tblSurvey WHERE Status = 'active' AND SurveyName = 'PP2B'";
	$result7 = mysql_query($sql7) or die("Cannot retrieve answer info, please try again.");
	
	while($row7 = mysql_fetch_array($result7))
	{
	$NumPP2B = $row7[Total];
	}
	
	$sql8 = "SELECT Count(SurveyID) as Total from tblSurvey WHERE Status = 'active' AND SurveyName = 'PP1B'";
	$result8 = mysql_query($sql8) or die("Cannot retrieve answer info, please try again.");
	
	while($row8 = mysql_fetch_array($result8))
	{
	$NumPP1B = $row8[Total];
	}	

	$sql8 = "SELECT Count(SurveyID) as Total from tblSurvey WHERE Status = 'active' AND SurveyName = 'PP3ST'";
	$result8 = mysql_query($sql8) or die("Cannot retrieve answer info, please try again.");
	
	while($row8 = mysql_fetch_array($result8))
	{
	$NumPP3ST = $row8[Total];
	}	

	$sql8 = "SELECT Count(SurveyID) as Total from tblSurvey WHERE Status = 'active' AND SurveyName = 'PP3W'";
	$result8 = mysql_query($sql8) or die("Cannot retrieve answer info, please try again.");
	
	while($row8 = mysql_fetch_array($result8))
	{
	$NumPP3W = $row8[Total];
	}	

	$sql8 = "SELECT Count(SurveyID) as Total from tblSurvey WHERE Status = 'active' AND SurveyName = 'PP3B'";
	$result8 = mysql_query($sql8) or die("Cannot retrieve answer info, please try again.");
	
	while($row8 = mysql_fetch_array($result8))
	{
	$NumPP3B = $row8[Total];
	}	

	$sql8 = "SELECT Count(SurveyID) as Total from tblSurvey WHERE Status = 'active' AND SurveyName = 'PP3TT'";
	$result8 = mysql_query($sql8) or die("Cannot retrieve answer info, please try again.");
	
	while($row8 = mysql_fetch_array($result8))
	{
	$NumPP3TT = $row8[Total];
	}	

	$sql8 = "SELECT Count(SurveyID) as Total from tblSurvey WHERE Status = 'active' AND SurveyName = 'PP3N'";
	$result8 = mysql_query($sql8) or die("Cannot retrieve answer info, please try again.");
	
	while($row8 = mysql_fetch_array($result8))
	{
	$NumPP3N = $row8[Total];
	}	

	$sql8 = "SELECT Count(SurveyID) as Total from tblSurvey WHERE Status = 'active' AND SurveyName = 'PP1B'";
	$result8 = mysql_query($sql8) or die("Cannot retrieve answer info, please try again.");
	
	while($row8 = mysql_fetch_array($result8))
	{
	$NumPP1B = $row8[Total];
	}	

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Survey Results</strong></font></p>
<p><font face="Arial, Helvetica, sans-serif"><a href="BFSurveyIndex.php">BESTFIT MEDIA SURVEY</a></font></p>
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr bgcolor="#CCFFCC">
    <td><font size="2" face="Arial, Helvetica, sans-serif">Marketing
          Survey about Timing (<? echo $NumTiming; ?> responses) - Survey completed </font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="survey.php">Results</a> | <a href="http://www.silenttimer.com/survey/survey0525a.php" target="_blank">Survey</a></font></div></td>
  </tr>
  <tr bgcolor="#99CCFF">
    <td bgcolor="#99CCFF"><font size="2" face="Arial, Helvetica, sans-serif">Post-Purchase Survey
        #1 (8 questions) (<? echo $NumPP1; ?> responses) <a href="emailpp1.php"><font size="1">View
    Customers to Email</font></a> | <a href="surveypp1resp.php"><font size="1">Respondents</font></a></font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="surveypp1.php">Results</a> | <a href="http://www.silenttimer.com/survey/surveypp1.php" target="_blank">Survey</a></font></div></td>
  </tr>
  <tr bgcolor="#CC99FF">
    <td bgcolor="#CC99FF"><font size="2" face="Arial, Helvetica, sans-serif">Post-Purchase
        Survey #2 (10 questions) (<? echo $NumPP2; ?> responses)<font size="1"><a href="emailpp2.php">View
        Customers to Email</a></font> | <a href="surveypp2resp.php"><font size="1">Respondents</font></a></font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="surveypp2.php">Results</a> | <a href="http://www.silenttimer.com/survey/surveypp2.php" target="_blank">Survey</a></font></div></td>
  </tr>
  <tr bgcolor="#FFCCCC">
    <td><font size="2" face="Arial, Helvetica, sans-serif">Post-Purchase
        Survey #1B (9 questions) (<? echo $NumPP1B; ?> responses) <font size="1"><a href="emailpp1b.php">View
        Customers to Email</a></font> | <font size="1"><a href="emailpp1b-decjan.php" target="_blank">Dec 2005 and Jan 2006</a> </font>| <a href="surveypp1bresp.php"><font size="1">Respondents</font></a></font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="surveypp1b.php">Results</a> | <a href="http://www.silenttimer.com/survey/surveypp1b.php" target="_blank">Survey</a></font></div></td>
  </tr>
  <tr bgcolor="#FF99FF">
    <td><font size="2" face="Arial, Helvetica, sans-serif">Post-Purchase Survey
        #2B (9 questions) (<? echo $NumPP2B; ?> responses)<font size="1">View
    Customers to Email</font> | <a href="surveypp2bresp.php"><font size="1">Respondents</font></a></font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="surveypp2b.php">Results</a> | <a href="http://www.silenttimer.com/survey/surveypp2b.php" target="_blank">Survey</a></font></div></td>
  </tr>
  <tr bgcolor="#FF99FF">
    <td bgcolor="#000000">&nbsp;</td>
    <td bgcolor="#000000">&nbsp;</td>
  </tr>
  <tr bgcolor="#FF99FF">
    <td bgcolor="#FFFF99"><font size="2" face="Arial, Helvetica, sans-serif">Post-Purchase Survey
        #3 Silent Timer (7 questions) (<? echo $NumPP3ST; ?> responses)<font size="1"> Sent 9/29/08</font> | <a href="surveypp3stresp.php"><font size="1">Respondents</font></a></font></td>
    <td bgcolor="#FFFF99"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="surveypp3st.php">Results</a> | <a href="http://www.silenttimer.com/survey/surveypp3st.php" target="_blank">Survey</a></font></div></td>
  </tr>
  <tr bgcolor="#FF99FF">
    <td bgcolor="#00FFFF"><font size="2" face="Arial, Helvetica, sans-serif">Post-Purchase Survey
    #3 Watch (9 questions) (<? echo $NumPP3W; ?> responses)<font size="1"> Sent 9/29/08</font> | <a href="surveypp3wresp.php"><font size="1">Respondents</font></a></font></td>
    <td bgcolor="#00FFFF"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="surveypp3w.php">Results</a> | <a href="http://www.silenttimer.com/survey/surveypp3w.php" target="_blank">Survey</a></font></div></td>
  </tr>
  <tr bgcolor="#FF99FF">
    <td bgcolor="#FF9933"><font size="2" face="Arial, Helvetica, sans-serif">Post-Purchase Survey
    #3 Timer and Watch (16 questions) (<? echo $NumPP3B; ?> responses)<font size="1"> Sent 9/29/08</font> | <a href="surveypp3bresp.php"><font size="1">Respondents</font></a></font></td>
    <td bgcolor="#FF9933"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="surveypp3b.php">Results</a> | <a href="http://www.silenttimer.com/survey/surveypp3b.php" target="_blank">Survey</a></font></div></td>
  </tr>
  <tr bgcolor="#FF99FF">
    <td bgcolor="#66FF66"><font size="2" face="Arial, Helvetica, sans-serif">Post-Purchase Survey
    #3 Simple Timer (7 questions) (<? echo $NumPP3TT; ?> responses)<font size="1"> Sent 9/29/08</font> | <a href="surveypp3ttresp.php"><font size="1">Respondents</font></a></font></td>
    <td bgcolor="#66FF66"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="surveypp3tt.php">Results</a> | <a href="http://www.silenttimer.com/survey/surveypp3tt.php" target="_blank">Survey</a></font></div></td>
  </tr>
  <tr bgcolor="#FF99FF">
    <td bgcolor="#9966FF"><font size="2" face="Arial, Helvetica, sans-serif">Post-Purchase Survey
    #3 Neither (3 questions) (<? echo $NumPP3N; ?> responses)<font size="1"> Sent 9/29/08</font> | <a href="surveypp3nresp.php"><font size="1">Respondents</font></a></font></td>
    <td bgcolor="#9966FF"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="surveypp3n.php">Results</a> | <a href="http://www.silenttimer.com/survey/surveypp3n.php" target="_blank">Survey</a></font></div></td>
  </tr>
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