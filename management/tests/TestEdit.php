<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{


// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
	

	//grab variables to get customer info from DB.
	$TestID = $_GET['t'];

	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


  // -------- code to save values from form into tables, etc....
	if ($_POST['Submit'] == "Save")
	{
		
		$Name = $_POST['Name'];
		$Description = $_POST['Description'];
		$WebSite = $_POST['WebSite'];
		
		$sql = "UPDATE tblTests
			SET Name = '$Name', 
			Description = '$Description', 
			WebSite = '$WebSite'
			WHERE TestID = '$TestID'";
		
		mysql_query($sql) or die("Cannot update tblTest");
		
		
		$goto = "TestView.php";
		header("location: $goto");
	}  

	
	$sql = "SELECT * FROM tblTests WHERE TestID = '$TestID'";
			
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$Name = $row[Name];
		$Description = $row[Description];
		$WebSite = $row[WebSite];
	}


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";


// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";


	
?>
			
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
Test ID: <? echo $TestID; ?></strong></font> </p>
<p>&nbsp;</p>
<form action="" method="post" name="form" id="form">
  
    
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr> 
      <td width="25%"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Test 
          Name </strong></font></div></td>
      <td width="75%"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="Name" type="text" id="Name" value="<? echo $Name; ?>" size="40">
        </strong></font></td>
    </tr>
    <tr> 
      <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Description</strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <textarea name="Description" cols="50" rows="3" id="Description"><? echo $Description; ?></textarea>
        </strong></font></td>
    </tr>
    <tr> 
      <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Web 
          Site</strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="WebSite" type="text" id="WebSite" value="<? echo $WebSite; ?>" size="30">
        </strong></font></td>
    </tr>
  </table>	 
        
  <p>&nbsp;</p>
    <input type="submit" name="Submit" value="Save">
    &nbsp;&nbsp; 
    <input type="reset" name="Submit2" value="Reset">
  
</form>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 
 
<? // -------------- END MY CODE -------------------


//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

require "../include/footerlinks.php";

// finishes security for page
}
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>