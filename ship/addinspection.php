<?
	# has database username and password, so don't need to put it in the page.
	require "../include/dbinfo.php";
	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
	if($_POST['Submit'] == "Create")
	{
		$Serial = $_POST['Serial'];
		$Number = $_POST['Number'];
		$OrderNum = $_POST['OrderNum'];
		
		$i = $Serial;
		
		while($i < ($Serial + $Number))
		{
			# insert data into database for inspection...
			$sql = "INSERT INTO tblInspection(Serial, ProductStatus, ProductID, OrderShippedID)
					VALUES ('$i','a','1', '$OrderNum')";
			mysql_query($sql) or die("Cannot insert product detail, please try again.");
		
		$i++;
		
		}

	}	
	
	
?>

<form name="form1" method="post" action="">
  <p><font size="4" face="Arial, Helvetica, sans-serif"><strong>Add Inspection 
    Information </strong></font></p>
  <p align="right"><font size="3"><font color="#003399" face="Arial, Helvetica, sans-serif">&lt;&lt;<a href="ninahome.php">Back 
    to Shipping and Timer Tracking Home Page</a></font></font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif">Enter the correct Batch ID</font><br>
    <input name="OrderNum" type="text" id="OrderNum">
  </p>
  <p><font size="2" face="Arial, Helvetica, sans-serif">Start with Serial #:<br>
    <input name="Serial" type="text" id="Serial">
    </font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif">You have inspected this 
    many timers:<br>
    <input name="Number" type="text" id="Number">
    </font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Submit" type="submit" id="Submit" value="Create">
    </font> </p>
</form>
