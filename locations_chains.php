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
require "include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	$Chain = $_GET['chain'];
	
	if($Chain == 2)
	{
	$Chain = "Barnes & Noble";
	}
	

	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];
	
	
	
	if ($_POST['Go'] == "Go")
	{
		// Customer Table
		$State = $_POST['State'];
	}
	
	
	if($Chain == "y")
	{
		$sql = "SELECT * FROM tblBusinessCustomer WHERE CustomerType = 'Bookstore' AND Status = 'active' AND Chain <> 'Barnes & Noble' AND Chain <> 'Borders'";
	}
	else
	{

		$sql = "SELECT * FROM tblBusinessCustomer WHERE CustomerType = 'Bookstore' AND Status = 'active' AND Chain = '$Chain'";
	}
			//sort results.....
			if ($sortBy != "")
			{
				$sql .= " ORDER BY $sortBy $sortDirection";
			}
		
			else
			{
				$sql .= " ORDER BY tblBusinessCustomer.State ASC";
				$sortBy ="tblBusinessCustomer.State";
				$sortDirection = "ASC";
			}
			
		
			$result = mysql_query($sql) or die("Cannot execute query");
			
			$Count = mysql_num_rows($result);
			
			$sql2 = "SELECT * from tblState WHERE State = '$State'";
			$result2 = mysql_query($sql2) or die("Cannot execute query");
			while($row2 = mysql_fetch_array($result2))
			{
			$StateName = $row2[Name];
			}
			
			
			if($Count > 0)
			{

			


?> 
<table width="100" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" class="right">
  <tr>
    <td><div align="center"><img src="pics/Retail_2005box_small.jpg" width="136" height="162" border="0" usemap="#Box"><br>
            <a href="retail_box.php"><font size="2" face="Arial, Helvetica, sans-serif">Click
            to enlarge</font></a></div></td>
    <map name="Box" id="Box">
      <area shape="rect" coords="4,3,132,165" href="retail_box.php" alt="Buy The Silent Timer at a store!">
    </map>
  </tr>
</table>
<?
		if($Count == '1')
		{
?>
<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">There
      is <? echo $Count; ?> location!</font></strong></p>
<?
		}
		else
		{
?>

<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">There
      are <? echo $Count; ?> locations!</font></strong></p>
<?
		}	  
?>

<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Here is a
    list of stores that now carry our timer. Instead of ordering online, get
    your timer today from any of the following bookstores. AND, if
    a store doesn't have it in stock, they can order it for you!</font></p>
<DIV><FONT size=+0><SPAN class=491151017-12102005><FONT face=Arial size=2>You
        may want to call first to check their inventory<BR>
  - &nbsp;</FONT><FONT size="2" face=Arial><STRONG>The Silent Timer's ISBN is
  0-9753503-0-7<BR>
  </STRONG>- &nbsp;For <STRONG><EM>Borders Stores</EM></STRONG>, ask the store
  to check for <STRONG>BINC # 8026919</STRONG> </FONT><FONT size="2" face=Arial>(this
  is their internal number for&nbsp;faster product search) </FONT></span></font></DIV>
<DIV><FONT face=Arial size=2><SPAN class=491151017-12102005><BR>
        <FONT 
color=#ff0000><U>IMPORTANT:</U></FONT>&nbsp;When calling any store, make sure
        you mention to the bookseller that:</SPAN></FONT></DIV>
<DIV><FONT face=Arial size=2><SPAN class=491151017-12102005>-&nbsp;<STRONG>The
        Silent Timer is NOT a book</STRONG>, but an electronic timer</SPAN></FONT></DIV>
<DIV><FONT face=Arial size=2><SPAN class=491151017-12102005>- It&nbsp;will be
      located near Test Prep Books in a small yellow box&nbsp; </SPAN></FONT></DIV>
<DIV><FONT face=Arial size=2><SPAN 
class=491151017-12102005></SPAN></FONT></DIV>
<DIV>
  <p><FONT face=Arial size=2><SPAN class=491151017-12102005>If you're at the
          store, the timer should be located in the Test Prep/Study Aid Section.
          If not, check behind the register and at the front of the store. When in
  doubt, ask an employee for help (keeping the above suggestions in mind).</SPAN></FONT></p>
</DIV>
<p align="left">


</p>

  <?
			   // code to handle sort direction
			   // this following code just switches teh ascending order to descending and vice verca when necessary.
			   // The links in the titles of the colum fields are changed depending on the value in this variable and
			   // depending on what is being sorted by.
			   if ($sortDirection == "ASC")
			   {
			   		$sd = "DESC";
			   }
			   else
			   {
			   		$sd = "ASC";
			   }

			    
?>

