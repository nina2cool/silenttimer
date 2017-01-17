<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
//require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
//require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
//require "../../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];
	
	$now = date("Y-m-d");
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
		
	
	$sql = "SELECT * from tblBusinessCustomer WHERE CustomerType = 'Test Prep' AND Chain = 'Kaplan' AND 
	Status ='active' AND Country = 'US' OR CustomerType = 'Test Prep' AND Chain = 'Princeton Review' AND Status = 'active' 
	AND Country = 'US'
	ORDER BY State ASC, City ASC";
	
	/*
	//sort results.....
						//sort results.....
			if ($sortBy != "")
			{
				$sql .= " ORDER BY $sortBy $sortDirection";
			}
		
			else
			{
				$sql .= " ORDER BY tblBusinessCustomer.State ASC";
				$sortBy ="tblBusinessCustomer.State";
				$sortDirection = "ASC";
			}
	*/
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
			
	
?>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Test
    Prep Print List</strong></font></td>
    <td><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">Printed on: <strong><font size="3"><? echo $now; ?></font></strong></font></div></td>
  </tr>
</table>
<br>
<table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
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
    <td width="25%" bgcolor="#FFFFCC" class=sort><div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Chain -
    Name</font></strong></font></div></td>
    <td width="25%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Address</strong></font></div></td>
    <td width="25%" class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Phone</strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Fax</strong></font></div></td>
  </tr>
  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$BusinessCustomerID = $row[BusinessCustomerID];
				$BusinessName = $row[Name];
				$Chain = $row[Chain];
				$ContactFirstName = $row[ContactFirstName];
				$ContactLastName = $row[ContactLastName];
				$OfficeNumber = $row[Phone1];
				$Fax = $row[Fax];
				$BusinessType = $row[CustomerType];
				$Chain = $row[Chain];
				$City = $row[City];
				$State = $row[State];
				$Address = $row[Address];
				$Address2 = $row[Address2];
				$ZipCode = $row[ZipCode];
					
				//if($Chain == "Princeton Review") { $Chain = "TPR"; }
				if($Fax == "") { $Fax = "&nbsp;"; }
				if($OfficeNumber == "") { $OfficeNumber = "&nbsp;"; }

			  ?>
  <tr valign="top">
    <td width="25%"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"> <strong><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Chain; ?><br>
    </font></strong><em><? echo $BusinessName; ?></em></font></div></td>
    <td width="25%"><div align="left"><font size="1" face="Arial, Helvetica, sans-serif">
	
		<? echo $Address; ?>
              <? if($Address2 <> "") { ?>
              <br><? echo $Address2; ?>
              <? } ?>
              <br>
    <? echo $City; ?>, <? echo $State; ?> <? echo $ZipCode; ?></font></div></td>
    <td width="25%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $OfficeNumber; ?></font></div></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">000-000-0000</font></div></td>
  </tr>
  <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
</table>
<p>&nbsp;</p>

  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


// has side menu, and bottom HTML TAGS
//require "include/sidemenu.php";
// has links that show up at the bottom in it.
//require "../../include/footerlinks.php";


// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>