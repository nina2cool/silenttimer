<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			



?><title>Search for a Customer</title> <font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Search for a Customer</strong></font> 
<form name="form" method="post" action="SearchResults.php?sort=tblPurchase2.OrderDateTime&d=DESC">
                
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
    <tr> 
      <td> <table width="100%" border="1" cellspacing="0" cellpadding="3">
        <tr>
          <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
              <input name="chkpurchaseid" type="checkbox" id="chkpurchaseid" value="y">
          </font></strong></div></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">Purchase
              ID</font></td>
          <td><input name="txtPurchaseID" type="text" id="txtPurchaseID" size="50"></td>
        </tr>
          <tr> 
            <td width="10%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><input name="chkfirstname" type="checkbox" id="chkfirstname" value="y">
                </font></strong></div></td>
            <td width="20%"><font size="2" face="Arial, Helvetica, sans-serif">First 
              Name</font></td>
            <td> <input name="txtFirstName" type="text" id="txtFirstName" size="50"></td>
          </tr>
          <tr> 
            <td width="10%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chklastname" type="checkbox" id="chklastname" value="y">
                </font></strong></div></td>
            <td width="20%"><font size="2" face="Arial, Helvetica, sans-serif">Last 
              Name</font></td>
            <td> <input name="txtLastName" type="text" id="txtLastName" size="50"></td>
          </tr>
          <tr>
            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="chkaddress" type="checkbox" id="chkaddress" value="y">
            </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Address
                1 </font></td>
            <td><input name="txtAddress" type="text" id="txtAddress" size="50"></td>
          </tr>
          <tr> 
            <td width="10%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chkcity" type="checkbox" id="chkcity" value="y">
                </font></strong></div></td>
            <td width="20%"><font size="2" face="Arial, Helvetica, sans-serif">City</font></td>
            <td> <input name="txtCity" type="text" id="txtCity" size="50"></td>
          </tr>
          <tr> 
            <td width="10%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chkstate" type="checkbox" id="chkstate" value="y">
                </font></strong></div></td>
            <td width="20%"><font size="2" face="Arial, Helvetica, sans-serif">State</font></td>
            <td> <input name="txtState" type="text" id="txtState" size="50"></td>
          </tr>
          <tr> 
            <td width="10%" height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chkzipcode" type="checkbox" id="chkzipcode" value="y">
                </font></strong></div></td>
            <td width="20%"><font size="2" face="Arial, Helvetica, sans-serif">Zip 
              Code</font></td>
            <td> <input name="txtZipCode" type="text" id="txtZipCode" size="50"></td>
          </tr>
          <tr> 
            <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chkemail" type="checkbox" id="chkemail" value="y">
                </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Email</font></td>
            <td> <input name="txtEmail" type="text" id="txtEmail" size="50"></td>
          </tr>
          <tr> 
            <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chkcountry" type="checkbox" id="chkcountry" value="y">
                </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Country</font></td>
            <td> <input name="txtCountry" type="text" id="txtCountry" size="50"></td>
          </tr>
          <tr> 
            <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chkphone" type="checkbox" id="chkphone" value="y">
                </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Phone 
              Number</font></td>
            <td> <input name="txtPhone" type="text" id="txtPhone" size="50"></td>
          </tr>
          <tr> 
            <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chkebayname" type="checkbox" id="chkebayname" value="y">
                </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">eBay/Amazon 
              Name</font></td>
            <td> <input name="txtEbayName" type="text" id="txtEbayName" size="50"></td>
          </tr>
          <tr> 
            <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chklast4" type="checkbox" id="chklast4" value="y">
                </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Last 
              4 Digits</font></td>
            <td> <input name="txtLast4" type="text" id="txtLast4" size="50"></td>
          </tr>
          <tr> 
            <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chkauth" type="checkbox" id="chkauth" value="y">
                </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">AUTH/TKT</font></td>
            <td> <input name="txtAuth" type="text" id="txtAuth" size="50"></td>
          </tr>
          <tr> 
            <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chktestid" type="checkbox" id="chktestid" value="y">
                </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Test 
              ID</font></td>
            <td> <font size="2" face="Arial, Helvetica, sans-serif">
              <select name="txtTestID" tabindex="" id="txtTestID">
                <option value="" selected>Test</option>
                <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql = "SELECT * FROM tblTests ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot execute query!");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                <option value="<? echo $row[TestID]; ?>" <? if($row[TestID] == $TestID){echo "selected";}?><? if($row[Name] == $tURL){echo "selected";}?>><? echo $row[Name]; ?></option>
                <?
					}
				?>
              </select>
            </font></td>
          </tr>
          <tr> 
            <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chktestdate" type="checkbox" id="chktestdate" value="y">
                </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Test 
              Date</font></td>
            <td> <input name="txtTestDate" type="text" id="txtTestDate" size="20">
              <font size="2" face="Arial, Helvetica, sans-serif">ex: 2004-12-04</font></td>
          </tr>
          <tr>
            <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="chkproduct" type="checkbox" id="chkproduct" value="y">
            </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Product ID </font></td>
            <td><input name="ProductID" type="text" id="ProductID" size="10"></td>
          </tr>
          <tr> 
            <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chkreferredby" type="checkbox" id="chkreferredby" value="y">
                </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Referred 
              By</font></td>
            <td> <font size="2" face="Arial, Helvetica, sans-serif">
              <select name="ReferredBy" tabindex="" id="ReferredBy" class="text">
                <option value="" selected>Select</option>
                <? 
					$sql = "SELECT * FROM tblReferredBy";
					
					$result = mysql_query($sql) or die("Cannot get ReferredBy");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                <option value="<? echo $row[ReferredByID]; ?>" <? if($row[ReferredByID] == $ReferredBy){echo "selected";}?>><? echo $row[Name]; ?></option>
                <?
					}
				?>
              </select>
            </font></td>
          </tr>
          <tr> 
            <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chktype" type="checkbox" id="chktype" value="y">
                </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Type</font></td>
            <td> <font size="2" face="Arial, Helvetica, sans-serif">
              <select name="Type" tabindex="" id="Type" class="text">
                <option value="" selected>Select</option>
                <? 
					$sql3 = "SELECT * FROM tblCustomerType ORDER BY Type";
					$result3 = mysql_query($sql3) or die("Cannot get State");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
                <option value="<? echo $row3[TypeID]; ?>"<? if($row3[TypeID] == 1){echo "selected";}?>><? echo $row3[Type]; ?></option>
                <?
					}
				?>
              </select>
            </font></td>
          </tr>
          <tr> 
            <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chkschool" type="checkbox" id="chkschool" value="y">
                </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">School</font></td>
            <td> <input name="txtSchool" type="text" id="txtSchool" size="50"></td>
          </tr>
          <tr> 
            <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chkprepclass" type="checkbox" id="chkprepclass" value="y">
                </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Prep 
              Class</font></td>
            <td> <input name="txtPrepClass" type="text" id="txtPrepClass" size="50"></td>
          </tr>
          <tr> 
            <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chkitemnumber" type="checkbox" id="chkitemnumber" value="y">
                </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Item 
              Number</font></td>
            <td> <input name="txtItemNumber" type="text" id="txtItemNumber" size="50"></td>
          </tr>
          <tr> 
            <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chkpaypalnumber" type="checkbox" id="chkpaypalnumber" value="y">
                </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Paypal 
              Number</font></td>
            <td> <input name="txtPaypalNumber" type="text" id="txtPaypalNumber" size="50"></td>
          </tr>
          <tr> 
            <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chkcustomerid" type="checkbox" id="chkcustomerid" value="y">
                </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Customer 
              ID</font></td>
            <td> <input name="txtCustomerID" type="text" id="txtCustomerID" size="10"></td>
          </tr>
          <tr> 
            <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="chkstatus" type="checkbox" id="chkstatus" value="y" checked>
                </font></strong></div></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Status</font></td>
            <td><select name="Status" id="Status">
                <option value="active" selected>active</option>
                <option value="cancel">cancel</option>
              </select></td>
          </tr>
        </table>
        </td>
    </tr>
    <tr> 
      <td><input type="submit" name="Submit" value="Search"></td>
    </tr>
  </table>
</form>

			  
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
mysql_close($link);

// finishes security for page
}
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
