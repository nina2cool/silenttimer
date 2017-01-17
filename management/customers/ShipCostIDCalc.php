<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{


// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

# set up link to DB

	$CountryID = $_GET['CountryID'];
	$Weight = $_GET['TotalWeight'];
	$DHL = $_GET['DHL'];
	$USPS = $_GET['USPS'];
	$Stamp = $_GET['Stamp'];
	$POBox = $_GET['POBox'];
	$Military = $_GET['Military'];
	
	if($POBox == "POBox") { $CountryID = "242"; }
	if($Military == "Military") { $CountryID = "243"; }

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


?>


<script>
// this code hides and shows content on the page like the check ordering info...
	function visible(content)
	{
	  if (document.getElementById(content).style.display == "none") {
		document.getElementById(content).style.display = "";
		return true;
	  } else {
		document.getElementById(content).style.display = "none";
		return true;
	  }
	}
</script><title>Shipping Cost Choices</title>	

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Shipping
      Options</strong></font></p>
<p><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">(highlighted
      means available to customers online)</font></strong></p>
<table width="75%" border="1" cellpadding="2" cellspacing="0" bordercolor="#003399">
          <tr bgcolor="#FFFFCC">
            <td >
            <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping
                  Option </strong></font></div></td>
            <td width="10%" ><div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Ship
            Cost ID </font></strong></div></td>
            <td width="10%" ><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Cost</strong></font></div></td>
          </tr>          

