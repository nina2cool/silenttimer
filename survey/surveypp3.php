<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
<?
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		$now = date("Y-m-d H:i:s");
		
		if ($_POST['Submit'] == "Submit")
		{

		$FirstName = $_POST['FirstName'];
		$LastName = $_POST['LastName'];
		$Email = $_POST['Email'];
			
		$sql = "INSERT INTO tblSurvey(FirstName, LastName, Email, DateTime)
		VALUES('$FirstName', '$LastName', '$Email', '$now')";
		$result = mysql_query($sql) or die("Cannot insert survey, please try again.");
		
		$sql3 = "SELECT * FROM tblSurvey WHERE DateTime = '$now' AND Email = '$Email'";
		$result3 = mysql_query($sql3) or die("Cannot find survey, please try again.");
		
			while($row = mysql_fetch_array($result3))
		
				{
				$SurveyID = $row[SurveyID];
				}
		
		
		
		
		$sql5 = "SELECT * FROM tblSurveyQuestions WHERE Status = 'active'";
		$result5 = mysql_query($sql5) or die("Cannot find survey, please try again.");
		
			while($row5 = mysql_fetch_array($result5))
		
				{
				$CheckAll = $row5[CheckAll];
				$QuestionNum = $row5[QuestionID];
				
							if($CheckAll == 'n')
							{
									
									if($QuestionNum == 2)
									{
									$Answer = $_POST['2'];
									}
									elseif($QuestionNum == 3)
									{
									$Answer = $_POST['3'];
									}
									elseif($QuestionNum == 4)
									{
									$Answer = $_POST['4'];
									}
									elseif($QuestionNum == 5)
									{
									$Answer = $_POST['5'];
									}
									elseif($QuestionNum == 6)
									{
									$Answer = $_POST['6'];
									}
									elseif($QuestionNum == 8)
									{
									$Answer = $_POST['8'];
									}
									elseif($QuestionNum == 10)
									{
									$Answer = $_POST['10'];
									}
									elseif($QuestionNum == 11)
									{
									$Answer = $_POST['11'];
									}
									elseif($QuestionNum == 12)
									{
									$Answer = $_POST['12'];
									}
									elseif($QuestionNum == 13)
									{
									$Answer = $_POST['13'];
									}
									elseif($QuestionNum == 14)
									{
									$Answer = $_POST['14'];
									}
									elseif($QuestionNum == 15)
									{
									$Answer = $_POST['15'];
									}
									else
									{
									$Answer = '0';
									}
									
								
									# for this answer, see if it has OTHER text.  If it does, get it and insert it!
									$AnswerText = "";
										
									if($Answer == '5')
									{
									$AnswerText = $_POST['5Text'];
									}
									elseif($Answer == '33')
									{
									$AnswerText = $_POST['33Text'];
									}
									elseif($Answer == '39')
									{
									$AnswerText = $_POST['39Text'];
									}
									elseif($Answer == '44')
									{
									$AnswerText = $_POST['44Text'];
									}
									elseif($Answer == '60')
									{
									$AnswerText = $_POST['60Text'];
									}
									else
									{
									$AnswerText = '';
									}
									
									# insert answer ID and text into tbl.
									$sql6 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
									VALUES('$SurveyID', '$QuestionNum', '$Answer', '$AnswerText', 'active')";
									
									//echo $sql6;
									
									mysql_query($sql6) or die("Cannot insert answers, please try again.");
									
							}
							else
							{
									
									# get answer arrays back from question number...
									if($QuestionNum == "1")
									{
										$Answer = $_POST[1];
									}
									elseif($QuestionNum == "7")
									{
										$Answer = $_POST[7];
									}
									elseif($QuestionNum == "9")
									{
										$Answer = $_POST[9];
									}
									
									# get count for array and loop through answers and insert each into db.
									$AnswerCount = count($Answer);
									//echo "Question Number: $QuestionNum  - Number of Answers: $AnswerCount<br><br>";
									
									for ($i=0; $i < $AnswerCount; $i++)
									{										
										# get answer text for OTHER blanks.
										$AnswerText = "";
											
										if($Answer[$i] == '5')
										{
										$AnswerText = $_POST['5Text'];
										}
										elseif($Answer[$i] == '33')
										{
										$AnswerText = $_POST['33Text'];
										}
										elseif($Answer[$i] == '39')
										{
										$AnswerText = $_POST['39Text'];
										}
										elseif($Answer[$i] == '44')
										{
										$AnswerText = $_POST['44Text'];
										}
										elseif($Answer[$i] == '60')
										{
										$AnswerText = $_POST['60Text'];
										}
										else
										{
										$AnswerText = '';
										}
										
										# insert answer ID and text into tbl.
										$sql6 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
										VALUES('$SurveyID', '$QuestionNum', '$Answer[$i]', '$AnswerText', 'active')";
										//echo "$sql6<br><br>";
										mysql_query($sql6) or die("Cannot insert answer text, please try again.");
										
										
									} # // END of FOR loop
									
									
									
									
									
									
									
									//if checkall = yes (where it is checkboxes)
									/*
									do
									{
									$Answer = $_POST['1'];
									$sql_answer = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
										VALUES('$SurveyID', '$QuestionNum', '$Answer', '$AnswerText', 'active')";
									
									}
									while($QuestionNum = 1);
do
									{
									$Answer = $_POST['7'];
									$sql_answer = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
										VALUES('$SurveyID', '$QuestionNum', '$Answer', '$AnswerText', 'active')";
									
									}
									while($QuestionNum = 7);

									
									do
									{
									$Answer = $_POST['9'];
									$sql_answer = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
										VALUES('$SurveyID', '$QuestionNum', '$Answer', '$AnswerText', 'active')";
									
									}
									while($QuestionNum = 9);
									
									*/
								
									# loop through all answers in this array
									/*foreach($Answer as $Value);
									{
										$sql_answer = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
										VALUES('$SurveyID', '$QuestionNum', '$Value', '$AnswerText', 'active')";
									} # // end for each
									
									/* $sql7 = "SELECT * FROM tblSurveyAnswers WHERE QuestionID = '$QuestionNum'";
									$result7 = mysql_query($sql7) or die("cannot get answers");
									
									while($row7 = mysql_fetch_array($result7))
									
										{
											$AnswerID = $row7[AnswerID];
										}
										
									if($AnswerID == '5')
									{
									$AnswerText = $_POST['5Text'];
									}
									elseif($AnswerID == '33')
									{
									$AnswerText = $_POST['33Text'];
									}
									elseif($AnswerID == '39')
									{
									$AnswerText = $_POST['39Text'];
									}
									elseif($AnswerID == '44')
									{
									$AnswerText = $_POST['44Text'];
									}
									elseif($AnswerID == '60')
									{
									$AnswerText = $_POST['60Text'];
									}
									
									$sql6 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
									VALUES('$SurveyID', '$QuestionNum', '$Answer', '$AnswerText', 'active')";
									
									
										if($Value == '5')
										{
										$AnswerText = $_POST['5Text'];
										
										$sql9 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
										VALUES('$SurveyID', '$QuestionNum', '$Value', '$AnswerText', 'active')";
										echo $sql9;
										}
										
										elseif($Value == '33')
										{
										$AnswerText = $_POST['33Text'];
										
										$sql10 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
										VALUES('$SurveyID', '$QuestionNum', '$Value', '$AnswerText', 'active')";
										echo $sql10;
										}
								
								
										elseif($Value == '39')
										{
										$AnswerText = $_POST['39Text'];
										
										$sql11 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
										VALUES('$SurveyID', '$QuestionNum', '$Value', '$AnswerText', 'active')";
										echo $sql11;
										}
										
										else
										{
										$sql8 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
										VALUES('$SurveyID', '$QuestionNum', '$Value', '$AnswerText', 'active')";
										
										echo $sql8;
										}
						
									 */
									
							
							} # // end else
							
				} # // end while
		
		
		mail("info@silenttimer.com", "New Timer Survey", "New survey entry for $now...from $FirstName $LastName", "From:Timer Survey");

		echo "<p align='center'><font color='#0000FF' size='4' face='Arial, Helvetica, sans-serif'>Thank you for your input. Your information will help benefit other students.  The winner will be picked at random on the last day of the month and then emailed.</font></p>";
		
		
		} # // end if submit
		
		
		?>
		<p><font face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="5">Post-Purchase Survey Information</font></strong></font></p>
		<p>&nbsp;</p>
