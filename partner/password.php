<?
//start session
session_start();
//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

$PageTitle = "Silent Timer Partner - Password";

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

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

<?
// look up office code, and send it to email...
If ($_POST['Submit'] == "Get Password")
{
	$userName = $_POST['txtUserName'];

	$err = 0;
		
	if ($userName == "")
	{
		$errUserName = 1;
		$err = 1;
	}

	if ($err == 0)
	{
		//connect to database
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");			
			
		$sql = "SELECT * FROM tblAffiliate WHERE UserName = '$userName'";
		$result = mysql_query($sql) or die("Cannot get your password at this time, please try again.");
				
		while($row = mysql_fetch_array($result))
		{
			$affiliateID = $row[AffiliateID];
			$e = $row[Email];
			$p = $row[Password];
			$fn = $row[FirstName];
		}
			
		if ($affiliateID == "")
		{
			$errLogin = 1;
		}
		else
		{
			//send email

mail("$e", 
"Silent Timer Password", 
"$fn,

Your Silent Timer partner password is: $p


Thank you,

The Silent Timer Team
Silent Technology LLC
http://www.SilentTimer.com
512-340-0338", 
"From: The Silent Timer<info@silenttimer.com>");		
		
		
		}
		
		mysql_close($link);
	}
}
?>
<font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Your Password</strong></font> 
<?
		if ($errLogin == 1)
		{
			echo "<p>";
			echo "<font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'><strong>You have entered an username.  Please try again.</strong></font>";
		}
		else
		{
		
			If ($_POST['Submit'] == "Get Password" && $err != 1)
			{
				echo "<p>";
				echo "<font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'><strong>Your password has been emailed to your email on file.</strong></font>";
			}
		}
		
		
		If ($_POST['Submit'] == "Get Password" && $errLogin != 1 && $err != 1)
		{
		 // do nothing!!!!! don't show the shit!
		}
		else // show the shit!!!
		{
		?>
<form name="frmLogin" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr> 
      <td colspan="2" align="left" valign="top"><p><font size="2" face="Arial, Helvetica, sans-serif"><br>
          Forgot your password? Enter your user name below and we will send it 
          to the email that was registered with your account.</font></p>
        <p><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>User 
          Name</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
          <input name="txtUserName" type="text" id="txtUserName" value="<? echo $txtUserName;?>">
          <script>document.frmLogin.txtUserName.focus()</script>
          <?
						if ($errUserName == 1){echo "<font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'><strong>*</strong></font>";}
					?>
          </font></p></td>
    </tr>
    <tr> 
      <td width="192" align="left" valign="top"><div align="right"> 
          <input type="submit" name="Submit" value="Get Password">
        </div></td>
      <td width="586" align="left" valign="bottom"> <div align="right"><font size="2" face="Arial, Helvetica, sans-serif"></font></div></td>
    </tr>
    <tr> 
      <td colspan="2" align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><a href="login.php">&gt; 
        Log In</a></font></td>
    </tr>
  </table>
              </form>
			  
	<?
	}
	?>
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