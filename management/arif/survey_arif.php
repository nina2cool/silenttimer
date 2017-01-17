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

	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


	$sql4 = "SELECT Count(SurveyID) as Total from tblSurvey WHERE Status = 'active' AND SurveyName = 'Arif'";
	
	//$sql4 = "SELECT Count(tblSurvey.SurveyID) as Count from tblSurvey INNER JOIN tblSurveyQA
	//ON tblSurvey.SurveyID = tblSurveyQA.SurveyID WHERE tblSurvey.Status = 'active' AND tblSurvey.SurveyName = 'Arif'
	//AND tblSurveyQA.AnswerID <> '0'";

	
	$result4 = mysql_query($sql4) or die("Cannot retrieve answer info, please try again.");

	
	while($row4 = mysql_fetch_array($result4))
	{
	$Total = $row4[Total];
	
	}


?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Market
      Survey  Results</strong></font></p>
<p><font color="#CC0000" size="3" face="Arial, Helvetica, sans-serif"><strong>#
      of Survey Entries: <?php echo $Total; ?></strong></font> </p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Tips about survey results: </font></p>
<ul>
  <li><font size="2" face="Arial, Helvetica, sans-serif">The numbers below do
      not include zero answers or non-responses.</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">The percentages are
      based on the number of people who answered the question. These numbers
      may differ from question to question, because people can skip questions
      or not answer.</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">The number in parentheses
      after the &quot;x&quot; indicates how many people responsed with that same answer.</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"> For more help in interpretting
        these numbers, please email Christina @ <a href="mailto:nina@silenttimer.com">nina@silenttimer.com</a>.</font></li>
</ul>
<?
	
		$sql5 = "SELECT * from tblSurveyQuestions WHERE Status = 'active' AND SurveyName = 'Arif' AND Display = 'y'";
		
		$result5 = mysql_query($sql5) or die("Cannot retrieve question info, please try again.");
		
		while($row5 = mysql_fetch_array($result5))
		{
		$Question = $row5[Question];
		$QuestionID = $row5[QuestionID];
		$CheckAll = $row5[CheckAll];

				$sql6 = "SELECT * from tblSurveyAnswers WHERE QuestionID = '$QuestionID' AND Status = 'active' AND AnswerID <> '0'";
				
				$result6 = mysql_query($sql6) or die("Cannot retrieve question info, please try again.");
				
				while($row6 = mysql_fetch_array($result6))
				{
				$Answer = $row6[Answer];
				$AnswerID = $row6[AnswerID];
						
						
						$sql3 = "SELECT Count(AnswerID) as TotalCount from tblSurveyQA WHERE QuestionID = '$QuestionID' AND Status = 'active' AND AnswerID <> '0'";
						
						$result3 = mysql_query($sql3) or die("Cannot retrieve answer info, please try again.");
						
						while($row3 = mysql_fetch_array($result3))
						{
						$TotalCount2 = $row3[TotalCount];
						}
						
				}

	?>

  <p><font size="2"><strong><font face="Arial, Helvetica, sans-serif">Question
  #</font></strong><font face="Arial, Helvetica, sans-serif">: <strong><? echo $Question; ?> </strong><br>
  (#
  of Responses: </font><font size="2" face="Arial, Helvetica, sans-serif"><? echo $TotalCount2; ?>)</font></font></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
	<?
	
		$sql8 = "SELECT * from tblSurveyAnswers WHERE QuestionID = '$QuestionID' AND Status = 'active'";
		
		$result8 = mysql_query($sql8) or die("Cannot retrieve question info, please try again.");
		
		while($row8 = mysql_fetch_array($result8))
		{
		$Answer = $row8[Answer];
		$AnswerID = $row8[AnswerID];
	
				
				
				$sql9 = "SELECT Count(AnswerID) as TotalCount from tblSurveyQA WHERE QuestionID = '$QuestionID' AND Status = 'active' AND AnswerID <> '0'";
				//echo $sql9;
				$result9 = mysql_query($sql9) or die("Cannot retrieve answer info, please try again.");
				
				while($row9 = mysql_fetch_array($result9))
					{
					$TotalCount = $row9[TotalCount];
					}

				$sql2 = "SELECT Count(AnswerID) as AnswerCount from tblSurveyQA WHERE QuestionID = '$QuestionID' AND AnswerID = '$AnswerID' AND Status = 'active'";
				//echo $sql2;
				$result2 = mysql_query($sql2) or die("Cannot retrieve answer info, please try again.");
				
				while($row2 = mysql_fetch_array($result2))
				{
				$AnswerCount = $row2[AnswerCount];
				

						if($CheckAll == 'y')
						{
						$Percent = $AnswerCount / $Total * 100;
						}
						else
						{
						$Percent = $AnswerCount / $TotalCount2 * 100;
						}
						
		
	?>
	
	
	
	   <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Answer; ?>
		
							<? 
					  $sql7 = "SELECT OtherText, SurveyID, Count(OtherText) as Count FROM tblSurveyQA WHERE OtherText <> '' AND Status = 'active' AND AnswerID = '$AnswerID' GROUP BY OtherText ORDER BY SurveyID";
					  $result7 = mysql_query($sql7) or die("Cannot get other text");
					  
					  while($row7 = mysql_fetch_array($result7))
					  {
						  $OtherText = $row7[OtherText];
						  $SurveyID = $row7[SurveyID];
						  $Count = $row7[Count];
					  
											   if($Count > 1)
											    {
											   ?><li><? echo $OtherText; ?> (x <? echo $Count; ?>)</li><?
												}
												else
												{
												?><li><? echo $OtherText; ?></li><?  
												}	   

					  }
					  ?>
	  </font></td>
      <td width="15%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $AnswerCount; ?></font></td>
	  				  
					  
					  <?
					  if($Percent < '50')
					  {
					  ?><td width="15%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($Percent,0); ?>%</font></td> <?
					  }
					  else
					  {
					  ?><td width="15%"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($Percent,0); ?>%</font></td><?
					  }
					  ?>
	  
	</tr>
	<?
	}
	}
	
	?>
	
  </table>  
  <?
	}

// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
mysql_close($link);

		

require "../include/footerlinks.php";
// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.




}
// finishes security for page
?>
