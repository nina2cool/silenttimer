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
	$Person = $_GET['p'];

	//echo $Person;

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "Select Count(SurveyID) as SurveyCount FROM tblSurvey WHERE FirstName = '$Person' AND Status = 'active' GROUP BY SurveyID";
	//echo $sql;
	$result = mysql_query($sql) or die("Cannot execute query!");
 	while($row = mysql_fetch_array($result))
				{
				$SurveyCount = $row[SurveyCount];
				}

	$sql2 = "Select Count(AnswerID) as Count, Sum(AnswerID) as Sum FROM tblSurveyQA WHERE Person = '$Person' AND QuestionID = '113' GROUP BY QuestionID";
	//echo $sql2;
	$result2 = mysql_query($sql2) or die("Cannot execute query2!");

 	while($row2 = mysql_fetch_array($result2))
				{
				$AnswerSum113 = $row2[Sum];
				$AnswerCount113 = $row2[Count];
				$AnswerAverage113 = $AnswerSum113 / $AnswerCount113;
				}
	


	$sql3 = "Select Count(AnswerID) as Count, Sum(AnswerID) as Sum FROM tblSurveyQA WHERE Person = '$Person' AND QuestionID = '114' GROUP BY QuestionID";
	//echo $sql2;
	$result3 = mysql_query($sql3) or die("Cannot execute query3!");

 	while($row3 = mysql_fetch_array($result3))
				{
				$AnswerSum114 = $row3[Sum];
				$AnswerCount114 = $row3[Count];
				$AnswerAverage114 = $AnswerSum114 / $AnswerCount114;
				}
	
	
		$sql5 = "Select Count(AnswerID) as Count, Sum(AnswerID) as Sum FROM tblSurveyQA WHERE Person = '$Person' AND QuestionID = '115' GROUP BY QuestionID";
	//echo $sql2;
	$result5 = mysql_query($sql5) or die("Cannot execute query5!");

 	while($row5 = mysql_fetch_array($result5))
				{
				$AnswerSum115 = $row5[Sum];
				$AnswerCount115 = $row5[Count];
				$AnswerAverage115 = $AnswerSum115 / $AnswerCount115;
				}
	
	
	
		$sql6 = "Select Count(AnswerID) as Count, Sum(AnswerID) as Sum FROM tblSurveyQA WHERE Person = '$Person' AND QuestionID = '116' AND AnswerID <> '0' GROUP BY QuestionID";
	//echo $sql2;
	$result6 = mysql_query($sql6) or die("Cannot execute query6!");

 	while($row6 = mysql_fetch_array($result6))
				{
				$AnswerSum116 = $row6[Sum];
				$AnswerCount116 = $row6[Count];
				$AnswerAverage116 = $AnswerSum116 / $AnswerCount116;
				}
	


?><title>Survey Results - <? echo $Person; ?></title>
<p><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font size="3">BestFit Survey Results</font><br />
</strong></font><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><? echo $Person; ?></strong></font><br />
<font size="2" face="Arial, Helvetica, sans-serif"><a href="BFResultsPrint.php?p=<? echo $Person; ?>" target="_blank">Printable Version</a></font></p>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
  <tr bgcolor="#FFFFCC">
    <td class="sort"><div align="center"><font size="2"><strong><font face="Arial, Helvetica, sans-serif">Question</font></strong></font></div></td>
    <td class="sort"><div align="center"><font color="#000000" size="2"><strong><font 
				     face="Arial, Helvetica, sans-serif">Average Score</font></strong></font></div></td>
  </tr>
  <tr>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">1. Would you work this person again? </font></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($AnswerAverage113,2); ?></font></strong></div></td>
  </tr>
  <tr>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">2. Did you feel that this person was dependable? </font></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($AnswerAverage114,2); ?></font></strong></div></td>
  </tr>
  <tr>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">3. Do you think this person knows enough to do their job effectively?</font></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($AnswerAverage115,2); ?></font></strong></div></td>
  </tr>
  <tr>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">4. Do you think the client enjoyed working with this person?</font></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($AnswerAverage116,2); ?></font></strong></div></td>
  </tr>

</table>
<br />
<?
		$sql7 = "Select * FROM tblSurveyQA WHERE Person = '$Person' AND QuestionID = '117' AND OtherText <> ''";
	//echo $sql2;
		$result7 = mysql_query($sql7) or die("Cannot execute query7!");

?>
<font size="2" face="Arial, Helvetica, sans-serif">5. Please identify specific areas where this person should "Continue" what they are currently doing. This would include areas where they have strengths or are exceeding expectations. </font>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
  <?
			  	while($row7 = mysql_fetch_array($result7))
				{
				$Answer117 = $row7[OtherText];
?>
  <tr>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Answer117; ?></font></div></td>
  </tr>
  <?
			  	}
			  ?>
</table>


<br />
<?
		$sql8 = "Select * FROM tblSurveyQA WHERE Person = '$Person' AND QuestionID = '118' AND OtherText <> ''";
	//echo $sql2;
		$result8 = mysql_query($sql8) or die("Cannot execute query8!");

?>
<font size="2" face="Arial, Helvetica, sans-serif">6. Please identify specific actions this person should “Start” doing to improve and grow. </font>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
  <?
			  	while($row8 = mysql_fetch_array($result8))
				{
				$Answer118 = $row8[OtherText];
?>
  <tr>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Answer118; ?></font></div></td>
  </tr>
  <?
			  	}
			  ?>
</table>
<br />
<?
		$sql9 = "Select * FROM tblSurveyQA WHERE Person = '$Person' AND QuestionID = '119' AND OtherText <> ''";
	//echo $sql2;
		$result9 = mysql_query($sql9) or die("Cannot execute query9!");

?>
<font size="2" face="Arial, Helvetica, sans-serif">7. Please identify actions this person should “Stop” doing to improve his/her performance and increase customer satisfaction. </font>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
  <?
			  	while($row9 = mysql_fetch_array($result9))
				{
				$Answer119 = $row9[OtherText];
?>
  <tr>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Answer119; ?></font></div></td>
  </tr>
  <?
			  	}
			  ?>
</table>

<p></p>

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