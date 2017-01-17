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
		}
		

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Post
      Purchase 
Survey # 3 Test Day/Simple Timer Results</strong></font></p>
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
<p>
  <?
	
		$sql5 = "SELECT * from tblSurveyQuestions WHERE Status = 'active' AND SurveyName = 'PP3TT' AND Display = 'y'";
		
		$result5 = mysql_query($sql5) or die("Cannot retrieve question info, please try again.");
		
		while($row5 = mysql_fetch_array($result5))
		{
		$Question = $row5[Question];
		$QuestionID = $row5[QuestionID];
		$CheckAll = $row5[CheckAll];

		$sql = "SELECT * from tblSurveyAnswers WHERE QuestionID = '$QuestionID' AND Status = 'active'";
		
		$result = mysql_query($sql) or die("Cannot retrieve question info, please try again.");
		
		while($row = mysql_fetch_array($result))
		{
		$Answer = $row[Answer];
		$AnswerID = $row[AnswerID];
	
				
				
		$sql3 = "SELECT Count(AnswerID) as TotalCount from tblSurveyQA WHERE QuestionID = '$QuestionID' AND Status = 'active'";
		$result3 = mysql_query($sql3) or die("Cannot retrieve answer info, please try again.");
		
		while($row3 = mysql_fetch_array($result3))
		{
		$TotalCount = $row3[TotalCount];
		}
		}

	?>
</p>
<p><font size="2"><strong><font face="Arial, Helvetica, sans-serif">Question
#</font></strong><font face="Arial, Helvetica, sans-serif">: <strong><? echo $Question; ?></strong></font></font></p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
	<?
	
		$sql = "SELECT * from tblSurveyAnswers WHERE QuestionID = '$QuestionID' AND Status = 'active'";
		
		$result = mysql_query($sql) or die("Cannot retrieve question info, please try again.");
		
		while($row = mysql_fetch_array($result))
		{
		$Answer = $row[Answer];
		$AnswerID = $row[AnswerID];
	
				
				
		$sql3 = "SELECT Count(AnswerID) as TotalCount from tblSurveyQA WHERE QuestionID = '$QuestionID' AND Status = 'active'";
		$result3 = mysql_query($sql3) or die("Cannot retrieve answer info, please try again.");
		
		while($row3 = mysql_fetch_array($result3))
		{
		$TotalCount = $row3[TotalCount];
		}

				$sql2 = "SELECT Count(AnswerID) as AnswerCount from tblSurveyQA WHERE QuestionID = '$QuestionID' AND AnswerID = '$AnswerID' AND Status = 'active' AND SurveyID = '$SurveyID'";
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
					  $sql7 = "SELECT * FROM tblSurveyQA WHERE OtherText <> '' AND Status = 'active' AND AnswerID = '$AnswerID' AND SurveyID = '$SurveyID'";
					  $result7 = mysql_query($sql7) or die("Cannot get other text");
					  
					  while($row7 = mysql_fetch_array($result7))
					  {
					  $OtherText = $row7[OtherText];
					  
					   ?>
						
						   <li><? echo $OtherText; ?></li>
						   
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


  
  			<?
			$sql55 = "SELECT * FROM tblSurveyQA WHERE QuestionID = '110' AND Status = 'active' AND OtherText <> '' AND SurveyID = '$SurveyID'";
			$result55 = mysql_query($sql55) or die("Cannot count the comments");
			
			$CountComments = mysql_num_rows($result55);
			?>
		  
		  
<p><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">Additional
Comments:<br>
<font color="#000000" size="2">(<? echo $CountComments; ?> comments)</font></font></p>
		  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
            <tr>
			<?
			
			$sql66 = "SELECT * FROM tblSurveyQA WHERE QuestionID = '110' AND Status = 'active' AND OtherText <> '' AND SurveyID = '$SurveyID'";
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