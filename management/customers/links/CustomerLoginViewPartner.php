<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
	$sql = "SELECT Max(DateTime) as DateTime, AffiliateID FROM tblCustomerEdit WHERE Type = 'login-partner' AND Status = 'active' GROUP BY AffiliateID";

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblCustomerEdit.AffiliateID ASC";
		$sortBy ="tblCustomerEdit.AffiliateID";
		$sortDirection = "ASC";
	}
		

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	$NumTotal = mysql_num_rows($result);


?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Partner
Log In</strong></font></p>
<ul>
  <li><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="CustomerLoginView.php">Customer
          Logins</a></strong></font></li>
  <li><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerLoginViewPartner.php">Partner Logins</a> </font></strong></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="CustomerLoginViewMgt.php">Management
          Logins</a></strong></font></li>
  <li><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="CustomerLoginInvalidView.php">Invalid
          Logins</a></strong></font></li>
</ul>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $NumTotal; ?> number
        of logins</font></p>
  <table width="100%" border="1" cellpadding="3" cellspacing="0" bordercolor="#CCCCCC">
    <?
			   // code to handle sort direction
			   // this following code just switches teh ascending order to descending and vice verca when necessary.
			   // The links in the titles of the colum fields are changed depending on the value in this variable and
			   // depending on what is being sorted by.
			   if ($sortDirection == "ASC")
			   {
			   		$sd = "DESC";
			   }
			   else
			   {
			   		$sd = "ASC";
			   }

			    
?>
    <tr bgcolor="#FFFFCC"> 
      <td width="11%" bgcolor="#FFFFCC" class=sort> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="CustomerLoginViewPartner.php?sort=tblCustomerEdit.AffiliateID&d=<? if ($sortBy=="tblCustomerEdit.AffiliateID") {echo $sd;} else {echo "ASC";}?>">AffiliateID</a></strong></font></div></td>
      <td width="25%" bgcolor="#FFFFCC" class=sort><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="CustomerLoginViewPartner.php?sort=tblCustomerEdit.DateTime&d=<? if ($sortBy=="tblCustomerEdit.DateTime") {echo $sd;} else {echo "ASC";}?>">Last
              Logged In</a></font></div></td>
      <?
			  	
				// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$AffiliateID = $row['AffiliateID'];
				$DateTime = $row['DateTime'];
				
						
						$sql3 = "SELECT Count(AffiliateID) as Count FROM tblCustomerEdit WHERE AffiliateID = '$AffiliateID' AND Status = 'active' AND Type = 'login-partner'";
						$result3 = mysql_query($sql3) or die("Cannot count");
						
						while($row3 = mysql_fetch_array($result3))
						{
							$Count = $row3[Count];
						}

				
						
			  ?>
    <tr> 
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $AffiliateID; ?></font></div></td>
      <td width="25%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?> <a href="CustomerLoginViewPartner2.php?aff=<? echo $AffiliateID; ?>"><font size="1">View
            All (<? echo $Count; ?>)</font></a></font></div></td>
    </tr>
    <?
			  	}
			  ?>
  </table> 
		
            
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
				//close connection to database
				mysql_close($link);

// has links that show up at the bottom in it.

require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";

// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
