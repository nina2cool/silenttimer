<?
//security for page
session_start();

//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");		
	



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


	$CustomerID = $_GET['c'];
	$IP = $_GET['ip'];
	$now = date("Y-m-d h:i:s");

	if($CustomerID <> "" AND $IP <> "")
	{
	$sql = "INSERT INTO tblCustomerEdit(CustomerID, DateTime, Type, IP, Status)
	VALUES('$CustomerID', '$now', 'refer-yes', '$ip', 'active');";
	$result = mysql_query($sql) or die("Cannot insert refer-yes");
	}
	

	# code to grab emails and data...then send emails...
	if($_POST['Submit'] == "Send Emails") # if button has been pressed...
	{
		$Note = $_POST['Note'];
		
		$Name = $_POST['name'];
		if($Name == ""){$Name = "Your Friend";}
		$Email = $_POST['email'];
		
		$Name1 = $_POST['name1'];
		if($Name1 == ""){$Name1 = "Buddy";}
		$Email1 = $_POST['email1'];
		$Test1 = $_POST['test1'];
		if($Test1 == ""){$Test1 = "Test";}
		
		$Name2 = $_POST['name2'];
		if($Name2 == ""){$Name2 = "Buddy";}
		$Email2 = $_POST['email2'];
		$Test2 = $_POST['test2'];
		if($Test2 == ""){$Test2 = "Test";}
		
		$Name3 = $_POST['name3'];
		if($Name3 == ""){$Name3 = "Buddy";}
		$Email3 = $_POST['email3'];
		$Test3 = $_POST['test3'];
		if($Test3 == ""){$Test3 = "Test";}
		
		$Name4 = $_POST['name4'];
		if($Name4 == ""){$Name4 = "Buddy";}
		$Email4 = $_POST['email4'];
		$Test4 = $_POST['test4'];
		if($Test4 == ""){$Test4 = "Test";}
		
		$Name5 = $_POST['name5'];
		if($Name5 == ""){$Name5 = "Buddy";}
		$Email5 = $_POST['email5'];
		$Test5 = $_POST['test5'];
		if($Test5 == ""){$Test5 = "Test";}
		
		$Now = date("Y-m-d H:m:s");
		
		# if the senders email isn't empty, go for it....
		if($Email != "")
		{
			require "../code/class.phpmailer.php";
				
				$sql = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, Status)
				VALUES('$Name', '$Email', '$Now', 'email.php', 'sender', 'active');";	
				mysql_query($sql) or die("Cannot insert sender into tblFriend!");
				
			if($Email1 != "")
			{
				SendEmails($Name, $Email, $Name1, $Email1, $Test1, $Note);
				
				$sql2 = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, ReferName, ReferEmail, Test, Note)
				VALUES('$Name1', '$Email1', '$Now', 'email.php', 'receiver', '$Name', '$Email', '$Test1', '$Note');";
				
				$result2 = mysql_query($sql2) or die("Cannot insert person 1 into tblFriend!");				
					
			}
			
			if($Email2 != "")
			{
				SendEmails($Name, $Email, $Name2, $Email2, $Test2, $Note);
			
				$sql3 = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, ReferName, ReferEmail, Test, Note)
				VALUES('$Name2', '$Email2', '$Now', 'email.php', 'receiver', '$Name', '$Email', '$Test2', '$Note');";
				
				$result3 = mysql_query($sql3) or die("Cannot insert person 2 into tblFriend!");				
			}
			
			if($Email3 != "")
			{
				SendEmails($Name, $Email, $Name3, $Email3, $Test3, $Note);
				
				$sql4 = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, ReferName, ReferEmail, Test, Note)
				VALUES('$Name3', '$Email3', '$Now', 'email.php', 'receiver', '$Name', '$Email', '$Test3', '$Note');";
				
				$result4 = mysql_query($sql4) or die("Cannot insert person 3 into tblFriend!");				
			}
			
			if($Email4 != "")
			{
				SendEmails($Name, $Email, $Name4, $Email4, $Test4, $Note);

				$sql5 = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, ReferName, ReferEmail, Test, Note)
				VALUES('$Name4', '$Email4', '$Now', 'email.php', 'receiver', '$Name', '$Email', '$Test4', '$Note');";
				
				$result5 = mysql_query($sql5) or die("Cannot insert person 4 into tblFriend!");				
			}
			
			if($Email5 != "")
			{
				SendEmails($Name, $Email, $Name5, $Email5, $Test5, $Note);
				
				$sql6 = "INSERT INTO tblFriend(Name, Email, DateTime, Link, Type, ReferName, ReferEmail, Test, Note)
				VALUES('$Name5', '$Email5', '$Now', 'email.php', 'receiver', '$Name', '$Email', '$Test5', '$Note');";
				
				$result6 = mysql_query($sql6) or die("Cannot insert person 5 into tblFriend!");				
			}
			
			if($SentSomething = "yes")
			{
				header("location: thankyou.php");
			}

		}
		
	} // end if button is pushed
	

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	function SendEmails($FromName, $FromEmail, $ToName, $ToEmail, $Test, $Note)
	{
		$SentSomething = "yes";
	
		$mail = new PHPMailer();
		
		$mail->From = "$FromEmail";
		$mail->FromName = "$FromName";
		$mail->AddAddress("$ToEmail", "$ToName");
		$mail->AddBCC("info@silenttimer.com", "Friend Referral");
		$mail->IsHTML(false);
		$mail->Subject = "A Silent Timer for your $Test!";
	
$text =
"$ToName,

The Silent Timer is the perfect choice to help you time your upcoming $Test.  It is completely silent and has some cool features made for your test.

Here are a few:

   - It is silent!
   - It counts up or down.
   - It tells you exactly how much time you can spend on each question (no more guessing)!
   - It has easy to use memory buttons so you can easily use it on your $Test.
   
Visit http://www.SilentTimer.com to find out why I think this is a great option for your test.  If you like it, you can easily buy it online and get it fast!
";
if($Note != "")
{
$text .=
"
_________________________________________________
- Personal Note from $FromName:

$Note
_________________________________________________
";
}

$text .=
"
I hope this info helps,

$FromName
"; # end building message

		$mail->Body = $text;
		
		if(!$mail->Send())
		{
		   echo "Emails receipt could not be sent.<p>";
		   echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}
	
	
	} // end send emails....

