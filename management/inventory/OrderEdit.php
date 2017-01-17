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

$OrderID = $_GET['order'];

#Code for Updating to Table

#Add the WHERE clause in the sql statement, double check the table names. Delete primary key IDs. 

// build connection to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

$Now = date("Y-m-d");

If ($_POST['Update'] == "Update")
{
	
		$ProductID = $_POST['ProductID'];
		$Date = $_POST['Date'];
		$Reason = $_POST['Reason'];
		$RMANumber = $_POST['RMANumber'];
		$ShipperID = $_POST['ShipperID'];
		$DateShipped = $_POST['DateShipped'];
		$TrackingNumber = $_POST['TrackingNumber'];
		$Status = $_POST['Status'];
		$Update = $_POST['Update'];
		
		
		$sql = "UPDATE tblProductOrder
		SET ProductID = '$ProductID',
		Date = '$Date',
		Reason = '$Reason',
		Status = '$Status',
		RMANumber = '$RMANumber',
		ShipperID = '$ShipperID',
		DateShipped = '$DateShipped',
		TrackingNumber = '$TrackingNumber'
		WHERE OrderID = '$OrderID'";
			
		$result = mysql_query($sql) or die("Cannot update into tblProductOrder");
		

}

#Code for Filling out the table

$sql2 = "SELECT * FROM tblProductOrder WHERE OrderID = '$OrderID'";
$result2 = mysql_query($sql2) or die("Cannot populate table");

while($row2 = mysql_fetch_array($result2))
{

$ProductID = $row2[ProductID];
$Date = $row2[Date];
$Quantity = $row2[Quantity];
$ShipperID = $row2[ShipperID];
$FromHere = $row2[FromHere];
$ToThere = $row2[ToThere];
$Reason = $row2[Reason];
$TrackingNumber = $row2[TrackingNumber];
$DateShipped = $row2[DateShipped];
$RMANumber = $row2[RMANumber];
$Status = $row2[Status];

}

#Create Table for User Input
?>

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
  Inventory Update</strong></font>
</p>
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
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="Date" type="text" id="Date" value="<? echo $Date; ?>">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Reason</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <select name="Reason" id="Reason">
        <option value="" <? if ($Reason == ''){echo 'selected';}?>>select one</option>
        <option value="returned by cust - broken" <? if ($Reason == 'returned by cust - broken'){echo 'selected';}?>>returned by cust - broken</option>
        <option value="returned by dist - damaged" <? if ($Reason == 'returned by dist - damaged'){echo 'selected';}?>>returned by distributor/bookstore
        - damaged</option>
        <option value="returned by cust - not wanted" <? if ($Reason == 'returned by cust - not wanted'){echo 'selected';}?>>returned by cust - don't
        want</option>
        <option value="returned by dist - overage" <? if ($Reason == 'returned by dist - overage'){echo 'selected';}?>>returned by distributor/bookstore
        - overage</option>
        <option value="need as demo" <? if ($Reason == 'need as demo'){echo 'selected';}?>>need as demo</option>
        <option value="return to China" <? if ($Reason == 'return to China'){echo 'selected';}?>>return to China</option>
        <option value="throw away" <? if ($Reason == 'throw away'){echo 'selected';}?>>throw away</option>
        <option value="broken before sent" <? if ($Reason == 'broken before sent'){echo 'selected';}?>>broken before sent</option>
        <option value="sold" <? if ($Reason == 'sold'){echo 'selected';}?>>sold</option>
        <option value="returned by retail cust - broken" <? if ($Reason == 'returned by retail cust - broken'){echo 'selected';}?>>returned by retail cust
        - broken</option>
        <option value="returned by retail cust - not wanted" <? if ($Reason == 'returned by retail cust - not wanted'){echo 'selected';}?>>returned by retail
        customer - don't want</option>
        <option value="new purchase" <? if ($Reason == 'new purchase'){echo 'selected';}?>>new purchase</option>
      </select>
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="Status" type="text" id="Status" value="<? echo $Status; ?>" size="10">
    </font></td>
  </tr>
</table>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">if returning to
  China:</font></strong></p>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">RMA Number</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="RMANumber" type="text" id="RMANumber" value="<? echo $RMANumber; ?>" size="20">
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
      <input name="DateShipped" type="text" id="DateShipped" value="<? echo $DateShipped; ?>">
    </font></td>
  </tr>
  <tr>
    <td><font size="2" face="Arial, Helvetica, sans-serif">TrackingNumber</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif">
      <input name="TrackingNumber" type="text" id="TrackingNumber" value="<? echo $TrackingNumber; ?>" size="20">
    </font></td>
  </tr>
</table>
<p> </p>
<p>
  <input name="Update" type="submit" id="Update" value="Update">
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