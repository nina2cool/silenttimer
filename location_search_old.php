<?
//security for page
session_start();

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


	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$Zip = $_GET['zip'];


if ($_POST['Go'] == "Go")
	{
		// Customer Table
		$State = $_POST['State'];
	}
	
/*
if ($_POST['Find'] == "Find Locations")
{
	if($radio == 'ZipCode')
	{
		$txtZipCode = $_POST['txtZipCode'];
		$RadiusGiven = $_POST['Radius'];
		
		$goto = "storelocator-search.php?r=$RadiusGiven&z=$txtZipCode";
		header("location: $goto");
	}
}
*/
?> 




  <p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Buy
  The Silent Timer&#8482; at a bookstore near you!</font></strong> </p>
  <table width="100%"  border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">The Silent Timer&#8482; is
          available at over 500 stores nationwide and in Canada. Search by <a href="#ZipCode">Zip
          Code</a>, <a href="#State">State</a>, <a href="#Country">Country</a>, <a href="#Chain">Chain</a>,
          View <a href="#All">All Locations</a>, <a href="#Map">Click on your
      State on the map</a>, or <a href="#Canada">select your Canadian province</a> from the drop down
      box. </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="#Map"><img src="images/usmap_tiny.jpg" width="50" height="34" border="0"></a></font></td>
    </tr>
  </table>
  <p><font size="2" face="Arial, Helvetica, sans-serif">Remember to call the
      location before going over there to make sure they have it in stock; they
  run low especially when it is close to your test date. <strong>THE SILENT TIMER LSAT
      BONUS COMBO IS NOT IN ALL OF THE STORES YET. SPECIFY WHEN CALLING THAT
      YOU ARE LOOKING FOR THE COMBO THAT HAS 2 TIMERS IN IT. </strong></font></p>
  <p><strong><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt; Search
        for a location near you: </font></strong></p>
  
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
 
    <table width="50%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr>
        <td width="8%"><font size="2" face="Arial, Helvetica, sans-serif">
          <a name="ZipCode"></a>
          <input name="radiobutton"  tabindex = "11" type="radio" value="ZipCode" checked>
        </font></td>
        <td><p><font size="2" face="Arial, Helvetica, sans-serif">By
              U.S. Zip Code
              <input name="txtZipCode" type="text" id="txtZipCode" tabindex = "1" value="<? echo $Zip; ?>" size="6" maxlength="5">
              </font></p>
          <p><font size="2" face="Arial, Helvetica, sans-serif">Search Radius:
              <select name="Radius" id="select2" tabindex = "2">
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
    </table>
    <p>
      <input name="Search" type="submit" tabindex = "3" id="Search" value="Search by Zip Code">
