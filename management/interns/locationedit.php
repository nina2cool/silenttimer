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

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
	

	//grab variables to get customer info from DB.
	$LocID = $_GET['loc'];

	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


  // -------- code to save values from form into tables, etc....
// test below
	if ($_POST['Submit'] == "Save")
	{
		
	
		$LocationName = $_POST['LocationName'];
		$City = $_POST['City'];
		$State = $_POST['State'];
		$NumPositions = $_POST['NumPositions'];
		$Website = $_POST['Website'];
	

		$sql = "UPDATE tblInternshipLocation
			SET LocationName = '$LocationName', 
			City = '$City', 
			State = '$State', 
			NumPositions = '$NumPositions',
			Website = '$Website'
			WHERE LocationID = '$LocID'";
		//echo $sql;
		mysql_query($sql) or die("Cannot update tblInternshipLocation");
			
	}  
// test above

	
	$sql2 = "SELECT * FROM tblInternshipLocation WHERE LocationID = '$LocID'";
	
	//put SQL statement into result set for loop through records
	$result2 = mysql_query($sql2) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result2))
	{
		$LocID = $row[LocationID];
		$LocationName = $row[LocationName];
		$City = $row[City];
		$State = $row[State];
		$NumPositions = $row[NumPositions];
		$Website = $row[Website];
		
	}
	
?>
<script language="JavaScript" type="text/JavaScript">

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

</script>


			
<div id="Layer1" style="position:absolute; left:6px; top:235px; width:2px; height:11px; z-index:1"></div>
<font size="5" face="Arial, Helvetica, sans-serif"><font color="#003399"><strong>View 
/ Edit Locations</strong></font></font> 
<form action="" method="post" name="form" id="form">
  
    
  <table width="80%" border="0">
    <tr bgcolor="#FFFFCC"> 
      <td> 
        <div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Location 
          ID </strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> <? echo $LocID; ?> 
        </strong></font></td>
    </tr>
    <tr> 
      <td width="25%"><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Location 
          Name </strong></font></div></td>
      <td width="75%"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="LocationName" type="text" id="LocationName" value="<? echo $LocationName; ?>" size="40" maxlength="50">
        </strong></font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>City&nbsp;</strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="City" type="text" id="City" value="<? echo $City; ?>" size="40" maxlength="100">
        </strong></font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>State&nbsp;</strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="State" type="text" id="State" value="<? echo $State; ?>" size="40" maxlength="150">
        </strong></font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong># 
          of Jobs&nbsp;</strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="NumPositions" type="text" id="NumPositions" value="<? echo $NumPositions; ?>" size="40" maxlength="150">
        </strong></font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Website</strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="Website" type="text" id="Website" value="<? echo $Website; ?>" size="40" maxlength="150">
        </strong></font></td>
    </tr>
  </table>	 
        
  <p>&nbsp;</p>
  <p> 
    <input type="submit" name="Submit" value="Save">
    &nbsp;&nbsp; 
    <input type="reset" name="Submit2" value="Reset">
  </p>
  </form>
 
<? // -------------- END MY CODE -------------------
// has links that show up at the bottom in it


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