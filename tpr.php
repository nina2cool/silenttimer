<?
// has http variable in it to populate links on page.
require "include/url.php";

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";


		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		
		
		$sql = "SELECT * FROM tblTPR WHERE Country = 'US'ORDER BY State";		
		$result = mysql_query($sql) or die("Cannot pull custom order code.  Please try again.");

?>



<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<?
		while($row = mysql_fetch_array($result))
		{
			$Name = $row[Name];
			$Phone = $row[Phone];
			$State = $row[State];
			$ZipCode = $row[ZipCode];
			
			$Zip3 = substr($ZipCode,0,3);
			
			echo $ZipCode . " ";
			echo $Zip3;

?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr> 
    <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Name;?> TPR</strong> <? echo $Phone;?></font></p>
      
	  
	  <?
	  		$sql2 = "SELECT * FROM tblInternshipLocation WHERE State = '$State'";		
			$result2 = mysql_query($sql2) or die("Cannot pull custom order code.  Please try again.");
	  
	  			while($row = mysql_fetch_array($result2))
				{
					$Location = $row[LocationName];
	  ?>
	  
	  
	  <table width="245" border="0" cellspacing="0" cellpadding="2">
        <tr> 
          <td width="14"><p>&nbsp;</p></td>
          <td width="223"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Location;?></font></td>
        </tr>
      </table>
	  
	  <?
	  		}
	  ?>
	  
	 </td>
  </tr>
</table>

<?
		}
		
		mysql_close($link);
?>


<p>&nbsp;</p>
</body>
</html>
