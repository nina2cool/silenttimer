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



?><title>Search for a Customer</title> 
<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Search for a
Customer</strong></font>
<form name="form" method="post" action="SearchResults.php?sort=tblPurchase2.OrderDateTime&d=DESC">
                
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
    <tr> 
      <td> <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
        <tr bgcolor="#FFFFCC">
          <td><strong><font size="3" face="Arial, Helvetica, sans-serif">Customer
                Info </font></strong></td>
          <td><strong><font size="3" face="Arial, Helvetica, sans-serif">Purchase Info </font></strong></td>
        </tr>
        <tr>
          <td valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td height="34"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkcustomerid" type="checkbox" id="chkcustomerid" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Customer
                  ID-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="CustomerID" type="text" id="CustomerID" size="10">
              </font></td>
            </tr>
            <tr>
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkcompany" type="checkbox" id="chkcompany" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Company
                  Name- </font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="Company" type="text" id="Company" size="35">
              </font></td>
            </tr>
            <tr>
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkfirstname" type="checkbox" id="chkfirstname" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">First Name-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="FirstName" type="text" id="FirstName" size="35">
              </font></td>
            </tr>
            <tr>
              <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chklastname" type="checkbox" id="chklastname" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Last Name-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="LastName" type="text" id="LastName" size="35">
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
                <select name="CountryID" tabindex="" id="CountryID" class="text">
                      <option value="" selected>Select</option>
                      <? 
					$sql55 = "SELECT tblCustomer.CountryID, tblShipLocation.Name FROM tblCustomer
					INNER JOIN tblShipLocation ON tblCustomer.CountryID = tblShipLocation.LocationID
					GROUP BY tblCustomer.CountryID
					ORDER BY tblShipLocation.Name";
					$result55 = mysql_query($sql55) or die("Cannot get CountryB");
					
					while($row55 = mysql_fetch_array($result55))
					{
					$CountryID = $row55[CountryID];
					$Name = $row55[Name];
				?>
                      <option value="<? echo $row55[CountryID]; ?>"><? echo $row55[Name]; ?></option>
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
                  <input name="chkebayname" type="checkbox" id="chkebayname" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-eBay/Amazon
                  Name-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="EbayName" type="text" id="EbayName" size="20">
              </font></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkschool" type="checkbox" id="chkschool" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-School-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="School" type="text" id="School" size="35">
              </font></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chkprepclass" type="checkbox" id="chkprepclass" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Prep Class-</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="PrepClass" type="text" id="PrepClass" size="35">
              </font></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>
                  <input name="chktype" type="checkbox" id="chktype" value="y">
              </strong></font></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Customer
                  Type</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
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
          </table>            
            </td>
          <td valign="top"><table width="100%"  border="0" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkpurchaseid" type="checkbox" id="chkpurchaseid" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Purchase
                  ID-</font></td>
              <td><input name="PurchaseID" type="text" id="PurchaseID" size="5"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkdaterange" type="checkbox" id="chkdaterange" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Date Range
                  <font size="1">( add 1 day to end date)</font></font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="StartDate" type="text" id="StartDate" size="14">              
                to 
                <input name="EndDate" type="text" id="EndDate" size="14">
              </font></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chktestid" type="checkbox" id="chktestid" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Test ID</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <select name="TestID" tabindex="" id="TestID">
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
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Test Date-</font></td>
              <td><input name="TestDate" type="text" id="TestDate" size="14">
                  <font size="2" face="Arial, Helvetica, sans-serif">ex: 2004-12-04</font></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkreferredby" type="checkbox" id="chkreferredby" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Referred
                  By</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
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
                  <input name="chksubtotal" type="checkbox" id="chksubtotal" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Subtotal</font></td>
              <td><input name="Subtotal" type="text" id="Subtotal" size="10"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chktax" type="checkbox" id="chktax" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Tax</font></td>
              <td><input name="Tax" type="text" id="Tax" size="10"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkdiscount" type="checkbox" id="chkdiscount" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Discount</font></td>
              <td><input name="Discount" type="text" id="Discount" size="10"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkshippingcost" type="checkbox" id="chkshippingcost" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Shipping
                  Cost </font></td>
              <td><input name="ShippingCost" type="text" id="ShippingCost" size="10"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkshipcostID" type="checkbox" id="chkshipcostID" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif"><a href="ShipCostID.php" target="_blank">Ship Cost
                  ID</a></font></td>
              <td><input name="ShipCostID" type="text" id="ShipCostID" size="10"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkcardtype" type="checkbox" id="chkcardtype" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Card Type </font></td>
              <td><select name="CardType" id="CardType">
                <option value="visa" selected>visa</option>
                <option value="mastercard">mastercard</option>
                <option value="discover">discover</option>
                <option value="amex">amex</option>
                <option value="paypal">paypal</option>
                                          </select></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chklast4" type="checkbox" id="chklast4" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Last 4
                  Digits-
                  <font size="1">(don't include leading zeros) </font></font></td>
              <td><input name="Last4" type="text" id="Last4" size="5" maxlength="4"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkauth" type="checkbox" id="chkauth" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-AUTH/TKT-</font></td>
              <td><input name="Auth" type="text" id="Auth" size="10"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkischeck" type="checkbox" id="chkischeck" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Is Check?</font></td>
              <td><input name="IsCheck" type="text" id="IsCheck" value="y" size="3" maxlength="1"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkpaypalnumber" type="checkbox" id="chkpaypalnumber" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Paypal
                  Number-</font></td>
              <td><input name="PaypalNumber" type="text" id="PaypalNumber" size="20"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkip" type="checkbox" id="chkip" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">IP</font></td>
              <td><input name="IP" type="text" id="IP" size="20"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkstatus" type="checkbox" id="chkstatus" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Purchase
                  Status</font></td>
              <td><select name="Status" id="Status">
                  <option value="active" selected>active</option>
                  <option value="cancel">cancel</option>
              </select></td>
            </tr>
          </table>            
            <font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
        </tr>
        <tr bgcolor="#FFFFCC">
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3">Product</font><font size="3" face="Arial, Helvetica, sans-serif">
            Info </font></strong></font></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3">Bulk
                  Order </font><font size="3" face="Arial, Helvetica, sans-serif">
            Info</font></strong></font></td>
        </tr>
        <tr>
          <td valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkproduct" type="checkbox" id="chkproduct" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Product</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <select name="ProductID" tabindex="" id="ProductID" class="text">
                  <option value="" selected>Select</option>
                  <? 
					$sql = "SELECT * FROM tblProductNew ORDER BY Nickname ASC";
					
					$result = mysql_query($sql) or die("Cannot get tblProduct1");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                  <option value="<? echo $row[ProductID]; ?>"><? echo $row[Nickname]; ?></option>
                  <?
					}
				?>
                </select>
              </font></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkquantity" type="checkbox" id="chkquantity" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Quantity</font></td>
              <td><input name="Quantity" type="text" id="Quantity" size="10"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkshipped" type="checkbox" id="chkshipped" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Shipped?</font></td>
              <td><input name="Shipped" type="text" id="Shipped" value="n" size="3" maxlength="1"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkreplacement" type="checkbox" id="chkreplacement" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Replacement?</font></td>
              <td><input name="Replacement" type="text" id="Replacement" value="y" size="3" maxlength="1"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkitemnumber" type="checkbox" id="chkitemnumber" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-eBay Item
                  # -</font></td>
              <td><input name="ItemNumber" type="text" id="ItemNumber" size="20"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkpstatus" type="checkbox" id="chkpstatus" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Product
                  Status</font></td>
              <td><select name="PStatus" id="PStatus">
                  <option value="active" selected>active</option>
                  <option value="cancel">cancel</option>
                  <option value="backorder">backorder</option>
                  <option value="preorder">preorder</option>
              </select></td>
            </tr>
          </table>
            <font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
          <td valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkpaid" type="checkbox" id="chkpaid" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Paid?</font></td>
              <td><input name="Paid" type="text" id="Paid" value="n" size="3" maxlength="1"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkpaymentterms" type="checkbox" id="chkpaymentterms" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Payment
                  Terms-</font></td>
              <td><input name="PaymentTerms" type="text" id="PaymentTerms" size="35"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkinvoicenumber" type="checkbox" id="chkinvoicenumber" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Invoice
                  # - </font></td>
              <td><input name="InvoiceNumber" type="text" id="InvoiceNumber" size="10"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkponumber" type="checkbox" id="chkponumber" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-PO # - </font></td>
              <td><input name="PONumber" type="text" id="PONumber" size="20"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkinvoicedate" type="checkbox" id="chkinvoicedate" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Invoice
                  Date </font></td>
              <td><input name="InvoiceDate" type="text" id="InvoiceDate" size="14"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chknovapress" type="checkbox" id="chknovapress" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Nova Press? </font></td>
              <td><input name="NovaPress" type="text" id="NovaPress" value="y" size="3" maxlength="1"></td>
            </tr>
          </table>            
            </td>
        </tr>
        <tr>
          <td valign="top" bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3">Shipping
                  Information </font></strong></font></td>
          <td valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkshipper" type="checkbox" id="chkshipper" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Shipper</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <select name="ShipperID" tabindex="" id="ShipperID" class="text">
                  <option value="" selected>Select</option>
                  <? 
					$sql = "SELECT * FROM tblShipper";
					
					$result = mysql_query($sql) or die("Cannot get tblProduct1");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                  <option value="<? echo $row[ShipperID]; ?>"><? echo $row[CompanyName]; ?></option>
                  <?
					}
				?>
                </select>
              </font></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chktrackingnumber" type="checkbox" id="chktrackingnumber" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">-Tracking
                  # -</font></td>
              <td><input name="TrackingNumber" type="text" id="TrackingNumber" size="20"></td>
            </tr>
            <tr>
              <td height="34"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">
                  <input name="chkshipdate" type="checkbox" id="chkshipdate" value="y">
              </font></strong></div></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Ship Date </font></td>
              <td><input name="ShipDate" type="text" id="ShipDate" size="14"></td>
            </tr>
          </table></td>
          <td valign="top">&nbsp;</td>
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
