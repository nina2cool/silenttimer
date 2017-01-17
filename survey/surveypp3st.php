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
		VALUES('$FirstName', '$LastName', '$Email', '$now', 'PP3ST', '$IP')";
		$result = mysql_query($sql) or die("Cannot insert survey, please try again.");
		
		$sql3 = "SELECT * FROM tblSurvey WHERE DateTime = '$now' AND Email = '$Email'";
		//echo $SurveyID;
		$result3 = mysql_query($sql3) or die("Cannot find survey, please try again.");
		
			while($row = mysql_fetch_array($result3))
		
				{
				$SurveyID = $row[SurveyID];
				}


		
		#question 66
		$a284 = $_POST['a284'];
		if($a284 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '66', '284', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q66, please try again.");
		}
		$a285 = $_POST['a285'];
		if($a285 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '66', '285', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q66, please try again.");
		}
		$a286 = $_POST['a286'];
		if($a286 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '66', '286', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q66, please try again.");
		}
		$a287 = $_POST['a287'];
		if($a287 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '66', '287', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q66, please try again.");
		}
		$a288 = $_POST['a288'];
		if($a288 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '66', '288', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q66, please try again.");
		}
		$a289 = $_POST['a289'];
		if($a289 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '66', '289', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q66, please try again.");
		}
		$a290 = $_POST['a290'];
		if($a290 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '66', '290', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q66, please try again.");
		}
		$a291 = $_POST['a291'];
		if($a291 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '66', '291', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q66, please try again.");
		}
								
		
		#questions 67,68,69,70,71,72
		$a67 = $_POST['a67'];
		$a68 = $_POST['a68'];
		$a69 = $_POST['a69'];
		$a70 = $_POST['a70'];
		$a71 = $_POST['a71'];
		$a72 = $_POST['a72'];
		
		if($a67 == "") { $a67 = 0; }
		if($a68 == "") { $a68 = 0; }
		if($a69 == "") { $a69 = 0; }
		if($a70 == "") { $a70 = 0; }
		if($a71 == "") { $a71 = 0; }
		if($a72 == "") { $a72 = 0; }
		
				$sql67 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '67', '$a67', 'active')";
				mysql_query($sql67) or die("Cannot insert answers for q67, please try again.");
		
				$sql68 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '68', '$a68', 'active')";
				mysql_query($sql68) or die("Cannot insert answers for q68, please try again.");		
				
				$sql69 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '69', '$a69', 'active')";
				mysql_query($sql69) or die("Cannot insert answers for q69, please try again.");		
				
				$sql70 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '70', '$a70', 'active')";
				mysql_query($sql70) or die("Cannot insert answers for q70, please try again.");		
				
				$sql71 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '71', '$a71', 'active')";
				mysql_query($sql71) or die("Cannot insert answers for q71, please try again.");		
				
				$sql72 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '72', '$a72', 'active')";
				mysql_query($sql72) or die("Cannot insert answers for q72, please try again.");		
		

		# Additonal comments box
		$Comments = $_POST['Comments'];
		
		if($Comments <> "")
		{
		$sql34 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
		VALUES('$SurveyID', '108', '0', '$Comments', 'active')";
		mysql_query($sql34) or die("Cannot insert comments for q108, please try again.");
		}
		
		mail("info@silenttimer.com", "New Timer Survey - PP3ST", "New PP3ST survey entry for $now...from $FirstName $LastName  ($Email)", "From:Timer Survey");

		echo "<p align='center'><font color='#CC0000' size='4' face='Arial, Helvetica, sans-serif'>Thank you for your input! Your feedback will help benefit other students.</font></p>";
		
		
		} # // end if submit
		
		
		?>

<p><font face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="5">Post-Purchase
  Survey for The Silent Timer&#8482;</font></strong></font></p>
<p><font color="#000000" size="3"><font face="Arial, Helvetica, sans-serif">The
  results of this survey are only for our private use (read our <a href="http://www.silenttimer.com/legal/privacy.php" target="_blank">privacy
  policy</a>). We just want to know your thoughts about The Silent Timer</font><font size="3" face="Arial, Helvetica, sans-serif">&#8482; now
  that you have bought it. If you think of anything else you'd like
  to comment on, please <a href="mailto:info@silenttimer.com">email us</a>.</font></font></p>
