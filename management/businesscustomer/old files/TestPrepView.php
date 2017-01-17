<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{


// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
	
	$TestPrepStatus = $_GET['status'];
	
	$Now = date("Y-m-d");
	
	//find date 60 days from Today to get new expiration date
	$pf_NewExpirationDate = strtotime("$Now+60 days");
	$ExpirationDate = date("Y-m-d", $pf_NewExpirationDate);
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	/*
	
	#<update button being pushed>
	if ($_POST['Update'] == "Update")
	{

		$sql4 = "SELECT * FROM tblBusinessCustomer 
		WHERE Chain = '' AND CustomerType = 'Test Prep' AND TestPrepStatus = '$TestPrepStatus'";
		$result4 = mysql_query($sql4) or die("Cannot execute query!");
		
		while($row4 = mysql_fetch_array($result4))
			{
			$PromoCode = $row4[PromotionCodeID];
			}
		
		$sql3 = "UPDATE tblPromotionCode
		SET EndDate = '$ExpirationDate'
		WHERE PromotionCodeID = '$PromoCode'";
		echo $sql3;
		$result3 = mysql_query($sql3) or die("Cannot update promocode");
	
		$goto = "TestPrepView.php?status=$TestPrepStatus";
		header("location: $goto");
	
	}
	*/
		
	if($_GET['Update'] == "YES")
	{
		$bcID = $_GET['bc'];
		$PromotionCode = $_GET['PromoCode'];
		
		
		$sql3 = "UPDATE tblPromotionCode
		SET EndDate = '$ExpirationDate'
		WHERE PromotionCodeID = '$PromoCode'";
		
		$result3 = mysql_query($sql3) or die("Cannot update promocode");
		
		/*
		?>
		<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>businesscustomer/TestPrepView.php?status=<? echo $TestPrepStatus; ?>'>	
		<?
		*/
		
	}
	
	
	
	if($_GET['Print'] == "YES")
	{
		$bcID = $_GET['bc'];
		$PromotionCode = $_GET['PromoCode'];
		
		
		$sql3 = "UPDATE tblBusinessCustomer
		SET TestPrepPrint = 'y'
		WHERE BusinessCustomerID = '$bcID'";
		
		$result3 = mysql_query($sql3) or die("Cannot update testprep print");
		
		/*
		?>
		<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>businesscustomer/TestPrepView.php?status=<? echo $TestPrepStatus; ?>'>	
		<?
		*/
		
	}
	

	$sql = "SELECT * FROM tblBusinessCustomer 
	WHERE Chain = '' AND CustomerType = 'Test Prep' AND TestPrepStatus = '$TestPrepStatus' AND TestPrepPrint = 'n'";
	
	//echo $sql;

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblBusinessCustomer.State ASC, tblBusinessCustomer.City";
		$sortBy ="tblBusinessCustomer.State";
		$sortDirection = "ASC";
	}

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	$Count = mysql_num_rows($result);
	
?><title>Test Prep Campaign</title>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Letters
and Fliers for Test Prep Companies = <? echo $Count; ?> total </strong></font></p>
<p><font color="#000000"><strong><font size="3" face="Arial, Helvetica, sans-serif">Test
      Prep Status = <? echo $TestPrepStatus; ?></font></strong></font></p>
