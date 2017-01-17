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
		$Test = $_POST['Test'];
			
		$sql = "INSERT INTO tblSurvey(FirstName, LastName, Email, DateTime, SurveyName, Test, IP, CustomerID)
		VALUES('$FirstName', '$LastName', '$Email', '$now', 'PP1B', '$Test', '$IP', '$CustomerID')";
		$result = mysql_query($sql) or die("Cannot insert survey, please try again.");
		
		$sql3 = "SELECT * FROM tblSurvey WHERE DateTime = '$now' AND Test = '$Test' AND IP = '$IP'";
		$result3 = mysql_query($sql3) or die("Cannot find survey, please try again.");
		
		while($row = mysql_fetch_array($result3))
	
		{
		$SurveyID = $row[SurveyID];
		}
		
		#question 46
		$a186 = $_POST['a186'];
		if($a186 == 'y')
		{
				$sql26 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '46', '186', 'active')";
				mysql_query($sql26) or die("Cannot insert answers for q46, please try again.");
		}
		$a187 = $_POST['a187'];
		if($a187 == 'y')
		{
				$sql26 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '46', '187', 'active')";
				mysql_query($sql26) or die("Cannot insert answers for q46, please try again.");
		}
		$a188 = $_POST['a188'];
		if($a188 == 'y')
		{
				$sql26 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '46', '188', 'active')";
				mysql_query($sql26) or die("Cannot insert answers for q46, please try again.");
		}
		$a189 = $_POST['a189'];
		if($a189 == 'y')
		{
				$sql26 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '46', '189', 'active')";
				mysql_query($sql26) or die("Cannot insert answers for q46, please try again.");
		}
		$a190 = $_POST['a190'];
		if($a190 == 'y')
		{
				$sql26 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '46', '190', 'active')";
				mysql_query($sql26) or die("Cannot insert answers for q46, please try again.");
		}
		$a191 = $_POST['a191'];
		if($a191 == 'y')
		{
				$sql26 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '46', '191', 'active')";
				mysql_query($sql26) or die("Cannot insert answers for q46, please try again.");
		}
		$a192 = $_POST['a192'];
		if($a192 == 'y')
		{
				$sql26 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '46', '192', 'active')";
				mysql_query($sql26) or die("Cannot insert answers for q46, please try again.");
		}
		$a193 = $_POST['a193'];
		if($a193 == 'y')
		{
				$sql26 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '46', '193', 'active')";
				mysql_query($sql26) or die("Cannot insert answers for q46, please try again.");
		}		
		
		#question 47
		$a194 = $_POST['a194'];
		if($a194 == 'y')
		{
				$sql47 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '47', '194', 'active')";
				mysql_query($sql47) or die("Cannot insert answers for q47, please try again.");
		}
		$a195 = $_POST['a195'];
		if($a195 == 'y')
		{
				$sql47 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '47', '195', 'active')";
				mysql_query($sql47) or die("Cannot insert answers for q47, please try again.");
		}
		$a196 = $_POST['a196'];
		if($a196 == 'y')
		{
				$sql47 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '47', '196', 'active')";
				mysql_query($sql47) or die("Cannot insert answers for q47, please try again.");
		}
		$a197 = $_POST['a197'];
		if($a197 == 'y')
		{
				$sql47 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '47', '197', 'active')";
				mysql_query($sql47) or die("Cannot insert answers for q47, please try again.");		
		}
		$a198 = $_POST['a198'];
		if($a198 == 'y')
		{
				$sql47 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '47', '198', 'active')";
				mysql_query($sql47) or die("Cannot insert answers for q47, please try again.");		
		}
		$a199 = $_POST['a199'];
		if($a199 == 'y')
		{
				$sql47 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '47', '199', 'active')";
				mysql_query($sql47) or die("Cannot insert answers for q47, please try again.");
		}
		$a200 = $_POST['a200'];
		if($a200 == 'y')
		{
						$sql47 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '47', '200', 'active')";
				mysql_query($sql47) or die("Cannot insert answers for q47, please try again.");
		}
		$a201 = $_POST['a201'];
		if($a201 == 'y')
		{
						$sql47 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '47', '201', 'active')";
				mysql_query($sql47) or die("Cannot insert answers for q47, please try again.");
		}		
		
		
		#question 48
		$a202 = $_POST['a202'];
		$a203 = $_POST['a203'];
		$a204 = $_POST['a204'];
		$a205 = $_POST['a205'];
		$a206 = $_POST['a206'];
		$a207 = $_POST['a207'];
		$a208 = $_POST['a208'];
		$a209 = $_POST['a209'];
		
		if($a202 == 0 OR $a202 > 8)
		{  $a202 = 0; }
		
		if($a203 == 0 OR $a203 > 8)
		{  $a203 = 0; }
		
		if($a204 == 0 OR $a204 > 8)
		{  $a204 = 0; }

		if($a205 == 0 OR $a205 > 8)
		{  $a205 = 0; }

		if($a206 == 0 OR $a206 > 8)
		{  $a202 = 0; }
		
		if($a207 == 0 OR $a207 > 8)
		{  $a207 = 0; }
		
		if($a208 == 0 OR $a208 > 8)
		{  $a208 = 0; }
		
		if($a209 == 0 OR $a209 > 8)
		{  $a209 = 0; }		
		
		$Sum48 = $a202 + $a203 + $a204 + $a205 + $a206 + $a207 + $a208 + $a209;
		
		$Division48 = $Sum48 / 8;
		
		if($Division48 == $a202)
		{
		$a202 = 0;
		$a203 = 0;
		$a204 = 0;
		$a205 = 0;
		$a206 = 0;
		$a207 = 0;
		$a208 = 0;
		}
		
				$sql48 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '48', '202', '$a202', 'active')";
				mysql_query($sql48) or die("Cannot insert answers for q48, please try again.");

				$sql48 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '48', '203', '$a203', 'active')";
				mysql_query($sql48) or die("Cannot insert answers for q48, please try again.");
						
				$sql48 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '48', '204', '$a204', 'active')";
				mysql_query($sql48) or die("Cannot insert answers for q48, please try again.");
				
				$sql48 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '48', '205', '$a205', 'active')";
				mysql_query($sql48) or die("Cannot insert answers for q48, please try again.");
				
				$sql48 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '48', '206', '$a206', 'active')";
				mysql_query($sql48) or die("Cannot insert answers for q48, please try again.");
				
				$sql48 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '48', '207', '$a207', 'active')";
				mysql_query($sql48) or die("Cannot insert answers for q48, please try again.");
				
				$sql48 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '48', '208', '$a208', 'active')";
				mysql_query($sql48) or die("Cannot insert answers for q48, please try again.");
				
				$sql48 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '48', '209', '$a209', 'active')";
				mysql_query($sql48) or die("Cannot insert answers for q48, please try again.");				
		
		
		#question 51
		$a223 = $_POST['a223'];
		$a224 = $_POST['a224'];
		$a225 = $_POST['a225'];
		$a226 = $_POST['a226'];
		$a227 = $_POST['a227'];
		$a228 = $_POST['a228'];
		$a229 = $_POST['a229'];
		$a230 = $_POST['a230'];
		$a231 = $_POST['a231'];
		
		if($a223 == "") { $a223 = 0; }
		if($a224 == "") { $a224 = 0; }
		if($a225 == "") { $a225 = 0; }
		if($a226 == "") { $a226 = 0; }
		if($a227 == "") { $a227 = 0; }
		if($a228 == "") { $a228 = 0; }
		if($a229 == "") { $a229 = 0; }
		if($a230 == "") { $a230 = 0; }
		if($a231 == "") { $a231 = 0; }

				$sql51 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '51', '223', '$a223', 'active')";
				mysql_query($sql51) or die("Cannot insert answers for q51, please try again.");

				$sql51 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '51', '224', '$a224', 'active')";
				mysql_query($sql51) or die("Cannot insert answers for q51, please try again.");
						
				$sql51 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '51', '225', '$a225', 'active')";
				mysql_query($sql51) or die("Cannot insert answers for q51, please try again.");
				
				$sql51 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '51', '226', '$a226', 'active')";
				mysql_query($sql51) or die("Cannot insert answers for q51, please try again.");
				
				$sql51 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '51', '227', '$a227', 'active')";
				mysql_query($sql51) or die("Cannot insert answers for q51, please try again.");
				
				$sql51 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '51', '228', '$a228', 'active')";
				mysql_query($sql51) or die("Cannot insert answers for q51, please try again.");
				
				$sql51 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '51', '229', '$a229', 'active')";
				mysql_query($sql51) or die("Cannot insert answers for q51, please try again.");		

				$sql51 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '51', '230', '$a230', 'active')";
				mysql_query($sql51) or die("Cannot insert answers for q51, please try again.");		
		
				$sql51 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '51', '231', '$a231', 'active')";
				mysql_query($sql51) or die("Cannot insert answers for q51, please try again.");		
						
		
		#questions 49, 50, 52, 53
		$a49 = $_POST['a49'];
		$a50 = $_POST['a50'];
		if($a49 == "") { $a49 = 0; }
		if($a50 == "") { $a50 = 0; }
		
		if($a49 == '216')
		{ $a49Other = $_POST['a49Other']; 
			$sql49 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
			VALUES('$SurveyID', '49', '216', '$a49Other', 'active')";
			mysql_query($sql49) or die("Cannot insert answers for q49, please try again.");
		}
		else
		{
			$sql49 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
			VALUES('$SurveyID', '49', '$a49', 'active')";
			mysql_query($sql49) or die("Cannot insert answers for q49, please try again.");
		}
		
		
		if($a50 == '222')
		{ $a50Other = $_POST['a50Other']; 
			$sql50 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
			VALUES('$SurveyID', '50', '222', '$a50Other', 'active')";
			mysql_query($sql50) or die("Cannot insert answers for q50, please try again.");
		}
		else
		{
			$sql50 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
			VALUES('$SurveyID', '50', '$a50', 'active')";
			mysql_query($sql50) or die("Cannot insert answers for q50, please try again.");		
		}
		
		$a52 = $_POST['a52'];
		$a53 = $_POST['a53'];
		

		if($a52 == "") { $a52 = 0; }
		if($a53 == "") { $a53 = 0; }
		

				$sql52 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '52', '$a52', 'active')";
				mysql_query($sql52) or die("Cannot insert answers for q52, please try again.");
		
				$sql53 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, Status)
				VALUES('$SurveyID', '53', '$a53', 'active')";
				mysql_query($sql53) or die("Cannot insert answers for q53, please try again.");		
		
		#question 54
		$a242 = $_POST['a242'];
		$a243 = $_POST['a243'];
		$a244 = $_POST['a244'];
		$a245 = $_POST['a245'];
		
		if($a242 == 0 OR $a242 > 4 OR $a242 == "")
		{  $a242 = 0; }
		
		if($a243 == 0 OR $a243 > 4 OR $a243 == "")
		{  $a243 = 0; }
		
		if($a244 == 0 OR $a244 > 4 OR $a244 == "")
		{  $a244 = 0; }
		
		if($a245 == 0 OR $a245 > 4 OR $a245 == "")
		{  $a245 = 0; }
		
		$Sum54 = $a242 + $a243 + $a244 + $a245;
		
		$Division54 = $Sum54 / 4;
		
		if($Division54 == $a242)
		{
		$a242 = 0;
		$a243 = 0;
		$a244 = 0;
		$a245 = 0;
		}
		
				$sql54 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '54', '242', '$a242', 'active')";
				mysql_query($sql54) or die("Cannot insert answers for q54, please try again.");

				$sql54 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '54', '243', '$a243', 'active')";
				mysql_query($sql54) or die("Cannot insert answers for q54, please try again.");

				$sql54 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '54', '244', '$a244', 'active')";
				mysql_query($sql54) or die("Cannot insert answers for q54, please try again.");

				$sql54 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
				VALUES('$SurveyID', '54', '245', '$a245', 'active')";
				mysql_query($sql54) or die("Cannot insert answers for q54, please try again.");

		# Additonal comments box
		$Comments = $_POST['Comments'];
		
		if($Comments <> "")
		{
		$sql34 = "INSERT INTO tblSurveyQA(SurveyID, QuestionID, AnswerID, OtherText, Status)
		VALUES('$SurveyID', '65', '0', '$Comments', 'active')";
		mysql_query($sql34) or die("Cannot insert comments for q65, please try again.");
		}
		
		mail("info@silenttimer.com", "New Timer Survey - PP1B", "New PP1B survey entry for $now...from $FirstName $LastName  ($Email)", "From:Timer Survey");

		echo "<p align='center'><font color='#CC0000' size='4' face='Arial, Helvetica, sans-serif'>Thank you for your input! Your feedback will help benefit other students.</font></p>";
		
		
		} # // end if submit
		
		
		?>
		<p><font face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="5">Post-Purchase
		        Survey</font></strong></font></p>
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
              <p>                <font size="4" face="Arial, Helvetica, sans-serif">1.</font><font size="2" face="Arial, Helvetica, sans-serif"> &nbsp;Which
                of the following Silent Timer&#8482; features did you utilize in <em><strong>PRACTICING</strong></em>              for
                your exam? (check all that apply)</font></p>
              <blockquote>
                <p>
                  <font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="a186" type="checkbox" id="a186" value="y">
                  Flashing red light<br>
                  <input name="a187" type="checkbox" id="a187" value="y">
                  Auto Mode <br>
                  <input name="a188" type="checkbox" id="a188" value="y">
                  Passage Mode <br>
                  <input name="a189" type="checkbox" id="a189" value="y">
                  Clock<br>
                  <input name="a190" type="checkbox" id="a190" value="y">
