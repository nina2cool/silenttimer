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
		$Radius = 40;
		$StoreClose = "n";
	
		//$zipOne = $_POST['ZipCode'];
		
		//$ZipCode = $zipOne;

		$zipOne = 75248;
	
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
		
		/*
		
		
		
		$sql3 = "INSERT INTO tblRebate(DateTime, CustomerZipCode, Link)
		VALUES ('$now','$zipOne', 'storelocator.php')";
		//echo $sql3;
		mysql_query($sql3) or die("Cannot insert email, please try again.");
		
		*/
		
		/*
		mail("info@silenttimer.com", "Store Locator - Zip: $zipOne", "This email was submitted on $now...\nZip Code = $ZipCode", "From:Store Locator Email<info@silenttimer.com>");
		*/
		
		
		
?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Stores 
  Near You That Sell <em><font color="#000000">The Silent Timer&#8482;</font></em></strong></font></p>





<? if($StoreClose == "y")

{ 

  
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
				$BusinessCustomerIDS = $row[BusinessCustomerID];
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




?>

<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>You live near a 
  store that sells our timer!</strong> Picking your timer up in the store will 
  be quick and easy. That way you can start studying with it now! The following 
  stores are within 40 miles of you:<br>
</font></p>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">

<?
				
				#recall information from tblDistance but sort by Distance
				$sql3 = "SELECT * FROM tblDistance WHERE DateTime = '$now' AND IP = '$IP' AND ZipCodeSearch = '$zipOne' ORDER BY Distance ASC";
				//echo "<br><br>" .$sql3;
				$result3 = mysql_query($sql3) or die("Cannot pull distances.  Please try again.");
				
				$NumStores = mysql_num_rows($result3);
				
				echo "<br>NumStores = " .$NumStores;
	
				
				while($row3 = mysql_fetch_array($result3))
				{
					
					/*
					$NameS1 = $row3[Name];
					$AddressS1 = $row3[Address];
					$Address2S1 = $row3[Address2];
					$Address3S1 = $row3[Address3];
					$CityS1 = $row3[City];
					$StateS1 = $row3[State];
					$ZipCodeS1 = $row3[ZipCode];
					$PhoneS1 = $row3[Phone1];
					$WebsiteS1 = $row3[Website];
					$Chain1 = $row3[Chain];
					$BusinessCustomerIDS1 = $row3[BusinessCustomerID];
					$Rebate1 = $row3[Rebate];
					$Distance1 = $row3[Distance];
					*/
						
				
					$array[$k][0] = $NameS1;
					$array[$k][1] = $AddressS1;
					$array[$k][2] = $Address2S1;
					$array[$k][3] = $Address3S1;
					$array[$k][4] = $CityS1;
					$array[$k][5] = $StateS1;
					$array[$k][6] = $ZipCodeS1;
					$array[$k][7] = $PhoneS1;
					$array[$k][8] = $WebsiteS1;
					$array[$k][9] = $Chain1;
					$array[$k][10] = $BusinessCustomerIDS1;
					$array[$k][11] = $Rebate1;
					$array[$k][12] = $Distance1;
				
				
				$k++;
	
	# LOOP through images and display on page...
	$j=1;
	while($j <= $NumStores)
	{
	
?>
  <tr align="center" valign="top">
    <td width="20%">

              
              <?
	if($array[$j][9] <> '')
	{
	?>
              <font size="2" face="Arial, Helvetica, sans-serif"> <strong> <font color="#666666"> <? echo $array[$j][9]; ?> - <? echo $array[$j][0]; ?><br>
              </font> </strong>
              <?
	}
	else
	{
	?>
              <font size="2" face="Arial, Helvetica, sans-serif"> <strong> <font color="#666666"> <? echo $array[$j][0];?><br>
              </font> </strong>
              <?
		}
		?>
              </font> <? echo $array[$j][1];?><br>
              <? if($array[$j][2] != ""){echo $array[$j][2];}?><br>
              <? if($array[$j][3] != ""){echo $array[$j][3];}?><br>
              <? echo $array[$j][4];?>, <? echo $array[$j][5];?> <? echo $array[$j][6];?><br>
              <strong><? echo $array[$j][7];?><br>
              </strong>
              <? if($array[$j][8] != ""){?>
            <a href = "<? echo $array[$j][8]; ?>" target="_blank"><font face="Arial, Helvetica, sans-serif">Visit Online</font></a>
              <? } ?>
              </font><br>
                <font size="2" face="Arial, Helvetica, sans-serif"><em><strong>~ <? echo number_format($array[$j][12],1);?> miles
                away from you</strong></em></font>
                <div align="center"></div>
        <? $array[$j][0]= ""; }?>
    </td>
    <td width="20%">
       
              <font size="2" face="Arial, Helvetica, sans-serif">
              <?
	if($array[$j][9] <> '')
	{
	?>
              <font size="2" face="Arial, Helvetica, sans-serif"> <strong> <font color="#666666"> <? echo $array[$j][9]; ?> - <? echo $array[$j][0]; ?><br>
              </font> </strong>
              <?
	}
	else
	{
	?>
              <font size="2" face="Arial, Helvetica, sans-serif"> <strong> <font color="#666666"> <? echo $array[$j][0];?><br>
              </font> </strong>
              <?
		}
		?>
              </font></font>
              <? echo $array[$j][1];?><br>
              <? if($array[$j][2] != ""){echo $array[$j][2];}?><br>
              <? if($array[$j][3] != ""){echo $array[$j][3];}?><br>
              <? echo $array[$j][4];?>, <? echo $array[$j][5];?> <? echo $array[$j][6];?><br>
              <strong><? echo $array[$j][7];?><br>
              </strong>
              <? if($array[$j][8] != ""){?>
              <a href="<? echo $array[$j][8];?>" target="_blank">Visit Online</a>
              <? } ?>
              </font><br>
                <font size="2" face="Arial, Helvetica, sans-serif"><em><strong>~ <? echo number_format($array[$j][12],0);?> miles
                away from you</strong></em></font></div>
         
        <div align="center"> </div>
        <? $array[$j+1][0]= ""; }?>
    </td>
    <td width="20%">
       
              <?
	if($array[$j][9] <> '')
	{
	?>
             <strong>  <font color="#666666" size="3"><? echo $array[$j][9]; ?> - <? echo $array[$j][0];?><br>
              </font> </strong>
              <?
	}
	else
	{
	?>
              <strong> <font color="#666666" size="3"> <? echo $array[$j][0];?><br>
              </font> </strong>
              <?
		}
		?>
              <? echo $array[$j][1];?><br>
              <? if($array[$j][2] != ""){echo $array[$j][2];}?><br>
              <? if($array[$j][3] != ""){echo $array[$j][3];}?><br>
              <? echo $array[$j][4];?>, <? echo $array[$j][5];?> <? echo $array[$j][6];?><br>
              <strong><? echo $array[$j][7];?><br>
              </strong>
              <? if($array[$j][8] != ""){?>
              <a href="<? echo $array[$j][8];?>" target="_blank">Visit Online</a>
              <? } ?>
              </font><br>
                <font size="2" face="Arial, Helvetica, sans-serif"><em><strong>~ <? echo number_format($array[$j][12],0);?> miles
                away from you</strong></em></font></div>
        <div align="center"> </div>
        <? $array[$j+2][0]= "";?>
    </td>
  </tr>
  <?
	
		# move item numbers forward 5 products!
		$j=$j+3;	
	
	
?>
</table>
<p>&nbsp;</p>
<p><font size="1" face="Arial, Helvetica, sans-serif"><em>*The distances are derived from zip codes and may be off a little
from the actual distance. </em></font></p>
<?
}

else{


?>

<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">There are no 
  retail stores within 40 miles of you at this time that sell our timer. If you 
  would like to suggest a store to sell our timer in, please <a href="contactus.php">contact 
  us</a>.</font></p>

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
