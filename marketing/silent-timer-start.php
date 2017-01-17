<?
//security for page
session_start();

	require "../include/dbinfo.php";
	
	/*///////////////////////////////////////////////////////////////
	*
	* > Code to insert counter information into database
	*
	*//////////////////////////////////////////////////////////////	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	# variables for both tables...
	$now = date("Y-m-d H:i:s"); # date time
	$page = 'http://'.$HTTP_HOST.$REQUEST_URI; # current page
	$fromPage = getenv("HTTP_REFERER"); # from address
	
	// if session is already started, then insert into tblTracker
	If (session_is_registered('visitor'))
	{
		# grab session variable...
		$vID = $_SESSION['visitor'];
		
		#insert info into tblWebTracker
		$sql = "INSERT INTO tblWebTracker (VisitorID, Page, FromPage, DateTime) 
				VALUES ('$vID', '$page', '$fromPage', '$now')";
		mysql_query($sql);
	}
	else
	{
		$ip = $_SERVER["REMOTE_ADDR"];
		$Browser = $_SERVER["HTTP_USER_AGENT"];
		
		#insert info into tblWebVisitor
		$sql = "INSERT INTO tblWebVisitors (Page, FromPage, DateTime, IP, Platform, AffiliateID)
				VALUES ('$page', '$fromPage', '$now', '$ip', '$Browser', '$aID')";
		mysql_query($sql);
		
		# find visitor ID
		$sql = "SELECT VisitorID FROM tblWebVisitors WHERE Page = '$page' AND FromPage = '$fromPage' AND DateTime = '$now' AND IP = '$ip' AND Platform = '$Browser'";
		$result = mysql_query($sql) or die("Cannot retrieve Customer ID, please try again.");
				
		while($row = mysql_fetch_array($result))
		{
			$vID = $row[VisitorID];
		}
		
		# create session
		session_register('visitor');
		$_SESSION['visitor'] = $vID;
	}
	
	mysql_close($link);
	///////////////////////////////////////////////////////////////
	
	
	
	$Test = $_GET['test'];
	$Keyword = $_GET['keyword'];
	$Source = $_GET['s'];
	
	
	if($Test == "SAT" OR $Test == "ACT")
	{
		$redirect = "http://www.silenttimer.com/testhome/sat-act-silent-timer.php";
	}
	else if($Test == "LSAT")
	{
		$redirect = "http://www.silenttimer.com/testhome/lsat-silent-timer.php";
	}
	else
	{
	
		$i = rand(1,2);
		
		if($i == 1)
		{
			$redirect = "http://www.silenttimer.com/marketing/campaign1/silent-test-timer.php?test=$Test";
		}
		
		if($i == 2)
		{	
			$redirect = "http://www.silenttimer.com/marketing/campaign2/the-silent-lsat-timer.php?test=$Test";
		}
		
	}
	
	header("location: $redirect");

?>