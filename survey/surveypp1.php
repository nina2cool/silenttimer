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
		$IP = $_SERVER["REMOTE_ADDR"];
		
		if ($_POST['Submit'] == "Submit")
		{

		$FirstName = $_POST['FirstName'];
		$LastName = $_POST['LastName'];
		$Email = $_POST['Email'];
		$Test = $_POST['Test'];
			
		$sql = "INSERT INTO tblSurvey(FirstName, LastName, Email, DateTime, SurveyName, Test, IP)
		VALUES('$FirstName', '$LastName', '$Email', '$now', 'PP1', '$Test', '$IP')";
		$result = mysql_query($sql) or die("Cannot insert survey, please try again.");
		
		$sql3 = "SELECT * FROM tblSurvey WHERE DateTime = '$now' AND Test = '$Test' AND IP = '$IP'";
		$result3 = mysql_query($sql3) or die("Cannot find survey, please try again.");
		
		while($row = mysql_fetch_array($result3))
	
		{
		$SurveyID = $row[SurveyID];
		}
		
		#question 26
		$a105 = $_POST['a105'];
		if($a105 == 'y')
		{
				$sql26 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '26', '105', 'active')";
				mysql_query($sql26) or die("Cannot insert answers for q26, please try again.");
		}
		$a106 = $_POST['a106'];
		if($a106 == 'y')
		{
				$sql26 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '26', '106', 'active')";
				mysql_query($sql26) or die("Cannot insert answers for q26, please try again.");
		}
		$a107 = $_POST['a107'];
		if($a107 == 'y')
		{
				$sql26 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '26', '107', 'active')";
				mysql_query($sql26) or die("Cannot insert answers for q26, please try again.");
		}
		$a108 = $_POST['a108'];
		if($a108 == 'y')
		{
				$sql26 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '26', '108', 'active')";
				mysql_query($sql26) or die("Cannot insert answers for q26, please try again.");
		}
		$a109 = $_POST['a109'];
		if($a109 == 'y')
		{
				$sql26 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '26', '109', 'active')";
				mysql_query($sql26) or die("Cannot insert answers for q26, please try again.");
		}
		$a110 = $_POST['a110'];
		if($a110 == 'y')
		{
				$sql26 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '26', '110', 'active')";
				mysql_query($sql26) or die("Cannot insert answers for q26, please try again.");
		}
		$a111 = $_POST['a111'];
		if($a111 == 'y')
		{
				$sql26 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '26', '111', 'active')";
				mysql_query($sql26) or die("Cannot insert answers for q26, please try again.");
		}
		
		#question 27
		$a112 = $_POST['a112'];
		if($a112 == 'y')
		{
				$sql27 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '27', '112', 'active')";
				mysql_query($sql27) or die("Cannot insert answers for q27, please try again.");
		}
		$a113 = $_POST['a113'];
		if($a113 == 'y')
		{
				$sql27 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '27', '113', 'active')";
				mysql_query($sql27) or die("Cannot insert answers for q27, please try again.");
		}
		$a114 = $_POST['a114'];
		if($a114 == 'y')
		{
				$sql27 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '27', '114', 'active')";
				mysql_query($sql27) or die("Cannot insert answers for q27, please try again.");
		}
		$a115 = $_POST['a115'];
		if($a115 == 'y')
		{
				$sql27 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '27', '115', 'active')";
				mysql_query($sql27) or die("Cannot insert answers for q27, please try again.");		
		}
		$a116 = $_POST['a116'];
		if($a116 == 'y')
		{
				$sql27 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '27', '116', 'active')";
				mysql_query($sql27) or die("Cannot insert answers for q27, please try again.");		
		}
		$a117 = $_POST['a117'];
		if($a117 == 'y')
		{
				$sql27 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '27', '117', 'active')";
				mysql_query($sql27) or die("Cannot insert answers for q27, please try again.");
		}
		$a118 = $_POST['a118'];
		if($a118 == 'y')
		{
						$sql27 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '27', '118', 'active')";
				mysql_query($sql27) or die("Cannot insert answers for q27, please try again.");
		}
		#question 28
		$a119 = $_POST['a119'];
		$a120 = $_POST['a120'];
		$a121 = $_POST['a121'];
		$a122 = $_POST['a122'];
		$a123 = $_POST['a123'];
		$a124 = $_POST['a124'];
		$a125 = $_POST['a125'];
		
		if($a119 == 0 OR $a119 > 7)
		{  $a119 = 0; }
		
		if($a120 == 0 OR $a120 > 7)
		{  $a120 = 0; }
		
		if($a121 == 0 OR $a121 > 7)
		{  $a121 = 0; }

		if($a122 == 0 OR $a122 > 7)
		{  $a122 = 0; }

		if($a123 == 0 OR $a123 > 7)
		{  $a119 = 0; }
		
		if($a124 == 0 OR $a124 > 7)
		{  $a124 = 0; }
		
		if($a125 == 0 OR $a125 > 7)
		{  $a125 = 0; }
		
		$Sum28 = $a119 + $a120 + $a121 + $a122 + $a123 + $a124 + $a125;
		
		$Division28 = $Sum28 / 7;
		
		if($Division28 == $a119)
		{
		$a119 = 0;
		$a120 = 0;
		$a121 = 0;
		$a122 = 0;
		$a123 = 0;
		$a124 = 0;
		$a125 = 0;
		}
		
				$sql28 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '28', '119', '$a119', 'active')";
				mysql_query($sql28) or die("Cannot insert answers for q28, please try again.");

				$sql28 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '28', '120', '$a120', 'active')";
				mysql_query($sql28) or die("Cannot insert answers for q28, please try again.");
						
				$sql28 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '28', '121', '$a121', 'active')";
				mysql_query($sql28) or die("Cannot insert answers for q28, please try again.");
				
				$sql28 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '28', '122', '$a122', 'active')";
				mysql_query($sql28) or die("Cannot insert answers for q28, please try again.");
				
				$sql28 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '28', '123', '$a123', 'active')";
				mysql_query($sql28) or die("Cannot insert answers for q28, please try again.");
				
				$sql28 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '28', '124', '$a124', 'active')";
				mysql_query($sql28) or die("Cannot insert answers for q28, please try again.");
				
				$sql28 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '28', '125', '$a125', 'active')";
				mysql_query($sql28) or die("Cannot insert answers for q28, please try again.");
		
		
		#question 29
		$a126 = $_POST['a126'];
		$a127 = $_POST['a127'];
		$a128 = $_POST['a128'];
		$a129 = $_POST['a129'];
		$a130 = $_POST['a130'];
		$a131 = $_POST['a131'];
		$a132 = $_POST['a132'];
		$a133 = $_POST['a133'];
		$a134 = $_POST['a134'];
		
		if($a126 == "") { $a126 = 0; }
		if($a127 == "") { $a127 = 0; }
		if($a128 == "") { $a128 = 0; }
		if($a129 == "") { $a129 = 0; }
		if($a130 == "") { $a130 = 0; }
		if($a131 == "") { $a131 = 0; }
		if($a132 == "") { $a132 = 0; }
		if($a133 == "") { $a133 = 0; }

				$sql29 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '29', '126', '$a126', 'active')";
				mysql_query($sql29) or die("Cannot insert answers for q29, please try again.");

				$sql29 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '29', '127', '$a127', 'active')";
				mysql_query($sql29) or die("Cannot insert answers for q29, please try again.");
						
				$sql29 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '29', '128', '$a128', 'active')";
				mysql_query($sql29) or die("Cannot insert answers for q29, please try again.");
				
				$sql29 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '29', '129', '$a129', 'active')";
				mysql_query($sql29) or die("Cannot insert answers for q29, please try again.");
				
				$sql29 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '29', '130', '$a130', 'active')";
				mysql_query($sql29) or die("Cannot insert answers for q29, please try again.");
				
				$sql29 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '29', '131', '$a131', 'active')";
				mysql_query($sql29) or die("Cannot insert answers for q29, please try again.");
				
				$sql29 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '29', '132', '$a132', 'active')";
				mysql_query($sql29) or die("Cannot insert answers for q29, please try again.");		

				$sql29 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '29', '133', '$a133', 'active')";
				mysql_query($sql29) or die("Cannot insert answers for q29, please try again.");		
		
				$sql29 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '29', '134', '$a134', 'active')";
				mysql_query($sql29) or die("Cannot insert answers for q29, please try again.");		
						
		
		#questions 30-32
		$a30 = $_POST['a30'];
		$a31 = $_POST['a31'];
		$a32 = $_POST['a32'];
		
		if($a30 == "") { $a30 = 0; }
		if($a31 == "") { $a31 = 0; }
		if($a32 == "") { $a32 = 0; }
		
		
				$sql30 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '30', '$a30', 'active')";
				mysql_query($sql30) or die("Cannot insert answers for q30, please try again.");
				
				$sql31 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '31', '$a31', 'active')";
				mysql_query($sql31) or die("Cannot insert answers for q31, please try again.");
				
				$sql32 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '32', '$a32', 'active')";
				mysql_query($sql32) or die("Cannot insert answers for q32, please try again.");
		
		
		#question 33
		$a150 = $_POST['a150'];
		$a151 = $_POST['a151'];
		$a152 = $_POST['a152'];
		$a153 = $_POST['a153'];
		
		if($a150 == 0 OR $a150 > 4 OR $a150 == "")
		{  $a150 = 0; }
		
		if($a151 == 0 OR $a151 > 4 OR $a151 == "")
		{  $a151 = 0; }
		
		if($a152 == 0 OR $a152 > 4 OR $a152 == "")
		{  $a152 = 0; }
		
		if($a153 == 0 OR $a153 > 4 OR $a153 == "")
		{  $a153 = 0; }
		
		$Sum33 = $a150 + $a151 + $a152 + $a153;
		
		$Division33 = $Sum33 / 4;
		
		if($Division33 == $a150)
		{
		$a150 = 0;
		$a151 = 0;
		$a152 = 0;
		$a153 = 0;
		}
		
				$sql33 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '33', '150', '$a150', 'active')";
				mysql_query($sql33) or die("Cannot insert answers for q33, please try again.");

				$sql33 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '33', '151', '$a151', 'active')";
				mysql_query($sql33) or die("Cannot insert answers for q33, please try again.");

				$sql33 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '33', '152', '$a152', 'active')";
				mysql_query($sql33) or die("Cannot insert answers for q33, please try again.");

				$sql33 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '33', '153', '$a153', 'active')";
				mysql_query($sql33) or die("Cannot insert answers for q33, please try again.");

		# Additonal comments box
		$Comments = $_POST['Comments'];
		
		if($Comments <> "")
		{
		$sql34 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
		VALUES('$SurveyID', '34', '0', '$Comments', 'active')";
		mysql_query($sql34) or die("Cannot insert comments for q34, please try again.");
		}
		
		mail("info@silenttimer.com", "New Timer Survey - PP1", "New PP1 survey entry for $now...from $FirstName $LastName  ($Email)", "From:Timer Survey");

		echo "<p align='center'><font color='#CC0000' size='4' face='Arial, Helvetica, sans-serif'>Thank you for your input! Your feedback will help benefit other students.</font></p>";
		
		
		} # // end if submit
		
		
		?>
		<p><font face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="5">Post-Purchase
		        Survey</font></strong></font></p>
		<p><font color="#000000" size="3"><font face="Arial, Helvetica, sans-serif">The
		      results of this survey are only for our private use (read our <a href="http://www.silenttimer.com/legal/privacy.php" target="_blank">privacy
		      policy</a>). We just want to know your thoughts about The Silent Timer</font><font size="3" face="Arial, Helvetica, sans-serif">&#8482; now
		      that you have bought it. If you think of anything else you'd like
		      to comment on, please <a href="mailto:info@silenttimer.com">email us</a>.
		      Learn more about the gift certificate drawing <a href="surveyinfopp1.php" target="_blank">here</a>. </font></font></p>
        <form name="form1" method="post" action="">
              <p><font size="2" face="Arial, Helvetica, sans-serif">If any of
                the following questions do not apply to you, leave that question
                  blank. You can use the &quot;reset&quot; button at the bottom to clear
                  your answers and start over. </font></p>
              <p>                <font size="4" face="Arial, Helvetica, sans-serif">1.</font><font size="2" face="Arial, Helvetica, sans-serif"> &nbsp;Which
                of the following Silent Timer&#8482; features did you utilize in <em><strong>PRACTICING</strong></em>              for
                your exam? (check all that apply)</font></p>
              <blockquote>
                <p>
                  <font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="a105" type="checkbox" id="a105" value="y">
                  Flashing red light<br>
                  <input name="a106" type="checkbox" id="a106" value="y">
                  Auto Mode <br>
                  <input name="a107" type="checkbox" id="a107" value="y">
                  Passage Mode <br>
                  <input name="a108" type="checkbox" id="a108" value="y">
                  Clock<br>
                  <input name="a109" type="checkbox" id="a109" value="y">
                  Time per Question feature <br>
                  <input name="a110" type="checkbox" id="a110" value="y">
                  Preset Buttons (LSAT, MCAT, etc)<br>
                  <input name="a111" type="checkbox" id="a111" value="y">
                  Memory Buttons (MEM1 &amp; MEM2)</font></p>
              </blockquote>
              <p><font size="4" face="Arial, Helvetica, sans-serif">2.</font><font size="2" face="Arial, Helvetica, sans-serif"> Which
                  of the following features did you utilize<strong><em> ON TEST DAY</em></strong>? (check
              all that apply)</font></p>
              <blockquote>
                <p><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="a112" type="checkbox" id="a112" value="y">
    Flashing red light<br>
    <input name="a113" type="checkbox" id="a113" value="y">
    Auto Mode <br>
    <input name="a114" type="checkbox" id="a114" value="y">
    Passage Mode <br>
    <input name="a115" type="checkbox" id="a115" value="y">
    Clock<br>
    <input name="a116" type="checkbox" id="a116" value="y">
    Time per Question feature <br>
    <input name="a117" type="checkbox" id="a117" value="y">
    Preset Buttons (LSAT, MCAT, etc) <br>
    <input name="a118" type="checkbox" id="a118" value="y">
    Memory Buttons (MEM1 &amp; MEM2) </font></p>
              </blockquote>
              <font size="4" face="Arial, Helvetica, sans-serif">3.</font><font size="2" face="Arial, Helvetica, sans-serif"> Rank
                  the following features in order of their importance to you:<br>
                  <em><br>
                  (1=
                      most important; 7= least important)</em></font>
              <blockquote>
                <p>
                  <font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="a119" type="text" id="a119" size="1" maxlength="1">
                  Flashing red light <br> 
		          <input name="a120" type="text" id="a120" size="1" maxlength="1">
		          Auto Mode <br> 
		          <input name="a121" type="text" id="a121" size="1" maxlength="1">
		          Passage Mode <br> 
		          <input name="a122" type="text" id="a122" size="1" maxlength="1">
		          Clock<br> 
		          <input name="a123" type="text" id="a123" size="1" maxlength="1">
		          Time per Question feature <br> 
		          <input name="a124" type="text" id="a124" size="1" maxlength="1">
		          Preset Buttons (LSAT, MCAT, etc) <br>
		          <input name="a125" type="text" id="a125" size="1" maxlength="1">
		          Memory Buttons (MEM1 &amp; MEM2)</font></p>
              </blockquote>
              <p><font size="4" face="Arial, Helvetica, sans-serif">4.</font> <font size="2" face="Arial, Helvetica, sans-serif">Rank
                the following items
                (on a scale of 1 to 5), according to their importance in your
                  initial search for a testing timer: </font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><em>(1= not
                    at all important; 3= neutral; 5= very important)</em></font></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">1</font></strong></div></td>
                  <td><div align="center">
                    <p><strong><font size="2" face="Arial, Helvetica, sans-serif">2</font></strong></p>
                    </div></td>
                  <td><div align="center">
                    <p><strong><font size="2" face="Arial, Helvetica, sans-serif">3</font></strong></p>
                    </div></td>
                  <td><div align="center">
                    <p><strong><font size="2" face="Arial, Helvetica, sans-serif">4</font></strong></p>
                    </div></td>
                  <td><div align="center">
                    <p><strong><font size="2" face="Arial, Helvetica, sans-serif">5</font></strong></p>
                    </div></td>
                </tr>
                
				<tr bgcolor="#FFFFCC">
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Silent</font></td>
				 
                  <td><div align="center">
                    <font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="a126" type="radio" id="a126" value="1">
                    </font></div></td>
                  <td><div align="center">
                    <font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="a126" type="radio" id="a126" value="2">
                    </font></div></td>
                  <td><div align="center">
                    <font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="a126" type="radio" id="a126" value="3">
                    </font></div></td>
                  <td><div align="center">
                    <font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="a126" type="radio" id="a126" value="4">
                    </font></div></td>
                  <td><div align="center">
                    <font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="a126" type="radio" id="a126" value="5">
                    </font></div></td>
				
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Reasonably priced </font></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a127" type="radio" id="a127" value="1">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a127" type="radio" id="a127" value="2">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a127" type="radio" id="a127" value="3">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a127" type="radio" id="a127" value="4">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a127" type="radio" id="a127" value="5">
                      </font></div></td>
                </tr>
                <tr bgcolor="#FFFFCC">
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Easy to use </font></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a128" type="radio" id="a128" value="1">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a128" type="radio" id="a128" value="2">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a128" type="radio" id="a128" value="3">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a128" type="radio" id="a128" value="4">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a128" type="radio" id="a128" value="5">
                      </font></div></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Allowed to use on test day and/or officially approved by
                    LSAC</font></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a129" type="radio" id="a129" value="1">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a129" type="radio" id="a129" value="2">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a129" type="radio" id="a129" value="3">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a129" type="radio" id="a129" value="4">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a129" type="radio" id="a129" value="5">
                      </font></div></td>
                </tr>
                <tr bgcolor="#FFFFCC">
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Able to display Time per Question </font></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a130" type="radio" id="a130" value="1">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a130" type="radio" id="a130" value="2">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a130" type="radio" id="a130" value="3">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a130" type="radio" id="a130" value="4">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a130" type="radio" id="a130" value="5">
                      </font></div></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Available
                      for purchase at a local store</font></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a131" type="radio" id="a131" value="1">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a131" type="radio" id="a131" value="2">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a131" type="radio" id="a131" value="3">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a131" type="radio" id="a131" value="4">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a131" type="radio" id="a131" value="5">
                      </font></div></td>
                </tr>
                <tr bgcolor="#FFFFCC">
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Available
                  for purchase online </font></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a132" type="radio" id="a132" value="1">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a132" type="radio" id="a132" value="2">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a132" type="radio" id="a132" value="3">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a132" type="radio" id="a132" value="4">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a132" type="radio" id="a132" value="5">
                      </font></div></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Able to count down and count up </font></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a133" type="radio" id="a133" value="1">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a133" type="radio" id="a133" value="2">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a133" type="radio" id="a133" value="3">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a133" type="radio" id="a133" value="4">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a133" type="radio" id="a133" value="5">
                      </font></div></td>
                </tr>
                <tr bgcolor="#FFFFCC">
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Recommended by a friend/instructor </font></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a134" type="radio" id="a134" value="1">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a134" type="radio" id="a134" value="2">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a134" type="radio" id="a134" value="3">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a134" type="radio" id="a134" value="4">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a134" type="radio" id="a134" value="5">
                      </font></div></td>
                </tr>
