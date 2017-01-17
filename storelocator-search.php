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
require "include/headerbottom.php";
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	# ------------------------------------------------------------------------------------------------------------
	#  ZIP CODE STORE LOOK UP!
	#  If person's shipping Zipcode is within 20 miles of a retail location... show them the stores!
	# ------------------------------------------------------------------------------------------------------------


	$RadiusGiven = $_POST['Radius'];
	$ZipCodeGiven = $_POST['txtZipCode'];


	//echo "radius = " .$RadiusGiven;
	//echo "<br>zip code = " .$ZipCodeGiven;


		$Radius = $RadiusGiven;
		$StoreClose = "n";
	
		$zipOne = $ZipCodeGiven;
	
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
		
		$sql3 = "INSERT INTO tblRebate(DateTime, CustomerZipCode, Link, Radius)
		VALUES ('$now','$ZipCodeGiven', 'storelocator-search.php', '$RadiusGiven')";
		//echo $sql3;
		mysql_query($sql3) or die("Cannot insert email, please try again.");
		
		/*
		mail("info@silenttimer.com", "Store Locator Search - Zip: $zipOne", "This email was submitted on $now...\nZip Code = $ZipCodeGiven; Radius = $RadiusGiven", "From:Store Locator Email<info@silenttimer.com>");
		*/

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Stores 
  Near You That Sell <em><font color="#000000">The Silent Timer&#8482;</font></em></strong></font></p>





<? if($StoreClose == "y"){?>


<p align="left"><strong><font size="3" face="Arial, Helvetica, sans-serif">Here is a
    list of stores within <font color="#FF0000"><? echo $RadiusGiven; ?></font> <font color="#FF0000">miles</font> of zip code <font color="#FF0000"><? echo $ZipCodeGiven; ?></font> that
    now carry The Silent Timer&#8482;.</font><font size="2" face="Arial, Helvetica, sans-serif"></font></strong><font size="2" face="Arial, Helvetica, sans-serif"> Instead of ordering online, get your timer
    today from any of the following bookstores. AND, if a store doesn't have
    it in stock, they can order it for you!</font></p>
<ul>
  <li><font size="2" face="Arial, Helvetica, sans-serif"><img src="images/rebate-green.jpg" alt="Rebate Available!" width="27" height="27" border="0"></font><font size="2" face="Arial, Helvetica, sans-serif"> means
      a mail-in rebate is available for this location.</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">This list is organized
      alphabetically by City. </font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">Click on the store name
      to view more information about the store.</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">You may want to call
      first to check their inventory.</font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif">See our <a href="timer/faq2.php?cat=13" target="_blank">Retail
        Store FAQ</a> if you have questions about the retail stores. </font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"><strong>Please note
        that these stores only stock The Silent Timer&#8482;, not the watch.
        THE SILENT TIMER LSAT BONUS COMBO IS NOT IN ALL OF THE STORES YET. SPECIFY
        WHEN CALLING THAT YOU ARE LOOKING FOR THE COMBO THAT HAS 2 TIMERS IN
        IT.</strong></font></li>
</ul>
<hr noshade>
<table width="70%" border="0" cellpadding="8" cellspacing="0" bordercolor="#CCCCCC">
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
				$Name = $row[Name];
				$Address = $row[Address];
				$Address2 = $row[Address2];
				$Phone1 = $row[Phone1];
				$Website = $row[Website];
				$City = $row[City];
				$State = $row[State];
				$Chain = $row[Chain];
				$BusinessCustomerID = $row[BusinessCustomerID];
								$Now = date("Y-m-d");
				
				$sql3 = "SELECT * from tblPromotionCode WHERE BusinessCustomerID = '$BusinessCustomerID' AND PromotionID = 'rebate' AND Status = 'active'";
						//echo "<br>sql = " .$sql3;
						$result3 = mysql_query($sql3) or die("Cannot execute query");
						//$Rebate = mysql_num_rows($result3);
						$Rebate = "n";
					
						while($row3 = mysql_fetch_array($result3))
						{
							$StartDate = $row3[StartDate];
							$EndDate = $row3[EndDate];
							$PromotionCodeID = $row3[PromotionCodeID];
						
						if($StartDate <= $Now AND $EndDate >= $Now) { $Rebate = "y"; } else { $Rebate = "n"; }
						
						}
				
				
				if($Chain == "Barnes & Noble")
				{
				$Name = "B&N - ". $Name;
				}
				elseif($Chain == "Borders")
				{
				$Name = "Borders - ". $Name;
				}
				else
				{
				$Name = $Name;
				}
?>
  <tr>
    <td width="5%" valign="top"><? if($Rebate == "y") { ?>
      <a href="order/rebate.php?rebate=<? echo $BusinessCustomerID; ?>&z=5&code=<? echo $PromotionCodeID; ?>" target="_blank"><img src="images/rebate-green.jpg" alt="Mail-In Rebate Available!" width="50" height="50" border="0"></a>
      <? } ?></td>
    <td><p><font size="2" face="Arial, Helvetica, sans-serif"> <a href="store_info.php?s=<? echo $BusinessCustomerID; ?>"> <strong><? echo $Name;?></strong></a><br>
              <? echo $Address;?><br>
              <? if($Address2 <> "") { ?>
              <? echo $Address2;?><br>
              <? } ?>
              <? echo $City;?>, <? echo $State; ?><br>
              <? if($Phone1 <> "") { ?>
              <? echo $Phone1;?>
              <? } ?>
      </font></p>
        <hr noshade>
    </td>
    <td>&nbsp;</td>
    <?
	}
	}
