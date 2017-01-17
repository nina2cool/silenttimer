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

	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Contacts</strong></font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&gt;
      <a href="ContactViewInactive.php">View Inactive Contacts </a></font></p>
<div align="right"><font size="2" face="Arial, Helvetica, sans-serif">E = Edit
    | A = Add Log| H = History</font>
</div><br>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
    <?
			  
			  	$sql = "SELECT * FROM tblContact WHERE Status = 'active'
				";

			//echo $sql;
				//sort results.....
				if ($sortBy != "")
				{
					$sql .= " ORDER BY $sortBy $sortDirection";
				}
			
				else
				{
					$sql .= " ORDER BY tblContact.Company ASC";
					$sortBy ="tblContact.Company";
					$sortDirection = "ASC";
				}
				
				//put SQL statement into result set for loop through records
				$result = mysql_query($sql) or die("Cannot execute query!");

			  
			  
			  
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
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ContactView.php?sort=tblContact.Company&d=<? if ($sortBy=="tblContact.Company") {echo $sd;} else {echo "ASC";}?>">Company </a></strong></font></div></td> 
      <td class=sort> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ContactView.php?sort=tblContact.LastName&d=<? if ($sortBy=="tblContact.LastName") {echo $sd;} else {echo "ASC";}?>">Contact
      Name</a></strong></font></div></td>
      <td class=sort> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ContactView.php?sort=tblContact.Phone&d=<? if ($sortBy=="tblContact.Phone") {echo $sd;} else {echo "ASC";}?>">Phone</a></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="ContactView.php?sort=tblContact.Email&d=<? if ($sortBy=="tblContact.Email") {echo $sd;} else {echo "ASC";}?>">Email</a></strong></font></div></td>
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Actions</strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$ContactID = $row[ContactID];
				$FirstName = $row[FirstName];
				$LastName = $row[LastName];
				$CompanyName = $row[Company];
				$Phone = $row[Phone];
				$Ext = $row[Ext];
				$Email = $row[Email];
				$Status = $row[Status];
						
						
						if($Phone == "") { $Phone = "-"; }
						if($Email == "") { $Email = "-"; }
						if($CompanyName == "") { $CompanyName = "-"; }
						if($FirstName == "" AND $LastName == "") { $FirstName = "-"; }
						
			  ?>
    <tr <? if($Status == "inactive") { ?>bgcolor="#CCCCCC"<? } ?>>
      <td>
         <font size="2" face="Arial, Helvetica, sans-serif"><? echo $CompanyName; ?></font>
         </td> 
      <td>
        <font size="2" face="Arial, Helvetica, sans-serif"><font><? echo $FirstName; ?></font> <? echo $LastName; ?></font>
        </td>
 
      <td> 
	    <font size="2" face="Arial, Helvetica, sans-serif"> <? echo $Phone; ?><? if($Ext <> "") { ?> Ext <? echo $Ext; ?><? } ?></font></td>

      <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="mailto:<? echo $Email; ?>"><? echo $Email; ?></a></font></td>
      <td nowrap><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="ContactEdit.php?c=<? echo $ContactID; ?>">E</a> | <a href="ContactLogAdd.php?c=<? echo $ContactID; ?>">A</a> | </font>
                           <font size="2" face="Arial, Helvetica, sans-serif"><a href="ContactHistory.php?c=<? echo $ContactID; ?>">H</a></font></div></td>
    </tr>
    <?
			  	}
				
			  ?>
</table> 
		<p>&nbsp;</p>
		<p>
		  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";


// has links that show up at the bottom in it.
require "../include/footerlinks.php";



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