</p>
    <p><strong><font size="3" face="Arial, Helvetica, sans-serif"><u>OR</u></font></strong></p>
  </form>
  <form name="form2" method="post" action="location_result.php">
    <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td width="8%"><font size="2" face="Arial, Helvetica, sans-serif">
        <a name="State" id="State"></a>
        <input name="radiobutton" type="radio" tabindex = "4" value="State" checked>
      </font></td>
      <td width="20%"><font size="2" face="Arial, Helvetica, sans-serif">By State</font></td>
      <td width="55%"><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="txtState" tabindex="4" id="txtState" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql3 = "SELECT * FROM tblState ORDER BY Name";
					$result3 = mysql_query($sql3) or die("Cannot get State");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
          <option value="<? echo $row3[State]; ?>"><? echo $row3[State]; ?></option>
          <?
					}
				?>
        </select>
      </font></td>
      <td width="19%" rowspan="4"><table border="0" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" class="right">
        <tr>
          <td><div align="center"><img src="pics/Retail_2005box_small.jpg" width="136" height="168" border="0" usemap="#Box"><br>
                  <a href="retail_box.php"><font size="2" face="Arial, Helvetica, sans-serif">Click
                  to enlarge</font></a></div></td>
          <map name="Box" id="Box">
            <area shape="rect" coords="3,3,131,165" href="retail_box.php" alt="Buy The Silent Timer at a store!">
          </map>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <a name="Country" id="Country"></a>
        <input name="radiobutton"  tabindex = "5" type="radio" value="Country">
      </font></td>
      <td width="20%"><font size="2" face="Arial, Helvetica, sans-serif">By Country</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="txtCountry"  tabindex = "8" id="txtCountry">
          <option value="">Select</option>
          <option value="US" selected>United States</option>
          <option value="CA">Canada</option>
          <option value="y">Other</option>
        </select>
      </font></td>
      </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <a name="Chain" id="Chain"></a>
        <input name="radiobutton"  tabindex = "7" type="radio" value="Chain">
      </font></td>
      <td width="20%"><font size="2" face="Arial, Helvetica, sans-serif">By Chain </font></td>
      <td>
	  
	    <font size="2" face="Arial, Helvetica, sans-serif">
	    <select name="txtChain"  tabindex = "8" id="txtChain">
          <option value="" selected>Select</option>
          <option value="Barnes &amp; Noble">Barnes &amp; Noble</option>
          <option value="Borders">Borders</option>
          <option value="Follett">Follett</option>
          <option value="Chapters">Chapters</option>
          <option value="Indigo Books">Indigo</option>
          <option value="y">Other Bookstores</option>
        </select>
	  
	  
	    </font></td>
      </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <a name="All" id="All"></a>
        <input name="radiobutton"  tabindex = "9" type="radio" value="All">
      </font></td>
      <td width="20%"><font size="2" face="Arial, Helvetica, sans-serif">All Locations </font></td>
      <td>&nbsp;</td>
      </tr>
  </table>
  <p>
    <input name="Find"  tabindex = "10" type="submit" id="Find" value="Search by State, Country, Chain, or All">
  </p>
</form>
<hr noshade>
<p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a name="Map" id="Map"></a></font><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt; Click
      on the US state on the map below, or choose a Canadian province from the
