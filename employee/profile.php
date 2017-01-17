<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "include/url.php";

$PageTitle = "Silent Technology LLC Employee Profile";

//security check
If (session_is_registered('e'))
{

// has database username and password, so don't need to put it in the page.
require "include/dbinfo.php";



/////////  code to insert information into account, create affiliate code, and email thank you /////////

	if ($_POST['Update'] == "Update") # if button is pressed...
	{
	
		$eID = $_SESSION['e'];
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$homephone = $_POST['homephone'];
		$cellphone = $_POST['cellphone'];
		$fax = $_POST['fax'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$address2 = $_POST['address2'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$stateother = $_POST['stateother'];
		$zip = $_POST['zipcode'];
		$country = $_POST['country'];
		
				
		# first, do error checking....
		
		#######   error check goes here.....
		
		
		
	
		# link to DB
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
			
		$sql = "UPDATE tblEmployee SET Email = '$email', HomePhone = '$homephone', CellPhone = '$cellphone', Fax = '$fax', Address = '$address', Address2 = '$address2', City = '$city', State = '$state', ZipCode = '$zipcode', 
		Country = '$country', UserName = '$username', Password = '$password'
		WHERE EmployeeID = '$eID'";
		
		mysql_query($sql) or die("Cannot update employee information, please try again.");
		
	
		# finished enternig info into tables and DB.
		
		mysql_close($link);
	
	}
// end if button pressed // ******



// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
//get name of person/company	
	$eID = $_SESSION['e'];
	
////  get info to fill in default values ///////
	
	#connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			
		
	$sql = "SELECT * FROM tblEmployee WHERE EmployeeID = '$eID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$Email = $row[Email];
		$HomePhone = $row[HomePhone];
		$CellPhone = $row[CellPhone];
		$Fax = $row[Fax];
		$Address = $row[Address];
		$Address2 = $row[Address2];
		$City = $row[City];
		$State = $row[State];
		$ZipCode = $row[ZipCode];
		$Country = $row[Country];
		$UserName = $row[UserName];
		$Password = $row[Password];

	}
	
?>
			
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Employee 
  Profile </strong></font></p>
<p><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Update 
  your information, then press &quot;Update&quot;. Please ensure your information 
  is accurate.</font></strong></p>
<p align="right"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif">&lt;&lt;<a href="home.php">Back 
  to Employee Home Page</a></font></p>


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
      <td colspan="2" bgcolor="#eeeeee"><font size="2" face="Arial, Helvetica, sans-serif"><span class="bold"><strong><font size="4">Contact 
        Information</font> </strong>(<font color="#FF0000">*</font> indicates 
        required field)</span></font></td>
    </tr>
    <tr> 
      <td width="274"><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">User 
        Name</font> <font color="#FF0000">*</font><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><br>
        </span></font></span></font></strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font size="2" face="Arial, Helvetica, sans-serif"></font></span></font></td>
      <td width="543"><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
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
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Home 
        Phone </font> <font color="#FF0000">*</font> </span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="homephone" type="text" id="homephone" value="<? echo $HomePhone;?>" size="15" maxlength="20">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"><font color="#003399">Cell 
        Phone </font> <font color="#FF0000">*</font> </span></font></strong></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="cellphone" type="text" id="cellphone" value="<? echo $CellPhone;?>" size="15" maxlength="20">
        </span></font></td>
    </tr>
    <tr> 
      <td><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">F<span class="text">ax</span></font></strong></td>
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
        <input name="zipcode" type="text" value="<? echo $ZipCode;?>">
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
      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><span class="text"> 
        <input name="Update" type="submit" id="Update" value="Update">
        &nbsp;&nbsp; 
        <input type="reset" value="Reset ">
        </span></font></td>
    </tr>
  </table>
</form>
			
<p><font size="2" face="Arial, Helvetica, sans-serif">Changes in name or social security 
  number, needs to be handled through headquarters. Contact Christina for those 
  changes.</font></p>
<p>&nbsp;</p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";


// finishes security for page
}
else
{
	$http .= "employee";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>