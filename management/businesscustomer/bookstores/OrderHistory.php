<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{


// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	//grab variables to get purchase info from DB.
	$nacsID = $_GET['nacs'];
	$BusinessCustomerID = $_GET['bc'];
	
	$Now = date("Y-m-d H:i:s");

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	
		$sql3 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
		$result3 = mysql_query($sql3) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result3))
		{
			$CustomerID = $row[CustomerID];
			$Chain = $row[Chain];
			$Name = $row[Name];
			$IncNumber = $row[IncNumber];
			$BNCBNumber = $row[BNCBNumber];
			$ContactFirstName = $row[ContactFirstName];
			$ContactLastName = $row[ContactLastName];
			$ContactPosition = $row[ContactPosition];
			$ContactEmail = $row[ContactEmail];
			$ContactFirstName2 = $row[ContactFirstName2];
			$ContactLastName2 = $row[ContactLastName2];
			$ContactPosition2 = $row[ContactPosition2];
			$ContactEmail2 = $row[ContactEmail2];
			$StoreDirector = $row[StoreDirector];	
			$StoreManager = $row[StoreManager];	
			$StoreTradeSupervisor = $row[StoreTradeSupervisor];	
			$Notes = $row[Notes];	
			$Status = $row[Status];	
			$Address = $row[Address];
			$Address2 = $row[Address2];
			$Address3 = $row[Address3];
			$City = $row[City];
			$State = $row[State];
			$ZipCode = $row[ZipCode];
			$Country = $row[Country];
			$Phone1 = $row[Phone1];
			$Phone2 = $row[Phone2];
			$Fax1 = $row[Fax1];
			$Fax2 = $row[Fax2];
			$Email1 = $row[Email1];
			$Email2 = $row[Email2];
			$Website = $row[Website];
			$BordersStoreNumber = $row[BordersStoreNumber];
			$FollettStoreNumber = $row[FollettStoreNumber];
			$LSAT = $row[LSAT];
			$SAT = $row[SAT];
			$CallFirst = $row[CallFirst];
			$SpecialOrder = $row[SpecialOrder];
		}
	
		
// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";
		

	if($nacsID == "") { $nacsID = "-"; }


?>
<table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#E2F5E2">
  <tr>
    <td><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><? echo $Name; ?>
      <? if ($Chain <> "") { ?>
      <font size="3"><br><? echo $Chain; ?></font>
      <? } ?>
    </strong></font></td>
    <td><div align="right">
      <p>&nbsp;</p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; <a href="BookstoreEdit.php?bc=<? echo $BusinessCustomerID; ?>">Back
        to Customer Info </a></strong></font></p>
    </div></td>
  </tr>
</table>
<br>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr valign="top">
    <td width="50%"><strong><font size="3" face="Arial, Helvetica, sans-serif">NACSCORP ID: <font color="#FF0000"><? echo $nacsID; ?></font> </font></strong></td>
    <td><strong><font size="3" face="Arial, Helvetica, sans-serif">Customer ID: <font color="#FF0000"><? echo $CustomerID; ?></font> </font></strong></td>
  </tr>
  <tr valign="top">
    <td width="50%"><table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr bgcolor="#FFFFCC">
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Ship
                Date </strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> ISBN</strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Qty</strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Report
                Date </strong></font></div></td>
      </tr>
      <?
	
	if($nacsID <> "-") {
	
//		$sql2 = "SELECT DATE_FORMAT(ShipDate, '%m/%d/%y') AS ShipDate, ISBN, Qty, DATE_FORMAT(ReportDate, '%m/%d/%y') as ReportDate FROM tblNACSCORP WHERE Store = '$nacsID' ORDER BY ShipDate DESC";
		$sql2 = "SELECT * FROM tblNACSCORP WHERE Store = '$nacsID' ORDER BY ShipDate DESC";
		$result2 = mysql_query($sql2) or die("Cannot execute query BusinessCustomerID!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$ShipDate = $row2[ShipDate];
			$ISBN = $row2[ISBN];
			$Quantity = $row2[Qty];
			$ReportDate = $row2[ReportDate];
			
				//$ShipDate = date("%m %d, %Y", "$ShipDate");
			
	?>
      <? /* <tr<? if($ISBN == "0-9753503-0-7") { ?>
  bgcolor="#D5D8FD"
  <? } elseif ($ISBN == "0-9753503-1-5") { ?>
  bgcolor="#FFCACA"
  <? } else { ?>
  <? } ?>
>
  <? */ ?>
  <tr>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ShipDate; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ISBN; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Quantity; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ReportDate; ?></font></div></td>
  </tr>
  <?
	}
	}
	?>
    </table></td>
    <td><table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr bgcolor="#FFCCFF">
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Ship
                Date </strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> ISBN</strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Qty</strong></font></div></td>
        <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Unit
          Price </strong></font></div></td>
        </tr>
      <?
	  
	  if($CustomerID <> "0") { 
	
//		$sql2 = "SELECT DATE_FORMAT(ShipDate, '%m/%d/%y') AS ShipDate, ISBN, Qty, DATE_FORMAT(ReportDate, '%m/%d/%y') as ReportDate FROM tblNACSCORP WHERE Store = '$nacsID' ORDER BY ShipDate DESC";
		$sql2 = "SELECT tblPurchaseDetails2.Quantity, tblPurchaseDetails2.ProductID, tblShipment3.DateTime, tblProductNew.ISBN,
		tblPurchaseDetails2.PurchasePrice, tblPurchase2.PurchaseID
		FROM tblCustomer
		INNER JOIN tblPurchase2
		ON tblCustomer.CustomerID = tblPurchase2.CustomerID
		INNER JOIN tblPurchaseDetails2
		ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
		INNER JOIN tblShipment3
		ON tblPurchase2.PurchaseID = tblShipment3.PurchaseID
		INNER JOIN tblProductNew
		ON tblPurchaseDetails2.ProductID = tblProductNew.ProductID
		WHERE tblCustomer.CustomerID = '$CustomerID' AND tblPurchase2.Status <> 'cancel' AND tblPurchaseDetails2.Status <> 'cancel'
		GROUP BY tblPurchaseDetails2.DetailID
		ORDER BY tblShipment3.DateTime DESC";
		//echo $sql2;
		$result2 = mysql_query($sql2) or die("Cannot execute query BusinessCustomerID!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$ShipDate = $row2[DateTime];
			$ISBN = $row2[ISBN];
			$Quantity = $row2[Quantity];
			$Price = $row2[PurchasePrice];
			$PurchaseID = $row2[PurchaseID];
			
				//$ShipDate = date("%m %d, %Y", "$ShipDate");
			
	?>
      <? /* <tr<? if($ISBN == "0-9753503-0-7") { ?>
  bgcolor="#D5D8FD"
  <? } elseif ($ISBN == "0-9753503-1-5") { ?>
  bgcolor="#FFCACA"
  <? } else { ?>
  <? } ?>
>
  <? */ ?>
  <tr>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../../customers/PurchaseDetails.php?purch=<? echo $PurchaseID; ?>&cust=<? echo $CustomerID; ?>" target="_blank">=&gt;</a> </font></strong><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ShipDate; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $ISBN; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Quantity; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$ <?php echo number_format($Price,2); ?></font></div></td>
    </tr>
  <?
	}
	}
	?>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.
require "../../include/footerlinks.php";


// finishes security for page
}
else
{
?>

<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>