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

#This is the third post purchase survey created on September 29, 2008.


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
		VALUES('$FirstName', '$LastName', '$Email', '$now', 'PP3W', '$IP')";
		$result = mysql_query($sql) or die("Cannot insert survey, please try again.");
		
		$sql3 = "SELECT * FROM tblSurvey WHERE DateTime = '$now' AND Email = '$Email'";
		//echo $SurveyID;
		$result3 = mysql_query($sql3) or die("Cannot find survey, please try again.");
		
			while($row = mysql_fetch_array($result3))
		
				{
				$SurveyID = $row[SurveyID];
				}


		
		#question 73
		$a317 = $_POST['a317'];
		if($a317 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '73', '317', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q73, please try again.");
		}
		$a318 = $_POST['a318'];
		if($a318 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '73', '318', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q73, please try again.");
		}
		$a319 = $_POST['a319'];
		if($a319 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '73', '319', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q73, please try again.");
		}
		$a320 = $_POST['a320'];
		if($a320 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '73', '320', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q73, please try again.");
		}
		$a321 = $_POST['a321'];
		if($a321 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '73', '321', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q73, please try again.");
		}
		$a322 = $_POST['a322'];
		$a322other = $_POST['a322other'];
		if($a322 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status, OtherText)
				VALUES('$SurveyID', '73', '322', 'active', '$a322other')";
				mysql_query($sql66) or die("Cannot insert answers for q73, please try again.");
		}
	
								

		#question 75
		$a327 = $_POST['a327'];
		if($a327 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '75', '327', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q75, please try again.");
		}
		$a328 = $_POST['a328'];
		if($a328 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '75', '328', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q75, please try again.");
		}
		$a329 = $_POST['a329'];
		if($a329 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '75', '329', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q75, please try again.");
		}
		$a330 = $_POST['a330'];
		if($a330 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '75', '330', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q75, please try again.");
		}
		
		
		#question 76
		$a331 = $_POST['a331'];
		if($a331 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '76', '331', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q76, please try again.");
		}
		$a332 = $_POST['a332'];
		if($a332 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '76', '332', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q76, please try again.");
		}
		$a333 = $_POST['a333'];
		if($a333 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '76', '333', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q76, please try again.");
		}
		$a334 = $_POST['a334'];
		if($a334 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '76', '334', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q76, please try again.");
		}
	
		
		#questions 74,77,78,79,80,81
		$a74 = $_POST['a74'];
		$a77 = $_POST['a77'];
		$a78 = $_POST['a78'];
		$a79 = $_POST['a79'];
		$a80 = $_POST['a80'];
		$a81 = $_POST['a81'];
		
		if($a74 == "") { $a74 = 0; }
		if($a77 == "") { $a77 = 0; }
		if($a78 == "") { $a78 = 0; }
		if($a79 == "") { $a79 = 0; }
		if($a80 == "") { $a80 = 0; }
		if($a81 == "") { $a81 = 0; }
		
				$sql74 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '74', '$a74', 'active')";
				mysql_query($sql74) or die("Cannot insert answers for q74, please try again.");
		
				$sql77 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '77', '$a77', 'active')";
				mysql_query($sql77) or die("Cannot insert answers for q77, please try again.");		
				
				$sql78 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '78', '$a78', 'active')";
				mysql_query($sql78) or die("Cannot insert answers for q78, please try again.");		
				
				$sql79 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '79', '$a79', 'active')";
				mysql_query($sql79) or die("Cannot insert answers for q79, please try again.");		
				
				$sql80 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '80', '$a80', 'active')";
				mysql_query($sql80) or die("Cannot insert answers for q80, please try again.");		
				
				$sql81 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '81', '$a81', 'active')";
				mysql_query($sql81) or die("Cannot insert answers for q81, please try again.");
				
				

		# Additonal comments box
		$Comments = $_POST['Comments'];
		
		if($Comments <> "")
		{
		$sql34 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
		VALUES('$SurveyID', '109', '0', '$Comments', 'active')";
		mysql_query($sql34) or die("Cannot insert comments for q109, please try again.");
		}
		
		mail("info@silenttimer.com", "New Timer Survey - PP3W", "New PP3W survey entry for $now...from $FirstName $LastName  ($Email)", "From:Timer Survey");

		echo "<p align='center'><font color='#CC0000' size='4' face='Arial, Helvetica, sans-serif'>Thank you for your input! Your feedback will help benefit other students.</font></p>";
		
		
		} # // end if submit
		
		
		?>

<p><font face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="5">Post-Purchase
  Survey for the Silent Digital Watch</font></strong></font></p>
<p><font color="#000000" size="3"><font face="Arial, Helvetica, sans-serif">The
  results of this survey are only for our private use (read our <a href="http://www.silenttimer.com/legal/privacy.php" target="_blank">privacy
  policy</a>). We just want to know your thoughts about the Silent Digital Watch</font><font size="3" face="Arial, Helvetica, sans-serif"> now
  that you have bought it. If you think of anything else you'd like
  to comment on, please <a href="mailto:info@silenttimer.com">email us</a>.</font></font></p>
