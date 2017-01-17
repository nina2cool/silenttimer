<?

$PageTitle = "Detailed Inspection Report";

	# has database username and password, so don't need to put it in the page.
	require "../include/dbinfo.php";


	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
		
	//beginning SQL statement that gets all data from tables.


	$sql = "SELECT * FROM tblInspection";
	
	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	$sum = mysql_num_rows($result);
	
	# Total number of timers in database
	$sql5 = "SELECT * FROM tblInspection";
	$result5 = mysql_query($sql5) or die("Cannot retrieve Inspection info, please try again.");
	
			$NumTimers = mysql_num_rows($result5);	
	
	# Total number of timers that have been accepted
	$sql2 = 'SELECT * FROM tblInspection where ProductStatus = "a"';  
	$result2 = mysql_query($sql2) or die("Cannot retrieve Product Status info, please try again.");

			$NumAccept = mysql_num_rows($result2);

	#Total number of timers that have been rejected
	$sql3 = 'SELECT * FROM tblInspection where ProductStatus = "r"';  
	$result3 = mysql_query($sql3) or die("Cannot retrieve Product Status info, please try again.");

			$NumReject = mysql_num_rows($result3);
		
		
	# Calculate the percentage of timers that have been accepted
	if($NumTimers != 0)
		{
			$PercentAccept = number_format(($NumAccept/$NumTimers)*100,1);
		}
	
	# Calculate the percentage of timers that have been rejected
	if($NumTimers != 0)
		{
			$PercentReject = number_format(($NumReject/$NumTimers)*100,1);
		}

	# Find the last Batch ID
	
	$sql4 = 'SELECT * FROM tblOrderShipped';
	$result4 = mysql_query($sql4) or die("Cannot retrieve Order Shipped info, please try again.");

		
									
			while($row = mysql_fetch_array($result4))
			{
			$OrderShippedID = $row[OrderShippedID];
			$DateTime = $row[DateTime];
			}
	
?> 
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Detailed 
  Inspection Report</strong></font></p>
<p align="right"><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&lt;&lt;<a href="inspectionreport.php">Back 
  to Inspection Report</a></font></p>
<p align="right"><font size="3"><font color="#003399" face="Arial, Helvetica, sans-serif">&lt;&lt;<a href="ninahome.php">Back 
  to Shipping and Timer Tracking Home Page</a></font></font></p>
<table width="300" border="0" cellspacing="0" cellpadding="5">
  <tr> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong># of Timers 
      in Database:</strong></font></td>
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong><? echo $NumTimers; ?></strong></font></td>
  </tr>
  <tr> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong># of Batches 
      Shipped:</strong></font></td>
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong><? echo $OrderShippedID; ?></strong></font></td>
  </tr>
  <tr> 
    <td><strong><font size="3" face="Arial, Helvetica, sans-serif"># Accepted: 
      </font></strong></td>
    <td><strong><font size="3" face="Arial, Helvetica, sans-serif"><? echo $NumAccept; ?></font></strong></td>
  </tr>
  <tr> 
    <td><strong><font size="3" face="Arial, Helvetica, sans-serif"># Rejected: 
      </font></strong></td>
    <td><strong><font size="3" face="Arial, Helvetica, sans-serif"><? echo $NumReject; ?></font></strong></td>
  </tr>
  <tr> 
    <td><strong><font color="#0000FF" size="3" face="Arial, Helvetica, sans-serif">% 
      Accepted: </font></strong></td>
    <td><strong><font color="#0000FF" size="3" face="Arial, Helvetica, sans-serif"><? echo $PercentAccept; ?> 
      %</font></strong></td>
  </tr>
  <tr> 
    <td><strong><font color="#0000FF" size="3" face="Arial, Helvetica, sans-serif">% 
      Rejected: </font></strong></td>
    <td><strong><font color="#0000FF" size="3" face="Arial, Helvetica, sans-serif"><? echo $PercentReject; ?> 
      %</font></strong></td>
  </tr>
</table>
<p>&nbsp;</p>
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
  <tr bgcolor="#FFFFCC"> 
    <td width="10%" height="33" class=sort> 
      <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif">Details</font></strong></font></div></td>
    <td width="15%" bgcolor="#FFFFCC" class=sort> 
      <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../ship/inspection2.php?sort=tblInspection.Serial&d=<? if ($sortBy=="tblInspection.Serial") {echo $sd;} else {echo "ASC";} ?>">Serial 
        # </a></font></strong></font></div></td>
    <td width="15%" class=sort> 
      <div align="center"><font color="#003399"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../ship/inspection2.php?sort=tblInspection.OrderShippedID&d=<? if ($sortBy=="tblInspection.OrderShippedID") {echo $sd;} else {echo "ASC";} ?>">Batch 
        ID </a></font></strong></font></div></td>
    <td width="15%" class=sort> 
      <div align="center"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a href="../ship/inspection2.php?sort=tblInspection.ProductStatus&d=<? if ($sortBy=="tblInspection.ProductStatus") {echo $sd;} else {echo "ASC";} ?>">Product 
        Status </a></strong></font></div></td>
    <td class=sort> 
      <div align="center"><font color="#003399" face="Arial, Helvetica, sans-serif"><strong><font size="2"><a href="../ship/inspection2.php?sort=tblInspection.Notes&d=<? if ($sortBy=="tblInspection.Notes") {echo $sd;} else {echo "ASC";} ?>">Notes</a></font></strong></font></div></td>
  </tr>
  <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$Serial = $row[Serial];
				$BatchID = $row[OrderShippedID];
				$ProductStatus = $row[ProductStatus];
				$Notes = $row[Notes];		

?>

  <tr> 
    <td width="10%"> 
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../ship/editinspection.php?c=<? echo $Serial; ?>"><strong>Details</strong></a></font></div></td>
    <td width="15%"> 
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Serial; ?></strong></font></div></td>
    <td width="15%"> 
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $BatchID; ?></strong></font></div></td>
    <td width="15%">
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $ProductStatus; ?></strong></font></div></td>
    <td> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Notes; ?></strong></font></div></td>
  </tr>
  <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
</table>
<p>&nbsp;</p>
