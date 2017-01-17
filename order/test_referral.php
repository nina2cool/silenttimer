<?

$PageTitle = "TESTING REFERRAL PAGE";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has http variable in it to populate links on page.
require "../include/url.php";


	// has top header in it.
	require "include/headertop.php";

	// has top menu for this page in it, you can change these links in this folders include folder.
	require "../include/topmenu.php";
	
	// has bottom header in it, ths goes under the top menu for this page.
	require "include/headerbottom.php";
	


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
	
	# link to DB for page calls to it.
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	$now = date("Y-m-d h:i:s");
	$ip = "1111111111";
	$cID = "4740";
	
		#Referral Links
	
		if ($_POST['Yes'] == "Yes, please!")
		{
		
			$sql = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, Type, IP, Status)
			VALUES('$cID', '$now', 'refer-yes', '$ip', 'active');";
			$result = mysql_query($sql) or die("Cannot insert refer-yes");
			
			?>
			<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>order/referral.php'>
			<?
		}
		
	
		if ($_POST['No'] == "No, thanks.")
		{
		
			$sql = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, Type, IP, Status)
			VALUES('$cID', '$now', 'refer-no', '$ip', 'active');";
			$result = mysql_query($sql) or die("Cannot insert refer-no");
			
			?>
			<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
			<?
		}	


?>
<br>
<table width="100%"  border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td><p align="center"><strong><font color="#FF0000" size="5" face="Arial, Helvetica, sans-serif">Would
            you like to get your purchase for FREE?</font></strong></p>
        <p>&nbsp;</p>
        <form name="formyes" method="post" action="">
          <div align="center">
            <input name="Yes" type="submit" id="Yes" value="Yes, please!">
          </div>
        </form>
        <form name="formno" method="post" action="">
          <div align="center">
            <input name="No" type="submit" id="No" value="No, thanks.">
          </div>
        </form>
        <p>&nbsp;</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";


?>