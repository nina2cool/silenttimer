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
	$SurveyID = $_GET['s'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


		$sql6 = "SELECT * from tblSurvey WHERE SurveyID = '$SurveyID'";
		
		$result6 = mysql_query($sql6) or die("Cannot retrieve question info, please try again.");
		
		while($row6 = mysql_fetch_array($result6))
		{
		$FirstName = $row6[FirstName];
		$LastName = $row6[LastName];
		$Email = $row6[Email];
		$IP = $row6[IP];
		$DateTime = $row6[DateTime];
		}
		
		
		if($FirstName == "") { $FirstName = "-"; }
		if($LastName == "") { $LastName = "-"; }
		if($Email == "") { $Email = "-"; }

?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Market
      Survey  Results</strong></font></p>
	  
	  <table width="100%"  border="1" cellpadding="2" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">First
        Name: </font></td>
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font></td>
  </tr>
  <tr>
    <td><font color="#000000" size="2"><font face="Arial, Helvetica, sans-serif">Last
          Name: </font><font face="Arial, Helvetica, sans-serif"></font></font></td>
    <td><font color="#000000" size="2"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font></font></td>
  </tr>
  <tr>
    <td><font color="#000000" size="2"><font face="Arial, Helvetica, sans-serif">Email: </font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"></font><font face="Arial, Helvetica, sans-serif"></font></font></td>
    <td><font color="#000000" size="2"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="mailto:<? echo $Email; ?>"><? echo $Email; ?></a></font></font></td>
  </tr>
  <tr>
    <td><font color="#000000" size="2"><font face="Arial, Helvetica, sans-serif">IP: </font><font face="Arial, Helvetica, sans-serif"></font></font></td>
    <td><font color="#000000" size="2"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $IP; ?></font></font></td>
  </tr>
  <tr>
    <td><font color="#000000" size="2"><font face="Arial, Helvetica, sans-serif">Date/Time: </font></font></td>
    <td><font color="#000000" size="2"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font></font></td>
  </tr>
</table>
	  
	  
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
  #</font></strong><font face="Arial, Helvetica, sans-serif">: <strong><? echo $Question; ?> </strong></font></font></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
	<?
	
		$sql8 = "SELECT * from tblSurveyAnswers WHERE QuestionID = '$QuestionID' AND Status = 'active'";
		
		$result8 = mysql_query($sql8) or die("Cannot retrieve question info, please try again.");
		
		while($row8 = mysql_fetch_array($result8))
		{
		$Answer = $row8[Answer];
		$AnswerID = $row8[AnswerID];
	
				
				
				$sql9 = "SELECT Count(AnswerID) as TotalCount from tblSurveyQA WHERE QuestionID = '$QuestionID' AND Status = 'active' AND AnswerID <> '0' AND OtherText <> '' AND SurveyID = '$SurveyID'";
				//echo $sql9;
				$result9 = mysql_query($sql9) or die("Cannot retrieve answer info, please try again.");
				
				while($row9 = mysql_fetch_array($result9))
					{
					$TotalCount = $row9[TotalCount];
					}

				$sql2 = "SELECT Count(AnswerID) as AnswerCount from tblSurveyQA WHERE QuestionID = '$QuestionID' AND AnswerID = '$AnswerID' AND Status = 'active' AND SurveyID = '$SurveyID'";
				//echo $sql2;
				$result2 = mysql_query($sql2) or die("Cannot retrieve answer info, please try again.");
				
				while($row2 = mysql_fetch_array($result2))
				{
				$AnswerCount = $row2[AnswerCount];
				

				if($AnswerCount == 0)
				{
				$AnswerCount = "-";
				}
						
		
	?>
	
	
	
	   <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Answer; ?>
		
							<? 
					  $sql7 = "SELECT OtherText, SurveyID, Count(OtherText) as Count FROM tblSurveyQA WHERE OtherText <> '' AND Status = 'active' AND AnswerID = '$AnswerID'  AND SurveyID = '$SurveyID' GROUP BY OtherText";
					  $result7 = mysql_query($sql7) or die("Cannot get other text");
					  
					  while($row7 = mysql_fetch_array($result7))
					  {
						  $OtherText = $row7[OtherText];
						  $SurveyID = $row7[SurveyID];
						  $Count = $row7[Count];
					  	
							if($OtherText == '')
							{
							$OtherText = '-';
							}
						
											  ?>
												<li><? echo $OtherText; ?></li>   
												
												<?

					  }
					  ?>
	  </font></td>
      <td width="15%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $AnswerCount; ?></font></td>
	  				 
	  
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
