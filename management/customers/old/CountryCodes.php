<html>
<head>
<title>Country Codes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?

	// has database username and password, so don't need to put it in the page.
	require "../include/dbinfo.php";


	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			



?>
<body>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Country
      Codes</strong></font></p>

<table width="50%" border="1" cellpadding="8" cellspacing="0" bordercolor="#000000">
  <tr>
    <td height=""><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Country Name </font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Country Code<br>
    (use this in Customer table) </font></strong></div></td>
  </tr>
  <tr> 
  
  <?
  
  	$sql = "SELECT * FROM tblCountry";
	$result = mysql_query($sql) or die("Cannot execute query country!");
		
		while($row = mysql_fetch_array($result))
		{
			
			$Name = $row[Name];
			$Code = $row[ISO];
  
  ?>
  
  
    <td width="" height=""><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Name; ?>&nbsp;</font></td>
    <td width=""><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $Code; ?> </strong></font></div></td>
  </tr>
  <?
  
  }
  
  //close connection to database
mysql_close($link);
  
  ?>
  
  
</table>
<p>&nbsp;</p>
<p align="right"><font size="3" face="Arial, Helvetica, sans-serif"><a href="javascript:window.close();">Close 
  this Window</a></font></p>
</body>
</html>
