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
				
				session_register('custID');
				$_SESSION['custID'] = $custID;
				
				$err = 0;
				
				
				$now = date("Y-m-d H:i:s");
				$IP = $_SERVER["REMOTE_ADDR"];
				
				$sql3 = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, IP, Type, Status)
				VALUES('$custID', '$now', '$IP', 'login', 'active');";
				//echo $sql3;
				$result3 = mysql_query($sql3) or die("Cannot update insert login information");
				
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
require "../include/headertop.php";
/*
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
	
	*/
require "include/topmenu.php";
// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";





// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?><title>Customer Login</title>

		 <hr>
		 <p><font size="5" face="Arial, Helvetica, sans-serif"><strong>		 <font color="#003399">&gt; Customer
Login</font></strong></font><font color="#003399"></p>
		 <p><font size="2" face="Arial, Helvetica, sans-serif">Current customers can
		     log in and view order history, get downloads, submit comments or testimonials,
	     submit a survey, and more!</font> </p>
	    <?
		if ($errLogin == 1)
		{
			
			$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
			mysql_select_db($db) or die("Cannot select Database");		
			
			$now = date("Y-m-d H:i:s");
			$IP = $_SERVER["REMOTE_ADDR"];
			
			$sql5 = "INSERT INTO tblCustomerEdit(DateTime, IP, Type, Status, LastName, Email, ZipCode)
			VALUES('$now', '$IP', 'invalid login', 'active', '$userName', '$email', '$zip');";
			//echo $sql5;
			$result5 = mysql_query($sql5) or die("Cannot update insert login information");
			
			//mail("nina@silenttimer.com", "INVALID LOGIN - customer", "Someone tried to log in on $now.\nLast Name: $userName\nZip Code: $zip\nEmail: $email", "From:BUSTED!<info@silenttimer.com>");
			
			mysql_close($link);
						
			echo "<p>";
			echo "<font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'><strong>Your login information is incorrect, please try again.</strong></font>";
		}
		?> 
		<form name="frmLogin" method="post" action="">
              <table width="450" border="0" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
                <tr> 
                  <td width="380" align="left" valign="top" bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Last
                        Name</strong><br>
                    <input name="txtUserName" type="text" id="txtUserName"><script>document.frmLogin.txtUserName.focus()</script>
                  </font></td>
                </tr>
                <tr>
                  <td align="left" valign="top" bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Email</strong><br>
                      <input name="txtEmail" type="text" id="txtEmail">
                  </font></td>
                </tr>
                <tr> 
                  <td align="left" valign="top" bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Shipping
                        Zip Code</strong><br>
                    <input name="txtZip" type="text" id="txtZip">
                  </font></td>
                </tr>
              </table>
              <p>
                <input type="submit" name="Submit" value="Login">
                <font size="2" face="Arial, Helvetica, sans-serif">&gt; Need help?  <a href="mailto:info@silenttimer.com?subject=Log%20In%20Help">Email
              us</a> at info@silenttimer.com for log-in assistance.</font></p>
</form>
            <p><font size="2" face="Arial, Helvetica, sans-serif">All entries are case sensistive.</font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif">Use the information
                that you entered when you purchased your products.</font></p>
            <p align="left">&nbsp;</p>
            <p align="left">&nbsp;</p>
            <p>            
            <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><br>
              &copy; 2002-2008 Silent Technology LLC <em>All Rights Reserved.</em></font></p>
            <p align="center"><em><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>Site 
              Monitored for Security purposes. You are being watched.</strong></font></em></p>

<?

// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

require "include/sidemenu_login.php";


?>