<table width="100%" border="1" cellpadding="8" cellspacing="0" bordercolor="#CCCCCC">
  <tr bgcolor="#003399"> 
    <td width="" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><a href="locations_chains.php?chain=<? echo $Chain; ?>&sort=tblBusinessCustomer.Chain&d=<? if ($sortBy=="tblBusinessCustomer.Chain") {echo $sd;} else {echo "ASC";}?>">Chain</a> / <a href="locations_chains.php?chain=<? echo $Chain; ?>&sort=tblBusinessCustomer.Name&d=<? if ($sortBy=="tblBusinessCustomer.Name") {echo $sd;} else {echo "ASC";}?>">Store
    Location</a></font></strong></td>
    <td width="" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><a href="locations_chains.php?chain=<? echo $Chain; ?>&sort=tblBusinessCustomer.Address&d=<? if ($sortBy=="tblBusinessCustomer.Address") {echo $sd;} else {echo "ASC";}?>">Address</a></font></strong></td>
    <td width="" bgcolor="#FFFFCC"><div align="left"><strong><font color="#003399"><font size="2" face="Arial, Helvetica, sans-serif"><a href="locations_chains.php?chain=<? echo $Chain; ?>&sort=tblBusinessCustomer.City&d=<? if ($sortBy=="tblBusinessCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a>, </font><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><a href="locations_chains.php?chain=<? echo $Chain; ?>&sort=tblBusinessCustomer.State&d=<? if ($sortBy=="tblBusinessCustomer.State") {echo $sd;} else {echo "ASC";}?>">State</a></font></font></strong></div></td>
    <td width="" bgcolor="#FFFFCC"><div align="left"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><a href="locations_chains.php?chain=<? echo $Chain; ?>&sort=tblBusinessCustomer.Phone1&d=<? if ($sortBy=="tblBusinessCustomer.Phone1") {echo $sd;} else {echo "ASC";}?>">Phone
              #</a></font></strong></div></td>
    <td colspan="2" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Available
          Rebates </font></strong></td>
  </tr>
  <?
			
			
							
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
				elseif($Chain == "Indigo Books")
				{
				$Name = "Indigo Books - ". $Name;
				}
				elseif($Chain == "Chapters")
				{
				$Name = "Chapters - ". $Name;
				}				
				else
				{
				$Name = $Name;
				}
?>
  <tr> 
    <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="store_info.php?s=<? echo $BusinessCustomerID; ?>"><? echo $Name;?></a></font></td>
	  <td>
	  <?
	  if($Address2 <> "")
	  {
	  ?>
	  
	  
	  
    <font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address;?><br>
    <? echo $Address2;?></font>
	
	<?
	}
	else
	{
	?>
	
	 <font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address;?></font>
	
	<?
	}
	?> 
	</td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City;?>, <? echo $State;?></font></div></td>
    <td width="15%"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Phone1;?></font></div></td>
	
	<?
	if($Rebate == 'y')
	{
	?>
    <td bgcolor="#D9ECFF"><div align="center"><a href="order/rebate.php?rebate=<? echo $BusinessCustomerID; ?>&z=4&code=<? echo $PromotionCodeID; ?>" target="_blank"><img src="order/pics/off2.jpg" alt="$5 Rebate!" width="50" height="43" border="0"></a> </div></td>
    <td bgcolor="#D9ECFF"><div align="center">
        <p>        <font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="http://www.SilentTimer.com/order/rebate.php?rebate=<? echo $BusinessCustomerID; ?>&z=4&code=<? echo $PromotionCodeID; ?>" target="_blank">$5
        Rebate for Your Purchase of The Silent Timer at this  location! </a></font></p>
    </div></td>
	<?
	}
	else
	{
	?>
	   <td colspan="2"><br></td>
  
    <?
		}
			}
			
	
?>

  </tr>

</table>

<?
			}
		else
			{
			
			$sql2 = "SELECT * from tblState WHERE State = '$State'";
			$result2 = mysql_query($sql2) or die("Cannot execute query");
			while($row2 = mysql_fetch_array($result2))
			{
			$StateName = $row2[Name];
			}
			
			?>
<br>
 <br>			
<p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">There are currently no locations in <? echo $StateName; ?>.</font><font size="5" face="Arial, Helvetica, sans-serif"><br>
		    <font size="3"><a href="contactus.php">Call
	        or email</a> to suggest a retail location.</font></font></p>
			<br>
			<?
			
			
			
			}
			
?>

            <br>
            <hr noshade>
<p align="left"><strong><font size="3" face="Arial, Helvetica, sans-serif">&gt;&gt; Click
      on another US state on the map below, or choose a US State or Canadian
      province from the drop down box below the map: </font></strong></p>
<p align="left"><img src="images/usmap4.jpg" width="644" height="433" border="0" usemap="#US">
  <map name="US" id="US2">
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
        a US State or Canadian Province from the drop down list: </font></strong></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif">
    <select name="State" class="text" id="State">
      <option value = "" selected>Please Select</option>
      <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT State, Name
								FROM tblState
								
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

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>