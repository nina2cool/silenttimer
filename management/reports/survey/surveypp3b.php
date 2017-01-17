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


	$sql4 = "SELECT Count(SurveyID) as Total from tblSurvey WHERE Status = 'active' AND SurveyName = 'PP3B'";
	$result4 = mysql_query($sql4) or die("Cannot retrieve answer info, please try again.");
	
	while($row4 = mysql_fetch_array($result4))
	{
	$Total = $row4[Total];
	}



?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Post
      Purchase 
Survey # 3 Silent Timer and Watch Results</strong></font></p>
<p><font color="#CC0000" size="3" face="Arial, Helvetica, sans-serif"><strong>#
      of Surveyed People: <?php echo $Total; ?></strong></font> </p>

<?
	
		$sql5 = "SELECT * from tblSurveyQuestions WHERE Status = 'active' AND SurveyName = 'PP3B' AND Display = 'y'";
		
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
	
				
				
		$sql3 = "SELECT Count(AnswerID) as TotalCount from tblSurveyQA WHERE QuestionID = '$QuestionID' AND Status = 'active'";
		$result3 = mysql_query($sql3) or die("Cannot retrieve answer info, please try again.");
		
		while($row3 = mysql_fetch_array($result3))
		{
		$TotalCount = $row3[TotalCount];
		}
		}

	?>

  <p><font size="2"><strong><font face="Arial, Helvetica, sans-serif">Question
  #</font></strong><font face="Arial, Helvetica, sans-serif">: <strong><? echo $Question; ?> </strong><br>
  (#
  of Responses: </font><font size="2" face="Arial, Helvetica, sans-serif"><? echo $TotalCount; ?>)</font></font></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
	<?
	
		$sql = "SELECT * from tblSurveyAnswers WHERE QuestionID = '$QuestionID' AND Status = 'active'";
		
		$result = mysql_query($sql) or die("Cannot retrieve question info, please try again.");
		
		while($row = mysql_fetch_array($result))
		{
		$Answer = $row[Answer];
		$AnswerID = $row[AnswerID];
	
				
				
		$sql3 = "SELECT Count(AnswerID) as TotalCount from tblSurveyQA WHERE QuestionID = '$QuestionID' AND Status = 'active'";
		$result3 = mysql_query($sql3) or die("Cannot retrieve answer info, please try again.");
		
		while($row3 = mysql_fetch_array($result3))
		{
		$TotalCount = $row3[TotalCount];
		}

				$sql2 = "SELECT Count(AnswerID) as AnswerCount from tblSurveyQA WHERE QuestionID = '$QuestionID' AND AnswerID = '$AnswerID' AND Status = 'active'";
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
				$Percent = $AnswerCount / $TotalCount * 100;
				}
				
		
	?>
	
	
	
	   <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Answer; ?>
		
							<? 
					  $sql7 = "SELECT * FROM tblSurveyQA WHERE OtherText <> '' AND Status = 'active' AND AnswerID = '$AnswerID'";
					  $result7 = mysql_query($sql7) or die("Cannot get other text");
					  
					  while($row7 = mysql_fetch_array($result7))
					  {
					  $OtherText = $row7[OtherText];
					  $SurveyID = $row7[SurveyID];
					  
					   ?>
						
						   <li><? echo $OtherText; ?> (<a href="surveypp3bresult.php?s=<? echo $SurveyID; ?>" target="_blank"><? echo $SurveyID; ?></a>)</li>
						   
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


  
  			<?
			$sql55 = "SELECT * FROM tblSurveyQA WHERE QuestionID = '112' AND Status = 'active' AND OtherText <> ''";
			$result55 = mysql_query($sql55) or die("Cannot count the comments");
			
			$CountComments = mysql_num_rows($result55);
			?>
		  
		  
<p><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">Additional
Comments:<br>
<font color="#000000" size="2">(<? echo $CountComments; ?> comments)</font></font></p>
		  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
            <tr>
			<?
			
			$sql66 = "SELECT * FROM tblSurveyQA WHERE QuestionID = '112' AND Status = 'active' AND OtherText <> '' ORDER BY SurveyID ASC";
			$result66 = mysql_query($sql66) or die("Cannot count the comments");
			
			while($row66 = mysql_fetch_array($result66))
			{
			$Comments = $row66[OtherText];
			$SurveyID = $row66[SurveyID];

			?>
              <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Comments; ?> (<a href="surveypp3bresult.php?s=<? echo $SurveyID; ?>" target="_blank"><? echo $SurveyID; ?></a>) </font></td>
            </tr>
			<?
			}
			?>
          </table>
  
  
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