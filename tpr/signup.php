<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";



/////////  code to insert information into account, create affiliate code, and email thank you /////////

	if ($_POST['SignUp'] == "Sign Up") # if button is pressed...
	{
	
		#$webname = $_POST['webname'];
		#$url = $_POST['url'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		#$companyname = $_POST['companyname'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$phone = $_POST['phone'];
		$fax = $_POST['fax'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$address2 = $_POST['address2'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$stateother = $_POST['stateother'];
		$zip = $_POST['zip'];
		$country = $_POST['country'];
		
		#$payto = $_POST['payto'];
		
		#$category = $_POST['cat'];
		#$description = $_POST['description'];
		#$visits = $_POST['visits'];
		#$pageview = $_POST['pageview'];
		$numstudents = $_POST['numstudents'];
		
		#$terms = $_POST['terms'];
		
		# first, do error checking....
		
		#error check goes here.....
		
		
		
		# link to DB
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");			
	
		$now = date("Y-m-d H:i:s");
		$ip = $_SERVER["REMOTE_ADDR"];
		
		
		# build the office code/affiliate code with the TPR and the city name...

		$office_code = "tpr" . strtolower(substr($city,0,3));
		
	 	while($i <= 100)
		{
			$aff = "";
			# check for this code already in DB
			$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$office_code'";
			$result = mysql_query($sql) or die("Can't get affiliate information, please try again.");
	
			while ($row = mysql_fetch_array($result))
			{
				$aff = $row[AffiliateID];
			}
			
			if ($aff != "") // if ID isn't taken, move on...if it is taken, do again...
			{
				$office_code = "tpr" . strtolower(substr($city,0,3)) . $i;
			}
			else
			{
				$i = 101; //exit loop, there is no other one in DB...
			}
			
			$i++;
		}
		
		$sql = "INSERT INTO tblAffiliate(AffiliateID, AccountType, OwnerID, CompanyName, FirstName, LastName, Email, Phone, Fax, Address, Address2, City, State, ZipCode, Country, AnnualStudents, CheckToName, Password, DateTime, IP) 
				VALUES('$office_code', 'office', 'tpr', 'The Princeton Review','$firstname', '$lastname', '$email', '$phone', '$fax', '$address', '$address2', '$city', '$state', '$zip', '$country', '$numstudents', 'The Princeton Review, $city', '$password', '$now' , '$ip')";
		//echo $sql . "<p>";
		mysql_query($sql) or die("Cannot insert affiliate, please try again or call 512-542-9981 for assistance.");
		
		
		# finished enterng info into tables and DB.  Now email company to say thank you and give an intro to the program.
		# Also, email Silent Technology with info to approve.
		
		mysql_close($link);
		header("location: thankyou.php");
	
	}
// end if button pressed // ******


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> 
<table width="100%" border="0" cellpadding="8" cellspacing="0">
  <tr>
    <td width="89%" align="left" valign="top"> 
      <p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><font color="#000000">The 
        Princeton Review Sign Up<br>
        </font><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><font size="3">The 
        Silent Timer&#8482;</font></strong></font></strong></font></p>
      <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Fill 
        out this form and we will send your office its very own <strong><font face="Times New Roman, Times, serif">SILENT 
        TIMER</font>&#8482;</strong>.</font></p>
      <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Once 
        you fill out the form, we will email you a confirmation that your order 
        has been received. And your office timer will be shipped soon.</font></p>
      <p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Call 
        (512) 542-9981 if you have any questions.</font></p>
      </td>
    <td width="11%" valign="top">
<div align="right"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><img src="pics/tpr_sm.jpg" width="88" height="47"></strong></font></div></td>
  </tr>
</table>
<form action="" name="signup" method="post">
  <table border="1" cellpadding="5" cellspacing="0" bordercolor="#000066">
    <tr> 
      <td colspan="2" bgcolor="#eeeeee"><font size="2" face="Arial, Helvetica, sans-serif"><span class="bold"><strong><font size="4">Office 
        Information</font> </strong>(<font color="#FF0000">*</font> indicates 
        required field)</span></font></td>
    </tr>
    <tr> 
      <td width="440"><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">First 
        Name (<font color="#000000">office contact</font>)</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td width="387"><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="firstname" type="text" id="firstname2" size="20">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Last 
        Name</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input type="text" name="lastname" size="20">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Phone</font> 
        <font color="#FF0000">*</font> </span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="phone" type="text" id="phone2" size="15" maxlength="20">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><span class="text">Fax</span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="fax" type="text" id="fax" value="" size="15" maxlength="15">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">E-mail 
        Address</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input type="text" name="email">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Mailing 
        Address </font><font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="address" type="text" id="address" maxlength="45">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><span class="text">Mailing 
        Address 2</span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input type="text" name="address2" maxlength="45">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <font color="#003399">City </font><font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input type="text" name="city">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <font color="#003399">State or Province</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td> <font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <select name="state" class="text">
          <option value="0" selected>Please Select </option>
          <?  
		  	# link to DB
			$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
			mysql_select_db($db) or die("Cannot select Database");  
			
			// build combo box for states in DB
			// SQL to get data from shippingoption and shipper table
			$sql = "SELECT State, Name
					FROM tblState
					ORDER BY Name";
			//put SQL statement into result set for loop through records
			$result = mysql_query($sql) or die("Cannot execute query!");
			
			while($row = mysql_fetch_array($result))
			{
		?>
          <option value="<? echo $row[State];?>"><? echo $row[Name];?></option>
          <?
			}
		?>
          <option value="-1">Other </option>
        </select>
        If Other, please specify<br>
        <input name="stateother" type="text" id="stateother" value="">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <font color="#003399">Zip or Postal Code</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td> <font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input type="text" name="zip">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Country</font> 
        <font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <select name="country" class="text">
          <?    
			// build combo box for countries in DB
			// SQL to get data from shippingoption and shipper table
			$sql = "SELECT ISO, Name
					FROM tblCountry
					ORDER BY Name";
			//put SQL statement into result set for loop through records
			$result = mysql_query($sql) or die("Cannot execute query!");
			
			while($row = mysql_fetch_array($result))
			{
		?>
          <option value="<? echo $row[ISO];?>" <? if($row[ISO] == "US"){echo "selected";}?>><? echo $row[Name];?></option>
          <?
			}
		?>
        </select>
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Password</font> 
        <font color="#FF0000">*</font> <br>
        </span></font></strong><font color="#333333" size="2" face="Arial, Helvetica, sans-serif"><span class="text">Your 
        password will allow you to login to our TPR web page to download fliers, 
        as well as to see how your students can order from your office with free 
        shipping.</span></font></td>
      <td align="left" valign="top"><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="password" type="password" id="password3" size="12" maxlength="12">
        <br>
        (case sensitive) </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Confirm 
        Password</font> <font color="#FF0000">*</font> </span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="password2" type="password" id="password22" size="12" maxlength="12">
        </span></font></td>
    </tr>
    <tr> 
      <td colspan="2" bgcolor="#eeeeee"> <p><font size="4" face="Arial, Helvetica, sans-serif"><strong><br>
          </strong><span class="bold"><strong>Office Description</strong></span> 
          </font></p></td>
    </tr>
    <tr> 
      <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Average 
        Number of Annual Students</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#FF0000">*</font></span></font></strong></span></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <select name="numstudents" class="text" id="numstudents">
          <option value="0" selected>Number of Students</option>
          <option value="499">Less Than 500 </option>
          <option value="999">500 - 1,000</option>
          <option value="4999">1,000 - 5000</option>
          <option value="9999">5,000 - 10,000</option>
          <option value="24999">10,000 - 25,000</option>
          <option value="49999">25,000 - 50,000</option>
          <option value="99999">50,000 - 100,000</option>
          <option value="100001">Over 100,000</option>
        </select>
        </span></font></td>
    </tr>
    <tr> 
      <td colspan="2"><p><em><strong><font size="2" face="Arial, Helvetica, sans-serif"><br>
          </font></strong></em><font size="2" face="Arial, Helvetica, sans-serif"><strong><em>All 
          information will be kept strictly confidential.</em></strong></font></p>
        </td>
    </tr>
    <tr> 
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><br>
        <input name="SignUp" type="submit" id="SignUp" value="Sign Up">
        &nbsp;&nbsp; 
        <input type="reset" value="Reset ">
        </span></font></td>
    </tr>
  </table>
</form>
			
<?
mysql_close($link);
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>