<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{



// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


	$sql4 = "SELECT Count(SurveyID) as Total from tblSurvey WHERE Status = 'active' AND SurveyName = 'Timing'";
	$result4 = mysql_query($sql4) or die("Cannot retrieve answer info, please try again.");
	
	while($row4 = mysql_fetch_array($result4))
	{
	$Total = $row4[Total];
	}



?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Marketing
Survey Results</strong></font></p>
<p><font color="#CC0000" size="3" face="Arial, Helvetica, sans-serif"><strong>#
      of Surveyed People: <?php echo $Total; ?></strong></font> </p>

<?
	
		$sql5 = "SELECT * from tblSurveyQuestions WHERE Status = 'active' AND SurveyName = 'Timing'";
		
		$result5 = mysql_query($sql5) or die("Cannot retrieve question info, please try again.");
		
		while($row5 = mysql_fetch_array($result5))
		{
		$Question = $row5[Question];
		$QuestionID = $row5[QuestionID];
		$CheckAll = $row5[CheckAll];

		$sql = "SELECT * from tblSurveyAnswers WHERE QuestionID = '$QuestionID' AND Status = 'active'";
		
		$result = mysql_query($sql) or die("Cannot retrieve question info, please try again.");
		
		while($row = mysql_fetch_array($result))
		{
		$Answer = $row[Answer];
		$AnswerID = $row[AnswerID];
	
				
				
		$sql3 = "SELECT Count(AnswerID) as NumberSurveys from tblSurveyQA WHERE QuestionID = '$QuestionID' AND Status = 'active'";
		$result3 = mysql_query($sql3) or die("Cannot retrieve answer info, please try again.");
		
		while($row3 = mysql_fetch_array($result3))
		{
		$Responses = $row3[Responses];
		}
		
		
				
		$sql8 = "SELECT Count(AnswerID) as Count from tblSurveyQA WHERE QuestionID = '$QuestionID' AND Status = 'active' AND AnswerID <> '0'";
		//echo "<br> " .$sql8;
		$result8 = mysql_query($sql8) or die("Cannot retrieve answer info, please try again.");
		
		while($row8 = mysql_fetch_array($result8))
		{
		$ValidResponses = $row8[Count];
		}
		
		
		
		}

	?>

  <p><font size="2"><strong><font face="Arial, Helvetica, sans-serif">Question
  # <? echo $QuestionID; ?></font></strong><font face="Arial, Helvetica, sans-serif">: <strong><? echo $Question; ?> </strong><br>
  (#
  of Responses: </font><font size="2" face="Arial, Helvetica, sans-serif"><? echo $ValidResponses; ?>)</font></font></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
	<?
	
		$sql = "SELECT * from tblSurveyAnswers WHERE QuestionID = '$QuestionID' AND Status = 'active'";
		
		$result = mysql_query($sql) or die("Cannot retrieve question info, please try again.");
		
		while($row = mysql_fetch_array($result))
		{
		$Answer = $row[Answer];
		$AnswerID = $row[AnswerID];
	
				
				
		$sql9 = "SELECT Count(AnswerID) as TotalCount from tblSurveyQA WHERE QuestionID = '$QuestionID' AND Status = 'active' AND AnswerID <> '0'";
		$result9 = mysql_query($sql9) or die("Cannot retrieve answer info, please try again.");
		
		while($row9 = mysql_fetch_array($result9))
		{
		$ValidResponses2 = $row9[TotalCount];
		}
		

		
				$sql2 = "SELECT Count(AnswerID) as AnswerCount from tblSurveyQA WHERE QuestionID = '$QuestionID' AND AnswerID = '$AnswerID' AND Status = 'active' GROUP BY AnswerID";
				//echo $sql2;
				$result2 = mysql_query($sql2) or die("Cannot retrieve answer info, please try again.");
				
				while($row2 = mysql_fetch_array($result2))
				{
				$AnswerCount = $row2['AnswerCount'];

								if($CheckAll == 'y')
								{ $Percent = $AnswerCount / $Total * 100; }
								else
								{ $Percent = $AnswerCount / $ValidResponses2 * 100; }
				
		?> 
	
	
	  
	   <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Answer; ?>
		
							<? 
					  $sql7 = "SELECT * FROM tblSurveyQA WHERE OtherText <> '' AND Status = 'active' AND AnswerID = '$AnswerID'";
					  $result7 = mysql_query($sql7) or die("Cannot get other text");
					  
					  while($row7 = mysql_fetch_array($result7))
					  {
					  $OtherText = $row7[OtherText];
					  
					   ?>
						
						   <li><? echo $OtherText; ?></li>
						   
						   <?
					  }
					  ?>
	  </font></td>
	
      <td width="15%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $AnswerCount; ?></font></td>
	  
	  <?
	  if($Percent < '50')
	  {
	  ?> 
      <td width="15%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($Percent,0); ?>%</font></td>
	  <?
	  }
	  else
	  {
	  ?> 
      <td width="15%"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($Percent,0); ?>%</font></td>
	  <?
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
		  
		  ?>
  <p>&nbsp;</p>
  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


mysql_close($link);



}
// finishes security for page
?>
