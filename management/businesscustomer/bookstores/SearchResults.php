<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	//customer info - check boxes
	$chkbusinesscustomerid = $_POST['chkbusinesscustomerid'];
	$chkname = $_POST['chkname'];
	$chkchain = $_POST['chkchain'];
	$chkincnumber = $_POST['chkincnumber'];
	$chkbncbnumber = $_POST['chkbncbnumber'];
	$chkbordersstorenumber = $_POST['chkbordersstorenumber'];
	$chkfollettstorenumber = $_POST['chkfollettstorenumber'];
	$chkaddress = $_POST['chkaddress'];
	$chkaddress2 = $_POST['chkaddress2'];
	$chkaddress3 = $_POST['chkaddress3'];
	$chkcity = $_POST['chkcity'];
	$chkstate = $_POST['chkstate'];
	$chkzipcode = $_POST['chkzipcode'];
	$chkcountry = $_POST['chkcountry'];
	$chkemail = $_POST['chkemail'];
	$chkphone = $_POST['chkphone'];
	$chkwebsite = $_POST['chkwebsite'];
	$chkcustomertype = $_POST['chkcustomertype'];
	
				//customer info - text boxes
				$BusinessCustomerID = $_POST['BusinessCustomerID'];
				$Name = $_POST['Name'];
				$Chain = $_POST['Chain'];
				$IncNumber = $_POST['IncNumber'];
				$BNCBNumber = $_POST['BNCBNumber'];
				$BordersStoreNumber = $_POST['BordersStoreNumber'];
				$FollettStoreNumber = $_POST['FollettStoreNumber'];
				$Address = $_POST['Address'];
				$Address2 = $_POST['Address2'];
				$Address3 = $_POST['Address3'];
				$City = $_POST['City'];
				$State = $_POST['State'];	
				$ZipCode = $_POST['ZipCode'];
				$Country = $_POST['Country'];
				$Email = $_POST['Email'];
				$Website = $_POST['Website'];
				$Phone = $_POST['Phone'];	
				$CustomerType = $_POST['CustomerType'];
	

	$sql = "SELECT * FROM tblBusinessCustomer WHERE Status <> ''";

	//echo "<br><br>sixth sql = " .$sql;
	
//customer info = if statements
if ($chkbusinesscustomerid == "y")	{	$sql .= " AND BusinessCustomerID LIKE '%$BusinessCustomerID%'";	}
if ($chkname == "y")	{	$sql .= " AND Name LIKE '%$Name%'";	}
if ($chkchain == "y")	{	$sql .= " AND Chain LIKE '%$Chain%'";	}
if ($chkincnumber == "y")	{	$sql .= " AND IncNumber LIKE '%$IncNumber%'";	}
if ($chkbncbnumber == "y")	{	$sql .= " AND BNCBNumber LIKE '%$BNCBNumber%'";	}
if ($chkbordersstorenumber == "y")	{	$sql .= " AND BordersStoreNumber LIKE '%$BordersStoreNumber%'";	}
if ($chkfollettstorenumber == "y")	{	$sql .= " AND FollettStoreNumber LIKE '%$FollettStoreNumber%'";	}
if ($chkaddress == "y")		{	$sql .= " AND Address LIKE '%$Address%'";	}
if ($chkaddress2 == "y")	{	$sql .= " AND Address2 LIKE '%$Address2%'";	}
if ($chkaddress3 == "y")	{	$sql .= " AND Address3 LIKE '%$Address3%'";	}
if ($chkcity == "y")	{	$sql .= " AND City LIKE '%$City%'";		}
if ($chkstate == "y")	{	$sql .= " AND State = '$State'";	}
if ($chkzipcode == "y")	{	$sql .= " AND ZipCode LIKE '%$ZipCode%'";	}
if ($chkemail == "y")	{	$sql .= " AND Email1 LIKE '%$Email%'";	}
if ($chkcountry == "y")	{	$sql .= " AND Country = '$Country'";	}
if ($chkphone == "y")	{	$sql .= " AND Phone1 LIKE '%$Phone%'";	}
if ($chkwebsite == "y")	{	$sql .= " AND Website LIKE '%$Website%'";	}
if ($chkcustomertype == "y")	{	$sql .= " AND CustomerType = '$CustomerType'";	}


//echo "<br><br>second sql = " .$sql;

$sql .= " GROUP BY BusinessCustomerID";

//echo "<br><br>third sql = " .$sql;


	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY Name ASC";
		$sortBy ="Name";
		$sortDirection = "ASC";
	}

	//echo $sql;
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute search function!");
	
	$SumResults = mysql_num_rows($result);
	

?><title>Search Results</title>
<p><font color="003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Bookstore
  Search Results</strong></font></p>
