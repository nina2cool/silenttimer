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

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?	

	//grab variables to get purchase info and customer info from DB.
	$SupplyOrderID = $_GET['so'];

	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$now = date("Y-m-d H:i:s");
	$CompanyRepID = $_SESSION['repID'];
	
?>

<?  // -------- code to save values from form into tables, etc....

	if ($_POST['Submit'] == "Edit Order")
	{
		$Product = $_POST['cboProduct'];
		$NumOrdered = $_POST['txtNumOrdered'];
		$CostPer = $_POST['txtTimerCost'];
		$ShipperID = $_POST['cboShipper'];
		$ShipPref = $_POST['cboShipPref'];
		$NeedBy = $_POST['txtNeedDate'];
		$Notes = $_POST['txtNotes'];
		$chkCancel = $_POST['chkCancel'];

		$sql = "UPDATE tblSupplyOrder
				SET ProductID = $Product, NumOrdered = $NumOrdered, CostPer = $CostPer, ShipperID = $ShipperID, ShippingPref = '$ShipPref', NeedBy = '$NeedBy', Notes = '$Notes', 
				DateModified = '$now', CompanyRepID = $CompanyRepID
				WHERE SupplyOrderID = $SupplyOrderID";
		mysql_query($sql) or die("Cannot update tblSupply Order");
		
		if ($chkCancel == "cancel")
		{
			$sql = "UPDATE tblSupplyOrder
					SET Status = 'cancel'
					WHERE SupplyOrderID = $SupplyOrderID";
			mysql_query($sql) or die("Cannot update to cancelled");
			
			echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
			
			mail("info@silenttimer.com", "Supply Order Created", "$now\n\nSupplyOrder # $SupplyOrderID has been canceled.", "From:Timer System");
			mail("david@proace.com", "New Timer Supply Order", "David, \n\nSupplyOrder # $SupplyOrderID has been canceled.\n\n\nSilent Technology\n\n\nhttp://www.SilentTimer.com", "From: Silent Technology<info@silenttimer.com>");
	
		}
	}
?>


<? // ---- code to fill page with information....	
	$sql = "SELECT DATE_FORMAT(so.DateTime, '%m/%d/%y %H:%i') AS DateTime, so.ProductID, so.NumOrdered, so.CostPer, so.ShipperID, so.ShippingPref, 
			DATE_FORMAT(so.NeedBy, '%Y-%m-%d') AS NeedBy, cr.FirstName, cr.LastName, so.Notes, DATE_FORMAT(so.DateModified, '%m/%d/%y %H:%i') AS DateModified
			FROM tblSupplyOrder so INNER JOIN tblCompanyRep cr ON so.CompanyRepID = cr.CompanyRepID
			WHERE so.SupplyOrderID = $SupplyOrderID";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$DateTime = $row[DateTime];
		$ProductID = $row[ProductID];
		$NumOrdered = $row[NumOrdered];
		$CostPer = $row[CostPer];
		$ShipperID = $row[ShipperID];
		$ShippingPref = $row[ShippingPref];
		$NeedBy = $row[NeedBy];
		$CompanyRepName = "$row[FirstName] $row[LastName]";
		$Notes = $row[Notes];
		$DateModified = $row[DateModified];
	}
	
	
