<?
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


?>


<html>
<head>
<title><? echo $Title;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="include/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="700" border="0" align="center" cellpadding="3" cellspacing="0" class="main">
  <tr>
    <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $https;?>product.php"><strong>Buy 
      your Silent Timer Now!</strong></a></font></div></td>
  </tr>
  <tr>
    <td><div align="center">
        <table width="700" border="1" align="center" cellpadding="10" cellspacing="0" bordercolor="#FF0000">
          <tr> 
            <td align="left" valign="top"> <div align="center"> 
                <div align="center"> 
                  