<form name="form1" method="post" action="">
  <p><font size="2" face="Arial, Helvetica, sans-serif">If any of
    the following questions do not apply to you, leave that question
    blank. You can use the &quot;reset&quot; button at the bottom to clear
    your answers and start over. </font></p>
  <p> <font size="4" face="Arial, Helvetica, sans-serif">1.</font><font size="2" face="Arial, Helvetica, sans-serif"> &nbsp;Why did you purchase the Silent Digital Watch (verses a timer)? (check all that apply)</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a317" type="checkbox" id="a317" value="y">
      The watch is less expensive.<br>
      <input name="a318" type="checkbox" id="a318" value="y">
      Better value<br>
      <input name="a319" type="checkbox" id="a319" value="y">
      Prefer a watch to a timer<br>
      <input name="a320" type="checkbox" id="a320" value="y">
      Cannot use timer on test day, but I can use a watch<br>
      <input name="a321" type="checkbox" id="a321" value="y">
      Can be used regularly as a ton-test prep tool<br>
      <input name="a322" type="checkbox" id="a322" value="y">
      Other (please explain):
      <input name="a322other" type="text" id="a322other" size="15" maxlength="20" />
      <br>
      </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">2.</font><font size="2" face="Arial, Helvetica, sans-serif"> Did you use the Silent Digital Watch on test day? </font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a74" type="radio" value="323" />
      Yes - without a problem.<br />
      <input name="a74" type="radio" value="324" />
      Yes - but the proctor asked me about it.<br />
      <input name="a74" type="radio" value="325" />
      No - did not bring it to test center.<br />
      <input name="a74" type="radio" value="326" />
      No - proctor would not allow it. </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">3.</font><font size="2" face="Arial, Helvetica, sans-serif"> &nbsp;Which
    of the following Silent Digital Watch features did you utilize in <em><strong>PRACTICING</strong></em> for
    your exam? (check all that apply)</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a327" type="checkbox" id="a327" value="y" />
      Clock<br />
      <input name="a328" type="checkbox" id="a328" value="y" />
      Count Up<br />
      <input name="a329" type="checkbox" id="a329" value="y" />
      Count Down<br />
      <input name="a330" type="checkbox" id="a330" value="y" />
      Backlight<br />
      </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">4.</font><font size="2" face="Arial, Helvetica, sans-serif"> &nbsp;Which
    of the following features did you utilize<strong><em> ON TEST DAY (if applicable)</em></strong>? (check
    all that apply)</font></p>
  <blockquote>
    <p><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a331" type="checkbox" id="a331" value="y" />
      Clock<br />
      <input name="a332" type="checkbox" id="a332" value="y" />
      Count Up<br />
      <input name="a333" type="checkbox" id="a333" value="y" />
      Count Down<br />
      <input name="a334" type="checkbox" id="a334" value="y" />
      Backlight</font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">5.</font><font size="2" face="Arial, Helvetica, sans-serif"> How effective was the Silent Digital Watch in improving your pacing?</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a77" type="radio" value="335" />
      Very effective <br />
      <input name="a77" type="radio" value="336" />
      Somewhat effective <br />
      <input name="a77" type="radio" value="337" />
      Not effective<br />
      <input name="a77" type="radio" value="338" />
      Not sure<br />
      </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">6.</font><font size="2" face="Arial, Helvetica, sans-serif"> Do you believe the price of the Silent Digital Watch is:</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a78" type="radio" value="339" />
      Very low <br />
      <input name="a78" type="radio" value="340" />
      Somewhat low <br />
      <input name="a78" type="radio" value="341" />
      Reasonable <br />
      <input name="a78" type="radio" value="342" />
      Somewhat high <br />
      <input name="a78" type="radio" value="343" />
      Very high </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">7.</font><font size="2" face="Arial, Helvetica, sans-serif"> Would you say the value of the Silent Digital Watch, as compared
    to its price, is:</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a79" type="radio" value="344" />
      Excellent <br />
      <input name="a79" type="radio" value="345" />
      Good <br />
      <input name="a79" type="radio" value="346" />
      Average <br />
      <input name="a79" type="radio" value="347" />
      Poor <br />
      <input name="a79" type="radio" value="348" />
      Very poor</font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">8.</font> <font size="2" face="Arial, Helvetica, sans-serif">How satisfied are you with your Silent Digital Watch purchase?</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a80" type="radio" value="349">
      Very satisfied<br>
      <input name="a80" type="radio" value="350">
      Somewhat satisfied<br>
      <input name="a80" type="radio" value="351">
      Not sure<br>
      <input name="a80" type="radio" value="352">
      Somewhat dissatisfied<br>
      <input name="a80" type="radio" value="353">
      Very dissatisfied</font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">9.</font> <font size="2" face="Arial, Helvetica, sans-serif">Would you recommend the Silent Digital Watch to someone else taking the same exam?</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a81" type="radio" value="354" />
      Yes<br />
      <input name="a81" type="radio" value="355" />
      No<br />
      </font></p>
  </blockquote>
  <p><font size="2" face="Arial, Helvetica, sans-serif">Use the space below
    if you wish to make any additional comments about the Silent Digital Watch: </font><br>
    <textarea name="Comments" cols="75" rows="6" id="Comments"></textarea>
  </p>
  <table width="100%"  border="0" cellspacing="0" cellpadding="5">
    <tr bgcolor="#FFFFCC">
      <td width="20%"><font size="2" face="Arial, Helvetica, sans-serif">First
        Name: </font></td>
      <td width="80%"><input name="FirstName" type="text" id="FirstName" value="<? echo $FirstName; ?>" maxlength="50">
      </td>
    </tr>
    <tr bgcolor="#FFFFCC">
      <td><font size="2" face="Arial, Helvetica, sans-serif">Last
        Name: </font></td>
      <td><input name="LastName" type="text" id="LastName" value="<? echo $LastName; ?>" maxlength="50">
      </td>
    </tr>
    <tr bgcolor="#FFFFCC">
      <td><font size="2" face="Arial, Helvetica, sans-serif">Email:</font></td>
      <td><input name="Email" type="text" id="Email" value="<? echo $Email; ?>" maxlength="255">
      </td>
    </tr>
  </table>
  <font size="2" face="Courier New, Courier, monospace"><strong><em><br />
  If you wish to be entered in the drawing for the Barnes &amp; Noble $10 gift certificate, please give us your name and email address.</em></strong></font><br>
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
