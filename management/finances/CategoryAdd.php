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

	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	if ($_POST['Add'] == "Add")
	{

		$Name = $_POST['txtName'];
		$Status = $_POST['txtStatus'];
		
		$sql = "INSERT INTO tblBillCategory(Name, Status, Type) 
				VALUES ('$Name', '$Status', 'finance');";
		mysql_query($sql) or die("Cannot Insert New cateogory, try again!");

		$goto = "CategoryView.php";
		header("location: $goto");
		
		}
		
// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you can change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

		
?>


<title>Category Add</title>

  <p align="left"><font color="#000099" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt;
        Add a Category</strong></font></p>
  <form action="" method="post" name="frmCreate" id="frmCreate">
    <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCFF">
      <tr>
        <td width="50%"><strong><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"> Name</font></strong></td>
        <td><input name="txtName" type="text" id="txtFirstName2"></td>
      </tr>
      <tr>
        <td><strong><font color="#000099" size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></td>
        <td><font size="2" face="Arial, Helvetica, sans-serif">
          <input name="txtStatus" type="text" id="txtAffiliateID" value="active">
        </font></td>
      </tr>
    </table>
    <p>
      <input name="Add" type="submit" id="Add" value="Add">
    </p>
  </form>
  <p>&nbsp;</p>
  <p>&nbsp;</p>

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