<?
//security for page
session_start();

$PageTitle = "The Silent Timer - Retail Store Locator";

// has http variable in it to populate links on page.
require "include/url.php";

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom_store.php";
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


		function escapeQuote($var)
		{
			if (isset($var))
			{
				$string = str_replace("'","\'",$var);
				$string = str_replace('"','\"',$string);
			}
		
			return $string;
		}  




	# ------------------------------------------------------------------------------------------------------------
	#  ZIP CODE STORE LOOK UP!
	#  If person's shipping Zipcode is within 20 miles of a retail location... show them the stores!
	# ------------------------------------------------------------------------------------------------------------
		$Radius = 10;
		$StoreClose = "n";
	
		$zipOne = $_POST['ZipCode'];
		
		//$ZipCode = $zipOne;

		//$zipOne = 75248;
	
		include_once ("include/db_mysql.inc");
		include_once ("include/phpZipLocator.php");
		
		$db = new db_sql;
		$zipLoc = new zipLocator;
		$radius = $Radius;
		
		$zipArray = $zipLoc->inradius($zipOne,$radius);
		
		require "include/dbinfo.php";
	
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
		
		$now = date("Y-m-d H:i:s");
		//echo "<br>" .$now;
		$IP = $_SERVER["REMOTE_ADDR"];
		
		
		
		
		
		$sql3 = "INSERT INTO tblRebate(DateTime, CustomerZipCode, Link)
		VALUES ('$now','$zipOne', 'storelocator.php')";
		//echo $sql3;
		mysql_query($sql3) or die("Cannot insert email, please try again.");
		
		
		
		/*
		mail("info@silenttimer.com", "Store Locator - Zip: $zipOne", "This email was submitted on $now...\nZip Code = $ZipCode", "From:Store Locator Email<info@silenttimer.com>");
		*/
		
		
		
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Stores 
  Near You That Sell <em><font color="#000000">The Silent Timer&#8482;</font></em></strong></font></p>



