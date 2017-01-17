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



		#<Add button being pushed>
	if ($_POST['Submit'] == "Calculate Shipping Options")
	{
		// Customer Table
		$CountryID = $_POST['CountryID'];
		$POBox = $_POST['ckPOBox'];
		$Military = $_POST['ckMilitary'];

		// Purchase Details2 Table
		$Product1 = $_POST['Product1'];
		$Product2 = $_POST['Product2'];
		$Product3 = $_POST['Product3'];
		$Product4 = $_POST['Product4'];
		$Quantity1 = $_POST['Quantity1'];
		$Quantity2 = $_POST['Quantity2'];
		$Quantity3 = $_POST['Quantity3'];
		$Quantity4 = $_POST['Quantity4'];

		$sql1 = "SELECT Weight, DHL, USPS, Stamp FROM tblProductNew WHERE ProductID = '$Product1'";
		$result1 = mysql_query($sql1) or die("Cannot get weight for Product 1");
		while($row1 = mysql_fetch_array($result1))
		{
		$Weight1 = $row1[Weight];
		$DHL1 = $row1[DHL];
		$USPS1 = $row1[USPS];
		$Stamp1 = $row1[Stamp];
		}
		
		$sql2 = "SELECT Weight, DHL, USPS, Stamp FROM tblProductNew WHERE ProductID = '$Product2'";
		$result2 = mysql_query($sql2) or die("Cannot get weight for Product 2");		
		while($row2 = mysql_fetch_array($result2))
		{
		$Weight2 = $row2[Weight];
		$DHL2 = $row2[DHL];
		$USPS2 = $row2[USPS];
		$Stamp2 = $row2[Stamp];
		}

		$sql3 = "SELECT Weight, DHL, USPS, Stamp FROM tblProductNew WHERE ProductID = '$Product3'";
		$result3 = mysql_query($sql3) or die("Cannot get weight for Product 3");
		while($row3 = mysql_fetch_array($result3))
		{
		$Weight3 = $row3[Weight];
		$DHL3 = $row3[DHL];
		$USPS3 = $row3[USPS];
		$Stamp3 = $row3[Stamp];
		}
		
		$sql4 = "SELECT Weight, DHL, USPS, Stamp FROM tblProductNew WHERE ProductID = '$Product4'";
		$result4 = mysql_query($sql4) or die("Cannot get weight for Product 4");
		while($row4 = mysql_fetch_array($result4))
		{
		$Weight4 = $row4[Weight];
		$DHL4 = $row4[DHL];
		$USPS4 = $row4[USPS];
		$Stamp4 = $row4[Stamp];
		}
		
		$TotalWeight1 = $Quantity1 * $Weight1;
		$TotalWeight2 = $Quantity2 * $Weight2;
		$TotalWeight3 = $Quantity3 * $Weight3;
		$TotalWeight4 = $Quantity4 * $Weight4;
	
		$TotalWeight = $TotalWeight1 + $TotalWeight2 + $TotalWeight3 + $TotalWeight4;
		
		if($DHL1 == "y") { $DHL1 = 1; } else { $DHL1 = 0; }
		if($DHL2 == "y") { $DHL2 = 1; } else { $DHL2 = 0; }
		if($DHL3 == "y") { $DHL3 = 1; } else { $DHL3 = 0; }
		if($DHL4 == "y") { $DHL4 = 1; } else { $DHL4 = 0; }
		
		if($USPS1 == "y") { $USPS1 = 1; } else { $USPS1 = 0; }
		if($USPS2 == "y") { $USPS2 = 1; } else { $USPS2 = 0; }
		if($USPS3 == "y") { $USPS3 = 1; } else { $USPS3 = 0; }
		if($USPS4 == "y") { $USPS4 = 1; } else { $USPS4 = 0; }
		
		if($Stamp1 == "y") { $Stamp1 = 1; } else { $Stamp1 = 0; }
		if($Stamp2 == "y") { $Stamp2 = 1; } else { $Stamp2 = 0; }
		if($Stamp3 == "y") { $Stamp3 = 1; } else { $Stamp3 = 0; }
		if($Stamp4 == "y") { $Stamp4 = 1; } else { $Stamp4 = 0; }		
		
		
		$DHL = $DHL1 + $DHL2 + $DHL3 + $DHL4;
		$USPS = $USPS1 + $USPS2 + $USPS3 + $USPS4;
		$Stamp = $Stamp1 + $Stamp2 + $Stamp3 + $Stamp4;
		

		$goto = "ShipCostIDCalc.php?CountryID=$CountryID&TotalWeight=$TotalWeight&DHL=$DHL&USPS=$USPS&Stamp=$Stamp&POBox=$POBox&Military=$Military";
		header("location: $goto");		
				
		}