<form name="form1" method="post" action="">
  <p><font size="2" face="Arial, Helvetica, sans-serif">If any of
    the following questions do not apply to you, leave that question
    blank. You can use the &quot;reset&quot; button at the bottom to clear
    your answers and start over. </font></p>
  <p> <font size="4" face="Arial, Helvetica, sans-serif">1.</font><font size="2" face="Arial, Helvetica, sans-serif"> &nbsp;Which
    of the following Silent Timer&#8482; features did you utilize in <em><strong>PRACTICING</strong></em> for
    your exam? (check all that apply)</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a284" type="checkbox" id="a284" value="y">
      Flashing red light<br>
      <input name="a285" type="checkbox" id="a285" value="y">
      Auto Mode <br>
      <input name="a286" type="checkbox" id="a286" value="y">
      Passage Mode <br>
      <input name="a287" type="checkbox" id="a287" value="y">
      Clock<br>
      <input name="a288" type="checkbox" id="a288" value="y">
      Count down / count up only <br>
      <input name="a289" type="checkbox" id="a289" value="y">
      Time per Question feature <br>
      <input name="a290" type="checkbox" id="a290" value="y">
      Preset Buttons (LSAT, MCAT, etc)<br>
      <input name="a291" type="checkbox" id="a291" value="y">
      Memory Buttons (MEM1 &amp; MEM2)</font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">2.</font><font size="2" face="Arial, Helvetica, sans-serif"> Did you use The Silent Timer on test day? </font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a67" type="radio" value="292" />
      Yes - without a problem.<br />
      <input name="a67" type="radio" value="293" />
      Yes - but the proctor asked me about it.<br />
      <input name="a67" type="radio" value="294" />
      No - did not bring it to test center.<br />
      <input name="a67" type="radio" value="295" />
      No - proctor would not allow it. <br />
      </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">3.</font><font size="2" face="Arial, Helvetica, sans-serif"> How effective was The Silent Timer in improving your pacing?</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a68" type="radio" value="296" />
      Very effective <br />
      <input name="a68" type="radio" value="297" />
      Somewhat effective <br />
      <input name="a68" type="radio" value="298" />
      Not effective<br />
      <input name="a68" type="radio" value="299" />
      Not sure<br />
      </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">4.</font><font size="2" face="Arial, Helvetica, sans-serif"> Do you believe the price of The Silent Timer&#8482; is:</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a69" type="radio" value="300" />
      Very low <br />
      <input name="a69" type="radio" value="301" />
      Somewhat low <br />
      <input name="a69" type="radio" value="302" />
      Reasonable <br />
      <input name="a69" type="radio" value="303" />
      Somewhat high <br />
      <input name="a69" type="radio" value="304" />
      Very high </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">5.</font><font size="2" face="Arial, Helvetica, sans-serif"> Would you say the value of The Silent Timer&#8482;, as compared
    to its price, is:</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a70" type="radio" value="305" />
      Excellent <br />
      <input name="a70" type="radio" value="306" />
      Good <br />
      <input name="a70" type="radio" value="307" />
      Average <br />
      <input name="a70" type="radio" value="308" />
      Poor <br />
      <input name="a70" type="radio" value="309" />
      Very poor</font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">6.</font> <font size="2" face="Arial, Helvetica, sans-serif">How satisfied are you with your Silent Timer purchase?</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a71" type="radio" value="310">
      Very satisfied<br>
      <input name="a71" type="radio" value="311">
      Somewhat satisfied<br>
      <input name="a71" type="radio" value="312">
      Not sure<br>
      <input name="a71" type="radio" value="313">
      Somewhat dissatisfied<br>
      <input name="a71" type="radio" value="314">
      Very dissatisfied</font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">7.</font> <font size="2" face="Arial, Helvetica, sans-serif">Would you recommend The Silent Timer to someone else taking the same exam?</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a72" type="radio" value="315" />
      Yes<br />
      <input name="a72" type="radio" value="316" />
      No<br />
      </font></p>
  </blockquote>
  <p><font size="2" face="Arial, Helvetica, sans-serif">Use the space below
    if you wish to make any additional comments about The Silent
    Timer&#8482;: </font><br>
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
