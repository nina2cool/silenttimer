<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('a'))
{

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";



/////////  code to insert information into account, create affiliate code, and email thank you /////////

	if ($_POST['Update'] == "Update") # if button is pressed...
	{
	
		$aID = $_SESSION['a'];

		$password = $_POST['password'];
		$password2 = $_POST['password2'];
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
		$numstudents = $_POST['numstudents'];
		
		# first, do error checking....
		
		#######   error check goes here.....
		
		
		
	
		# link to DB
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
			
		$sql = "UPDATE tblAffiliate SET FirstName = '$firstname', LastName = '$lastname', Email = '$email', 
		Phone = '$phone', Fax = '$fax', Address = '$address', Address2 = '$address2', City = '$city', State = '$state', ZipCode = '$zip', 
		Country = '$country', AnnualStudents = '$numstudents', Password = '$password'
		WHERE AffiliateID = '$aID'";
		
		mysql_query($sql) or die("Cannot update affiliate information, please try again or call 512-542-9981 for help.");
		
		
		
		# finished entering info into tables and DB.  Now email company to say thank you and give an intro to the program.
		# Also, email Silent Technology with info to approve.
		
		#   email information!!!!!!!!!!!! *****************************
		
		mysql_close($link);
	
	} // end if button pressed // ******


// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
//get name of person/company	
	$aID = $_SESSION['a'];
	
////  get info to fill in default values ///////
	
	#connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			
		
	$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$aID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$CompanyName = $row[CompanyName];
		$FirstName = $row[FirstName];
		$LastName = $row[LastName];
		$Email = $row[Email];
		$Phone = $row[Phone];
		$Fax = $row[Fax];
		$Address = $row[Address];
		$Address2 = $row[Address2];
		$City = $row[City];
		$State = $row[State];
		$ZipCode = $row[ZipCode];
		$Country = $row[Country];
		$WebSiteName = $row[WebSiteName];
		$URL = $row[URL];
		$Description = $row[Description];
		$UniqueVisitors = $row[UniqueVisitors];
		$PageViews = $row[PageViews];
		$AnnualStudents = $row[AnnualStudents];
		$CheckToName = $row[CheckToName];
		$UserName = $row[UserName];
		$Password = $row[Password];

	}
	
?>
			
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Update 
  Profile </strong></font></p>
<p><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Update 
  your information, then press &quot;Update&quot;. Please ensure your information 
  is accurate.</font></strong></p>


<form action="" name="update" method="post">
  <table border="1" cellpadding="5" cellspacing="0" bordercolor="#000066">
    <tr> 
      <td colspan="2" bgcolor="#eeeeee"><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="Update" type="submit" id="Update" value="Update">
        &nbsp;&nbsp; 
        <input name="reset" type="reset" value="Reset ">
        </span></font></td>
    </tr>
    <tr> 
      <td colspan="2" bgcolor="#eeeeee"><font size="2" face="Arial, Helvetica, sans-serif"><span class="bold"><strong><font size="4">Office 
        Information</font> </strong>(<font color="#FF0000">*</font> indicates 
        required field)</span></font></td>
    </tr>
    <tr> 
      <td width="440"><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">First 
        Name</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td width="387"><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="firstname" type="text" id="firstname" value="<? echo $FirstName;?>" size="20">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Last 
        Name</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="lastname" type="text" value="<? echo $LastName;?>" size="20">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Phone</font> 
        <font color="#FF0000">*</font> </span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="phone" type="text" id="phone" value="<? echo $Phone;?>" size="15" maxlength="20">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><span class="text">Fax</span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="fax" type="text" id="fax" value="<? echo $Fax;?>" size="15" maxlength="15">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">E-mail 
        Address</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="email" type="text" value="<? echo $Email;?>">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Mailing 
        Address</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="address" type="text" id="address" value="<? echo $Address;?>" maxlength="45">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><span class="text">Mailing 
        Address 2</span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="address2" type="text" value="<? echo $Address2;?>" maxlength="45">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <font color="#003399">City </font><font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="city" type="text" value="<? echo $City;?>">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <font color="#003399">State or Province</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td> <font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <select name="state" class="text">
          <option value="0" selected>Please Select </option>
          <?    
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
          <option value="<? echo $row[State];?>" <? if($State == $row[State]){echo "selected";}?>><? echo $row[Name];?></option>
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
        <input name="zip" type="text" value="<? echo $ZipCode;?>">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Country</font> 
        <font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <select name="country" class="text">
          <option value="0" selected>Please select </option>
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
          <option value="<? echo $row[ISO];?>" <? if($Country == $row[ISO]){echo "selected";}?>><? echo $row[Name];?></option>
          <?
			}
		?>
        </select>
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Password</font> 
        <font color="#FF0000">*</font> </span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="password" type="password" id="password3" value="<? echo $Password;?>" size="12" maxlength="12">
        <br>
        (case sensitive) </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Confirm 
        Password</font> <font color="#FF0000">*</font> </span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="password2" type="password" id="password22" value="<? echo $Password;?>" size="12" maxlength="12">
        </span></font></td>
    </tr>
    <tr> 
      <td colspan="2" bgcolor="#eeeeee"> <p><font size="4" face="Arial, Helvetica, sans-serif"><strong><br>
          </strong><span class="bold"><strong>Office Description</strong></span> 
          </font></p></td>
    </tr>
    <tr> 
      <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Average 
        Number of Annual Students <font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#FF0000">*</font></span></font></strong></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <select name="numstudents" class="text" id="numstudents">
          <option value="0" selected>Number of Students</option>
          <option value="499" <? if ($AnnualStudents == "499"){echo "selected";}?>>Less 
          Than 500 </option>
          <option value="999" <? if ($AnnualStudents == "999"){echo "selected";}?>>500 
          - 1,000</option>
          <option value="4999" <? if ($AnnualStudents == "4999"){echo "selected";}?>>1,000 
          - 5000</option>
          <option value="9999" <? if ($AnnualStudents == "9999"){echo "selected";}?>>5,000 
          - 10,000</option>
          <option value="24999" <? if ($AnnualStudents == "24999"){echo "selected";}?>>10,000 
          - 25,000</option>
          <option value="49999" <? if ($AnnualStudents == "49999"){echo "selected";}?>>25,000 
          - 50,000</option>
          <option value="99999" <? if ($AnnualStudents == "99999"){echo "selected";}?>>50,000 
          - 100,000</option>
          <option value="100001" <? if ($AnnualStudents == "100001"){echo "selected";}?>>Over 
          100,000</option>
        </select>
        </span></font></td>
    </tr>
    <tr> 
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><br>
        <input name="Update" type="submit" id="Update" value="Update">
        &nbsp;&nbsp; 
        <input type="reset" value="Reset ">
        </span></font></td>
    </tr>
  </table>
</form>
			
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
	$http .= "tpr";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>