?>



<script>
// write funciton to check and make sure emaisl aer correct...

	function OtherEmailCheck(EmailField)
	{
		// function to grab email content to see if it is valid!
		// ------ this checks to make sure it is a valid email address
		var str = EmailField;
		var at="@";
		var dot=".";
		var lat=str.indexOf(at);
		var lstr=str.length;
		var ldot=str.indexOf(dot);
		
		if (str.indexOf(at)==-1)
		{
			email = 1;
		}
	
		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr)
		{
			email = 1;
		}
	
		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr)
		{
			email = 1;
		}
	
		if (str.indexOf(at,(lat+1))!=-1)
		{
			email = 1;
		}
	
		if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot)
		{
			email = 1;
		}
	
		if (str.indexOf(dot,(lat+2))==-1)
		{
			email = 1;
		}
	
		if (str.indexOf(" ")!=-1)
		{
			email = 1;
		}
		
		if (email == 1)
		{
			return false;
		}
	}
	
	function CheckEmails()
	{
	
		// loop through names/emails and see if they are valid...
		var e = 0;
		var eText = "";
		
		//make sure at least one email address is entered!!!
		if(document.Emails.email1.value == "" && document.Emails.email2.value == "" && document.Emails.email3.value == "" && document.Emails.email4.value == "" && document.Emails.email5.value == "")
		{
			if(eText != "")
			{
				eText = eText + ", and please enter at least one friend's email address";
			}
			else
			{
				eText = "Please enter at least one friend's email address";
			}
			
			e = 1;
		}
		else
		{
			// email
			var email = 0;
			
			if(document.Emails.email.value == "")
			{
				if(eText != "")
				{
					eText = eText + ", and please enter your email address";
				}
				else
				{
					eText = "Please enter your email address";
				}
				
				e = 1;
			}
			else
			{
				// ------ this checks to make sure it is a valid email address
		
				var str = document.Emails.email.value;
				var at="@";
				var dot=".";
				var lat=str.indexOf(at);
				var lstr=str.length;
				var ldot=str.indexOf(dot);
				
				if (str.indexOf(at)==-1)
				{
					email = 1;
				}
		
				if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr)
				{
					email = 1;
				}
		
				if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr)
				{
					email = 1;
				}
		
				if (str.indexOf(at,(lat+1))!=-1)
				{
					email = 1;
				}
		
				if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot)
				{
					email = 1;
				}
		
				if (str.indexOf(dot,(lat+2))==-1)
				{
					email = 1;
				}
		
				if (str.indexOf(" ")!=-1)
				{
					email = 1;
				}
		
				// ------ this checks to make sure it is a valid email address
		
				if (email == 1)
				{
					if(eText != "")
					{
						eText = eText + ", and enter your valid email address";
					}
					else
					{
						eText = "Enter your valid email address";
					}
					
					e = 1;
				}
		
			}
			
			if(document.Emails.email1.value != "")
			{
				// if the email is filled in, check to make sure it is valid
				if(OtherEmailCheck(document.Emails.email1.value) == false)
				{
					if(eText != "")
					{
						eText = eText + ", and " + document.Emails.email1.value + " is not a valid email address";
					}
					else
					{
						eText = document.Emails.email1.value + " is not a valid email address";
					}
					
					e = 1;
				}
			}
			
			if(document.Emails.email2.value != "")
			{
				// if the email is filled in, check to make sure it is valid
				if(OtherEmailCheck(document.Emails.email2.value) == false)
				{
					if(eText != "")
					{
						eText = eText + ", and " + document.Emails.email2.value + " is not a valid email address";
					}
					else
					{
						eText = document.Emails.email2.value + " is not a valid email address";
					}
					
					e = 1;
				}
			}
			
			if(document.Emails.email3.value != "")
			{
				// if the email is filled in, check to make sure it is valid
				if(OtherEmailCheck(document.Emails.email3.value) == false)
				{
					if(eText != "")
					{
						eText = eText + ", and " + document.Emails.email3.value + " is not a valid email address";
					}
					else
					{
						eText = document.Emails.email3.value + " is not a valid email address";
					}
					
					e = 1;
				}
			}
			
			if(document.Emails.email4.value != "")
			{
				// if the email is filled in, check to make sure it is valid
				if(OtherEmailCheck(document.Emails.email4.value) == false)
				{
					if(eText != "")
					{
						eText = eText + ", and " + document.Emails.email4.value + " is not a valid email address";
					}
					else
					{
						eText = document.Emails.email4.value + " is not a valid email address";
					}
					
					e = 1;
				}
			}
			
			if(document.Emails.email5.value != "")
			{
				// if the email is filled in, check to make sure it is valid
				if(OtherEmailCheck(document.Emails.email5.value) == false)
				{
					if(eText != "")
					{
						eText = eText + ", and " + document.Emails.email5.value + " is not a valid email address";
					}
					else
					{
						eText = document.Emails.email5.value + " is not a valid email address";
					}
					
					e = 1;
				}
			}

		} // end one email address at least...
		
		
		// if an error occurs, don't submit form, and tell them what to fill in.
		if (e == 1) 
		{
			alert("Please correct the following:\n\n" + eText + ".");
			return false;
		}
		else //if all is clear, let emails be sent!!!
		{
			return true;
		}
	}


