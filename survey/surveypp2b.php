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

	$CustomerID = $_GET['cust'];
	
#This is the second post purchase survey created on October 26, 2005.


		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		
		$sql4 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
		$result4 = mysql_query($sql4) or die("Cannot find customer info, please try again.");
		
		while($row4 = mysql_fetch_array($result4))
		
		{
		$FirstName = $row4[FirstName];
		$LastName = $row4[LastName];
		$Email = $row4[Email];
		}
		
		
		$now = date("Y-m-d H:i:s");
		$IP = $_SERVER["REMOTE_ADDR"];
		
		if ($_POST['Submit'] == "Submit")
		{

		$FirstName = $_POST['FirstName'];
		$LastName = $_POST['LastName'];
		$Email = $_POST['Email'];
		
			
		$sql = "INSERT INTO tblSurvey(FirstName, LastName, Email, DateTime, SurveyName, IP, CustomerID)
		VALUES('$FirstName', '$LastName', '$Email', '$now', 'PP2B', '$IP', '$CustomerID')";
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
		VALUES('$SurveyID', '64', '0', '$Comments', 'active')";
		mysql_query($sql34) or die("Cannot insert comments for q64, please try again.");
		}
		
		
		$sql5 = "SELECT * FROM tblSurveyQuestions WHERE Status = 'active' AND SurveyName = 'PP2B' AND Display = 'y'";
		$result5 = mysql_query($sql5) or die("Cannot find survey, please try again.");
		
			while($row5 = mysql_fetch_array($result5))
		
				{
				$CheckAll = $row5[CheckAll];
				$QuestionNum = $row5[QuestionID];
				
							if($CheckAll == 'n')
							{
									
									if($QuestionNum == 55)
									{
									$Answer = $_POST['55'];
									}
									elseif($QuestionNum == 56)
									{
									$Answer = $_POST['56'];
									}
									elseif($QuestionNum == 57)
									{
									$Answer = $_POST['57'];
									}
									elseif($QuestionNum == 58)
									{
									$Answer = $_POST['58'];
									}
									elseif($QuestionNum == 59)
									{
									$Answer = $_POST['59'];
									}
									elseif($QuestionNum == 60)
									{
									$Answer = $_POST['60'];
									}
									elseif($QuestionNum == 61)
									{
									$Answer = $_POST['61'];
									}
									elseif($QuestionNum == 62)
									{
									$Answer = $_POST['62'];
									}
									elseif($QuestionNum == 63)
									{
									$Answer = $_POST['63'];
									}
									elseif($QuestionNum == 64)
									{
									$Answer = $_POST['64'];
									}
									else
									{
									$Answer = '0';
									}
									
								
									# for this answer, see if it has OTHER text.  If it does, get it and insert it!
									$AnswerText = "";
										
									if($Answer == '247')
									{
									$AnswerText = $_POST['247Text'];
									}
									elseif($Answer == '249')
									{
									$AnswerText = $_POST['249Text'];
									}
									elseif($Answer == '250')
									{
									$AnswerText = $_POST['250Text'];
									}
									elseif($Answer == '257')
									{
									$AnswerText = $_POST['257Text'];
									}
									elseif($Answer == '268')
									{
									$AnswerText = $_POST['268Text'];
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
		
		
		mail("info@silenttimer.com", "New Timer Survey - PP2B", "New PP2B survey entry for $now...from $FirstName $LastName", "From:Timer Survey");

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
		      comment on, please <a href="mailto:info@silenttimer.com">email us</a>.</font></font></p>
		<form name="form1" method="post" action="">
              <font size="2" face="Arial, Helvetica, sans-serif">              If any of the
              following questions do not apply to you, leave that question blank.
              You can use the &quot;reset&quot; button at the bottom to clear
              your answers and start over.</font><br>
              <br>
              <table width="100%"  border="0" cellspacing="5" cellpadding="5">
                <tr>
                  <?
		
		$sql = "SELECT * FROM tblSurveyQuestions WHERE Status = 'active' AND SurveyName = 'PP2B' AND Display = 'y' ORDER BY Question";
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
                  <td width="80%"><input name="FirstName" type="text" id="FirstName" value="<? echo $FirstName; ?>" maxlength="50">
                  </td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Last
                      Name: </font></td>
                  <td><input name="LastName" type="text" id="LastName" value="<? echo $LastName; ?>" maxlength="50">
                  </td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Email:</font></td>
                  <td><input name="Email" type="text" id="Email" value="<? echo $Email; ?>" maxlength="255">
                  </td>
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
