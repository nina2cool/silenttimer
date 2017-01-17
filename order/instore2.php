<?

//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

$PageTitle = "Ordering In-Store";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has http variable in it to populate links on page.
require "../include/url.php";

// Grab all variables from order page and display for user.
				
$BusinessCustomerID = $_GET['s'];
//echo $BusinessCustomerID;
		
# ------------------------------------------------------------------------------------------------------------
#  Check for Affiliate Custom Order Configurations.  If they have their account set up this way, then put their
#  page around the order page, and alter page properties to make it look good and work flawlessly...
# ------------------------------------------------------------------------------------------------------------

	// has top header in it.
	require "include/headertop.php";

	// has top menu for this page in it, you can change these links in this folders include folder.
	require "../include/topmenu.php";
	
	// has bottom header in it, ths goes under the top menu for this page.
	require "include/headerbottom.php";
	
	require "../code/class.phpmailer.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
	
	# link to DB for page calls to it.
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	$sql = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
	$result = mysql_query($sql) or die("Cannot get Product Information.  Please try again. <br>$sql<br>");
	
					while($row = mysql_fetch_array($result))
					{
						$NameS = $row[Name];
						$AddressS= $row[Address];
						$Address2 = $row[Address2];
						$Address3 = $row[Address3];
						$CityS = $row[City];
						$StateS = $row[State];
						$ZipCodeS = $row[ZipCode];
						$PhoneS = $row[Phone1];
						$WebsiteS = $row[Website];
						$BusinessCustomerIDS = $row[BusinessCustomerID];
						$Chain = $row[Chain];

					}

			$now = date("Y-m-d H:i:s");
			
			
			$sql3 = "INSERT INTO tblRebate(DateTime, BusinessCustomerID, Link)
			VALUES ('$now','$BusinessCustomerID', 'instore2.php')";
			//echo $sql3;
			mysql_query($sql3) or die("Cannot insert email, please try again.");
			
			
			//mail("info@silenttimer.com, dina@silenttimer.com", "In Store Purchase:  $Chain - $NameS", "A customer that decided to purchase in the store from instore2.php was submitted on $now\nBusinessCustomerID: $BusinessCustomerID\n\n$Chain - $NameS\n$AddressS - $Address2\n$CityS, $StateS $ZipCodeS", "From:In Store Purchase<info@silenttimer.com>");
			






?>
<br>
<p><font face="Arial, Helvetica, sans-serif" size="2"><strong><font color="#003399" size="3">You
decided to purchase your Silent Timer at the following store:</font></strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#666666" size="3"><font color="#CC0000"><? if($Chain <> '') { ?><? echo $Chain; ?> - <? } ?><? echo $NameS;?></font><br>
</font> </strong> <? echo "$AddressS";?><br>
<? if($Address2S != ""){echo "$AddressS<br>";}?>
<? if($Address3S != ""){echo "$AddressS<br>";}?>
<? echo "$CityS";?>, <? echo "$StateS";?> <? echo "$ZipCodeS";?><br>
<strong><? echo "$PhoneS";?><br>
</strong><a href="<? echo $WebsiteS; ?>" target="_blank"><? echo "$WebsiteS";?></a> </font> </p>
<p> <font size="2" face="Arial, Helvetica, sans-serif"> <em></em></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Remember:</strong> This
    store only carries The Silent Timer&#8482;; they do not have batteries
  or any other items.</font></p>
<p><font face="Arial, Helvetica, sans-serif" size="2">  <em>Please continue to browse our site.</em> <a href="../index.php">Click Here</a>.</font></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

if($Custom == "yes")
{
	# put custom page info around our order page...
	echo $BottomCode;
	
}
else
{
// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
}
mysql_close($link);
?>