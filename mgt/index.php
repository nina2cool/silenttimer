<?
//start session
session_start();
//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

$location = "localhost";
$user = "silenttimer";
$pass = "2559";
$db = "silenttimer";

	// ----- >> code to handle login and redirect to manatgement home.  It is up here so header redirect can be used...		
	// Grab variables from previous page.
	If ($_POST['Submit'] == "Login")
	{
		$userName = $_POST['txtUserName'];
		$password = $_POST['txtPassword'];
	
		$err = 0;
			
		if ($txtUserName == "")
		{
			$errUserName = 1;
			$err = 1;
		}
	
		if ($txtPassword == "")
		{
			$errPassword = 1;
			$err = 1;
		}
	
		if ($err == 0)
		{
			//connect to database
			$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
			mysql_select_db($db) or die("Cannot select Database");			
				
			$sql = "SELECT * FROM tblCompanyRep WHERE UserName = '$userName' AND Password = '$password'";
			$result = mysql_query($sql) or die("Cannot execute query!");
					
			while($row = mysql_fetch_array($result))
			{
				$name = $row[FirstName];
				$repID = $row[CompanyRepID];
			}
				
			if ($name == "")
			{
				$errLogin = 1;
			}
			else
			{
				//register session with this person, so they can access other pages.
				session_register('userName');
				$_SESSION['userName'] = $userName;
				session_register('repID');
				$_SESSION['repID'] = $repID;
				
				$err = 0;
				mysql_close($link);
				
				//after login completion, send them to dialect archive index!
				//echo "<meta http-equiv='refresh' content='0;URL=home.php'>";
				header("location: view.php");		
			}
		}
	}
?>

<html>
<head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<p><strong><font color="#0000FF" size="5" face="Arial, Helvetica, sans-serif">Silent 
  Technology</font><font size="4" face="Arial, Helvetica, sans-serif"><br>
  Testing 
  Contacts </font></strong></p>
<p><strong></strong></p>
<form name="form1" method="post" action="">
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>User Name<br>
    <input name="txtUserName" type="text" id="txtUserName"><? if($errUserName == 1){echo "<font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'><strong>*</strong></font>";}?>
    </strong></font></p>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">Password</font></strong><font size="2" face="Arial, Helvetica, sans-serif"><br>
    <input name="txtPassword" type="password" id="txtPassword">
    <? if($errPassword == 1){echo "<font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'><strong>*</strong></font>";}?>
    </font></p>
  <p> <font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Submit" type="submit" id="Submit" value="Login">
  </font> </p>
		
		<?
		if ($errLogin == 1)
		{
			echo "<p>";
			echo "<font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'><strong>Your login information is incorrect, please try again.</strong></font>";
		}
		?>

    
</form>
<p><font face="Arial, Helvetica, sans-serif"></font></p>
<p>&nbsp;</p>
<p><font size="4" face="Arial, Helvetica, sans-serif"></font></p>
</body>
</html>
