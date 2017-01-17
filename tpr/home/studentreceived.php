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


// IF BUTTONS ARE PUSHED, THIS CODE HANDLES IT!!!!!
	#connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	// if picked up button is pressed, then grab variables, updated tables, and return to clas page.
	if($_POST['Submit'] == "Picked Up")
	{
		$pID = $_POST['purchaseID'];
		
		$now = date("Y-m-d");
		$sql = "INSERT INTO tblAffStudentReceived(PurchaseID, DateTime)
				VALUES ('$pID', '$now')";
		mysql_query($sql) or die("Cannot insert pick up, please try again.");
	
		header("location: students.php");
		
	}		
		
	// canceled, send back to last page.
	if($_POST['Submit2'] == "Cancel")
	{		
		header("location: students.php");
	}	
// --------------------------------------------------
	


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
	$p= $_GET['p'];
	
	#connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr> 
    <td align="left" valign="top"><p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Student 
        Pick Up</strong></font></p>
      <table width="300" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
        <tr align="center" valign="top" bgcolor="#000066"> 
          <td width="43%"> <div align="left"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">Student 
              Name </font></strong></div></td>
        </tr>
        <?
	  	$sql = "SELECT tblCustomer.FirstName, tblCustomer.LastName
				FROM tblPurchase INNER JOIN tblCustomer ON tblCustomer.CustomerID=tblPurchase.CustomerID  
				WHERE tblPurchase.PurchaseID = '$p'";
		$result = mysql_query($sql) or die("Cannot execute query!");
				
		while($row = mysql_fetch_array($result))
		{
			$Name = $row[FirstName] . " " . $row[LastName]; // students names
		}
?>
        <tr align="center" valign="top"> 
          <td> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Name;?></font></div></td>
        </tr>

      </table>
      
    <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Are you certain 
        that the above student has picked up their timer?</strong></font></p>
      <p><strong><font size="2" face="Arial, Helvetica, sans-serif">If so, please 
        press &quot;<em>Picked Up</em>&quot; Below.</font></strong></p>
      <form action="" method="post" name="pickup" id="pickup">
        <p><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Name;?> has 
          picked up a timer.</font></p>
        <p> 
          
		  <input name="classID" type="hidden" value="<? echo $c;?>">
		  <input name="purchaseID" type="hidden" value="<? echo $p;?>">
		  
		  <input type="submit" name="Submit" value="Picked Up">
          &nbsp;&nbsp; 
          <input type="submit" name="Submit2" value="Cancel">
        </p>
      </form>
      <p>&nbsp;</p></td>
  </tr>
</table>

<p>&nbsp;</p>
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

