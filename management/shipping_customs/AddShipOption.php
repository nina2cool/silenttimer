<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

//connect to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

//security check
If (session_is_registered('userName'))
{
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
 
 $LButton = "All";
 $SButton = "All";
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
</script>	
<script language="JavaScript1.1">
<!--
//  Browsers that support JavaScript 1.1 will replace the
//  earlier definition of doRedirect defined in the
//  JavaScript 1.0 code block.  Make sure that this
//  definition appears after the 1.0 definition in the file.
//
function doRedirect()
{
    //  JavaScript 1.1 added the 'replace' function on the
    //  location object so we can change locations without
    //  adding to the browser's history.
    //
	var ship = document.frmSubmit.selShipper.value
	
    window.location.replace( 'http://silenttimer.com/management/shipping_customs/AddShipOption.php?new='+ship );
}

//-->
</script>

<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
    <tr bgcolor="#CCCCCC"> <td  class=sort> <div align="center"><p><font color="#003399"><strong>
	<font size="1" face="Arial, Helvetica, sans-serif">**Shipping Option Notes**</font></strong></font></p>
        </div></td> </tr>
  <tr>
    <td><p><font size="1" face="Arial, Helvetica, sans-serif">There may only be one option with a corresponding Shipper, Location, Type and Weight Range. 
    If your weight range falls in, surrounds or overlaps the existing one in any way you must expand the range to the original option or limit the range for the new option so that they don't overlap.</font></p>
      <p><font size="1" face="Arial, Helvetica, sans-serif">Special shipping circumstances such as: Military, P.O. Box and Foreign are set in tblShipper. If a Shipper delivers to any of these, then all shipping options for that Shipper are possible under those circumstances. If you insert a foreign option for a Shipper who is not listed to ship foreign then this option will not be displayed to the customers. </font></p></td>
  </tr>
</table><br><br>

<?
if($_GET['new'] != "")
	{
	$Location1 = $_GET['loca'];
	$Shipper = $_GET['new'];

	$FromWeight = $_GET['from'];
	$ToWeight = $_GET['to'];
	$Cost = $_GET['cost'];
	$Active = $_Get['act'];
	}
	
if($_POST['Submit'] == "Submit")
	{
	$Location1 = $_POST['selLocation'];
	$Shipper = $_POST['selShipper'];
	$Type = $_POST['selType'];
	$FromWeight = $_POST['txtFromWeight'];
	$ToWeight = $_POST['txtToWeight'];
	$Cost = $_POST['txtCost'];
	$Active = $_POST['selActive'];
	
	# See if option already exists
	$sql = "SELECT * FROM tblShippingCost5 WHERE LocationID = '$Location1' AND ShipperID = '$Shipper' AND ShippingOptionID = '$Type' AND FromWeight < '$ToWeight' AND
			ToWeight > '$FromWeight'";
	$result = mysql_query($sql) or die("Cannot get Information.  Please try again. <br>$sql<br>");
	
	$row = mysql_fetch_array($result);
	
	if (count($row) != "1")
		{
		$tempCost = $row[Cost];
		$tempActive= $row[Active];
		$tempCount= count($row);
		$tempShipCostID = $row[ShipCostID];
		$tempFrom = $row[FromWeight];
		$tempTo = $row[ToWeight];
		$tempType = $row[ShippingOptionID];
		$tempLocation = $row[LocationID];
		$tempShipper = $row[ShipperID];
		
		?>
		<strong><font size="2" face="Arial, Helvetica, sans-serif">
		</font></strong>
		<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#000000">
    <tr bgcolor="#FF0000"> <td  class=sort> <div align="center"><p><font color="#FFFFFF"><strong>
	<font size="2" face="Arial, Helvetica, sans-serif">Submit Results</font></strong></font></p>
        </div></td> </tr><td>
		<strong><font size="2" face="Arial, Helvetica, sans-serif">
		<?	echo "OPTION ALREADY EXISTS with matching Shipper, Location, Type and a Weight Range that is overlapped by the range entered. <br> To change these values modify the record below."; ?>
		</font> </strong></td></tr></table>
		<?
		}
	else
		{		
			
			$error = "";
			if ($Shipper == "")
			{
				$error = "Shipper, ";			
			}
			
			if ($Location1 == "")
			{
				$error .= "Location, ";	
			}
			
			if ($Type == "")
			{
				$error .= "Type, ";	
			}
			
			if ($FromWeight == "")
			{
				$error .= "From Weight, ";	
			}
			
			if ($ToWeight == "")
			{
				$error .= "To Weight, ";	
			}
			
			if ($Cost == "")
			{
				$error .= "Cost, ";	
			}
			
			if($Active == "")
			{
				$error .= "Active. ";
			}								
										
			if ($error == "")
			{
				$sql = "INSERT INTO tblShippingCost5(ShipperID, LocationID, ShippingOptionID, FromWeight, ToWeight, Cost, Active) 
				VALUES ('$Shipper', '$Location1', '$Type', '$FromWeight', '$ToWeight', '$Cost', '$Active')";		
				$result = mysql_query($sql) or die("Cannot Insert Information.  Please try again. <br>$sql<br>");			
				?>
										<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#000000">
										<tr bgcolor="#FF0000"> <td  class=sort> <div align="center"><p><font color="#FFFFFF"><strong>
										<font size="2" face="Arial, Helvetica, sans-serif">Submit Results</font></strong></font></p>
										</div></td> </tr><td>
										<strong><font size="2" face="Arial, Helvetica, sans-serif">
										<?	echo "Shipping Option Successfully Added"; ?>
										</font> </strong></td></tr></table>
										<?
			
										$Location1 = "";
										$Shipper = "";
										$Type = "";
										$FromWeight = "";
										$ToWeight = "";
										$Cost = "";
										$Active = "";
			#end error if							
			}
			else
			{
			?>
				<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#000000">
										<tr bgcolor="#FF0000"> <td  class=sort> <div align="center"><p><font color="#FFFFFF"><strong>
										<font size="2" face="Arial, Helvetica, sans-serif">Submit Results</font></strong></font></p>
										</div></td> </tr><td>
										<strong><font size="2" face="Arial, Helvetica, sans-serif">
										<?	echo "Shipping Option NOT ADDED. Please fill out the following: $error"; ?>
										</font> </strong></td></tr></table>
			<? 
			#end error else
			}
		# end else
		}
	#end if submit	
	}
	
	if($_POST['Search'] == "Search")
	{
	$Location1 = $_POST['selLocation'];
	$Shipper = $_POST['selShipper'];
	$Type = $_POST['selType'];
	$FromWeight = $_POST['txtFromWeight'];
	$ToWeight = $_POST['txtToWeight'];
	$Cost = $_POST['txtCost'];
	$Active = $_POST['selActive'];
	
	# See if option already exists
	$sql = "SELECT * FROM tblShippingCost5 WHERE LocationID = '$Location1' AND ShipperID = '$Shipper' AND ShippingOptionID = '$Type' AND FromWeight < '$ToWeight' AND
			ToWeight > '$FromWeight'";
	$result = mysql_query($sql) or die("Cannot get Information.  Please try again. <br>$sql<br>");
	
	$row = mysql_fetch_array($result);
	
	if (count($row) != "1")
		{
		$tempCost = $row[Cost];
		$tempActive= $row[Active];
		$tempCount= count($row);
		$tempShipCostID = $row[ShipCostID];
		$tempFrom = $row[FromWeight];
		$tempTo = $row[ToWeight];
		$tempType = $row[ShippingOptionID];
		$tempLocation = $row[LocationID];
		$tempShipper = $row[ShipperID];
		
		?>
		<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#000000">
    <tr bgcolor="#FF0000"> <td  class=sort> <div align="center"><p><font color="#FFFFFF"><strong>
	<font size="2" face="Arial, Helvetica, sans-serif">Search Results</font></strong></font></p>
        </div></td> </tr><td>
		<strong><font size="2" face="Arial, Helvetica, sans-serif">
		<?	echo "OPTION ALREADY EXISTS with matching Shipper, Location, Type and a Weight Range that is overlapped by the range entered. <br> To change these values modify the record below."; ?>
		</font> </strong></td></tr></table>
		<?
		}
	else 
		{
		?>
		<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#000000">
    <tr bgcolor="#FF0000"> <td  class=sort> <div align="center"><p><font color="#FFFFFF"><strong>
	<font size="2" face="Arial, Helvetica, sans-serif">Search Results</font></strong></font></p>
        </div></td> </tr><td>
		<strong><font size="2" face="Arial, Helvetica, sans-serif">
		<?	echo "Option DOES NOT exist."; ?>
		</font> </strong></td></tr></table>
		<?		
		}
	}
	
	if($_POST['Modify'] == "Modify")
	{
	
	$FromWeight = $_POST['txtFromWeight2'];
	$ToWeight = $_POST['txtToWeight2'];
	$Cost = $_POST['txtCost2'];
	$Active = $_POST['selActive2'];
	
	$ShipCostID = $_POST['ShipCostID'];
	
	$sql = "UPDATE tblShippingCost5 SET Cost = '$Cost', Active = '$Active', FromWeight = '$FromWeight', ToWeight = '$ToWeight' WHERE ShipCostID = '$ShipCostID'";
	$result = mysql_query($sql) or die("Cannot Modify Information.  Please try again. <br>$sql<br>");
		?>
		<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#000000">
    <tr bgcolor="#FF0000"> <td  class=sort> <div align="center"><p><font color="#FFFFFF"><strong>
	<font size="2" face="Arial, Helvetica, sans-serif">Modify Results</font></strong></font></p>
        </div></td> </tr><td>
		<strong><font size="2" face="Arial, Helvetica, sans-serif">
		<?	echo "Shipping Option Successfully Modified"; ?>
		</font> </strong></td></tr></table>
		<?
		
		$Location1 = "";
		$Shipper = "";
		$Type = "";
		$FromWeight = "";
		$ToWeight = "";
		$Cost = "";
		$Active = "";
	}
	
	if($_POST['LShowAll'] == "ShowAll")
	{
	$Location1 = $_POST['selLocation'];
	$Shipper = $_POST['selShipper'];
	$Type = $_POST['selType'];
	$FromWeight = $_POST['txtFromWeight'];
	$ToWeight = $_POST['txtToWeight'];
	$Cost = $_POST['txtCost'];
	$Active = $_POST['selActive'];
		
	$Lsql = "SELECT * FROM tblShipLocation ORDER BY Name";	
	
	$LButton="Active";
		
	}
	
	if($_POST['LShowActive'] == "ShowActive")
	{
	$Location1 = $_POST['selLocation'];
	$Shipper = $_POST['selShipper'];
	$Type = $_POST['selType'];
	$FromWeight = $_POST['txtFromWeight'];
	$ToWeight = $_POST['txtToWeight'];
	$Cost = $_POST['txtCost'];
	$Active = $_POST['selActive'];
		
	$Lsql = "SELECT * FROM tblShipLocation WHERE Active = 'y' ORDER BY Name";	
	
	$LButton="All";
		
	}
	
	if($_POST['SShowAll'] == "ShowAll")
	{
	$Location1 = $_POST['selLocation'];
	$Shipper = $_POST['selShipper'];
	$Type = $_POST['selType'];
	$FromWeight = $_POST['txtFromWeight'];
	$ToWeight = $_POST['txtToWeight'];
	$Cost = $_POST['txtCost'];
	$Active = $_POST['selActive'];
		
	$Ssql= "SELECT * FROM tblShipper ORDER BY CompanyName";
	
	$SButton="Active";
		
	}
	
	if($_POST['SShowActive'] == "ShowActive")
	{
	$Location1 = $_POST['selLocation'];
	$Shipper = $_POST['selShipper'];
	$Type = $_POST['selType'];
	$FromWeight = $_POST['txtFromWeight'];
	$ToWeight = $_POST['txtToWeight'];
	$Cost = $_POST['txtCost'];
	$Active = $_POST['selActive'];
		
	$Ssql = "SELECT * FROM tblShipper WHERE DomesticMainland = 'y' OR DomesticOffshore = 'y' OR POBox = 'y' OR Military = 'y' OR International = 'y'
											 ORDER BY CompanyName AND Status = 'active'";
		
	$SButton="All";
	
	}
	
	if($_POST['Reset'] == "Reset")
	{
	$Location1 = "";
	$Shipper = "";
	$Type = "";
	$FromWeight = "";
	$ToWeight = "";
	$Cost = "";
	$Active = "";
			
	}
	
?>
<form action="" method="post" name="frmSubmit" id="frmSubmit">		
<font color="#003399"><strong><font size="3" face="Arial, Helvetica, sans-serif">Add or Specific Search for a Shipping Option</font></strong></font>
  <table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
    <tr bgcolor="#CCCCCC"> 
      <td  class=sort> <div align="center">
        <p><font color="#003399"><strong><font color="#003399"><strong><font size="2" 
				     face="Arial, Helvetica, sans-serif">Shipper</font></strong></font></strong></font></p>
        </div></td>
      <td  class=sort> <div align="center"><font color="#003399"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif">Type</font></strong></font></div></td>
      <td class=sort> <div align="center"><font color="#003399"><strong><font color="#003399"><strong><font size="2" 
				       face="Arial, Helvetica, sans-serif">Location<br>
        (Ship To)</font></strong></font></strong></font></div></td>
       <td class=sort> <div align="center"><font color="#003399"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif">From Weight*</font></strong></font></div></td>
       <td class=sort><div align="center"><font color="#003399"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif">To Weight*</font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Cost</font></strong></font></div></td>
	  <td class=sort><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Active</font></strong></font></div></td>
    </tr>
     <tr> 
	 <td align="center"> 
	 	<select name="selShipper" id="Shipper" onChange="doRedirect()">
                                    <option value="" selected>Select Shipper</option>
                                    <?
									if ($Ssql == "")
									{
										$Ssql = "SELECT * FROM tblShipper WHERE DomesticMainland = 'y' OR DomesticOffshore = 'y' OR POBox = 'y' OR Military = 'y' OR International = 'y'
											 ORDER BY CompanyName AND Status = 'active'";	
									}
									
									$result = mysql_query($Ssql) or die("Cannot get Locations.  Please try again.");
									
									# if need model description to limit partnumbers, set to yes in this loop.
									while($row = mysql_fetch_array($result))
									{
										$ShipperID = $row[ShipperID];
										$Name = $row[CompanyName];
								  ?>
									        <option value="<? echo $ShipperID;?>" <? if($row[ShipperID] == $Shipper){echo "selected";}?>> 
									        <? echo $Name; ?>
									        </option>
					                <?
									}
								  ?>
        </select>
		<? if ( $SButton == "All") { ?>
	   <input name="SShowAll" type="submit" id="SShowAll" value="ShowAll">	
	   <? } ?>
	   						
	   <? if ( $SButton == "Active") { ?>
       <input name="SShowActive" type="submit" id="SShowActive" value="ShowActive">  
	  <? } ?>
	     
   	</td>
	 <td align="center">
	<? if ($Shipper != "") { ?>
	   <select name="selType" id="Type">
	   		 <option value="" selected>Select Type</option>
                                    <?
									if ($Tsql == "")
									{
										$Tsql = "SELECT * FROM tblShippingOption2 WHERE ShipperID = $Shipper";	
									}
									
									$result = mysql_query($Tsql) or die("Cannot get types.  Please try again. $Tsql");
									
									# if need model description to limit partnumbers, set to yes in this loop.
									while($row = mysql_fetch_array($result))
									{
										$ShippingOptionID = $row[ShippingOptionID];
										$Name = $row[ShippingOption];
								  ?>
									        <option value="<? echo $ShippingOptionID;?>" <? if($row[ShippingOptionID] == $Type){echo "selected";}?>> 
									        <? echo $Name; ?>
									        </option>
					                <?
									}
								  ?>
                                  
       </select>	
	   <? } 
	   		else
			{
	   ?>      &nbsp; <? } ?> 
         
       </td>
	 <td align="center">
	 <select name="selLocation" id="Location">
                                    <option value="" selected>Select Location</option>
                                    <?
								 if ($Lsql == "")
									{
										$Lsql = "SELECT * FROM tblShipLocation WHERE Active = 'y' ORDER BY Name";	
									}
								  	
									# check to see if we need to use model description to limit products for vehicle!
									
									$result = mysql_query($Lsql) or die("Cannot get Locations.  Please try again.");
									
									# if need model description to limit partnumbers, set to yes in this loop.
									while($row = mysql_fetch_array($result))
									{
										$LocationID = $row[LocationID];
										$Name = $row[Name];
								 	?>
									        <option value="<? echo $LocationID;?>" <? if($LocationID == $Location1){echo "selected";}?>> 
									        <? echo $Name; ?>
									        </option>
					                <?
									}
								    ?>
        </select>	 
	<? if ( $LButton == "All") { ?>
	   <input name="LShowAll" type="submit" id="LShowAll" value="ShowAll" >
	   <? } ?>
	   
	   <? if ( $LButton == "Active") { ?>
       <input name="LShowActive" type="submit" id="LShowActive" value="ShowActive" >
	   <? } ?> 
	 </td>
	 <td><p align="center">
	   <input type="text" name="txtFromWeight" value="<? echo $FromWeight;?>" align="right" width="50">
	 </p></td>
	 <td><p align="center" >
	   <input type="text" name="txtToWeight" value="<? echo $ToWeight;?>" align="right" width="50">
	 </p></td>
	 <td><p align="center">
	   <input type="text" name="txtCost" value="<? echo $Cost;?>" align="right" width="50">
	 </p></td>
	 <td align="center"> <select name="selActive" id="Active">
                                  <option value="" <? if($Active == ""){echo "selected";}?>>Select Active</option>
								  <option value="y" <? if($Active == "y"){echo "selected";}?>>Yes</option>
								  <option value="n" <? if($Active == "n"){echo "selected";}?>>No</option>
								  
								 </select>
	   </td>
     </tr>
   
  </table> 

 <input type="submit" name="Submit" value="Submit">
 <input name="ShipCostID" type="hidden" id="ShipCostID" value="<? echo $tempShipCostID;?>">
 <input name="Reset" type="submit" id="Reset" value="Reset">
 <input name="Search" type="submit" id="Search" value="Search">
 <input name="ShipCostID" type="hidden" id="ShipCostID" value="<? echo $tempShipCostID;?>">
<br><br>
  <br>
  <font color="#003399"><strong><font size="3" face="Arial, Helvetica, sans-serif">Modify a Shipping Option</font></strong></font><br>
  <font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">To modify a record, search for it above.</font></strong></font>
  <table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
    <tr bgcolor="#CCCCCC">
      <td  class=sort>
        <div align="center">
          <p><font color="#003399"><strong><font size="2" 
				       face="Arial, Helvetica, sans-serif">Location<br>
            (Ship To)</font></strong></font></p>
      </div></td>
      <td  class=sort>
        <div align="center"><font color="#003399"><strong><font size="2" 
				     face="Arial, Helvetica, sans-serif">Shipper</font></strong></font></div></td>
      <td class=sort>
        <div align="center"><font color="#003399"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif">Type</font></strong></font></div></td>
      <td class=sort>
        <div align="center"><font color="#003399"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif">From Weight*</font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#003399"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif">To Weight*</font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Cost</font></strong></font></div></td>
      <td class=sort><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Active</font></strong></font></div></td>
    </tr>
    <tr>
      <td>
        <? 
			if ( $tempLocation != "")
			{
			$sql = "SELECT * FROM tblShipLocation WHERE LocationID = '$tempLocation'";	
			$result = mysql_query($sql) or die("Cannot get Location.  Please try again.");
			$row = mysql_fetch_array($result);
			$tempLocationName = $row[Name];
			echo "$tempLocationName";
			}
			else{ ?> &nbsp; <? }
		 ?>
      </td>
      <td>
	  	<? 
		if ( $tempShipper != "")
		{
			$sql = "SELECT * FROM tblShipper WHERE ShipperID = '$tempShipper'";	
			$result = mysql_query($sql) or die("Cannot get Location.  Please try again.");
			$row = mysql_fetch_array($result);
			$tempShipperName = $row[CompanyName];
			echo "$tempShipperName";
		}
		else { ?> &nbsp; <? }
		 ?>        
      </td>
      <td>
        <? 
			if ($tempType != "")
			{
			$Tsql = "SELECT * FROM tblShippingOption2 WHERE ShippingOptionID = $tempType";
									
			$Tresult = mysql_query($Tsql) or die("Cannot get types.  Please try again. $Tsql");
			$Trow = mysql_fetch_array($Tresult);
			$ShippingOptionID = $Trow[ShippingOptionID];
			$Name = $Trow[ShippingOption];
			echo $Name; 
			}
			else{ ?> &nbsp; <? }
		 ?>   
      </td>
      <td><p align="center">
          <input type="text" name="txtFromWeight2" value="<? echo $tempFrom;?>" align="right" width="50">
      </p></td>
      <td><p align="center">
          <input type="text" name="txtToWeight2" value="<? echo $tempTo;?>" align="right" width="50">
      </p></td>
      <td><p align="center">
          <input type="text" name="txtCost2" value="<? echo $tempCost;?>" align="right" width="50">
      </p></td>
      <td align="center">
        <select name="selActive2" id="selActive2">
          <option value="" <? if($tempActive == ""){echo "selected";}?>>Select Active</option>
          <option value="y" <? if($tempActive == "y"){echo "selected";}?>>Yes</option>
          <option value="n" <? if($tempActive == "n"){echo "selected";}?>>No</option>
        </select>
      </td>
    </tr>
  </table>
  <input name="Modify" type="submit" id="Modify" value="Modify">
<p><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>*From Weights and To Weights are included in the weight range. For the FromWeight enter the least amount of weight that can be shipped under this option and for the ToWeight enter the maximum weight that can be shipped under this option.</strong></font></p>
  
</form>
<p>&nbsp;</p>
<?
 //close connection to database
		mysql_close($link);
}

else
{
?>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
// side menu.
require "include/sidemenu.php";
?>
