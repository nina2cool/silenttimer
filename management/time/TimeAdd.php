<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	
	$EmployeeID= $_SESSION['e'];
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	$sql = "SELECT * FROM tblEmployee WHERE UserName = '$userName'";
	$result = mysql_query($sql) or die("Cannot get employee ID");
	
	while($row = mysql_fetch_array($result))
	{
		$EmployeeID = $row[EmployeeID];
	}	
	
	$Today = date("Y-m-d");
	$Now = date("Y-m-d H:i:s");
	
	if ($_POST['Submit'] == "Submit")
	{

		$Hours = $_POST['Hours'];
		$Type = $_POST['Type'];
		$Date = $_POST['Date'];
		$Notes = $_POST['Notes'];
			
		
		$sql = "INSERT INTO tblTime(EmployeeID, Type, Date, Hours, Status, Notes, DateSubmitted) 
				VALUES ('$EmployeeID', '$Type', '$Date', '$Hours', 'active', '$Notes', '$Now');";
		//echo $sql;
		mysql_query($sql) or die("Cannot Insert New Times, try again!");
		
		
		$goto = "Current.php";
		header("location: $goto");

		}
?>


<title></title>
<link href="../../mgt/todo/style.css" rel="stylesheet" type="text/css">
<div align="center"> 
  <p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Submit
        Time for Current Pay Period </strong></font></p>
  <form action="" method="post" name="frmCreate" id="frmCreate">
    <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr>
        <td width="50%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Date</font></strong></td>
        <td><input name="Date" type="text" id="txtFirstName2" value="<? echo $Today; ?>" size="10"></td>
      </tr>
      <tr>
        <td width="50%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Hours
              </font></strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">(nearest
              1/4 hour) </font></td>
        <td><input name="Hours" type="text" id="Hours" size="5"></td>
      </tr>
      <tr>
        <td width="50%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Type</font></strong></td>
        <td><select name="Type" id="Active">
          <option value="" <? if($Active == ""){echo "selected";}?>>Select</option>
          <option value="office" selected>Office</option>
          <option value="home">Home</option>
                </select></td>
      </tr>
      <tr>
        <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Notes</font></strong></td>
        <td><textarea name="Notes" cols="50" rows="3" id="textarea5"></textarea></td>
      </tr>
    </table>
    <p align="left">
      <input name="Submit" type="submit" id="Submit" value="Submit">
      <input type="reset" name="Reset" value="Reset">
</p>
  </form>
  <p><font size="3" face="Arial, Helvetica, sans-serif"></font></p>
</div>
<?


// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// has links that show up at the bottom in it - found in home management folder
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