<?	
//security for page
session_start();

//security check
If (session_is_registered('userName'))
{

	//sorting information pulled form the url line
	$cID = $_GET['id'];

	$location = "localhost";
	$user = "silenttimer";
	$pass = "2559";
	$db = "silenttimer";
	
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	

	if($Update)
	{			
		
			//$now = date("Y-m-d H:i:s");
			
			$sql="DELETE FROM CompanyTests WHERE ContactID = $cID";
			mysql_query($sql) or die("I cannot delete tests, please try again.  Sorry for the inconvenience. - erik");
			
			$query = "UPDATE tblCompanyContacts SET CompanyName='$txtCompanyName', WebSite='$txtWebSite', ";
			$cats = "";
			
			// loop to build array into one variable...
			for($i=0; $i < count($cboCategory); $i++)
			{
				if($cats != ""){$cats .= " ";}					
				$cats .= $cboCategory[$i];
			}
			
			$query .= "TestCategory='$cats', ContactName='$txtContactName', Phone='$txtPhone', Phone2='$txtPhone2', Email='$txtEmail', Email2='$txtEmail2', Notes='$txtNotes', CompanyType = '$cboCompanyType', CompanyRanking = '$cboCompanyRanking', Address = '$txtAddress', City = '$txtCity', State = '$cboState', ZipCode = '$txtZip', Country = '$txtCountry' WHERE ContactID = $cID";
			mysql_query($query) or die("I cannot execute your request, please try again.  Sorry for the inconvenience. - erik");
			
			// loop to insert tests into table...
			for($i=0; $i < count($cboCategory); $i++)
			{
				$query = "INSERT INTO CompanyTests(ContactID, Test) VALUES ('$cID', '";					
				$query .= $cboCategory[$i];
				$query .= "')";
				//echo $query;
				mysql_query($query) or die("I cannot execute your request, please try again.  Sorry for the inconvenience. - erik2");
			
			}
	
	}
	

	$sql = "Select * FROM tblCompanyContacts WHERE ContactID = $cID";
	$sql2 = "Select * FROM CompanyTests WHERE ContactID = $cID";
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	$result2 = mysql_query($sql2) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		//store results
		$company = $row[CompanyName];
		$site = $row[WebSite];
		$category = $row[TestCategory];
		$name = $row[ContactName];
		$p = $row[Phone];
		$p2 = $row[Phone2];
		$e = $row[Email];
		$e2 = $row[Email2];
		$notes = $row[Notes];
		$type = $row[CompanyType];
		$ranking = $row[CompanyRanking];
		$address = $row[Address];
		$city = $row[City];
		$state = $row[State];
		$zipcode = $row[ZipCode];
		$country = $row[Country];
	}
	
	$i=0;
	
	//store tests into array
	while($row = mysql_fetch_array($result2))
	{
		$tests[$i] = $row[Test];
		
		$i++;			
	}
	
	
	if($Delete)
	{			
		$query = "DELETE FROM tblCompanyContacts WHERE ContactID = $cID";
		$query2 = "DELETE FROM CompanyTests WHERE ContactID = $cID";
		
		mysql_query($query) or die("I cannot execute your request, please try again.  Sorry for the inconvenience. - erik");
		mysql_query($query2) or die("I cannot execute your request, please try again.  Sorry for the inconvenience. - erik");
		
		header("location:view.php");
		
	}

?>


<html>
<head>
<title>Edit Contact</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<p><strong><font color="#0000FF" size="5" face="Arial, Helvetica, sans-serif">Silent 
  Technology</font><font size="4" face="Arial, Helvetica, sans-serif"><br>
  Testing Contacts </font></strong></p>
<p align="right"><strong><font size="3" face="Arial, Helvetica, sans-serif"><a href="view.php">View 
  Records</a></font></strong></p>
<p><strong><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"><a href="logout.php"><font size="2">Log 
  Out</font></a></font></strong></p>
