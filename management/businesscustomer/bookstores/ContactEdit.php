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
	$BusinessCustomerID = $_GET['bc'];
	$NoteID = $_GET['note'];
	
	
	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

		
	
		$sql3 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
		$result3 = mysql_query($sql3) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result3))
		{
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
	

		
		$sql4 = "SELECT * FROM tblNotes WHERE NoteID = '$NoteID'";
		$result4 = mysql_query($sql4) or die("Cannot execute query customerID!");
		
		while($row4 = mysql_fetch_array($result4))
		{
			$DateTime = $row4[DateTime];
			$Note = $row4[Note];
			$Status = $row4[Status];
		}
		
		
		#<Add button being pushed>
	if ($_POST['Save'] == "Save")
	{
		// Customer Table
		$Note = $_POST['Note'];
		$DateTime = $_POST['DateTime'];
		$Status = $_POST['Status'];
		
		$sql3 = "UPDATE tblNotes
		SET Note = '$Note',
		DateTime = '$DateTime',
		Status = '$Status'
		WHERE NoteID = '$NoteID'";
		
		mysql_query($sql3) or die("Cannot update customer information");
		
		$goto = "ContactHistory.php?bc=$BusinessCustomerID";
		header("location: $goto");

	}

		
// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";
		

?>
<table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#E2F5E2">
  <tr>
    <td><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><? echo $Name; ?>
          <? if ($Chain <> "") { ?>
(<? echo $Chain; ?>)
<? } ?>
    </strong></font></td>
    <td><div align="right">
      <p><font size="2" face="Arial, Helvetica, sans-serif">      </font><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; <a href="ContactHistory.php?bc=<? echo $BusinessCustomerID; ?>">View
        All Contact History<br>
      </a></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; <a href="BookstoreEdit.php?bc=<? echo $BusinessCustomerID; ?>">Back
        to Customer Info </a></strong></font></p>
      </div></td>
  </tr>
</table>
<br>
<form name="form1" method="post" action="">
  <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">Edit Note: </font></strong>  </p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Date and Time </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="DateTime" type="text" id="DateTime" value="<? echo $DateTime; ?>">
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Note</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="Note" cols="60" rows="5" id="Note"><? echo $Note; ?></textarea>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <strong><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="Status" id="select17">
          <option value="active"<? if($Status == "active") { ?> selected<? } ?>>active</option>
          <option value="inactive"<? if($Status == "inactive") { ?> selected<? } ?>>inactive</option>
        </select>
      </font></strong>      </font></td>
    </tr>
  </table>
  <br>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Save" type="submit" id="Save" value="Save">
    </font></strong></p>
</form>
<p>&nbsp;</p>
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