Count down / count up only <br>
                  <input name="a191" type="checkbox" id="a191" value="y">
                  Time per Question feature <br>
                  <input name="a192" type="checkbox" id="a192" value="y">
                  Preset Buttons (LSAT, MCAT, etc)<br>
                  <input name="a193" type="checkbox" id="a193" value="y">
                  Memory Buttons (MEM1 &amp; MEM2)</font></p>
          </blockquote>
              <p><font size="4" face="Arial, Helvetica, sans-serif">2.</font><font size="2" face="Arial, Helvetica, sans-serif"> Which
                  of the following features did you utilize<strong><em> ON TEST DAY</em></strong>? (check
              all that apply)</font></p>
              <blockquote>
                <p><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="a194" type="checkbox" id="a194" value="y">
				Flashing red light<br>
				<input name="a195" type="checkbox" id="a195" value="y">
				Auto Mode <br>
				<input name="a196" type="checkbox" id="a196" value="y">
				Passage Mode <br>
				<input name="a197" type="checkbox" id="a197" value="y">
				Clock<br>
				<input name="a198" type="checkbox" id="a198" value="y">
				Count down / count up only <br>
				<input name="a199" type="checkbox" id="a199" value="y">
				Time per Question feature <br>
				<input name="a200" type="checkbox" id="a200" value="y">
				Preset Buttons (LSAT, MCAT, etc)<br>
				<input name="a201" type="checkbox" id="a201" value="y">
				Memory Buttons (MEM1 &amp; MEM2)</font></p>
          </blockquote>
              <font size="4" face="Arial, Helvetica, sans-serif">3.</font><font size="2" face="Arial, Helvetica, sans-serif"> Rank
                  the following features in order of their helpfulness to you:<br>
              <em><br>
              (1=
                  most helpful; 8= least helpful)</em></font>
              <blockquote>
                <p>
                  <font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="a202" type="text" id="a202" size="1" maxlength="1">
                  Flashing red light <br> 
		          <input name="a203" type="text" id="a203" size="1" maxlength="1">
		          Auto Mode <br> 
		          <input name="a204" type="text" id="a204" size="1" maxlength="1">
		          Passage Mode <br> 
		          <input name="a205" type="text" id="a205" size="1" maxlength="1">
		          Clock<br>
		          <input name="a206" type="text" id="a206" size="1" maxlength="1">
