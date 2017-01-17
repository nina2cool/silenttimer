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

#Code for Adding to Table

#Double check the table names and spaces and commas in the code. Delete primary key IDs. 

		// build connection to database
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		
		$Now = date("Y-m-d");
		
		If ($_POST['Add'] == "Add")
		{
		
		$Name = $_POST['Name'];
		$Chain = $_POST['Chain'];
		$ChainDropDown = $_POST['ChainDropDown'];
		$ChainID = $_POST['ChainID'];
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
		$CountryDropDown = $_POST['CountryDropDown'];
		$Phone1 = $_POST['Phone1'];
		$Fax1 = $_POST['Fax1'];
		$Email1 = $_POST['Email1'];
		$Website = $_POST['Website'];
		$Notes = $_POST['Notes'];
		$Status = $_POST['Status'];
		$LSAT = $_POST['LSAT'];
		$SAT = $_POST['SAT'];
		$CallFirst = $_POST['CallFirst'];
		$SpecialOrder = $_POST['SpecialOrder'];
		$nacsID = $_POST['nacsID'];
		
		if($Chain == "") { $Chain = $ChainDropDown; }
		if($Country == "") { $Country = $CountryDropDown; }

		$sql = "INSERT INTO tblBusinessCustomer(Name, Chain, CustomerType, IncNumber, BNCBNumber, BordersStoreNumber, 
		Address, Address2, Address3, City, State, ZipCode, Country, Phone1, Fax1, Email1, Website, Notes, Status, LSAT, SAT, CallFirst, SpecialOrder, FollettStoreNumber, nacsID) 
		VALUES('$Name', '$Chain', 'Bookstore', '$IncNumber', '$BNCBNumber', '$BordersStoreNumber', 
		'$Address', '$Address2', '$Address3', '$City', '$State', '$ZipCode', '$Country', '$Phone1', '$Fax1', '$Email1', 
		'$Website', '$Notes', '$Status', '$LSAT', '$SAT', '$CallFirst', '$SpecialOrder', '$FollettStoreNumber', '$nacsID');"; 
		
		$result = mysql_query($sql) or die("Cannot insert new bookstore"); 
		
		}

#Create Table for User Input
?>

