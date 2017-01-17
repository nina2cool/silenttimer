<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

//security check
If (session_is_registered('custID'))
{

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

//CODE GOES BELOW-----------------------------------------------------------

	# get CustomerID from previous page
	#$CustomerID = $_GET['cust'];

	$custID = $_SESSION['custID'];
	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$custID'";
	$result = mysql_query($sql) or die("Cannot find customer information!");
		
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
			$Country1 = $row[Country];
			$Phone = $row[Phone];
			$Email = $row[Email];
			$School = $row[School];
			$PrepClass = $row[PrepClass];
			$EbayName = $row[EbayName];
			$Type = $row[Type];
			$BusinessType = $row[BusinessType];
			$CompanyName = $row[BusinessName];
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
		
		$sql2 = "SELECT * FROM tblCountry WHERE ISO = '$Country1'";
		$result2 = mysql_query($sql2) or die("Cannot execute query country!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$Country = $row2[Name];
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

<div align="right">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFCC">
    <tr>
      <td><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong><?php echo $CompanyName; ?></strong></font></td>
      <td><div align="left"><font color="#FF0000" size="3" face="Arial, Helvetica, sans-serif"><strong><?php echo $FirstName; ?> 
          <? echo $LastName; ?></strong></font></div></td>
    </tr>
  </table>
  <div align="left">
    <p><font size="3" face="Arial, Helvetica, sans-serif"><font size="2"><strong>&gt;
            <a href="accountupdate.php">Update Your Information</a></strong></font></font><br>
    </p>
  </div>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td width="50%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Contact
      Information: </font></strong></td>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping
      Address:</strong></font></td>
    </tr>
    <tr valign="middle">
      <td width="50%"><p align="left"><font size="2" face="Arial, Helvetica, sans-serif">e-mail: <a href="mailto:<?php echo $Email; ?>"><strong><?php echo $Email; ?></strong></a> </font></p>
      <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">phone: <strong><?php echo $Phone; ?></strong></font></p></td>
      <td width="50%"><div align="right">
	  <?
	  
	  if($Address2 == "")
	  {
  
	  ?>
	  
        <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Address; ?><br>
            <?php echo $City; ?>, <?php echo $State; ?> <?php echo $ZipCode; ?><br>
          <?php echo $Country; ?></font></p>
		<? 
		 }
		 else
		 {
		?>
		   <p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Address; ?><br><?php echo $Address2; ?><br>
            <?php echo $City; ?>, <?php echo $State; ?> <?php echo $ZipCode; ?><br>
          <?php echo $Country; ?></font></p>
		 <?
		 }
		 ?>
		  
      </div>
      </td>
    </tr>
  </table>
  <br>
  <hr>
</div>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "include/footerlinks.php";

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