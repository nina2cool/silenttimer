<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{


// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


	//grab variables to get purchase info and customer info from DB.
	$CategoryID = $_GET['c'];
	
	// build connection to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");


	if ($_POST['Update'] == "Update")
	{
		$Name = $_POST['Name'];
		$Status = $_POST['Status'];
			
		$sql = "UPDATE tblBillCategory
		SET Name = '$Name', 
		Status = '$Status'
		WHERE CategoryID = '$CategoryID'";
		
		mysql_query($sql) or die("Cannot update category information, please try again.");
		
		$goto = "CategoryView.php";
		header("location: $goto");
			
		
	}


	$sql = "SELECT * FROM tblBillCategory WHERE CategoryID = '$CategoryID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	while($row = mysql_fetch_array($result))
	{
		$Name = $row[Name];
		$Status = $row[Status];
	}
	
	
// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";



 // ---- code to fill page with information....
	
		
?>
<strong><font color="#000099" size="5" face="Arial, Helvetica, sans-serif">&gt;
Edit Category</font></strong>
<form action="" method="post" name="frmChange" id="frmChange">
  <table width="100%" border="0" cellspacing="0" cellpadding="8">
                <tr> 
                  <td align="left" valign="top"> 
                    <table width="100%" border="1" cellpadding="4" cellspacing="0" bordercolor="#CCCCFF">
                      <tr>
                        <td><strong><font color="#000099" size="2" face="Arial, Helvetica, sans-serif">                        Name</font></strong></td>
                        <td><font size="2" face="Arial, Helvetica, sans-serif">
                          <input name="Name" type="text" id="FirstName3" value="<? echo $Name; ?>">
                        </font></td>
                      </tr>
                      <tr>
                        <td><strong><font color="#000099" size="2" face="Arial, Helvetica, sans-serif">Status
                              (make 'inactive' to delete) </font></strong></td>
                        <td><font size="2" face="Arial, Helvetica, sans-serif">
                          <input name="Status" type="text" id="AffiliateID" value="<? echo $Status; ?>">
                        </font></td>
                      </tr>
                    </table>
                    <p align="left"> 
          <input name="Update" type="submit" id="Update" value="Update">
          &nbsp;&nbsp; 
          <input type="reset" name="Submit2" value="Reset">
          <br>
        </p>
      </td>
                </tr>
  </table>
</form>
            
<p></p>
<p></p>
<p></p>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

//close connection to database
mysql_close($link);

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// finishes security for page
}
else
{
	header("location: index.php"); //redirects user via PHP to this page... better than meta refresh...
}
?>