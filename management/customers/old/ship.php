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
?>

<?
	# get CustomerID from previous page
	$CustomerID = $_GET['cust'];

	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
	$result = mysql_query($sql) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result))
		{
			
			$FirstName = $row[FirstName];
			$LastName = $row[LastName];
			$Address = $row[Address];
			$Address2 = $row[Address2];
			$City = $row[City];
			$State = $row[State];
			$StateOther = $row[StateOther];
			$ZipCode = $row[ZipCode];
			$Country = $row[Country];
			$Phone = $row[Phone];
			$Email = $row[Email];
			$School = $row[School];
			$PrepClass = $row[PrepClass];
			$EbayName = $row[EbayName];
			$Type = $row[Type];
			$BusinessType = $row[BusinessType];
			$BusinessName = $row[BusinessName];
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
		
		
?>
<div align="right"> 
  <p><font face="Arial, Helvetica, sans-serif"><a href="main.php?cust=<? echo $CustomerID; ?>">Main 
    Page</a> | <a href="option.php?cust=<? echo $CustomerID; ?>">Optional Information</a> 
    | <a href="purchhist.php?cust=<? echo $CustomerID; ?>">Purchase History</a> 
    | <a href="claimhist.php">Claim History</a> | <a href="notes.php">Notes</a></font></p>
  <hr>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $FirstName; ?> 
        <? echo $LastName; ?> <font size="4">- Shipping Information</font></strong></font></td>
      <td><div align="right"><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"><strong><?php echo $Type; ?></strong></font></div></td>
    </tr>
  </table>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping 
    Address:</strong></font></p>
</div>
<blockquote>
  <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Address; ?> 
    - <?php echo $Address2; ?><br>
    <?php echo $City; ?>, <?php echo $State; ?> <?php echo $ZipCode; ?><br>
    <?php echo $Country; ?> </font></div>
</blockquote>
<div align="left">
  <p><font size="2" face="Arial, Helvetica, sans-serif">e-mail: <a href="mailto:<?php echo $Email; ?>"><?php echo $Email; ?><br>
    </a></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
    phone: <?php echo $Phone; ?></font></p>
  </div>
<div align="right">
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="shipedit.php?cust=<? echo $CustomerID; ?>">edit</a></font></p>
  <hr>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; Make 
    a claim</font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; Ship 
    a replacement</font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="mailto:<? echo $Email; ?>">Send 
    an email</a></font></p>
</div>

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