<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
a New Bookstore</strong></font>
<form name="form1" method="post" action="">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFFFCC">
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Store
          Name<br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Name" type="text" id="Name" size="50">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Chain<br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="ChainDropDown" class="text" id="select4">
          <option value = "" selected>Please Select</option>
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT Chain FROM tblBusinessCustomer
						WHERE Chain <> '' GROUP BY Chain ORDER BY Chain";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[Chain];?>" <? if($row[Chain] == $Chain){echo "selected";}?>><? echo $row[Chain];?></option>
          <?
						}
					?>
        </select>
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">OR<strong>
        <input name="Chain" type="text" id="Chain" size="20">
      </strong></font></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Address</font><br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Address" type="text" id="Address" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Address
          2<br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Address2" type="text" id="Address2" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Address
          3 (avoid if possible) <br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Address3" type="text" id="Address3" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">City<br>
      </font></td>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="City" type="text" id="City">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">State<br>
      </font></td>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> </font><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="State" class="text" id="select5">
          <option value = "" selected>State</option>
          <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql = "SELECT State, Name
								FROM tblState
								
								ORDER BY State";
						//put SQL statement into result set for loop through records
						$result = mysql_query($sql) or die("Cannot execute query!");
						
						while($row = mysql_fetch_array($result))
						{
					?>
          <option value="<? echo $row[State];?>" <? if($row[State] == $State){echo "selected";}?>><? echo $row[State];?></option>
          <?
						}
					?>
        </select>
      </font><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"> </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">Zip
          Code (5 digits only) <br>
      </font></td>
      <td><strong><font color="#000033" size="2" face="Arial, Helvetica, sans-serif">
        <input name="ZipCode" type="text" id="ZipCode" size="10" maxlength="20">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Country<br>
      </font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <select name="CountryDropDown" id="select7">
          <option value="US" selected>US</option>
          <option value="CA">Canada</option>
        </select>
        </font></strong><font size="2" face="Arial, Helvetica, sans-serif">OR<strong>
        <input name="Country" type="text" id="Country" size="5">
      </strong></font></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Phone
            Number</font> 1 (Ex: 512-258-8668)</font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Phone1" type="text" id="Phone13">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Fax
          1 (Ex: 512-258-8668)</font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Fax1" type="text" id="Fax14">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#000033">Email
            Address</font> 1</font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Email1" type="text" id="Email13" size="40">
      </font></strong></td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Website
          (include http://, etc) <font size="1"><a href="<? echo $Website; ?>" target="_blank">check
          link </a></font></font></td>
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <input name="Website" type="text" id="Website3" size="60">
      </font></strong></td>
    </tr>
  </table>
  <br>
  <table width="100%"  border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="50%"><table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFDFFF">
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">B&amp;N Inc.
                Number<br>
            </font></td>
            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="IncNumber" type="text" id="IncNumber3" size="10">
            </font></strong></div></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">B&amp;N College
                Bookstore Number<br>
            </font></td>
            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="BNCBNumber" type="text" id="BNCBNumber3" size="10">
            </font></strong></div></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Borders Store
                Number<br>
            </font></td>
            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="BordersStoreNumber" type="text" id="BordersStoreNumber3" size="10">
            </font></strong></div></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Follett Store
                Number</font></td>
            <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="FollettStoreNumber" type="text" id="FollettStoreNumber3" size="10">
            </font></div></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">NACSCORP ID </font></td>
            <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="nacsID" type="text" id="FollettStoreNumber3" size="10">
            </font></div></td>
          </tr>
        </table>
          <div align="center"></div></td>
      <td><table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#E8F3FF">
          <tr>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Carries
                LSAT timers? </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="LSAT" id="select13">
                <option value="y" selected<? if($LSAT == "y") { ?>selected<? } ?>>y</option>
                <option value="n"<? if($LSAT == "n") { ?>selected<? } ?>>n</option>
                            </select>
            </font></td>
          </tr>
          <tr>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Carries
                SAT timers? </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="SAT" id="select14">
                <option value="y" selected<? if($SAT == "y") { ?>selected<? } ?>>y</option>
                <option value="n"<? if($SAT == "n") { ?>selected<? } ?>>n</option>
                            </select>
            </font></td>
          </tr>
          <tr>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Call
                First? </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="CallFirst" id="select15">
                <option value="y" selected<? if($CallFirst == "y") { ?>selected<? } ?>>y</option>
                <option value="n"<? if($CallFirst == "n") { ?>selected<? } ?>>n</option>
                            </select>
            </font></td>
          </tr>
          <tr>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Special
                Order only? </font></td>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="SpecialOrder" id="select16">
                <option value="y"<? if($SpecialOrder == "y") { ?>selected<? } ?>>y</option>
                <option value="n" selected<? if($SpecialOrder == "n") { ?>selected<? } ?>>n</option>
                            </select>
            </font></td>
          </tr>
          <tr>
            <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
            <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="Status" id="select17">
                <option value="active" selected<? if($Status == "active") { ?> selected<? } ?>>active</option>
                <option value="inactive"<? if($Status == "inactive") { ?> selected<? } ?>>inactive</option>
                            </select>
            </font></strong></td>
          </tr>
        </table>
          <div align="center"></div></td>
    </tr>
  </table>
  <br>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif">Notes</font></td>
      <td colspan="2"><strong><font size="2" face="Arial, Helvetica, sans-serif">
        <textarea name="Notes" cols="40" id="Notes"></textarea>
      </font></strong></td>
    </tr>
  </table>
  <p>
    <input name="Add" type="submit" id="Add" value="Add">
</p>
</form>

<?

//close connection to database
mysql_close($link);

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