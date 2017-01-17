<?
// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//grab customers and information that have NOT been shipped, and that need to be.
	
	$sql = "SELECT *
			FROM tblCompanyContacts 
			WHERE Address <> '' AND ZipCode <> ''
			ORDER BY CompanyName";
	
	#echo $sql;	
	$result = mysql_query($sql) or die("Cannot execute query");
				
	while($row = mysql_fetch_array($result))
	{
	
		echo '"' . $row[CompanyName] . '",';
		echo '"' . $row[Address] . '",';
		echo '"' . $row[Address2] . '",';
		echo '"' . $row[City] . '",';
		echo '"' . $row[State] . '",';
		echo '"' . $row[ZipCode] . '",';
		echo '"' . $row[Phone] . '",';
		echo '"' . $row[Email] . '",';
		echo '"' . $row[WebSite] . '",';
		echo '"' . $row[Country] . '"';

		echo '<br>';
	}

?>