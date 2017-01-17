<?
//start session
session_start();
//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

$PageTitle = "Silent Technology LLC Employee Login";

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

	// ----- >> code to handle login and redirect to manatgement home.  It is up here so header redirect can be used...		
	// Grab variables from previous page.
	If ($_POST['Submit'] == "Login")
	{
		$userName = $_POST['txtUserName'];
		$password = $_POST['txtPassword'];
	
		$err = 0;
			
		if ($userName == "")
		{
			$errUserName = 1;
			$err = 1;
		}
	
		if ($password == "")
		{
			$errPassword = 1;
			$err = 1;
		}
	
		if ($err == 0)
		{
			//connect to database
			$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
			mysql_select_db($db) or die("Cannot select Database");			
				
			$sql = "SELECT * FROM tblEmployee WHERE UserName = '$userName' AND Password = '$password'";
			$result = mysql_query($sql) or die("Cannot execute query!");
					
			while($row = mysql_fetch_array($result))
			{
				$EmployeeID = $row[EmployeeID];
			}
				
			if ($EmployeeID == "")
			{
				$errLogin = 1;
			}
			else
			{
				//register session for this person, so they can access other pages.
				session_register('e');
				$_SESSION['e'] = $EmployeeID;
				
				$err = 0;
				mysql_close($link);
				
				//after login completion, send them to index!
				header("location: home.php");		
			}
		}
	}



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> <font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Silent 
Technology LLC Employee Login</strong></font></p> 
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
      <td colspan="2" align="left" valign="top"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>User 
        Name</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
        <input name="txtUserName" type="text" id="txtUserName" value="<? echo $txtUserName;?>">
        <script>document.frmLogin.txtUserName.focus()</script>
        <?
						if ($errUserName == 1){echo "<font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'><strong>*</strong></font>";}
					?>
        </font></td>
    </tr>
    <tr> 
      <td colspan="2" align="left" valign="top"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Password</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
        <input name="txtPassword" type="password" id="txtPassword">
        <?
						if ($errPassword == 1){echo "<font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'><strong>*</strong></font>";}
					?>
        </font></td>
    </tr>
    <tr> 
      <td width="161" align="left" valign="top"><div align="right"> 
          <input type="submit" name="Submit" value="Login">
        </div></td>
      <td width="219" align="left" valign="top">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" align="left" valign="top"><em><strong><font color="#999999" size="2" face="Arial, Helvetica, sans-serif">If 
        you don't know your user name or password, contact Christina at headquarters.</font></strong></em></td>
    </tr>
  </table>
              </form>
            
<p><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong><em><font color="#999999">This 
  is a members only area.<br>
  Unsolicited use of our system will be prosecuted to the fullest extent of the 
  law.</font></em></strong></font></p>
<p align="left">&nbsp;</p>
