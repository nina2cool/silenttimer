<?
//security for page
session_start();
//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

$PageTitle = "Silent Timer Partner Site";

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

	
	// ----- >> code to handle login and redirect to home.  It is up here so header redirect can be used...		
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
				
			$sql = "SELECT * FROM tblAffiliate WHERE UserName = '$userName' AND Password = '$password'";
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
				
				$now = date("Y-m-d H:i:s");
				$IP = $_SERVER["REMOTE_ADDR"];
				
				$sql3 = "INSERT INTO tblCustomerEdit(AffiliateID, DateTime, IP, Type, Status)
				VALUES('$affiliateID', '$now', '$IP', 'login-partner', 'active');";
				//echo $sql3;
				$result3 = mysql_query($sql3) or die("Cannot update insert login information");
				
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
?>
			
<p><font color="#000000" size="5" face="Arial, Helvetica, sans-serif"><strong>Our
  Partner Program</strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
  <tr>
    <td width="74%" align="left" valign="top"> <p><font size="2" face="Arial, Helvetica, sans-serif">Join 
        us in our mission to increase test scores by helping students efficiently 
        manage valuable exam time.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">For many students, 
        time is their worst enemy. No matter how well they know the material, 
        or how long they study, the time always seems to run out before the questions 
        are finished. For standardized tests like the SAT, ACT, LSAT, MCAT, GMAT, 
        and GRE, practicing with a timer is absolutely essential to doing well 
        on test day.</font></p>
      <font size="2" face="Arial, Helvetica, sans-serif">We have developed a
      product  designed specifically for these tests; <strong><em>designed specifically</em></strong> 
      for helping students learn to beat their test time. Students need to know
       that they aren't alone in not being able to finish a tough test. Almost
       everyone feels rushed, and almost all test takers cannot finish on time.
       Using pacing techniques during practice helps students be more prepared
       on test day.</font>
      <p><font size="2" face="Arial, Helvetica, sans-serif">With 
        our timer, a student enters their test time and the number of questions
          for their test. <strong><font color="#000099" face="Times New Roman, Times, serif"><a href="http://www.silenttimer.com">THE
           SILENT TIMER</a><font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></font></strong> 
        then tells the student exactly how much time they have to answer each
         question they are on. There is no more guessing, &quot;Have I spent
         too  much time on this question&quot;. There is no more mental division
         in  trying to figure out how much time you have left.</font></p>
      <table width="70%" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#333333">
        <tr> 
          <td bgcolor="#FFFFCC"><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><em><strong>With 
              our timer, a student learns to feel comfortable with their time 
              limits faster and has time management under control for best performance 
              on test day.</strong></em></font></div></td>
        </tr>
      </table>
      <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Join us on 
        our Mission<font size="2"><br>
        </font></strong></font><font size="2" face="Arial, Helvetica, sans-serif">If 
        you would like to offer <strong><font color="#000099" face="Times New Roman, Times, serif"><a href="http://www.silenttimer.com">THE 
        SILENT TIMER</a><font color="#000000" face="Arial, Helvetica, sans-serif">&#8482;</font></font></strong> 
        to your students, we have a great partner program for you to join. </font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Talk about time management 
        on your web site and how a timer will help increase test performance. 
        Then link to our site from yours so your students can purchase their timer. 
        For your help in spreading our mission to your students, we will give 
        you money for each timer sale that comes from your site, email, or other 
        referral.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">It's very simple: 
        sign up, link to our site, and start selling timers. We send you a check 
        at the beginning of every month for the commission you earned for your 
        timer sales. </font></p>
      <p><font color="#006600" size="3" face="Arial, Helvetica, sans-serif"><em><strong>Help 
        your students be the best they can be.</strong></em></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="signup.php">Sign 
        up for free &gt;&gt;</a></font></p>
</td>
    <td width="26%" align="left" valign="top"> 
      <form name="login" method="post" action="">
        <font size="2" face="Arial, Helvetica, sans-serif"><strong>Client Log In</strong></font>
        <table width="100%" border="1" cellpadding="1" cellspacing="0" bordercolor="#000000">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="1">
                <tr> 
                  <td width="40%" align="left" valign="top"><p align="right"><font color="#003399" size="1" face="Arial, Helvetica, sans-serif"><strong>User
                          Name</strong></font><font size="1" face="Arial, Helvetica, sans-serif"> 
                      <?
						if ($errUserName == 1){echo "<font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'><strong>*</strong></font>";}
					?>
                      <br>
                      <input name="txtUserName" type="text" id="txtUserName3" value="<? echo $txtUserName;?>" size="10">
                      <script>document.frmLogin.txtUserName.focus()</script>
                      </font><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                      <font size="1">Password</font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <?
						if ($errPassword == 1){echo "<font color='#FF0000' size='2' face='Arial, Helvetica, sans-serif'><strong>*</strong></font>";}
					?>
                      <br>
                      <input name="txtPassword" type="password" id="txtPassword4" size="10">
                      </font></p>
                    <div align="right"><font size="2" face="Arial, Helvetica, sans-serif"> 
                      <input type="submit" name="Submit" value="Login">
                      </font></div></td>
                </tr>
              </table>
              <?
		if ($errLogin == 1)
		{
			echo "<br>";
			echo "<font color='#FF0000' size='1' face='Arial, Helvetica, sans-serif'><strong>Log In Incorrect</strong></font>";
		}
		?>
              <div align="right"><a href="password.php"><font size="1" face="Arial, Helvetica, sans-serif"><br>
                Forget Password?</font></a> </div></td>
          </tr>
        </table>
      </form>
      
      <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="about.php">About 
        the Program&gt;</a><br>
        <a href="signup.php">Sign Up &gt;</a></font></p>
      <p>&nbsp;</p>
      <table width="100" border="1" cellpadding="6" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td><div align="center"> 
              <table width="100" border="0" cellspacing="0" cellpadding="4" class="right">
                <tr> 
                  <td><div align="center"> 
                      <table width="100" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
                        <tr> 
                          <td><div align="center"><img src="../gallery/pics/small/logo-close.jpg" width="167" height="131" border="0"></div></td>
                        </tr>
                      </table>
                    </div></td>
                </tr>
                <tr> 
                  <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="../timer/demo.php"><em>Try 
                      our online demo</em></a><em>.</em></font></div></td>
                </tr>
              </table>
            </div></td>
        </tr>
      </table>
      <p>&nbsp;</p></td>
  </tr>
</table>
<br>
<p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