<p align="right"><strong><font color="#000000" size="3" face="Arial, Helvetica, sans-serif">&lt;
      <a href="TestPrepIndex.php">Go back to Test Prep Index</a> </font></strong></p>
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
    <td class=sort> <div align="center"><strong><a href="TestPrepView.php?status=<? echo $TestPrepStatus; ?>&sort=tblBusinessCustomer.BusinessCustomerID&d=<? if ($sortBy=="tblBusinessCustomer.BusinessCustomerID") {echo $sd;} else {echo "ASC";}?>"><font size="2" face="Arial, Helvetica, sans-serif">BusCustID</font></a></strong></div></td>
    <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Chain
            - <a href="TestPrepView.php?status=<? echo $TestPrepStatus; ?>&sort=tblBusinessCustomer.Name&d=<? if ($sortBy=="tblBusinessCustomer.Name") {echo $sd;} else {echo "ASC";}?>">Name</a> </font></strong></div></td>
    <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="TestPrepView.php?status=<? echo $TestPrepStatus; ?>&sort=tblBusinessCustomer.Address&d=<? if ($sortBy=="tblBusinessCustomer.Address") {echo $sd;} else {echo "ASC";}?>">Address</a></font></strong></div></td>
    <td class=sort><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="TestPrepView.php?status=<? echo $TestPrepStatus; ?>&sort=tblBusinessCustomer.City&d=<? if ($sortBy=="tblBusinessCustomer.City") {echo $sd;} else {echo "ASC";}?>">City</a>, <a href="TestPrepView.php?status=<? echo $TestPrepStatus; ?>&sort=tblBusinessCustomer.State&d=<? if ($sortBy=="tblBusinessCustomer.State") {echo $sd;} else {echo "ASC";}?>">St.</a> <a href="TestPrepView.php?status=<? echo $TestPrepStatus; ?>&sort=tblBusinessCustomer.ZipCode&d=<? if ($sortBy=="tblBusinessCustomer.ZipCode") {echo $sd;} else {echo "ASC";}?>">Zip</a> </font></strong></div></td>
    <td width="5%" class=sort> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Letter</font></strong></div></td>
    <td width="5%" class=sort><div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Flier</font></strong></div></td>
    <td width="5%" class=sort> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Both</font></strong></div></td>
    <td width="5%" class=sort><p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Update promo code? </strong></font></p>
    <p align="center"><strong><font size="1" face="Arial, Helvetica, sans-serif">Should be <? echo $ExpirationDate; ?> for
    today.</font></strong></p></td>
    <?
	
				
	
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$BusinessName = $row[Name];
				$ContactFirstName = $row[ContactFirstName];
				$ContactLastName = $row[ContactLastName];
				$OfficeNumber = $row[Phone1];
				$Fax = $row[Fax];
				$BusinessType = $row[CustomerType];
				$Chain = $row[Chain];
				$City = $row[City];
				$State = $row[State];
				$ZipCode = $row[ZipCode];
				$Address = $row[Address];
				$Address2 = $row[Address2];
				$Address3 = $row[Address3];
				$BusinessCustomerID = $row[BusinessCustomerID];
				$Update = $row[TestPrepUpdated];
				$Status = $row[Status];
				$PromoCode = $row[PromotionCodeID];
				
				
				//$BusinessName = strtolower($BusinessName);
				//$BusinessName = ucwords($BusinessName);
				
				
				//$Address = strtolower($Address);
				//$Address = ucwords($Address);
				
				//$Address2 = strtolower($Address2);
				//$Address2 = ucwords($Address2);
				
				//$City = strtolower($City);
				//$City = ucwords($City);
				

				
				$sql2 = "SELECT * FROM tblPromotionCode WHERE PromotionCodeID = '$PromoCode'";
				//echo $sql2;
				$result2 = mysql_query($sql2) or die("Cannot retrieve PromotionCodeID info, please try again.");
			
				while($row2 = mysql_fetch_array($result2))
				{
						$CurrentExpirationDate = $row2['EndDate'];
				}
										
			 
	
	if($Update == "y" AND $Status == "active")
	{
	?>
  <tr>
	<?
	}
	elseif($Update <> "y" AND $Status == "active")
	{
	?>
  <tr bgcolor="#FFFF66">
	<?
	}
	else
	{
	?>
  <tr bgcolor="#C1C184">
	<?
	}
	?>
   <form name="form1" method="post" action="">
    <td width="6%"><div align="center">
      <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="TestPrepEdit.php?bc=<? echo $BusinessCustomerID; ?>" target="_blank"><? echo $BusinessCustomerID; ?></a></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="TestPrepView.php?status=<? echo $TestPrepStatus; ?>&Print=YES&bc=<? echo $BusinessCustomerID; ?>&PromoCode=<? echo $PromoCode; ?>"><font size="2" face="Arial, Helvetica, sans-serif"><strong><em>PRINT</em></strong></font></a><a href="TestPrepEdit.php?bc=<? echo $BusinessCustomerID; ?>" target="_blank"><br>
                </a></font></p>
    </div></td>
    <td width="11%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $BusinessName; ?></font></td>
    <td width="11%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Address; ?><br>

<?
if($Address2 <> '')
{
?>

      <? echo $Address2; ?><br>
<?
}
if($Address3 <> '')
{
?>
	  
      <? echo $Address3; ?><br>
<?
}
?>
    </font></td>
	
	  
    <td width="8%"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $City; ?>, <? echo $State; ?> <? echo $ZipCode; ?></font></td>
    <td width="5%"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="letter-testprep-new.php?id=<? echo $BusinessCustomerID; ?>" target="_blank">Letter</a></font></div></td>
    <td width="5%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="flier_testprep_new.php?id=<? echo $BusinessCustomerID; ?>" target="_blank">Flier</a></font></div></td>
    <td width="5%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="letter_and_flier.php?id=<? echo $BusinessCustomerID; ?>" target="_blank">Both</a></font></div></td>
	
	
	<td width="5%"><p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $PromoCode; ?> (<? echo $CurrentExpirationDate; ?>)</font></p>
	  <p align="center"><a href="TestPrepView.php?status=<? echo $TestPrepStatus; ?>&Update=YES&bc=<? echo $BusinessCustomerID; ?>&PromoCode=<? echo $PromoCode; ?>"><font size="2" face="Arial, Helvetica, sans-serif"><strong><em>Update</em></strong></font> </a></p></td>
   </form>
  </tr>
  <?
  					
			  	}
				
				//close connection to database
				mysql_close($link);
			  ?>
</table> 

            


  <br>
<p align="center">

  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

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
