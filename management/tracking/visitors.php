<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?

#get date from URL
$date=$_GET['dt'];
$ordered=$_GET['o'];


// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	# get robots from search engine and don't include in results...
	$sql = "SELECT * FROM tblSearchEngine";
	$result = mysql_query($sql) or die("Cannot execute query!");
	$NumBots = mysql_num_rows($result);
	
	$i = 0;
	while($row = mysql_fetch_array($result))
	{
		$BOT[$i] = $row[BOT];
		$i++;
	}


	if($ordered == "y")
	{
	
		//SQL to get data from tracking table
		$sql = "SELECT DATE_FORMAT(tblWebVisitors.DateTime,'%H:%i') AS Time, tblWebVisitors.IP, tblWebVisitors.Page, 
				tblWebVisitors.FromPage, tblWebVisitors.VisitorID
				FROM tblWebVisitors INNER JOIN tblWebTracker ON tblWebVisitors.VisitorID=tblWebTracker.VisitorID
				WHERE tblWebVisitors.DateTime >= '$date 00:00:00' AND tblWebVisitors.DateTime <= '$date 23:59:59' 
				AND tblWebTracker.Page = 'http://secure.silenttimer.com/order/receipt.php' 
				GROUP BY tblWebVisitors.VisitorID 
				ORDER BY tblWebVisitors.DateTime";
	}
	else
	{	
	
		//SQL to get data from tracking table
		$sql = "SELECT DATE_FORMAT(DateTime,'%H:%i') AS Time, IP, Page, FromPage, VisitorID
				FROM tblWebVisitors 
				WHERE DateTime >= '$date 00:00:00' AND DateTime <= '$date 23:59:59'";
		
		if($NumBots > 0)
		{
			for($i=0;$i<$NumBots;$i++)
			{
				$sql .=" AND tblWebVisitors.Platform != '$BOT[$i]'";
			}
		}	
				
		$sql .=	" GROUP BY tblWebVisitors.VisitorID 
				ORDER BY DateTime";	
	}

	
	#######
	# Set limits on SQl results...
	# put AFTER SQL statement, and BEFORE RESULT Statement
	$Activate=1;
	$screen = $_GET['screen'];
	$rows_per_page = 10;
	$pagename = "visitors.php";
	$extra = "&dt=$date";
	if ($screen == "")
	{
		$screen = 0;
	}
	$result = mysql_query($sql);
	$total_records = mysql_num_rows($result);
	$pages = ceil($total_records / $rows_per_page) -1;
	mysql_free_result($result);
	
	$start = $screen * $rows_per_page;
	# add the LIMIT command to the SQL!
	$sql .= " LIMIT $start, $rows_per_page";
	#
	#
	#######

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query! 2");
	
?>


<html>
<head>
<title>Silent Timer Tracking!</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<p><font face="Arial, Helvetica, sans-serif"><strong>Visitors for <? echo $date;?></strong></font></p>
<table width="100%" border="1" cellspacing="0" cellpadding="4">
  <tr bgcolor="#000099"> 
    <td>
<div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"># 
        </font></strong></div></td>
    <td>
<div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Time</font></strong></div></td>
    <td>
<div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">IP</font></strong></div></td>
    <td>
<div align="left"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Referring_URL</font></strong></div></td>
    <td>
<div align="left"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Landing_URL 
        </font></strong></div></td>
    <td>
<div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"># 
        Pages </font></strong></div></td>
  </tr>
  <?
  		$i=1;
		
		while($row = mysql_fetch_array($result))
		{
			$Time = $row[Time];
			$IP = $row[IP];
			$LandingPage = $row[Page];
			$FromPage = $row[FromPage];
			$VisitorID = $row[VisitorID];
			
			//get number of pageviews for this visitor
			$sql2 = "SELECT COUNT(TrackerID) As NumPageViews 
					FROM tblWebTracker 
					WHERE VisitorID='$VisitorID'
					GROUP BY VisitorID";
			
			//put SQL statement into result set for loop through records
			$result2 = mysql_query($sql2) or die("Cannot execute query!");
			
			while($row2 = mysql_fetch_array($result2))
			{
				$NumViews = $row2[NumPageViews]+1;
			}
			
			
			
			//did this person order???
			$sql2 = "SELECT DATE_FORMAT(DateTime,'%m/%d/%y') AS DateTime, COUNT(TrackerID) As NumOrders 
					FROM tblWebTracker 
					WHERE VisitorID='$VisitorID' AND Page = 'http://secure.silenttimer.com/order/receipt.php'
					GROUP BY DateTime";
			
			
			//put SQL statement into result set for loop through records
			$result2 = mysql_query($sql2) or die("Cannot execute query!");
			$NumRows = mysql_num_rows($result2);

  ?>
  <tr<? if($NumRows > 0){?> bgcolor="#FFFFCC"<? }?>> 
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="visit.php?views=<? echo $NumViews;?>&vID=<? echo $VisitorID;?><? if($NumRows > 0){?>&o=y<? }?>"><? echo $i;?></a></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Time;?></font></div></td>
    <td> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $IP;?></font></div></td>
    <td> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $FromPage;?>" target="_blank"><? echo $FromPage;?></a></font></div></td>
    <td> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $LandingPage;?>" target="_blank"><? echo $LandingPage;?></a></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NumViews;?></font></div></td>
  </tr>
  <?
  		$i++;
		
  		}
		mysql_close($link);
  ?>
</table>

<? 
	######################################
	# NAVIGATION BUTTONS for records
	#
		require("navigation_buttons.php");
	#
	#
	######################################
?>


<p>&nbsp;</p>
</body>
</html>
