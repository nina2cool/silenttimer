<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{



// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";


// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";


//require "include/sidemenu.php";


// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?	

	//grab variables to get purchase info and customer info from DB.
	$CustomsAgentID = $_GET['ca'];


	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	// Save Button
	if ($_POST['Submit'] == "Save")
	{
			
		
		$vFirstName = $_POST['txtFirstName'];
		$vLastName = $_POST['txtLastName'];
		$vPhone = $_POST['txtPhone'];
		$vEmail = $_POST['txtEmail'];
		
		$sql = "UPDATE tblCustomsAgent
			SET FirstName = '$vFirstName',
			LastName  = '$vLastName ',
			Phone = '$vPhone',
			Email  = '$vEmail'  
			WHERE CustomsAgentID = '$CustomsAgentID'";
		//echo $sql;
		mysql_query($sql) or die("Cannot update tblCustomsAgent");
		
	}  
	$sql = "SELECT * FROM tblCustomsAgent WHERE CustomsAgentID = $CustomsAgentID";
			
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$FirstName = $row[FirstName];
		$LastName = $row[LastName];
		$Phone = $row[Phone];
		$Email = $row[Email];
		
	}
	
	//SQL to get data from customer table
/*	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = $customerID";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query2!");
	
	while($row = mysql_fetch_array($result))
	{
		//shipping information
		$FirstName = $row[FirstName];
		$LastName = $row[LastName];
		$Address = $row[Address];
		$City = $row[City];
		$State = $row[State];
		$ZipCode = $row[ZipCode];
		$Phone = $row[Phone];
		$Email = $row[Email];
		// Test Info
		$PrepClass = $row[PrepClass];
		$School = $row[School];
	}
	
	//SQL to get data from PurchaseDetails Table
	$sql = "SELECT * FROM tblPurchaseDetails WHERE PurchaseID = $purchaseID";
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		//Billing Information
		
		$FirstNameB = $row[FirstName];
		$LastNameB = $row[LastName];
		$AddressB =  $row[Address];
		$CityB = $row[City];
		$StateB = $row[State];
		$ZipCodeB = $row[ZipCode];
		
		$CardType = $row[CardType];
		$BankCode = $row[BankCode];
		$AddressVerification = $row[AddressVerification];
	}
	*/
?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<div id="Layer1" style="position:absolute; left:6px; top:235px; width:2px; height:11px; z-index:1"></div>
<font size="5" face="Arial, Helvetica, sans-serif"><strong><font color="#003399">&nbsp;&nbsp;&nbsp;&nbsp;View 
/ Edit Customs Agent Details</font></strong></font><br>
<form action="" method="post" name="form" id="form"> 
<!--<table width="73%" height="168" border="0" cellpadding="8" cellspacing="0">
    <tr> 
   
    <tr> 
      <td align="left" valign="top"> <table width="100%" height="135" border="1" cellpadding="5" cellspacing="0" bordercolor="#003399">
          <tr> 
            <td height="133" align="left" valign="top"><table width="97%" border="0">
                <tr> 
           -->
<table width="86%" border="0">
			
	    
	
  				 <tr> 
                     <td width="22%"><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>First 
                      Name&nbsp;</strong></font></div></td>
                     <td width="78%"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                     <input name="txtFirstName" type="text" id="txtFirstName" value="<? echo $FirstName; ?>" size="40" maxlength="50">
                     </strong></font></td>
                 </tr>
 


           		  <tr> 
                  		<td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Last 
                      	Name&nbsp;</strong></font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    	<input name="txtLastName" type="text" id="txtLastName" value="<? echo $LastName; ?>" size="40" maxlength="100">
                    	</strong></font></td>
           		  </tr>

           		   <tr> 
                  		<td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Phone&nbsp;</strong></font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    	<input name="txtPhone" type="text" id="txtPhone5" value="<? echo $Phone; ?>" size="30" maxlength="30">
                    	</strong></font></td>
          		 </tr>
           			<tr> 
                  		<td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Email&nbsp;</strong></font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    <input name="txtEmail" type="text" id="txtEmail5" value="<? echo $Email; ?>" size="40" maxlength="100">
                    </strong></font></td>
           		</tr>
           
  </table> 
  <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    <input type="submit" name="Submit" value="Save">
    &nbsp;&nbsp; 
    <input type="reset" name="Submit2" value="Reset">
  </p>



</form>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>