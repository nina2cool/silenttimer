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

$ProductID = $_GET['p'];

$userName = $_SESSION['userName'];

// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

$sql = "SELECT * FROM tblEmployee WHERE UserName = '$userName'";
$result = mysql_query($sql) or die("Cannot execute query!");

	while($row = mysql_fetch_array($result))
	{
		$EmployeeID = $row[EmployeeID];
	}

#Code for Adding to Table

#Double check the table names and spaces and commas in the code. Delete primary key IDs. 



$Now = date("Y-m-d");

If ($_POST['Add'] == "Add")
{
		$ProductID = $_POST['ProductID'];
		$Date = $_POST['Date'];
		$Quantity = $_POST['Quantity'];
		$FromHere = $_POST['FromHere'];
		$ToThere = $_POST['ToThere'];
		$Reason = $_POST['Reason'];
		$RMANumber = $_POST['RMANumber'];
		$ShipperID = $_POST['ShipperID'];
		$DateShipped = $_POST['DateShipped'];
		$TrackingNumber = $_POST['TrackingNumber'];
		$Status = $_POST['Status'];
		
		$sql = "INSERT INTO tblProductOrder(ProductID, Date, Quantity, FromHere, ToThere, Reason, EmployeeID, Type, Status, RMANumber, ShipperID, DateShipped, TrackingNumber) 
		VALUES('$ProductID', '$Date', '$Quantity', '$FromHere', '$ToThere', '$Reason', '$EmployeeID', 'in', '$Status', '$RMANumber', '$ShipperID', '$DateShipped', '$TrackingNumber');"; 
		
		$result = mysql_query($sql) or die("Cannot insert into tblProductOrder");
		
		if($FromHere == "OnHand")
		{
			$sql2 = "UPDATE tblProductNew
			SET OnHand = OnHand - '$Quantity',
			WebInventory = WebInventory - '$Quantity'
			WHERE ProductID = '$ProductID'";
			
			$result2 = mysql_query($sql2) or die("cannot update table product new");		
		}
		elseif($FromHere == "Demo")
		{
			$sql2 = "UPDATE tblProductNew
			SET Demo = Demo - '$Quantity',
			WebInventory = WebInventory - '$Quantity'
			WHERE ProductID = '$ProductID'";
			
			$result2 = mysql_query($sql2) or die("cannot update table product new");				
		}
		elseif($FromHere == "Damaged")
		{
			$sql2 = "UPDATE tblProductNew
			SET Damaged = Damaged - '$Quantity',
			WebInventory = WebInventory - '$Quantity'
			WHERE ProductID = '$ProductID'";
			
			$result2 = mysql_query($sql2) or die("cannot update table product new");				
		}
		elseif($FromHere == "ReturnToMan")
		{
			$sql2 = "UPDATE tblProductNew
			SET ReturnToMan = ReturnToMan - '$Quantity',
			WebInventory = WebInventory - '$Quantity'
			WHERE ProductID = '$ProductID'";
			
			$result2 = mysql_query($sql2) or die("cannot update table product new");				
		}
		elseif($FromHere == "Warehouse")
		{
			$sql2 = "UPDATE tblProductNew
			SET Warehouse = Warehouse - '$Quantity',
			WebInventory = WebInventory - '$Quantity'
			WHERE ProductID = '$ProductID'";
			
			$result2 = mysql_query($sql2) or die("cannot update table product new");				
		}
		elseif($FromHere == "China")
		{
		
		}
		elseif($FromHere == "New")
		{
		
		}
		elseif($FromHere == "ReturnCust")
		{
		
		}
		elseif($FromHere == "ReturnDist")
		{
		
		}						
		else
		{
		
		}
		
		
		if($ToThere == "OnHand")
		{
			$sql2 = "UPDATE tblProductNew
			SET OnHand = OnHand + '$Quantity',
			WebInventory = WebInventory + '$Quantity'
			WHERE ProductID = '$ProductID'";
			
			$result2 = mysql_query($sql2) or die("cannot update table product new");		
		}
		elseif($ToThere == "Demo")
		{
			$sql2 = "UPDATE tblProductNew
			SET Demo = Demo + '$Quantity',
			WebInventory = WebInventory + '$Quantity'
			WHERE ProductID = '$ProductID'";
			
			$result2 = mysql_query($sql2) or die("cannot update table product new");				
		}
		elseif($ToThere == "Damaged")
		{
			$sql2 = "UPDATE tblProductNew
			SET Damaged = Damaged + '$Quantity',
			WebInventory = WebInventory + '$Quantity'
			WHERE ProductID = '$ProductID'";
			
			$result2 = mysql_query($sql2) or die("cannot update table product new");				
		}
		elseif($ToThere == "ReturnToMan")
		{
			$sql2 = "UPDATE tblProductNew
			SET ReturnToMan = ReturnToMan + '$Quantity',
			WebInventory = WebInventory + '$Quantity'
			WHERE ProductID = '$ProductID'";
			
			$result2 = mysql_query($sql2) or die("cannot update table product new");				
		}
		elseif($ToThere == "Warehouse")
		{
			$sql2 = "UPDATE tblProductNew
			SET Warehouse = Warehouse + '$Quantity',
			WebInventory = WebInventory + '$Quantity'
			WHERE ProductID = '$ProductID'";
			
			$result2 = mysql_query($sql2) or die("cannot update table product new");				
		}
		elseif($ToThere == "China")
		{
		
		}
		elseif($ToThere == "Sold")
		{

		}
		elseif($ToThere == "ReturnToStore")
		{
	
		}
		elseif($ToThere == "Trash Can")
		{

		}
		else
		{
		
		}
		


}

