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

	
	//when the user is logged in, their userName is in this session, store it into variable
	$userName = $_SESSION['userName'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	  	$sql = "SELECT * FROM tblEmployee WHERE UserName = '$userName'";
	echo $sql;
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$EmployeeID = $row[EmployeeID];

	}
	
	
	?>
	
	

<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Leads</strong></font></p>
<p>&nbsp;</p>
<p><font color="#990000"><strong><font size="3" face="Arial, Helvetica, sans-serif">My Leads</font></strong></font></p>
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
  <tr bgcolor="#FFFFCC">
  <?
  
  
  		$sql2 = "SELECT * FROM tblNotesFollowUp WHERE EmployeeID = '$EmployeeID'";
		
		echo $sql2;
		
		$result2 = mysql_query($sql2) or die("Cannot get follow ups");
		
		
  
  ?>
  
  
  
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Contact</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Follow Up Date/Time</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Type</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Purpose</font></strong></div></td>
    <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Actions</font></strong></div></td>
  </tr>
  <tr>
  		
		<?
		
		while($row2 = mysql_fetch_array($result2))
		{

  			$FollowID = $row2[FollowID];
			$BusinessCustomerID = $row2[BusinessCustomerID];
			$CustomerID = $row2[CustomerID];
			$Date = $row2[Date];
			$Time = $row2[Time];
			$Purpose = $row2[Purpose];
			$Type = $row2[Type];
			$Status = $row2[Status];
			
					
					if($BusinessCustomerID <> "0")
					{
								$sql3 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
								
								$result3 = mysql_query($sql3) or die("Cannot execute query!");
								
								while($row3 = mysql_fetch_array($result3))
								{
								$FirstName = $row3[ContactFirstName];
								$LastName = $row3[ContactLastName];
								$CompanyName = $row3[Name];
								$Chain = $row3[Chain];
								}
					}
					
					
					
					if($CustomerID <> "0")
					{
								$sql4 = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
								
								$result4 = mysql_query($sql4) or die("Cannot execute query!");
								
								while($row4 = mysql_fetch_array($result4))
								{
								$FirstName = $row4[FirstName];
								$LastName = $row4[LastName];
								$CompanyName = $row4[BusinessName];	
								}
					}
		
		?>
		
  
  
  
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?> <? echo $LastName; ?> - <? echo $CompanyName; ?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Date; ?>
		
		<? if($Time <> "00:00:00") { ?>
		 <? echo $Time; ?>		 <? } ?>
	
	
	</font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Type; ?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Purpose; ?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="NoteView.php?note=<? echo $FollowID; ?>">View
          this note</a> | <a href="NoteAdd.php?cust=<? echo $CustomerID; ?>&bc=<? echo $BusinessCustomerID; ?>">Create
        a new note</a> | <a href="NoteViewAll.php?cust=<? echo $CustomerID; ?>&bc=<? echo $BusinessCustomerID; ?>">View
        all notes</a> | 
		
		<? if ($CustomerID <> "0") { ?>
		
		<a href="../customers/CustomerInfo.php?cust=<? echo $CustomerID; ?>" target="_blank">View Profile</a>
		
		<? } else { ?>
		
		<a href="../businesscustomer/BusCustEdit.php?bc=<? echo $BusinessCustomerID; ?>" target="_blank">View Profile</a>
		
		<? } ?>
		
		
		</font></td>
	
	<?
	
	}
	
	?>
	
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>Other Leads </p>
<p>&nbsp;</p>

<?
	
	
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// has links that show up at the bottom in it - found in home management folder
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