</script>


<?
	# link to DB for page calls to it.
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>


<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong> 
  Refer-a-Friend Program </strong></font></p>
<p><font color="#33CC33" size="4" face="Arial, Helvetica, sans-serif"><strong>Help
      your friends out, spread the word, and get your purchase for free!</strong></font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Enter in
     the names and emails of  friends who you think would love to hear
    about  the new <font color="#000066" face="Times New Roman, Times, serif"><strong>    SILENT TIMER</strong></font><strong>&#8482;</strong>. If they are taking
    a test like the <a href="../testhome/sat.php">SAT</a>, <a href="../testhome/act.php">ACT</a>, 
  <a href="../testhome/lsat.php">LSAT</a>, or <a href="../testhome/mcat.php">MCAT</a>,
   they will thank you for helping them out!</font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Taking
    an important <a href="../handbook/standardizedtest/index.php" target="_blank">standardized
    test</a> can be stressful enough, let your pals know that we are here to
    help with their <a href="../handbook/timemanagement/index.php" target="_blank">time
management</a>.</font></p>
<p>&nbsp;</p>
<p align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="friend_details.php" target="_blank"><strong>Questions?
    - Find out more. </strong></a></font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><a href="#" onClick="MM_openBrWindow('sample.php','','scrollbars=yes,width=500,height=450')">Click
