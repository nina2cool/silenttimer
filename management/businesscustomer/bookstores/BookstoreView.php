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
	
	$Letter = $_GET['abc'];
	$Chain = $_GET['chain'];
	$State = $_GET['state'];
	
	if($Chain == "Other") { $Chain = ""; }
	if($Chain == "BN") { $Chain = "Barnes & Noble"; }

	
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
		
	
	if($Letter <> "") {
	$sql = "SELECT * from tblBusinessCustomer WHERE CustomerType = 'Bookstore' AND Status ='active' AND Name LIKE '$Letter%'";
	}
	
	if($Letter == "" AND $State == "") {
	$sql = "SELECT * from tblBusinessCustomer WHERE CustomerType = 'Bookstore' AND Status ='active' AND Chain = '$Chain'";
	}
	
	if($State <> "") {
	$sql = "SELECT * from tblBusinessCustomer WHERE CustomerType = 'Bookstore' AND Status ='active' AND State = '$State'";
	}
	


	//sort results.....
						//sort results.....
			if ($sortBy != "")
			{
				$sql .= " ORDER BY $sortBy $sortDirection";
			}
		
			else
			{
				$sql .= " ORDER BY tblBusinessCustomer.Name ASC";
				$sortBy ="tblBusinessCustomer.Name";
				$sortDirection = "ASC";
			}

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	$Number = mysql_num_rows($result);
	
	
	$ChainName = $Chain;
	
	if($Chain == "Barnes & Noble") { $ChainName = "BN"; }
	
	
?>
<title>Bookstores</title>

<table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#E2F5E2">
  <tr>
    <td>
	
	<? if($Letter <> "") { ?>
	<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Bookstores
            beginning with &quot;<? echo $Letter; ?>&quot; </strong></font></p>
      <? }

if($Letter == "" AND $State == "") { 

if($Chain == "") { $Chain = "Other"; }

?>
      <p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><? echo $Chain; ?> Bookstores</strong></font></p>
      <? }

if($State <> "") { ?>
      <p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Bookstores
            in <? echo $State; ?></strong></font></p>
      <? } ?>
	  
	  
	  </td>
    <td><div align="right">
      <p><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">There
        are <? echo $Number; ?> active bookstores.<br>
      </font></strong><strong><font size="2" face="Arial, Helvetica, sans-serif"><br>
      &gt; 
	    
	  <? if($Letter <> "") { ?>
	      <a href="BookstoreViewPrint.php?abc=<? echo $Letter; ?>" target="_blank">
	    <? }
	
	if($Letter == "" AND $State == "") { 
	
	if($ChainName == "") { $ChainName = "Other"; }
	?>
	    <a href="BookstoreViewPrint.php?chain=<? echo $ChainName; ?>" target="_blank">
	    <? }
	
	if($State <> "") { ?>
	    <a href="BookstoreViewPrint.php?state=<? echo $State; ?>" target="_blank">
	    <? } ?>
	    
	View Printable List</a></font></strong></p>
      </div></td>
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
    <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>View</strong></font></div></td>
    <td bgcolor="#FFFFCC" class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="BookstoreView.php?abc=<? echo $Letter; ?>&sort=tblBusinessCustomer.Chain&d=<? if ($sortBy=="tblBusinessCustomer.Chain") {echo $sd;} else {echo "ASC";} ?>">Chain</a> - <a href="BookstoreView.php?abc=<? echo $Letter; ?>&sort=tblBusinessCustomer.Name&d=<? if ($sortBy=="tblBusinessCustomer.Name") {echo $sd;} else {echo "ASC";} ?>">Name</a></strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="BookstoreView.php?abc=<? echo $Letter; ?>&sort=tblBusinessCustomer.Address&d=<? if ($sortBy=="tblBusinessCustomer.Address") {echo $sd;} else {echo "ASC";} ?>">Address</a></strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="BookstoreView.php?abc=<? echo $Letter; ?>&sort=tblBusinessCustomer.City&d=<? if ($sortBy=="tblBusinessCustomer.City") {echo $sd;} else {echo "ASC";} ?>">City</a>, 
        <a href="BookstoreView.php?abc=<? echo $Letter; ?>&sort=tblBusinessCustomer.State&d=<? if ($sortBy=="tblBusinessCustomer.State") {echo $sd;} else {echo "ASC";} ?>">State</a></strong></font></div></td>
    <td class=sort><div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="BookstoreView.php?abc=<? echo $Letter; ?>&sort=tblBusinessCustomer.ZipCode&d=<? if ($sortBy=="tblBusinessCustomer.ZipCode") {echo $sd;} else {echo "ASC";} ?>">Zip
              Code </a></strong></font></div></td>
    <td class=sort> <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="BookstoreView.php?abc=<? echo $Letter; ?>&sort=tblBusinessCustomer.Phone1&d=<? if ($sortBy=="tblBusinessCustomer.Phone1") {echo $sd;} else {echo "ASC";} ?>">Main 
        Number</a></strong></font></div></td>
  </tr>
  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$BusinessCustomerID = $row[BusinessCustomerID];
				$BusinessName = $row[Name];
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
					
				if($Chain == "Barnes & Noble") { $Chain = "B&N"; }

			  ?>
  <tr> 
    <td> <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><a href="BookstoreEdit.php?bc=<? echo $BusinessCustomerID; ?>">View</a></font></div></td>
    <td> <div align="left"><font size="1" face="Arial, Helvetica, sans-serif">
    <strong>
    <font color="#000000">
    <? if($Chain <> "") { ?>
    </font></strong><font color="#000000"><? echo $Chain; ?></font><strong><font color="#000000"> - 
    <? } ?>
    </font><font color="#0000FF"><? echo $BusinessName; ?></font></strong></font></div></td>
    <td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Address; ?>
        <? if($Address2 <> "") { ?>
        , <? echo $Address2; ?>
        <? } ?>
    </font></div></td>
    <td><div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $City; ?>, 
        <? echo $State; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ZipCode; ?></font></div></td>
    <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><? echo $OfficeNumber; ?></font></div></td>
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
require "include/sidemenu.php";
// has links that show up at the bottom in it.
require "../../include/footerlinks.php";


// finishes security for page
}
else
{
?>

            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>