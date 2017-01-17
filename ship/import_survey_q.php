<?

function escapeQuote($var)
{
	if (isset($var))
	{
		$string = str_replace("'","\'",$var);
		$string = str_replace('"','\"',$string);
	}

	return $string;
}


# ---------------------------------------------------------------------------
#   Code to import shipments and send out tracking numbers/emails...
# ---------------------------------------------------------------------------

	# has database username and password, so don't need to put it in the page.
	require "../include/dbinfo.php";
	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	#open up CSV Import file (read only)
	$handle = fopen ("shippingexport/surveyPP3qrest.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		$QuestionID = $data[0];
		$SurveyName = $data[1];
		$Question = escapeQuote($data[2]);
		$CheckAll = $data[3];
		$Rank = $data[4];
		$Display = $data[5];
		$Status = $data[6];
				

		# insert data into database for shipment...
		$sql = "INSERT INTO tblSurveyQuestions
		(QuestionID, SurveyName, Question, CheckAll, Rank, Display, Status) 
	 	VALUES ('$QuestionID', '$SurveyName', '$Question', '$CheckAll', '$Rank', '$Display', '$Status')";
		echo $sql;
		 
		mysql_query($sql) or die("Cannot insert survey questions, please try again.");
		
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "Should be done, check it, YES!";
	
	
?>