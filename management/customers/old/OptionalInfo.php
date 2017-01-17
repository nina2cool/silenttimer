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
			$CompanyName = $row[BusinessName];
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
		
		
				if($CompanyName == "")
		{
			$CompanyName = "<br> ";
		}
		else
		{
			$CompanyName = $CompanyName;
		}
		
	$sql2 = "SELECT * FROM tblRegistration WHERE Email = '$Email'";
	$result2 = mysql_query($sql2) or die("Cannot execute query LSAT reg!");
	
		
	while($row2 = mysql_fetch_array($result2))
		{
			$LSATEmail = $row2[Email];
		

				if($LSATEmail == $Email)
				{
					$LSAT = 'yes';
				}
				
	
			}
			
			
			if($LSAT == "")
		{
			$LSAT = 'no';
		}
			

	$sql3 = "SELECT * FROM tblTimerContacts WHERE type = 'Timer' AND email = '$Email'";
	$result3 = mysql_query($sql3) or die("Cannot execute query timer interest!");
		
		while($row3 = mysql_fetch_array($result3))
		{
			
			$TimerEmail = $row3[email];
		
				if($TimerEmail == $Email)
				{
					$Timer = 'yes';
				}
				
		
		}
		
		if($Timer == "")
		{
			$Timer = 'no';
		}


	$sql4 = "SELECT * FROM tblTimerContacts WHERE type = 'Watch' AND email = '$Email'";
	$result4 = mysql_query($sql4) or die("Cannot execute query watch interest!");
		
		while($row4 = mysql_fetch_array($result4))
		{
			
			$WatchEmail = $row4[email];
		
		
				if($WatchEmail == $Email)
				{
					$Watch = 'yes';
				}
		
		
		}
		
		if($Watch == "")
		{
			$Watch = 'no';
		}
		
?>
<div align="right"> 
  <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfo.php?cust=<? echo $CustomerID; ?>">Contact
        Information</a> 
    | <a href="PurchaseHistory.php?cust=<? echo $CustomerID; ?>">Purchase History</a></font></p>
  <hr>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFCC">
    <tr>
      <td><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong><?php echo $CompanyName; ?></strong></font></td>
      <td><div align="left"><font color="#FF0000" size="5" face="Arial, Helvetica, sans-serif"><strong><?php echo $FirstName; ?> <? echo $LastName; ?></strong></font></div></td>
      <td><div align="right"><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"><strong><?php echo $Type; ?></strong></font></div></td>
      <td width="10%">&nbsp;</td>
    </tr>
  </table>
  <br>
  <div align="left">
    <table width="50%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr>
        <td width="50%"><strong><font size="3" face="Arial, Helvetica, sans-serif">Optional
              Information:</font> </strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerInfoEdit.php?cust=<? echo $CustomerID; ?>#Optional">edit</a></font></td>
      </tr>
      <tr valign="middle">
        <td width="50%"><p align="left"><font size="2" face="Arial, Helvetica, sans-serif">School: <strong><?php echo $School; ?></strong></font></p>
            <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">Prep
                class: <strong><?php echo $PrepClass; ?></strong></font></p>
            <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">eBay
                name: <strong><?php echo $EbayName; ?></strong></font></p></td>
      </tr>
    </table>
  </div>
</div>
<div align="right"><br>
  <div align="left">
    <table width="50%"  border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">Other Information:</font></strong></td>
      </tr>
      <tr>
        <td><font size="2" face="Arial, Helvetica, sans-serif">Did they register on the LSAT registration page? </font></td>
        <td><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><?php echo $LSAT; ?>&nbsp;</font></td>
      </tr>
      <tr>
        <td><font size="2" face="Arial, Helvetica, sans-serif">Did they request a timer email?</font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Timer; ?>&nbsp;</font></td>
      </tr>
      <tr>
        <td><font size="2" face="Arial, Helvetica, sans-serif">Did they request a watch email? </font></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Watch; ?>&nbsp;</font></td>
      </tr>
    </table>
  </div>
  <hr>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="ClaimAdd.php?cust=<?echo $CustomerID; ?>">Make 
    a claim</a></font></p>
  <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="CustomerPurchaseAddRepl.php?cust=<? echo $CustomerID; ?>">Ship
  a replacement</a></font></p>
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