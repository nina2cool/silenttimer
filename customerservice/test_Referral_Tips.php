<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('custID'))
{
// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	$custID = $_SESSION['custID'];
	$CustomerID = $custID;
	
	
	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");		
	
	

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


?><title>Referral Tips</title>
			<table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFCC">
              <tr>
                <td><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><em><font color="#000000" size="4">Friend
                        Referral Program</font></em><strong><br>
      Step 3: Referral Tips </strong></font></td>
                <td><div align="right">
                    <p><strong><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="test_Referral_Emails.php">Step
                            2: Sending Emails </a></font></strong></p>
                    <p><strong><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="test_Referral_Rebates.php">Step
                            4: Print In-Store Rebates</a></font></strong></p>
                </div></td>
              </tr>
            </table>
			<br>
			<table width="100%"  border="0" cellpadding="8" cellspacing="0" bgcolor="#FFFFCC">
              <tr>
                <td bgcolor="#CCCCFF"><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>It&rsquo;s
                      easy to make referrals! Just think of anyone who may be
                      interested in timing products for a standardized test:</strong></font></p>
                  <ul>
                    <li><font size="2" face="Arial, Helvetica, sans-serif">Your
                        test prep class - students and instructors</font></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif">Friends
                        who are taking the test with you</font></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif">Students
                        active in online test forums</font></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif">Family
                        friends who may be taking the SAT, ACT, LSAT, MCAT, etc</font></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif">Parents
                        who may be looking for test prep materials for their
                        children</font></li>
                    <li><font size="2" face="Arial, Helvetica, sans-serif">Students
                        in your dorm, neighbors, or roommates who are taking
                        a test</font></li>
                </ul></td>
              </tr>
            </table>
            <p><strong><font color="#003399" size="4" face="Arial, Helvetica, sans-serif">Suggestions</font></strong>            </p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF" size="3">-</font></strong> You are a
                walking testimony of how the product works - let everyone know
                about how it&rsquo;s
              helped YOU and how it can also benefit them.</font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF" size="3">-</font></strong> Demonstrate
                the product - to friends, classmates, instructors, etc. Show
                them how easy it is to use, and the unique features of The Silent
                Timer&#8482; and our other testing products.</font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF" size="3">-</font></strong> Once
                you start seeing your improvements with the product, tell those
                that need help too. They will be ready to try something if they
                can see that it&rsquo;s helped someone else. Don&rsquo;t forget
              to let your instructor know as well!</font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF" size="3">-</font></strong> If
                you&rsquo;re
                taking a prep class, your classmates already know how important
                it is to pace themselves. Let them know where they can get their
                very own pacing tool. (You can pass out rebates with your code
              on them (<a href="test_Referral_Info.php">find out your code</a> and print <a href="test_Referral_Rebates.php">rebate
              forms</a>).</font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF" size="3">-</font></strong> Talk to family friends and parents of younger students that
are also studying for a standardized test.</font></p>
            <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#0000FF" size="3">-</font></strong> <font color="#FF0000"><strong>Remember</strong></font>            -
                getting into the school of their choice is as important to others
                as it is to you. Spread the word on how they can get one step
                closer to reaching that ideal score and getting into their ideal
                school.</font></p>
<p>&nbsp;</p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><br>
                                                </font></p>
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/test_sidemenu.php";

// finishes security for page
}
else
{
?>
</p>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customerservice/test_index.php'>
<?
}
?>