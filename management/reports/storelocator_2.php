<?
//security for page
session_start();

$PageTitle = "The Silent Timer - Retail Store Locator";

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has top header in it.
//require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
//require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
//require "../include/headerbottom.php";
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	# ------------------------------------------------------------------------------------------------------------
	#  ZIP CODE STORE LOOK UP!
	#  If person's shipping Zipcode is within 20 miles of a retail location... show them the stores!
	# ------------------------------------------------------------------------------------------------------------
		$zipOne = $_GET['zip'];
		
		
		$Radius = 40;
		$StoreClose = "n";
	
		
		//$zipOne = $_POST['ZipCode'];
	
		include_once ("../../include/db_mysql.inc");
		include_once ("../../include/phpZipLocator.php");
		
		$db = new db_sql;
		$zipLoc = new zipLocator;
		$radius = $Radius;
		
		$zipArray = $zipLoc->inradius($zipOne,$radius);
		
		require "../include/dbinfo.php";
	
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database store locator");
		
		#echo "hello world<br><br>";
		
		for($i=1;$i < count($zipArray);$i++)
		{
			$sql = "SELECT * FROM tblBusinessCustomer WHERE ZipCode= '$zipArray[$i]' AND CustomerType = 'Bookstore' AND Status = 'active'";
			$result = mysql_query($sql) or die("Cannot pull Store Locations.  Please try again.");		
			while($row = mysql_fetch_array($result))
			{
				$StoreClose = "y";
			}
		}
		
		
		/*
		
		$now = date("Y-m-d H:i:s");
		
		$sql3 = "INSERT INTO tblRebate(DateTime, CustomerZipCode, Link)
		VALUES ('$now','$zipOne', 'storelocator.php')";
		//echo $sql3;
		mysql_query($sql3) or die("Cannot insert email, please try again.");
		
		mail("info@silenttimer.com", "Store Locator - Zip: $zipOne", "This email was submitted on $now...\nZip Code = $ZipCode", "From:Store Locator Email<info@silenttimer.com>");
		
		*/
		
		
		
		mysql_close($link);
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Stores
  Near Zip Code = <? echo $zipOne; ?></strong></font></p>





<? if($StoreClose == "y"){?>
<table width="100%" border="0" align="left" cellpadding="8" cellspacing="0">
  <?		
  		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
  
		$db = new db_sql;
		$zipLoc = new zipLocator;
		$radius = $Radius;
		
		$zipArray = $zipLoc->inradius($zipOne,$radius);
		
		for($i=1;$i < count($zipArray);$i++)
		{
			$sql = "SELECT * FROM tblBusinessCustomer WHERE ZipCode= '$zipArray[$i]' AND CustomerType = 'Bookstore' AND Status = 'active'";
			$result = mysql_query($sql) or die("Cannot pull Store Locations.  Please try again.");		
			while($row = mysql_fetch_array($result))
			{
				$NameS = $row[Name];
				$AddressS = $row[Address];
				$Address2S = $row[Address2];
				$Address3S = $row[Address3];
				$CityS = $row[City];
				$StateS = $row[State];
				$ZipCodeS = $row[ZipCode];
				$PhoneS = $row[Phone1];
				$WebsiteS = $row[Website];
				$Chain = $row[Chain];
				
				$db = new db_sql;
				$zipDistance = new zipLocator;
				
				$distance = number_format($zipDistance->distance($zipOne,$ZipCodeS),0);
				
				if($distance == 0)
				{
					$distance = 0;
				}
  ?>
  
  <tr>
    <td>
	<p>
	
	<?
	if($Chain <> '')
	{
	?>
	<font size="2" face="Arial, Helvetica, sans-serif">
			<strong>
				<font color="#666666" size="3">
					<? echo $Chain; ?> - <? echo $NameS;?><br>
				</font>
			</strong>
	<?
	}
	else
	{
	?>
		<font size="2" face="Arial, Helvetica, sans-serif">
			<strong>
				<font color="#666666" size="3">
					<? echo $NameS;?><br>
				</font>
			</strong>
		<?
		}
		?>
			
			<? echo "$AddressS";?><br>
			<? if($Address2S != ""){echo "$Address2S<br>";}?>
			<? if($Address3S != ""){echo "$Address3S<br>";}?>
			<? echo "$CityS";?>, <? echo "$StateS";?> <? echo "$ZipCodeS";?><br>
			<strong><? echo "$PhoneS";?><br></strong>
			<? if($WebsiteS != ""){?><a href="<? echo "../../$WebsiteS";?>" target="_blank">Visit Online</a><? } ?>
		</font>
	</p>
      <p> <font size="2" face="Arial, Helvetica, sans-serif"> <em><strong>~ <? echo "$distance";?> 
        miles away from you<br>
        </strong></em></font><font size="2" face="Arial, Helvetica, sans-serif"><a href="http://us.rd.yahoo.com/maps/us/insert/Tmap/extmap%0D/*-http://maps.yahoo.com/maps_result?addr=<? echo $AddressS;?>&csz=<? echo $CityS;?>%2C+<? echo $StateS;?>+<? echo $ZipCodeS;?>&country=us" target="_blank">Map</a> 
        | <a href="http://us.rd.yahoo.com/maps/us/insert/Tmap/extDD/*-http://maps.yahoo.com/dd?taddr=<? echo $AddressS;?>&tcsz=<? echo $CityS;?>%2C+<? echo $StateS;?>+<? echo $ZipCodeS;?>&tcountry=us" target="_blank">Driving 
        Directions</a></font> </p>
      <hr noshade></td>
  </tr>
  
  <?	
			}
		}
		
		mysql_close($link);
  ?>

</table>

<? }
else
{
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>None at this time.</strong></font></p>
  
  <?
  }
  ?>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
//require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/dbinfo.php";
//require "include/sidemenu.php";
?>
