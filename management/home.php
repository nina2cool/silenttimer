<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	$userName = $_SESSION['userName'];
	
	//connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			
		
	$sql = "SELECT * FROM tblEmployee WHERE UserName = '$userName'";
	$result = mysql_query($sql) or die("Cannot execute query!");
			
	while($row = mysql_fetch_array($result))
	{
		$fName = $row[FirstName];
		$lName = $row[LastName];
		$Level = $row[Level];
	}
	
	$name = $fName;
	$name .= " ";
	$name .= $lName;
	
	
	if($Level <> '10')
	
	{
	
	$sql2 = "SELECT * FROM tblCustomerClaims2 WHERE tblCustomerClaims2.Status = 'open'";
	$result2 = mysql_query($sql2) or die("Cannot execute claims query!");
	
	$NewClaims = mysql_num_rows($result2);
	
	
	$sql3 = "SELECT * FROM tblPurchase2 WHERE Shipped <> 'y' AND Status = 'active' AND Preorder <> 'y'";
	$result3 = mysql_query($sql3) or die("Cannot execute claims query!");
	
	$NewShipments = mysql_num_rows($result3);
	
	
?>



			<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt;Home</strong></font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif">Welcome to your 
              management home page,<strong> <font color="#0000FF"> <? echo $name; ?></font></strong>.</font></p>
            <table width="50%" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <td><div align="center"><a href="reports/survey/BFSurveyIndex.php"><font size="3" face="Arial, Helvetica, sans-serif">BESTFIT MEDIA - PEER REVIEWS</font></a></div></td>
              </tr>
            </table>
            <br />
<table width="50%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif">Open Claims</font></td>
                <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NewClaims; ?>&nbsp;<a href="warranty/index.php">view</a></font></td>
              </tr>
              <tr>
                <td><font size="2" face="Arial, Helvetica, sans-serif">New Shipments</font></td>
                <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $NewShipments; ?>&nbsp;<a href="customers/NotShippedView.php">view</a></font></td>
              </tr>
            </table>
            <p>&nbsp;</p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"></font></p>
            <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Remember 
              to <strong><a href="logout.php">LOG OUT</a> </strong>after using 
              system.</font></p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>

<?
	}
	else
	{
	?>
	
	<p align="left"><font color="#003399"><strong><font size="5" face="Arial, Helvetica, sans-serif">Flashcard
	        Market Survey</font></strong></font></p>
	<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Welcome to
    your survey results pages,<strong> <font color="#0000FF"> <? echo $name; ?></font></strong>.</font></p>
	<p align="left">&nbsp;</p>
	<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="arif/survey_arif.php">Results</a></font></p>
	<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="arif/survey_arif_resp.php">Respondents</a></font></p>
	
      <?
	}


// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// finishes security for page
}
else
{
	header("location: index.php"); //redirects user via PHP to this page... better than meta refresh...
}
?>