Count down / count up only <br> 
		          <input name="a207" type="text" id="a207" size="1" maxlength="1">
		          Time per Question feature <br> 
		          <input name="a208" type="text" id="a208" size="1" maxlength="1">
		          Preset Buttons (LSAT, MCAT, etc) <br>
		          <input name="a209" type="text" id="a209" size="1" maxlength="1">
		          Memory Buttons (MEM1 &amp; MEM2)</font></p>
          </blockquote>
              <p>&nbsp;</p>
              <p><font size="4" face="Arial, Helvetica, sans-serif">4.</font> <font size="2" face="Arial, Helvetica, sans-serif">When
                is/was your test? </font> </p>
              <blockquote>
                <p> <font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="a49" type="radio" value="210">
					Oct 2005 <br>
					<input name="a49" type="radio" value="211">
				Dec 2005 <br>
				<input name="a49" type="radio" value="212">
				Feb 2006<br>
					<input name="a49" type="radio" value="213">
					 June 2006 <br>
				<input name="a49" type="radio" value="214"> 
				Sept 2006<br>
				<input name="a49" type="radio" value="215"> 
				Dec 2006<br>
				<input name="a49" type="radio" value="216">
				Other (please specify) 
				<input name="a49Other" type="text" id="a49Other" size="15" maxlength="20">
                </font></p>
              </blockquote>
              <p>&nbsp;</p>
              <p><font size="4" face="Arial, Helvetica, sans-serif">5.</font> <font size="2" face="Arial, Helvetica, sans-serif">While
              taking your test, did the proctor: </font></p>
              <blockquote>
                <p> <font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="a50" type="radio" value="217">
				Never ask you about The Silent Timer <br>
				<input name="a50" type="radio" value="218">
				Ask you about The Silent Timer, but he/she allowed you to use it <br>
				<input name="a50" type="radio" value="219">
				Ask you to put your Silent Timer away <br>
				<input name="a50" type="radio" value="220">
				I did not take my Silent Timer into the test <br>
				<input name="a50" type="radio" value="221">
				I have not yet taken my test <br>
				<input name="a50" type="radio" value="222">
				Other (please specify)
				<input name="a50Other" type="text" id="a50Other" size="25" maxlength="200">
                </font></p>
              </blockquote>
              <blockquote>&nbsp;</blockquote>
              <p><font size="4" face="Arial, Helvetica, sans-serif">6.</font> <font size="2" face="Arial, Helvetica, sans-serif">Rank
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
                    <input name="a223" type="radio" id="a223" value="1">
                    </font></div></td>
                  <td><div align="center">
                    <font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="a223" type="radio" id="a223" value="2">
                    </font></div></td>
                  <td><div align="center">
                    <font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="a223" type="radio" id="a223" value="3">
                    </font></div></td>
                  <td><div align="center">
                    <font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="a223" type="radio" id="a223" value="4">
                    </font></div></td>
                  <td><div align="center">
                    <font size="2" face="Arial, Helvetica, sans-serif">
                    <input name="a223" type="radio" id="a223" value="5">
                    </font></div></td>
				
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Reasonably priced </font></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a224" type="radio" id="a224" value="1">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a224" type="radio" id="a224" value="2">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a224" type="radio" id="a224" value="3">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a224" type="radio" id="a224" value="4">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a224" type="radio" id="a224" value="5">
                      </font></div></td>
                </tr>
                <tr bgcolor="#FFFFCC">
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Easy to use </font></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a225" type="radio" id="a225" value="1">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a225" type="radio" id="a225" value="2">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a225" type="radio" id="a225" value="3">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a225" type="radio" id="a225" value="4">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a225" type="radio" id="a225" value="5">
                      </font></div></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Ability
                      to improve my pacing during practice </font></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a226" type="radio" id="a226" value="1">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a226" type="radio" id="a226" value="2">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a226" type="radio" id="a226" value="3">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a226" type="radio" id="a226" value="4">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a226" type="radio" id="a226" value="5">
                      </font></div></td>
                </tr>
                <tr bgcolor="#FFFFCC">
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Allowed
                  to use on test day and/or officially approved by exam board </font></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a227" type="radio" id="a227" value="1">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a227" type="radio" id="a227" value="2">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a227" type="radio" id="a227" value="3">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a227" type="radio" id="a227" value="4">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a227" type="radio" id="a227" value="5">
                      </font></div></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Ability
                  to display Time per Question </font></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a228" type="radio" id="a228" value="1">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a228" type="radio" id="a228" value="2">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a228" type="radio" id="a228" value="3">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a228" type="radio" id="a228" value="4">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a228" type="radio" id="a228" value="5">
                      </font></div></td>
                </tr>
                <tr bgcolor="#FFFFCC">
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Ability
                  to count down </font></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a229" type="radio" id="a229" value="1">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a229" type="radio" id="a229" value="2">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a229" type="radio" id="a229" value="3">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a229" type="radio" id="a229" value="4">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a229" type="radio" id="a229" value="5">
                      </font></div></td>
                </tr>
                <tr>
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Ability
                      to count up</font></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a230" type="radio" id="a230" value="1">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a230" type="radio" id="a230" value="2">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a230" type="radio" id="a230" value="3">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a230" type="radio" id="a230" value="4">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a230" type="radio" id="a230" value="5">
                      </font></div></td>
                </tr>
                <tr bgcolor="#FFFFCC">
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Recommended by a friend/instructor </font></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a231" type="radio" id="a231" value="1">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a231" type="radio" id="a231" value="2">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a231" type="radio" id="a231" value="3">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a231" type="radio" id="a231" value="4">
                      </font></div></td>
                  <td><div align="center">
                      <font size="2" face="Arial, Helvetica, sans-serif">
                      <input name="a231" type="radio" id="a231" value="5">
                      </font></div></td>
                </tr>
