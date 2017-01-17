<?
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

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

			<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; 
              Manage Purchases </strong></font> <p align="left"><font size="2" face="Arial, Helvetica, sans-serif">From 
                here you may: view &amp; edit purchases, insert &amp; verify shipment 
                details for purchases, etc.</font></p>
              <p align="left"><strong><font face="Arial, Helvetica, sans-serif">View 
                Purchases</font></strong></p>
              <form name="form" method="post" action="viewpurchases.php?sort=tblPurchase.DateTime&d=ASC">
                
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
    <tr> 
      <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td width="10%" rowspan="2" align="center" valign="middle"> <div align="center"> 
                <label> 
                <input type="radio" name="radioSelection" value="time">
                </label>
              </div></td>
            <td width="20%"><strong><font size="2" face="Arial, Helvetica, sans-serif"><strong>Time 
              Period </strong></font></strong></td>
            <td width="18%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">From</font></strong></td>
            <td width="52%"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">To</font></strong></td>
          </tr>
          <tr> 
            <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="cboTime" id="cboTime">
                <option value="all" selected>All</option>
                <option value="today">Today</option>
                <option value="week">Week</option>
                <option value="month">Month</option>
                <option value="year">Year</option>
                <option value="other">Enter Time</option>
              </select>
              </font></td>
            <td align="left" valign="top"> <input name="txtFromDate" type="text" id="txtFromDate" size="10"></td>
            <td align="left" valign="top"> <input name="txtToDate" type="text" id="txtToDate" size="10"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="radio" name="radioSelection" value="customerID">
              </font></strong></td>
            <td width="41%"><strong><font size="2" face="Arial, Helvetica, sans-serif">CustomerID</font></strong></td>
            <td width="7%" rowspan="2"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="radio" name="radioSelection" value="purchaseID">
                </font></strong></div></td>
            <td width="42%"><strong><font size="2" face="Arial, Helvetica, sans-serif">PurchaseID</font></strong></td>
          </tr>
          <tr> 
            <td><input name="txtCustomerID" type="text" id="txtPurchaseID" size="20"></td>
            <td><input name="txtPurchaseID" type="text" id="txtPurchaseID3" size="20"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="radio" name="radioSelection" value="firstname">
              </font></strong></td>
            <td width="41%"><strong><font size="2" face="Arial, Helvetica, sans-serif">First 
              Name</font></strong></td>
            <td width="7%" rowspan="2"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="radio" name="radioSelection" value="lastname">
                </font></strong></div></td>
            <td width="42%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Last 
              Name</font></strong></td>
          </tr>
          <tr> 
            <td><input name="txtFirstName" type="text" id="txtFirstName" size="20"></td>
            <td><input name="txtLastName" type="text" id="txtLastName" size="20"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="radio" name="radioSelection" value="city">
              </font></strong></td>
            <td width="41%"><strong><font size="2" face="Arial, Helvetica, sans-serif">City</font></strong></td>
            <td width="7%" rowspan="2"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="radio" name="radioSelection" value="state">
                </font></strong></div></td>
            <td width="42%"><strong><font size="2" face="Arial, Helvetica, sans-serif">State</font></strong></td>
          </tr>
          <tr> 
            <td><input name="txtCity" type="text" id="txtCity2" size="20"></td>
            <td><input name="txtState" type="text" id="txtState" size="20"></td>
          </tr>
        </table>
        <br> <table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="radio" name="radioSelection" value="zipcode">
              </font></strong></td>
            <td width="41%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Zip 
              Code </font></strong></td>
            <td width="7%" rowspan="2"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="radio" name="radioSelection" value="country">
                </font></strong></div></td>
            <td width="42%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Country</font></strong></td>
          </tr>
          <tr> 
            <td><input name="txtZipCode" type="text" id="txtZipCode" size="20"></td>
            <td><input name="txtCountry" type="text" id="txtCountry" size="20"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td width="10%" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="radio" name="radioSelection" value="notshipped">
              </font></strong></td>
            <td width="41%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Not 
              Shipped </font></strong></td>
            <td width="7%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input type="radio" name="radioSelection" value="cancelled">
                </font></strong></div></td>
            <td width="42%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Cancelled</font></strong></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td width="10%" rowspan="2" align="center" valign="middle"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input type="radio" name="radioSelection" value="type">
              </font></strong></td>
            <td width="90%"><strong><font size="2" face="Arial, Helvetica, sans-serif">Customer 
              Type </font></strong><font size="2" face="Arial, Helvetica, sans-serif">(web, 
              ebay, bulk, samples)</font></td>
          </tr>
          <tr>
            <td><input name="txtType" type="text" id="txtType" size="20"></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td><input type="submit" name="Submit" value="Get Purchases"></td>
    </tr>
  </table>
              </form>

			  
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
