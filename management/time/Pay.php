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
	//$EmployeeID2 = $_GET['ee'];
	
	$EmployeeID2 = $_POST['Employee'];
	//echo "e1=" .$EmployeeID2;
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	$sql2 = "SELECT * FROM tblEmployee WHERE EmployeeID = '$EmployeeID2'";
	$result2 = mysql_query($sql2) or die("Cannot get employee ID");
	
	while($row2 = mysql_fetch_array($result2))
	{
		$Name = $row2[FirstName];
	}	
	
	
	$Today = date("Y-m-d");
	$Now = date("Y-m-d H:i:s");

	//echo "<br>e2=" .$EmployeeID2;
	
	if ($_POST['Pay'] == "Pay")
	{
		$Date1 = $_POST['Date1'];
		$Date2 = $_POST['Date2'];
		$Date = $_POST['Date'];
		$CheckNumber = $_POST['CheckNumber'];
		$EmpID = $_POST['Emp2'];
		
		echo "<br>e3=" .$EmployeeID2;
		
		
		$sql = "UPDATE tblTime
		SET Paid = 'y',
		DatePaid = '$Date',
		CheckNumber = '$CheckNumber'
		WHERE EmployeeID = '$EmpID' AND Date >= '$Date1' AND Date <= '$Date2'";
		
		echo "<br>" .$sql;
		mysql_query($sql) or die("Cannot update paid, try again!");
		
		
		}
?>


<title>Pay</title>
<link href="../../mgt/todo/style.css" rel="stylesheet" type="text/css">
<div align="center"> 
  <p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Pay
        <?php echo $Name; ?></strong></font></p>
  <form action="Pay.php" method="post" name="frmCreate" id="frmCreate">
    <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr>
        <td width="50%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Date
              Paid</font></strong></td>
        <td><input name="Date" type="text" id="txtFirstName2" value="<? echo $Today; ?>" size="10"></td>
      </tr>
      <tr>
        <td width="50%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Date
        Range </font></strong></td>
        <td><input name="Date1" type="text" id="Date1" value="0000-00-00" size="15"> 
          <font size="2" face="Arial, Helvetica, sans-serif">to</font>        <input name="Date2" type="text" id="Date2" value="0000-00-00" size="15"></td>
      </tr>
      <tr>
        <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Check
              Number </font></strong></td>
        <td><input name="CheckNumber" type="text" id="txtFirstName2" size="10"></td>
      </tr>
      <tr>
        <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">EmployeeID</font></strong></td>
        <td><input name="Emp2" type="text" id="txtFirstName2" value="<? echo $EmployeeID2; ?>" size="10"></td>
      </tr>
    </table>
    <p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"></font> </p>
    <p align="left">
      <input name="Pay" type="submit" id="Pay" value="Pay">
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