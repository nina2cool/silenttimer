
<?


// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

 <?

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


	$sql = "SELECT * FROM tblPurchase WHERE PurchaseID = '28'";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$Test = $row['Notes'];
			

			  	}
				?>
				
				

			  
Notes: <font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Test; ?></strong></font> 
				
			<?
				
				
				//close connection to database
				mysql_close($link);
			  ?>