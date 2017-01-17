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

// -------------------------- CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

$ProductID = $_GET['p'];

#Code for Updating to Table

#Add the WHERE clause in the sql statement, double check the table names. Delete primary key IDs. 

// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

$Now = date("Y-m-d");

If ($_POST['Update'] == "Update")
{

$ProductName = addslashes($_POST['ProductName']);
$Nickname = $_POST['Nickname'];
$Timer = $_POST['Timer'];
$ISBN = $_POST['ISBN'];
$UPC = $_POST['UPC'];
$Description = addslashes($_POST['Description']);
$SubProductID1 = $_POST['SubProductID1'];
$SubProductID2 = $_POST['SubProductID2'];
$SubProductID3 = $_POST['SubProductID3'];
$Cost = $_POST['Cost'];
$OnlinePrice = $_POST['OnlinePrice'];
$RetailPrice = $_POST['RetailPrice'];
$OnHand = $_POST['OnHand'];
$Demo = $_POST['Demo'];
$Damaged = $_POST['Damaged'];
$ReturnToMan = $_POST['ReturnToMan'];
$Warehouse = $_POST['Warehouse'];
$WebInventory = $_POST['WebInventory'];
$ReOrderPoint = $_POST['ReOrderPoint'];
$ImageID = $_POST['ImageID'];
$CategoryID = $_POST['CategoryID'];
$Retail = $_POST['Retail'];
$Weight = $_POST['Weight'];
$FreeShipping = $_POST['FreeShipping'];
$Ship = $_POST['Ship'];
$BuiltInShipCost = $_POST['BuiltInShipCost'];
$USPS = $_POST['USPS'];
$DHL = $_POST['DHL'];
$Split = $_POST['Split'];
$Stamp = $_POST['Stamp'];
$Priority = $_POST['Priority'];
$Preorder = $_POST['Preorder'];
$PreorderPrice = $_POST['PreorderPrice'];
$Color = $_POST['Color'];
$Status = $_POST['Status'];
$Notes = $_POST['Notes'];

$sql = "UPDATE tblProductNew SET ProductName = '$ProductName', Nickname = '$Nickname', Timer = '$Timer', ISBN = '$ISBN', UPC = '$UPC', 
Description = '$Description', SubProductID1 = '$SubProductID1', SubProductID2 = '$SubProductID2', SubProductID3 = '$SubProductID3', 
Cost = '$Cost', RetailPrice = '$RetailPrice', OnlinePrice = '$OnlinePrice', OnHand = '$OnHand', Demo = '$Demo', Damaged = '$Damaged', ReturnToMan = '$ReturnToMan', 
Warehouse = '$Warehouse', WebInventory = '$WebInventory', ReOrderPoint = '$ReOrderPoint', ImageID = '$ImageID', CategoryID = '$CategoryID', 
Retail = '$Retail', Weight = '$Weight', FreeShipping = '$FreeShipping', Ship = '$Ship', BuiltInShipCost = '$BuiltInShipCost', 
USPS = '$USPS', DHL = '$DHL', Split = '$Split', Stamp = '$Stamp', Priority = '$Priority', Preorder = '$Preorder', PreorderPrice = '$PreorderPrice', Color = '$Color', Status = '$Status', Notes = '$Notes' WHERE ProductID = '$ProductID'"; 


$result = mysql_query($sql) or die("Cannot update table"); 

	$goto = "ProductView.php";
	header("location: $goto");


}


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";



#Code for Filling out the table

$sql2 = "SELECT * FROM tblProductNew WHERE ProductID = '$ProductID'";
$result2 = mysql_query($sql2) or die("Cannot populate table");

