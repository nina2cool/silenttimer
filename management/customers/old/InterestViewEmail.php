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
	
		
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
	$sql = "SELECT * FROM tblTimerContacts";

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblTimerContacts.contactID DESC";
		$sortBy ="tblTimerContacts.contactID";
		$sortDirection = "DESC";
	}
		

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	$NumTotal = mysql_num_rows($result);
	

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Timer/Watch
      Interest Emails </strong></font></p>
<form>
  <table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#003399">
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
    <tr bgcolor="#CCCCCC"> 
      <td width="11%" class=sort> <div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif"><a href="../customers/InterestView.php?sort=tblTimerContacts.email&d=<? if ($sortBy=="tblTimerContacts.email") {echo $sd;} else {echo "ASC";}?>">Email</a></font></strong></font></div></td>
      <td width="25%" class=sort> <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/InterestView.php?sort=tblTimerContacts.date&d=<? if ($sortBy=="tblTimerContacts.date") {echo $sd;} else {echo "ASC";}?>">Date 
          and Time</a></strong></font></div></td>
      <td width="5%" class=sort><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="../customers/InterestView.php?sort=tblTimerContacts.type&d=<? if ($sortBy=="tblTimerContacts.type") {echo $sd;} else {echo "ASC";}?>">Type</a></strong></font></div></td>
      <td width="5%" class=sort> <div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif">?</font></strong></font></div></td>
      <?
			  	
				// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$ContactID = $row['contactID'];
				$Email = $row['email'];
				$DateTime = $row['date'];
				$Type = $row['type'];
				
				
				$Purch = "";
				
				$sql4 = "SELECT * FROM tblCustomer WHERE Email = '$Email'";
				$result4 = mysql_query($sql4) or die("Cannot execute query find email!");
				
				while($row4 = mysql_fetch_array($result4))
				{
					$FirstName = $row4[FirstName];
					$Num = mysql_num_rows($result4);
					$Purch = "y";
				
					
				
				}
				
				$Number = $Num;
				
												
			  ?>
    <tr> 
      <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Email; ?></font></td>
      <td width="25%"> <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font></div></td>
      <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Type; ?></font></div></td>
      <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"> 
          <? if($Purch == 'y'){?>
          YES! 
          <? } ?>
          </font></div></td>
    </tr>
    <?
			  	}
				$NumNot = $NumTotal - $Num;
				$Per = $Num / $NumTotal * 100;
				
				//close connection to database
				mysql_close($link);
			  ?>
  </table> 
		
            
  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
    <tr>
      <td bgcolor="#FFFFCC"><p><font size="3" face="Arial, Helvetica, sans-serif"><strong># 
          of People Who Bought: <font color="#FF0000"><? echo $Num; ?></font></strong></font></p>
        <p><font size="3" face="Arial, Helvetica, sans-serif"><strong># of People 
          Who Didn't: <font color="#FF0000"><? echo $NumNot; ?></font></strong></font></p>
        <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>% Bought: 
          <font color="#FF0000"><? echo number_format($Per,2); ?>%</font></strong></font></p></td>
    </tr>
  </table>
  <p align="left">&nbsp;</p>
  <p align="center">
</form>
  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.

require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
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
