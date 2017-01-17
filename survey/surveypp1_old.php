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

#This is the second post purchase survey created on October 26, 2005.


		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		$now = date("Y-m-d H:i:s");
		
		if ($_POST['Submit'] == "Submit")
		{

		$FirstName = $_POST['FirstName'];
		$LastName = $_POST['LastName'];
		$Email = $_POST['Email'];
			
		$sql = "INSERT INTO tblSurvey(FirstName, LastName, Email, DateTime, SurveyName)
		VALUES('$FirstName', '$LastName', '$Email', '$now', 'PP1')";
		$result = mysql_query($sql) or die("Cannot insert survey, please try again.");
		
		$sql3 = "SELECT * FROM tblSurvey WHERE DateTime = '$now' AND Email = '$Email'";
		$result3 = mysql_query($sql3) or die("Cannot find survey, please try again.");
		
			while($row = mysql_fetch_array($result3))
		
				{
				$SurveyID = $row[SurveyID];
				}
		

		$sql5 = "SELECT * FROM tblSurveyQuestions WHERE Status = 'active' AND SurveyName = 'PP1'";
		//echo "<br>sql5 =" .$sql5;
		$result5 = mysql_query($sql5) or die("Cannot find survey, please try again.");
		
			while($row5 = mysql_fetch_array($result5))
		
				{
				$CheckAll = $row5[CheckAll];
				$QuestionNum = $row5[QuestionID];
				$Rank = $row5[Rank];
				
				echo "<br>Question Number= " .$QuestionNum;
				echo "<br>Check All= " .$CheckAll;
				echo "<br>Rank= " .$Rank;
				
				
							if($CheckAll == 'n' AND $Rank == 'n')
							{

									if($QuestionNum == 29)
									{
									$Answer = $_POST['29'];
									}
									elseif($QuestionNum == 30)
									{
									$Answer = $_POST['30'];
									}
									elseif($QuestionNum == 31)
									{
									$Answer = $_POST['31'];
									}
									elseif($QuestionNum == 32)
									{
									$Answer = $_POST['32'];
									}
									else
									{
									$Answer = '0';
									}
									
									# insert answer ID and text into tbl.
									$sql6 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
									VALUES('$SurveyID', '$QuestionNum', '$Answer', 'active')";
									
									echo "<br>n & n =" .$sql6;
									
									mysql_query($sql6) or die("Cannot insert answers, please try again.");
									
									
							}#end else for checkall=n and rank=n
							elseif($CheckAll == 'n' AND $Rank == 'y')
							{
							
									# get answer arrays back from question number...
									if($QuestionNum == "28")
									{
										$Answer = $_POST[28];
									}
									elseif($QuestionNum == "33")
									{
										$Answer = $_POST[33];
									}
									
									echo "<br>ANSWER= " .$Answer;
							
									# for this answer, see if it has OTHER text.  If it does, get it and insert it!
									$AnswerRank = "";
										
									if($Answer == '119')
									{
									$AnswerRank = $_POST['119Rank'];
									echo "<br>ANSWER RANK= " .$AnswerRank;
									}
									elseif($Answer == '120')
									{
									$AnswerRank = $_POST['120Rank'];
									}
									elseif($Answer == '121')
									{
									$AnswerRank = $_POST['121Rank'];
									}
									elseif($Answer == '122')
									{
									$AnswerRank = $_POST['122Rank'];
									}
									elseif($Answer == '123')
									{
									$AnswerRank = $_POST['123Rank'];
									}
									elseif($Answer == '124')
									{
									$AnswerRank = $_POST['124Rank'];
									}
									elseif($Answer == '125')
									{
									$AnswerRank = $_POST['125Rank'];
									}
									elseif($Answer == '150')
									{
									$AnswerRank = $_POST['150Rank'];
									}
									elseif($Answer == '151')
									{
									$AnswerRank = $_POST['151Rank'];
									}
									elseif($Answer == '152')
									{
									$AnswerRank = $_POST['152Rank'];
									}
									elseif($Answer == '153')
									{
									$AnswerRank = $_POST['153Rank'];
									}
									else
									{
									$AnswerRank = '';
									}
									
									
									
									# insert answer ID and text into tbl.
									$sql7 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
									VALUES('$SurveyID', '$QuestionNum', '$Answer', '$AnswerRank', 'active')";
									
									echo "<br>n & y = " .$sql7;
									
									mysql_query($sql7) or die("Cannot insert answers, please try again.");
									
									
							
							}#end else for checkall=n and rank=y
							elseif($CheckAll == 'y' AND $Rank == 'n')
							{		
									
									# get answer arrays back from question number...
									if($QuestionNum == "26")
									{
										$Answer = $_POST[26];
									}
									elseif($QuestionNum == "27")
									{
										$Answer = $_POST[27];
									}
									
									
									# get count for array and loop through answers and insert each into db.
									$AnswerCount = count($Answer);
									//echo "Question Number: $QuestionNum  - Number of Answers: $AnswerCount<br><br>";
									
									for ($i=0; $i < $AnswerCount; $i++)
									{										
										# get answer text for OTHER blanks.
										$AnswerText = "";
											
										if($Answer[$i] == '105')
										{
										$AnswerText = $_POST['105Text'];
										}
										elseif($Answer[$i] == '106')
										{
										$AnswerText = $_POST['106Text'];
										}
										elseif($Answer[$i] == '107')
										{
										$AnswerText = $_POST['107Text'];
										}
										elseif($Answer[$i] == '108')
										{
										$AnswerText = $_POST['108Text'];
										}
										elseif($Answer[$i] == '109')
										{
										$AnswerText = $_POST['109Text'];
										}
										elseif($Answer[$i] == '110')
										{
										$AnswerText = $_POST['110Text'];
										}
										elseif($Answer[$i] == '111')
										{
										$AnswerText = $_POST['111Text'];
										}
										elseif($Answer[$i] == '112')
										{
										$AnswerText = $_POST['112Text'];
										}
										elseif($Answer[$i] == '113')
										{
										$AnswerText = $_POST['113Text'];
										}
										elseif($Answer[$i] == '114')
										{
										$AnswerText = $_POST['114Text'];
										}
										elseif($Answer[$i] == '115')
										{
										$AnswerText = $_POST['115Text'];
										}
										elseif($Answer[$i] == '116')
										{
										$AnswerText = $_POST['116Text'];
										}
										elseif($Answer[$i] == '117')
										{
										$AnswerText = $_POST['117Text'];
										}
										elseif($Answer[$i] == '118')
										{
										$AnswerText = $_POST['118Text'];
										}
										
										else
										{
										$AnswerText = '';
										}
										
										# insert answer ID and text into tbl.
										$sql6 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
										VALUES('$SurveyID', '$QuestionNum', '$Answer[$i]', '$AnswerText', 'active')";
										echo "<br>checkall is y $sql6";
										mysql_query($sql6) or die("Cannot insert answer text, please try again.");
										
										
									} # // END of FOR loop
									
									
									
							} # // END of FOR loop
									

							
							# // end else
							
				} # // end while
		
		
		mail("info@silenttimer.com", "New Timer Survey - PP1", "New PP1 survey entry for $now...from $FirstName $LastName", "From:Timer Survey");

		echo "<p align='center'><font color='#0000FF' size='4' face='Arial, Helvetica, sans-serif'>Thank you for your input! Your information will help benefit other students.</font></p>";
		
		
		} # // end if submit
		
		
		?>
		<p><font face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="5">Post-Purchase
		        Survey</font></strong></font></p>
		<p><font color="#000000" size="3"><font face="Arial, Helvetica, sans-serif">The
		      results of this survey are only for our private use. We just want
		      to know your thoughts about The Silent Timer now that you have
		      bought it. If you think of anything else you'd like to comment
		      on, please <a href="mailto:info@silenttimer.com">email us</a>.</font></font></p>
		<form name="form1" method="post" action="">
              <table width="100%"  border="0" cellspacing="0" cellpadding="5">
                <tr>
                  <td width="20%"><font size="2" face="Arial, Helvetica, sans-serif">First
                      Name: </font></td>
                  <td width="80%"><input name="FirstName" type="text" id="FirstName" maxlength="50"></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Last
                      Name: </font></td>
                  <td><input name="LastName" type="text" id="LastName" maxlength="50"></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Email:</font></td>
                  <td><input name="Email" type="text" id="Email" maxlength="255"></td>
                </tr>
          </table>
              <br>
              <table width="100%"  border="0" cellspacing="5" cellpadding="5">
                <tr>
                  <?
		
		$sql = "SELECT * FROM tblSurveyQuestions WHERE Status = 'active' AND SurveyName = 'PP1'";
		$result = mysql_query($sql) or die("Cannot execute query");

		while($row = mysql_fetch_array($result))
		
		{
				$Question = $row[Question];
				$QuestionID = $row[QuestionID];
				$CheckAll = $row[CheckAll];
				$Rank = $row[Rank];

				
?>
                  <td bgcolor="#FFFF99"><p><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Question; ?></font></p>
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
							  if($CheckAll == 'n' AND $Rank == 'n')
							  {
									  ?>
                  <input name="<? echo $QuestionID; ?>" type="radio" value="<? echo $AnswerID; ?>">
                  <?php echo $Answer; ?> </font> <font size="2" face="Arial, Helvetica, sans-serif">
                  <?
							  }
							  elseif($CheckAll == 'y' AND $Rank == 'n')
							  {
									  ?>
                  <input name="<? echo "$QuestionID"; ?>[]" type="checkbox" id="<? echo $AnswerID; ?>" value="<? echo $AnswerID; ?>">
                  <?php echo $Answer; ?>
                  <?
							   }
							   elseif($Rank == 'y' AND $CheckAll == 'n')
							   {
							   ?>
							   <input name="<? echo "$QuestionID"; ?>[]" type="text" id="<? echo $AnswerID; ?>" size="1" maxlength="1">
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
              <table width="30%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">$</font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">$15-20</font></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">$$</font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">$20-25</font></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">$$$</font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">$25-30</font></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">$$$$</font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">$30+</font></td>
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