while($row2 = mysql_fetch_array($result2))
{
$ProductName = $row2[ProductName];
$Nickname = $row2[Nickname];
$Timer = $row2[Timer];
$ISBN = $row2[ISBN];
$UPC = $row2[UPC];
$Description = $row2[Description];
$SubProductID1 = $row2[SubProductID1];
$SubProductID2 = $row2[SubProductID2];
$SubProductID3 = $row2[SubProductID3];
$Cost = $row2[Cost];
$RetailPrice = $row2[RetailPrice];
$OnlinePrice = $row2[OnlinePrice];
$OnHand = $row2[OnHand];
$Demo = $row2[Demo];
$Damaged = $row2[Damaged];
$ReturnToMan = $row2[ReturnToMan];
$Warehouse = $row2[Warehouse];
$WebInventory = $row2[WebInventory];
$ReOrderPoint = $row2[ReOrderPoint];
$ImageID = $row2[ImageID];
$CategoryID = $row2[CategoryID];
$Retail = $row2[Retail];
$Weight = $row2[Weight];
$FreeShipping = $row2[FreeShipping];
$Ship = $row2[Ship];
$BuiltInShipCost = $row2[BuiltInShipCost];
$USPS = $row2[USPS];
$DHL = $row2[DHL];
$Split = $row2[Split];
$Stamp = $row2[Stamp];
$Priority = $row2[Priority];
$Preorder = $row2[Preorder];
$PreorderPrice = $row2[PreorderPrice];
$Color = $row2[Color];
$Status = $row2[Status];
$Notes = $row2[Notes];

}

#Create Table for User Input
?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit <? echo $Nickname; ?></strong></font>
</p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="OrderAdd.php?p=<? echo $ProductID; ?>">Add
      more to inventory</a></font></p>
<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">ProductName</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ProductName" type="text" id="ProductName" value="<? echo $ProductName; ?>" size="30">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Nickname</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Nickname" type="text" id="Nickname" value="<? echo $Nickname; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Timer</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">    <select name="Timer" id="Timer">
      <option value="y"<? if($Timer == "y") { ?> selected<? } ?>>y</option>
      <option value="n"<? if($Timer == "n") { ?> selected<? } ?>>n</option>
    </select>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">ISBN</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ISBN" type="text" id="ISBN" value="<? echo $ISBN; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">UPC</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="UPC" type="text" id="UPC" value="<? echo $UPC; ?>"></font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Description (in html) </font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
<textarea name="Description" cols="40" rows="4" id="Description"><? echo $Description; ?></textarea>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">SubProductID1</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <select name="SubProductID1" class="text" id="SubProductID1">
    <option value = "" selected>Please Select</option>
    <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT ProductID, Nickname
								FROM tblProductNew
			
								ORDER BY Nickname";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
    <option value="<? echo $row[ProductID];?>" <? if($row[ProductID] == $SubProductID1){echo "selected";}?>><? echo $row[Nickname];?></option>
    <?
						}
					?>
  </select>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">SubProductID2</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <select name="SubProductID2" class="text" id="SubProductID2">
    <option value = "" selected>Please Select</option>
    <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT ProductID, Nickname
								FROM tblProductNew
			
								ORDER BY Nickname";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
    <option value="<? echo $row[ProductID];?>" <? if($row[ProductID] == $SubProductID2){echo "selected";}?>><? echo $row[Nickname];?></option>
    <?
						}
					?>
  </select>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">SubProductID3</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <select name="SubProductID3" class="text" id="SubProductID3">
    <option value = "" selected>Please Select</option>
    <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT ProductID, Nickname
								FROM tblProductNew
			
								ORDER BY Nickname";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
    <option value="<? echo $row[ProductID];?>" <? if($row[ProductID] == $SubProductID3){echo "selected";}?>><? echo $row[Nickname];?></option>
    <?
						}
					?>
  </select>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Cost</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">$
    <input name="Cost" type="text" id="Cost" value="<? echo $Cost; ?>" size="10">
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">OnlinePrice</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">$
        <input name="OnlinePrice" type="text" id="OnlinePrice" value="<? echo $OnlinePrice; ?>" size="10">
  </font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">RetailPrice</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">$
    <input name="RetailPrice" type="text" id="RetailPrice" value="<? echo $RetailPrice; ?>" size="10">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">OnHand</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="OnHand" type="text" id="OnHand" value="<? echo $OnHand; ?>" size="10">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Demo</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Demo" type="text" id="Demo" value="<? echo $Demo; ?>" size="10">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Damaged</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Damaged" type="text" id="Damaged" value="<? echo $Damaged; ?>" size="10">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">ReturnToMan</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ReturnToMan" type="text" id="ReturnToMan" value="<? echo $ReturnToMan; ?>" size="10">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Warehouse</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Warehouse" type="text" id="Warehouse" value="<? echo $Warehouse; ?>" size="10">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">WebInventory</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="WebInventory" type="text" id="WebInventory" value="<? echo $WebInventory; ?>" size="10">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">ReOrderPoint</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ReOrderPoint" type="text" id="ReOrderPoint" value="<? echo $ReOrderPoint; ?>" size="10">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">ImageID</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="ImageID" type="text" id="ImageID" value="<? echo $ImageID; ?>" size="5">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">CategoryID</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <select name="CategoryID" class="text" id="CategoryID">
    <option value = "" selected>Please Select</option>
    <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT CategoryID, Name
								FROM tblCategory
								WHERE Status = 'active' AND Type = 'Product'
								ORDER BY Name";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
    <option value="<? echo $row[CategoryID];?>" <? if($row[CategoryID] == $CategoryID){echo "selected";}?>><? echo $row[Name];?></option>
    <?
						}
					?>
  </select>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Retail</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">    <select name="Retail" id="Retail">
      <option value="y"<? if($Retail == "y") { ?> selected<? } ?>>y</option>
      <option value="n"<? if($Retail == "n") { ?> selected<? } ?>>n</option>
    </select>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Weight</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Weight" type="text" id="Weight" value="<? echo $Weight; ?>" size="5">
