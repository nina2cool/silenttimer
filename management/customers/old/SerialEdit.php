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
	$pID = $_GET['purch'];

	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


  // -------- code to save values from form into tables, etc....
// test below
	if ($_POST['Submit'] == "Save")
	{
		
		$Serial = $_POST['txtSerial'];
		$Notes = $_POST['txtNotes'];

		$sql = "UPDATE tblPurchaseSerial
			SET Serial = '$Serial', 
			Notes = '$Notes'
			WHERE PurchaseID = '$pID'";
			
		
		echo $sql;
		
		mysql_query($sql) or die("Cannot update purchase serial");
			
	}  
// test above

	
	$sql = "SELECT * FROM tblPurchaseSerial WHERE PurchaseID = '$pID'";
	
		
		echo $sql;
			
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$pID = $row[PurchaseID];
		$Serial = $row[Serial];
		$Notes = $row[Notes];	
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
/ Edit Purchase Serial</strong></font></font> 
<form action="" method="post" name="form" id="form">
  
    
  <table width="80%" border="0">
    <tr> 
      <td width="25%"><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Purchase 
          ID</strong></font></div></td>
      <td width="75%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $pID; ?></font></strong></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Serial&nbsp;</strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="txtSerial" type="text" id="txtSerial" value="<? echo $Serial; ?>" size="40" maxlength="150">
        </strong></font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong>Notes</strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <textarea name="txtNotes" cols="50" rows="4" id="txtNotes"><? echo $Notes; ?></textarea>
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