drop down box below the map: </font></strong></p>
<p><img src="images/usmap4.jpg" width="644" height="432" border="0" usemap="#US">
  <map name="US" id="US">
    <area shape="poly" coords="234,299,192,294,208,320,214,336,230,346,242,335,254,336,276,366,288,388,309,397,307,379,311,361,329,354,336,347,344,340,354,335,355,330,358,318,356,310,352,304,351,295,349,284,348,280,337,273,323,273,317,274,307,273,299,269,291,266,283,261,276,232,240,229" href="locations_state.php?state=TX" alt="Texas">
    <area shape="poly" coords="7,99,54,112,45,154,95,230,99,244,94,248,92,251,93,254,90,256,90,260,86,267,89,265,86,271,55,262,54,251,47,243,41,237,36,235,32,228,24,223,22,214,16,203,13,189,9,176,7,164,1,151,2,127,2,118,7,99" href="locations_state.php?state=CA" alt="California">
    <area shape="poly" coords="32,4,31,36,39,40,42,52,55,52,64,55,76,55,87,56,102,61,108,16,56,0,52,9,50,13" href="locations_state.php?state=WA" alt="Washington">
    <area shape="poly" coords="30,38,11,80,6,91,9,96,87,120,97,87,94,81,100,76,106,67,100,61,74,54,62,57,47,51,40,40" href="locations_state.php?state=OR" alt="Oregon">
    <area shape="poly" coords="55,112,120,128,103,217,98,215,96,221,96,228,46,156,53,114" href="locations_state.php?state=NV" alt="Nevada">
    <area shape="poly" coords="112,15,122,17,118,30,120,40,131,56,126,70,128,74,132,71,135,82,143,93,154,91,160,91,155,132,92,119,98,83,105,68,103,59" href="locations_state.php?state=ID" alt="Idaho">
    <area shape="poly" coords="123,17,241,33,238,97,166,86,160,92,149,90,142,90,134,76,129,73,131,55,122,45,119,32" href="locations_state.php?state=MT" alt="Montana">
    <area shape="poly" coords="164,88,154,147,232,158,236,96" href="locations_state.php?state=WY" alt="Wyoming">
    <area shape="poly" coords="121,127,155,134,154,146,173,152,167,211,107,201" href="locations_state.php?state=UT" alt="Utah">
    <area shape="poly" coords="107,204,104,217,98,216,98,228,98,241,100,247,93,251,92,255,91,261,90,267,87,269,128,297,154,300,165,214" href="locations_state.php?state=AZ" alt="Arizona">
    <area shape="poly" coords="168,215,239,221,233,294,189,293,187,299,168,296,167,303,158,301,154,300" href="locations_state.php?state=NM" alt="New Mexico">
    <area shape="poly" coords="243,33,314,38,317,58,318,84,240,81" href="locations_state.php?state=ND" alt="North Dakota">
    <area shape="poly" coords="241,84,236,126,319,134,318,86" href="locations_state.php?state=SD" alt="South Dakota">
    <area shape="poly" coords="236,128,234,155,257,159,257,173,333,175,325,155,318,139,318,134" href="locations_state.php?state=NE" alt="Nebraska">
    <area shape="poly" coords="177,153,256,162,251,220,170,212" href="locations_state.php?state=CO" alt="Colorado">
    <area shape="poly" coords="257,176,254,222,341,222,340,191,336,180,333,176" href="locations_state.php?state=KS" alt="Kansas">
    <area shape="poly" coords="240,221,241,228,278,231,288,258,300,266,315,270,333,269,344,271,345,253,342,230,341,223" href="locations_state.php?state=OK" alt="Oklahoma">
    <area shape="poly" coords="319,39,336,37,351,45,360,44,378,50,389,50,377,59,367,70,365,79,359,87,360,93,366,104,379,118,322,121" href="locations_state.php?state=MN" alt="Minnesota">
    <area shape="poly" coords="322,123,323,136,330,164,380,165,384,155,391,147,382,135,379,122" href="locations_state.php?state=IA" alt="Iowa">
    <area shape="poly" coords="75,325,53,324,48,334,44,343,40,350,18,384,111,365" href="locations_state.php?state=AK" alt="Alaska">
    <area shape="poly" coords="128,363,148,386,163,387,162,372,150,366" href="locations_state.php?state=HI" alt="Hawaii">
    <area shape="poly" coords="379,70,398,79,411,86,415,97,419,102,418,132,387,135,377,113,362,90,366,77,366,104,367,77" href="locations_state.php?state=WI" alt="Wisconsin">
    <area shape="poly" coords="393,74,409,64,429,72,441,67,451,75,428,83,418,88" href="locations_state.php?state=MI" alt="Michigan">
    <area shape="poly" coords="433,146,469,139,476,120,470,106,464,109,463,100,463,90,457,85,445,81,441,91,436,100,432,110" href="locations_state.php?state=MI" alt="Michigan">
    <area shape="poly" coords="392,138,416,135,425,147,426,171,428,188,423,209,415,216,405,212,395,202,394,192,388,187,384,178,383,169,385,156" href="locations_state.php?state=IL" alt="Illinois">
    <area shape="poly" coords="332,169,377,168,383,183,391,196,403,217,408,222,407,231,403,235,400,229,391,229,344,229,345,193" href="locations_state.php?state=MO" alt="Missouri">
    <area shape="poly" coords="346,232,398,232,396,237,404,238,396,257,388,269,389,281,354,283,347,276" href="locations_state.php?state=AR" alt="Arkansas">
    <area shape="poly" coords="355,286,386,285,390,293,384,313,408,316,412,326,402,327,411,332,411,339,400,342,392,343,383,335,373,338,362,333,357,335,359,317,352,297" href="locations_state.php?state=LA" alt="Louisiana">
    <area shape="poly" coords="428,147,454,145,459,182,453,190,447,197,442,201,434,204,423,204,428,190,429,182,428,160" href="locations_state.php?state=IN" alt="Indiana">
    <area shape="poly" coords="458,146,475,144,484,144,499,134,506,154,505,167,497,172,494,176,488,187,484,184,472,186,463,182,459,159" href="locations_state.php?state=OH" alt="Ohio">
    <area shape="poly" coords="413,227,473,220,489,208,493,203,485,193,483,188,474,189,462,186,453,195,436,205,427,207,418,215" href="locations_state.php?state=KY" alt="Kentucky">
    <area shape="poly" coords="410,228,400,252,472,245,479,235,500,219" href="locations_state.php?state=TN" alt="Tennessee">
    <area shape="poly" coords="402,254,425,252,429,321,414,325,405,313,386,312,393,290,388,276" href="locations_state.php?state=MS" alt="Mississippi">
    <area shape="poly" coords="428,253,457,249,468,287,470,305,438,311,438,321,431,320" href="locations_state.php?state=AL" alt="Alabama">
    <area shape="poly" coords="442,314,470,310,475,313,506,310,516,308,529,329,541,354,547,376,540,388,527,372,515,362,508,351,508,340,501,330,489,323,478,326,466,330,466,330,459,323,448,321" href="locations_state.php?state=FL" alt="Florida">
    <area shape="poly" coords="459,248,486,245,497,258,521,281,517,298,515,307,473,311" href="locations_state.php?state=GA" alt="Georgia">
    <area shape="poly" coords="488,245,504,239,521,243,533,241,545,253,524,279" href="locations_state.php?state=SC" alt="South Carolina">
    <area shape="poly" coords="476,244,506,217,566,206,576,225,566,234,552,250,531,239,515,238,500,237" href="locations_state.php?state=NC" alt="North Carolina">
    <area shape="poly" coords="485,218,571,204,563,197,560,188,558,180,552,177,549,172,543,170,536,169,529,178,528,186,525,184,521,197,510,205,497,206" href="locations_state.php?state=VA" alt="Virginia">
    <area shape="poly" coords="507,165,504,172,497,180,491,188,491,199,501,202,515,201,518,190,520,181,525,175,532,171,533,166,524,172,519,167" href="locations_state.php?state=WV" alt="West Virginia">
    <area shape="poly" coords="508,130,512,167,562,152,571,148,566,138,567,130,562,121" href="locations_state.php?state=PA" alt="Pennsylvania">
    <area shape="poly" coords="572,70,557,75,546,86,545,98,537,105,525,106,519,109,519,116,514,123,511,127,514,128,562,121,569,126,581,130,581,108" href="locations_state.php?state=NY" alt="New York">
    <area shape="poly" coords="587,129,583,137,598,130,604,126,597,126" href="locations_state.php?state=NY" alt="New York">
    <area shape="poly" coords="605,20,613,24,617,21,629,42,637,53,631,63,623,66,620,72,613,78,607,89,601,76,595,61" href="locations_state.php?state=ME" alt="Maine">
    <area shape="poly" coords="576,70,591,67,590,75,588,87,588,99,582,100" href="locations_state.php?state=VT" alt="Vermont">
    <area shape="poly" coords="595,62,590,100,605,92" href="locations_state.php?state=NH" alt="New Hampshire">
    <area shape="poly" coords="582,104,586,112,605,108,610,114,618,108,612,103,608,103,608,99" href="locations_state.php?state=MA" alt="Massachusetts">
    <area shape="poly" coords="584,115,588,126,602,120,601,112" href="locations_state.php?state=CT" alt="Connecticut">
    <area shape="poly" coords="571,128,578,133,578,139,581,150,577,161,569,157,572,145,568,138" href="locations_state.php?state=NJ" alt="New Jersey">
    <area shape="poly" coords="565,163,569,173,573,172,568,165" href="locations_state.php?state=DE" alt="Delaware">
    <area shape="poly" coords="523,164,556,156,564,165,569,176,574,181,562,176,561,171,559,164,552,166,557,174,546,171,542,165" href="locations_state.php?state=MD" alt="Maryland">
    <area shape="poly" coords="557,164,555,169,560,172,562,169,559,167" href="locations_state.php?state=DC" alt="Washington DC">
    <area shape="poly" coords="605,120,608,117,604,111,603,114" href="locations_state.php?state=RI" alt="Rhode Island">
  </map> 
</p>
<hr noshade>
<p><strong><font size="3" face="Arial, Helvetica, sans-serif"><a name="Canada"></a>&gt;&gt; Choose
a Canadian Province from the drop down list: </font></strong></p>
<form name="form1" method="post" action="http://www.silenttimer.com/locations_state.php?state=<? echo $State; ?>">
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
        </font>
  </p>
</form>
<hr noshade>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
