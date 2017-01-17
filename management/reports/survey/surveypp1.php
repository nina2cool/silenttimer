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

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


	$sql4 = "SELECT Count(SurveyID) as Total from tblSurvey WHERE Status = 'active' AND SurveyName = 'PP1'";
	$result4 = mysql_query($sql4) or die("Cannot retrieve answer info, please try again.");
	
	while($row4 = mysql_fetch_array($result4))
	{
	$Total = $row4[Total];
	}



?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Post
      Purchase Survey # 1 Results</strong></font></p>
<p><font color="#CC0000" size="3" face="Arial, Helvetica, sans-serif"><strong>#
      of Surveyed People: <?php echo $Total; ?></strong></font> </p>
<table width="40%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td width="50%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Test</font></strong></div></td>
    <td width="50%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"># of Respondants </font></strong></div></td>
  </tr>
  <tr>
  
  <?
  	$sql44 = "SELECT Count(Test) as NumTests, Test from tblSurvey WHERE Status = 'active' AND SurveyName = 'PP1' GROUP BY Test";
	//echo $sql44;
	$result44 = mysql_query($sql44) or die("Cannot retrieve answer info, please try again.");
	
	while($row44 = mysql_fetch_array($result44))
	{
	$Test = $row44[Test];
	$NumTests = $row44[NumTests];
	
	if($Test == '' OR $Test == "Test")
	{
	$Test = "n/a";
	}
  
  ?>
  
    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Test; ?></font></td>
    <td width="50%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumTests; ?></font></div></td>
  </tr>
  <?
  }
  ?>
