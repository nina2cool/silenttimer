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

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


	#connection to database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	if ($_POST['Add'] == "Add Category")
	{		
		# get information from previous screen...
		$CategoryName = $_POST['CategoryName'];
		$Priority = $_POST['Priority'];
		$Status = $_POST['Status'];
		
		# INSERT everything into tblCategory
		$sql = "INSERT INTO tblCategory(Name, Priority, Status, Type) 
				VALUES ('$CategoryName', '$Priority', '$Status', 'FAQ')";
		mysql_query($sql) or die("Cannot Insert New Category, try again!");
	
		header("location: index.php");
	}


?>


<div align="center"> 
  <p align="left"><font color="#000000" size="5" face="Arial, Helvetica, sans-serif"><strong>Add 
    a Category</strong></font></p>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
    <tr>
      <td><form action="" method="post" enctype="multipart/form-data" name="form1">
          <table width="100%" border="0" cellspacing="0" cellpadding="8">
            <tr> 
              <td width="15%"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Category 
                Name </font></strong></td>
              <td width="85%"><font size="2" face="Arial, Helvetica, sans-serif"> 
                <input name="CategoryName" type="text" id="BreedName3" size="50">
                </font></td>
            </tr>
            <tr>
              <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Priority
              Name </font></strong></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <input name="Priority" type="text" id="BreedName3" size="4">
              </font></td>
            </tr>
            <tr>
              <td><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Status
              </font></strong></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="Status" id="Status">
                <option value="active">active</option>
                <option value="inactive" selected>inactive</option>
                                                                      </select> 
              (Start with inactive until you finish adding your questions and
              answers. Then change it. </font></td>
            </tr>
          </table>
          <p> 
            <input name="Add" type="submit" id="Add3" value="Add Category">
            <input type="reset" name="Reset" value="Reset">
          </p>
        </form></td>
    </tr>
  </table>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  </div>



 <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.

require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
</p>
</p>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