<p><strong><font size="2" face="Arial, Helvetica, sans-serif">Number of results: <strong><? echo $SumResults; ?></strong></font></strong></p>
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
  <tr bgcolor="#CCCCCC"> 
    <td width="8%" bgcolor="#FFFFCC" class=sort> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>bcID</strong></font></div></td>
    <td bgcolor="#FFFFCC" class=sort><div align="center"><font color="#000000"><strong><font size="2" face="Arial, Helvetica, sans-serif">Results</font></strong></font></div></td>
  </tr>
  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$BusinessCustomerID = $row[BusinessCustomerID];
				$Name = $row[Name];
				$Chain = $row[Chain];
				$IncNumber = $row[IncNumber];
				$BNCBNumber = $row[BNCBNumber];
				$BordersStoreNumber = $row[BordersStoreNumber];
				$FollettStoreNumber = $row[FollettStoreNumber];
				$Address = $row[Address];
				$Address2 = $row[Address2];
				$Address3 = $row[Address3];
				$City = $row[City];
				$State = $row[State];
				$ZipCode = $row[ZipCode];
				$Country = $row[Country];
				$Email = $row[Email1];
				$Website = $row[Website];
				$Phone = $row[Phone1];
				$CustomerType = $row[CustomerType];
				$Status = $row[Status];
			
			  ?>
  <tr> 
    <td bgcolor="#E6E6FF"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="BookstoreEdit.php?bc=<? echo $BusinessCustomerID; ?>" target="_blank"><? echo $BusinessCustomerID; ?></a></font></div></td>
    
	<td bgcolor="#E6E6FF"><font size="2" face="Arial, Helvetica, sans-serif">    <strong><? echo $Chain; ?></strong></font></td>
	<td bgcolor="#E6E6FF"><font size="2" face="Arial, Helvetica, sans-serif">    <strong><? echo $Name; ?></strong></font></td>
	<td bgcolor="#E6E6FF"><font size="2" face="Arial, Helvetica, sans-serif">    <strong><? echo $Address; ?></strong></font></td>
	<td bgcolor="#E6E6FF"><font size="2" face="Arial, Helvetica, sans-serif">    <strong><? echo $Address2; ?></strong></font></td>
	<td bgcolor="#E6E6FF"><font size="2" face="Arial, Helvetica, sans-serif">    <strong><? echo $City; ?></strong></font></td>
	<td bgcolor="#E6E6FF"><font size="2" face="Arial, Helvetica, sans-serif">    <strong><? echo $State; ?></strong></font></td>
	<td bgcolor="#E6E6FF"><font size="2" face="Arial, Helvetica, sans-serif">    <strong><? echo $ZipCode; ?></strong></font></td>

	
	
			  	<? if ($chkincnumber == "y") { ?>
			  	<td><font size="1" face="Arial, Helvetica, sans-serif">B&N Inc # = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	                  <strong><? echo $IncNumber; ?></strong></font></td>
			  	<? } ?>	

			  	<? if ($chkbncbnumber == "y") { ?>
			  	<td><font size="1" face="Arial, Helvetica, sans-serif">B&N College # = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	                  <strong><? echo $BNCBNumber; ?></strong></font></td>
			  	<? } ?>	

			  	<? if ($chkbordersstorenumber == "y") { ?>
			  	<td><font size="1" face="Arial, Helvetica, sans-serif">Borders # = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	                  <strong><? echo $BordersStoreNumber; ?></strong></font></td>
			  	<? } ?>	

			  	<? if ($chkfollettstorenumber == "y") { ?>
			  	<td><font size="1" face="Arial, Helvetica, sans-serif">Follett # = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	                  <strong><? echo $FollettStoreNumber; ?></strong></font></td>
			  	<? } ?>	
	
	
			  	<? if ($chkaddress3 == "y") { ?>
			  	<td><font size="1" face="Arial, Helvetica, sans-serif">Address3 = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	                  <strong><? echo $Address3; ?></strong></font></td>
			  	<? } ?>	

	  	  	<? if ($chkcountry == "y") { ?>
	  	  	<td><font size="1" face="Arial, Helvetica, sans-serif">Country =</font><font size="2" face="Arial, Helvetica, sans-serif"> <br>
	              <strong><? echo $Country; ?></strong></font></td>
	  	  	<? } ?>		
	  	  	<? if ($chkemail == "y") { ?>
	  	  	<td><font size="1" face="Arial, Helvetica, sans-serif">Email =</font><font size="2" face="Arial, Helvetica, sans-serif"> <br>
	              <strong><? echo $Email; ?></strong></font></td>
	  	  	<? } ?>		
	  	  	<? if ($chkphone == "y") { ?>
	  	  	<td><font size="1" face="Arial, Helvetica, sans-serif">Phone = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	              <strong><? echo $Phone; ?></strong></font></td>
	  	  	<? } ?>		
	  	  	<? if ($chkwebsite == "y") { ?>
	  	  	<td><font size="1" face="Arial, Helvetica, sans-serif">Website = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	              <strong><? echo $Website; ?></strong></font></td>
	  	  	<? } ?>		
	  	  	  	<? if ($chkcustomertype == "y") { ?>
	  	  	  	<td><font size="1" face="Arial, Helvetica, sans-serif">Customer Type = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	                  <strong><? echo $CustomerType; ?></strong></font></td>
	  	  	  	<? } ?>		
  				<td<? if($Status == "inactive") { ?> bgcolor="#CCCCCC"<? } ?>><font size="1" face="Arial, Helvetica, sans-serif">Status = </font><font size="2" face="Arial, Helvetica, sans-serif"><br>
	              <strong><? echo $Status; ?></strong></font></td>
	
  </tr>
  <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
</table>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>



// finishes security for page
}
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