?><title>ShipCostID</title>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Choose
      your options : </strong></font></p>
<form name="form1" method="post" action="">
  <table width="50%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td width="50%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Quantity</font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product1" tabindex="" id="select" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew ORDER BY Nickname ASC";
					
					$result = mysql_query($sql) or die("Cannot get tblProductNew1");
					
					while($row = mysql_fetch_array($result))
					{
				?>
          <option value="<? echo $row[ProductID]; ?>"><? echo $row[Nickname]; ?></option>
          <?
					}
				?>
        </select>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Quantity1" type="text" id="Quantity1" size="5">
      </font></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product2" tabindex="" id="Product2" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew ORDER BY Nickname ASC";
					
					$result = mysql_query($sql) or die("Cannot get tblProductNew2");
					
					while($row = mysql_fetch_array($result))
					{
				?>
          <option value="<? echo $row[ProductID]; ?>" <? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
          <?
					}
				?>
        </select>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Quantity2" type="text" id="Quantity2" size="5">
      </font></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product3" tabindex="" id="Product3" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew ORDER BY Nickname ASC";
					
					$result = mysql_query($sql) or die("Cannot get tblProductNew3");
					
					while($row = mysql_fetch_array($result))
					{
				?>
          <option value="<? echo $row[ProductID]; ?>" <? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
          <?
					}
				?>
        </select>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Quantity3" type="text" id="Quantity3" size="5">
      </font></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Product4" tabindex="" id="Product4" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql = "SELECT * FROM tblProductNew ORDER BY Nickname ASC";
					
					$result = mysql_query($sql) or die("Cannot get tblProductNew4");
					
					while($row = mysql_fetch_array($result))
					{
				?>
          <option value="<? echo $row[ProductID]; ?>" <? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname]; ?></option>
          <?
					}
				?>
        </select>
      </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Quantity4" type="text" id="Quantity4" size="5">
      </font></td>
    </tr>
  </table>
  <br>
  <table width="75%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Country</strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="CountryID" tabindex="" id="CountryID" class="text">
          <option value="" selected>Select</option>
          <? 
					$sql3 = "SELECT * FROM tblShipLocation ORDER BY Name";
					$result3 = mysql_query($sql3) or die("Cannot get CountryB");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
          <option value="<? echo $row3[LocationID]; ?>"<? if($row3[LocationID] == 225){echo "selected";}?>><? echo $row3[Name]; ?></option>
          <?
					}
				?>
        </select> 
        <br>
        (select <strong>United States Offshore</strong> for Alaska, Hawaii, and
        Puerto Rico)</font></td>
    </tr>
  </table>
  <p>
    <input name="ckPOBox" tabindex="12" type="checkbox" value="POBox" <? if($POBox == "POBox"){ echo "checked";}?>>
    <font size="2" face="Arial, Helvetica, sans-serif" color="#000000">P.O. Box
    Address Shipping</font><br>
          <input name="ckMilitary" tabindex="13" type="checkbox" value="Military" <? if($Military == "Military"){ echo "checked";}?>>
          <font size="2" face="Arial, Helvetica, sans-serif" color="#000000">Military
  Address Shipping</font> </p>
  <p>
    <input type="submit" name="Submit" value="Calculate Shipping Options">
  </p>
</form>
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