<?
	# has database username and password, so don't need to put it in the page.
	require "../include/dbinfo.php";
	
	$PageTitle = "Inspection Report";
	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	# Total number of timers in database
	$sql = "SELECT * FROM tblInspection";
	$result = mysql_query($sql) or die("Cannot retrieve Inspection info, please try again.");
	
			$NumTimers = mysql_num_rows($result);
	
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
	
	# Find the last batch entered into the database
	$sql8 = "SELECT * FROM tblOrderShipped";
	$result8 = mysql_query($sql8) or die("Cannot retrieve Order Shipped info, please try again.");

			while($row = mysql_fetch_array($result8))
			{
			$OrderShippedID = $row[OrderShippedID];
			}

?>
  
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Inspection 
  Report</strong></font></p>
<p align="right"><font size="3"><font color="#003399" face="Arial, Helvetica, sans-serif">&lt;&lt;<a href="ninahome.php">Back 
  to Shipping and Timer Tracking Home Page</a></font></font></p>
<p align="left"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong>Overall 
  Inspection Statistics</strong></font></p>
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
  
  
<div align="right"><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&gt;&gt;<a href="inspection2.php">View 
  Detailed Inspection Report</a></font><br>
</div>
<hr>
<p><strong><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"> 
  Batch Statistics</font></strong></p>
<table width="100%" border="1" cellpadding="1" cellspacing="0" bordercolor="#000000">
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
    <td> <div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif">Batch 
        ID</font></strong></div></td>
    <td> <div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif">Date 
        Arrived </font></strong></div></td>
    <td> <div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif"># 
        Shipped</font></strong></div></td>
    <td> <div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif"># 
        Inspected</font></strong></div></td>
    <td> <div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif"># 
        Accepted</font></strong></div></td>
    <td> <div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif"># 
        Rejected</font></strong></div></td>
    <td> <div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif">% 
        Accepted</font></strong></div></td>
    <td> <div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif">% 
        Rejected</font></strong></div></td>
  </tr>
  <?
 
  	# List each batch ID with its time and number shipped
	$sql4 = 'SELECT * FROM tblOrderShipped';
	$result4 = mysql_query($sql4) or die("Cannot retrieve Order Shipped info, please try again.");
				
			while($row = mysql_fetch_array($result4))
			{
			$OrderShippedID = $row[OrderShippedID];
			$DateTime = $row[DateTime];
			$NumShipped = $row[NumShipped];
			
	# For each batch ID, return the number of timers inspected from tblInspection
	$sql5 = "SELECT * FROM tblInspection WHERE OrderShippedID = '$OrderShippedID'";
	$result5 = mysql_query($sql5) or die("Cannot retrieve Order Shipped info for each ID, please try again.");

			while($row = mysql_fetch_array($result5))
			{
	
			$NumInspected = mysql_num_rows($result5);
			}

	# Find the number of timers accepted from each batch
	$sql6 = "SELECT * FROM tblInspection WHERE OrderShippedID = '$OrderShippedID' AND ProductStatus = 'a'";
	$result6 = mysql_query($sql6) or die("Cannot retrieve Order Shipped info for accept, please try again.");

			$NumAccept2 = mysql_num_rows($result6);
	
	# Find the number of timers rejected from each batch
	$sql7 = "SELECT * FROM tblInspection WHERE OrderShippedID = '$OrderShippedID' AND ProductStatus = 'r'";
	$result7 = mysql_query($sql7) or die("Cannot retrieve Order Shipped info for reject, please try again.");

			$NumReject2 = mysql_num_rows($result7);
				
	# Calculate the percentage of timers that have been accepted
	if($NumInspected != 0)
		{
			$PercentAccept2 = number_format(($NumAccept2/$NumInspected)*100,1);
		
	
	# Calculate the percentage of timers that have been rejected
	if($NumInspected != 0)
		{
			$PercentReject2 = number_format(($NumReject2/$NumInspected)*100,1);

?>
  <tr> 
    <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong><? echo $OrderShippedID; ?></strong></font></div></td>
    <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong><? echo $DateTime; ?></strong></font></div></td>
    <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong><? echo $NumShipped; ?></strong></font></div></td>
    <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong><? echo $NumInspected; ?></strong></font></div></td>
    <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong><? echo $NumAccept2; ?></strong></font></div></td>
    <td><div align="center"><font size="3" face="Arial, Helvetica, sans-serif"><strong><? echo $NumReject2; ?></strong></font></div></td>
    <td><div align="center"><font color="#0000FF" size="3" face="Arial, Helvetica, sans-serif"><strong><? echo $PercentAccept2; ?><font color="#0000FF" size="3" face="Arial, Helvetica, sans-serif"> 
        %</font></strong></font></div></td>
    <td><div align="center"><font color="#0000FF" size="3" face="Arial, Helvetica, sans-serif"><strong><? echo $PercentReject2; ?><font color="#0000FF" size="3" face="Arial, Helvetica, sans-serif"> 
        %</font></strong></font></div></td>
  </tr>
  <p><font size="2" face="Arial, Helvetica, sans-serif"> </font> </p>
  <?
			  	}
				}
				}
				//close connection to database
				mysql_close($link);
			  ?>
</table>
