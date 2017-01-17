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
		VALUES('$FirstName', '$LastName', '$Email', '$now', 'PP3TT', '$IP')";
		$result = mysql_query($sql) or die("Cannot insert survey, please try again.");
		
		$sql3 = "SELECT * FROM tblSurvey WHERE DateTime = '$now' AND Email = '$Email'";
		//echo $SurveyID;
		$result3 = mysql_query($sql3) or die("Cannot find survey, please try again.");
		
			while($row = mysql_fetch_array($result3))
		
				{
				$SurveyID = $row[SurveyID];
				}


		
		#question 98
		$a427 = $_POST['a427'];
		if($a427 == 'y')
		{
				$sql98 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '98', '427', 'active')";
				mysql_query($sql98) or die("Cannot insert answers for q98, please try again.");
		}
		$a428 = $_POST['a428'];
		if($a428 == 'y')
		{
				$sql98 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '98', '428', 'active')";
				mysql_query($sql98) or die("Cannot insert answers for q98, please try again.");
		}
		$a429 = $_POST['a429'];
		if($a429 == 'y')
		{
				$sql98 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '98', '429', 'active')";
				mysql_query($sql98) or die("Cannot insert answers for q98, please try again.");
		}
		$a430 = $_POST['a430'];
		if($a430 == 'y')
		{
				$sql98 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '98', '430', 'active')";
				mysql_query($sql98) or die("Cannot insert answers for q98, please try again.");
		}
		$a431 = $_POST['a431'];
		$a431other = $_POST['a431other'];
		if($a431 == 'y')
		{
				$sql98 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status, OtherText)
				VALUES('$SurveyID', '98', '431', 'active', '$a431other')";
				mysql_query($sql98) or die("Cannot insert answers for q98, please try again.");
		}
		
								
		
		#questions 99,100,101,102,103,104
		$a99 = $_POST['a99'];
		$a100 = $_POST['a100'];
		$a101 = $_POST['a101'];
		$a102 = $_POST['a102'];
		$a103 = $_POST['a103'];
		$a104 = $_POST['a104'];
		
		if($a99 == "") { $a99 = 0; }
		if($a100 == "") { $a100 = 0; }
		if($a101 == "") { $a101 = 0; }
		if($a102 == "") { $a102 = 0; }
		if($a103 == "") { $a103 = 0; }
		if($a104 == "") { $a104 = 0; }
		
				$sql99 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '99', '$a99', 'active')";
				mysql_query($sql99) or die("Cannot insert answers for q99, please try again.");
		
				$sql100 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '100', '$a100', 'active')";
				mysql_query($sql100) or die("Cannot insert answers for q100, please try again.");		
				
				$sql101 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '101', '$a101', 'active')";
				mysql_query($sql101) or die("Cannot insert answers for q101, please try again.");		
				
				$sql102 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '102', '$a102', 'active')";
				mysql_query($sql102) or die("Cannot insert answers for q102, please try again.");		
				
				$sql103 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '103', '$a103', 'active')";
				mysql_query($sql103) or die("Cannot insert answers for q103, please try again.");		
				
				$sql104 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '104', '$a104', 'active')";
				mysql_query($sql104) or die("Cannot insert answers for q104, please try again.");		
		

		# Additonal comments box
		$Comments = $_POST['Comments'];
		
		if($Comments <> "")
		{
		$sql34 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
		VALUES('$SurveyID', '110', '0', '$Comments', 'active')";
		mysql_query($sql34) or die("Cannot insert comments for q110, please try again.");
		}
		
		mail("info@silenttimer.com", "New Timer Survey - PP3TT", "New PP3TT survey entry for $now...from $FirstName $LastName  ($Email)", "From:Timer Survey");

		echo "<p align='center'><font color='#CC0000' size='4' face='Arial, Helvetica, sans-serif'>Thank you for your input! Your feedback will help benefit other students.</font></p>";
		
		
		} # // end if submit
		
		
		?>

<p><font face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="5">Post-Purchase
  Survey for the Test Day/Simple Timer</font></strong></font></p>
<p><font color="#000000" size="3"><font face="Arial, Helvetica, sans-serif">The
  results of this survey are only for our private use (read our <a href="http://www.silenttimer.com/legal/privacy.php" target="_blank">privacy
  policy</a>). We just want to know your thoughts about the Test Day/Simple Timer</font><font size="3" face="Arial, Helvetica, sans-serif"> now
  that you have bought it. If you think of anything else you'd like
  to comment on, please <a href="mailto:info@silenttimer.com">email us</a>.</font></font></p>
