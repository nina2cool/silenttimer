<?php
//security for page
session_start();

//security check
If (session_is_registered('userName'))
{

$userName = $_SESSION['userName'];
			
$location = "localhost";
$user = "silenttimer";
$pass = "2559";
$db = "silenttimer";

$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");


		if($Insert)
		{
			
							
			
				$now = date("Y-m-d H:i:s");

				//find inserter's name.......
				
					$sql = "SELECT * FROM tblCompanyRep WHERE UserName = '$userName'";
					$result = mysql_query($sql) or die("cannot get name");
							
					while($row = mysql_fetch_array($result))
					{
						$fName = $row[FirstName];
				
					}
				
				///////
				
				
				$query = "INSERT INTO tblCompanyContacts(CompanyName, WebSite, TestCategory, ContactName, Phone, Phone2, Email, Email2, Notes, DateTime, InsertedBy, CompanyType, CompanyRanking, Address, City, State, ZipCode, Country) VALUES ('$txtCompanyName', '$txtWebSite', ";
				$cats = "";
				
				// loop to build array into one variable...
				for($i=0; $i < count($cboCategory); $i++)
				{
					if($cats != ""){$cats .= " ";}					
					$cats .= $cboCategory[$i];
				}
				
				$query .= " '$cats', '$txtContactName', '$txtPhone', '$txtPhone2','$txtEmail', '$txtEmail2', '$txtNotes', '$now', '$fName', '$cboCompanyType', '$cboCompanyRanking', '$txtAddress', '$txtCity', '$cboState', '$txtZip', '$txtCountry')";
				
				//echo $query;
				mysql_query($query) or die("I cannot execute your request, please try again.  Sorry for the inconvenience. - erik");
			
				$sql = "SELECT ContactID FROM tblCompanyContacts WHERE CompanyName = '$txtCompanyName' AND WebSite = '$txtWebSite'";
				
				//put SQL statement into result set for loop through records
				$result = mysql_query($sql) or die("Cannot execute query!");

				while($row = mysql_fetch_array($result))
				{
					$cID = $row[ContactID];
				}
				
				// loop to insert tests into table...
				for($i=0; $i < count($cboCategory); $i++)
				{
					$query = "INSERT INTO CompanyTests(ContactID, Test) VALUES ('$cID', '";					
					$query .= $cboCategory[$i];
					$query .= "')";
					//echo $query;
					mysql_query($query) or die("I cannot execute your request, please try again.  Sorry for the inconvenience. - erik2");
				
				}
				
				mysql_close($link);
				header("location:view.php");
				
		
		}

?>

<html>
<head>
<title>Insert Contact</title>
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
  Insert a new Record</font></strong></p>
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="7">
    <tr align="left" valign="top"> 
      <td width="2%">&nbsp;</td>
      <td width="98%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Company 
        Name<br>
        <input name="txtCompanyName" type="text" id="txtCompanyName" size="50">
        </strong></font></td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Web Site 
        </strong><em>(make sure to have an http:// in front of the www)</em><strong><br>
        <input name="txtWebSite" type="text" id="txtWebSite" value="http://" size="50">
        </strong></font></td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Company 
          Type<br>
          <select name="cboCompanyType" id="cboCompanyType">
            <option selected>Select</option>
            <option>-------</option>
            <option value="informational">Informational</option>
            <option value="test prep">Test Prep</option>
            <option value="books">Books</option>
            <option value="online courses">Online Courses</option>
            <option value="all">All</option>
            <option value="other">Other</option>
          </select>
          </strong></font></p></td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><font size="2"><strong><font face="Arial, Helvetica, sans-serif">Test 
        Category<br>
        <select name="cboCategory[]" size="5" multiple>
          <option value="sat">SAT</option>
          <option value="act">ACT</option>
          <option value="mcat">MCAT</option>
          <option value="lsat">LSAT</option>
          <option value="bar">BAR</option>
          <option value="gmat">GMAT</option>
          <option value="gre">GRE</option>
          <option value="standardized test">Standardized Test</option>
          <option value="college">College</option>
          <option value="any test">Any Test</option>
          <option value="learning">Learning</option>
          <option value="other">Other</option>
        </select>
        </font></strong></font></td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Company Ranking</strong> 
        <em>(Ability to drive quality sales to SilentTimer.com)<br>
        <select name="cboCompanyRanking" size="5" id="cboCompanyRanking">
          <option value="5">Awesome</option>
          <option value="4">Great</option>
          <option value="3">Ok</option>
          <option value="2">Ehhhh...</option>
          <option value="1">Not so hot</option>
        </select>
        </em></font></td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Contact Name<br>
        <input name="txtContactName" type="text" id="txtContactName">
        </font></strong></td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><strong></strong> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="27%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Phone<br>
              <input name="txtPhone" type="text" id="txtPhone">
              </font></strong></td>
            <td width="73%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Phone 
              2<br>
              <input name="txtPhone2" type="text" id="txtPhone22">
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
              <input name="txtEmail" type="text" id="txtEmail3" size="30">
              </font></strong></td>
            <td width="73%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Email 
              2<br>
              <input name="txtEmail2" type="text" id="txtEmail22" size="30">
              </font></strong></td>
          </tr>
        </table>
        
      </td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>Address</strong></font><br>
        <textarea name="txtAddress" cols="30" rows="2" id="txtAddress"></textarea></td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><strong> </strong>
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr align="left" valign="top"> 
            <td width="20%"><strong><font size="2" face="Arial, Helvetica, sans-serif">City<br>
              <input name="txtCity" type="text" id="txtCity">
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
				<option value="<? echo $row[State]; ?>"><? echo $row[State];?> - <? echo $row[Name];?></option>
				<?
					}
					
					mysql_close($link);
				?>
			  </select>
              </font></strong></td>
            <td width="10%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Zip<br>
              <input name="txtZip" type="text" id="txtZip" size="10">
              </font></strong></td>
            <td width="63%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Country<br>
              <input name="txtCountry" type="text" id="txtCountry" value="USA">
              </font></strong></td>
          </tr>
        </table></td>
    </tr>
    <tr align="left" valign="top"> 
      <td>&nbsp;</td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Notes<br>
        <textarea name="txtNotes" cols="50" rows="5" id="txtNotes"></textarea>
        </font></strong></td>
    </tr>
  </table>
  <p> <br>
    <input name="Insert" type="submit" id="Insert" value="Insert Contact">
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