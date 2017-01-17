<?php // Begin PHP

//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// ----------- CODE-------------------


	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	If ($_POST['Submit'] == "Add Shipper")
	
	{
	
		$CompanyName = $_POST['txtCompanyName'];
		$ContactPerson = $_POST['txtContactPerson'];
		$Phone = $_POST['txtPhone'];
		$Email = $_POST['txtEmail'];
		$Info = $_POST['txtInfo'];
		$DomMain = $_POST['DomMain'];
		$DomOff = $_POST['DomOff'];
		$International = $_POST['International'];
		$POBox = $_POST['POBox'];
		$Military = $_POST['Military'];
		$Status = $_POST['Status'];


		// code to insert value from the form into the database.
		$sql = "INSERT INTO tblShipper (CompanyName, ContactPerson, Phone, Email, Info, DomesticMainland, DomesticOffshore, 
		International, POBox, Military, Status)
		VALUES('$CompanyName', '$ContactPerson', '$Phone', '$Email', '$Info', '$DomMain', '$DomOff', '$International',
		'$POBox', '$Military', '$Status')";

		mysql_query($sql); //this executes the SQL and inserts the values into the database
	
	} // end of IF statement
	
	
//all the code below is HTML is to build the simple input form.
?> <font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add 
a Shipper</strong></font>
<form name="form" method="post" action="">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td width="25%"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Company
            Name&nbsp;</font></div></td>
      <td width="75%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="txtCompanyName" type="text" id="txtCompanyName" size="40" maxlength="50">
      </strong></font></td>
    </tr>
    <tr>
      <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Contact
            Person&nbsp;</font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="txtContactPerson" type="text" id="txtContactPerson" size="40" maxlength="100">
      </strong></font></td>
    </tr>
    <tr>
      <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Phone&nbsp;</font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="txtPhone" type="text" id="txtPhone" size="30" maxlength="30">
      </strong></font></td>
    </tr>
    <tr>
      <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Email&nbsp;</font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="txtEmail" type="text" id="txtEmail" size="40" maxlength="100">
      </strong></font></td>
    </tr>
    <tr>
      <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Info&nbsp;</font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>
        <input name="txtInfo" type="text" id="txtInfo" size="40" maxlength="150">
      </strong></font></td>
    </tr>
    <tr>
      <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Domestic
            Mainland </font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
            <select name="DomMain" id="DomMain">
              <option value="y"<? if($DomMain == "y") { ?> selected<? } ?>>y</option>
              <option value="n"<? if($DomMain == "n") { ?> selected<? } ?>>n</option>
            </select>
            </font></td>
    </tr>
    <tr>
      <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Domestic
            Offshore </font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
            <select name="DomOff" id="DomOff">
              <option value="y"<? if($DomOff == "y") { ?> selected<? } ?>>y</option>
              <option value="n"<? if($DomOff == "n") { ?> selected<? } ?>>n</option>
            </select>
            </font></td>
    </tr>
    <tr>
      <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">International</font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
            <select name="International" id="International">
              <option value="y"<? if($International == "y") { ?> selected<? } ?>>y</option>
              <option value="n"<? if($International == "n") { ?> selected<? } ?>>n</option>
            </select>
            </font></td>
    </tr>
    <tr>
      <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">POBox</font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
            <select name="POBox" id="POBox">
              <option value="y"<? if($POBox == "y") { ?> selected<? } ?>>y</option>
              <option value="n"<? if($POBox == "n") { ?> selected<? } ?>>n</option>
            </select>
            </font></td>
    </tr>
    <tr>
      <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Military</font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
            <select name="Military" id="Military">
              <option value="y"<? if($Military == "y") { ?> selected<? } ?>>y</option>
              <option value="n"<? if($Military == "n") { ?> selected<? } ?>>n</option>
            </select>
            </font></td>
    </tr>
    <tr>
      <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Status</font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
            <select name="Status" id="Status">
              <option value="active"<? if($Status == "active") { ?> selected<? } ?>>active</option>
              <option value="inactive"<? if($Status == "inactive") { ?> selected<? } ?>>inactive</option>
            </select>
            </font></td>
    </tr>
  </table>
  <p> 
    <input type="submit" name="Submit" value="Add Shipper">
    <input type="reset" name="Submit2" value="Reset">
  </p>

</form>

<? // -------------- END MY CODE -------------------

mysql_close($link); //this closes the database connection

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// has links that show up at the bottom in it.
require "../include/footerlinks.php";




// finishes security for page
}
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>