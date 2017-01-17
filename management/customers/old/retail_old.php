<?
//security for page
session_start();

//security check
If (session_is_registered('userName'))
{

// has http variable in it to populate links on page.
require "../include/url.php";

require "../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
		$PurchaseID = $_GET['purch'];
		$CustomerID = $_GET['cust'];
		
		# link to Database...
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database2");			

		$Radius = 25;
		$StoreClose = "n";
	
		$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
		$result = mysql_query($sql) or die("Cannot execute query customerID!");
		while($row = mysql_fetch_array($result))
		{
			$zipOne = $row[ZipCode];
			$Name = $row[FirstName];
		}
	
		include_once ("../../include/db_mysql.inc");
		include_once ("../../include/phpZipLocator.php");
		
		$db = new db_sql;
		$zipLoc = new zipLocator;
		$radius = $Radius;
		
		$zipArray = $zipLoc->inradius($zipOne,$radius);

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
		
		mysql_close($link);
?> 
<table width="650" border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td><div align="center"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Stores 
        Near You That Sell <em><font color="#000000">The Silent Timer&#8482;</font></em></strong></font></div></td>
  </tr>
</table>
<? if($StoreClose == "y"){?>
<table width="650" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#666666" size="3"><font color="#000000"><? echo $Name;?></font></font></strong></font>, 
        <font size="3">you live near a store that sells our timer!</font></strong><font size="3"> 
        </font> <br>
        Tell your friends where they can find The Silent Timer.<br>
        <br>
        Check a Borders location near you to see if they have the timer in stock.
        Go to <a href="http://www.bordersstores.com">www.bordersstores.com</a>.</font></div></td>
  </tr>
</table>
<br>
<div align="left"></div>
<table width="500" border="0" cellpadding="8" cellspacing="0">
  <?	
  
		require "../include/dbinfo.php";  	
  		
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database1");
  
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
				
				$db = new db_sql;
				$zipDistance = new zipLocator;
				
				$distance = number_format($zipDistance->distance($zipOne,$ZipCodeS),0);
				
				if($distance == 0)
				{
					$distance = 0;
				}

		if($distance <> 0)
		{
  ?>
  <tr>
    <td width="400"> <p> <font size="2" face="Arial, Helvetica, sans-serif"> <strong> 
        <font color="#666666" size="3"> <font color="#000000"><? echo $NameS;?></font><br>
        </font> </strong> <? echo "$AddressS";?><br>
        <? if($Address2S != ""){echo "$Address2S<br>";}?>
        <? if($Address3S != ""){echo "$Address3S<br>";}?>
        <? echo "$CityS";?>, <? echo "$StateS";?> <? echo "$ZipCodeS";?><br>
        <strong><? echo "$PhoneS";?><br>
        </strong><? echo "$WebsiteS";?><strong> </strong> </font> </p>
      
	  <?
	  if($distance <> 1)
	  {
	  ?>
	  
	  <p> <font size="2" face="Arial, Helvetica, sans-serif"> <em><strong>~ <? echo "$distance";?> 
        miles away from you</strong></em></font></p>
		
      <?
	  }
	  else
	  {
	  ?>
	  <p> <font size="2" face="Arial, Helvetica, sans-serif"> <em><strong>~ <? echo "$distance";?> 
        mile away from you</strong></em></font></p>
		
		<?
		}
		?>
	  
	  
	  <p>&nbsp;</p>
    </td>
  </tr>
  <?	
  		}
		else
		{
		?>
		  <tr>
    <td width="400"> <p> <font size="2" face="Arial, Helvetica, sans-serif"> <strong> 
        <font color="#666666" size="3"> <font color="#000000"><? echo $NameS;?></font><br>
        </font> </strong> <? echo "$AddressS";?><br>
        <? if($Address2S != ""){echo "$Address2S<br>";}?>
        <? if($Address3S != ""){echo "$Address3S<br>";}?>
        <? echo "$CityS";?>, <? echo "$StateS";?> <? echo "$ZipCodeS";?><br>
        <strong><? echo "$PhoneS";?><br>
        </strong><? echo "$WebsiteS";?><strong> </strong> </font> </p>
      <p>&nbsp;</p>
      </td>
  </tr>
		
		<?
  				}
			}
		}
		
		mysql_close($link);
  ?>

</table>

<table width="650" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><p align="center"><font size="2" face="Arial, Helvetica, sans-serif">Thank 
        you for shopping with us. Good luck on your test!!!<br>
        </font><font size="2" face="Arial, Helvetica, sans-serif"><strong>Call 
        us at 1-800-552-0325 or email us at info@silenttimer.com if you have any 
        questions!</strong></font></p>
    </td>
  </tr>
</table>
<p align="left">&nbsp;</p>

<? }else{?>

<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">There are no 
  retail stores near you at this time that sell our timer. If you would like to 
  suggest a store to sell our timer in, please <a href="../../contactus.php">contact 
  us</a>.</font></p>
<p align="left" class="big"><font size="3" face="Arial, Helvetica, sans-serif"><strong><a href="../../order">Order 
  your Silent Timer Online</a></strong></font></p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>

<? } ?>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

}
?>

	