here</a> for an example of what email your friends will receive.</font></p>
<form action="" method="post" name="Emails" id="Emails" onSubmit="return CheckEmails();">
  <table width="85%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top"> <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; 
          Your Info</font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="4">
          <tr> 
            <td width="30%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Name<font color="#FF0000">*</font></strong></font></td>
            <td width="33%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Email<font color="#FF0000">*</font></strong></font></td>
          </tr>
          <tr> 
            <td><input name="name" type="text" id="name"></td>
            <td><input name="email" type="text" id="email"></td>
          </tr>
        </table></td>
    </tr>
  </table>
  <br>
  <table width="85%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr>
      <td align="left" valign="top">
        <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; Add
              a Personal Note</font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="4">
          <tr>
            <td width="3%"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
            <td width="97%"><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Your
                  note will be added to your friends' emails. </strong><em>(optional) </em></font></p>
              <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
                <textarea name="Note" cols="40" rows="4" id="Note"></textarea>
              </font></strong></p></td>
          </tr>
        </table>        </td>
    </tr>
  </table>
  <br>
  <table width="85%" border="1" cellpadding="0" cellspacing="0" bordercolor="#003399">
    <tr> 
      <td align="left" valign="top"> <p><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">&nbsp;&gt; 
          Friends' Info</font></strong></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="4">
          <tr> 
            <td width="3%"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
            <td width="30%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Name<font color="#FF0000">*</font></strong></font></td>
            <td width="33%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Email<font color="#FF0000">*</font></strong></font></td>
            <td width="34%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Test<font color="#FF0000">*</font></strong></font></td>
          </tr>
          <tr> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>1.</strong></font></td>
            <td><input name="name1" type="text" id="name1"></td>
            <td><input name="email1" type="text" id="email1"></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="test1" id="test1">
                <option value="" selected>Test</option>
                <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql = "SELECT * FROM tblTests ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot execute query!");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                <option value="<? echo $row[Name]; ?>"><? echo $row[Name]; ?></option>
                <?
					}
				?>
              </select>
              </font></td>
          </tr>
          <tr> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>2.</strong></font></td>
            <td><input name="name2" type="text" id="name2"></td>
            <td><input name="email2" type="text" id="email2"></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="test2" id="test2">
                <option value="" selected>Test</option>
                <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql = "SELECT * FROM tblTests ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot execute query!");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                <option value="<? echo $row[Name]; ?>"><? echo $row[Name]; ?></option>
                <?
					}
				?>
              </select>
              </font></td>
          </tr>
          <tr> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>3.</strong></font></td>
            <td><input name="name3" type="text" id="name3"></td>
            <td><input name="email3" type="text" id="email3"></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="test3" id="test3">
                <option value="" selected>Test</option>
                <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql = "SELECT * FROM tblTests ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot execute query!");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                <option value="<? echo $row[Name]; ?>"><? echo $row[Name]; ?></option>
                <?
					}
				?>
              </select>
              </font></td>
          </tr>
          <tr> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>4.</strong></font></td>
            <td><input name="name4" type="text" id="name4"></td>
            <td><input name="email4" type="text" id="email4"></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="test4" id="test4">
                <option value="" selected>Test</option>
                <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql = "SELECT * FROM tblTests ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot execute query!");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                <option value="<? echo $row[Name]; ?>"><? echo $row[Name]; ?></option>
                <?
					}
				?>
              </select>
              </font></td>
          </tr>
          <tr> 
            <td><font size="2" face="Arial, Helvetica, sans-serif"><strong>5.</strong></font></td>
            <td><input name="name5" type="text" id="name5"></td>
            <td><input name="email5" type="text" id="email5"></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif"> 
              <select name="test5" id="test5">
                <option value="" selected>Test</option>
                <?    
					// build combo box for the test options from the database.
					// SQL to get data from test table
					$sql = "SELECT * FROM tblTests ORDER BY Name";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot execute query!");
					
					while($row = mysql_fetch_array($result))
					{
				?>
                <option value="<? echo $row[Name]; ?>"><? echo $row[Name]; ?></option>
                <?
					}
				?>
              </select>
              </font></td>
          </tr>
        </table>
        
      </td>
    </tr>
  </table>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000">*</font></strong> -
    required field</font></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Check the information
         you have entered, then click <font color="#003399">&quot;Send Emails&quot;</font>.</strong></font> <font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Remember,
         we will NEVER sell your information or send SPAM. <a href="../legal/privacy.php" target="_blank">Read
         our Privacy Policy</a>. </font><font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
       </strong></font></p>
  <p> 
    <input name="Submit" type="submit" id="Submit" value="Send Emails">
  </p>
</form>
	
<p>&nbsp;</p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>