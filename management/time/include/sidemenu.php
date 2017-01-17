<?

//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{


// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

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

	if($Level <> '1')
	{


?>




            </td>
          </tr>
        </table>
        <strong><font size="5" face="Arial, Helvetica, sans-serif"></font></strong></div>
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
              <td align="left" valign="top" class=box1><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>inventory/index.php"> 
                  </a><a href="<? echo $http; ?>time/index.php">&lt;&lt; Time Home </a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <div align="left"><font face="Times New Roman, Times, serif"><font face="Times New Roman, Times, serif"><font face="Arial, Helvetica, sans-serif"></font></font></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <div align="left"></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <div align="left"><font size="2" face="Times New Roman, Times, serif"><font face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>time/TimeAdd.php">Enter
                      Time </a></font></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font size="2" face="Times New Roman, Times, serif"><font face="Arial, Helvetica, sans-serif"><font face="Arial, Helvetica, sans-serif"><font face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>time/Current.php">Current
                            Pay Period </a></font></font></font></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <p align="left"><font size="2" face="Times New Roman, Times, serif"><font face="Arial, Helvetica, sans-serif">                  <a href="<? echo $http; ?>time/Past.php">Past Pay Periods </a></font></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                  </strong></font></p></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font face="Times New Roman, Times, serif"><font face="Times New Roman, Times, serif"></font></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font face="Times New Roman, Times, serif"><font face="Times New Roman, Times, serif"><font face="Arial, Helvetica, sans-serif"><font face="Arial, Helvetica, sans-serif"></font></font></font></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font face="Times New Roman, Times, serif"><font face="Times New Roman, Times, serif"><font face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>logout.php">Log 
                  Out</a></font><font face="Arial, Helvetica, sans-serif"></font></font></font></font></div></td>
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
        <strong><font size="5" face="Arial, Helvetica, sans-serif"></font></strong></div>
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
              <td align="left" valign="top" class=box1><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>inventory/index.php"> 
                  </a><a href="<? echo $http; ?>time/index.php">&lt;&lt; Time Home </a></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"></div></td>
            </tr>
            <tr> 
              <td height="36" align="left" valign="top" class=box1> <div align="left"><font face="Times New Roman, Times, serif"><font face="Times New Roman, Times, serif"><font face="Arial, Helvetica, sans-serif"></font></font></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font size="2" face="Times New Roman, Times, serif"><font face="Arial, Helvetica, sans-serif"><font face="Arial, Helvetica, sans-serif"><font face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>time/CurrentAll.php">Current
                            Pay Period</a></font></font></font></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <p align="left"><font size="2" face="Times New Roman, Times, serif"><font face="Arial, Helvetica, sans-serif">                  <a href="<? echo $http; ?>time/PastAll.php">Past Pay Periods </a></font></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                  </strong></font></p></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font face="Times New Roman, Times, serif"><font face="Times New Roman, Times, serif"></font></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font face="Times New Roman, Times, serif"><font face="Times New Roman, Times, serif"><font face="Arial, Helvetica, sans-serif"><font face="Arial, Helvetica, sans-serif"></font></font></font></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font face="Times New Roman, Times, serif"><font face="Times New Roman, Times, serif"><font face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>logout.php">Log 
                  Out</a></font><font face="Arial, Helvetica, sans-serif"></font></font></font></font></div></td>
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
?>