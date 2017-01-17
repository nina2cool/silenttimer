<?

//security for page
session_start();

// has http variable in it to populate links on page.
require "http://www.silenttimer.com/management/include/url.php";

//security check
If (session_is_registered('userName'))
{


// has database username and password, so don't need to put it in the page.
require "http://www.silenttimer.com/management/include/dbinfo.php";

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

	if($Level == '1' OR $Level == '2')
	{

?>

      </td>
          </tr>
        </table>
        </div>
      </TD>
		
    <TD align="left" valign="top"> <IMG SRC="<? echo $http; ?>images/spacer.gif" WIDTH=1 HEIGHT=16 ALT=""></TD>
	</TR>
	<TR>
		
    <TD width="161" align="left" valign="top" background="../images/behind-left-gray.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td> <table width="100%" border="0" cellpadding="6" cellspacing="0" bordercolor="#000000">
            <tr> 
              <td align="left" valign="top" class=box1> <div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>home.php">&lt;&lt; 
                  Home</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>reports/index.php">&lt;&lt; 
                  Reports</a></font></div></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1>&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>reports/ReportIndex.php">Create
              Reports</a></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><a href="<? echo $http; ?>reports/ShippingReportIndex.php"><font size="2" face="Arial, Helvetica, sans-serif">Shipping
                    Reports</font></a></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>reports/StoreLocatorIndex.php">StoreLocator
                      Reports </a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>reports/survey/SurveyIndex.php">Survey
                      Results </a></font></div></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1>&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><a href="<? echo $http; ?>reports/PromoCodeIndex.php"><font size="2" face="Arial, Helvetica, sans-serif">Promo
                    Codes</font></a></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><div align="left"><a href="<? echo $http; ?>reports/Referrals2.php"><font size="2" face="Arial, Helvetica, sans-serif">Referrals</font></a></div></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><a href="<? echo $http; ?>reports/testprep.php"><font size="2" face="Arial, Helvetica, sans-serif">Test
                    Prep</font></a></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><a href="<? echo $http; ?>reports/schools.php"><font size="2" face="Arial, Helvetica, sans-serif">Schools</font></a></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1>&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>reports/Shipments.php">Shipments</a></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>reports/FirstNames.php">First
                    Names</a></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>reports/LastNames.php">Last
                    Names</a> </font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>reports/Countries.php">Countries</a></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>reports/States3.php">States</a></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>reports/Cities.php">Cities</a></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1>&nbsp;</td>
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
      </table></TD>
		
    <TD align="left" valign="top"> <IMG SRC="<? echo $http; ?>images/spacer.gif" WIDTH=1 HEIGHT=396 ALT=""></TD>
	</TR>
</TABLE>
<?
}
else
{
?>
      </td>
          </tr>
        </table>
        </div>
      </TD>
		
    <TD align="left" valign="top"> <IMG SRC="<? echo $http; ?>images/spacer.gif" WIDTH=1 HEIGHT=16 ALT=""></TD>
	</TR>
	<TR>
		
    <TD width="161" align="left" valign="top" background="../images/behind-left-gray.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td> <table width="100%" border="0" cellpadding="6" cellspacing="0" bordercolor="#000000">
            <tr> 
              <td align="left" valign="top" class=box1> <div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>home.php">&lt;&lt; 
                  Home</a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="ShippingReportIndex.php">&lt;&lt; 
                  Reports</a></font></div></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1>&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><a href="ShippingReportIndex.php"><font size="2" face="Arial, Helvetica, sans-serif">Shipping
                    Reports</font></a></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><a href="StoreLocatorIndex.php">StoreLocator
                      Reports </a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1>&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="FirstNames.php">First
                    Names</a></font></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><font size="2" face="Arial, Helvetica, sans-serif"><a href="LastNames.php">Last
              Names</a></font></td>
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
      </table></TD>
		
    <TD align="left" valign="top"> <IMG SRC="<? echo $http; ?>images/spacer.gif" WIDTH=1 HEIGHT=396 ALT=""></TD>
	</TR>
</TABLE>
<?
}
?>

</BODY>
</HTML>

<?
}
mysql_close($link);
?>