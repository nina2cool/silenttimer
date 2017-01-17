<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

#This is the second post purchase survey created on October 26, 2005.


		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		$now = date("Y-m-d H:i:s");
		$IP = $_SERVER["REMOTE_ADDR"];
		
		if ($_POST['Submit'] == "Submit")
		{

		$Person = $_POST['Person'];
			
		$sql = "INSERT INTO tblSurvey(FirstName, DateTime, SurveyName, IP)
		VALUES('$Person', '$now', 'Peer', '$IP')";
		$result = mysql_query($sql) or die("Cannot insert survey, please try again.");
		
		$sql3 = "SELECT * FROM tblSurvey WHERE DateTime = '$now' AND SurveyName = 'Peer' AND IP = '$IP'";
		$result3 = mysql_query($sql3) or die("Cannot find survey, please try again.");
		
		while($row3 = mysql_fetch_array($result3))
	
		{
		$SurveyID = $row3[SurveyID];
		}
		
		#questions 1-4
		$a113 = $_POST['a113'];
		$a114 = $_POST['a114'];
		$a115 = $_POST['a115'];
		$a116 = $_POST['a116'];
		
		if($a113 == "") { $a113 = 0; }
		if($a114 == "") { $a114 = 0; }
		if($a115 == "") { $a115 = 0; }
		if($a116 == "") { $a116 = 0; }
		
				$sql113 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status, Person)
				VALUES('$SurveyID', '113', '$a113', 'active', '$Person')";
				mysql_query($sql113) or die("Cannot insert answers for q1, please try again.");
				
				$sql114 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status, Person)
				VALUES('$SurveyID', '114', '$a114', 'active', '$Person')";
				mysql_query($sql114) or die("Cannot insert answers for q2, please try again.");
				
				$sql115 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status, Person)
				VALUES('$SurveyID', '115', '$a115', 'active', '$Person')";
				mysql_query($sql115) or die("Cannot insert answers for q3, please try again.");
		
				$sql116 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status, Person)
				VALUES('$SurveyID', '116', '$a116', 'active', '$Person')";
				mysql_query($sql116) or die("Cannot insert answers for q4, please try again.");
		
		# Questions 5-7
		$a117 = $_POST['a117'];
		$a118 = $_POST['a118'];
		$a119 = $_POST['a119'];
		
		$sql117 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status, Person)
		VALUES('$SurveyID', '117', '486', '$a117', 'active', '$Person')";
		//echo "sql5 = " .$sql117;
		mysql_query($sql117) or die("Cannot insert comments for q5, please try again.");

		$sql118 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status, Person)
		VALUES('$SurveyID', '118', '487', '$a118', 'active', '$Person')";
		//echo "sql6 = " .$sql118;
		mysql_query($sql118) or die("Cannot insert comments for q6, please try again.");

		$sql119 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status, Person)
		VALUES('$SurveyID', '119', '488', '$a119', 'active', '$Person')";
		//echo "sql7 = " .$sql119;
		mysql_query($sql119) or die("Cannot insert comments for q7, please try again.");
		
		$goto = "BFpeer.php";
		header("location: $goto");


		//echo "<p align='center'><font color='#CC0000' size='4' face='Arial, Helvetica, sans-serif'>Thank you for your input.  To review another peer, please fill out the form again.  Thanks!</font></p>";
		
		
		} # // end if submit
		
		
		?><title>BestFit Peer Survey</title>
		<p><font face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="5">BestFit Media Peer Review</font></strong></font></p>
		<p><font size="2" face="Arial, Helvetica, sans-serif">All fields are required - if you don't have a comment to add just put &quot;n/a&quot;.</font></p>
		<p><strong><font size="4" face="Arial, Helvetica, sans-serif">NO APOSTROPHES!!!!</font></strong></p>
