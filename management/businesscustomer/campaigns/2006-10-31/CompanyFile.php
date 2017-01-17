<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../../include/url.php";

//security check
If (session_is_registered('userName'))
{


// has database username and password, so don't need to put it in the page.
require "../../../include/dbinfo.php";
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
	
		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

?><title>Test Prep Campaign</title>
<p>
<?
	$sql = "SELECT * FROM tblBusinessCustomer WHERE AugCampaign = 'y' AND Status = 'active' AND Country = 'US'";
	$result = mysql_query($sql) or die("Cannot execute query!");
	while($row = mysql_fetch_array($result))
		{
			$Chain = $row[Chain];
			$Name = $row[Name];
			$Address = $row[Address];
			$Address2 = $row[Address2];
			$City = $row[City];
			$State = $row[State];
			$ZipCode = $row[ZipCode];
			//$State = $row[State];
			
			if($Chain == "Kaplan") { $ChainName = "Kaplan Test Prep"; }
			if($Chain == "Princeton Review") { $ChainName = "Princeton Review"; }
			if($Chain == "") { $ChainName = $Name; }
	
?>
<font color="#000000" size="2" face="Arial, Helvetica, sans-serif">

"<? echo $ChainName; ?>","<? echo $Address; ?>","<? echo $Address2; ?>","<? echo $City; ?>","<? echo $State; ?>","<? echo $ZipCode; ?>"<br>


</font>
	<?
	}
	?>
	
	</p>
<p>&nbsp;</p>

  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);
// finishes security for page
}
else
{
?>

            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
