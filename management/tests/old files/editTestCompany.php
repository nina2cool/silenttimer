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
	$TestCompanyID = $_GET['test'];

	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
  // -------- code to save values from form into tables, etc....
// test below
	if ($_POST['Submit'] == "Save")
	{
		
		$vCompanyName = $_POST['txtCompanyName'];
		$vAddress = $_POST['txtAddress'];
		$vCity = $_POST['txtCity'];
		$vState = $_POST['txtState'];
		$vZipCode = $_POST['txtZipCode'];
		$vContactPerson = $_POST['txtContactPerson'];
		$vPhone = $_POST['txtPhone'];
		$vEmail = $_POST['txtEmail'];

		$sql = "UPDATE tblTestCompany
			SET CompanyName = '$vCompanyName', 
			Address = '$vAddress', City = '$vCity', 
			State = '$vState', ZipCode = '$vZipCode',
			ContactPerson = '$vContactPerson', 
			Phone = '$vPhone',
			Email = '$vEmail'
			WHERE TestCompanyID = '$TestCompanyID'";
		//echo $sql;
		mysql_query($sql) or die("Cannot update tblTestCompany");
		
		/* if ($chkCancelOrder == "cancel")
		{
			$sql = "UPDATE tblTestCompany
					SET Status = 'cancel'
					WHERE TestCompanyID = $TestCompanyID";
			mysql_query($sql) or die("Cannot update to cancelled");
		}

		*/	
	}  
// test above

	
	
	$sql = "SELECT * FROM tblTestCompany WHERE TestCompanyID = $TestCompanyID";
			
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$CompanyName = $row[CompanyName];
		$Address = $row[Address];
		$City = $row[City];
		$State = $row[State];
		$ZipCode = $row[ZipCode];
		$ContactPerson = $row[ContactPerson];
		$Phone = $row[Phone];
		$Email = $row[Email];
			
	}
	

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
<font size="5" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&nbsp;&nbsp;<font color="#000099">&nbsp;&nbsp;&nbsp;View 
/ Edit Test Company Details</font></strong></font> 
<form action="" method="post" name="form" id="form">
      <table width="80%" border="0">
    
	
   <tr> 
                     <td width="25%"><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> 
                     Company Name&nbsp;</strong></font></div></td>
                     <td width="75%"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                     <input name="txtCompanyName" type="text" id="txtCompanyName" value="<? echo $CompanyName; ?>" size="40" maxlength="100">
                     </strong></font></td>
                 </tr>
 


           		  <tr> 
                  		<td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> 
                      	Address&nbsp;</strong></font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    	<input name="txtAddress" type="text" id="txtAddress" value="<? echo $Address; ?>" size="40" maxlength="100">
                    	</strong></font></td>
           		  </tr>
				  
				  
				  	  <tr> 
                  		<td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> 
                      	City&nbsp;</strong></font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    	<input name="txtCity" type="text" id="txtCity" value="<? echo $City; ?>" size="40" maxlength="100">
                    	</strong></font></td>
           		  </tr>
				  
				  
				   <tr> 
                  		<td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> 
                      	State&nbsp;</strong></font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    	<input name="txtState" type="text" id="txtState" value="<? echo $State; ?>" size="2" maxlength="2">
                    	</strong></font></td>
           		  </tr>
				  
				    <tr> 
                  		<td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> 
                      	Zip Code&nbsp;</strong></font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    	<input name="txtZipCode" type="text" id="txtZipCode" value="<? echo $ZipCode; ?>" size="15" maxlength="15">
                    	</strong></font></td>
           		  </tr>
				  
				  
				  
				  
           		   <tr> 
                  		<td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>ContactPerson&nbsp;</strong></font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    	<input name="txtContactPerson" type="text" id="txtContactPerson" value="<? echo $ContactPerson; ?>" size="40" maxlength="100">
                    	</strong></font></td>
          		 </tr>
				 
           			<tr> 
                  		<td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Phone&nbsp;</strong></font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    <input name="txtPhone" type="text" id="txtPhone" value="<? echo $Phone; ?>" size="40" maxlength="100">
                    </strong></font></td>
           		</tr>
           		<tr> 
                  <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Email&nbsp;</strong></font></div></td>
                  <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    <input name="txtEmail" type="text" id="txtEmail" value="<? echo $Email; ?>" size="40" maxlength="100">
                   </strong></font></td>
          	 </tr>
   
    </table>  
	
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    <input type="submit" name="Submit" value="Save">
    &nbsp;&nbsp; 
    <input type="reset" name="Submit2" value="Reset">
  </p>
	
	</form>
            
<p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);


// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.
require "../include/footerlinks.php";



// finishes security for page
}
else
{
?>
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>