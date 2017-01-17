<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


		$sql4 = "SELECT SurveyID AS Survey FROM tblSurvey WHERE Status = 'active' AND DateTime >= '2005-06-01 00:00:00' AND DateTime <= '2005-06-30 23:59:59'";
		$result4 = mysql_query($sql4) or die("Cannot retrieve survey info, please try again.");
		
		//$Survey = mysql_fetch_array($result4);
		
		while($row4 = mysql_fetch_array($result4))
		{
		$Survey = $row4[Survey];
		
		//$Survey2 = array($Survey);
		
		

		
		
		
		echo "surveyID = ". $Survey;
		?>
		<br>
		<?
		
		
		$SurveyMin = min(array($Survey));
		$SurveyMax = max(array($Survey));
		
		}
		echo "Min = ". $SurveyMin;
		?>
		<br>
		<?
		echo "Max = ". $SurveyMax;
		?>
		<br>
		<?
				
		
		$Random = rand($SurveyMin, $SurveyMax);
		
		echo "Random = ". $Random;
		?>
		<br>
		<br>
		<?
		
		/*
		
		$sql = "SELECT * FROM tblSurvey WHERE SurveyID = '$Random'";
		$result = mysql_query($sql) or die("Cannot retrieve survey info, please try again.");
		
		while($row = mysql_fetch_array($result))
		{
		$SurveyID = $row[SurveyID];
		$FirstName = $row[FirstName];
		$LastName = $row[LastName];
		$Email = $row[Email];
		$Date = $row[DateTime];
		}
		
		
		?>
		<p><strong><font size="3" face="Arial, Helvetica, sans-serif">Result:</font></strong></p>
  <form name="form1" method="post" action="">
    <font size="2" face="Arial, Helvetica, sans-serif"><?php echo $FirstName; ?>
    <?php echo $LastName; ?> - SurveyID = <?php echo $SurveyID; ?></font>
    <p><font size="2" face="Arial, Helvetica, sans-serif">Survey Date: <?php echo $Date; ?></font></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif">Email: <a href="mailto:<? echo $Email; ?>"><? echo $Email; ?></a></font></p>
  </form>
  <?
  
		*/
		
	
	


?>
  <p>    
    <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


mysql_close($link);

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
		
// has links that show up at the bottom in it.
require "../include/footerlinks.php";



}
// finishes security for page
?>
  </p>
<p>&nbsp;</p>
