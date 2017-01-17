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
	
		if($EbayName == "")
		{
			$EbayName = "n/a";
		}
		else
		{	$EbayName = $EbayName;
		}
		
		if($School == "")
		{
			$School = "no response";
		}
		else
		{	$School = $School;
		}
		
		if($PrepClass == "")
		{
			$PrepClass = "no response";
		}
		else
		{	$PrepClass = $PrepClass;
		}
		
?>
<div align="right"> 
  <p><font face="Arial, Helvetica, sans-serif"><a href="main.php?cust=<? echo $CustomerID; ?>">Main 
    Page</a> | <a href="ship.php?cust=<? echo $CustomerID; ?>">Shipping Information</a> 
    | <a href="purchhist.php?cust=<? echo $CustomerID; ?>">Purchase History</a> 
    | <a href="claimhist.php">Claim History</a> | <a href="notes.php">Notes</a></font></p>
  <hr>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $FirstName; ?> 
        <? echo $LastName; ?> <font size="4">- Optional Information</font></strong></font></td>
      <td><div align="right"><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"><strong><?php echo $Type; ?></strong></font></div></td>
    </tr>
  </table>
  <p align="left"><br>
    <font size="2" face="Arial, Helvetica, sans-serif">School: <strong><?php echo $School; ?></strong></font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Prep class: 
    <strong><?php echo $PrepClass; ?></strong></font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">eBay name: 
    <strong><?php echo $EbayName; ?></strong></font></p>
</div>
<blockquote> 
  <div align="left"></div>
</blockquote>
<div align="right">
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="optionedit.php?cust=<? echo $CustomerID; ?>">edit</a></font></p>
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