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

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];
	
	$sortByA = $_GET['sortA'];
	$sortDirectionA = $_GET['dA'];
	
	$sortByB = $_GET['sortB'];
	$sortDirectionB = $_GET['dB'];
	
	$sortByC = $_GET['sortC'];
	$sortDirectionC = $_GET['dC'];


	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


  
	$sql7 = "SELECT * FROM tblShippingCost5";

					//sort results.....
				if ($sortBy != "")
				{
				$sql7 .= " ORDER BY $sortBy $sortDirection";
				}
				
				else
				{
				$sql7 .= " ORDER BY tblShippingCost5.ShipperID ASC";
				$sortBy ="tblShippingCost5.ShipperID";
				$sortDirection = "ASC";
				}
	
	
		$result7 = mysql_query($sql7) or die("Cannot execute query ShipCostID!");

?><title>ShipCostID - All</title>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Shipping
Cost ID </strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Choose the shipper and shipping option based on location for the weight you
  need. Write down the Cost and the ShipCostID.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&lt; <a href="ShipCostID.php">View
Popular Shipping Cost ID's</a></strong></font></p>
<p><font color="#FFCC99" size="2" face="Arial, Helvetica, sans-serif"><strong>-
      Highlighted in orange means it is active on the web site (current option
for customers)</strong></font></p>
<table width="100%" border="1" cellpadding="8" cellspacing="0" bordercolor="#CCCCCC">
<?

			   if ($sortDirection == "ASC")
			   {
			   		$sd = "DESC";
			   }
			   else
			   {
			   		$sd = "ASC";
			   }
			   
			   	
				if ($sortDirectionA == "ASC")
			   {
			   		$sdA = "DESC";
			   }
			   else
			   {
			   		$sdA = "ASC";
			   }
			   
			   if ($sortDirectionB == "ASC")
			   {
			   		$sdB = "DESC";
			   }
			   else
			   {
			   		$sdB = "ASC";
			   }
			   
			   if ($sortDirectionC == "ASC")
			   {
			   		$sdC = "DESC";
			   }
			   else
			   {
			   		$sdC = "ASC";
			   }
?>

  <tr bgcolor="#FFFFCC"> 
    <td><div align="center"><strong><a href="ShipCostID_all.php?sort=tblShippingCost5.ShipCostID&d=<? if ($sortBy=="tblShippingCost5.ShipCostID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">ShipCostID</font></a></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="ShipCostID_all.php?sort=tblShippingCost5.LocationID&d=<? if ($sortBy=="tblShippingCost5.LocationID") {echo $sd;} else {echo "ASC";}?>">Location</a></font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="ShipCostID_all.php?sort=tblShippingCost5.ShipperID&d=<? if ($sortBy=="tblShippingCost5.ShipperID") {echo $sd;} else {echo "ASC";}?>">Shipper</a></font></strong></div></td>
    <td><div align="center"><strong><a href="ShipCostID_all.php?sort=tblShippingCost5.ShippingOptionID&d=<? if ($sortBy=="tblShippingCost5.ShippingOptionID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">Shipping Option </font></a></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="ShipCostID_all.php?sort=tblShippingCost5.FromWeight&d=<? if ($sortBy=="tblShippingCost5.FromWeight") {echo $sd;} else {echo "ASC";}?>">From Weight </a></font></strong></div></td>
    <td><div align="center"><strong><a href="ShipCostID_all.php?sort=tblShippingCost5.ToWeight&d=<? if ($sortBy=="tblShippingCost5.ToWeight") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">To Weight </font></a></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="ShipCostID_all.php?sort=tblShippingCost5.Cost&d=<? if ($sortBy=="tblShippingCost5.Cost") {echo $sd;} else {echo "ASC";}?>">Cost</a></font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="ShipCostID_all.php?sort=tblShippingCost5.Active&d=<? if ($sortBy=="tblShippingCost5.Active") {echo $sd;} else {echo "ASC";}?>">Active?</a></font></strong></div></td>
  </tr>

  
  <?

			
					
					
					while($row7 = mysql_fetch_array($result7))
					{
						$ShipperID = $row7[ShipperID];
						$ShippingOptionID = $row7[ShippingOptionID];
						$LocationID = $row7[LocationID];
						$FromWeight = $row7[FromWeight];
						$ToWeight = $row7[ToWeight];
						$Cost = $row7[Cost];
						$Active = $row7[Active];
						$ShipCostID = $row7[ShipCostID];
						
							$sql8 = "SELECT * FROM tblShipper WHERE ShipperID = '$ShipperID'";
							$result8 = mysql_query($sql8) or die("Cannot execute query ShipperID!");
							
							while($row8 = mysql_fetch_array($result8))
							{
							$Shipper = $row8[CompanyName];
							}
							
							$sql9 = "SELECT * FROM tblShippingOption2 WHERE ShippingOptionID = '$ShippingOptionID'";
							$result9 = mysql_query($sql9) or die("Cannot execute query ShippingOptionID!");
							
							while($row9 = mysql_fetch_array($result9))
							{
							$ShippingOption = $row9[ShippingOption];
							$ShippingOptionNickname = $row9[Nickname];
							}


							$sql2 = "SELECT * FROM tblShipLocation WHERE LocationID = '$LocationID'";
							$result2 = mysql_query($sql2) or die("Cannot execute query countryID!");
							
							while($row2 = mysql_fetch_array($result2))
							{
							$Location = $row2[Name];
							}
							
							
					
  
  ?>
    <tr<? if($Active == "y") { ?> bgcolor="#FFCC99"<? } ?>>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ShipCostID; ?></font></strong></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Location; ?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Shipper; ?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ShippingOptionNickname; ?> - <? echo $ShippingOption; ?></font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $FromWeight; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ToWeight; ?></font></div></td>
    <td><div align="right"><strong><font size="2" face="Arial, Helvetica, sans-serif">$ <?php echo number_format($Cost,2); ?></font></strong></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Active; ?></font></div></td>
  </tr>
  <?
  }

  ?>
  
</table>
<p>&nbsp;</p>
<p align="right"><font size="3" face="Arial, Helvetica, sans-serif"><a href="javascript:window.close();">Close 
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