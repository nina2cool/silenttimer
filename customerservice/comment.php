<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('custID'))
{
// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	$custID = $_SESSION['custID'];
	$CustomerID = $custID;
	
		//connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			
	
	# --------------------------------------------------------------------------------------------
	#   Function to insert back slashes into characters with a single or a double quote in them.
	# --------------------------------------------------------------------------------------------
	function escapeQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("'","||",$var);
			$string = str_replace('"','||||',$string);
		}

		return $string;
	}
	
	function removeBars($var)
	{
		if (isset($var))
		{
			$string = str_replace("||","'",$var);
			$string = str_replace('||||','"',$string);
		}

		return $string;
	}

	function addQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("\'","'",$var);
			$string = str_replace('\"','"',$string);
		}

		return $string;
	}
	
	function dbQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("||","\'",$var);
			$string = str_replace('||||','\"',$string);
		}

		return $string;
	}
	# --------------------------------------------------------------------------------------------
	
	

		
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$custID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
			
	while($row = mysql_fetch_array($result))
	{
		$FirstName = $row[FirstName];
		$LastName = $row[LastName];
		$City = $row[City];
		$State = $row[State];
		$Email = $row[Email];
	}
	
	$now = date("Y-m-d H:i:s");
	$IP = $_SERVER["REMOTE_ADDR"];
	
	#<submit button being pushed>
	if ($_POST['Submit'] == "Submit Your Response")
	{
		
		$Comment = dbQuote($_POST['Comment']);
		$Test = $_POST['Test'];
		$Type = $_POST['Type'];
		$radio = $_POST['radio'];
		
		
		if($radio == "y")
		{
		$UseTestimonial = "y";
		}
		else
		{
		$UseTestimonial = "n";
		}
		
		$Location = $City. ", " .$State;
		$Name = $FirstName;
		
		$sql2 = "INSERT INTO tblTestimonial(Testimonial, Type, Test, UseTestimonial, IP, Status, CustomerID, Location, DateSubmitted, Web, Name)
		VALUES('$Comment', '$Type', '$Test', '$UseTestimonial', '$IP', 'active', '$CustomerID', '$Location', '$now', 'n', '$Name');";
		//echo $sql2;
		$result2 = mysql_query($sql2) or die("cannot insert comment");
		
		
		mail("info@silenttimer.com, dina@silenttimer.com", "$Type given", "$FirstName $LastName left a $Type for us on $now.\n\nThe comment is: $Comment\n\nUse testimonial?  $UseTestimonial\nTest: $TestID", "From:Comment Form<info@silenttimer.com>");
		

		
		}
$Comment = addQuote($Comment);

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";
		

?><title>Comments, Questions, and Testimonials</title>


<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Comments,
      Questions, and Testimonials </strong></font></p>
<form name="form1" method="post" action="">
  <p><font size="2" face="Arial, Helvetica, sans-serif">If you have any comments
      or questions, please write it in the space below.</font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif">If you have a <font color="#33CC33"><strong>testimonial</strong></font> you'd
      like to give about The Silent Timer&#8482;, write your testimonial in the
      space below. Please check the box that says it is okay to post your comment
      on our web site (in the <a href="http://www.silenttimer.com/stories/" target="_blank">testimonial
    section</a>) along
    with your first name, the test you took, and the city and state where you
    live. We will email you before posting to verify your city and state.</font></p>
  <p>
    <textarea name="Comment" cols="75" rows="10" id="Comment"></textarea>
</p>
  <p><font size="2" face="Arial, Helvetica, sans-serif">What type of comment are you making? </font></p>
  <p>
    <select name="Type" id="Type">
      <option value="comment" selected>Comment</option>
      <option value="question">Question</option>
      <option value="suggestion">Suggestion</option>
      <option value="testimonial">Testimonial</option>
    </select>
    <br>
</p>
  <blockquote>
    <p><strong><font size="3" face="Arial, Helvetica, sans-serif">If it is a testimonial:</font></strong></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif">May
          we post your testimonial on our web site along with your first name,
          test you took, and city and state where you live? (<a href="http://www.silenttimer.com/stories/" target="_blank">See
          examples</a>) </font></p>
    <p>
      <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="radio" type="radio" value="y"> 
      Yes.</font></p>
    <p>
      <font size="2" face="Arial, Helvetica, sans-serif">
      <input name="radio" type="radio" value="n"> 
      No.</font></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif">What test did you use The Silent Timer&#8482; for?</font></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="Test" type="text" id="Test" size="10">
    </font></p>
    <p>&nbsp;</p>
  </blockquote>
  <p>
    <input type="submit" name="Submit" value="Submit Your Response">
  </p>
</form>
<p>&nbsp;</p>
<p align="left">&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
//mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customerservice/index.php'>
<?
}
?>