</table>
<?
	
		$sql5 = "SELECT * from tblSurveyQuestions WHERE Status = 'active' AND SurveyName = 'PP1' AND Rank = 'n' AND Display = 'y'";
		
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
  #</font></strong><font face="Arial, Helvetica, sans-serif">: <strong><? echo $Question; ?> </strong><br>
  (#
  of Responses: </font><font size="2" face="Arial, Helvetica, sans-serif"><? echo $TotalCount; ?>)</font></font></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
	<?
	
		$sql = "SELECT * from tblSurveyAnswers WHERE QuestionID = '$QuestionID' AND Status = 'active'";
		
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

				$sql2 = "SELECT Count(AnswerID) as AnswerCount from tblSurveyQA WHERE QuestionID = '$QuestionID' AND AnswerID = '$AnswerID' AND Status = 'active'";
				//echo $sql2;
				$result2 = mysql_query($sql2) or die("Cannot retrieve answer info, please try again.");
				
				while($row2 = mysql_fetch_array($result2))
				{
				$AnswerCount = $row2[AnswerCount];
				
				

				
				if($CheckAll == 'y')
				{
				$Percent = $AnswerCount / $Total * 100;
				}
				else
				{
				$Percent = $AnswerCount / $TotalCount * 100;
				}
				
				
	?>
	
	
	
      	   <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Answer; ?>
		
							<? 
					  $sql7 = "SELECT * FROM tblSurveyQA WHERE OtherText <> '' AND Status = 'active' AND AnswerID = '$AnswerID'";
					  $result7 = mysql_query($sql7) or die("Cannot get other text");
					  
					  while($row7 = mysql_fetch_array($result7))
					  {
					  $OtherText = $row7[OtherText];
					  $SurveyID = $row7[SurveyID];
					  
					   ?>
						
						   <li><? echo $OtherText; ?> (<a href="surveypp1result.php?s=<? echo $SurveyID; ?>" target="_blank"><? echo $SurveyID; ?></a>)</li>
						   
						   <?
					  }
					  ?>
	  </font></td>
      <td width="15%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $AnswerCount; ?></font></td>
	  
	  <?
	  if($Percent < '50')
	  {
	  ?> 
      <td width="15%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($Percent,0); ?>%</font></td>
	  <?
	  }
	  else
	  {
	  ?> 
      <td width="15%"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($Percent,0); ?>%</font></td>
	  <?
	  }
	  ?>
	  
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
			$sql4 = "SELECT * FROM tblSurveyQuestions WHERE QuestionID = '28'";
			$result4 = mysql_query($sql4) or die("Cannot get ranked questions");
			
			while($row4 = mysql_fetch_array($result4))
			{
			$Question = $row4[Question];
			$QuestionID = $row4[QuestionID];
			
			?>
			        <font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Question; ?></strong></font>
                    <br>
                    <br>            
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
            <tr>
              <td width="25%">&nbsp;</td>
              <td colspan="2" bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>1</strong></font></div></td>
              <td colspan="2"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>2</strong></font></div></td>
              <td colspan="2" bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>3</strong></font></div></td>
              <td colspan="2"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>4</strong></font></div></td>
              <td colspan="2" bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>5</strong></font></div></td>
              <td colspan="2"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>6</strong></font></div></td>
              <td colspan="2" bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>7</strong></font></div></td>
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
				
				$sql13 = "SELECT Count(AnswerID) as Count FROM tblSurveyQA WHERE OtherText <> '0' AND OtherText <> '' AND AnswerID = '$AnswerID'";
				$result13 = mysql_query($sql13) or die("Cannot get count");
				
				while($row13 = mysql_fetch_array($result13))
				{
				$Count = $row13[Count];
				}
				
				
				$sql6 = "SELECT Count(OtherText) as a1 FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '1' GROUP BY OtherText";
				$result6 = mysql_query($sql6) or die("Cannot get ranks");
				while($row6 = mysql_fetch_array($result6))
				{
					$a1 = $row6[a1];
				}
				
				$sql7 = "SELECT Count(OtherText) as a2, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '2' GROUP BY OtherText";
				$result7 = mysql_query($sql7) or die("Cannot get ranks");
				while($row7 = mysql_fetch_array($result7))
				{
					$a2 = $row7[a2];
				}
				
				$sql8 = "SELECT Count(OtherText) as a3, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '3' GROUP BY OtherText";
				$result8 = mysql_query($sql8) or die("Cannot get ranks");
				while($row8 = mysql_fetch_array($result8))
				{
					$a3 = $row8[a3];
				}
				
				$sql9 = "SELECT Count(OtherText) as a4, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '4' GROUP BY OtherText";
				$result9 = mysql_query($sql9) or die("Cannot get ranks");
				while($row9 = mysql_fetch_array($result9))
				{
					$a4 = $row9[a4];
				}
				
				$sql10 = "SELECT Count(OtherText) as a5, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '5' GROUP BY OtherText";
				$result10 = mysql_query($sql10) or die("Cannot get ranks");
				while($row10 = mysql_fetch_array($result10))
				{
					$a5 = $row10[a5];
				}
				
				$sql11 = "SELECT Count(OtherText) as a6, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '6' GROUP BY OtherText";
				$result11 = mysql_query($sql11) or die("Cannot get ranks");
				while($row11 = mysql_fetch_array($result11))
				{
					$a6 = $row11[a6];
				}
				
				$sql12 = "SELECT Count(OtherText) as a7, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '7' GROUP BY OtherText";
				$result12 = mysql_query($sql12) or die("Cannot get ranks");
				while($row12 = mysql_fetch_array($result12))
				{
					$a7 = $row12[a7];
				}
				
				if($Count <> 0 AND $Count <> "")
				{
					$a1Percent = $a1 / $Count * 100;
					$a2Percent = $a2 / $Count * 100;
					$a3Percent = $a3 / $Count * 100;
					$a4Percent = $a4 / $Count * 100;
					$a5Percent = $a5 / $Count * 100;
					$a6Percent = $a6 / $Count * 100;
					$a7Percent = $a7 / $Count * 100;
				}
				
				?>
				
              <td width="25%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Answer; ?> <font size="1"><br>
              (<? echo $Count; ?> responses)</font></font></td>
              <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $a1; ?></font></div></td>
              
			  <? if($a1Percent < 50) { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($a1Percent,0); ?>%</font></div></td>
              <? } else { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($a1Percent,0); ?>%</font></div></td>
              <? } ?>
			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $a2; ?></font></div></td>
			  
			  <? if($a2Percent < 50) { ?>
			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($a2Percent,0); ?>%</font></div></td>
              <? } else { ?>
			  <td><div align="center"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($a2Percent,0); ?>%</font></div></td>
              <? } ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $a3; ?></font></div></td>
			  
			  <? if($a3Percent < 50) { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($a3Percent,0); ?>%</font></div></td>
              <? } else { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($a3Percent,0); ?>%</font></div></td>
              <? } ?>  
			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $a4; ?></font></div></td>
              
			  <? if($a4Percent < 50) { ?>
			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($a4Percent,0); ?>%</font></div></td>
              <? } else { ?>
			  <td><div align="center"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($a4Percent,0); ?>%</font></div></td>
              <? } ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $a5; ?></font></div></td>
              
			  <? if($a5Percent < 50) { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($a5Percent,0); ?>%</font></div></td>
              <? } else { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($a5Percent,0); ?>%</font></div></td>
              <? } ?>                
			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $a6; ?></font></div></td>
              
  			  <? if($a6Percent < 50) { ?>
			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($a6Percent,0); ?>%</font></div></td>
              <? } else { ?>
			  <td><div align="center"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($a6Percent,0); ?>%</font></div></td>
              <? } ?>              
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $a7; ?></font></div></td>
         	  
			  <? if($a7Percent < 50) { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($a7Percent,0); ?>%</font></div></td>
              <? } else { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($a7Percent,0); ?>%</font></div></td>
              <? } ?>               </tr>
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
			$sql14 = "SELECT * FROM tblSurveyQuestions WHERE QuestionID = '29'";
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
              <td colspan="2" bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>1</strong></font></div></td>
              <td colspan="2"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>2</strong></font></div></td>
              <td colspan="2" bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>3</strong></font></div></td>
              <td colspan="2"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>4</strong></font></div></td>
			  <td colspan="2" bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>5</strong></font></div></td>
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
				
				
				$sql16 = "SELECT Count(OtherText) as b1 FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '1' GROUP BY OtherText";
				$result16 = mysql_query($sql16) or die("Cannot get ranks");
				while($row16 = mysql_fetch_array($result16))
				{
					$b1 = $row16[b1];
				}
				
				$sql17 = "SELECT Count(OtherText) as b2, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '2' GROUP BY OtherText";
				$result17 = mysql_query($sql17) or die("Cannot get ranks");
				while($row17 = mysql_fetch_array($result17))
				{
					$b2 = $row17[b2];
				}
				
				$sql18 = "SELECT Count(OtherText) as b3, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '3' GROUP BY OtherText";
				$result18 = mysql_query($sql18) or die("Cannot get ranks");
				while($row18 = mysql_fetch_array($result18))
				{
					$b3 = $row18[b3];
				}
				
				$sql19 = "SELECT Count(OtherText) as b4, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '4' GROUP BY OtherText";
				$result19 = mysql_query($sql19) or die("Cannot get ranks");
				while($row19 = mysql_fetch_array($result19))
				{
					$b4 = $row19[b4];
				}
				
				$sql20 = "SELECT Count(OtherText) as b5, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '5' GROUP BY OtherText";
				$result20 = mysql_query($sql20) or die("Cannot get ranks");
				while($row20 = mysql_fetch_array($result20))
				{
					$b5 = $row20[b5];
				}

				if($Countb <> 0 AND $Countb <> "")
				{
					$b1Percent = $b1 / $Countb * 100;
					$b2Percent = $b2 / $Countb * 100;
					$b3Percent = $b3 / $Countb * 100;
					$b4Percent = $b4 / $Countb * 100;
					$b5Percent = $b5 / $Countb * 100;
				}
				
				?>
				
              <td width="35%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Answer; ?> <font size="1"><br>
              (<? echo $Countb; ?> responses)</font></font></td>
              <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $b1; ?></font></div></td>
              
			  <? if($b1Percent < 50) { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($b1Percent,0); ?>%</font></div></td>
              <? } else { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($b1Percent,0); ?>%</font></div></td>
              <? } ?>
			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $b2; ?></font></div></td>
			  
			  <? if($b2Percent < 50) { ?>
			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($b2Percent,0); ?>%</font></div></td>
              <? } else { ?>
			  <td><div align="center"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($b2Percent,0); ?>%</font></div></td>
              <? } ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $b3; ?></font></div></td>
			  
			  <? if($b3Percent < 50) { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($b3Percent,0); ?>%</font></div></td>
              <? } else { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($b3Percent,0); ?>%</font></div></td>
              <? } ?>  
			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $b4; ?></font></div></td>
              
			  <? if($b4Percent < 50) { ?>
			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($b4Percent,0); ?>%</font></div></td>
              <? } else { ?>
			  <td><div align="center"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($b4Percent,0); ?>%</font></div></td>
              <? } ?>
			  
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $b5; ?></font></div></td>
			  
			  <? if($b5Percent < 50) { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($b5Percent,0); ?>%</font></div></td>
              <? } else { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($b5Percent,0); ?>%</font></div></td>
              <? } ?> 
			  
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
			$sql142 = "SELECT * FROM tblSurveyQuestions WHERE QuestionID = '33'";
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
              <td colspan="2" bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>1</strong></font></div></td>
              <td colspan="2"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>2</strong></font></div></td>
              <td colspan="2" bordercolor="#CCCCCC" bgcolor="#FFFFCC"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>3</strong></font></div></td>
              <td colspan="2"><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong>4</strong></font></div></td>
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
				
				
				$sql162 = "SELECT Count(OtherText) as c1 FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '1' GROUP BY OtherText";
				$result162 = mysql_query($sql162) or die("Cannot get ranks");
				while($row162 = mysql_fetch_array($result162))
				{
					$c1 = $row162[c1];
				}
				
				$sql172 = "SELECT Count(OtherText) as c2, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '2' GROUP BY OtherText";
				$result172 = mysql_query($sql172) or die("Cannot get ranks");
				while($row172 = mysql_fetch_array($result172))
				{
					$c2 = $row172[c2];
				}
				
				$sql182 = "SELECT Count(OtherText) as c3, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '3' GROUP BY OtherText";
				$result182 = mysql_query($sql182) or die("Cannot get ranks");
				while($row182 = mysql_fetch_array($result182))
				{
					$c3 = $row182[c3];
				}
				
				$sql192 = "SELECT Count(OtherText) as c4, OtherText FROM tblSurveyQA WHERE AnswerID = '$AnswerID' AND OtherText = '4' GROUP BY OtherText";
				$result192 = mysql_query($sql192) or die("Cannot get ranks");
				while($row192 = mysql_fetch_array($result192))
				{
					$c4 = $row192[c4];
				}

				if($Countc <> 0 AND $Countc <> "")
				{
					$c1Percent = $c1 / $Countc * 100;
					$c2Percent = $c2 / $Countc * 100;
					$c3Percent = $c3 / $Countc * 100;
					$c4Percent = $c4 / $Countc * 100;
				}
				
				?>
				
              <td width="35%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Answer; ?> <font size="1">
              (<? echo $Countc; ?> responses)</font></font></td>
              <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $c1; ?></font></div></td>
              
			  <? if($c1Percent < 50) { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($c1Percent,0); ?>%</font></div></td>
              <? } else { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($c1Percent,0); ?>%</font></div></td>
              <? } ?>
			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $c2; ?></font></div></td>
			  
			  <? if($c2Percent < 50) { ?>
			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($c2Percent,0); ?>%</font></div></td>
              <? } else { ?>
			  <td><div align="center"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($c2Percent,0); ?>%</font></div></td>
              <? } ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $c3; ?></font></div></td>
			  
			  <? if($c3Percent < 50) { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($c3Percent,0); ?>%</font></div></td>
              <? } else { ?>
			  <td bgcolor="#FFFFCC"><div align="center"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($c3Percent,0); ?>%</font></div></td>
              <? } ?>  
			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $c4; ?></font></div></td>
              
			  <? if($c4Percent < 50) { ?>
			  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo number_format($c4Percent,0); ?>%</font></div></td>
              <? } else { ?>
			  <td><div align="center"><font size="2" color="#CC0000" face="Arial, Helvetica, sans-serif"><? echo number_format($c4Percent,0); ?>%</font></div></td>
              <? } ?>

			  
  </tr>
			   <?
			
			}
			?>
			
</table>
		  <?
		  } #end of Question if statement
		  ?>
		  
		  
		
		  
			<?
			$sql55 = "SELECT * FROM tblSurveyQA WHERE QuestionID = '34' AND Status = 'active' AND OtherText <> ''";
			$result55 = mysql_query($sql55) or die("Cannot count the comments");
			
			$CountComments = mysql_num_rows($result55);
			?>
		  
		  
<p><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">Additional
Comments:<br>
<font color="#000000" size="2">(<? echo $CountComments; ?> comments)</font></font></p>
		  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
            <tr>
			<?
			
			$sql66 = "SELECT * FROM tblSurveyQA WHERE QuestionID = '34' AND Status = 'active' AND OtherText <> '' ORDER BY SurveyID ASC";
			$result66 = mysql_query($sql66) or die("Cannot count the comments");
			
			while($row66 = mysql_fetch_array($result66))
			{
			$Comments = $row66[OtherText];
			$SurveyID = $row66[SurveyID];

			?>
              <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Comments; ?> (<a href="surveypp1result.php?s=<? echo $SurveyID; ?>" target="_blank"><? echo $SurveyID; ?></a>)</font></td>
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