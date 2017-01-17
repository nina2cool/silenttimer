<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
	
	$SurveyID = $_GET['s'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

		$sql6 = "SELECT * from tblSurvey WHERE SurveyID = '$SurveyID'";
		
		$result6 = mysql_query($sql6) or die("Cannot retrieve question info, please try again.");
		
		while($row6 = mysql_fetch_array($result6))
		{
		$FirstName = $row6[FirstName];
		$LastName = $row6[LastName];
		$Email = $row6[Email];
		$IP = $row6[IP];
		$DateTime = $row6[DateTime];
		$CustomerID = $row6[CustomerID];
		}


?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Post
      Purchase Survey # 1B Results</strong></font></p>
<table width="100%"  border="1" cellpadding="2" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">First
        Name: </font></td>
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font></td>
  </tr>
  <tr>
    <td><font color="#000000" size="2"><font face="Arial, Helvetica, sans-serif">Last
          Name: </font></font></td>
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font></td>
  </tr>
  <tr>
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Customer
        ID : </font></td>
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="../customers/CustomerInfo.php?cust=<? echo $CustomerID; ?>" target="_blank"><? echo $CustomerID; ?></a></font></td>
  </tr>
  <tr>
    <td><font color="#000000" size="2"><font face="Arial, Helvetica, sans-serif">Email: </font></font></td>
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="mailto:<? echo $Email; ?>"><? echo $Email; ?></a></font></td>
  </tr>
  <tr>
    <td><font color="#000000" size="2"><font face="Arial, Helvetica, sans-serif">IP: </font></font></td>
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $IP; ?></font></td>
  </tr>
  <tr>
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Date/Time: </font></td>
    <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font></td>
  </tr>
</table>
<?
	
		$sql5 = "SELECT * from tblSurveyQuestions WHERE Status = 'active' AND SurveyName = 'PP1B' AND Rank = 'n' AND Display = 'y' ORDER BY Question";
		
		$result5 = mysql_query($sql5) or die("Cannot retrieve question info, please try again.");
		
		while($row5 = mysql_fetch_array($result5))
		{
		$Question = $row5[Question];
		$QuestionID = $row5[QuestionID];
		$CheckAll = $row5[CheckAll];
		$Rank = $row5[Rank];
		
			$sql = "SELECT * from tblSurveyAnswers WHERE QuestionID = '$QuestionID' AND Status = 'active' AND AnswerID <> '0'";
			
			$result = mysql_query($sql) or die("Cannot retrieve question info, please try again.");
			
			while($row = mysql_fetch_array($result))
			{
			$Answer = $row[Answer];
			$AnswerID = $row[AnswerID];

				
				$sql3 = "SELECT Count(AnswerID) as TotalCount from tblSurveyQA WHERE QuestionID = '$QuestionID' AND Status = 'active' AND AnswerID <> '0'";
				$result3 = mysql_query($sql3) or die("Cannot retrieve answer info, please try again.");
				
				while($row3 = mysql_fetch_array($result3))
				{
				$TotalCount = $row3[TotalCount];
				}
			}

	?>

  <p><font size="2"><strong><font face="Arial, Helvetica, sans-serif">Question
  #</font></strong><font face="Arial, Helvetica, sans-serif">: <strong><? echo $Question; ?> </strong></font></font></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
	<?
	
		$sql = "SELECT * from tblSurveyAnswers WHERE QuestionID = '$QuestionID' AND Status = 'active'";
		
		$result = mysql_query($sql) or die("Cannot retrieve question info, please try again.");
		
		while($row = mysql_fetch_array($result))
		{
		$Answer = $row[Answer];
		$AnswerID = $row[AnswerID];
	
				
				
		$sql3 = "SELECT Count(AnswerID) as TotalCount from tblSurveyQA WHERE QuestionID = '$QuestionID' AND Status = 'active' AND AnswerID <> '0' AND SurveyID = '$SurveyID'";
		$result3 = mysql_query($sql3) or die("Cannot retrieve answer info, please try again.");
		
		while($row3 = mysql_fetch_array($result3))
		{
		$TotalCount = $row3[TotalCount];
		}

				$sql2 = "SELECT Count(AnswerID) as AnswerCount from tblSurveyQA WHERE QuestionID = '$QuestionID' AND AnswerID = '$AnswerID' AND Status = 'active' AND SurveyID = '$SurveyID'";
				//echo $sql2;
				$result2 = mysql_query($sql2) or die("Cannot retrieve answer info, please try again.");
				
				while($row2 = mysql_fetch_array($result2))
				{
				$AnswerCount = $row2[AnswerCount];
				
				
				if($AnswerCount == 0)
				{
				$AnswerCount = "-";
				}

				
				
	?>
	
	
	
      <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Answer; ?>
          <? 
					  $sql7 = "SELECT * FROM tblSurveyQA WHERE OtherText <> '' AND Status = 'active' AND AnswerID = '$AnswerID'";
					  //echo $sql7;
					  $result7 = mysql_query($sql7) or die("Cannot get other text");
					  
					  $AnswerCountOther = mysql_num_rows($result7);
					  
					  while($row7 = mysql_fetch_array($result7))
					  {
					  $OtherText = $row7[OtherText];
					  $SurveyID = $row7[SurveyID];
					  		
							$Other = "y";
					  
					   ?>
          <li><? echo $OtherText; ?> (<a href="surveypp1bresult.php?s=<? echo $SurveyID; ?>" target="_blank"><? echo $SurveyID; ?></a>)</li>
          <?
					  }
					  ?>
      </font></td>
      <td width="15%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $AnswerCount; ?></font></td>
	  
	  
    </tr>
	<?
	}
	}
	
	?>
	
  </table>  
  <?
		  
		  }
		  
		  ?>
		  
		  
		  <p><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">Ranking Questions:</font></p>
		  			<?
			$sql4 = "SELECT * FROM tblSurveyQuestions WHERE QuestionID = '48'";
			$result4 = mysql_query($sql4) or die("Cannot get ranked questions");
			
			while($row4 = mysql_fetch_array($result4))
			{
			$Question = $row4[Question];
			$QuestionID = $row4[QuestionID];
			
			?>
			        <font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Question; ?></strong></font>
                    <br>
                    <br>            
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
            <tr>
              <td width="25%">&nbsp;</td>
              <td bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>1</strong></font></div></td>
              <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>2</strong></font></div></td>
              <td bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>3</strong></font></div></td>
              <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>4</strong></font></div></td>
              <td bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>5</strong></font></div></td>
              <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>6</strong></font></div></td>
              <td bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>7</strong></font></div></td>
			   <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>8</strong></font></div></td>
            </tr>
            <tr>
		
		<?
		$sql5 = "SELECT * from tblSurveyAnswers WHERE QuestionID = '$QuestionID' AND Status = 'active'";
		$result5 = mysql_query($sql5) or die("Cannot retrieve question info, please try again.");
		
		while($row5 = mysql_fetch_array($result5))
		{
		$Answer = $row5[Answer];
		$AnswerID = $row5[AnswerID];
				
				$a1 = 0;
				$a2 = 0;
				$a3 = 0;
				$a4 = 0;
				$a5 = 0;
				$a6 = 0;
				$a7 = 0;
				$a8 = 0;
				
				$sql13 = "SELECT Count(AnswerID) as Count FROM tblSurveyQA WHERE OtherText <> '0' AND OtherText <> '' AND AnswerID = '$AnswerID'";
				$result13 = mysql_query($sql13) or die("Cannot get count");
				
				while($row13 = mysql_fetch_array($result13))
				{
				$Count = $row13[Count];
				}
				
				
				$sql6 = "SELECT Count(OtherText) as a1 FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '1'  AND SurveyID = '$SurveyID' GROUP BY OtherText";
				$result6 = mysql_query($sql6) or die("Cannot get ranks");
				while($row6 = mysql_fetch_array($result6))
				{
					$a1 = $row6[a1];
				}
				
				$sql7 = "SELECT Count(OtherText) as a2, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '2' AND SurveyID = '$SurveyID' GROUP BY OtherText";
				$result7 = mysql_query($sql7) or die("Cannot get ranks");
				while($row7 = mysql_fetch_array($result7))
				{
					$a2 = $row7[a2];
				}
				
				$sql8 = "SELECT Count(OtherText) as a3, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '3' AND SurveyID = '$SurveyID'  GROUP BY OtherText";
				$result8 = mysql_query($sql8) or die("Cannot get ranks");
				while($row8 = mysql_fetch_array($result8))
				{
					$a3 = $row8[a3];
				}
				
				$sql9 = "SELECT Count(OtherText) as a4, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '4' AND SurveyID = '$SurveyID'  GROUP BY OtherText";
				$result9 = mysql_query($sql9) or die("Cannot get ranks");
				while($row9 = mysql_fetch_array($result9))
				{
					$a4 = $row9[a4];
				}
				
				$sql10 = "SELECT Count(OtherText) as a5, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '5' AND SurveyID = '$SurveyID'  GROUP BY OtherText";
				$result10 = mysql_query($sql10) or die("Cannot get ranks");
				while($row10 = mysql_fetch_array($result10))
				{
					$a5 = $row10[a5];
				}
				
				$sql11 = "SELECT Count(OtherText) as a6, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '6' AND SurveyID = '$SurveyID'  GROUP BY OtherText";
				$result11 = mysql_query($sql11) or die("Cannot get ranks");
				while($row11 = mysql_fetch_array($result11))
				{
					$a6 = $row11[a6];
				}
				
				$sql12 = "SELECT Count(OtherText) as a7, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '7' AND SurveyID = '$SurveyID'  GROUP BY OtherText";
				$result12 = mysql_query($sql12) or die("Cannot get ranks");
				while($row12 = mysql_fetch_array($result12))
				{
					$a7 = $row12[a7];
				}
				
				$sql13 = "SELECT Count(OtherText) as a8, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '8' AND SurveyID = '$SurveyID'  GROUP BY OtherText";
				$result13 = mysql_query($sql13) or die("Cannot get ranks");
				while($row13 = mysql_fetch_array($result13))
				{
					$a8 = $row13[a8];
				}				
				
				if($a1 == 0) { $a1 = "-"; }
				if($a2 == 0) { $a2 = "-"; }
				if($a3 == 0) { $a3 = "-"; }
				if($a4 == 0) { $a4 = "-"; }
				if($a5 == 0) { $a5 = "-"; }
				if($a6 == 0) { $a6 = "-"; }
				if($a7 == 0) { $a7 = "-"; }
				if($a8 == 0) { $a8 = "-"; }
				

				
				?>
				
              <td width="25%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Answer; ?></font></td>
              <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $a1; ?></font></div></td>
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $a2; ?></font></div></td>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $a3; ?></font></div></td>
<td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $a4; ?></font></div></td>
<td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $a5; ?></font></div></td>
 <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $a6; ?></font></div></td>
<td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $a7; ?></font></div></td>
 <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $a8; ?></font></div></td>
         	  
		</tr>
			<?
			}
			?>
			
</table>
		  <?
		  } #end of Question if statement
		  ?>
		  <br>
		  <br>
		  <?
			$sql14 = "SELECT * FROM tblSurveyQuestions WHERE QuestionID = '51'";
			$result14 = mysql_query($sql14) or die("Cannot get ranked questions");
			
			while($row14 = mysql_fetch_array($result14))
			{
			$Question = $row14[Question];
			$QuestionID = $row14[QuestionID];
			
			?>
          <font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Question; ?></strong></font> <br>
                    <font size="2" face="Arial, Helvetica, sans-serif"><em>(1=
                    not at all important; 3= neutral; 5= very important)</em></font><br> 
<br>            
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
            <tr>
              <td width="35%">&nbsp;</td>
              <td bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>1</strong></font></div></td>
              <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>2</strong></font></div></td>
              <td bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>3</strong></font></div></td>
              <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>4</strong></font></div></td>
			  <td bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>5</strong></font></div></td>
            </tr>
            <tr>
		
		<?
		$sql15 = "SELECT * from tblSurveyAnswers WHERE QuestionID = '$QuestionID' AND Status = 'active'";
		$result15 = mysql_query($sql15) or die("Cannot retrieve question info, please try again.");
		
		while($row15 = mysql_fetch_array($result15))
		{
		$Answer = $row15[Answer];
		$AnswerID = $row15[AnswerID];
				
				$b1 = 0;
				$b2 = 0;
				$b3 = 0;
				$b4 = 0;
				$b5 = 0;
				
				
				$sql131 = "SELECT Count(AnswerID) as Count FROM tblSurveyQA WHERE OtherText <> '0' AND OtherText <> '' AND AnswerID = '$AnswerID'";
				$result131 = mysql_query($sql131) or die("Cannot get count");
				
				while($row131 = mysql_fetch_array($result131))
				{
				$Countb = $row131[Count];
				}
				
				
				$sql16 = "SELECT Count(OtherText) as b1 FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '1'  AND SurveyID = '$SurveyID' GROUP BY OtherText";
				$result16 = mysql_query($sql16) or die("Cannot get ranks");
				while($row16 = mysql_fetch_array($result16))
				{
					$b1 = $row16[b1];
				}
				
				$sql17 = "SELECT Count(OtherText) as b2, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '2' AND SurveyID = '$SurveyID'  GROUP BY OtherText";
				$result17 = mysql_query($sql17) or die("Cannot get ranks");
				while($row17 = mysql_fetch_array($result17))
				{
					$b2 = $row17[b2];
				}
				
				$sql18 = "SELECT Count(OtherText) as b3, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '3' AND SurveyID = '$SurveyID'  GROUP BY OtherText";
				$result18 = mysql_query($sql18) or die("Cannot get ranks");
				while($row18 = mysql_fetch_array($result18))
				{
					$b3 = $row18[b3];
				}
				
				$sql19 = "SELECT Count(OtherText) as b4, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '4' AND SurveyID = '$SurveyID'  GROUP BY OtherText";
				$result19 = mysql_query($sql19) or die("Cannot get ranks");
				while($row19 = mysql_fetch_array($result19))
				{
					$b4 = $row19[b4];
				}
				
				$sql20 = "SELECT Count(OtherText) as b5, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '5' AND SurveyID = '$SurveyID'  GROUP BY OtherText";
				$result20 = mysql_query($sql20) or die("Cannot get ranks");
				while($row20 = mysql_fetch_array($result20))
				{
					$b5 = $row20[b5];
				}

				if($b1 == 0) { $b1 = "-"; }
				if($b2 == 0) { $b2 = "-"; }
				if($b3 == 0) { $b3 = "-"; }
				if($b4 == 0) { $b4 = "-"; }
				if($b5 == 0) { $b5 = "-"; }
				
				?>
				
              <td width="35%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Answer; ?></font></td>
              <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $b1; ?></font></div></td>
			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $b2; ?></font></div></td>

			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $b3; ?></font></div></td>

			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $b4; ?></font></div></td>

			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $b5; ?></font></div></td>
			  
  </tr>
			   <?
			
			}
			?>
			
</table>
		  <?
		  } #end of Question if statement
		  ?>
<br>
<br>
		  
		  <?
			$sql142 = "SELECT * FROM tblSurveyQuestions WHERE QuestionID = '54'";
			$result142 = mysql_query($sql142) or die("Cannot get ranked questions");
			
			while($row142 = mysql_fetch_array($result142))
			{
			$Question = $row142[Question];
			$QuestionID = $row142[QuestionID];
			
			?>
          <font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Question; ?></strong></font> <br>
                    <font size="2" face="Arial, Helvetica, sans-serif"><em>(1= top choice; 4= last choice)</em></font><br> 
<br>            
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
            <tr>
              <td width="35%">&nbsp;</td>
              <td bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>1</strong></font></div></td>
              <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>2</strong></font></div></td>
              <td bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>3</strong></font></div></td>
              <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>4</strong></font></div></td>
            </tr>
            <tr>
		
		<?
		$sql152 = "SELECT * from tblSurveyAnswers WHERE QuestionID = '$QuestionID' AND Status = 'active'";
		$result152 = mysql_query($sql152) or die("Cannot retrieve question info, please try again.");
		
		while($row152 = mysql_fetch_array($result152))
		{
		$Answer = $row152[Answer];
		$AnswerID = $row152[AnswerID];
				
				$c1 = 0;
				$c2 = 0;
				$c3 = 0;
				$c4 = 0;
				
				
				$sql1312 = "SELECT Count(AnswerID) as Count FROM tblSurveyQA WHERE OtherText <> '0' AND OtherText <> '' AND AnswerID = '$AnswerID'";
				$result1312 = mysql_query($sql1312) or die("Cannot get count");
				
				while($row1312 = mysql_fetch_array($result1312))
				{
				$Countc = $row1312[Count];
				}
				
				
				$sql162 = "SELECT Count(OtherText) as c1 FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '1' AND SurveyID = '$SurveyID'  GROUP BY OtherText";
				$result162 = mysql_query($sql162) or die("Cannot get ranks");
				while($row162 = mysql_fetch_array($result162))
				{
					$c1 = $row162[c1];
				}
				
				$sql172 = "SELECT Count(OtherText) as c2, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '2' AND SurveyID = '$SurveyID'  GROUP BY OtherText";
				$result172 = mysql_query($sql172) or die("Cannot get ranks");
				while($row172 = mysql_fetch_array($result172))
				{
					$c2 = $row172[c2];
				}
				
				$sql182 = "SELECT Count(OtherText) as c3, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '3' AND SurveyID = '$SurveyID'  GROUP BY OtherText";
				$result182 = mysql_query($sql182) or die("Cannot get ranks");
				while($row182 = mysql_fetch_array($result182))
				{
					$c3 = $row182[c3];
				}
				
				$sql192 = "SELECT Count(OtherText) as c4, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '4' AND SurveyID = '$SurveyID'  GROUP BY OtherText";
				$result192 = mysql_query($sql192) or die("Cannot get ranks");
				while($row192 = mysql_fetch_array($result192))
				{
					$c4 = $row192[c4];
				}

				if($c1 == 0) { $c1 = "-"; }
				if($c2 == 0) { $c2 = "-"; }
				if($c3 == 0) { $c3 = "-"; }
				if($c4 == 0) { $c4 = "-"; }
				
				?>
				
              <td width="35%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Answer; ?></font></td>
              <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $c1; ?></font></div></td>

			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $c2; ?></font></div></td>

			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $c3; ?></font></div></td>

			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $c4; ?></font></div></td>


			  
  </tr>
			   <?
			
			}
			?>
			
</table>
		  <?
		  } #end of Question if statement
		  ?>
		  
		  
		
		  
			<?
			$sql55 = "SELECT * FROM tblSurveyQA WHERE QuestionID = '65' AND Status = 'active' AND OtherText <> '' AND SurveyID = '$SurveyID'";
			$result55 = mysql_query($sql55) or die("Cannot count the comments");
			
			$CountComments = mysql_num_rows($result55);
			?>
		  
		  
<p><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">Additional
Comments:<br>
<font color="#000000" size="2">(<? echo $CountComments; ?> comments)</font></font></p>
		  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
            <tr>
			<?
			
			$sql66 = "SELECT * FROM tblSurveyQA WHERE QuestionID = '65' AND Status = 'active' AND OtherText <> '' AND SurveyID = '$SurveyID'";
			$result66 = mysql_query($sql66) or die("Cannot count the comments");
			
			while($row66 = mysql_fetch_array($result66))
			{
			$Comments = $row66[OtherText];

			?>
              <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Comments; ?></font></td>
            </tr>
			<?
			}
			?>
          </table>
		  <p>&nbsp;</p>
<p>&nbsp;</p>
		  <p>	        
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);
// has side menu, and bottom HTML TAGS - found in local folder
require "../include/sidemenu.php";
// has links that show up at the bottom in it - found in home management folder
require "../../include/footerlinks.php";


// finishes security for page
}
else
{
?>
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>