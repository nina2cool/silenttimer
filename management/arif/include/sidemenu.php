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



if($Level == '10')
	
	{
	?>
			
    <TD align="left" valign="top"> <IMG SRC="images/spacer.gif" WIDTH=1 HEIGHT=16 ALT=""></TD>
  </TR>
  <TR>
    <TD width="161" align="left" valign="top" background="images/behind-left-gray.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td> <table width="100%" border="0" cellpadding="6" cellspacing="0" bordercolor="#000000">
            <tr>
              <td align="left" valign="top" class=box1><div align="right"><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="<? echo $http; ?>home.php">Home</a> </font></div></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1>&nbsp;</td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <div align="left"><a href="survey_arif.php"><font size="2" face="Arial, Helvetica, sans-serif">Market
              Survey Results </font></a></div></td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1><a href="survey_arif_resp.php"><font size="2" face="Arial, Helvetica, sans-serif">Respondents</font></a></td>
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