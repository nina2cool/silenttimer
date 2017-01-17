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

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	# --------------------------------------------------------------------------------------------
	#   Function to insert back slashes into characters with a single or a double quote in them.
	# --------------------------------------------------------------------------------------------
	function escapeQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("'","||",$var);
			$string = str_replace('"','||||',$string);
		}

		return $string;
	}
	
	function removeBars($var)
	{
		if (isset($var))
		{
			$string = str_replace("||","'",$var);
			$string = str_replace('||||','"',$string);
		}

		return $string;
	}

	function addQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("\'","'",$var);
			$string = str_replace('\"','"',$string);
		}

		return $string;
	}
	
	function dbQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("||","\'",$var);
			$string = str_replace('||||','\"',$string);
		}

		return $string;
	}
	# --------------------------------------------------------------------------------------------
?>

<?	

	//grab variables to get purchase info from DB.
	$CustomerID = $_GET['cust'];
	$NoteID = $_GET['note'];

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			

	#<Add button being pushed>
	if ($_POST['Save'] == "Save")
	{
		// Customer Table
		$Note = dbQuote($_POST['Note']);
		$Action = dbQuote($_POST['Action']);
		$DateTime = $_POST['DateTime'];
		$Status = $_POST['Status'];

		
		$sql3 = "UPDATE tblNotes
			SET Note = '$Note', 
			Action = '$Action', 
			DateTime = '$DateTime', 
			Status = '$Status'
			WHERE NoteID = '$NoteID'";
		
		mysql_query($sql3) or die("Cannot update notes information");
		
		}
		
				
	
				$sql2 = "SELECT * FROM tblNotes WHERE CustomerID = '$CustomerID'";
		$result2 = mysql_query($sql2) or die("Cannot execute query customerID!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$Note = $row2[Note];
			$DateTime = $row2[DateTime];
			$Action = $row2[Action];
			$Status = $row2[Status];
			$NoteID = $row2[NoteID];
			
		}
		
		
	?>		

<?
		////// change values from DB compliant for " ' ", etc..... this makes it look pretty for emails and receipt... /////////
		$Note = addQuote($Note);
		$Action = addQuote($Action);
		
		$goto = "Notes.php?cust=$CustomerID";
		header("location: $goto");
		
		
		}

?>





<p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">Contact
      Information</a> | <a href="PurchaseHistory.php?cust=<? echo $CustomerID; ?>">Purchase
History</a> | <a href="Notes.php?cust=<? echo $CustomerID; ?>">Notes</a></font></p>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
  Note</strong></font></p>
<form name="form1" method="post" action="">
  <font size="2" face="Arial, Helvetica, sans-serif"><strong> </strong></font> 
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
      <td><font size="2" face="Arial, Helvetica, sans-serif">Action</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="Action" cols="60" rows="5" id="Action"><? echo $Action; ?></textarea>
      </font></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Status" type="text" id="Status" value="<? echo $Status; ?>">
      </font></td>
    </tr>
  </table>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <br>
    <input name="Save" type="submit" id="Save" value="Save">
    <input type="reset" name="Submit2" value="Reset">
    </font></strong></p>
</form>
<p>&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

?>