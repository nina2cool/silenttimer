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
	
	$TestID = $_GET['test'];
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
	$sql = "SELECT * FROM tblRegistration WHERE TestID = '$TestID'";

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblRegistration.RegistrationID DESC";
		$sortBy ="tblRegistration.RegistrationID";
		$sortDirection = "DESC";
	}
		

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	$NumTotal = mysql_num_rows($result);
	
	if($TestID == 1) { $Test = 'LSAT'; }
	if($TestID == 2) { $Test = 'MCAT'; }
	if($TestID == 3) { $Test = 'SAT'; }
	if($TestID == 4) { $Test = 'GMAT'; }
	if($TestID == 5) { $Test = 'GRE'; }
	if($TestID == 6) { $Test = 'ACT'; }

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><? echo number_format($NumTotal); ?> <? echo $Test; ?>
       Registration People</strong></font></p>
<p><font face="Times New Roman, Times, serif"><font face="Times New Roman, Times, serif"><font size="2" face="Arial, Helvetica, sans-serif"><a href="RegView.php?test=1">LSAT
          Reg.</a> | <a href="RegView.php?test=2">MCAT Reg.</a> | <a href="RegView.php?test=5">GRE
          Reg.</a> | <a href="RegView.php?test=4">GMAT Reg.</a> | <a href="RegView.php?test=3">SAT
Reg.</a> | <a href="RegView.php?test=6">ACT Reg.</a></font></font></font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&gt;
      <a href="RegViewPurchase.php?test=<? echo $TestID; ?>">View customers who purchased</a></font></p>
<form>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
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
      <td width="19%" class=sort> <div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif"><a href="RegView.php?test=<? echo $TestID; ?>&sort=tblRegistration.FirstName&d=<? if ($sortBy=="tblRegistration.FirstName") {echo $sd;} else {echo "ASC";}?>">First 
          Name</a> </font></strong></font></div></td>
      <td width="18%" class=sort> <div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif"><a href="RegView.php?test=<? echo $TestID; ?>&sort=tblRegistration.LastName&d=<? if ($sortBy=="tblRegistration.LastName") {echo $sd;} else {echo "ASC";}?>">Last 
          Name</a></font></strong></font></div></td>
      <td width="11%" class=sort> <div align="center"><font size="1"><strong><font face="Arial, Helvetica, sans-serif"><a href="RegView.php?test=<? echo $TestID; ?>&sort=tblRegistration.Email&d=<? if ($sortBy=="tblRegistration.Email") {echo $sd;} else {echo "ASC";}?>">Email</a></font></strong></font></div></td>
      <td width="25%" class=sort> <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="RegView.php?test=<? echo $TestID; ?>&sort=tblRegistration.DateTime&d=<? if ($sortBy=="tblRegistration.DateTime") {echo $sd;} else {echo "ASC";}?>">Date 
          and Time</a></strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$RegID = $row['RegistrationID'];
				$FirstName = $row['FirstName'];
				$LastName = $row['LastName'];
				$TestID = $row['TestID'];
				$Email = $row['Email'];
				$DateTime = $row['DateTime'];
				
			
				
												
			  ?>
    <tr> 
      <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $FirstName; ?></font></td>
      <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $LastName; ?></font></td>
      <td><font size="1" face="Arial, Helvetica, sans-serif"><a href="mailto:<? echo $Email; ?>"><? echo $Email; ?></a></font></td>
      <td width="25%"> <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $DateTime; ?></font></div></td>
    </tr>
    <?
			  	}
				
				
				//close connection to database
				mysql_close($link);
			  ?>
  </table> 
		
            
  <br>
  <p align="left">&nbsp;</p>

</form>
  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

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