lbs </font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">FreeShipping</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">    <select name="FreeShipping" id="FreeShipping">
      <option value="y"<? if($FreeShipping == "y") { ?> selected<? } ?>>y</option>
      <option value="n"<? if($FreeShipping == "n") { ?> selected<? } ?>>n</option>
    </select>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Ship</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <select name="Ship" id="Ship">
      <option value="y"<? if($Ship == "y") { ?> selected<? } ?>>y</option>
      <option value="n"<? if($Ship == "n") { ?> selected<? } ?>>n</option>
    </select>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">BuiltInShipCost</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="BuiltInShipCost" type="text" id="BuiltInShipCost" value="<? echo $BuiltInShipCost; ?>" size="5" maxlength="2">
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">USPS</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">    <select name="USPS" id="USPS">
      <option value="y"<? if($USPS == "y") { ?> selected<? } ?>>y</option>
      <option value="n"<? if($USPS == "n") { ?> selected<? } ?>>n</option>
    </select>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">DHL</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">    <select name="DHL" id="DHL">
      <option value="y"<? if($DHL == "y") { ?> selected<? } ?>>y</option>
      <option value="n"<? if($DHL == "n") { ?> selected<? } ?>>n</option>
    </select>
</font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Split (ignore)</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">    <select name="Split" id="Split">
      <option value="y"<? if($Split == "y") { ?> selected<? } ?>>y</option>
      <option value="n"<? if($Split == "n") { ?> selected<? } ?>>n</option>
    </select>
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Stamp</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <select name="Stamp" id="Stamp">
      <option value="y"<? if($Stamp == "y") { ?> selected<? } ?>>y</option>
      <option value="n"<? if($Stamp == "n") { ?> selected<? } ?>>n</option>
    </select>
  </font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Priority</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Priority" type="text" id="Priority" value="<? echo $Priority; ?>" size="5">
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Preorder?</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <select name="Preorder" id="Preorder">
      <option value="y"<? if($Preorder == "y") { ?> selected<? } ?>>y</option>
      <option value="n"<? if($Preorder == "n") { ?> selected<? } ?>>n</option>
    </select>
  </font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Preorder Price</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">$
    <input name="PreorderPrice" type="text" id="PreorderPrice" value="<? echo $PreorderPrice; ?>" size="10" />
  </font></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Color</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Color" type="text" id="Color" value="<? echo $Color; ?>" size="10">
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
  <td><textarea name="Notes" id="Notes" cols="45" rows="3"><? echo $Notes; ?></textarea></td>
</tr>
<tr>
<td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">    <select name="Status" id="select7">
      <option value="active"<? if($Status == "active") { ?> selected<? } ?>>active</option>
      <option value="inactive"<? if($Status == "inactive") { ?> selected<? } ?>>inactive</option>
    </select>
</font></td>
</tr>
</table>
<p>
<input name="Update" type="submit" id="Update" value="Update">
</p>
</form>

<?
mysql_close($link);
?>




<?	
 // -------------- END MY CODE -------------------

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// has links that show up at the bottom in it
require "../include/footerlinks.php";



// finishes security for page
}
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>