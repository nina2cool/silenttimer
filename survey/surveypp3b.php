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
		VALUES('$FirstName', '$LastName', '$Email', '$now', 'PP3B', '$IP')";
		$result = mysql_query($sql) or die("Cannot insert survey, please try again.");
		
		$sql3 = "SELECT * FROM tblSurvey WHERE DateTime = '$now' AND Email = '$Email'";
		//echo $SurveyID;
		$result3 = mysql_query($sql3) or die("Cannot find survey, please try again.");
		
			while($row = mysql_fetch_array($result3))
		
				{
				$SurveyID = $row[SurveyID];
				}


		#question 82
		$a356 = $_POST['a356'];
		if($a356 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '82', '356', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q82, please try again.");
		}
		$a357 = $_POST['a357'];
		if($a357 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '82', '357', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q82, please try again.");
		}
		$a358 = $_POST['a358'];
		if($a358 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '82', '358', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q82, please try again.");
		}
		$a359 = $_POST['a359'];
		if($a359 == 'y')
		{
				$sql66 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '82', '359', 'active')";
				mysql_query($sql66) or die("Cannot insert answers for q82, please try again.");
		}
		$a360 = $_POST['a360'];
		$a360other = $_POST['a360other'];
		if($a360 == 'y')
		{
				$sql98 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status, OtherText)
				VALUES('$SurveyID', '82', '360', 'active', '$a360other')";
				mysql_query($sql98) or die("Cannot insert answers for q82, please try again.");
		}
		
		#question 83
		$a361 = $_POST['a361'];
		if($a361 == 'y')
		{
				$sql83 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '83', '361', 'active')";
				mysql_query($sql83) or die("Cannot insert answers for q83, please try again.");
		}
		$a362 = $_POST['a362'];
		if($a362 == 'y')
		{
				$sql83 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '83', '362', 'active')";
				mysql_query($sql83) or die("Cannot insert answers for q83, please try again.");
		}
		$a363 = $_POST['a363'];
		if($a363 == 'y')
		{
				$sql83 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '83', '363', 'active')";
				mysql_query($sql83) or die("Cannot insert answers for q83, please try again.");
		}
		$a364 = $_POST['a364'];
		if($a364 == 'y')
		{
				$sql83 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '83', '364', 'active')";
				mysql_query($sql83) or die("Cannot insert answers for q83, please try again.");
		}
		$a365 = $_POST['a365'];
		if($a365 == 'y')
		{
				$sql83 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '83', '365', 'active')";
				mysql_query($sql83) or die("Cannot insert answers for q83, please try again.");
		}
		$a366 = $_POST['a366'];
		if($a366 == 'y')
		{
				$sql83 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '83', '366', 'active')";
				mysql_query($sql83) or die("Cannot insert answers for q83, please try again.");
		}
		$a367 = $_POST['a367'];
		if($a367 == 'y')
		{
				$sql83 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '83', '367', 'active')";
				mysql_query($sql83) or die("Cannot insert answers for q83, please try again.");
		}
		$a368 = $_POST['a368'];
		if($a368 == 'y')
		{
				$sql83 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '83', '368', 'active')";
				mysql_query($sql83) or die("Cannot insert answers for q83, please try again.");
		}



		#question 91
		$a398 = $_POST['a398'];
		if($a398 == 'y')
		{
				$sql91 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '91', '398', 'active')";
				mysql_query($sql91) or die("Cannot insert answers for q91, please try again.");
		}
		$a399 = $_POST['a399'];
		if($a399 == 'y')
		{
				$sql91 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '91', '399', 'active')";
				mysql_query($sql91) or die("Cannot insert answers for q91, please try again.");
		}
		$a400 = $_POST['a400'];
		if($a400 == 'y')
		{
				$sql91 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '91', '400', 'active')";
				mysql_query($sql91) or die("Cannot insert answers for q91, please try again.");
		}
		$a401 = $_POST['a401'];
		if($a401 == 'y')
		{
				$sql91 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '91', '401', 'active')";
				mysql_query($sql91) or die("Cannot insert answers for q91, please try again.");
		}								


		#question 92
		$a402 = $_POST['a402'];
		if($a402 == 'y')
		{
				$sql92 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '92', '402', 'active')";
				mysql_query($sql92) or die("Cannot insert answers for q92, please try again.");
		}
		$a403 = $_POST['a403'];
		if($a403 == 'y')
		{
				$sql92 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '92', '403', 'active')";
				mysql_query($sql92) or die("Cannot insert answers for q92, please try again.");
		}
		$a404 = $_POST['a404'];
		if($a404 == 'y')
		{
				$sql92 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '92', '404', 'active')";
				mysql_query($sql92) or die("Cannot insert answers for q92, please try again.");
		}
		$a405 = $_POST['a405'];
		if($a405 == 'y')
		{
				$sql92 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '92', '405', 'active')";
				mysql_query($sql92) or die("Cannot insert answers for q92, please try again.");
		}
		
		#questions 84,85,86,87,88,89,90,93,94,95,96,97
		$a84 = $_POST['a84'];
		$a85 = $_POST['a85'];
		$a86 = $_POST['a86'];
		$a87 = $_POST['a87'];
		$a88 = $_POST['a88'];
		$a89 = $_POST['a89'];
		$a90 = $_POST['a90'];
		$a93 = $_POST['a93'];
		$a94 = $_POST['a94'];
		$a95 = $_POST['a95'];
		$a96 = $_POST['a96'];
		$a97 = $_POST['a97'];
		
		if($a84 == "") { $a84 = 0; }
		if($a85 == "") { $a85 = 0; }
		if($a86 == "") { $a86 = 0; }
		if($a87 == "") { $a87 = 0; }
		if($a88 == "") { $a88 = 0; }
		if($a89 == "") { $a89 = 0; }
		if($a90 == "") { $a90 = 0; }
		if($a93 == "") { $a93 = 0; }
		if($a94 == "") { $a94 = 0; }
		if($a95 == "") { $a95 = 0; }
		if($a96 == "") { $a96 = 0; }
		if($a97 == "") { $a97 = 0; }
		
				$sql84 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '84', '$a84', 'active')";
				mysql_query($sql84) or die("Cannot insert answers for q84, please try again.");
		
				$sql85 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '85', '$a85', 'active')";
				mysql_query($sql85) or die("Cannot insert answers for q85, please try again.");		
				
				$sql86 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '86', '$a86', 'active')";
				mysql_query($sql86) or die("Cannot insert answers for q86, please try again.");		
				
				$sql87 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '87', '$a87', 'active')";
				mysql_query($sql87) or die("Cannot insert answers for q87, please try again.");		
				
				$sql88 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '88', '$a88', 'active')";
				mysql_query($sql88) or die("Cannot insert answers for q88, please try again.");		
				
				$sql89 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '89', '$a89', 'active')";
				mysql_query($sql89) or die("Cannot insert answers for q89, please try again.");	
				
				$sql90 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '90', '$a90', 'active')";
				mysql_query($sql90) or die("Cannot insert answers for q90, please try again.");		
				
				$sql93 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '93', '$a93', 'active')";
				mysql_query($sql93) or die("Cannot insert answers for q93, please try again.");
				
				$sql94 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '94', '$a94', 'active')";
				mysql_query($sql94) or die("Cannot insert answers for q94, please try again.");
				
				$sql95 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '95', '$a95', 'active')";
				mysql_query($sql95) or die("Cannot insert answers for q95, please try again.");
				
				$sql96 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '96', '$a96', 'active')";
				mysql_query($sql96) or die("Cannot insert answers for q96, please try again.");
				
				$sql97 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '97', '$a97', 'active')";
				mysql_query($sql97) or die("Cannot insert answers for q97, please try again.");
		
		# Additonal comments box
		$Comments = $_POST['Comments'];
		
		if($Comments <> "")
		{
		$sql34 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
		VALUES('$SurveyID', '112', '0', '$Comments', 'active')";
		mysql_query($sql34) or die("Cannot insert comments for q112, please try again.");
		}
		
		mail("info@silenttimer.com", "New Timer Survey - PP3B", "New PP3B survey entry for $now...from $FirstName $LastName  ($Email)", "From:Timer Survey");

		echo "<p align='center'><font color='#CC0000' size='4' face='Arial, Helvetica, sans-serif'>Thank you for your input! Your feedback will help benefit other students.</font></p>";
		
		
		} # // end if submit
		
		
		?>

