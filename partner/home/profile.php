<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

$PageTitle = "Silent Timer Partner - Profile";

//security check
If (session_is_registered('a'))
{

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";



/////////  code to insert information into account, create affiliate code, and email thank you /////////

	if ($_POST['Update'] == "Update") # if button is pressed...
	{
	
		$aID = $_SESSION['a'];
		
		$webname = $_POST['webname'];
		$url = $_POST['url'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$companyname = $_POST['companyname'];
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
		
		$payto = $_POST['payto'];
		
		$category = $_POST['cat'];
		$description = $_POST['description'];
		$visits = $_POST['visits'];
		$pageview = $_POST['pageview'];
		
		# first, do error checking....
		
		#######   error check goes here.....
		
		
		
	
		# link to DB
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
			
		$sql = "UPDATE tblAffiliate SET CompanyName = '$companyname', FirstName = '$firstname', LastName = '$lastname', Email = '$email', 
		Phone = '$phone', Fax = '$fax', Address = '$address', Address2 = '$address2', City = '$city', State = '$state', ZipCode = '$zip', 
		Country = '$country', WebSiteName = '$webname', URL = '$url', Description = '$description', UniqueVisitors = '$visits', 
		PageViews = '$pageview', CheckToName = '$payto', UserName = '$username', Password = '$password'
		WHERE AffiliateID = '$aID'";
		
		mysql_query($sql) or die("Cannot update affiliate information, please try again.");
		
		#delete categories so they can be reinserted...
			$sql="DELETE FROM tblAffiliateCategory WHERE AffiliateID = '$aID'";
			mysql_query($sql) or die("Can't delete categories, please try again.");
		
		# loop to insert categories into table...
		for($i=0; $i < count($category); $i++)
		{
			$sql = "INSERT INTO tblAffiliateCategory(AffiliateID, Category) VALUES ('$aID', '";					
			$sql .= $category[$i];
			$sql .= "')";
			mysql_query($sql) or die("Can't Insert Affiliate Categories, please try again.");
		}
		
		# finished enternig info into tables and DB.  Now email company to say thank you and give an intro to the program.
		# Also, email Silent Technology with info to approve.
		
		mysql_close($link);
	
	}
// end if button pressed // ******


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
      <td colspan="2" bgcolor="#eeeeee"><font size="2" face="Arial, Helvetica, sans-serif"><span class="bold"><strong><font size="4">Primary 
        Contact Information</font> </strong>(<font color="#FF0000">*</font> indicates 
        required field)</span></font></td>
    </tr>
    <tr> 
      <td width="274"><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Website 
        Name</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td width="543"><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="webname" type="text" id="webname" size="40" border="1" value="<? echo $WebSiteName;?>">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Website 
        URL</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="url" type="text" id="url" size="40" value="<? echo $URL;?>">
        <br>
        Your site must be live for approval.</span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">User 
        Name</font> <font color="#FF0000">*</font><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><br>
        </span></font></span></font></strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"></font></span></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="username" type="text" id="username" value="<? echo $UserName;?>" size="12" maxlength="12">
        <br>
        <font size="2" face="Arial, Helvetica, sans-serif"><span class="text">(case 
        sensitive) </span></font> </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Password</font> 
        <font color="#FF0000">*</font> <br>
        </span></font></strong><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="password" type="password" id="password" value="<? echo $Password;?>" size="12" maxlength="12">
        <br>
        (case sensitive) </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Confirm 
        Password</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="password2" type="password" id="password2" value="<? echo $Password;?>" size="12" maxlength="12">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Company 
        Name </font><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="companyname" type="text" id="companyname" value="<? echo $CompanyName;?>" size="40">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">First 
        Name</font> <font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
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
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <font color="#003399">Country</font> <font color="#FF0000">*</font></span></font></strong></td>
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
      <td colspan="2" bgcolor="#eeeeee"> <font size="4" face="Arial, Helvetica, sans-serif"><span class="bold"> 
        <strong><br>
        Payment Information</strong></span> </font></td>
    </tr>
    <tr> 
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><b> 
        IMPORTANT: Please read the information in this section carefully and ensure 
        that the information you enter is correct. Failure to do so may unnecessarily 
        delay commission payments to you. </b></span></font></td>
    </tr>
    <tr> 
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        Make Checks Payable To </span></font><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#FF0000">*</font></span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="payto" type="text" value="<? echo $CheckToName;?>" size="40">
        </span></font></td>
    </tr>
    <tr> 
      <td colspan="2" bgcolor="#eeeeee"> <p><font size="4" face="Arial, Helvetica, sans-serif"><strong><br>
          </strong><span class="bold"><strong>Site Description</strong></span> 
          </font></p></td>
    </tr>
    <tr> 
      <td> <p><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><strong><font color="#003399">Website 
          Categories</font></strong></span></font><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#FF0000"> 
          *</font></span></font></strong></span></font><br>
          <font size="2" face="Arial, Helvetica, sans-serif">(Select all that 
          apply)</font></p></td>
      <td><span class="text"> </span> <table border="0" align="left">
          <tr> 
            <?
		  		$sql = "Select * FROM tblAffiliateCategory WHERE AffiliateID = '$aID'";	
				$result = mysql_query($sql) or die("Cannot execute query!");
				
				$i=0;
				
				//store categories into array
				while($row = mysql_fetch_array($result))
				{
					$categories[$i] = $row[Category];
					
					$i++;			
				}
		  
		  ?>
            <td width="128" valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="test prep" <? for($i=0; $i < count($categories); $i++) {if($categories[$i] == 'test prep'){echo 'checked';} }?>>
              Test Prep<br>
              </font></span></td>
            <td width="139" valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="online courses" <? for($i=0; $i < count($categories); $i++) {if($categories[$i] == 'online courses'){echo 'checked';} }?>>
              Online Courses<br>
              </font></span></td>
            <td width="130" valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="education" <? for($i=0; $i < count($categories); $i++) {if($categories[$i] == 'education'){echo 'checked';} }?>>
              Education<br>
              </font></span></td>
          </tr>
          <tr> 
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="school" <? for($i=0; $i < count($categories); $i++) {if($categories[$i] == 'school'){echo 'checked';} }?>>
              School<br>
              </font></span></td>
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="books" <? for($i=0; $i < count($categories); $i++) {if($categories[$i] == 'books'){echo 'checked';} }?>>
              Books<br>
              </font></span></td>
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="tutoring" <? for($i=0; $i < count($categories); $i++) {if($categories[$i] == 'tutoring'){echo 'checked';} }?>>
              Tutoring<br>
              </font></span></td>
          </tr>
          <tr> 
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="act" <? for($i=0; $i < count($categories); $i++) {if($categories[$i] == 'act'){echo 'checked';} }?>>
              ACT<br>
              </font></span></td>
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="gmat" <? for($i=0; $i < count($categories); $i++) {if($categories[$i] == 'gmat'){echo 'checked';} }?>>
              GMAT<br>
              </font></span></td>
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="gre" <? for($i=0; $i < count($categories); $i++) {if($categories[$i] == 'gre'){echo 'checked';} }?>>
              GRE<br>
              </font></span></td>
          </tr>
          <tr> 
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="lsat" <? for($i=0; $i < count($categories); $i++) {if($categories[$i] == 'lsat'){echo 'checked';} }?>>
              LSAT<br>
              </font></span></td>
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="mcat" <? for($i=0; $i < count($categories); $i++) {if($categories[$i] == 'mcat'){echo 'checked';} }?>>
              MCAT </font></span></td>
            <td valign="top"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"> 
              <input name="cat[]" type="checkbox" id="cat[]" value="sat" <? for($i=0; $i < count($categories); $i++) {if($categories[$i] == 'sat'){echo 'checked';} }?>>
              SAT<br>
              </font></span></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td> <font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399"><strong>Brief 
        Description of Site</strong></font> <strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#FF0000">*</font></span></font></strong></span></font></td>
      <td> <font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <textarea name="description" cols="40" rows="5" wrap="VIRTUAL" id="description" border="1"><? echo $Description;?></textarea>
        </span></font></td>
    </tr>
    <tr> 
      <td><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><span class="text"><strong>Website 
        Stats </strong></span></font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <select name="visits" class="text">
          <option value="0" selected>Monthly Unique Visitors </option>
          <option value="499" <? if ($UniqueVisitors == "499"){echo "selected";}?>>Less 
          Than 500 </option>
          <option value="4999" <? if ($UniqueVisitors == "4999"){echo "selected";}?>>500 
          - 5000</option>
          <option value="49999" <? if ($UniqueVisitors == "49999"){echo "selected";}?>>5000 
          - 50,000</option>
          <option value="499999" <? if ($UniqueVisitors == "499999"){echo "selected";}?>>50,000 
          - 500,000</option>
          <option value="500001" <? if ($UniqueVisitors == "500001"){echo "selected";}?>>Over 
          500,000 </option>
        </select>
        <select name="pageview" class="inputbox">
          <option value="0" selected>Monthly Page Views </option>
          <option value="499" <? if ($PageViews == "499"){echo "selected";}?>>Less 
          Than 500 </option>
          <option value="4999" <? if ($PageViews == "4999"){echo "selected";}?>>500 
          - 5000</option>
          <option value="49999" <? if ($PageViews == "49999"){echo "selected";}?>>5000 
          - 50,000</option>
          <option value="499999" <? if ($PageViews == "499999"){echo "selected";}?>>50,000 
          - 500,000</option>
          <option value="500001" <? if ($PageViews == "500001"){echo "selected";}?>>Over 
          500,000 </option>
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
	$http .= "partner";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>