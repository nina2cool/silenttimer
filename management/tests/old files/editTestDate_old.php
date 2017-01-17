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
	$TestDateID = $_GET['test'];


	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
// Save Button
	if ($_POST['Submit'] == "Save")
	{
			
		
		$vDate = $_POST['txtDate'];
		$vInfo = $_POST['txtInfo'];
		
		$sql = "UPDATE tblTestDates
			SET 
			Date = '$vDate',
			Info = '$vInfo' 
			WHERE TestDateID = '$TestDateID'";
		//echo $sql;
		mysql_query($sql) or die("Cannot update tblTestDates");
		
	}  
	//SQL to get data from test table
	$sql = "SELECT tblTestDates.TestID, tblTestDates.TestDateID, 
	tblTestDates.Date, tblTestDates.Info,
	tblTests.TestID, tblTests.Name, tblTestCompany.CompanyName, tblTests.WebSite
	FROM tblTestDates INNER JOIN tblTests ON
	tblTestDates.TestID = tblTests.TestID INNER JOIN 
	tblTestCompany ON tblTests.TestCompanyID = tblTestCompany.TestCompanyID
	WHERE tblTestDates.TestDateID = $TestDateID";			
	
	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$Name = $row[Name];
		$Date = $row[Date];
		$Info = $row[Info];
		$CompanyName = $row[CompanyName];
		$WebSite = $row[WebSite];
		

			
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
<font size="5" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&nbsp;&nbsp;<font color="#000099">Edit 
Test Date</font></strong></font> 
<form action="" method="post" name="form" id="form">
   
     <table width="80%" border="0">
    
	
  <!-- <tr> 
                     <td width="25%"><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> 
                      Name&nbsp;</strong></font></div></td>
                     <td width="75%"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                     <input name="txtName" type="text" id="txtName" value="<? echo $Name; ?>" size="40" maxlength="50">
                     </strong></font></td>
                 </tr> -->
				 
		  <tr> 
                     <td width="25%"><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> 
                      Name&nbsp;</strong></font></div></td>
                     <td width="75%"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                     <? echo $Name; ?>
                     </strong></font></td>
                 </tr>
 


           		  <tr> 
                  		<td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong> 
                      	Date&nbsp;</strong></font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    	<input name="txtDate" type="text" id="txtDate" value="<? echo $Date; ?>" size="40" maxlength="40">
                    	</strong></font></td>
           		  </tr>
           		   <tr> 
                  		<td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Information&nbsp;</strong></font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    	<input name="txtInfo" type="text" id="txtInfo" value="<? echo $Info; ?>" size="40" maxlength="100">
                    	</strong></font></td>
          		 </tr>
				 
           
		   <!--			<tr> 
                  		<td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Given By&nbsp;</strong></font></div></td>
                  		<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                    <input name="txtCompanyName2" type="text" id="txtCompany5" value="<? echo $CompanyName; ?>" size="40" maxlength="100">
                    </strong></font></td>
    		   		</tr> -->
  <tr> 
             <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Given By&nbsp;</strong></font></div></td>
             	<td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
               <? echo $CompanyName; ?>
               </strong></font></td>
    		   		</tr> 
  
           	<tr> 
              <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Test Website&nbsp;</strong></font></div></td>
             <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
             <? echo $WebSite; ?>
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
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
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