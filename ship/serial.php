<?
	# has database username and password, so don't need to put it in the page.
	require "../include/dbinfo.php";
	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	# ----------------------------------------------------------------------------
	#  Grab info from top of page, and store into DB
	# ----------------------------------------------------------------------------
	if($_GET['Submit'] == 'Save')
	{
		$n = $_GET['num'];
		$p = $_GET['pID'];
		
		$serials[1] = $_GET['1'];
		$oldserials[1] = $_GET['old1'];
		$serials[2] = $_GET['2'];
		$oldserials[2] = $_GET['old2'];
		$serials[3] = $_GET['3'];
		$oldserials[3] = $_GET['old3'];
		$serials[4] = $_GET['4'];
		$oldserials[4] = $_GET['old4'];
		$serials[5] = $_GET['5'];
		$oldserials[5] = $_GET['old5'];
		$serials[6] = $_GET['6'];
		$oldserials[6] = $_GET['old6'];
		$serials[7] = $_GET['7'];
		$oldserials[7] = $_GET['old8'];
		$serials[8] = $_GET['1'];
		$oldserials[8] = $_GET['old8'];
		$serials[9] = $_GET['9'];
		$oldserials[9] = $_GET['old9'];
		$serials[10] = $_GET['10'];
		$oldserials[10] = $_GET['old10'];
		
		// find out if this purchaseID - serial combo is already in DB, if it is, UPDATE. If it isn't insert...
		$i=1;
		while ($i <= $n)
		{
			$s = $serials[$i];
			#echo $s ."<br>";
			$o = $oldserials[$i];
			#echo $o ."<br>";			
			
			//need to update...
			if($o != "")
			{
				$sql = "UPDATE tblPurchaseSerial
						SET Serial = '$s'
						WHERE PurchaseID = '$p' AND Serial = '$o'";
				mysql_query($sql) or die("Cannot alter serial, please try again.");
			}
			else // insert needed...
			{
				$sql = "INSERT INTO tblPurchaseSerial(PurchaseID, Serial)
						VALUES ('$p', '$s')";
				#echo $sql;
				mysql_query($sql) or die("Cannot insert purchase serial, please try again.");
			}
			
			$i++;
		}

	}	
	
	# ----------------------------------------------------------------------------
	
	
	
	$sql = "SELECT tblCustomer.FirstName, tblCustomer.LastName, tblPurchase.PurchaseID, tblPurchase.NumOrdered
			FROM tblPurchase INNER JOIN tblCustomer ON tblCustomer.CustomerID=tblPurchase.CustomerID 
			ORDER BY tblCustomer.LastName";
	$result = mysql_query($sql) or die("Cannot retrieve Customer And Serial info, please try again.");

?>
<strong><font size="3" face="Arial, Helvetica, sans-serif">Customer Shipment 
and Serial Number Form </font></strong> 

<?
	while($row = mysql_fetch_array($result))
	{
		$name = $row[FirstName] . " " . $row[LastName];
		$pID = $row[PurchaseID];
		$num = $row[NumOrdered];
	
		
		// grab all the purchases for this purchaseID...
		$sql2 = "SELECT tblPurchaseSerial.Serial
			FROM tblPurchaseSerial
			WHERE tblPurchaseSerial.PurchaseID = '$pID'
			ORDER BY Serial";
		$result2 = mysql_query($sql2) or die("Cannot retrieve Customer And Serial info, please try again.");
		
		$numPurchases = mysql_num_rows($result2);
				
		// only if this person does NOT have a serial attached, show their info...
		if ($numPurchases == 0)
		{
			
?>
<form name="<? echo $pID;?>" method="get" action="">
  <table width="421" border="0" cellspacing="0" cellpadding="5">
    <tr> 
      <td><font color="#0000FF" size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $name;?></strong></font></td>
    </tr>
    <tr> 
      <td>
	  
	  <table width="100%" border="0" cellspacing="0" cellpadding="5">
	  <?
	  
	  // start loop for the info...from 2nd query
	$k=1;
	while($row2 = mysql_fetch_array($result2))
	{
		$serial[$k] = $row2[Serial];
		$k++;
	}
	  
	  $i = 1;
	  while($i <= $num)
	  {	  
	  ?>
          <tr> 
            <td width="21%"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $i;?></strong></font></div></td>
            <td width="79%"><input type="text" name="<? echo $i;?>" value="<? echo $serial[$i];?>"></td>
          </tr>
	  <?
	  $i++;
	  }
	  ?>
	  </table></td>
	  
    </tr>
    <tr>
      <td><div align="right">
	  
	  	<?	
		$i = 1;
	  	while($i <= $num)
	  	{	  
	  	?>
            <input type="hidden" name="old<? echo $i;?>" value="<? echo $serial[$i];?>">
	  	<?
			$i++;
	  	}
	  	?>
	  
          <input name="pID" type="hidden" value="<? echo $pID;?>">
		  <input name="num" type="hidden" value="<? echo $num;?>">
		  <input name="Submit" type="submit" id="Submit" value="Save">
        </div></td>
    </tr>
  </table>
  </form>
  <?
  	  	//clear out serial numbers
	  	$k=1;
	  	while($k <= $num)
		{
			$serial[$k] = "";
			$k++;
		}
		
	} //end IF statement seeing if there are any purchases for this person...
 
  } //end
  ?>
  