</table>
              <p><font size="4" face="Arial, Helvetica, sans-serif">5.</font><font size="2" face="Arial, Helvetica, sans-serif"> Do you believe the price of The Silent Timer&#8482; is:</font></p>
              <blockquote>
                <p>
                    
                <font size="2" face="Arial, Helvetica, sans-serif">
    <input name="a30" type="radio" value="135">
    Very low <br>
    <input name="a30" type="radio" value="136">
    Somewhat low <br>
    <input name="a30" type="radio" value="137"> 
    Reasonable
    <br>
    <input name="a30" type="radio" value="138">
    Somewhat high <br>
    <input name="a30" type="radio" value="139">
    Very high </font></p>
              </blockquote>
              <p><font size="4" face="Arial, Helvetica, sans-serif">6.</font><font size="2" face="Arial, Helvetica, sans-serif"> Would you say the value of The Silent Timer&#8482;, as compared
                to its price, is:</font></p>
              <blockquote>
                <p>
                  <font size="2" face="Arial, Helvetica, sans-serif">
	  <input name="a31" type="radio" value="140"> 
	  Excellent
	  <br>
	  <input name="a31" type="radio" value="141"> 
    Good
    <br>
    <input name="a31" type="radio" value="142"> 
    Average
    <br>
    <input name="a31" type="radio" value="143"> 
    Poor
    <br>
    <input name="a31" type="radio" value="144"> 
    Very poor</font></p>
              </blockquote>
              <p><font size="4" face="Arial, Helvetica, sans-serif">7.</font><font size="2" face="Arial, Helvetica, sans-serif"> When purchasing The Silent Timer&#8482;,
                  how concerned were you about the possibility of not being able
                to use your timer on test day?</font></p>
              <blockquote>
                <p>
                  <font size="2" face="Arial, Helvetica, sans-serif">
    <input name="a32" type="radio" value="145">
    Very concerned <br>
    <input name="a32" type="radio" value="146">
    Somewhat concerned <br>
    <input name="a32" type="radio" value="147"> 
    Neither concerned nor unconcerned <br>
    <input name="a32" type="radio" value="148"> 
    Not very concerned
    <br>
    <input name="a32" type="radio" value="149"> 
    Not at all concerned</font></p>
              </blockquote>
              <p><font size="4" face="Arial, Helvetica, sans-serif">8.</font><font size="2" face="Arial, Helvetica, sans-serif"> Please
                  rank the following timers according to the likelihood that
                  you would purchase the described timer:</font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><em>(1= top choice
                  of timer; 4= last choice)</em></font></p>
              <table width="75%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
                <tr>
                  <td><div align="center">
                    <input name="a150" type="text" id="a150" size="1" maxlength="1">
                  </div></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Timer
                      #1: $15-20</strong><br>