<form name="form1" method="post" action="">
              <table width="100%"  border="0" cellspacing="0" cellpadding="5">
                <tr bgcolor="#FFFFCC">
                  <td width="27%"><font size="2" face="Arial, Helvetica, sans-serif">Person you are reviewing:</font></td>
                  <td width="73%"><font size="2" face="Arial, Helvetica, sans-serif">
                    <select name="Person" class="text" id="Person">
                      <option value = "" selected="selected">Please Select</option>
                      <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT Person
								FROM tblBestFit
								
								ORDER BY Person";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot get BestFit name!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
                      <option value="<? echo $row[Person];?>" <? if($row[Person] == $Person){echo "selected";}?>><? echo $row[Person];?></option>
                      <?
						}
					?>
                    </select>
                  </font></td>
                </tr>
              </table>
              <p><font size="4" face="Arial, Helvetica, sans-serif">1.</font><font size="2" face="Arial, Helvetica, sans-serif"> Would you work with this person again? </font></p>
  <blockquote>
                <p>
                    
                <font size="2" face="Arial, Helvetica, sans-serif">
    <input name="a113" type="radio" value="1">
    1 - Strongly Disagree    <br>
    <input name="a113" type="radio" value="2" />
    2 - Disagree<br>
    <input name="a113" type="radio" value="3" /> 
    3 - Neither Agree nor Disagree
    <br>
    <input name="a113" type="radio" value="4" />
    4 - Agree<br>
    <input name="a113" type="radio" value="5" />
    5 - Strongly Agree</font></p>
              </blockquote>
              <p><font size="4" face="Arial, Helvetica, sans-serif">2.</font> <font size="2" face="Arial, Helvetica, sans-serif">Did you feel that this person was dependable? </font></p>
              <blockquote>
                <p><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="a114" type="radio" value="1" />
1 - Strongly Disagree <br />
<input name="a114" type="radio" value="2" />
2 - Disagree<br />
<input name="a114" type="radio" value="3" />
3 - Neither Agree nor Disagree <br />
<input name="a114" type="radio" value="4" />
4 - Agree<br />
<input name="a114" type="radio" value="5" />
5 - Strongly Agree</font></p>
              </blockquote>
              <p><font size="4" face="Arial, Helvetica, sans-serif">3.</font><font size="2" face="Arial, Helvetica, sans-serif"> Do you think this person knows enough to do their job effectively?</font></p>
              <blockquote>
                <p><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="a115" type="radio" value="1" />
1 - Strongly Disagree <br />
<input name="a115" type="radio" value="2" />
2 - Disagree<br />
<input name="a115" type="radio" value="3" />
3 - Neither Agree nor Disagree <br />
<input name="a115" type="radio" value="4" />
4 - Agree<br />
<input name="a115" type="radio" value="5" />
5 - Strongly Agree</font></p>
  </blockquote>
              <p><font size="4" face="Arial, Helvetica, sans-serif">4.</font> <font size="2" face="Arial, Helvetica, sans-serif">Do you think the client enjoyed working with this person?</font></p>
              <blockquote>
<p><font size="2" face="Arial, Helvetica, sans-serif">
  <input name="a116" type="radio" value="1" />
1 - Strongly Disagree <br />
<input name="a116" type="radio" value="2" />
2 - Disagree<br />
<input name="a116" type="radio" value="3" />
3 - Neither Agree nor Disagree <br />
<input name="a116" type="radio" value="4" />
4 - Agree<br />
<input name="a116" type="radio" value="5" />
5 - Strongly Agree<br />
</font><font size="2" face="Arial, Helvetica, sans-serif">
  <input name="a116" type="radio" value="0" />
6 - Not Applicable</font></p>
<p>&nbsp;</p>
  </blockquote>
              <p><strong><font size="3" face="Arial, Helvetica, sans-serif">CONTINUE - START - STOP</font></strong></p>
              <p><font size="4" face="Arial, Helvetica, sans-serif">5.</font><font size="2" face="Arial, Helvetica, sans-serif"> Please
                identify specific areas where this person should &quot;Continue&quot; what they are currently doing. This would include areas where they have strengths or are exceeding expectations.</font><br>
                <textarea name="a117" cols="75" rows="6" id="a117"></textarea>
                          </p>
              <p>&nbsp;</p>
              <p><font size="4" face="Arial, Helvetica, sans-serif">6.</font><font size="2" face="Arial, Helvetica, sans-serif"> Please identify specific actions this person should &ldquo;Start&rdquo; doing to improve and grow.</font><br />
                  <textarea name="a118" cols="75" rows="6" id="a118"></textarea>
</p>
              <p>&nbsp;</p>
              <p><font size="4" face="Arial, Helvetica, sans-serif">7.</font><font size="2" face="Arial, Helvetica, sans-serif"> Please identify actions this person should &ldquo;Stop&rdquo; doing to improve his/her performance and increase customer satisfaction. </font><br />
                  <textarea name="a119" cols="75" rows="6" id="a119"></textarea>
<br>
              </p>
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
		
?>
            </font></p>
