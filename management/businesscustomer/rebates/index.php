<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

#Code for Adding to Table

#Double check the table names and spaces and commas in the code. Delete primary key IDs. 

		// build connection to database
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		$Now = date("Y-m-d");
		
		If ($_POST['Add'] == "Add")
		{
		
		$BusinessCustomerID = $_POST['BusinessCustomerID'];
		$StartDate = $_POST['StartDate'];
		$EndDate = $_POST['EndDate'];
		
		$M = date("m");
		$D = date("d");
		$Y = date("Y");
		
		$PromotionCodeID = $BusinessCustomerID .$Y .$M .$D;
		
		//echo $PromotionCodeID;
		
		
		
		$sql = "INSERT INTO tblPromotionCode(BusinessCustomerID, PromotionID, PromotionCodeID, StartDate, EndDate, DateCreated, Status) 
		VALUES('$BusinessCustomerID', 'rebate', '$PromotionCodeID', '$StartDate', '$EndDate', '$Now', 'active');"; 
		
		//echo $sql;
		
		$result = mysql_query($sql) or die("Cannot insert into table"); 


		
}

#Create Table for User Input
?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt;
  Rebates</strong></font>
</p>
<p>&nbsp;</p>
<p><a href="RebateAdd.php"><font face="Arial, Helvetica, sans-serif"><strong><font size="4">Add
Single Rebates </font></strong></font></a></p>
<p><a href="RebateAddMultiple.php"><font face="Arial, Helvetica, sans-serif"><strong><font size="4">Add Multiple Rebates </font></strong></font></a></p>
<p><a href="../../promo/index.php"><font face="Arial, Helvetica, sans-serif"><strong><font size="4">Edit
Rebates</font></strong></font></a></p>
<p><a href="RebateEditMultiple.php"><font face="Arial, Helvetica, sans-serif"><strong><font size="4">Edit
Multiple Rebates</font></strong></font></a></p>
<p><a href="RebateCustomerAdd.php"><font face="Arial, Helvetica, sans-serif"><strong><font size="4">Add
          Rebates for Customers</font></strong></font></a><font size="2" face="Arial, Helvetica, sans-serif"> - Customers who returned
rebate forms.</font></p>
<p>&nbsp;</p>
<?
mysql_close($link);


// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.
require "../../include/footerlinks.php";


}
?>