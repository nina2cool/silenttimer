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

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");



?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Store
Locator and Rebate View </strong></font>
<form>
  <?

	$sql = "SELECT Count(TestPrepStatus) as Count, TestPrepStatus, BusinessCustomerID, Status FROM tblBusinessCustomer WHERE CustomerType = 'Test Prep' AND Chain = '' AND Status = 'active' AND TestPrepPrint = 'n' GROUP BY TestPrepStatus";
	$result = mysql_query($sql) or die("Cannot retrieve storelocator info, please try again.");


?>
  <table width="50%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr bgcolor="#FFFFCC">
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Link</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Number</font></strong></div></td>
    </tr>
    <tr>
	<?
	while($row = mysql_fetch_array($result))
	{
	$TestPrepStatus = $row[TestPrepStatus];
	$Count = $row[Count];
	$BusinessCustomerID = $row[BusinessCustomerID];
	
		if($TestPrepStatus == "") { $TestPrepStatus = "-"; }
	?>
	
	
      <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="TestPrepView.php?status=<? echo $TestPrepStatus; ?>"><?php echo $TestPrepStatus; ?></a></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Count; ?></font></td>
  
	  
    </tr>
	    <?
	 }
	 ?>
  </table>
  <p>&nbsp;</p>
</form>
  <p>
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.

require "../include/footerlinks.php";


}
// finishes security for page
?>
</p>
