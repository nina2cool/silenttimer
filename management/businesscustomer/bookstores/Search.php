<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			



?><title>Search for a Customer</title> 
<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Search for a
Bookstore
</strong></font>
<form name="form" method="post" action="SearchResults.php">
                
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
    <tr> 
      <td> <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
        <tr bgcolor="#FFFFCC">
          <td><strong><font size="3" face="Arial, Helvetica, sans-serif">Bookstore
                Info </font></strong></td>
          </tr>
        <tr>
          <td valign="top"><table width="50%"  border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td width="7%" height="34"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkbusinesscustomerid" type="checkbox" id="chkbusinesscustomerid" value="y">
              </strong></font></div></td>
              <td width="37%"><font size="2" face="Arial, Helvetica, sans-serif">-Business
                  Customer ID-</font></td>
              <td width="56%"><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="BusinessCustomerID" type="text" id="BusinessCustomerID" size="10">
              </font></td>
            </tr>
            <tr>
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkname" type="checkbox" id="chkname" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Store
                  Name- </font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="Name" type="text" id="Name" size="35">
              </font></td>
            </tr>
            <tr>
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkchain" type="checkbox" id="chkchain" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Chain-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="Chain" type="text" id="Chain" size="35">
              </font></td>
            </tr>
            <tr>
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkincnumber" type="checkbox" id="chkincnumber" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-B&amp;N Inc
                  #-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="IncNumber" type="text" id="IncNumber" size="35">
              </font></td>
            </tr>
            <tr>
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkbncbnumber" type="checkbox" id="chkbncbnumber" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-B&amp;N College
                  #-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="BNCBNumber" type="text" id="BNCBNumber" size="35">
              </font></td>
            </tr>
            <tr>
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkbordersstorenumber" type="checkbox" id="chkbordersstorenumber" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Borders
                  #-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="BordersStoreNumber" type="text" id="BordersStoreNumber" size="35">
              </font></td>
            </tr>
            <tr>
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkfollettstorenumber" type="checkbox" id="chkfollettstorenumber" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Follett
                  #-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="FollettStoreNumber" type="text" id="FollettStoreNumber" size="35">
              </font></td>
            </tr>
            <tr>
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkaddress" type="checkbox" id="chkaddress" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Address
                  1-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="Address" type="text" id="Address" size="35">
              </font></td>
            </tr>
            <tr>
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkaddress2" type="checkbox" id="chkaddress2" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Address
                  2-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="Address2" type="text" id="Address2" size="35">
              </font></td>
            </tr>
            <tr>
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkaddress3" type="checkbox" id="chkaddress3" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Address
                  3-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="Address3" type="text" id="Address3" size="35">
              </font></td>
            </tr>
            <tr>
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkcity" type="checkbox" id="chkcity" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-City-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="City" type="text" id="City" size="35">
              </font></td>
            </tr>
            <tr>
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkstate" type="checkbox" id="chkstate" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">State</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <select name="State" tabindex="" id="State" class="text">
                  <option value="" selected>Select</option>
                  <? 
					$sql3 = "SELECT * FROM tblState ORDER BY State";
					$result3 = mysql_query($sql3) or die("Cannot get State");
					
					while($row3 = mysql_fetch_array($result3))
					{
				?>
                  <option value="<? echo $row3[State]; ?>"><? echo $row3[State]; ?></option>
                  <?
					}
				?>
                </select>
              </font></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkzipcode" type="checkbox" id="chkzipcode" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Zip Code-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="ZipCode" type="text" id="ZipCode" size="10">
              </font></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkcountry" type="checkbox" id="chkcountry" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Country</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <select name="Country" tabindex="" id="Country" class="text">
                      <option value="" selected>Select</option>
                      <? 
					$sql55 = "SELECT Country FROM tblBusinessCustomer GROUP BY Country ORDER BY Country ASC";
					$result55 = mysql_query($sql55) or die("Cannot get CountryB");
					
					while($row55 = mysql_fetch_array($result55))
					{
					$Country = $row55[Country];
					
				?>
                      <option value="<? echo $row55[Country]; ?>"><? echo $row55[Country]; ?></option>
                      <?
					}
				?>
                </select>
              </font></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkemail" type="checkbox" id="chkemail" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Email-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="Email" type="text" id="Email" size="35">
              </font></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkphone" type="checkbox" id="chkphone" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Phone Number-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="Phone" type="text" id="Phone" size="20">
              </font></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkwebsite" type="checkbox" id="chkwebsite" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Website-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="Website" type="text" id="Website" size="35">
              </font></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkcustomertype" type="checkbox" id="chkcustomertype" value="y" checked>
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Customer
                  Type</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <select name="CustomerType" tabindex="" id="CustomerType" class="text">
                  <option value="" selected>Select</option>
                  <? 
					$sql3 = "SELECT CustomerType FROM tblBusinessCustomer GROUP BY CustomerType ORDER BY CustomerType ASC";
					$result3 = mysql_query($sql3) or die("Cannot get State");
					
					while($row3 = mysql_fetch_array($result3))
					{
					
				?>
                  <option value="<? echo $row3[CustomerType]; ?>"<? if($row3[CustomerType] == "Bookstore"){echo "selected";}?>><? echo $row3[CustomerType]; ?></option>
                  <?
					}
				?>
                </select>
              </font></td>
            </tr>
          </table>            
            </td>
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
