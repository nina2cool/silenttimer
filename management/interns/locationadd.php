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
	
	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


	if ($_POST['Add'] == "Add")
	{
		
		$LocationID = $_POST['LocationID'];
		$LocationName = $_POST['LocationName'];
		$City = $_POST['City'];
		$State = $_POST['State'];
		$NumPositions = $_POST['NumPositions'];
		$Website = $_POST['Website'];

		$sql = "INSERT INTO tblInternshipLocation(LocationID, LocationName, City, State, NumPositions, Website)
		VALUES ('$LocationID', '$LocationName', '$City', '$State', '$NumPositions', '$Website');";

		mysql_query($sql) or die("Cannot add tblInternshipLocation");

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
<font size="5" face="Arial, Helvetica, sans-serif"><font color="#003399"><strong>Add 
a Location</strong></font></font> 
<form action="" method="post" name="form" id="form">
  
    
  <table width="80%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr> 
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Location 
          ID<br>
          ex: </strong><font color="#FF0000">Loc #</font> <font color="#330099">First 
          Letter of State</font> <font color="#339933">Loc # for that State<font color="#000000"> 
          = </font> <br>
          <font color="#FF0000"><strong>26</strong></font><strong><font color="#330099">C</font>5</strong> 
          </font></font></div></td>
      <td><input name="LocationID" type="text" id="LocationID"></td>
    </tr>
    <tr> 
      <td width="36%"><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Location 
          Name </strong></font></div></td>
      <td width="64%"><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="LocationName" type="text" id="LocationName" maxlength="50">
        </strong></font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>City&nbsp;</strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="City" type="text" id="City" maxlength="100">
        </strong></font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>State&nbsp;</strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="State" type="text" id="State" maxlength="150">
        </strong></font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong># 
          of Jobs&nbsp;</strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="NumPositions" type="text" id="NumPositions" maxlength="150">
        </strong></font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Website</strong></font></div></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong> 
        <input name="Website" type="text" id="Website" maxlength="150">
        </strong></font></td>
    </tr>
  </table>	 
        
  <p>&nbsp;</p>
  <p> 
    <input name="Add" type="submit" id="Add" value="Add">
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