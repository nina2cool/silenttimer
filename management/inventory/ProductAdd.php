<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

//require "include/sidemenu.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


#Double check the table names and spaces and commas in the code. Delete primary key IDs. 

// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

$Now = date("Y-m-d");

If ($_POST['Add'] == "Add")
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
$OnlinePriace = $_POST['OnlinePrice'];
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
$Priority = $_POST['Priority'];
$Color = $_POST['Color'];
$Status = $_POST['Status'];
$Notes = $_POST['Notes'];

$sql = "INSERT INTO tblProductNew(ProductName, Nickname, Timer, ISBN, UPC, Description, SubProductID1, SubProductID2, SubProductID3, 
Cost, OnlinePrice, RetailPrice, OnHand, Demo, Damaged, ReturnToMan, Warehouse, WebInventory, ReOrderPoint, ImageID, CategoryID, Retail, Weight, 
FreeShipping, Ship, BuiltInShipCost, USPS, DHL, Split, Priority, Color, Status, Notes) 
VALUES('$ProductName', '$Nickname', '$Timer', '$ISBN', '$UPC', '$Description', '$SubProductID1', '$SubProductID2', 
'$SubProductID3', '$Cost', '$OnlinePrice', '$RetailPrice', '$OnHand', '$Demo', '$Damaged', '$ReturnToMan', '$Warehouse', '$WebInventory', '$ReOrderPoint', 
'$ImageID', '$CategoryID', '$Retail', '$Weight', '$FreeShipping', '$Ship', '$BuiltInShipCost', '$USPS', '$DHL', '$Split', '$Priority', 
'$Color', '$Status', '$Notes');"; 

$result = mysql_query($sql) or die("Cannot insert into table"); 

}

#Create Table for User Input
?>
<body bgcolor="#FFFFFF">
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
a new Product </strong></font>
<form name="form1" method="post" action="">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">ProductName</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ProductName" type="text" id="ProductName" size="30">
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Nickname</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Nickname" type="text" id="Nickname">
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Timer</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Timer" id="Timer">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">ISBN</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ISBN" type="text" id="ISBN">
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">UPC</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="UPC" type="text" id="UPC">
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Description (in html) </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="Description" cols="40" rows="4" id="Description"></textarea>
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
        <input name="Cost" type="text" id="Cost" size="10">
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">OnlinePrice</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$
        <input name="OnlinePrice" type="text" id="OnlinePrice" size="10">
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">RetailPrice</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">$
        <input name="RetailPrice" type="text" id="RetailPrice" size="10">
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">OnHand</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="OnHand" type="text" id="OnHand" size="10">
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Demo</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Demo" type="text" id="Demo" size="10">
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Damaged</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Damaged" type="text" id="Damaged" size="10">
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">ReturnToMan</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ReturnToMan" type="text" id="ReturnToMan" size="10">
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Warehouse</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Warehouse" type="text" id="Warehouse" size="10">
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">WebInventory</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="WebInventory" type="text" id="WebInventory" size="10">
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">ReOrderPoint</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ReOrderPoint" type="text" id="ReOrderPoint" size="10">
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">ImageID</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="ImageID" type="text" id="ImageID" size="5">
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
          <option value="<? echo $row[CategoryID];?>" <? if($row[CategoryID] == $Category){echo "selected";}?>><? echo $row[Name];?></option>
          <?
						}
					?>
        </select>
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Retail</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Retail" id="Retail">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Weight</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Weight" type="text" id="Weight" size="10">
        lbs</font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">FreeShipping</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="FreeShipping" id="FreeShipping">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Ship</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Ship" id="Ship">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">BuiltInShipCost</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="BuiltInShipCost" type="text" id="BuiltInShipCost" size="3" maxlength="1">
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">USPS</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="USPS" id="USPS">
          <option value="y" selected>y</option>
          <option value="n">n</option>
        </select>
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">DHL</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="DHL" id="DHL">
          <option value="y" selected>y</option>
          <option value="n">n</option>
        </select>
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Split (ignore)</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Split" id="Split">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Stamp</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Stamp" id="Stamp">
          <option value="y">y</option>
          <option value="n" selected>n</option>
        </select>
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Priority</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Priority" type="text" id="Priority" size="5">
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Color</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Color" type="text" id="Color" value="000000" size="10">
        </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
      <td><textarea name="Notes" id="Notes" cols="45" rows="3"></textarea></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Status" id="Status">
          <option value="active">active</option>
          <option value="inactive" selected>inactive</option>
        </select>
        </font></td>
    </tr>
  </table>
  <p>
    <input name="Add" type="submit" id="Add" value="Add">
  </p>
</form>
<?
mysql_close($link);
?>
<?


// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";
// has links that show up at the bottom in it - found in home management folder

require "../include/footerlinks.php";



// finishes security for page
}
else
{
?>
</font>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<font face="Arial">
<?
}
?>
</font>