<?

	$sql = "SELECT tblShipper.ShipperID, tblShipper.CompanyName, tblShippingOption2.ShippingOptionID, tblShippingOption2.ShippingOption,
	tblShippingOption2.Tracking FROM tblShippingOption2
	INNER JOIN tblShipper
	ON tblShippingOption2.ShipperID = tblShipper.ShipperID
	WHERE tblShipper.Status = 'active' AND tblShippingOption2.Status = 'active'";
	
	
	if ($CountryID != 225){ $sql .= " AND tblShipper.International = 'y'";}
	if ($Military == "Military"){ $sql .= " AND tblShipper.Military = 'y'";}
	if ($POBox == "POBox") {  $sql .= " AND tblShipper.POBox = 'y'";}
					
	//echo "<br>first = " .$sql;			
	
	#If the item can only be shipped via DHL and cannot be shipped to a PO Box
	if($DHL > '0' AND $USPS == 0 AND $POBox <> 'POBox')
		{
			if($Stamp == 0)
			{
			$sql .= " AND tblShippingOption2.ShipperID = '6' AND tblShippingOption2.ShippingOptionID <> '9'";
			}
			else
			{
			$sql .= " AND tblShippingOption2.ShipperID = '6'";
			}
		//echo "<br>9 = " .$sql;
		}
	
	#If the item can be shipped DHL, but it is a PO Box
	if($DHL > '0' AND $USPS == 0 AND $POBox == 'POBox')
		{
			if($Stamp == 0)
			{
			$sql .= " AND tblShippingOption2.ShipperID = '8' AND tblShippingOption2.ShippingOptionID <> '9'";
			}
			else
			{
			$sql .= " AND tblShippingOption2.ShipperID = '8'";
			}
		//echo "<br>8 = " .$sql;
		}
		
	#If the item can be shipped via either DHL or the Post Office
	if($DHL > '0' AND $USPS > '0')
		{
			if($Stamp == 0)
			{
			$sql .= " AND tblShippingOption2.ShippingOptionID <> '9'";
			}
			else
			{
			$sql .= " ";
			}			
			
		//$sql2 .= " ORDER BY Cost";
		//echo "<br>2 = " .$sql;
		//$result2 = mysql_query($sql2) or die("Cannot get Shipping Options.  Please try again. $sql2");
		}
	
	#if the item can be shipped via the POst office only (with or without stamp)
	
	if($DHL == 0 AND $USPS > '0')
		{
			if($Stamp == 0)
			{
			$sql .= " AND tblShippingOption2.ShipperID = '8' AND tblShippingOption2.ShippingOptionID <> '9'";
			}
			else
			{
			$sql .= " AND tblShippingOption2.ShipperID = '8'";
			}
		//$sql2 .= " ORDER BY Cost";
		//echo "<br>3 = " .$sql;
		//$result2 = mysql_query($sql2) or die("Cannot get Shipping Options.  Please try again. $sql2");
		}
	
	if($DHL == '0' AND $USPS == '0' AND $Stamp > 0)
		{
		$sql .= " AND tblShippingOption2.ShippingOptionID = '9'";
		//echo "<br>10 = " .$sql;
		//$sql2 = " SELECT * FROM tblShippingCost5 WHERE ShipperID = $tempShipperID AND LocationID = $CountryID AND FromWeight <= $Weight AND ToWeight > $Weight AND ShippingOptionID != 10 AND Active = 'y'";
		//$sql2 .= " ORDER BY Cost";
		//echo "4 = " .$sql2;
		//$result2 = mysql_query($sql2) or die("Cannot get Shipping Options.  Please try again. $sql2");
		}

	$sql .= " GROUP BY tblShippingOption2.ShippingOptionID ORDER BY tblShippingOption2.ShippingOptionID";
	
	//echo "<br>final = " .$sql;
	
	$result = mysql_query($sql) or die("Cannot get Shippers.  Please try again.");
	
	while($row = mysql_fetch_array($result))
	{
		$tempShipper= $row[CompanyName];
		$tempShipperID = $row[ShipperID];
		$tempShippingOptionID = $row[ShippingOptionID];
				
		$sql2 = "SELECT * FROM tblShippingCost5 WHERE ShipperID = '$tempShipperID' AND LocationID = '$CountryID' 
		AND FromWeight < '$Weight' AND ToWeight >= '$Weight' AND ShippingOptionID = '$tempShippingOptionID' AND Old = 'n'";
		$sql2 .= " GROUP BY ShipCostID ORDER BY Cost";
		
		//echo "<br>sql2 = " .$sql2;
		
		$result2 = mysql_query($sql2) or die("Cannot get Shipping Options.  Please try again. $sql2");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$Type = $row2[ShippingOptionID];
			$Cost = $row2[Cost];
			$ShippingCostID = $row2[ShipCostID];
			$Active = $row2[Active];
	
			$sql99= "SELECT * FROM tblShippingOption2 WHERE ShippingOptionID = $Type AND Status = 'active'";
			$result99 = mysql_query($sql99) or die("Cannot get Type. Please try again. $sql99");
			
			while($row99 = mysql_fetch_array($result99))
			{
				$TypeDisplay = $row99[ShippingOption];
				$Timeframe = $row99[Timeframe];
				$Description = $row99[Description];
?>		
			<tr valign = "center" <? if($Active == "y") { ?>bgcolor="#FFCC99"<? } ?>>
			  <td><div align="center">
			  <strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><? echo $tempShipper; ?> - <? echo $TypeDisplay; ?></font></strong></div>
			      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><em>Est. Delivery Time:</em> <em><? echo $Timeframe; ?></em><br>
			
			          <br>
			          <input name="chkDetail" type="checkbox" id="chkDetail" onclick="visible('<? echo $ShippingCostID; ?>');" value="y">
		              <font color="#999999"><strong>Check to view Shipping Option Description</strong></font></font></div>
								             		
			      <div style="display: none" id = "<? echo $ShippingCostID; ?>">
			
			 <font size="2" face="Arial, Helvetica, sans-serif"><? echo $Description; ?></font>
			  
			</div>  
			
			   
			   
			  </td>
			  <td width="10%"><div align="center"><font size="3"><strong><font color="#003399" face="Arial, Helvetica, sans-serif"><? echo $ShippingCostID; ?></font></strong></font></div></td>
			  <td width="10%"><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>
			  <? if ($Cost == '0') { ?>
			  <font color="#FF0000"> VARIABLE </font>
			  <? } else { ?>
              <font size="3">$ <? echo number_format($Cost,2); }?></font></strong></font></div></td>
			</tr>

<?
		
		}
		}
	}
?>
    
<? if ( $ShippingCostID == "" ) { ?> <tr >
  <td><font face="Arial, Helvetica, sans-serif"><? echo "Currently there are no shipping options to accomodate your order. <br><br> Please contact a sales representative at "; ?> <font color="#FF0000"><? echo "800-552-0325" ; ?></font> or<font color="#FF0000"><? echo " 512-340-0338"; ?> </font> <? echo "so we can help you place your order."; ?></font></td>
  <td width="10%">&nbsp;</td>
  <td>&nbsp;</td>
</tr> <? } ?></table>
<br>

<p><font size="3" face="Arial, Helvetica, sans-serif"><a href="javascript:window.close();">Close 
this Window</a></font></p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);


// finishes security for page
}
else
{
?>
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>