- Counts up or down<br>
- Flashing red light <br>
- <SPAN class=517524215-28102005><FONT face=Arial size=2>May or may not be allowed
on test day (no official exam board approval)</FONT></SPAN></font></td>
                </tr>
                <tr>
                  <td><div align="center">
                    <input name="a151" type="text" id="a151" size="1" maxlength="1">
                  </div></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Timer
                      #2: $20-25</strong><br>
- Counts up or down<br>
- Flashing red light<br>
- <SPAN class=517524215-28102005><FONT face=Arial size=2>Officially approved
by your exam board for use on test day</FONT></SPAN></font></td>
                </tr>
                <tr>
                  <td><div align="center">
                    <input name="a152" type="text" id="a152" size="1" maxlength="1">
                  </div></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Timer
                      #3: $25-30</strong><br>
- Counts up or down<br>
- Flashing red light<br>
- Time per Question feature<br>
- <SPAN class=517524215-28102005><FONT face=Arial size=2>May or may not be allowed
on test day (no official exam board approval)</FONT></SPAN></font></td>
                </tr>
                <tr>
                  <td><div align="center">
                    <input name="a153" type="text" id="a153" size="1" maxlength="1">
                  </div></td>
                  <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Timer
                            #4: $30+</strong><br>
      - Counts up or down<br>
      - Flashing red light<br>
      - Time per Question feature<br>
      - <SPAN class=517524215-28102005><FONT face=Arial size=2>Officially approved
      by your exam board for use on test day</FONT></SPAN></font></p></td>
                </tr>
              </table>
              <p><font size="2" face="Arial, Helvetica, sans-serif">Use the space below
                  if you wish to make any additional comments about The Silent
                  Timer&#8482;: </font><br>
                <textarea name="Comments" cols="75" rows="6" id="Comments"></textarea>
</p>
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
                      - required if you wish to entered in the <a href="surveyinfopp1.php" target="_blank">drawing
                      for a $25 gift certificate</a></font></td>
                </tr>
                <tr bgcolor="#FFFFCC">
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Test
                      or Exam </font></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">
                    <select name="Test" tabindex="" id="Test">
                      <option value="" selected>Test</option>
                      <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql = "SELECT * FROM tblTests ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot execute query!");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                      <option value="<? echo $row[Name]; ?>" <? if($row[Name] == $Test){echo "selected";}?><? if($row[Name] == $tURL){echo "selected";}?>><? echo $row[Name]; ?></option>
                      <?
					}
				?>
                    </select>
                    <font color="#FF0000">*</font> required </font></td>
                </tr>
              </table>
              <br>
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