<p><font face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="5">Post-Purchase
  Survey for The Silent Timer&#8482; and Silent Digital Watch</font></strong></font></p>
<p><font color="#000000" size="3"><font face="Arial, Helvetica, sans-serif">The
  results of this survey are only for our private use (read our <a href="http://www.silenttimer.com/legal/privacy.php" target="_blank">privacy
  policy</a>). We just want to know your thoughts about The Silent Timer</font><font size="3" face="Arial, Helvetica, sans-serif">&#8482; and Silent Digital Watch now
  that you have bought them. If you think of anything else you'd like
  to comment on, please <a href="mailto:info@silenttimer.com">email us</a>.</font></font></p>
<form name="form1" method="post" action="">
  <p><font size="2" face="Arial, Helvetica, sans-serif">If any of
    the following questions do not apply to you, leave that question
    blank. You can use the &quot;reset&quot; button at the bottom to clear
    your answers and start over. </font></p>
  <p><font size="4" face="Arial, Helvetica, sans-serif">1.</font><font size="2" face="Arial, Helvetica, sans-serif"> &nbsp;Why did you purchase both products? (check all that apply)</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a356" type="checkbox" id="a356" value="y" />
      One for practice, one for test day<br />
      <input name="a357" type="checkbox" id="a357" value="y" />
      Not sure which product I would prefer<br />
      <input name="a358" type="checkbox" id="a358" value="y" />
      Kept one, gave one to a friend<br />
      <input name="a359" type="checkbox" id="a359" value="y" />
      Wanted to have a backup<br />
      <input name="a360" type="checkbox" id="a360" value="y" />
      Other (please explain):
      <input name="a360other" type="text" id="a360other" size="15"/>
      <br />
      </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">2.</font><font size="2" face="Arial, Helvetica, sans-serif"> &nbsp;Which
    of the following Silent Timer&#8482; features did you utilize in <em><strong>PRACTICING</strong></em> for
    your exam? (check all that apply)</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a361" type="checkbox" id="a361" value="y">
      Flashing red light<br>
      <input name="a362" type="checkbox" id="a362" value="y">
      Auto Mode <br>
      <input name="a363" type="checkbox" id="a363" value="y">
      Passage Mode <br>
      <input name="a364" type="checkbox" id="a364" value="y">
      Clock<br>
      <input name="a365" type="checkbox" id="a365" value="y">
      Count down / count up only <br>
      <input name="a366" type="checkbox" id="a366" value="y">
      Time per Question feature <br>
      <input name="a367" type="checkbox" id="a367" value="y">
      Preset Buttons (LSAT, MCAT, etc)<br>
      <input name="a368" type="checkbox" id="a368" value="y">
      Memory Buttons (MEM1 &amp; MEM2)</font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">3.</font><font size="2" face="Arial, Helvetica, sans-serif"> Did you use The Silent Timer on test day? </font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a84" type="radio" value="369" />
      Yes - without a problem.<br />
      <input name="a84" type="radio" value="370" />
      Yes - but the proctor asked me about it.<br />
      <input name="a84" type="radio" value="371" />
      No - did not bring it to test center.<br />
      <input name="a84" type="radio" value="372" />
      No - proctor would not allow it. <br />
      </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">4.</font><font size="2" face="Arial, Helvetica, sans-serif"> How effective was The Silent Timer in improving your pacing?</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a85" type="radio" value="373" />
      Very effective <br />
      <input name="a85" type="radio" value="374" />
      Somewhat effective <br />
      <input name="a85" type="radio" value="375" />
      Not effective<br />
      <input name="a85" type="radio" value="376" />
      Not sure<br />
      </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">5.</font><font size="2" face="Arial, Helvetica, sans-serif"> Do you believe the price of The Silent Timer&#8482; is:</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a86" type="radio" value="377" />
      Very low <br />
      <input name="a86" type="radio" value="378" />
      Somewhat low <br />
      <input name="a86" type="radio" value="379" />
      Reasonable <br />
      <input name="a86" type="radio" value="380" />
      Somewhat high <br />
      <input name="a86" type="radio" value="381" />
      Very high </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">6.</font><font size="2" face="Arial, Helvetica, sans-serif"> Would you say the value of The Silent Timer&#8482;, as compared
    to its price, is:</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a87" type="radio" value="382" />
      Excellent <br />
      <input name="a87" type="radio" value="383" />
      Good <br />
      <input name="a87" type="radio" value="384" />
      Average <br />
      <input name="a87" type="radio" value="385" />
      Poor <br />
      <input name="a87" type="radio" value="386" />
      Very poor</font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">7.</font> <font size="2" face="Arial, Helvetica, sans-serif">How satisfied are you with your Silent Timer purchase?</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a88" type="radio" value="387">
      Very satisfied<br>
      <input name="a88" type="radio" value="388">
      Somewhat satisfied<br>
      <input name="a88" type="radio" value="389">
      Not sure<br>
      <input name="a88" type="radio" value="390">
      Somewhat dissatisfied<br>
      <input name="a88" type="radio" value="391">
      Very dissatisfied</font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">8.</font> <font size="2" face="Arial, Helvetica, sans-serif">Would you recommend The Silent Timer to someone else taking the same exam?</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a89" type="radio" value="392" />
      Yes<br />
      <input name="a89" type="radio" value="393" />
      No</font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">9.</font><font size="2" face="Arial, Helvetica, sans-serif"> Did you use the Silent Digital Watch on test day? </font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a90" type="radio" value="394" />
      Yes - without a problem.<br />
      <input name="a90" type="radio" value="395" />
      Yes - but the proctor asked me about it.<br />
      <input name="a90" type="radio" value="396" />
      No - did not bring it to test center.<br />
      <input name="a90" type="radio" value="397" />
      No - proctor would not allow it. </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">10.</font><font size="2" face="Arial, Helvetica, sans-serif"> &nbsp;Which
    of the following Silent Digital Watch features did you utilize in <em><strong>PRACTICING</strong></em> for
    your exam? (check all that apply)</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a398" type="checkbox" id="a398" value="y" />
      Clock<br />
      <input name="a399" type="checkbox" id="a399" value="y" />
      Count Up<br />
      <input name="a400" type="checkbox" id="a400" value="y" />
      Count Down<br />
      <input name="a401" type="checkbox" id="a401" value="y" />
      Backlight<br />
      </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">11.</font><font size="2" face="Arial, Helvetica, sans-serif"> &nbsp;Which
    of the following features did you utilize<strong><em> ON TEST DAY (if applicable)</em></strong>? (check
    all that apply)</font></p>
  <blockquote>
    <p><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a402" type="checkbox" id="a402" value="y" />
      Clock<br />
      <input name="a403" type="checkbox" id="a403" value="y" />
      Count Up<br />
      <input name="a404" type="checkbox" id="a404" value="y" />
      Count Down<br />
      <input name="a405" type="checkbox" id="a405" value="y" />
      Backlight</font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">12.</font><font size="2" face="Arial, Helvetica, sans-serif"> How effective was the Silent Digital Watch in improving your pacing?</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a93" type="radio" value="406" />
      Very effective <br />
      <input name="a93" type="radio" value="407" />
      Somewhat effective <br />
      <input name="a93" type="radio" value="408" />
      Not effective<br />
      <input name="a93" type="radio" value="409" />
      Not sure<br />
      </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">13.</font><font size="2" face="Arial, Helvetica, sans-serif"> Do you believe the price of the Silent Digital Watch is:</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a94" type="radio" value="410" />
      Very low <br />
      <input name="a94" type="radio" value="411" />
      Somewhat low <br />
      <input name="a94" type="radio" value="412" />
      Reasonable <br />
      <input name="a94" type="radio" value="413" />
      Somewhat high <br />
      <input name="a94" type="radio" value="414" />
      Very high </font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">14.</font><font size="2" face="Arial, Helvetica, sans-serif"> Would you say the value of the Silent Digital Watch, as compared
    to its price, is:</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a95" type="radio" value="415" />
      Excellent <br />
      <input name="a95" type="radio" value="416" />
      Good <br />
      <input name="a95" type="radio" value="417" />
      Average <br />
      <input name="a95" type="radio" value="418" />
      Poor <br />
      <input name="a95" type="radio" value="419" />
      Very poor</font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">15.</font> <font size="2" face="Arial, Helvetica, sans-serif">How satisfied are you with your Silent Digital Watch purchase?</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a96" type="radio" value="420" />
      Very satisfied<br />
      <input name="a96" type="radio" value="421" />
      Somewhat satisfied<br />
      <input name="a96" type="radio" value="422" />
      Not sure<br />
      <input name="a96" type="radio" value="423" />
      Somewhat dissatisfied<br />
      <input name="a96" type="radio" value="424" />
      Very dissatisfied</font></p>
  </blockquote>
  <p><font size="4" face="Arial, Helvetica, sans-serif">16.</font> <font size="2" face="Arial, Helvetica, sans-serif">Would you recommend the Silent Digital Watch to someone else taking the same exam?</font></p>
  <blockquote>
    <p> <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="a97" type="radio" value="425" />
      Yes<br />
      <input name="a97" type="radio" value="426" />
      No</font><font size="2" face="Arial, Helvetica, sans-serif"><br />
      </font></p>
  </blockquote>
  <p><font size="2" face="Arial, Helvetica, sans-serif">Use the space below
    if you wish to make any additional comments about The Silent
    Timer&#8482; and Silent Digital Watch: </font><br>
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