<? if($StoreClose == "y"){ ?>

<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3">You
              live within <font color="#FF0000"><? echo $Radius; ?> miles</font> of
    a store that sells our timer!</font></strong></font></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif">Picking your timer
        up in the store will be quick and easy. That way you can start studying
        with it now! These stores either currently have it in stock, or if not,
      they can order it for you. </font></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif">You can also use our <a href="location_search.php">detailed
          search page</a> to widen or narrow your search radius, search by state,
          country, chain, or view all locations.</font></p>
    <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Please note
    that these stores only stock The Silent Timer&#8482;, not the watch. THE
    SILENT TIMER LSAT BONUS COMBO IS NOT IN ALL OF THE STORES YET. SPECIFY WHEN
    CALLING THAT YOU ARE LOOKING FOR THE COMBO THAT HAS 2 TIMERS IN IT.</strong></font></p>
    <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><img src="images/rebate-green.jpg" alt="Rebate Available!" width="27" height="27" border="0"> means
    a mail-in rebate is available for this location!</font></p></td>
    <td><form name="form3" method="post" action="storelocator-search.php" onSubmit=" return lockButton(document.form3.Search.value);">
      <table width="100%"  border="0" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFFFCC">
        <tr>
          <td><div align="center"><strong><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif">Widen
                or Narrow your Search: </font></strong></div></td>
        </tr>
        <tr>
          <td><font size="2" face="Arial, Helvetica, sans-serif">&nbsp; </font>
              <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
                <tr bordercolor="#CCCCCC">
                  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"> <a name="ZipCode"></a>
                      <input name="radiobutton"  tabindex = "11" type="radio" value="ZipCode" checked>
                  </font></div></td>
                  <td><p><font size="2" face="Arial, Helvetica, sans-serif">By
                        U.S. Zip Code
                            <input name="txtZipCode2" type="text" id="txtZipCode" tabindex = "1" value="<? echo $Zip; ?>" size="6" maxlength="5">
                    </font></p>
                      <p><font size="2" face="Arial, Helvetica, sans-serif">Search
                          Radius:
                            <select name="select" id="select" tabindex = "2">
                              <option value="200">200</option>
                              <option value="100">100</option>
                              <option value="75">75</option>
                              <option value="50">50</option>
                              <option value="25" selected>25</option>
                              <option value="20">20</option>
                              <option value="15">15</option>
                              <option value="10">10</option>
                              <option value="5">5</option>
                            </select>
                            <br>
                    </font></p></td>
                </tr>
            </table></td>
        </tr>
        <tr>
          <td><div align="center">
            <input name="Search2" type="submit" tabindex = "3" id="Search" value="Search by Zip Code">
          </div></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<hr noshade>
<p><font size="2" face="Arial, Helvetica, sans-serif">The
following  stores are within <? echo $Radius; ?> miles of you:</font></p>
<table width="70%" border="0" cellpadding="8" cellspacing="0">
  <?		
  
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


				$BusinessCustomerIDS = $row[BusinessCustomerID];
				$NameS = escapeQuote($row[Name]);
				$AddressS = escapeQuote($row[Address]);
				$Address2S = escapeQuote($row[Address2]);
				$Address3S = escapeQuote($row[Address3]);
				$CityS = $row[City];
				$StateS = $row[State];
				$ZipCodeS = $row[ZipCode];
				$PhoneS = $row[Phone1];
				$WebsiteS = $row[Website];
				$Chain = $row[Chain];
				$Rebate = $row[Rebate];

				
				$db = new db_sql;
				$zipDistance = new zipLocator;
				
				$distance = number_format($zipDistance->distance($zipOne,$ZipCodeS),2);
				
				//echo $distance;
				
				if($distance == 0)
				{
					$distance = 0;
				}
				
				
				#insert information into tblDistance
				$sql2 = "INSERT INTO tblDistance(BusinessCustomerID, Name, Address, Address2, Address3, City, State, ZipCode, Phone, Website, Chain, Rebate, DateTime, IP, ZipCodeSearch, Distance)
				VALUES('$BusinessCustomerIDS', '$NameS', '$AddressS', '$Address2S', '$Address3S', '$CityS', '$StateS', '$ZipCodeS', '$PhoneS',
				'$WebsiteS', '$Chain', '$Rebate', '$now', '$IP', '$zipOne', '$distance');";
				
				//echo "<br>" .$sql2;
				
				$result2 = mysql_query($sql2) or die("Cannot insert into tblDistance");
				
			}
			}
				 
				#recall information from tblDistance but sort by Distance
				$sql3 = "SELECT * FROM tblDistance WHERE DateTime = '$now' AND IP = '$IP' AND ZipCodeSearch = '$zipOne' ORDER BY Distance ASC";
				
				//echo "<br><br>" .$sql3;
				
				$result3 = mysql_query($sql3) or die("Cannot pull distances.  Please try again.");		
				
				
				while($row3 = mysql_fetch_array($result3))
				{
					$NameS1 = $row3[Name];
					$AddressS1 = $row3[Address];
					$Address2S1 = $row3[Address2];
					$Address3S1 = $row3[Address3];
					$CityS1 = $row3[City];
					$StateS1 = $row3[State];
					$ZipCodeS1 = $row3[ZipCode];
					$PhoneS1 = $row3[Phone];
					$WebsiteS1 = $row3[Website];
					$Chain1 = $row3[Chain];
					$BusinessCustomerIDS1 = $row3[BusinessCustomerID];
					$Rebate1 = $row3[Rebate];
					$Distance1 = $row3[Distance];
				
				if($Chain1 == "Barnes & Noble") { $Chain1 = "B&N"; }
								
				$Now = date("Y-m-d");
				
				$sql4 = "SELECT * from tblPromotionCode WHERE BusinessCustomerID = '$BusinessCustomerIDS1' AND PromotionID = 'rebate' AND Status = 'active'";
						//echo "<br>sql = " .$sql3;
						$result4 = mysql_query($sql4) or die("Cannot execute query");
						//$Rebate = mysql_num_rows($result3);
						$Rebate1 = "n";
					
						while($row4 = mysql_fetch_array($result4))
						{
							$StartDate = $row4[StartDate];
							$EndDate = $row4[EndDate];
							$PromotionCodeID = $row4[PromotionCodeID];
						
						if($StartDate <= $Now AND $EndDate >= $Now) { $Rebate1 = "y"; } else { $Rebate1 = "n"; }
						
						}

								
								
								
  ?>
  
  <tr>
    <td>
	<p>
				<strong>
				<font color="#666666" size="3">
				<a href="store_info.php?s=<? echo $BusinessCustomerIDS1; ?>"><font face="Arial, Helvetica, sans-serif">
				<? if($Chain1 <> '') {  ?>
				<? echo $Chain1; ?> - 
				<? } ?>
				<? echo $NameS1;?></font></a><font face="Arial, Helvetica, sans-serif"><br>
				</font></font>
				</strong>
			    <font size="2" face="Arial, Helvetica, sans-serif"><? echo "$AddressS1";?><br>
			    <? if($Address2S1 != ""){echo "$Address2S1<br>";}?>
			    <? if($Address3S1 != ""){echo "$Address3S1<br>";}?>
			    <? echo "$CityS1";?>, <? echo "$StateS1";?> <? echo "$ZipCodeS1";?></font><font face="Arial, Helvetica, sans-serif"><br>
		        <strong><? echo "$PhoneS1";?></strong></font></p>
	<p> <font size="2" face="Arial, Helvetica, sans-serif"> <em><strong>~ <? echo number_format($Distance1,1);?> 
        miles* away from you</strong></em></font></p>
    </td>
    <?
	if($Rebate1 == 'y')
	{
	?>
	<td width="25%" valign="top"><div align="center">
	  
	
	  
	
	  
	</div>	  <div align="center">
	    <p><a href="order/rebate.php?rebate=<? echo $BusinessCustomerIDS1; ?>&zip=<? echo $zipOne; ?>&z=3&code=<? echo $PromotionCodeID; ?>" target="_blank"><img src="images/rebate-green.jpg" alt="$5 Rebate!" width="50" height="50" border="0"></a></p>
    </div></td>
  	
	<?
	}
	?>
  
  </tr>
  <tr>
    <td colspan="2"><hr noshade></td>
  </tr>
  
  <?	
			}
		
		
		$sql4 = "DELETE FROM tblDistance WHERE DateTime = '$now' AND IP = '$IP' AND ZipCodeSearch = '$zipOne'";
		$result4 = mysql_query($sql4) or die("Cannot delete");
		
		
  ?>