<form name="form1" method="post" action="">
  <p><font size="2" face="Arial, Helvetica, sans-serif">If any of
    the following questions do not apply to you, leave that question
    blank. You can use the &quot;reset&quot; button at the bottom to clear
    your answers and start over. </font></p>
  <p> <font size="4" face="Arial, Helvetica, sans-serif">1.</font><font size="2" face="Arial, Helvetica, sans-serif"> &nbsp;Why did you purchase the Test Day/Simple Timer (verses The Silent Timer&#8482;)? (check all that apply)</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a427" type="checkbox" id="a427" value="y">
      Worried The Silent Timer&#8482; would be too complicated<br>
      <input name="a428" type="checkbox" id="a428" value="y">
      Did not need the extra features<br>
      <input name="a429" type="checkbox" id="a429" value="y">
      Wanted something I might be able to use on test day<br>
      <input name="a430" type="checkbox" id="a430" value="y">
      Less expensive than The Silent Timer&#8482;<br>
      <input name="a431" type="checkbox" id="a431" value="y" />
      Other (please explain):
      <input name="a431other" type="text" id="a431other" size="15" maxlength="20" />
      <br>
      </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">2.</font><font size="2" face="Arial, Helvetica, sans-serif"> Did you use the Test Day/Simple Timer on test day? </font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a99" type="radio" value="432" />
      Yes - without a problem.<br />
      <input name="a99" type="radio" value="433" />
      Yes - but the proctor asked me about it.<br />
      <input name="a99" type="radio" value="434" />
      No - did not bring it to test center.<br />
      <input name="a99" type="radio" value="435" />
      No - proctor would not allow it. <br />
      </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">3.</font><font size="2" face="Arial, Helvetica, sans-serif"> How effective was the Test Day/Simple Timer in improving your pacing?</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a100" type="radio" value="436" />
      Very effective <br />
      <input name="a100" type="radio" value="437" />
      Somewhat effective <br />
      <input name="a100" type="radio" value="438" />
      Not effective<br />
      <input name="a100" type="radio" value="439" />
      Not sure<br />
      </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">4.</font><font size="2" face="Arial, Helvetica, sans-serif"> Do you believe the price of the Test Day/Simple Timer is:</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a101" type="radio" value="440" />
      Very low <br />
      <input name="a101" type="radio" value="441" />
      Somewhat low <br />
      <input name="a101" type="radio" value="442" />
      Reasonable <br />
      <input name="a101" type="radio" value="443" />
      Somewhat high <br />
      <input name="a101" type="radio" value="444" />
      Very high </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">5.</font><font size="2" face="Arial, Helvetica, sans-serif"> Would you say the value of the Test Day/Simple Timer, as compared
    to its price, is:</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a102" type="radio" value="445" />
      Excellent <br />
      <input name="a102" type="radio" value="446" />
      Good <br />
      <input name="a102" type="radio" value="447" />
      Average <br />
      <input name="a102" type="radio" value="448" />
      Poor <br />
      <input name="a102" type="radio" value="449" />
      Very poor</font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">6.</font> <font size="2" face="Arial, Helvetica, sans-serif">How satisfied are you with your  Test Day/Simple Timer purchase?</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a103" type="radio" value="450">
      Very satisfied<br>
      <input name="a103" type="radio" value="451">
      Somewhat satisfied<br>
      <input name="a103" type="radio" value="452">
      Not sure<br>
      <input name="a103" type="radio" value="453">
      Somewhat dissatisfied<br>
      <input name="a103" type="radio" value="454">
      Very dissatisfied</font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">7.</font> <font size="2" face="Arial, Helvetica, sans-serif">Would you recommend the Test Day/Simple Timer to someone else taking the same exam?</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a104" type="radio" value="455" />
      Yes<br />
      <input name="a104" type="radio" value="456" />
      No<br />
      </font></p>
  </blockquote>
  <p><font size="2" face="Arial, Helvetica, sans-serif">Use the space below
    if you wish to make any additional comments about the Test Day/Simple Timer: </font><br>
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
  <p><font size="2" face="Courier New, Courier, monospace"><strong><em>If you wish to be entered in the drawing for the Barnes &amp; Noble $10 gift certificate, please give us your name and email address.</em></strong></font><br>
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
		
// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>
  </font></p>
