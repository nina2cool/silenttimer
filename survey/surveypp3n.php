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
		VALUES('$FirstName', '$LastName', '$Email', '$now', 'PP3N', '$IP')";
		$result = mysql_query($sql) or die("Cannot insert survey, please try again.");
		
		$sql3 = "SELECT * FROM tblSurvey WHERE DateTime = '$now' AND Email = '$Email'";
		//echo $SurveyID;
		$result3 = mysql_query($sql3) or die("Cannot find survey, please try again.");
		
			while($row = mysql_fetch_array($result3))
		
				{
				$SurveyID = $row[SurveyID];
				}


		
		#question 105
		$a457 = $_POST['a457'];
		$a457other = $_POST['a457other'];
		if($a457 == 'y')
		{
				$sql105 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status, OtherText)
				VALUES('$SurveyID', '105', '457', 'active', '$a457other')";
				mysql_query($sql105) or die("Cannot insert answers for q105, please try again.");
		}
		
								
		
		#questions 106,107
		$a106 = $_POST['a106'];
		$a107 = $_POST['a107'];
		
		if($a106 == "") { $a106 = 0; }
		if($a107 == "") { $a107 = 0; }
		
				$sql106 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '106', '$a106', 'active')";
				mysql_query($sql106) or die("Cannot insert answers for q106, please try again.");
		
				$sql107 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '107', '$a107', 'active')";
				mysql_query($sql107) or die("Cannot insert answers for q107, please try again.");		
				
			

		# Additonal comments box
		$Comments = $_POST['Comments'];
		
		if($Comments <> "")
		{
		$sql34 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
		VALUES('$SurveyID', '111', '0', '$Comments', 'active')";
		mysql_query($sql34) or die("Cannot insert comments for q111, please try again.");
		}
		
		mail("info@silenttimer.com", "New Timer Survey - PP3N", "New PP3N survey entry for $now...from $FirstName $LastName  ($Email)", "From:Timer Survey");

		echo "<p align='center'><font color='#CC0000' size='4' face='Arial, Helvetica, sans-serif'>Thank you for your input! Your feedback will help benefit other students.</font></p>";
		
		
		} # // end if submit
		
		
		?>

<p><font face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="5">Post-Purchase
  Survey for SilentTimer.com</font></strong></font></p>
<p><font color="#000000" size="3"><font face="Arial, Helvetica, sans-serif">The
  results of this survey are only for our private use (read our <a href="http://www.silenttimer.com/legal/privacy.php" target="_blank">privacy
  policy</a>). We just want to know your thoughts about the product</font><font size="3" face="Arial, Helvetica, sans-serif"> now
  that you have bought it. If you think of anything else you'd like
  to comment on, please <a href="mailto:info@silenttimer.com">email us</a>.</font></font></p>
<form name="form1" method="post" action="">
  <p><font size="2" face="Arial, Helvetica, sans-serif">If any of
    the following questions do not apply to you, leave that question
    blank. You can use the &quot;reset&quot; button at the bottom to clear
    your answers and start over. </font></p>
  <p> <font size="4" face="Arial, Helvetica, sans-serif">1.</font><font size="2" face="Arial, Helvetica, sans-serif"> &nbsp;Which item did you purchase?</font> </p>
  <blockquote>
    <p><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a457" type="checkbox" id="a457" value="y" checked="checked" />
      Specify in the blank:
      <input name="a457other" type="text" id="a457other" size="15" maxlength="20" />
      <br>
      </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">2.</font> <font size="2" face="Arial, Helvetica, sans-serif">How satisfied are you with your  SilentTimer.com purchase?</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a106" type="radio" value="458">
      Very satisfied<br>
      <input name="a106" type="radio" value="459">
      Somewhat satisfied<br>
      <input name="a106" type="radio" value="460">
      Not sure<br>
      <input name="a106" type="radio" value="461">
      Somewhat dissatisfied<br>
      <input name="a106" type="radio" value="462">
      Very dissatisfied</font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">3.</font> <font size="2" face="Arial, Helvetica, sans-serif">Would you recommend our products to someone else taking the same exam?</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a107" type="radio" value="463" />
      Yes<br />
      <input name="a107" type="radio" value="464" />
      No<br />
      </font></p>
  </blockquote>
  <p><font size="2" face="Arial, Helvetica, sans-serif">Use the space below
    if you wish to make any additional comments about your order: </font><br>
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
  <br>
  <p><font size="2" face="Courier New, Courier, monospace"><strong><em>If you wish to be entered in the drawing for the Barnes &amp; Noble $10 gift certificate, please give us your name and email address.</em></strong></font> </p>
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