?>
<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Edit Supply Order 
</strong></font> 
<form action="" method="post" name="frmSupply" id="frmSupply">
  <table width="100%" border="0" cellspacing="0" cellpadding="8">
    <tr> 
      <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="50%" align="left" valign="top"><strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">&gt; 
              Order Info</font></strong><font face="Arial, Helvetica, sans-serif"><strong><font color="#333333" size="3"> 
              <br>
              </font></strong></font></td>
            <td width="50%"><div align="right">
                <p><font face="Arial, Helvetica, sans-serif"><strong><font face="Arial, Helvetica, sans-serif"><font color="#333333" size="3">Initially created on<strong> <? echo $DateTime; ?><br>
                  </strong></font></font></strong></font></p>
                <? if($DateModified != "00/00/00 00:00"){?><p><strong><font color="#333333" size="3" face="Arial, Helvetica, sans-serif">Last Modified: <? echo $DateModified;?><br>
                  </font></strong><? }?>
				  <font face="Arial, Helvetica, sans-serif"><strong><font color="#333333" size="3" face="Arial, Helvetica, sans-serif">Rep:<strong> <? echo $CompanyRepName;?> </strong></font></strong></font></p>
                </div></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td align="left" valign="top"> <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
          <tr> 
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                  <td width="50%" align="left" valign="top"><font face="Arial, Helvetica, sans-serif"><strong><font color="#333333" size="3">Product 
                    Name <br>
                    <select name="cboProduct" id="cboProduct">
                      		<?    
								// build combo box for products in DB
								$sql = "SELECT * FROM tblProduct";
								//put SQL statement into result set for loop through records
								$result = mysql_query($sql) or die("Can't get products for listbox");
								while($row = mysql_fetch_array($result))
								{
						  	?>
                      			<option value="<? echo $row[ProductID];?>"<? if($row[ProductID] == "1"){echo "selected";}?>><? echo $row[ProductName];?></option>
                      		<?
							 	}
							?>
                    </select>
                    </font></strong></font></td>
                  <td width="50%" align="right" valign="top"> 
                    <div align="right">
                      <p>&nbsp;</p>
                      </div></td>
                </tr>
              </table>
              <br> 
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                  <td width="50%" align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Number Ordered<br>
                    <input name="txtNumOrdered" type="text" id="txtNumOrdered3" value="<? echo $NumOrdered;?>" size="10">
                    </strong></font><font face="Arial, Helvetica, sans-serif"><strong></strong></font></td>
                  <td width="50%" align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Cost 
                    Per Product Request<br>
                    <input name="txtTimerCost" type="text" id="txtTimerCost2" value="<? echo $CostPer;?>" size="10">
                    </strong></font></td>
                </tr>
              </table>
              <br>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr align="left" valign="top"> 
                  <td width="50%" height="39"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping 
                    Company<br>
                    <select name="cboShipper" id="cboShipper">
							<option value="X" selected>Select</option>
                      		<?    
								// build combo box for he shipping options from the database.
								// SQL to get data from shippingoption and shipper table
								$sql = "SELECT * FROM tblShipper";
								//put SQL statement into result set for loop through records
								$result = mysql_query($sql) or die("Cannot execute query!");
								
								while($row = mysql_fetch_array($result))
								{
									$thisshipperID = $row[ShipperID];
						  	?>
                      			<option value="<? echo $thisshipperID;?>" <? if($thisshipperID == $ShipperID){echo "selected";}?>><? echo $row[CompanyName]; ?></option>
                      		<?
							 	}
							?>
                    </select>
                    </strong></font></td>
                  <td width="50%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Shipping 
                    Preference</font></strong><br> 
                    <select name="cboShipPref" id="cboShipPref">
                      <option value="sea" <? if($ShippingPref == "sea"){echo "selected";}?>>Sea</option>
                      <option value="air" <? if($ShippingPref == "air"){echo "selected";}?>>Air</option>
                    </select></td>
                </tr>
              </table>
              <br>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr align="left" valign="top"> 
                  <td width="50%" height="39"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000">Total 
                    Cost</font> (for your reference)<br>
                    <input name="txtTotalCost2" type="text" id="txtTotalCost22" value="<? echo $CostPer*$NumOrdered; ?>" size="10">
                    </strong></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                  <td width="50%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Need 
                    Product by</font><font size="2" face="Arial, Helvetica, sans-serif"></font></strong><br>
                    <SCRIPT LANGUAGE="JavaScript">
						var now = new Date();
						var calendar = new CalendarPopup("calendarDiv");
			  		</SCRIPT>
					<a name="calendarPosition" id="calendarPosition"> </a>
					<input name="txtNeedDate" type="text" id="txtNeedDate" size="15" value="<? echo $NeedBy; ?>">
                    <font size="2" face="Arial, Helvetica, sans-serif"><A HREF="#" onClick="calendar.select(document.forms[0].txtNeedDate,'calendarPosition','yyyy-MM-dd'); return false;">PopUp</A></font></td>
                </tr>
              </table>
              
            </td>
          </tr>
        </table>
        <br> 
        <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
          <tr> 
            <td align="left" valign="top"><p><font color="#333333" size="3" face="Arial, Helvetica, sans-serif"><strong>&gt;&gt; 
                Purchase Notes</strong></font></p>
              <p><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">If 
                there are any special order notes, add them here.</font></strong></p>
              <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr> 
                  <td width="33%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Notes<br>
                    <textarea name="txtNotes" cols="75" rows="5" id="txtNotes"><? echo $Notes;?></textarea>
                    </font></strong></td>
                </tr>
              </table>
              
            </td>
          </tr>
        </table>
        <p align="left">
          <input name="chkCancel" type="checkbox" id="chkCancel" value="cancel">
          <strong><font size="2" face="Arial, Helvetica, sans-serif">Cancel Order? 
          If you choose to cancel, add notes above for your reason.</font></strong></p>
        <p align="left">&nbsp;</p>
        <p align="left"> 
          <input type="submit" name="Submit" value="Edit Order">
          &nbsp;&nbsp; 
          <input type="reset" name="Submit2" value="Reset">
        </p>
        </td>
    </tr>
  </table>
</form>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>