<?

//security for page
session_start();

// has http variable in it to populate links on page.
require "url.php";

//security check
If (session_is_registered('userName'))
{


// has database username and password, so don't need to put it in the page.
require "dbinfo.php";

	$userName = $_SESSION['userName'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	$sql2 = "SELECT * FROM tblEmployee WHERE UserName = '$userName'";
	$result2 = mysql_query($sql2) or die("Cannot get employee ID");
	
	while($row2 = mysql_fetch_array($result2))
	{
		$EmployeeID2 = $row2[EmployeeID];
		$Level = $row2[Level];
	}

?>

<?

if($Level == '1')
{
?>
		
    <TD align="left" valign="top"> <IMG SRC="images/spacer.gif" WIDTH=1 HEIGHT=16 ALT=""></TD>
  </TR>
  <TR>
    <TD width="161" align="left" valign="top" background="images/behind-left-gray.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td> <table width="100%" border="0" cellpadding="6" cellspacing="0" bordercolor="#000000">
            <tr> 
              <td align="left" valign="top" class=box1> <div align="right"><a href="#"></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>inventory/index.php">Inventory</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>warranty/index.php">Warranty</a> 
                  </font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <div align="left"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>reports/index.php">Management 
                  Reports</a> </font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>tests/index.php">Test 
                  Information </a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>customers/index.php">Customers</a></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                  </strong></font></div></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>businesscustomer/index.php">Business Customers</a></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>contacts/index.php">Contacts</a></font></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>partners/index.php">Partners</a></font></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>owners/index.php">Owner 
                  Management </a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>shipping_customs/index.php">Shipping</a></font></div></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>time/index.php">Time
                  Sheets </a></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>faq2/index.php">FAQ</a> |
                  <a href="<? echo $http; ?>links/index.php">Links</a> | <a href="<? echo $http; ?>promo/index.php">Promo</a> </font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>notice/index.php">Web
              Notices</a></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><a href="<? echo $http; ?>finances"><font size="2" face="Arial, Helvetica, sans-serif">Finances</font></a></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1>&nbsp;</td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>logout.php">Log 
                  Out</a></font></div></td>
            </tr>
          </table></td>
          <td width="12">&nbsp;</td>
        </tr>
      </table>
<?
}
elseif($Level == '2')
{
?>
		
    <TD align="left" valign="top"> <IMG SRC="images/spacer.gif" WIDTH=1 HEIGHT=16 ALT=""></TD>
  </TR>
  <TR>
    <TD width="161" align="left" valign="top" background="images/behind-left-gray.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td> <table width="100%" border="0" cellpadding="6" cellspacing="0" bordercolor="#000000">
            <tr> 
              <td align="left" valign="top" class=box1> <div align="right"><a href="#"></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>inventory/index.php">Inventory</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>warranty/index.php">Warranty</a> 
                  </font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <div align="left"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>reports/index.php">Management 
                  Reports</a> </font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>tests/index.php">Test 
                  Information </a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>customers/index.php">Customers</a></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                  </strong></font></div></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>businesscustomer/index.php">Business Customers</a></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>contacts/index.php">Contacts</a></font></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>partners/index.php">Partners</a></font></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>owners/index.php">Owner 
                  Management </a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>shipping_customs/index.php">Shipping</a></font></div></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>time/index.php">Time
                  Sheets </a></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>faq2/index.php">FAQ</a><font size="2" face="Arial, Helvetica, sans-serif"> | <a href="links/index.php">Links</a> <font size="2" face="Arial, Helvetica, sans-serif"> <a href="<? echo $http; ?>promo/index.php">Promo</a> </font></font></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>notice/index.php">Web
              Notices </a></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1>&nbsp;</td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>logout.php">Log 
                  Out</a></font></div></td>
            </tr>
          </table></td>
          <td width="12">&nbsp;</td>
        </tr>
      </table>
	  
	  <?
	}
	elseif($Level == 10)
	{
	?>
			
    <TD align="left" valign="top"> <IMG SRC="images/spacer.gif" WIDTH=1 HEIGHT=16 ALT=""></TD>
  </TR>
  <TR>
    <TD width="161" align="left" valign="top" background="images/behind-left-gray.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td> <table width="100%" border="0" cellpadding="6" cellspacing="0" bordercolor="#000000">
            <tr> 
              <td align="left" valign="top" class=box1> <div align="left"><a href="<? echo $http; ?>arif/survey_arif.php"><font size="2" face="Arial, Helvetica, sans-serif">Market
              Survey Results </font></a></div></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><a href="<? echo $http; ?>arif/survey_arif_resp.php"><font size="2" face="Arial, Helvetica, sans-serif">Respondents</font></a></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1>&nbsp;</td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>logout.php">Log 
                  Out</a></font></div></td>
            </tr>
          </table></td>
          <td width="12">&nbsp;</td>
        </tr>
      </table>
	  
	  <?
	  }
	else
	{
	?>
			
    <TD align="left" valign="top"> <IMG SRC="images/spacer.gif" WIDTH=1 HEIGHT=16 ALT=""></TD>
  </TR>
  <TR>
    <TD width="161" align="left" valign="top" background="images/behind-left-gray.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td> <table width="100%" border="0" cellpadding="6" cellspacing="0" bordercolor="#000000">
            <tr> 
              <td align="left" valign="top" class=box1> <div align="right"><a href="#"></a></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>inventory/index.php">Inventory</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <div align="left"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>reports/MonthlyShippingReportIndex.php">Management 
                  Reports</a> </font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>customers/index.php">Customers</a></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                  </strong></font></div></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>businesscustomer/index.php">Business Customers</a></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>contacts/index.php">Contacts</a></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>time/index.php">Time
                  Sheets </a></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>faq2/index.php">FAQ</a><font size="2" face="Arial, Helvetica, sans-serif"> | <a href="links/index.php">Links</a> </font></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1>&nbsp;</td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>logout.php">Log 
                  Out</a></font></div></td>
            </tr>
          </table></td>
          <td width="12">&nbsp;</td>
        </tr>
      </table>
	  
	  <?
	  }
	  ?>


</BODY>
</HTML>

<?
mysql_close($link);

}

?>