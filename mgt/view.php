<?
//security for page
session_start();

//security check
If (session_is_registered('userName'))
{
?>

<html>
<head>
<title>View Contacts</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<?
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$location = "localhost";
	$user = "silenttimer";
	$pass = "2559";
	$db = "silenttimer";
	
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$sql = "Select * FROM tblCompanyContacts";


	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}
	else
	{
		$sql .= " ORDER BY CompanyName";
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
   
   
   ////////
   # Ok, here are the statistics queries:
   ///////
      
   $sql = "SELECT COUNT(ContactID) AS total FROM tblCompanyContacts WHERE InsertedBy = 'mark'";
   $result2 = mysql_query($sql) or die("Cannot execute query!1");
   $row = mysql_fetch_array($result2);
   $mark = $row[total];
   
   $sql = "SELECT COUNT(ContactID) AS total FROM tblCompanyContacts WHERE InsertedBy = 'christina'";
   $result2 = mysql_query($sql) or die("Cannot execute query!2");
   $row = mysql_fetch_array($result2);
   $nina = $row[total];
   
   $sql = "SELECT COUNT(ContactID) AS total FROM tblCompanyContacts WHERE InsertedBy = 'erik'";
   $result2 = mysql_query($sql) or die("Cannot execute query!3");
   $row = mysql_fetch_array($result2);
   $erik = $row[total];
   
   $sql = "SELECT AVG(CompanyRanking) AS avg FROM tblCompanyContacts WHERE CompanyRanking <> 0";
   $result2 = mysql_query($sql) or die("Cannot execute query!4");
   $row = mysql_fetch_array($result2);
   $avgRank = $row[avg];
   
   $total = $mark + $nina + $erik;  

?>





<p><strong><font color="#0000FF" size="5" face="Arial, Helvetica, sans-serif">Silent 
  Technology</font><font size="4" face="Arial, Helvetica, sans-serif"><br>
  Testing Contacts </font></strong></p>
<p align="right"><strong><font size="3" face="Arial, Helvetica, sans-serif"><a href="insert.php">Insert 
  New Records</a><br>
  </font></strong></p>
<p><strong><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"><a href="logout.php"><font size="2">Log 
  Out<br>
  </font></a><br>
  View Records </font></strong></p>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#333333">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
        <tr align="center"> 
          <td width="20%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Total Records: <? echo $total;?></font></strong></td>
          <td width="20%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Mark: <? echo $mark;?></font></strong></td>
          <td width="20%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Nina: <? echo $nina;?></font></strong></td>
          <td width="20%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Erik: <? echo $erik;?></font></strong></td>
          <td width="20%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Avg. Rank: <? echo $avgRank;?></font></strong></td>
        </tr>
      </table></td>
  </tr>
</table>
<br>
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#333333">
  <tr align="left" valign="top"> 
    <td width="5%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>View</strong></font></div></td>
    <td width="17%"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="view.php?sort=CompanyName&d=<? if ($sortBy=="CompanyName") {echo $sd;} else {echo "ASC";}?>">Company Name</a></font></strong></td>
    <td width="17%"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="view.php?sort=CompanyType&d=<? if ($sortBy=="CompanyType") {echo $sd;} else {echo "ASC";}?>">Type</a></strong></font></td>
    <td width="17%"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="view.php?sort=TestCategory&d=<? if ($sortBy=="TestCategory") {echo $sd;} else {echo "ASC";}?>">Category</a></font></strong></td>
    <td width="3%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="view.php?sort=CompanyRanking&d=<? if ($sortBy=="CompanyRanking") {echo $sd;} else {echo "ASC";}?>">Rank</a></font></strong></div></td>
    <td width="15%"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="view.php?sort=ContactName&d=<? if ($sortBy=="ContactName") {echo $sd;} else {echo "ASC";}?>">Contact</a></font></strong></td>
    <td width="12%"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="view.php?sort=Phone&d=<? if ($sortBy=="Phone") {echo $sd;} else {echo "ASC";}?>">Phone #</a></font></strong></td>
    <td width="14%"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="view.php?sort=Email&d=<? if ($sortBy=="Email") {echo $sd;} else {echo "ASC";}?>">Email</a></font></strong></td>
  </tr>
  <?
	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
	while($row = mysql_fetch_array($result))
	{
	$cID = $row[ContactID]; //autonumer
	$company = $row[CompanyName];
	$category = $row[TestCategory];
	$site = $row[WebSite];
	$type = $row[CompanyType];
	$rank = $row[CompanyRanking];
	$contact = $row[ContactName];
	$phone = $row[Phone];
	$email = $row[Email];
						
?>
  <tr> 
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="edit.php?id=<? echo $cID;?>">View</a></font></div></td>
    <td><a href="<? echo $site;?>" target="_blank"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $company;?></font></a></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $type;?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $category;?></font></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $rank;?></font></div></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $contact;?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $phone;?></font></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="mailto:<? echo $email;?>"><? echo $email;?></a></font></td>
  </tr>
  <?
	}
	//close connection to database
	mysql_close($link);
?>
</table>
<p align="right">&nbsp;</p>
<p align="right"><strong><font size="3" face="Arial, Helvetica, sans-serif"><a href="insert.php">Insert 
  New Records</a></font></strong></p>
<p align="right"><strong><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"><a href="logout.php"><font size="2">Log 
  Out</font></a></font></strong></p>
</body>
</html>

<?
// finishes security for page
}
else
{
	header("location: index.php"); //redirects user via PHP to this page... better than meta refresh...
}
?>