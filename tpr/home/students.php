<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('a'))
{

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	//get name of person/company	
	$aID = $_SESSION['a'];
	
	#connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			
		
	$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$aID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
			
	while($row = mysql_fetch_array($result))
	{
		$CompanyName = $row[CompanyName];
		$City = $row[City];
		$AffRate = $row[Rate];
	}

?>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr> 
    <td align="left" valign="top"><p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Student 
        List</strong></font></p>
      <p><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Here 
        is a list of students who have NOT picked up their timer. When they pick 
        it up, make sure to click their name so you know that they got their timer.</font></strong></p>
      <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">To 
        see a list of students who have already received their timer, <a href="past_students.php">click 
        here</a>.</font></p>
      <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
        <tr align="center" valign="top" bgcolor="#000066"> 
          <td width="43%"> <div align="left"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Student 
              Name </font></strong></div></td>
        </tr>
        <?
		# - get list of all students who have NOT picked up their timers yet...
	  	$sql = "SELECT tblPurchase.PurchaseID, tblCustomer.FirstName, tblCustomer.LastName, tblAffStudentReceived.DateTime
				FROM tblPurchase INNER JOIN tblCustomer ON tblCustomer.CustomerID=tblPurchase.CustomerID 
				LEFT JOIN tblAffStudentReceived ON tblAffStudentReceived.PurchaseID=tblPurchase.PurchaseID 
				WHERE tblPurchase.AffOfficeID = '$aID' AND tblAffStudentReceived.DateTime IS NULL
				ORDER BY tblCustomer.LastName";
		$result = mysql_query($sql) or die("Cannot execute query!");
				
		while($row = mysql_fetch_array($result))
		{
			$pID = $row[PurchaseID];
			$Name = $row[FirstName] . " " . $row[LastName]; // students names
			$Shipped = $row[Shipped]; // "c" if not shipped, "d" if shipped
			
?>
        <tr align="center" valign="top"> 
          <td> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="studentreceived.php?p=<? echo $pID;?>"><? echo $Name;?></a></font></div></td>
        </tr>
        <?
		}
?>
      </table>
      <br>
    </td>
  </tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>

<?
mysql_close($link);
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
	$http .= "tpr";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>