?>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><a href="location_search.php?zip=<? echo $ZipCodeGiven; ?>">Try
      a new radius</a> or <a href="mailto:info@silenttimer.com?subject=Store%20Suggestion">suggest
a store</a> to sell our timer in.</font></p>
<p>
  <? }else{?>
</p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">There are
    no retail stores within <? echo $RadiusGiven; ?> miles of zip code <? echo $ZipCodeGiven; ?> at
    this time that sell our timer. <a href="location_search.php?zip=<? echo $ZipCodeGiven; ?>">Try
    a new radius</a> or   <a href="mailto:info@silenttimer.com?subject=Store%20Suggestion">suggest
    a store</a> to sell our timer in.</font></p>

<p align="left" class="big"><font size="3" face="Arial, Helvetica, sans-serif"><strong><a href="<? echo $https;?>product.php">Order 
  your Silent Timer Online</a></strong></font></p>
<p align="left">&nbsp;</p>
<p align="left">
  <? } ?>
</p>
<hr noshade>
<p align="left"><strong><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt; Click
      on another US state on the map below, or choose a Canadian
province from the drop down box below the map: </font></strong></p>
<p align="left"><img src="images/usmap4.jpg" width="644" height="433" border="0" usemap="#US">
  <map name="US" id="US22">
    <area shape="poly" coords="605,121,608,118,604,112,603,115" href="locations_state.php?state=RI" alt="Rhode Island">
    <area shape="poly" coords="558,164,556,169,560,172,562,169,560,167" href="locations_state.php?state=DC" alt="Washington DC">
    <area shape="poly" coords="523,164,557,157,564,165,570,177,575,183,562,177,561,171,560,164,553,166,558,175,547,171,543,165" href="locations_state.php?state=MD" alt="Maryland">
    <area shape="poly" coords="565,164,570,174,574,173,569,165" href="locations_state.php?state=DE" alt="Delaware">
    <area shape="poly" coords="572,129,579,134,579,140,581,150,578,162,570,158,573,145,569,139" href="locations_state.php?state=NJ" alt="New Jersey">
    <area shape="poly" coords="584,116,588,126,602,121,602,113" href="locations_state.php?state=CT" alt="Connecticut">
    <area shape="poly" coords="582,105,586,113,605,109,610,115,619,109,612,104,608,104,608,100" href="locations_state.php?state=MA" alt="Massachusetts">
    <area shape="poly" coords="596,62,590,101,605,93" href="locations_state.php?state=NH" alt="New Hampshire">
    <area shape="poly" coords="577,70,591,67,590,75,588,88,588,100,582,101" href="locations_state.php?state=VT" alt="Vermont">
    <area shape="poly" coords="605,20,613,24,617,21,629,42,637,54,631,63,623,66,621,72,613,79,607,90,602,76,596,61" href="locations_state.php?state=ME" alt="Maine">
    <area shape="poly" coords="587,130,583,138,599,131,604,127,598,127" href="locations_state.php?state=NY" alt="New York">
    <area shape="poly" coords="573,70,558,75,547,87,546,99,538,106,525,107,519,110,519,117,514,123,511,128,514,129,562,122,570,127,581,131,581,109" href="locations_state.php?state=NY" alt="New York">
    <area shape="poly" coords="508,131,512,167,562,153,572,148,567,139,568,131,562,122" href="locations_state.php?state=PA" alt="Pennsylvania">
    <area shape="poly" coords="507,165,504,173,498,182,492,189,492,200,501,204,515,202,519,191,520,183,525,176,532,171,533,166,524,173,519,167" href="locations_state.php?state=WV" alt="West Virginia">
    <area shape="poly" coords="485,219,572,206,563,198,560,189,559,182,553,179,550,173,544,170,537,169,529,180,528,187,525,185,521,198,510,206,498,207" href="locations_state.php?state=VA" alt="Virginia">
    <area shape="poly" coords="477,245,506,218,567,207,577,226,567,235,553,250,531,240,516,239,500,238" href="locations_state.php?state=NC" alt="North Carolina">
    <area shape="poly" coords="488,246,504,240,521,244,533,242,546,253,524,281" href="locations_state.php?state=SC" alt="South Carolina">
    <area shape="poly" coords="459,248,486,246,498,259,521,283,518,299,516,309,474,312" href="locations_state.php?state=GA" alt="Georgia">
    <area shape="poly" coords="443,315,471,311,476,314,506,311,517,309,529,329,542,356,548,377,541,390,527,373,515,364,508,352,508,341,501,331,489,324,478,327,467,331,467,330,459,324,449,322" href="locations_state.php?state=FL" alt="Florida">
    <area shape="poly" coords="428,253,457,249,469,288,471,307,439,312,439,322,432,321" href="locations_state.php?state=AL" alt="Alabama">
    <area shape="poly" coords="402,254,425,252,429,322,415,326,405,314,387,313,394,291,389,277" href="locations_state.php?state=MS" alt="Mississippi">
    <area shape="poly" coords="410,228,400,252,473,246,479,236,500,220" href="locations_state.php?state=TN" alt="Tennessee">
    <area shape="poly" coords="414,227,474,221,490,209,494,205,485,194,483,189,475,190,462,187,454,196,436,206,427,208,418,216" href="locations_state.php?state=KY" alt="Kentucky">
    <area shape="poly" coords="458,146,476,144,484,144,499,135,506,155,505,167,498,172,495,178,488,188,484,185,473,187,463,184,459,160" href="locations_state.php?state=OH" alt="Ohio">
    <area shape="poly" coords="428,147,455,145,459,184,454,191,448,198,443,202,435,206,423,206,428,191,429,184,428,161" href="locations_state.php?state=IN" alt="Indiana">
    <area shape="poly" coords="355,288,387,287,391,294,384,314,408,317,412,327,402,328,411,333,411,340,400,343,393,344,383,336,373,339,363,334,357,336,359,318,353,298" href="locations_state.php?state=LA" alt="Louisiana">
    <area shape="poly" coords="347,233,398,233,396,238,404,239,396,258,389,270,390,283,354,285,348,277" href="locations_state.php?state=AR" alt="Arkansas">
    <area shape="poly" coords="332,169,377,168,383,185,392,197,403,218,408,223,407,232,403,236,400,230,392,230,345,230,346,194" href="locations_state.php?state=MO" alt="Missouri">
    <area shape="poly" coords="393,139,416,136,425,147,426,171,428,189,423,210,415,217,405,213,395,203,394,193,389,188,384,180,383,169,385,157" href="locations_state.php?state=IL" alt="Illinois">
    <area shape="poly" coords="434,146,470,140,477,121,471,107,465,110,464,101,463,91,457,85,446,82,442,92,436,101,433,111" href="locations_state.php?state=MI" alt="Michigan">
    <area shape="poly" coords="394,74,409,64,430,72,442,67,452,75,428,83,418,89" href="locations_state.php?state=MI" alt="Michigan">
    <area shape="poly" coords="379,70,398,80,411,86,415,98,419,103,418,133,388,136,377,114,363,91,367,78,367,105,368,78" href="locations_state.php?state=WI" alt="Wisconsin">
    <area shape="poly" coords="129,365,148,388,164,389,163,373,150,368" href="locations_state.php?state=HI" alt="Hawaii">
    <area shape="poly" coords="75,326,54,325,48,335,44,344,41,351,19,386,112,367" href="locations_state.php?state=AK" alt="Alaska">
    <area shape="poly" coords="323,123,324,137,331,164,380,165,384,156,392,147,382,136,379,123" href="locations_state.php?state=IA" alt="Iowa">
    <area shape="poly" coords="319,40,337,38,352,45,361,44,378,51,390,51,377,60,368,70,366,80,359,88,361,94,367,105,379,119,323,122" href="locations_state.php?state=MN" alt="Minnesota">
    <area shape="poly" coords="241,222,242,228,278,232,289,259,300,268,315,271,333,270,345,272,346,253,343,231,342,224" href="locations_state.php?state=OK" alt="Oklahoma">
    <area shape="poly" coords="257,177,254,223,342,223,341,192,337,182,333,178" href="locations_state.php?state=KS" alt="Kansas">
    <area shape="poly" coords="177,154,256,163,251,221,170,213" href="locations_state.php?state=CO" alt="Colorado">
    <area shape="poly" coords="237,129,235,156,258,160,257,174,333,176,326,156,318,140,318,135" href="locations_state.php?state=NE" alt="Nebraska">
    <area shape="poly" coords="242,84,237,126,319,135,318,87" href="locations_state.php?state=SD" alt="South Dakota">
    <area shape="poly" coords="244,34,314,39,317,59,318,84,241,82" href="locations_state.php?state=ND" alt="North Dakota">
    <area shape="poly" coords="168,216,240,222,234,295,189,294,187,300,168,297,167,304,159,302,155,301" href="locations_state.php?state=NM" alt="New Mexico">
    <area shape="poly" coords="108,206,104,218,98,217,98,229,98,242,100,247,93,251,92,256,91,263,90,268,87,270,129,298,155,301,166,215" href="locations_state.php?state=AZ" alt="Arizona">
    <area shape="poly" coords="122,128,156,135,154,146,173,152,167,212,107,202" href="locations_state.php?state=UT" alt="Utah">
    <area shape="poly" coords="165,89,154,147,233,159,237,97" href="locations_state.php?state=WY" alt="Wyoming">
    <area shape="poly" coords="124,18,242,34,239,98,166,87,161,93,149,91,143,91,135,76,130,73,132,56,123,45,120,33" href="locations_state.php?state=MT" alt="Montana">
    <area shape="poly" coords="113,16,123,18,119,31,121,41,132,57,126,70,128,74,133,71,136,82,144,94,154,92,161,92,156,133,92,120,98,83,105,68,103,60" href="locations_state.php?state=ID" alt="Idaho">
    <area shape="poly" coords="56,113,121,129,103,218,98,216,96,222,96,228,46,157,54,115" href="locations_state.php?state=NV" alt="Nevada">
    <area shape="poly" coords="31,39,12,81,7,92,10,97,87,121,97,88,94,82,100,76,106,67,100,61,74,55,62,58,47,52,41,41" href="locations_state.php?state=OR" alt="Oregon">
    <area shape="poly" coords="33,5,32,37,40,41,42,53,56,53,64,56,76,56,87,57,102,61,109,17,57,1,53,10,50,14" href="locations_state.php?state=WA" alt="Washington">
    <area shape="poly" coords="8,100,55,113,45,155,95,231,99,245,94,248,92,251,93,255,90,257,90,262,86,268,89,267,86,272,56,264,55,251,47,244,41,238,37,236,33,229,24,224,22,215,17,205,14,190,10,178,8,164,2,151,3,128,3,119,8,100" href="locations_state.php?state=CA" alt="California">
    <area shape="poly" coords="235,300,192,295,208,321,215,337,230,348,243,336,254,337,276,368,289,390,309,398,307,380,311,363,330,356,337,349,345,341,354,336,355,330,358,319,356,311,353,305,352,296,350,286,349,282,338,274,324,274,317,275,307,274,299,270,291,268,283,263,276,233,241,230" href="locations_state.php?state=TX" alt="Texas">
  </map> 
</p>
<form name="form1" method="post" action="">
  <p><strong><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;Choose
        a Canadian Province from the drop down list: </font></strong></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif">
    <select name="State" class="text" id="State">
      <option value = "" selected>Please Select</option>
      <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT State, Name
								FROM tblState
								WHERE Country = '38'
								ORDER BY Name";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
      <option value="<? echo $row[State];?>" <? if($row[State] == $State){echo "selected";}?>><? echo $row[Name];?></option>
      <?
						}
					?>
    </select>
    <input name="Go" type="submit" id="Go" value="Go">
  </font> </p>
</form>
<hr noshade>
<p><strong><font size="3" face="Arial, Helvetica, sans-serif"><a href="locations_all.php">VIEW
        ALL LOCATIONS</a> </font></strong></p>
<hr noshade>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>

<p align="left">
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