</table>
              <p><font size="4" face="Arial, Helvetica, sans-serif">7.</font><font size="2" face="Arial, Helvetica, sans-serif"> Do you believe the price of The Silent Timer&#8482; is:</font></p>
              <blockquote>
                <p>
                    
                <font size="2" face="Arial, Helvetica, sans-serif">
    <input name="a52" type="radio" value="232">
    Very low <br>
    <input name="a52" type="radio" value="233">
    Somewhat low <br>
    <input name="a52" type="radio" value="234"> 
    Reasonable
    <br>
    <input name="a52" type="radio" value="235">
    Somewhat high <br>
    <input name="a52" type="radio" value="236">
    Very high </font></p>
              </blockquote>
              <p><font size="4" face="Arial, Helvetica, sans-serif">8.</font><font size="2" face="Arial, Helvetica, sans-serif"> Would you say the value of The Silent Timer&#8482;, as compared
                to its price, is:</font></p>
              <blockquote>
                <p>
                  <font size="2" face="Arial, Helvetica, sans-serif">
			  <input name="a53" type="radio" value="237"> 
			  Excellent
			  <br>
			  <input name="a53" type="radio" value="238"> 
			Good
			<br>
			<input name="a53" type="radio" value="239"> 
			Average
			<br>
			<input name="a53" type="radio" value="240"> 
			Poor
			<br>
			<input name="a53" type="radio" value="241"> 
			Very poor</font></p>
              </blockquote>
              <p><font size="4" face="Arial, Helvetica, sans-serif">9.</font><font size="2" face="Arial, Helvetica, sans-serif"> Please
                  rank the following timers according to the likelihood that
              you would purchase the described timer:</font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><em>(1= top choice
                  of timer; 4= last choice)</em></font></p>
              <table width="75%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
                <tr>
                  <td><div align="center">
                    <input name="a242" type="text" id="a242" size="1" maxlength="1">
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
                    <input name="a243" type="text" id="a243" size="1" maxlength="1">
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
                    <input name="a244" type="text" id="a244" size="1" maxlength="1">
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
                    <input name="a245" type="text" id="a245" size="1" maxlength="1">
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
                  <td width="80%"><input name="FirstName" type="text" id="FirstName" value="<? echo $FirstName; ?>" maxlength="50">                      </td>
                </tr>
                <tr bgcolor="#FFFFCC">
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Last
                      Name: </font></td>
                  <td><input name="LastName" type="text" id="LastName" value="<? echo $LastName; ?>" maxlength="50">                      </td>
                </tr>
                <tr bgcolor="#FFFFCC">
                  <td><font size="2" face="Arial, Helvetica, sans-serif">Email:</font></td>
                  <td><input name="Email" type="text" id="Email" value="<? echo $Email; ?>" maxlength="255">                      </td>
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