<p><strong><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"> 
  Edit Record</font></strong></p>
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="7">
    <tr align="left" valign="top"> 
      <td width="2%">&nbsp;</td>
      <td width="98%"><font face="Arial, Helvetica, sans-serif"><strong>Company 
        Name<br>
        <input name="txtCompanyName" type="text" id="txtCompanyName" value="<? echo $company;?>" size="50">
        </strong></font></td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><strong><font face="Arial, Helvetica, sans-serif">Web Site<br>
        <input name="txtWebSite" type="text" id="txtWebSite" value="<? echo $site;?>" size="50">
        </font></strong></td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Company Type<br>
        <select name="cboCompanyType" id="cboCompanyType">
          <option selected>Select</option>
          <option>-------</option>
          <option value="informational" <? if($type == 'informational') {echo 'selected';}?>>Informational</option>
          <option value="test prep" <? if($type == 'test prep') {echo 'selected';}?>>Test Prep</option>
          <option value="books" <? if($type == 'books') {echo 'selected';}?>>Books</option>
          <option value="online courses" <? if($type == 'online courses') {echo 'selected';}?>>Online Courses</option>
          <option value="all" <? if($type == 'all') {echo 'selected';}?>>All</option>
          <option value="other" <? if($type == 'other') {echo 'selected';}?>>Other</option>
        </select>
        </strong></font></td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><strong><font face="Arial, Helvetica, sans-serif">Test Category<br>
        <select name="cboCategory[]" size="5" multiple>
          <option value="sat" <? for($i=0; $i < count($tests); $i++) {if($tests[$i] == 'sat'){echo 'selected';} }?>>SAT</option>
          <option value="act" <? for($i=0; $i < count($tests); $i++) {if($tests[$i] == 'act'){echo 'selected';} }?>>ACT</option>
          <option value="mcat" <? for($i=0; $i < count($tests); $i++) {if($tests[$i] == 'mcat'){echo 'selected';} }?>>MCAT</option>
          <option value="lsat" <? for($i=0; $i < count($tests); $i++) {if($tests[$i] == 'lsat'){echo 'selected';} }?>>LSAT</option>
          <option value="bar" <? for($i=0; $i < count($tests); $i++) {if($tests[$i] == 'bar'){echo 'selected';} }?>>BAR</option>
          <option value="gmat" <? for($i=0; $i < count($tests); $i++) {if($tests[$i] == 'gmat'){echo 'selected';} }?>>GMAT</option>
          <option value="gre" <? for($i=0; $i < count($tests); $i++) {if($tests[$i] == 'gre'){echo 'selected';} }?>>GRE</option>
          <option value="standardized test" <? for($i=0; $i < count($tests); $i++) {if($tests[$i] == 'standardized test'){echo 'selected';} }?>>Standardized 
          Test</option>
          <option value="college" <? for($i=0; $i < count($tests); $i++) {if($tests[$i] == 'college'){echo 'selected';} }?>>College</option>
          <option value="any test" <? for($i=0; $i < count($tests); $i++) {if($tests[$i] == 'any test'){echo 'selected';} }?>>Any 
          Test</option>
          <option value="learning" <? for($i=0; $i < count($tests); $i++) {if($tests[$i] == 'learning'){echo 'selected';} }?>>Learning</option>
          <option value="other" <? for($i=0; $i < count($tests); $i++) {if($tests[$i] == 'other'){echo 'selected';} }?>>Other</option>
        </select>
        </font></strong></td>
    </tr>
    <tr align="left" valign="top">
      <td>&nbsp;</td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Company Ranking</strong> 
        <em>(Ability to drive quality sales to SilentTimer.com)<br>
        <select name="cboCompanyRanking" size="5" id="cboCompanyRanking">
          <option value="5" <? if($ranking == '5') {echo 'selected';}?>>Awesome</option>
          <option value="4" <? if($ranking == '4') {echo 'selected';}?>>Great</option>
          <option value="3" <? if($ranking == '3') {echo 'selected';}?>>Ok</option>
          <option value="2" <? if($ranking == '2') {echo 'selected';}?>>Ehhhh...</option>
          <option value="1" <? if($ranking == '1') {echo 'selected';}?>>Not so hot</option>
        </select>
        </em></font></td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><strong><font face="Arial, Helvetica, sans-serif">Contact Name<br>
        <input name="txtContactName" type="text" id="txtContactName" value="<? echo $name;?>">
        </font></strong></td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="27%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Phone<br>
              <input name="txtPhone" type="text" id="txtPhone" value="<? echo $p;?>">
              </font></strong></td>
            <td width="73%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Phone 
              2<br>
              <input name="txtPhone2" type="text" id="txtPhone2" value="<? echo $p2;?>">
              </font></strong></td>
          </tr>
        </table>
        
      </td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="27%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Email<br>
              <input name="txtEmail" type="text" id="txtEmail3" value="<? echo $e;?>" size="30">
              </font></strong></td>
            <td width="73%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Email 
              2<br>
              <input name="txtEmail2" type="text" id="txtEmail22" value="<? echo $e2;?>" size="30">
              </font></strong></td>
          </tr>
        </table>
        
      </td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Address</strong></font><br> 
        <textarea name="txtAddress" cols="30" rows="2" id="txtAddress"><? echo $address;?></textarea> 
      </td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr align="left" valign="top"> 
            <td width="20%"><strong><font size="2" face="Arial, Helvetica, sans-serif">City<br>
              <input name="txtCity" type="text" id="txtCity" value="<? echo $city;?>">
              </font></strong></td>
            <td width="7%"><strong><font size="2" face="Arial, Helvetica, sans-serif">State<br>
              <select name="cboState" id="cboState">
                <option value="">Select</option>
                <?    
					// build combo box for he shipping options from the database.
					// SQL to get data from shippingoption and shipper table
					$sql = "SELECT State, Name
							FROM tblState
							ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot execute query!");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                <option value="<? echo $row[State]; ?>" <? if($row[State] == $state){echo 'selected';}?>><? echo $row[State];?> 
                - <? echo $row[Name];?></option>
                <?
					}
				?>
              </select>
              </font></strong></td>
            <td width="10%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Zip<br>
              <input name="txtZip" type="text" id="txtZip" value="<? echo $zipcode;?>" size="10">
              </font></strong></td>
            <td width="63%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Country<br>
              <input name="txtCountry" type="text" id="txtCountry" value="<? echo $country;?>">
              </font></strong></td>
          </tr>
        </table>
        <strong></strong></td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><strong><font face="Arial, Helvetica, sans-serif">Notes<br>
        <textarea name="txtNotes" cols="50" rows="5" id="txtNotes"><? echo $notes;?></textarea>
        </font></strong></td>
    </tr>
  </table>
  <p> <br>
  </p>
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td width="49%"><input name="Update" type="submit" id="Update2" value="Update Contact"> 
        &nbsp;&nbsp;&nbsp; <input type="reset" name="Reset" value="Reset"></td>
      <td width="51%"><div align="right">
          <input name="Delete" type="submit" id="Delete2" value="X Delete Contact">
        </div></td>
    </tr>
  </table>
  <p>
  
  <?
  	If ($Update) 
	{
		echo "<p align='left'><font color='#0000FF' size='4' face='Arial, Helvetica, sans-serif'><strong>Updated!</strong></font></p>";
	}
	
	mysql_close($link);
  ?>
  
  </p>
  <p>

  </p>
</form>
<p align="right"><strong><font size="3" face="Arial, Helvetica, sans-serif"><a href="view.php">View 
  Records</a></font></strong></p>
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