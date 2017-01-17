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

#This is the second post purchase survey created on October 26, 2005.


		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		$now = date("Y-m-d H:i:s");
		$IP = $_SERVER["REMOTE_ADDR"];
		
		if ($_POST['Submit'] == "Submit")
		{

		$FirstName = $_POST['FirstName'];
		$LastName = $_POST['LastName'];
		$Email = $_POST['Email'];
		
			
		$sql = "INSERT INTO tblSurvey(FirstName, LastName, Email, DateTime, SurveyName, IP)
		VALUES('$FirstName', '$LastName', '$Email', '$now', 'PP2', '$IP')";
		$result = mysql_query($sql) or die("Cannot insert survey, please try again.");
		
		$sql3 = "SELECT * FROM tblSurvey WHERE DateTime = '$now' AND Email = '$Email'";
		$result3 = mysql_query($sql3) or die("Cannot find survey, please try again.");
		
			while($row = mysql_fetch_array($result3))
		
				{
				$SurveyID = $row[SurveyID];
				}
		
		# Additonal comments box
		$Comments = $_POST['Comments'];
		
		if($Comments <> "")
		{
		$sql34 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
		VALUES('$SurveyID', '35', '0', '$Comments', 'active')";
		mysql_query($sql34) or die("Cannot insert comments for q35, please try again.");
		}
		
		
		$sql5 = "SELECT * FROM tblSurveyQuestions WHERE Status = 'active' AND SurveyName = 'PP2' AND Display = 'y'";
		$result5 = mysql_query($sql5) or die("Cannot find survey, please try again.");
		
			while($row5 = mysql_fetch_array($result5))
		
				{
				$CheckAll = $row5[CheckAll];
				$QuestionNum = $row5[QuestionID];
				
							if($CheckAll == 'n')
							{
									
									if($QuestionNum == 16)
									{
									$Answer = $_POST['16'];
									}
									elseif($QuestionNum == 17)
									{
									$Answer = $_POST['17'];
									}
									elseif($QuestionNum == 18)
									{
									$Answer = $_POST['18'];
									}
									elseif($QuestionNum == 19)
									{
									$Answer = $_POST['19'];
									}
									elseif($QuestionNum == 20)
									{
									$Answer = $_POST['20'];
									}
									elseif($QuestionNum == 21)
									{
									$Answer = $_POST['21'];
									}
									elseif($QuestionNum == 22)
									{
									$Answer = $_POST['22'];
									}
									elseif($QuestionNum == 23)
									{
									$Answer = $_POST['23'];
									}
									elseif($QuestionNum == 24)
									{
									$Answer = $_POST['24'];
									}
									elseif($QuestionNum == 25)
									{
									$Answer = $_POST['25'];
									}
									else
									{
									$Answer = '0';
									}
									
								
									# for this answer, see if it has OTHER text.  If it does, get it and insert it!
									$AnswerText = "";
										
									if($Answer == '68')
									{
									$AnswerText = $_POST['68Text'];
									}
									elseif($Answer == '70')
									{
									$AnswerText = $_POST['70Text'];
									}
									elseif($Answer == '71')
									{
									$AnswerText = $_POST['71Text'];
									}
									elseif($Answer == '78')
									{
									$AnswerText = $_POST['78Text'];
									}
									elseif($Answer == '87')
									{
									$AnswerText = $_POST['87Text'];
									}
									elseif($Answer == '103')
									{
									$AnswerText = $_POST['103Text'];
									}
									elseif($Answer == '104')
									{
									$AnswerText = $_POST['104Text'];
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
									/*
									
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
										
										*/
										
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
									
							
							# // end else
							
				} # // end while
		
		
		mail("info@silenttimer.com", "New Timer Survey - PP2", "New PP2 survey entry for $now...from $FirstName $LastName", "From:Timer Survey");

		echo "<p align='center'><font color='#CC0000' size='4' face='Arial, Helvetica, sans-serif'>Thank you for your input! Your feedback will help benefit other students.</font></p>";
		
		
		} # // end if submit
		
		
		?>
		<p><font face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="5">Post-Purchase
		        Survey</font></strong></font></p>
		<p><font color="#000000" size="3"><font face="Arial, Helvetica, sans-serif">The
		      results of this survey are only for our private use</font><font color="#000000" size="3"><font face="Arial, Helvetica, sans-serif"> (read
		      our <a href="http://www.silenttimer.com/legal/privacy.php" target="_blank">privacy
		      policy</a>)</font></font><font face="Arial, Helvetica, sans-serif">.
		      We just want to know your thoughts about The Silent Timer&#8482; now
		      that you have bought it. If you think of anything else you'd like to
		      comment on, please <a href="mailto:info@silenttimer.com">email us</a>. </font><font color="#000000" size="3"><font size="3" face="Arial, Helvetica, sans-serif">Learn
		      more about the gift certificate drawing <a href="surveyinfopp1.php" target="_blank">here</a>. </font></font></font></p>
		<form name="form1" method="post" action="">
              <font size="2" face="Arial, Helvetica, sans-serif">              If any of the
              following questions do not apply to you, leave that question blank.
              You can use the &quot;reset&quot; button at the bottom to clear
              your answers and start over.</font><br>
              <br>
              <table width="100%"  border="0" cellspacing="5" cellpadding="5">
                <tr>
                  <?
		
		$sql = "SELECT * FROM tblSurveyQuestions WHERE Status = 'active' AND SurveyName = 'PP2' AND Display = 'y'";
		$result = mysql_query($sql) or die("Cannot execute query");

		while($row = mysql_fetch_array($result))
		
		{
				$Question = $row[Question];
				$QuestionID = $row[QuestionID];
				$CheckAll = $row[CheckAll];

				
?>
                  <td bgcolor="#FFFFCC"><p><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Question; ?></font></p>
                  </td>
                </tr>
                <tr>
                  <?
				
					$sql2 = "SELECT * FROM tblSurveyAnswers WHERE QuestionID = '$QuestionID'";
					$result2 = mysql_query($sql2) or die("Cannot execute query");
					
					while($row2 = mysql_fetch_array($result2))
					
					{
					$Answer = $row2[Answer];
					$Other = $row2[Other];
					$AnswerID = $row2[AnswerID];
					
					
								
				
				  if($Other == 'y')
				  {
				  ?>
                  <td><p><font size="2" face="Arial, Helvetica, sans-serif">
                  <?
							  if($CheckAll == 'n')
							  {
									  ?>
                  <input name="<? echo $QuestionID; ?>" type="radio" value="<? echo $AnswerID; ?>">
                  <?php echo $Answer; ?>
                  <input name="<? echo $AnswerID; ?>Text" type="text" id="<? echo $AnswerID; ?>Text" maxlength="255"> 
                  </font> <font size="2" face="Arial, Helvetica, sans-serif">
                  <?
							  }
							  else
							  {
									  ?>
                  <input name="<? echo $QuestionID; ?>[]" type="checkbox" id="<? echo $AnswerID; ?>" value="<? echo $AnswerID; ?>">
                  <?php echo $Answer; ?>
                  <input name="<? echo $AnswerID; ?>Text" type="text" id="<? echo $AnswerID; ?>Text" maxlength="255">
                  <?
				   				}
								?>
                  </font></p>
                  </td>
                  <?
				   }
				   else
				   {
							   ?>
                  <td><p><font size="2" face="Arial, Helvetica, sans-serif">
                  <?
							  if($CheckAll == 'n')
							  {
									  ?>
                  <input name="<? echo $QuestionID; ?>" type="radio" value="<? echo $AnswerID; ?>">
                  <?php echo $Answer; ?> </font> <font size="2" face="Arial, Helvetica, sans-serif">
                  <?
							  }
							  else
							  {
									  ?>
                  <input name="<? echo "$QuestionID"; ?>[]" type="checkbox" id="<? echo $AnswerID; ?>" value="<? echo $AnswerID; ?>">
                  <?php echo $Answer; ?>
                  <?
							   }
							   ?>
                  </font></p>
                  </td>
                  <?
						}
						?>
                </tr>
                <?
				
				}
				
				}
				
				
							
				
				
				?>
              </table>
              <p><font size="2" face="Arial, Helvetica, sans-serif">Use the space
                  below if you wish to make any additional comments about The
                  Silent Timer&#8482;: </font><br>
                  <textarea name="Comments" cols="75" rows="6" id="Comments"></textarea>
</p>
              <table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFCC">
                <tr>
                  <td width="20%"><font size="2" face="Arial, Helvetica, sans-serif">First
                      Name: </font></td>
                  <td width="80%"><input name="FirstName" type="text" id="FirstName" maxlength="50">
                      <font size="2" face="Arial, Helvetica, sans-serif">(optional)</font></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Last
                      Name: </font></td>
                  <td><input name="LastName" type="text" id="LastName" maxlength="50">
                      <font size="2" face="Arial, Helvetica, sans-serif">(optional)</font></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Email:</font></td>
                  <td><input name="Email" type="text" id="Email" maxlength="255">
                      <font size="2" face="Arial, Helvetica, sans-serif">(optional)
                      - required if you wish to entered in the <a href="surveyinfopp1.php" target="_blank">drawing
                      for a $25 gift certificate</a></font></td>
                </tr>
              </table>
              <p>&nbsp;</p>
              <p>
                <input type="submit" name="Submit" value="Submit">
                <input type="reset" name="Reset" value="Reset">
</p>
</form>
            <p align="left">&nbsp;</p>
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