#Create Table for User Input
?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Update
Product Quantities</strong></font></p>
<p><a href="Inventory.xls" target="_blank"><font size="2" face="Arial, Helvetica, sans-serif"><strong>&lt;
        Print New Forms &gt; </strong></font></a></p>
<form name="form1" method="post" action="">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">ProductID</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif">
  <select name="ProductID" class="text" id="ProductID">
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
    <option value="<? echo $row[ProductID];?>" <? if($row[ProductID] == $ProductID){echo "selected";}?>><? echo $row[Nickname];?></option>
    <?
						}
					?>
  </select>
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Date</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Date" type="text" id="Date" value="<? echo $Now; ?>"></font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Quantity</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Quantity" type="text" id="Quantity" size="10">
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">From Here </font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <select name="FromHere" id="FromHere">
      <option>select one</option>
      <option value="New">a.  New Purchase</option>
      <option value="ReturnCust">b.  Returned from customer</option>
      <option value="ReturnDist">c.  Returned from bookstore/dist</option>
      <option value="OnHand">d.  On Hand</option>
      <option value="Demo">e.  Demo</option>
      <option value="Damaged">f.  Damaged/Throw Away</option>
      <option value="ReturnToMan">g.  Return to Manufacturer</option>
      <option value="Warehouse">h.  Warehouse</option>
      <option value="China">i.  China</option>
    </select>
  </font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">To There </font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
    <select name="ToThere" id="ToThere">
      <option>select one</option>
      <option value="OnHand">a.  On Hand</option>
      <option value="Demo">b.  Demo</option>
      <option value="Damaged">c.  Damaged/Throw Away</option>
      <option value="ReturnToMan">d.  Return to Manufacturer</option>
      <option value="Warehouse">e.  Warehouse</option>
      <option value="China">f.  China</option>
      <option value="Sold">g.  Sold</option>
      <option value="ReturnToStore">h.  Returned to store</option>
      <option value="Trash Can">i.  Trash can</option>
        </select>
  </font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Reason</font></td>
  <td><font size="2" face="Arial, Helvetica, sans-serif">
  	<select name="Reason" id="Reason">
      <option>select one</option>
      <option value="returned by cust - broken">a.  returned by cust - broken</option>
      <option value="returned by dist - damaged">b.  returned by distributor/bookstore - damaged</option>
      <option value="returned by cust - not wanted">c.  returned by cust - don't want</option>
      <option value="returned by dist - overage">d.  returned by distributor/bookstore - overage</option>
      <option value="need as demo">e.  need as demo</option>
      <option value="return to China">f.  return to China</option>
      <option value="throw away">g.  throw away</option>
      <option value="broken before sent">h.  broken before sent</option>
      <option value="sold">i.  sold</option>
      <option value="returned by retail cust - broken">j.  returned by retail cust - broken</option>
      <option value="returned by retail cust - not wanted">k.  returned by retail customer - don't want</option>
      <option value="new purchase">l.  new purchase</option>
      <option value="fix previous entry">m.  fix previous entry</option>
        </select>
</font></td>
</tr>
<tr>
  <td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
<td><font size="2" face="Arial, Helvetica, sans-serif"><input name="Status" type="text" id="Status" value="active" size="10"></font></td>
</tr>
</table>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">if returning to China:</font></strong></p>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">RMA Number</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="RMANumber" type="text" id="RMANumber" size="20">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Shipper</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <select name="ShipperID" class="text" id="ShipperID">
        <option value = "" selected>Please Select</option>
        <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT ShipperID, CompanyName
								FROM tblShipper
								ORDER BY CompanyName";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
        <option value="<? echo $row[ShipperID];?>" <? if($row[ShipperID] == $ShipperID){echo "selected";}?>><? echo $row[CompanyName];?></option>
        <?
						}
					?>
      </select>
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">DateShipped</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="DateShipped" type="text" id="DateShipped" value="<? echo $Now; ?>">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">TrackingNumber</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="TrackingNumber" type="text" id="TrackingNumber" size="20">
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