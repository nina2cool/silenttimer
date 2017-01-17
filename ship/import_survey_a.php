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
	$handle = fopen ("shippingexport/surveyPP3a.csv","r");
	
	# put each CSV line into array, one by one
	while ($data = fgetcsv ($handle, 1000, ","))
	{
		#$num = count ($data);
		
		#grab data from the array line
		$QuestionID = $data[0];
		$Answer = escapeQuote($data[1]);
		$Other = $data[2];
		$OtherBox = $data[3];
		$Status = $data[4];

				

		# insert data into database for shipment...
		$sql = "INSERT INTO tblSurveyAnswers
		(QuestionID, Answer, Other, OtherBox, Status) 
	 	VALUES ('$QuestionID', '$Answer', '$Other', '$OtherBox', '$Status')";
		//echo $sql;
		 
		mysql_query($sql) or die("Cannot insert survey answers, please try again.");
		
	} // end of while loop and program
	
	fclose ($handle);
	mysql_close($link);
	
	echo "Should be done, check it, YES!";
	
	
?>