<table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#53FF7E">
          <tr>
            <td><strong><font size="3" face="Arial, Helvetica, sans-serif">To participate in our survey, please select the product you purchased below:</font></strong></td>
  </tr>
        </table>
		<blockquote>
		  <p><strong><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif">&gt; </font></strong><font size="3" face="Arial, Helvetica, sans-serif"><a href="surveypp3st.php">The Silent Timer&#8482;</a></font></p>
		  <p><font size="3" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif">&gt; </font></strong><a href="surveypp3w.php">Silent Digital Watch</a></font></p>
		  <p><font size="3" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif">&gt; </font></strong><a href="surveypp3b.php">Both The Silent Timer&#8482; and Silent Digital Watch</a></font></p>
		  <p><font size="3" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif">&gt; </font></strong><a href="surveypp3tt.php">Test Day Timer or Silent Simple Timer</a></font></p>
		  <p><font size="3" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif">&gt; </font></strong><a href="surveypp3n.php">None of the Above</a></font></p>
		  <p><font size="2" face="Courier New, Courier, monospace"><strong><em>If you wish to be entered in the drawing for the Barnes &amp; Noble $10 gift certificate, please give us your name and email address.</em></strong></font></p>
</blockquote>
<p><font size="2" face="Arial, Helvetica, sans-serif">Your information is kept private and not shared with anyone else. Read our
          <a href="../legal/privacy.php">privacy policy</a> for more information.</font></p>
		<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>If you have any questions, please email us at <a href="mailto:info@silenttimer.com?subject=Survey%20Question">info@silenttimer.com</a>.</strong></font></p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
            <p align="left"><font face="Arial, Helvetica, sans-serif">
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
		mysql_close($link);
		
// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>
            </font></p>
