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


?><HEAD>
<TITLE>All Retail Lists</TITLE>
<STYLE>
@media print { DIV.PAGEBREAK {page-break-before: always}}
</STYLE>
</HEAD>

<?

			$sql55 = "SELECT tblCustomer.CustomerID, tblCustomer.FirstName, tblCustomer.LastName, 
			tblCustomer.City, tblCustomer.State, tblCustomer.ZipCode, tblCustomer.CountryID, tblCustomer.BusinessName, 
			tblCustomer.StateOther, tblCustomer.Type, tblPurchase2.NovaPress,
			tblPurchase2.PurchaseID, tblPurchase2.CustomerID, tblPurchase2.ShipNotes,
			tblPurchase2.ShipCostID, tblPurchase2.Status, tblPurchase2.Shipped
			FROM tblCustomer INNER JOIN tblPurchase2
			ON tblCustomer.CustomerID = tblPurchase2.CustomerID
			INNER JOIN tblPurchaseDetails2
			ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
			INNER JOIN tblShippingCost5
			ON tblPurchase2.ShipCostID = tblShippingCost5.ShipCostID
			INNER JOIN tblShipper
			ON tblShippingCost5.ShipperID = tblShipper.ShipperID
			WHERE tblPurchase2.Status = 'active'
			AND tblPurchase2.Shipped = 'n' AND tblPurchaseDetails2.Status = 'active' AND tblShipper.ShipperID = '8'
			GROUP BY tblPurchase2.PurchaseID
			ORDER BY tblCustomer.Type";
			
			//echo $sql55;
			
			//put SQL statement into result set for loop through records
			$result55 = mysql_query($sql55) or die("Cannot execute query!");
			while($row55 = mysql_fetch_array($result55))
			{
				$zipOne = $row55[ZipCode];
				$Name = $row55[FirstName];
				$LastName = $row55[LastName];
		
		$Radius = 15;
		$StoreClose = "n";
			
	
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
			$NumStores = mysql_num_rows($result);
			
			while($row = mysql_fetch_array($result))
			{
				$StoreClose = "y";
			}
		
		
		
?> 

<? if($StoreClose == "y"){?>

<title>Retail List for <? echo $PurchaseID; ?>: <? echo $Name; ?> <? echo $LastName; ?></title>
<table width="650" border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td><div align="center"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Stores 
        Near You That Sell <em><font color="#000000">The Silent Timer&#8482;</font></em></strong></font></div></td>
  </tr>
</table>

<table width="650" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#666666" size="3"><font color="#000000"><? echo $Name;?></font></font></strong></font>, 
        <font size="3">you live near a store that sells our timer!</font></strong><font size="3"> 
        </font> <br>
        Tell your friends where they can find The Silent Timer.</font></div></td>
  </tr>
</table>
<br>
<table width="650" border="0" cellpadding="8" cellspacing="0">
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
			
			$NumStores2 = mysql_num_rows($result);
			//echo $NumStores2;
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
				
				

		
  ?>
  <tr>
  
  <?
  if($Chain <> '')
  {
  ?>
  
    <td width="400"> <p> <font size="2" face="Arial, Helvetica, sans-serif"> <strong> 
        <font color="#666666" size="3"> <font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#666666" size="3">
		<font color="#000000"><? echo $Chain;?></font></font></strong></font> - <font color="#000000"><? echo $NameS;?></font><br>
        </font> </strong> <? echo "$AddressS";?><br>
        <? if($Address2S != ""){echo "$Address2S<br>";}?>
        <? if($Address3S != ""){echo "$Address3S<br>";}?>
        <? echo "$CityS";?>, <? echo "$StateS";?> <? echo "$ZipCodeS";?><br>
        <strong><? echo "$PhoneS";?></strong><br>
        <br>
    </font></p>
      
    </td>
	<?
	}
	else
	{
	?>
	    <td width="400"> <p> <font size="2" face="Arial, Helvetica, sans-serif"> <strong> 
        <font color="#666666" size="3"> <font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#666666" size="3">
		</font></strong></font><font color="#000000"><? echo $NameS;?></font><br>
        </font> </strong> <? echo "$AddressS";?><br>
        <? if($Address2S != ""){echo "$Address2S<br>";}?>
        <? if($Address3S != ""){echo "$Address3S<br>";}?>
        <? echo "$CityS";?>, <? echo "$StateS";?> <? echo "$ZipCodeS";?><br>
        <strong><? echo "$PhoneS";?></strong><br>
        <br>
    </font></p>
      
    </td>
	
	
	<?
	}
	?>
  </tr>
  <?	
  }
		}
		
		
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

<DIV CLASS="PAGEBREAK"></DIV>

<?
}
}
}
?>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
}
?>