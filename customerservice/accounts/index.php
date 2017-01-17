<?
//start session
session_start();
//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";

	// ----- >> code to handle login and redirect to manatgement home.  It is up here so header redirect can be used...		
	// Grab variables from previous page.
	If ($_POST['Submit'] == "Login")
	{
		$userName = $_POST['txtUserName'];
		$email = $_POST['txtEmail'];
		$zip = $_POST['txtZip'];
	
		$err = 0;
			
		if ($txtUserName == "")
		{
			$errUserName = 1;
			$err = 1;
		}
	
		if ($txtEmail == "")
		{
			$errEmail = 1;
			$err = 1;
		}
		
		
		if ($txtZip == "")
		{
			$errZip = 1;
			$err = 1;
		}
	
		if ($err == 0)
		{
			//connect to database
			$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
			mysql_select_db($db) or die("Cannot select Database");			
				
			$sql = "SELECT * FROM tblCustomer WHERE LastName = '$userName' AND Email = '$email' AND ZipCode = '$zip'";
			$result = mysql_query($sql) or die("Cannot find customer!");
					
			while($row = mysql_fetch_array($result))
			{
				$name = $row[FirstName];
				$custID = $row[CustomerID];
			}
				
			if ($name == "")
			{
				$errLogin = 1;
			}
			else
			{
				//register session with this person, so they can access other pages.
				session_register('userName');
				$_SESSION['userName'] = $userName;
				session_register('custID');
				$_SESSION['custID'] = $custID;
				
				$err = 0;
				mysql_close($link);
				
				//after login completion, send them to dialect archive index!
				//echo "<meta http-equiv='refresh' content='0;URL=home.php'>";
				header("location: home.php");		
			}
		}
	}
	
// has http variable in it to populate links on page.
require "include/url.php";

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it.
echo "<table width='99%' border='0' cellspacing='0' cellpadding='4'>
	  <tr> 
		<td width='4%'>&nbsp;</td>
		<td width='33%' class=box><div align='center'></div></td>
		<td width='29%' class=box><div align='center'></div></td>
		<td width='34%' class=box> <div align='center'></div>
		  <div align='right'></div></td>
	  </tr>
	</table>";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

		 <font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; 
		  Login</strong></font></p>
			  
		<?
		if ($errLogin == 1)
		{
			echo "<p>";
			echo "<font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'><strong>Your login information is incorrect, please try again.</strong></font>";
		}
		?>

            <form name="frmLogin" method="post" action="">
              <table width="400" border="0" cellspacing="0" cellpadding="5">
                <tr> 
                  <td colspan="2" align="left" valign="top"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Last
                        Name </strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                    <input name="txtUserName" type="text" id="txtUserName"><script>document.frmLogin.txtUserName.focus()</script>
                  </font></td>
                </tr>
                <tr>
                  <td colspan="2" align="left" valign="top"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Email</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                      <input name="txtEmail" type="text" id="txtEmail">
                  </font></td>
                </tr>
                <tr> 
                  <td colspan="2" align="left" valign="top"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping
                        Zip Code </strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
                    <input name="txtZip" type="text" id="txtZip">
                  </font></td>
                </tr>
                <tr> 
                  <td width="161" align="left" valign="top"><div align="right"> 
          <input type="submit" name="Submit" value="Login">
        </div></td>
                  <td width="219" align="left" valign="top">&nbsp;</td>
                </tr>
              </table>
</form>
            <p>&nbsp;</p>
            <p align="left">&nbsp;</p>
            <p align="left">&nbsp;</p>
            <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="#"></a></font></p>
            <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><br>
              &copy; 2002-2005 Silent Technology LLC <em>All Rights Reserved.</em></font></p>
            <p align="center"><em><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>Site 
              Monitored for Security purposes. You are being watched.</strong></font></em></p>


<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has side menu, and bottom HTML TAGS
echo "		</td>
          </tr>
        </table>
        <strong><font size='5' face='Arial, Helvetica, sans-serif'></font></strong></div>
      </TD>
		
    <TD align='left' valign='top'> <IMG SRC='images/spacer2.gif' WIDTH=1 HEIGHT=16 ALT=''></TD>
	</TR>
	<TR>
		
    <TD width='161' align='left' valign='top' background='../images/behind-left-gray2.gif'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
        <tr> 
          <td> <table width='100%' border='0' cellpadding='6' cellspacing='0' bordercolor='#000000'>
              <tr> 
                <td align='left' valign='top' class=box1> <div align='right'><font size='2' face='Arial, Helvetica, sans-serif'><a href='../index.php'>&lt;&lt; 
                  Home</a></font></div></td>
              </tr>
              <tr> 
                <td align='left' valign='top' class=box1><div align='right'><font size='2' face='Arial, Helvetica, sans-serif'></font></div></td>
              </tr>
              <tr> 
                <td align='left' valign='top' class=box1><div align='left'></div></td>
              </tr>
              <tr> 
                <td align='left' valign='top' class=box1> <div align='left'><font face='Times New Roman, Times, serif'><font face='Times New Roman, Times, serif'><font face='Arial, Helvetica, sans-serif'><font face='Arial, Helvetica, sans-serif'></font></font></font></font></div></td>
              </tr>
              <tr> 
                <td align='left' valign='top' class=box1> <div align='left'><font size='2' face='Arial, Helvetica, sans-serif'><font face='Times New Roman, Times, serif'><font face='Arial, Helvetica, sans-serif'><font face='Arial, Helvetica, sans-serif'><font face='Arial, Helvetica, sans-serif'></font></font></font></font> 
                    </font></div></td>
              </tr>
              <tr> 
                <td align='left' valign='top' class=box1> <div align='left'><font face='Times New Roman, Times, serif'><font face='Times New Roman, Times, serif'><font face='Arial, Helvetica, sans-serif'><font face='Arial, Helvetica, sans-serif'></font></font></font></font></div></td>
              </tr>
              <tr> 
                <td align='left' valign='top' class=box1><div align='left'><font face='Times New Roman, Times, serif'><font face='Times New Roman, Times, serif'><font face='Arial, Helvetica, sans-serif'><font face='Arial, Helvetica, sans-serif'></font></font></font></font></div></td>
              </tr>
              <tr> 
                <td align='left' valign='top' class=box1> <p align='left'><font color='#FFFFFF' size='2' face='Arial, Helvetica, sans-serif'><strong><br>
                    </strong></font></p></td>
              </tr>
              <tr> 
                <td align='left' valign='top' class=box1><div align='left'><font face='Times New Roman, Times, serif'><font face='Times New Roman, Times, serif'><font face='Arial, Helvetica, sans-serif'><font face='Arial, Helvetica, sans-serif'></font></font></font></font></div></td>
              </tr>
              <tr> 
                <td align='left' valign='top' class=box1><div align='left'><font face='Times New Roman, Times, serif'><font face='Times New Roman, Times, serif'><font face='Arial, Helvetica, sans-serif'><font face='Arial, Helvetica, sans-serif'></font></font></font></font></div></td>
              </tr>
              <tr> 
                <td align='left' valign='top' class=box1><div align='left'><font face='Times New Roman, Times, serif'><font face='Times New Roman, Times, serif'><font face='Arial, Helvetica, sans-serif'></font></font></font></div></td>
              </tr>
            </table></td>
          <td width='12'>&nbsp;</td>
        </tr>
      </table></TD>
		
    <TD align='left' valign='top'> <IMG SRC='images/spacer2.gif' WIDTH=1 HEIGHT=396 ALT=''></TD>
	</TR>
</TABLE>
</BODY>
</HTML>";
?> 