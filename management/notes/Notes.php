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

//CODE GOES BELOW-----------------------------------------------------------

	# get CustomerID from previous page
	$CustomerID = $_GET['cust'];
	$BusinessCustomerID = 
	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
	$result = mysql_query($sql) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result))
		{
			$CustomerID = $row[CustomerID];
			$FirstName = $row[FirstName];
			$LastName = $row[LastName];
			$Phone = $row[Phone];
			$Email = $row[Email];
			$TypeID = $row[Type];
			$CompanyName = $row[BusinessName];
		}
	
	
		$sql2 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
	$result2 = mysql_query($sql2) or die("Cannot execute query TypeID!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$Type = $row2[Type];
		}
		
	
		if($Email == "")
		{
			$Email = "n/a";
		}
		else
		{	$Email = $Email;
		}
		
		if($Phone == "")
		{
			$Phone = "n/a";
		}
		else
		{	$Phone = $Phone;
		}
		
				if($CompanyName == "")
		{
			$CompanyName = "<br> ";
		}
		else
		{
			$CompanyName = $CompanyName;
		}
		
		

		
?>

<div align="left"></div>
<p><strong><font size="3" face="Arial, Helvetica, sans-serif">Notes for <? echo $FirstName; ?> <? echo $LastName; ?> - <? echo $CompanyName; ?>:</font></strong><br>
</p>
<div align="left"></div>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
  <tr bgcolor="#FFFFCC"> 
 
 

 
 
    <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Date/Time</strong></font></div></td>
    <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Note</strong></font></div></td>
    <td> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Action</strong></font></div></td>
    <td><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Status</strong></font></div></td>

  </tr>
    
	
   <?
	
		$sql2 = "SELECT * FROM tblNotes WHERE CustomerID = '$CustomerID'";
		$result2 = mysql_query($sql2) or die("Cannot execute query customerID!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$Note = $row2[Note];
			$DateTime = $row2[DateTime];
			$Action = $row2[Action];
			$Status = $row2[Status];
			$NoteID = $row2[NoteID];
			

			
	?>
	
  <tr> 

    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="NoteEdit.php?note=<? echo $NoteID; ?>&cust=<? echo $CustomerID; ?>"><strong><?php echo $DateTime; ?></strong></a></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Note; ?></font></div></td>
    <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Action; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Status; ?>&nbsp;</font></div></td>
	
	
  </tr>
	
  <?
	}
	?>
  
</table>
<p align="left">    <font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="NoteAdd.php?cust=<? echo $CustomerID; ?>">Add a note</a></font></p>
<hr>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="../warranty/ClaimAdd.php">Make
a claim</a></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="CustomerPurchaseAddRepl.php?cust=<? echo $CustomerID; ?>">Ship
      a replacement</a></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="CustomerPurchaseAddReorder.php?cust=<? echo $CustomerID; ?>">New
      order for <? echo $FirstName; ?> <? echo $LastName; ?></a></font></p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="mailto:<? echo $Email; ?>">Send
      an email</a></font></p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

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