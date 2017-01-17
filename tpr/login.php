<?
//start session
session_start();
//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

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
				
			$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$userName' AND Password = '$password'";
			$result = mysql_query($sql) or die("Cannot execute query!");
					
			while($row = mysql_fetch_array($result))
			{
				$affiliateID = $row[AffiliateID];
			}
				
			if ($affiliateID == "")
			{
				$errLogin = 1;
			}
			else
			{
				//register session for this person, so they can access other pages.
				session_register('a');
				$_SESSION['a'] = $affiliateID;
				
				$err = 0;
				mysql_close($link);
				
				//after login completion, send them to index!
				header("location: home/index.php");		
			}
		}
	}

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
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
      <td colspan="2" align="left" valign="top"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Office 
        Code</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
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
      <td width="219" align="left" valign="bottom"> <div align="right"><font size="2" face="Arial, Helvetica, sans-serif"></font></div></td>
    </tr>
    <tr> 
      <td colspan="2" align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><a href="password.php">Forget 
        password?</a></font></td>
    </tr>
  </table>
              </form>
            <p>&nbsp;</p>
            <p align="left">&nbsp;</p>
            <p align="left">&nbsp;</p>
            <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="#"></a></font></p>
			<p align="center">&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>