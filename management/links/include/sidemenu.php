<?

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");



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
              <td align="left" valign="top" class=box1><div align="right"></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font face="Times New Roman, Times, serif"><font face="Times New Roman, Times, serif"><font face="Arial, Helvetica, sans-serif"><font face="Arial, Helvetica, sans-serif"></font></font></font></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1> <p align="left"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                  </strong></font></p></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font face="Times New Roman, Times, serif"><font face="Times New Roman, Times, serif"><font face="Arial, Helvetica, sans-serif"><font face="Arial, Helvetica, sans-serif"></font></font></font></font></div></td>
            </tr>
            <tr> 
              <td align="left" valign="top" class=box1><div align="left"><font face="Times New Roman, Times, serif"><font face="Times New Roman, Times, serif"><font face="Arial, Helvetica, sans-serif"><font face="Arial, Helvetica, sans-serif"></font></font></font></font></div></td>
            </tr>
			
			
			<tr> 
                <td align="left" valign="top" class=box1><div align="left"><font face="Times New Roman, Times, serif"><font face="Times New Roman, Times, serif"><font face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>links/LinkView.php">View
                              Links </a></font></font></font></font></div></td>
              </tr>			  
			  		  
			  
	  		<tr>
			<?
			$sql = "SELECT Type FROM tblLinks WHERE Type <> '' GROUP BY Type";
			$result = mysql_query($sql) or die("cannot get types");
			
			while($row = mysql_fetch_array($result))
			{
			$Type = $row[Type];
			
			
			?>
	  		  <td align="left" valign="top" class=box1><a href="LinkViewType.php?type=<? echo $Type; ?>"><font size="2" face="Arial, Helvetica, sans-serif">View <? echo $Type; ?> Links</font></a></td>
  		    </tr>
			<?
			}
			?>
			
	  		<tr> 
                <td align="left" valign="top" class=box1><div align="left"><font face="Times New Roman, Times, serif"><font face="Times New Roman, Times, serif"><font face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>links/LinkAdd.php">Add
                              A Link </a></font></font></font></font></div></td>
              </tr>
			
			
			
			
			
			
            <tr>
              <td align="left" valign="top" class=box1>&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top" class=box1>&nbsp;</td>
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
</BODY>
</HTML>