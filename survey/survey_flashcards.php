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

#This is the market survey created on November 13, 2005 for Arif.


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
		VALUES('$FirstName', '$LastName', '$Email', '$now', 'Arif', '$IP')";
		$result = mysql_query($sql) or die("Cannot insert survey, please try again.");
		
		$sql3 = "SELECT * FROM tblSurvey WHERE DateTime = '$now' AND Email = '$Email'";
		$result3 = mysql_query($sql3) or die("Cannot find survey, please try again.");
		
			while($row = mysql_fetch_array($result3))
		
				{
				$SurveyID = $row[SurveyID];
				}

		$sql5 = "SELECT * FROM tblSurveyQuestions WHERE Status = 'active' AND SurveyName = 'Arif' AND Display = 'y'";
		$result5 = mysql_query($sql5) or die("Cannot find survey, please try again.");
		
			while($row5 = mysql_fetch_array($result5))
		
				{
				$CheckAll = $row5[CheckAll];
				$QuestionNum = $row5[QuestionID];
				
							if($CheckAll == 'n')
							{
									
									if($QuestionNum == 36)
									{
									$Answer = $_POST['36'];
									}
									elseif($QuestionNum == 37)
									{
									$Answer = $_POST['37'];
									}
									elseif($QuestionNum == 38)
									{
									$Answer = $_POST['38'];
									}
									elseif($QuestionNum == 39)
									{
									$Answer = $_POST['39'];
									}
									elseif($QuestionNum == 40)
									{
									$Answer = $_POST['40'];
									}
									elseif($QuestionNum == 41)
									{
									$Answer = $_POST['41'];
									}
									elseif($QuestionNum == 42)
									{
									$Answer = $_POST['42'];
									}
									elseif($QuestionNum == 43)
									{
									$Answer = $_POST['43'];
									}
									elseif($QuestionNum == 44)
									{
									$Answer = $_POST['44'];
									}
									elseif($QuestionNum == 45)
									{
									$Answer = $_POST['45'];
									}
									else
									{
									$Answer = '0';
									}
									
								
									# for this answer, see if it has OTHER text.  If it does, get it and insert it!
									$AnswerText = "";
										
									if($Answer == '160')
									{
									$AnswerText = $_POST['160Text'];
									
										if($AnswerText == '')
										{
										$Answer = 0;
										}
									
									}
									elseif($Answer == '175')
									{
									$AnswerText = $_POST['175Text'];
									
									if($AnswerText == '')
										{
										$Answer = 0;
										}
									}
									elseif($Answer == '184')
									{
									$AnswerText = $_POST['184Text'];
									
									if($AnswerText == '')
										{
										$Answer = 0;
										}
									}
									elseif($Answer == '185')
									{
									$AnswerText = $_POST['185Text'];
									
										if($AnswerText == '')
										{
										$Answer = 0;
										}
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
		
		
		mail("ArifAMomin@aol.com", "New Marketing Survey", "New Flashcard Marketing Survey entry for $now...from $FirstName $LastName  ($Email)", "From:Flashcard Marketing Survey");

		echo "<p align='center'><font color='#CC0000' size='4' face='Arial, Helvetica, sans-serif'>Thank you for your input! Your feedback will help benefit other students.</font></p>";
		
		
		} # // end if submit
		
		
		?>
		<p><font face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="5">Flashcards
		        Marketing Survey</font></strong></font></p>
		<p> <font size="2" face="Arial, Helvetica, sans-serif">For many years, flashcards have been proven to be one of the most effective
		  study methods used to retain a variety of information. But unfortunately,
		  majority of the population have refrained from using this technique because
	    it is thought to be a time-consuming and tiring process.</font></p>
		<p><font size="2" face="Arial, Helvetica, sans-serif"> <strong>Today, you will
		      be asked a few simple questions regarding a future product aimed primarily
		    to enhance the process of creating flashcards.</strong></font></p>
		<p><font size="2" face="Arial, Helvetica, sans-serif"> Before continuing with the survey, we would like to provide a brief overview
		  of the product and the process involved.</font></p>
		<blockquote>
		  <p> <FONT face=Arial size=2><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Arial"><FONT color=#ff0000><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Arial"><FONT color=#000000>A
		              method of creating portable electronic flashcards via computer
		              consists of a hand-held device and USB cord. The hand-held device
		              and the USB cord are provided.<o:p></o:p></FONT></SPAN></FONT></SPAN></FONT> <font size="2" face="Arial, Helvetica, sans-serif">The user will be able to
		      input the information onto a computer program and transfer the information
		      to the device using a USB cord. After the transfer is completed, the flashcards
		      can be reviewed virtually anywhere, and anytime. Users will also be able
		      to transfer flashcards from one device to another.</font></p>
		  <p><font size="2" face="Arial, Helvetica, sans-serif"> User may create question in the following formats: Multiple Choice, True/False,
		      Fill in the Blank, and Free Response. After the user marks a question as
		      correct or incorrect, the device will automatically create two distinct piles
		      labeled correct and incorrect. The studying process will end after the user
		      eliminates all flashcards in the incorrect pile.</font></p>
</blockquote>
		<p><font size="2" face="Arial, Helvetica, sans-serif"> Thank you in advance for participating in this market research. Your feedback
		  is greatly appreciated and will help us create a product to meet the needs
		  of students and others in various professions.</font></p>
		<form name="form1" method="post" action="">
              <font size="2" face="Arial, Helvetica, sans-serif">              <strong>If
              any of the following questions do not apply to you, leave that
              question blank. You can use the &quot;reset&quot; button at the
              bottom to clear your answers and start over.</strong></font><br>
              <br>
              <table width="100%"  border="0" cellspacing="5" cellpadding="5">
                <tr>
                  <?
		
		$sql = "SELECT * FROM tblSurveyQuestions WHERE Status = 'active' AND SurveyName = 'Arif' AND Display = 'y' AND QuestionID < '42'";
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
					$OtherBox = $row2[OtherBox];
					
								
				
				  if($Other == 'y')
				  {
				  ?>
                  <td><p><font size="2" face="Arial, Helvetica, sans-serif">
                  <?
							  if($CheckAll == 'n' AND $OtherBox == 'y')
							  {
						?>
                  <input name="<? echo $QuestionID; ?>" type="radio" value="<? echo $AnswerID; ?>" checked>
                  <?php echo $Answer; ?>
                  <textarea name="<? echo $AnswerID; ?>Text" cols="40" rows="4" id="<? echo $AnswerID; ?>Text"></textarea> 
                  </font> <font size="2" face="Arial, Helvetica, sans-serif">
                  <?
								}
								else
								{
								?>
								
					<input name="<? echo $QuestionID; ?>" type="radio" value="<? echo $AnswerID; ?>" checked>
                  <?php echo $Answer; ?>
                  <input name="<? echo $AnswerID; ?>Text" type="text" id="<? echo $AnswerID; ?>Text" value=""> 
                  </font> <font size="2" face="Arial, Helvetica, sans-serif">
								
								
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
              <p> <font size="2" face="Arial, Helvetica, sans-serif">The following
              questions are asked to help us define potential market segments.</font></p>
              <table width="100%"  border="0" cellspacing="5" cellpadding="5">
                <tr>
                  <?
		
		$sql = "SELECT * FROM tblSurveyQuestions WHERE Status = 'active' AND SurveyName = 'Arif' AND Display = 'y' AND QuestionID >= '42'";
		$result = mysql_query($sql) or die("Cannot execute query");

		while($row = mysql_fetch_array($result))
		
		{
				$Question = $row[Question];
				$QuestionID = $row[QuestionID];
				$CheckAll = $row[CheckAll];

				
?>
                  <td bgcolor="#FFFFCC"><p><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Question; ?></font></p></td>
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
					$OtherBox = $row2[OtherBox];
					
								
				
				  if($Other == 'y')
				  {
				  ?>
                  <td><p><font size="2" face="Arial, Helvetica, sans-serif">
                      <?
							  if($CheckAll == 'n' AND $OtherBox == 'y')
							  {
						?>
                      <input name="<? echo $QuestionID; ?>" type="radio" value="<? echo $AnswerID; ?>" checked>
                      <?php echo $Answer; ?>
                      <textarea name="<? echo $AnswerID; ?>Text" cols="40" rows="4" id="<? echo $AnswerID; ?>Text"></textarea>
                      </font> <font size="2" face="Arial, Helvetica, sans-serif">
                      <?
								}
								else
								{
								?>
                      <input name="<? echo $QuestionID; ?>" type="radio" value="<? echo $AnswerID; ?>" checked>
                      <?php echo $Answer; ?>
                      <input name="<? echo $AnswerID; ?>Text" type="text" id="<? echo $AnswerID; ?>Text" value="">
                      </font> <font size="2" face="Arial, Helvetica, sans-serif">
                      <?
								}
								?>
                  </font></p></td>
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
                  </font></p></td>
                  <?
						}
						?>
                </tr>
                <?
				
				}
				
				}
				
				
							
				
				
				?>
          </table>
              <br>
              <br>
              <table width="100%"  border="0" cellspacing="0" cellpadding="5">
                <tr bgcolor="#FFFFCC">
                  <td width="20%"><font size="2" face="Arial, Helvetica, sans-serif">First
                      Name: </font></td>
                  <td width="80%"><input name="FirstName" type="text" id="FirstName" maxlength="50">
                      <font size="2" face="Arial, Helvetica, sans-serif">(optional)</font></td>
                </tr>
                <tr bgcolor="#FFFFCC">
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Last
                      Name: </font></td>
                  <td><input name="LastName" type="text" id="LastName" maxlength="50">
                      <font size="2" face="Arial, Helvetica, sans-serif">(optional)</font></td>
                </tr>
                <tr bgcolor="#FFFFCC">
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Email:</font></td>
                  <td><input name="Email" type="text" id="Email" maxlength="255">
                      <font size="2" face="Arial, Helvetica, sans-serif">(optional)
                      - required if you wish to entered in the <a href="surveyinfo_flashcards.php" target="_blank">drawing
                  for a $50 gift certificate</a></font></td>
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