</table>

<p><font size="1" face="Arial, Helvetica, sans-serif"><em>*The distances are derived from zip codes and may be off a little
from the actual distance. </em></font></p>
<script>
	function lockButton(buttonValue)
	{
		if (buttonValue == "Search by Zip Code")
		{
			document.form3.Search.value = "Searching...";
			return true;
			//alert(document.form3.Search.value);
		}
		else
		{
			alert ("Searching...");
			return false;
		}
	}
</script>
<p>&nbsp;</p>
<? }else{?>

<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">There are
    no  retail stores within <strong><font color="#FF0000"><? echo $Radius; ?> miles</font></strong> of you at this time that
  sell our timer.</font></p>

<script>
	function lockButton(buttonValue)
	{
		if (buttonValue == "Search by Zip Code")
		{
			document.form3.Search.value = "Searching...";
			return true;
			//alert(document.form3.Search.value);
		}
		else
		{
			alert ("Searching...");
			return false;
		}
	}
</script>
<form name="form3" method="post" action="storelocator-search.php" onSubmit=" return lockButton(document.form3.Search.value);">
  <table width="50%"  border="0" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td width="8%"><strong></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Widen your
            Search: </font></strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">&nbsp; </font>
          <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFFFCC">
            <tr bordercolor="#CCCCCC">
              <td><font size="2" face="Arial, Helvetica, sans-serif"> <a name="ZipCode"></a>
                    <input name="radiobutton"  tabindex = "11" type="radio" value="ZipCode" checked>
              </font></td>
              <td><p><font size="2" face="Arial, Helvetica, sans-serif">By U.S.
                    Zip Code
                        <input name="txtZipCode" type="text" id="txtZipCode3" tabindex = "1" value="<? echo $Zip; ?>" size="6" maxlength="5">
                </font></p>
                  <p><font size="2" face="Arial, Helvetica, sans-serif">Search
                      Radius:
                        <select name="Radius" id="select4" tabindex = "2">
                          <option value="200">200</option>
                          <option value="100">100</option>
                          <option value="75">75</option>
                          <option value="50">50</option>
                          <option value="25" selected>25</option>
                          <option value="20">20</option>
                          <option value="15">15</option>
                          <option value="10">10</option>
                          <option value="5">5</option>
                        </select>
                        <br>
                </font></p></td>
            </tr>
        </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="Search" type="submit" tabindex = "3" id="Search3" value="Search by Zip Code"></td>
    </tr>
  </table>
</form>
<p align="left"><a href="location_search.php"><font size="3" face="Arial, Helvetica, sans-serif"><strong><br>
  Widen
your Search Radius, OR Search by State, Country, Chain, or View All Locations </strong></font></a></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">If you  would
      like to suggest a store to sell our timer in, please <a href="contactus.php">contact 
      us</a>.</font></p>
<p align="left">&nbsp;</p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">You can also: </font></p>
<p align="left" class="big"><font size="3" face="Arial, Helvetica, sans-serif"><strong><a href="<? echo $https;?>product.php">Order 
  your Silent Timer Online</a></strong></font></p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">
  <? } ?>
      
  <?
  
  
  
  
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/dbinfo.php";
require "include/sidemenu.php";
?>
</p>
