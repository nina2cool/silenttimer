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

	$ResumeID = $_GET['rID'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	

	
	if ($_POST['Update'] == "Update")
	{
		$FirstName = $_POST['FirstName'];
		$LastName = $_POST['LastName'];
		$FileName = $_POST['FileName'];
		$LocationID = $_POST['LocationID'];
		$Status = $_POST['Status'];
				
		
		$sql = "UPDATE tblResume
		SET FirstName = '$FirstName',
		LastName = '$LastName',
		FileName = '$FileName',
		LocationID = '$LocationID',
		Status = '$Status'
		WHERE ResumeID = '$ResumeID'";
		
		mysql_query($sql) or die("Cannot update Resume, try again!");

	}
	
	
	$sql = "SELECT * FROM tblResume where ResumeID = '$ResumeID'";
	
	
	$result = mysql_query($sql) or die("Cannot get resume info, try again!");
	
		while($row = mysql_fetch_array($result))
				{
				$LocationID = $row[LocationID];
				$FirstName = $row[FirstName];
				$LastName = $row[LastName];
				$FileName = $row[FileName];
				$ResumeID = $row[ResumeID];
				$Status = $row[Status];
				}
	
	
	
?>


<title></title>
<link href="../mgt/todo/style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<div align="center"> 
  <p align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit 
    an Existing Resume</strong></font></p>
  <form action="" method="post" name="frmCreate" id="frmCreate">

    <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
      <tr> 
        <td width="31%"><strong><font size="2" face="Arial, Helvetica, sans-serif">First 
          Name</font></strong></td>
        <td width="69%"><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="FirstName" type="text" id="FirstName2" value="<? echo $FirstName; ?>">
          </font></td>
      </tr>
      <tr> 
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Last Name</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="LastName" type="text" id="LastName2" value="<? echo $LastName; ?>">
          </font></td>
      </tr>
      <tr> 
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">File Name 
          </font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="FileName" type="text" id="FileName2" value="<? echo $FileName; ?>">
          (ex: LastName-LocationCode.doc or .pdf)</font></td>
      </tr>
      <tr> 
        <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Location 
          ID </font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"> 
          <input name="LocationID" type="text" id="LocationID2" value="<? echo $LocationID; ?>">
          </font></td>
      </tr>
      <tr> 
        <td height="21"><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif"> 
        
		  <select name="Status" id="select">
            <option selected>Select One</option>
            <option value="active" <? if ($Status == 'active'){echo 'selected';}?>>Active</option>
            <option value="inactive" <? if ($Status == 'inactive'){echo 'selected';}?>>Inactive</option>
            <option value="hired" <? if ($Status == 'hired'){echo 'selected';}?>>Hired</option>
           </select>
        
		  </font></td>
      </tr>
    </table>
    <p align="left">&nbsp;</p>
    <p align="left"> 
      <input name="Update" type="submit" id="Add2" value="Update">
      <input type="reset" name="Reset" value="Reset">
    </p>
  </form>
  <p><font size="3" face="Arial, Helvetica, sans-serif"></font></p>
</div>
<?


// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it - found in home management folder

require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
</font> 
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<font face="Arial"> 
<?
}
?>
</font>